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
