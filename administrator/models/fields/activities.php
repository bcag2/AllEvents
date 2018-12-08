<?php
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldActivities
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldActivities extends JFormFieldList
{
    protected $type = 'Activities';

    /**
     * JFormFieldActivities::getOptions()
     *
     * @return array|mixed
     */
    protected function getOptions()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT '' as value, '" .
            JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('ACTIVITY')) .
            "' AS text UNION SELECT `id` as value, `titre` as text FROM `#__allevents_activities` where published = 1 order by 2");

        $options = $db->loadObjectList();

        return $options;
    }
}