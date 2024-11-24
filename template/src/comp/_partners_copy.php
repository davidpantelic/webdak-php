<section class="partners-section">
  <div class="swiper">

    <button class="swiper-play-stop pause-btn" aria-label="The Partners carousel is currently playing, pause the carousel"><i class="bi bi-pause-fill"></i></button>
    
    <ul class="swiper-pagination"></ul>

    <button class="swiper-nav-arrow swiper-button-prev"></button>
    <button class="swiper-nav-arrow swiper-button-next"></button>

    <ul class="swiper-wrapper">
      <?php foreach($partners_array as $img => $name) : ?>
      <li class="swiper-slide">
        <img src="<?= $img ?>" title="<?= $name ?>" alt="<?= $name ?>">
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<script src="<?php echo DOMAIN ?>/lib/swiper/swiper-bundle.min.js"></script>
<script>
$(function() {

  const swiperCarousel = new Swiper('.swiper', {
    loop: true,
    grabCursor: false,
    simulateTouch: false,
    speed: 500,
    autoHeight: true,
    centeredSlides: true,
    padding: 50,
    // slidesPerView: 5,
    // spaceBetween: 20,
    // effect: 'cube',
    // parallax: true,
    // direction: 'vertical',

    keyboard: {
      enabled: true,
      onlyInViewport: true,
    },

    autoplay: {
      delay: 1000,
      // disableOnInteraction: true,
      pauseOnMouseEnter: true,
    },
    // autoplay: false,

    pagination: {
      el: '.swiper-pagination',
      // type: 'bullets',
      // bulletElement: 'button',
      clickable: false,
      renderBullet: function (index, className) {
        return '<li><button class="' + className + '"><span class="visually-hidden">Slide ' + index + '</span></button></li>';
      },
    },
    // pagination: false,

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    // navigation: false,
    
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 3
      },
      480: {
        slidesPerView: 4
      },
      640: {
        slidesPerView: 5
      }
    }
  });

  // Custom pagination click event
  var paginationButtons = $('.swiper-pagination button');

  paginationButtons.each(function (index) {
    $(this).on('click', function () {
      // swiperCarousel.slideToLoop(index); // Manually transition to the corresponding slide
      swiperCarousel.slideToLoop(index);
    });
  });
  // Update active state on slide change
  swiperCarousel.on('slideChange', function () {
    paginationButtons.each(function (index) {
      $(this).toggleClass('active', index === swiperCarousel.activeIndex);
    });
  });
  // Custom pagination click event end

  $( ".swiper-slide" ).removeAttr( "role" );

  const stopPlayBtn = $('.swiper-play-stop');

  function stopSwiperCarousel() {
    swiperCarousel.autoplay.stop();
    stopPlayBtn.removeClass('pause-btn');
    stopPlayBtn.addClass('play-btn');
    stopPlayBtn.find('i').removeClass('bi-pause-fill');
    stopPlayBtn.find('i').addClass('bi-play-fill');
    stopPlayBtn.attr('aria-label', 'The Partners carousel is currently paused, play the carousel');
  }

  function playSwiperCarousel() {
    swiperCarousel.autoplay.start();
    stopPlayBtn.removeClass('play-btn');
    stopPlayBtn.addClass('pause-btn');
    stopPlayBtn.find('i').removeClass('bi-play-fill');
    stopPlayBtn.find('i').addClass('bi-pause-fill');
    stopPlayBtn.attr('aria-label', 'The Partners carousel is currently playing, pause the carousel');
  }
  
  stopPlayBtn.click(function() {
    if ($(this).hasClass('pause-btn')) {
      stopSwiperCarousel();
    } else if ('play-btn') {
      playSwiperCarousel();
    }
  });

  $('.swiper-pagination li, .swiper-nav-arrow').click(function() {
    stopSwiperCarousel();
  });
});
</script>