<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
AllEventsHelperOverride::bootstrap();
AllEventsHelperOverride::jquery();
AllEventsHelperOverride::uikit();
$document = JFactory::getDocument();
$curlang = $document->language;
$lang = substr($curlang, 0, 2);
$gmapkey = $this->params['gmapkey'];
$document->addScript('https://maps.googleapis.com/maps/api/js?language=' . $lang . '&key=' . $gmapkey);
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js');
$document->addScript('https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js');

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet('https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css');
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));

AllEventsHelperOverride::custom_css();
$document->addStyleDeclaration('
.uk-subnav-pill > * > * {padding: 7px 25px;cursor: pointer;border-radius: 2px}
.uk-subnav-pill > *:hover > * {background: #eee;color: #444}
.uk-subnav-pill > .uk-active:hover > *, .uk-subnav-pill > .uk-active > * {background: #358ecd;color: #fff}
.daterangepicker .calendar {max-width:100% !important}
.daterangepicker.show-calendar .calendar {display: table}
.daterangepicker .input-mini {max-width:90% !important}
');

$user = JFactory::getUser();
$userId = $user->get('id');

$app = JFactory::getApplication();
$Itemid = ($this->params['gforcenomenuitem']) ? '' : '?Itemid=' . (int)JFactory::getApplication()->input->getInt('Itemid', null);

$n = count($this->items);
$ArrayAgenda = [];
$Arrayid = [];

foreach ($this->items as $item) {
    if (
        (!in_array($item->agenda_id, $Arrayid)) &&
        (!empty($item->agenda_titre)) &&
        (isset($item->place_latitude)) &&
        (isset($item->place_longitude)) &&
        ($item->place_latitude != "") &&
        ($item->place_longitude != "") &&
        ($item->place_published) &&
        ($item->published)
    ) {
        $rowArray = [];
        $rowArray['id'] = $item->agenda_id;
        $rowArray['titre'] = $item->agenda_titre;
        $rowArray['alias'] = $item->agenda_alias;
        array_push($ArrayAgenda, $rowArray);
        array_push($Arrayid, $item->agenda_id);
    }
}
?>
    <article class="uk-article">
        <h1><?php echo $this->params['page_title']; ?></h1>
        <div class="uk-margin">
            <div id="filterrange" class="pull-right"
                 style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <b class="caret"></b>
            </div>
            <div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-1  ae-uk-grid-nav"
                 style="margin-bottom:35px;">
                <ul class="ae-uk-dynamicgrid uk-subnav uk-subnav-pill uk-flex-center">
                    <li data-uk-filter="" class="uk-active">
                        <div onclick="setAgenda(0);filterMarkers();"><?php echo JText::_('ALL'); ?></div>
                    </li>
                    <?php foreach ($ArrayAgenda as $agenda) {
                        echo '<li data-uk-filter="' . $agenda['alias'] . '"><div onclick="setAgenda(' . $agenda['id'] . ');filterMarkers();">' . $agenda['titre'] . '</div></li>';
                    }
                    ?>
                </ul>
                <script>
                    jQuery(function ($) {
                        setTimeout(function () {
                            $('.ae-uk-grid-nav .uk-active').trigger('click');
                        }, 0);
                    });
                </script>
            </div>
            <!-- la grille de filtre qui sera inutile au final-->
            <div class="ae-uk-grid-content" data-uk-grid="{controls: '.ae-uk-dynamicgrid'}"></div>

            <div id="mapgs"></div>
    </article>

    <script type='text/javascript'>
        var g_agenda = 0;
        function setAgenda(pi_agenda) {
            g_agenda = pi_agenda;
        }

        (function ($) {
            moment.locale('<?php echo $lang; ?>');

            $(document).ready(function ($) {
                var markers = [];
                // Define your locations: HTML content for the info window, latitude, longitude
                var locations = [
                    <?php
                    $old_date = "";
                    $old_place_id = 0;
                    $old_place_latitude = 0;
                    $old_place_longitude = 0;
                    $old_agenda_id = 0;
                    $old_agenda_iconmap = "";
                    $first = true;
                    $stip = '';
                    $show = false;

                    foreach ($this->items as $i => $item) {
                        if ((!empty($item->agenda_titre)) &&
                            (isset($item->place_latitude)) &&
                            (isset($item->place_longitude)) &&
                            ($item->place_latitude != "") &&
                            ($item->place_longitude != "") &&
                            ($item->place_published) &&
                            ($item->published)
                        ) {
                            $show = true;
                            if ($old_place_id != $item->place_id) {
                                if (!$first) {
                                    $stip .= '</div>';
                                    echo "['" . $stip . "',"
                                        . $this->escape($old_place_latitude) . ","
                                        . $this->escape($old_place_longitude) . ","
                                        . "'" . $this->escape($old_agenda_iconmap) . "',"
                                        . $old_agenda_id . ","
                                        . "'" . $old_date . "'"
                                        . "],\n";
                                }
                                $stip = '<div class="event_locations">';
                                $first = false;
                            }
                            $stip .= '<div class="event_content">';
                            $stip .= '   <div class="eml_event_image">';
                            $stip .= '      <div class="eml_nailthumb-container">';
                            $stip .= AllEventsHelperEventDisplay::getVignette($item, $this->params['gdisplay_colors']);
                            $stip .= '      </div>';
                            $stip .= '   </div>';
                            $stip .= '   <h3>';
                            $stip .= '      <b>';
                            $stip .= '      <a href="' . $item->event_link . '">' . addslashes($item->titre) . '</a>';
                            $stip .= $item->hot_i . $item->access_i . $item->price_i;
                            $stip .= '      </b>';
                            $stip .= '   </h3>';
                            $stip .= '   <dl>';
                            if (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 1)) {
                                if ($item->allday == "1") {
                                    $stip .= '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                                } else {
                                    $stip .= '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                                }
                            } elseif (($this->params['show_date'] == 0) && ($this->params['show_enddate'] == 1)) {
                                if ($item->allday == "1") {
                                    $stip .= '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                                } else {
                                    $stip .= '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                                }
                            } elseif (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 0)) {
                                if ($item->allday == "1") {
                                    $stip .= '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '...</div>';
                                } else {
                                    $stip .= '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '...</div>';
                                }
                            }

                            if ($this->params["show_agenda"] == 1) $stip .= ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) ? '<span class="se_event_info_agenda se_agenda_' . $item->agenda_id . '_bullet"><a href="' . $item->agenda_link . '">' . addslashes($item->agenda_titre) . '</a><br/></span>' : '';
                            if ($this->params["show_activity"] == 1) $stip .= ((isset($item->activity_id)) && ($item->activity_id != null) && ($item->activity_id > 0)) ? '<span class="se_event_info_activity se_activity_' . $item->activity_id . '_bullet"><a href="' . $item->activity_link . '">' . addslashes($item->activity_titre) . '</a><br/></span>' : '';
                            if ($this->params["show_public"] == 1) $stip .= ((isset($item->public_id)) && ($item->public_id != null) && ($item->public_id > 0)) ? '<span class="se_event_info_public se_public_' . $item->public_id . '_bullet"><a href="' . $item->public_link . '">' . addslashes($item->public_titre) . '</a><br/></span>' : '';
                            if ($this->params["show_section"] == 1) $stip .= ((isset($item->section_id)) && ($item->section_id != null) && ($item->section_id > 0)) ? '<span class="se_event_info_section se_section_' . $item->section_id . '_bullet"><a href="' . $item->section_link . '">' . addslashes($item->section_titre) . '</a><br/></span>' : '';
                            if ($this->params["show_category"] == 1) $stip .= ((isset($item->category_id)) && ($item->category_id != null) && ($item->category_id > 0)) ? '<span class="se_event_info_category se_category_' . $item->category_id . '_bullet"><a href="' . $item->category_link . '">' . addslashes($item->category_titre) . '</a><br/></span>' : '';
                            if ($this->params["show_place"] == 1) $stip .= ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) ? '<span class="se_event_info_place se_place_' . $item->place_id . '_bullet"><a href="' . $item->place_link . '">' . addslashes($item->place_titre) . '</a><br/></span>' : '';
                            if ($this->params["show_ressource"] == 1) $stip .= ((isset($item->ressource_id)) && ($item->ressource_id != null) && ($item->ressource_id > 0)) ? '<span class="se_event_info_ressource se_ressource_' . $item->ressource_id . '_bullet"><a href="' . $item->ressource_link . '">' . addslashes($item->ressource_titre) . '</a><br/></span>' : '';
                            $stip .= '   </dl>';
                            $stip .= '</div>';
                            $old_place_id = 0; // a décommenter pour mettre un seul affichage par lieu $item->place_id;
                            $old_agenda_id = $item->agenda_id;
                            $old_place_latitude = $item->place_latitude;
                            $old_place_longitude = $item->place_longitude;
                            $old_date = JHtml::date($item->date, $this->params['gdate_format']);
                            $old_agenda_iconmap = ($item->agenda_iconmap == 'http://maps.google.com/mapfiles/ms/micons/.png') ? 'http://maps.google.com/mapfiles/ms/micons/blue.png' : $item->agenda_iconmap;
                        }
                    }
                    // pour le dernier événement on ferme la boucle
                    if ($show) {
                        $stip .= '</div>';
                        echo "['" . $stip . "',"
                            . $this->escape($old_place_latitude) . ","
                            . $this->escape($old_place_longitude) . ","
                            . "'" . $this->escape($old_agenda_iconmap) . "',"
                            . $old_agenda_id . ","
                            . "'" . $old_date . "'"
                            . "],\n";

                    }
                    ?>
                ];

                // Setup the different icons and shadows
                var shadow = {
                    anchor: new google.maps.Point(15, 33),
                    url: 'https://maps.google.com/mapfiles/ms/icons/msmarker.shadow.png'
                };

                var map = new google.maps.Map(document.getElementById('mapgs'), {
                    zoom: 5,
                    center: new google.maps.LatLng(48.856614, 2.3522219000000177),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: true,
                    streetViewControl: false,
                    panControl: false,
                    zoomControlOptions: {
                        position: google.maps.ControlPosition.LEFT_BOTTOM
                    }
                });

                var infowindow = new google.maps.InfoWindow({
                    maxWidth: 320
                });

                var marker;
                // Add the markers and infowindows to the map
                for (var i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon: locations[i][3],
                        agenda: locations[i][4],
                        date: moment(locations[i][5], '<?php echo $this->params['gdate_formatmoment'];?>'),
                        shadow: shadow
                    });

                    markers.push(marker);

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
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

                /**
                 * Function to filter markers by agenda
                 */
                filterMarkers = function () {
                    var agenda = g_agenda;
                    var start = $('#filterrange').data('daterangepicker').startDate;
                    var finish = $('#filterrange').data('daterangepicker').endDate;
                    for (i = 0; i < markers.length; i++) {
                        marker = markers[i];
                        // If is same agenda or agenda not picked
                        if (marker.agenda == agenda || agenda.length === 0 || agenda === 0) {
                            target = marker.date;
                            if (target.isBetween(start, finish, 'days', '[]')) {
                                marker.setVisible(true);
                            }
                            // dates don't match
                            else {
                                marker.setVisible(false);
                            }
                        }
                        // Categories don't match 
                        else {
                            marker.setVisible(false);
                        }
                    }
                    AutoCenter();
                };

                AutoCenter();
                /* Date Range Filter*/
                var start = moment();
                var end = moment().add(365, 'days');

                function cb(start, end) {
                    $('#filterrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
                    filterMarkers();
                }

                $('#filterrange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    locale: {
                        format: '<?php echo $this->params['gdate_formatmoment'];?>',
                        "applyLabel": "<?php echo JText::_('JTOOLBAR_APPLY', true); ?>",
                        "cancelLabel": "<?php echo JText::_('JTOOLBAR_CANCEL', true); ?>",
                        "fromLabel": "<?php echo JText::_('COM_ALLEVENTS_FROM_DAY', true); ?>",
                        "toLabel": "<?php echo JText::_('COM_ALLEVENTS_TO_DAY', true); ?>",
                        "customRangeLabel": "<?php echo JText::_('AE_CUSTOM', true); ?>"
                    },
                    ranges: {
                        "<?php echo JText::_('TODAY', true); ?>": [moment(), moment()],
                        "<?php echo JText::_('THIS_MONTH', true); ?>": [moment().startOf('month'), moment().endOf('month')],
                        "<?php echo JText::_('THIS_YEAR', true); ?>": [moment().startOf('year'), moment().endOf('year')],
                        "<?php echo JText::_('NEXT_7_DAYS', true); ?>": [moment(), moment().add(6, 'days')],
                        "<?php echo JText::_('NEXT_30_DAYS', true); ?>": [moment(), moment().add(29, 'days')],
                        "<?php echo JText::_('NEXT_3_MONTHS', true); ?>": [moment(), moment().add(3, 'month').endOf('month')],
                        "<?php echo JText::_('NEXT_12_MONTHS', true); ?>": [moment(), moment().add(12, 'month').endOf('month')],
                        "<?php echo JText::_('NEXT_YEAR', true); ?>": [moment().add(12, 'month').startOf('year'), moment().add(12, 'month').endOf('year')]
                    }
                }, cb);
                cb(start, end);
            });

            /* partie ajoutée pour forcer l'affichage du daterange dans tous les cas*/
            $.fn.onAny = function (cb) {
                for (var k in this[0]) {
                    if (k.search('on') === 0) {
                        this.on(k.slice(2), function (e) {
                            // Probably there's a better way to call a callback function with right context, $.proxy() ?
                            cb.apply(this, [e]);
                        });
                    }
                }
                return this;
            };

            $('body').onAny(function (e) {
                $('.fa-calendar.glyphicon.glyphicon-calendar').removeClass('glyphicon glyphicon-calendar');
                $('.fa-chevron-left.glyphicon.glyphicon-chevron-left').removeClass('glyphicon glyphicon-chevron-left');
                $('.fa-chevron-right.glyphicon.glyphicon-chevron-right').removeClass('glyphicon glyphicon-chevron-right');
                $('#filterrange').show();
            });
        }(jQuery));
    </script>

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>