window.breadcrumbNavigation = 0;

function headerScroll() {
    if ($('.js-main-nav-bar').length) {
        var currentState = undefined;
        var topMainNavBar = $('.js-main-nav-bar');
        var mainNavigation = $('.js-main-navigation');
        var breadcrumbNavigation = $('.js-breadcrumb-navigation');
        var pricingBreadcrumb = $('.js-pricing-breadcrumb');
        var topMainNavBarOffsetTop = topMainNavBar.offset().top;

        function resizeHeaderTopOffset() {
            if ($(window).width() > 991) {
                if ($(window).scrollTop() > 34) {
                    topMainNavBar.css('top', 0);
                } else {
                    topMainNavBar.css('top', 34);
                }
            } else {
                topMainNavBar.css('top', 0);
            }
        }

        window.addEventListener("resize", function () {
            resizeHeaderTopOffset();
        });
        $(window).scroll(function () {
            if ($(this).scrollTop() >= topMainNavBarOffsetTop) {
                if (currentState !== 'top') {
                    topMainNavBar.addClass('Pos(f) W(100%) Trs($easeTransition)::a Bgc($color-white)::a').removeClass('Pos(a) Op(0)::a TranslateY(-100px)::a');
                    topMainNavBar.css('top', 0);
                    if ($(window).width() > 992) {
                        if (window.breadcrumbNavigation > 0) {
                            // mainNavigation.removeClass('D(f)').addClass('D(n)');
                            // breadcrumbNavigation.removeClass('D(n)').addClass('D(f)');
                            // pricingBreadcrumb.removeClass('D(n)');
                        }
                    }
                }
                $('.js-header-top-theme-dark').removeClass('header-top-theme-dark');
                currentState = 'top';
            }
            if ($(this).scrollTop() <= topMainNavBarOffsetTop) {
                if (currentState !== 'bottom') {
                    topMainNavBar.removeClass('Pos(f) Trs($easeTransition)::a Bgc($color-white)::a').addClass('Pos(a) Op(0)::a TranslateY(-100px)::a');
                    resizeHeaderTopOffset();
                    if ($(window).width() > 992) {
                        if (window.breadcrumbNavigation > 0) {
                            // mainNavigation.addClass('D(f)').removeClass('D(n)');
                            // breadcrumbNavigation.addClass('D(n)').removeClass('D(f)');
                            // pricingBreadcrumb.addClass('D(n)');
                        }
                    }
                }
                $('.js-header-top-theme-dark').addClass('header-top-theme-dark');
                currentState = 'bottom';
            }
        });
    }
}

function headerDropdown() {
    if (isMobile()) {
        $('.js-header-dropdown').each(function () {
            $(this).on('click', function () {
                $('.js-header-dropdown').not(this).removeClass('open-dropdown Bgc($color-white) C($color-purple)!').addClass('header-top-theme-dark_C($color-white) Bgc(t)');
                $(this).removeClass('C($color-new-font-dark) Bgc(t)');
                $(this).toggleClass('open-dropdown Bgc($color-white) C($color-purple)! header-top-theme-dark_C($color-white)');
                if ($('.js-header-dropdown').hasClass('open-dropdown')) {
                    $('.js-header-menu-overlay').show();
                    $('.js-header-dropdown').find('svg:first').removeClass('Rotate(180deg)');
                    $(this).find('svg:first').addClass('Rotate(180deg)');
                    $(this).addClass('C($color-purple)! Bgc($color-white)');
                    $(this).removeClass('Bgc(t)');
                    $('body').addClass('Mah(100vh) Ov(h)');
                } else {
                    $('.js-header-menu-overlay').hide();
                    $(this).find('svg:first').removeClass('Rotate(180deg)');
                    $(this).removeClass('C($color-purple)! Bgc($color-white)');
                    $(this).addClass('Bgc(t)');
                    $('body').removeClass('Mah(100vh) Ov(h)');
                }
            });
        });
    }
}

function dropdownHover() {
    if (!isMobile()) {
        $('.js-header-dropdown-trigger').hover(function () {
            $(this).delay(200).queue(function () {
                $(this).find('.js-header-dropdown-content').stop().show(0);
                $(this).stop().addClass('open');
                $(this).dequeue();
            });
        }, function () {
            $(this).delay(200).queue(function () {
                $(this).find('.js-header-dropdown').blur();
                $(this).find('.js-header-dropdown-content').stop().hide(0);
                $(this).stop().removeClass('open');
                $(this).dequeue();
            });
        });
    }
}

function mobileMenu() {
    $('.js-toggle-mobile-menu').on('click', function () {
        var useElemIconName = this.getElementsByTagName("use")[0];
        if (useElemIconName.href.baseVal == "#icon-menu") {
            useElemIconName.href.baseVal = "#icon-close";
        } else {
            useElemIconName.href.baseVal = "#icon-menu";
        }
        $('.js-header-menu-content *').removeClass('header-top-theme-dark_C($color-white)');
        $('.js-header-menu-content').toggleClass('TranslateX(100%)');
        $('.js-header-menu-overlay').toggle();
        $('body').toggleClass('Mah(100vh) Ov(h)');
    });
    $('.js-mobile-product-button-inside').on('click', function () {
        $(this).parent('.js-dropdown-content').prev('.js-header-dropdown').toggleClass('open-dropdown');
        $('.js-header-menu-content *').removeClass('header-top-theme-dark_C($color-white)');
    });
    $('.js-header-menu-overlay, .js-breadcrumb-menu-overlay').on('click', function () {
        $('.js-header-dropdown').removeClass('open-dropdown Bgc($color-white) C($color-purple)!');
        $('.js-header-dropdown').addClass('header-top-theme-dark_C($color-white) Bgc(t)');
        $('.js-breadcrumb-dropdown').removeClass('open-dropdown');
        $('body').removeClass('Mah(100vh) Ov(h)');
        $('.js-header-menu-overlay').hide();
        $('.js-breadcrumb-menu-overlay').hide();
        $('.js-header-dropdown').find('svg:first').removeClass('Rotate(180deg)');
        $('.js-breadcrumb-dropdown').find('svg:first').removeClass('Rotate(180deg)');
        $('.js-header-menu-content').addClass('TranslateX(100%)');
    });
}

function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    }
}

