<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

$(document).ready(function() {
  var navbar = $('.navbar');
  var navbarLogo = $('.navbar-brand');
  var navbarToggler = $('.navbar-toggler');
  var footer = $('.footer');

  // code that needs to be runned at load and on window resize
  function onResize() {
    var navbarHeight = navbar.outerHeight();
    var footerHeight = footer.outerHeight();
    $('html').css('scroll-padding-top', navbarHeight + 'px');
    $('main').css('min-height', 'calc(100vh - ' + footerHeight + 'px)');
  }
  onResize();
  // code that needs to be runned at load and on window resize END

  // window resize detect
  $(window).resize(function() {
    setTimeout(function() {
      onResize();
    }, 500);
  });
  // window resize detect END

  // window scroll detect
  $(window).scroll(function() {
    if ($(this).scrollTop() > 0) {
      navbar.addClass('scrolled');
    } else {
      navbar.removeClass('scrolled');
    }
  });
  // window scroll detect END

  // shrink logo on burger menu open
  navbarToggler.on('click', function(event) {
    if (navbarToggler.hasClass('collapsed')) {
      navbarLogo.removeClass('logo-shrink');
    } else {
      navbarLogo.addClass('logo-shrink');
    }
  });
  // shrink logo on burger menu open END

  // scroll indicator/anchor
  $('.scroll-indicator span').on('click', function() {
    var navHeight = $('.navbar').outerHeight();
    var nextSection = $('.cover-section').next('section');
    $('html, body').animate({
      scrollTop: nextSection.offset().top - navHeight
    }, 'smooth');
  });
  // scroll indicator/anchor END

  // bootstrap5 tooltip
  $('[data-bs-toggle="tooltip"]').tooltip();

  // ScrollOut func - detect when element is in viewport
  // adding selectors and classes for animations
  var elementsAnimateOnce = <?php echo json_encode($animate_once); ?>;
  var elementsAnimateOnceSelectors = [];
  for (var key in elementsAnimateOnce) {
    if (elementsAnimateOnce.hasOwnProperty(key)) {
      var selector = key;
      var animationClass = elementsAnimateOnce[key];
      $(selector).addClass(animationClass);
      elementsAnimateOnceSelectors.push(selector);
    }
  }
  setTimeout(function() {
  }, 500);
  ScrollOut({
    threshold: 0.1,
    targets: elementsAnimateOnceSelectors,
    once: false,
  });

  var elementsAnimate = <?php echo json_encode($animate_always); ?>;
  // ScrollOut({
  //   threshold: 0.1,
  //   targets: elementsAnimate,
  //   once: false,
  // });

  $('[data-scroll]').each(function(){
    $(this).parent().css('overflow', 'hidden');
  });
  // ScrollOut func - detect when element is in viewport END
});

</script>