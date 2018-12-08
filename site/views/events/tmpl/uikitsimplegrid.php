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
AllEventsHelperOverride::uikit();

JHtml::_('behavior.framework');
JHtml::_('behavior.tooltip');

$show = false;

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

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
                <i class="uk-icon-rss-square" title="<?php echo JText::_('COM_ALLEVENTS_RSS_SUBSCRIBE'); ?>"></i>
            </a>
        <?php endif; ?>
    </h1>

    <div class="uk-grid" data-uk-grid-match="{target: 'div > .uk-panel'}">
        <?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>
            <?php $show = true; ?>
            <div class="uk-width-medium-1-3">
                <div class="uk-panel uk-margin-bottom" style="min-height: 424px;font-family: 'Open Sans',sans-serif;">
                    <div class="uk-text-center"><img
                            src="<?php echo AllEventsHelperEventDisplay::getVignetteName($item, $this->params['gdisplay_colors']); ?>"
                            alt="<?php echo $item->titre; ?>"></div>
                    <h3>
                        <a href="<?php echo $item->event_link; ?>"><?php echo $item->titre; ?></a>
                        <?php echo $item->hot_i . $item->access_i . $item->price_i; ?>
                    </h3>
                    <?php
                    if (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 1)) {
                        if ($item->allday == "1") {
                            echo '<div style="font-style:oblique" class="uk-article-meta"><i class="uk-icon-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                        } else {
                            echo '<div style="font-style:oblique" class="uk-article-meta"><i class="uk-icon-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                        }
                    } elseif (($this->params['show_date'] == 0) && ($this->params['show_enddate'] == 1)) {
                        if ($item->allday == "1") {
                            echo '<div style="font-style:oblique" class="uk-article-meta"><i class="uk-icon-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                        } else {
                            echo '<div style="font-style:oblique" class="uk-article-meta"><i class="uk-icon-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                        }
                    } elseif (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 0)) {
                        if ($item->allday == "1") {
                            echo '<div style="font-style:oblique" class="uk-article-meta"><i class="uk-icon-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '...</div>';
                        } else {
                            echo '<div style="font-style:oblique" class="uk-article-meta"><i class="uk-icon-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '...</div>';
                        }
                    }

                    $stip = "<br/>";
                    if ($this->params['show_agenda'] == 1) $stip .= ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) ? "<div class='se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'><a href='" . $item->agenda_link . "'>" . $item->agenda_titre . "</a></div>" : "";
                    if ($this->params['show_activity'] == 1) $stip .= ((isset($item->activity_id)) && ($item->activity_id != null) && ($item->activity_id > 0)) ? "<div class='se_event_info_activity se_activity_" . $item->activity_id . "_bullet'><a href='" . $item->activity_link . "'>" . $item->activity_titre . "</a></div>" : "";
                    if ($this->params['show_public'] == 1) $stip .= ((isset($item->public_id)) && ($item->public_id != null) && ($item->public_id > 0)) ? "<div class='se_event_info_public se_public_" . $item->public_id . "_bullet'><a href='" . $item->public_link . "'>" . $item->public_titre . "</a></div>" : "";
                    if ($this->params['show_section'] == 1) $stip .= ((isset($item->section_id)) && ($item->section_id != null) && ($item->section_id > 0)) ? "<div class='se_event_info_section se_section_" . $item->section_id . "_bullet'><a href='" . $item->section_link . "'>" . $item->section_titre . "</a></div>" : "";
                    if ($this->params['show_category'] == 1) $stip .= ((isset($item->category_id)) && ($item->category_id != null) && ($item->category_id > 0)) ? "<div class='se_event_info_category se_category_" . $item->category_id . "_bullet'><a href='" . $item->category_link . "'>" . $item->category_titre . "</a></div>" : "";
                    if ($this->params['show_place'] == 1) $stip .= ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) ? "<div class='se_event_info_place se_place_" . $item->place_id . "_bullet'><a href='" . $item->place_link . "'>" . $item->place_titre . "</a></div>" : "";
                    if ($this->params['show_ressource'] == 1) $stip .= ((isset($item->ressource_id)) && ($item->ressource_id != null) && ($item->ressource_id > 0)) ? "<div class='se_event_info_ressource se_ressource_" . $item->ressource_id . "_bullet'><a href='" . $item->ressource_link . "'>" . $item->ressource_titre . "</a></div>" : "";
                    echo $stip;
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if (!$show) {
            echo JText::_('COM_ALLEVENTS_NO_ITEMS');
        } ?>
    </div>

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>