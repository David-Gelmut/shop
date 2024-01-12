<template>
  <div class="wrapper">
    <header class="header">
      <div class="topmenu">
        <div class="container">
          <div class="topmenu-block">
            <ul class="topmenu-list">
              <li><a href="#">Прайс-лист</a></li>
            </ul>
            <div class="top-menu__contact">
              <div class="top-menu__adress">
                <a href="#" class="topmenu-link">Пермь</a>
              </div>
              <div class="top-menu__adress">
                <a href="#" class="topmenu-link__mail">info@gmail.com</a>
              </div>
              <div class="top-menu__phone">
                <a href="tel:700000000" class="topmenu-link__mail">+7 (000) 00-00-00</a>
              </div>
              <div class="top-menu__phone" style="margin-left: 10px">
                <router-link to="/products/cart">
                  <a href="#" class="topmenu-link__mail cart-btn">
                    Корзина (<span>{{countAllProducts}}</span>)
                  </a>
                </router-link>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-menu__bottom container">
        <div class="header-burger_two adaptive-block">
          <span class="header-burger-adaptive"></span>
        </div>
        <div class="header-menu_two">
          <nav class="mobil-menu">
            <ul class="mobil-menu__list">
              <li><a href="#">Прайс-лист</a></li>
            </ul>
            <ul class="mobil-two_list">
              <li class="mobil-box_menu">
                  <router-link to="/"><a href="#" class="link-mobil"><span class="mobil-next">Главная</span></a></router-link>
              </li>
                <li class="mobil-box_menu">
                    <router-link to="/products"><a href="#" class="link-mobil"><span class="mobil-next">Каталог</span></a></router-link>
                </li>
                <li><router-link to="/">Главная</router-link></li>
                <li><router-link to="/products">Каталог</router-link></li>

            </ul>
            <div class="mobil-address">
              <div class="top-menu__adress">
                <a href="#" class="topmenu-link">Пермь</a>
              </div>
              <div class="top-menu__adress adress-mobil">
                <a href="#" class="topmenu-link__mail">info@gmail.com</a>
              </div>
            </div>
          </nav>
        </div>
        <nav class="mobil-catalog">
          <!--ul-- class="mobil-catalog__list">
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Антикоррозионные покрытия</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Грунтовки</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Финишные покрытия</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Огнезащитные покрытия</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Термостойкие покрытия</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Специальные материалы</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Промежуточные защитные покрытия</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Покрытия для суровых условий эксплуатации</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Покрытия для внутренней защиты резервуаров</span></a></li>
            <li><a href="#" class="mobil-catalog__block"><span><img src="" alt="Термостойкие покрытия" class="icon-punkt_mobil"></span><span>Химически стойкие покрытия</span></a></li>
          </ul-->
          <div class="mobil-box_menu button-down">
            <img src="" alt="Назад" class="mobil-doun">
            <a href="#" class="mobil-doun__link">Вернуться назад</a>
          </div>
        </nav>
        <!--a-- href="index.html" class="header-logo__link">
          <img src="" alt="Shop" class="header-logo">
        </a-->
        <div class="header-menu__block">
          <ul class="header-menu__list">
              <li style="font-size: 24px;font-weight: bold;margin: 20px">
                  <router-link to="/">Главная</router-link>
              </li>
            <li style="font-size: 24px;font-weight: bold;margin: 20px">
              <router-link to="/products">Каталог</router-link>
            </li>
          </ul>
        </div>
        <div class="bottom-menu__phone">
          <a href="#" class="bottommenu-link__mail">+7 (000) 00-00-00</a>
        </div>
        <div class="top-menu__phone" style="margin-left: 10px">
          <a href="#" class="topmenu-link__mail">
            Корзина (<span>{{countAllProducts}}</span>)
          </a>
        </div>
      </div>
    </header>
    <router-view></router-view>
    <footer class="footer">
      <div class="container">
        <div class="footer-block">
          <div class="footer-colom footer-colom__direction">
            <!--img src="" alt="Остались вопросы?" class="footer-logo"-->
            <p class="footer-autor">
              © 2022. SHOP. Все права защищены.
            </p>
          </div>
        </div>
        <p class="footer-autor footer-autor__mobil">
          © 2022. SHOP. Все права защищены.
        </p>
      </div>
    </footer>
  </div>
</template>
<script>
export default {
  name:'App',
  data() {
    return {
      countAllProducts:0
    }
  },
  mounted() {
    this.getCountCartProducts();
  },
  methods:{
    getCountCartProducts(){
      let cart = localStorage.getItem('cart');
      if(!cart){
        this.countAllProducts = 0;
      } else {
        cart = JSON.parse(cart);
        cart.forEach(product=> {
          this.countAllProducts += product.count;
        });
      }
    },
  }
}
</script>
<style>
</style>
