<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4
 * event en front end
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

if (!class_exists('AllEventsHelperDataTable'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aedatatable.php';

if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

// if (!class_exists('AllEventsContactDetailsLink'))
// require_once JPATH_SITE . '/components/com_allevents/helpers/aecontactdetailslink.php';

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
$classcollapse = ($this->params['geventshow_defaultexpand']) ? 'collapse in' : 'collapse';
// $maxenrol = ($this->params["gmultipleenrolmentsallow"]) ? $this->params["gmultipleenrolmentsmax"] : 1 ;

// echo AllEventsHelperEventDisplay::getBlocEnrolmentJS() ;

?>
<div itemtype="http://schema.org/Event" itemscope="itemscope">
    <?php if ($this->params["geventshow_title"] == 1): ?>
        <h1 class="text-center" itemprop="name"><?php echo $this->item->titre; ?></h1>
    <?php endif; ?>
    <h4 class="text-center text-muted">
        <i class="fa fa-clock-o"></i>
        <span
            itemprop="startDate"><?php echo ($this->item->allday == 1) ? JHtml::date($this->item->date, $this->params["gdate_format"]) : JHtml::date($this->item->date, $this->params["gdatetime_format"]); ?></span>
        -
        <span
            itemprop="endDate"><?php echo ($this->item->allday == 1) ? JHtml::date($this->item->enddate, $this->params["gdate_format"]) : JHtml::date($this->item->enddate, $this->params["gdatetime_format"]); ?></span>
    </h4>
    <?php if (!empty($this->item->place_id)) : ?>
        <h4 class="text-center text-muted">
            <address itemtype="http://schema.org/Organization" itemscope="itemscope" class="mb0">
                <div class="css_non_editable_mode_hidden">
                    <span itemprop="name"><?php echo $this->item->place_title; ?></span>
                </div>
                <div itemtype="http://schema.org/PostalAddress" itemscope="itemscope" itemprop="address">
                    <div class="css_editable_mode_hidden">
                        <i class="fa fa-map-marker"></i>
                        <span itemprop="addressLocality"><?php echo $this->item->place_ville; ?></span>,
                        <span itemprop="addressCountry"><?php echo $this->item->place_country; ?></span>
                    </div>
                </div>
            </address>
        </h4>
    <?php endif; ?>
    <div class="row mt32 mb32 span12">
        <div class="col-md-8 span8">
            <?php if (($this->item->enrolment_enabled == 1) && ($this->params["geventshow_enrolmentbloc"])) : ?>
                <div class="">
                    <?php
                    // echo '<div id="event_description">' . $this->item->enrolment_info . '</div>';
                    // |€|
                    // if ($this->params['controlpanel_showcustomfields'])
                    // {
                    // $customfields = AllEventsCustomfields::getCustomfields('enrol');
                    // if ($customfields)
                    // {
                    // echo '<h3>'.JText::_('COM_ALLEVENTS_CUSTOMFIELDS').'</h3>' ;
                    // echo AllEventsCustomfields::loader('enrol', 'display');
                    // }
                    // }
                    // |€|
                    // toolbar inscription avec les boutons commentaire et accompagnants
                    echo $BlocEnrolment2;
                    ?>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?php if (($this->params["geventshow_affiche"]) && isset ($this->item->affiche) && ($this->item->affiche != "")) : ?>
                <div class="" style="text-align:center;">
                    <div class="post_img" style="float:none;">
                        <img title="<?php echo $this->item->titre; ?>" alt="<?php echo $this->item->titre; ?>"
                             src="<?php echo $this->item->affiche; ?>"/>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (($this->params["geventshow_description"]) && isset ($this->item->description) && ($this->item->description != "")) : ?>
                <div id="event_description">
                    <?php echo $this->item->description; ?>
                </div>
                <!-- €€€ -->
                <?php
                if ($this->params['controlpanel_showcustomfields']) {
                    $customfields = AllEventsCustomfields::getCustomfields('event');
                    if ($customfields) {
                        echo AllEventsCustomfields::loader('event', 'display');
                    }
                }
                ?>
                <!-- €€€ -->
            <?php endif; ?>
        </div>
        <div class="col-md-4 css_noprint span4">
            <?php if ((isset($this->item->place_latitude)) && (isset($this->item->place_longitude)) && ($this->item->place_latitude <> "") && ($this->item->place_longitude <> "")) : ?>
                <div class="accordion-group accordion-heading accordionae-heading ">
                    <a class="accordion-toggle" data-toggle="collapse" aria-expanded="true"
                       aria-controls="#collapseplace" href="#collapseplace"><?php echo JText::_('PLACE'); ?><span
                            class="pull-right"><i class="fa fa-plus-square-o"></i></span></a>
                </div>
                <div id="collapseplace" class="<?php echo $classcollapse; ?>">
                    <div class="wellae">
                        <div id="eventfullmap"></div>
                        <div class="mt16 mb8" itemprop="location">
                            <address itemtype="http://schema.org/Organization" itemscope="itemscope" class="mb0">
                                <div class="css_non_editable_mode_hidden">
                                    <span itemprop="name"><?php echo $this->item->place_title; ?></span>
                                </div>
                                <div itemtype="http://schema.org/PostalAddress" itemscope="itemscope"
                                     itemprop="address">
                                    <div class="css_editable_mode_hidden">
                                        <i class="fa fa-map-marker"></i> <span
                                            itemprop="streetAddress"> <?php echo $this->item->place_adress; ?></span>
                                    </div>
                                </div>
                            </address>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="accordion-group accordion-heading accordionae-heading ">
                <a class="accordion-toggle" data-toggle="collapse" aria-expanded="true" aria-controls="#collapsewhen"
                   href="#collapsewhen"><?php echo JText::_('AE_WHEN'); ?><span class="pull-right"><i
                            class="fa fa-plus-square-o"></i></span></a>
            </div>
            <div id="collapsewhen" class="<?php echo $classcollapse; ?>">
                <div class="wellae">
                    <i class="fa fa-clock-o"></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_FROM_DAY'); ?>
                    &nbsp;<span><?php echo ($this->item->allday == 1) ? JHtml::date($this->item->date, $this->params["gdate_format"]) : JHtml::date($this->item->date, $this->params["gdatetime_format"]); ?></span><br>
                    <i class="fa fa-clock-o"></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_TO_DAY'); ?>
                    &nbsp;<span><?php echo ($this->item->allday == 1) ? JHtml::date($this->item->enddate, $this->params["gdate_format"]) : JHtml::date($this->item->enddate, $this->params["gdatetime_format"]); ?></span>
                </div>
            </div>

            <?php if (($this->params["geventshow_organizerbloc"] != 0) || ($this->params["controlpanel_organizersare"] == 3)) : ?>
                <div class="accordion-group accordion-heading accordionae-heading ">
                    <a class="accordion-toggle" data-toggle="collapse" aria-expanded="true"
                       aria-controls="#collapseorganizer"
                       href="#collapseorganizer"><?php echo JText::_('COM_ALLEVENTS_ORGANIZERS'); ?><span
                            class="pull-right"><i class="fa fa-plus-square-o"></i></span></a>
                </div>
                <div id="collapseorganizer" class="<?php echo $classcollapse; ?>">
                    <div class="wellae">
                        <?php if (($this->params["controlpanel_organizersare"] == 1) && (!empty($this->item->contact_id))) : ?>
                            <div class="organized_content">
                                <p class="org_con_mar">
                                    <?php if (($this->params["geventshow_organizername"] == 1) && ($this->item->contact_name != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_NAME'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2"><?php echo $this->item->contact_name; ?></span>
                                    <?php endif; ?>
                                    <?php if ($this->params["geventshow_organizermail"] == 1) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_EMAIL'); ?> : </strong>
                                        <span class="float2">
                                           <?php echo '<a href="mailto:' . $this->item->contact_email . '">' . $this->item->contact_email . '</a>'; ?>
                                        </span>
                                    <?php elseif ($this->params["geventshow_organizermail"] == 2) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_EMAIL'); ?> : </strong>
                                        <span class="float2"><canvas height="20"></canvas></span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if (($this->params["controlpanel_organizersare"] == 2) && ($this->item->contact_1_details_id != 0)) : ?>
                            <div class="organized_content">
                                <p class="org_con_mar">
                                    <?php if (($this->params["geventshow_organizername"] == 1) && ($this->item->contact_details_name != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_NAME'); ?>
                                            : </strong>&nbsp;
                                        <?php if ($this->params["geventshow_organizerlink"] == 1) : ?>
                                            <a href="<?php echo JRoute::_(AllEventsJContactLink::getContactRoute($this->item->contact_1_details_id, 0)); ?>">
                                                <?php echo $this->item->contact_details_name; ?></a>
                                        <?php else : ?>
                                            <span class="float2"><?php echo $this->item->contact_details_name; ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizerposition"] == 1) && ($this->item->contact_details_con_position != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_POSITION'); ?>
                                            : </strong>&nbsp;
                                        <span
                                            class="float2"><?php echo $this->item->contact_details_con_position; ?></span>
                                    <?php endif; ?>
                                    <?php if ($this->params["geventshow_organizermail"] == 1) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_EMAIL'); ?> : </strong>
                                        <span class="float2">
                                    <?php
                                    echo '<a href="mailto:' . $this->item->contact_details_email_to . '">' . $this->item->contact_details_email_to . '</a>';
                                    ?>
                                </span>
                                    <?php elseif ($this->params["geventshow_organizermail"] == 2) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_EMAIL'); ?> : </strong>
                                        <span class="float2"><canvas height="20"></canvas></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizeraddress"] == 1) && ($this->item->contact_details_address != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_ADDRESS'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2"><?php echo $this->item->contact_details_address; ?></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizersuburb"] == 1) && ($this->item->contact_details_suburb != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_SUBURB'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2"><?php echo $this->item->contact_details_suburb; ?></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizerstate"] == 1) && ($this->item->contact_details_state != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_STATE'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2"><?php echo $this->item->contact_details_state; ?></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizerpostcode"] == 1) && ($this->item->contact_details_postcode != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_POSTCODE'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2"><?php echo $this->item->contact_details_postcode; ?></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizercountry"] == 1) && ($this->item->contact_details_country != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_COUNTRY'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2"><?php echo $this->item->contact_details_country; ?></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizertelephone"] == 1) && ($this->item->contact_details_telephone != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_TELEPHONE'); ?>
                                            : </strong>&nbsp;
                                        <span
                                            class="float2"><?php echo $this->item->contact_details_telephone; ?></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizermobile"] == 1) && ($this->item->contact_details_mobile != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_MOBILE'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2"><?php echo $this->item->contact_details_mobile; ?></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizerfax"] == 1) && ($this->item->contact_details_fax != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_FAX'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2"><?php echo $this->item->contact_details_fax; ?></span>
                                    <?php endif; ?>
                                    <?php if (($this->params["geventshow_organizerwebpage"] == 1) && ($this->item->contact_details_webpage != "")) : ?>
                                        <strong class="float"><?php echo JText::_('COM_ALLEVENTS_WEBPAGE'); ?>
                                            : </strong>&nbsp;
                                        <span class="float2">
                                    <a href="<?php echo $this->item->contact_details_webpage; ?>" target="_blank"
                                       itemprop="url">
                                    <?php // echo StringHelperPunycode::urlToUTF8($this->item->contact_details_webpage); ?></a>
                                </span>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <?php if (($this->params["geventshow_organizermisc"] == 1) && ($this->item->contact_libre != "")) : ?>
                                <div class="float3">
                                    <?php echo $this->item->contact_libre; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (($this->params["controlpanel_organizersare"] == 3) && (!empty($this->item->contact_libre))) : ?>
                            <div class="float3">
                                <?php echo $this->item->contact_libre; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
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

