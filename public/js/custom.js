jQuery(document).ready(function ($) {

    function sliderContentHeight() {
        var options = ({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
        $('.testimonial .content-wrapper').matchHeight(options);
        $('.testimonial .content-wrapper h3').matchHeight(options);
        $('.testimonial .content-wrapper .content').matchHeight(options);
        $('.team__content h3').matchHeight(options);
        $('.blogs-links-container .blog-link-heading a').matchHeight(options);
        $('.blog-short-descriptions').matchHeight(options);
        $('.services__lists__item h3').matchHeight(options);
        $('.services__lists__item p').matchHeight(options);
    }
    sliderContentHeight();

    $('.testimonial__slider').slick({
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
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

$('.main__banner__slide').slick({
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
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.team__slider').slick({
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
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.testimonial__slider').on('init', function (event, slick) {
        sliderContentHeight();
    });

    $('.testimonial__slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        sliderContentHeight();
    });

    $('.testimonial__slider').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        sliderContentHeight();
    });

    $('.testimonial__slider').on('setPosition', function (event, slick) {
        sliderContentHeight();
    });

    $('.recent__rentals__slider').slick({
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
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

});
