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
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
$document->addStyleDeclaration("
.post-teaser{border-bottom:1px solid #ddd;margin-bottom:30px;overflow:auto;padding-bottom:30px}
.post-teaser img{width:auto;max-width:200px}
.align_right,.uk-align-right{float:right;margin-left:15px}
.post .meta{color:#999;font-family:Bitter,Helvetica,Arial,sans-serif}
.post .meta .author{display:block}
.post .meta span{margin-right:12px}
.post .meta i{color:#ec1e26;margin-right:4px}
.uk-link,a{color:#66a1cc;cursor:pointer;text-decoration:none}
.titre{color:#0080e8;font-size:2rem;text-transform:uppercase;font-weight:300}
.ae_contrast-flipbox *{margin:0;padding:0;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
.ae_contrast-flipbox:hover .ae_flipper,.ae_contrast-flipbox.hover .ae_flipper{transform:rotateY(180deg)}
.ae_contrast-flipbox,.ae_contrast-flipbox .ae_front,.ae_contrast-flipbox .ae_back{width:100%;height:370px}
.ae_contrast-flipbox .ae_flipper{transition:.6s;transform-style:preserve-3d;position:relative}
.ae_contrast-flipbox .ae_front,.ae_contrast-flipbox .back{backface-visibility:hidden;position:absolute;top:0;left:0}
.ae_contrast-flipbox .ae_front{z-index:2;transform:rotateY(0deg);padding:0;text-align:center;border-radius:5px;padding:45px 0;-webkit-box-shadow:4px 4px 11px 2px rgba(209,205,209,1);-moz-box-shadow:4px 4px 11px 2px rgba(209,205,209,1);box-shadow:4px 4px 11px 2px rgba(209,205,209,1)}
.ae_contrast-flipbox .ae_front .ae_front_inner-box{position:absolute;width:100%;left:0;bottom:12%}
.ae_contrast-flipbox .ae_front p{margin:0 0 15px}
.ae_contrast-flipbox .ae_front p .fa-soundcloud{color:#fff;font-size:90px;text-align:center;margin:10px 0;line-height:55px;margin:0}
.ae_contrast-flipbox .ae_front h2{font-family:'Poppins',sans-serif;font-size:20px;color:#194d9d;text-transform:uppercase;font-weight:600;display:inline-block;margin:0}
.ae_contrast-flipbox .ae_back{transform:rotateY(180deg);padding:0;text-align:cente;border-radius:5px;-webkit-box-shadow:4px 4px 11px 2px rgba(209,205,209,1);-moz-box-shadow:4px 4px 11px 2px rgba(209,205,209,1);box-shadow:4px 4px 11px 2px rgba(209,205,209,1)}
.ae_contrast-flipbox .ae_back .ae_front_inner-box{position:absolute;width:100%;left:0;top:50%;transform:translatey(-50%);text-align:center}
.ae_contrast-flipbox .ae_back h2{font-family:'Poppins',sans-serif;font-size:20px;color:#fff;text-transform:uppercase;font-weight:600;display:inline-block;margin:0}
.ae_contrast-flipbox .ae_back p{font-family:'Raleway',sans-serif;margin:20px 15px;line-height:30px;color:#fff;font-size:16px}
.ae_contrast-flipbox .ae_back a{padding:10px 15px;font-family:'Montserrat',sans-serif;margin:12px 0 0;text-decoration:none;display:inline-block;font-size:14px;font-weight:600;text-transform:uppercase;border-radius:30px}
");

AllEventsHelperOverride::custom_css();
$app = JFactory::getApplication();
$Itemid = (int)$app->input->getInt('Itemid', null);
$n = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

<?php $show = false;
echo '<div class="row">';
foreach ($this->items as $item) {
    $link = $item->event_link;
    if (($item->published == 1 || ($item->published == 0 && JFactory::getUser()->authorise('core.edit.own', ' com_allevents.' . $item->id))) && !($item->cancelled)) {
        echo '<article>';
        ////debut
        echo '<div class="col-md-4 col-lg-3 col-sm-6">';

        echo '<div class="ae-grid-col ae-colsize-1_5" style="padding:10px 0 0 0 ;">';
        echo '<div class="ae-grid-col-inner">';
        echo '<div class="ae-grid-col-addon">';
        echo '<div class="ae_contrast-flipbox" ontoaehstart="this.classList.toggle(\'hover\');">';
        echo '<div class="ae_flipper">';
        echo '<div class="ae_front" style="background:#ffffff;">';
        echo '<div class="pic-box" style="height:174px; overflow:hidden;"><img src="' . AllEventsHelperEventDisplay::getVignetteName($item) . '" alt="' . $item->titre . '">';
        echo '</div>';
        echo '<div class="ae_front_inner-box"><h2 style="color:#0080e8;">' . $item->titre . '</h2><br><span class="date fa fa-calendar" itemprop="dtreviewed" datetime="JHtml::date($item->date, $this->params["gdate_format"])">&nbsp' . JHtml::date($item->date, $this->params["gdate_format"]) . '</span><br>';
        if ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) {
            echo '<i class="fa fa-map-marker">&nbsp</i>' . $item->place_titre;
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="ae_back" style="background:#0080e8;">';
        echo '<div class="ae_front_inner-box">';
        echo '<h2 style="color:#ffffff;">' . $item->titre . '</h2>';
        echo '<p style="color:#ffffff;">' . AllEventsHelperString::cleanText($item->description, 100) . '</p><a href="' . $link . '" style="color:#4e70a4; background:#ffffff;">En savoir plus</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</article>';
        $show = true;
    }
}
echo '</div>';
echo '<div class="ae-col-clear"></div>';

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

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>