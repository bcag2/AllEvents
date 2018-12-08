<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('jquery.framework');
JHtml::_('behavior.modal');

$document = JFactory::getDocument();

$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.min.css');

$document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/jquery.icalendar.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/sprintf/1.0.3/sprintf.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js');
$document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/jquery.percentageloader-0.2.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js');
?>

<style>
    #topLoader {
        width: 210px;
        height: 210px;
        margin-bottom: 32px;
    }

    .dropzone {
        border: 2px dashed #0087f7;
        border-radius: 5px;
        min-height: 210px;
        padding: 30px;
    }
</style>
<?php if (!empty($this->sidebar)): ?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
    <?php else : ?>
    <div id="j-main-container">
        <?php endif; ?>

        <div class="aepanel aeleft">
            <div class="row-fluid">
                <div class="span3 aeleft">
                    <div class="control-group">
                        <div class="controls"><?php echo $this->form->getInput('activity_id'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('agenda_id'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('category_id'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('place_id'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('pubic_id'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('ressource_id'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('section_id'); ?></div>
                    </div>
                </div>
                <div class="span4 aeleft">
                    <div id="dropzone">
                        <form id="mydropzone" class="dropzone dz-clickable no-margin">
                        </form>
                    </div>
                </div>
                <div class="span2 aeleft">
                    <div id="topLoader"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Date.prototype.isValid = function () {
            return this.getTime() === this.getTime();
        };

        (function ($) { // Hide scope, no $ conflict
            // jQuery
            Dropzone.autoDiscover = false; // keep this line if you have multiple dropzones in the same page
            $("#mydropzone").dropzone({
                url: "<?php echo JRoute::_('index.php?option=com_allevents') . '&task=uploadics';?>",
                maxFiles: 1,
                acceptedFiles: ".ics,.ICS",
                accept: function (file, done) {
                    if (file.type === "text/calendar") {
                        done();
                    } else {
                        done(file.type + " not supported");
                    }
                },
                success: function (response) {
                    var x = JSON.parse(response.xhr.responseText);
                    $.ajax({
                        url: '<?php echo JUri::root(true) . '/media/com_allevents/ics/';?>' + x.file,
                        dataType: 'text',
                        async: false,
                        success: function (data) {

                            var ics = ical.parseICS(data);
                            var totalKb = 0;
                            var sMsg = "";
                            for (var k in ics) {
                                if (ics.hasOwnProperty(k)) {
                                    if (ics[k].type == 'VEVENT') {
                                        totalKb += 1;
                                    }
                                }
                            }

                            if ($('#jform_agenda_id').val() == 0) {
                                sMsg = sprintf('<?php echo addslashes(JText::_('COM_ALLEVENTS_IMPORT_NEED_CONFIRM')); ?>', totalKb);
                                sMsg += ' <?php echo addslashes(JText::_('COM_ALLEVENTS_IMPORT_NO_AGENDA_SELECTED')); ?>';
                            } else {
                                sMsg = sprintf('<?php echo addslashes(JText::_('COM_ALLEVENTS_IMPORT_NEED_CONFIRM')); ?>', totalKb);
                            }
                            );
                    confirm(sMsg, function () {
                        var i = 0;
                        for (var k in ics) {
                            if (ics.hasOwnProperty(k)) {
                                var ev = ics[k];
                                if (ev.type == 'VEVENT') {
                                    var dtstart = new Date(ev.start);
                                    var dtend = new Date(ev.end);
                                    if ((dtstart.isValid()) && (dtend.isValid())) {
                                        var StrStart = dtstart.toLocaleFormat('<?php echo $this->params['gdatetime_technicalformatAE'];?>');
                                        var StrEnd = dtend.toLocaleFormat('<?php echo $this->params['gdatetime_technicalformatAE']; ?>');
                                        var StrAllDay = StrStart === StrEnd;
                                        if (ev.summary !== "undefined") {
                                            var StrTitle = ev.summary;
                                        }
                                        if (ev.location !== "undefined") {
                                            var StrLocation = ev.location;
                                        }
                                        if (ev.description !== "undefined") {
                                            var StrDescription = ev.description.val;
                                        }
                                        if (ev.url !== "undefined") {
                                            var StrURL = ev.url;
                                        }

                                        var data = {
                                            jform: {
                                                id: 0,
                                                titre: StrTitle,
                                                date: StrStart,
                                                enddate: StrEnd,
                                                allday: StrAllDay,
                                                description: StrDescription,
                                                vignette: '',
                                                activity_id: $('#jform_activity_id').val(),
                                                agenda_id: $('#jform_agenda_id').val(),
                                                category_id: $('#jform_category_id').val(),
                                                pubic_id: $('#jform_pubic_id').val(),
                                                ressource_id: $('#jform_ressource_id').val(),
                                                section_id: $('#jform_section_id').val()
                                            }
                                        };
                                        data['<?php echo JSession::getFormToken();?>'] = '1';
                                        data['ajax'] = '1';
                                        data['id'] = 0;
                                        console.log(data);
                                        $.ajax({
                                            type: 'POST',
                                            async: false,
                                            url: 'index.php?option=com_allevents&task=event.import',
                                            data: data,
                                            success: function (data) {
                                                console.log('ok');
                                            }
                                        });
                                        $topLoader.percentageLoader({
                                            progress: (i + 1) / totalKb
                                        });
                                        $topLoader.percentageLoader({
                                            value: "" + (i + 1) + "/" + totalKb
                                        });
                                        i += 1;
                                    }
                                }
                            }
                        }
                    });
                }
            });
            this.removeAllFiles();
            topLoaderRunning = false;
        },
            maxfilesexceeded;
        :
        function (file) {
            this.removeAllFiles();
            this.addFile(file);
        }
        })

        var $topLoader = $("#topLoader").percentageLoader({
            width: 210,
            height: 210,
            controllable: true,
            progress: 0.5,
            value: 0,
            onProgressUpdate: function (val) {
                this.setValue(Math.round(val * 100.0));
            }
        });
        $topLoader.percentageLoader({
            value: " "
        });
        var topLoaderRunning = false;
        })
        (jQuery);
    </script>