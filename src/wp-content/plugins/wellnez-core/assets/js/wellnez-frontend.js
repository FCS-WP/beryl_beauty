; (function ($) {
    'use strict';
    $(window).on('elementor/frontend/init', function () {

        /*----------- Service Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezserviceslider.default', function ($scope) {
            let $slickcarousels = $scope.find('.service-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: $slickcarousels.data('slick-dots'),
                infinite: true,
                arrows: $slickcarousels.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: $slickcarousels.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
                ]
            });

        });
        /*----------- Gallery Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezgalleryslider.default', function ($scope) {
            let $galleryslider = $scope.find('.gallery-active');
            $galleryslider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                centerMode: true,
                autoplaySpeed: 6000,
                speed: 1000,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerPadding: '477px',
                responsive: [{
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '477px',

                    }
                }, {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '320px',
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '200px',
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '150px',
                    }
                }, {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '0px',

                    }
                }, {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '0px',
                    }
                }
                ]
            });

        });
        /*----------- Team Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezteammember.default', function ($scope) {
            let $slickcarousels = $scope.find('.team-carousel');


            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: $slickcarousels.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                autoplay: $slickcarousels.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        arrows: false,
                        slidesToShow: 4,
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                        slidesToShow: 3,
                    }
                }, {
                    breakpoint: 992,
                    arrows: false,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767,
                    arrows: false,
                    settings: {
                        slidesToShow: 1,
                    }
                }
                ]
            });

        });
        /*----------- Blog Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezblogpost.default', function ($scope) {

            let $slickcarousels = $scope.find('.blog-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: $slickcarousels.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
                ]
            });

        });
        /*----------- Hero Two Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezherotwo.default', function ($scope) {

            if ($("[data-mask-src]").length > 0) { 
                $("[data-mask-src]").each(function () {
                    var mask = $(this).attr("data-mask-src");
                    $(this).css({
                        "mask-image": "url(" + mask + ")",
                        "-webkit-mask-image": "url(" + mask + ")",
                    });
                    $(this).removeAttr("data-mask-src");
                });
            }

            let $herotwo_slider = $scope.find('.herotwo-carousel');
            $herotwo_slider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: $herotwo_slider.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
                ]
            });

        });
        /*----------- Category Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/categoryslider.default', function ($scope) {

            let $category_slider = $scope.find('.category-carousel');
            $category_slider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: $category_slider.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                slidesToShow: 5,
                slidesToScroll: 5,
                responsive: [{
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
                ]
            });

        });
        /*----------- Testimonial Area Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellneztestimonialslider.default', function ($scope) {

            // Function For Custom Arrow Btn
            $('[data-slick-next]').each(function () {
                $(this).on('click', function (e) {
                    e.preventDefault()
                    $($(this).data('slick-next')).slick('slickNext');
                })
            })

            $('[data-slick-prev]').each(function () {
                $(this).on('click', function (e) {
                    e.preventDefault()
                    $($(this).data('slick-prev')).slick('slickPrev');
                })
            })

            let $slickcarousels = $scope.find('.testimonial-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: false,
                autoplaySpeed: 6000,
                centerPadding: '0px',
                fade: true,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '0px',
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '0px',
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '0px',
                    }
                }
                ]
            });



            $("[data-bg-src]").vsBgSetup();


            let $slickcarousels2 = $scope.find('.testimonial-carousel2');
            $slickcarousels2.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: true,
                autoplay: false,
                autoplaySpeed: 6000,
                centerPadding: '0px',
                prevArrow: '<button type="button" class="slick-prev"><i class="fal fa-long-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fal fa-long-arrow-right"></i></button>',
                fade: true,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        centerPadding: '0px',
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        centerPadding: '0px',
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        centerPadding: '0px',
                    }
                }
                ]
            });


        });

        /*----------- Project  ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezprojectfilter.default', function ($scope) {

            $(".filter-active").imagesLoaded(function () {
                var $filter = ".filter-active",
                    $filterItem = ".filter-item",
                    $filterMenu = ".filter-menu-active";

                if ($($filter).length > 0) {
                    var $grid = $($filter).isotope({
                        itemSelector: $filterItem,
                        filter: "*",
                        masonry: {
                            // use outer width of grid-sizer for columnWidth
                            columnWidth: 1,
                        },
                    });

                    // filter items on button click
                    $($filterMenu).on("click", "button", function () {
                        var filterValue = $(this).attr("data-filter");
                        $grid.isotope({
                            filter: filterValue,
                        });
                    });

                    // Menu Active Class
                    $($filterMenu).on("click", "button", function (event) {
                        event.preventDefault();
                        $(this).addClass("active");
                        $(this).siblings(".active").removeClass("active");
                    });
                }
            });

        });
        /*----------- Hero Three Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezherothree.default', function ($scope) {
            let $image_slide = $scope.find('.image-carousel');
            let $conten_slide = $scope.find('.content-carousel');
            $image_slide.not('.slick-initialized').slick({
                loop: true,
                dots: false,
                infinite: true,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                centerMode: true,
                centerPadding: '475px',
                slidesToShow: 1,
                asNavFor: '#herocontent',
                focusOnSelect: true,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1600,
                    settings: {
                        centerPadding: '300px',

                    }
                }, {
                    breakpoint: 1400,
                    settings: {
                        centerPadding: '180px',
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        centerPadding: '150px',
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        centerPadding: '100px',
                    }
                }, {
                    breakpoint: 767,
                    settings: {
                        centerPadding: '0px',
                    }
                },

                ]
            });

            $conten_slide.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: false,
                autoplaySpeed: 6000,
                fade: false,
                centerMode: true,
                centerPadding: '0px',
                speed: 1000,
                slidesToShow: 3,
                asNavFor: '#heroimg',
                focusOnSelect: true,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1600,
                    settings: {
                        slidesToShow: 3,
                        centerPadding: '0px',

                    }
                }, {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 3,
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        centerPadding: '0px',
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    }
                }, {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                ]
            });

        });

        /*----------- Pricing Slider ----------*/
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezpricingtable.default', function ($scope) {
            let $slickcarousels = $scope.find('.pricing-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
                ]
            });

        });
        // my js End 




        // Service Box
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezservicebox.default', function ($scope) {

            if ($('[data-bg-src]').length > 0) {
                $('[data-bg-src]').each(function () {
                    var src = $(this).attr('data-bg-src');
                    $(this).css('background-image', 'url(' + src + ')');
                    $(this).removeAttr('data-bg-src').addClass('background-image');
                });
            };
        });



        // Project Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezprojectslider.default', function ($scope) {

            // Function For Custom Arrow Btn
            $('[data-slick-next]').each(function () {
                $(this).on('click', function (e) {
                    e.preventDefault()
                    $($(this).data('slick-next')).slick('slickNext');
                })
            })

            $('[data-slick-prev]').each(function () {
                $(this).on('click', function (e) {
                    e.preventDefault()
                    $($(this).data('slick-prev')).slick('slickPrev');
                })
            })

            let $slickcarousels = $scope.find('.vs-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: $slickcarousels.data('slick-arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: $slickcarousels.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: false,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
                ]
            });

        });


        // Faq Area
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezfaqarea.default', function ($scope) {

            if ($('[data-bg-src]').length > 0) {
                $('[data-bg-src]').each(function () {
                    var src = $(this).attr('data-bg-src');
                    $(this).css('background-image', 'url(' + src + ')');
                    $(this).removeAttr('data-bg-src').addClass('background-image');
                });
            };

        });

        // Testimonial Slider Two
        elementorFrontend.hooks.addAction('frontend/element_ready/wellneztestimonialslidertwo.default', function ($scope) {

            let $slickcarousels = $scope.find('.client-img.vs-carousel');

            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '#testi-slide2',
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
                ]
            });

            let $contentslickcarousels = $scope.find('.content.vs-carousel');

            $contentslickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '#testi-slide1',
            });

        });


        // Testimonial Slider Three
        elementorFrontend.hooks.addAction('frontend/element_ready/wellneztestimonialsliderthree.default', function ($scope) {



            let $testimonialthree = $scope.find('.testi-there-carousel');

            $testimonialthree.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '#testi-slidekk0',

                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
                ]
            });

            let $testimonialthreecontent = $scope.find('.testi-style4');
            $testimonialthreecontent.not('.slick-initialized').slick({
                dots: true,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '#testi-imgs1',
            });

        });



        // Testimonila four
        elementorFrontend.hooks.addAction('frontend/element_ready/testifour.default', function ($scope) {

            // Function For Custom Arrow Btn
            $("[data-slick-next]").slickGoNext();
            $("[data-slick-prev]").slickGoPrev();


            let $testislidefour = $scope.find('.test-slide007');
            $testislidefour.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                centerMode: true,
                centerPadding: '300px',
                fade: false,
                speed: 1000,
                slidesToShow: 2,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        centerPadding: '0px',
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        centerPadding: '0px',
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '0px',
                    }
                }
                ]
            });


        });

        // Instagram Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/wellnezinstagramslider.default', function ($scope) {
            let $slickcarousels = $scope.find('.instagram-align-style1');
            $slickcarousels.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: $slickcarousels.data('slick-autoplay'),
                autoplaySpeed: 6000,
                fade: $slickcarousels.data('fade'),
                speed: 1000,
                slidesToShow: $slickcarousels.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }
                ]
            });
        });
    });
}(jQuery));