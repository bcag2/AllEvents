<?php

defined('_JEXEC') or die;
jimport('joomla.html.html');
jimport('joomla.plugin.helper');

/**
 * Class plgPaymentOgoneHelper
 */
class plgPaymentOgoneHelper
{

    //gets the ogone URL
    /**
     * @param bool $secure
     */
    function buildOgoneUrl($secure = true)
    {


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
    }

    /**
     * @param $data
     *
     * @return bool
     */
    function validateIPN($data)
    {
        $plugin = JPluginHelper::getPlugin('payment', 'ogone');
        $params = json_decode($plugin->params);

        require_once(JPATH_SITE . '/plugins/payment/ogone/ogone/lib/Response.php');
        $options = ['sha1OutPassPhrase' => $params->secretkey,];

        // Define array of values returned by Ogone
        // Parameters are validated and filtered automatically
        // so it is safe to specify a superglobal variable
        // like $_POST or $_GET if you don't want to
        // specify all parameters manually
        $params = $data;
        // Instantiate response
        $response = new Ogone_Response($options, $params);
        // Check if response by Ogone is valid
        // The SHA1Sign is calculated automatically and
        // verified with the SHA1Sign provided by Ogone
        if (!$response->isValid()) {
            return false;
        }

        return true;

    }
}

