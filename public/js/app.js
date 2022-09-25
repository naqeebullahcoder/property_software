// // Event Slidre
// $('.news-items').slick({
//   infinite: true,
//   slidesToShow: 3,
//   slidesToScroll: 2
// });




!function(){var a=0;$.fn.scrolled=function(i,n){"function"==typeof i&&(n=i,i=200);var t="scrollTimer"+a++;this.scroll(function(){var a=$(this),o=a.data(t);o&&clearTimeout(o),o=setTimeout(function(){a.removeData(t),n.call(a[0])},i),a.data(t,o)})},$.fn.AniView=function(a){function i(a){var i=$(a).offset(),t=i.top+$(a).scrollTop(),o=(i.top+$(a).scrollTop()+$(a).height(),$(window).scrollTop()+$(window).height());return t<o-n.animateThreshold?!0:!1}var n=$.extend({animateThreshold:0,scrollPollInterval:20},a),t=this;$(t).each(function(a,i){$(i).wrap('<div class="av-container"></div>'),$(i).css("opacity",0)}),$(t).each(function(a,n){var t=$(n).parent(".av-container");$(n).is("[av-animation]")&&!$(t).hasClass("av-visible")&&i(t)&&($(n).css("opacity",1),$(t).addClass("av-visible"),$(n).addClass("animated "+$(n).attr("av-animation")))}),$(window).scrolled(n.scrollPollInterval,function(){$(t).each(function(a,n){var t=$(n).parent(".av-container");$(n).is("[av-animation]")&&!$(t).hasClass("av-visible")&&i(t)&&($(n).css("opacity",1),$(t).addClass("av-visible"),$(n).addClass("animated "+$(n).attr("av-animation")))})})}}();
// ===========================


// ==========================================
function sideMenu() {

    "use strict";

    jQuery(".mainMenu").on("click", "li.hasSubmenu > span.navArrow", function() {
        //event.preventDefault();
        if (jQuery(this).siblings("ul.subMenu").hasClass("opened")) {
            jQuery(this).siblings("ul.subMenu").slideUp(500, function() {
                jQuery(this).removeClass("opened");
            });
        } else {
            jQuery(this).siblings("ul.subMenu").slideDown(500, function() {
                jQuery(this).addClass("opened");
            });
        }

    });


    jQuery(".toggleBtn").on("click", function() {
        var menuUL = jQuery(".maindiv");
        var bodyOverlay = jQuery(".body-overlay");
        menuUL.addClass("visibleMenu");
		jQuery("body, html").addClass('blockScroll');
        bodyOverlay.toggle();
    });

    jQuery(".closeMenu").on("click", function() {
        var menuUL = jQuery(".maindiv");
        menuUL.removeClass("visibleMenu");
		jQuery("body, html").removeClass('blockScroll');
        var bodyOverlay = jQuery(".body-overlay");
        bodyOverlay.toggle();
	});
    
    jQuery(".body-overlay").on("click", function() {
        var menuUL = jQuery(".maindiv");
        menuUL.removeClass("visibleMenu");
		jQuery("body, html").removeClass('blockScroll');
        jQuery(this).toggle();
    });


}

/*--------------*/

//sticky header
var header = jQuery(".top-bar1");
var hheight = header.outerHeight();
jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();
    var device = jQuery(window).width();

    var coverUp = jQuery(".instantContact");
    if (scroll > 200) {
        header.removeClass('positioning').addClass("fixedUp");

    } else {
        header.removeClass("fixedUp").addClass('positioning');

    }
    if (scroll > 300) {
        if (device > 1199) {
            header.removeClass('clearHeader').addClass("darkHeader");
            coverUp.removeClass('noCoverUp').addClass("coverUp").css({ "margin-top": hheight + "px" });
            coverUp.css({ "margin-top": hheight + "px" });
        }

    } else {
        header.removeClass("darkHeader").addClass('clearHeader');
        coverUp.removeClass('coverUp').addClass("noCoverUp").css({ "margin-top": 0 });
        if (device > 1199) {
            coverUp.css({ "margin-top": 0 });
        }

    }
    if (scroll > 950) {
        header.removeClass('oldColor').addClass("diffColor");
    } else {
        header.removeClass("diffColor").addClass('oldColor');
    }

    var resizeFixed = function() {
        var mediasize = 1199;
        if ($(window).width() > mediasize) {
            header.removeClass("yes-mobile");
            header.addClass("not-mobile");
            coverUp.removeClass("yes-mobile");
            coverUp.addClass("not-mobile");
        }
        if ($(window).width() <= mediasize) {
            header.removeClass("not-mobile")
            header.addClass("yes-mobile");
            coverUp.removeClass("not-mobile");
            coverUp.addClass("yes-mobile").css({ "margin-top": 0 });
        }
    };
    resizeFixed();
    return $(window).on('resize', resizeFixed);

});
// =============



jQuery(document).ready(function() {


    jQuery(".mainMenu li").has("ul").addClass("hasSubmenu");
    jQuery(".mainMenu li > ul").addClass("subMenu");

    if (jQuery(".mainMenu li").hasClass("hasSubmenu")) {
        jQuery(".mainMenu li.hasSubmenu").append('<span class="navArrow fa fa-angle-down"></span>');
    }

    sideMenu();

    jQuery( window ).resize(function() {

		sideMenu();

	});

    jQuery('.homeSlider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 1,
        autoplay: false,
        autoplaySpeed: 5000
    });



    jQuery('.news-items').slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 3,
        autoplay: false,
        autoplaySpeed: 5000,
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint:768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
    });




    // ====================
    $(".moveUp").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});