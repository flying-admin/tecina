var Project = {};

Project.init = function(){
  // Header Init
  $('body').find('[data-toggle]').on('click', function(){
    var elem = $(this);
    var selector = elem.data('toggle');
    var selectorName = selector.substring(1);
    $(selector).toggleClass(selectorName + '--expanded');
    $('body').toggleClass(selectorName + '--expanded');
  });

  var intro = $('.intro');
  if (intro.length){
    var mySwiper = new Swiper('.intro__slider', {
      speed: 500,
      loop: true,
      autoplay: {
        delay: 7000,
        disableOnInteraction: false,
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
