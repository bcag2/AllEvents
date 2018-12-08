<?php
/**
 * @version       2.1.6
 * @package       JEM
 * @copyright (C) 2013-2016 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license       http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');
// ensure JemFactory is loaded (because model is used by modules too)
// require_once(JPATH_SITE.'/components/com_allevents/factory.php');

/**
 * Model-Eventslist
 **/
class AllEventsModelEventslist extends JModelList
{
    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'id', 'a.id',
                'title', 'a.title',
            ];
        }

        parent::__construct($config);
    }

    /**
     * set limit
     *
     * @param $value
     */
    function setLimit($value)
    {
        $this->setState('list.limit', (int)$value);
    }

    /**
     * set limitstart
     *
     * @param $value
     */
    function setLimitStart($value)
    {
        $this->setState('list.start', (int)$value);
    }

    /**
     * Method to get a list of events.
     */
    public function getItems()
    {
        $items = parent::getItems();

        if (empty($items)) {
            return [];
        }

        return $items;
    }

    /**
     * Method to auto-populate the model state.
     *
     * @param null $ordering
     * @param null $direction
     */
    protected function populateState($ordering = null, $direction = null)
    {
        parent::populateState('a.date', 'ASC');
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * @param string $id
     *
     * @return string
     */
    protected function getStoreId($id = '')
    {
        return parent::getStoreId($id);
    }

    /**
     * Build the query
     */
    protected function getListQuery()
    {
        # Query
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        # event
        $query->select(
            $this->getState(
                'list.select',
                'a.*'
            )
        );
        $query->from('#__allevents_events as a');

        $filter_agenda_id = $this->getState('filter.agenda.id');
        if ($filter_agenda_id) {
            $query->where('a.agenda_id = ' . (int)$filter_agenda_id);
        }

        return $query;
    }

    /**
     * Helper method to auto-populate publishing related model state.
     * Can be called in populateState()
     *
     * @param $task
     * @throws Exception
     */
    protected function _populatePublishState($task)
    {
        $app = JFactory::getApplication();
        $jinput = $app->input;
        // $jemsettings = JemHelper::config();
        $user = JFactory::getUser();
        $userId = $user->get('id');

        # publish state
        $format = $jinput->getCmd('format', '');

        if ($task == 'archive') {
            $this->setState('filter.published', 2);
        } elseif (($format == 'raw') || ($format == 'feed')) {
            $this->setState('filter.published', 1);
        } else {
            $show_unpublished = $user->can(['edit', 'publish'], 'event', false, false, 1);
            if ($show_unpublished) {
                // global editor or publisher permission
                $this->setState('filter.published', [0, 1]);
            } else {
                // no global permission but maybe on event level
                $this->setState('filter.published', 1);
                $this->setState('filter.unpublished', 0);

                $jemgroups = $user->getJemGroups(['editevent', 'publishevent']);
                // if (($userId !== 0) && ($jemsettings->eventedit == -1)) {
                // $jemgroups[0] = true; // we need key 0 to get unpublished events not attached to any jem group
                // }
                // user permitted on that jem groups
                if (is_array($jemgroups) && count($jemgroups)) {
                    $this->setState('filter.unpublished.events.on_groups', array_keys($jemgroups));
                }
                // user permitted on own events
                if (($userId !== 0) && ($user->authorise('core.edit.own', 'com_allevents') || $jemsettings->eventowner)) {
                    $this->setState('filter.unpublished.on_user', $userId);
                }
            }
        }
    }

    /**
     * Helper method to create publishing related where clauses.
     * Can be called in getListQuery()
     *
     * @param string|table $tbl table alias to use
     *
     * @return array where clauses related to publishing state and user permissons
     *                to combine with OR
     */
    protected function _getPublishWhere($tbl = 'a')
    {
        $tbl = empty($tbl) ? '' : $this->_db->quoteName($tbl) . '.';
        $where_pub = [];

        # Filter by published state.
        $published = $this->getState('filter.published');

        if (is_numeric($published)) {
            $where_pub[] = '(' . $tbl . 'published = ' . (int)$published . ')';
        } elseif (is_array($published) && !empty($published)) {
            JArrayHelper::toInteger($published);
            $published = implode(',', $published);
            $where_pub[] = '(' . $tbl . 'published IN (' . $published . '))';
        }

        # Filter by specific conditions
        $unpublished = $this->getState('filter.unpublished');
        if (is_numeric($unpublished)) {

            // Is user member of jem groups allowing to see unpublished events?
            $unpublished_on_groups = $this->getState('filter.unpublished.events.on_groups');
            if (is_array($unpublished_on_groups) && !empty($unpublished_on_groups)) {
                // to allow only events with categories attached to allowed jemgroups use this line:
                //$where_pub[] = '(' . $tbl . '.published = ' . $unpublished . ' AND c.groupid IN (' . implode(',', $unpublished_on_groups) . '))';
                // to allow also events with categories not attached to disallowed jemgroups use this crazy block:
                $where_pub[] = '(' . $tbl . 'published = ' . $unpublished . ' AND '
                    . $tbl . 'id NOT IN (SELECT rel3.itemid FROM #__jem_categories as c3 '
                    . '                   INNER JOIN #__jem_cats_event_relations as rel3 '
                    . '                   WHERE c3.id = rel3.catid AND c3.groupid NOT IN (0,' . implode(',', $unpublished_on_groups) . ')'
                    . '                   GROUP BY rel3.itemid)'
                    . ')';
                // hint: above it's a not not ;-)
                //       meaning: Show unpublished events not connected to a category which is not one of the allowed categories.
            }

            // Is user allowed to see own unpublished events?
            $unpublished_on_user = (int)$this->getState('filter.unpublished.on_user');
            if ($unpublished_on_user > 0) {
                $where_pub[] = '(' . $tbl . 'published = ' . $unpublished . ' AND ' . $tbl . 'created_by = ' . $unpublished_on_user . ')';
            }
        }

        return $where_pub;
    }
}
