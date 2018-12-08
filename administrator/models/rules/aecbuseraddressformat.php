<?php

/**
 * JFormRuleAECBUserAddressFormat
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;
require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/aecbuseraddressparser.php';

/**
 * Check Community Builder address format
 */
class JFormRuleAECBUserAddressFormat extends JFormRule
{
    /**
     * Method to test the value.
     *
     * @param SimpleXMLElement $element
     *            The SimpleXMLElement object representing the `<field>` tag for the form field object.
     * @param mixed $value
     *            The form field value to validate.
     * @param string $group
     *            The field name group control value. This acts as as an array container for the field.
     *            For example if the field has name="foo" and the group value is set to "bar" then the
     *            full field name would end up being "bar[foo]".
     * @param JRegistry|Registry $input
     *            An optional Registry object with the entire data set to validate against the entire form.
     * @param JForm $form
     *            The form object for which the field is being tested.
     *
     * @return bool True if the value is valid, false otherwise.
     *
     * @since 11.1
     */
    public function test(SimpleXMLElement $element, $value, $group = null, JRegistry $input = null, JForm $form = null)
    {
        // #€#
        $component = 'com_comprofiler';
        $component_enabled = JComponentHelper::isInstalled($component) && JComponentHelper::isEnabled($component);
        $showcbusers_field_name = $field_name = (empty($group) ? '' : $group . '.') . 'controlpanel_showcbusers';
        if ($component_enabled && $input->get($showcbusers_field_name)) {
            $field_name = (empty($group) ? '' : $group . '.') . $element['name'];
            if ($input->get($field_name)) {
                $parser = new AECBUserAddressParser();
                if ($parser->parseString($value)) {
                    return true;
                } else {
                    $element->addAttribute('message', $parser->getMessage());

                    return false;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
        // #€#
    }
}
