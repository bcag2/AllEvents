<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

AllEventsHelperOverride::jquery();
$document = JFactory::getDocument();
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/froala-editor/1.2.2/js/froala_editor.min.js');
$document->addScript(AllEventsHelperOverride::GetScript('jquery.timepicker.js'));
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.js');
$document->addScript(AllEventsHelperOverride::GetScript('pikaday.jquery.js'));
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/datepair.js/0.4.15/datepair.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/datepair.js/0.4.15/jquery.datepair.min.js');

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('jquery.timepicker.css'));
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('pikaday.css'));
// on met à la fin les scripts génériques
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();
$params = AllEventsHelperParam::getGlobalParam();
$Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);
// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);
// global vars

$user = JFactory::getUser();
// make sure user is logged in
if ($user->get('id') == 0) {
    JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_ERROR_MUST_LOGIN'), 'warning');
    $joomlaLoginUrl = 'index.php?option=com_users&view=login';

    echo "<br><a href='" . JRoute::_($joomlaLoginUrl) . "'>" . JText::_('COM_ALLEVENTS_LOG_IN') . "</a><br>";
}

?>

    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {

                var navListItems = $('div.setup-panel div a'),
                    allWells = $('.setup-content'),
                    allNextBtn = $('.nextBtn');

                allWells.hide();

                navListItems.click(function (e) {
                    e.preventDefault();
                    var $target = $($(this).attr('href')),
                        $item = $(this);

                    if (!$item.hasClass('disabled')) {
                        navListItems.removeClass('btn-primary').addClass('btn-default');
                        $item.addClass('btn-primary');
                        allWells.hide();
                        $target.show();
                        $target.find('input:eq(0)').focus();
                    }
                });

                allNextBtn.click(function () {
                    var curStep = $(this).closest(".setup-content"),
                        curStepBtn = curStep.attr("id"),
                        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                        curInputs = curStep.find("input[type='text'],input[type='url']"),
                        isValid = true;

                    $(".form-group").removeClass("has-error");
                    for (var i = 0; i < curInputs.length; i++) {
                        if (!curInputs[i].validity.valid) {
                            isValid = false;
                            $(curInputs[i]).closest(".form-group").addClass("has-error");
                        }
                    }

                    if (isValid) {
                        nextStepWizard.removeAttr('disabled').trigger('click');
                    }
                });

                $('div.setup-panel div a.btn-primary').trigger('click');

                $('*[rel=tooltip]').tooltip();

                // Turn radios into btn-group
                $('.radio.btn-group label').addClass('btn');
                $('.btn-group label:not(.active)').click(function () {
                    var label = $(this),
                        input = $('#' + label.attr('for'));

                    if (!input.prop('checked')) {
                        label.closest('.btn-group').find('label').removeClass('active btn-success btn-danger btn-primary');
                        if (input.val() == '') {
                            label.addClass('active btn-primary');
                        } else if (input.val() == 0) {
                            label.addClass('active btn-danger');
                        } else {
                            label.addClass('active btn-success');
                        }
                        input.prop('checked', true);
                    }
                });

                $('.btn-group input[checked=checked]').each(function () {
                    if ($(this).val() == '') {
                        $('label[for=' + $(this).attr('id') + ']').addClass('active btn-primary');
                    } else if ($(this).val() == 0) {
                        $('label[for=' + $(this).attr('id') + ']').addClass('active btn-danger');
                    } else {
                        $('label[for=' + $(this).attr('id') + ']').addClass('active btn-success');
                    }
                });

                $('#alternateUiWidgetsExample').find('.time').timepicker({
                    'showDuration': true,
                    'timeFormat': '<?php echo $this->params['gtime_format']; ?>'
                });

                $('#eml_date').pikaday({
                    showWeekNumber: true,
                    field: document.getElementById('datepicker-week-numbers'),
                    firstDay: <?php echo $this->params['gfirstday_week'];?>, //(0: Sunday, 1: Monday, etc)
                    mainCalendar: 'right',
                    numberOfMonths: 1,
                    format: '<?php echo strtoupper($this->params['gdate_formatAE']); ?>',
                    minDate: new Date('2000-01-01'),
                    maxDate: new Date('2020-12-31'),
                    // defaultDate : new Date('<?php echo JHtml::_('date', $this->item->date, 'Y-m-d');?>'),
                    yearRange: [2000, 2020],
                    i18n: {
                        previousMonth: '<?php echo JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_PREVIOUSMONTH'); ?>',
                        nextMonth: '<?php echo JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_NEXTMONTH'); ?>',
                        months: [<?php echo $this->params['monthNames']; ?>],
                        weekdays: [<?php echo $this->params['dayNames']; ?>],
                        weekdaysShort: [<?php echo $this->params['dayNamesShort']; ?>]
                    }
                });

                $('#eml_enddate').pikaday({
                    showWeekNumber: true,
                    field: document.getElementById('datepicker-week-numbers'),
                    firstDay: <?php echo $this->params['gfirstday_week'];?>, //(0: Sunday, 1: Monday, etc)
                    mainCalendar: 'right',
                    numberOfMonths: 1,
                    format: '<?php echo strtoupper($this->params['gdate_formatAE']); ?>',
                    minDate: new Date('2000-01-01'),
                    maxDate: new Date('2020-12-31'),
                    // defaultDate : new Date('<?php echo JHtml::_('date', $this->item->enddate, 'Y-m-d');?>'),
                    yearRange: [2000, 2020],
                    i18n: {
                        previousMonth: '<?php echo JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_PREVIOUSMONTH'); ?>',
                        nextMonth: '<?php echo JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_NEXTMONTH'); ?>',
                        months: [<?php echo $this->params['monthNames']; ?>],
                        weekdays: [<?php echo $this->params['dayNames']; ?>],
                        weekdaysShort: [<?php echo $this->params['dayNamesShort']; ?>]
                    }
                });
                var picker = $('#eml_date').data('pikaday');
                picker.setDate('<?php echo JHtml::_('date', $this->item->date, 'Y-m-d');?>');

                picker = $('#eml_enddate').data('pikaday');
                picker.setDate('<?php echo JHtml::_('date', $this->item->enddate, 'Y-m-d');?>');

                var jform_allday = <?php echo (isset($this->item->allday)) ? $this->item->allday : 0;?> ;
                jform_allday = !jform_allday;

                var alternateUiWidgetsExampleEl = document.getElementById('alternateUiWidgetsExample');
                var alternateWidgetsDatepair = new Datepair(alternateUiWidgetsExampleEl, {
                    parseTime: function (input) {
                        // use moment.js to parse time
                        var m = moment(input.value, '<?php echo $this->params['gtime_formatAEFC']; ?>');
                        return m.toDate();
                    },
                    updateTime: function (input, dateObj) {
                        var m = moment(dateObj);
                        $(input).timepicker('setTime', m.format('<?php echo $this->params['gtime_formatAEFC']; ?>'));
                        if (jform_allday == 1) {
                            if ($('#eml_time').val() == "") {
                                $('#jform_date').val($('#eml_date').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);
                            } else {
                                $('#jform_date').val($('#eml_date').val() + ' ' + $('#eml_time').val());
                            }
                            if ($('#eml_endtime').val() == "") {
                                $('#jform_enddate').val($('#eml_enddate').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);
                            } else {
                                $('#jform_enddate').val($('#eml_enddate').val() + ' ' + $('#eml_endtime').val());
                            }
                        }
                        else {
                            $('#jform_date').val($('#eml_date').val());
                            $('#jform_enddate').val($('#eml_enddate').val());
                        }
                        return (true);
                    },
                    parseDate: function (input) {
                        var picker = $(input).data('pikaday');
                        return picker.getDate();
                    },
                    updateDate: function (input, dateObj) {
                        var picker = $(input).data('pikaday');
                        return picker.setDate(dateObj);
                    }
                });

                $('#jform_date').val("<?php
                    if ($this->item->allday == "1") {
                        echo JHtml::_('date', $this->item->date, $this->params['gdate_format']);
                    } else {
                        echo JHtml::_('date', $this->item->date, $this->params['gdatetime_format']);
                    }

                    ?>");

                $('#jform_enddate').val("<?php
                    if ($this->item->allday == "1") {
                        echo JHtml::_('date', $this->item->enddate, $this->params['gdate_format']);
                    } else {
                        echo JHtml::_('date', $this->item->enddate, $this->params['gdatetime_format']);
                    }

                    ?>");

                $("#eml_date, #eml_time, #eml_enddate, #eml_endtime").change(function () {
                    if (jform_allday == 1) {
                        if ($('#eml_time').val() == "") {
                            $('#jform_date').val($('#eml_date').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);
                        } else {
                            $('#jform_date').val($('#eml_date').val() + ' ' + $('#eml_time').val());
                        }
                        if ($('#eml_endtime').val() == "") {
                            $('#jform_enddate').val($('#eml_enddate').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);
                        } else {
                            $('#jform_enddate').val($('#eml_enddate').val() + ' ' + $('#eml_endtime').val());
                        }
                    }
                    else {
                        $('#jform_date').val($('#eml_date').val());
                        $('#jform_enddate').val($('#eml_enddate').val());
                    }
                });

                $('#jform_allday0').click(function () {
                    $('#eml_time, #eml_time_clock, #eml_endtime, #eml_endtime_clock').hide();
                    var data = $('#jform_date').val();
                    var arr = data.split(' ');
                    $('#jform_date').val(arr[0]);
                    data = $('#jform_enddate').val();
                    arr = data.split(' ');
                    $('#jform_enddate').val(arr[0]);
                    jform_allday = 0;
                });

                $('#jform_allday1').click(function () {
                    $('#eml_time, #eml_time_clock, #eml_endtime, #eml_endtime_clock').show();
                    $('#jform_date').val($('#eml_date').val() + ' ' + $('#eml_time').val());
                    $('#jform_enddate').val($('#eml_enddate').val() + ' ' + $('#eml_endtime').val());
                    jform_allday = 1;
                });


                Joomla.submitbutton = function (task) {
                    if (task == 'eventform.cancel') {
                        Joomla.submitform(task, document.getElementById('adminForm'));
                    }
                    else {
                        if (task != 'eventform.cancel' && document.formvalidator.isValid(document.id('adminForm'))) {
                            Joomla.submitform(task, document.getElementById('adminForm'));
                        }
                        else {
                            alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                        }
                    }
                }
            });
        })(jQuery);

    </script>

    <div class="event-edit front-end-edit-wizard">
        <?php if (!empty($this->item->id)): ?>
            <h1><?php echo JText::_('COM_ALLEVENTS_EVENT_UPDATE'); ?></h1>
        <?php else: ?>
            <h1><?php echo JText::_('COM_ALLEVENTS_EVENT_ADD'); ?></h1>
        <?php endif; ?>

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_EVENT'); ?></p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                    <p><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DATES'); ?></p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                    <p><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DETAILS'); ?></p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-4" type="button" class="btn btn-default btn-circle">4</a>
                    <p><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_REGISTRATIONS'); ?></p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-5" type="button" class="btn btn-default btn-circle">5</a>
                    <p><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DESCRIPTION'); ?></p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-6" type="button" class="btn btn-default btn-circle">6</a>
                    <p><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_PICTURES'); ?></p>
                </div>
            </div>
        </div>
        <?php echo $this->getToolbar(); ?>

        <form action="<?php echo JRoute::_('index.php?option=com_allevents', false); ?>" method="post" id="adminForm">
            <div class="row setup-content" id="step-1" style="display: none;">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_EVENT'); ?></h3>
                        <?php echo $this->form->renderField('titre'); ?>
                        <?php echo $this->form->renderField('hot'); ?>
                        <?php echo $this->form->renderField('published'); ?>
                        <button class="btn btn-small btn-primary nextBtn btn-lg pull-right"
                                type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-2" style="display: none;">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DATES'); ?></h3>
                        <div class="control-group">
                            <div class="control-label"><?php echo $this->form->getLabel('date'); ?></div>
                            <div id="alternateUiWidgetsExample" style="display:table-caption;">
                                <?php
                                // utc to user timezone
                                if (isset($this->item->date)) {
                                    $date = JHtml::_('date', $this->item->date, $this->params['gdate_format']);
                                    $time = JHtml::_('date', $this->item->date, $this->params['gtime_format']);
                                } else {
                                    $date = null;
                                    $time = null;
                                }
                                if ($this->item->allday == "1") {
                                    echo '<div class="input-append">';
                                    echo '<input class="date start inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_date" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';
                                    echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';
                                    echo '<input style="display: none;" class="time start inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_time" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';
                                    echo '<span style="display: none;" class="add-on " id="eml_time_clock"> <i class="fa fa-clock-o"></i></span>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="input-append">';
                                    echo '<input class="date start inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_date" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';
                                    echo '<span class="add-on"><i class="fa fa-calendar"></i></span>';
                                    echo '<input class="time start inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_time" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';
                                    echo '<span class="add-on" id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';
                                    echo '</div>';
                                }
                                if (isset($this->item->enddate)) {
                                    $date = JHtml::_('date', $this->item->enddate, $this->params['gdate_format']);
                                    $time = JHtml::_('date', $this->item->enddate, $this->params['gtime_format']);
                                } else {
                                    $date = null;
                                    $time = null;
                                }
                                if ($this->item->allday == "1") {
                                    echo '<div class="input-append">';
                                    echo '<input class="date end inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_enddate" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . ' value="' . $date . '" data-view="Dropdown" data-field="date">';
                                    echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';
                                    echo '<input style="display: none;" class="time end inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_endtime" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . ' value="' . $time . '" data-view="Dropdown" data-field="time">';
                                    echo '<span style="display: none;" class="add-on " id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';
                                    echo '</div>';
                                } else {
                                    echo '<div class="input-append">';
                                    echo '<input class="date end inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_enddate" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';
                                    echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';
                                    echo '<input class="time end inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_endtime" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';
                                    echo '<span class="add-on " id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';
                                    echo '</div>';
                                }

                                ?>
                            </div>
                        </div>
                        <?php echo $this->form->renderField('allday'); ?>
                        <button class="btn btn-small btn-primary nextBtn btn-lg pull-right"
                                type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-3" style="display: none;">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DETAILS'); ?></h3>
                        <?php if ($this->params['controlpanel_showagendas']) : ?>
                            <?php echo $this->form->renderField('agenda_id'); ?>
                        <?php endif; ?>
                        <?php if ($this->params['geventshow_public']) : ?>
                            <?php echo $this->form->renderField('public_id'); ?>
                        <?php endif; ?>
                        <?php if ($this->params['controlpanel_showplaces']) : ?>
                            <?php echo $this->form->renderField('place_id'); ?>
                        <?php endif; ?>
                        <?php if ($this->params['controlpanel_showactivities']) : ?>
                            <?php echo $this->form->renderField('activity_id'); ?>
                        <?php endif; ?>
                        <?php if ($this->params['controlpanel_showcategories']) : ?>
                            <?php echo $this->form->renderField('category_id'); ?>
                        <?php endif; ?>
                        <?php if ($this->params['controlpanel_showressources']) : ?>
                            <?php echo $this->form->renderField('ressource_id'); ?>
                        <?php endif; ?>
                        <?php if ($this->params['controlpanel_showsections']) : ?>
                            <?php echo $this->form->renderField('section_id'); ?>
                        <?php endif; ?>

                        <button class="btn btn-small btn-primary nextBtn btn-lg pull-right"
                                type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-4" style="display: none;">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_REGISTRATIONS'); ?></h3>
                        <?php echo $this->form->renderField('enrolment_enabled'); ?>
                        <?php echo $this->form->renderField('enrolment_max_participant'); ?>
                        <?php echo $this->form->renderField('allow_overbooking'); ?>
                        <?php echo $this->form->renderField('contact_detail_id'); ?>
                        <?php echo $this->form->renderField('contact_libre'); ?>
                        <button class="btn btn-small btn-primary nextBtn btn-lg pull-right"
                                type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="step-5" style="display: none;">
                <h3><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DESCRIPTION'); ?></h3>
                <div class="control-group">
                    <div class="controls"><?php echo $this->form->getInput('description'); ?></div>
                </div>
                <button class="btn btn-small btn-primary nextBtn btn-lg pull-right"
                        type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>
            </div>
            <div class="row setup-content" id="step-6" style="display: none;">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h3><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_PICTURES'); ?></h3>
                        <?php echo $this->form->renderField('vignette'); ?>
                        <?php echo $this->form->renderField('affiche'); ?>
                        <?php echo $this->form->renderField('banniere'); ?>
                        <?php //echo $this->form->renderField('fichier_annexe'); ?>
                    </div>
                </div>
                <button class="btn btn-small btn-primary nextBtn btn-lg pull-right"
                        type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>
            </div>

            <div class="row setup-content" id="step-7" style="display: none;">
                <div class="rs_dialog_content" style="width: auto;">
                    <h1>Repeat <a title="Cancel" href="#"></a></h1>
                    <p>
                        <label for="rs_frequency">Frequency:</label>
                        <select name="rs_frequency" class="rs_frequency" id="rs_frequency">
                            <option value="Daily">Daily</option>
                            <option value="Weekly">Weekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Yearly">Yearly</option>
                        </select>
                    </p>
                    <div class="daily_options freq_option_section" style="display: block;">
                        <p> Every <input type="text" size="2" value="1" class="rs_daily_interval rs_interval"
                                         name="rs_daily_interval"> day(s) </p>
                    </div>
                    <div class="weekly_options freq_option_section" style="display: none;">
                        <p> Every <input type="text" size="2" value="1" class="rs_weekly_interval rs_interval"
                                         name="rs_weekly_interval"> week(s) on: </p>
                        <div class="day_holder"><a data-value="0" href="#">S</a><a data-value="1" href="#">M</a><a
                                data-value="2" href="#">T</a><a data-value="3" href="#">W</a><a data-value="4" href="#">T</a><a
                                data-value="5" href="#">F</a><a data-value="6" href="#">S</a></div>
                        <span style="clear:both; visibility:hidden; height:1px;">.</span></div>
                    <div class="monthly_options freq_option_section" style="display: none;">
                        <p> Every <input type="text" size="2" value="1" class="rs_monthly_interval rs_interval"
                                         name="rs_monthly_interval"> month(s): </p>
                        <p class="monthly_rule_type"><span>Day of month <input type="radio" value="true"
                                                                               name="monthly_rule_type"
                                                                               class="monthly_rule_type_day"></span>
                            <span>Day of week <input type="radio" value="true" name="monthly_rule_type"
                                                     class="monthly_rule_type_week"></span></p>
                        <p class="rs_calendar_day"></p>
                        <p class="rs_calendar_week"></p>
                    </div>
                    <div class="yearly_options freq_option_section" style="display: none;">
                        <p> Every <input type="text" size="2" value="1" class="rs_yearly_interval rs_interval"
                                         name="rs_yearly_interval"> year(s) </p>
                    </div>
                    <p class="rs_summary" style="width: 180px;"><span>Summary: Daily</span></p>
                    <div class="controls">
                        <input type="button" value="OK" class="rs_save">
                        <input type="button" value="Cancel" class="rs_cancel"></div>
                </div>
            </div>

            <input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>"/>
            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>"/>
            <input type="hidden" name="option" value="com_allevents"/>
            <input id="jform_date" style="display: none;" class="inputbox required" type="text" aria-required="true"
                   required="required" value="" name="jform[date]" aria-invalid="false">
            <input id="jform_enddate" style="display: none;" class="inputbox required" type="text" aria-required="true"
                   required="required" value="" name="jform[enddate]">
            <?php echo JHtml::_('form.token'); ?>
        </form>
    </div>

<?php
echo $this->getToolbar();
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>