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

$sReturn = '<div id="mod_aelist10" class="' . $moduleclass_sfx . '">';

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
            $sReturn .= '<div class="dropdown">';
            $sReturn .= '    <span style="background-color: ' . $couleur_texte . ';color: ' . $couleur_fond . ';" class="label">' . $entite_titre . '</span>&nbsp;';
            if ($obj->allday == 1) {
                $sReturn .= JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdate_format']));
            } else {
                $sReturn .= JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdatetime_format']));
            }
            $sReturn .= '    <br>';
            $sReturn .= '    <div class="">';
            $sReturn .= '        <a class="title-event" id="' . $obj->id . '" href="#" data-toggle="dropdown">' . $obj->titre . '</a>';
            $sReturn .= '        <ul aria-labelledby="" role="menu" class="dropdown-menu">';
            if ($obj->allday == 1) {
                $sReturn .= '<li><span class="label label-warning">' . JText::_('MOD_AELIST_DATE', true) . '</span>&nbsp;' . JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdate_format'])) . '</li>';
                $sReturn .= '<li><span class="label label-warning">' . JText::_('MOD_AELIST_ENDDATE', true) . '</span>&nbsp;' . JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gdate_format'])) . '</li>';
            } else {
                $sReturn .= '<li><span class="label label-warning">' . JText::_('MOD_AELIST_DATE', true) . '</span>&nbsp;' . JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdatetime_format'])) . '</li>';
                $sReturn .= '<li><span class="label label-warning">' . JText::_('MOD_AELIST_ENDDATE', true) . '</span>&nbsp;' . JHtml::_('date', $obj->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gdatetime_format'])) . '</li>';
            }
            $sReturn .= '            <li><span class="label label-default">' . JText::_('MOD_AELIST_PLACE', true) . '</span>&nbsp;' . $obj->place_titre . '</li>';
            $sReturn .= '        </ul>';
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

$sReturn .= '</div>';
echo $sReturn;