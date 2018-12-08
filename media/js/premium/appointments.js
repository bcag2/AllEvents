var isMobile = false;

// Debounce Function
(function ($, sr) {
    "use strict";
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
        var timeout;
        return function debounced() {
            var obj = this,
                args = arguments;

            function delayed() {
                if (!execAsap) {
                    func.apply(obj, args);
                }
                timeout = null;
            }

            if (timeout) {
                clearTimeout(timeout);
            }
            else {
                if (execAsap) {
                    func.apply(obj, args);
                }
            }

            timeout = setTimeout(delayed, threshold || 100);
        };
    };
    // smartresize
    jQuery.fn[sr] = function (fn) {
        return fn ? this.on('resize', debounce(fn)) : this.trigger(sr);
    };

})(jQuery, 'espressoResize');


var appointments = function ($) {
    "use strict";
    var runESlider = function (options) {
        $(".e-slider").each(function () {
            var slider = $(this);
            var setAutoPlay = !isMobile; // AutoPlay False for mobile devices
            var defaults = {
                mouseDrag: false,
                touchDrag: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                navigation: false,
                autoPlay: setAutoPlay
            };
            var config = $.extend({}, defaults, options, slider.data("plugin-options"));

            // Initialize Slider
            slider.owlCarousel(config);
        });
    };

    // function to activate animated Clock and Actual Date
    var runClock = function () {
        function update() {
            var now = moment(),
                second = now.seconds() * 6,
                minute = now.minutes() * 6 + second / 60,
                hour = ((now.hours() % 12) / 12) * 360 + 90 + minute / 12;
            $('#hour').css({
                "-webkit-transform": "rotate(" + hour + "deg)",
                "-moz-transform": "rotate(" + hour + "deg)",
                "-ms-transform": "rotate(" + hour + "deg)",
                "transform": "rotate(" + hour + "deg)"
            });
            $('#minute').css({
                "-webkit-transform": "rotate(" + minute + "deg)",
                "-moz-transform": "rotate(" + minute + "deg)",
                "-ms-transform": "rotate(" + minute + "deg)",
                "transform": "rotate(" + minute + "deg)"
            });
            $('.clock #second').css({
                "-webkit-transform": "rotate(" + second + "deg)",
                "-moz-transform": "rotate(" + second + "deg)",
                "-ms-transform": "rotate(" + second + "deg)",
                "transform": "rotate(" + second + "deg)"
            });
        }

        function timedUpdate() {
            update();
            setTimeout(timedUpdate, 1000);
        }

        timedUpdate();
        $(".actual-date .actual-day").text(moment().format('DD'));
        $(".actual-date .actual-month").text(moment().format('MMMM'));
    };

    // function to activate owlCarousel in Appointments Panel
    var runEventsSlider = function () {
        var owlEvents = $(".appointments .e-slider").data('owlCarousel');
        $(".appointments .owl-next").on("click", function (e) {
            owlEvents.next();
            e.preventDefault();
        });
        $(".appointments .owl-prev").on("click", function (e) {
            owlEvents.prev();
            e.preventDefault();
        });
    };

    return {
        init: function () {
            // Detection for Mobile Device
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                isMobile = true;
            }
            runESlider();
            runClock();
            runEventsSlider();
        }
    };
}(jQuery);