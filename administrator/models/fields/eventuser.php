<?php
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

/**
 * JFormFieldEventUser
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldEventUser extends JFormFieldList
{
    protected $type = 'EventUser';

    /**
     * JFormFieldEventUser::getOptions()
     *
     * @return array|mixed
     */
    protected function getOptions()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT '' as value, '" . JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('COM_ALLEVENTS_LEGEND_USER')) . "' AS text " .
            "UNION SELECT a.proposed_by as value, concat(u.name,' [', u.username,']') AS text from `#__allevents_events` a inner join `#__users` u on u.id = a.proposed_by where a.published in (0,1)");
        $options = $db->loadObjectList();

        return $options;
    }
}