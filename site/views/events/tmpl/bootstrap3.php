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
AllEventsHelperOverride::jquery();
AllEventsHelperOverride::bootstrap();

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
if ($this->params['infinite_scroll']) {
    $document->addScript(AllEventsHelperOverride::GetScript('jquery-ias.min.js'));
}

$app = JFactory::getApplication();
$Itemid = ($this->params['gforcenomenuitem']) ? '' : '&Itemid=' . (int)JFactory::getApplication()->input->getInt('Itemid', null);
$show = false;

$n = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

<?php echo '<h1>' . $this->params['page_title'] . '</h1>'; ?>
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" id="adminForm"
      name="adminForm">
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="option" value="com_allevents"/>
    <input type="hidden" name="Itemid"
           value="<?php echo (int)JFactory::getApplication()->input->getInt('Itemid', null); ?>"/>
    <input type="hidden" name="limitstart" value=""/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php
    echo JHtml::_('form.token');
    if (!((int)$this->params['infinite_scroll'])) {
        echo JLayoutHelper::render('joomla.searchtools.default', ['view' => $this]);
    }
    ?>
</form>

<div id="eml_events">
    <?php if ($this->params['show_rss']) : ?>
        <div id="eventsrss">
            <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed' . $Itemid); ?>">
                <i class="fa fa-rss"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php foreach ($this->items as $item) : ?>
        <?php $show = true; ?>

        <div class="event_container <?php echo $item->event_class; ?>">
            <div class="eml_event_content se_agenda_<?php echo $item->agenda_id; ?>_summary">
                <div class="eml_event_image">
                    <div class="eml_nailthumb-container132">
                        <?php echo AllEventsHelperEventDisplay::getVignette($item, $this->params['gdisplay_colors']); ?>
                    </div>
                </div>

                <div class="eml_event_top_informations">
                    <h3>
                        <b>
                            <a href="<?php echo $item->event_link; ?>"><?php echo $item->titre; ?></a>
                        </b>
                        <?php echo $item->hot_i . $item->access_i . $item->price_i; ?>
                    </h3>

                    <?php echo "<span class='event_agenda se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'><a href='" . $item->agenda_link . "'>" . $item->agenda_titre . "</a></span>" ?>

                    <?php if (isset($item->contact_name) && ($item->contact_name <> "")) : ?>
                        <span class="event_organizer">
                                <i class="fa fa-user"></i>&nbsp;
                                <a title="<?php echo $item->contact_name; ?>"><?php echo $item->contact_name; ?></a>
                            </span>
                    <?php endif; ?>

                    <?php
                    if (($item->enrolment_enabled) && !($item->enrolment_finished)) {
                        if (($item->enrolment_max_participant == 0) || (($item->enrolment_max_participant > 0) && ($item->nb_enrolyes < $item->enrolment_max_participant))) {
                            echo '<span class="ae_enrol ok"> ';
                        } elseif ($item->allow_overbooking) {
                            echo '<span class="ae_enrol overbooking"> ';
                        } else {
                            echo '<span class="ae_enrol full"> ';
                        }

                        echo $item->nb_enrolyes;
                        echo '&nbsp;/&nbsp;';
                        if ($item->enrolment_max_participant == 0) {
                            echo '&infin;';
                        } else {
                            echo $item->enrolment_max_participant;
                        }
                        echo '</span>';
                    }
                    ?>
                </div>

                <div class="eml_event_date">
                    <?php
                    if (($this->params['show_date'] == 1) || ($this->params['show_enddate'] == 1)) {
                        echo '<i class="fa fa-calendar"></i>&nbsp;&nbsp;';
                    }
                    if (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 1)) {
                        if ($item->allday == "1") {
                            echo '<a>' . JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</a>';
                        } else {
                            echo '<a>' . JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</a>';
                        }
                    } elseif (($this->params['show_date'] == 0) && ($this->params['show_enddate'] == 1)) {
                        if ($item->allday == "1") {
                            echo '<a>...' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</a>';
                        } else {
                            echo '<a>...' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</a>';
                        }
                    } elseif (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 0)) {
                        if ($item->allday == "1") {
                            echo '<dd>' . JHtml::date($item->date, $this->params['gdate_format']) . '...</dd>';
                        } else {
                            echo '<dd>' . JHtml::date($item->date, $this->params['gdatetime_format']) . '...</dd>';
                        }
                    }
                    ?>
                </div>

                <div class="eml_event_location">
                    <?php
                    echo ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) ? "<span class='se_event_info_place se_place_" . $item->place_id . "_bullet'><a href=" . $item->place_link . ">" . $item->place_titre . "</a></span><br/>" : "";
                    ?>
                </div>
                <div class="eml_event_buttons">
                    <a href="<?php echo $item->event_link; ?>"
                       class="btn btn-primary eml_btn_details"><?php echo JText::_('COM_ALLEVENTS_BTN_VIS') ?></a>
                    <?php if ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) : ?>
                        <a class="btn btn-default" href="<?php echo $item->place_link; ?>"><i
                                class="fa fa-map-marker"></i><?php echo ' ' . JText::_('COM_ALLEVENTS_MAP') ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php if (!$show) : ?>
        <?php echo JText::_('COM_ALLEVENTS_NO_ITEMS'); ?>
    <?php endif; ?>
</div>

<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
echo AllEventsHelperInfiniteScroll::GetInfiniteScroll('#eml_events', '.event_container', $this->params['infinite_scroll']);
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.eml_nailthumb-container').nailthumb({width: 132, height: 132, method: 'resize'});
    });
</script>