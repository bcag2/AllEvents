<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperInfiniteScroll'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeinfinitescroll.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';
use Joomla\Utilities\ArrayHelper;

$document = JFactory::getDocument();
AllEventsHelperOverride::jquery();

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addScript(AllEventsHelperOverride::GetScript('jquery-ias.min.js'));
// $Itemid = (int) $app->input->getInt('Itemid', null);
$Itemid = 0;
?>

    <h1><?php echo $this->params['page_title']; ?></h1>
    <div id="allevents_sections" class="items">
        <?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>
            <?php
            $st = [];
            $st[] = $item->id;
            $show = true;
            ArrayHelper::toInteger($st);
            ?>
            <div class="allevents_box">
                <div class="allevents_box_heading">
                    <h3 class="allevents_box_h3">
                        <a title="<?php echo $item->titre; ?>"
                           href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&st=' . json_encode($st)); ?>"><?php echo $item->titre; ?>
                            <small>
                                (<?php echo ($item->nb_events == 0) ? '0 ' . JText::_('EVENT') : $item->nb_events . ' ' . JText::_('COM_ALLEVENTS_TITLE_EVENTS'); ?>
                                )
                            </small>
                        </a>
                        <a target="_blank"
                           href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed&pivot=1&period=3&sort_by=0&st=' . json_encode($st) . '&Itemid=' . $Itemid); ?>">
                            <i class="fa fa-rss-square"
                               title="<?php echo JText::_('COM_ALLEVENTS_RSS_SUBSCRIBE'); ?>"></i>
                        </a>
                    </h3>
                </div>
                <div class="allevents_box_content" style="display:flex;">
                    <div class="img-left hide-s">
                        <a title="<?php echo $item->titre; ?>" class="event-image"
                           href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&s=' . $item->id, false); ?>">
                            <?php
                            if (!empty($item->vignette) && JFile::exists(JPATH_ROOT . '/' . $item->vignette)) {
                                echo '<img alt="' . $item->titre . '" src="' . JUri::root(true) . '/' . $item->vignette . '" />';
                            } else {
                                echo '<img alt="' . $item->titre . '" src="' . AllEventsHelperOverride::GetImage('no_photo.png') . '" />';
                            }
                            ?>
                        </a>
                    </div>
                    <div>
                        <p><?php echo $item->description; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php
        if (!$show) {
            echo JText::_('COM_ALLEVENTS_NO_ITEMS');
        }
        ?>
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
echo AllEventsHelperInfiniteScroll::GetInfiniteScroll('#allevents_sections', '.allevents_box', true);
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>