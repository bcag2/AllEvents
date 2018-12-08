<?php
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

/**
 * JFormFieldEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldEvents extends JFormFieldList
{
    protected $type = 'Events';

    /**
     * JFormFieldEvents::getOptions()
     *
     * @return array|mixed
     */
    protected function getOptions()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT '' as value, '" .
            JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('EVENT')) .
            "' AS text, str_to_date('31/12/3999', '%d/%m/%Y') as date UNION SELECT a.id as value, concat(a.titre, ' (',DATE_FORMAT(a.date,'%Y-%m-%d'),')') as text, date FROM #__allevents_events as a where a.published = 1 and (a.titre <> '') order by date DESC");

        $options = $db->loadObjectList();

        return $options;
    }
}