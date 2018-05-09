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
