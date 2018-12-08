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
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'id',
                'a.id',
                'titre',
                'a.titre',
                'alias',
                'a.alias',
                'couleur',
                'a.couleur',
                'couleur_texte',
                'a.couleur_texte',
                'description',
                'a.description',
                'intro',
                'a.intro',
                'map_id',
                'a.map_id',
                'map_url',
                'a.map_url',
                'rue',
                'a.rue',
                'numero',
                'a.numero',
                'ville',
                'a.ville',
                'codepostal',
                'a.codepostal',
                'country',
                'a.country',
                'published',
                'a.published',
                'access',
                'a.access',
                'image_bullet',
                'a.image_bullet',
                'vignette',
                'a.vignette',
                'ordering',
                'a.ordering',
                'agenda_id',
                'a.agenda_id',
                'created_date',
                'a.created_date',
                'proposed_by',
                'a.proposed_by',
                'lastmod',
                'a.lastmod',
                'lastmod_by',
                'a.lastmod_by',
                'showmap',
                'a.showmap',
                'zoom',
                'a.zoom',
                'kmlfile',
                'a.kmlfile',
                'latitude',
                'a.latitude',
                'longitude',
                'a.longitude',
                'maptype',
                'a.maptype',
                'phone',
                'a.phone',
                'fax',
                'a.fax',
                'email',
                'a.email',
                'website',
                'a.website',
                'contact',
                'a.contact',
                'version',
                'a.version',
                'hits',
                'a.hits',
                'created_by',
                'a.created_by',
                'default',
                'a.default',
                'metakey',
                'a.metakey',
                'metadesc',
                'a.metadesc',
                'metarobots',
                'a.metarobots',
            ];
        }

        parent::__construct($config);
    }

    /**
     * AllEventsModelPlaces::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * AllEventsModelPlaces::getNbPlaces()
     *
     * @return integer
     */
    function getNbPlaces()
    {
        // Create a new query object.
        $db = $this::getDbo();
        $db->setQuery("SELECT count(*) AS nb FROM `#__allevents_places` WHERE published = 1");
        $loaddb = $db->loadObjectList();
        $nb = 0;
        foreach ($loaddb as $row) {
            $nb = $row->nb;
        }

        return $nb;
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
        $db->setQuery("SELECT `id`, `titre` AS `display`, `default` FROM `#__allevents_places` WHERE  `published`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ") ORDER BY 2");
        $loaddb = $db->loadObjectList();

        return ((array )$loaddb);
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
        $agenda_id = (empty($agenda_id)) ? 0 : $agenda_id;
        $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_places` WHERE published=1 AND `default`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ")");
        $loaddb = $db->loadResult();

        return $loaddb;
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
        parent::populateState('a.titre', 'asc');
    }

    /**
     * AllEventsModelPlaces::getStoreId()
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
        $query->select($this->getState('list.select', 'a.*'));
        $query->select('(select count(*) from `#__allevents_events` b where b.place_id=a.id and b.published=1) nb_events');
        $query->from('`#__allevents_places` AS a');
        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
        // Join over the user field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
        // Join over the user field 'created_by'
        $query->select('agenda.titre AS agenda_titre');
        $query->join('LEFT', '#__allevents_agenda AS agenda ON agenda.id = a.agenda_id');
        // Filter by published state
        $published = $this->getState('filter.state');
        if (is_numeric($published)) {
            $query->where('a.published = ' . (int)$published);
        } else
            if ($published === '') {
                $query->where('(a.published IN (0, 1))');
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
        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }
}
