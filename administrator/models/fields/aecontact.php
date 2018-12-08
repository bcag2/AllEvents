<?php
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('sql');

/**
 * JFormFieldAEContact
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEContact extends JFormFieldSQL
{
    public $type = 'AEContact';

    /**
     * JFormFieldAEContact::getInput()
     *
     * @return string
     */
    public function getInput()
    {
        $html = '';
        $db = JFactory::getDbo();
        $db->setQuery("SELECT u.id , u.name AS `name` FROM `#__users` AS u ORDER BY u.name");
        $items = $db->loadObjectList();
        $html .= '<select id="' . $this->id . '" name="' . $this->name . '">';
        $html .= '<option value="0" >' . JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('COM_ALLEVENTS_CONTACT')) . '</option>';
        foreach ($items as $item) {
            $html .= '<option value="' . $item->id . '" >' . $item->name . '</option>';
        }
        $html .= '</select>';

        return $html;
    }
}