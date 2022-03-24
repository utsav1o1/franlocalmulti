jQuery(document).ready(function ($) {
    function sliderContentHeight() {
        var options = {
            byRow: true,
            property: 'height',
            target: null,
            remove: false,
        };
        $('.testimonial .content-wrapper').matchHeight(options);
        $('.testimonial .content-wrapper h3').matchHeight(options);
        $('.testimonial .content-wrapper .content').matchHeight(options);
        $('.team__content h3').matchHeight(options);
        $('.blogs-links-container .blog-link-heading a').matchHeight(options);
        $('.blog-short-descriptions').matchHeight(options);
        $('.services__lists__item h3').matchHeight(options);
        $('.services__lists__item p').matchHeight(options);
        $('.services__lists__item .service-content').matchHeight(options);
    }
    sliderContentHeight();

    $('.testimonial__slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        infinite: true,
        arrows: false,
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right"></i></button>',
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    $('.main__banner__slide').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        infinite: true,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-chevron-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-chevron-right"></i></button>',
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
    $('.fefatured__property__slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        infinite: true,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right"></i></button>',
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    $('.team__slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        infinite: true,
        arrows: false,
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right"></i></button>',
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    $('.testimonial__slider').on('init', function (event, slick) {
        sliderContentHeight();
    });

    $('.testimonial__slider').on(
        'beforeChange',
        function (event, slick, currentSlide, nextSlide) {
            sliderContentHeight();
        }
    );

    $('.testimonial__slider').on(
        'afterChange',
        function (event, slick, currentSlide, nextSlide) {
            sliderContentHeight();
        }
    );

    $('.testimonial__slider').on('setPosition', function (event, slick) {
        sliderContentHeight();
    });

    $('.recent__rentals__slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        infinite: true,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right"></i></button>',
        speed: 1000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    $('#location').autocomplete({
        minLength: 2,
        delay: 10,
        autoFocus: true,
    });
    // agent same height
    $('.agent-text h5, .team-text h5').matchHeight();


    $('.preformater .read-more span').click(function () {
        $('.preformater').toggleClass('visible');

        if ($('.preformater .read-more span').text() == "Read more") {
            $(this).text("Read less")
        } else {
            $(this).text("Read more")
        }
    });

    $('.agent-slider').slick({
        dots: false,
        infinite: false,
        arrows: false,
        // prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>',
        // nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right"></i></button>',
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });

    // casula read more 
    $('.read-more-block #read-more').on('click', function (e) {
        $('.read-more-content').slideToggle('2000');
        $('.read-more-block').hide();
        $('.read-less-block').show()
    });

    $('.read-less-block #read-less').on('click', function (e) {
        $('.read-more-content').slideToggle('2000');
        $('.read-less-block').hide();
        $('.read-more-block').show()
    });

});
