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
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('event_uk.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('icons.css'));
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet('https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.min.css');

// Ne surtout pas inclure le bootstrap de Joomla !!!
$document->addScript(AllEventsHelperOverride::GetScript('bootstrap-popover.js'));
$document->addScript('https://maps.googleapis.com/maps/api/js?language=' . $lang . '&key=' . $gmapkey);
$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.min.js');
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

<div class="uk-padding-remove">
    <div class="uk-container uk-padding-remove">
        <a name="event<?php echo $this->item->id; ?>" href=""><img
                class="uk-align-left uk-thumbnail cus-small-image uk-border-circle uk-margin-top"
                src="<?php echo AllEventsHelperEventDisplay::getVignetteName($this->item, $this->params['gdisplay_colors']); ?>"></a>
        <?php if ($this->params["geventshow_title"] == 1): ?>
            <h1 class="uk-h2 uk-margin-top">
                <div class="uk-nbfc-alt">
                    <a href=""><?php echo $this->item->titre; ?></a>
                </div>
            </h1>
        <?php endif; ?>

        <div class="uk-button-group uk-margin-bottom"><span class="uk-buttondate"><span
                    class=" uk-icon-calendar"></span> <strong><?php echo ($this->item->allday == 1) ? JHtml::date($this->item->date, $this->params["gdate_format"]) : JHtml::date($this->item->date, $this->params["gdatetime_format"]); ?></strong></span><span
                class="uk-button uk-button-green uk-hidden-small"><span class="uk-icon-hourglass-1"></span> 52 Days Left</span><a
                target="_blank" class="uk-button uk-button-success" href="https://www.3886records.de/contest"><span
                    class="uk-icon-arrow-right"></span> Go <span class="uk-hidden-small">To Contest</span></a><a
                class="uk-button" href=""><span
                    class="uk-icon-comments"></span> 0 </a></div>
        <div class="views_counter">
            <?php
            if ($this->params['geventshow_author']) {
                echo JText::_('COM_ALLEVENTS_CREATED_BY') . '&nbsp;<span class="post-author">' . $this->item->proposed_name . ',&nbsp;</span>';
                echo JText::_('COM_ALLEVENTS_VISITED') . '&nbsp;' . $this->item->hits . '&nbsp;' . JText::_('COM_ALLEVENTS_TIMES');
            }
            ?>
        </div>
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
