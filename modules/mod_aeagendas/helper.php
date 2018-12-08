<?php

defined('_JEXEC') or die;

if (!class_exists('AllEventsHelper'))
    require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

/**
 * modAEuikitHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class modAEAgendasHelper
{
    /**
     * modAEAgendasHelper::getItems()
     *
     * @param $params
     *
     * @return mixed
     */
    public static function getItems($params)
    {
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);
        $query->select('a.*');
        $query->select('(select count(id) from #__allevents_events e where e.published = 1 and e.agenda_id = a.id) numitems');
        $query->from('`#__allevents_agenda` AS a');
        $query->where('(a.published = 1)');
        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
        }

        $db->setQuery($query);
        $db->execute();
        $items = $db->loadObjectList();

        return $items;
    }
}