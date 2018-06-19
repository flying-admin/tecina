var Project = {};
Project.init = function () {
  ($("body").find("[data-toggle]").on("click", function () {
    var e = $(this),
      i = e.data("toggle"),
      n = i.substring(1);
    $(i).toggleClass(n + "--expanded"), $("body").toggleClass(n + "--expanded")
  }), $("[data-toggle]").on("click", function (e) {
    e.preventDefault(), e.stopPropagation();
    var i = $(this);
    $(i.data("toggle")).toggleClass("active")
  }), $(".intro").length) && new Swiper(".intro__slider", {
    speed: 500,
    loop: !0,
    autoplay: {
      delay: 7e3,
      disableOnInteraction: !1
    }
  });
  $(".dishes").length && new Swiper(".dishes__slider", {
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    freeModeSticky: !0,
    slidesPerView: 2,
    navigation: {
      prevEl: ".dishes__slider__nav--prev",
      nextEl: ".dishes__slider__nav--next",
      disabledClass: "dishes__slider__nav--disabled"
    }
  });
  $(".dish").length && new Swiper(".dish__slider", {
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    freeModeSticky: !0,
    slidesPerView: 1,
    navigation: {
      prevEl: ".dish__slider__nav--prev",
      nextEl: ".dish__slider__nav--next",
      disabledClass: "dish__slider__nav--disabled"
    }
  });
  $(".menus").length && new Swiper(".menus__slider", {
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    freeModeSticky: !0,
    slidesPerView: 1,
    navigation: {
      prevEl: ".menus__slider__nav--prev",
      nextEl: ".menus__slider__nav--next",
      disabledClass: "menus__slider__nav--disabled"
    }
  });
  $(".menu").length && (new Swiper(".menu__details__slider", {
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    freeModeSticky: !0,
    slidesPerView: 2,
    navigation: {
      prevEl: ".menu__details__slider__nav--prev",
      nextEl: ".menu__details__slider__nav--next",
      disabledClass: "menu__details__slider__nav--disabled"
    }
  }), $(".menu__details__wines").length && new Swiper(".menu__details__wines__slider", {
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    freeModeSticky: !0,
    slidesPerView: 3,
    navigation: {
      prevEl: ".menu__details__wines__slider__nav--prev",
      nextEl: ".menu__details__wines__slider__nav--next",
      disabledClass: "menu__details__wines__slider__nav--disabled"
    }
  }))
}, $(function () {
  Project.init()
}), $(window).on("load", function () {}), $(window).on("resize", function () {}), $(window).on("scroll", function () {});