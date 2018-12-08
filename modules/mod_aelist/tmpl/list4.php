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

$sReturn = '<div id="mod_aelist4" class="mod_aelist ' . $moduleclass_sfx . '">';

if (!empty($showtitle)) {
    if ($showtitle) {
        $sReturn .= '<' . $header_tag . '>' . JText::_('MOD_AELIST_TITLE', true) . '</' . $header_tag . '>';
    }
}

if (!empty($items)) {
    $sReturn .= '<ul class="mod_aelist4-widget">';
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

        // on évite le bug de la date où tout est égal à 0
        if ($obj->start_month > 0) {
            $sReturn .= '<li class="mod_aelist4-event-future">';
            $sReturn .= '    <div style="background-color: ' . $couleur_texte . ';" class="mod_aelist4-date-container">';
            $sReturn .= '        <span class="mod_aelist4-date-month">' . $arrMonthNames[$obj->start_month - 1] . '</span>';
            $sReturn .= '        <span class="mod_aelist4-date-day">' . $obj->start_day . '</span>';
            $sReturn .= '    </div>';
            $sReturn .= '    <strong>';
            $sReturn .= '        <a style="color: ' . $couleur_texte . ';" title="' . $obj->titre . '" href="' . $link . '">' . $obj->titre . '</a>';
            $sReturn .= '    </strong>';
            if ($obj->allday == 0) {
                $sReturn .= '<div class="mod_aelist4-datetime">';
                $sReturn .= JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                if (JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format'])) != JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']))) {
                    $sReturn .= ' &ndash; ';
                    $sReturn .= JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                }
            }
            $sReturn .= '</li>';
        }
    }
    $sReturn .= '</ul>';
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            $sReturn .= JText::_('MOD_AELIST_NO_EVENT', true);
        }
    }
}
if (!empty($showurl)) {
    if ($showurl) {
        $sReturn .= '   <p class="button9">';
        $sReturn .= "      <a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
        $sReturn .= '   </p>';
    }
}

$sReturn .= '</div>';
echo $sReturn;

