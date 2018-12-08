<?php

defined('_JEXEC') or die;

/**
 * AllEventsHelperDataTable
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelperDataTable
{
    /**
     * AllEventsHelperDataTable::GetExtendDataTable()
     *
     * @param mixed $params
     *
     * @return string
     */
    public static function GetExtendDataTable($params)
    {
        $sReturn = '';
        $sReturn .= '$.extend(jQuery.fn.dataTableExt.oSort, {';
        $sReturn .= '    "datetime-ae-pre": function (a) {';
        $sReturn .= '        var x;';
        $sReturn .= '        if ($.trim(a) != "") {';
        $sReturn .= '            var frDatea = $.trim(a).split(" "),    frDatea2="", frTimea="", day=0, month=0, year=0, hour=0, minute=0, ampm="";';

        switch ($params['gdate_format']) {
            case "d/m/Y":
                $sReturn .= 'frDatea2 = frDatea[0].split("/");';
                $sReturn .= 'day      = frDatea2[0];';
                $sReturn .= 'month    = frDatea2[1];';
                $sReturn .= 'year     = frDatea2[2];';
                break;
            case "d.m.Y":
                $sReturn .= 'frDatea2 = frDatea[0].split(".");';
                $sReturn .= 'day      = frDatea2[0];';
                $sReturn .= 'month    = frDatea2[1];';
                $sReturn .= 'year     = frDatea2[2];';
                break;
            case "m/d/Y":
                $sReturn .= 'frDatea2 = frDatea[0].split("/");';
                $sReturn .= 'month    = frDatea2[0];';
                $sReturn .= 'day      = frDatea2[1];';
                $sReturn .= 'year     = frDatea2[2];';
                break;
            case "Y-m-d":
                $sReturn .= 'frDatea2 = frDatea[0].split("-");';
                $sReturn .= 'year     = frDatea2[0];';
                $sReturn .= 'month    = frDatea2[1];';
                $sReturn .= 'day      = frDatea2[2];';
                break;
        }

        switch ($params['gtime_format']) {
            case "H:i":
                $sReturn .= "if (frDatea.length > 1) {";
                $sReturn .= "   frTimea = frDatea[1].split(':');";
                $sReturn .= "   hour    = frTimea[0];";
                $sReturn .= "   minute  = frTimea[1];";
                $sReturn .= "}\n";
                break;
            case "g:i a":
                $sReturn .= "if (frDatea.length > 1) {";
                $sReturn .= "   frTimea = frDatea[1].split(':');";
                $sReturn .= "   hour    = frTimea[0];";
                $sReturn .= "   minute  = frTimea[1];";
                $sReturn .= "   ampm    = 'PM';\n";
                $sReturn .= "}\n";
                break;
        }

        $sReturn .= '            if (ampm == "PM" && hour < 12) {';
        $sReturn .= '                hour = parseInt(hour, 10) + 12;';
        $sReturn .= '            }';
        $sReturn .= '            x = year * 100000000 + month * 1000000 + day * 10000 + hour * 100 + minute * 1;';
        $sReturn .= '        } else {';
        $sReturn .= '            x = 100000000000;';
        $sReturn .= '        }';
        $sReturn .= '        return x;';
        $sReturn .= '    },';
        $sReturn .= '    "datetime-ae-asc": function (a, b) {';
        $sReturn .= '        return a - b;';
        $sReturn .= '    },';
        $sReturn .= '    "datetime-ae-desc": function (a, b) {';
        $sReturn .= '        return b - a;';
        $sReturn .= '    }';
        $sReturn .= '});';

        return $sReturn;
    }
}

