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
AllEventsHelperOverride::uikit();
$document->addStyleDeclaration('
.post-teaser {
    border-bottom: 1px solid #ddd;
    margin-bottom: 30px;
    overflow: auto;
    padding-bottom: 30px;
}
.post-teaser img {
    width: auto;
    max-width: 200px;
}
.align_right, .uk-align-right {
    float: right;
    margin-left: 15px;
}

.post .meta {
    color: #999;
    font-family: Bitter,Helvetica,Arial,sans-serif;
}

.post .meta .author {
    display: block;
}
.post .meta span {
    margin-right: 12px;
}
.post .meta i {
    color: #ec1e26;
    margin-right: 4px;
}
.uk-link, a {
    color: #66a1cc;
    cursor: pointer;
    text-decoration: none;
}
');

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$app = JFactory::getApplication();
$Itemid = ($this->params['gforcenomenuitem']) ? '' : '&Itemid=' . (int)JFactory::getApplication()->input->getInt('Itemid', null);

$n = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

    <h1><?php echo $this->params['page_title']; ?></h1>

    <form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" id="adminForm"
          name="adminForm">
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="option" value="com_allevents"/>
        <input type="hidden" name="Itemid"
               value="<?php echo (int)JFactory::getApplication()->input->getInt('Itemid', null); ?>"/>
        <input type="hidden" name="limitstart" value=""/>
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
        <?php echo JHtml::_('form.token'); ?>
        <?php echo JLayoutHelper::render('joomla.searchtools.default', ['view' => $this]); ?>
    </form>

    <div class="uk-container uk-container-center">
        <div id="events_posts" class="uk-width-large-1-1" role="content">
            <?php $show = false;
            foreach ($this->items as $item) {
                $link = $item->event_link;
                if (($item->published == 1 || ($item->published == 0 && JFactory::getUser()->authorise('core.edit.own', ' com_allevents.' . $item->id))) && !($item->cancelled)) {
                    echo '<article class="post post-teaser">';
                    echo '   <a href="' . $link . '">';
                    echo '   <img src="' . AllEventsHelperEventDisplay::getVignetteName($item, $this->params['gdisplay_colors']) . '" alt="' . $item->titre . '" class="align_right ds">';
                    echo '   </a>';
                    echo '   <header>';
                    echo '     <h3><a href="' . $link . '">' . $item->titre . '</a></h3>';
                    echo '     <p class="meta">';
                    echo '         <span class="author">' . JText::_('COM_ALLEVENTS_CREATED_BY') . '&nbsp;' . $item->created_by . '</span>';
                    echo '         <span class="date" itemprop="dtreviewed" datetime="JHtml::date($item->date, $this->params["gdate_format"])"><i class="uk-icon-clock-o">&nbsp</i>' . JHtml::date($item->date, $this->params["gdate_format"]) . '</span>';
                    echo '         <span class="topic">';
                    if ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) {
                        echo '<i class="uk-icon-map-marker">&nbsp</i>' . $item->place_titre;
                    }
                    echo '         </span> ';
                    echo '         <span class="num-comments"></span>';
                    echo '     </p>';
                    echo '   </header>';
                    echo '   <p>' . AllEventsHelperString::cleanText($item->description, 100) . ' <a class="more" href="' . $link . '"><i class="uk-icon-arrow-right">&nbsp;</i>' . JText::_('COM_ALLEVENTS_READMORE') . '</a></p>';
                    echo '</article>';
                    $show = true;
                }
            }
            if (!$show) {
                echo JText::_('COM_ALLEVENTS_NO_ITEMS');
            } else { ?>
                <div class="pagination">
                    <p class="counter">
                        <?php echo $this->pagination->getPagesCounter(); ?>
                    </p>
                    <?php echo $this->pagination->getPagesLinks(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>