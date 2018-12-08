<?php
defined('_JEXEC') or die;
jimport('joomla.form.formfield');

/**
 * JFormFieldAEfile
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEFile extends JFormField
{
    protected static $initialised = false;
    public $type = 'aefile';

    /**
     * JFormFieldAEFile::getInput()
     *
     * @return string
     */
    protected function getInput()
    {
        //$assetField = $this->element['asset_field'] ? (string) $this->element['asset_field'] : 'asset_id';
        //$asset = $this->form->getValue($assetField) ? $this->form->getValue($assetField) : (string) $this->element['asset_id'];
        //if ($asset == '')
        //{
        //    $asset = JFactory::getApplication()->input->getCmd('option');
        //}

        if (!self::$initialised) {
            // Load the modal behavior script.
            JHtml::_('behavior.modal');
            // Build the script.
            $script = [];
            $script[] = '    function jInsertFieldValue(value, id) {';
            $script[] = '        var old_id = document.id(id).value;';
            $script[] = '        if (old_id != id) {';
            $script[] = '            var elem = document.id(id)';
            $script[] = '            elem.value = value;';
            $script[] = '            elem.fireEvent("change");';
            $script[] = '        }';
            $script[] = '    }';
            // Add the script to the document head.
            JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

            self::$initialised = true;
        }
        // Initialize variables.
        $html = [];
        $attr = '';
        // Initialize some field attributes.
        $attr .= $this->element['class'] ? ' class="' . (string)$this->element['class'] . '"' : '';
        $attr .= $this->element['size'] ? ' size="' . (int)$this->element['size'] . '"' : '';
        $attr .= $this->element['accept'] ? ' accept="' . (string)$this->element['accept'] . '"' : '';
        $attr .= ((string)$this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';
        // Initialize JavaScript field attributes.
        $attr .= $this->element['onchange'] ? ' onchange="' . (string)$this->element['onchange'] . '"' : '';
        // The text field.
        if ($this->value == null) {
            $html[] = '<span>';
            $html[] = '    <input type="file" style="cursor: pointer" name="' . $this->name . '" id="' . $this->id . '"' . ' value="' . htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '"' . ' ' . $attr . ' />';
            $html[] = '</span>';
        } else {
            $html[] = '<span>';
            $html[] = '    <input type="text" name="' . $this->name . '" id="' . $this->id . '"' . ' value="' . htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '"' . ' readonly="readonly"' . $attr . ' />';
            $html[] = '</span>';
        }

        $html[] = '<div class="button2-left">';
        $html[] = '    <div class="blank">';
        $html[] = '        <a title="' . JText::_('JLIB_FORM_BUTTON_CLEAR') . '"' . ' href="#" onclick="';
        $html[] = 'document.id(\'' . $this->id . '\').value=\'\';';
        $html[] = 'document.id(\'' . $this->id . '\').fireEvent(\'change\');';
        $html[] = 'return false;';
        $html[] = '">';
        $html[] = JText::_('JLIB_FORM_BUTTON_CLEAR') . '</a>';
        $html[] = '</div>';
        $html[] = '</div>';

        return implode("\n", $html);
    }
}