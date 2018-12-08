<?php

defined('JPATH_BASE') or die('Restricted access');
jimport('joomla.form.formfield');

/**
 * Class JFormFieldLogfile
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldLogfile extends JFormField
{
    /**
     * The form field type.
     *
     * @var        string
     * @since    1.6
     */
    public $type = 'Logfile';

    /**
     * Method to get the field input markup.
     *
     * TODO: Add access check.
     *
     * @return    string    The field input markup.
     * @since    1.6
     */

    protected function getInput()
    {
        $hint = $this->hint;

        $logFilePath = JRoute::_(JUri::root(true) . 'plugins/payment/adaptive_paypal/adaptive_paypal/logBeforePayment_' . $hint . '.log');
        $return = '<div style="clear:both"><a href="' . $logFilePath . '">' . $hint . 'log file</a> <br></div>';

        return $return;
    }
}
