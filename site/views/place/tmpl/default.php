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

$document = JFactory::getDocument();
$curlang = $document->language;
$lang = substr($curlang, 0, 2);
$gmapkey = $this->params['gmapkey'];
$document->addScript('https://maps.googleapis.com/maps/api/js?sensor=true&language=' . $lang . '&key=' . $gmapkey);

$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js');
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);
?>
<?php if ($this->item) : ?>

    <?php $address = $this->item->numero . ' ' . $this->item->rue . ', ' . $this->item->codepostal . ' ' . $this->item->ville . ', ' . $this->item->country; ?>

    <div style="position:relative;">
        <div style="font-size:30px;margin-top:18px;"><?php echo $this->item->titre; ?></div>
        <a href="https://maps.google.fr/maps?gl=fr&amp;hl=fr&amp;daddr=<?php echo $address; ?>&amp;panel=1&amp;f=d&amp;fb=1"
           style="margin-right:10px;">Itinéraire</a>
        <div><?php echo $this->item->description; ?></div>
    </div>
    <div>
        <div>
            <span style="font-weight:bold;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_ADDRESS'); ?>
                &nbsp;:</span>
            &nbsp;
            <span><?php echo $address; ?></span>
        </div>
        <?php if (!empty($this->item->phone)) : ?>
            <div>
                <span
                    style="font-weight:bold;margin-right:4px;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_PHONE'); ?>
                    &nbsp;:</span>
                <span><?php echo $this->item->phone; ?></span>
            </div>
        <?php endif; ?>
        <?php if (!empty($this->item->fax)) : ?>
            <div>
                <span
                    style="font-weight:bold;margin-right:4px;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_FAX'); ?>
                    &nbsp;:</span>
                <span><?php echo $this->item->fax; ?></span>
            </div>
        <?php endif; ?>
        <?php if (!empty($this->item->email)) : ?>
            <div>
                <span style="font-weight:bold;margin-right:4px;"><?php echo JText::_('JGLOBAL_EMAIL'); ?> &nbsp;:</span>
                <span><?php echo $this->item->email; ?></span>
            </div>
        <?php endif; ?>
        <?php if (!empty($this->item->website)) : ?>
            <div>
                <span style="font-weight:bold;margin-right:4px;"><?php echo JText::_('LINK_URL'); ?> &nbsp;:</span>
                <span><a href="<?php echo $this->item->website; ?>"><?php echo $this->item->website; ?></a></span>
            </div>
        <?php endif; ?>
    </div>

    <div id="allevents_list">
        <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed&l=' . $this->item->id . '&Itemid=' . $this->item->id, false); ?>">
            <i class="fa fa-rss"></i>
        </a>
        <?php
        $url = 'index.php?option=com_allevents&view=events';
        $url .= '&l=' . $this->item->id;
        $link = JRoute::_($url, false);
        echo "<a href='" . $link . "'>" . JText::_('EVENTS_LIST') . "</a>";
        ?>
    </div>

    <div id="place_map"></div>
    <?php
else:
    JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_PLACE_NOT_LOADED'), 'warning');
    echo JText::_('COM_ALLEVENTS_ITEM_NOT_LOADED');
    echo '<br/><br/>';
endif;
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>
<script type='text/javascript'>
    (function ($) {
        $(document).ready(function ($) {
            // Define your locations: HTML content for the info window, latitude, longitude
            var locations = [
                <?php if (isset($this->item->latitude) && isset($this->item->longitude) && ($this->item->latitude != "") && ($this->item->longitude != "") && ($this->item->published)) : ?>
                ["<h4><?php echo $this->escape($this->item->titre); ?></h4>" +
                "<div>" +
                "<div style='width:120px;float:left;'>" +
                "    <img alt='<?php echo $this->escape($this->item->titre); ?>' style='height:100px;' src='../<?php
                    if ($this->item->vignette <> '') {
                        echo JUri::root(true) . '/' . $this->item->vignette;
                    } else {
                        echo AllEventsHelperOverride::GetImage('no_photo.png');
                    }
                    ?>'>" +
                "</div>" +
                "<div style='width: 200px; float: left;'>" +
                "<b><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_ADDRESS'); ?>&nbsp:&nbsp;</b><?php echo $this->item->numero . ' ' . $this->item->rue . '<br/>' . $this->item->codepostal . ' ' . $this->item->ville . '<br/>' . $this->item->country?><br>" +
                "</div>" +
                "</div>" +
                '<b><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_LATITUDE'); ?>&nbsp:&nbsp;</b><?php echo $this->escape($this->item->latitude); ?><br>' +
                '<b><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_LONGITUDE'); ?>&nbsp:&nbsp;</b><?php echo $this->escape($this->item->longitude); ?><br>' + '<br>',
                    <?php echo $this->escape($this->item->latitude); ?>,
                    <?php echo $this->escape($this->item->longitude); ?>],
                <?php endif; ?>
            ];

            // Setup the different icons and shadows
            var iconURLPrefix = 'https://maps.google.com/mapfiles/ms/icons/';

            var icons = [
                iconURLPrefix + 'red-dot.png',
                iconURLPrefix + 'green-dot.png',
                iconURLPrefix + 'blue-dot.png',
                iconURLPrefix + 'orange-dot.png',
                iconURLPrefix + 'purple-dot.png',
                iconURLPrefix + 'pink-dot.png',
                iconURLPrefix + 'yellow-dot.png'
            ];
            var icons_length = icons.length;

            var shadow = {
                anchor: new google.maps.Point(15, 33),
                url: iconURLPrefix + 'msmarker.shadow.png'
            };

            var map = new google.maps.Map(document.getElementById('place_map'), {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $this->escape($this->item->latitude); ?>, <?php echo $this->escape($this->item->longitude); ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true,
                streetViewControl: true,
                panControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_BOTTOM
                }
            });

            var infowindow = new google.maps.InfoWindow({
                maxWidth: 400
            });

            var marker;
            var markers = [];

            var iconCounter = 0;

            // Add the markers and infowindows to the map
            for (var i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: icons[iconCounter],
                    shadow: shadow
                });

                markers.push(marker);

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));

                iconCounter++;
                // We only have a limited number of possible icon colors, so we may have to restart the counter
                if (iconCounter >= icons_length) {
                    iconCounter = 0;
                }
            }
        });
    }(jQuery));
</script>