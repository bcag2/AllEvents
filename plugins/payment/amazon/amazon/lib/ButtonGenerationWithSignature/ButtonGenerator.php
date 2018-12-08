<?php
defined('_JEXEC') or die(';)');
/**
 *  PHP Version 5
 *
 * @category    Amazon
 * @package     Amazon_FPS
 * @copyright   Copyright 2008-2010 Amazon Technologies, Inc.
 * @link        http://aws.amazon.com
 * @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 * @version     2008-09-17
 */

require_once 'SignatureUtils.php';

/**
 * Class ButtonGenerator
 */
class ButtonGenerator
{
    const SIGNATURE_KEYNAME = "signature";
    const SIGNATURE_METHOD_KEYNAME = "signatureMethod";
    const SIGNATURE_VERSION_KEYNAME = "signatureVersion";
    const HMAC_SHA1_ALGORITHM = "HmacSHA1";
    const HMAC_SHA256_ALGORITHM = "HmacSHA256";
    const SIGNATURE_VERSION = "2";
    const COBRANDING_STYLE = "logo";
    public static $SANDBOX_END_POINT = "https://authorize.payments-sandbox.amazon.com/pba/paypipeline";
    public static $SANDBOX_IMAGE_LOCATION = "https://authorize.payments-sandbox.amazon.com/pba/images/payNowButton.png";
    public static $PROD_END_POINT = "https://authorize.payments.amazon.com/pba/paypipeline";
    public static $PROD_IMAGE_LOCATION = "https://authorize.payments.amazon.com/pba/images/payNowButton.png";
    private static $httpMethod = "POST";

    /**
     * Creates a form from the provided key-value pairs
     *
     * @param array $formHiddenInputs
     * @param       $endPoint
     * @param       $imageLocation
     *
     * @return string - An html form created using the key-value pairs
     * @internal param $formHiddenInputs - A map of key of key-value pair for all non null parameters
     * @internal param $serviceEndPoint - The Endpoint to be used based on environment selected
     * @internal param $imageLocation - The imagelocation based on environment
     */
    public static function getSimplePayStandardForm(array $formHiddenInputs, $endPoint, $imageLocation)
    {

        $form = "";
        $form .= "<form action=\"";
        $form .= $endPoint;
        $form .= "\" method=\"";
        $form .= self::$httpMethod . "\">\n";
        $form .= "<input type=\"image\" src=\"" . $imageLocation . "\" border=\"0\">\n";

        foreach ($formHiddenInputs as $name => $value) {
            $form .= "<input type=\"hidden\" name=\"$name";
            $form .= "\" value=\"$value";
            $form .= "\" >\n";
        }
        $form .= "</form>\n";

        return $form;
    }

    /**
     * Function Generates the html form
     *
     * @param $accessKey
     * @param $secretKey
     * @param $amount
     * @param $description
     * @param $referenceId
     * @param $immediateReturn
     * @param $returnUrl
     * @param $abandonUrl
     * @param $processImmediate
     * @param $ipnUrl
     * @param $collectShippingAddress
     * @param $signatureMethod
     * @param $environment
     *
     * @return array - A map of key of key-value pair for all non null parameters
     * @throws Exception
     * @internal param $accessKey - Put your Access Key here
     * @internal param $secretKey - Put your secret Key here
     * @internal param $amount - Enter the amount you want to collect for the ite
     * @internal param $description - description - Enter a description of the item
     * @internal param $referenceId - Optionally enter an ID that uniquely identifies this transaction for your records
     * @internal param $abandonUrl - Optionally, enter the URL where senders should be redirected if they cancel their transaction
     * @internal param $returnUrl - Optionally enter the URL where buyers should be redirected after they complete the transaction
     * @internal param $immediateReturn - Optionally, enter "1" if you want to skip the final status page in Amazon Payments,
     * @internal param $processImmediate - Optionally, enter "1" if you want to settle the transaction immediately else "0". Default value is "1"
     * @internal param $ipnUrl - Optionally, type the URL of your host page to which Amazon Payments should send the IPN transaction information.
     * @internal param $collectShippingAddress - Optionally, enter "1" if you want Amazon Payments to return the buyer's shipping address as part of the transaction information
     * @internal param $signatureMethod - Valid values are  HmacSHA256 and HmacSHA1
     * @internal param $environment - Sets the environment where your form will point to can be "sandbox" or "prod"
     */

