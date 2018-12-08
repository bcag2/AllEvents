<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
// TODO: #22: FrontEnd - aefc - ajout d'une vue ressources

defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * Inclusion des fichiers JS externes
 *
 * @param $folder
 */
function includeScriptAEFC($folder)
{
    AllEventsHelperOverride::jquery();

    $document = JFactory::getDocument();
    //$document->addScriptDeclaration('$=jQuery;') ; 
    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js');
    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js');
    $document->addScript($folder . 'premium/jquery.icalendar.js');
    // fullcalendar
    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.js');
    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/gcal.js');
    $document->addScript($folder . 'premium/fullcalendar.AE.js');

    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.js');
    $document->addScript($folder . 'premium/jquery.ui.selectmenu.min.js');
    $document->addScript($folder . 'premium/wCheck.min.js');
    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap.min.js');
    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.min.js');

    // wijmo
    // $document->addScript($folder . 'premium/jquery.wijmo.wijutil.min.js');
    // $document->addScript($folder . 'premium/jquery.wijmo.wijdatepager.min.js');
    // $document->addScript($folder . 'premium/jquery.wijmo.wijpopup.min.js');
    $document->addScript($folder . 'premium/globalize.min.js');
    $document->addScript($folder . 'premium/globalize.cultures.js');

    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/froala-editor/1.2.2/js/froala_editor.min.js');
    $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.2/sweetalert.min.js');

    // récurrence
    $document->addScript($folder . 'premium/rrule.js');
    $document->addScript($folder . 'premium/nlp.js');

    return;
} // function includeScriptAEFC()

/**
 * Inclusion des feuilles de style
 */
function includeCSSAEFC()
{
    $sTheme = getParamsAEFC("display_template", "string", "cupertino");
    $sTheme = ($sTheme == '') ? 'cupertino' : $sTheme;

    $document = JFactory::getDocument();
    $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/themes/' . $sTheme . '/jquery-ui.css');
    $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.css');
    $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('jquery.ui.selectmenu.css'));
    $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('wCheck.css'));
    $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.css');
    $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.2/toastr.min.css');
    $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/froala-editor/1.2.2/css/froala_page.min.css');
    $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/froala-editor/1.2.2/css/froala_editor.min.css');
    $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.2/sweetalert.min.css');
    // $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('jquery.wijmo.wijdatepager.css'));
    $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('AEFC.css'));
    $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
    AllEventsHelperOverride::custom_css();

    return true;
} // function includeCSSAEFC()

/**
 * Lit les paramÃ¨tres dÃ©finis au niveau de la vue cÃ d de l'entrÃ©e de menu de type FullCalendar
 *
 * @staticvar type $menu
 * @staticvar type $query
 *
 * @param string|type $name
 * @param string|type $type $type
 * @param             $default
 *
 * @return bool|int|null
 * @throws Exception
 */
function getParamsAEFC($name = "", $type = "", $default)
{
    static $params = null;

    $return = null;
    $app = JFactory::getApplication();
    $params = $app->getParams('com_allevents');

    if ($params == null) {
        $return = $default;
    } else {
        $return = $params->get($name, $default);
        switch ($type) {
            case 'bool':
                $return = ($return == '1' ? true : false);
                break;
            case 'int':
                $return = intval($return);
        }
    }

    return $return;
} // function getParams

/**
 * Génération de la liste déroulante avec les agendas de AE
 *
 * @param $media
 * @param $agendas
 *
 * @return string
 */
function GetCbxAgenda($media, $agendas)
{
    $cbx = '<option value="0" class="avatar" title="' . $media . 'agenda.png">' . JText::_('AGENDA') . '</option>';

    if (isset($agendas)) {
        foreach ($agendas as $obj) {
            $cbx .= '<option value="' . $obj->id . '" class="avatar se_agenda_' . $obj->id . '_color" title="' . $obj->image_bullet . '">' . $obj->titre . '</option>';
        }
    }

    return $cbx;
} // function GetCbxAgenda()

