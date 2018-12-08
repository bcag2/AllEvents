<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.4
 * event en front end
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$document = JFactory::getDocument();
$lang = substr($document->language, 0, 2);
$gmapkey = $this->params['gmapkey'];

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();
AllEventsHelperOverride::uikit();

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('icons.css'));
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

// Ne surtout pas inclure le bootstrap de Joomla !!!
$document->addScript('https://maps.googleapis.com/maps/api/js?language=' . $lang . '&key=' . $gmapkey);
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js');

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
$params = AllEventsHelperParam::getGlobalParam();
$arrMonthNames = $params['arrMonthNamesShort'];

?>

<div id="AEeventdisplay4">
    <div class="uk-grid" data-uk-grid-margin="">
        <div class="uk-width-medium-1-10">
            <br>
            <p class="calendar"><?php echo JHtml::date($item->date, 'd'); ?>
                <em><?php echo $arrMonthNames[(int)JHtml::date($item->date, 'm') - 1] ?></em></p>
        </div>
        <div class="uk-width-medium-5-10">
            <h3>
                <?php echo $this->item->titre; ?> -
                <small><?php echo $this->item->place_title; ?></small>
            </h3>
            <?php echo $this->item->description; ?>
            <h4><?php echo $this->item->agenda_title; ?></h4>
        </div>
        <div class="uk-width-medium-4-10">
            <div id="eventfullmap"></div>
        </div>
        <div class="uk-width-medium-1-1 uk-container-center">
            <hr/>
            <figure class="uk-overlay uk-overlay-hover uk-align-center">
                <img class="uk-overlay-spin uk-align-center"
                     src="<?php echo JUri::root(true) . '/' . $this->item->affiche; ?>"
                     alt="<?php echo $this->item->titre; ?>">
            </figure>
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