window.initializeClock = function (endtime) {
    if ($('.js-timer-container').length) {
        var daysSpan = document.querySelector('.js-timer-days');
        var hoursSpan = document.querySelector('.js-timer-hours');
        var minutesSpan = document.querySelector('.js-timer-minutes');
        var secondsSpan = document.querySelector('.js-timer-seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);
            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
            if (t.total <= 0) {
                clearInterval(timeinterval);
                $('.js-timer-container').hide();
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }
};

function toggleFormLabel() {
    $('.js-form-labels label').each(function () {
        if ($(this).find('input').prop('checked')) {
            $(this).addClass('active-label');
        }
        $(this).on('click', function () {
            if ($(this).find('input').prop('checked')) {
                $(this).addClass('active-label');
            } else {
                $(this).removeClass('active-label');
            }
        });
    });
}

function atomicAccordion() {
    if ($('.js-accordion').length) {
        $('.js-accordion').each(function () {
            $(this).on('click', function () {
                if ($(this).hasClass('js-open-accordion')) {
                    $(this).removeClass('js-open-accordion');
                    $(this).removeClass($(this).data('active-class'))
                    $(this).closest('[data-active-shadow]').removeClass('Bxsh($box-shadow-black)');
                } else {
                    $(this).addClass('js-open-accordion');
                    $(this).addClass($(this).data('active-class'));
                    $(this).closest('[data-active-shadow]').addClass('Bxsh($box-shadow-black)');
                }
                $(this).find('svg').toggleClass('Rotate(270deg)');
            });
        });
    }
}

function verticalTabs() {
    if ($('.js-tabs').length) {
        $('.js-tabs .js-tabs-nav [data-tab]').each(function () {
            $(this).click(function () {
                var $this = $(this);
                var activeClass = $this.parents('.js-tabs-nav').attr('data-active-class');
                $this.parents('.js-tabs-nav').find('[data-tab]').removeClass(activeClass);
                $this.addClass(activeClass);
                var $contentBox = $this.parents('.js-tabs');
                $contentBox.find('.js-tabs-content').hide();
                $contentBox.find('.js-tabs-content#' + $this.attr('data-tab')).show();
            });
        });
    }
}

function moveUpTabsAnimated() {
    if ($('.js-moveup-tabs-animated').length) {
        $('.js-moveup-tabs-animated .js-tabs-nav [data-tab]').each(function () {
            $(this).click(function () {
                var $this = $(this);
                var activeClass = $this.parents('.js-tabs-nav').attr('data-active-class');
                if ($this.hasClass(activeClass))
                    return true;
                var prevIndex = $('.js-moveup-tabs-animated .js-tabs-nav').find("." + activeClass).parent().index();
                var currentIndex = $this.parent().index();
                $this.parents('.js-tabs-nav').find('[data-tab]').removeClass(activeClass);
                $this.addClass(activeClass);
                var $contentBox = $this.parents('.js-moveup-tabs-animated');
                $contentBox.find('.js-tabs-content').removeClass('move-up')
                setTimeout(function () {
                    $contentBox.find('.js-tabs-content').addClass('Pos(a)--sm').removeClass('Pos(r)');
                    $contentBox.find('.js-tabs-content#' + $this.attr('data-tab')).addClass('Pos(r) move-up').removeClass('Pos(a)--sm');
                }, 400)
            });
        });
    }
}

function verticalTabsType2() {
    if ($('.js-tabs-type-2').length) {
        var intervalID;
        var $btnElements = $('.js-tabs-type-2 .js-tabs-nav [data-tab]');
        var isAutoSwitch = $('.js-tabs-type-2 .js-tabs-nav').attr('data-auto-switch');
        var isLottieAnimation = $('.js-tabs-type-2 .js-tabs-nav').attr('data-animation');

        function autoSwitch() {
            var activeClass = 'active-tab-type-2-variation-2';
            var $activeBtnTab = $('.' + activeClass);
            if ($activeBtnTab.next().is('button')) {
                $activeBtnTab.next().addClass(activeClass);
                $activeBtnTab.next().find('.js-animation').addClass('animating-line');
                $activeBtnTab.removeClass(activeClass);
                $activeBtnTab.find('.js-animation').removeClass('animating-line');
                $activeBtnTab.parents('.js-tabs-nav').find('[data-tab] .js-heading-container').removeClass('Mb(10px)');
                $activeBtnTab.next().find('.js-heading-container').addClass('Mb(10px)');
                $activeBtnTab.parents().find('.js-tab-content').css({
                    "height": 0
                });
                $activeBtnTab.next().find('.js-tab-content').css({
                    "height": $activeBtnTab.next().find('.js-tab-content').attr('data-height')
                });
                var $contentBox = $activeBtnTab.parents('.js-tabs-type-2');
                $contentBox.find('.js-tabs-content').hide();
                $contentBox.find('.js-tabs-content#' + $activeBtnTab.next().attr('data-tab')).show();
                if (isLottieAnimation) {
                    var dataAnim = $contentBox.find('.js-tabs-content#' + $activeBtnTab.next().attr('data-tab')).find('[data-lottie-animation]').attr('data-lottie-animation');
                    lottie.goToAndStop(0, true, dataAnim);
                    lottie.play(dataAnim);
                }
            } else {
                $activeBtnTab.removeClass(activeClass);
                $activeBtnTab.find('.js-animation').removeClass('animating-line');
                $btnElements.first().addClass(activeClass);
                $activeBtnTab.find('.js-tab-content').css({
                    "height": 0
                });
                $btnElements.first().find('.js-tab-content').css({
                    "height": $btnElements.first().find('.js-tab-content').attr('data-height')
                });
                $btnElements.first().find('.js-animation').addClass('animating-line');
                var $contentBox = $activeBtnTab.parents('.js-tabs-type-2');
                $contentBox.find('.js-tabs-content').hide();
                $contentBox.find('.js-tabs-content#' + $btnElements.first().attr('data-tab')).show();
                if (isLottieAnimation) {
                    var dataAnim = $contentBox.find('.js-tabs-content#' + $btnElements.first().attr('data-tab')).find('[data-lottie-animation]').attr('data-lottie-animation');
                    lottie.goToAndStop(0, true, dataAnim);
                    lottie.play(dataAnim);
                }
            }
        }

        startSwitching = function () {
            intervalID = setInterval(autoSwitch, 8000);
        }
        stopSwitching = function () {
            clearInterval(intervalID);
        }
        if (isAutoSwitch) {
            var startSwitch = $('#js-start-switch');
            if (!isMobile()) {
                startSwitch.waypoint(function (direction) {
                    $btnElements.first(0).find('.js-animation').addClass('animating-line');
                    startSwitching();
                    this.destroy()
                }, {
                    offset: '300px'
                })
            }
        }
        $('.js-tabs-type-2 .js-tabs-nav [data-tab]').each(function (item) {
            var content = $(this).find('.js-tab-content');
            content.attr('data-height', content.outerHeight());
            content.css({
                "height": 0
            });
            if (item == 0) {
                $(this).find('.js-tab-content').first().css({
                    "height": $(this).find('.js-tab-content').first().attr('data-height')
                })
            }
            $(this).click(function () {
                var $this = $(this);
                if (isAutoSwitch) {
                    stopSwitching();
                    $('.js-animation').hide();
                }
                var activeClass = $this.parents('.js-tabs-nav').attr('data-active-class');
                $this.parents('.js-tabs-nav').find('[data-tab]').removeClass(activeClass);
                $this.addClass(activeClass);
                $this.parents('.js-tabs-nav').find('[data-tab] .js-heading-container').removeClass('Mb(10px)');
                $this.find('.js-heading-container').addClass('Mb(10px)');
                $('.js-tab-content').css({
                    "height": 0
                });
                $this.find('.js-tab-content').css({
                    "height": $this.find('.js-tab-content').attr('data-height')
                });
                var $contentBox = $this.parents('.js-tabs-type-2');
                $contentBox.find('.js-tabs-content').hide();
                $contentBox.find('.js-tabs-content#' + $this.attr('data-tab')).show();
                if (isLottieAnimation) {
                    var dataAnim = $contentBox.find('.js-tabs-content#' + $this.attr('data-tab')).find('[data-lottie-animation]').attr('data-lottie-animation');
                    lottie.goToAndStop(0, true, dataAnim);
                    lottie.play(dataAnim);
                }
            });
        });
    }
}

function stringToBoolean(s) {
    regex = /^\s*(true|1|on)\s*$/i;
    return regex.test(s);
}

function carousel() {
    if ($('.js-carousel-container').length) {
        var carouselContainer = $('.js-carousel-container');
        carouselContainer.each(function () {
            var $this = $(this);
            var $carouselElement = $this.find('.js-carousel');
            var dataCarousel = $carouselElement.attr('data-carousel');
            var dataAdaptiveHeight = stringToBoolean($carouselElement.attr('data-adaptive-height'));
            var dataSliderAuto = stringToBoolean($carouselElement.attr('data-slider-auto')) || false;
            var $carouselThumbsButton = $this.find('.js-thumbs a');
            var slippryCarousel = $carouselElement.slippry({
                slippryWrapper: '<div class="slippry_box thumbnails" />',
                transition: 'horizontal',
                transClass: 'slider-fade-in',
                pager: false,
                auto: dataSliderAuto,
                captions: false,
                adaptiveHeight: dataAdaptiveHeight,
                controls: false,
                onSlideBefore: function (el, index_old, index_new) {
                    if (dataCarousel == "customized-theme") {
                        $carouselThumbsButton.removeClass('Bxsh($box-shadow-blue-ring)').addClass('Op(0.7)');
                        $carouselThumbsButton.eq(index_new).removeClass('Op(0.7)').addClass('Bxsh($box-shadow-blue-ring)');
                    } else if (dataCarousel == "light-theme") {
                        $carouselThumbsButton.removeClass('Bgc($color-dark-grey)');
                        $carouselThumbsButton.eq(index_new).removeClass('Bgc(t) Op(0.7)').addClass('Bgc($color-dark-grey) Op(1)');
                    } else {
                        $carouselThumbsButton.removeClass('Bgc($color-white)!');
                        $carouselThumbsButton.eq(index_new).removeClass('Op(0.7)').addClass('Bgc($color-white)! Op(1)');
                    }
                }
            });
            $carouselThumbsButton.click(function () {
                slippryCarousel.goToSlide($(this).data('slide'));
                return false;
            });
        });
    }
}

function marquee() {
    if ($('#marquee-1').length) {
        var onHover = false;
        var speed = 0.5;
        if ($('#marquee-1').data('speed')) {
            speed = $('#marquee-1').data('speed');
        }
        if ($('#marquee-1').data('pause-on-hover')) {
            onHover = true
        }
        $('#marquee-1').grouploop({
            velocity: speed,
            forward: false,
            pauseOnHover: onHover,
            childNode: ".marquee-item",
            childWrapper: ".marquee-wrap",
        });
    }
    if ($('#marquee-2').length) {
        $('#marquee-2').grouploop({
            velocity: .5,
            forward: true,
            pauseOnHover: true,
            childNode: ".marquee-item",
            childWrapper: ".marquee-wrap",
        });
    }
    if ($('#marquee-3').length) {
        $('#marquee-3').grouploop({
            velocity: .5,
            forward: false,
            pauseOnHover: true,
            childNode: ".marquee-item",
            childWrapper: ".marquee-wrap",
        });
    }
}

function generateOptOut() {
    $('#opt_out_btn').click(function (e) {
        e.preventDefault();
        var val = $('#opt_out').val().trim();
        var $para = $('#opt_out_link');
        var $opt_out_link = $('a', $para);
        if (val === '' || val.indexOf("<") >= 0) {
            $para.addClass('D(n)');
            $('#opt_out_form .error-message').html('You need to enter a valid URL.').removeClass('D(n)');
            return;
        }
        if (val.indexOf('http') === -1) {
            val = 'http://' + val;
        }
        connector = "&";
        if (val.indexOf('?') === -1) {
            connector = "?";
        }
        $opt_out_link.text(val + connector + 'vwo_opt_out=1').attr('href', val + connector + 'vwo_opt_out=1');
        $('#opt_out_form .error-message').addClass('D(n)');
        $para.removeClass('D(n)');
    });
}

function showComparisonTable() {
    $('.js-comparison-click-here, .js-section-feature-comparison').click(function () {
        $(".js-comparison-table-show").removeClass("D(n)");
        $('.js-comparison-click-here').parents("section").removeClass("D(b)").addClass("D(n)");
        $('html, body').animate({
            "scrollTop": $(".js-comparison-table-show").offset().top
        })
    });
}

function openFilterMenuCaseStudies() {
    if ($('.js-filter-wrapper').length) {
        var $js_filter_button_trigger = $('.js-filter-case-studies_trigger');
        var $js_filter_wrapper = $('.js-filter-wrapper');
        var $js_filter_close_button = $('.js-filter-close-button');
        $js_filter_button_trigger.on('click', function () {
            if ($js_filter_wrapper.hasClass('T(0)')) {
                $js_filter_wrapper.removeClass('T(100%)');
            } else {
                $js_filter_wrapper.addClass('T(0)').removeClass('T(100%)');
            }
        });
        $js_filter_close_button.on('click', function () {
            if ($js_filter_wrapper.hasClass('T(0)')) {
                $js_filter_wrapper.removeClass('T(0)').addClass('T(100%)');
            } else {
                $js_filter_wrapper.addClass('T(0)').removeClass('T(100%)');
            }
        });
    }
}

function animateScrollFromTo() {
    if ($('[data-scroll-from]').length) {
        var $scrollFrom = $('[data-scroll-from]');
        var topMainNavBarHeight = 0;
        $scrollFrom.each(function () {
            $(this).click(function () {
                if ($('.js-main-nav-bar').length > 0) {
                    var $topMainNavBar = $('.js-main-nav-bar');
                    topMainNavBarHeight = $topMainNavBar.outerHeight();
                }
                if ($('.js-openai-header').length > 0) {
                    var $topMainNavBar = $('.js-openai-header');
                    topMainNavBarHeight = $topMainNavBar.outerHeight();
                }
                var a = $(this).attr('data-scroll-from');
                var getPositionScrollTop = $('[data-scroll-to="' + a + '"]').offset().top;
                $('html,body').animate({
                    scrollTop: getPositionScrollTop - topMainNavBarHeight
                });
                return false;
            });
        });
    }
}

function scrollToTop() {
    $('.js-scroll-to-top').each(function () {
        $(this).click(function () {
            $('html,body').animate({
                scrollTop: 0
            }, 'slow');
            return false;
        });
    });
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var scrollToTop = $('.js-scroll-to-top');
        if (scroll < 300) {
            scrollToTop.addClass('D(n)');
        } else {
            scrollToTop.removeClass('D(n)');
        }
    });
}

