document.addEventListener('DOMContentLoaded', function() {
  const swiper = new Swiper('.bannerSwiper', {
      spaceBetween: 30,
      slidesPerView: 1,
      autoplay: {
          delay: 3000,
      },
      pagination: {
        el: ".banner-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + "</span>";
        },
      },
      navigation: {
          nextEl: '.arrow-next',
          prevEl: '.arrow-prev',
      },
  });

  let direction = 1;
  setInterval(() => {
    if (swiper.autoplay.running) {
      swiper.autoplay.stop();
      if (direction === 1) {
        swiper.slideNext();
        direction = -1;
      } else {
        swiper.slidePrev();
        direction = 1;
      }
      swiper.autoplay.start();
    }
  }, 3000);
});