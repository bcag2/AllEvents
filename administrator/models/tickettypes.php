<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelTickettypes
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelTickettypes extends JModelList
{
    /**
     * AllEventsModelTickettypes::__construct()
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'id',
                't.id',
                'titre',
                't.titre'];
        }
        parent::__construct($config);
    }

    /**
     * AllEventsModelTickettypes::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * AllEventsModelTickettypes::populateState()
     *
     * @param string $ordering
     * @param string $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = 't.id', $direction = 'ASC')
    {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');
        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        // $published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
        // $this->setState('filter.state', $published);

        $event_id = $app->getUserStateFromRequest($this->context . '.filter.event_id', 'filter_event_id', '', 'string');
        $this->setState('filter.event_id', $event_id);

        // Load the parameters.
        $params = JComponentHelper::getParams('com_allevents');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('t.id', 'asc');
    }

    /**
     * AllEventsModelTickettypes::getStoreId()
     *
     * @param string $id
     *
     * @return string
     */
    protected function getStoreId($id = '')
    {
        // Compile the store id.
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * AllEventsModelTickettypes::getListQuery()
     *
     * @return JDatabaseQuery|string
     */
    protected function getListQuery()
    {
        //$user = JFactory::getUser();
        // Create a new query object.
        $db = $this->getDbo();


        $sql = 'SELECT t.*, e.titre event_titre FROM #__allevents_tickettypes t INNER JOIN #__allevents_events e ON t.event_id = e.id';

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $sql .= ' and (t.id = ' . (int)substr($search, 3) . ' )';
            } else {
                $search = $db->quote('%' . $db->escape($search, true) . '%');
                $sql .= ' and ( t.titre LIKE ' . $search . ' )';
            }
        }

        $event_id = $db->escape($this->getState('filter.event_id'));
        if (is_numeric($event_id)) {
            $sql .= ' and (t.event_id=' . (int)$event_id . ' )';
        }

        // Add the list ordering clause.
        // $sql .= ' order by ' . $db->escape($this->getState('list.fullordering', 't.id DESC'));

        return $sql;
    }
}
