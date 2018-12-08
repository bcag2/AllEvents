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

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$n = count($this->items);
$ArrayAgenda = [];
$Arrayid = [];

foreach ($this->items as $item) {
    if ((!in_array($item->agenda_id, $Arrayid)) && (!empty($item->agenda_titre))) {
        $rowArray = [];
        $rowArray['id'] = $item->agenda_id;
        $rowArray['titre'] = $item->agenda_titre;
        $rowArray['alias'] = $item->agenda_alias;
        array_push($ArrayAgenda, $rowArray);
        array_push($Arrayid, $item->agenda_id);
    }
}
?>
    <h1><?php echo $this->params['page_title']; ?>
        <?php if ($this->params['show_rss']) : ?>
            <a target="<?php echo(empty($this->params['display_openlinkself']) ? $this->params['gdisplay_openlinkself'] : $this->params['display_openlinkself']); ?>"
               href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed' . $Itemid, false); ?>">
                <i class="fa fa-rss-square" title="<?php echo JText::_('COM_ALLEVENTS_RSS_SUBSCRIBE'); ?>"></i>
            </a>
        <?php endif; ?>
    </h1>

    <div class="uk-tab-center uk-hidden-small" style="margin-bottom:35px;">
        <ul class="ae-uk-portfoliogrid uk-tab" data-uk-tab="">
            <li class="uk-active" data-uk-filter="" aria-expanded="true">
                <a href=""
                   style="height:30px;line-height:30px;padding-left:35px;padding-right:35px;border-radius:3px;"><?php echo JText::_('ALL'); ?></a>
            </li>
            <?php foreach ($ArrayAgenda as $agenda) {
                echo '<li data-uk-filter="' . $agenda['alias'] . '" aria-expanded="false" class=""><a href="" style="height:30px;line-height:30px;padding-left:35px;padding-right:35px;border-radius:3px;">' . $agenda['titre'] . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <div class="uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3"
         data-uk-grid="{controls: '.ae-uk-portfoliogrid', gutter: 0, animation:true, duration: 500}"
         style="position: relative; height: 1651px;">

        <?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>
            <?php $show = true; ?>

            <div data-uk-filter="<?php echo $item->agenda_alias; ?>" data-grid-prepared="true"
                 style="position: absolute; box-sizing: border-box; top: 0; left: 0; opacity: 1; display: block;"
                 aria-hidden="false">
                <figure class="uk-overlay uk-overlay-hover"><img class="uk-overlay-spin"
                                                                 src="<?php echo AllEventsHelperEventDisplay::getVignetteName($item, $this->params['gdisplay_colors']); ?>"
                                                                 alt="<?php echo $item->titre; ?>">
                    <figcaption
                        class="uk-overlay-panel uk-overlay-background uk-overlay-fade uk-flex uk-flex-center uk-flex-middle uk-text-center">
                        <div>
                            <h4>
                                <a href="<?php echo $item->event_link; ?>"><?php echo $item->titre; ?></a>
                                <?php echo $item->hot_i . $item->access_i . $item->price_i; ?>
                            </h4>
                            <p class="uk-article-meta">
                                    <span class="uk-margin-small-right">
                                        <?php
                                        if ($this->params['show_date'] == 1) {
                                            if ($item->allday == "1") {
                                                echo JHtml::date($item->date, $this->params['gdate_format']);
                                            } else {
                                                echo JHtml::date($item->date, $this->params['gdatetime_format']);
                                            }
                                        }
                                        ?>
                                    </span>
                                <?php
                                if ($this->params['show_agenda'] == 1) {
                                    if ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) {
                                        echo '<span class="uk-margin-small-right"> <a href="' . $item->agenda_link . '">' . $item->agenda_titre . '</a> </span>';
                                    }
                                }
                                ?>
                            </p>
                            <div class="uk-margin-top">
                                <a class="uk-button uk-button-small uk-margin-small-right"
                                   data-uk-lightbox="{group:'<?php echo $item->agenda_titre; ?>'}"
                                   title="<?php echo $item->titre; ?>"
                                   href="<?php echo AllEventsHelperEventDisplay::getVignetteName($item, $this->params['gdisplay_colors']); ?>"
                                   style="background:#ffffff;color:#444444;padding:2px 20px;">
                                    <?php echo JText::_('JACTION_VISUALISATION'); ?> </a>
                                <a class="uk-button uk-button-small"
                                   href="<?php echo $item->link; ?>"
                                   style="background:#ffffff;color:#444444;padding:2px 20px;"> <?php echo JText::_('COM_ALLEVENTS_READMORE'); ?></a>
                            </div>
                        </div>
                    </figcaption>
                </figure>
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