function lottieAnimation(selector, jsonPath) {
    var autoplay = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
    var loop = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : true;
    var completeLoop = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : false;
    var onScrollPlay = arguments.length > 5 && arguments[5] !== undefined ? arguments[5] : false;
    if ($(selector).length) {
        var animationContainer = $(selector);
        var animName = $(selector).attr('data-lottie-animation') || selector;
        var animation = bodymovin.loadAnimation({
            wrapper: document.querySelector(selector),
            animType: 'svg',
            loop: loop,
            name: animName,
            autoplay: autoplay,
            path: jsonPath
        });
        animation.onComplete = function () {
            if (completeLoop) {
                animation.goToAndPlay(61, true);
            }
        }
        $('.js-fb-see-it-in-action').click(function () {
            animationContainer.removeClass('D(n)');
            animation.play();
        });
        $('.close-animation').click(function () {
            animation.stop();
            animationContainer.addClass('D(n)');
        });
        if (onScrollPlay) {
            var selectorPath = $(selector);
            selectorPath.waypoint(function (direction) {
                animation.play();
                this.destroy();
            }, {
                offset: '50%'
            })
        }
    }
}

function disableButton() {
    if ($('.js-button-disable-attribute').length) {
        var $disableBtn = $('.js-button-disable-attribute');
        if (!isMobile()) {
            $disableBtn.attr('disabled', 'disabled');
        }
    }
}

function isMobile() {
    return $(window).width() <= 1023
}

function filterByCategory() {
    if ($('.js-items-filter').length) {
        var partnersFilter = {
            category: 'all',
            region: 'all',
            updateCategory: function (_category) {
                this.category = _category;
            },
            updateRegion: function (_region) {
                this.region = _region;
            },
            generateFilter: function () {
                var filter = null;
                if (this.category !== 'all' && this.region !== 'all') {
                    if (this.category === 'tech') {
                        filter = '[data-category=' + $self.category + ']';
                    } else {
                        filter = '[data-category=' + $self.category + ']' + '[data-region=' + $self.region + ']';
                    }
                } else if (this.category !== 'all' || this.region === 'all') {
                    filter = '[data-category=' + $self.category + ']'
                } else if (this.region !== 'all' || this.category === 'all') {
                    filter = '[data-region=' + $self.region + ']';
                }
                return filter;
            },
            applyFilter: function () {
                $self = this;
                var $partners = $('[data-category]');
                if (this.category !== 'all' || this.region !== 'all') {
                    $partners.stop().fadeOut(400, function () {
                        $partners.filter($self.generateFilter()).stop().fadeIn(400);
                    });
                } else {
                    $('[data-category]').fadeIn(400);
                }
            }
        }
        $('.js-items-filter').each(function () {
            $(this).on('click', function () {
                $(this).siblings().removeClass('Bgc($color-blue)! C($color-white)!');
                $(this).addClass('Bgc($color-blue)! C($color-white)!');
                var itemType = $(this).data('item-type');
                if (itemType === 'tech') {
                    $('#js-partner-region-filter').attr('disabled', 'true');
                } else if ($('#js-partner-region-filter:disabled').length >= 1) {
                    $('#js-partner-region-filter').removeAttr('disabled');
                }
                partnersFilter.updateCategory(itemType);
                partnersFilter.applyFilter();
            });
        });
        $('#js-partner-region-filter').on('change', function () {
            var $selectedRegion = $(this).children("option:selected");
            $selectedRegion.attr('selected', 'true').siblings().removeAttr('selected');
            partnersFilter.updateRegion($selectedRegion.val());
            partnersFilter.applyFilter();
        });
    }
}

