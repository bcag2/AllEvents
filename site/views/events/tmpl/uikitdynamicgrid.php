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
$document->addStyleDeclaration('
.uk-subnav-pill > * > *{padding:7px 25px;border-radius:2px}
.uk-subnav-pill > :hover > *{background:#eee;color:#444}
.uk-subnav-pill > .uk-active:hover > *,.uk-subnav-pill > .uk-active > *{background:#358ecd;color:#fff}
.ae-uk-dynamicgrid .uk-tab > li.uk-tab-responsive > a{border:1px solid #ddd;padding:13px 50px;min-width:120px}
.ae-uk-dynamicgrid .uk-nav-dropdown > li > a:active,.ae-uk-dynamicgrid .uk-nav-dropdown > li > a:focus,.ae-uk-dynamicgrid .uk-nav-dropdown > li > a:hover{background:transparent;color:#444}
.ae-overlay-icon:empty:before{content:"\f064";width:60px;height:60px;margin-top:-30px;margin-left:-30px;font-size:60px}
._2m3o{border-radius:6px;border:1px solid #dcdcdc;display:inline-block;left:12px;padding:5px;position:absolute;text-shadow:0 1px 1px rgba(0,0,0,0.25);top:12px;z-index:2}
._2m3o :first-child{padding-top:1px}
._2m3o :first-child + ._5a4-,._2m3o :first-child + ._5a4z{padding-bottom:1px}
._2m3o ._5a4z{font-size:18px;line-height:18px}
._2m3o ._5a4z,._2m3o ._5a4-{font-weight:600}
._5a4z,._5a4-{display:block;overflow:hidden;position:relative;text-align:center;white-space:nowrap}
.ae-icon-share,.ae-icon-plus{-moz-box-shadow:inset 0 1px 0 0 #fff;-webkit-box-shadow:inset 0 1px 0 0 #fff;box-shadow:inset 0 1px 0 0 #fff;background-color:transparent;-moz-border-radius:6px;-webkit-border-radius:6px;border-radius:6px;border:1px solid #dcdcdc;display:inline-block;cursor:pointer;color:#fff;font-size:28px;font-weight:700;padding:6px 24px;text-decoration:none;text-shadow:0 1px 0 #fff;position:absolute;bottom:10px}
.ae-icon-plus{right:10px}
.ae-icon-share{left:10px}
');

$app = JFactory::getApplication();
$Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);

$n = count($this->items);
$ArrayAgenda = [];
$Arrayid = [];
// $ArraySort = array();

/**
 * @param     $array
 * @param     $on
 * @param int $order
 *
 * @return array
 */
function aearray_sort($array, $on, $order = SORT_ASC)
{
    $new_array = [];
    $sortable_array = [];

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

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

// choix du tri 
if (empty($this->params['grid_sort_agenda'])) {
    // sort by ID
    $ArraySort = aearray_sort($ArrayAgenda, 'id', SORT_ASC);
} else {
    //sort by Title
    $ArraySort = aearray_sort($ArrayAgenda, 'titre', SORT_ASC);
}

?>
    <h1><?php echo $this->params['page_title']; ?>
        <?php if ($this->params['show_rss']) : ?>
            <a target="<?php echo(empty($this->params['display_openlinkself']) ? $this->params['gdisplay_openlinkself'] : $this->params['display_openlinkself']); ?>"
               href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed&Itemid=' . $Itemid, false); ?>">
                <i class="fa fa-rss-square" title="<?php echo JText::_('COM_ALLEVENTS_RSS_SUBSCRIBE'); ?>"></i>
            </a>
        <?php endif; ?>
    </h1>

    <div class="ae-uk-grid">
        <div class="ae-uk-grid-nav">
            <div class="-uk-hidden-small" style="margin-bottom:35px;">
                <ul class="ae-uk-dynamicgrid uk-subnav uk-subnav-pill uk-flex-center">
                    <li data-uk-filter="" class="uk-active"><a href=""><?php echo JText::_('ALL'); ?></a></li>
                    <?php foreach ($ArraySort as $agenda) {
                        echo '<li data-uk-filter="' . $agenda['alias'] . '"><a href="">' . $agenda['titre'] . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <script>
                jQuery(function ($) {
                    setTimeout(function () {
                        $('.ae-uk-grid-nav .uk-active').trigger('click');
                    }, 0);
                });
            </script>
        </div>
        <div class="ae-uk-grid-content uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-3"
             data-uk-grid="{controls: '.ae-uk-dynamicgrid', gutter: 30, animation:true, duration: 500}"
             style="position: relative; margin-left: -30px; height: 429px;">

            <?php $show = false; ?>
            <?php foreach ($this->items as $item) : ?>
                <?php $show = true; ?>
                <?php $link = $item->event_link; ?>

                <div data-uk-filter="<?php echo $item->agenda_alias; ?>" data-grid-prepared="true"
                     style="position: absolute; box-sizing: border-box; padding-left: 30px; padding-bottom: 30px; top: 0; left: 0; opacity: 1;"
                     aria-hidden="false">
                    <div class="uk-panel uk-text-center">
                        <figure class="uk-overlay uk-overlay-hover">
                            <?php echo AllEventsHelperEventDisplay::getRibbon($item, $this->params); ?>
                            <img class="uk-overlay-scale"
                                 src="<?php echo AllEventsHelperEventDisplay::getVignetteName($item, $this->params['gdisplay_colors']); ?>"
                                 alt="Image">
                            <a class="uk-position-cover" href="#"></a>
                            <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background">
                                <div>
                                    <span
                                        aria-label="<?php echo JHtml::date($item->date, $this->params['gdatetime_format']); ?>"
                                        class="_2m3o"
                                        title="<?php echo JHtml::date($item->date, $this->params['gdatetime_format']); ?>"><span
                                            class="_5a4-"><?php echo $this->arrMonthNames[$item->start_month - 1]; ?></span><span
                                            class="_5a4z"><?php echo $item->start_day; ?></span></span>
                                    <button class="ae-icon-share uk-icon-plus"
                                            onclick="location.href='<?php echo $link; ?>'"></button>
                                    <button class="ae-icon-plus uk-icon-search"
                                            href="<?php echo AllEventsHelperEventDisplay::getAfficheName($item); ?>"
                                            data-uk-lightbox title=""></button>
                                </div>
                            </div>
                        </figure>
                        <h4>
                            <a href="<?php echo $link; ?>"><?php echo $item->titre; ?></a>
                            <?php echo $item->access_i . $item->price_i; ?>
                        </h4>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (!$show) {
                echo JText::_('COM_ALLEVENTS_NO_ITEMS');
            } ?>

        </div>
    </div>
<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>