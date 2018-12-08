<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelPlaces
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelPlaces extends JModelList
{
    /**
     * AllEventsModelPlaces::__construct()
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * AllEventsModelPlaces::addParam()
     *
     * @param mixed $name
     * @param mixed $value
     */
    public function addParam($name, $value)
    {
        $this->params[$name] = $value;
    }

    /**
     * AllEventsModelPlaces::GetPlacesFromAgenda()
     *
     * @param mixed $agenda_id
     *
     * @return array
     */
    public function GetPlacesFromAgenda($agenda_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `id`, `titre` AS `display`, `default` FROM `#__allevents_places` WHERE `published`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ") ORDER BY 2");
        $loaddb = $db->loadObjectList();

        return ((array)$loaddb);
    }

    /**
     * AllEventsModelPlaces::GetDefaultPlaceIdForAgenda()
     *
     * @param mixed $agenda_id
     *
     * @return mixed
     */
    public function GetDefaultPlaceIdForAgenda($agenda_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_places` WHERE `published`=1 AND `default`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ")");
        $loaddb = $db->loadResult();
        if (empty($loaddb)) {
            $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_categories` WHERE `published`=1");
            $loaddb = $db->loadResult();
        }

        return $loaddb;
    }

    /**
     * AllEventsModelPlaces::getItems()
     *
     * @return mixed
     * @throws Exception
     */
    public function getItems()
    {
        // Get a storage key.
        $store = $this->getStoreId();
        // Try to load the data from internal storage.
        if (isset($this->cache[$store])) {
            return $this->cache[$store];
        }
        // Load the list items.
        $query = $this->getListQuery();
        try {
            $items = $this->_getList($query, $this->getState('list.start'), $this->getState('list.limit'));
            $return = [];
            foreach ($items as $item) {
                $item_ok = true;
                if (($this->params['e'] == 1) && ($item->nb_events == 0)) {
                    $item_ok = false;
                }
                if (($this->params['geolocated'] == 1) && (empty($item->latitude) || empty($item->longitude))) {
                    $item_ok = false;
                }
                if ($item_ok) {
                    $return[] = $item;
                }
            }
        } catch (RuntimeException $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return false;
        }
        // Add the items to the internal cache.
        $this->cache[$store] = $return;

        return $this->cache[$store];
    }

    /**
     * AllEventsModelPlaces::getListQuery()
     *
     * @return JDatabaseQuery
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        // Select the required fields from the table.
        $query->select($this->getState('list.select', ' distinct a.*'));
        $query->select('(select count(*) from `#__allevents_events` b where b.place_id=a.id and b.published=1) nb_events');
        $query->from('`#__allevents_places` AS a');
        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
        // Join over the user field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

        if (isset($this->params['period'])) {
            $query->join('INNER', '#__allevents_events AS events ON events.place_id = a.id');
            $query->where('(events.published = 1)');
            $query->where('(ifnull(events.publishingdate,now()) <= now())');
            $query->where('(events.titre <> \'\')');
            if ($this->params['period'] == "0") {
                //ALL
            } elseif ($this->params['period'] == "1") {
                //CURRENT
                $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(events.date,'%Y%m%d') and DATE_FORMAT(events.enddate,'%Y%m%d'))");
            } elseif ($this->params['period'] == "2") {
                //NEXT
                $query->where("(DATE_FORMAT(events.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d'))");
            } elseif ($this->params['period'] == "3") {
                //NEXTANDCURRENT
                $query->where("((DATE_FORMAT(events.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(events.date,'%Y%m%d') and DATE_FORMAT(events.enddate,'%Y%m%d')))");
            } elseif ($this->params['period'] == "4") {
                //PAST
                $query->where("(DATE_FORMAT(events.enddate,'%Y%m%d') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d'))");
            } elseif ($this->params['period'] == "5") {
                //PASTANDCURRENT
                $query->where("((DATE_FORMAT(events.enddate,'%Y%m%d') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(events.date,'%Y%m%d') and DATE_FORMAT(events.enddate,'%Y%m%d')))");
            }
        }

        // Filter by published state
        $published = $this->getState('filter.state');
        if (is_numeric($published)) {
            $query->where('a.published = ' . (int)$published);
        } else {
            if ($published === '') {
                $query->where('(a.published IN (0, 1))');
            }
        }
        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int)substr($search, 3));
            } else {
                $search = $db->quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.titre LIKE ' . $search . ' )');
            }
        }

        if (isset($this->params['sort_by'])) {
            if ($this->params['sort_by'] == "0") {
                $query->order('a.titre asc');
            } elseif ($this->params['sort_by'] == "1") {
                $query->order('a.titre desc');
            } elseif ($this->params['sort_by'] == "2") {
                $query->order('nb_events asc');
            } elseif ($this->params['sort_by'] == "3") {
                $query->order('nb_events desc');
            } elseif ($this->params['sort_by'] == "4") {
                $query->order('a.id desc');
            } elseif ($this->params['sort_by'] == "5") {
                $query->order('a.id desc');
            }
        } else {
            // Add the list ordering clause.
            $orderCol = $this->state->get('list.ordering');
            $orderDirn = $this->state->get('list.direction');
            if ($orderCol && $orderDirn) {
                $query->order($db->escape($orderCol . ' ' . $orderDirn));
            }
        }

        return $query;
    }

    /**
     * AllEventsModelPlaces::populateState()
     *
     * @param mixed $ordering
     * @param mixed $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication();
        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->get('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);
        // List state information.
        parent::populateState($ordering, $direction);
    }
}
