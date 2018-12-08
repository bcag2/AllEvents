<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * event en front end
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

if (!class_exists('AllEventsHelperDataTable'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aedatatable.php';

if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

//###
if (!class_exists('AEContactRender'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/html/aecontactrender.php';
//###
// JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$document = JFactory::getDocument();
$lang = substr($document->language, 0, 2);
$gmapkey = $this->params['gmapkey'];
$item = $this->item;
$this->params["gdate_format"] = $item->date_format;
$this->params["gtime_format"] = $item->time_format;

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();
AllEventsHelperOverride::uikit();

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('icons.css'));
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet('https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.min.css');

$document->addStyleDeclaration('
.uk-accordion-title {
    background: #f7f7f7 none repeat scroll 0 0;
    border: 1px solid #e5e5e5;
    border-radius: 4px;
    cursor: pointer;
    font-size: 18px;
    line-height: 24px;
    margin-bottom: 15px;
    margin-top: 0;
    padding: 5px 15px;
}
.aemeta {
    color: #7e838e;
    font-family: "proxima_nova_rgbold";
    letter-spacing: 1px;
    margin-bottom: 0;
    margin-top: 5px;
    text-transform: uppercase}
');

// Ne surtout pas inclure le bootstrap de Joomla !!!
$document->addScript(AllEventsHelperOverride::GetScript('bootstrap-popover.js'));
// AllEventsHelperOverride::jquery();
$document->addScript('https://maps.googleapis.com/maps/api/js?language=' . $lang . '&key=' . $gmapkey);
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.min.js');
// $document->addScript('https://cdn.jsdelivr.net/gmap3/7.2.0/gmap3.min.js');
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
$BlocEnrolment1 = AllEventsHelperEventDisplay::getBlocEnrolment($item, $this->params, true, false);
$BlocEnrolment2 = AllEventsHelperEventDisplay::getBlocEnrolment($item, $this->params, true, true);
$maxenrol = ($this->params["gmultipleenrolmentsallow"]) ? $this->params["gmultipleenrolmentsmax"] : 1;
echo AllEventsHelperEventDisplay::getBlocEnrolmentJS();
?>

<?php if (!empty($item->titre)) : ?>
    <?php echo $this->getToolbar(); ?>
    <form
        action="<?php echo AllEventsHelperRoute::getEventRoute($item->id); ?>"
        method="post" id="adminForm" name="adminForm">
        <div class="clearfix"></div>
        <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
        <input type="hidden" name="jform[id_enrolment]" value="<?php echo $item->id_enrolment; ?>"/>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>"/>
        <input type="hidden" name="option" value="com_allevents"/>
        <?php echo JHtml::_('form.token'); ?>
    </form>
    <?php echo AllEventsHelperEventDisplay::getBlocEnrolmentForm($item, $Itemid); ?>
    <?php
    foreach ($this->beforedisplayeventblock as $line) {
        echo $line;
    }
    ?>

    <div class="uk-grid" data-uk-grid-margin="">
        <div class="uk-width-medium-3-4 uk-row-first">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-1-1 uk-grid-margin uk-row-first">
                    <article class="uk-article">
                        <h1 class="uk-article-title"><?php echo $item->titre; ?></h1>
                        <?php
                        if ($this->params['geventshow_author']) {
                            echo '<p class="uk-article-meta">';
                            echo JText::_('COM_ALLEVENTS_CREATED_BY') . '&nbsp;<span class="post-author">' . $item->proposed_name . ',&nbsp;</span>';
                            echo JText::_('COM_ALLEVENTS_VISITED') . '&nbsp;' . $item->hits . '&nbsp;' . JText::_('COM_ALLEVENTS_TIMES');
                            echo '</p>';
                        }
                        ?>

                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-1-1 uk-margin-small-bottom uk-row-first">
                                <figure class="uk-overlay uk-overlay-hover">
                                    <?php echo AllEventsHelperEventDisplay::getRibbon($item, $this->params); ?>
                                    <img class="uk-overlay-scale"
                                         src="<?php echo AllEventsHelperEventDisplay::getAfficheName($item); ?>"
                                         alt="<?php echo $item->titre; ?>" width="1080" height="540">
                                    <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"></div>
                                </figure>
                            </div>
                        </div>

                        <p class="uk-article-lead"></p>
                        <p><?php echo $item->description; ?></p>
                        <!-- #€# -->
                        <?php
                        if (isset ($item->fichier_annexe) && ($item->fichier_annexe != "")) {
                            $ext = substr(strtolower(JFile::getExt($item->fichier_annexe)), 0, 3);
                            $filename = basename($item->fichier_annexe);
                            switch ($ext) {
                                // Image
                                case 'jpg':
                                case 'png':
                                case 'gif':
                                case 'xcf':
                                case 'odg':
                                case 'bmp':
                                case 'jpeg':
                                case 'ico':
                                    $icon_32 = JUri::root(true) . "/media/com_allevents/css/images/jpeg.png";
                                    break;
                                // Non-image document
                                default:
                                    $icon_32 = JUri::root(true) . "/media/media/images/mime-icon-32/" . $ext . ".png";
                                    break;
                            }

                            echo '<header class="uk-comment-header">';
                            echo '<img class="uk-comment-avatar" src="' . $icon_32 . '" alt="' . $filename . '" width="32" height="32">';
                            echo '<h4 class="uk-comment-title"></h4>';
                            echo '<p class="uk-comment-meta"><a href="' . JUri::root(true) . $item->fichier_annexe . '" target="_blank">' . $filename . '</a></p>';
                            echo '</header>';
                        }
                        // toolbar inscription sans  les boutons commentaire et accompagnants
                        echo $BlocEnrolment2;
                        ?>
                        <!-- #€# -->
                    </article>
                </div>
            </div>
        </div>

        <div class="uk-width-medium-1-4 uk-row-first">
            <div class="uk-panel uk-panel-box">
                <div class="aemeta timing uk-text-truncate">

                    <span class="uk-margin-small-right"><i
                            class="uk-icon-calendar">&nbsp;</i><?php echo JHtml::date($item->date, $this->params["gdate_format"]); ?></span>
                    <?php if ($item->allday == 0) : ?>
                        <span class="uk-margin-small-right"><i
                                class="uk-icon-clock-o">&nbsp;</i><?php echo JHtml::date($item->date, $this->params["gtime_format"]); ?></span>
                    <?php endif; ?>

                    <?php if ($this->params["geventshow_enddate"] > 0) : ?>
                        <p class="meta uk-text-truncate">
                            <span class="uk-margin-small-right"><i
                                    class="uk-icon-calendar">&nbsp;</i><?php echo JHtml::date($item->enddate, $this->params["gdate_format"]); ?></span>
                            <?php if ($item->allday == 0) : ?>
                                <span class="uk-margin-small-right"><i
                                        class="uk-icon-clock-o">&nbsp;</i><?php echo JHtml::date($item->enddate, $this->params["gtime_format"]); ?></span>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ((($this->params['controlpanel_showagendas']) && ($this->params['geventshow_agenda']) && (!empty($item->agenda_id)))
                || (($this->params['controlpanel_showactivities']) && ($this->params['geventshow_activity']) && (!empty($item->activity_id)))
                || (($this->params['controlpanel_showpublics']) && ($this->params['geventshow_public']) && (!empty($item->public_id)))
                || (($this->params['controlpanel_showplaces']) && ($this->params['geventshow_place']) && (!empty($item->place_id)))
                || (($this->params['controlpanel_showressources']) && ($this->params['geventshow_ressource']) && (!empty($item->ressource_id)))
                || (($this->params['controlpanel_showsections']) && ($this->params['geventshow_section']) && (!empty($item->section_id)))
                || (($this->params['controlpanel_showcategories']) && ($this->params['geventshow_category'])) && (!empty($item->categoryid))
            ) : ?>

                <div class="uk-panel uk-panel-box uk-panel-box-primary">
                    <!--<h3 class="uk-panel-title">Box primary</h3>-->
                    <?php
                    if (($this->params['controlpanel_showagendas']) && ($this->params['geventshow_agenda'])) echo ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) ? "<span class='se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'><a href='" . $item->agenda_link . '?Itemid=' . $Itemid . "'>" . $item->agenda_title . "</a><br/></span>" : "";
                    if (($this->params['controlpanel_showactivities']) && ($this->params['geventshow_activity'])) echo ((isset($item->activity_id)) && ($item->activity_id != null) && ($item->activity_id > 0)) ? "<span class='se_event_info_activity se_activity_" . $item->activity_id . "_bullet'><a href='" . $item->activity_link . '?Itemid=' . $Itemid . "'>" . $item->activity_title . "</a><br/></span>" : "";
                    if (($this->params['controlpanel_showpublics']) && ($this->params['geventshow_public'])) echo ((isset($item->public_id)) && ($item->public_id != null) && ($item->public_id > 0)) ? "<span class='se_event_info_public se_public_" . $item->public_id . "_bullet'><a href='" . $item->public_link . '?Itemid=' . $Itemid . "'>" . $item->public_title . "</a><br/></span>" : "";
                    if (($this->params['controlpanel_showplaces']) && ($this->params['geventshow_place'])) echo ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) ? "<span class='se_event_info_place se_place_" . $item->place_id . "_bullet'><a href='" . $item->place_link . '?Itemid=' . $Itemid . "'>" . $item->place_title . "</a><br/></span>" : "";
                    if (($this->params['controlpanel_showressources']) && ($this->params['geventshow_ressource'])) echo ((isset($item->ressource_id)) && ($item->ressource_id != null) && ($item->ressource_id > 0)) ? "<span class='se_event_info_ressource se_ressource_" . $item->ressource_id . "_bullet'><a href='" . $item->ressource_link . '?Itemid=' . $Itemid . "'>" . $item->ressource_title . "</a><br/></span>" : "";
                    if (($this->params['controlpanel_showsections']) && ($this->params['geventshow_section'])) echo ((isset($item->section_id)) && ($item->section_id != null) && ($item->section_id > 0)) ? "<span class='se_event_info_section se_section_" . $item->section_id . "_bullet'><a href='" . $item->section_link . '?Itemid=' . $Itemid . "'>" . $item->section_title . "</a><br/></span>" : "";
                    if (($this->params['controlpanel_showcategories']) && ($this->params['geventshow_category'])) echo ((isset($item->category_id)) && ($item->category_id != null) && ($item->category_id > 0)) ? "<span class='se_event_info_category se_category_" . $item->category_id . "_bullet'><a href='" . $item->category_link . '?Itemid=' . $Itemid . "'>" . $item->category_title . "</a><br/></span>" : "";
                    ?>
                </div>
            <?php endif; ?>
            <?php if ($this->params["geventshow_map"] == 1) : ?>
                <div class="uk-panel uk-panel-box uk-panel-box-secondary">
                    <div id="eventmap" style="width:100%;" class="post_img eml_nailthumb-container180">
                        <?php //echo '<img alt="eventmap" src="' . AllEventsHelperOverride::GetImage('no_map.png') . '" />'; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- €€€ -->
            <?php
            if ($this->params['controlpanel_showcustomfields']) {
                $customfields = AllEventsCustomfields::getCustomfields('event');
                if ($customfields) {
                    echo '<div class="uk-panel uk-panel-box uk-panel-box-secondary">';
                    echo AllEventsCustomfields::loader('event', 'display');
                    echo '</div>';
                }
            }
            ?>
            <!-- €€€ -->
        </div>

        <div class="uk-width-medium-1-1">
            <div class="uk-accordion" data-uk-accordion="{showfirst: false}">
                <?php if (($this->params['geventshow_fullmap']) && (isset($item->place_latitude)) && (isset($item->place_longitude)) && ($item->place_latitude <> "") && ($item->place_longitude <> "")) : ?>
                    <h3 class="uk-accordion-title"><i class="uk-icon uk-icon-plus-square-o" aria-hidden="true">
                            &nbsp;</i><?php echo JText::_('PLACE'); ?></h3>
                    <div data-wrapper="true" style="height: auto; position: relative;" aria-expanded="true">
                        <div class="uk-accordion-content uk-active">
                            <div style="position:relative;">
                                <div
                                    style="font-size:30px;margin-top:18px;"><?php echo $item->place_title; ?></div>
                                <a target="_blank"
                                   href="https://maps.google.fr/maps?gl=fr&amp;hl=fr&amp;daddr=<?php echo $item->place_address; ?>&amp;panel=1&amp;f=d&amp;fb=1"
                                   style="margin-right:10px;"><?php echo JText::_('COM_ALLEVENTS_DIRECTIONS'); ?></a>
                                <div><?php echo $item->place_description; ?></div>
                            </div>
                            <div>
                                <?php if (($this->params['geventshow_fullmapadress'])) : ?>
                                    <div>
                                <span
                                    style="font-weight:bold;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_ADDRESS'); ?>
                                    &nbsp;:</span>
                                        &nbsp;
                                        <span><?php echo $item->place_address; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (($this->params['geventshow_fullmapgps'])) : ?>
                                    <div>
                                <span
                                    style="font-weight:bold;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_GPS'); ?>
                                    &nbsp;:</span>
                                        &nbsp;
                                        <span><?php echo $item->place_latitude; ?>
                                            ,&nbsp;<?php echo $item->place_longitude; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item->place_phone)) : ?>
                                    <div>
                                <span
                                    style="font-weight:bold;margin-right:4px;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_PHONE'); ?>
                                    &nbsp;:</span>
                                        <span><?php echo $item->place_phone; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item->place_fax)) : ?>
                                    <div>
                                <span
                                    style="font-weight:bold;margin-right:4px;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_FAX'); ?>
                                    &nbsp;:</span>
                                        <span><?php echo $item->place_fax; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item->place_email)) : ?>
                                    <div>
                                <span
                                    style="font-weight:bold;margin-right:4px;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_EMAIL'); ?>
                                    &nbsp;:</span>
                                        <span><?php echo $item->place_email; ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item->place_website)) : ?>
                                    <div>
                                <span style="font-weight:bold;margin-right:4px;"><?php echo JText::_('LINK_URL'); ?>
                                    &nbsp;:</span>
                                        <span><a target="_blank"
                                                 href="<?php echo $item->place_website; ?>"><?php echo $item->place_website; ?></a></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div id="eventfullmap"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (($this->params["geventshow_additional_info"]) && (!empty($item->additional_info))) : ?>
                    <h3 class="uk-accordion-title"><i class="uk-icon uk-icon-plus-square-o" aria-hidden="true">
                            &nbsp;</i><?php echo JText::_('COM_ALLEVENTS_ADDITIONAL_INFO'); ?></h3>
                    <div data-wrapper="true" style="height: auto; position: relative;" aria-expanded="true">
                        <div class="uk-accordion-content uk-active">
                            <div id="event_additionnal">
                                <?php echo $item->additional_info; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($this->params["geventshow_contactsbloc"] != 0 && (!empty($item->event_contacts) || $item->contact_libre != "")) : ?>
                    <h3 class="uk-accordion-title"><i class="uk-icon uk-icon-plus-square-o" aria-hidden="true">
                            &nbsp;</i><?php echo JText::_('COM_ALLEVENTS_CONTACTS'); ?></h3>
                    <div data-wrapper="true" style="height: auto; position: relative;" aria-expanded="true">
                        <div class="uk-accordion-content uk-active">
                            <?php foreach ($item->event_contacts as $event_contact) { ?>
                                <?php foreach ($event_contact['messages'] as $message) {
                                    JFactory::getApplication()->enqueueMessage($message[1], $message[0]);
                                } ?>
                                <div class="contacts_content">
                                    <div class="contact_label">
                                        <?php echo $event_contact['label']; ?>
                                    </div>
                                    <?php if ($event_contact['error_level'] != 'error') : ?>
                                        <p class="contact_con_mar">
                                            <?php $contact_render = new AEContactRender($event_contact);
                                            echo $contact_render->getHtml(); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                            <?php if ($item->contact_libre && $item->contact_libre_allowed) : ?>
                                <div class="contact_label">
                                    <?php echo JText::_('COM_ALLEVENTS_CONTACTS_MISC'); ?>
                                </div>
                                <div class="float3">
                                    <?php echo nl2br(htmlspecialchars($item->contact_libre)); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (($item->enrolment_enabled == 1) && ($this->params["geventshow_enrolmentbloc"]) && (!$item->enrolment_info_empty)) : ?>
                    <h3 class="uk-accordion-title"><i class="uk-icon uk-icon-plus-square-o" aria-hidden="true">
                            &nbsp;</i><?php echo JText::_('COM_ALLEVENTS_TITLE_ENROLMENTS'); ?></h3>
                    <div data-wrapper="true" style="height: auto; position: relative;" aria-expanded="true">
                        <div class="uk-accordion-content uk-active">
                            <?php echo '<div id="event_description">' . enrolment_info . '</div>'; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ((($item->nb_enrolments > 0) && ($this->params["geventshow_enrolments"] == 1) && ($user->get('id') == $item->proposed_by)) ||
                    (($item->nb_enrolments > 0) && ($this->params["geventshow_enrolments"] == 2) && ($user->authorise('core.listenrolments', 'com_allevents')))
                ): ?>
                    <h3 class="uk-accordion-title"><i class="uk-icon uk-icon-plus-square-o" aria-hidden="true">
                            &nbsp;</i>
                        <?php
                        if (JHtml::date($item->date, 'Ymd') > JHtml::date('', 'Ymd')) {
                            echo JText::_('ENROL_PARTICIPANTS_FUTURE');
                        } else {
                            echo JText::_('ENROL_PARTICIPANTS_PAST');
                        }
                        ?>
                    </h3>
                    <div data-wrapper="true" style="height: auto; position: relative;" aria-expanded="true">
                        <div class="uk-accordion-content uk-active">
                            <?php
                            // toolbar inscription sans  les boutons commentaire et accompagnants
                            // echo $BlocEnrolment2;
                            if (!empty($this->enrolments)) {
                                // si vide : vérifier que le plugin cbusers est actif sans CB
                                if (!empty($this->enrolmentsblock)) {
                                    foreach ($this->enrolmentsblock as $enrolmentblock) {
                                        echo $enrolmentblock;
                                    }
                                } else {
                                    echo AllEventsHelperEventDisplay::getTableEnrolmentsHTML($item, $this->enrolments, $this->params);
                                }
                            }
                            // partie stat...
                            echo AllEventsHelperEventDisplay::getStatEnrolmentsHTML($item);
                            ?>

                        </div>
                    </div>
                <?php endif; ?>

                <?php if (($this->params['geventshow_comments']) && isset($this->comments) && (count($this->comments) > 0) && (!$user->guest)) : ?>
                    <h3 class="uk-accordion-title"><i class="uk-icon uk-icon-plus-square-o" aria-hidden="true">
                            &nbsp;</i><?php echo JText::_('EVENT_COMMENTS'); ?></h3>
                    <div data-wrapper="true" style="height: auto; position: relative;" aria-expanded="true">
                        <div class="uk-accordion-content uk-active">
                            <?php
                            foreach ($this->comments as $comment) {
                                echo $comment;
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- afterdisplayeventblock -->
            <?php
            foreach ($this->afterdisplayeventblock as $line) {
                echo $line;
            }
            ?>
        </div>
    </div>

    <?php echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock); ?>
    <?php echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]); ?>

    <?php
