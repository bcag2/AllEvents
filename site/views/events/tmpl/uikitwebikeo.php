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
._5a4z,._5a4-{display:block;overflow:hidden;position:relative;text-align:left;white-space:nowrap}
.ae-icon-share,.ae-icon-plus{-moz-box-shadow:inset 0 1px 0 0 #fff;-webkit-box-shadow:inset 0 1px 0 0 #fff;box-shadow:inset 0 1px 0 0 #fff;background-color:transparent;-moz-border-radius:6px;-webkit-border-radius:6px;border-radius:6px;border:1px solid #dcdcdc;display:inline-block;cursor:pointer;color:#fff;font-size:28px;font-weight:700;padding:6px 24px;text-decoration:none;text-shadow:0 1px 0 #fff;position:absolute;bottom:10px}
.ae-icon-plus{right:10px}
.ae-icon-share{left:10px}
.webinar-cell {
    border: 1px solid #CBCBCB;
    margin-top: 10px;
   text-align:left !important; 
}
.webinar-cell .logo {
    padding: 0;
    height: 130px;
    overflow: hidden;
}
.webinar-cell .date {
    color: #878787;
    font-size: 13px;
    font-weight: 300;
}
.webinar-cell .date .start-date,.webinar-cell .date .duration {
    padding-right: 0;
   padding-left: 15px;
}
.webinar-cell .date p {
    margin: 5px 0 0;   
}
.webinar-cell .title-and-channel {
    min-height: 130px;
    border-bottom: 1px solid #c6c6c6;
}
.webinar-cell .title-and-channel .title {
    max-height: 80px;
    overflow: hidden;
   color: #167AC6;
   padding-right: 15px;
    padding-left: 15px;
}
.webinar-cell .title-and-channel .channel {
    font-weight: 300;
    color: #878787;
    font-size: 13px;
   padding-right: 15px;
    padding-left: 15px;
}
.webinar-cell .footer {
    margin-top: 0;
    color: #878787;
   display: flex;
    font-weight: 300;
    background: 0 0;
}
.webinar-cell .footer .subscribers {
    padding: 7px 0 0 5px;
    text-align: center;
    border-right: 1px solid #CBCBCB;
   width: 25%;
}
.webinar-cell .footer .subscribers .nb-subscribers {
    font-size: 15px;
    font-weight: 600;
}
.webinar-cell .footer .subscribers p {
    text-transform: capitalize;
    line-height: 1.2em;
    font-size: 12px;
    margin-bottom: 0;
}
.webinar-cell .footer .vignette-cta {
    height: 37px;
    padding: 7px;
   width: 75%;
}
.webinar-cell .footer .vignette-cta .link-vignette-cta a {
    cursor: pointer;
    position: absolute;
   padding-top: 8px;
    right: 15px;
    max-width: 20px;
    max-height: 25px;
    overflow: hidden;
    font-size: 20px;
    text-decoration: none;
    color: #F3B215;
}
.webinar-cell .date .duration .webinar-express {
    color: #62c462;
    font-weight: 600;
    font-style: italic;
}
.webinar-cell .date .duration .webinar-long {
    color: #C75E69;
    font-weight: 600;
    font-style: italic;
}
.webinar-cell .logo img {
    width: 100%;
}
');

$app = JFactory::getApplication();
$Itemid = ($this->params['gforcenomenuitem']) ? '' : '&Itemid=' . (int)JFactory::getApplication()->input->getInt('Itemid', null);

$n = count($this->items);
$ArrayAgenda = [];
$Arrayid = [];
$user = JFactory::getUser();
$authorised = $user->authorise('core.enrolment', 'com_allevents');

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
           href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed' . $Itemid, false); ?>">
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

            <div data-uk-filter="<?php echo $item->agenda_alias; ?>" data-grid-prepared="true"
                 style="position: absolute; box-sizing: border-box; padding-left: 30px; padding-bottom: 30px; top: 0; left: 0; opacity: 1;">
                <div class="uk-panel uk-text-center webinar-cell ">
                    <div class="col-md-12 logo">
                        <a href="<?php echo $item->event_link; ?>">
                            <img alt="<?php echo $item->titre; ?>"
                                 src="<?php echo AllEventsHelperEventDisplay::getVignetteName($item, $this->params['gdisplay_colors']); ?>"
                            >
                        </a>
                    </div>
                    <div class="date ">
                        <div class="col-xs-8 col-sm-12 col-lg-8 start-date">
                            <p>
                                <?php
                                echo JHtml::date($item->date, 'D. d M.');
                                echo '&nbsp;' . JText::_('COM_ALLEVENTS_DATETIMES_TO') . '&nbsp;';
                                if ($item->allday == "0") {
                                    echo JHtml::date($item->date, $this->params['gtime_format']);
                                } ?>
                            </p>
                        </div>
                        <div class="col-xs-4 col-sm-12 col-lg-4 duration">
                            <?php if ($item->duration <= 15) : ?>
                                <p class="webinar-express">
                                    <i class="fa fa-align-right"></i>
                                    <i class="fa fa-clock-o"></i> <?php echo (int)$item->duration . ' '; ?> mn
                                </p>
                            <?php elseif ($item->duration <= 60) : ?>
                                <p>
                                    <i class="fa fa-align-right"></i>
                                    <i class="fa fa-clock-o"></i> <?php echo (int)$item->duration . ' '; ?> mn
                                </p>
                            <?php else : ?>
                                <p class="webinar-long">
                                    <i class="fa fa-align-right"></i>
                                    <i class="fa fa-clock-o"></i> <?php echo (int)($item->duration / 60) . ' '; ?> h
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="title-and-channel">
                        <div class="title">
                            <h2>
                                <a title="Voir le webinar <?php echo $item->titre; ?>"
                                   href="<?php echo $link; ?>"><?php echo $item->titre; ?>
                                </a>
                            </h2>
                        </div>
                        <div class="channel">
                            <span><?php echo JText::_('COM_ALLEVENTS_CREATED_BY') . ' ' . $item->proposed_name; ?> </span>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="subscribers">
                            <p class="nb-subscribers">
                                <i class="fa fa-user"></i>
                                <span class="nbSubscribersJs"><?php echo (int)$item->nb_enrolyes; ?></span>
                            </p>
                            <p class="subscribersTextJs"><?php echo JText::_('AE_SUBSCRIBERS'); ?></p>
                        </div>
                        <div class="vignette-cta">
                            <span class="link-vignette-cta">
                        <?php if ($authorised) : ?>
                            <a class="trigger-remote" rel="nofollow" href="<?php echo $link; ?>"
                               style="max-width: 20px;">
                              <i class="fa fa-calendar-plus-o"></i>
                              <span class="subscribe-text"
                                    style="display: none; font-size: 14px; text-indent: 250px; opacity: 0;">&nbsp;<?php echo JText::_('AE_ENROL'); ?></span>
                            </a>
                        <?php else : ?>
                            <a class="trigger-remote" rel="nofollow"
                               href="index.php?option=com_users&view=login" style="max-width: 20px;">
                              <i class="fa fa-calendar-plus-o"></i>
                              <span class="subscribe-text"
                                    style="display: none; font-size: 14px; text-indent: 250px; opacity: 0;">&nbsp;<?php echo JText::_('JLOGIN'); ?></span>
                            </a>
                        <?php endif; ?>
                           </span>
                        </div>
                    </div>
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

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $(".webinar-cell .vignette-cta").hover(function () {
                var link = $(this).children(".link-vignette-cta").children("a");
                $(window).width() > 480 && (link.children(".subscribe-text").css("display", "inline"), link.stop().animate({
                    maxWidth: "200px"
                }, 400, function () {
                    link.children(".subscribe-text").css("opacity", 1)
                }), link.children(".subscribe-text").animate({
                    textIndent: "0"
                }, 400))
            }, function () {
                var link = $(this).children(".link-vignette-cta").children("a");
                $(window).width() > 480 && link.stop().animate({
                    maxWidth: "20px"
                }, 400, function () {
                    link.children(".subscribe-text").css({
                        opacity: 0
                    }), link.children(".subscribe-text").animate({
                        textIndent: "250px"
                    }, 400, function () {
                        link.children(".subscribe-text").css("display", "none")
                    })
                })
            })
        });
    }(jQuery));
</script>