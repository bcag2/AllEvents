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

$sReturn = '<ul class="mod_aelist8-items ' . $moduleclass_sfx . '">';

if (!empty($showtitle)) {
    if ($showtitle) {
        $sReturn .= '<' . $header_tag . '>' . JText::_('MOD_AELIST_TITLE', true) . '</' . $header_tag . '>';
    }
}

if (!empty($items)) {
    foreach ($items as $obj) {
        $link = modAEListHelper::getLink($obj, $Itemid, $gparams['gforcenomenuitem']);
        $couleur_texte = modAEListHelper::getColor($obj, $dc, $dcb);
        $couleur_fond = modAEListHelper::getBackColor($obj, $dc, $dcb);
        $entite_titre = modAEListHelper::getEntityTitle($obj, $dc);
        $vignette_defaut = modAEListHelper::getVignette($obj, $dc);
        $obj->start_year = (int)JHtml::_('date', $obj->date, "Y");
        $obj->start_month = (int)JHtml::_('date', $obj->date, "m");
        $obj->start_day = (int)JHtml::_('date', $obj->date, "d");
        $obj->end_year = (int)JHtml::_('date', $obj->enddate, "Y");
        $obj->end_month = (int)JHtml::_('date', $obj->enddate, "m");
        $obj->end_day = (int)JHtml::_('date', $obj->enddate, "d");
        $obj->intro = AllEventsHelperString::cleanText($obj->description, $maxLength);

        // on évite le bug de la date où tout est égal à 0
        if ($obj->start_month > 0) {
            $sReturn .= '<li class="mod_aelist8-item">';
            $sReturn .= '    <div class="mod_aelist8-badge">';
            $sReturn .= '        <span class="mod_aelist8-day">' . $obj->start_day . '</span>';
            $sReturn .= '        <span class="mod_aelist8-month">' . $arrMonthNames[$obj->start_month - 1] . '</span>';
            $sReturn .= '        <span class="mod_aelist8-year">' . $obj->start_year . '</span>';
            $sReturn .= '    </div>';
            $sReturn .= '    <div class="mod_aelist8-description">';
            $sReturn .= '        <a href="' . $link . '" class="mod_aelist8-title">' . $obj->titre . '</a>';
            if ($obj->allday == 0) {
                $sReturn .= '<span class="mod_aelist8-time">';
                $sReturn .= JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                if (JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format'])) != JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']))) {
                    $sReturn .= ' &ndash; ';
                    $sReturn .= JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                }
                $sReturn .= '</span>';
            }
            $sReturn .= '        <p class="mod_aelist8-details">' . $obj->intro . '</p>';
            $sReturn .= '    </div>';
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
if (!empty($showurl)) {
    if ($showurl) {
        $sReturn .= '   <p class="button9">';
        $sReturn .= "      <a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
        $sReturn .= '   </p>';
    }
}

echo $sReturn;
