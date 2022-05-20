$(document).ready(function () {
    var screenWidth = $(window).width();
    var swiper = new Swiper('.mySwiper', {
        loop: true,
        slidesPerView: 3,
        centeredSlides: true,
        freeMode: true,
        watchSlidesProgress: true,
        direction: screenWidth > 1023 ? 'vertical' : 'horizontal',
    });
    var swiper2 = new Swiper('.mySwiper2', {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-next',
            prevEl: '.swiper-prev',
        },
        thumbs: {
            swiper: swiper,
        },
    });
});
