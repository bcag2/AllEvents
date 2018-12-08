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
$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$app = JFactory::getApplication();
$Itemid = ($this->params['gforcenomenuitem']) ? '' : '&Itemid=' . (int)JFactory::getApplication()->input->getInt('Itemid', null);
$show = false;
$oldstart_month = 0;
$oldstart_year = 0;
$nbtitle = 1;
?>

<h1><?php echo $this->params['page_title']; ?>
    <?php if ($this->params['show_rss']) : ?>
        <a target="<?php echo(empty($this->params['display_openlinkself']) ? $this->params['gdisplay_openlinkself'] : $this->params['display_openlinkself']); ?>"
           href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed' . $Itemid, false); ?>">
            <i class="fa fa-rss-square" title="<?php echo JText::_('COM_ALLEVENTS_RSS_SUBSCRIBE'); ?>"></i>
        </a>
    <?php endif; ?>
</h1>
<div class="row" id="eventlist">
    <?php foreach ($this->items as $item) : ?>
        <?php $show = true; ?>
        <?php
        if (($oldstart_year != $item->start_year) || ($oldstart_month != $item->start_month)) {
            echo '<h2 class="date_title title_' . $nbtitle . '">' . $this->arrMonthLongNames[$item->start_month - 1] . ' ' . $item->start_year . '</h2>';
            $oldstart_year = $item->start_year;
            $oldstart_month = $item->start_month;
            $nbtitle = $nbtitle + 1;
        }
        ?>
        <div class="event_list_item clfx">
            <div style="" class="<?php echo 'se_agenda_' . $item->agenda_id . '_color event_list_date'; ?>">
                <?php if (($item->end_year == $item->start_year) && ($item->end_month == $item->start_month) && ($item->end_day == $item->start_day)) : ?>
                    <span class="date_single">
                            <span class="day"><?php echo $item->start_day; ?></span>
                            <span class="month"><?php echo $this->arrMonthNames[$item->start_month - 1]; ?></span>
                        </span>
                <?php else : ?>
                    <span class="date_span">
                            <span class="date_from">
                                <span class="day"><?php echo $item->start_day; ?></span>
                                <span class="month"><?php echo $this->arrMonthNames[$item->start_month - 1]; ?></span>
                            </span>
                            <span class="date_to">
                                <span class="day"><?php echo $item->end_day; ?></span>
                                <span class="month"><?php echo $this->arrMonthNames[$item->end_month - 1]; ?></span>
                            </span>
                        </span>
                <?php endif; ?>
            </div>
            <div class="event_list_details">
                <a class="event_list_details_title" href="<?php echo $item->link; ?>"><?php echo $item->titre; ?></a>
                <p>
                    <?php
                    if (!$item->allday) {
                        echo JHtml::date($item->date, $this->params['gtime_format']) . ' - ' . JHtml::date($item->enddate, $this->params['gtime_format']);
                    }
                    if (!$item->allday && !empty ($item->agenda_titre)) {
                        echo ' | ';
                    }
                    if (!empty ($item->agenda_titre)) {
                        echo "<a href='" . $item->agenda_link . "'>" . $item->agenda_titre . "</a>";
                    }
                    ?>
                </p>
            </div>
            <div class="event_list_share">
                <div class="eml_nailthumb-container80">
                    <?php echo AllEventsHelperEventDisplay::getVignette($item, $this->params['gdisplay_colors']); ?>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
    <?php if (!$show) : ?>
        <?php echo JText::_('COM_ALLEVENTS_NO_ITEMS'); ?>
    <?php endif; ?>
</div>
<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.nailthumb-container80').nailthumb({
            width: 80,
            height: 80,
            method: 'resize',
            fitDirection: 'center center'
        });
    });
</script>