<template>
  <main class="main" >
    <!-- Хлебные крошки -->
    <!--section-- class="bread">
      <div class="container">
        <div class="bread-box">
          <ul class="bread-list">
            <li><a href="#">Главная</a></li>
            <li>/</li>
            <li><a href="#" class="active">Корзина</a></li>
          </ul>
        </div>
      </div>
    </section-->
    <!-- Конец хлебных крошек -->
    <!-- Таблица сравнения -->
    <section class="compare" >
      <div class="container">
        <h2 class="address-title">Корзина</h2>
        <div class="table-mobil" v-if="sumCart">
          <div class="product_cart__wrapper" style="">
            <div class="cart_item" style="width: 200px;font-size: 18px;font-weight: bold;">Превью товара</div>
            <div class="cart_item" style="width: 400px;font-size: 18px;font-weight: bold;">Название товара</div>
            <div class="cart_item" style="width: 100px;font-size: 18px;font-weight: bold;">Цена ₽</div>
            <div class="cart_item" style="width: 200px;font-size: 18px;font-weight: bold;">Количество</div>
            <div ></div>
          </div>
          <div v-for="product in products">
            <div class="product_cart_wrapper">
              <div class="cart_item" style="width: 200px">
                <img :src="product.image_url" width="200" height="200" style="border-radius: 10px">
              </div>
              <div class="cart_item" style="width: 400px;">
                <a :href="`${product.id}`">
                  <h3 style="color: red">{{product.title}}</h3>
                </a>
              </div>
              <div class="cart_item" style="width: 100px">
                <span class="product-price" style="font-size: 24px;font-weight: bold;">{{product.price}}</span>
              </div>
              <div class="cart_item">
                <a href="#" style="margin: 10px;color:red;" class="cart__btn  cart-btn-minus" @click.prevent="setCount(product.id,'minus')">-</a>
                <input disabled type="text" :name="`product_${product.id}`"  class="cart_input__btn" :value="`${productsCounts[product.id]}`">
                <a href="#" style="margin: 10px;color:red;" class="cart__btn cart-btn-plus" @click.prevent="setCount(product.id,'plus')">+</a>
              </div>
              <div class="cart_item">
                <button @click.prevent="removeProductCart(product.id)" style="color: #f6f6f6 ;background-color:gray; border-radius: 10px;padding:10px"> Удалить из корзины</button>
              </div>
            </div>
          </div>
          <div class="product_cart__wrapper" >
            <div class="cart_item" style="font-size: 24px;font-weight: bold;">Сумма <span class="cart-sum">{{sumCart}}</span> ₽</div>
          </div>
        </div>
        <div v-else>
          <div class="product_cart_wrapper" style="height: 600px;">
            <div class="cart_item" style="font-size: 24px;font-weight: bold;margin-top: 200px;margin-left: 300px;">
              Корзина пуста.Перейдите на <router-link to="/products"><span style="text-decoration: underline;color:black; ">страницу с товарами</span></router-link>.
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Конец таблицы сравнения -->
    <!-- Блок с формой -->
    <section class="forms" v-if="sumCart">
      <div class="container">
        <h2 class="site-title__two">Сделать заказ</h2>
        <hr class="line-title">
          <div class="container-form">
            <div class="forms-input__box">
              <input type="text" v-model="name" class="forms-input" placeholder="Ваше имя" required>
              <input type="tel" v-model="phone" class="forms-input input-left" placeholder="Номер телефона" required>
            </div>
            <div class="form-btn__box">
              <button class="forms-btn" @click.prevent="submitOrder">Отправить</button>
            </div>
          </div>
      </div>
    </section>
    <!-- Конец блока с формой -->
  </main>
</template>
<script>
export default {
  name: "Cart",
  mounted(){
    this.getCartProducts();
    this.setProductsCount();
  },
  data(){
    return {
      products:[],
      ids:[],
      productsCounts:[],
      productsPrices:[],
      sumCart:0,
      name:'',
      phone:'',
      successOrder:false
    }
  },
  methods:{
    submitOrder(){
      this.axios.post('/api/products/cart/order',{
        'name':this.name,
        'phone':this.phone,
        'data':this.products,
        'counts':this.productsCounts
      }).then(res=>{
        this.phone = null;
        this.name = null;
        this.sumCart = 0;
        localStorage.removeItem('cart');
        this.$parent.$parent.$data.countAllProducts = 0 ;
        console.log(res);
      })
    },
    getSumCart(){
      let cart = localStorage.getItem('cart');
      cart = JSON.parse(cart);
      let sum = 0;
      if(cart){
        cart.forEach(product=> {
          let sum_price_product = Number(this.productsCounts[product.id])*Number(this.productsPrices[product.id]);
          sum+=sum_price_product;
        });
      }
      this.sumCart = sum;
    },
    removeProductCart(id){
      let cart = localStorage.getItem('cart');
      cart = JSON.parse(cart);
      cart.forEach((product,index)=> {
        if(product.id == id){
          cart.splice(index, 1);
          this.$parent.$parent.$data.countAllProducts-=product.count;
        }
      });
      localStorage.setItem('cart',JSON.stringify(cart));
      this.getCartProducts();
      this.getSumCart();
    },
    setCount(id,el){
      let cart = localStorage.getItem('cart');
      let newProduct = [
        {
          'id':id,
          'count':1
        }
      ];

      if(!cart){
        localStorage.setItem('cart',JSON.stringify(newProduct));
        this.$parent.$parent.$data.countAllProducts=1;
      }
      else{
        cart = JSON.parse(cart);
        cart.forEach(product=>{
          if(product.id === id){
           if(el=='plus'){
             product.count = Number(product.count) + 1;
             this.$parent.$parent.$data.countAllProducts+=1;
           } else {
             if(product.count == 1){
               product.count = 1;
             }
             else {
               product.count = Number(product.count) - 1;
               this.$parent.$parent.$data.countAllProducts-=1;
             }
           }
            newProduct = null;

          }
          this.productsCounts[product.id] = product.count;
        })

        Array.prototype.push.apply(cart,newProduct);
        localStorage.setItem('cart',JSON.stringify(cart));
        this.setProductsCount()
        this.getSumCart();

      }
    },
    setProductsCount(){
      let cart = localStorage.getItem('cart');
      cart = JSON.parse(cart);
      if (cart) {
        cart.forEach( product => {
          this.productsCounts[product.id] = product.count;
        });
      }
    },
    getCartProducts(){
      this.successOrder = false;
      let data_cart = localStorage.getItem('cart');
      let ids_arr = JSON.parse(data_cart);
      let ids = [];
      if(ids_arr){
        ids_arr.forEach((product,index)=> {
          ids[index] = product.id;
        });
      }

      this.axios.post('/api/products/cart',{
          'ids':ids,
        }).then(res=>{
            this.products = res.data.data;
            this.products.forEach(product=> {
              this.productsPrices[product.id] = product.price;
           });
           this.getSumCart()
      })
    }
  }
}
</script>

