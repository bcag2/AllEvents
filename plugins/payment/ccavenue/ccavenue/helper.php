<?php

/**
 * @copyright  Copyright (c) 2009-2013 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2, or later
 */
defined('_JEXEC') or die;
jimport('joomla.html.html');
jimport('joomla.plugin.helper');

/**
 * Class plgPaymentCcavenueHelper
 */
class plgPaymentCcavenueHelper
{
    /**
     * @param bool $secure
     *
     * @return string
     */
    function buildCcavenueUrl($secure = true)
    {
        $url = $this->params->get('sandbox') ? 'test.payu.in/_payment' : 'secure.payu.in/_payment';
        if ($secure) {
            $url = 'https://www.ccavenue.com/shopzone/cc_details.jsp';
        }

        return $url;
    }


    /**
     * @param $name
     * @param $logdata
     */
    function Storelog($name, $logdata)
    {
        jimport('joomla.error.log');
        $options = "{DATE}\t{TIME}\t{USER}\t{DESC}";

        $my = JFactory::getUser();

        JLog::addLogger(['text_file' => $logdata['JT_CLIENT'] . '_' . $name . '.log', 'text_entry_format' => $options], JLog::INFO, $logdata['JT_CLIENT']);

        $logEntry = new JLogEntry('Transaction added', JLog::INFO, $logdata['JT_CLIENT']);
        $logEntry->user = $my->name . '(' . $my->id . ')';
        $logEntry->desc = json_encode($logdata['raw_data']);

        JLog::add($logEntry);
        //        $logs = &JLog::getInstance($logdata['JT_CLIENT'].'_'.$name.'.log',$options,$path);
        //        $logs->addEntry(array('user' => $my->name.'('.$my->id.')','desc'=>json_encode($logdata['raw_data'])));

    }

}
