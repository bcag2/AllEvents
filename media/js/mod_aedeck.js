/**
 * jquery.baraja.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2012, Codrops
 * http://www.codrops.com
 */
jQuery.fn.reverse = [].reverse;
(function ($, window, undefined) {
    'use strict';
    var Modernizr = window.Modernizr;
    $.Baraja = function (options, element) {
        this.$el = $(element);
        this._init(options);
    };
    $.Baraja.defaults = {nextEl: '', prevEl: '', speed: 300, easing: 'ease-in-out'};
    $.Baraja.prototype = {
        _init: function (options) {
            this.options = $.extend(true, {}, $.Baraja.defaults, options);
            var transEndEventNames = {
                'WebkitTransition': 'webkitTransitionEnd',
                'MozTransition': 'transitionend',
                'OTransition': 'oTransitionEnd',
                'msTransition': 'MSTransitionEnd',
                'transition': 'transitionend'
            };
            this.transEndEventName = transEndEventNames[Modernizr.prefixed('transition')];
            this._setDefaultFanSettings();
            this.$items = this.$el.children('li');
            this.itemsCount = this.$items.length;
            if (this.itemsCount === 0) {
                return false;
            }
            this.supportTransitions = Modernizr.csstransitions;
            this.closed = true;
            this.itemZIndexMin = 500;
            this._setStack();
            this._initEvents();
        }, setFanSettings: function (settings) {
            settings = this._validateDefaultFanSettings(settings || {});
            this.fanSettings = settings;
        }, _setDefaultFanSettings: function () {
            this.fanSettings = {
                speed: 500,
                easing: 'ease-out',
                range: 90,
                direction: 'right',
                origin: {x: 25, y: 100},
                translation: 0,
                center: true,
                scatter: false
            };
        }, _validateDefaultFanSettings: function (settings) {
            if (settings.origin) {
                settings.origin.x = settings.origin.x || this.fanSettings.origin.x;
                settings.origin.y = settings.origin.y || this.fanSettings.origin.y;
            } else {
                settings.origin = this.fanSettings.origin;
            }
            settings.speed = settings.speed || this.fanSettings.speed;
            settings.easing = settings.easing || this.fanSettings.easing;
            settings.direction = settings.direction || this.fanSettings.direction;
            settings.range = settings.range || this.fanSettings.range;
            settings.translation = settings.translation || this.fanSettings.translation;
            if (settings.center == undefined) {
                settings.center = this.fanSettings.center
            }
            if (settings.scatter == undefined) {
                settings.scatter = this.fanSettings.scatter
            }
            this.direction = settings.direction;
            return settings;
        }, _setStack: function ($items) {
            var self = this;
            $items = $items || this.$items;
            $items.each(function (i) {
                $(this).css('z-index', self.itemZIndexMin + self.itemsCount - 1 - i);
            });
        }, _updateStack: function ($el, dir) {
            var currZIndex = Number($el.css('z-index')), newZIndex = dir === 'next' ? this.itemZIndexMin - 1 : this.itemZIndexMin + this.itemsCount, extra = dir === 'next' ? '+=1' : '-=1';
            $el.css('z-index', newZIndex);
            this.$items.filter(function () {
                var zIdx = Number($(this).css('z-index'));
                return dir === 'next' ? zIdx < currZIndex : zIdx > currZIndex;
            }).css('z-index', extra);
        }, _initEvents: function () {
            var self = this;
            if (this.options.nextEl !== '') {
                $(this.options.nextEl).on('click.baraja', function () {
                    self._navigate('next');
                    return false;
                });
            }
            if (this.options.prevEl !== '') {
                $(this.options.prevEl).on('click.baraja', function () {
                    self._navigate('prev');
                    return false;
                });
            }
            this.$el.on('click.baraja', 'li', function () {
                if (!self.isAnimating) {
                    self._move2front($(this));
                }
            });
        }, _resetTransition: function ($el) {
            $el.css({
                '-webkit-transition': 'none',
                '-moz-transition': 'none',
                '-ms-transition': 'none',
                '-o-transition': 'none',
                'transition': 'none'
            });
        }, _setOrigin: function ($el, x, y) {
            $el.css('transform-origin', x + '% ' + y + '%');
        }, _setTransition: function ($el, prop, speed, easing, delay) {
            if (!this.supportTransitions) {
                return false;
            }
            if (!prop) {
                prop = 'all';
            }
            if (!speed) {
                speed = this.options.speed;
            }
            if (!easing) {
                easing = this.options.easing;
            }
            if (!delay) {
                delay = 0;
            }
            var styleCSS;
            prop === 'transform' ? styleCSS = {
                '-webkit-transition': '-webkit-transform ' + speed + 'ms ' + easing + ' ' + delay + 'ms',
                '-moz-transition': '-moz-transform ' + speed + 'ms ' + easing + ' ' + delay + 'ms',
                '-ms-transition': '-ms-transform ' + speed + 'ms ' + easing + ' ' + delay + 'ms',
                '-o-transition': '-o-transform ' + speed + 'ms ' + easing + ' ' + delay + 'ms',
                'transition': 'transform ' + speed + 'ms ' + easing + ' ' + delay + 'ms'
            } : styleCSS = {
                '-webkit-transition': prop + ' ' + speed + 'ms ' + easing + ' ' + delay + 'ms',
                '-moz-transition': prop + ' ' + speed + 'ms ' + easing + ' ' + delay + 'ms',
                '-ms-transition': prop + ' ' + speed + 'ms ' + easing + ' ' + delay + 'ms',
                '-o-transition': prop + ' ' + speed + 'ms ' + easing + ' ' + delay + 'ms',
                'transition': prop + ' ' + speed + 'ms ' + easing + ' ' + delay + 'ms'
            };
            $el.css(styleCSS);
        }, _applyTransition: function ($el, styleCSS, fncomplete, force) {
            if (this.supportTransitions) {
                if (fncomplete) {
                    $el.on(this.transEndEventName, fncomplete);
                    if (force) {
                        fncomplete.call();
                    }
                }
                setTimeout(function () {
                    $el.css(styleCSS);
                }, 25);
            } else {
                $el.css(styleCSS);
                if (fncomplete) {
                    fncomplete.call();
                }
            }
        }, _navigate: function (dir) {
            this.closed = false;
            var self = this, extra = 15, cond = dir === 'next' ? self.itemZIndexMin + self.itemsCount - 1 : self.itemZIndexMin, $item = this.$items.filter(function () {
                return Number($(this).css('z-index')) === cond;
            }), translation = dir === 'next' ? $item.outerWidth(true) + extra : $item.outerWidth(true) * -1 - extra, rotation = dir === 'next' ? 5 : 5 * -1;
            this._setTransition($item, 'transform', this.options.speed, this.options.easing);
            this._applyTransition($item, {transform: 'translate(' + translation + 'px) rotate(' + rotation + 'deg)'}, function () {
                $item.off(self.transEndEventName);
                self._updateStack($item, dir);
                self._applyTransition($item, {transform: 'translate(0px) rotate(0deg)'}, function () {
                    $item.off(self.transEndEventName);
                    self.isAnimating = false;
                    self.closed = true;
                });
            });
        }, _move2front: function ($item) {
            this.isAnimating = true;
            var self = this, isTop = Number($item.css('z-index')) === this.itemZIndexMin + this.itemsCount - 1, callback = isTop ? function () {
                self.isAnimating = false;
            } : function () {
                return false;
            }, $item = isTop ? null : $item;
            if (this.closed) {
                this._fan();
            } else {
                this._close(callback, $item);
            }
            if (isTop) {
                return false;
            }
            this._resetTransition($item);
            this._setOrigin($item, 50, 50);
            $item.css({opacity: 0, transform: 'scale(2) translate(100px) rotate(20deg)'});
            this._updateStack($item, 'prev');
            setTimeout(function () {
                self._setTransition($item, 'all', self.options.speed, 'ease-in');
                self._applyTransition($item, {transform: 'none', opacity: 1}, function () {
                    $item.off(self.transEndEventName);
                    self.isAnimating = false;
                });
            }, this.options.speed / 2);
        }, _close: function (callback, $item) {
            var self = this, $items = self.$items, force = !!this.closed;
            if ($item) {
                $items = $items.not($item);
            }
            this._applyTransition($items, {transform: 'none'}, function () {
                self.closed = true;
                $items.off(self.transEndEventName);
                self._resetTransition($items);
                setTimeout(function () {
                    self._setOrigin($items, 50, 50);
                    if (callback) {
                        callback.call();
                    }
                }, 25);
            }, force);
        }, _fan: function (settings) {
            var self = this;
            this.closed = false;
            settings = this._validateDefaultFanSettings(settings || {});
            if (settings.origin.minX && settings.origin.maxX) {
                var max = settings.origin.maxX, min = settings.origin.minX, stepOrigin = (max - min) / this.itemsCount;
                this.$items.each(function (i) {
                    var $el = $(this), pos = self.itemsCount - 1 - (Number($el.css('z-index')) - self.itemZIndexMin), originX = pos * (max - min + stepOrigin) / self.itemsCount + min;
                    if (settings.direction === 'left') {
                        originX = max + min - originX;
                    }
                    self._setOrigin($(this), originX, settings.origin.y);
                });
            } else {
                this._setOrigin(this.$items, settings.origin.x, settings.origin.y);
            }
            this._setTransition(this.$items, 'transform', settings.speed, settings.easing);
            var stepAngle = settings.range / (this.itemsCount - 1), stepTranslation = settings.translation / (this.itemsCount - 1), cnt = 0;
            this.$items.each(function (i) {
                var $el = $(this), pos = self.itemsCount - 1 - (Number($el.css('z-index')) - self.itemZIndexMin), val = settings.center ? settings.range / 2 : settings.range, angle = val - stepAngle * pos, position = stepTranslation * (self.itemsCount - pos - 1);
                if (settings.direction === 'left') {
                    angle *= -1;
                    position *= -1;
                }
                if (settings.scatter) {
                    var extraAngle = Math.floor(Math.random() * stepAngle), extraPosition = Math.floor(Math.random() * stepTranslation);
                    if (pos !== self.itemsCount - 1) {
                        angle = settings.direction === 'left' ? angle + extraAngle : angle - extraAngle;
                        position = settings.direction === 'left' ? position - extraPosition : position + extraPosition;
                    }
                }
                $el.data({translation: position, rotation: angle});
                self._applyTransition($el, {transform: 'translate(' + position + 'px) rotate(' + angle + 'deg)'}, function () {
                    ++cnt;
                    $el.off(self.transEndEventName);
                    if (cnt === self.itemsCount - 1) {
                        self.isAnimating = false;
                    }
                });
            });
        }, _add: function ($elems) {
            var self = this, newElemsCount = $elems.length, cnt = 0;
            $elems.css('opacity', 0).appendTo(this.$el);
            this.$items = this.$el.children('li');
            this.itemsCount = this.$items.length;
            this._setStack($elems);
            $elems.css('transform', 'scale(1.8) translate(200px) rotate(15deg)').reverse().each(function (i) {
                var $el = $(this);
                self._setTransition($el, 'all', 500, 'ease-out', i * 200);
                self._applyTransition($el, {transform: 'none', opacity: 1}, function () {
                    ++cnt;
                    $el.off(self.transEndEventName);
                    self._resetTransition($el);
                    if (cnt === newElemsCount) {
                        self.isAnimating = false;
                    }
                });
            });
        }, _allowAction: function () {
            return this.itemsCount > 1;
        }, _prepare: function (callback) {
            var self = this;
            if (this.closed) {
                callback.call();
            } else {
                this._close(function () {
                    callback.call();
                });
            }
        }, _dispatch: function (action, args) {
            var self = this;
            if (((action === this._fan || action === this._navigate) && !this._allowAction()) || this.isAnimating) {
                return false;
            }
            this.isAnimating = true;
            this._prepare(function () {
                action.call(self, args);
            });
        }, close: function (settings) {
            if (this.isAnimating) {
                return false;
            }
            this._close();
        }, next: function () {
            this._dispatch(this._navigate, 'next');
        }, previous: function () {
            this._dispatch(this._navigate, 'prev');
        }, fan: function (settings) {
            this._dispatch(this._fan, settings);
        }, add: function ($elems) {
            this._dispatch(this._add, $elems);
        }
    };
    var logError = function (message) {
        if (window.console) {
            window.console.error(message);
        }
    };
    $.fn.baraja = function (options) {
        var instance = $.data(this, 'baraja');
        if (typeof options === 'string') {
            var args = Array.prototype.slice.call(arguments, 1);
            this.each(function () {
                if (!instance) {
                    logError("cannot call methods on baraja prior to initialization; " + "attempted to call method '" + options + "'");
                    return;
                }
                if (!$.isFunction(instance[options]) || options.charAt(0) === "_") {
                    logError("no such method '" + options + "' for baraja instance");
                    return;
                }
                instance[options].apply(instance, args);
            });
        } else {
            this.each(function () {
                if (instance) {
                    instance._init();
                } else {
                    instance = $.data(this, 'baraja', new $.Baraja(options, this));
                }
            });
        }
        return instance;
    };
})(jQuery, window);