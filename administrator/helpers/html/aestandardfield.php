<?php

/**
 * AEStandardField
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

/**
 * Generate html code for fields with showon attribute
 */
class AEStandardField
{
    protected $form;
    protected $field;
    protected $field_name;
    protected $label_field = null;
    protected $label_field_name = null;
    protected $showonstring = null;

    /**
     * AEStandardField::__construct()
     *
     * @param
     *            $form
     * @param
     *            $field_name
     * @param
     *            $group
     * @param
     *            $value
     */
    public function __construct($form, $field_name, $group = null, $value = null)
    {
        $this->form = $form;
        $this->field = $form->getField($field_name, $group, $value);
        $this->field_name = $this->field->formControl . '_' . (isset($this->field->group) ? $this->field->group . '_' : '') .
            $this->field->fieldname;
        $this->showonstring = $this->field->getAttribute('showon');
    }

    /**
     * AEStandardField::setLabelField()
     *
     * @param
     *            $field_name
     * @param
     *            $group
     */
    public function setLabelField($field_name, $group = null)
    {
        $this->label_field = $this->form->getField($field_name, $group);
        $this->label_field_name = $this->label_field->formControl . '_' .
            (isset($this->label_field->group) ? $this->label_field->group . '_' : '') . $this->label_field->fieldname;
    }

    /**
     * AEStandardField::get()
     *
     * @param unknown $name
     *
     * @return
     */
    public function get($name)
    {
        return $this->field->$name;
    }

    /**
     * AEStandardField::set()
     *
     * @param unknown $name
     * @param unknown $value
     */
    public function set($name, $value)
    {
        $this->field->$name = $value;
    }

    /**
     * AEStandardField::getHtml()
     *
     * @return string
     */
    public function getHtml()
    {
        if (isset($this->label_field)) {
            $script = [];
            $script[] = 'jQuery.noConflict();';
            $script[] = 'jQuery(document).ready(function() {';
            $script[] = '    jQuery("#' . $this->label_field_name . '").change(function(event) {';
            $script[] = '        jQuery("#' . $this->field_name . '-lbl").text(jQuery("#' . $this->label_field_name . '").val());';
            $script[] = '    });';
            $script[] = '});';

            JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));
        }

        if ($this->showonstring) {
            if (version_compare(JVERSION, '3.5.0', '<')) {
                // For Joomla up to 3.4.x
                $id = $this->form->getFormControl();
                $showon = explode(':', $this->showonstring, 2);
                $class = 'showon_' . implode(' showon_', explode(',', $showon[1]));
                $rel = 'rel="showon_' . $id . '[' . $showon[0] . ']"';
                $html = '<div class="control-group ' . $class . '" ' . $rel . '> ';
            } else {
                // For Joomla 3.5.0 or newer
                foreach (preg_split('%\[AND\]|\[OR\]%', $this->showonstring) as $showonfield) {
                    $showon = explode(':', $showonfield, 2);
                    $showonarr[] = [
                        'field' => $this->form->getFormControl() . '[' . $this->form->getFieldAttribute($showon[0], 'name') . ']',
                        'values' => explode(',', $showon[1]),
                        'op' => (preg_match('%\[(AND|OR)\]' . $showonfield . '%', $this->showonstring, $matches)) ? $matches[1] : ''];
                }
                $datashowon = htmlspecialchars(json_encode($showonarr));
                $html = '<div style="display: block;" class="control-group" data-showon="' . $datashowon . '"> ';
            }
        } else
            $html = '<div class="control-group"> ';

        $html = $html . '<div class="control-label"> ' . $this->getLabel() . ' </div> <div class="controls"> ' . $this->getInput() .
            ' </div> </div>';

        return $html;
    }

    /**
     * AEStandardField::getLabel()
     *
     * @return string
     */
    public function getLabel()
    {
        if (isset($this->label_field)) {
            return '<label id="' . $this->field_name . '-lbl" for="' . $this->field_name . '" class="">' .
            htmlspecialchars($this->label_field->value) . '</label>';
        } else {
            return $this->field->label;
        }
    }

    /**
     * AEStandardField::getInput()
     *
     * @return
     */
    public function getInput()
    {
        return $this->field->input;
    }

    /**
     * AEStandardField::getClass()
     *
     * @return string
     */
    protected function getClass()
    {
        return $this->class;
    }

    /**
     * AEStandardField::getRel()
     */
    protected function getRel()
    {
        return $this->rel;
    }
}
