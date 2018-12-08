<?php

/**
 * @version    SVN: <svn_id>
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2015 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

// no direct access
defined('_JEXEC') or die;
jimport('joomla.plugin.plugin');
require_once(JPATH_SITE . '/plugins/payment/adaptive_paypal/adaptive_paypal/helper.php');
$lang = JFactory::getLanguage();
$lang->load('plg_payment_adaptive_paypal', JPATH_ADMINISTRATOR);

/**
 * Class plgPaymentAdaptive_Paypal
 */
class plgPaymentAdaptive_Paypal extends JPlugin
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
     * plgPaymentAdaptive_Paypal constructor.
     *
     * @param object $subject
     * @param array $config
     */
    function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);


        //Set the language in the class
        //$config = JFactory::getConfig();

        //Define Payment Status codes in Paypal  And Respective Alias in Framework
        $this->responseStatus = [
            'COMPLETED' => 'C',
            'INCOMPLETE' => 'P',
            'PROCESSING' => 'P',
            'PENDING' => 'P',
            'CREATED' => 'P',
            'ERROR' => 'E',
            'DENIED' => 'D',
            'FAILED' => 'E',
            'PARTIALLY_REFUNDED' => 'RF',
            'REVERSALERROR' => 'CRV',
            'REFUNDED' => 'RF',
            'REVERSED' => 'RV'];

        $this->headers = [
            "X-PAYPAL-SECURITY-USERID:" . $this->params->get('apiuser'),
            "X-PAYPAL-SECURITY-PASSWORD:" . $this->params->get('apipass'),
            "X-PAYPAL-SECURITY-SIGNATURE:" . $this->params->get('apisign'),
            "X-PAYPAL-REQUEST-DATA-FORMAT:JSON",
            "X-PAYPAL-RESPONSE-DATA-FORMAT:JSON",
            "X-PAYPAL-APPLICATION-ID:" . $this->params->get('apiid')];

        $this->envelope = ["errorLanguage" => "en_US", "detailLevel" => "ReturnAll"];
        $plugin = JPluginHelper::getPlugin('payment', 'adaptive_paypal');
        $params = json_decode($plugin->params);
        $this->apiurl = $params->sandbox ? 'https://svcs.sandbox.paypal.com/AdaptivePayments/' : 'https://svcs.paypal.com/AdaptivePayments/';
        $this->paypalurl = $params->sandbox ? 'https://www.sandbox.paypal.com/websrc?cmd=_ap-payment&paykey=' : 'https://www.paypal.com/websrc?cmd=_ap-payment&paykey=';
    }

    /* Internal use functions */

    /**
     * @param $config
     *
     * @return null|stdClass
     */
    function onTP_GetInfo($config)
    {
        if (!in_array($this->_name, $config)) {
            return null;
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
        $plgPaymentAdaptivePaypalHelper = new plgPaymentAdaptivePaypalHelper();
        $vars->action_url = $plgPaymentAdaptivePaypalHelper->buildPaypalUrl();
        //Take this receiver email address from plugin if component not provided it
        if (empty($vars->business))
            $vars->business = $this->params->get('business');

        //if component does not provide cmd
        if (empty($vars->cmd))
            $vars->cmd = '_xclick';
        $html = $this->buildLayout($vars);

        return $html;
    }

    // Used to Build List of Payment Gateway in the respective Components

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

    //Constructs the Payment form in case of On Site Payment gateways like Auth.net & constructs the Submit button in case of offsite ones like Paypal

    /**
     * @param $layout
     *
     * @return string
     * @throws Exception
     */
    function buildLayoutPath($layout)
    {
        $app = JFactory::getApplication();
        if ($layout == 'recurring')
            $core_file = dirname(__file__) . '/' . $this->_name . '/tmpl/recurring.php';
        else
            $core_file = dirname(__file__) . '/' . $this->_name . '/tmpl/default.php';

        $override = JPATH_BASE . '/' . 'templates' . '/' . $app->getTemplate() . '/html/plugins/' . $this->_type . '/' . $this->_name . '/' . 'recurring.php';
        if (JFile::exists($override)) {
            return $override;
        } else {
            return $core_file;
        }
    }

    /**
     * @param $data
     * @param $vars
     */
    function onTP_ProcessSubmit($data, $vars)
    {
        //$adaptiveReceiverList = $vars->adaptiveReceiverList;
        //Take this receiver email address from plugin if component not provided it
        //$plgPaymentAdaptivePaypalHelper = new plgPaymentAdaptivePaypalHelper();
        //$receiver = array();
        $data = $this->getFormattedReceiver($vars->adaptiveReceiverList);
        $receiver = $data['receiver'];
        $receiverOptions = $data['receiverOptions'];
        //create the pay request
        $createPacket = [
            "actionType" => "PAY",
            "currencyCode" => $vars->currency_code,
            "receiverList" => ["receiver" => $receiverOptions],
            "returnUrl" => $vars->return,
            "cancelUrl" => $vars->cancel_return,
            "ipnNotificationUrl" => $vars->notify_url, //ipnNotificationUrl notifyUrl
            "trackingId" => $vars->order_id,
            "requestEnvelope" => $this->envelope,
            "feesPayer" => "PRIMARYRECEIVER"];

        // Send packet
        $response = $this->_paypalSend($createPacket, "Pay");

        //store packet log
        //@params packet response, component name, Item name
        $this->_StorelogBeforePayment($response, $vars->client, $vars->item_name);

        $paykey = $response['payKey'];
        //Set payment detials
        $detailsPacket = [
            "requestEnvelope" => $this->envelope,
            "payKey" => $response['payKey'],
            "receiverOptions" => $receiver];

        $this->_paypalSend($detailsPacket, "SetPaymentOptions");
        $this->getPaymentOptions($paykey);

        //$file = 'AdaptiveLog.txt';
        // The new person to add to the file
        //$person = json_encode($_REQUEST);
        //header to paypal
        header("Location:" . $this->paypalurl . $paykey);
    }

    /**Make plugin specific receiver format
     *
     * @param $receiverList
     *
     * @return mixed
     */
    function getFormattedReceiver($receiverList)
    {
        $receiver = [];
        $receiverOptions = [];

        foreach ($receiverList as $rec) {
            $temp['amount'] = round($rec['amount'], 2);
            $temp['email'] = $rec['receiver'];
            $temp['primary'] = $rec['primary'];
            $receiverOptions[] = $temp;
            $emails['email'] = $temp['email'];
            $r = [];
            $r['receiver'] = $emails;
            $receiver[] = $r;
        }

        $data['receiverOptions'] = $receiverOptions;
        $data['receiver'] = $receiver;

        return $data;
    }

    /**
     * @param $data
     * @param $call
     *
     * @return mixed
     */
    function _paypalSend($data, $call)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiurl . $call);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        return json_decode(curl_exec($ch), true);
    }

    /**
     * @param $data
     * @param $client
     * @param $item_name
     */
    function _StorelogBeforePayment($data, $client, $item_name)
    {
        plgPaymentAdaptivePaypalHelper::StorelogBeforePayment($this->_name, $data, $client, $item_name);
    }

    /**
     * @param $paykey
     *
     * @return mixed
     */
    function getPaymentOptions($paykey)
    {
        $packet = ["requestEnvelope" => $this->envelope, "payKey" => $paykey];

        return $this->_paypalSend($packet, "GetPaymentOptions");
    }

    /**
     * @param $data
     *
     * @return array
     */
    function onTP_Processpayment($data)
    {
        /*$verify = plgPaymentAdaptivePaypalHelper::validateIPN($data);
        if (!$verify) { return false; }
        */
        $payment_status = $this->translateResponse($data['status']);
        $paymentDetails = $this->getTransactionDetails($data);

        $primaryReceiver = 0;

        // Get primary receiver
        if (!empty($paymentDetails['paymentInfoList']['paymentInfo'])) {
            // For each receiver.
            foreach ($paymentDetails['paymentInfoList']['paymentInfo'] as $recIndex => $rec) {
                if ($rec['receiver']['primary'] == 'true') {
                    $primaryReceiver = $recIndex;
                    break;
                }

            }
        }

        $result = [
            'order_id' => $data['tracking_id'],
            'transaction_id' => $data['pay_key'],
            'action_type' => $data['action_type'],
            'status' => $payment_status,
            'txn_type' => $data['transaction_type'],
            'total_paid_amt' => $paymentDetails['paymentInfoList']['paymentInfo'][$primaryReceiver]['receiver']['amount'],
            'raw_data' => $paymentDetails,
            'error' => $paymentDetails,
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
                if (isset($key)) {
                    if (isset($payment_status)) {
                        if ($payment_status == $key) {
                            return $value;
                        }
                    }
                }
            }
        }

        return null;
    }

    //Wrapper for getting payment details

    /**
     * @param $data
     *
     * @return mixed
     */
    function getTransactionDetails($data)
    {
        $detailsPacket = ["payKey" => $data['pay_key'], "requestEnvelope" => $this->envelope];

        $res = $this->_paypalSend($detailsPacket, 'PaymentDetails');

        return $res;
    }

    //get the complete transaction details

    /**
     * Store log
     *
     * @param   array $data data.
     *
     * @since   2.2
     * @return  void.
     */
    function onTP_Storelog($data)
    {
        $log_write = $this->params->get('log_write', '0');

        if ($log_write == 1) {
            plgPaymentAdaptivePaypalHelper::Storelog($this->_name, $data);
        }

    }
}
