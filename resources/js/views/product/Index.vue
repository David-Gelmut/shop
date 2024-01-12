<template>
  <main class="main">
    <!-- Хлебные крошки -->
    <!---section-- class="bread">
      <div class="container">
        <div class="bread-box">
          <ul class="bread-list">
            <li><a href="#">Главная</a></li>
            <li>/</li>
            <li><a href="#" class="active">Каталог</a></li>
          </ul>
        </div>
      </div>
    </section-->
    <!-- Конец хлебных крошек -->
    <!-- Основной блок -->
    <section class="catalogs" style="margin-bottom: 30px">
      <div class="container">
        <hr class="catalogs-line">
        <div class="catalogs-header">
          <h2 class="address-title">Каталог</h2>
          <div class="catalog-filter__select">
            <div class="catalogs-f__one">
              <p class="f-text">Сортировать:</p>
              <div class="f-drop">
                <div class="select-wrapper">
                  <select name="select" class="catalog-select catalog-select-sort" @click.prevent="setSortDir">
                    <option  value="3">Цена по умолчанию</option>
                    <option  value="1">Цена по возростанию</option>
                    <option  value="2">Цена по убыванию</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="catalogs-f__one catalogs-f__left">
              <p class="f-text">Показывать по:</p>
              <div class="f-drop">
                <div class="select-wrapper">
                  <select name="select" class="catalog-select catalog-select-count" @click.prevent="setCount">
                    <option :value="countPage">По умолчанию</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="catalogs-block">
          <aside class="catalogs-filter">
            <button id="btn" class="catalogs-filter__title mobil-filter__title">
              <!--img src="img/icon_svg/filter.svg" alt="Финишные покрытия" class="filter-icon"-->
              <span class="filter-title">Фильтр товаров</span>
              <!--img src="" alt="Финишные покрытия" class="filter-icon__arrows"-->
            </button>
            <div class="catalogs-filter__title">
              <!--img src="img/icon_svg/filter.svg" alt="Финишные покрытия" class="filter-icon"-->
              <span class="filter-title">Фильтр товаров</span>
            </div>
            <div id="more" class="filter-box__click">
              <div class="filter-one">
                <div class="filter-subtitle">Цена</div>
                <form class="filter-form">
                  <div class="form-box_input">
                    <div class="filter-price">
                      <span>от</span>
                      <input type="text" class="filter-input min-price" :value="`${minPrice}`">
                    </div>
                    <div class="filter-price on-left">
                      <span>до</span>
                      <input type="text" class="filter-input max-price" :value="`${maxPrice}`" >
                    </div>
                  </div>
                </form>
              </div>
              <div class="filter-two">
                <div class="filter-subtitle">Категории</div>
                <form class="filter-form">
                    <div v-for="category in filterList.categories">
                      <label class="form-label">
                        <div class="form-label_box">
                          <input type="checkbox" :value="category.id" v-model="categories" class="form__checkbox" >
                          <span class="form__fave"></span>
                        </div>
                        <p class="form-label__text">{{category.title}}</p>
                      </label>
                    </div>
                </form>
              </div>
              <div class="filter-free">
                <div class="filter-subtitle">Тэги</div>
                <form class="filter-form filter-form__top">
                  <div v-for="tag in filterList.tags">
                    <label class="form-label">
                      <div class="form-label_box">
                        <input type="checkbox" :value="tag.id" v-model="tags" class="form__checkbox">
                        <span class="form__fave"></span>
                      </div>
                      <p class="form-label__text">{{tag.title}}</p>
                    </label>
                  </div>
                </form>
              </div>
              <div class="filter-fo">
                <div class="filter-subtitle">Цвета</div>
                <form class="filter-form filter-form__top">
                  <div v-for="color in filterList.colors">
                    <label class="form-label">
                      <div class="form-label_box">
                        <input type="checkbox" :value="color.id" v-model="colors" class="form__checkbox">
                        <span class="form__fave"></span>
                      </div>
                      <p :style="`background: ${color.title};border-radius: 30px;width: 20px;height: 20px;margin-left:10px;`">

                    </p>
                    </label>
                  </div>
                </form>
              </div>
              <div class="filter-button">
                <button class="filter-btn__link" @click.prevent="filterProducts()">Применить</button>
              </div>
            </div>
          </aside>
          <div class="catalogs-product">
              <div  class="catalogs-product__block">
                <div v-for="product in products">
                  <div class="catalogs-product__cart">
                    <div class="product-img">
                      <img :src="product.image_url" style="border-radius: 10px"  width="285" height="285" alt="Продукция" class=" product-img__photo">
                    </div>
                    <a :href="`products/${product.id}`">
                      <h3 class="product-cart_title">{{product.title}}</h3>
                    </a>
                    <p class="product-cart__text"><span>Категория:</span> {{product.category.title}}</p>
                    <p class="product-cart__text"><span>Описание:</span> {{product.desc}}</p>
                    <p class="product-cart__text"><span>Кол-во</span> {{product.count}}</p>
                    <p class="product-cart__price">{{product.price}} ₽</p>
                    <a href="#" @click.prevent = "addToCart(product.id)" class="product-cart__btn">Добавить в корзину</a>
                  </div>
                </div>
            </div>
            <div class="news-pagination">
              <ul class="pagination-list">
                <li v-if="pagination.current_page!=1" style="width: 110px">
                  <a @click.prevent="filterProducts(pagination.current_page - 1)" href="#">Назад</a>
                </li>
                <template v-for="link in pagination.links">
                  <li v-if="Number(link.label)">
                      <a @click.prevent="filterProducts(link.label)" :class="link.active?'active':''" href="#" >{{link.label}}</a>
                  </li>
                </template>
                <!--li><a href="#">...</a></li-->
                <li v-if="pagination.current_page!=pagination.last_page"  id="next">
                  <a  @click.prevent="filterProducts(pagination.current_page + 1)" href="#" class="active">Далее</a>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Конец основного блока -->
  </main>
