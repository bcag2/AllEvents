<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */
defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

$document = JFactory::getDocument();
$user = JFactory::getUser();
$userId = $user->get('id');
$params = AllEventsHelperParam::getGlobalParam();
$displaymanage = JFactory::getApplication()->input->get("manage");

JHtml::_('bootstrap.framework');
JHtml::_('jquery.framework');
$document->addStyleSheet(JUri::root(true) . '/media/jui/css/bootstrap.min.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/dashboard.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons32.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/appointments.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/gcal.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js');

$document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/appointments.js');
$canEdit = $user->authorise('core.edit', 'com_allevents');
$curlang = $document->language;

$startWeekDay = (int)$params['gfirstday_week'];
$dc = (int)$params['dc'];
$arrsatellites = [
    [
        'activity',
        'activities',
        'COM_ALLEVENTS_TITLE_ACTIVITIES',
        'COM_ALLEVENTS_INFO_ACTIVITIES',
        'controlpanel_showactivities',
        $this->NbActivities],
    [
        'agenda',
        'agendas',
        'COM_ALLEVENTS_TITLE_AGENDAS',
        'COM_ALLEVENTS_INFO_AGENDAS',
        'controlpanel_showagendas',
        $this->NbAgendas],
    [
        'category',
        'categories',
        'COM_ALLEVENTS_TITLE_CATEGORIES',
        'COM_ALLEVENTS_INFO_CATEGORIES',
        'controlpanel_showcategories',
        $this->NbCategories],
    [
        'place',
        'places',
        'PLACES',
        'COM_ALLEVENTS_INFO_PLACES',
        'controlpanel_showplaces',
        $this->NbPlaces],
    [
        'public',
        'publics',
        'COM_ALLEVENTS_TITLE_PUBLICS',
        'COM_ALLEVENTS_INFO_PUBLICS',
        'controlpanel_showpublics',
        $this->NbPublics],
    [
        'ressource',
        'ressources',
        'COM_ALLEVENTS_TITLE_RESSOURCES',
        'COM_ALLEVENTS_INFO_RESSOURCES',
        'controlpanel_showressources',
        $this->NbRessources],
    [
        'section',
        'sections',
        'COM_ALLEVENTS_TITLE_SECTIONS',
        'COM_ALLEVENTS_INFO_SECTIONS',
        'controlpanel_showsections',
        $this->NbSections],
    // ##€
    [
        'gcalendar',
        'gcalendars',
        'COM_ALLEVENTS_TITLE_GCALENDARS',
        'COM_ALLEVENTS_INFO_GCALENDARS',
        'controlpanel_showgcalendars',
        $this->NbGCalendars],
    [
        'customfield',
        'customfields',
        'COM_ALLEVENTS_CUSTOMFIELDS',
        'COM_ALLEVENTS_INFO_CUSTOMFIELDS',
        'controlpanel_showcustomfields',
        $this->NbCustomfields],
    [
        'ribbon',
        'ribbons',
        'COM_ALLEVENTS_RIBBONS',
        'COM_ALLEVENTS_INFO_RIBBONS',
        'controlpanel_showribbons',
        $this->NbCustomfields],
    // €##
];
?>
<?php if (!empty($this->sidebar)): ?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span12">
    <?php else : ?>
    <div id="j-main-container">
        <?php endif; ?>
        <?php if ($this->hasPostInstallationMessages): ?>
            <div class="alert alert-info">
                <h4>
                    <?php echo JText::_('ALLEVENTS_CPANEL_PIM_TITLE'); ?>
                </h4>
                <p>
                    <?php echo JText::_('ALLEVENTS_CPANEL_PIM_DESC'); ?>
                </p>
                <p>
                    <a class="btn btn-primary"
                       href="index.php?option=com_postinstall&eid=<?php echo $this->extension_id; ?>">
                        <?php echo JText::_('ALLEVENTS_CPANEL_PIM_BUTTON'); ?>
                    </a>
                </p>
            </div>
        <?php elseif (is_null($this->hasPostInstallationMessages)): ?>
            <div class="alert alert-info">
                <h4>
                    <?php echo JText::_('ALLEVENTS_CPANEL_PIM_ERROR_TITLE'); ?>
                </h4>
                <p>
                    <?php echo JText::_('ALLEVENTS_CPANEL_PIM_ERROR_DESC'); ?>
                </p>
            </div>
        <?php endif; ?>

        <div class="container" style="width: 95%;">
            <div class="row">
                <img width="175px" src="../media/com_allevents/css/images/allevents.png" alt="AllEvents" target="_blank"
                     title="AllEvents - visit the website">
                <div class="blockbtn" style="font-size:0.9em;">
                    <b>%%ae3.version%%</b>&nbsp;|&nbsp;<?php echo substr('%%build.date%%', 0, 10); ?></div>
                <button class="btn btn-small" style="float: right;"
                        onclick="location.href='index.php?option=com_config&amp;view=component&amp;component=com_allevents';">
                    <span class="icon-options"></span><?php echo JText::_('JTOOLBAR_OPTIONS'); ?></button>
            </div>
            <div class="row">
                <div class="span6">
                    <div class="widget widget-nopad">
                        <div class="widget-header">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <h3><?php echo JText::_('COM_ALLEVENTS_CALENDAR'); ?></h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class='calendar_loading'></div>
                            <div id='calendar'></div>
                            <div id="appointments" style="display:none;" class="height-300 row">
                                <div class="span12">
                                    <div class="span5">
                                        <div class="actual-date">
                                            <span class="actual-day"></span>
                                            <span class="actual-month"></span>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="clock-wrapper">
                                            <div class="clock">
                                                <div class="circle">
                                                    <div class="face">
                                                        <div id="hour"></div>
                                                        <div id="minute"></div>
                                                        <div id="second"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span12" style="margin-left:0;">
                                    <div class="appointments border-top border-bottom border-light space15">
                                        <a class="btn btn-sm owl-prev text-light">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                        <div class="e-slider owl-carousel owl-theme"
                                             data-plugin-options='{"transitionStyle": "goDown", "pagination": false}'>
                                            <?php foreach ($this->EventsAppointments as $item) { ?>
                                                <div class="item">
                                                    <div class="inline-block padding-10 border-right border-light">
                                                        <?php if ($item->allday != 1) {
                                                            echo '<span class="bold-text text-small"><i class="fa fa-clock-o"></i>';
                                                            echo JHtml::_('date', $item->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                                                            echo '</span>';
                                                        } ?>
                                                        <span class="text-light text-extra-small"></span>
                                                    </div>
                                                    <div class="inline-block padding-10">
                                                         <span
                                                             class="bold-text text-small"><?php echo $this->escape($item->titre); ?></span>
                                                        <span
                                                            class="text-light text-small"><?php echo $this->escape($item->agenda_titre); ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <a class="btn btn-sm owl-next text-light"><i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="span12" style="margin-left:0;">
                                    <div class="pull-right">
                                        <a href="index.php?option=com_allevents&amp;view=event&amp;layout=edit"
                                           class="btn btn-transparent-white"><i
                                                class="fa fa-plus"></i> <?php echo JText::_('COM_ALLEVENTS_ADDEVENT'); ?>
                                        </a>
                                        <a href="index.php?option=com_allevents&amp;view=events&amp;layout=calendar"
                                           class="btn btn-transparent-white show-calendar"><i
                                                class="fa fa-calendar-o"></i> <?php echo JText::_('COM_ALLEVENTS_CALENDAR', true); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <!-- /widget -->
                </div>
                <!-- /span6 -->
                <div class="span3">
                    <div class="widget">
                        <div class="widget-header"><i class="fa fa-bookmark" aria-hidden="true"></i>
                            <h3><?php echo JText::_('JTOOLBAR_SHORTCUTS'); ?></h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="shortcuts">
                                <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_EVENTS'); ?>"
                                   href="index.php?option=com_allevents&amp;view=events" class="shortcut">
                                    <div align="center" class="se_img32_container">
                                        <span class="se_img32_sprite se_img32 se_img32_events" title=""></span>
                                    </div>
                                    <span
                                        class="shortcut-label"><?php echo JText::_('COM_ALLEVENTS_CPANEL_LIST_EVENTS') . ' (' . $this->NbEvents . ')'; ?></span>
                                    <?php echo ($this->NbEventsToApprove > 0) ? '<span class="label label-red">' . $this->NbEventsToApprove . '</span>' : ''; ?>
                                </a>
                                <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_EVENT'); ?>"
                                   href="index.php?option=com_allevents&amp;view=event&amp;layout=edit"
                                   class="shortcut">
                                    <div align="center" class="se_img32_container">
                                        <span class="se_img32_sprite se_img32 se_img32_event-add" title=""></span>
                                    </div>
                                    <span
                                        class="shortcut-label"><?php echo JText::_('COM_ALLEVENTS_ADDEVENT'); ?></span>
                                    <span class="triangle-button blue"><i class="fa fa-plus"></i></span>
                                </a>
                                <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_PAYMENTS'); ?>"
                                   href="index.php?option=com_allevents&amp;view=orders" class="shortcut">
                                    <div align="center" class="se_img32_container">
                                        <span class="se_img32_sprite se_img32 se_img32_payment" title=""></span>
                                    </div>
                                    <span
                                        class="shortcut-label"><?php echo JText::_('COM_ALLEVENTS_TITLE_PAYMENTS'); ?></span>
                                    <!--<span class="triangle-button green"><span class="inner">+3</span></span>-->
                                </a>
                                <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_ENROLMENTS'); ?>"
                                   href="index.php?option=com_allevents&amp;view=enrolments" class="shortcut">
                                    <div align="center" class="se_img32_container">
                                        <span class="se_img32_sprite se_img32 se_img32_enrolments" title=""></span>
                                    </div>
                                    <span
                                        class="shortcut-label"><?php echo JText::_('COM_ALLEVENTS_CPANEL_ENROLMENTS'); ?></span>
                                    <?php echo ($this->NbEnrolmentsToApprove > 0) ? '<span class="label label-red">' . $this->NbEnrolmentsToApprove . '</span>' : ''; ?>
                                </a>
                                <!-- €€€ -->
                                <?php if ($params['controlpanel_showimport'] == "1") : ?>
                                    <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_IMPORT'); ?>"
                                       href="index.php?option=com_allevents&amp;view=import" class="shortcut">
                                        <div align="center" class="se_img32_container">
                                            <span class="se_img32_sprite se_img32 se_img32_import" title=""></span>
                                        </div>
                                        <span
                                            class="shortcut-label"><?php echo JText::_('COM_ALLEVENTS_CPANEL_IMPORT'); ?></span>
                                    </a>
                                <?php endif; ?>
                                <!-- €€€ -->
                                <div class="shortcut">
                                </div>
                                <!-- /shortcuts -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                    </div>
                    <!-- /widget -->
                </div>
                <!-- widget MANAGE-->
                <div class="span3">
                    <div class="widget widget-table action-table">
                        <div class="widget-header">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <h3><?php echo JText::_('JTOOLBAR_MANAGE'); ?></h3>
                        </div>
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($arrsatellites as $value) {
                                    if ($params[$value[4]] == "1") {
                                        echo '<tr><td>';
                                        echo '<a title="' . JText::_($value[3]) . '" href="index.php?option=com_allevents&amp;view=' . $value[1] . '">';
                                        echo '<span class="iconText">' . JText::_($value[2]) . '</span>';
                                        echo '</a>&nbsp;';
                                        echo (empty($value[5])) ? '' : '<span class="badge">' . $value[5] . '</span>';
                                        echo '&nbsp;<a style="margin-top:1px; float: right; cursor: pointer;margin-left: 8px;" class="fa fa-plus" href="index.php?option=com_allevents&amp;view=' . $value[0] . '&amp;layout=edit"></a>';
                                        echo ($value[0] == 'agenda') ? '&nbsp;<a style="margin-top:1px; float: right; cursor: pointer;margin-left: 8px;" class="fa fa-cog" id="manage-' . $value[0] . '"></a>' : '';
                                        echo '</td></tr>';
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /span6 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <!-- FOOTER AE -->
        <table style="width: 100%;margin-top: 12px;clear: both;" class="adminlist">
            <tbody>
            <tr>
                <td valign="middle" align="center" style="position: relative;" id="ae_ext_td">
                    <div style="position: absolute;left: 2px;top: 7px;">
                        <a href="https://www.allevents3.com/"><img width="160"
                                                                   title="<?php echo JText::_('AE_FOOTER_ALLEVENTS'); ?>"
                                                                   alt="AllEvents"
                                                                   src="../media/com_allevents/css/images/allevents.png"></a>
                        <a target="_blank" href="https://twitter.com/elecoest"><img
                                title="<?php echo JText::_('AE_FOOTER_TWITTER'); ?>"
                                src="../media/com_allevents/css/images/follow-us-on-twitter.png"></a>
                        <a target="_blank" href="https://www.facebook.com/com.allevents"><img
                                title="<?php echo JText::_('AE_FOOTER_FACEBOOK'); ?>"
                                src="../media/com_allevents/css/images/follow-us-on-facebook.png"></a>
                    </div>
                    <div id="ae_bottom_link">
                        <a target="_blank"
                           href="https://www.allevents3.com/en/allevents-premium-product">AllEvents</a>&nbsp;<?php echo JText::_('AE_FOOTER_LINK'); ?>
                        &nbsp;<a target="_blank" href="https://www.allevents3.com">Emmanuel Lecoester</a>
                    </div>
                    <div style="position: absolute;right: 2px;top: 7px;">
                        <a title="<?php echo JText::_('AE_FOOTER_RATE'); ?>" class="ae_ext_bottom_icon" id="ae_ext_rate"
                           target="_blank"
                           href="https://extensions.joomla.org/extensions/extension/calendars-a-events/allevents/">
                            &nbsp;</a>
                        <!-- FREE -->
                        <a title="<?php echo JText::_('AE_FOOTER_BUY'); ?>" class="ae_ext_bottom_icon"
                           style="margin: 0 2px 0 0;" id="ae_ext_buy" target="_blank"
                           href="https://www.allevents3.com/en/allevents-premium-product">
                            &nbsp;</a>
                        <!-- EERF -->
                        <a title="<?php echo JText::_('AE_FOOTER_SUPPORT'); ?>" class="ae_ext_bottom_icon"
                           id="ae_ext_support" target="_blank" href="https://www.allevents3.com/en/support">&nbsp;</a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- fenetre modale pour gérer les agendas -->
    <div class="modal fade" id="myModalAgendaManage" tabindex="-1" role="dialog"
         aria-labelledby="myModalAgendaManageLabel" aria-hidden="true" style="text-align:left;display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"
                        id="myModalAgendaManageLabel"><?php echo JText::_('JTOOLBAR_MANAGE', true) . '&nbsp;' . JText::_('COM_ALLEVENTS_TITLE_AGENDAS'); ?>
                        <div style="float: right; margin-right: 15px;" id="gcal-block">
                        </div>
                    </h3>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($this->AgendasMostViewed as $i => $item) {
                            echo '<tr>';
                            echo '<td>';
                            echo '<span style="border-width:  0 0 1px 4px;;border-style: solid;border-color: ' . $item->couleur . ';padding:8px ; "><i class=" icon-16-sprite icon-16 icon-' . ($item->default ? '' : 'un') . 'featured"></i>';
                            echo $item->titre . '&nbsp;(' . $item->hits . '&nbsp;' . JText::_('COM_ALLEVENTS_TITLE_EVENTS') . ')';
                            echo($item->access == 1 ? '&nbsp;<i aria-hidden="true" class="fa fa-globe"></i>' : '');
                            echo '</span>';
                            echo '<div class="cactionss" style="float: right;">';
                            echo '   <button onclick="window.location.href=\'' . JRoute::_('index.php?option=com_allevents&task=agenda.edit&id=' . $item->id) . '\'" class="editCal btn-xs btn-warning">' . JText::_('JTOOLBAR_EDIT', true) . '</button>';
                            echo '   <button onclick="deleteagenda(' . $item->id . ')" class="deleteCal btn-xs btn-danger">' . JText::_('JTOOLBAR_DELETE', true) . '</button>';
                            echo '   <button onclick="exportagenda(' . $item->id . ')" class="exportCal btn-xs btn-primary" data-vid="1">' . JText::_('JTOOLBAR_EXPORT', true) . '</button>';
                            echo '</div>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo JText::_('JTOOLBAR_CLOSE', true); ?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        moment.lang('<?php echo substr($curlang, 0, 2); ?>');
        (function ($) {
            $(document).ready(function () {
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    selectHelper: true,
                    editable: true,
                    loading: function (bool) {
                        if (bool) {
                            var position = $('#calendar').position();
                            $('.calendar_loading').css('left', position.left).css('top', position.top).css('width', $('#calendar').width()).css('height', $('#mod_aefullcalendar').height()).show();
                        } else {
                            $('.calendar_loading').hide();
                        }
                    }, // loading
                    monthNames: [<?php echo $params['monthNames']; ?>],
                    monthNamesShort: [<?php echo $params['monthNamesShort']; ?>],
                    dayNames: [<?php echo $params['dayNames']; ?>],
                    dayNamesShort: [<?php echo $params['dayNamesShort']; ?>],
                    axisFormat: '<?php echo $params['gtime_formatAEFC']; ?>',
                    eventLimit: true, // allow "more" link when too many events
                    slotLabelFormat: '<?php echo $params['gtime_formatAEFC']; ?>',
                    timeFormat: '<?php echo $params['gtime_formatAEFC']; ?>',
                    buttonText: {
                        today: '<?php echo JText::_('TODAY', true); ?>',
                        day: '<?php echo JText::_('DAY', true); ?>',
                        week: '<?php echo JText::_('WEEK', true); ?>',
                        month: '<?php echo JText::_('MONTH', true); ?>'
                    },
                    firstDay: "<?php echo $startWeekDay;?> ",
                    events: {
                        url: '../index.php?option=com_allevents&task=display&view=fullcalendar&layout=jsonevt&format=json',
                        type: 'GET',
                        data: {
                            dc: '<?php echo $dc;?>',
                            dct: '<?php echo !$dc;?>',
                            // range_start : $('#calendar').fullCalendar('getCalendar').view.start,
                            // range_end : $('#calendar').fullCalendar('getCalendar').view.end,
                            admin: 1
                        }, // data
                        error: function () {
                            alert('Loading_Error');
                        } // error
                    } // events
                });

                if ($('#j-toggle-sidebar').is(":visible")) {
                    window.toggleSidebar(false);
                }
                $('#manage-agenda').click(function () {
                    $('#myModalAgendaManage').modal({backdrop: 'static', keyboard: false});
                });

                $('.fc-right .fc-button-group').append('<button class="fc-button-appointments fc-button fc-state-default fc-corner-right fc-state-active" type="button"><?php echo JText::_("JTOOLBAR_APPOINTMENTS"); ?></button>');
                $('.fc-month-button, .fc-agendaWeek-button, .fc-agendaDay-button').click(function () {
                    $('#calendar').fullCalendar('refetchEvents');
                    $('#appointments').hide();
                    $('.fc-view-container').show();
                    $('.fc-center').show();
                });

                $('.fc-button-appointments').click(function () {
                    $('.fc-center').hide();
                    $('.fc-view-container').hide();
                    $('#appointments').show();
                });
                <?php if ($displaymanage) : ?>
                $('#manage-agenda').click();
                <?php endif; ?>
                appointments.init();
            })
        }(jQuery));
        function deleteagenda(agenda_id) {
            var r = confirm("<?php echo JText::_('DELETE_AGENDA_CONFIRM', true); ?>");
            if (r == true) {
                window.location.href = "index.php?option=com_allevents&task=main.agendadelete&id=" + agenda_id;
            }
        }
        function exportagenda(agenda_id) {
            window.location.href = "index.php?option=com_allevents&task=main.agendaexport&id=" + agenda_id;
        }
    </script>