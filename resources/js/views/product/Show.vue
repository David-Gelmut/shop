<template>
  <main class="main">
    <!-- Хлебные крошки -->
    <!--section-- class="bread">
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
    <!-- Блок товара -->
    <section class="product">
      <div class="container">
        <div class="product-block" v-if="product">
          <div class="">
            <img :src="`${this.product.image_url}`" alt="" class="" style="border-radius: 10px;width: 652px;height:  652px;padding: 0">
          </div>
          <div class="product-colom__right">
            <h2 class="product-title">{{this.product.title}}</h2>
            <ul class="product-list">
              <li class="product-punkt">
                <p class="product-punkt__title">Описание</p>
                <p class="product-punkt__text">{{this.product.desc}}</p>
              </li>
              <li class="product-punkt">
                <p class="product-punkt__title">Кол-во на складе</p>
                <p class="product-punkt__text">{{this.product.count}}</p>
              </li>

              <li class="product-punkt">
                <p class="product-punkt__title">Категория</p>
                <p class="product-punkt__text" >{{this.product.category.title}}</p>
              </li>
              <li class="product-punkt">
                <p class="product-punkt__title">Цвета</p>
                <div v-for="color in product.colors">
                  <div   :style="`background: ${color.title};border-radius: 30px;width: 20px;height: 20px;`"></div>
                </div>
              </li>
              <li class="product-punkt">
                <p class="product-punkt__title">Тэги</p>
                <div v-for="product in product.tags">
                  <p class="product-punkt__text"  style="background-color: #007aff;color: #f6f6f6;padding: 10px;border-radius: 10px">{{product.title}}</p>
                </div>
              </li>
              <li class="product-punkt">
                <p class="product-punkt__title">Цена</p>
                <p class="product-punkt__text">{{this.product.price}}</p>
              </li>
            </ul>
            <div class="product-btn">
              <a href="#"  @click.prevent = "addToCart(product.id)" class="produkt-btn__one">В корзину</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Конец блока товара -->
    <!-- Блок описания -->
    <section style="margin-bottom: 70px;" class="post" v-if="product">
      <div class="container">
        <div class="post-block">
          <div class="post-colom">
            <div class="taba-wrapper">
              <div class="tabs">
                <a class="tab tab-button" href="#tab1">Описание</a>
              </div>
              <hr class="tabs-line">
              <div class="tabs-container">
                <div id="tab1" class="tabs-content tab-content-text tabs-content-active" >
                  <span v-html="content"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Конец блока описания -->
  </main>
</template>

<script>
export default {
  name: "Show",
  data() {
    return {
      product:null,
      content:'',
     // countAllProducts:0
    }
  },
  mounted() {
    this.getProduct();
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
    else {
      cart = JSON.parse(cart);
      cart.forEach(product=>{
        if(product.id === id){
          product.count = Number(product.count) + 1;
          newProduct = null;

        }
      })
        this.$parent.$parent.$data.countAllProducts+=1;
      Array.prototype.push.apply(cart,newProduct);
      localStorage.setItem('cart',JSON.stringify(cart));
    }
  },
  getProduct(){
      this.axios.get(`/api/products/${this.$route.params.id}`)
        .then(res=>{
          this.product = res.data.data;
          this.content = res.data.data.content;
        })
    }
  }
}
</script>
<style></style>
