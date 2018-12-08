<?php
defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAECBField
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/aecbfields.php';

/**
 * Class JFormFieldAECBField
 */
class JFormFieldAECBField extends JFormFieldList
{
    public $type = 'AECBField';

    /**
     * JFormFieldAECBField::getOptions() provides the options for the select
     *
     * @return array
     */
    protected function getOptions()
    {
        $options = parent::getOptions();

        // #€#
        $component = 'com_comprofiler';
        $component_enabled = JComponentHelper::isInstalled($component) && JComponentHelper::isEnabled($component);
        if ($component_enabled) {

            // Retrieve CB fields types (or all types if not defined)
            if (is_null($this->element['cb_types'])) {
                $cb_types = '';
            } else {
                $cb_types = (string)$this->element['cb_types'];
            }

            // Get CB fields
            $cb_fields = AECBFields::getInstance()->getFieldsByTypes($cb_types, 0, 3);

            foreach ($cb_fields as $cb_field) {
                $option = new stdClass();
                $option->checked = false;
                $option->class = '';
                $option->disable = false;
                $option->selected = false;
                $option->text = $cb_field['title_translated'];
                $option->value = $cb_field['fieldid'];
                $options[] = $option;
            }
        }

        // #€#

        return $options;
    }
}
