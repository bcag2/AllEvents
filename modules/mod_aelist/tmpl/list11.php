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

$sReturn = '<ul class="mod_aelist11 ' . $moduleclass_sfx . '">';

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
            $sReturn .= '<li class="mod_aelist11evli">';
            $sReturn .= '    <div class="mod_aelist11divitem">';
            $sReturn .= '        <h4><a href="' . $link . '">' . $obj->titre . '</a></h4>';
            if ($obj->allday == 1) {
                $sReturn .= '<span class="mod_aelist11data">' . JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdate_format'])) . '</span>';
            } else {
                $sReturn .= '<span class="mod_aelist11data">' . JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdatetime_format'])) . '</span>';
            }

            $sReturn .= '        <span class="mod_aelist11location">' . $obj->place_titre . '</span>';
            $sReturn .= '        <p class="mod_aelist11evp">' . $obj->intro . '</p>';
            $sReturn .= '        <div class="mod_aelist11datebox">';
            $sReturn .= '            <span class="mod_aelist11dateboxmonth">' . $arrMonthNames[$obj->start_month - 1] . '</span>';
            $sReturn .= '            <span class="mod_aelist11dateboxday">' . $obj->start_day . '</span>';
            $sReturn .= '        </div>';
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
echo $sReturn;

