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

$sReturn = "";
if (!empty($showtitle)) {
    if ($showtitle) {
        $sReturn .= '<' . $header_tag . '>' . JText::_('MOD_AELIST_TITLE', true) . '</$header_tag>';
    }
}

if (!empty($items)) {
    if (!empty($items)) {
        $oldevent = null;
        $sReturn .= '<div class="mod_aelist14 ' . $moduleclass_sfx . '">';
        $sReturn .= '    <table class="table table-condensed table-bordered">';
        $sReturn .= '        <thead>';
        $sReturn .= '            <tr>';
        $sReturn .= '                <th>' . JText::_('DATE', true) . '</th>';
        $sReturn .= '                <th>' . JText::_('TIME', true) . '</th>';
        $sReturn .= '                <th>' . JText::_('EVENT', true) . '</th>';
        $sReturn .= '            </tr>';
        $sReturn .= '        </thead>';
        $sReturn .= '        <tbody>';

        foreach ($items as $event) {
            $event->link = modAEListHelper::getLink($event, $Itemid, $gparams['gforcenomenuitem']);
            $event->start_year = (int)JHtml::_('date', $event->date, "Y");
            $event->start_month = (int)JHtml::_('date', $event->date, "m");
            $event->start_day = (int)JHtml::_('date', $event->date, "d");
            $event->start_dayinweek = strtoupper(JHtml::_('date', $event->date, "l"));
            $event->rowspan = 0;
        }

        for ($i = 0; $i < count($items); ++$i) {
            $event = $items[$i];
            for ($j = $i; $j < count($items); ++$j) {
                $nextevent = $items[$j];
                if (($nextevent->start_year == $event->start_year) && ($nextevent->start_month == $event->start_month) && ($nextevent->start_day == $event->start_day)) {
                    $event->rowspan++;
                }
            }
        }

        for ($i = 0; $i < count($items); ++$i) {
            $event = $items[$i];
            $nextevent = isset($items[$i + 1]) ? $items[$i + 1] : null;

            // on évite le bug de la date où tout est égal à 0
            if ((int)JHtml::_('date', $event->date, "m") > 0) {
                // date
                if (empty($oldevent) || ($oldevent->start_year != $event->start_year) || ($oldevent->start_month != $event->start_month) || ($oldevent->start_day != $event->start_day)) {
                    $sReturn .= '<tr>';
                    $sReturn .= '    <td class="mod_aelist14-date" class="active" rowspan="' . $event->rowspan . '">';
                    $sReturn .= '        <div class="dayofmonth">' . $event->start_day . '</div>';
                    $sReturn .= '        <div class="dayofweek">' . JText::_($event->start_dayinweek, true) . '</div>';
                    $sReturn .= '        <div class="shortdate text-muted">' . $arrMonthNames[$event->start_month - 1] . ', ' . $event->start_year . '</div>';
                    $sReturn .= '    </td>';
                } elseif (($oldevent->start_year == $event->start_year) && ($oldevent->start_month == $event->start_month) && ($oldevent->start_day == $event->start_day)) {
                    $sReturn .= '<tr>';
                }
                //time
                $sReturn .= '<td class="mod_aelist14-time">';
                if ($event->allday == 0) {
                    $sReturn .= JHtml::_('date', $event->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                    if (JHtml::_('date', $event->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format'])) != JHtml::_('date', $event->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']))) {
                        $sReturn .= ' &ndash; ';
                        $sReturn .= JHtml::_('date', $event->myenddatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format']));
                    }
                }
                $sReturn .= '</td>';
                $sReturn .= '<td class="mod_aelist14-events">';
                $sReturn .= '    <div class="mod_aelist14-event">';
                $sReturn .= '        <i class="glyphicon glyphicon-repeat text-muted" title="Repeating event"></i>' . '<a href="' . $event->link . '" class="">' . $event->titre . '</a>';
                $sReturn .= '    </div>';
                $sReturn .= '</td>';
                //end event
                if (!empty($nextevent) && (($nextevent->start_year != $event->start_year) || ($nextevent->start_month != $event->start_month) || ($nextevent->start_day != $event->start_day))) {
                    $sReturn .= '</tr>';
                } elseif (empty($nextevent)) {
                    $sReturn .= '</tr>';
                }
                $oldevent = $event;
            }
        }
        $sReturn .= '        </tbody>';
        $sReturn .= '    </table>';
        $sReturn .= '</div>';
    } else {
        if ($shownoevent) {
            $sReturn .= JText::_('MOD_AELIST_NO_EVENT', true);
        }
    }
}

if (!empty($showurl)) {
    if ($showurl) {
        $sReturn .= "<p class='button9'>";
        $sReturn .= "    <a href='" . $url . "'>" . JText::_('MOD_AELIST_TITLELINK', true) . "</a>";
        $sReturn .= "</p>";
    }
}

echo $sReturn;


