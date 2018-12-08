<?php
defined('_JEXEC') or die;

/**
 * JFormFieldAECBUserBack
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

/**
 * Field to select a user ID from a modal list.
 */
class JFormFieldAECBUserBack extends JFormField
{
    /**
     * The form field type.
     *
     * @var string
     */
    public $type = 'AECBUserBack';

    /**
     * Method to get the user field input markup.
     *
     * @return string The field input markup.
     */
    protected function getInput()
    {
        $html = [];
        $groups = $this->getGroups();
        $link = 'index.php?option=com_allevents&amp;view=aecbusersback&amp;layout=modal&amp;tmpl=component&amp;field=' .
            $this->id . (isset($groups) ? ('&amp;groups=' . base64_encode(json_encode($groups))) : '');

        // Initialize some field attributes.
        $attr = !empty($this->class) ? ' class="' . $this->class . '"' : '';
        $attr .= !empty($this->size) ? ' size="' . $this->size . '"' : '';
        $attr .= $this->required ? ' required' : '';

        // Load the modal behavior script.
        JHtml::_('behavior.modal', 'a.modal_' . $this->id);

        // Build the script.
        $script = [];
        $script[] = 'function jSelectAECBUser_' . $this->id . '(id, title) {';
        $script[] = '    var old_id = document.getElementById("' . $this->id . '_id").value;';
        $script[] = '    if (old_id != id) {';
        $script[] = '        document.getElementById("' . $this->id . '_id").value = id;';
        $script[] = '        document.getElementById("' . $this->id . '").value = title;';
        $script[] = '        document.getElementById("' . $this->id . '").className = document.getElementById("' . $this->id .
            '").className.replace(" invalid" , "");';
        $script[] = '        ' . $this->onchange;
        $script[] = '    }';
        $script[] = '    jModalClose();';
        $script[] = '}';

        // Add the script to the document head.
        JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

        // Load the current username if available.
        $table = JTable::getInstance('user');

        if (is_numeric($this->value)) {
            $table->load($this->value);
        } // Handle the special case for "current".
        elseif (strtoupper($this->value) == 'CURRENT') {
            // 'CURRENT' is not a reasonable value to be placed in the html
            $this->value = JFactory::getUser()->id;
            $table->load($this->value);
        } else {
            $table->name = JText::_('JLIB_FORM_SELECT_USER');
        }

        // Create a dummy text field with the user name.
        $html[] = '<div class="input-append">';
        $html[] = '    <input type="text" id="' . $this->id . '" value="' .
            htmlspecialchars($table->name, ENT_COMPAT, 'UTF-8') . '"' . ' readonly' . $attr . ' />';

        // Create the user select button.
        if ($this->readonly === false) {
            $html[] = '        <a class="btn btn-primary modal_' . $this->id . '" title="' .
                JText::_('JLIB_FORM_CHANGE_USER') . '" href="' . $link . '"' .
                ' rel="{handler: \'iframe\', size: {x: 800, y: 500}}">';
            $html[] = '<span class="icon-user"></span></a>';
        }

        $html[] = '</div>';

        // Create the real field, hidden, that stored the user id.
        $html[] = '<input type="hidden" id="' . $this->id . '_id" name="' . $this->name . '" value="' . $this->value .
            '" />';

        return implode("\n", $html);
    }

    /**
     * Method to get the filtering groups (null means no filtering)
     *
     * @return mixed array of filtering groups or null.
     */
    protected function getGroups()
    {
        return null;
    }
}
