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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
AllEventsHelperOverride::jquery();
$document = JFactory::getDocument();
$curlang = $document->language;
$lang = substr($curlang, 0, 2);
$gmapkey = $this->params['gmapkey'];
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js');
$document->addScript('https://maps.googleapis.com/maps/api/js?sensor=true&language=' . $lang . '&key=' . $gmapkey);
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js');
$document->addScript('https://cdn.jsdelivr.net/map-icons/3.0.0/map-icons.min.js');


$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
$document->addStyleSheet('https://cdn.jsdelivr.net/map-icons/3.0.0/map-icons.min.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

AllEventsHelperOverride::custom_css();

$user = JFactory::getUser();
$userId = $user->get('id');
?>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&view=places', false); ?>" method="post"
      name="adminForm" id="adminForm">
    <div id="j-main-container">
        <div style="font-size:30px;margin:10px;"><?php echo $this->document->getTitle(); ?></div>

        <div id="mapgs"></div>

        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="limit" value="0"/>
        <input type="hidden" name="limitstart" value="0"/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>

<script type='text/javascript'>
    (function ($) {
        $(document).ready(function ($) {

            // Define your locations: HTML content for the info window, latitude, longitude
            var locations = [
                <?php foreach ($this->items as $i => $item) : ?>
                <?php if (isset($item->latitude) && isset($item->longitude) && ($item->latitude != "") && ($item->longitude != "") && ($item->published)) : ?>
                ["<h4><a href='<?php echo JRoute::_('index.php?option=com_allevents&view=place&id=' . $item->id, false); ?>'><?php echo $this->escape($item->titre); ?></a></h4>" +
                "<div>" +
                "<div style='width:120px;float:left;'>" +
                "    <img alt='<?php echo $item->titre; ?>' style='height:100px;max-width:110px;' src='<?php
                    if ($item->vignette <> '') {
                        echo JUri::root(true) . '/' . $item->vignette;
                    } else {
                        echo AllEventsHelperOverride::GetImage('no_photo.png');
                    } ?>'>" +
                "</div>" +
                "<div style='width: 200px; float: left;'>" +
                "<b><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_ADDRESS');?>&nbsp:&nbsp;</b><?php echo $item->numero . ' ' . $item->rue . '<br/>' . $item->codepostal . ' ' . $item->ville . '<br/>' . $item->country?><br>" +
                "</div>" +
                "</div>" +
                '<b><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_LATITUDE'); ?>&nbsp:&nbsp;</b><?php echo $this->escape($item->latitude); ?><br/>' +
                '<b><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_LONGITUDE'); ?>&nbsp:&nbsp;</b><?php echo $this->escape($item->longitude); ?><br/>' + '<br/>',
                    <?php echo $this->escape($item->latitude); ?>,
                    <?php echo $this->escape($item->longitude); ?>],
                <?php endif; ?>
                <?php endforeach; ?>
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

            var map = new google.maps.Map(document.getElementById('mapgs'), {
                zoom: 5,
                center: new google.maps.LatLng(48.856614, 2.3522219000000177),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true,
                streetViewControl: false,
                panControl: false,
                markerClusterer: function (map) {
                    return new MarkerClusterer(map);
                },
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_BOTTOM
                }
            });

            var infowindow = new google.maps.InfoWindow({
                maxWidth: 320
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
            var mc = new MarkerClusterer(map, markers, {
                gridSize: 50,
                maxZoom: 15
            });

            function AutoCenter() {
                //  Create a new viewpoint bound
                var bounds = new google.maps.LatLngBounds();
                //  Go through each...
                $.each(markers, function (index, marker) {
                    bounds.extend(marker.position);
                });
                //  Fit these bounds to the map
                map.fitBounds(bounds);
            }

            AutoCenter();
        });
    }(jQuery));
</script>