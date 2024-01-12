const mySwiper = new Swiper('.swiper-container', {
	spaceBetween: 60,
	centeredSlides: true,
	centeredSlidesBounds: true,
	slidesPerView: 1,
	effect: 'coverflow',
	coverflowEffect: {
			rotate: 30,
			slideShadows: false,
		},
		autoplay: {
			// Пауза между прокруткой
			delay: 2000,
			// Закончить на последнем слайде
			//stopOnLastSlide: true,
			// Отключить после ручного переключения
			disableOnInteraction: false
		},
	loop: true,		
	keyboard: {
			enabled: true
			}
});