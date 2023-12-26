/*--
	Header Sticky
-----------------------------------*/
$(window).scroll(function () {
  var scroll = $(window).scrollTop();
  if (scroll > 0) {
    $(".header-area").addClass("active");
  } else {
    $(".header-area").removeClass("active");
  }
});

/*--
	 Responsive-menu
 -----------------------------------*/
$(".down-arrow-mob").click(function () {
  $(".dropdown-menu-item-main").slideToggle();
});
$(".down-arrow-mob2").click(function () {
  $(".dropdown-menu-item-main2").slideToggle();
});


/*--
	Header up-down
-----------------------------------*/
// var prevScrollpos = window.pageYOffset;
// window.onscroll = function () {
//   var currentScrollpos = window.pageYOffset;
//   if (prevScrollpos > currentScrollpos) {
//     document.getElementById("header").style.top = "0";
//   } else {
//     document.getElementById("header").style.top = "-200px";
//   }
//   prevScrollpos = currentScrollpos;
// };

/*--
	 Responsive-menu
-----------------------------------*/
$(document).ready(function () {
  $(".hamburger-menu").click(function () {
    $(".main-menu-title").css("left", "0");
    $("body").css("overflow", "hidden");
    $(".header-bg").addClass("active-header-block");
  });
});
$(document).ready(function () {
  $(".cross-img").click(function () {
    $(".main-menu-title").css("left", "-500px");
    $("body").css("overflow", "auto");
    $(".header-bg").removeClass("active-header-block");
  });
});

/*--
	hero-slider
-----------------------------------*/
$(".slider").owlCarousel({
  autoplay: false,
  loop: true,
  responsiveClass: true,
  animateOut: "fadeOut",
  animateIn: "fadeIn",
  autoplayTimeout: 7000,
  smartSpeed: 2000,
  nav: true,
  dots: false,
  navText: [
    '<div class="right-button"><i class="fa-solid fa-chevron-right"></i></div>',
    '<div class="left-button"><i class="fa-solid fa-chevron-right"></i></div>',
  ],
  responsive: {
    0: {
      items: 1,
      nav: false,
    },
    600: {
      items: 1,
      nav: false,
    },
    1000: {
      items: 1,
    },
  },
});

/*--
	  testimoniols js
-----------------------------------*/
function openCity(evt, cityName) {
  // Declare all variables
  var i, tab_content, tab_links;

  // Get all elements with class="tab_content" and hide them
  tab_content = document.getElementsByClassName("tab_content");
  for (i = 0; i < tab_content.length; i++) {
    tab_content[i].style.display = "none";
    $(tab_content).addClass("active");
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tab_links = document.getElementsByClassName("tab_links");
  for (i = 0; i < tab_links.length; i++) {
    tab_links[i].className = tab_links[i].className.replace("active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

/*--
	  Testimoniols-Slide
-----------------------------------*/
$(".testimoniols").slick({
  dots: false,
  infinite: true,
  autoplay: false,
  speed: 1000,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  nextArrow:
    '<div class="next-button"><i class="fa-solid fa-chevron-right"></i></div>',
  prevArrow:
    '<div class="prev-button"><i class="fa-solid fa-chevron-left"></i></div>',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 576,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 413,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 376,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
  ],
});

/*--
	  Testimoniols-Slide
-----------------------------------*/
$(".about_slider").slick({
  dots: false,
  infinite: true,
  autoplay: false,
  speed: 1000,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  nextArrow:
    '<div class="next-button next-button2"><i class="fa-solid fa-chevron-right"></i></div>',
  prevArrow:
    '<div class="prev-button prev-button2"><i class="fa-solid fa-chevron-left"></i></div>',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 576,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 413,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
    {
      breakpoint: 376,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
      },
    },
  ],
});

/*--
	  client-logo-Slide
-----------------------------------*/
$(".clientsslider").slick({
  dots: true,
  infinite: true,
  autoplay: true,
  speed: 1000,
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: false,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 413,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 376,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});

/*--
	  portfolio filter
-----------------------------------*/
(function ($) {
  "use strict";

  var $filters = $(".portfolio-filter-menu [data-filter]"),
    $boxes = $(".portfolio-container [data]");

  $filters.on("click", function (e) {
    e.preventDefault();
    var $this = $(this);

    $filters.removeClass("active");
    $this.addClass("active");

    var $filterColor = $this.attr("data-filter");

    if ($filterColor == "all") {
      $boxes
        .removeClass("is-animated")
        .fadeOut()
        .promise()
        .done(function () {
          $boxes.addClass("is-animated").fadeIn();
        });
    } else {
      $boxes
        .removeClass("is-animated")
        .fadeOut()
        .promise()
        .done(function () {
          $boxes
            .filter('[data = "' + $filterColor + '"]')
            .addClass("is-animated")
            .fadeIn();
        });
    }
  });
})(jQuery);

/*--


/*--
	  Back-to-top
-----------------------------------*/
jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() < 50) {
    jQuery("#rocketmeluncur").slideUp(500);
    var s = $("#rocketmeluncur").parent();
    $(s).css("bottom", "-80px");
  } else {
    jQuery("#rocketmeluncur").slideDown(500);
    var s = $("#rocketmeluncur").parent();
    $(s).css("bottom", "55px");
  }
});

jQuery("#rocketmeluncur").click(function () {
  jQuery("html, body").animate(
    {
      scrollTop: "0px",
      display: "none",
    },
    {
      duration: 300,
      easing: "linear",
    }
  );
  var self = this;
  $(this).parent().css("bottom", "-80px");
  this.className += " " + "launchrocket";
  setTimeout(function () {
    self.className = "showrocket";
  }, 800);
});
