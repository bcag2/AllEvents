<?php
defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('radio');

/**
 * JFormFieldAEUseComponent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEUseComponent extends JFormFieldRadio
{
    public $type = 'AEUseComponent';
    protected $component = null;
    protected $component_enabled = false;

    /**
     * @param SimpleXMLElement $element
     * @param mixed $value
     * @param null $group
     *
     * @return bool
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        if (is_null($element['component'])) {
            return false;
        }
        $this->component = (string)$element['component'];

        if (JComponentHelper::isInstalled($this->component)) {
            $this->component_enabled = JComponentHelper::isEnabled($this->component);
        } else {
            $this->component_enabled = false;
        }

        if (!$this->component_enabled) {
            $element['default'] = 0;
        }

        return parent::setup($element, $value, $group);
    }

    /**
     * JFormFieldAEUseComponent::getOptions() provides the options for the radio buttons
     *
     * @return array
     */
    protected function getOptions()
    {
        $option = new stdClass();
        $option->checked = false;
        $option->class = '';
        $option->disable = false;
        $option->selected = false;
        $option->text = JText::_('JNO');
        $option->value = 0;
        $options[] = $option;

        if ($this->component_enabled) {
            $option = new stdClass();
            $option->checked = false;
            $option->class = '';
            $option->disable = false;
            $option->selected = false;
            $option->text = JText::_('JYES');
            $option->value = 1;
            $options[] = $option;
        } else {
            parent::setValue("0");
        }

        return $options;
    }
}
