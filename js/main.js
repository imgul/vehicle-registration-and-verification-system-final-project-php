(function ($) {
    "use Strict";
    /*---------------------------------
         Mean Menu Active
    -----------------------------------*/
    $('.header-menu-area nav').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "991"
    });
    /*---------------------------------
         Sticky Menu Active
    -----------------------------------*/
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 50) {
            $('.header-sticky').addClass("is-sticky");
        }
        else {
            $('.header-sticky').removeClass("is-sticky");
        }
    });

    /*----------------------------
        Owl Active
    ------------------------------ */
    /*-------------
        Hero Slider Active
    ------------------------------*/
    $('.hero-slider').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        loop: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplay: false,
        autoHeight: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true
            },
            768: {
                items: 1,
                nav: false,
                dots: true
            },
            991: {
                items: 1,
            }
        }
    })

    /*-------------
        Room Slider Active
    ------------------------------*/
    $('.collection__activation').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        autoplay: false,
        autoplayTimeout: 10000,
        items: 4,
        dots: true,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            1920: {
                items: 4
            },
            992: {
                items: 3
            },
            768: {
                items: 2
            },
            576: {
                items: 2
            }
        }
    });
    /*--------------------------------
        Brand Active
    ----------------------------------*/
    $('.brand-active').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        navText: ['<i class="zmdi zmdi-chevron-left"></i>', '<i class="zmdi zmdi-chevron-right"></i>'],
        responsive: {
            0: {
                items: 2
            },
            450: {
                items: 3
            },
            768: {
                items: 4
            },
            1000: {
                items: 5
            },
            1200: {
                items: 5
            }
        }
    })
    /*--------------------------
        Counter Up
    ---------------------------- */
    $('.counter').counterUp({
        delay: 70,
        time: 5000
    });
    /*=============  Gallery Mesonry Activation  ==============*/
    $('.masonry__wrap').imagesLoaded(function () {

        // filter items on button click
        $('.gallery__menu').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });
        });

        // change is-checked class on buttons
        $('.gallery__menu button').on('click', function () {
            $('.gallery__menu button').removeClass('is-checked');
            $(this).addClass('is-checked');
            var selector = $(this).attr('data-filter');
            $containerpage.isotope({
                filter: selector
            });
            return false;
        });

        // init Isotope
        var $grid = $('.masonry__wrap').isotope({
            itemSelector: '.gallery__item',
            percentPosition: true,
            transitionDuration: '0.7s',
            layoutMode: 'fitRows',
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.gallery__item',
            }
        });
    });
    /*----------------------------------
        ScrollUp Active
    -----------------------------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    /*----------------------------------
         Instafeed Active 
    ------------------------------------*/
    if ($('#Instafeed').length) {
        var feed = new Instafeed({
            get: 'user',
            userId: 7093388560,
            accessToken: '7093388560.1677ed0.8e1a27120d5a4e979b1ff122d649a273',
            target: 'Instafeed',
            resolution: 'thumbnail',
            limit: 6,
            template: '<li><a href="{{link}}" target="_new"><img src="{{image}}" /></a></li>',
        });
        feed.run();
    }
    /*--------
        Room Image Slider Active
    ----------------------------------*/
    var blogSlider = $('.room-image-gallery');
    blogSlider.slick({
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        pauseOnFocus: true,
        pauseOnHover: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScoll: 1,
        prevArrow: '<button type="button" class="slick-prev"> <i class="fa fa-angle-left"></i> </button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',

    });
    /*----------------------------------- 
        Single Product Slide Menu Active 
    --------------------------------------*/
    $('.room-image-large').each(function () {
        var $this = $(this);
        var $thumb = $this.siblings('.room-image-thumbs');
        $this.slick({
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
            centerMode: false,
            centerPadding: 0,
            asNavFor: $thumb,
        });
    });
    $('.room-image-thumbs').each(function () {
        var $this = $(this);
        var $details = $this.siblings('.room-image-large');
        $this.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
            focusOnSelect: true,
            centerMode: true,
            centerPadding: 0,
            arrows: false,
            prevArrow: '<span class="slick-prev"><i class="fa fa-angle-left"></i></span>',
            nextArrow: '<span class="slick-next"><i class="fa fa-angle-right"></i></span>',
            asNavFor: $details,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]

        });
    });

    /*----------------------------------
        Sweet Alerts
    ------------------------------------*/
    $(".logoutBtn").click(function () {
        swal({
            title: "Are you sure?",
            text: "You want to logout from your account!",
            icon: "success",
            buttons: [
                "Cancel",
                "Yes, logout!"
            ],
            dangerMode: true,
        })
            .then((willLogout) => {
                if (willLogout) {
                    window.location.href = "logout.php";
                }
            });
    });

})(jQuery);