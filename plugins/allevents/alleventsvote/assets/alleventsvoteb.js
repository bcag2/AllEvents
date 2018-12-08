jQuery(document).ready(function () {
    "use strict";

    var form = jQuery('#jform_attribs_rates');
    var rateList = jQuery('.ratingWrapper');
    var errors = jQuery('#ratingmanager_errors');

    rateList.sortable({
        handle: '.icon-menu',
        stop: function (evt, ui) {
            rates2JSON();
        }
    });
    rateList.disableSelection();

    jQuery('#ratingform_add').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        errors.html('');
        if (jQuery('#ratingmanager_feature').val() === '') {
            errors.append('<div class="alert">' + errors.data('empty-text') + '</div>');
            return;
        }
        // if(jQuery('#ratingmanager_value').val() > 10){ jQuery('#ratingmanager_value').val('10'); }
        // if(jQuery('#ratingmanager_value').val() < 0){ jQuery('#ratingmanager_value').val('0'); }
        // check if item already exists
        var duplicate = findDuplicate(jQuery('#ratingmanager_feature').val());
        if (!duplicate) {
            // rateList.append('<li><span class="icon-menu"></span> <span class="rate-label">'+jQuery('#ratingmanager_feature').val().trim()+'</span> -  <span class="rate-value">'+jQuery('#ratingmanager_value').val()+'</span> / <span class="rate-nb">'+jQuery('#ratingmanager_nb').val()+'</span><a href="#" class="rate-remove">'+rateList.data('remove-text')+'</a></li>');
            rateList.append('<li><span class="icon-menu"></span> <span class="rate-label">' + jQuery('#ratingmanager_feature').val().trim() + '</span> <a href="#" class="rate-remove">' + rateList.data('remove-text') + '</a></li>');
            rates2JSON();
            jQuery('#ratingmanager_feature').val('');
            jQuery('#ratingmanager_feature').focus();
        } else {
            errors.append('<div class="alert">' + errors.data('exists-text') + '</div>');
        }
    });

    jQuery('#ratingmanager_feature').keypress(function (e) {
        if (e.which == 13) {
            jQuery('#ratingmanager_value').focus();
        }
    });

    jQuery('#ratingmanager_value').keypress(function (e) {
        if (e.which == 13) {
            jQuery('#ratingform_add').trigger('click');
        }
    });

    jQuery('.rate-remove').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        errors.html('');
        jQuery(this).closest('li').fadeOut('slow', function () {
            jQuery(this).remove();
            rates2JSON();
        });
    });

    function rates2JSON() {
        if (jQuery('.ratingWrapper li').length) {
            var items = jQuery('.ratingWrapper > li').map(function () {
                var item = {};
                item['label'] = jQuery(this).find('.rate-label').text();
                // item['val'] = jQuery(this).find('.rate-value').text();
                // item['nb'] = jQuery(this).find('.rate-nb').text();
                return item;
            }).get();
            form.val(JSON.stringify(items));
        }
        return true;
    }

    function findDuplicate(prop) {
        var duplicate = false;
        jQuery('.rate-label').each(function (i, el) {
            if (jQuery(el).text().toLowerCase() === prop.toLowerCase().trim()) {
                duplicate = true;
                return;
            }
        });
        return duplicate;
    }
});

