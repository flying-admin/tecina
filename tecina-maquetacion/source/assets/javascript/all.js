var Project = {};

Project.init = function(){
  // Header Init
  $('.header').find('[data-toggle]').on('click', function(){
    var elem = $(this);
    var selector = elem.data('toggle');
    $(selector).toggleClass('header--expanded');
    $('body').toggleClass('header--expanded');
  });

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