function expandContent() {
    if ($('.js-read-more').length) {
        var readMoreButton = $('.js-read-more');
        var collapsedContent = $('.js-collapsed-content');
        var topMainNavBar = $('.js-main-nav-bar');
        var jsTranscription = $('.js-transcription-content');
        var topPadding = 100;
        var jsTranscriptionOffsetTop = jsTranscription.offset().top;
        var topMainNavBarOffsetTop = topMainNavBar.offset().top;
        readMoreButton.click(function () {
            var that = $(this);
            collapsedContent.toggleClass('Mah(200px)');
            that.parent().toggleClass('Bg($linear-gradient-transparent)');
            that.find('svg').toggleClass('Rotate(90deg)').toggleClass('Rotate(270deg)');
            if (that.find('span').text() == "Show full transcript") {
                that.find('span').text("Hide transcript");
                $('html,body').animate({
                    scrollTop: ((jsTranscriptionOffsetTop + topMainNavBarOffsetTop) - topPadding)
                });
            } else {
                $('html,body').animate({
                    scrollTop: jsTranscriptionOffsetTop - topPadding
                });
                that.find('span').text("Show full transcript")
            }
        });
    }
}

function glossarySticky() {
    if ($('.js-sticky-on-scroll').length) {
        var glossarySticky = $('.js-sticky-on-scroll');
        var glossaryStickyOffsetTop = glossarySticky.offset().top;
        var topMainNavBar = $('.js-main-nav-bar');
        var currentState = undefined;
        $(window).scroll(function () {
            if ((($(this).scrollTop()) + topMainNavBar.outerHeight()) >= glossaryStickyOffsetTop) {
                if (currentState !== 'top') {
                    glossarySticky.addClass('Pos(f) W(100%) T(73px) Z(1) Bxsh($box-shadow-navigation-bottom)');
                    $('.js-spacing-on-fix').addClass('Pt(60px)');
                }
                currentState = 'top';
            } else {
                if (currentState !== 'bottom') {
                    glossarySticky.removeClass('Pos(f) W(100%) T(73px) Z(1) Bxsh($box-shadow-navigation-bottom)');
                    $('.js-spacing-on-fix').removeClass('Pt(60px)');
                }
                currentState = 'bottom';
            }
        });
        var anchorLink = $('.js-scroll-to-content');
        anchorLink.each(function (index) {
            var listItem = this;
            listItem.addEventListener('click', function (e) {
                e.preventDefault();
                var listItemHref = $(this).attr('href').substr(1);
                var $listItemHrefContainer = $('#' + listItemHref);
                var animateTop = $listItemHrefContainer.offset().top - (($('.js-sticky-on-scroll').outerHeight()) + topMainNavBar.outerHeight());
                $('html,body').animate({
                    scrollTop: animateTop
                }, 'slow');
                window.location.href = "#" + listItemHref;
            })
        })
    }
}

function createProductNav(productName, $productNav) {
    var $productBreadcrumbNav = $(".js-breadcrumb-navigation");
    var getPageNav = function () {
        return productPageNav;
    }
    var getFirstMenu = function () {
        var $products = $productNav.parents('.js-product-dropdown-menus');
        var navName = $productNav.children("a").children('span').text();
        var navLink = $productNav.children("a").attr('href');
        var subMenu = '';
        var subMenuLi = '';
        if ($products.find("li").length > 0) {
            $products.children("li").each(function () {
                childName = $(this).find("a").html();
                childLink = $(this).find("a").attr('href');
                activeClass = (childLink == navLink) ? 'C($color-purple)! Bgc(#f5f5f7)!' : '';
                subMenuLi += "<li><a class=\"feature-item breadcrumb-hide-arrow Lh(n) Td(n) D(f) Ai(c) Py(6px) My(6px) Px(10px) Bgc(#f5f5f7):h C($color-purple):h C($color-new-font-dark) Fz(14px) ".concat(activeClass, "\" href=\"").concat(childLink, "\" >").concat(childName, "</a></li>");
            });
            subMenu = "<div class=\"trigger-dropdown:h_D(b) trigger-dropdown:f_D(b)  js-dropdown-content Miw(230px) Bdrs(4px) open-dropdown+D(b)--md  Pos(a)--md Z(2) D(n) Ovy(a) T(100%) Start(0) Bgc($color-white) Bxz(bb) Bxsh($box-shadow-navigation-bottom)\" ><ul class=\"P(10px) List(n)\">".concat(subMenuLi, "</ul></div>");
        }
        return "<li class=\"Pos(r) trigger-dropdown\"><button type=\"button\" class=\"js-breadcrumb-dropdown Pos(r) D(if) Ai(c) Cnt(noq)::b D(ib)::b W(1px)::b H(18px)::b Bgc(#5d616a)::b SkewX(-20deg)::b Mx(10px)::b C($color-new-font-dark) C($color-new-font-dark):di Cur(p) Bgc(t) Bd(n) Px(0) M(0) Py(16px) D(if) Ai(c) Fz(14px) Fw($font-weight-medium)\"><span class=\"Mend(4px)\">".concat(navName, "</span><svg width=\"8px\" height=\"5px\" class=\"trigger-dropdown:h_Rotate(180deg) Fxs(0)\"><use xlink:href=\"#icon-chevron-down\"></use></svg></button>").concat(subMenu, "</li>");
    }
    var getSecondMenuHtml = function (productName) {
        var parentProductName = $productNav.children("a").children('span').text();
        var navLink = $productNav.children("a").attr('href');
        var navName = '';
        var subMenu = '';
        var subMenuLi = '';
        if (parentProductName != productName) {
            navName = productName;
        } else {
            navName = 'Overview';
        }
        if ($productNav.find("li").length > 0) {
            $productNav.find("li").each(function () {
                childName = $(this).find("a").html()
                childLink = $(this).find("a").attr('href');
                activeClass = ($(this).find("a").text().trim() == navName) ? 'breadcrumb-active C($color-purple)! Bgc(#f5f5f7)!' : '';
                subMenuLi += "<li><a class=\"feature-item Lh(n) Td(n) D(f) Ai(fs) Py(6px) My(6px) Px(10px) Bgc(#f5f5f7):h C($color-purple):h C($color-new-font-dark) Fz(14px) ".concat(activeClass, "\" href=\"").concat(childLink, "\" >").concat(childName, "</a></li>");
            });
            subMenu = "<div class=\"trigger-dropdown:h_D(b) trigger-dropdown:f_D(b)  js-dropdown-content Miw(230px) Bdrs(4px) open-dropdown+D(b)--md  Pos(a)--md Z(2) D(n) Ovy(a) T(100%) Start(0) Bgc($color-white) Bxz(bb) Bxsh($box-shadow-navigation-bottom)\" ><ul class=\"P(10px) List(n)\"><li><a class=\"Td(n) D(f) Ai(fs) Py(6px) My(6px) Pstart(36px) Pend(20px) Bgc(#f5f5f7):h C($color-purple):h C($color-new-font-dark) Fz(14px)\" href=\"".concat(navLink, "\">Overview</a></li>").concat(subMenuLi, "</ul></div>");
        }
        return "<li class=\"Pos(r) trigger-dropdown\"><button type=\"button\" class=\"js-breadcrumb-dropdown Pos(r) D(if) Ai(c) Cnt(noq)::b D(ib)::b W(1px)::b H(18px)::b Bgc(#5d616a)::b SkewX(-20deg)::b Mx(10px)::b C($color-new-font-dark) C($color-new-font-dark):di Cur(p) Bgc(t) Bd(n) Px(0) M(0) Py(16px) D(if) Ai(c) Fz(14px) Fw($font-weight-medium)\"><span class=\"Mend(4px)\">".concat(navName, "</span><svg width=\"8px\" height=\"5px\" class=\"trigger-dropdown:h_Rotate(180deg) Fxs(0)\"><use xlink:href=\"#icon-chevron-down\"></use></svg></button>").concat(subMenu, "</li>");
    }
    var getThirdMenuHtml = function (productName) {
        var menuName = productName;
        return "<li class=\"D(if) Ai(c) Cnt(noq)::b D(ib)::b W(1px)::b H(18px)::b Bgc(#5d616a)::b SkewX(-20deg)::b Mx(10px)::b C($color-grey-light-1) Px(0) M(0) Py(16px) D(if) Ai(c) Fz(14px) Fw($font-weight-medium)\">".concat(menuName, "</li>");
    }
    $productBreadcrumbNav.append(getFirstMenu());
    $productBreadcrumbNav.append(getSecondMenuHtml(productName));

    function breadcrumb_dropdown() {
        $('.js-breadcrumb-menu-overlay').css('top', $('.js-breadcrumb').height() + 20);
        $('body').find('.js-breadcrumb-dropdown').each(function () {
            $(this).on('click', function () {
                $('body').find('.js-breadcrumb-dropdown').not(this).removeClass('open-dropdown');
                $(this).toggleClass('open-dropdown');
                if ($('.js-breadcrumb-dropdown').hasClass('open-dropdown')) {
                    $('.js-breadcrumb-menu-overlay').show();
                    $('.js-breadcrumb-dropdown').find('svg:first').removeClass('Rotate(180deg)');
                    $(this).find('svg:first').addClass('Rotate(180deg)');
                    $('body').addClass('Mah(100vh) Ov(h)');
                } else {
                    $('.js-breadcrumb-menu-overlay').hide();
                    $(this).find('svg:first').removeClass('Rotate(180deg)');
                    $(this).removeClass('C($color-purple)! Bgc($color-white)');
                    $(this).addClass('Bgc(t)');
                    $('body').removeClass('Mah(100vh) Ov(h)');
                }
            });
        });
    }

    breadcrumb_dropdown();
    window.breadcrumbNavigation = $('body').find('.js-breadcrumb-navigation').children().length;
}

