<?php

/**
 * @version   3.4 premium
 * @package   com_allevents
 * @copyright Copyright (C) 2009-2016. All rights reserved.
 * @license   GNU General Public License version 2 ou version superior; see LICENSE.txt
 * @author    elecoest (elecoest@gmail.com) - https://www.allevents3.com
 * @access    public
 */

require_once './pdfGenerator.php';
require_once './pdfWrapper.php';
require_once './tcpdf_ext.php';
$debug = false;
$error_handler = set_error_handler("PDFErrorHandler");

if (get_magic_quotes_gpc()) {
    $xmlString = stripslashes($_POST['mycoolxmlbody']);
} else {
    $xmlString = $_POST['mycoolxmlbody'];
}

if ($debug == true) {
    error_log($xmlString, 3, 'debug_' . date("Y_m_d__H_i_s") . '.xml');
}

$xmlString = urldecode($xmlString);
$xml = new SimpleXMLElement($xmlString, LIBXML_NOCDATA);

//$xml = new SimpleXMLElement($xmlString, LIBXML_NOCDATA);
$scPDF = new schedulerPDF();
$scPDF->printScheduler($xml);
/**
 * @param $errno
 * @param $errstr
 * @param $errfile
 * @param $errline
 */
function PDFErrorHandler($errno, $errstr, $errfile, $errline)
{
    global $xmlString;
    if ($errno < 1024) {
        echo $errstr . "<br>";
        error_log($xmlString, 3, 'error_report_' . date("Y_m_d__H_i_s") . '.xml');
        exit(1);
    }
}
