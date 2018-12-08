<?php
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAEUser
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEUser extends JFormFieldList
{
    public $type = 'AEUser';

    /**
     * JFormFieldAEUser::getOptions()
     *
     * @return array|mixed
     */
    public function getOptions()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT '' as value, '" . JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('COM_ALLEVENTS_LEGEND_USER')) . "' AS text " .
            "UNION SELECT u.id as value, concat(u.name,' [', u.username,']') AS text from `#__users` u order by 2");
        $options = $db->loadObjectList();

        return $options;
    }
}