/**
 * Génération de la liste déroulante avec les activités de AE
 *
 * @param $media
 * @param $activities
 *
 * @return string
 */
function GetCbxActivity($media, $activities)
{
    $cbx = '<option value="0" class="avatar" title="' . $media . 'activity.png">' . JText::_('ACTIVITY') . '</option>';

    if (isset($activities)) {
        foreach ($activities as $obj) {
            if (isset($obj->image_bullet)) {
                $cbx .= '<option value="' . $obj->id . '" class="avatar" title="' . $obj->image_bullet . '">' . $obj->titre . '</option>';
            } else {
                $cbx .= '<option value="' . $obj->id . '" class="avatar" title="">' . $obj->titre . '</option>';
            }
        }
    }

    return $cbx;
} // function GetCbxActivity()

/**
 * Génération de la liste déroulante avec les localisations de AE
 *
 * @param $media
 * @param $places
 *
 * @return string
 */
function GetCbxPlace($media, $places)
{
    $cbx = '<option value="0" class="avatar" title="' . $media . 'map.png">' . JText::_('PLACE') . '</option>';

    if (isset($places)) {
        foreach ($places as $obj) {
            if (isset($obj->image_bullet)) {
                $cbx .= '<option value="' . $obj->id . '" class="avatar" title="' . $obj->image_bullet . '">' . $obj->titre . '</option>';
            } else {
                $cbx .= '<option value="' . $obj->id . '" class="avatar" title="">' . $obj->titre . '</option>';
            }
        }
    }

    return $cbx;
} // function GetCbxPlace()

/**
 * Génère une variable AEFC_PHP qui sera écrite dans une balise <script> de telle manière qu'elle soit utilisable par le code Javascript fullcalendar.AE.js.
 *
 * Cette fonction écrit un grand nombre de chaînes de caractères à des fins d'internationalisation.
 *
 * @return void
 * @throws Exception
 * @global AllEventsClassJS $g_se_JS
 */
