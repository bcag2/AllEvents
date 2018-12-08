/**
 * @name        Extensions Manager CK
 * @package        com_extensionsmanagerck
 * @copyright    Copyright (C) 2016. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 * @author        Cedric Keiflin - http://www.template-creator.com - http://www.joomlack.fr
 */


jQuery(document).ready(function () {
    // check the release notes
    ckloadAllData();
});

function ckloadAllData(reload) {
    if (!reload) {
        reload = '0';
    }
    var toolbarBtn = jQuery('#toolbar-ckloadAllData > button > span');
    toolbarBtn.attr('ckloading', 0).addClass('ckwait');
    jQuery('.ckextension').each(function () {
        toolbarBtn.attr('ckloading', parseInt(toolbarBtn.attr('ckloading')) + 1);
        ckGetExtensionData(this, reload);
    });
}

function ckGetExtensionData(ext, reload) {
    if (!reload) {
        reload = '0';
    }
    var toolbarBtn = jQuery('#toolbar-ckloadAllData > button > span');
    var jsonFile = jQuery(ext).attr('data-type') + '_' + jQuery(ext).attr('data-element') + '_notes.json';
    jQuery.ajax({
        type: "POST",
        url: "index.php?option=com_extensionsmanagerck&task=ajaxGetFile",
        dataType: "json",
        data: {
            url: "http://update.joomlack.fr/" + jsonFile,
            reload: reload
        }
    }).done(function (response) {
        // console.log(response);
        var extRow = jQuery(ext);
        extRow.find('.cklatestversion > span').text(response.version);
        if (extRow.attr('data-installed')) {
            extRow.find('ckinstallbtn').hide();
            // check if the latest version if higher that the current installed version
            var installedversion = extRow.find('.ckinstalledversion').text().trim();
            if (compareVersions(response.version, installedversion)) {
                extRow.find('.ckupdatebtn').show();
                extRow.find('.ckinstalledversion .badge').addClass('badge-warning');
                extRow.find('.ckreleasenotesbtn').show();
                var notes = ckGetReleaseNotes(response, installedversion);
                extRow.find('.ckreleasenotespopup').empty().append(notes);
            } else {
                if (extRow.attr('data-installed') == '1') {
                    extRow.find('.ckinstalledversion .badge').addClass('badge-success');
                }
            }
        }
        toolbarBtn.attr('ckloading', parseInt(toolbarBtn.attr('ckloading')) - 1);
        if (toolbarBtn.attr('ckloading') == 0) {
            toolbarBtn.removeClass('ckwait');
        }
    }).fail(function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
        jQuery(ext).find('.cklatestversion > span').text('error').addClass('badge-important');
    });
}

function compareVersions(installed, required) {
    var a = installed.split(".");
    var b = required.split(".");

    for (var i = 0; i < a.length; ++i) {
        a[i] = Number(a[i]);
    }
    for (var i = 0; i < b.length; ++i) {
        b[i] = Number(b[i]);
    }
    if (a.length == 2) {
        a[2] = 0;
    }

    if (a[0] > b[0]) {
        return true;
    }
    if (a[0] < b[0]) {
        return false;
    }

    if (a[1] > b[1]) {
        return true;
    }
    if (a[1] < b[1]) {
        return false;
    }

    if (a[2] > b[2]) {
        return true;
    }
    if (a[2] < b[2]) {
        return false;
    }

    return false;
}

function ckGetReleaseNotes(response, installedversion) {
    var notes = '';
    for (var version in response.releasenotes) {
        if (compareVersions(version, installedversion)) {
            // if (! jQuery("#updatealert").text().length) {
            // jQuery("#updatealert").append("<span class=\"label label-warning\" style=\"font-size:1em;padding:0.4em;\">' . JText::_('MEDIABOXCK_NEW_VERSION_AVAILABLE') . '</span>");
            // jQuery("#updatealert").append("<a href=\"http://www.joomlack.fr/en/joomla-extensions/mediabox-ck\" target=\"_blank\" class=\"pull-right btn btn-info\" style=\"font-size:1em;padding:0.4em;\"><i class=\"icon icon-download\"></i>' . JText::_('MEDIABOXCK_DOWNLOAD') . '</a>");
            // }
            notes += writeVersionInfo(response, version);
        }
    }
    return notes;
}

function writeVersionInfo(response, version) {
    var txt = "<div>";
    txt += "<strong class=\"badge\">Version : " + version + "</strong>";
    txt += " - Date : " + response.releasenotes[version]["date"];
    txt += "</div>";
    txt += "<ul>";
    for (i = 0; i < response.releasenotes[version]["notes"].length; i++) {
        txt += "<li>" + response.releasenotes[version]["notes"][i] + "</li>";
    }
    txt += "</ul>";

    return txt;
}

function ckShowReleaseNotes(btn) {
    CKBox.open({handler: 'inline', content: jQuery(btn).next().attr('id')});
}

function ckInstallExt(btn) {
    if (!confirm('Are you sure that you want to install this extension ?')) {
        return;
    }

    var extRow = jQuery(jQuery(btn).parents('tr')[0]);
    // add the wait icon for user information
    extRow.find('.ckupdatebtn').after('<span class="ckwait">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');
    extRow.find('.ckinstallbtn').after('<span class="ckwait">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>');

    // launch the install process
    // var install_url = 'http://update.joomlack.fr/' + extRow.attr('data-updatexml');
    var install_url = 'http://www.joomlack.fr/index.php?option=com_dms&amp;task=doc_download&amp;updater=true&amp;id=' + extRow.attr('data-downloadid');
    jQuery.ajax({
        type: "POST",
        url: "index.php?option=com_extensionsmanagerck&task=ajaxInstallExt",
        data: {
            install_url: install_url
        }
    }).done(function (response) {
        // console.log(response);
        location.reload();
    }).fail(function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
    });
}