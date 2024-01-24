<template>
    <hr class="catalogs-line">
    <section class="offer">

        <div class="container">
            <div class="offer-text">
                <img style="border-radius: 10px"  src="http://shopadmin/assets/img/High_resolution_wallpaper_background_ID_77700240835.jpg" alt="" class="offer-text__images">
                <p class="offer-paragraf">
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                </p>

            </div>
        </div>
    </section>
    <!-- Конец верхнего блока -->
    <!-- Содержимое страницы -->
    <main class="main">
        <!-- Блок каталога -->
        <!--section-- class="previos">
            <div class="container">
                <h2 class="address-title">Каталог</h2>
                <div class="previos-block" v-for="category in categories">
                    <a class="previos-cart" href="#">
                        <div class="previos-cart__icon icons_1"></div>
                        <h3 class="previos-cart__title">{{category.title}}</h3>
                    </a>
                </div>
            </div>
        </section-->
        <!-- Конец блока каталога -->
        <!-- Блок с формой -->
        <section class="forms">
            <div class="container">
                <h2 class="site-title__two">Остались вопросы?</h2>
                <hr class="line-title">
                <div class="container-form">
                    <div class="forms-input__box">
                        <input v-model="name" type="text" class="forms-input" placeholder="Ваше имя" required>
                        <input v-model="phone" type="text" class="forms-input input-left" placeholder="Телефон" required>
                    </div>
                    <div class="form-btn__box">
                        <button class="forms-btn" @click.prevent="sendMail">Отправить</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Конец блока с формой -->
    </main>
</template>

<script>
export default {
    name: "Main",
    mounted() {
        this.getCategoriesList();
    },
    data(){
        return {
            categories:[],
            name:'',
            phone:''
        }

    },
    methods:{
        getCategoriesList(){
            this.axios.get('/api/categories')
                .then(res=>{
                    this.categories = res.data;
                    console.log(res.data);
                })
        },
        sendMail(){
            this.axios.post('/api/feedback',{
                'name':this.name,
                'phone':this.phone,
            }).then(res=>{
                this.name = '';
                this.phone='';
            })
        }
    }
}
</script>
