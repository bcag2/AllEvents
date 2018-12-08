<?php
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */
defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

$document = JFactory::getDocument();
AllEventsHelperOverride::bootstrap();
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('bootstrap_calendar.min.css'));
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addScript(JUri::root(true) . '/media/jui/js/jquery.min.js');
$document->addScript(AllEventsHelperOverride::GetScript('underscore-min.js'));
$document->addScript(AllEventsHelperOverride::GetScript('jstz.min.js'));
$document->addScript(AllEventsHelperOverride::GetScript('bootstrap_calendar.min.js'));
$document->addScript(AllEventsHelperOverride::GetScript('bootstrap_calendar.AE.js'));
?>

    <div id="">
        <div class="page-header">
            <div class="pull-right form-inline">
                <div class="btn-group">
                    <?php if ($this->params['navigation_previousmonth'] == 1) : ?>
                        <button class="btn btn-primary" data-calendar-nav="prev"
                                title="<?php echo JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_TEXT_PREVIOUSMONTH'); ?>"><<
                        </button>
                    <?php endif; ?>
                    <button class="btn" data-calendar-nav="today"><?php echo JText::_('TODAY'); ?></button>
                    <?php if ($this->params['navigation_nextmonth'] == 1) : ?>
                        <button class="btn btn-primary" data-calendar-nav="next"
                                title="<?php echo JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_TEXT_NEXTMONTH'); ?>">>>
                        </button>
                    <?php endif; ?>
                </div>

                <div class="btn-group">
                    <?php if ($this->params['display_allowviewyear'] == 1) : ?>
                        <button
                            class="btn btn-warning <?php echo ($this->params['display_defaultview'] == 'year') ? "active" : ""; ?>"
                            data-calendar-view="year"><?php echo JText::_('YEAR'); ?></button>
                    <?php endif; ?>
                    <?php if ($this->params['display_allowviewmonth'] == 1) : ?>
                        <button
                            class="btn btn-warning <?php echo ($this->params['display_defaultview'] == 'month') ? "active" : ""; ?>"
                            data-calendar-view="month"><?php echo JText::_('MONTH'); ?></button>
                    <?php endif; ?>
                    <?php if ($this->params['display_allowviewweek'] == 1) : ?>
                        <button
                            class="btn btn-warning <?php echo ($this->params['display_defaultview'] == 'week') ? "active" : ""; ?>"
                            data-calendar-view="week"><?php echo JText::_('WEEK'); ?></button>
                    <?php endif; ?>
                    <?php if ($this->params['display_allowviewday'] == 1) : ?>
                        <button
                            class="btn btn-warning <?php echo ($this->params['display_defaultview'] == 'day') ? "active" : ""; ?>"
                            data-calendar-view="day"><?php echo JText::_('DAY'); ?></button>
                    <?php endif; ?>
                </div>
            </div>
            <h3></h3>
        </div>

        <div class="row">
            <div class="span12">
                <div id="calendar"></div>
            </div>
        </div>

        <div class="modal hide fade" id="events-modal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Event</h3>
            </div>
            <div class="modal-body" style="height: 400px;">
            </div>
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn">Close</a>
            </div>
        </div>
    </div>
<?php
jimport('joomla.language.language');