function getBreadCrumb() {
    if ($('.js-product-dropdown-menus').length) {
        var $productItem = $(".js-product-dropdown-menus  li  a[href='" + window.location.href + "']");
        if ($productItem !== undefined && $productItem.length > 0) {
            var $productNav = null;
            var productName = '';
            if ($productItem.parents("ul").eq(0).hasClass('js-product-dropdown-menus')) {
                $productNav = $productItem.parent();
                productName = $productItem.text().trim();
            } else {
                $productNav = $productItem.parents("ul").eq(0).parent();
                productName = $productItem.text().trim();
            }
            createProductNav(productName, $productNav);
        }
    }
}

function productDemoHeaderScroll() {
    if ($('.js-pd-nav-bar').length) {
        var $topPdNavBar = $('.js-pd-nav-bar');
        var topPdNavBarOffsetTop = $topPdNavBar.offset().top;
        $(window).scroll(function () {
            var scrollDistance = $(window).scrollTop();
            if (scrollDistance >= topPdNavBarOffsetTop) {
                $topPdNavBar.addClass('Pos(f)').removeClass('Pos(a) Mt(40px)');
                $topPdNavBar.removeClass('TranslateY(-200px)::b').addClass('TranslateY(0)::b');
                $('.js-header-event-logo-white').removeClass('D(b)').addClass('D(n)');
                $('.js-header-event-logo-color').removeClass('D(n)').addClass('D(b)');
            } else {
                $topPdNavBar.addClass('Pos(a) Mt(40px)').removeClass('Pos(f)');
                $topPdNavBar.removeClass('TranslateY(0)::b').addClass('TranslateY(-200px)::b');
                $('.js-header-event-logo-white').removeClass('D(n)').addClass('D(b)');
                $('.js-header-event-logo-color').removeClass('D(b)').addClass('D(n)');
            }
        })
    }
}

function usingMouse() {
    document.body.addEventListener('mousedown', function () {
        document.body.classList.add('using-mouse');
    });
    document.body.addEventListener('keydown', function () {
        document.body.classList.remove('using-mouse');
    });
}

function nobleStudioFormScroll() {
    if ($('.js-guide-form-transition').length > 0) {
        if (!isMobile()) {
            var currentState = undefined;
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                var guideFormContainer = $('.js-guide-form-transition');
                if (currentState !== 'top') {
                    if (scroll > 300) {
                        guideFormContainer.addClass('TranslateX(100%)');
                        currentState = "top";
                    }
                }
                if (currentState !== 'bottom') {
                    if (scroll <= 300) {
                        guideFormContainer.removeClass('TranslateX(100%)');
                        currentState = "bottom";
                    }
                }
            });
        }
    }
}

function isIE11() {
    return navigator.userAgent.toUpperCase().indexOf("TRIDENT/") != -1 || navigator.userAgent.toUpperCase().indexOf("MSIE") != -1;
}

function hideInIE11() {
    if (isIE11()) {
        $('.js-not-ie11').hide();
    }
}

function toggleButtonMOC() {
    if ($('[data-toggle-moc]').length) {
        var toggleButton = $('[data-toggle-moc]');
        toggleButton.on('click', function () {
            var $that = $(this);
            $that.addClass('Fz($font-size-16) Bdbc($color-blue-dark) Fw($font-weight-medium)').removeClass('Fz($font-size-14) Bdbc(t)');
            $that.siblings().removeClass('Fz($font-size-16) Bdbc($color-blue-dark) Fw($font-weight-medium)').addClass('Fz($font-size-14) Bdbc(t)');
            $("#" + $that.data('toggle-moc')).removeClass("D(n)").addClass('D(b)');
            $("#" + $that.siblings().data('toggle-moc')).addClass("D(n)").removeClass('D(b)');
        });
    }
}

function openAIHeaderScroll() {
    if ($('.js-openai-header').length) {
        var currentState = undefined;
        var topMainNavBar = $('.js-openai-header');
        var $topNavbarLogos = $('.js-header-logos img');
        var topMainNavBarOffsetTop = topMainNavBar.offset().top;
        $(window).scroll(function () {
            if ($(this).scrollTop() >= topMainNavBarOffsetTop) {
                if (currentState !== 'top') {
                    topMainNavBar.addClass('Pos(f) W(100%) Bgc(#060026)::a').removeClass('Pos(a) Op(0)::a');
                    topMainNavBar.css('top', 0);
                    if (!isMobile()) {
                        $topNavbarLogos.css('height', 34);
                    }
                }
                currentState = 'top';
            }
            if ($(this).scrollTop() <= topMainNavBarOffsetTop) {
                if (currentState !== 'bottom') {
                    topMainNavBar.removeClass('Pos(f) Bgc(#060026)::a').addClass('Pos(a) Op(0)::a');
                    topMainNavBar.css('top', 34);
                    if (!isMobile()) {
                        $topNavbarLogos.css('height', '');
                    }
                }
                currentState = 'bottom';
            }
        });
    }
}

function triggerRow() {
    if ($('.js-trigger-row').length) {
        $('.js-trigger-row').each(function () {
            $(this).on('click', function () {
                $(this).parent().find('.js-trigger-row-btn').find('svg').toggleClass('Rotate(-90deg)');
                $(this).parent().find('.js-trigger-row-section').toggleClass('D(n)');
            });
        });
    }
}

