//Меню 1 
$('.header-burger').click(function(event) {
  $('.header-burger, .header-menu').toggleClass('active');
});
// Меню 2
$('.header-burger_two').click(function(event) {
  $('.header-burger_two, .header-menu_two').toggleClass('active');
});
// Меню каталога
$('.mobil-box_menu').click(function(event) {
  $('.mobil-box_menu, .mobil-catalog').toggleClass('active');
});
// Поиск
$('.search').click(function(event) {
  $('.search-form').toggleClass('active');
});
// Табулятор сайта
$('.tab').on('click', function(e){
  e.preventDefault();
  
  $('.tab').removeClass('tab-active');
  $('.tabs-content').removeClass('tabs-content-active');

  $(this).addClass('tab-active');
  $($(this).attr('href')).addClass('tabs-content-active');
});
// Мобильный фильтр
$('#btn').click(function(){
  $('#more').toggleClass('filter');
});

