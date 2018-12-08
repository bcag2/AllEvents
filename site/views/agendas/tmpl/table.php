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
$app = JFactory::getApplication();
$params = AllEventsHelperParam::getGlobalParam();

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addScript(AllEventsHelperOverride::GetScript('jquery-ias.min.js'));
?>
    <h1><?php echo $this->params['page_title']; ?></h1>
    <div id="allevents_agendas" class="row-fluid">
        <?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>
            <?php
            $at = [];
            $at[] = $item->id;
            $show = true;
            ArrayHelper::toInteger($at);
            ?>
            <div class="item column-1 span3">
                <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&at=' . json_encode($at)); ?>"><img
                        alt="<?php echo $item->titre; ?>" src="<?php echo $item->vignette; ?>" class="thumbnail"></a>
                <div></div>
                <div>
                    <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&at=' . json_encode($at)); ?>"><?php echo $item->titre; ?></a>&nbsp;<?php echo '(' . $item->nb_events . ')'; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <?php
        if (!$show) {
            echo JText::_('COM_ALLEVENTS_NO_ITEMS');
        }
        ?>
    </div>

<?php
echo AllEventsHelperInfiniteScroll::GetInfiniteScroll('#allevents_agendas', '.allevents_box', true);
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>