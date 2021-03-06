<?php
/**
 * @copyright  Copyright (c) 2009-2013 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2, or later
 */

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die('Restricted access');

/**
 * Class JFormFieldAupfilesjticketing
 */
class JFormFieldAupfilesjticketing extends JFormField
{
    /**
     * The form field type.
     *
     * @var        string
     * @since    1.6
     */
    public $type = 'Aupfilesjticketing';

    /**
     * Method to get the field input markup.
     *
     * TODO: Add access check.
     *
     * @return    void    The field input markup.
     * @since    1.6
     */

    protected function getInput()
    {
        if ($this->id == 'jform_params_aupfilesjticketing') {
            echo '<div style="float:left"><a href="' . JUri::root() . 'plugins/payment/alphauserpoints/alphauserpoints/jticketing_aup.zip"> ' . JText::_('AUP_CLK') . '</a><span> ' . JText::_('AUP_INST') . ' </span><a href="' . JUri::base() . 'index.php?option=com_alphauserpoints&task=plugins" target="_blank">' . JText::_('HERE') . '</a>
                        <a href="http://techjoomla.com/documentation-for-jticketing/configuring-payment-plugins-for-jticketing.html" target="_blank">' . JText::_('CLK_DOC') . '</a></div>';
        }
    } //function
}