function SetVariablesForJS()
{
    jimport('joomla.language.language');
    $ae_version = '';
    $lang = JFactory::getLanguage();
    $app = JFactory::getApplication();
    $jinput = JFactory::getApplication()->input;
    $languages = explode("-", $lang->getTag());

    $sJS = "var AEFC = {};\n" .
        "var AEFC_PHP = {};\n" .
        "AEFC_PHP.versionae = '" . $ae_version . "';\n" .
        "AEFC_PHP.language = '" . $languages[0] . "';\n" .
        "AEFC_PHP.locale = '" . $lang->getTag() . "';\n" .
        "AEFC_PHP.CanPropose = false;\n" .
        "AEFC_PHP.JPATH_COMPONENT = '" . JUri::base(true) . "';\n" .
        "AEFC_PHP.first_day = " . getParamsAEFC("gfirstday_week", "string", "1") . ";\n" .
        "AEFC_PHP.hour_date = '" . getParamsAEFC("gtime_formatAEFC", "string", "yyyy-MM-dd") . "';\n" .
        "AEFC_PHP.ItemID = '" . (int)$app->input->getInt('Itemid', null) . "';\n" .
        "AEFC_PHP.day_date = '" . getParamsAEFC("gdate_formatAEFC", "string", "HH:mm") . "';\n" .
        "AEFC_PHP.technicalformat = '" . getParamsAEFC("gdatetime_technicalformatAE", "string", "") . "';\n" .
        "AEFC_PHP.url = '" . JUri::root() . "';\n" .
        "AEFC_PHP.css = '" . JUri::root() . "media/com_allevents/css/';\n" .
        "AEFC_PHP.translations = {\n" .
        "'Not enough permissions' : '" . JText::_('NOT_ENOUGH_PERMISSIONS', true) . "',\n" .
        "'Print' : '" . JText::_('JGLOBAL_PRINT', true) . "',\n" .
        "'Date' : '" . JText::_('JDATE', true) . "',\n" .
        "'Add event' : '" . JText::_('COM_ALLEVENTS_ADDEVENT', true) . "',\n" .
        "'Add place' : '" . JText::_('COM_ALLEVENTS_ADDPLACE', true) . "',\n" .
        "'Snapshot' : '" . JText::_('COM_ALLEVENTS_SNAPSHOT', true) . "',\n" .
        "'Pdf' : '" . JText::_('COM_ALLEVENTS_PDF', true) . "',\n" .
        "'New event' : '" . JText::_('COM_ALLEVENTS_NEWEVENT', true) . "',\n" .
        "'New place' : '" . JText::_('COM_ALLEVENTS_NEWPLACE', true) . "',\n" .
        "'EVENT_NOT_FOUND' : '" . JText::_('COM_ALLEVENTS_ERROR_EVENT_NOT_FOUND', true) . "',\n" .
        "'Places refreshed' : '" . JText::_('COM_ALLEVENTS_PLACESREFRESHED', true) . "',\n" .
        "'Refresh Places' : '" . JText::_('COM_ALLEVENTS_REFRESHPLACES', true) . "',\n" .
        "'Loading_Error' : '" . JText::_('COM_ALLEVENTS_LOADINGERROR', true) . "',\n" .
        "'Event deleted' : '" . JText::_('COM_ALLEVENTS_EVENTDELETED', true) . "',\n" .
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
        "'AE_ARE_YOU_SURE' : '" . JText::_('AE_ARE_YOU_SURE', true) . "',\n" .
        "'today' : '" . JText::_('TODAY', true) . "',\n" .
        "'day' : '" . JText::_('DAY', true) . "',\n" .
        "'week' : '" . JText::_('WEEK', true) . "',\n" .
        "'month' : '" . JText::_('MONTH', true) . "',\n" .
        "'days' : '" . JText::_('DAYS', true) . "',\n" .
        "'weeks' : '" . JText::_('COM_ALLEVENTS_WEEKS', true) . "',\n" .
        "'months' : '" . JText::_('MONTHS', true) . "',\n" .
        "'years' : '" . JText::_('YEARS', true) . "',\n" .
        "'close' : '" . JText::_('JTOOLBAR_CLOSE', true) . "',\n" .
        "'prev' : '" . JText::_('COM_ALLEVENTS_PREV', true) . "',\n" .
        "'next' : '" . JText::_('COM_ALLEVENTS_NEXT', true) . "',\n" .
        "'titleFormatmonth' : ' MMMM yyyy',\n" .
        "'titleFormatweek' : '" . sprintf(JText::_('COM_ALLEVENTS_WEEKFROMTILL', true), 'dd [MMMM] [yyyy]', ' dd MMMM yyyy') . "',\n" .
        "'titleFormatday' : ' dddd d MMMM yyyy',\n" .
        "'columnFormatmonth'      : ' ddd',\n" .
        "'columnFormatweek'       : ' ddd d',\n" .
        "'Loading...' : '" . JText::_('COM_ALLEVENTS_LOADING', true) . "',\n" .
        "'edit' : '" . JText::_('JACTION_EDIT', true) . "',\n" .
        "'visu' : '" . JText::_('JACTION_VISUALISATION', true) . "',\n" .
        "'Update event' : '" . sprintf(JText::_('VIEW_DETAIL_TITLE', true), JText::_('EVENT', true)) . "',\n" .
        "'delete' : '" . JText::_('JACTION_DELETE', true) . "',\n" .
        "'update' : '" . JText::_('JACTION_EDIT', true) . "',\n" .
        "'confirm' : '" . JText::_('COM_ALLEVENTS_CONFIRM', true) . "',\n" .
        "'expand' : '" . JText::_('COM_ALLEVENTS_EXPAND', true) . "',\n" .
        "'compress' : '" . JText::_('COM_ALLEVENTS_COMPRESS', true) . "',\n" .
        "'cancel' : '" . JText::_('JTOOLBAR_CANCEL', true) . "',\n" .
        "'add' : '" . JText::_('JSAVE', true) . "',\n" .
        "'create' : '" . JText::_('JACTION_CREATE', true) . "',\n" .
        "'Place created' : '" . JText::_('COM_ALLEVENTS_PLACECREATED', true) . "',\n" .
        "'Event created' : '" . JText::_('COM_ALLEVENTS_EVENTCREATED', true) . "',\n" .
        "'Event updated' : '" . JText::_('COM_ALLEVENTS_EVENTUPDATED', true) . "',\n" .
        "'Event deleted' : '" . JText::_('COM_ALLEVENTS_EVENTDELETED', true) . "',\n" .
        "'example_month' : '" . JText::_('COM_ALLEVENTS_EXAMPLEMONTH', true) . "',\n" .
        "'example_week' : '" . JText::_('COM_ALLEVENTS_EXAMPLEWEEK', true) . "',\n" .
        "'title required' : '" . JText::_('ERR_SE_TITRE_EMPTY', true) . "',\n" .
        "'daily_reccur' : '" . JText::_('COM_ALLEVENTS_DAILY', true) . "',\n" .
        "'weekly_reccur' : '" . JText::_('COM_ALLEVENTS_WEEKLY', true) . "',\n" .
        "'monthly_reccur' : '" . JText::_('COM_ALLEVENTS_MONTHLY', true) . "',\n" .
        "'yearly_reccur' : '" . JText::_('COM_ALLEVENTS_YEARLY', true) . "',\n" .
        "'No recurrence' : '" . JText::_('COM_ALLEVENTS_NO_RECURRENCE', true) . "',\n" .
        "'none_reccur' : '" . JText::_('JNONE', true) . "',\n" .
        "'MOVEEVENT_CONFIRM' : '" . JText::_('MOVEEVENT_CONFIRM', true) . "',\n" .
        "'DELETE_CONFIRM' : '" . JText::_('DELETE_CONFIRM', true) . "',\n" .
        "'CREEVENT_ERRORDATE' : '" . JText::_('CREEVENT_ERRORDATE', true) . "',\n" .
        "'MOVEEVENT_IMPOSSIBLE' : '" . JText::_('MOVEEVENT_IMPOSSIBLE', true) . "',\n" .
        "'AEFC_SKIP' : '" . JText::_('AEFC_SKIP', true) . "',\n" .
        "'AEFC_number' : '" . JText::_('AEFC_NUMBER', true) . "',\n" .
        "'AEFC_numberAsText' : '" . JText::_('AEFC_NUMBERASTEXT', true) . "',\n" .
        "'AEFC_every' : '" . JText::_('AEFC_EVERY', true) . "',\n" .
        "'AEFC_day' : '" . JText::_('DAY', true) . "',\n" .
        "'AEFC_weekday' : '" . JText::_('AEFC_WEEKDAY', true) . "',\n" .
        "'WEEK' : '" . JText::_('WEEK', true) . "',\n" .
        "'MONTH' : '" . JText::_('MONTH', true) . "',\n" .
        "'AEFC_year' : '" . JText::_('YEAR', true) . "',\n" .
        "'AEFC_days' : '" . JText::_('DAYS', true) . "',\n" .
        "'AEFC_weekdays' : '" . JText::_('AEFC_WEEKDAYS', true) . "',\n" .
        "'AEFC_weeks' : '" . JText::_('COM_ALLEVENTS_WEEKS', true) . "',\n" .
        "'AEFC_months' : '" . JText::_('MONTHS', true) . "',\n" .
        "'AEFC_years' : '" . JText::_('YEARS', true) . "',\n" .
        "'AEFC_list' : '" . JText::_('AEFC_LIST', true) . "',\n" .
        "'AEFC_on' : '" . JText::_('AEFC_ON', true) . "',\n" .
        "'AEFC_the' : '" . JText::_('AEFC_THE', true) . "',\n" .
        "'AEFC_first' : '" . JText::_('AEFC_FIRST', true) . "',\n" .
        "'AEFC_second' : '" . JText::_('AEFC_SECOND', true) . "',\n" .
        "'AEFC_third' : '" . JText::_('AEFC_THIRD', true) . "',\n" .
        "'AEFC_nth' : '" . JText::_('AEFC_NTH', true) . "',\n" .
        "'AEFC_last' : '" . JText::_('COM_ALLEVENTS_LAST', true) . "',\n" .
        "'AEFC_for' : '" . JText::_('AEFC_FOR', true) . "',\n" .
        "'AEFC_time' : '" . JText::_('AEFC_TIME', true) . "',\n" .
        "'AEFC_times' : '" . JText::_('COM_ALLEVENTS_TIMES', true) . "',\n" .
        "'AEFC_until' : '" . JText::_('AEFC_UNTIL', true) . "',\n" .
        "'AEFC_DAYDESC' : '" . JText::_('AEFC_DAYDESC', true) . "',\n" .
        "'AEFC_WEEKDESC' : '" . JText::_('AEFC_WEEKDESC', true) . "',\n" .
        "'AEFC_LISTDESC' : '" . JText::_('AEFC_LISTDESC', true) . "',\n" .
        "'AEFC_MONTHDESC' : '" . JText::_('AEFC_MONTHDESC', true) . "',\n" .
        "'YEAR_DESC' : '" . JText::_('YEAR_DESC', true) . "',\n" .
        "'COM_ALLEVENTS_EDITEDON' : '" . JText::_('COM_ALLEVENTS_EDITEDON', true) . "',\n" .
        "'AEFC_TEXT_NEXTMONTH' : '" . JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_NEXTMONTH', true) . "',\n" .
        "'AEFC_TEXT_NEXTYEAR' : '" . JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_NEXTYEAR', true) . "',\n" .
        "'AEFC_TEXT_PREVIOUSMONTH' : '" . JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_PREVIOUSMONTH', true) . "',\n" .
        "'AEFC_TEXT_PREVIOUSYEAR' : '" . JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_PREVIOUSYEAR', true) . "'\n" . "};
    // AEFC.translations\n";
    // -------------------------------------------------------------
    // Lecture des paramètres de la vue.
    $params = AllEventsHelperParam::getGlobalParam();
    $sJS .= "var AEFC_Params = {};\n";
    $sJS .= "AEFC_Params.qtipstatus=" . (getParamsAEFC("display_showtooltip", "bool", "true") == true ? 'true' : 'false') . ";\n";
    $sJS .= "AEFC_Params.logstatus=" . (getParamsAEFC("display_notification", "bool", "true") == true ? 'true' : 'false') . ";\n";
    $sJS .= "AEFC_Params.dc=" . getParamsAEFC("display_colors", "string", $params['gdisplay_colors']) . ";\n";
    $sJS .= "AEFC_Params.dct=" . getParamsAEFC("display_colors_fore", "string", $params['gdisplay_colors_fore']) . ";\n";
    $sJS .= "AEFC_Params.dcb=" . getParamsAEFC("display_colors_back", "string", $params['gdisplay_colors_back']) . ";\n";
    $sJS .= "AEFC_Params.openlinkself='" . getParamsAEFC("display_openlinkself", "string", "_blank") . "';\n";

    $sJS .= "AEFC_Params.formats = {};\n";
    $sJS .= "AEFC_Params.formats.datetimeformat = '" . getParamsAEFC("gdate_formatAEFC", "string", "yyyy-MM-dd") . " " . getParamsAEFC("gtime_formatAEFC", "string", "HH:mm") . "';\n";
    $sJS .= "AEFC_Params.formats.dateformat = '" . getParamsAEFC("gdate_formatAEFC", "string", "yyyy-MM-dd") . "';\n";
    $sJS .= "AEFC_Params.formats.timeformat = '" . getParamsAEFC("gtime_formatAEFC", "string", "HH:mm") . "';\n";
    $sJS .= "AEFC_Params.formats.datelongformat = 'DD, d MM';\n";
    $sJS .= "AEFC_Params.formats.momentdatetimeformat = '" . getParamsAEFC("gdate_formatmoment", "string", "yyyy-MM-dd") . " " . getParamsAEFC("gtime_formatmoment", "string", "HH:mm") . "';\n";
    $sJS .= "AEFC_Params.formats.momentdateformat = '" . getParamsAEFC("gdate_formatmoment", "string", "yyyy-MM-dd") . "';\n";
    $sJS .= "AEFC_Params.formats.momenttimeformat = '" . getParamsAEFC("gtime_formatmoment", "string", "HH:mm") . "';\n";

    // -------------------------------------------------------------
    // AEFC_Params.fullcalendar

    $sJS .= "AEFC_Params.fullcalendar = {}\n";
    // Quelle est la vue par défaut ?
    $arr = [
        'month',
        'agendaWeek',
        'agendaDay'
    ];

    $sJS .= "AEFC_Params.fullcalendar.defaultView=\"" . $arr[getParamsAEFC("display_defaultview", "string", "0")] . "\";\n";
    // Quels sont les boutons de navigation à afficher ?
    $view = (getParamsAEFC("navigation_previousyear", "bool", "false") == true ? 'prevYear,' : '');
    $view .= (getParamsAEFC("navigation_previousmonth", "bool", "true") == true ? 'prev,' : '');
    $view .= 'today,';
    $view .= (getParamsAEFC("navigation_nextmonth", "bool", "true") == true ? 'next,' : '');
    $view .= (getParamsAEFC("navigation_nextyear", "bool", "false") == true ? 'nextYear' : '');
    $sJS .= "AEFC_Params.fullcalendar.header_left=\"" . rtrim($view, ',') . "\";\n";

    $minTime = getParamsAEFC("display_starthour", "int", "8");
    $maxTime = getParamsAEFC("display_endhour", "int", "22");
    if ($minTime > $maxTime) {
        $Temp = $minTime;
        $maxTime = $minTime;
        $minTime = $Temp;
    }
    if ($minTime > 23) $minTime = 8;
    if ($maxTime > 24) $maxTime = 22;
    $sJS .= "AEFC_Params.fullcalendar.minTime=" . $minTime . ";\n";
    $sJS .= "AEFC_Params.fullcalendar.maxTime=" . $maxTime . ";\n";
    // Quelles sont les vues que l'on peut permettre ?
    $view = (getParamsAEFC("display_allowviewmonth", "bool", "true") == true ? 'month,' : '');
    $view .= (getParamsAEFC("display_allowviewweek", "bool", "true") == true ? 'agendaWeek,' : '');
    $view .= (getParamsAEFC("display_allowviewday", "bool", "true") == true ? 'agendaDay,' : '');
    $view .= (getParamsAEFC("display_allowviewagenda", "bool", "true") == true ? 'agendaList' : '');
    $view .= (getParamsAEFC("display_allowviewyear", "bool", "true") == true ? 'year' : '');
    $sJS .= "AEFC_Params.fullcalendar.header_right=\"" . rtrim($view, ',') . "\";\n";
    // Quelles sont les vues que l'on peut permettre ?
    $sJS .= "AEFC_Params.allowed_views={}\n";
    $sJS .= "AEFC_Params.allowed_views.month  =" . (getParamsAEFC("display_allowviewmonth", "bool", "true") == true ? 'true' : 'false') . ";\n";
    $sJS .= "AEFC_Params.allowed_views.week   =" . (getParamsAEFC("display_allowviewweek", "bool", "true") == true ? 'true' : 'false') . ";\n";
    $sJS .= "AEFC_Params.allowed_views.day    =" . (getParamsAEFC("display_allowviewday", "bool", "true") == true ? 'true' : 'false') . ";\n";
    // -------------------------------------------------------------
    $sJS .= "AEFC_Params.filters={}\n";
    $sJS .= "AEFC_Params.filters.showfilters =" . (getParamsAEFC("display_showfilters", "bool", "true") == true ? 'true' : 'false') . ";\n";
    $sJS .= "AEFC_Params.filters.showtrash   =" . (getParamsAEFC("display_showtrash", "bool", "false") == true ? 'true' : 'false') . ";\n";
    // -------------------------------------------------------------
    $app = JFactory::getApplication();
    $sJS .= "AEFC_Params.pdf={}\n";
    $sJS .= "AEFC_Params.pdf.subject  = '" . addslashes($app->get('sitename')) . "'\n";
    $sJS .= "AEFC_Params.pdf.author   = '" . addslashes($app->get('fromname')) . "'\n";
    $sJS .= "AEFC_Params.pdf.keywords = " . "'" . addslashes($app->get('MetaKeys')) . "'\n";
    $sJS .= "AEFC_Params.pdf.creator  = '" . JUri::base() . "'\n";
    unset($app);
    // -------------------------------------------------------------
    $sJS .= "AEFC_Params.toolbar={}\n";
    $sJS .= "AEFC_Params.toolbar.shownew =" . (getParamsAEFC("display_new", "bool", "true") == true ? 'true' : 'false') . ";\n";
    $sJS .= "AEFC_Params.toolbar.showpdf =" . (getParamsAEFC("display_pdf", "bool", "true") == true ? 'true' : 'false') . ";\n";
    $sJS .= "AEFC_Params.toolbar.showplace =" . (getParamsAEFC("display_place", "bool", "true") == true ? 'true' : 'false') . ";\n";
    $sJS .= "AEFC_Params.toolbar.expand =" . ($jinput->get('tmpl', '') == 'component' ? 'true' : 'false') . ";\n";

    $document = JFactory::getDocument();
    $document->addCustomTag('<script type="text/javascript">' . $sJS . '</script>');

    return;
}

