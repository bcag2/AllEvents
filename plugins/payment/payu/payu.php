<?php

/**
 * @copyright  Copyright (c) 2009-2013 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2, or later
 */
// no direct access
defined('_JEXEC') or die;
jimport('joomla.plugin.plugin');
require_once(JPATH_SITE . '/plugins/payment/payu/payu/helper.php');

$lang = JFactory::getLanguage();
$lang->load('plg_payment_payu', JPATH_ADMINISTRATOR);

/**
 * Class plgPaymentPayu
 */
class plgPaymentPayu extends JPlugin
{

    /**
     * Constructor
     *
     * @param   object &$subject The object to observe
     * @param   array $config An optional associative array of configuration settings.
     *                             Recognized key values include 'name', 'group', 'params', 'language'
     *                             (this list is not meant to be comprehensive).
     *
     * @since   1.5
     */
    /**
     * plgPaymentPayu constructor.
     *
     * @param object $subject
     * @param array $config
     */
    function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        //Set the language in the class
        //$config = JFactory::getConfig();


        //Define Payment Status codes in payu  And Respective Alias in Framework
        $this->responseStatus = [
            'success' => 'C',
            'pending' => 'P',
            'failure' => 'E'];
    }

    /* Internal use functions */

    /**
     * @param $config
     *
     * @return bool|stdClass
     */
    function onTP_GetInfo($config)
    {

        if (!in_array($this->_name, $config)) {
            return false;
        }
        $obj = new stdClass;
        $obj->name = $this->params->get('plugin_name');
        $obj->id = $this->_name;

        return $obj;
    }

    //Builds the layout to be shown, along with hidden fields.

    /**
     * @param $vars
     *
     * @return string
     */
    function onTP_GetHTML($vars)
    {
        $plgPaymentPayuHelper = new plgPaymentPayuHelper();
        $vars->action_url = $plgPaymentPayuHelper->buildPayuUrl();
        //Take this receiver email address from plugin if component not provided it
        //        if(empty($vars->business))

        $vars->key = $this->params->get('key');
        $vars->salt = $this->params->get('salt');
        $this->preFormatingData($vars); // fomating on data
        $html = $this->buildLayout($vars);

        return $html;
    }

    // Used to Build List of Payment Gateway in the respective Components

    /**
     * @param $vars
     */
    function preFormatingData($vars)
    {

        foreach ($vars as $key => $value) {
            if (!is_array($value)) {
                $vars->$key = trim($value);
                if ($key == 'amount')
                    $vars->$key = ceil($value);
            }
        }
    }

    //Constructs the Payment form in case of On Site Payment gateways like Auth.net & constructs the Submit button in case of offsite ones like Payu

    /**
     * @param        $vars
     * @param string $layout
     *
     * @return string
     * @throws Exception
     */
    function buildLayout($vars, $layout = 'default')
    {
        // Load the layout & push variables
        ob_start();
        $layout = $this->buildLayoutPath($layout);
        include($layout);
        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }

    /**
     * @param $layout
     *
     * @return string
     * @throws Exception
     */
    function buildLayoutPath($layout)
    {
        $app = JFactory::getApplication();
        $core_file = dirname(__file__) . '/' . $this->_name . '/tmpl/default.php';
        $override = JPATH_BASE . '/' . 'templates' . '/' . $app->getTemplate() . '/html/plugins/' . $this->_type . '/' . $this->_name . '/' . $layout . '.php';
        if (JFile::exists($override)) {
            return $override;
        } else {
            return $core_file;
        }
    }

    /**
     * @param       $data
     * @param array $vars
     *
     * @return array
     */
    function onTP_Processpayment($data, $vars = [])
    {
        //$verify = plgPaymentPayuHelper::validateIPN($data);
        //if (!$verify) { return false; }
        $isValid = true;
        $error = [];
        $error['code'] = '';
        $error['desc'] = '';

        //.compare response order id and send order id in notify URL

        if ($isValid) {
            $res_orderid = $data['udf1'];
            if (!empty($vars) && $res_orderid != $vars->order_id) {
                $isValid = false;
                $error['desc'] = "ORDER_MISMATCH" . "Invalid ORDERID; notify order_is " . $vars->order_id . ", and response " . $res_orderid;
            }
        }

        // amount check
        if ($isValid) {
            if (!empty($vars)) {
                // Check that the amount is correct
                $order_amount = (float)$vars->amount;
                $retrunamount = (float)$data['amount'];
                $epsilon = 0.01;

                if (($order_amount - $retrunamount) > $epsilon) {
                    $data['status'] = 'failure'; // change response status to ERROR FOR AMOUNT ONLY
                    //$isValid = false;
                    $error['desc'] = "ORDER_AMOUNT_MISTMATCH - order amount= " . $order_amount . ' response order amount = ' . $retrunamount;
                }
            }
        }
        $data['status'] = $this->translateResponse($data['status']);

        //Error Handling
        $error = [];
        $error['code'] = $data['unmappedstatus']; //@TODO change these $data indexes afterwards
        $error['desc'] = (isset($data['field9']) ? $data['field9'] : '');

        $result = [
            'order_id' => $data['udf1'],
            'transaction_id' => $data['mihpayid'],
            'buyer_email' => $data['email'],
            'status' => $data['status'],
            'txn_type' => $data['mode'],
            'total_paid_amt' => $data['amount'],
            'raw_data' => $data,
            'error' => $error,
        ];

        return $result;
    }

    /**
     * @param $payment_status
     *
     * @return mixed|null
     */
    function translateResponse($payment_status)
    {
        if (!empty($this->responseStatus)) {
            foreach ($this->responseStatus as $key => $value) {
                if ($key == $payment_status) {
                    return $value;
                }
            }
        }

        return null;
    }

    /*
    @params $vars :: object
    @return $vars :: formatted object
    */

    /**
     * Store log
     *
     * @param   array $data data.
     *
     * @return void .
     * @since   2.2
     */
    function onTP_Storelog($data)
    {
        $log_write = $this->params->get('log_write', '0');

        if ($log_write == 1) {
            $plgPaymentPayuHelper = new plgPaymentPayuHelper;
            $plgPaymentPayuHelper->Storelog($this->_name, $data);
        }
    }

}
