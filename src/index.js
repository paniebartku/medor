import $ from "jquery";

import "popper.js";
import "bootstrap";
import scrollToTop from "./js/scrollToTop";

$(function() {
  var header = $(".navbar");

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
      header.addClass("scrolled");
      header.removeClass("scrolledAgain");
    } else {
      header.removeClass("scrolled");
      header.addClass("scrolledAgain");
    }
  });
});

$(function() {
  $(".block-gallery li img").click(function() {
    $(".block-gallery__photo--main").attr(
      "src",
      $(this)
        .attr("src")
        .replace()
    );
  });
});
$(function() {
  $(".active.nav-item a.dropdown-item")
    .filter(function() {
      return this.href == location.href.replace(/#.*/, "");
    })
    .addClass("active");
});

(function($) {
  $.fn.visible = function(partial) {
    var $t = $(this),
      $w = $(window),
      viewTop = $w.scrollTop(),
      viewBottom = viewTop + $w.height(),
      _top = $t.offset().top,
      _bottom = _top + $t.height(),
      compareTop = partial === true ? _bottom : _top,
      compareBottom = partial === true ? _top : _bottom;

    return compareBottom <= viewBottom && compareTop >= viewTop;
  };
})(jQuery);

$(window).scroll(function(event) {
  $(".news-col").each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("animated fadeIn dogo");
    }
  });
});

$(function() {
  $(".pop").on("click", function() {
    $(".imagepreview").attr(
      "src",
      $(this)
        .find("img")
        .attr("src")
    );
    $("#imagemodal").modal("show");
  });
});

import "./scss/style.scss";
