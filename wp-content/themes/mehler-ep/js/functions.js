/**
 * 
 */

jQuery(document).ready(function ($) {
    $('li.search a').click(function (e) {
        e.preventDefault();
        $('.customsearch').toggle("blind");
    });

    $(".down-arrow").click(function () {
        $('html,body').animate({
                scrollTop: $("#content").offset().top - 116
            },
            'slow');
    });


    var box_row_children = $('.section-content .showboxes .box-row .box').length
    var box_width = $('.section-content .showboxes .box-row .box').width()
    var box_width_half = box_width * .5
    var last_child = $('.section-content .showboxes .box-row:nth-last-child(1)>*.box:nth-last-child(1)')
    var second_last_child = $('.section-content .showboxes .box-row:nth-last-child(1)>*.box:nth-last-child(2)')
    var n = 3

    console.log("box width is " + box_width + "px")
    console.log("half box width is " + box_width_half + "px")
    console.log("there are " + box_row_children + " box row children")


    if (box_row_children % n - 1 == 0) {
        last_child.css("margin-left", "calc(50% - " + box_width_half + "px)");
    }
    if ((box_row_children % n - 2 == 0)) {
        second_last_child.css("margin-left", "calc(50% - " + box_width + "px)");
    }


    var cate_box = $('.container .cate_box').length

    if (cate_box == 1) {
        $(".section-content>.showboxes.slider .slider-wrap").css("width", "298px")
        $(".slick-track").css("width", "298px")
        $(".cate_box").css("width", "298px!important")
    }
    if (cate_box == 2) {
        $(".section-content>.showboxes.slider .slider-wrap").css("width", "596px")
        $(".slick-track").css("width", "596px")
        $(".cate_box").css("width", "298px!important")
    }
    if (cate_box == 3) {
        $(".section-content>.showboxes.slider .slider-wrap").css("width", "894px!important")
        $(".slick-track").css("width", "894px")
        $(".cate_box").css("width", "298px!important")
    }
    if (cate_box == 4) {
        $(".section-content>.showboxes.slider .slider-wrap").css("width", "1192px")
        $(".slick-track").css("width", "1140px")
        $(".cate_box").css("width", "270px!important")
    }

$(document).ready(function(){
  // Add smooth scrolling to all links
$(function() {
    $('a[href*=#]:not([href=#])').click(function(e) {e.preventDefault(); {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 120
                }, 500);
                if (matchMedia('only screen and (max-width: 1000px)').matches) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 500);

                    return false;
                }
              }
            }
          }
    });
});
});

        //remove empty div from  page
        $('.content').each(function () {
              if ($.trim($(this).text()).length == 0) {
                  if ($(this).children().length == 0) {
                    $(this).text('');
                    $(this).remove(); 
                  }
              }
          });
        $('section.page-entry.container').each(function () {
            if ($.trim($(this).text()).length == 0) {
                if ($(this).children().length == 0) {
                    $(this).text('');
                    $(this).remove(); 
                }
            }
        });
        
        

});
