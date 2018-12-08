(function ($) {
    //TODO : dct, dcb...

    "use strict";
    /*jslint white: true, unparam: true */
    /*global AEFC, jQuery, alert*/

    $(document).ready(function () {
        var AEFCmod = {
            events: AEFC_PHP.JPATH_COMPONENT + '/index.php?option=com_allevents&task=display&view=fullcalendar&layout=jsonevt&format=json'
        };

        if ($('#AEFC').length) // use this if you are using id to check
        {
            $('#AE-filters').hide();
        }

        $('[id*="onoffswitch"]').change(function () {
            var tabagenda,
                tabgcalendar,
                val = "",
                i = 0;
            tabagenda = $("#mod_aefilters").find(":checkbox:checked").map(function () {
                val = $(this).attr('data-id');
                if (val.substr(0, 1) === "A") {
                    return val.substr(1);
                }
            }).get();

            tabgcalendar = $("#mod_aefilters").find(":checkbox:checked").map(function () {
                val = $(this).attr('data-id');
                if (val.substr(0, 1) === "G") {
                    return val.substr(1);
                }
            }).get();

            if ($('#AEFC').length) // use this if you are using id to check
            {
                AEFC.source[0] = {
                    url: AEFCmod.events,
                    type: 'POST',
                    data: {
                        dc: modAEFC_Params.dc,
                        dct: modAEFC_Params.dct,
                        dcb: modAEFC_Params.dcb,
                        tabAgendas: JSON.stringify(tabagenda)
                    },
                    error: function () {
                        alert('Loading_Error');
                    }
                };

                $('#AEFC').fullCalendar('removeEventSource', AEFC.source[0])
                    .fullCalendar('removeEventSource', AEFC.source[1])
                    .fullCalendar('removeEventSource', AEFC.source[2])
                    .fullCalendar('removeEventSource', AEFC.source[3])
                    .fullCalendar('removeEventSource', AEFC.source[4])
                    .fullCalendar('removeEventSource', AEFC.source[5])
                    .fullCalendar('refetchEvents');

                $('#AEFC').fullCalendar('addEventSource', AEFC.source[0]);

                var toto = 0;

                for (i = 1; i < 6; i += 1) {
                    if (AEFC.source[i] !== undefined) {
                        if (tabgcalendar.indexOf(AEFC.source[i].id) !== -1) {
                            $('#AEFC').fullCalendar('addEventSource', AEFC.source[i]);
                            toto = 1;
                        }
                    }
                }
                if (toto === 1) {
                    $('#AEFC').fullCalendar('refetchEvents');
                }
            }
        });
    });
}(jQuery));
