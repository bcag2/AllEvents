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
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

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
        <div class="events-design-row">
            <?php foreach ($this->items as $item) : ?>
                <?php
                $show = true;
                ?>
                <div class="latest-post events-design-col-sm-12"
                     style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                    <div
                        style="background-image: url(<?php echo AllEventsHelperEventDisplay::getAfficheName($item); ?>);"
                        class="events-design-latest-post bx">
                        <div class="events-design-row">
                            <div class="latest-post-inner events-design-col-xs-offset-3 events-design-col-xs-9">
                                <div class="latest-post-content">
                                    <p class="date"><?php echo $item->date; ?></p>
                                    <h3 class="entry-title"><a
                                            href="<?php echo $item->event_link; ?>"><?php echo $item->titre; ?></a></h3>
                                    <p class="info"><span title=" Author " data-toggle="tooltip" itemprop="genre"
                                                          class="author"><i
                                                class="fa fa-user"></i><?php echo $item->created_by; ?></span><span
                                            title=" Category" data-toggle="tooltip" itemprop="itemTags"
                                            class="category"><i
                                                class="fa fa-folder-open-o"></i><?php echo $item->agenda_titre; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
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