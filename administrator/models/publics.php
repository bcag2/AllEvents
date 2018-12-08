<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelPublics
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelPublics extends JModelList
{
    /**
     * AllEventsModelPublics::__construct()
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
                'access',
                'a.access',
                'ordering',
                'a.ordering',
                'image_bullet',
                'a.image_bullet',
                'agenda_id',
                'a.agenda_id',
                'vignette',
                'a.vignette',
                'created_date',
                'a.created_date',
                'lastmod',
                'a.lastmod',
                'lastmod_by',
                'a.lastmod_by',
                'proposed_by',
                'a.proposed_by',
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
     * AllEventsModelPublics::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        $items = parent::getItems();

        foreach ($items as $oneItem) {
            if (isset($oneItem->agenda_id)) {
                $values = explode(',', $oneItem->agenda_id);

                $textValue = [];
                foreach ($values as $value) {
                    $db = $this->getDbo();
                    $query = $db->getQuery(true);
                    $query->select('titre')->from('`#__allevents_agenda`')->where('id = ' . (int)$db->quote($db->escape($value)));
                    $db->setQuery($query);
                    $results = $db->loadObject();
                    if ($results) {
                        $textValue[] = $results->titre;
                    }
                }

                $oneItem->agenda_id = !empty($textValue) ? implode(', ', $textValue) : $oneItem->agenda_id;
            }
        }

        return $items;
    }

    /**
     * AllEventsModelPublics::getPublics()
     *
     * @return integer
     */
    function getNbPublics()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $db->setQuery("SELECT count(*) AS nb FROM `#__allevents_public` WHERE published = 1");
        $loaddb = $db->loadObjectList();
        $nb = 0;
        foreach ($loaddb as $row) {
            $nb = $row->nb;
        }

        return $nb;
    }

    /**
     * AllEventsModelPublics::GetPublicsFromAgenda()
     *
     * @param mixed $agenda_id
     *
     * @return array
     */
    public function GetPublicsFromAgenda($agenda_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `id`, `titre` AS `display`, `default` FROM `#__allevents_public` WHERE `published`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ") ORDER BY 2");
        $loaddb = $db->loadObjectList();

        return ((array )$loaddb);
    }

    /**
     * AllEventsModelPublics::GetDefaultPublicIdForAgenda()
     *
     * @param mixed $agenda_id
     *
     * @return mixed
     */
    public function GetDefaultPublicIdForAgenda($agenda_id)
    {
        $db = $this->getDbo();
        $agenda_id = (empty($agenda_id)) ? 0 : $agenda_id;
        $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_public` WHERE published=1 AND `default`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ")");
        $loaddb = $db->loadResult();

        return $loaddb;
    }

    /**
     * AllEventsModelPublics::populateState()
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
     * AllEventsModelPublics::getStoreId()
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
     * AllEventsModelPublics::getListQuery()
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
        $query->select('(select count(*) from `#__allevents_events` b where b.public_id=a.id and b.published=1) nb_events');
        $query->from('`#__allevents_public` AS a');
        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
        // Join over the foreign key 'agenda_id'
        $query->select('#__allevents_agenda_1119305.titre AS agendas_titre_1119305');
        $query->join('LEFT', '#__allevents_agenda AS #__allevents_agenda_1119305 ON #__allevents_agenda_1119305.id = a.agenda_id');
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
        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }
}
