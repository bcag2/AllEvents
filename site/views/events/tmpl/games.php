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
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
if ($this->params['infinite_scroll']) {
    $document->addScript(AllEventsHelperOverride::GetScript('jquery-ias.min.js'));
}

$app = JFactory::getApplication();
$Itemid = ($this->params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);

$n = count($this->items);
$maxLength = 200;
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>
    <h1><?php echo $this->params['page_title']; ?></h1>
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

    <div class="ae-events-game-container">

<?php
$show = false;
foreach ($this->items as $item) :
    $canEdit = JFactory::getUser()->authorise('core.edit', 'com_allevents');
    if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_allevents')) {
        $canEdit = JFactory::getUser()->id == $item->created_by;
    }
    if ($item->published == 1 || ($item->published == 0 && JFactory::getUser()->authorise('core.edit.own', ' com_allevents'))):
        $show = true;
        $link = $item->event_link;
        ?>
        <div class="ae-events-game-block <?php echo $item->event_class; ?>">
            <?php
            echo AllEventsHelperEventDisplay::getRibbon($item, $this->params);
            ?>
            <form id="form-event-enrolyes-<?php echo $item->id; ?>" style="display:inline;"
                  action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
                  class="form-validate" enctype="multipart/form-data">
                <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
                <input type="hidden" name="jform[id_enrolment]" value="<?php echo $item->id_enrolment; ?>"/>
                <input type="hidden" name="jform[url]"
                       value="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>"/>
                <input type="hidden" name="Itemid"
                       value="<?php echo (int)JFactory::getApplication()->input->getInt('Itemid', null); ?>"/>
                <input type="hidden" name="option" value="com_allevents"/>
                <input type="hidden" name="task" value="events.enrol_yes"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>
            <form id="form-event-enrolno-<?php echo $item->id; ?>" style="display:inline;"
                  action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
                  class="form-validate" enctype="multipart/form-data">
                <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
                <input type="hidden" name="jform[id_enrolment]" value="<?php echo $item->id_enrolment; ?>"/>
                <input type="hidden" name="jform[url]"
                       value="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>"/>
                <input type="hidden" name="Itemid"
                       value="<?php echo (int)JFactory::getApplication()->input->getInt('Itemid', null); ?>"/>
                <input type="hidden" name="option" value="com_allevents"/>
                <input type="hidden" name="task" value="events.enrol_no"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>
            <form id="form-event-enrolperhaps-<?php echo $item->id; ?>" style="display:inline;"
                  action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post"
                  class="form-validate" enctype="multipart/form-data">
                <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
                <input type="hidden" name="jform[id_enrolment]" value="<?php echo $item->id_enrolment; ?>"/>
                <input type="hidden" name="jform[url]"
                       value="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>"/>
                <input type="hidden" name="Itemid"
                       value="<?php echo (int)JFactory::getApplication()->input->getInt('Itemid', null); ?>"/>
                <input type="hidden" name="option" value="com_allevents"/>
                <input type="hidden" name="task" value="events.enrol_perhaps"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>

            <div class="ae-events-game-infodates">
                <?php
                if ($this->params['gdisplay_colors'] == 0) {
                    echo '<div class="ae-events-game-datecont ' . 'se_agenda_' . $item->agenda_id . '_forecolor">';
                } elseif ($this->params['gdisplay_colors'] == 1) {
                    echo '<div class="ae-events-game-datecont ' . 'se_activity_' . $item->activity_id . '_forecolor">';
                } elseif ($this->params['gdisplay_colors'] == 2) {
                    echo '<div class="ae-events-game-datecont ' . 'se_category_' . $item->category_id . '_forecolor">';
                }
                ?>
                <div class="ae-events-game-date">
                    <div class="ae-events-game-date-calendar"><i class="fa fa-calendar"></i></div>
                    <span class="ae-events-game-date-mday"><?php echo $item->start_day; ?></span>
                    <span
                        class="ae-events-game-date-month"><?php echo $this->arrMonthNames[$item->start_month - 1]; ?></span>
                </div>
            </div>
            <div class="ae-events-game-timecont">
                <div class="ae-events-game-time">
                                <span
                                    class="ae-events-game-time-hm"><?php echo $item->allday == "1" ? "" : JHtml::date($item->date, $this->params['gtime_format']); ?></span>
                </div>
            </div>
        </div>
        <div class="ae-events-game-detbox">
            <div class="ae-events-game-img">
                <div class="ae-events-game-imgcont eml_nailthumb-container150">
                    <?php echo AllEventsHelperEventDisplay::getVignette($item, $this->params['gdisplay_colors']); ?>
                </div>
            </div>
            <div class="ae-events-game-infoblock">
                <h3 class="ae-events-game-title"><a
                        href="<?php echo $link; ?>"><?php echo $item->titre; ?></a></h3>
                <?php
                $stip = "";
                if ($this->params['show_place'] == 1) $stip .= (!empty($item->place_id)) ? "<span class='se_event_info_place se_place_" . $item->place_id . "_bullet'><a href='" . $item->place_link . "'>" . $item->place_titre . "</a><br/></span>" : "";
                echo $stip;
                ?>
                <div class="ae-events-game-shortdesc">
                    <?php echo AllEventsHelperString::cleanText($item->description, $maxLength, true); ?>
                </div>
            </div>
        </div>
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
echo AllEventsHelperInfiniteScroll::GetInfiniteScroll('.ae-events-game-container', '.ae-events-game-block', $this->params['infinite_scroll']);
?>