</template>

<script>
export default {
  name: "Index",
  mounted() {
      this.getFilterList();
      this.filterProducts();
  },
  data() {
    return {
      products:[],
      filterList:[],
      categories:[],
      colors:[],
      tags:[],
      prices:[],
      pagination:[],
      minPrice:0,
      maxPrice:5000000,
      countPage:6,
      sortDir:1,
    }
  },
  methods:{
    addToCart(id){
      let cart = localStorage.getItem('cart');
      let newProduct = [
        {
          'id':id,
          'count':1
        }
      ];
      if(!cart){
        localStorage.setItem('cart',JSON.stringify(newProduct));
      }
      else{
        cart = JSON.parse(cart);
        cart.forEach(product=>{
          if(product.id === id){
            product.count = Number(product.count) + 1;
            newProduct = null;
          }
        })
        this.$parent.$parent.$data.countAllProducts +=1;
        Array.prototype.push.apply(cart,newProduct);
        localStorage.setItem('cart',JSON.stringify(cart));
      }
    },
    filterProducts(page = 1){
      this.prices = [ this.minPrice,this.maxPrice];
      this.axios.post('/api/products',{
            'prices':this.prices,
            'categories':this.categories,
            'colors':this.colors,
            'tags':this.tags,
            'page':Number(page),
            'count':this.countPage,
            'sort':this.sortDir
      }).then(res=>{
        this.products = res.data.data;
        this.pagination = res.data.meta;
          console.log(res);
      })
    },
    setCount(){
      this.countPage = $('.catalog-select-count').val();
      this.filterProducts();
    },
    setSortDir(){
      this.sortDir = $('.catalog-select-sort').val();
      this.filterProducts();
    },
    getFilterList(){
      this.axios.get('/api/products/filters')
      .then(res=>{
        this.filterList = res.data;
        this.minPrice  = res.data.price.min;
        this.maxPrice  = res.data.price.max;
      })
    }
  }
}
</script>
