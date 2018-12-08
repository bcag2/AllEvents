(function ($) {
    "use strict";
    /*jslint white: true */
    /*global jQuery*/
    $(document).ready(function () {
        $('#mod_aedrag').find('div.external-event').each(function () {
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });
        });
    });
}(jQuery));
