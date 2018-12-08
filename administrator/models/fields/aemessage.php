<?php

defined('_JEXEC') or die;

jimport('joomla.form.formfield');

// Test if translation is missing, set to en-GB by default
$language = JFactory::getLanguage();
$language->load('com_allevents', JPATH_ADMINISTRATOR, 'en-GB', true);
$language->load('com_allevents', JPATH_ADMINISTRATOR, null, true);
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');

/**
 * JFormFieldAEMessage
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEMessage extends JFormField
{
    protected $type = 'AEMessage';

    /**
     * JFormFieldAEMessage::getInput()
     *
     * @return string
     */
    protected function getInput()
    {
        return ' ';
    }

    /**
     * JFormFieldAEMessage::getLabel()
     *
     * @return string
     */
    protected function getLabel()
    {
        // Display text
        $level = isset($this->element['level']) ? $this->element['level'] : 'danger';
        if (in_array($level, ['success', 'danger', 'error', 'info'])) {
            $class = 'alert-' . $level;
        } else {
            $class = 'alert-error';
        }

        return '<div class="' . $class . '">' . JText::_($this->element['text']) . '</div>';
    }
}
