<?php

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
// TODO: #45: FrontEnd - notification de création d'événement ou de modification = même message

defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
JHtml::_('jquery.framework');
JHtml::_('script', 'jui/cms.js', false, true);

AllEventsHelperOverride::jquery();
$document = JFactory::getDocument();
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


require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/html/aestandardfield.php';

$app = JFactory::getApplication();
$params = AllEventsHelperParam::getGlobalParam();
$Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);
// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);
// Globel and menu parameters
$params = AllEventsHelperParam::getGlobalParam();
$legend_sequence = 0;

// make sure user is logged in
$user = JFactory::getUser();
if ($user->get('id') == 0) {
    JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_ERROR_MUST_LOGIN'), 'warning');
    $joomlaLoginUrl = 'index.php?option=com_users&view=login';
    echo "<br><a href='" . JRoute::_($joomlaLoginUrl) . "'>" . JText::_('COM_ALLEVENTS_LOG_IN') . "</a><br>";
}
?>

    <script type="text/javascript">
        (function ($) {
            $(document).ready(function () {

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

                $('#alternateUiWidgetsExample .time, #eml_openingtime, #eml_closingtime').timepicker({
                    'showDuration': true,
                    'timeFormat': '<?php echo $this->params['gtime_format']; ?>'
                });

                $('#eml_date, #eml_enddate, #eml_openingdate, #eml_closingdate').pikaday({
                    showWeekNumber: true,
                    field: document.getElementById('datepicker-week-numbers'),
                    firstDay: <?php echo $this->params['gfirstday_week'];?>, //(0: Sunday, 1: Monday, etc)
                    mainCalendar: 'right',
                    numberOfMonths: 1,
                    format: '<?php echo strtoupper($this->params['gdate_formatAE']); ?>',
                    minDate: new Date('2000-01-01'),
                    maxDate: new Date('2020-12-31'),
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
                /*###*/
                picker = $('#eml_openingdate').data('pikaday');
                picker.setDate('<?php echo JHtml::_('date', $this->item->openingdate, 'Y-m-d');?>');

                picker = $('#eml_closingdate').data('pikaday');
                picker.setDate('<?php echo JHtml::_('date', $this->item->closingdate, 'Y-m-d');?>');
                /*###*/

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
                    } ?>");

                $('#jform_enddate').val("<?php
                    if ($this->item->allday == "1") {
                        echo JHtml::_('date', $this->item->enddate, $this->params['gdate_format']);
                    } else {
                        echo JHtml::_('date', $this->item->enddate, $this->params['gdatetime_format']);
                    } ?>");

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

                $("#eml_closingdate, #eml_closingtime").change(function () {
                    if ($('#eml_closingtime').val() == "") {
                        $('#jform_closingdate').val($('#eml_closingdate').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);
                    } else {
                        $('#jform_closingdate').val($('#eml_closingdate').val() + ' ' + $('#eml_closingtime').val());
                    }
                });

                $("#eml_openingdate, #eml_openingtime").change(function () {
                    if ($('#eml_closingtime').val() == "") {
                        $('#jform_openingdate').val($('#eml_openingdate').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);
                    } else {
                        $('#jform_openingdate').val($('#eml_openingdate').val() + ' ' + $('#eml_openingtime').val());
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

                $('#jform_enrolment_enabled0').click(function () {
                    $('#enrolment').show();
                });

                $('#jform_enrolment_enabled1').click(function () {
                    $('#enrolment').hide();
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
<?php echo $this->getToolbar(); ?>

    <div class="event-edit front-end-edit">
        <?php if (!empty($this->item->id)): ?>
            <h1><?php echo JText::_('COM_ALLEVENTS_EVENT_UPDATE'); ?></h1>
        <?php else: ?>
            <h1><?php echo JText::_('COM_ALLEVENTS_EVENT_ADD'); ?></h1>
        <?php endif; ?>

        <form action="<?php echo JRoute::_('index.php?option=com_allevents', false); ?>" method="post" id="adminForm">
            <div id="wizard">
                <div class="eventWizardStep1 createEventContainer clearfix">
                    <?php if (isset($this->item->evt_creation_instructions) && trim(strip_tags($this->item->evt_creation_instructions)) != "") : ?>
                        <div>
                            <fieldset>
                                <legend class="clearfix"><span><?php $legend_sequence += 1;
                                        echo $legend_sequence ?></span><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_INSTRUCTIONS'); ?>
                                </legend>
                                <div class="wellae">
                                    <?php echo $this->item->evt_creation_instructions; ?>
                                </div>
                            </fieldset>
                        </div>
                    <?php endif; ?>
                    <div>
                        <fieldset>
                            <legend class="clearfix"><span><?php $legend_sequence += 1;
                                    echo $legend_sequence ?></span><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_EVENT'); ?>
                            </legend>
                            <div class="wellae">
                                <?php echo $this->form->renderField('titre'); ?>
                                <?php echo $this->form->renderField('hot'); ?>
                                <?php echo $this->form->renderField('published'); ?>
                            </div>
                        </fieldset>
                    </div>
                    <!-- €€€ -->
                    <?php
                    if ($this->params['controlpanel_showcustomfields']) {
                        $customfields = AllEventsCustomfields::getCustomfields('event');
                        if ($customfields) {
                            // echo '<h3>'.JText::_('COM_ALLEVENTS_CUSTOMFIELDS').'</h3>' ; 
                            echo AllEventsCustomfields::loader('event', 'form');
                        }
                    }
                    ?>
                    <!-- €€€ -->
                    <div>
                        <fieldset>
                            <legend class="clearfix"><span><?php $legend_sequence += 1;
                                    echo $legend_sequence ?></span><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DATES'); ?>
                            </legend>
                            <div class="wellae">
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('date'); ?></div>
                                    <div id="alternateUiWidgetsExample">
                                        <?php
                                        // utc to user timezone
                                        if (isset($this->item->date)) {
                                            $date = JHtml::_('date', $this->item->date, $this->params['gdate_format']);
                                            $time = JHtml::_('date', $this->item->date, $this->params['gtime_format']);
                                        } else {
                                            $date = null;
                                            $time = null;
                                        }
                                        echo '<br/><br/>';
                                        if ($this->item->allday == "1") {
                                            echo '<span class="input-append">';
                                            echo '<input class="date start inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_date" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';
                                            echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';
                                            echo '<input style="display: none;" class="time start inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_time" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';
                                            echo '<span style="display: none;" class="add-on " id="eml_time_clock"> <i class="fa fa-clock-o"></i></span>';
                                            echo '</span>';
                                        } else {
                                            echo '<span class="input-append">';
                                            echo '<input class="date start inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_date" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';
                                            echo '<span class="add-on"><i class="fa fa-calendar"></i></span>';
                                            echo '<input class="time start inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_time" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';
                                            echo '<span class="add-on" id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';
                                            echo '</span>';
                                        }
                                        echo '<br/><br/>';
                                        if (isset($this->item->enddate)) {
                                            $date = JHtml::_('date', $this->item->enddate, $this->params['gdate_format']);
                                            $time = JHtml::_('date', $this->item->enddate, $this->params['gtime_format']);
                                        } else {
                                            $date = null;
                                            $time = null;
                                        }
                                        if ($this->item->allday == "1") {
                                            echo '<span class="input-append">';
                                            echo '<input class="date end inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_enddate" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . ' value="' . $date . '" data-view="Dropdown" data-field="date">';
                                            echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';
                                            echo '<input style="display: none;" class="time end inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_endtime" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . ' value="' . $time . '" data-view="Dropdown" data-field="time">';
                                            echo '<span style="display: none;" class="add-on " id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';
                                            echo '</span>';
                                        } else {
                                            echo '<span class="input-append">';
                                            echo '<input class="date end inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_enddate" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';
                                            echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';
                                            echo '<input class="time end inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_endtime" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';
                                            echo '<span class="add-on " id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';
                                            echo '</span>';
                                        }

                                        ?>
                                    </div>
                                </div>
                                <?php echo $this->form->renderField('allday'); ?>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset id="id2e">
                            <legend class="clearfix"><span><?php $legend_sequence += 1;
                                    echo $legend_sequence ?></span><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DETAILS'); ?>
                            </legend>
                            <div> <!-- class="wellae"> -->
                                <?php
                                if ($this->params['controlpanel_showagendas']) {
                                    $standard_field = new AEStandardField($this->form, 'agenda_id');
                                    if (isset($this->item->entities_parameters['agenda_id']) && ($this->item->entities_parameters['agenda_id'] != -1) && ($this->item->entities_parameters['agenda_id'] != 0)) {
                                        $standard_field->set("readonly", "true");
                                    }
                                    echo $standard_field->getHtml();
                                }
                                if ($this->params['controlpanel_showactivities']) {
                                    $standard_field = new AEStandardField($this->form, 'activity_id');
                                    if (isset($this->item->entities_parameters['activity_id']) && ($this->item->entities_parameters['activity_id'] != -1) && ($this->item->entities_parameters['activity_id'] != 0)) {
                                        $standard_field->set("readonly", "true");
                                    }
                                    echo $standard_field->getHtml();
                                }
                                if ($this->params['controlpanel_showpublics']) {
                                    $standard_field = new AEStandardField($this->form, 'public_id');
                                    if (isset($this->item->entities_parameters['public_id']) && ($this->item->entities_parameters['public_id'] != -1) && ($this->item->entities_parameters['public_id'] != 0)) {
                                        $standard_field->set("readonly", "true");
                                    }
                                    echo $standard_field->getHtml();
                                }
                                if ($this->params['controlpanel_showplaces']) {
                                    $standard_field = new AEStandardField($this->form, 'place_id');
                                    if (isset($this->item->entities_parameters['place_id']) && ($this->item->entities_parameters['place_id'] != -1) && ($this->item->entities_parameters['place_id'] != 0)) {
                                        $standard_field->set("readonly", "true");
                                    }
                                    echo $standard_field->getHtml();
                                }
                                if ($this->params['controlpanel_showressources']) {
                                    $standard_field = new AEStandardField($this->form, 'ressource_id');
                                    if (isset($this->item->entities_parameters['ressource_id']) && ($this->item->entities_parameters['ressource_id'] != -1) && ($this->item->entities_parameters['ressource_id'] != 0)) {
                                        $standard_field->set("readonly", "true");
                                    }
                                    echo $standard_field->getHtml();
                                }
                                if ($this->params['controlpanel_showsections']) {
                                    $standard_field = new AEStandardField($this->form, 'section_id');
                                    if (isset($this->item->entities_parameters['section_id']) && ($this->item->entities_parameters['section_id'] != -1) && ($this->item->entities_parameters['section_id'] != 0)) {
                                        $standard_field->set("readonly", "true");
                                    }
                                    echo $standard_field->getHtml();
                                }
                                if ($this->params['controlpanel_showcategories']) {
                                    $standard_field = new AEStandardField($this->form, 'category_id');
                                    if (isset($this->item->entities_parameters['category_id']) && ($this->item->entities_parameters['category_id'] != -1) && ($this->item->entities_parameters['category_id'] != 0)) {
                                        $standard_field->set("readonly", "true");
                                    }
                                    echo $standard_field->getHtml();
                                }
                                ?>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset>
                            <legend class="clearfix"><span><?php $legend_sequence += 1;
                                    echo $legend_sequence ?></span><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DESCRIPTION'); ?>
                            </legend>
                            <div class="wellae">
                                <div class="control-group">
                                    <div class="controls"><?php echo $this->form->getInput('description'); ?></div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <?php if ($this->item->contact_libre_allowed || !empty($this->item->event_contacts_parameters)) : ?>
                        <div>
                            <fieldset>
                                <legend class="clearfix"><span><?php $legend_sequence += 1;
                                        echo $legend_sequence ?></span><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_CONTACTS'); ?>
                                </legend>
                                <div>
                                    <?php foreach ($this->item->event_contacts_parameters as $event_contact_parameters) {
                                        echo '<div class="contact_label"> ' . $event_contact_parameters['label'] . '</div>';
                                        switch ($event_contact_parameters['type']) {
                                            case 1 :
                                                $standard_field = new AEStandardField($this->form, 'contact_' . $event_contact_parameters['id'] . '_id');
                                                $standard_field->set('readonly', $event_contact_parameters['readonly'] ? 'true' : 'false');
                                                echo $standard_field->getHtml();
                                                break;
                                            case 2 :
                                                $standard_field = new AEStandardField($this->form, 'contact_' . $event_contact_parameters['id'] . '_details_id');
                                                if (isset($event_contact_parameters['contact_details_category'])) {
                                                    $standard_field->set('contact_details_category', $event_contact_parameters['contact_details_category']);
                                                }
                                                $standard_field->set('readonly', $event_contact_parameters['readonly'] ? 'true' : 'false');
                                                echo $standard_field->getHtml();
                                                break;
                                            case 3 :
                                                $standard_field = new AEStandardField($this->form, 'contact_' . $event_contact_parameters['id'] . '_comprofiler_id');
                                                if (isset($event_contact_parameters['contact_comprofiler_list'])) {
                                                    $standard_field->set('contact_comprofiler_list', $event_contact_parameters['contact_comprofiler_list']);
                                                }
                                                $standard_field->set('readonly', $event_contact_parameters['readonly'] ? 'true' : 'false');
                                                echo $standard_field->getHtml();
                                        }
                                    } ?>
                                    <?php if ($this->item->contact_libre_allowed) : ?>
                                        <div class="contact_label">
                                            <?php echo JText::_('COM_ALLEVENTS_CONTACTS_MISC'); ?>
                                        </div>
                                        <?php
                                        if ($this->item->contact_libre_allowed) {
                                            $standard_field = new AEStandardField($this->form, 'contact_libre');
                                            echo $standard_field->getHtml();
                                        }
                                        ?>
                                    <?php endif ?>
                                </div>
                            </fieldset>
                        </div>
                    <?php endif ?>
                    <div>
                        <fieldset>
                            <legend class="clearfix"><span><?php $legend_sequence += 1;
                                    echo $legend_sequence ?></span><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_REGISTRATIONS'); ?>
                            </legend>
                            <div class="wellae">
                                <div class="control-group">
                                    <div
                                        class="control-label"><?php echo $this->form->getLabel('enrolment_enabled'); ?></div>
                                    <div
                                        class="controls"><?php echo $this->form->getInput('enrolment_enabled', null, $this->params['genrol_on']); ?></div>
                                </div>
                                <div
                                    id="enrolment" <?php if ($this->params['genrol_on'] == 0) : echo 'style="display:none"'; endif; ?>>
                                    <?php echo $this->form->renderField('enrolment_max_participant'); ?>
                                    <?php echo $this->form->renderField('allow_overbooking'); ?>
                                    <!-- €#€ -->
                                    <?php
                                    if (isset($this->item->openingdate)) {
                                        $date = JHtml::_('date', $this->item->openingdate, $this->params['gdate_format']);
                                        $time = JHtml::_('date', $this->item->openingdate, $this->params['gtime_format']);
                                    } else {
                                        $date = null;
                                        $time = null;
                                    }
                                    ?>

                                    <div class="control-group">
                                        <div class="control-label">
                                            <?php echo $this->form->getLabel('openingdate'); ?>
                                        </div>
                                        <div class="controls">
                                            <span class="input-append">
                                                <?php echo '<input style="width:auto" class="date end inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_openingdate" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">'; ?>
                                                <?php echo '<span class="add-on "><i class="fa fa-calendar"></i></span>'; ?>
                                                <?php echo '<input style="width:auto" class="time end inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_openingtime" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">'; ?>
                                                <?php echo '<span class="add-on " id="eml_openingtime_clock"><i class="fa fa-clock-o"></i></span>'; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($this->item->closingdate)) {
                                        $date = JHtml::_('date', $this->item->closingdate, $this->params['gdate_format']);
                                        $time = JHtml::_('date', $this->item->closingdate, $this->params['gtime_format']);
                                    } else {
                                        $date = null;
                                        $time = null;
                                    }
                                    ?>
                                    <div class="control-group">
                                        <div class="control-label">
                                            <?php echo $this->form->getLabel('closingdate'); ?>
                                        </div>
                                        <div class="controls">
                           <span class="input-append">
                                <?php echo '<input style="width:auto" class="date end inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_closingdate" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">'; ?>
                                <?php echo '<span class="add-on "><i class="fa fa-calendar"></i></span>'; ?>
                                <?php echo '<input style="width:auto" class="time end inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_closingtime" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">'; ?>
                                <?php echo '<span class="add-on " id="eml_closingtime_clock"><i class="fa fa-clock-o"></i></span>'; ?>
                           </span>
                                        </div>


                                    </div>
                                    <!-- €#€ -->
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset>
                            <legend class="clearfix"><span><?php $legend_sequence += 1;
                                    echo $legend_sequence ?></span><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_PICTURES'); ?>
                            </legend>
                            <div class="wellae">
                                <?php echo $this->form->renderField('vignette'); ?>
                                <?php echo $this->form->renderField('affiche'); ?>
                                <?php echo $this->form->renderField('banniere'); ?>
                                <?php //echo $this->form->renderField('fichier_annexe'); ?>
                            </div>
                        </fieldset>
                    </div>
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
            <input name="jform[closingdate]" style="display: none;" id="jform_closingdate" value="" class="inputbox"
                   type="text">
            <input name="jform[openingdate]" style="display: none;" id="jform_openingdate" value="" class="inputbox"
                   type="text">
            <?php echo JHtml::_('form.token'); ?>
        </form>
    </div>

<?php
echo $this->getToolbar();
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>