(function ($) {
    "use strict";
    /*jslint  white: true, unparam: true*/
    /*global moment, ical, escape, console, MSBlobBuilder, AEFC, AEFC_PHP, AEFC_Params, alert, RRule, jQuery, Mousetrap*/

    function download(strData, strFileName, strMimeType) {
        var D = document,
            A = arguments,
            a = D.createElement("a"),
            d = A[0],
            n = A[1],
            t = A[2] || "text/plain";

        //build download link:
        a.href = "data:" + strMimeType + "," + escape(strData);

        if (window.MSBlobBuilder) {
            var bb = new MSBlobBuilder();
            bb.append(strData);
            return navigator.msSaveBlob(bb, strFileName);
        }

        if ('download' in a) {
            a.setAttribute("download", n);
            a.innerHTML = "downloading...";
            D.body.appendChild(a);
            setTimeout(function () {
                var e = D.createEvent("MouseEvents");
                e.initMouseEvent("click", true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
                a.dispatchEvent(e);
                D.body.removeChild(a);
            }, 66);
            return true;
        }

        //do iframe dataURL download:
        var f = D.createElement("iframe");
        D.body.appendChild(f);
        f.src = "data:" + (A[2] ? A[2] : "application/octet-stream") + (window.btoa ? ";base64" : "") + "," + (window.btoa ? window.btoa : escape)(strData);
        setTimeout(function () {
            D.body.removeChild(f);
        }, 333);
        return true;
    }

    var rules = {
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
        var acc;
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
            acc,
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

    // Inclue un domready pour être certain que la page a été transmise totalement au navigateur
    // et que ce dernier l'a interprété et est prêt à exécuter le code AJAX qui est repris ci-dessous
    $(document).ready(function ($) {
        // on assure la compatibilité des boutons
        if ($.fn.button.noConflict) {
            $.fn.btn = $.fn.button.noConflict();
        }

        var scripts = document.getElementsByTagName("script"),
            wCount = scripts.length - 1,
            i,
            srcJS,
            wPos,
            url,
            currentStyle,
            style;

        ///////////////////////////////////////////////////////////////////////////////////////
        //
        // Déclaration de la variable de travail AEFC
        //
        ///////////////////////////////////////////////////////////////////////////////////////
        AEFC.versionfullcalendar = "2.9.1";
        AEFC.versioncheckbox = "1.3.0"; //	- checkbox avec image : http://plugins.jquery.com/wCheck/
        AEFC.versionqtip2 = "3.0.3"; //	- qtip  : http://qtip2.com/
        AEFC.versionmousetrap = "1.5.1"; //	- mousetrap http://craig.is/killing/mice
        AEFC.versionrrule = "1.0"; //	- rrule http://jkbr.github.io/rrule/
        AEFC.versionfroala_editor = "1.2.6"; // - froala_editor : http://editor.froala.com

        AEFC.loaded = false;
        AEFC.refreshneeded = false;
        AEFC.selected_event_id = null;
        AEFC.selected_div = null;
        AEFC.selected_bordercolor = null;
        AEFC.weekends = true;
        AEFC.curView = "calendar";

        AEFC.fullcalendar = {};
        AEFC.fullcalendar.header_center = 'title';
        AEFC.fullcalendar.weekNumbers = false;

        AEFC.filters = {};
        AEFC.filters.AgendaID = 0; // Filtre identifiant de l'agenda (0 par defaut)
        AEFC.filters.ActivityID = 0; // Filtre identifiant de l'activite (0 par defaut)
        AEFC.filters.PlaceID = 0; // Filtre identifiant du lieu (0 par defaut)

        AEFC.urls = {};
        AEFC.urls.eventcrud = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&layout=event_crud&format=json';
        AEFC.urls.placecrud = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&layout=place_crud&format=json';
        AEFC.urls.canpropose = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&layout=canpropose&format=json';
        AEFC.urls.events = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&layout=jsonevt&format=json';
        AEFC.urls.gcal = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&layout=jsongcal&format=json';
        AEFC.urls.icscal = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&layout=jsonicscal&format=json';
        AEFC.urls.externalfile = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=proxy';
        AEFC.urls.filters = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&format=ajax&layout=filters&tmpl=component';
        AEFC.urls.event = AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&format=ajax&layout=event_select&tmpl=component';

        AEFC.images = {};
        AEFC.images.edit = AEFC_PHP.css + 'images/editbt.png';
        AEFC.images.delete = AEFC_PHP.css + 'images/delete.png';
        AEFC.images.loading = AEFC_PHP.css + 'images/loading.gif';
        AEFC.images.visu = AEFC_PHP.css + 'images/visu.png';

        AEFC.gapi = {};
        AEFC.gapi.url = "https://www.googleapis.com/calendar/v3/calendars/";
        AEFC.gapi.suffixe = "/events?key=";
        AEFC.gapi.key = "AIzaSyC_iGrZrNmoJpzE28C_Dbs_IZOVtNhGUdE";

        AEFC.keys = {};
        AEFC.keys.day = 'd';
        AEFC.keys.week = 'w';
        AEFC.keys.list = 'l';
        AEFC.keys.month = 'm';
        AEFC.keys.next = 'right';
        AEFC.keys.prev = 'left';
        AEFC.keys.today = 'up';
        AEFC.keys.new = 'n';
        AEFC.keys.delete = 'del';
        AEFC.keys.escape = 'esc';

        AEFC.dialog_std = {};
        AEFC.dialog_std.height = 200;
        AEFC.dialog_std.resizable = false;
        AEFC.dialog_std.modal = true;
        AEFC.dialog_std.closeOnEscape = true;

        AEFC.dialog_event = {};
        AEFC.dialog_event.width = 650;
        AEFC.dialog_event.resizable = false;
        AEFC.dialog_event.modal = true;
        AEFC.dialog_event.closeOnEscape = true;

        AEFC.select_std = {};
        AEFC.select_std.width = 150;
        AEFC.select_std.maxHeight = 300;

        AEFC.rrule = {};
        AEFC.rrule.rule = {};
        AEFC.rrule.options = {};

        AEFC.source = [];

        AEFC.translate = AEFC.t = function (key, initcaps) {
            try {
                if (!AEFC_PHP.translations[key]) {
                    toastr.error("Undefined key: " + key);
                }
                var d = AEFC_PHP.translations[key];
                d = replaceSpec(d);
                initcaps = initcaps || false;
                return initcaps ? d.substr(0, 1).toUpperCase() + d.substr(1) : d;
            } catch (err) {
                toastr.error("AEFC.translate ERROR (" + key + ")");
            }
        }; // AEFC.translate = AEFC.t = function (key, initcaps) {

        AEFC.LANG_NLP_Strings = {
            'SKIP': AEFC.translate('AEFC_SKIP'),
            'number': AEFC.translate('AEFC_number'),
            'numberAsText': AEFC.translate('AEFC_numberAsText'),
            'every': AEFC.translate('AEFC_every'),
            'day': AEFC.translate('AEFC_days'),
            'weekday': AEFC.translate('AEFC_weekday'),
            'week': AEFC.translate('AEFC_weeks'),
            'month': AEFC.translate('AEFC_months'),
            'year': AEFC.translate('AEFC_years'),
            'days': AEFC.translate('AEFC_days'),
            'weekdays': AEFC.translate('AEFC_weekdays'),
            'weeks': AEFC.translate('AEFC_weeks'),
            'months': AEFC.translate('AEFC_months'),
            'years': AEFC.translate('AEFC_years'),
            'on': AEFC.translate('AEFC_on'),
            'the': AEFC.translate('AEFC_the'),
            'first': AEFC.translate('AEFC_first'),
            'second': AEFC.translate('AEFC_second'),
            'third': AEFC.translate('AEFC_third'),
            'nth': AEFC.translate('AEFC_nth'),
            'last': AEFC.translate('AEFC_last'),
            'for': AEFC.translate('AEFC_for'),
            'time': AEFC.translate('AEFC_time'),
            'times': AEFC.translate('AEFC_times'),
            'until': AEFC.translate('AEFC_until'),
            'monday': AEFC.translate('dayNames01'),
            'tuesday': AEFC.translate('dayNames02'),
            'wednesday': AEFC.translate('dayNames03'),
            'thursday': AEFC.translate('dayNames04'),
            'friday': AEFC.translate('dayNames05'),
            'saturday': AEFC.translate('dayNames06'),
            'sunday': AEFC.translate('dayNames07'),
            'january': AEFC.translate('monthNames01'),
            'february': AEFC.translate('monthNames02'),
            'march': AEFC.translate('monthNames03'),
            'april': AEFC.translate('monthNames04'),
            'may': AEFC.translate('monthNames05'),
            'june': AEFC.translate('monthNames06'),
            'july': AEFC.translate('monthNames07'),
            'august': AEFC.translate('monthNames08'),
            'september': AEFC.translate('monthNames09'),
            'october': AEFC.translate('monthNames10'),
            'november': AEFC.translate('monthNames11'),
            'december': AEFC.translate('monthNames12'),
            'comma': ','
        }; //AEFC.LANG_NLP_Strings

        AEFC.gettext = function (id) {
            return AEFC.LANG_NLP_Strings[id] || id;
        };

        AEFC.currentMousePos = {
            x: -1,
            y: -1
        };

        $(document).on("mousemove", function (event) {
            AEFC.currentMousePos.x = event.pageX;
            AEFC.currentMousePos.y = event.pageY;
        });

        AEFC.FC2DP = {
            //FC view : datepager View
            'agendaDay': 'day',
            'agendaWeek': 'week',
            'month': 'month',
            'year': 'month',
            'agendaList': 'month'
        };

        AEFC.clear_selection = function () {
            AEFC.selected_div = null;
            AEFC.selected_event_id = null;
            AEFC.selected_bordercolor = null;
        };

        AEFC.impossible_update_event = function () {
            AEFC.curView = "dialog";
            toastr.warning(AEFC.translate('MOVEEVENT_IMPOSSIBLE'));
            AEFC.curView = "calendar";
        };

        AEFC.impossible_insert_event = function () {
            AEFC.curView = "dialog";
            toastr.warning(AEFC.translate('CREEVENT_ERRORDATE'));
            AEFC.curView = "calendar";
        };

        AEFC.save_event = function (eventToSave) {
            $.ajax({
                type: 'POST',
                async: false,
                data: {
                    event: JSON.stringify(eventToSave)
                },
                url: AEFC.urls.eventcrud
            });
        };

        AEFC.update_event = function (event, revertFunc) {
            AEFC.curView = "dialog";

            swal({
                    title: AEFC.translate('AE_ARE_YOU_SURE'),
                    text: AEFC.translate("MOVEEVENT_CONFIRM"),
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: AEFC.translate("confirm"),
                    cancelButtonText: AEFC.translate("cancel"),
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        // user clicked "ok"
                        var eventToSave = {
                            type_action: "MOV",
                            id: event.id,
                            allday: event.allday,
                            start: moment(event.start).format(AEFC_Params.formats.momentdatetimeformat),
                            end: moment(event.end).format(AEFC_Params.formats.momentdatetimeformat)
                        };
                        AEFC.save_event(eventToSave);
                        AEFC.refreshneeded = true;
                        if (AEFC_Params.logstatus) {
                            toastr.success(AEFC.translate('Event updated'));
                        }
                    } else {
                        revertFunc();
                    }
                });

            AEFC.curView = "calendar";
        }; // end AEFC.update_event

        AEFC.delete_event = function (event_id) {
            AEFC.curView = "dialog";

            swal({
                    title: 'AE_ARE_YOU_SURE',
                    text: AEFC.translate("DELETE_CONFIRM"),
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: AEFC.translate("confirm"),
                    cancelButtonText: AEFC.translate("cancel"),
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        // user clicked "ok"
                        var eventToDel = {
                            type_action: "DEL",
                            id: event_id
                        };
                        AEFC.save_event(eventToDel);
                        $('#AEFC').fullCalendar('removeEvents', event_id);

                        if (AEFC_Params.logstatus) {
                            toastr.success(AEFC.translate('Event deleted'));
                        }
                    } else {
                        // revertFunc();
                    }
                });

            AEFC.curView = "calendar";
        }; // end AEFC.delete_event

        // Zone des filtres
        AEFC.Refresh = function () {
            if (AEFC.refreshneeded) {
                AEFC.filters.AgendaID = $('#AEFC-search-agendas').val();
                AEFC.filters.ActivityID = $('#AEFC-search-activities').val();
                AEFC.filters.PlaceID = $('#AEFC-search-places').val();
                // On rafraichit les variables
                AEFC.source[0] = {
                    url: AEFC.urls.events,
                    type: 'GET',
                    data: {
                        a: (AEFC.filters.AgendaID > 0 ? AEFC.filters.AgendaID : -1), // Le paramètre "a" correspond à l'agenda (constante _AgendaID)
                        p: (AEFC.filters.ActivityID > 0 ? AEFC.filters.ActivityID : -1), // Le paramètre "p" correspond à l'activité (constante _ActivityID)
                        l: (AEFC.filters.PlaceID > 0 ? AEFC.filters.PlaceID : -1), // Le paramètre "l" correspond au lieu (constante _PlaceID)
                        dc: AEFC_Params.dc,
                        dct: AEFC_Params.dct,
                        dcb: AEFC_Params.dcb,
                        itemid: AEFC_PHP.ItemID
                    }, // data
                    error: function () {
                        if (AEFC_Params.logstatus) {
                            toastr.error(AEFC.translate('Loading_Error'));
                        } else {
                            alert(AEFC.translate('Loading_Error'));
                        }
                    } // error
                };

                $('#AEFC').fullCalendar('removeEventSource', AEFC.source[0]);
                $('#AEFC').fullCalendar('removeEventSource', AEFC.source[1]);
                $('#AEFC').fullCalendar('removeEventSource', AEFC.source[2]);
                $('#AEFC').fullCalendar('removeEventSource', AEFC.source[3]);
                $('#AEFC').fullCalendar('removeEventSource', AEFC.source[4]);
                $('#AEFC').fullCalendar('removeEventSource', AEFC.source[5]);
                $('#AEFC').fullCalendar('refetchEvents');
                $('#AEFC').fullCalendar('addEventSource', AEFC.source[0]);
                $('#AEFC').fullCalendar('addEventSource', AEFC.source[1]);
                $('#AEFC').fullCalendar('addEventSource', AEFC.source[2]);
                $('#AEFC').fullCalendar('addEventSource', AEFC.source[3]);
                $('#AEFC').fullCalendar('addEventSource', AEFC.source[4]);
                $('#AEFC').fullCalendar('addEventSource', AEFC.source[5]);
                $('#AEFC').fullCalendar('refetchEvents');
            }
            AEFC.refreshneeded = false;
        }; //  AEFC.Refresh = function ()

        ///////////////////////////////////////////////////////////////////////////////////////
        //
        // Fin déclaration de la variable de travail AEFC
        //
        ///////////////////////////////////////////////////////////////////////////////////////

        ///////////////////////////////////////////////////////////////////////////////////////
        //
        // date picker in regional
        //
        ///////////////////////////////////////////////////////////////////////////////////////

        /* pour le reste + NLP*/
        $.datepicker.regional.fr = {
            closeText: AEFC.translate('close'),
            prevText: AEFC.translate('prev'),
            nextText: AEFC.translate('next'),
            currentText: AEFC.translate('today'),
            monthNames: [AEFC.translate('monthNames01'), AEFC.translate('monthNames02'), AEFC.translate('monthNames03'), AEFC.translate('monthNames04'), AEFC.translate('monthNames05'), AEFC.translate('monthNames06'), AEFC.translate('monthNames07'), AEFC.translate('monthNames08'), AEFC.translate('monthNames09'), AEFC.translate('monthNames10'), AEFC.translate('monthNames11'), AEFC.translate('monthNames12')],
            monthNamesShort: [AEFC.translate('monthNamesShort01'), AEFC.translate('monthNamesShort02'), AEFC.translate('monthNamesShort03'), AEFC.translate('monthNamesShort04'), AEFC.translate('monthNamesShort05'), AEFC.translate('monthNamesShort06'), AEFC.translate('monthNamesShort07'), AEFC.translate('monthNamesShort08'), AEFC.translate('monthNamesShort09'), AEFC.translate('monthNamesShort10'), AEFC.translate('monthNamesShort11'), AEFC.translate('monthNamesShort12')],
            dayNames: [AEFC.translate('dayNames01'), AEFC.translate('dayNames02'), AEFC.translate('dayNames03'), AEFC.translate('dayNames04'), AEFC.translate('dayNames05'), AEFC.translate('dayNames06'), AEFC.translate('dayNames07')],
            dayNamesShort: [AEFC.translate('dayNamesShort01'), AEFC.translate('dayNamesShort02'), AEFC.translate('dayNamesShort03'), AEFC.translate('dayNamesShort04'), AEFC.translate('dayNamesShort05'), AEFC.translate('dayNamesShort06'), AEFC.translate('dayNamesShort07')],
            dayNamesMin: [AEFC.translate('dayNamesShort01').substr(0, 1), AEFC.translate('dayNamesShort02').substr(0, 1), AEFC.translate('dayNamesShort03').substr(0, 1), AEFC.translate('dayNamesShort04').substr(0, 1), AEFC.translate('dayNamesShort05').substr(0, 1), AEFC.translate('dayNamesShort06').substr(0, 1), AEFC.translate('dayNamesShort07').substr(0, 1)],
            weekHeader: AEFC.translate('titleFormatweek'),
            dateFormat: AEFC_Params.formats.datepickerformat,
            firstDay: AEFC_PHP.first_day,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional.fr);

        ///////////////////////////////////////////////////////////////////////////////////////
        //
        // Fin date picker in regional
        //
        ///////////////////////////////////////////////////////////////////////////////////////
        // On fait l'appel en synchrone pour que la variable soit bien définie ! Si asynchrone, le calendrier passe avec la valeur par défaut...
        $.ajax({
            type: 'POST',
            contentType: "application/json",
            url: AEFC.urls.canpropose,
            dataType: "json",
            async: false,
            success: function (result) {
                AEFC_PHP.CanPropose = result.value;
                // si on a les droits, on prend les droit donné en backend
                if (AEFC_PHP.CanPropose === true) {
                    AEFC_PHP.CanPropose = AEFC_Params.toolbar.shownew;
                }
            },
            error: function () {
                AEFC_PHP.CanPropose = false;
            }
        }); // $.ajax(

        AEFC.nbcalendars = 1;
        // On fait l'appel en synchrone pour que la variable soit bien définie !
        // Si asynchrone, le calendrier passe avec la valeur par défaut...
        $.ajax({
            type: 'POST',
            contentType: "application/json",
            url: AEFC.urls.gcal,
            dataType: "json",
            async: false,
            success: function (result) {
                i = 1;
                $.each(result, function (key, val) {
                    if (i < 6) {
                        AEFC.source[AEFC.nbcalendars] = {
                            id: val.id,
                            url: AEFC.gapi.url + val.id_gcalendar + AEFC.gapi.suffixe + AEFC.gapi.key,
                            className: val.className,
                            color: val.color,
                            googleCalendarApiKey: AEFC.gapi.key,
                            textColor: val.textColor
                        };
                        i += 1;
                        AEFC.nbcalendars += 1;
                    }
                });
            }
        }); // $.ajax(

        // On fait l'appel en synchrone pour que la variable soit bien définie !
        // Si asynchrone, le calendrier passe avec la valeur par défaut...
        $.ajax({
            type: 'POST',
            contentType: "application/json",
            url: AEFC.urls.icscal,
            dataType: "json",
            async: false,
            success: function (result) {
                var icalevents = [],
                    StrStart,
                    StrEnd,
                    StrID,
                    StrAllDay,
                    StrTitle = "",
                    StrURL = "",
                    StrLocation = "",
                    StrDescription = "";
                $.each(result, function (key, val) {
                    // try {
                    var ics;
                    var dataurl = "";
                    var url = val.url;
                    icalevents = [];
                    // open the ics file
                    if (url.indexOf("http") === 0) {
                        url = AEFC.urls.externalfile;
                        dataurl = val.url;
                    }
                    $.ajax({
                        url: url,
                        data: {
                            url: dataurl
                        },
                        dataType: 'text',
                        async: false,
                        success: function (data) {
                            ics = ical.parseICS(data);
                            for (var k in ics) {
                                if (ics.hasOwnProperty(k)) {
                                    var ev = ics[k];
                                    if (ev.type == 'VEVENT') {
                                        if ((moment(ev.start).isValid()) && (moment(ev.end).isValid())) {
                                            StrStart = ev.start.toISOString();
                                            StrEnd = ev.end.toISOString();
                                            StrAllDay = StrStart === StrEnd;
                                            if (typeof ev.uid !== "undefined") {
                                                StrID = 'ICS' + AEFC.nbcalendars + '#' + ev.uid;
                                            }
                                            if (typeof ev.summary !== "undefined") {
                                                StrTitle = ev.summary;
                                            }
                                            if (typeof ev.location !== "undefined") {
                                                StrLocation = ev.location;
                                            }
                                            if (typeof ev.description !== "undefined") {
                                                StrDescription = ev.description.val;
                                            }
                                            if (typeof ev.url !== "undefined") {
                                                StrURL = ev.url;
                                            }
                                            icalevents.push({
                                                id: StrID,
                                                title: StrTitle,
                                                url: StrURL,
                                                start: StrStart,
                                                end: StrEnd,
                                                allDay: StrAllDay,
                                                location: StrLocation,
                                                description: StrDescription,
                                                editable: false,
                                                className: val.className,
                                                color: val.color,
                                                textColor: val.textColor
                                            });
                                        }
                                    }
                                }
                            }

                            AEFC.source[AEFC.nbcalendars] = {
                                id: val.id,
                                events: icalevents
                            };
                            // console.log (icalevents) ;
                            AEFC.nbcalendars += 1;
                        }
                    });
                    // } catch (err) {
                    // toastr.error("ERROR loading (" + val.url + "): " + err);
                    // console.log("ERROR loading (" + val.url + "): " + err);
                    // }
                });
            }
        }); // $.ajax(

        // $("#datepager").wijdatepager({
        // viewType: 'month',
        // firstDayOfWeek: AEFC_PHP.first_day,
        // culture: AEFC_PHP.locale,
        // selectedDateChanged: function (e, args) {
        // $('#AEFC').fullCalendar('gotoDate', args.selectedDate);
        // }
        // });

        // Source local => donc AllEvents
        AEFC.source[0] = {
            url: AEFC.urls.events,
            type: 'GET',
            data: {
                a: (AEFC.filters.AgendaID > 0 ? AEFC.filters.AgendaID : -1), // Le paramètre "a" correspond à l'agenda (constante _AgendaID)
                p: (AEFC.filters.ActivityID > 0 ? AEFC.filters.ActivityID : -1), // Le paramètre "p" correspond à l'activité (constante _ActivityID)
                l: (AEFC.filters.PlaceID > 0 ? AEFC.filters.PlaceID : -1), // Le paramètre "l" correspond au lieu (constante _PlaceID)
                dc: AEFC_Params.dc,
                dct: AEFC_Params.dct,
                dcb: AEFC_Params.dcb,
                itemid: AEFC_PHP.ItemID
            },
            error: function () {
                toastr.error(AEFC.translate('Loading_Error'));
            }
        };
        ///////////////////////////////////////////////////////////////////////////////////////
        //
        // debut de la déclaration de fullCalendar
        //
        ///////////////////////////////////////////////////////////////////////////////////////
        $('#AEFC').fullCalendar({
            height: 650,
            theme: true, // support des themes UI
            editable: AEFC_PHP.CanPropose, // permettre de modifier les evenements dejà crees
            selectable: AEFC_PHP.CanPropose, // permettre de selectionner des evenements
            selectHelper: true, //selectHelper will add helpers for selectable.
            droppable: true, // this allows things to be dropped onto the calendar !!!
            dropAccept: '.external-event',
            weekends: AEFC.weekends, // will hide Saturdays and Sundays
            disableDragging: !(AEFC_PHP.CanPropose),
            axisFormat: AEFC_Params.formats.timeformat,
            slotLabelFormat: AEFC_Params.formats.timeformat,
            timeFormat: AEFC_Params.formats.timeformat,
            dragOpacity: 0.5,
            dragRevertDuration: 0,
            eventLimit: true, // allow "more" link when too many events
            defaultView: AEFC_Params.fullcalendar.defaultView,
            weekNumbers: AEFC.fullcalendar.weekNumbers,
            minTime: AEFC_Params.fullcalendar.minTime,
            maxTime: AEFC_Params.fullcalendar.maxTime,
            header: {
                left: AEFC.fullcalendar.header_center + ',' + AEFC_Params.fullcalendar.header_left,
                center: '',
                right: AEFC_Params.fullcalendar.header_right
            },
            eventSources: [
                AEFC.source[0], AEFC.source[1], AEFC.source[2], AEFC.source[3], AEFC.source[4], AEFC.source[5]
            ],
            // Parlons dans la langue du composant
            monthNames: [AEFC.translate('monthNames01'), AEFC.translate('monthNames02'), AEFC.translate('monthNames03'), AEFC.translate('monthNames04'), AEFC.translate('monthNames05'), AEFC.translate('monthNames06'), AEFC.translate('monthNames07'), AEFC.translate('monthNames08'), AEFC.translate('monthNames09'), AEFC.translate('monthNames10'), AEFC.translate('monthNames11'), AEFC.translate('monthNames12')],
            monthNamesShort: [AEFC.translate('monthNamesShort01'), AEFC.translate('monthNamesShort02'), AEFC.translate('monthNamesShort03'), AEFC.translate('monthNamesShort04'), AEFC.translate('monthNamesShort05'), AEFC.translate('monthNamesShort06'), AEFC.translate('monthNamesShort07'), AEFC.translate('monthNamesShort08'), AEFC.translate('monthNamesShort09'), AEFC.translate('monthNamesShort10'), AEFC.translate('monthNamesShort11'), AEFC.translate('monthNamesShort12')],
            dayNames: [AEFC.translate('dayNames01'), AEFC.translate('dayNames02'), AEFC.translate('dayNames03'), AEFC.translate('dayNames04'), AEFC.translate('dayNames05'), AEFC.translate('dayNames06'), AEFC.translate('dayNames07')],
            dayNamesShort: [AEFC.translate('dayNamesShort01'), AEFC.translate('dayNamesShort02'), AEFC.translate('dayNamesShort03'), AEFC.translate('dayNamesShort04'), AEFC.translate('dayNamesShort05'), AEFC.translate('dayNamesShort06'), AEFC.translate('dayNamesShort07')],
            firstDay: AEFC_PHP.first_day,
            buttonText: {
                today: AEFC.translate('today'),
                day: AEFC.translate('day'),
                week: AEFC.translate('week'),
                month: AEFC.translate('month')
            },

            //
            // Début des fonctions
            //
            loading: function (bool) {
                if (bool) {
                    var position = $('#AEFC').position();
                    $('.loading').css('left', position.left).css('top', position.top).css('width', $('#AEFC').width()).css('height', $('#AEFC').height()).show();
                } else {
                    $('.loading').hide();
                }
            },

            // Déplacement d'un evenement par glisser/deposer
            eventDrop: function (event, delta, revertFunc) {
                if (AEFC_Params.qtipstatus) {
                    $('.qtip').remove();
                }
                // déplacement dans le passé impossible
                if (moment(event.start) < moment()) {
                    AEFC.impossible_update_event();
                    revertFunc();
                } else {
                    AEFC.update_event(event, revertFunc);
                }
            },

            // Affichage du calendrier
            viewRender: function (view) {
                // on change quelque peu l'aspect de la vue mois
                if (view.name === 'month') {
                    var $headers = $('.fc-day-number');
                    $headers.each(function () {
                        $headers.css({
                            'cursor': 'pointer',
                            'width': '100%',
                            'text-align': 'right',
                            'border-bottom': '1px dotted #ddd'
                        });
                    });
                }
                // $("#datepager").wijdatepager("option", "viewType", AEFC.FC2DP[view.name]);
                // $("#datepager").wijdatepager("option", "selectedDate", $('#AEFC').fullCalendar('getDate'));

                if (!AEFC.loaded) {
                    // On va construire la zone de filtres dans le header en inserant une nouvelle ligne
                    if (AEFC_PHP.CanPropose && AEFC_Params.filters.showtrash) {
                        $('.fc-toolbar').append('<tr><td id="AE-filters" colspan="2"></td><td id="AE-bandeau"><div id="calendarTrash" class="calendar-trash"></div></td></tr>');
                    } else {
                        $('.fc-toolbar').append('<tr><td id="AE-filters" colspan="2"></td><td id="AE-bandeau"><div id="calendarTrash"/></td></tr>');
                    }

                    if (AEFC_Params.filters.showfilters) {
                        $.ajax({
                            type: 'POST',
                            url: AEFC.urls.filters,
                            success: function (value) {
                                $("#AEFC-search").html(value);
                                $("#AEFC-search-agendas, #AEFC-search-activities, #AEFC-search-places").selectmenu({
                                    icons: [{
                                        find: '.avatar'
                                    }
                                    ],
                                    bgImage: function () {
                                        return 'url(' + AEFC_PHP.url + $(this).attr("title") + ')';
                                    },
                                    style: 'dropdown',
                                    width: AEFC.select_std.width,
                                    maxHeight: AEFC.select_std.maxHeight,
                                    change: function () {
                                        AEFC.refreshneeded = true; // on force le refresh si on modifie un filtre
                                        AEFC.Refresh();
                                    }
                                });
                                var search_menu = $('#AEFC-search').show();
                                $('#AE-filters').append(search_menu);
                            }
                        });
                    }
                }
                AEFC.loaded = true;
            },

            // Déplacement d'un evenement par redimensionnement
            eventResize: function (event, delta, revertFunc) {
                AEFC.update_event(event, revertFunc);
            },

            // on prépare les evenements
            eventRender: function (event, element) {
                // cursor en cas de déplacement
                if (event.editable) {
                    element.draggable({
                        distance: 20,
                        cursor: 'move',
                        cursorAt: {
                            top: -5,
                            left: -5
                        }
                    });
                }

                // Affichage du tooltip de l'évènement lorsque le pointeur de la souris est positionné sur l'évènement
                if (AEFC_Params.qtipstatus) {
                    if (event.id !== "undefined") {
                        if (($.isNumeric(event.id)) && (event.id > 0)) {
                            element.qtip({
                                content: {
                                    text: '<img class="throbber" src="' + AEFC.images.loading + '" alt="' + AEFC.translate('Loading...') + '" />',
                                    ajax: {
                                        url: AEFC.urls.event,
                                        type: 'GET',
                                        data: {
                                            ei: event.id
                                        }
                                    },
                                    title: {
                                        text: event.title,
                                        button: true
                                    }
                                }
                            });
                        }
                    }
                }
            },

            // survol avec la souris
            eventMouseover: function (event, jsEvent, view) {
                var layer = '';
                if ((event.id !== "undefined") && ($.isNumeric(event.id)) && (event.id > 0)) {
                    if (view.name !== 'agendaList') {
                        if ((event.editable) && (AEFC_PHP.CanPropose)) {
                            // Affichage des options d'édition au niveau du tooltip dès lors que l'utilisateur a le niveau de permissions suffisant
                            layer += '<div id="events-layer">';
                            layer += '   <a><img src="' + AEFC.images.visu + '" title="' + AEFC.translate('visu') + '" class="events-layer-but" id="visbut' + event.id + '" /></a>';
                            layer += '   <a><img src="' + AEFC.images.edit + '" title="' + AEFC.translate('edit') + '" class="events-layer-but" id="edbut' + event.id + '" /></a>';
                            layer += '   <a><img src="' + AEFC.images.delete + '" title="' + AEFC.translate('delete') + '" class="events-layer-but" id="delbut' + event.id + '" style="padding-right:10px;" /></a>';
                            layer += '</div>';

                            $(this).append(layer);
                            $("#delbut" + event.id + " #edbut" + event.id + " #visbut" + event.id).hide();
                            $("#delbut" + event.id + " #edbut" + event.id + " #visbut" + event.id).fadeIn(200);

                            // visualisation button
                            $("#visbut" + event.id).click(function () {
                                window.open(event.link, AEFC_Params.openlinkself, false);
                            });

                            // edit event
                            $("#edbut" + event.id).click(function () {
                                var bool_hot,
                                    html,
                                    dialog;
                                bool_hot = (event.hot === "1");
                                $("#AEFC-eventToUpdate-tabs4").hide();

                                $("#AEFC-eventToUpdate-eventID").val(event.id);
                                $("#AEFC-eventToUpdate-Start").val(moment(event.start).format(AEFC_Params.formats.momentdateformat));
                                $("#AEFC-eventToUpdate-Start-Time").val(moment(event.start).format(AEFC_Params.formats.momenttimeformat));
                                $("#AEFC-eventToUpdate-End").val(moment(event.end).format(AEFC_Params.formats.momentdateformat));
                                $("#AEFC-eventToUpdate-End-Time").val(moment(event.end).format(AEFC_Params.formats.momenttimeformat));
                                $("#AEFC-eventToUpdate-eventName").val(event.title);
                                $('#AEFC-eventToUpdate-enrolment_max_participant').val(event.enrolment_max_participant);

                                $('#AEFC-eventToUpdate-agendas').val(event.agenda_id).selectmenu();
                                $('#AEFC-eventToUpdate-activities').val(event.activity_id).selectmenu();
                                $('#AEFC-eventToUpdate-places').val(event.place_id).selectmenu();

                                $('#AEFC-eventToUpdate-hot').wCheck('check', bool_hot);
                                $('#AEFC-eventToUpdate-hot').prop('checked', bool_hot).change();
                                $("#eventToUpdate").dialog({
                                    autoOpen: false,
                                    zIndex: 1001,
                                    title: AEFC.translate("Update event"),
                                    width: AEFC.dialog_event.width,
                                    modal: AEFC.dialog_event.modal,
                                    closeOnEscape: AEFC.dialog_event.closeOnEscape,
                                    open: function (e, ui) {
                                        $('.ui-dialog-buttonpane').find('button:contains("Delete")').button("option", "label", AEFC.translate("delete"));
                                        $('.ui-dialog-buttonpane').find('button:contains("Update")').button("option", "label", AEFC.translate("update"));
                                        $('.ui-dialog-buttonpane').find('button:contains("Cancel")').button("option", "label", AEFC.translate("cancel"));
                                        $('#AEFC-eventToUpdate-description').editable({
                                            inlineMode: false,
                                            language: AEFC_PHP.language,
                                            minHeight: 250,
                                            imageUploadURL: AEFC_PHP.url + 'administrator/components/com_allevents/helpers/AEupload.php',
                                            crossDomain: false,
                                            imageUploadParams: {
                                                root: AEFC_PHP.url
                                            },
                                            imageErrorCallback: function (error) {
                                                if (error.code === 1) {
                                                    alert('Bad link');
                                                } else if (error.code === 2) {
                                                    alert('No link in upload response');
                                                } else if (error.code === 3) {
                                                    alert('Error during file upload');
                                                } else if (error.code === 4) {
                                                    alert('Parsing response failed');
                                                } else if (error.code === 5) {
                                                    alert('Image too large');
                                                } else if (error.code === 6) {
                                                    alert('Invalid image type');
                                                } else if (error.code === 7) {
                                                    alert('Image can be uploaded only to same domain in IE 8 and IE 9');
                                                }
                                            }
                                        });
                                        $("#AEFC-eventToUpdate-description").editable("setHTML", "");
                                        $("#AEFC-eventToUpdate-description").editable("setHTML", event.description);
                                    }, // open: function (e, ui) {
                                    buttons: {
                                        "Delete": function () {
                                            AEFC.delete_event(event.id);
                                            $(this).dialog("close");
                                        }, // "Delete": function ()
                                        "Update": function () {
                                            var eventToSave = {
                                                type_action: "UPD",
                                                id: event.id,
                                                start: $("#AEFC-eventToUpdate-Start").val() + " " + $("#AEFC-eventToUpdate-Start-Time").val(),
                                                end: $("#AEFC-eventToUpdate-End").val() + " " + $("#AEFC-eventToUpdate-End-Time").val(),
                                                title: $("#AEFC-eventToUpdate-eventName").val(),
                                                agenda_id: $("#AEFC-eventToUpdate-agendas").val(),
                                                activity_id: $("#AEFC-eventToUpdate-activities").val(),
                                                place_id: $("#AEFC-eventToUpdate-places").val(),
                                                description: "",
                                                hot: ($('#AEFC-eventToUpdate-hot').prop('checked')) ? "1" : "0",
                                                enrolment_max_participant: $('#AEFC-eventToUpdate-enrolment_max_participant').val()
                                            };
                                            //la methode gethtml renvoie un tableau
                                            html = $("#AEFC-eventToUpdate-description").editable("getHTML");
                                            if (Object.prototype.toString.call(html) === '[object Array]') {
                                                html = html[0];
                                            }
                                            eventToSave.description = html;
                                            AEFC.save_event(eventToSave);
                                            AEFC.refreshneeded = true;
                                            if (AEFC_Params.logstatus) {
                                                toastr.success(AEFC.translate('Event updated'));
                                            }
                                            $(this).dialog("close");
                                        },
                                        Cancel: function () {
                                            $(this).dialog("close");
                                        }
                                    },
                                    close: function (event, ui) {
                                        AEFC.Refresh();
                                        AEFC.curView = "calendar";
                                    }
                                });

                                AEFC.curView = "event";
                                dialog = $("#eventToUpdate").dialog();

                                /*jslint nomen: true*/
                                dialog.data("uiDialog")._title = function (title) {
                                    title.html(this.options.title);
                                };
                                /*jslint nomen: false*/
                                dialog.dialog('option', 'title', '<span class="title-newevent">' + AEFC.translate("Update event") + '</span>');
                                dialog.dialog('open');

                            });

                            // delete event
                            $("#delbut" + event.id).click(function () {
                                AEFC.delete_event(event.id);
                            });
                        } else {
                            layer += '<div id="events-layer">';
                            layer += '   <a><img src="' + AEFC.images.visu + '" title="' + AEFC.translate('visu') + '" class="events-layer-but" id="visbut' + event.id + '" /></a>';
                            layer += '</div>';

                            $(this).append(layer);
                            $(" #visbut" + event.id).hide();
                            $(" #visbut" + event.id).fadeIn(200);

                            $("#visbut" + event.id).click(function () {
                                window.open(event.link, AEFC_Params.openlinkself, false);
                            });
                        }
                    }
                }
            },

            // on pass la souris hors de l'évènement
            eventMouseout: function (event) {
                // on supprime la barre d'outil au survol
                $(this).find('div[id*=events-layer]').remove();
            },

            // on commence à bouger
            eventDragStart: function (event, jsEvent, ui, view) {
                // on supprime le qtip qui explique l'evenement
                $('.qtip').remove();
            },

            // this function is called when something is dropped
            drop: function (date, allDay) {
                var copiedEventObject,
                    lstart = new Date(),
                    lend = new Date(),
                    difference,
                    view;
                if (moment(date) < moment()) {
                    AEFC.impossible_update_event();
                } else {
                    // retrieve the dropped element's stored Event Object
                    copiedEventObject = {
                        type_action: "INS",
                        agenda_id: $(this).data('id_agenda'),
                        activity_id: $(this).data('id_activity'),
                        place_id: $(this).data('id_place'),
                        description: $(this).data('description'),
                        enrolment_max_participant: $(this).data('enrolment_max_participant'),
                        hot: $(this).data('hot'),
                        allday: 0,
                        title: $(this).data('title')
                    };

                    difference = moment($(this).data('dend') + " " + $(this).data('hend'), AEFC_Params.formats.momentdatetimeformat).toDate() - moment($(this).data('dstart') + " " + $(this).data('hstart'), AEFC_Params.formats.momentdatetimeformat).toDate();
                    view = $('#AEFC').fullCalendar('getView');
                    if (view.name === 'month') {
                        lstart = moment(moment(date).format(AEFC_Params.formats.momentdateformat) + " " + $(this).data('hstart'), AEFC_Params.formats.momentdatetimeformat).toDate();
                    } else {
                        lstart = date;
                    } // if (view.name == 'month')

                    lend.setTime(lstart.getTime() + difference);

                    copiedEventObject.start = moment(lstart).format(AEFC_Params.formats.momentdatetimeformat).trim();
                    copiedEventObject.end = moment(lend).format(AEFC_Params.formats.momentdatetimeformat).trim();
                    AEFC.save_event(copiedEventObject);
                    if (AEFC_Params.logstatus) {
                        toastr.success(AEFC.translate('Event created'));
                    }
                    AEFC.refreshneeded = true;
                    AEFC.Refresh();
                }
            },

            eventClick: function (event, jsEvent, view) {
                if (($.isNumeric(event.id)) && (event.id > 0)) {
                    if (AEFC_PHP.CanPropose && event.editable) {
                        if (AEFC.selected_div) { // si il existe un évènement précédement séléctionné
                            AEFC.selected_div.css('border', '');
                            AEFC.selected_div.css('border-color', AEFC.selected_bordercolor); // on supprime sa bordure css de
                        }
                        AEFC.selected_div = $(this); // On mémorise la div sur laquelle on a cliqué
                        AEFC.selected_event_id = event.id; // on mémorise l'évènement
                        AEFC.selected_bordercolor = AEFC.selected_div.css('border-left-color');
                        AEFC.selected_div.css('border', 'solid 2px red'); // On entoure la sélection avec une bordure css
                    }
                } else {
                    window.open(event.url, 'gcalevent', 'width=700,height=600');
                }
                // Normally, if the Event Object has its url property set, a click on the event will cause the browser to visit the event's url (in the same window/tab). Returning false from within your function will prevent this from happening.
                return false;
            }, //fin click_in_event

            // when user select timeslot this option code will execute.
            // It has three arguments. Start,end and allDay.
            // Start means starting time of event.
            // End means ending time of event.
            // allDay means if events is for entire day or not.
            select: function (start, end, allDay) {
                var lstart,
                    lend,
                    view,
                    lstartViewMonth,
                    lstartViewWeek,
                    dialog;
                if ((moment(start) >= moment()) && AEFC_PHP.CanPropose) {
                    lstart = moment(start).format(AEFC_Params.formats.momentdatetimeformat);
                    lend = moment(end).format(AEFC_Params.formats.momentdatetimeformat);
                    view = $('#AEFC').fullCalendar('getView');
                    lstartViewMonth = moment(start).format(AEFC_Params.formats.momentdateformat);
                    lstartViewWeek = lstartViewMonth + ", " + moment(start).format(AEFC_Params.formats.momenttimeformat) + " - " + moment(end).format(AEFC_Params.formats.momenttimeformat);

                    // dates visibles sous forme de libelle simple
                    if (view.name === 'month') {
                        $("#AEFC-eventToAdd-eventDate").text(String(lstartViewMonth));
                        $("#AEFC-eventToAdd-example").text(AEFC.translate("example_month"));
                    } else {
                        $("#AEFC-eventToAdd-eventDate").text(String(lstartViewWeek));
                        $("#AEFC-eventToAdd-example").text(AEFC.translate("example_week"));
                    }
                    // les dates cachees qui serviront à alimenter l'agenda
                    $("#AEFC-eventToAdd-eventStartDate").val(String(lstart));
                    $("#AEFC-eventToAdd-eventEndDate").val(String(lend));
                    $('#AEFC-eventToAdd-hot').wCheck('check', false);
                    $('#AEFC-eventToAdd-hot').prop('checked', false).change();

                    AEFC.curView = "event";
                    // Bouton d'ajout d'un évènement
                    $("#eventToAdd").dialog({
                        autoOpen: false,
                        title: AEFC.translate("Add event"),
                        width: AEFC.dialog_event.width,
                        modal: AEFC.dialog_event.modal,
                        closeOnEscape: AEFC.dialog_event.closeOnEscape,
                        open: function (e, ui) {
                            $('.ui-dialog-buttonpane').find('button:contains("Add")').button("option", "label", AEFC.translate("add"));
                            $('.ui-dialog-buttonpane').find('button:contains("Cancel")').button("option", "label", AEFC.translate("cancel"));
                        },
                        buttons: {
                            "Add": function () {
                                var reg,
                                    eventToSave = {
                                        type_action: "INS",
                                        title: $("#AEFC-eventToAdd-eventName").val(),
                                        agenda_id: $('#AEFC-eventToAdd-agendas').val(),
                                        activity_id: $('#AEFC-eventToAdd-activities').val(),
                                        place_id: $('#AEFC-eventToAdd-places').val(),
                                        description: "",
                                        allDay: false,
                                        hot: ($('#AEFC-eventToAdd-hot').prop('checked')) ? "1" : "0",
                                        enrolment_max_participant: $('#AEFC-eventToAdd-enrolment_max_participant').val()
                                    };

                                if (view.name === 'month') {
                                    //on récupère la date et heure  du jour du mois
                                    eventToSave.start = $("#AEFC-eventToAdd-eventStartDate").val();
                                    // test avec expression reguliere format HH:MM{espace}texte
                                    reg = new RegExp("^([01]?[0-9]|2[0-3]):[0-5][0-9] .*", "g");
                                    if (reg.test(eventToSave.title)) {
                                        eventToSave.start = eventToSave.start.substring(0, 10) + ' ' + eventToSave.title.substring(0, 5);
                                        eventToSave.title = eventToSave.title.substring(6);
                                    }
                                    eventToSave.end = moment(eventToSave.start, AEFC_Params.formats.momentdatetimeformat).add(1, 'hours').format(AEFC_Params.formats.momentdatetimeformat);
                                } else {
                                    eventToSave.start = $("#AEFC-eventToAdd-eventStartDate").val();
                                    eventToSave.end = $("AEFC-eventToAdd-eventEndDate").val();
                                }

                                if (eventToSave.title === "") {
                                    toastr.error(AEFC.translate("title required"));
                                } else {
                                    $("#eventToAdd").find("input").val("");
                                    AEFC.save_event(eventToSave);
                                    AEFC.refreshneeded = true;
                                    AEFC.Refresh();
                                    if (AEFC_Params.logstatus) {
                                        toastr.success(AEFC.translate('Event created'));
                                    }
                                    $(this).dialog("close");
                                }
                            },
                            Cancel: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            AEFC.Refresh();
                            AEFC.curView = "calendar";
                        }
                    });
                    dialog = $("#eventToAdd").dialog();

                    /*jslint nomen: true*/
                    dialog.data("uiDialog")._title = function (title) {
                        title.html(this.options.title);
                    };
                    /*jslint nomen: false*/
                    dialog.dialog('option', 'title', '<span class="title-newevent">' + AEFC.translate("Add event") + '</span>');
                    dialog.dialog('open');
                }
            }
        });

        // Ajout bouton selectionner une date
        $(".fc-left").append('<span class="fc-header-space"></span>');
        $(".fc-left").append('<span class="fc-header-space"></span>');
        $(".fc-left").append('<div id="AEFC_btn">');

        if (AEFC_PHP.CanPropose) {
            // On ne montre le bouton Add New que lorsque l'utilisateur dispose de la permission de créer des évènements
            if (AEFC_Params.toolbar.shownew) {
                $(".fc-left").append('<span id="AE_btn_new" class="cal-button">' + AEFC.translate("Add event") + '</span>');
                $(".fc-left").append('<span class="fc-header-space"></span>');
            }
        } else {
            // on ne peut pas faire de resize d'evt
            $(".ui-resizable-e .ui-resizable-s").css("display", "none");
        }

        if (AEFC_Params.toolbar.expand) {
            $(".fc-left").append('<span id="AE_btn_compress" class="cal-button">' + AEFC.translate("compress") + '</span>');
            $(".fc-left").append('<span class="fc-header-space"></span>');
            $("#AE_btn_compress").button({
                icons: {
                    primary: "ui-icon-newwin"
                },
                text: false
            });
            $("#AE_btn_compress").click(function () {
                window.open(window.location.protocol + "//" + window.location.host + window.location.pathname, '_self', false);
            });

        } else {
            $(".fc-left").append('<span id="AE_btn_expand" class="cal-button">' + AEFC.translate("expand") + '</span>');
            $(".fc-left").append('<span class="fc-header-space"></span>');
            $("#AE_btn_expand").button({
                icons: {
                    primary: "ui-icon-arrow-4-diag"
                },
                text: false
            });
            $("#AE_btn_expand").click(function () {
                window.open(window.location.protocol + "//" + window.location.host + window.location.pathname + "?tmpl=component", '_self', false);
            });
        }

        if (AEFC_PHP.CanPropose) {
            if (AEFC_Params.toolbar.showplace) {
                $(".fc-left").append('<span id="AE_btn_place" class="cal-button">' + AEFC.translate("Add place") + '</span>');
            }
        }
        $(".fc-left").append('</div>');

        if (AEFC_Params.toolbar.showplace) {
            $("#AE_btn_place").button({
                icons: {
                    primary: "ui-icon-place_add"
                },
                text: false
            });

            $("#AE_btn_place, #bt-menu-map-marker").click(function () {
                AEFC.curView = "place";
                if (AEFC_PHP.CanPropose) {
                    $('#placeToAdd').find('input:text').val('');
                    $("#placeToAdd").dialog({
                        autoOpen: false,
                        title: AEFC.translate("New place"),
                        width: AEFC.dialog_event.width,
                        modal: AEFC.dialog_event.modal,
                        closeOnEscape: AEFC.dialog_event.closeOnEscape,
                        open: function (e, ui) {
                            $('.ui-dialog-buttonpane').find('button:contains("Cancel")').button("option", "label", AEFC.translate("cancel"));
                            $('.ui-dialog-buttonpane').find('button:contains("Create")').button("option", "label", AEFC.translate("create"));
                        },
                        buttons: {
                            "Create": function () {
                                var placeToSave,
                                    placeToRead,
                                    ResponseText;
                                placeToSave = {};
                                placeToSave.type_action = "INS";
                                placeToSave.title = $("#AEFC-placeToAdd-title").val();
                                placeToSave.address = $("#AEFC-placeToAdd-address").val();
                                placeToSave.zipcode = $("#AEFC-placeToAdd-zipcode").val();
                                placeToSave.city = $("#AEFC-placeToAdd-city").val();
                                placeToSave.country = $("#AEFC-placeToAdd-country").find(":selected").val();

                                placeToRead = {
                                    type_action: "READ"
                                };

                                if (placeToSave.title === "") {
                                    toastr.error(AEFC.translate("title required"));
                                } else {
                                    $.ajax({
                                        type: 'GET',
                                        contentType: "application/json",
                                        data: {
                                            place: JSON.stringify(placeToSave)
                                        },
                                        url: AEFC.urls.placecrud,
                                        dataType: "json",
                                        async: false,
                                        success: function (data) {
                                            $("#placeToAdd").dialog("close");
                                            if (AEFC_Params.logstatus) {
                                                toastr.success(AEFC.translate('Place created'));
                                            }
                                        }
                                    });

                                    // refresh des select box
                                    ResponseText = $.ajax({
                                        type: 'POST',
                                        url: AEFC.urls.placecrud,
                                        data: {
                                            place: JSON.stringify(placeToRead)
                                        },
                                        cache: false,
                                        async: false
                                    }).responseText;

                                    $("#AEFC-search-places, #AEFC-eventToUpdate-places, #AEFC-eventToAdd-places").html(ResponseText);
                                    $("#AEFC-search-places, #AEFC-eventToUpdate-places, #AEFC-eventToAdd-places").selectmenu({
                                        icons: [{
                                            find: '.avatar'
                                        }
                                        ],
                                        bgImage: function () {
                                            return 'url(' + AEFC_PHP.url + $(this).attr("title") + ')';
                                        },
                                        style: 'dropdown',
                                        width: AEFC.select_std.width,
                                        maxHeight: AEFC.select_std.maxHeight
                                    });
                                    if (AEFC_Params.logstatus) {
                                        toastr.success(AEFC.translate('Places refreshed'));
                                    }
                                    $(this).dialog("close");
                                }
                            },
                            Cancel: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            AEFC.Refresh();
                            AEFC.curView = "calendar";
                        }
                    });

                    var dialog = $("#placeToAdd").dialog();

                    /*jslint nomen: true*/
                    dialog.data("uiDialog")._title = function (title) {
                        title.html(this.options.title);
                    };
                    /*jslint nomen: false*/
                    dialog.dialog('option', 'title', '<span class="title-newplace">' + AEFC.translate("New place") + '</span>');
                    dialog.dialog('open');
                } else {
                    toastr.error(AEFC.translate('Not enough permissions'));
                }
            });
        }

        // On definit le bouton d'ajout d'un évènement
        if (AEFC_Params.toolbar.shownew) {
            $("#AE_btn_new").button({
                icons: {
                    primary: "ui-icon-mynewevent"
                },
                text: false
            });

            $("#AE_btn_new, #bt-menu-calendar").click(function () {
                AEFC.curView = "event";
                if (AEFC_PHP.CanPropose) {
                    $('#eventToUpdate').find('input:text').val('');
                    $("#AEFC-eventToUpdate-tabs4").show();
                    $('#AEFC-eventToUpdate-agendas').val(0).selectmenu();
                    $('#AEFC-eventToUpdate-activities').val(0).selectmenu();
                    $('#AEFC-eventToUpdate-places').val(0).selectmenu();
                    $('#AEFC-eventToUpdate-hot').wCheck('check', 0);
                    $('#AEFC-eventToUpdate-hot').prop('checked', 0).change();
                    $("#eventToUpdate").dialog({
                        autoOpen: false,
                        title: AEFC.translate("New event"),
                        width: AEFC.dialog_event.width,
                        modal: AEFC.dialog_event.modal,
                        closeOnEscape: AEFC.dialog_event.closeOnEscape,
                        open: function (e, ui) {
                            $("[tabIndex='1']").trigger("blur");
                            $('#AEFC-eventToUpdate-description').html('');
                            $('.ui-dialog-buttonpane').find('button:contains("Cancel")').button("option", "label", AEFC.translate("cancel"));
                            $('.ui-dialog-buttonpane').find('button:contains("Create")').button("option", "label", AEFC.translate("create"));
                            $('#AEFC-eventToUpdate-description').editable({
                                inlineMode: false,
                                language: AEFC_PHP.language,
                                minHeight: 250,
                                imageUploadURL: AEFC_PHP.url + 'administrator/components/com_allevents/helpers/AEupload.php',
                                crossDomain: false,
                                imageUploadParams: {
                                    root: AEFC_PHP.url
                                },
                                imageErrorCallback: function (error) {
                                    if (error.code === 1) {
                                        alert('Bad link');
                                    } else if (error.code === 2) {
                                        alert('No link in upload response');
                                    } else if (error.code === 3) {
                                        alert('Error during file upload');
                                    } else if (error.code === 4) {
                                        alert('Parsing response failed');
                                    } else if (error.code === 5) {
                                        alert('Image too large');
                                    } else if (error.code === 6) {
                                        alert('Invalid image type');
                                    } else if (error.code === 7) {
                                        alert('Image can be uploaded only to same domain in IE 8 and IE 9');
                                    }
                                }
                            });
                            $("#AEFC-eventToUpdate-description").editable("setHTML", "");
                        },
                        buttons: {
                            "Create": function () {
                                var eventToSave,
                                    html,
                                    str,
                                    dStartDay,
                                    dStart,
                                    dEnd,
                                    Duration,
                                    Offset,
                                    dstartday,
                                    dstart,
                                    dend,
                                    dates,
                                    j,
                                    len;

                                //la methode gethtml renvoie un tableau
                                html = $("#AEFC-eventToUpdate-description").editable("getHTML");
                                if (Object.prototype.toString.call(html) === '[object Array]') {
                                    html = html[0];
                                }

                                eventToSave = {
                                    type_action: "INS",
                                    title: $("#AEFC-eventToUpdate-eventName").val(),
                                    agenda_id: $('#AEFC-eventToUpdate-agendas').val(),
                                    activity_id: $('#AEFC-eventToUpdate-activities').val(),
                                    place_id: $('#AEFC-eventToUpdate-places').val(),
                                    description: html,
                                    allday: 0,
                                    hot: ($('#AEFC-eventToUpdate-hot').prop('checked')) ? "1" : "0",
                                    enrolment_max_participant: $('#AEFC-eventToUpdate-enrolment_max_participant').val(),
                                    start: $("#AEFC-eventToUpdate-Start").val(),
                                    end: $("#AEFC-eventToUpdate-End").val(),
                                    startday: $("#AEFC-eventToUpdate-Start").val() + " 00:00"
                                };

                                if ($("#AEFC-eventToUpdate-Start-Time").val() === '') {
                                    eventToSave.start += " 00:00";
                                } else {
                                    eventToSave.start = eventToSave.start + " " + $("#AEFC-eventToUpdate-Start-Time").val();
                                }
                                if ($("#AEFC-eventToUpdate-End-Time").val() === '') {
                                    eventToSave.end += " 00:00";
                                } else {
                                    eventToSave.end = eventToSave.end + " " + $("#AEFC-eventToUpdate-End-Time").val();
                                }

                                if (moment(eventToSave.start, AEFC_Params.formats.momentdatetimeformat) > moment(eventToSave.end, AEFC_Params.formats.momentdatetimeformat)) {
                                    AEFC.impossible_insert_event();
                                } else {
                                    str = $("#repeat-event-dialog-repeat-type").find("option:selected").val();

                                    if (str === 'none') {
                                        AEFC.save_event(eventToSave);
                                        if (AEFC_Params.logstatus) {
                                            toastr.success(AEFC.translate('Event created'));
                                        }
                                    } else {
                                        dates = AEFC.rrule.rule.all(function (date, i) {
                                            return AEFC.rrule.rule.options.count;

                                        }); // dates

                                        dStartDay = moment(eventToSave.startday, AEFC_Params.formats.momentdatetimeformat).toDate();
                                        dStart = moment(eventToSave.start, AEFC_Params.formats.momentdatetimeformat).toDate();
                                        dEnd = moment(eventToSave.end, AEFC_Params.formats.momentdatetimeformat).toDate();

                                        Duration = Math.floor((dEnd - dStart) / 1000);
                                        Offset = Math.floor((dStart - dStartDay) / 1000);
                                        for (j = 0, len = dates.length; j < len; j += 1) {
                                            dstartday = dates[j];
                                            dstart = new Date(dstartday.getTime() + (1000 * Offset));
                                            dend = new Date(dstart.getTime() + (1000 * Duration));
                                            eventToSave.start = moment(dstart, AEFC_Params.formats.momentdatetimeformat).format(AEFC_Params.formats.momentdatetimeformat);
                                            eventToSave.end = moment(dend, AEFC_Params.formats.momentdatetimeformat).format(AEFC_Params.formats.momentdatetimeformat);
                                            AEFC.save_event(eventToSave);
                                        }
                                        AEFC.refreshneeded = true;
                                        if (AEFC_Params.logstatus) {
                                            toastr.success(dates.length + ' ' + AEFC.translate('Event created'));
                                        }
                                    }
                                    $(this).dialog("close");
                                }
                            },
                            Cancel: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            AEFC.refreshneeded = true;
                            AEFC.Refresh();
                            AEFC.curView = "calendar";
                        }
                    });

                    var dialog = $("#eventToUpdate").dialog();

                    /*jslint nomen: true*/
                    dialog.data("uiDialog")._title = function (title) {
                        title.html(this.options.title);
                    };
                    /*jslint nomen: false*/
                    dialog.dialog('option', 'title', '<span class="title-newevent">' + AEFC.translate("New event") + '</span>');
                    dialog.dialog('open');
                } else {
                    toastr.success(dates.length + ' ' + AEFC.translate('Event created'));
                }
            });
        }

        // On adapte les listes deroulantes de la vue eventToUpdate
        $("#AEFC-eventToUpdate-places, #AEFC-eventToUpdate-agendas, #AEFC-eventToUpdate-activities, #AEFC-eventToAdd-activities, #AEFC-eventToAdd-agendas, #AEFC-eventToAdd-places, #dialog-parsing-agendas").selectmenu({
            icons: [{
                find: '.avatar'
            }
            ],
            bgImage: function () {
                return 'url(' + AEFC_PHP.url + $(this).attr("title") + ')';
            },
            style: 'dropdown',
            width: AEFC.select_std.width,
            maxHeight: AEFC.select_std.maxHeight
        });

        // on met en forme la checkbox hot
        $('input.checkbox-star').wCheck({
            theme: 'square-inset-yellow',
            selector: 'square-dot-yellow',
            highlightLabel: true
        });

        // on met en forme la recurrence
        $('#repeat-event-dialog-repeat-type').selectmenu({
            style: 'dropdown',
            width: AEFC.select_std.width,
            maxHeight: AEFC.select_std.maxHeight
        });

        $('#repeat-event-dialog-count').val('30');

        $('#repeat-event-dialog-weekly-repeat-days').buttonset();

        // choix de la recurrence
        $("#repeat-event-dialog-repeat-type").change(function () {
            var d = moment($("#AEFC-eventToUpdate-Start").val(), AEFC_Params.formats.momentdatetimeformat);
            if (typeof d != 'undefined') {
                $("#repeat-event-dialog-weekly-repeat-days-row").hide();
                $("#repeat-event-dialog-monthly-repeat-options-row").hide();
                $("#repeat-event-dialog-end-date-row").show();
                $("#repeat-event-dialog-interval").show();
                var str = $("#repeat-event-dialog-rep").find("option:selected").val();
                switch (str) {
                    case 'none':
                        $("#repeat-event-dialog-end-date-row").hide();
                        $("#repeat-event-dialog-interval").hide();
                        break;
                    case 'daily':
                        $("#repeat-event-dialog-interval-time-unit").text(AEFC.translate("days"));
                        break;
                    case 'weekly':
                        $("#repeat-event-dialog-interval-time-unit").text(AEFC.translate("weeks"));
                        $("#repeat-event-dialog-weekly-repeat-days-row").show();
                        break;
                    case 'monthly':
                        $("#repeat-event-dialog-interval-time-unit").text(AEFC.translate("months"));
                        break;
                    case 'yearly':
                        $("#repeat-event-dialog-interval-time-unit").text(AEFC.translate("years"));
                        break;
                } // switch (str) {
            }
        });

        // On definit le bouton Test Recurrence avec son code
        $(".AErrule").change(function () {
            var d,
                str,
                nb_byweekday,
                getDay;
            d = moment($("#AEFC-eventToUpdate-Start").val(), AEFC_Params.formats.momentdatetimeformat).toDate();
            getDay = function (i) {
                var tab;
                tab = [RRule.MO, RRule.TU, RRule.WE, RRule.TH, RRule.FR, RRule.SA, RRule.SU];
                return tab[i];
            };

            str = $("#repeat-event-dialog-repeat-type").find("option:selected").val();
            if (str === 'none') {
                $('#repeat-event-dialog-text-output').text(AEFC.translate('No recurrence'));
            } else {
                if ((typeof d != 'undefined') && (d)) {
                    AEFC.rrule.options = {};
                    AEFC.rrule.options.dtstart = new Date(d.getTime());
                    AEFC.rrule.options.interval = parseInt($('#repeat-event-dialog-').find('option:selected').val(), 10);
                    AEFC.rrule.options.count = parseInt($('#repeat-event-dialog-count').val(), 10);
                    AEFC.rrule.options.wkst = 0;

                    switch (str) {
                        case 'daily':
                            AEFC.rrule.options.freq = RRule.DAILY;
                            break;
                        case 'monthly':
                            AEFC.rrule.options.freq = RRule.MONTHLY;
                            break;
                        case 'yearly':
                            AEFC.rrule.options.freq = RRule.YEARLY;
                            break;
                        case 'weekly':
                            AEFC.rrule.options.freq = RRule.WEEKLY;
                            nb_byweekday = 1;
                            AEFC.rrule.options.byweekday = {};

                            $("[id^='repeat-event-dialog-weekly-repeat-day-']").each(function (i, item) {
                                if ($(item).is(":checked")) {
                                    AEFC.rrule.options.byweekday[nb_byweekday] = this.id.slice(-1);
                                    nb_byweekday += 1;
                                }
                            });

                            AEFC.rrule.options.byweekday = $.map(AEFC.rrule.options.byweekday, getDay);
                            break;
                    }
                    AEFC.rrule.rule = new RRule(AEFC.rrule.options);
                    $('#repeat-event-dialog-text-output').text(AEFC.rrule.rule.toText(AEFC.gettext, $.datepicker.regional.fr));
                }
            }
        });

        //
        // Keyboard..
        //
        Mousetrap.bind(AEFC.keys.prev, function (e) {
            if (AEFC.curView === "calendar") {
                $('#AEFC').fullCalendar('prev');
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.next, function (e) {
            if (AEFC.curView === "calendar") {
                $('#AEFC').fullCalendar('next');
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.today, function (e) {
            if (AEFC.curView === "calendar") {
                $('#AEFC').fullCalendar('today');
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.new, function (e) {
            if (AEFC.curView === "calendar") {
                $("#AE_btn_new").click();
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.day, function (e) {
            if (AEFC.curView === "calendar") {
                $('#AEFC').fullCalendar('changeView', 'agendaDay');
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.month, function (e) {
            if (AEFC.curView === "calendar") {
                $('#AEFC').fullCalendar('changeView', 'month');
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.week, function (e) {
            if (AEFC.curView === "calendar") {
                $('#AEFC').fullCalendar('changeView', 'agendaWeek');
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.list, function (e) {
            if (AEFC.curView === "calendar") {
                $('#AEFC').fullCalendar('changeView', 'agendaList');
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.escape, function (e) {
            if (AEFC.selected_event_id) {
                AEFC.selected_div.css('border', '');
                AEFC.selected_div.css('border-color', AEFC.selected_bordercolor);
                AEFC.clear_selection();
            }
        });

        Mousetrap.bind(AEFC.keys.delete, function (e) {
            if (AEFC_PHP.CanPropose && (AEFC.curView === "calendar") && AEFC.selected_event_id) {
                AEFC.delete_event(AEFC.selected_event_id);
                AEFC.clear_selection();
            }
        });

        $('.fc-button-next').attr('title', AEFC.translate('AEFC_TEXT_NEXTMONTH'));
        $('.fc-button-nextYear').attr('title', AEFC.translate('AEFC_TEXT_NEXTYEAR'));
        $('.fc-button-prev').attr('title', AEFC.translate('AEFC_TEXT_PREVIOUSMONTH'));
        $('.fc-button-prevYear').attr('title', AEFC.translate('AEFC_TEXT_PREVIOUSYEAR'));
    });
}(jQuery));