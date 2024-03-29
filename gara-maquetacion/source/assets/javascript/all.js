var Project = {};

Project.init = function(){
  // Header Init
  $('[data-toggle]').on('click', function(ev){
    ev.preventDefault();
    ev.stopPropagation();

    var elem = $(this);
    var selector = elem.data('toggle');
    var selectorName = selector.substring(1);
    var $target = $(selector);
    $target.toggleClass('active').toggleClass(selectorName + '--expanded');
    $('body').toggleClass(selectorName + '--expanded');
  });

  var intro = $('.intro');
  if (intro.length){
    var mySwiper = new Swiper('.intro__slider', {
      speed: 500,
      loop: true,
      autoplay: {
        delay: 7000,
        disableOnInteraction: true,
      }
    });
  }

  var dishes = $('.dishes');
  if (dishes.length){
    var mySwiper = new Swiper('.dishes__slider', {
      direction: 'vertical',
      speed: 500,
      freeMode: true,
      freeModeSticky: true,
      slidesPerView: 2,
      navigation: {
        prevEl: '.dishes__slider__nav--prev',
        nextEl: '.dishes__slider__nav--next',
        disabledClass: 'dishes__slider__nav--disabled'
      },
    });
  }

  var dish = $('.dish');
  if (dish.length){
    var mySwiper = new Swiper('.dish__slider', {
      direction: 'vertical',
      speed: 500,
      freeMode: true,
      freeModeSticky: true,
      slidesPerView: 1,
      navigation: {
        prevEl: '.dish__slider__nav--prev',
        nextEl: '.dish__slider__nav--next',
        disabledClass: 'dish__slider__nav--disabled'
      },
    });
  }

  var menus = $('.menus');
  if (menus.length){
    var mySwiper = new Swiper('.menus__slider', {
      direction: 'vertical',
      speed: 500,
      freeMode: true,
      freeModeSticky: true,
      slidesPerView: 1,
      navigation: {
        prevEl: '.menus__slider__nav--prev',
        nextEl: '.menus__slider__nav--next',
        disabledClass: 'menus__slider__nav--disabled'
      },
    });
  }

  var menu = $('.menu');
  if (menu.length){
    var mySwiper = new Swiper('.menu__details__slider', {
      direction: 'vertical',
      speed: 500,
      freeMode: true,
      freeModeSticky: true,
      slidesPerView: 2,
      navigation: {
        prevEl: '.menu__details__slider__nav--prev',
        nextEl: '.menu__details__slider__nav--next',
        disabledClass: 'menu__details__slider__nav--disabled'
      },
    });
  }

  var wines = $('.wines');
  if (wines.length){

  }

  var wineList = $('.wine-list');
  if (wineList.length){
    var mySwiper = new Swiper('.wine-list', {
      direction: 'vertical',
      speed: 500,
      freeMode: true,
      freeModeSticky: true,
      slidesPerView: 3,
      navigation: {
        prevEl: '.wine-list__nav--prev',
        nextEl: '.wine-list__nav--next',
        disabledClass: 'wine-list__nav--disabled'
      },
    });
  }

  var drinksList = $('.drink-list');
  if (drinksList.length){
    var mySwiper = new Swiper('.drink-list', {
      direction: 'vertical',
      speed: 500,
      freeMode: true,
      freeModeSticky: true,
      slidesPerView: 3,
      navigation: {
        prevEl: '.drink-list__nav--prev',
        nextEl: '.drink-list__nav--next',
        disabledClass: 'drink-list__nav--disabled'
      },
    });
  }

};

$(function(){
  Project.init();

});

$(window).on("load", function(){

});

$(window).on("resize", function(){

});

$(window).on("scroll", function(){

});
