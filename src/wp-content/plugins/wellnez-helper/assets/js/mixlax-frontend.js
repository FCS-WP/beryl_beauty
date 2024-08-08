;(function($) {
    'use strict';
    $(window).on( 'elementor/frontend/init', function() {

        // Testimonial Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxtestimonialslider.default',function($scope) {
            let $slickcarousels = $scope.find('.vs-carousel');
            $slickcarousels.not('.slick-initialized').slick({
                dots: $slickcarousels.data('dots'),
                infinite: true,
                arrows: $slickcarousels.data('arrows'),
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                fade: $slickcarousels.data('fade'),
                speed: 1000,
                slidesToShow: $slickcarousels.data('slidetoshow'),
                asNavFor: ($slickcarousels.data('asnavfor') ? $slickcarousels.data('asnavfor') : false),
                slidesToScroll: 1,
                focusOnSelect: true,
                responsive: [ {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: $slickcarousels.data('mdslidetoshow'),
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
              ]
            });

            let $slickcarouselsimg = $scope.find('.testimonial-avater-style1');
            $slickcarouselsimg.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                slidesToShow: $slickcarousels.data('slidetoshow'),
                asNavFor: $slickcarouselsimg.data('asnavfor'),
                centerMode: $slickcarouselsimg.data('centermode'),
                centerPadding: 0,
                variableWidth: $slickcarouselsimg.data('variablewidth'),
                slidesToScroll: 1,
                focusOnSelect: true,
            });

            let $slickcarouselavater = $scope.find('.testimonial-author-style1');
            $slickcarouselavater.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade:$slickcarouselavater.data('fade'),
                slidesToShow: $slickcarouselavater.data('slidetoshow'),
                asNavFor: $slickcarouselavater.data('asnavfor'),
                slidesToScroll: 1,
                focusOnSelect: true,
            });

            let $slickcarouselavatertwo = $scope.find('.testimonial-avater-style2');
            $slickcarouselavatertwo.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                slidesToShow: $slickcarouselavatertwo.data('slidetoshow'),
                asNavFor: $slickcarouselavatertwo.data('asnavfor'),
                variableWidth: $slickcarouselsimg.data('variablewidth'),
                centerMode: $slickcarouselsimg.data('centermode'),
                centerPadding: 0,
                slidesToScroll: 1,
                focusOnSelect: true,
            });

        });

        // Header
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxheader.default',function($scope) {
            $('img.svg').each(function() {
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');

                jQuery.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find('svg');

                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                    }

                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');

                    // Check if the viewport is set, else we gonna set it if we can.
                    if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
                    }
                    // Replace image with new SVG
                    $img.replaceWith($svg);

                }, 'xml');
            });
        });

        // Isotope For Projects
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxproject.default',function($scope) {

            let $isotope = $scope.find('.filter-active');

            $isotope.imagesLoaded(function () {
                if ($($isotope).length > 0) {
                    var $grid = $($isotope).isotope({
                        itemSelector: '.grid-item',
                        filter: '*',
                        masonry: {
                            // use outer width of grid-sizer for columnWidth
                            columnWidth: 100,
                        }
                    });
                };
            });
        });

        // Client Logo
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxclientlogo.default',function($scope) {
            let $client_slider = $scope.find('.vs-carousel');
            $client_slider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: $client_slider.data('slick-autoplay'),
                autoplaySpeed: 6000,
                speed: 1000,
                fade: false,
                slidesToShow: $client_slider.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                   }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
              ]
            });

        });

        // Mixlax Gallery
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxgallery.default',function($scope) {
            let $gallery_slider = $scope.find('.vs-carousel');
            $gallery_slider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: false,
                slidesToShow: $gallery_slider.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                   }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
              ]
            });

        });

        // Mixlax Pricing Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxpricingslider.default',function($scope) {
            let $pricing_slider = $scope.find('.vs-carousel');
            $pricing_slider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: false,
                slidesToShow: $pricing_slider.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                   }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
              ]
            });

        });

        // Service Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxserviceslider.default',function($scope) {
            let $service_slider = $scope.find('.vs-carousel');
            $service_slider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: false,
                slidesToShow: $service_slider.data('slide-to-show'),
                slidesToScroll: 1,
                centerMode: $service_slider.data('centermode'),
                centerPadding: $service_slider.data('centerpadding'),
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                  }
                }
              ]
            });
        });

        // Contact Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxcontactslider.default',function($scope) {
            let $contact_slider = $scope.find('.vs-carousel');
            $contact_slider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: false,
                slidesToShow: $contact_slider.data('slide-to-show'),
                slidesToScroll: 1,
                centerMode: $contact_slider.data('centermode'),
                centerPadding: 0,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },  {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                  }
                }
              ]
            });
        });

        // Feature Slider
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxfeatureslider.default',function($scope) {
            let $service_slider = $scope.find('.vs-carousel');
            $service_slider.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: false,
                slidesToShow: $service_slider.data('slide-to-show'),
                slidesToScroll: 1,
                centerMode: $service_slider.data('centermode'),
                centerPadding: $service_slider.data('centerpadding'),
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                  }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                  }
                }
              ]
            });
        });

        // Team Member Image
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxteammember.default',function($scope) {
            let $team_member_one = $scope.find('.vs-carousel');
            $team_member_one.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 1000,
                fade: false,
                slidesToShow: $team_member_one.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                  }
                }, {
                    breakpoint: 570,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                  }
                }
              ]
            });
        });

        // blog post
        elementorFrontend.hooks.addAction('frontend/element_ready/mixlaxblogpost.default',function($scope) {
            let $blog_post = $scope.find('.vs-carousel');
            // Blog Layout 1 Slider
             $blog_post.not('.slick-initialized').slick({
                dots: false,
                infinite: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 8000,
                fade: false,
                speed: 1300,
                slidesToShow: $blog_post.data('slide-to-show'),
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2
                    }
                },  {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },  {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
              ]
            });

        });



    });
}(jQuery));