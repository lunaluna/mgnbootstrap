"use strict";


/***********************/
/*
/* ページスクロール
/*
/***********************/

// ページ上部へ戻る
(function($){
  $(function(){
    $(window).scroll( function(){
      if(syncerTimeout == null){
        syncerTimeout = setTimeout(function(){

          var element = $('#page-top');
          var visible = element.is(':visible');
          var now = $(window).scrollTop();
          var under = $('body').height() - (now + $(window).height());

          if(now > 400){
            if(!visible){
              element.fadeIn('slow');
            }
          }else if(visible){
            element.fadeOut('slow');
          }
          syncerTimeout = null;
        }, 400);
      }
    });

    $('#move-page-top').click(function(){
      $('html,body').animate({scrollTop:0}, 'slow');
      });
  });
})(jQuery);


/***********************/
/*
/* swiper
/*
/***********************/

// main content slider
var swiper = new Swiper('.swiper-container', {
  loop: true,
  slidesPerView: 3,
  spaceBetween: 5,
  speed: 500,
  autoplay: {
    delay: 3500,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    992: {
      slidesPerView: 2,
    },
    576: {
      slidesPerView: 1,
    },
  },
});

// sub content slider
var swiper2 = new Swiper('.sub-swiper-container', {
  loop: true,
  slidesPerView: 3,
  spaceBetween: 5,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    992: {
      slidesPerView: 2,
    },
    576: {
      slidesPerView: 1,
    },
  },
});

// スライダー画像の遅延読み込み
(function($){
  $(window).on('load',function(){
    $('.featureSlider__image').fadeIn('500');
  });
})(jQuery);
