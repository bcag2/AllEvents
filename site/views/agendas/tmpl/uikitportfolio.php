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
AllEventsHelperOverride::uikit();

$document->addStyleDeclaration('.uk-tab, .uk-thumbnav {list-style-type: none!important;}');
?>
<div id="tm-main" class="tm-main uk-block uk-block-default">
    <div class="uk-container uk-container-center">
        <div class="uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="uk-width-1-1 uk-row-first">
                <article id="portfolio-projects">
                    <h1 class="uk-article-title"><?php echo $this->params['page_title']; ?></h1>
                    <div class="uk-clearfix">
                        <p><?php echo $this->params['menu-meta_description']; ?></p>
                    </div>
                    <div class="uk-tab-center uk-margin">
                        <ul id="portfolio-filter" class="uk-tab">
                            <li class="uk-active" data-uk-filter=""><a href="">All</a></li>
                            <?php foreach ($this->items as $item) {
                                echo '<li data-uk-filter="agenda' . $item->id . '" class=""><a href="">' . $item->titre . '</a></li>';
                            } ?>
                        </ul>
                    </div>
                    <div
                        class="uk-grid uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-4"
                        data-uk-grid="{gutter: 20, controls: '#portfolio-filter'}"
                        style="position: relative; margin-left: -20px; height: 585px;">
                        <?php foreach ($this->items as $item) ?>
                        <?php { ?>
                            <?php $at = []; ?>
                            <?php $at[] = $item->id; ?>
                            <?php $show = true; ?>
                            <?php ArrayHelper::toInteger($at); ?>

                            <div data-uk-filter="agenda<?php echo $item->id; ?>" data-grid-prepared="true"
                                 aria-hidden="false">
                                <div class="uk-panel uk-panel-box uk-text-left">
                                    <div class="uk-panel-teaser">
                                        <img src="<?php echo JUri::root(true) . '/' . $item->vignette; ?>"
                                             alt="<?php echo $item->titre; ?>">
                                    </div>
                                    <h3 class="uk-h1">
                                        <a class="uk-link-reset"
                                           href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&at=' . json_encode($at)); ?>">
                                            <?php echo $item->titre; ?>
                                        </a>
                                    </h3>
                                    <p class="uk-article-lead"><?php echo AllEventsHelperString::cleanText($item->description, 100); ?> </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>