// function SetVariablesForJS()
// ----------------------------------------
// MAIN
// ----------------------------------------
// Chemin complet (http://...../media/....) vers les images afin d'Ã©viter un quelconque soucis avec le tag du choix de la langue
// que Joomla ajoute lorsque le site est multilingue.
$media = '/images/com_allevents/bullets/';
includeScriptAEFC(JUri::root(true) . '/media/com_allevents/js/');
includeCSSAEFC();
SetVariablesForJS();

global $cbxAgendas;
global $cbxActivities;
global $cbxPlaces;
$cbxAgendas = GetCbxAgenda($media, $this->item->agendas);
$cbxActivities = GetCbxActivity($media, $this->item->activities);
$cbxPlaces = GetCbxPlace($media, $this->item->places);
global $HTML_eventToAdd;
global $HTML_eventToUpdate;
global $HTML_placeToAdd;

require_once(dirname(__FILE__) . '/eventToAdd.php');
require_once(dirname(__FILE__) . '/eventToUpdate.php');
require_once(dirname(__FILE__) . '/placeToAdd.php');

$sReturn = '' . "<div class='loading'></div>" . // l'animation sur les chargements
    "<div id='AEFC'></div>" . // le calendrier
    "<div id='AEFC-search' style='display:none;'></div>" . // barre pour les filtres
    "<div id='qtip-growl-container'></div>" . // conteneur pour les infos
    $HTML_eventToAdd . // Ecran de creation d'un nouvel evenement
    $HTML_eventToUpdate . // Ecran de creation d'un nouvel evenement
    $HTML_placeToAdd . // Ecran de creation d'une localisation / place
    // '<div id="datepager" style="margin-top:20px">'. ; 
    '</div> ';

echo $sReturn;
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);

unset($HTML_eventToAdd);
unset($HTML_eventToUpdate);
unset($HTML_placeToAdd);