function disableWistiaTracking() {
    window._wq = window._wq || [];
    window._wq.push(function (W) {
        W.consent(false);
    });
}

function vwoScrollSpy() {
    if ($('.js-scrollspy-navbar').length) {
        var $header = $('.js-openai-header');
        var spy = new Gumshoe('.js-scrollspy-navbar a', {
            offset: function () {
                return $header.outerHeight() + 5;
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', function () {
    headerScroll();
    dropdownHover();
    headerDropdown();
    triggerRow();
    mobileMenu();
    vwoScrollSpy();
    toggleFormLabel();
    verticalTabs();
    moveUpTabsAnimated();
    verticalTabsType2();
    disableButton();
    expandContent();
    openFilterMenuCaseStudies();
    atomicAccordion();
    carousel();
    marquee();
    scrollToTop();
    glossarySticky();
    filterByCategory();
    hideInIE11();
    generateOptOut();
    showComparisonTable();
    usingMouse();
    getBreadCrumb();
    nobleStudioFormScroll();
    animateScrollFromTo();
    productDemoHeaderScroll();
    toggleButtonMOC();
    disableWistiaTracking();
    openAIHeaderScroll();
});

(function ($, window) {

    var $win = $(window);
    var defaults = {
        gap: 0,
        horizontal: false,
        isFixed: $.noop
    };

    var supportSticky = function (elem) {
        var prefixes = ['', '-webkit-', '-moz-', '-ms-', '-o-'], prefix;
        while (prefix = prefixes.pop()) {
            elem.style.cssText = 'position:' + prefix + 'sticky';
            if (elem.style.position !== '') return true;
        }
        return false;
    };

    $.fn.fixer = function (options) {
        options = $.extend({}, defaults, options);
        var hori = options.horizontal,
            cssPos = hori ? 'left' : 'top';

        return this.each(function () {
            var style = this.style,
                $this = $(this),
                $parent = $this.parent();

            if (supportSticky(this)) {
                style[cssPos] = options.gap + 'px';
                return;
            }

            $win.on('scroll', function () {
                var scrollPos = $win[hori ? 'scrollLeft' : 'scrollTop'](),
                    elemSize = $this[hori ? 'outerWidth' : 'outerHeight'](),
                    parentPos = $parent.offset()[cssPos],
                    parentSize = $parent[hori ? 'outerWidth' : 'outerHeight']();

                if (scrollPos >= parentPos - options.gap && (parentSize + parentPos - options.gap) >= (scrollPos + elemSize)) {
                    style.position = 'fixed';
                    style[cssPos] = options.gap + 'px';
                    options.isFixed();
                } else if (scrollPos < parentPos) {
                    style.position = 'absolute';
                    style[cssPos] = 0;
                } else {
                    style.position = 'absolute';
                    style[cssPos] = parentSize - elemSize + 'px';
                }
            }).resize();
        });
    };

}(jQuery, this));
$('.faq-accordion-menu').fixer({
    gap: 130
});
$(document).ready(function () {
    if (jQuery('#masonry, .masonry').length) {
        var self = $("#masonry, .masonry");
        if (jQuery('.card-container').length) {
            self.imagesLoaded(function () {
                self.masonry({
                    gutterWidth: 15,
                    isAnimated: true,
                    itemSelector: ".card-container"
                });
            });
        }
    }
    if (jQuery('.filters').length) {
        jQuery(".filters").on('click', 'li', function (e) {
            e.preventDefault();
            var btn = $(this);
            var filter = $(this).attr("data-filter");
            if ($(this).data('filter') === ''){
				$('.filters li').each(function () {
					$(this).removeClass('active')
				})
				btn.addClass('active')
			}
            self.masonryFilter({
                filter: function () {
                    if (!filter) return true;
                    //return $(this).attr("data-filter") == filter;
                    $('.filters li').each(function () {
                        $(this).removeClass('active')
                    })
                    btn.addClass('active')
                    return $(this).hasClass(filter);
                }
            });
        });
    }

    $('.read-content').click(function (e) {
        if (typeof $.cookie('WDID') === 'undefined') {
            e.preventDefault();
            console.log('false 1')
            var target_url = $(this).attr('href')
            var page = $('title').text();
            var content = $(this).find('h4').text();
            $('#read-content').modal('show');
            $('#read-content-form input[name=target_url]').val(target_url)
            $('#read-content-form input[name=page]').val(page);
            $('#read-content-form input[name=content_title]').val(content);
        } else {
            console.log('true 2')
            return true;
        }
    })

    $('.site-slider').owlCarousel({
        loop: true,
        auto: true,
        dots: true,
        mouseDrag: true,
        // autoplay: true,
        items: 1,
        video:true,
        nav: false,
        onTranslated: function () {
            var $slideHeading = $('.site-slider .owl-item.active .slider-text h3');
            var $slidePara = $('.site-slider .owl-item.active .slider-text p');

            $slideHeading.addClass('animate-in-fast').on('animationend', function () {
                $slideHeading.removeClass('animate-in-fast').addClass('opacFull');
            });

            $slidePara.addClass('animate-in-slow').on('animationend', function () {
                $slidePara.removeClass('animate-in-slow').addClass('opacFull');
            });
        },
        onChange: function () {
            var $slideHeading = $('.site-slider .owl-item.active .slider-text h3');
            var $slidePara = $('.site-slider .owl-item.active .slider-text p');

            $slideHeading.removeClass('opacFull');
            $slidePara.removeClass('opacFull');

        }
    });
    $('a[href="#applyjob"]').click(function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 90
            }, 500, function(){
                // window.location.hash = hash;
            });
        }
    })

	load_data();

	function load_data(query,job_location)
	{
		$.ajax({
			url:"console/fetch",
			method:"POST",
			data:{query:query,job_location:job_location},
			success:function(data){
				$('.jobs-listing').html(data);
			}
		})
	}

	$('input[name=keyword]').keyup(function(){
		var search = $(this).val();
		var job_location = $('select[name=job_location]').val();
		if(search != '')
		{
			load_data(search,job_location);
		}
		else
		{
			load_data();
		}
	});
	$('select[name=job_location]').change(function(){
		var search = $('input[name=keyword]').val();
		var job_location = $(this).val();
		if(job_location != '')
		{
			load_data(search,job_location);
		}
		else
		{
			load_data();
		}
	});

	function load_faq(query)
	{
		$.ajax({
			url:"console/faq_data",
			method:"POST",
			data:{query:query},
			success:function(data){
				$('.faq-list').html(data);
				$('.faq-accordion').on('show.bs.collapse', function () {
					// store the id of the collapsible element
					//....
				})
			}
		})
	}
	$('input[name=faq_search]').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_faq(search);
		}
		else
		{
			load_faq();
		}
	});

	if ($('#faqs-category-list').length > 0){
		if (window.location.hash) {
			var hash = window.location.hash;

			if ($(hash).length) {
				$('html, body').animate({
					scrollTop: $(hash).offset().top - 100
				}, 900, 'swing');
			}
		}
	}
});