else:
    echo JText::_('COM_ALLEVENTS_ITEM_NOT_LOADED');
endif;
?>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            <?php
            if (($this->params["controlpanel_organizersare"] == 1) && ($this->params["geventshow_organizermail"] == 2) && ($item->contact_email != "") && ($this->params["geventshow_organizermail"])) {
                echo "var ctx = document.querySelector('canvas').getContext('2d');";
                echo "ctx.font='14px Arial';";
                echo "ctx.strokeText('" . $item->contact_email . "', 10, 10);";
            }
            if (($this->params["controlpanel_organizersare"] == 2) && ($this->params["geventshow_organizermail"] == 2) && ($item->contact_details_email_to != "") && ($this->params["geventshow_organizermail"])) {
                echo "var ctx = document.querySelector('canvas').getContext('2d');";
                echo "ctx.font='14px Arial';";
                echo "ctx.strokeText('" . $item->contact_details_email_to . "', 10, 10);";
            }

            if ($item->enroltype == 0) {
                echo '$("#toolbar-enrol_yes button").attr("disabled", "disabled");';
                echo '$("#toolbarslider-enrol_yes button").attr("disabled", "disabled");';
            } elseif ($item->enroltype == 1) {
                echo '$("#toolbar-enrol_no button").attr("disabled", "disabled");';
                echo '$("#toolbarslider-enrol_no button").attr("disabled", "disabled");';
            } elseif ($item->enroltype == 2) {
                echo '$("#toolbar-enrol_perhaps button").attr("disabled", "disabled");';
                echo '$("#toolbarslider-enrol_perhaps button").attr("disabled", "disabled");';
            } else {
                echo 'var a=1 ;';
            }

            if ($item->proposal == 0) {
                echo '$("#toolbar-approve button ").attr("disabled", "disabled");';
            }
            ?>

            <?php if ($this->params["geventshow_map"] == 1) : ?>
            <?php if (!empty($item->place_latitude) && !empty($item->place_longitude)) : ?>

            // $('#eventmap')
            // .gmap3({center:[<?php echo $item->place_latitude; ?>, <?php echo $item->place_longitude; ?>],zoom:20 })
            // .marker([{position:[<?php echo $item->place_latitude; ?>, <?php echo $item->place_longitude; ?>]}]);

            var map = new GMaps({
                el: '#eventmap',
                lat: <?php echo $item->place_latitude; ?>,
                lng: <?php echo $item->place_longitude; ?>,
                zoom: 20,
                zoomControl: false,
                zoomControlOpt: {
                    style: 'SMALL',
                    position: 'TOP_LEFT'
                },
                panControl: false,
                streetViewControl: false,
                mapTypeControl: false,
                overviewMapControl: false
            });
            map.addMarker({
                lat: <?php echo $item->place_latitude; ?>,
                lng: <?php echo $item->place_longitude; ?>,
                title: '<?php echo $item->place_title; ?>'
            });
            <?php endif;?>
            <?php elseif ($this->params["geventshow_map"] == 2): ?>
            <?php
            if (isset($item->place_latitude) && isset($item->place_longitude) && ($item->place_latitude <> "") && ($item->place_longitude <> "")) {
                echo 'url = GMaps.staticMapURL({size: [200, 200], lat: ' . $item->place_latitude . ', lng: ' . $item->place_longitude . ', zoom:12, markers: [{lat:' . $item->place_latitude . ', lng: ' . $item->place_longitude . '}]}) ; ';
            } else {
                echo 'url = "' . AllEventsHelperOverride::GetImage('no_map.png') . '" ;';
            }
            ?>
            $('<img/>').attr('src', url).appendTo('#eventmap');

            <?php elseif ($this->params["geventshow_map"] == 3): ?>
            <?php if (isset($item->place_latitude) && isset($item->place_longitude) && ($item->place_latitude <> "") && ($item->place_longitude <> "")) : ?>
            var map = new GMaps.createPanorama({
                el: '#eventmap',
                lat: <?php echo $item->place_latitude; ?>,
                lng: <?php echo $item->place_longitude; ?>
            });
            <?php else :?>
            $('<img/>').attr('src', '<?php echo AllEventsHelperOverride::GetImage('no_map.png'); ?>').appendTo('#eventmap');
            <?php endif;?>
            <?php endif;?>


            <?php if (($this->params["geventshow_fullmap"] == 1) && isset($item->place_latitude) && isset($item->place_longitude) &&
        ($item->place_latitude <> "") && ($item->place_longitude <> "")) : ?>
            var map = new GMaps({
                el: '#eventfullmap',
                lat: <?php echo $item->place_latitude; ?>,
                lng: <?php echo $item->place_longitude; ?>,
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
                lat: <?php echo $item->place_latitude; ?>,
                lng: <?php echo $item->place_longitude; ?>,
                title: <?php echo json_encode($item->place_title); ?>
            });
            <?php endif;?>
        });
        $("#AE_EventsParticipants").DataTable({
            dom: 'BRlrtip',
            "pagingType": "simple_numbers",
            responsive: true,
            // ##€
            buttons: [
                {
                    extend: 'copyHtml5',
                    'text': '<?php echo JText::_('COM_ALLEVENTS_COPY'); ?>',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    autoPrint: false,
                    'text': "<?php echo JText::_('COM_ALLEVENTS_PRINT'); ?>",
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ],
            // €##
            "language": {
                "processing": "<?php echo JText::_("COM_ALLEVENTS_PROCESSING"); ?>",
                "search": "<?php echo JText::_("COM_ALLEVENTS_SEARCH"); ?>",
                "lengthMenu": "<?php echo JText::_("COM_ALLEVENTS_LENGTHMENU"); ?>",
                "info": "<?php echo JText::_("COM_ALLEVENTS_INFO"); ?>",
                "infoEmpty": "<?php echo JText::_("COM_ALLEVENTS_INFOEMPTY"); ?>",
                "infoFiltered": "<?php echo JText::_("COM_ALLEVENTS_INFOFILTERED"); ?>",
                "infoPostFix": "",
                "loadingRecords": "<?php echo JText::_("COM_ALLEVENTS_LOADING"); ?>",
                "zeroRecords": "<?php echo JText::_("COM_ALLEVENTS_NO_ITEMS"); ?>",
                "emptyTable": "<?php echo JText::_("COM_ALLEVENTS_NO_ITEMS"); ?>",
                "paginate": {
                    "first": "<?php echo JText::_("COM_ALLEVENTS_FIRST"); ?>",
                    "previous": "<?php echo JText::_("COM_ALLEVENTS_PREV"); ?>",
                    "next": "<?php echo JText::_("COM_ALLEVENTS_NEXT"); ?>",
                    "last": "<?php echo JText::_("COM_ALLEVENTS_LAST"); ?>"
                },
                "aria": {
                    "sortAscending": "<?php echo JText::_("COM_ALLEVENTS_SORTASCENDING"); ?>",
                    "sortDescending": "<?php echo JText::_("COM_ALLEVENTS_SORTDESCENDING"); ?>"
                }
            },
            "bSort": true,
            "columnDefs": [
                {"type": "datetime-ae", "targets": [2]}
            ],
            "lengthMenu": [[-1, 10, 25, 50, -1], ["<?php echo JText::_('ALL'); ?>", 10, 25, 50]]
        });

        <?php echo AllEventsHelperDataTable::GetExtendDataTable($this->params); ?>

        $.fn.extend({
            popoverClosableP: function (options) {
                var defaults = {
                    html: true,
                    template: '<div class="popover">\
                   <div class="arrow"></div>\
                   <div class="popover-header">\
                      <button type="button" class="close" data-dismiss="popoverp" aria-hidden="true">&times;</button>\
                      <h3 class="popover-title"></h3>\
                   </div>\
                   <div class="popoverp-content">\
                        <div class="input-group">\
                            <button type="button" class="btn btn-danger btn-number" style="padding: 5px 15px;" data-type="minus" data-field="enrol_companions">\
                                <span class="fa fa-minus"></span>\
                            </button>\
                            <input type="text" style="width: 50px" id="enrol_companions" name="enrol_companions" class="input-number" value="<?php echo $item->enrol_companions; ?>" min="0" max="<?php echo $maxenrol; ?>">\
                            <button type="button" class="btn btn-success btn-number" style="padding: 5px 15px;" data-type="plus" data-field="enrol_companions">\
                                <span class="fa fa-plus"></span>\
                            </button>\
                        </div>\
                    <div class="popover-footer blue">\
                      <a class="divider-before-btn-solid blue" data-dismiss="popoverp"><i class="fa fa-times"></i><?php echo JText::_('JTOOLBAR_CLOSE'); ?></a>\
                      <a class="divider-before-btn-solid blue" data-valid="popoverp"><i class="fa fa-check"></i><?php echo JText::_('JTOOLBAR_APPLY'); ?></a>\
                   </div>\
                </div>'
                };
                options = $.extend({}, defaults, options);
                var $popover_togglers = this;
                $popover_togglers.popover(options);
                $popover_togglers.on('click', function (e) {
                    e.preventDefault();
                    $popover_togglers.not(this).popover('hide');
                    $('.btn-number').click(function (e) {
                        e.preventDefault();

                        var fieldName = $(this).attr('data-field');
                        var type = $(this).attr('data-type');
                        var input = $("input[name='" + fieldName + "']");
                        var currentVal = parseInt(input.val());
                        if (isNaN(currentVal)) {
                            input.val(0);
                        } else {
                            if (type == 'minus') {
                                var minValue = parseInt(input.attr('min'));
                                if (!minValue) {
                                    minValue = 0;
                                }
                                if (currentVal > minValue) {
                                    input.val(currentVal - 1).change();
                                }
                                if (parseInt(input.val()) == minValue) {
                                    $(this).attr('disabled', true);
                                }

                            } else if (type == 'plus') {
                                var maxValue = parseInt(input.attr('max'));
                                if (!maxValue) {
                                    maxValue = 100;
                                }
                                if (currentVal < maxValue) {
                                    input.val(currentVal + 1).change();
                                }
                                if (parseInt(input.val()) == maxValue) {
                                    $(this).attr('disabled', true);
                                }

                            }
                        }
                    });
                    $('.input-number').focusin(function () {
                        $(this).data('oldValue', $(this).val());
                    });
                    $('.input-number').change(function () {

                        var minValue = parseInt($(this).attr('min'));
                        var maxValue = parseInt($(this).attr('max'));
                        if (!minValue) {
                            minValue = 0;
                        }
                        if (!maxValue) {
                            maxValue = 100;
                        }
                        var valueCurrent = parseInt($(this).val());

                        var name = $(this).attr('name');
                        if (valueCurrent >= minValue) {
                            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                        } else {
                            alert('Sorry, the minimum value was reached');
                            $(this).val($(this).data('oldValue'));
                        }
                        if (valueCurrent <= maxValue) {
                            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                        } else {
                            alert('Sorry, the maximum value was reached');
                            $(this).val($(this).data('oldValue'));
                        }

                    });
                });
                $('html').on('click', '[data-valid="popoverp"]', function (e) {
                    $('input[name="jform[companions]"]').val($('#enrol_companions').val());
                    EnrolCompanions('<?php echo $item->id;?>');
                    // $popover_togglers.popover('hide');
                });
                $('html').on('click', '[data-valid="popoverp"]', function (e) {
                    $popover_togglers.popover('hide');
                });
            }
        });

        $.fn.extend({
            popoverClosableC: function (options) {
                var defaults = {
                    html: true,
                    template: '<div class="popover">\
                   <div class="arrow"></div>\
                   <div class="popover-header">\
                      <button type="button" class="close" data-dismiss="popoverc" aria-hidden="true">&times;</button>\
                      <h3 class="popover-title"></h3>\
                   </div>\
                   <div class="popoverc-content"><textarea id="enrol_commentaire" rows="4" cols="50"><?php echo json_encode($item->enrol_commentaire); ?></textarea></div>\
                   <div class="popover-footer blue">\
                      <a class="divider-before-btn-solid" data-dismiss="popoverc"><i class="fa fa-times"></i><?php echo JText::_('JTOOLBAR_CLOSE'); ?></a>\
                      <a class="divider-before-btn-solid" data-valid="popoverc"><i class="fa fa-check"></i><?php echo JText::_('JTOOLBAR_APPLY'); ?></a>\
                   </div>\
                </div>'
                };
                options = $.extend({}, defaults, options);
                var $popover_togglers = this;
                $popover_togglers.popover(options);
                $popover_togglers.on('click', function (e) {
                    e.preventDefault();
                    $popover_togglers.not(this).popover('hide');
                });

                $('html').on('click', '[data-valid="popoverc"]', function (e) {
                    $('input[name="jform[commentaire]"]').val($('#enrol_commentaire').val());
                    EnrolCommentaire('<?php echo $item->id;?>');
                    $popover_togglers.popover('hide');
                });
            }
        });

        $(document).ready(function () {
            <?php
            if ($this->params["gmultipleenrolmentsallow"]) {
                echo '$(\'[data-toggle="popoverp"]\').popoverClosableP();';
            }
            ?>
            $('[data-toggle="popoverc"]').popoverClosableC();
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
