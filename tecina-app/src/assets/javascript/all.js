var Project = {};
Project.init = function () {
  $("[data-toggle]").on("click", function (e) {
    e.preventDefault(), e.stopPropagation();
    var i = $(this),
      n = i.data("toggle"),
      s = n.substring(1);
    $(n).toggleClass("active").toggleClass(s + "--expanded"), $("body").toggleClass(s + "--expanded")
  })
}, $(function () {
  Project.init()
}), $(window).on("load", function () {}), $(window).on("resize", function () {}), $(window).on("scroll", function () {});