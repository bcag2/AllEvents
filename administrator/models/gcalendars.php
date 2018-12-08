<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelGcalendars
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelGcalendars extends JModelList
{
    /**
     * AllEventsModelGcalendars::__construct()
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'ordering',
                'a.ordering',
                'published',
                'a.published',
                'created_by',
                'a.created_by',
                'asset_id',
                'a.asset_id',
                'titre',
                'a.titre',
                'id_gcalendar',
                'a.id_gcalendar',
                'couleur',
                'a.couleur',
                'couleur_texte',
                'a.couleur_texte',
                'classe',
                'a.classe',
                'access',
                'a.access',
                'created_date',
                'a.created_date',
                'proposed_by',
                'a.proposed_by',
                'lastmod',
                'a.lastmod',
                'lastmod_by',
                'a.lastmod_by',
                'version',
                'a.version',

            ];
        }

        parent::__construct($config);
    }

    /**
     * AllEventsModelGcalendars::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        $items = parent::getItems();

        return $items;
    }

    /**
     * AllEventsModelGcalendars::getNbGCalendars()
     *
     * @return integer
     */
    function getNbGCalendars()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $db->setQuery("SELECT count(*) AS nb FROM `#__allevents_gcalendar` WHERE published = 1");
        $loaddb = $db->loadObjectList();
        $nb = 0;
        foreach ($loaddb as $row) {
            $nb = $row->nb;
        }

        return $nb;
    }

    /**
     * AllEventsModelGcalendars::populateState()
     *
     * @param mixed $ordering
     * @param mixed $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');
        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
        $this->setState('filter.state', $published);
        // Load the parameters.
        $params = JComponentHelper::getParams('com_allevents');
        $this->setState('params', $params);
        // List state information.
        parent::populateState('a.id', 'asc');
    }

    /**
     * AllEventsModelGcalendars::getStoreId()
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
     * AllEventsModelGcalendars::getListQuery()
     *
     * @return JDatabaseQuery
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        // Select the required fields from the table.
        $query->select($this->getState('list.select', 'DISTINCT a.*'));
        $query->from('`#__allevents_gcalendar` AS a');
        // Join over the users for the checked out user
        $query->select("uc.name AS editor");
        $query->join("LEFT", "#__users AS uc ON uc.id=a.checked_out");
        // Join over the user field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
        // Join over the access level field 'access'
        $query->select('access.title AS access');
        $query->join('LEFT', '#__viewlevels AS access ON access.id = a.access');
        // Join over the user field 'proposed_by'
        $query->select('proposed_by.name AS proposed_by');
        $query->join('LEFT', '#__users AS proposed_by ON proposed_by.id = a.proposed_by');
        // Join over the user field 'lastmod_by'
        $query->select('lastmod_by.name AS lastmod_by');
        $query->join('LEFT', '#__users AS lastmod_by ON lastmod_by.id = a.lastmod_by');
        // Filter by search in title
        //$search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int)substr($search, 3));
            } else {
                //TODO : a creuser
                //$search = $db->quote('%' . $db->escape($search, true) . '%');
            }
        }
        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }
}
