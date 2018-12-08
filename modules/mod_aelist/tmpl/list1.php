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

$sReturn = '<div id="mod_aelist1" class="mod_aelist ' . $moduleclass_sfx . '">';

if (!empty($showtitle)) {
    if ($showtitle) {
        $sReturn .= '<' . $header_tag . '>' . JText::_('MOD_AELIST_TITLE', true) . '</' . $header_tag . '>';
    }
}

if (!empty($items)) {
    $sReturn .= '<ul>';
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
            $sReturn .= '<li>';
            $sReturn .= '   <a href="' . $link . '">';
            $sReturn .= '      <span class="date" style="color:' . $couleur_texte . '">';
            $sReturn .= '         <span class="date1" style="color:' . $couleur_texte . '">';
            $sReturn .= '            <em style="color:' . $couleur_texte . '">' . $obj->start_day . '</em>' . $arrMonthNames[$obj->start_month - 1] . ' ' . $obj->start_year;
            $sReturn .= '         </span>';

            // au cas où çà serait utile un jour <span class="date2">jusqu'au<em>01/12</em></span>

            $sReturn .= '      </span>';
            $sReturn .= '      <span class="infos" style="color:' . $couleur_texte . '">';
            $sReturn .= '         <span class="title" style="color:' . $couleur_texte . '">' . $obj->titre . '</span>';
            $sReturn .= '      </span>';
            $sReturn .= '   </a>';
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
        $sReturn .= '<p class="button9">';
        $sReturn .= "<a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
        $sReturn .= '</p>';
    }
}
$sReturn .= '</div>';
echo $sReturn;

