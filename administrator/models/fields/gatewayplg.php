<?php

defined('_JEXEC') or die;

jimport('joomla.form.formfield');

/**
 * JFormFieldGatewayplg
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldGatewayplg extends JFormField
{
    var $type = 'Gatewayplg';
    var $options;

    /**
     * JFormFieldGatewayplg::getInput()
     *
     * @return mixed|string
     */
    function getInput()
    {
        return $this->fetchElement($this->name, $this->value, $this->element, $this->options['control']);
    }

    /**
     * JFormFieldGatewayplg::fetchElement()
     *
     * @param mixed $name
     * @param mixed $value
     * @param mixed $node
     * @param mixed $control_name
     *
     * @return mixed
     */
    function fetchElement($name, $value, $node, $control_name)
    {
        $db = JFactory::getDbo();
        $condtion = [0 => '\'payment\''];
        $condtionatype = join(',', $condtion);
        $query = "SELECT extension_id as id,name,element,enabled as published FROM #__extensions WHERE folder in ($condtionatype) AND enabled=1";
        $db->setQuery($query);
        $gatewayplugin = $db->loadObjectList();

        $options = [];
        foreach ($gatewayplugin as $gateway) {
            $gatewayname = ucfirst(str_replace('plugpayment', '', $gateway->element));
            $options[] = JHtml::_('select.option', $gateway->element, $gatewayname);
        }

        $fieldName = $name;

        // return JHtml::_('select.genericlist', $options, $fieldName, 'class="inputbox required"  multiple="multiple" size="5"  ', 'value', 'text', $value, $control_name . $name);
        return JHtml::_('select.genericlist', $options, $fieldName, 'class="inputbox"  multiple="multiple" size="5"  ', 'value', 'text', $value, $control_name . $name);
    }
}