<?php

/**
 * @copyright  Copyright (c) 2009-2013 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2, or later
 */
defined('_JEXEC') or die;
jimport('joomla.html.html');
jimport('joomla.plugin.helper');

/**
 * Class plgPaymentPaypalproHelper
 */
class plgPaymentPaypalproHelper
{

    //gets the paypal URL
    /**
     * @param bool $secure
     *
     * @return string
     */
    function buildpaypalproUrl($secure = true)
    {
        $plugin = JPluginHelper::getPlugin('payment', 'paypalpro');
        $params = json_decode($plugin->params);
        $url = $params->sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';

        //        $url = $this->params->get('sandbox') ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
        return $url;

    }

    /**
     * Store log
     *
     * @param         $name
     * @param   array $logdata data.
     *
     * @return void .
     * @internal param string $data data.
     * @since    1.0
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

        //    $logs = &JLog::getInstance($logdata['JT_CLIENT'].'_'.$name.'.log',$options,$path);
        //  $logs->addEntry(array('user' => $my->name.'('.$my->id.')','desc'=>json_encode($logdata['raw_data'])));
    }
}