$(window).on('load', function () {
    var $slideHeading = $('.site-slider .owl-item.active .slider-text h3');
    var $slidePara = $('.site-slider .owl-item.active .slider-text p');

    $slideHeading.addClass('animate-in-fast').on('animationend', function () {
        $slideHeading.removeClass('animate-in-fast').addClass('opacFull');
    });

    $slidePara.addClass('animate-in-slow').on('animationend', function () {
        $slidePara.removeClass('animate-in-slow').addClass('opacFull');
    });
});
$(document).ready(function () {
	$('.clients-home').owlCarousel({
		loop: true,
		dots: false,
		autoplay: true,
		nav: false,
		// center: true,
		navigation: false,
		navRewind: false,
		margin: 10,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 3,
				nav: false
			},
			1000: {
				items: 6,
				nav: false,
				// loop: true
			}
		}
	})
	$('.clients').owlCarousel({
		loop: false,
		dots: false,
		autoplay: true,
		nav: false,
		// center: true,
		navigation: false,
		navRewind: false,
		margin: 10,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 3,
				nav: false
			},
			1000: {
				items: 6,
				nav: false,
				// loop: true
			}
		}
	})
	$('.clients-2').owlCarousel({
		// loop: true,
		dots: false,
		autoplay: true,
		nav: false,
		center: true,
		navigation: false,
		navRewind: false,
		margin: 10,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 3,
				nav: false
			},
			1000: {
				items: 6,
				nav: false,
				// loop: true
			}
		}
	})
	$('.dms').owlCarousel({
		loop: true,
		dots: true,
		autoplay: true,
		nav: false,
		navigation: false,
		navRewind: false,
		margin: 10,
		autoHeight:true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 1,
				nav: false
			},
			1000: {
				items: 1,
				nav: false,
				loop: true
			}
		}
	})
	$('.home_banner').owlCarousel({
		loop: true,
		dots: false,
		autoplay: true,
		nav: false,
		navigation: false,
		navRewind: false,
		margin: 10,
		autoHeight:true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 1,
				nav: false
			},
			1000: {
				items: 1,
				nav: false,
				loop: true
			}
		}
	})
	var $owl = $('.owl-carousel');

	$owl.children().each(function (index) {
		$(this).attr('data-position', index);
	});

	$owl.owlCarousel({
		center: true,
		loop: true,
		items: 3,
		autoplay: true,
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			600: {
				items: 2,
				nav: false
			},
			1000: {
				items: 3,
				nav: false,
				loop: true
			}
		}
	});

	$(document).on('click', '.owl-item>div', function () {
		var $speed = 300;
		$owl.trigger('to.owl.carousel', [$(this).data('position'), $speed]);
	});
	var data = $.getJSON( "assets/js/cities.JSON", function() {})

	$('.city').keyup(function(){
		var inputelement = $(this);
		var outputsection = $(this).data('id')
		var searchField = $(this).val();
		if(searchField === '')  {
			$(outputsection).html('');
			return;
		}
		var regex = new RegExp(searchField, "i");
		var output = '<div class="city-list">';
		var count = 1;
		$.each(data.responseJSON, function(key, val){
			if ((val.name.search(regex) != -1) || (val.state.search(regex) != -1)) {
				output += '<h6 class="data-value">' + val.name + '</h6>';
				output += '<p>' + val.state + '</p>'
				if(count%1 == 0){
					output += '</div><div class="city-list">'
				}
				count++;
			}
		});
		output += '</div>';
		$(outputsection).html(output);
		$('.city-list').click(function () {
			var selectvalue = $(this).find('.data-value').html()
			$(inputelement).val(selectvalue);
			$(outputsection).html('')
		})
	});
	var requestdemo = document.getElementById('request-demo')
	requestdemo.addEventListener('show.bs.modal', function (event) {
		var button = event.relatedTarget
		var recipient = button.getAttribute('data-bs-whatever')
		var modalTitle = requestdemo.querySelector('.modal-title-1')
		var modalBodyInput = requestdemo.querySelector('#read-content-form input[name=request-type]')
		modalTitle.textContent = recipient
		modalBodyInput.value = recipient
	})
	if ($('#contact-us-popup').length){
		var contact_us_popup = document.getElementById('contact-us-popup')
		contact_us_popup.addEventListener('show.bs.modal', function (event) {
			var button = event.relatedTarget
			var recipient = button.getAttribute('data-bs-whatever')
			var modalTitle = contact_us_popup.querySelector('.modal-title-1')
			if (recipient != undefined){
				var dropdown = $('#help')
				$("#help option[value='"+recipient+"']").remove();
				dropdown.append('<option value="'+recipient+'" selected>'+recipient+'</option>');
			}
		})
	}

})
/*
* DD ScrollSpy Menu Script (c) Dynamic Drive (www.dynamicdrive.com)
* Last updated: Aug 1st, 14'
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
*/

// Aug 1st, 14': Updated to v1.2, which supports showing a progress bar inside each menu item (except in iOS devices). Other minor improvements.

if (!Array.prototype.filter){
	Array.prototype.filter = function(fun /*, thisp */){
		"use strict";

		if (this == null)
			throw new TypeError();

		var t = Object(this);
		var len = t.length >>> 0;
		if (typeof fun != "function")
			throw new TypeError();

		var res = [];
		var thisp = arguments[1];
		for (var i = 0; i < len; i++){
			if (i in t){
				var val = t[i]; // in case fun mutates this
				if (fun.call(thisp, val, i, t))
					res.push(val);
			}
		}

		return res;
	};
}

