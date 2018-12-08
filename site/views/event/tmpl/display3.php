<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     4.0
 * event en front end
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

if (!class_exists('AllEventsHelperDataTable'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aedatatable.php';

if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$document = JFactory::getDocument();
$lang = substr($document->language, 0, 2);
$gmapkey = $this->params['gmapkey'];

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('icons.css'));
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet('https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.min.css');

// Ne surtout pas inclure le bootstrap de Joomla !!!
$document->addScript(AllEventsHelperOverride::GetScript('bootstrap-popover.js'));
$document->addScript('https://maps.googleapis.com/maps/api/js?language=' . $lang . '&key=' . $gmapkey);
$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js');
$document->addScript('https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.min.js');

// €#€
if (!class_exists('AllEventsCustomfields'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aecustomfields.php';
// €#€

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

$app = JFactory::getApplication();
$params = AllEventsHelperParam::getGlobalParam();
$Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);
$user = JFactory::getUser();
$authorised = $user->authorise('core.enrolment', 'com_allevents');
$item = $this->item;
// $BlocEnrolment1 = AllEventsHelperEventDisplay::getBlocEnrolment($item, $this->params, true, false) ;
$BlocEnrolment2 = AllEventsHelperEventDisplay::getBlocEnrolment($item, $this->params, true, true);
// $classcollapse = ($this->params['geventshow_defaultexpand']) ? 'collapse in' : 'collapse' ;
// $maxenrol = ($this->params["gmultipleenrolmentsallow"]) ? $this->params["gmultipleenrolmentsmax"] : 1 ;

// echo AllEventsHelperEventDisplay::getBlocEnrolmentJS() ;

?>

<div id="AEeventdisplay3">
    <div id="home" class="panel">
        <div class="content_section">
            <h2><?php echo $this->item->titre; ?></span></h2>
            <?php echo '<a href=""><img class="image_wrapper image_fl" title="' . $this->item->titre . '" alt="' . $this->item->titre . '" src="' . AllEventsHelperEventDisplay::getVignetteName($this->item, $this->params['gdisplay_colors']) . '" /></a>'; ?>
            <div id="AEeventdisplay3desc"><?php echo $this->item->description; ?></div>
        </div>
        <hr>
        <div class="content_section last_section">
            <span><b><?php echo JText::_('COM_ALLEVENTS_EVENTS_DATE'); ?></b>&nbsp;:&nbsp;</span>
            <?php echo JHtml::date($this->item->date, $this->params["gdatetime_format"]); ?>
            <?php if ($this->params["geventshow_enddate"] > 0) : ?>
                <span>&nbsp;<b><?php echo JText::_('COM_ALLEVENTS_DATETIMES_TO'); ?></b></span>:&nbsp;
                <?php echo JHtml::date($this->item->enddate, $this->params["gdatetime_format"]); ?><br>
            <?php endif; ?>
            <?php
            if (($this->params['controlpanel_showagendas']) && ($this->params['geventshow_agenda'])) echo ((isset($this->item->agenda_id)) && ($this->item->agenda_id != null) && ($this->item->agenda_id > 0)) ? "<span class='se_event_info_agenda se_agenda_" . $this->item->agenda_id . "_bullet'><a href='" . $this->item->agenda_link . '?Itemid=' . $Itemid . "'>" . $this->item->agenda_title . "</a><br/></span>" : "";
            if (($this->params['controlpanel_showactivities']) && ($this->params['geventshow_activity'])) echo ((isset($this->item->activity_id)) && ($this->item->activity_id != null) && ($this->item->activity_id > 0)) ? "<span class='se_event_info_activity se_activity_" . $this->item->activity_id . "_bullet'><a href='" . $this->item->activity_link . '?Itemid=' . $Itemid . "'>" . $this->item->activity_title . "</a><br/></span>" : "";
            if (($this->params['controlpanel_showpublics']) && ($this->params['geventshow_public'])) echo ((isset($this->item->public_id)) && ($this->item->public_id != null) && ($this->item->public_id > 0)) ? "<span class='se_event_info_public se_public_" . $this->item->public_id . "_bullet'><a href='" . $this->item->public_link . '?Itemid=' . $Itemid . "'>" . $this->item->public_title . "</a><br/></span>" : "";
            if (($this->params['controlpanel_showplaces']) && ($this->params['geventshow_place'])) echo ((isset($this->item->place_id)) && ($this->item->place_id != null) && ($this->item->place_id > 0)) ? "<span class='se_event_info_place se_place_" . $this->item->place_id . "_bullet'><a href='" . $this->item->place_link . '?Itemid=' . $Itemid . "'>" . $this->item->place_title . "</a><br/></span>" : "";
            if (($this->params['controlpanel_showressources']) && ($this->params['geventshow_ressource'])) echo ((isset($this->item->ressource_id)) && ($this->item->ressource_id != null) && ($this->item->ressource_id > 0)) ? "<span class='se_event_info_ressource se_ressource_" . $this->item->ressource_id . "_bullet'><a href='" . $this->item->ressource_link . '?Itemid=' . $Itemid . "'>" . $this->item->ressource_title . "</a><br/></span>" : "";
            if (($this->params['controlpanel_showsections']) && ($this->params['geventshow_section'])) echo ((isset($this->item->section_id)) && ($this->item->section_id != null) && ($this->item->section_id > 0)) ? "<span class='se_event_info_section se_section_" . $this->item->section_id . "_bullet'><a href='" . $this->item->section_link . '?Itemid=' . $Itemid . "'>" . $this->item->section_title . "</a><br/></span>" : "";
            if (($this->params['controlpanel_showcategories']) && ($this->params['geventshow_category'])) echo ((isset($this->item->category_id)) && ($this->item->category_id != null) && ($this->item->category_id > 0)) ? "<span class='se_event_info_category se_category_" . $this->item->category_id . "_bullet'><a href='" . $this->item->category_link . '?Itemid=' . $Itemid . "'>" . $this->item->category_title . "</a><br/></span>" : "";
            ?>
        </div>
        <div id="eventfullmap"></div>
    </div>
</div>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            <?php if (!empty($this->item->place_latitude) && !empty($this->item->place_longitude)) : ?>
            var map = new GMaps({
                el: '#eventfullmap',
                lat: <?php echo $this->item->place_latitude; ?>,
                lng: <?php echo $this->item->place_longitude; ?>,
                zoom: 10,
                zoomControl: false,
                zoomControlOpt: {
                    style: 'SMALL',
                    position: 'TOP_LEFT'
                },
                panControl: true,
                streetViewControl: true,
                mapTypeControl: true,
                overviewMapControl: true
            });
            map.addMarker({
                lat: <?php echo $this->item->place_latitude; ?>,
                lng: <?php echo $this->item->place_longitude; ?>,
                title: <?php echo json_encode($this->item->place_title); ?>
            });
            <?php endif;?>
        });
    })(jQuery);

    Joomla.submitbutton = function (task) {
        if (task == 'event.exportgc') {
            var url = "https://www.google.com/calendar/render?action=TEMPLATE&amp&sf=true&output=xml";
            url += "&text=<?php echo urlencode($item->titre); ?>";
            <?php if ($item->allday) : ?>
            url += "&dates=<?php echo JHtml::date($item->date, 'Ymd') . '/' . JHtml::date($item->enddate, 'Ymd'); ?>";
            <?php else : ?>
            url += "&dates=<?php echo JHtml::date($item->date, 'Ymd') . 'T' . JHtml::date($item->date, 'Hi') . '00Z' . '/' . JHtml::date($item->enddate, 'Ymd') . 'T' . JHtml::date($item->enddate, 'Hi') . '00Z'; ?>";
            <?php endif ; ?>
            url += "&location=<?php echo urlencode($item->place_adress); ?>";
            window.open(url, '_blank');
        }
        if (task == 'event.exportical') {
            window.open('<?php echo JUri::root() . 'index.php?option=com_allevents&view=event&vcal=1&id=' . (int)$item->id; ?>', '_bank');
        }
        Joomla.submitform(task, document.getElementById('adminForm'));
    }
</script>
