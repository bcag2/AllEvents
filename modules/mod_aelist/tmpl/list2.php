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

$sReturn = '<div id="mod_aelist2" class="mod_aelist ' . $moduleclass_sfx . '">';

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

        // on évite le bug de la date où tout est égal à 0
        if ($obj->start_month > 0) {
            $sReturn .= '        <strong class="title">' . $obj->titre . '</strong>';
            $sReturn .= '        <span class="details">';
            $sReturn .= '            <div>';
            $sReturn .= '               <dt class="mod_aelist_date"><i class="fa fa-calendar"></i>&nbsp;';
            $sReturn .= $obj->start_day . ' ' . $arrMonthNames[$obj->start_month - 1] . ' ' . $obj->start_year;
            $sReturn .= '            </dt>';
            $sReturn .= '            </div>';
            if ($obj->allday == 0) {
                $sReturn .= '            <div>';
                $sReturn .= '               <dt class="mod_aelist_time">';
                $sReturn .= '                     <i class="fa fa-clock-o"></i>&nbsp;';
                $sReturn .= JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                $sReturn .= '            </dt>';
                $sReturn .= '            </div>';
            }
            $sReturn .= '        </span>';
            $sReturn .= '        <span class="price">';
            $sReturn .= '            <strong>&rsaquo;</strong>';
            $sReturn .= '        </span>';
            $sReturn .= '    </a>';
        }
    }
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            $sReturn .= JText::_('MOD_AELIST_NO_EVENT', true);
        }
    }
}
if ($showurl) {
    $sReturn .= '   <p class="button9">';
    $sReturn .= "      <a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
    $sReturn .= '   </p>';
}

$sReturn .= '</div>';
echo $sReturn;


