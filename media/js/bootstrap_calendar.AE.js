(function ($) {
    "use strict";
    /*jslint  white: true, unparam: true*/
    /*global alert, jQuery, AEBS_PHP*/

    var AEBS = {},
        rules = {
            "\u00A2": "¢",
            "\u00A3": "£",
            "\u20AC": "€",
            "\u00A5": "¥",
            "\u00B0": "°",
            "\u00BC": "¼",
            "\u0152": "Œ",
            "\u00BD": "½",
            "\u0153": "œ",
            "\u00BE": "¾",
            "\u0178": "Ÿ",
            "\u00A1": "¡",
            "\u00AB": "«",
            "\u00BB": "»",
            "\u00BF": "¿",
            "\u00C0": "À",
            "\u00C1": "Á",
            "\u00C2": "Â",
            "\u00C3": "Ã",
            "\u00C4": "Ä",
            "\u00C5": "Å",
            "\u00C6": "Æ",
            "\u00C7": "Ç",
            "\u00C8": "È",
            "\u00C9": "É",
            "\u00CA": "Ê",
            "\u00CB": "Ë",
            "\u00CC": "Ì",
            "\u00CD": "Í",
            "\u00CE": "Î",
            "\u00CF": "Ï",
            "\u00D0": "Ð",
            "\u00D1": "Ñ",
            "\u00D2": "Ò",
            "\u00D3": "Ó",
            "\u00D4": "Ô",
            "\u00D5": "Õ",
            "\u00D6": "Ö",
            "\u00D8": "Ø",
            "\u00D9": "Ù",
            "\u00DA": "Ú",
            "\u00DB": "Û",
            "\u00DC": "Ü",
            "\u00DD": "Ý",
            "\u00DE": "Þ",
            "\u00DF": "ß",
            "\u00E0": "à",
            "\u00E1": "á",
            "\u00E2": "â",
            "\u00E3": "ã",
            "\u00E4": "ä",
            "\u00E5": "å",
            "\u00E6": "æ",
            "\u00E7": "ç",
            "\u00E8": "è",
            "\u00E9": "é",
            "\u00EA": "ê",
            "\u00EB": "ë",
            "\u00EC": "ì",
            "\u00ED": "í",
            "\u00EE": "î",
            "\u00EF": "ï",
            "\u00F0": "ð",
            "\u00F1": "ñ",
            "\u00F2": "ò",
            "\u00F3": "ó",
            "\u00F4": "ô",
            "\u00F5": "õ",
            "\u00F6": "ö",
            "\u00F8": "ø",
            "\u00F9": "ù",
            "\u00FA": "ú",
            "\u00FB": "û",
            "\u00FC": "ü",
            "\u00FD": "ý",
            "\u00FE": "þ",
            "\u00FF": "ÿ"
        };

    function getJsonKey(key) {
        var acc = "";
        for (acc in rules) {
            if (rules.hasOwnProperty(acc)) {
                if (rules[acc].indexOf(key) > -1) {
                    return acc;
                }
            }
        }
    }

    function replaceSpec(Texte) {
        var regstring = "",
            acc = "",
            reg;
        for (acc in rules) {
            if (rules.hasOwnProperty(acc)) {
                regstring += rules[acc];
            }
        }

        reg = new RegExp("[" + regstring + "]", "g");
        return Texte.replace(reg, function (t) {
            return getJsonKey(t);
        });
    }

    AEBS.versionfullcalendar = "0.2.4"; //http://bootstrap-calendar.azurewebsites.net/	

    AEBS.translate = AEBS.t = function (key, initcaps) {
        try {
            if (!AEBS_PHP.translations[key]) {
                alert("Undefined key: " + key);
            }
            var d = AEBS_PHP.translations[key];
            d = replaceSpec(d);
            initcaps = initcaps || false;
            return initcaps ? d.substr(0, 1).toUpperCase() + d.substr(1) : d;
        } catch (err) {
            alert("AEBS.translate ERROR (" + key + ")");
        }
    }; // AEBS.translate = AEBS.t = function (key, initcaps) {

    $(document).ready(function ($) {
        if (!window.calendar_languages) {
            window.calendar_languages = {};
        }

        AEBS.urls = {
            events: AEBS_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=bootstrapcalendar&layout=jsonevt&format=json'
        };

        window.calendar_languages[AEBS_PHP.language] = {
            error_noview: AEBS.translate('ERROR_NOVIEW'),
            error_dateformat: AEBS.translate('ERROR_DATEFORMAT'),
            error_loadurl: AEBS.translate('ERROR_LOADURL'),
            error_where: AEBS.translate('ERROR_WHERE'),
            error_timedevide: AEBS.translate('ERROR_TIMEDEVIDE'),
            title_year: AEBS.translate('YEAR') + ' {0}',
            title_month: '{0} {1}',
            title_week: AEBS.translate('WEEK') + ' {0}',
            title_day: '{0} {1} {2} {3}',
            week: AEBS.translate('WEEK') + ' {0}',
            all_day: AEBS.translate('COM_ALLEVENTS_ALLDAY'),
            time: AEBS.translate('COM_ALLEVENTS_DATETIMES'),
            events: AEBS.translate('EVENTS'),
            before_time: AEBS.translate('BEFORE_TIME'),
            after_time: AEBS.translate('AFTER_TIME'),
            m0: AEBS.translate('monthNames01'),
            m1: AEBS.translate('monthNames02'),
            m2: AEBS.translate('monthNames03'),
            m3: AEBS.translate('monthNames04'),
            m4: AEBS.translate('monthNames05'),
            m5: AEBS.translate('monthNames06'),
            m6: AEBS.translate('monthNames07'),
            m7: AEBS.translate('monthNames08'),
            m8: AEBS.translate('monthNames09'),
            m9: AEBS.translate('monthNames10'),
            m10: AEBS.translate('monthNames11'),
            m11: AEBS.translate('monthNames12'),
            ms0: AEBS.translate('monthNamesShort01'),
            ms1: AEBS.translate('monthNamesShort02'),
            ms2: AEBS.translate('monthNamesShort03'),
            ms3: AEBS.translate('monthNamesShort04'),
            ms4: AEBS.translate('monthNamesShort05'),
            ms5: AEBS.translate('monthNamesShort06'),
            ms6: AEBS.translate('monthNamesShort07'),
            ms7: AEBS.translate('monthNamesShort08'),
            ms8: AEBS.translate('monthNamesShort09'),
            ms9: AEBS.translate('monthNamesShort10'),
            ms10: AEBS.translate('monthNamesShort11'),
            ms11: AEBS.translate('monthNamesShort12'),
            d0: AEBS.translate('dayNames01'),
            d1: AEBS.translate('dayNames02'),
            d2: AEBS.translate('dayNames03'),
            d3: AEBS.translate('dayNames04'),
            d4: AEBS.translate('dayNames05'),
            d5: AEBS.translate('dayNames06'),
            d6: AEBS.translate('dayNames07'),
            first_day: 1,
            holidays: {
                '01-01': AEBS.translate('01_01'),
                'easter-2': AEBS.translate('EASTER_2'),
                'easter': AEBS.translate('EASTER'),
                'easter+1': AEBS.translate('EASTER_1'),
                '01-05': AEBS.translate('01_05'),
                'easter+39': AEBS.translate('EASTER_39'),
                'easter+49': AEBS.translate('EASTER_49'),
                'easter+50': AEBS.translate('EASTER_49'),
                '14-07': AEBS.translate('14_07'),
                '15-08': AEBS.translate('15_08'),
                '01-11': AEBS.translate('01_11'),
                '11-11': AEBS.translate('11_11'),
                '25-12': AEBS.translate('25_12'),
                '26-12': AEBS.translate('26_12')
            }
        };

        var calendar,
            options = {
                events_source: AEBS.urls.events,
                view: AEBS_PHP.view,
                display_week_numbers: true,
                format12: false,
                weekbox: false,
                tmpl_path: AEBS_PHP.JPATH_COMPONENT + '/components/com_allevents/views/bootstrapcalendar/tmpl/tmpls/',
                tmpl_cache: false,
                modal: false, // affichage de l'évènement en modal
                language: AEBS_PHP.language,
                onAfterEventsLoad: function (events) {
                    if (!events) {
                        return;
                    }
                    var list = $('#eventlist');
                    list.html('');

                    $.each(events, function (key, val) {
                        $(document.createElement('li'))
                            .html('<a href="' + val.url + '">' + val.title + '</a>')
                            .appendTo(list);
                    });
                },
                onAfterViewLoad: function (view) {
                    $('.page-header h3').text(this.getTitle());
                    $('.btn-group button').removeClass('active');
                    $('button[data-calendar-view="' + view + '"]').addClass('active');
                },
                classes: {
                    months: {
                        general: 'label'
                    }
                }
            };

        calendar = $('#calendar').calendar(options);
        $('.btn-group button[data-calendar-nav]').each(function () {
            var $this = $(this);
            $this.click(function () {
                calendar.navigate($this.data('calendar-nav'));
            });
        });

        $('.btn-group button[data-calendar-view]').each(function () {
            var $this = $(this);
            $this.click(function () {
                calendar.view($this.data('calendar-view'));
            });
        });
    });
}(jQuery));