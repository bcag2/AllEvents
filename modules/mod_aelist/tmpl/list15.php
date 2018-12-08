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

$sReturn = '<div class="mod_aelist15 ' . $moduleclass_sfx . '">';

if (!empty($showtitle)) {
    if ($showtitle) {
        $sReturn .= '<' . $header_tag . '>' . JText::_('MOD_AELIST_TITLE', true) . '</' . $header_tag . '>';
    }
}

if (!empty($items)) {
    foreach ($items as $event) {
        $event->link = modAEListHelper::getLink($event, $Itemid, $gparams['gforcenomenuitem']);
        $event->couleur_texte = modAEListHelper::getColor($event, $dc, $dcb);
        $event->couleur_fond = modAEListHelper::getBackColor($event, $dc, $dcb);
        $event->entite_titre = modAEListHelper::getEntityTitle($event, $dc);
        $event->vignette_defaut = modAEListHelper::getVignette($event, $dc);
        $event->start_year = (int)JHtml::_('date', $event->date, "Y");
        $event->start_month = (int)JHtml::_('date', $event->date, "m");
        $event->start_day = (int)JHtml::_('date', $event->date, "d");
        $event->end_year = (int)JHtml::_('date', $event->enddate, "Y");
        $event->end_month = (int)JHtml::_('date', $event->enddate, "m");
        $event->end_day = (int)JHtml::_('date', $event->enddate, "d");
        $event->intro = AllEventsHelperString::cleanText($event->description, $maxLength);

        // on évite le bug de la date où tout est égal à 0
        if ($event->start_month > 0) {
            $sReturn .= '<div class="mod_aelist15_container ">';
            $sReturn .= '    <span class="block-number">';
            $sReturn .= '        <span class="digit">' . $event->start_day . '</span>';
            $sReturn .= '        <span class="bottom"></span>';
            $sReturn .= '    </span>';
            $sReturn .= '    <span class="event_date">' . $arrMonthNames[$event->start_month - 1] . '&nbsp;' . $event->start_day . '</span>';
            $sReturn .= '    &nbsp;';
            $sReturn .= '    <span class="mod_aelist15_title">';
            $sReturn .= '    <a href="' . $event->link . '">' . $event->titre . '</a>';
            $sReturn .= '    </span>';
            $sReturn .= '</div>';
        }
    }
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            $sReturn .= JText::_('MOD_AELIST_NO_EVENT', true);
        }
    }
}

$sReturn .= '</div>';
if ($showurl) {
    $sReturn .= '<p class="button9">';
    $sReturn .= "<a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
    $sReturn .= '</p>';
}

echo $sReturn;