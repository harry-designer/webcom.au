jQuery(document).ready(function($) {
  "use strict";
  //Fwzi Sticky Header Script
  $('.fwzi-header-stic').sticky ({
    topSpacing: 0,
    zIndex: 4
  });
  $('.fwzi-header-stic').on('sticky-end', function() {
    $('.sticky-wrapper').css({'height': 'auto'});
  });

  //Fwzi Menu Script
  $('a.dropdown-toggle').dropdownHover();
  $('ul.dropdown-menu li.menu-item-has-children').removeClass('dropdown');
  $('ul.dropdown-menu li.menu-item-has-children').addClass('dropdown-submenu');

  function FawziwindowWidth() {
    if (window.matchMedia('(max-width: 991px)').matches) {
      $('a.dropdown-toggle').on('click', function(e) {
        $(this).next('.dropdown-menu').slideToggle();
        e.preventDefault();
        console.log('click');
      });
    }
  }
  FawziwindowWidth();

  $('.fwzi-toggle').on('click', function () {
    $(this).toggleClass('active');
  });

  //Fwzi Stop Propagation Script
  $(document).on('click', 'ul.dropdown-menu', function (e) {
    e.stopPropagation();
  });

  //Fwzi Search Box Script
  $('html').click(function() {
    $('.search-link .fwzi-search-box').removeClass('open');
  });
  $('.search-link').click(function(e){
    e.stopPropagation();
    $('.search-link .fwzi-search-box').find('input[type="text"]').focus();
  });
  $('.search-link a').click(function() {
    $('.search-link .fwzi-search-box').toggleClass('open');
  });

  //Fwzi Set Equal Height Script
  if (screen.width >= 600) {
    $('.process-item .process-icon').matchHeight ({
      property: 'height'
    });
  }

  //Fwzi Hover Script
  $('.project-item, .plan-item, .blog-item, .service-item, .member-item, .fwzi-difference').hover (
    function() {
      $(this).addClass('fwzi-hover');
    },
    function() {
      $(this).removeClass('fwzi-hover');
    }
  );

  //Fwzi Popup Picture Script
  $('.popup-image').magnificPopup ({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    closeMarkup:'<div class="mfp-close" title="%title%"></div>',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
      }
    },
    gallery: {
      enabled: true,
      arrowMarkup:'<div title="%title%" class="mfp-arrow mfp-arrow-%dir%"></div>',
    },
  });

  //Fwzi Popup Video Script
  $('.popup-video').magnificPopup ({
    mainClass: 'mfp-fade',
    type: 'iframe',
    closeMarkup:'<div class="mfp-close" title="%title%"></div>',
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: function(url) {
            var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
            if ( !m || !m[1] ) return null;
            return m[1];
          },
          src: 'https://www.youtube.com/embed/%id%?autoplay=1'
        },
        vimeo: {
          index: 'vimeo.com/',
          id: function(url) {
            var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
            if ( !m || !m[5] ) return null;
            return m[5];
          },
          src: 'https://player.vimeo.com/video/%id%?autoplay=1'
        }
      }
    }
  });

  $('.fwzi-parallax').jarallax({
    speed: 0.7,
  })

  //Fwzi Counter Script
  $('.fwzi-counter').counterUp ({
    delay: 1,
    time: 1000
  });

  //Fwzi Slider Script
  $(window).load(function() {
    $('.fwzi-slider').each( function() {
      var $carousel = $(this);
      var $items = ($carousel.data('items') !== undefined) ? $carousel.data('items') : 5;
      var $items_tablet = ($carousel.data('items-tablet') !== undefined) ? $carousel.data('items-tablet') : 5;
      var $items_mobile_landscape = ($carousel.data('items-mobile-landscape') !== undefined) ? $carousel.data('items-mobile-landscape') : 2;
      var $items_mobile_portrait = ($carousel.data('items-mobile-portrait') !== undefined) ? $carousel.data('items-mobile-portrait') : 1;
      $carousel.owlCarousel ({
        loop : ($carousel.data('loop') !== undefined) ? $carousel.data('loop') : false,
        items : $carousel.data('items'),
        margin : ($carousel.data('margin') !== undefined) ? $carousel.data('margin') : 0,
        dots : ($carousel.data('dots') !== undefined) ? $carousel.data('dots') : false,
        nav : ($carousel.data('nav') !== undefined) ? $carousel.data('nav') : false,
        navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
        autoplay : ($carousel.data('autoplay') !== undefined) ? $carousel.data('autoplay') : false,
        autoplayTimeout : ($carousel.data('autoplay-timeout') !== undefined) ? $carousel.data('autoplay-timeout') : 5000,
        animateOut : ($carousel.data('animateout') !== undefined) ? $carousel.data('animateout') : false,
        mouseDrag : ($carousel.data('mouse-drag') !== undefined) ? $carousel.data('mouse-drag') : false,
        autoWidth : ($carousel.data('auto-width') !== undefined) ? $carousel.data('auto-width') : false,
        autoHeight : ($carousel.data('auto-height') !== undefined) ? $carousel.data('auto-height') : false,
        center : ($carousel.data('center') !== undefined) ? $carousel.data('center') : false,
        responsiveClass: true,
        dotsEachNumber: true,
        responsive : {
          0 : {
            items : $items_mobile_portrait,
          },
          480 : {
            items : $items_mobile_landscape,
          },
          768 : {
            items : $items_tablet,
          },
          960 : {
            items : $items,
          }
        }
      });
      var totLength = $('.owl-dot', $carousel).length;
      $('.total-no', $carousel).html(totLength);
      $('.current-no', $carousel).html(totLength);
      $carousel.owlCarousel();
      $('.current-no', $carousel).html(1);
      $carousel.on('changed.owl.carousel', function(event) {
        var total_items = event.page.count;
        var currentNum = event.page.index + 1;
        $('.total-no', $carousel ).html(total_items);
        $('.current-no', $carousel).html(currentNum);
      });
    });
  });

  //Fwzi Masonry Script
  $(window).load(function() {
    var $grid = $('.fwzi-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match( /ium$/ );
      }
    };
    $('.masonry-filters').on( 'click', 'a', function(e) {
      e.preventDefault();
      var filterValue = $( this ).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
    });
    $('.masonry-filters').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });
  });

  //Fwzi Add Class Script
  $('.fwzi-like a').click(function() {
    $(this).toggleClass('liked');
  });

  $('.carousel').carousel({
    pause: true,
    interval: 4000,
    effect: 'fadeIn'
  });
  $('#quote-carousel ol.carousel-indicators li:first-child').addClass('active');

  //Fwzi Back Top Script
  jQuery('.fwzi-back-top')
  jQuery(function () {
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() > 150) {
        jQuery('.fwzi-back-top').addClass('active');
      }
      else {
        jQuery('.fwzi-back-top').removeClass('active');
      }
    });
    jQuery('.fwzi-back-top a').click(function () {
      jQuery('body,html').animate ({
        scrollTop: 0
      }, 2000);
      return false;
    });
  });

  //Fwzi Loader Script
  $(window).load(function() {
    $('.fwzi-preloaderr').fadeOut(500);


  //Fwzi Swiper Slider Script
  var animEndEv = 'webkitAnimationEnd animationend';
  var swipermw = $('.swiper-container.mousewheel').length ? true : false;
  var swiperkb = $('.swiper-container.keyboard').length ? true : false;
  var swipercentered = $('.swiper-container.center').length ? true : false;
  var swiperautoplay = $('.swiper-container').data('autoplay');
  var swiperinterval = $('.swiper-container').data('interval'),
  swiperinterval = swiperinterval ? swiperinterval : 7000;
  swiperautoplay = swiperautoplay ? swiperinterval : false;

  //Fwzi Swiper Fadeslides Script
  var autoplay = 5000;
  var swiper = new Swiper('.fadeslides', {
    autoplayDisableOnInteraction: false,
    effect: 'fade',
    speed: 800,
    loop: true,
    paginationClickable: true,
    watchSlidesProgress: true,
    autoplay: autoplay,
    simulateTouch: false,
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    mousewheelControl: swipermw,
    keyboardControl: swiperkb,
    onSlideChangeStart: function(s) {
      var currentSlide = $(s.slides[s.activeIndex]);
      var elems = currentSlide.find('.animated')
      elems.each(function() {
        var $this = $(this);
        var animationType = $this.data('animation');
        $this.addClass(animationType, 100).on(animEndEv, function() {
          $this.removeClass(animationType);
        });
      });
    },
    onSlideChangeEnd: function(s) {
      var currentSlide = $(s.slides[s.activeIndex]);
    }
  });
  });

  // Accordion Active Only One At a Time.
  $('.collapse-others').each(function() {
    var $this = $(this);
    $('.collapse', $this).on('show.bs.collapse', function (e) {
      var all = $this.find('.collapse');
      var actives = $this.find('.collapsing, .collapse.in');
      all.each(function (index, element) {
        $(element).collapse('hide');
      })
      actives.each(function (index, element) {
        $(element).collapse('show');
      })
    });
  });

  // Lazy Load Image
  $(".project-item .fwzi-image img").lazyload();

  // Infinite Scroll Icon
  $(window).load(function() {
  $('.load-posts').each( function() {
    var $paging = $(this);
    var paging_type = ($paging.data('paging') !== undefined) ? $paging.data('paging') : '';
    var paging_icon = ($paging.data('icon') !== undefined) ? $paging.data('icon') : '';
    if (paging_type === 'infinite-scroll'){
      $('.fwzi-pagination .loader-inner').addClass(paging_icon);
      $('.fwzi-preloader i').hide();
    } else {
      $('.fwzi-preloader i').show();
    }
  });
  $('.load-cs').each( function() {
    var $paging = $(this);
    var paging_type = ($paging.data('paging') !== undefined) ? $paging.data('paging') : '';
    var paging_icon = ($paging.data('icon-port') !== undefined) ? $paging.data('icon-port') : '';
    if (paging_type === 'infinite-scroll'){
      $('.fwzi-pagination .loader-inner').addClass(paging_icon);
      $('.fwzi-preloader i').hide();
    } else {
      $('.fwzi-preloader i').show();
    }
  });
  (function(a){var b={"ball-pulse":3,"ball-grid-pulse":9,"ball-clip-rotate":1,"ball-clip-rotate-pulse":2,"square-spin":1,"ball-clip-rotate-multiple":2,"ball-pulse-rise":5,"ball-rotate":1,"cube-transition":2,"ball-zig-zag":2,"ball-zig-zag-deflect":2,"ball-triangle-path":3,"ball-scale":1,"line-scale":5,"line-scale-party":4,"ball-scale-multiple":3,"ball-pulse-sync":3,"ball-beat":3,"line-scale-pulse-out":5,"line-scale-pulse-out-rapid":5,"ball-scale-ripple":1,"ball-scale-ripple-multiple":3,"ball-spin-fade-loader":8,"line-spin-fade-loader":8,"triangle-skew-spin":1,pacman:5,"ball-grid-beat":9,"semi-circle-spin":1,"ball-scale-random":3},c=function(a){var b=[];for(i=1;i<=a;i++)b.push("<div></div>");return b};a.fn.loaders=function(){return this.each(function(){var d=a(this);a.each(b,function(a,b){d.hasClass(a)&&d.html(c(b))})})},a(function(){a.each(b,function(b,d){a(".loader-inner."+b).html(c(d))})})}).call(window,window.$||window.jQuery||window.Zepto);

  });

});