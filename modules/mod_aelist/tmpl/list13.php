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

$sReturn = '<ul class="mod_aelist13 ' . $moduleclass_sfx . '">';

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
            $sReturn .= '<li>';
            $sReturn .= '    <p class="small-event-data">';
            $sReturn .= '        <strong>' . $event->start_day . '</strong>';
            $sReturn .= '        <a href="' . $event->link . '"></a><span>' . $arrMonthNames[$event->start_month - 1] . '</span>';
            $sReturn .= '    </p>';
            $sReturn .= '    <a href="' . $event->link . '" class="event-title">' . $event->titre . '</a>';
            if ($event->allday == 1) {
                $sReturn .= '<span>' . JHtml::_('date', $event->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdate_format'])) . '</span>';
            } else {
                $sReturn .= '<span>' . JHtml::_('date', $event->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdatetime_format'])) . '</span>';
            }
            // $sReturn .= '    <span><strong><a href="/?p=9331">buy now </a></strong></span>' ;
            $sReturn .= '    <span><strong></strong></span>';
            $sReturn .= '</li>';
        }
    }
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            $sReturn .= JText::_('MOD_AELIST_NO_EVENT', true);
        }
    }
}

$sReturn .= '</ul>';
if ($showurl) {
    $sReturn .= '   <p class="button9">';
    $sReturn .= "      <a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
    $sReturn .= '   </p>';
}

echo $sReturn;

