<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

$document = JFactory::getDocument();
JHtml::_('behavior.framework');
AllEventsHelperOverride::jquery();
AllEventsHelperOverride::uikit();

$show = false;

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('aesimple.css'));
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
AllEventsHelperOverride::custom_css();

//Get companie options
JFormHelper::addFieldPath(JPATH_ROOT . '/administrator/components/com_allevents/models/fields/models/fields');
$AEAgenda = JFormHelper::loadFieldType('AEAgenda', false);
$AgendaOptions = $AEAgenda->getFrontOptions(); // works only if you set your field getOptions on public!!

if ((int)$this->params['infinite_scroll']) {
    $document->addScript(AllEventsHelperOverride::GetScript('jquery-ias.min.js'));
}

$app = JFactory::getApplication();
$Itemid = ($this->params['gforcenomenuitem']) ? '' : '&Itemid=' . (int)JFactory::getApplication()->input->getInt('Itemid', null);

$n = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$maxLength = 200;

JPluginHelper::importPlugin('allevents');


$document = JFactory::getDocument();
$document->addStyleDeclaration("/* Search Form */
 .ae-search div {
     display:inline;
}
 .ae-search .hidden {
     display:none !important;
}
/* Custom Search CSS */
 div.css-search {
     margin-bottom:20px;
}
 div.ae-search.css-search label {
     display:inline;
}
 div.ae-search.css-search div {
     display:block;
}
 div.css-search input, div.css-search select, div.css-search option, div.css-search div, div.css-search span, div.css-search button {
     width:auto;
     height:auto;
     margin:0;
     padding:0;
     float:none;
     display:inline-block;
     font-size:14px;
    /* reset everything */
}
 div.css-search option {
     display:block;
}
 div.css-search input, div.css-search select {
     padding:5px;
}
 div.css-search {
     background:#fff;
     border:1px solid #dedede;
     border-radius:3px;
     padding:5px;
     min-height:40px;
     position:relative;
     -moz-border-radius:3px;
     -webkit-border-radius:3px;
}
/* Main Search */
 div.css-search.has-advanced div.ae-search-main {
     padding-bottom:8px;
     border-bottom:1px solid #dedede;
}
 div.css-search div.ae-search-main div {
     display:inline;
}
 div.css-search div.ae-search-field {
     padding:5px 0px;
}
 div.css-search input.ae-search-text, div.css-search input.ae-search-geo {
     width:90%;
     font-size:16px;
     line-height:16px;
     padding:8px;
     border:none;
     outline:none !important;
     color:#666;
     text-overflow: ellipsis;
     display:inline-block;
}
 div.css-search div.ae-search-geo {
     margin:0px 0px 0px 5px;
     padding-left:20px;
     background:url(" . JUri::root(true) . "/media/com_allevents/css/images/search-geo.png) 0px 3px no-repeat;
}
 div.css-search div.ae-search-text {
     margin:0px 0px 0px 5px;
     padding-left:20px;
     background:url(" . JUri::root(true) . "/media/com_allevents/css/images/search-mag-ico.png) 0px 4px no-repeat;
}
/* Placeholder text in main section */
 div.css-search div.ae-search-main div.ae-search-field input::-webkit-input-placeholder {
    /* WebKit browsers */
     font-size:16px;
     line-height:16px;
     padding:3px 0px;
     border:none;
     outline:none;
     color:#666;
}
 div.css-search div.ae-search-main div.ae-search-field input:-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
     font-size:16px;
     line-height:16px;
     padding:8px;
     border:none;
     outline:none;
     color:#666;
}
 div.css-search div.ae-search-main div.ae-search-field input::-moz-placeholder {
    /* Mozilla Firefox 19+ */
     font-size:16px;
     line-height:16px;
     padding:8px;
     border:none;
     outline:none;
     color:#666;
}
 div.css-search div.ae-search-main div.ae-search-field input:-ms-input-placeholder {
    /* Internet Explorer 10+ */
     font-size:16px;
     line-height:16px;
     padding:8px;
     border:none;
     outline:none;
     color:#666;
}
/* Geo field specifics */
 div.css-search.has-search-geo.has-search-term input.ae-search-text, div.css-search.has-search-geo.has-search-term input.ae-search-geo {
     width:40%;
}
 .pac-container .pac-item {
     padding:4px 4px !important;
}
/* Main Search Button */
 div.css-search div.ae-search-main .ae-search-submit {
     position:absolute;
     top: 5px;
     right: 5px;
     -moz-box-shadow: 0px 0px 0px 0px #ffffff;
     -webkit-box-shadow: 0px 0px 0px 0px #ffffff;
     box-shadow: 0px 0px 0px 0px #ffffff;
     background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #b7d282), color-stop(1, #8eb56d) );
     background:-moz-linear-gradient( center top, #b7d282 5%, #8eb56d 100% );
     background-color:#b7d282;
     -moz-border-radius:6px;
     -webkit-border-radius:6px;
     border-radius:6px;
     border:1px solid #dcdcdc;
     display:inline-block;
     color:#ffffff;
     font-weight:bold;
     padding:8px 10px;
     text-decoration:none;
     text-shadow:1px 1px 0px #c7c5c7;
     line-height:16px;
}
div.css-search div.ae-search-main .ae-search-submit:hover {
     background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #C4DB99), color-stop(1, #A4C48A) );
     background:-moz-linear-gradient( center top, #C4DB99 5%, #A4C48A 100% );
     background:-ms-linear-gradient(top, #C4DB99, #A4C48A);
     background:-o-linear-gradient(top, #C4DB99, #A4C48A);
     background:linear-gradient(top, #C4DB99, #A4C48A);
     background-color:#A4C48A;
}
div.css-search div.ae-search-main .ae-search-submit img {
     border:none;
     padding:0;
     margin:0;
     box-shadow:none;
     border-radius:0;
     background:none;
}
/* IE7 Hack */
 div.css-search div.ae-search-main button.ae-search-submit span {
     display:block;
     width:16px;
     height:16px;
     background:url('" . JUri::root(true) . "/media/com_allevents/css/images/search-mag.png') 0px 0px no-repeat;
}
/* Advanced Search */
 div.css-search div.ae-search-location, div.ae-search-location-meta {
     margin:0px;
     padding: 0px;
}
 div.css-search div.ae-search-advanced, div.css-search div.ae-search-options {
     padding:5px 8px;
}
 div.css-search div.ae-search-advanced > div {
     clear:both;
}
 div.css-search div.ae-search-advanced label > span {
     display:block;
     float:left;
     min-width:100px;
}
 div.css-search div.ae-search-advanced .ae-search-submit {
     margin:10px 0px;
}
 div.css-search.no-search-main div.ae-search-advanced.visible div {
     display:inline;
     clear:none;
}
 div.css-search.no-search-main div.ae-search-advanced.visible label {
     display:none;
}
 div.css-search div.ae-search-options {
     text-align:right;
}
");
?>

<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm"
      id="adminForm">
    <div id="aesimple-view">
        <div class="aesimple-event-index">
            <h1><?php echo $this->params['page_title']; ?>
                <?php if ($this->params['show_rss']) : ?>
                    <a target="<?php echo(empty($this->params['display_openlinkself']) ? $this->params['gdisplay_openlinkself'] : $this->params['display_openlinkself']); ?>"
                       href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed' . $Itemid, false); ?>">
                        <i class="fa fa-rss-square"
                           title="<?php echo JText::_('COM_ALLEVENTS_RSS_SUBSCRIBE'); ?>"></i>
                    </a>
                <?php endif; ?>
            </h1>

            <div class="ae-search-wrapper">
                <div
                    class="em-events-search ae-search css-search has-search-term has-search-geo has-search-main has-advanced advanced-hidden">
                    <div class="ae-search-main">
                        <div class="ae-search-text ae-search-field">
                            <label>
                                <span class="screen-reader-text">&nbsp;</span>
                                <input type="text" name="filter[search]" class="em-events-search-text ae-search-text"
                                       placeholder="<?php echo JText::_('COM_ALLEVENTS_SEARCH_ALT'); ?>"
                                       id="filter_search"
                                       value="<?php echo $this->escape($this->state->get('filter.search')); ?>"
                                       title="<?php echo JText::_('COM_ALLEVENTS_SEARCH_ALT'); ?>"/>
                            </label>
                        </div>

                        <!--  <div class="ae-search-geo ae-search-field"
                              style="background-image: url(&quot;http://dy4pqwsha5ql3.cloudfront.net/wp-content/plugins/events-manager/includes/images/search-geo.png&quot;);">
                             <label>
                                 <span class="screen-reader-text">&nbsp;</span>
                                 <input type="text" name="geo" id="autocomplete" class="ae-search-geo" value=""
                                        placeholder="Near..." onFocus="geolocate()">
                             </label>
                             <input type="hidden" name="near" class="ae-search-geo-coords" value="">
                             <div id="ae-search-geo-attr"></div>
                         </div>-->

                        <button type="submit" class="ae-search-submit loading">
                            <img
                                src="<?php echo JUri::root(true); ?>/media/com_allevents/css/images/search-mag.png"
                                alt="<?php echo JText::_('COM_ALLEVENTS_SEARCH_ALT'); ?>">
                        </button>
                    </div>
                    <div class="ae-search-advanced" style="display: none;">
                        <div class="ae-search-scope ae-search-field">
                               <span class="ae-search-scope em-events-search-dates em-date-range">
                                   <?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DATES'); ?>&nbsp;
                                   <input type="text" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="filter_date"
                                          name="filter[date]"
                                          value="<?php echo $this->escape($this->state->get('filter.date')); ?>">
                                   &nbsp;-&nbsp;
                                   <input type="text" data-uk-datepicker="{format:'YYYY-MM-DD'}" id="filter_enddate"
                                          name="filter[enddate]"
                                          value="<?php echo $this->escape($this->state->get('filter.enddate')); ?>">
                               </span>
                        </div>

                        <!-- START AGENDA Search -->
                        <div class="ae-search-category ae-search-field">
                            <label>
                                <span><?php echo JText::_('AGENDA'); ?></span>
                                <select name="filter[agenda]" class="inputbox" onchange="this.form.submit()">
                                    <option
                                        value=""><?php echo JText::_('COM_ALLEVENTS_FILTER_SELECT_AGENDA'); ?></option>
                                    <?php echo JHtml::_('select.options', $AgendaOptions, 'value', 'text', $this->state->get('filter.agenda')); ?>
                                </select>
                            </label>
                        </div>
                        <!-- END AGENDA Search -->

                        <!-- START Country Search -->
                        <!-- <div class="ae-search-country ae-search-field">
                            <label>
                                <span>Country</span>
                                <select name="country" class="ae-search-country em-events-search-category">
                                    <option value="">All Countries</option>
                                    <option value="BR">Brazil</option>
                                    <option value="CA">Canada</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                    <option value="IN">India</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IT">Italy</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="ES">Spain</option>
                                    <option value="SE">Sweden</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                </select>
                            </label>
                        </div>-->
                        <!-- END Country Search -->
                    </div>
                    <div class="ae-search-options">
                        <a href="#" class="em-toggle" rel=".ae-search-advanced">
                            <span class="hide-advanced"
                                  style="display:none;"><?php echo JText::_('AE_HIDE_ADVANCED_SEARCH'); ?></span>
                            <span class="show-advanced"><?php echo JText::_('AE_SHOW_ADVANCED_SEARCH'); ?></span>
                        </a>
                        <button type="button"
                                onclick="document.id('date').value='';document.id('enddate').value='';this.form.submit();">
                            <?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>
                        </button>
                    </div>
                </div>
            </div>

            <div class="aesimple-event-list">
                <?php foreach ($this->items as $item) : ?>
                    <div class="row-fluid event-wrapper">
                        <div class="span2 event-poster">
                            <a href="<?php echo($item->event_link . $Itemid); ?>">
                                <?php echo '<img alt="' . addslashes($item->titre) . '" src="' . AllEventsHelperEventDisplay::getVignetteName($item) . '" style="border-radius: 8px;box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);" />'; ?>
                            </a>
                        </div>
                        <div class="span10 event-details">
                            <h2>
                                <a href="<?php echo($item->event_link . $Itemid); ?>"><?php echo $item->titre; ?></a>
                                <?php if ($item->proposed_by == JFactory::getUser()->id) {
                                    echo '<span class="label label-staff-role">organizer</span>';
                                } ?>
                            </h2>
                            <div class="event-info">
                                <?php if ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) {
                                    echo "<span class='fa fa-folder-open'></span><a href='" . $item->agenda_link . "'>" . $item->agenda_titre . "</a><br/>";
                                } ?>
                                <?php echo '<div> <span class="fa fa-calendar-o"></span>' . JHtml::date($item->date, 'DATE_FORMAT_LC') . '</div>'; ?>
                                <?php echo '<div> <span class="fa fa-clock-o"></span>' . JHtml::date($item->date, 'H:i') . '</div>'; ?>
                                <?php if ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) {
                                    echo "<span class='fa fa-map-marker'></span><a href='" . $item->place_link . "'>" . $item->place_titre . "</a><br/>";
                                } ?>
                            </div>
                            <div class="event-description">
                                <?php echo AllEventsHelperString::cleanText($item->description, $maxLength, true); ?>
                            </div>
                            <div class="event-actions">
                                <?php if ($item->proposal) {
                                    echo '<span class="label label-event-status label-important">' . JText::_('AE_DRAFT') . '</span>';
                                } ?>
                                <a href="<?php echo($item->event_link . $Itemid); ?>"><?php echo JText::_('AE_EVENT_DETAILS'); ?></a>
                                <a href="<?php echo($item->event_link . $Itemid); ?>"><?php echo JText::_('AE_PARTICIPANTS'); ?></a>

                                <?php
                                $blocks = JFactory::getApplication()->triggerEvent('onAlleventsPostLike', [$item, $this->params]);
                                if (!empty($blocks)) {
                                    foreach ($blocks as $block) {
                                        echo $block;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <ul style="margin-top: 20px; display: none;">
                            <li><b>Start:</b> <?php echo $item->date; ?></li>
                            <li><b>End:</b> <?php echo $item->enddate; ?></li>
                            <li><b>Registration from:</b> <?php echo $item->openingdate; ?></li>
                            <li><b>Registration until:</b> <?php echo $item->closingdate; ?></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pagination">
                <p class="counter">
                    <?php echo $this->pagination->getPagesCounter(); ?>
                </p>
                <?php echo $this->pagination->getPagesLinks(); ?>
            </div>
        </div>
    </div>

    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" id="filter_lat" name="filter_lat"/>
    <input type="hidden" id="filter_lng" name="filter_lng"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
echo AllEventsHelperInfiniteScroll::GetInfiniteScroll('#aesimple-view', '.event-wrapper', $this->params['infinite_scroll']);
?>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(document).delegate('.em-toggle', 'click change', function (e) {
            e.preventDefault();
            var el = $(this);
            var rel = el.attr('rel');
            if (el.hasClass('show-search')) {
                $(rel).slideUp();
                el.find('.show, .show-advanced').show();
                el.find('.hide, .hide-advanced').hide();
                el.removeClass('show-search');
            } else {
                $(rel).slideDown();
                el.find('.show, .show-advanced').hide();
                el.find('.hide, .hide-advanced').show();
                el.addClass('show-search');
            }
        })
    });
    // var autocomplete;

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.

    /*function geolocate() {
     if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(function (position) {
     var geolocation = {
     lat: position.coords.latitude,
     lng: position.coords.longitude
     };
     var circle = new google.maps.Circle({
     center: geolocation,
     radius: position.coords.accuracy
     });
     autocomplete.setBounds(circle.getBounds());
     });
     }
     }*/

    // function initAutocomplete() {
    // autocomplete = new google.maps.places.Autocomplete(/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')), {types: ['geocode']});
    // autocomplete.addListener('place_changed', fillInAddress);
    // }

    // function fillInAddress() {
    // var place = autocomplete.getPlace();
    // document.getElementById('filter_lat').value = place.geometry.location.lat();
    // document.getElementById('filter_lng').value = place.geometry.location.lng();
    // }
</script>

<!--<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBvoZF1HTWTthFH-gJUs6DxJWjpQlPiGU&libraries=places&callback=initAutocomplete"
    async defer></script>-->

