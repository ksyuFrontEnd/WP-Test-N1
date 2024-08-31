document.addEventListener('DOMContentLoaded', function() {
  const swiper = new Swiper('.bannerSwiper', {
      autoplay: {
          delay: 3000,
      },
      pagination: {
        el: '.pagination',
        type: 'custom',
        renderBullet: function (index, className) {
            console.log('Rendering bullet:', index, className);
            return `<span class="${className}">—</span>`;
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