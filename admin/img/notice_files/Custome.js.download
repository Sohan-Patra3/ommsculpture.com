/// <reference path="jquery-1.8.3-vsdoc.js" />
jQuery(document).ready(function () {
    function Achievement() {
        $('.news li:first').slideUp(function () {
            $(this).appendTo($('.news')).slideDown().fadeIn("slow");
        });
    }
    jQuery('.selectnav').addClass('form-control');

    setInterval(function () { Achievement() }, 6000);

    $('input').keydown(function (e) {
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if (key == 13) {
            e.preventDefault();
            var inputs = $(this).closest('form').find(':input:visible');
            inputs.eq(inputs.index(this) + 1).focus();
        }
    });


    var images = $('.Brithdayimages')
    current = 0;
    images.hide();
    Rotator();
    function Rotator() {
        $(images[current]).fadeIn('slow').delay(2000).fadeOut('slow');
        $(images[current]).queue(function () {
            current = current < images.length - 1 ? current + 1 : 0;
            Rotator();
            $(this).dequeue();
        });
    }

    // Some Slider for Pages 

    jQuery('#ddldavmenu').change(function () {
        var _value = jQuery(this).val();
        if (_value == 0) {

        }
        else {
            window.open(_value, '_blank');
        }
    });


    $('.mivSlider div:gt(0)').hide();
    setInterval(function () {
        $('.mivSlider div:first-child').fadeOut(0)
         .next('div').fadeIn(1000)
         .end().appendTo('.mivSlider');
    }, 2000);

    $('.mivSlider2 div:gt(0)').slideDown()
    setInterval(function () {
        $('.mivSlider2 div:first-child').slideDown(0)
         .next('div').slideUp(1000)
         .end().appendTo('.mivSlider2');
    }, 2000);



    var x = $('.box-features');
    if (x.length > 0) {
        x.each(function () {
            $(this).slidertron({
                viewerSelector: '.viewer',
                reelSelector: '.viewer .reel',
                slidesSelector: '.viewer .reel article',
                jumpLinksSelector: '.tabs a',
                autoFit: true,
                autoFitAspectRatio: 2.5,
                advanceDelay: 5000,
                advanceWait: 1500,
                speed: 'slow',
                captionLineSelector: '.captions .caption-line-',
                slideCaptionSelector: '.caption-',
                captionLines: 2
            });
        });
    }

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn("slow");
        } else {
            $('.scrollToTop').fadeOut("slow");
        }
    });
    //Click event to scroll to top
    $('.scrollToTop').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });
});