<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelAgendas
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelAgendas extends JModelList
{
    /**
     * AllEventsModelAgendas::__construct()
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
                'published',
                'a.published',
                'description',
                'a.description',
                'intro',
                'a.intro',
                'ordering',
                'a.ordering',
                'image_bullet',
                'a.image_bullet',
                'access',
                'a.access',
                'version',
                'a.version',
                'hits',
                'a.hits',
                'created_date',
                'a.created_date',
                'proposed_by',
                'a.proposed_by',
                'lastmod',
                'a.lastmod',
                'lastmod_by',
                'a.lastmod_by',
                'template',
                'a.template',
                'vignette',
                'a.vignette',
                'contact_id',
                'a.contact_id',
                'created_by',
                'a.created_by',
                'metakey',
                'a.metakey',
                'metadesc',
                'a.metadesc',
                'metarobots',
                'a.metarobots',
                'modele',
                'a.modele'
            ];
        }

        parent::__construct($config);
    }

    /**
     * AllEventsModelAgendas::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        $items = parent::getItems();

        return $items;
    }

    /**
     * AllEventsModelAgendas::getAgendas()
     *
     * @return integer
     */
    function getNbAgendas()
    {
        // Create a new query object.
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('count(*) AS nb');
        $query->from($db->quoteName('#__allevents_agenda') . ' AS a');
        $query->where('(a.published=1)');
        $db->setQuery($query);
        $loaddb = $db->loadObjectList();
        $nb = 0;
        foreach ($loaddb as $row) {
            $nb = $row->nb;
        }

        return $nb;
    }

    /**
     * AllEventsModelAgendas::getAgendasMostViewed()
     *
     * @return ObjectList
     */
    public function getAgendasMostViewed()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select('a.id, a.titre, a.couleur, a.default, a.access, count(b.id) AS hits');
        $query->from($db->quoteName('#__allevents_agenda') . ' AS a');
        $query->join('INNER', $db->quoteName('#__allevents_events') . ' AS b ON a.id = b.agenda_id');
        $query->where('(b.published=1) AND (b.titre <> \'\')');
        $query->where('(a.published=1)');
        $query->group('a.id, a.titre, a.couleur, a.default, a.access');
        $query->order('a.titre ASC');
        $db->setQuery($query);
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AlleventsModelAgendas::GetAgendas()
     *
     * @return array
     */
    public function GetAgendas()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select('`id`, `titre` AS `display`, `default`');
        $query->from($db->quoteName('#__allevents_agenda') . ' AS a');
        $query->where('(a.published=1)');
        $query->order('a.titre ASC');
        $db->setQuery($query);
        $loaddb = $db->loadObjectList();

        return ((array)$loaddb);
    }

    /**
     * AlleventsModelAgendas::GetDefaultAgendaId()
     *
     * @return mixed
     */
    public function GetDefaultAgendaId()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select('max(a.id)');
        $query->from($db->quoteName('#__allevents_agenda') . ' AS a');
        $query->where('(a.published=1)');
        $query->where('(a.default=1)');
        $query->order('a.titre ASC');
        $db->setQuery($query);
        $loaddb = $db->loadResult();

        return $loaddb;
    }

    /**
     * AllEventsModelAgendas::populateState()
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
     * AllEventsModelAgendas::getStoreId()
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
     * AllEventsModelAgendas::getListQuery()
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
        $query->select('(select count(*) from `#__allevents_events` b where b.agenda_id=a.id and b.published=1) nb_events');
        $query->from('`#__allevents_agenda` AS a');
        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
        // Join over the user field 'lastmod_by'
        $query->select('lastmod_by.name AS lastmod_by');
        $query->join('LEFT', '#__users AS lastmod_by ON lastmod_by.id = a.lastmod_by');
        // Join over the user field 'contact_id'
        $query->select('contact_id.name AS contact_id');
        $query->join('LEFT', '#__users AS contact_id ON contact_id.id = a.contact_id');
        // Join over the user field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
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
        // Join over the asset groups.
        $query->select('ag.title AS access_level');
        $query->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }
}