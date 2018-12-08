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

$document = JFactory::getDocument();
$document->addStyleSheet('https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic');
$sReturn = '';

if (!empty($showtitle)) {
    if ($showtitle) {
        $sReturn .= '<' . $header_tag . '>' . JText::_('MOD_AELIST_TITLE', true) . '</' . $header_tag . '>';
    }
}

if (!empty($items)) {
    $sReturn .= '<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">';
    $sReturn .= '<ul class="mod_aelist16">';
    foreach ($items as $event) {
        $event->link = modAEListHelper::getLink($event, $Itemid, $gparams['gforcenomenuitem']);
        $event->couleur_texte = modAEListHelper::getColor($event, $dc, $dcb);
        $event->couleur_fond = modAEListHelper::getBackColor($event, $dc, $dcb);
        $event->entite_titre = modAEListHelper::getEntityTitle($event, $dc);
        $event->vignette_defaut = modAEListHelper::getVignette($event, $dc, false);
        $event->start_year = (int)JHtml::_('date', $event->date, "Y");
        $event->start_month = (int)JHtml::_('date', $event->date, "m");
        $event->start_day = (int)JHtml::_('date', $event->date, "d");
        $event->end_year = (int)JHtml::_('date', $event->enddate, "Y");
        $event->end_month = (int)JHtml::_('date', $event->enddate, "m");
        $event->end_day = (int)JHtml::_('date', $event->enddate, "d");
        $event->intro = AllEventsHelperString::cleanText($event->description, $maxLength);

        // on évite le bug de la date où tout est égal à 0
        if ($event->start_month > 0) {
            $sReturn .= '<li>';
            $sReturn .= '   <time style="background-color: ' . $event->couleur_fond . ';color: ' . $event->couleur_texte . '" datetime="' . $event->start_year . '-' . $event->start_month . '-' . $event->start_day . '">';
            $sReturn .= '      <span class="day">' . $event->start_day . '</span>';
            $sReturn .= '      <span class="month">' . $arrMonthNames[$event->start_month - 1] . '</span>';
            $sReturn .= '      <span class="year">' . $event->start_year . '</span>';
            $sReturn .= '      <span class="time">ALL DAY</span>';
            $sReturn .= '   </time>';
            if (!empty($event->vignette_defaut)) {
                $sReturn .= '<img alt="' . $event->titre . '" src="' . $event->vignette_defaut . '" />';
            }
            $sReturn .= '   <div class="info">';
            $sReturn .= '      <h2 class="title"><a href="' . $event->link . '">' . $event->titre . '</a></h2>';
            $sReturn .= '      <p class="desc">' . $event->intro . '</p>';
            $sReturn .= '      <ul>';
            if (!empty($event->place_titre)) {
                $sReturn .= '<li style="width:33%;"><span class="fa fa-map-marker"></span>&nbsp;' . $event->place_titre . '</li>';
            } else {
                $sReturn .= '<li style="width:33%;"></li>';
            }

            $sReturn .= '         <li style="width:33%;"><span class="fa fa-briefcase"></span>&nbsp;' . $event->entite_titre . '</li>';
// $sReturn .= '            <li style="width:33%;"><span class="fa fa-money"></span>&nbsp;$39.99</li>';
            $sReturn .= '         <li style="width:33%;"></li>';
            $sReturn .= '      </ul>';
            $sReturn .= '   </div>';
            $sReturn .= '   <div class="social">';
            $sReturn .= '      <ul>';
            $sReturn .= '         <li class="facebook" style="width:33%;"><a href="https://www.facebook.com/sharer.php?u=' . JUri::root() . $event->link . '" target="_blank"><span class="fa fa-facebook"></span></a></li>';
            $sReturn .= '         <li class="twitter" style="width:34%;"><a href="https://twitter.com/share?url=' . JUri::root() . $event->link . '" target="_blank"><span class="fa fa-twitter"></span></a></li>';
            $sReturn .= '         <li class="google-plus" style="width:33%;"><a href="https://plus.google.com/share?url=' . JUri::root() . $event->link . '" target="_blank"><span class="fa fa-google-plus"></span></a></li>';
            $sReturn .= '      </ul>';
            $sReturn .= '   </div>';
            $sReturn .= '</li>';
        }
    }
    $sReturn .= '</ul>';
    if ($showurl) {
        $sReturn .= '<p class="button9">';
        $sReturn .= "<a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
        $sReturn .= '</p>';
    }
    $sReturn .= '</div>';
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            $sReturn .= JText::_('MOD_AELIST_NO_EVENT', true);
        }
    }
}

echo $sReturn;