$sJS = "var AEBS_PHP = {};\n" .
    "AEBS_PHP.language = '" . JFactory::getLanguage()->getTag() . "';\n" .
    "AEBS_PHP.view = '" . $this->params['display_defaultview'] . "';\n" .
    "AEBS_PHP.first_day = " . $this->params['gfirstday_week'] . ";\n" .
    "AEBS_PHP.JPATH_COMPONENT = '" . JUri::base(true) . "';\n" .
    "AEBS_PHP.translations = {\n" .
    "'YEAR' : '" . JText::_('YEAR', true) . "',\n" .
    "'WEEK' : '" . JText::_('WEEK', true) . "',\n" .
    "'COM_ALLEVENTS_DATETIMES': '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_TIME', true) . "',\n" .
    "'COM_ALLEVENTS_ALLDAY' : '" . JText::_('COM_ALLEVENTS_ALLDAY', true) . "',\n" .
    "'BEFORE_TIME' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_BEFORE', true) . "',\n" .
    "'AFTER_TIME' : '" . JText::_('COM_ALLEVENTS_AFTER', true) . "',\n" .
    "'EVENTS' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_EVENTS', true) . "',\n" .
    "'ERROR_NOVIEW' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_ERROR_NOVIEW', true) . "',\n" .
    "'ERROR_DATEFORMAT' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_ERROR_DATEFORMAT', true) . "',\n" .
    "'ERROR_LOADURL' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_ERROR_LOADURL', true) . "',\n" .
    "'ERROR_WHERE' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_ERROR_WHERE', true) . "',\n" .
    "'ERROR_TIMEDEVIDE' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_ERROR_TIMEDEVIDE', true) . "',\n" .
    "'01_01' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_01_01', true) . "',\n" .
    "'EASTER_2' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_EASTER_2', true) . "',\n" .
    "'EASTER' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_EASTER', true) . "',\n" .
    "'EASTER_1' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_EASTER_1', true) . "',\n" .
    "'01_05' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_01_05', true) . "',\n" .
    "'EASTER_39' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_EASTER_39', true) . "',\n" .
    "'EASTER_49' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_EASTER_49', true) . "',\n" .
    "'EASTER_50' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_EASTER_50', true) . "',\n" .
    "'14_07' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_14_07', true) . "',\n" .
    "'15_08' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_15_08', true) . "',\n" .
    "'01_11' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_01_11', true) . "',\n" .
    "'11_11' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_11_11', true) . "',\n" .
    "'25_12' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_25_12', true) . "',\n" .
    "'26_12' : '" . JText::_('COM_ALLEVENTS_BOOTSTRAPCALENDAR_26_12', true) . "',\n" .
    "'monthNames01' : '" . JText::_('JANUARY', true) . "',\n" .
    "'monthNames02' : '" . JText::_('FEBRUARY', true) . "',\n" .
    "'monthNames03' : '" . JText::_('MARCH', true) . "',\n" .
    "'monthNames04' : '" . JText::_('APRIL', true) . "',\n" .
    "'monthNames05' : '" . JText::_('MAY', true) . "',\n" .
    "'monthNames06' : '" . JText::_('JUNE', true) . "',\n" .
    "'monthNames07' : '" . JText::_('JULY', true) . "',\n" .
    "'monthNames08' : '" . JText::_('AUGUST', true) . "',\n" .
    "'monthNames09' : '" . JText::_('SEPTEMBER', true) . "',\n" .
    "'monthNames10' : '" . JText::_('OCTOBER', true) . "',\n" .
    "'monthNames11' : '" . JText::_('NOVEMBER', true) . "',\n" .
    "'monthNames12' : '" . JText::_('DECEMBER', true) . "',\n" .
    "'monthNamesShort01' : '" . JText::_('JANUARY_SHORT', true) . "',\n" .
    "'monthNamesShort02' : '" . JText::_('FEBRUARY_SHORT', true) . "',\n" .
    "'monthNamesShort03' : '" . JText::_('MARCH_SHORT', true) . "',\n" .
    "'monthNamesShort04' : '" . JText::_('APRIL_SHORT', true) . "',\n" .
    "'monthNamesShort05' : '" . JText::_('MAY_SHORT', true) . "',\n" .
    "'monthNamesShort06' : '" . JText::_('JUNE_SHORT', true) . "',\n" .
    "'monthNamesShort07' : '" . JText::_('JULY_SHORT', true) . "',\n" .
    "'monthNamesShort08' : '" . JText::_('AUGUST_SHORT', true) . "',\n" .
    "'monthNamesShort09' : '" . JText::_('SEPTEMBER_SHORT', true) . "',\n" .
    "'monthNamesShort10' : '" . JText::_('OCTOBER_SHORT', true) . "',\n" .
    "'monthNamesShort11' : '" . JText::_('NOVEMBER_SHORT', true) . "',\n" .
    "'monthNamesShort12' : '" . JText::_('DECEMBER_SHORT', true) . "',\n" .
    "'dayNames01' : '" . JText::_('SUNDAY', true) . "',\n" .
    "'dayNames02' : '" . JText::_('MONDAY', true) . "',\n" .
    "'dayNames03' : '" . JText::_('TUESDAY', true) . "',\n" .
    "'dayNames04' : '" . JText::_('WEDNESDAY', true) . "',\n" .
    "'dayNames05' : '" . JText::_('THURSDAY', true) . "',\n" .
    "'dayNames06' : '" . JText::_('FRIDAY', true) . "',\n" .
    "'dayNames07' : '" . JText::_('SATURDAY', true) . "',\n" .
    "'dayNamesShort01' : '" . JText::_('SUN', true) . "',\n" .
    "'dayNamesShort02' : '" . JText::_('MON', true) . "',\n" .
    "'dayNamesShort03' : '" . JText::_('TUE', true) . "',\n" .
    "'dayNamesShort04' : '" . JText::_('WED', true) . "',\n" .
    "'dayNamesShort05' : '" . JText::_('THU', true) . "',\n" .
    "'dayNamesShort06' : '" . JText::_('FRI', true) . "',\n" .
    "'dayNamesShort07' : '" . JText::_('SAT', true) . "',\n" .
    "};\n";

$document = JFactory::getDocument();
$document->addCustomTag('<script type="text/javascript">' . $sJS . '</script>');
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>