    public static function GenerateForm($accessKey, $secretKey, $amount, $description, $referenceId, $immediateReturn,
                                        $returnUrl, $abandonUrl, $processImmediate, $ipnUrl, $collectShippingAddress,
                                        $signatureMethod, $environment)
    {
        if ($environment == "prod") {
            $endPoint = self::$PROD_END_POINT;
            //$imageLocation = self::$PROD_IMAGE_LOCATION;
        } else {
            $endPoint = self::$SANDBOX_END_POINT;
            //$imageLocation = self::$SANDBOX_IMAGE_LOCATION;
        }

        $params = self::getSimplePayStandardParams($accessKey, $amount, $description, $referenceId, $immediateReturn,
            $returnUrl, $abandonUrl, $processImmediate, $ipnUrl, $collectShippingAddress, $signatureMethod);

        $serviceEndPoint = parse_url($endPoint);
        $signature = SignatureUtils::signParameters($params, $secretKey,
            self::$httpMethod, $serviceEndPoint['host'], $serviceEndPoint['path'], $signatureMethod);
        $params[self::SIGNATURE_KEYNAME] = $signature;
        $simplePayForm = [];
        $simplePayForm['params'] = $params;
        $simplePayForm['endPoint'] = $endPoint;
        $simplePayForm['httpmethod'] = self::$httpMethod;

        return $simplePayForm;
        //$simplePayForm = self::getSimplePayStandardForm($params,$endPoint,$imageLocation);
        //print $simplePayForm . "\n";
    }

    /**
     * Function creates a Map of key-value pairs for all valid values passed to the function
     *
     * @param $accessKey
     * @param $amount
     * @param $description
     * @param $referenceId
     * @param $immediateReturn
     * @param $returnUrl
     * @param $abandonUrl
     * @param $processImmediate
     * @param $ipnUrl
     * @param $collectShippingAddress
     * @param $signatureMethod
     *
     * @return array - A map of key of key-value pair for all non null parameters
     * @throws Exception
     * @internal param $accessKey - Put your Access Key here
     * @internal param $amount - Enter the amount you want to collect for the item
     * @internal param $description - description - Enter a description of the item
     * @internal param $referenceId - Optionally enter an ID that uniquely identifies this transaction for your records
     * @internal param $abandonUrl - Optionally, enter the URL where senders should be redirected if they cancel their transaction
     * @internal param $returnUrl - Optionally enter the URL where buyers should be redirected after they complete the transaction
     * @internal param $immediateReturn - Optionally, enter "1" if you want to skip the final status page in Amazon Payments,
     * @internal param $processImmediate - Optionally, enter "1" if you want to settle the transaction immediately else "0". Default value is "1"
     * @internal param $ipnUrl - Optionally, type the URL of your host page to which Amazon Payments should send the IPN transaction information.
     * @internal param $collectShippingAddress - Optionally, enter "1" if you want Amazon Payments to return the buyer's shipping address as part of the transaction information.
     * @internal param $signatureMethod - Valid values are  HmacSHA256 and HmacSHA1
     */

    public static function getSimplePayStandardParams($accessKey, $amount, $description, $referenceId, $immediateReturn,
                                                      $returnUrl, $abandonUrl, $processImmediate, $ipnUrl, $collectShippingAddress,
                                                      $signatureMethod)
    {
        $cobrandingStyle = self::COBRANDING_STYLE;
        $formHiddenInputs = [];
        if ($accessKey != null) $formHiddenInputs["accessKey"] = $accessKey;
        else throw new Exception("Accesskey is Required");
        if ($amount != null) $formHiddenInputs["amount"] = $amount;
        else throw new Exception("Amount is required");
        if ($description != null) $formHiddenInputs["description"] = $description;
        else throw new Exception("Description is required");
        if ($signatureMethod != null) $formHiddenInputs[self::SIGNATURE_METHOD_KEYNAME] = $signatureMethod;
        else throw new Exception("Signature Method is required");

        if ($referenceId != null) $formHiddenInputs["referenceId"] = $referenceId;
        if ($immediateReturn != null) $formHiddenInputs["immediateReturn"] = $immediateReturn;
        if ($returnUrl != null) $formHiddenInputs["returnUrl"] = $returnUrl;
        if ($abandonUrl != null) $formHiddenInputs["abandonUrl"] = $abandonUrl;
        if ($processImmediate != null) $formHiddenInputs["processImmediate"] = $processImmediate;
        if ($ipnUrl != null) $formHiddenInputs["ipnUrl"] = $ipnUrl;
        if ($cobrandingStyle != null) $formHiddenInputs["cobrandingStyle"] = $cobrandingStyle;
        if ($collectShippingAddress != null) $formHiddenInputs["collectShippingAddress"] = $collectShippingAddress;

        $formHiddenInputs[self::SIGNATURE_VERSION_KEYNAME] = self::SIGNATURE_VERSION;

        return $formHiddenInputs;
    }
}
