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
JHtml::_('behavior.framework');
JHtml::_('behavior.tooltip');

$show = false;

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('aesimple.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

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
                <div class="events-filters">
                    <span><?php echo JHtml::_('grid.sort', 'COM_ALLEVENTS_FORM_DESC_EVENT_TITRE', 'a.titre', $listDirn, $listOrder); ?></span>
                    <span><?php echo JHtml::_('grid.sort', 'COM_ALLEVENTS_FORM_LBL_EVENT_DATE', 'a.date', $listDirn, $listOrder); ?></span>
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
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
        <?php echo JHtml::_('form.token'); ?>
    </form>
<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
echo AllEventsHelperInfiniteScroll::GetInfiniteScroll('#aesimple-view', '.event-wrapper', $this->params['infinite_scroll']);
?>