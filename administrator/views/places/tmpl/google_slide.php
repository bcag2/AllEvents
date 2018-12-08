.<?php
/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */


defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('jquery.framework');
$document = JFactory::getDocument();
$curlang = $document->language;
$lang = substr($curlang, 0, 2);
$gmapkey = $this->params['gmapkey'];
$document->addScript('https://maps.googleapis.com/maps/api/js?sensor=true&language=' . $lang . '&key=' . $gmapkey);
$document->addScript('https://google-maps-utility-library-v3.googlecode.com/svn/tags/markerclusterer/1.0/src/markerclusterer.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js');

$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$canOrder = $user->authorise('core.satellites', 'com_allevents');
$saveOrder = $listOrder == 'a.ordering';
if ($saveOrder) {
    $saveOrderingUrl = 'index.php?option=com_allevents&task=places.saveOrderAjax&tmpl=component';
    JHtml::_('sortablelist.sortable', 'placeList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
$sortFields = $this->getSortFields();
//Joomla Component Creator code to allow adding non select list filters
if (!empty($this->extra_sidebar)) {
    $this->sidebar .= $this->extra_sidebar;
}
?>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&view=places', false); ?>" method="post"
      name="adminForm" id="adminForm">
    <?php if (!empty($this->sidebar)): ?>
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
        <?php else : ?>
        <div id="j-main-container">
            <?php endif; ?>

            <div id="mapgs"></div>

            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="boxchecked" value="0"/>
            <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
            <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
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
                ["<h4><a href='<?php echo JRoute::_('index.php?option=com_allevents&view=place&layout=edit&id=' . $item->id, false); ?>'><?php echo $this->escape($item->titre); ?></a></h4>" +
                "<div>" +
                "<div style='width:120px;float:left;'>" +
                "    <img style='height:100px;' src='<?php echo JUri::root(true) . '/' . $item->vignette; ?>'>" +
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
                mapTypeControl: false,
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