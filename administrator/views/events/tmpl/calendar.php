<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

defined('_JEXEC') or die;

$document = JFactory::getDocument();
JHtml::_('jquery.framework');
$document->addStyleSheet(JUri::root(true) . '/media/jui/css/bootstrap.min.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/1.3.5/daterangepicker-bs2.min.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/events_calendar.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/dashboard.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.min.css');

$document->addScript(JUri::root(true) . '/media/com_allevents/js/jquery-ui-1.10.4.custom.js');
JHtml::_('bootstrap.framework');
$document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/jquery-ui-monthpicker.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/gcal.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js');
$document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/jquery.validate.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/1.3.5/daterangepicker.min.js');
$document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/subview.js');
$document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/events_calendar.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.min.js');

$user = JFactory::getUser();
$userId = $user->get('id');
$params = AllEventsHelperParam::getGlobalParam();
$displaymanage = JFactory::getApplication()->input->get("manage");

$canEdit = $user->authorise('core.edit', 'com_allevents');
$startWeekDay = (int)$params['gfirstday_week'];
$dc = (int)$params['dc'];
$momentdatetimeformat = $params['gdate_formatmoment'] . " " . $params['gtime_formatmoment'];
$momentdateformat = $params['gdate_formatmoment'];
$curlang = $document->language;
?>
<?php if (!empty($this->sidebar)): ?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span12">
    <?php else : ?>
    <div id="j-main-container">
        <?php endif; ?>

        <div class="main-wrapper">
            <!-- start: MAIN CONTAINER -->
            <div class="main-container inner">
                <!-- start: PAGE -->
                <div class="main-content">
                    <div class="container">
                        <div class="toolbar row">
                            <div>
                                <img width="175px" src="../media/com_allevents/css/images/allevents.png" alt="AllEvents"
                                     title="AllEvents - visit the website">
                                <div class="blockbtn" style="font-size:0.9em;">
                                    <b>%%ae3.version%%</b>&nbsp;|&nbsp;<?php echo substr('%%build.date%%', 0, 10); ?>
                                </div>
                                <button class="btn btn-small" style="float: right;"
                                        onclick="location.href='index.php?option=com_config&amp;view=component&amp;component=com_allevents';">
                                    <span class="icon-options"></span><?php echo JText::_('JTOOLBAR_OPTIONS'); ?>
                                </button>
                            </div>
                            <div>
                                <div class="span6 hidden-xs">
                                    <a title="<?php echo JText::_('COM_ALLEVENTS_DASHBOARD'); ?>"
                                       class="ae-home shortcut" href="index.php?option=com_allevents&amp;view=main">
                                        <i class="fa fa-home"></i>
                                        <span
                                            class="shortcut-label"><?php echo JText::_('COM_ALLEVENTS_DASHBOARD'); ?></span>
                                    </a>
                                    <?php if ($this->params['gadmineventslite']) { ?>
                                        <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_EVENT'); ?>"
                                           class="add-event shortcut">
                                            <i class="fa fa-plus"></i>
                                            <span
                                                class="shortcut-label"><?php echo JText::_('COM_ALLEVENTS_ADDEVENT'); ?></span>
                                        </a>
                                    <?php } else { ?>
                                        <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_EVENT'); ?>"
                                           class="add-event3 shortcut"
                                           href="index.php?option=com_allevents&amp;view=event&amp;layout=edit">
                                            <i class="fa fa fa-calendar-plus-o"></i>
                                            <span
                                                class="shortcut-label"><?php echo JText::_('COM_ALLEVENTS_NEWEVENT'); ?></span>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="span6 col-xs-12 col-right">
                                    <a href="#" class="back-subviews shortcut">
                                        <i class="fa fa-chevron-left"></i>
                                        <span class="shortcut-label"><?php echo JText::_('JTOOLBAR_BACK'); ?></span>
                                    </a>
                                    <a href="#" class="save-event shortcut">
                                        <i class="fa fa-check"></i>
                                        <span
                                            class="shortcut-label"><?php echo JText::_('JTOOLBAR_SAVE'); ?></span>
                                    </a>
                                    <a href="#" class="close-subviews shortcut">
                                        <i class="fa fa-times"></i>
                                        <span class="shortcut-label"><?php echo JText::_('JTOOLBAR_CLOSE'); ?></span>
                                    </a>
                                    <div class="toolbar-tools pull-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start: PAGE CONTENT -->
                        <div class="row">
                            <div class="span12">
                                <!-- start: FULL CALENDAR PANEL -->
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="span3">
                                            <div class="inline-mp minimal-mp center-block"></div>
                                            <div class="widget">
                                                <div class="widget-header">
                                                    <i aria-hidden="true" class="fa fa-bookmark-o"></i>
                                                    <h3><?php echo JText::_('AE_DRAGGABLE_EVENTS'); ?></h3>
                                                    <a class="add-event2"
                                                       title="<?php echo JText::_('COM_ALLEVENTS_ADDEVENT'); ?>">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <div class="widget-content">
                                                    <div id="event-categories">
                                                        <?php
                                                        if (!empty($this->agendas)) {
                                                            foreach ($this->agendas as $i => $item) {
                                                                echo '<div style="background-position: 1px 8px !important;padding-bottom: 8px;padding-top: 8px;border-left-color:' . $item->couleur . '" class="event-category se_agenda_' . $item->id . '_bullet" data-class="se_agenda_' . $item->id . '_bullet">';
                                                                echo $item->titre;
                                                                // echo '<span class="fa fa-remove unselect-calendar" style="cursor:pointer;"></span>' ; 
                                                                // echo '<span class="fa fa-check" style="float:right;cursor:pointer;color:' . $item->couleur . '"></span>' ; 
                                                                echo '</div>';
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span9">
                                            <div class="widget widget-nopad">
                                                <div class="widget-header">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <h3><?php echo JText::_('COM_ALLEVENTS_CALENDAR'); ?></h3>
                                                </div>
                                                <!-- /widget-header -->
                                                <div class="widget-content">
                                                    <div class='calendar_loading'></div>
                                                    <div id='calendar'></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: FULL CALENDAR PANEL -->
                            </div>
                        </div>
                        <!-- end: PAGE CONTENT-->
                    </div>
                    <div class="subviews">
                        <div class="subviews-container"></div>
                    </div>
                </div>
                <!-- end: PAGE -->
            </div>
            <!-- end: MAIN CONTAINER -->
            <!-- start: SUBVIEW FOR CALENDAR PAGE -->
            <div id="newFullEvent">
                <div class="noteWrap span8 col-centred">
                    <h3 class="newevent"><?php echo JText::_('COM_ALLEVENTS_NEWEVENT'); ?></h3>
                    <form class="form-full-event">
                        <div class="span12">
                            <div class="form-group">
                                <input class="event-id hide" type="text">
                                <input id="event-name" class="event-name form-control" name="eventName" type="text"
                                       placeholder="Event Name...">
                            </div>
                        </div>
                        <div class="span4">
                            <div class="form-group">
                                <input type="checkbox" class="all-day" checked
                                       data-label-text="<?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_ALLDAY_ALLDAY'); ?>"
                                       data-on-text="True"
                                       data-off-text="False">
                            </div>
                        </div>
                        <div class="no-all-day-range">
                            <div class="span8">
                                <div class="form-group">
                                    <div class="form-group">
                                        <span class="input-icon">
                                        <input type="text" id="no-all-day-range"
                                               class="event-range-date form-control" name="eventRangeDate"
                                               placeholder="Range date"/>
                                        <i class="fa fa-clock-o"></i> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all-day-range">
                            <div class="span8">
                                <div class="form-group">
                                    <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" id="all-day-range"
                                               class="event-range-date form-control"
                                               name="ad_eventRangeDate"
                                               placeholder="Range date"/><i
                                            class="fa fa-calendar"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hide">
                            <input type="text" class="event-start-date" name="eventStartDate"/>
                            <input type="text" class="event-end-date" name="eventEndDate"/>
                        </div>
                        <div class="span12">
                            <div class="form-group">
                                <select class="form-control selectpicker event-categories">
                                    <?php
                                    foreach ($this->agendas as $i => $item) {
                                        echo '<option data-content="<span class=\'event-category se_agenda_' . $item->id . '_bullet\'>' . $item->titre . '</span>"';
                                        echo ' value="' . $item->id . '">' . $item->titre;
                                        echo '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="span12">
                            <div class="form-group">
                                <textarea class="summernote" placeholder="Write note here..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="readFullEvent">
                <div class="noteWrap span8 col-centred ">
                    <div class="span12">
                        <h2 class="event-title"></h2>
                        <div class="dropdown pull-right">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-cog"></i>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-light pull-right" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="#" class="edit-event">
                                        <i class="fa fa-pencil"></i>&nbsp;<?php echo JText::_('JTOOLBAR_EDIT'); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="delete-event">
                                        <i class="fa fa-times"></i>&nbsp;<?php echo JText::_('JTOOLBAR_DELETE'); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="span6">
                        <span class="event-category event-cancelled">Cancelled</span>
                        <span class="event-allday"><i
                                class='fa fa-check'></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_ALLDAY'); ?></span>
                    </div>
                    <div class="span12">
                        <div class="event-start">
                            <div class="event-day"></div>
                            <div class="event-date"></div>
                            <div class="event-time"></div>
                        </div>
                        <div class="event-end"></div>
                    </div>
                    <div class="span12">
                        <div class="event-content"></div>
                    </div>
                </div>
            </div>
            <!-- end: SUBVIEW FOR CALENDAR PAGE -->
            <!-- start: SUBVIEW SAMPLE CONTENTS -->
            <!-- *** SHOW CALENDAR *** -->
            <div id="showCalendar" class="span10 spanoffset-1">
                <div class="barTopSubview">
                    <a href="#newEvent" class="new-event button-sv" data-subviews-options='{"onShow": "editEvent()"}'><i
                            class="fa fa-plus"></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_ADDEVENT'); ?></a>
                </div>
                <div id="calendar"></div>
            </div>
            <!-- *** NEW EVENT *** -->
            <div id="newEvent">
                <div class="noteWrap span8 spanoffset-2">
                    <h3><?php echo JText::_('COM_ALLEVENTS_ADDEVENT'); ?></h3>
                    <div class="row">
                        <div class="span12">
                            <div class="form-group">
                                <input class="event-id hide" type="text">
                                <input class="event-name form-control" name="eventName" type="text"
                                       placeholder="<?php echo JText::_('TITLE'); ?>">
                            </div>
                        </div>
                        <div class="span4">
                            <div class="form-group">
                                <input type="checkbox" class="all-day"
                                       data-label-text="<?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_ALLDAY_ALLDAY'); ?>"
                                       data-on-text="True"
                                       data-off-text="False" checked>
                            </div>
                        </div>
                        <div class="no-all-day-range">
                            <div class="span8">
                                <div class="form-group">
                                    <div class="form-group">
                                            <span class="input-icon">
                                                <input type="text"
                                                       class="event-range-date form-control"
                                                       name="eventRangeDate"
                                                       placeholder="Range date"/>
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all-day-range">
                            <div class="span8">
                                <div class="form-group">
                                    <div class="form-group">
                                    <span class="input-icon">
                                        <input type="text" class="event-range-date form-control"
                                               name="ad_eventRangeDate" placeholder="Range date"/><i
                                            class="fa fa-calendar"></i>&nbsp;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hide">
                            <input type="text" class="event-start-date" name="eventStartDate"/>
                            <input type="text" class="event-end-date" name="eventEndDate"/>
                        </div>
                        <div class="span12">
                            <div class="form-group">
                                <select class="form-control selectpicker event-categories">
                                    <?php
                                    foreach ($this->agendas as $i => $item) {
                                        echo '<option data-content="<span class=\'event-category se_agenda_' . $item->id . '_bullet\'>' . $item->titre . '</span>"';
                                        echo '        value="' . $item->id . '">' . $item->titre . '';
                                        echo '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="span12">
                            <div class="form-group">
                                <textarea class="summernote" placeholder="Write note here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** READ EVENT *** -->
            <div id="readEvent">
                <div class="noteWrap span8 spanoffset-2">
                    <div class="row">
                        <div class="span12">
                            <h2 class="event-title"><?php echo JText::_('TITLE'); ?></h2>
                            <div class="btn-group options-toggle pull-right">
                                <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu dropdown-light pull-right">
                                    <li>
                                        <a href="#newEvent" class="edit-event">
                                            <i class="fa fa-pencil"></i>&nbsp;<?php echo JText::_('JTOOLBAR_EDIT'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="delete-event">
                                            <i class="fa fa-times"></i>&nbsp;<?php echo JText::_('JTOOLBAR_DELETE'); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="span6">
                            <span class="event-category event-cancelled">Cancelled</span>
                            <span class="event-allday"><i
                                    class='fa fa-check'></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_ALLDAY'); ?></span>
                        </div>
                        <div class="span12">
                            <div class="event-start">
                                <div class="event-day"></div>
                                <div class="event-date"></div>
                                <div class="event-time"></div>
                            </div>
                            <div class="event-end"></div>
                        </div>
                        <div class="span12">
                            <div class="event-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: SUBVIEW SAMPLE CONTENTS -->
        </div>
    </div>
    <script>
        moment.lang('<?php echo substr($curlang, 0, 2); ?>');

        (function ($) {
            $(document).ready(function () {
                Main.init();
                var date = new Date(),
                    dateToShow,
                    eventClass,
                    eventCategory,
                    subViewElement,
                    subViewContent,
                    $eventDetail,
                    defaultRange = {};
                defaultRange.start = moment();
                defaultRange.end = moment().add('days', 1);
                $(".save-event").off().on("click", function () {
                    $(".form-full-event").valid();
                    $(".form-full-event").submit();
                });

                $(".add-event2").off().on("click", function () {
                    $.subview({
                        content: "#newFullEvent",
                        startFrom: "right",
                        onShow: function () {
                            editFullEvent();
                            $('.add-event').hide();
                            $('.add-event3').hide();
                            $('.ae-home').hide();
                        },
                        onHide: function () {
                            hideEditEvent();
                            $('.add-event').show();
                            $('.add-event3').show();
                            $('.ae-home').show();
                        }
                    });
                });

                $(".add-event").off().on("click", function () {
                    $.subview({
                        content: "#newFullEvent",
                        startFrom: "right",
                        onShow: function () {
                            editFullEvent();
                            $('.add-event').hide();
                            $('.add-event3').hide();
                            $('.ae-home').hide();
                        },
                        onHide: function () {
                            hideEditEvent();
                            $('.add-event').show();
                            $('.add-event3').show();
                            $('.ae-home').show();
                        }
                    });
                });

                $('#event-categories div.event-category').each(function () {
                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };
                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject);
                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 50 //  original position after the drag
                    });
                });

                var editFullEvent = function (el) {
                    $("#newFullEvent .newevent").show();

                    $(".close-new-event").off().on("click", function () {
                        $(".back-subviews").trigger("click");
                    });

                    $(".save-event").show(0, function (e) {
                        $(this).animate({
                            opacity: 1,
                            left: "0px"
                        });
                    });

                    $(".form-full-event .help-block").remove();
                    $(".form-full-event .form-group").removeClass("has-error").removeClass("has-success");
                    $('.form-full-event .all-day').bootstrapSwitch();

                    $eventDetail = $('.form-full-event .summernote');

                    $eventDetail.summernote({
                        oninit: function () {
                            if ($eventDetail.code() == "" || $eventDetail.code().replace(/(<([^>]+)>)/ig, "") == "") {
                                $eventDetail.code($eventDetail.attr("placeholder"));
                            }
                        },
                        onfocus: function (e) {
                            if ($eventDetail.code() == $eventDetail.attr("placeholder")) {
                                $eventDetail.code("");
                            }
                        },
                        onblur: function (e) {
                            if ($eventDetail.code() == "" || $eventDetail.code().replace(/(<([^>]+)>)/ig, "") == "") {
                                $eventDetail.code($eventDetail.attr("placeholder"));
                            }
                        },
                        onkeyup: function (e) {
                            $("span[for='detailEditor']").remove();
                        },
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']]
                        ]
                    });
                    if (typeof el == "undefined") {
                        $(".form-full-event .event-id").val("");
                        $(".form-full-event .event-name").val("");
                        $(".form-full-event .all-day").bootstrapSwitch('state', false);
                        $('.form-full-event .all-day-range').hide();
                        $(".form-full-event .event-start-date").val(defaultRange.start);
                        $(".form-full-event .event-end-date").val(defaultRange.end);

                        $('.form-full-event .no-all-day-range .event-range-date').val(moment(defaultRange.start).format('<?php echo $momentdatetimeformat; ?>') + ' - ' + moment(defaultRange.end).format('<?php echo $momentdatetimeformat; ?>'))
                            .daterangepicker({
                                startDate: defaultRange.start,
                                endDate: defaultRange.end,
                                timePicker: true,
                                timePickerIncrement: 30,
                                format: '<?php echo $momentdatetimeformat; ?>',
                                locale: {
                                    format: "<?php echo $momentdateformat; ?>",
                                    separator: " - ",
                                    applyLabel: "<?php echo JText::_('JTOOLBAR_APPLY'); ?>",
                                    cancelLabel: "<?php echo JText::_('JTOOLBAR_CANCEL'); ?>",
                                    fromLabel: "<?php echo JText::_('COM_ALLEVENTS_FROM_DAY'); ?>",
                                    toLabel: "<?php echo JText::_('EVENTS_TO_DATE'); ?>",
                                    customRangeLabel: "Custom",
                                    weekLabel: "W",
                                    daysOfWeek: [<?php echo $this->params['dayNamesShort'];?>],
                                    monthNames: [<?php echo $this->params['monthNames']; ?>],
                                    firstDay: <?php echo $startWeekDay;?>
                                }
                            });

                        $('.form-full-event .all-day-range .event-range-date').val(moment(defaultRange.start).format('<?php echo $momentdateformat; ?>') + ' - ' + moment(defaultRange.end).format('<?php echo $momentdateformat; ?>'))
                            .daterangepicker({
                                startDate: defaultRange.start,
                                endDate: defaultRange.end, format: '<?php echo $momentdatetimeformat; ?>',
                                locale: {
                                    format: "<?php echo $momentdateformat; ?>",
                                    separator: " - ",
                                    applyLabel: "<?php echo JText::_('JTOOLBAR_APPLY'); ?>",
                                    cancelLabel: "<?php echo JText::_('JTOOLBAR_CANCEL'); ?>",
                                    fromLabel: "<?php echo JText::_('COM_ALLEVENTS_FROM_DAY'); ?>",
                                    toLabel: "<?php echo JText::_('EVENTS_TO_DATE'); ?>",
                                    customRangeLabel: "Custom",
                                    weekLabel: "W",
                                    daysOfWeek: [<?php echo $this->params['dayNamesShort'];?>],
                                    monthNames: [<?php echo $this->params['monthNames']; ?>],
                                    firstDay: <?php echo $startWeekDay;?>
                                }
                            });

                        $('.form-full-event .event-categories option').filter(function () {
                            return ($(this).text() == "Generic");
                        }).prop('selected', true);
                        $('.form-full-event .event-categories').selectpicker('render');
                        $eventDetail.code($eventDetail.attr("placeholder"));

                        defaultRange.start = moment();
                        defaultRange.end = moment().add('days', 1);

                    } else {
                        $("#newFullEvent .newevent").hide();

                        $(".form-full-event .event-id").val(el._id);
                        $(".form-full-event .event-name").val(el.title);
                        $(".form-full-event .all-day").bootstrapSwitch('state', el.allDay);
                        $(".form-full-event .event-start-date").val(moment(el.start));
                        $(".form-full-event .event-end-date").val(moment(el.end));
                        if (typeof $('.form-full-event .no-all-day-range .event-range-date').data('daterangepicker') == "undefined") {
                            $('.form-full-event .no-all-day-range .event-range-date').val(moment(el.start).format('<?php echo $momentdatetimeformat; ?>') + ' - ' + moment(el.end).format('<?php echo $momentdatetimeformat; ?>'))
                                .daterangepicker({
                                    startDate: moment(el.start),
                                    endDate: moment(el.end),
                                    timePicker: true,
                                    timePickerIncrement: 10,
                                    format: '<?php echo $momentdatetimeformat; ?>',
                                    locale: {
                                        format: "<?php echo $momentdatetimeformat; ?>",
                                        separator: " - ",
                                        applyLabel: "<?php echo JText::_('JTOOLBAR_APPLY'); ?>",
                                        cancelLabel: "<?php echo JText::_('JTOOLBAR_CANCEL'); ?>",
                                        fromLabel: "<?php echo JText::_('COM_ALLEVENTS_FROM_DAY'); ?>",
                                        toLabel: "<?php echo JText::_('EVENTS_TO_DATE'); ?>",
                                        customRangeLabel: "Custom",
                                        weekLabel: "W",
                                        daysOfWeek: [<?php echo $this->params['dayNamesShort'];?>],
                                        monthNames: [<?php echo $this->params['monthNames']; ?>],
                                        firstDay: <?php echo $startWeekDay;?>
                                    }
                                });

                            $('.form-full-event .all-day-range .event-range-date').val(moment(el.start).format('<?php echo $momentdateformat; ?>') + ' - ' + moment(el.end).format('<?php echo $momentdateformat; ?>'))
                                .daterangepicker({
                                    startDate: moment(el.start),
                                    endDate: moment(el.end),
                                    locale: {
                                        format: "<?php echo $momentdatetimeformat; ?>",
                                        separator: " - ",
                                        applyLabel: "<?php echo JText::_('JTOOLBAR_APPLY'); ?>",
                                        cancelLabel: "<?php echo JText::_('JTOOLBAR_CANCEL'); ?>",
                                        fromLabel: "<?php echo JText::_('COM_ALLEVENTS_FROM_DAY'); ?>",
                                        toLabel: "<?php echo JText::_('EVENTS_TO_DATE'); ?>",
                                        customRangeLabel: "Custom",
                                        weekLabel: "W",
                                        daysOfWeek: [<?php echo $this->params['dayNamesShort'];?>],
                                        monthNames: [<?php echo $this->params['monthNames']; ?>],
                                        firstDay: <?php echo $startWeekDay;?>
                                    }
                                });
                        } else {
                            $('.form-full-event .no-all-day-range .event-range-date').val(moment(el.start).format('<?php echo $momentdatetimeformat; ?>') + ' - ' + moment(el.end).format('<?php echo $momentdatetimeformat; ?>'))
                                .data('daterangepicker').setStartDate(moment(moment(el.start)));
                            $('.form-full-event .no-all-day-range .event-range-date').data('daterangepicker').setEndDate(moment(el.end));
                            $('.form-full-event .all-day-range .event-range-date').val(moment(el.start).format('<?php echo $momentdateformat; ?>') + ' - ' + moment(el.end).format('<?php echo $momentdateformat; ?>'))
                                .data('daterangepicker').setStartDate(el.start);
                            $('.form-full-event .all-day-range .event-range-date').data('daterangepicker').setEndDate(el.end);
                        }
                        if (el.allDay) {
                            $("#newFullEvent").find(".no-all-day-range").hide();
                            $("#newFullEvent").find(".all-day-range").show();
                        } else {
                            $("#newFullEvent").find(".no-all-day-range").show();
                            $("#newFullEvent").find(".all-day-range").hide();
                        }
                        if (el.agenda_titre == "" || typeof el.agenda_titre == "undefined") {
                            eventCategory = "Generic";
                        } else {
                            eventCategory = el.agenda_titre;
                        }
                        $('.form-full-event .event-categories option').filter(function () {
                            return ($(this).text() == eventCategory);
                        }).prop('selected', true);
                        $('.form-full-event .event-categories').selectpicker('render');
                        if (typeof el.description !== "undefined" && el.description !== "") {
                            $eventDetail.code(el.description);
                        } else {
                            $eventDetail.code($eventDetail.attr("placeholder"));
                        }
                    }

                    $('.form-full-event .all-day').on('switchChange.bootstrapSwitch', function (event, state) {
                        $(".daterangepicker").hide();
                        var startDate = moment($("#newFullEvent").find(".event-start-date").val());
                        var endDate = moment($("#newFullEvent").find(".event-end-date").val());
                        if (state) {
                            $("#newFullEvent").find(".no-all-day-range").hide();
                            $("#newFullEvent").find(".all-day-range").show();
                            $("#newFullEvent").find('.all-day-range .event-range-date').val(startDate.format('<?php echo $momentdateformat; ?>') + ' - ' + endDate.format('<?php echo $momentdateformat; ?>')).data('daterangepicker').setStartDate(startDate);
                            $("#newFullEvent").find('.all-day-range .event-range-date').data('daterangepicker').setEndDate(endDate);
                        } else {
                            $("#newFullEvent").find(".no-all-day-range").show();
                            $("#newFullEvent").find(".all-day-range").hide();
                            $("#newFullEvent").find('.no-all-day-range .event-range-date').val(startDate.format('<?php echo $momentdatetimeformat; ?>') + ' - ' + endDate.format('<?php echo $momentdatetimeformat; ?>')).data('daterangepicker').setStartDate(startDate);
                            $("#newFullEvent").find('.no-all-day-range .event-range-date').data('daterangepicker').setEndDate(endDate);
                        }

                    });
                    $('.form-full-event .event-range-date').on('apply.daterangepicker', function (ev, picker) {
                        $(".form-full-event .event-start-date").val(picker.startDate);
                        $(".form-full-event .event-end-date").val(picker.endDate);
                    });
                };

                var readFullEvents = function (el) {

                    $(".edit-event").off().on("click", function () {
                        $.subview({
                            content: "#newFullEvent",
                            startFrom: "right",
                            onShow: function () {
                                editFullEvent(el);
                                $('.save-event').show();
                                $('.add-event').hide();
                                $('.add-event3').hide();
                                $('.ae-home').hide();
                            },
                            onHide: function () {
                                hideEditEvent();
                                $('.save-event').hide();
                                $('.add-event').show();
                                $('.add-event3').show();
                                $('.ae-home').show();
                            }
                        });
                    });

                    $(".delete-event").data("event-id", el._id);

                    $("#readFullEvent").find(".delete-event").off().on("click", function () {
                        swal({
                                title: '<?php echo JText::_('AE_ARE_YOU_SURE'); ?>',
                                text: '<?php echo JText::_('DELETE_CONFIRM'); ?>',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "<?php echo JText::_('AE_YES_DELETE_IT'); ?>",
                                cancelButtonText: "<?php echo JText::_('AE_NO_CANCEL'); ?>",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    // user clicked "ok"
                                    var eventToDel = {
                                        type_action: "DEL",
                                        id: el._id
                                    };
                                    save_event(eventToDel);
                                    toastr.success('<?php echo JText::_('COM_ALLEVENTS_EVENTDELETED'); ?>');
                                    $(".close-subviews").trigger("click");
                                    // swal("Deleted!", "<?php echo JText::_('COM_ALLEVENTS_EVENTDELETED'); ?>", "success");
                                } else {
                                    toastr.info('<?php echo JText::_('AE_EVENT_SAFE'); ?>');
                                    // swal("Cancelled", "Your event is safe :)", "error");
                                }
                            });
                    });

                    $("#readFullEvent .event-allday").hide();
                    $("#readFullEvent .event-end").empty().hide();

                    $("#readFullEvent .event-title").empty().text(el.title);
                    if (el.className == "" || typeof el.className == "undefined") {
                        eventClass = "event-generic";
                    } else {
                        eventClass = el.className;
                    }
                    if (el.agenda_titre == "" || typeof el.agenda_titre == "undefined") {
                        eventCategory = "Generic";
                    } else {
                        eventCategory = el.agenda_titre;
                    }

                    $("#readFullEvent .event-category")
                        .empty()
                        .removeAttr("class")
                        .addClass("event-category " + eventClass)
                        .text(eventCategory);
                    if (el.allDay) {
                        $("#readFullEvent .event-allday").show();
                        $("#readFullEvent .event-start").empty().html("<p>Start:</p> <div class='event-day'><h2>" + moment(el.start).format('DD') + "</h2></div><div class='event-date'><h3>" + moment(el.start).format('dddd') + "</h3><h4>" + moment(el.start).format('MMMM YYYY') + "</h4></div>");
                        if (el.end !== null) {
                            if (moment(el.end).isValid()) {
                                $("#readFullEvent .event-end").show().html("<p>End:</p> <div class='event-day'><h2>" + moment(el.end).format('DD') + "</h2></div><div class='event-date'><h3>" + moment(el.end).format('dddd') + "</h3><h4>" + moment(el.end).format('MMMM YYYY') + " </h4></div>");
                            }
                        }
                    } else {
                        $("#readFullEvent .event-start").empty().html("<p>Start:</p> <div class='event-day'><h2>" + moment(el.start).format('DD') + "</h2></div><div class='event-date'><h3>" + moment(el.start).format('dddd') + "</h3><h4>" + moment(el.start).format('MMMM YYYY') + "</h4></div> <div class='event-time'><h3><i class='fa fa-clock-o'></i>&nbsp;" + moment(el.start).format('h:mm A') + "</h3></div>");
                        if (el.end !== null) {
                            if (moment(el.end).isValid()) {
                                $("#readFullEvent .event-end").show().html("<p>End:</p> <div class='event-day'><h2>" + moment(el.end).format('DD') + "</h2></div><div class='event-date'><h3>" + moment(el.end).format('dddd') + "</h3><h4>" + moment(el.end).format('MMMM YYYY') + "</h4></div> <div class='event-time'><h3><i class='fa fa-clock-o'></i>&nbsp;" + moment(el.end).format('h:mm A') + "</h3></div>");
                            }
                        }
                    }

                    $("#readFullEvent .event-content").empty().html(el.description);
                };

                var formEvent = $('.form-full-event');
                var errorHandler2 = $('.errorHandler', formEvent);
                var successHandler2 = $('.successHandler', formEvent);

                formEvent.validate({
                    errorElement: "span", // contain the error msg in a span tag
                    errorClass: 'help-block',
                    errorPlacement: function (error, element) { // render error placement for each input type
                        if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                            error.insertAfter($(element).closest('.form-group').children('div').children().last());
                        } else if (element.parent().hasClass("input-icon")) {

                            error.insertAfter($(element).parent());
                        } else {
                            error.insertAfter(element);
                            // for other inputs, just perform default behavior
                        }
                    },
                    ignore: "",
                    rules: {
                        eventName: {
                            minlength: 2,
                            required: true
                        },
                        eventStartDate: {
                            required: true,
                            date: true
                        },
                        eventEndDate: {
                            required: true,
                            date: true
                        }
                    },
                    messages: {
                        eventName: "* Please specify the event name"

                    },
                    invalidHandler: function (event, validator) { //display error alert on form submit
                        successHandler2.hide();
                        errorHandler2.show();
                    },
                    highlight: function (element) {
                        $(element).closest('.help-block').removeClass('valid');
                        // display OK icon
                        $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                        // add the Bootstrap error class to the control group
                    },
                    unhighlight: function (element) { // revert the change done by hightlight
                        $(element).closest('.form-group').removeClass('has-error');
                        // set error class to the control group
                    },
                    success: function (label, element) {
                        label.addClass('help-block valid');
                        // mark the current input as valid and display OK icon
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
                    },
                    submitHandler: function (form) {
                        // alert("ingrid") ;
                        successHandler2.show();
                        errorHandler2.hide();
                        var newEvent = {
                            id: $(".form-full-event .event-id").val(),
                            enrolment_max_participant: 0,
                            hot: 0,
                            allDay: $(".form-full-event .all-day").bootstrapSwitch('state'),
                            agenda_id: $(".form-full-event .event-categories option:checked").val(),
                            activity_id: 0,
                            place_id: 0,
                            title: $(".form-full-event .event-name ").val(),
                            start: moment(new Date($('.form-full-event .event-start-date').val())).format("<?php echo $momentdatetimeformat; ?>"),
                            end: moment(new Date($('.form-full-event .event-end-date').val())).format("<?php echo $momentdatetimeformat; ?>")
                        };

                        if ($eventDetail.code() !== "" && $eventDetail.code().replace(/(<([^>]+)>)/ig, "") !== "" && $eventDetail.code() !== $eventDetail.attr("placeholder")) {
                            newEvent.description = $eventDetail.code();
                        } else {
                            newEvent.description = "";
                        }

                        if ($(".form-full-event .event-id").val() === "") {
                            newEvent.type_action = "INS2";
                            save_event(newEvent);
                            $(".close-subviews").trigger("click");
                            toastr.success('<?php echo JText::_('COM_ALLEVENTS_EVENTCREATED'); ?>');
                        } else {
                            newEvent.type_action = "UPD2";
                            save_event(newEvent);
                            $(".close-subviews").trigger("click");
                            toastr.success('<?php echo JText::_('COM_ALLEVENTS_EVENTUPDATED'); ?>');
                        }
                    }
                });

                // on hide event's form destroy summernote and bootstrapSwitch plugins
                var hideEditEvent = function () {
                    $.hideSubview();
                    $(".save-event").hide();
                    $('.form-full-event .summernote').destroy();
                    $(".form-full-event .all-day").bootstrapSwitch('destroy');
                }; // end hideEditEvent

                var Refresh = function () {
                    $('#calendar').fullCalendar('refetchEvents');
                }; // end refresh

                var save_event = function (eventToSave) {
                    if (eventToSave.allDay) {
                        eventToSave.allDay = 1
                    } else {
                        eventToSave.allDay = 0
                    }
                    $.ajax({
                        type: 'POST',
                        async: false,
                        format: 'json',
                        data: {
                            event: JSON.stringify(eventToSave),
                            event_description: eventToSave.description,
                            user_id:<?php echo JFactory::getUser()->id; ?>
                        },
                        url: "../index.php?option=com_allevents&task=display&view=fullcalendar&layout=event_crud&format=json"
                    });
                    Refresh();
                }; // end save_event

                var impossible_update_event = function () {
                    swal("", "<?php echo JText::_('MOVEEVENT_IMPOSSIBLE'); ?>", "warning");
                }; // end impossible_update_event

                var update_event = function (event, revertFunc) {

                    swal({
                            title: "<?php echo JText::_('AE_ARE_YOU_SURE'); ?>",
                            text: "<?php echo JText::_('MOVEEVENT_CONFIRM'); ?>",
                            type: "warning",
                            showCancelButton: true,
                            //confirmButtonColor: "#DD6B55",
                            confirmButtonText: "<?php echo JText::_('AE_YES_MOVE_IT'); ?>",
                            cancelButtonText: "<?php echo JText::_('AE_NO_CANCEL'); ?>",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                var eventToSave = {
                                    type_action: "MOV",
                                    id: event.id,
                                    allDay: event.allDay
                                };
                                if (event.end === null) {
                                    event.end = event.start;
                                }
                                if (eventToSave.allDay) {
                                    eventToSave.start = moment(event.start).format("<?php echo $momentdateformat; ?>");
                                    eventToSave.end = moment(event.end).format("<?php echo $momentdateformat; ?>");
                                } else {
                                    eventToSave.start = moment(event.start).format("<?php echo $momentdatetimeformat; ?>");
                                    eventToSave.end = moment(event.end).format("<?php echo $momentdatetimeformat; ?>");
                                }

                                save_event(eventToSave);
                                toastr.success('<?php echo JText::_('COM_ALLEVENTS_EVENTUPDATED'); ?>');
                            } else {
                                revertFunc();
                            }
                        });
                }; // end update_event

                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    selectHelper: true,
                    editable: true,
                    selectable: true,
                    eventLimit: true, // allow "more" link when too many events
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    viewRender: function (view) {
                        // If monthpicker has been init update its date on change
                        if ($('.inline-mp').hasClass('hasMonthpicker')) {
                            var selectedDate = $('#calendar').fullCalendar('getDate');
                            var formatted = moment(selectedDate).format('MM/YY');
                            $('.inline-mp').monthpicker("setDate", formatted);
                        }
                        // Update mini calendar title
                        var titleContainer = $('.fc-title-clone');
                        if (!titleContainer.length) {
                            return;
                        }
                        titleContainer.html(view.title);
                    },
                    drop: function (date, allDay) { // this function is called when something is dropped
                        // retrieve the dropped element's stored Event Object
                        if (moment(date) < moment()) {
                            impossible_update_event();
                        } else {
                            var originalEventObject = $(this).data('eventObject'),
                                $categoryClass = $(this).attr('data-class'),
                                res = $categoryClass.split("_"),
                                copiedEventObject = {
                                    type_action: "INS2",
                                    enrolment_max_participant: 0,
                                    hot: 0,
                                    allDay: allDay,
                                    place_id: 0,
                                    agenda_id: res[2],
                                    activity_id: 0,
                                    title: originalEventObject.title
                                };

                            if (copiedEventObject.allDay) {
                                copiedEventObject.start = moment(new Date(date)).format("<?php echo $momentdateformat; ?>");
                                copiedEventObject.end = moment(new Date(date)).add('hours', 1).format("<?php echo $momentdateformat; ?>");
                            } else {
                                copiedEventObject.start = moment(new Date(date)).format("<?php echo $momentdatetimeformat; ?>");
                                copiedEventObject.end = moment(new Date(date)).add('hours', 1).format("<?php echo $momentdatetimeformat; ?>");
                            }

                            save_event(copiedEventObject);
                            toastr.success('<?php echo JText::_('COM_ALLEVENTS_EVENTCREATED'); ?>');
                        }
                    },

                    // Déplacement d'un evenement par glisser/deposer
                    eventDrop: function (event, delta, revertFunc) {
                        // déplacement dans le passé impossible
                        if (moment(event.start) < moment()) {
                            impossible_update_event();
                            revertFunc();
                        } else {
                            update_event(event, revertFunc);
                        }
                    },

                    // Déplacement d'un evenement par redimensionnement
                    eventResize: function (event, delta, revertFunc) {
                        update_event(event, revertFunc);
                    },

                    select: function (start, end, allDay) {
                        defaultRange.start = moment(start);
                        defaultRange.end = moment(start).add('hours', 1);
                        $.subview({
                            content: "#newFullEvent",
                            startFrom: "right",
                            onShow: function () {
                                editFullEvent();
                                $('.save-event').show();
                                $('.add-event').hide();
                                $('.add-event3').hide();
                                $('.ae-home').hide();
                            },
                            onHide: function () {
                                hideEditEvent();
                                $('.save-event').hide();
                                $('.add-event').show();
                                $('.add-event3').show();
                                $('.ae-home').show();
                            }
                        });
                    },

                    eventClick: function (calEvent, jsEvent, view) {
                        if (1 == <?php echo($this->params['gadmineventslite']); ?>) {
                            dateToShow = calEvent.start;
                            if (calEvent.end === null) {
                                calEvent.end = calEvent.start;
                            }
                            $.subview({
                                content: "#readFullEvent",
                                startFrom: "right",
                                onShow: function () {
                                    readFullEvents(calEvent);
                                    $('.add-event').hide();
                                    $('.add-event3').hide();
                                    $('.ae-home').hide();
                                },
                                onHide: function () {
                                    $('.add-event').show();
                                    $('.add-event3').show();
                                    $('.ae-home').show();
                                }
                            });
                            return false;
                        } else {
                            if (calEvent.url) {
                                window.open(calEvent.url, "<?php echo $this->params['gdisplay_openlinkself'];?>");
                                return false;
                            }
                        }
                    },
                    loading: function (bool) {
                        if (bool) {
                            var position = $('#calendar').position();
                            $('.calendar_loading').css('left', position.left).css('top', position.top).css('width', $('#calendar').width()).css('height', $('#mod_aefullcalendar').height()).show();
                        } else {
                            $('.calendar_loading').hide();
                        }
                    }, // loading
                    monthNames: [<?php echo $this->params['monthNames']; ?>],
                    monthNamesShort: [<?php echo $this->params['monthNamesShort']; ?>],
                    dayNames: [<?php echo $this->params['dayNames']; ?>],
                    dayNamesShort: [<?php echo $this->params['dayNamesShort']; ?>],
                    buttonText: {
                        today: '<?php echo JText::_('TODAY', true); ?>',
                        day: '<?php echo JText::_('DAY', true); ?>',
                        week: '<?php echo JText::_('WEEK', true); ?>',
                        month: '<?php echo JText::_('MONTH', true); ?>'
                    },
                    axisFormat: '<?php echo $params['gtime_formatAEFC']; ?>',
                    slotLabelFormat: '<?php echo $params['gtime_formatAEFC']; ?>',
                    timeFormat: '<?php echo $params['gtime_formatAEFC']; ?>',
                    dragOpacity: 0.5,
                    dragRevertDuration: 0,
                    firstDay: "<?php echo $startWeekDay;?>",
                    events: {
                        url: '../index.php?option=com_allevents&task=display&view=fullcalendar&layout=jsonadmin&format=json',
                        type: 'GET',
                        data: {
                            dc: '"<?php echo $dc;?> "',
                            dct: '"<?php echo !$dc;?>"',
                            admin: 1
                        }, // data
                        error: function () {
                            alert('Loading_Error');
                        } // error
                    }
                });

                // Init MonthPicker Plugin and Link to Calendar
                $('.inline-mp').monthpicker({
                    prevText: '<i class="fa fa-chevron-left"></i>&nbsp;',
                    nextText: '<i class="fa fa-chevron-right"></i>&nbsp;',
                    showButtonPanel: false,
                    onSelect: function (selectedDate) {
                        var formatted = moment(selectedDate, 'MM/YYYY').toDate();
                        $('#calendar').fullCalendar('gotoDate', formatted)
                    }
                });

                $('.inline-mp').monthpicker("setDate", moment().toDate());

            })
        }(jQuery));
    </script>