(function($){

	var defaults = {
		spytarget: window,
		scrolltopoffset: 0,
		scrollbehavior: 'smooth',
		scrollduration: 500,
		highlightclass: 'selected',
		enableprogress: '',
		mincontentheight: 30
	}

	var isiOS = /iPhone|iPad|iPod/i.test(navigator.userAgent) // detect iOS devices

	function inrange(el, range, field){ // check if "playing field" is inside range
		var rangespan = range[1]-range[0], fieldspan = field[1]-field[0]
		if ( (range[0]-field[0]) >= 0 && (range[0]-field[0]) < fieldspan ){ // if top of range is on field
			return true
		}
		else{
			if ( (range[0]-field[0]) <= 0 && (range[0]+rangespan) > field[0] ){ // if part of range overlaps field
				return true
			}
		}
		return false
	}

	$.fn.ddscrollSpy = function(options){
		var $window = $(window)
		var $body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')


		return this.each(function(){
			var o = $.extend({}, defaults, options)
			o.enableprogress = (isiOS)? '' : o.enableprogress // disable enableprogress in iOS
			var targets = [], curtarget = ''
			var cantscrollpastindex = -1 // index of target content that can't be scrolled past completely when scrollbar is at the end of the doc
			var $spytarget = $( o.spytarget ).eq(0)
			var spyheight = $spytarget.outerHeight()
			var spyscrollheight = (o.spytarget == window)? $body.get(0).scrollHeight : $spytarget.get(0).scrollHeight
			var $menu = $(this)
			var totaltargetsheight = 0 // total height of target contents
			function spyonmenuitems($menu){
				var $menuitems = $menu.find('a[href^="#"]')
				targets = []
				curtarget = ''
				totaltargetsheight = 0
				$menuitems.each(function(i){
					var $item = $(this)
					var $target = $( $item.attr('href') )
					var target = $target.get(0)
					var $progress = null // progress DIV that gets dynamically added inside menu A element if o.enableprogress enabled
					if ($target.length == 0) // if no matching links found
						return true
					$item
						.off('click.goto')
						.on('click.goto', function(e){
							if ( o.spytarget == window && (o.scrollbehavior == 'jump' || !history.pushState))
								window.location.hash = $item.attr('href')
							if (o.scrollbehavior == 'smooth' || o.scrolltopoffset !=0){
								var $scrollparent = (o.spytarget == window)? $body : $spytarget
								var addoffset = 1 // add 1 pixel to scrollTop when scrolling to an element to make sure the browser always returns the correct target element (strange bug)
								if (o.scrollbehavior == 'smooth' && (history.pushState || o.spytarget != window)){
									$scrollparent.animate( {scrollTop: targets[i].offsettop + addoffset}, o.scrollduration, function(){
										if (o.spytarget == window && history.pushState){
											history.pushState(null, null, $item.attr('href'))
										}
									})
								}
								else{
									$scrollparent.prop('scrollTop', targets[i].offsettop + addoffset)
								}
								e.preventDefault()
							}
						})
					if (o.enableprogress){ // if o.enableprogress enabled
						if ($item.find('div.' + o.enableprogress).length == 0){ //if no progress DIV found inside menu item
							$item.css({position: 'relative', overflow: 'hidden'}) // add some required style to parent A element
							$('<div class="' + o.enableprogress + '" style="position:absolute; left: -100%" />').appendTo($item)
						}
						$progress = $item.find('div.' + o.enableprogress)
					}
					var targetoffset = (o.spytarget == window)? $target.offset().top : (target.offsetParent == o.spytarget)? target.offsetTop : target.offsetTop - o.spytarget.offsetTop
					targetoffset +=  o.scrolltopoffset
					var targetheight = ( parseInt($target.data('spyrange')) > 0 )? parseInt($target.data('spyrange')) : ( $target.outerHeight() || o.mincontentheight)
					var offsetbottom = targetoffset + targetheight
					if (cantscrollpastindex == -1 && offsetbottom > (spyscrollheight - spyheight)){ // determine index of first target which can't be scrolled past
						cantscrollpastindex = i
					}
					targets.push( {$menuitem: $item, $des: $target, offsettop: targetoffset, height: targetheight, $progress: $progress, index: i} )
				})
				if (targets.length > 0)
					totaltargetsheight = targets[targets.length-1].offsettop + targets[targets.length-1].height
			}

			function highlightitem(){
				if (targets.length == 0)
					return
				var prevtarget = curtarget
				var scrolltop = $spytarget.scrollTop()
				var cantscrollpasttarget = false
				var shortlist = targets.filter(function(el, index){ // filter target elements that are currently visible on screen
					return inrange(el, [el.offsettop, el.offsettop + el.height], [scrolltop, scrolltop + spyheight])
				})
				if (shortlist.length > 0){
					curtarget = shortlist.shift() // select the first element that's visible on screen
					if (prevtarget && prevtarget != curtarget)
						prevtarget.$menuitem.removeClass(o.highlightclass)
					if (!curtarget.$menuitem.hasClass(o.highlightclass)) // if there was a previously selected menu link and it's not the same as current
						curtarget.$menuitem.addClass(o.highlightclass) // highlight its menu item
					if (curtarget.index >= cantscrollpastindex && scrolltop >= (spyscrollheight - spyheight)){ // if we're at target that can't be scrolled past and we're at end of document
						if (o.enableprogress){ // if o.enableprogress enabled
							for (var i=0; i<targets.length; i++){ // highlight everything
								targets[i].$menuitem.find('div.' + o.enableprogress).css('left', 0)
							}
						}
						curtarget.$menuitem.removeClass(o.highlightclass)
						curtarget = targets[targets.length-1]
						if (!curtarget.$menuitem.hasClass(o.highlightclass))
							curtarget.$menuitem.addClass(o.highlightclass)
						return
					}
					if (o.enableprogress){ // if o.enableprogress enabled
						var scrollpct = ((scrolltop-curtarget.offsettop) / curtarget.height) * 100
						curtarget.$menuitem.find('div.' + o.enableprogress).css('left', -100 + scrollpct + '%')
						for (var i=0; i<targets.length; i++){
							if (i < curtarget.index){
								targets[i].$menuitem.find('div.' + o.enableprogress).css('left', 0)
							}
							else if (i > curtarget.index){
								targets[i].$menuitem.find('div.' + o.enableprogress).css('left', '-100%')
							}
						}
					}
				}
				else if (scrolltop > totaltargetsheight){ // if no target content visible on screen but scroll bar has scrolled past very last content already
					if (o.enableprogress){ // if o.enableprogress enabled
						curtarget.$menuitem.removeClass(o.highlightclass)
						for (var i=0; i<targets.length; i++){
							targets[i].$menuitem.find('div.' + o.enableprogress).css('left', 0)
						}
					}
				}
			}

			function updatetargetpos(){
				if (targets.length == 0)
					return
				var $menu = targets[0].$menu
				spyheight = $spytarget.outerHeight()
				spyscrollheight = (o.spytarget == window)? $body.get(0).scrollHeight : $spytarget.get(0).scrollHeight
				totaltargetsheight = 0
				cantscrollpastindex = -1
				for (var i = 0; i < targets.length; i++){
					var $target = targets[i].$des
					var target = $target.get(0)
					var targetoffset = (o.spytarget == window)? $target.offset().top : (target.offsetParent == o.spytarget)? target.offsetTop : target.offsetTop - o.spytarget.offsetTop
					targetoffset += o.scrolltopoffset
					targets[i].offsettop = targetoffset
					targets[i].height = ( parseInt($target.data('spyrange')) > 0 )? parseInt($target.data('spyrange')) : ( $target.outerHeight() || o.mincontentheight)
					if (o.enableprogress){ // if o.enableprogress enabled
						var offsetbottom = targetoffset + targets[i].height // recalculate cantscrollpastindex
						if (cantscrollpastindex == -1 && offsetbottom > (spyscrollheight - spyheight)){
							cantscrollpastindex = i
						}
					}
				}
				totaltargetsheight = targets[targets.length-1].offsettop + targets[targets.length-1].height
			}

			spyonmenuitems($menu)

			$menu.on('updatespy', function(){
				spyonmenuitems($menu)
				highlightitem()
			})

			$spytarget.on('scroll resize', function(){
				highlightitem()
			})

			highlightitem()

			$window.on('load resize', function(){
				updatetargetpos()
			})

		}) // end return
	}

})(jQuery);
$('#faq-list').ddscrollSpy({ // initialize first demo
	scrolltopoffset: -100
})
function globalNavPopup(t) {
	var n = this,
		e = Strut.touch.isSupported ? "touchend" : "click";
	this.activeClass = "globalPopupActive",
		this.root = document.querySelector(t),
		this.link = this.root.querySelector(".rootLink"),
		this.popup = this.root.querySelector(".popup"),
		this.closeButton = this.root.querySelector(".popupCloseButton"),
		this.link.addEventListener(e, function (t) {
			t.stopPropagation(), n.togglePopup();
		}),
		this.popup.addEventListener(e, function (t) {
			t.stopPropagation();
		}),
		this.popup.addEventListener("transitionend", function () {
			if (n.isOpening) {
				n.isOpening = !1;
				var t = n.popup.getBoundingClientRect().top + window.scrollY;
				if (t < 15) {
					var e = 15 - t;
					n.popup.style.transform = "translateY(" + e + "px)";
				}
			}
		}),
	this.closeButton &&
	this.closeButton.addEventListener(e, function () {
		n.closeAllPopups();
	}),
		document.body.addEventListener(
			e,
			function () {
				Strut.touch.isDragging || n.closeAllPopups();
			},
			!1);

}
!function () {
	function t() {
		e(), n();
	}

	function n() {
		o.classList.add("dismissed");
	}

	function e() {
		var t = new Date(),
			n = r + "=ack";
		t.setYear(t.getFullYear() + 10),
			n += ";expires=" + t.toGMTString(),
			n += ";domain=" + document.domain,
			document.cookie = n;
	}

	function i() {
		o = document.querySelector('[rel="cookie-notification"]'),
		(a = document.querySelector('[rel="dismiss-cookie-notification"]')) &&
		a.addEventListener("click", t);
	}
	var o,
		a,
		r = "cookie_banner_ack";
	document.addEventListener("DOMContentLoaded", i);
}();
function setCookie(cname, cvalue, exdays) {
	const d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	let expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
$('#offer-enquiry').on('shown.bs.modal', function(event) {
	var button = $(event.relatedTarget) // Button that triggered the modal
	var offer_data = button.data('json')
	var image = button.data('img')
	var offer = button.data('offer')
	$('input[name=offer]').val(offer)
	$('#offer-img').attr('src',image)
	var title = '<h6 class="offer-title-m">'+offer_data.offer_title+'</h6>',desc = '<p class="offer-title-desc">'+offer_data.offer_desc+'</p>'
	if (offer_data.route_url){
		desc += '<a href="'+offer_data.route_url+'">Learn More</a>';
	}
	$('.offer-description').html(title+desc)
})
$('#offer-enquiry').on('hidden.bs.modal', function (e) {
	$('#offer-img').attr('src','')
	$('.offer-description').html('')
})
