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
JHtml::_('behavior.framework');
JHtml::_('behavior.tooltip');

$show = false;

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
AllEventsHelperOverride::custom_css();
$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
if ($this->params['infinite_scroll']) {
    $document->addScript(AllEventsHelperOverride::GetScript('jquery-ias.min.js'));
}

$app = JFactory::getApplication();
$Itemid = ($this->params['gforcenomenuitem']) ? '' : '&Itemid=' . (int)JFactory::getApplication()->input->getInt('Itemid', null);
$n = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
echo AllEventsHelperEventDisplay::getBlocEnrolmentJS();
?>

    <h1><?php echo $this->params['page_title']; ?>
        <?php if ($this->params['show_rss']) : ?>
            <a target="<?php echo(empty($this->params['display_openlinkself']) ? $this->params['gdisplay_openlinkself'] : $this->params['display_openlinkself']); ?>"
               href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed' . $Itemid, false); ?>">
                <i class="fa fa-rss-square" title="<?php echo JText::_('COM_ALLEVENTS_RSS_SUBSCRIBE'); ?>"></i>
            </a>
        <?php endif; ?>
    </h1>

    <form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" id="adminForm"
          name="adminForm">
        <?php echo $this->getToolbar(); ?>
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

    <div id="listpro">
        <?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>
            <?php
            $canEdit = JFactory::getUser()->authorise('core.edit', 'com_allevents');
            if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_allevents')) {
                $canEdit = JFactory::getUser()->id == $item->created_by;
            }
            if ($item->published == 1 || ($item->published == 0 && JFactory::getUser()->authorise('core.edit.own', ' com_allevents'))):
                $show = true;
                ?>

                <div class="bx card <?php echo $item->event_class; ?>">
                    <?php
                    echo AllEventsHelperEventDisplay::getRibbon($item, $this->params);
                    echo AllEventsHelperEventDisplay::getBlocEnrolmentForm($item, (int)JFactory::getApplication()->input->getInt('Itemid', null));
                    ?>
                    <div class="rc rcsm pbs">
                        <div class="img-left hide-s">
                            <a title="<?php echo $item->titre; ?>" class="event-image"
                               href="<?php echo $item->event_link; ?>">
                                <?php echo AllEventsHelperEventDisplay::getVignette($item, $this->params['gdisplay_colors']); ?>
                            </a>
                        </div>
                        <div class="bd">
                            <h2 class="mbxs">
                                <a href="<?php echo $item->event_link; ?>">
                                    <span><?php echo $item->titre; ?></span>
                                    <?php echo $item->hot_i . $item->access_i . $item->price_i; ?>
                                </a>
                            </h2>
                            <?php

                            $stip = "";
                            if ($this->params['show_agenda'] == 1) $stip .= ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) ? "<span class='se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'><a href='" . $item->agenda_link . "'>" . $item->agenda_titre . "</a><br/></span>" : "";
                            if ($this->params['show_activity'] == 1) $stip .= ((isset($item->activity_id)) && ($item->activity_id != null) && ($item->activity_id > 0)) ? "<span class='se_event_info_activity se_activity_" . $item->activity_id . "_bullet'><a href='" . $item->activity_link . "'>" . $item->activity_titre . "</a><br/></span>" : "";
                            if ($this->params['show_public'] == 1) $stip .= ((isset($item->public_id)) && ($item->public_id != null) && ($item->public_id > 0)) ? "<span class='se_event_info_public se_public_" . $item->public_id . "_bullet'><a href='" . $item->public_link . "'>" . $item->public_titre . "</a><br/></span>" : "";
                            if ($this->params['show_section'] == 1) $stip .= ((isset($item->section_id)) && ($item->section_id != null) && ($item->section_id > 0)) ? "<span class='se_event_info_section se_section_" . $item->section_id . "_bullet'><a href='" . $item->section_link . "'>" . $item->section_titre . "</a><br/></span>" : "";
                            if ($this->params['show_category'] == 1) $stip .= ((isset($item->category_id)) && ($item->category_id != null) && ($item->category_id > 0)) ? "<span class='se_event_info_category se_category_" . $item->category_id . "_bullet'><a href='" . $item->category_link . "'>" . $item->category_titre . "</a><br/></span>" : "";
                            if ($this->params['show_place'] == 1) $stip .= ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) ? "<span class='se_event_info_place se_place_" . $item->place_id . "_bullet'><a href='" . $item->place_link . "'>" . $item->place_titre . "</a><br/></span>" : "";
                            if ($this->params['show_ressource'] == 1) $stip .= ((isset($item->ressource_id)) && ($item->ressource_id != null) && ($item->ressource_id > 0)) ? "<span class='se_event_info_ressource se_ressource_" . $item->ressource_id . "_bullet'><a href='" . $item->ressource_link . "'>" . $item->ressource_titre . "</a><br/></span>" : "";
                            echo $stip;

                            ?>
                            <div class="gr gray">
                            <span class="gu-last">
                                <?php
                                if (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 1)) {
                                    if ($item->allday == "1") {
                                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                                    } else {
                                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                                    }
                                } elseif (($this->params['show_date'] == 0) && ($this->params['show_enddate'] == 1)) {
                                    if ($item->allday == "1") {
                                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                                    } else {
                                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                                    }
                                } elseif (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 0)) {
                                    if ($item->allday == "1") {
                                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '...</div>';
                                    } else {
                                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '...</div>';
                                    }
                                }

                                ?>
                            </span>
                            </div>
                        </div>
                    </div>
                    <?php echo AllEventsHelperEventDisplay::getBlocEnrolment($item, $this->params); ?>
                </div>

            <?php endif; ?>
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
echo AllEventsHelperInfiniteScroll::GetInfiniteScroll('#listpro', '.card', $this->params['infinite_scroll']);
?>