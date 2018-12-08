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

$sReturn = '<div id="mod_aelist7" class=" ' . $moduleclass_sfx . '">';

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
            $sReturn .= '<div class="addthisevent-drop" title="">';
            $sReturn .= '    <div class="date">';
            $sReturn .= '        <span class="mon">' . $arrMonthNames[$obj->start_month - 1] . '</span>';
            $sReturn .= '        <span class="day">' . $obj->start_day . '</span>';
            $sReturn .= '    </div>';
            $sReturn .= '    <div class="desc">';
            $sReturn .= '        <p>';
            $sReturn .= '            <strong class="hed"><a href="' . $link . '">' . $obj->titre . '</a></strong>';
            if ($obj->allday == 0) {
                $sReturn .= '<span class="des">';
                $sReturn .= JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));

                if (JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format'])) != JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']))) {
                    $sReturn .= ' &ndash; ';
                    $sReturn .= JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                }
                $sReturn .= '</span>';
            }
            $sReturn .= '        </p>';
            $sReturn .= '    </div>';
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
if (!empty($showurl)) {
    if ($showurl) {
        $sReturn .= '   <p class="button9">';
        $sReturn .= "      <a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
        $sReturn .= '   </p>';
    }
}

$sReturn .= '</div>';
echo $sReturn;


