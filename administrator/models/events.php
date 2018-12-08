<?php

defined('_JEXEC') or die;
jimport('joomla.application.component.modellist');

/**
 * AllEventsModelEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelEvents extends JModelList
{
    /**
     * AllEventsModelEvents::__construct()
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'published', 'a.published',
                'titre', 'a.titre',
                'date', 'a.date',
                'proposed_by', 'a.proposed_by',
                'id', 'a.id'];
        }
        parent::__construct($config);
    }

    /**
     * AllEventsModelEvents::getAllEvents()
     *
     * @return ObjectList
     */
    public function getAllEvents()
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT * FROM `#__allevents_events` WHERE (`published`=1) AND (`titre` <> '')");
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AllEventsModelEvents::getEventsToApprove()
     *
     * @return ObjectList
     */
    public function getEventsToApprove()
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT id, titre FROM `#__allevents_events` WHERE (`proposal`=1) AND (`published`=1) AND (`titre` <> '')");
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AllEventsModelEvents::getEventsAppointments()
     *
     * @return ObjectList
     */
    public function getEventsAppointments()
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `#__allevents_events`.id, `#__allevents_events`.allday, DATE_FORMAT(`#__allevents_events`.date, '%Y-%m-%d %H:%i') mydatetime, `#__allevents_events`.titre, `#__allevents_agenda`.titre agenda_titre FROM `#__allevents_events` LEFT JOIN `#__allevents_agenda` ON `#__allevents_agenda`.id=`#__allevents_events`.agenda_id WHERE (`#__allevents_events`.published=1) AND (`#__allevents_events`.titre <> '') AND DATE_FORMAT(`#__allevents_events`.date,'%Y%m%d') = DATE_FORMAT(CURRENT_DATE(),'%Y%m%d')");
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AllEventsModelEvents::getEventsMostViewed()
     *
     * @return ObjectList
     */
    public function getEventsMostViewed()
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `#__allevents_events`.id, `#__allevents_events`.titre, `#__allevents_events`.hits, `#__allevents_agenda`.couleur FROM `#__allevents_events` LEFT JOIN `#__allevents_agenda` ON `#__allevents_agenda`.id=`#__allevents_events`.agenda_id WHERE (`#__allevents_events`.published=1) AND (`#__allevents_events`.titre <> '') ORDER BY hits DESC LIMIT 10");
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * Build an SQL query to load the list of all Activities.
     * AllEventsModelEvents::getActivities()
     *
     * @return array
     * @since 3.3.0
     */
    public function getActivities()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id` AS value, `titre` AS text FROM `#__allevents_activities` WHERE `published` = 1 ORDER BY 2");
        $datas = $db->loadObjectList();
        $list = [];

        if (count($datas) > 0) {
            foreach ($datas as $data) {
                $list[$data->value] = $data->text;
            }
        }

        return $list;
    }

    /**
     * Build an SQL query to load the list of all agendas.
     * AllEventsModelEvents::getAgendas()
     *
     * @return array
     * @since 3.3.0
     */
    public function getAgendas()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id` AS value, `titre` AS text FROM `#__allevents_agenda` WHERE `published` = 1 ORDER BY 2");
        $datas = $db->loadObjectList();
        $list = [];

        if (count($datas) > 0) {
            foreach ($datas as $data) {
                $list[$data->value] = $data->text;
            }
        }

        return $list;
    }

    /**
     * Build an SQL query to load the list of all Categories.
     * AllEventsModelEvents::getCategories()
     *
     * @return array|JDatabaseQuery
     * @since 3.3.0
     */
    public function getCategories()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id` AS value, `titre` AS text FROM `#__allevents_categories` WHERE `published` = 1 ORDER BY 2");
        $datas = $db->loadObjectList();
        $list = [];

        if (count($datas) > 0) {
            foreach ($datas as $data) {
                $list[$data->value] = $data->text;
            }
        }

        return $list;
    }

    /**
     * Build an SQL query to load the list of all Places.
     * AllEventsModelEvents::getPlaces()
     *
     * @return array|JDatabaseQuery
     * @since 3.3.0
     */
    public function getPlaces()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id` AS value, `titre` AS text FROM `#__allevents_places` WHERE `published` = 1 ORDER BY 2");
        $datas = $db->loadObjectList();
        $list = [];

        if (count($datas) > 0) {
            foreach ($datas as $data) {
                $list[$data->value] = $data->text;
            }
        }

        return $list;
    }

    /**
     * Build an SQL query to load the list of all Publics.
     * AllEventsModelEvents::getPublics()
     *
     * @return array|JDatabaseQuery
     * @since 3.3.0
     */
    public function getPublics()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id` AS value, `titre` AS text FROM `#__allevents_public` WHERE `published` = 1 ORDER BY 2");
        $datas = $db->loadObjectList();
        $list = [];

        if (count($datas) > 0) {
            foreach ($datas as $data) {
                $list[$data->value] = $data->text;
            }
        }

        return $list;
    }

    /**
     * Build an SQL query to load the list of all Ressources.
     * AllEventsModelEvents::getRessources()
     *
     * @return array|JDatabaseQuery
     * @since 3.3.0
     */
    public function getRessources()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id` AS value, `titre` AS text FROM `#__allevents_ressources` WHERE `published` = 1 ORDER BY 2");
        $datas = $db->loadObjectList();
        $list = [];

        if (count($datas) > 0) {
            foreach ($datas as $data) {
                $list[$data->value] = $data->text;
            }
        }

        return $list;
    }

    /**
     * Build an SQL query to load the list of all Sections.
     * AllEventsModelEvents::getSections()
     *
     * @return array|JDatabaseQuery
     * @since 3.3.0
     */
    public function getSections()
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id` AS value, `titre` AS text FROM `#__allevents_sections` WHERE `published` = 1 ORDER BY 2");
        $datas = $db->loadObjectList();
        $list = [];

        if (count($datas) > 0) {
            foreach ($datas as $data) {
                $list[$data->value] = $data->text;
            }
        }

        return $list;
    }

    /**
     * Build an SQL query to load the latest events.
     * AllEventsModelEvents::getLatest()
     *
     * @param $limit
     *
     * @return array|JDatabaseQuery
     * @since 3.5.0
     * @throws Exception
     */
    public function getLatest($limit)
    {
        $this->setState('list.limit', $limit);
        $this->setState('list.ordering', 'created_date');
        $this->setState('list.direction', 'desc');

        return $this->getItems();
    }

    /**
     * AllEventsModelEvents::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        $items = parent::getItems();
        if (isset($items)) {
            foreach ($items as $item) {
                // Convert the params field to an array.
                $registry = new JRegistry;
                $registry->loadString($item->attribs);
                $item->attribs = $registry->toArray();
            }
        }

        return $items;
    }

    /**
     * AllEventsModelEvents::populateState()
     *
     * @param string $ordering
     * @param string $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = 'a.date', $direction = 'DESC')
    {
        // Adjust the context to support modal layouts.
        $app = JFactory::getApplication('administrator');
        // Omit double (white-)spaces and set state
        $this->setState('filter.search', preg_replace('/\s+/', ' ', $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search')));
        // Filter (dropdown) state
        $this->setState('filter.state', $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_state', '', 'string'));
        $this->setState('filter.activity', $app->getUserStateFromRequest($this->context . '.filter.activity', 'filter_activity', '', 'string'));
        $this->setState('filter.agenda', $app->getUserStateFromRequest($this->context . '.filter.agenda', 'filter_agenda', '', 'string'));
        $this->setState('filter.category', $app->getUserStateFromRequest($this->context . '.filter.category', 'filter_category', '', 'string'));
        $this->setState('filter.place', $app->getUserStateFromRequest($this->context . '.filter.place', 'filter_place', '', 'string'));
        $this->setState('filter.public', $app->getUserStateFromRequest($this->context . '.filter.public', 'filter_public', '', 'string'));
        $this->setState('filter.ressource', $app->getUserStateFromRequest($this->context . '.filter.ressource', 'filter_ressource', '', 'string'));
        $this->setState('filter.section', $app->getUserStateFromRequest($this->context . '.filter.section', 'filter_section', '', 'string'));
        $this->setState('filter.period', $app->getUserStateFromRequest($this->context . '.filter.period', 'filter_period', '', 'string'));
        $this->setState('filter.proposed_by', $app->getUserStateFromRequest($this->context . '.filter.proposed_by', 'filter_proposed_by', '', 'string'));
        $this->setState('filter.hot', $app->getUserStateFromRequest($this->context . '.filter.hot', 'filter_hot', '', 'string'));
        if (JLanguageMultilang::isEnabled()) {
            $this->setState('filter.language', $app->getUserStateFromRequest($this->context . '.filter.language', 'filter_language', ''));
        }

        // Load the parameters.
        $params = JComponentHelper::getParams('com_allevents');
        $this->setState('params', $params);

        parent::populateState($ordering, $direction);
    }

    /**
     * AllEventsModelEvents::getStoreId()
     *
     * @param string $id
     *
     * @return string
     */
    protected function getStoreId($id = '')
    {
        return parent::getStoreId($id . ':' . $this->getState('filter.search') . ':' . $this->getState('filter.state'));
    }

    /**
     * AllEventsModelEvents::getListQuery()
     *
     * @return JDatabaseQuery
     */
    protected function getListQuery()
    {
        $user = JFactory::getUser();
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        // Select the required fields from the table.
        $query->select($this->getState('list.select', 'a.*'));
        $query->from('`#__allevents_events` AS a');
        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
        // Join over the foreign key 'public_id'
        $query->select('pu.titre AS publics_titre_1119840');
        $query->join('LEFT', '#__allevents_public AS pu ON pu.id = a.public_id');
        // Join over the foreign key 'activity_id'
        $query->select('ac.titre AS activity_titre');
        $query->select('ac.couleur AS activity_couleur');
        $query->select('ac.titre AS activities_titre_1119841');
        $query->join('LEFT', '#__allevents_activities AS ac ON ac.id = a.activity_id');
        // Join over the user field 'proposed_by'
        $query->select('proposed_by.name proposed_by_name');
        $query->select('proposed_by.username proposed_by_username');
        $query->select('concat(proposed_by.name," [", proposed_by.username,"]") AS proposed_by');
        $query->select('proposed_by.id as proposed_by_id');
        $query->join('LEFT', '#__users AS proposed_by ON proposed_by.id = a.proposed_by');
        // Join over the foreign key 'agenda_id'
        $query->select('ag.titre AS agenda_titre');
        $query->select('ag.couleur AS agenda_couleur');
        $query->join('LEFT', '#__allevents_agenda AS ag ON ag.id = a.agenda_id');
        // Join over the user field 'lastmod_by'
        $query->select('lastmod_by.name AS lastmod_by');
        $query->join('LEFT', '#__users AS lastmod_by ON lastmod_by.id = a.lastmod_by');
        // Join over the foreign key 'section_id'
        $query->select('se.titre AS sections_titre_1119862');
        $query->join('LEFT', '#__allevents_sections AS se ON se.id = a.section_id');
        // Join over the foreign key 'category_id'
        $query->select('ca.id AS categories_id_1119863');
        $query->select('ca.titre AS category_titre');
        $query->select('ca.couleur AS category_couleur');
        $query->join('LEFT', '#__allevents_categories AS ca ON ca.id = a.category_id');
        // Join over the foreign key 'ressource_id'
        $query->select('re.titre AS ressources_titre_1119864');
        $query->join('LEFT', '#__allevents_ressources AS re ON re.id = a.ressource_id');
        // Join over the foreign key 'place_id'
        $query->select('pl.titre AS places_titre_1119865');
        $query->join('LEFT', '#__allevents_places AS pl ON pl.id = a.place_id');
        // Join over the user field 'contact_person'
        //$query->select('contact_person.name AS contact_person');
        //$query->join('LEFT', '#__users AS contact_person ON contact_person.id = a.contact_person');
        // Join over the user field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
        $query->select('(select count(*) from `#__allevents_enrolments` b where b.event_id=a.id and b.published=1) nb_enrol');
        $query->select('(select count(*) from `#__allevents_enrolments` b where b.event_id=a.id and b.published=1 and enroltype=0) nb_enrol_yes');
        // Join over the asset groups.
        $query->select('vl.title AS access_level')->join('LEFT', '#__viewlevels AS vl ON vl.id = a.access');
        // Filter by published state
        $published = $db->escape($this->getState('filter.state'));
        if (is_numeric($published)) {
            $query->where('a.published = ' . (int)$published);
        } else {
            $query->where('(a.published IN (0, 1))');
        }
        $query->where('(a.titre <> \'\')');

        // Join over the language
        if (JLanguageMultilang::isEnabled()) {
            $query->select('l.title AS language_title');
            $query->join('LEFT', $db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language');
        }

        // Filter by search in title
        $search = $db->escape($this->getState('filter.search'));
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int)substr($search, 3));
            } else {
                $search = $db->quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.titre LIKE ' . $search . '  OR  CAST(a.id as CHAR) LIKE ' . $search . '  OR  a.date LIKE ' . $search . '  OR  a.enddate LIKE ' . $search . ' )');
            }
        }

        $activity = $db->escape($this->getState('filter.activity'));
        if (is_numeric($activity)) {
            $query->where('a.activity_id=' . (int)$activity);
        }

        $agenda = $db->escape($this->getState('filter.agenda'));
        if (is_numeric($agenda)) {
            $query->where('a.agenda_id=' . (int)$agenda);
        }

        $category = $db->escape($this->getState('filter.category'));
        if (is_numeric($category)) {
            $query->where('a.category_id=' . (int)$category);
        }

        $place = $db->escape($this->getState('filter.place'));
        if (is_numeric($place)) {
            $query->where('a.place_id=' . (int)$place);
        }

        $public = $db->escape($this->getState('filter.public'));
        if (is_numeric($public)) {
            $query->where('a.public_id=' . (int)$public);
        }

        $ressource = $db->escape($this->getState('filter.ressource'));
        if (is_numeric($ressource)) {
            $query->where('a.ressource_id=' . (int)$ressource);
        }

        $section = $db->escape($this->getState('filter.section'));
        if (is_numeric($section)) {
            $query->where('a.section_id=' . (int)$section);
        }

        $proposed_by = $db->escape($this->getState('filter.proposed_by'));
        if (is_numeric($proposed_by)) {
            $query->where('a.proposed_by=' . (int)$proposed_by);
        }

        $hot = $db->escape($this->getState('filter.hot'));
        if (is_numeric($hot)) {
            if ($hot) {
                $query->where('a.hot=1');
            }
        }

        $period = $db->escape($this->getState('filter.period'));
        if (is_numeric($period)) {
            if ($period == 1) {
                $query->where("DATE_FORMAT(a.enddate,'%Y%m%d') >= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d')");
            } elseif ($period == 2) {
                $query->where("DATE_FORMAT(a.date,'%Y%m%d') <= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d')");
            } elseif ($period == 3) {
                $query->where("DATE_FORMAT(a.enddate,'%Y%m%d') >= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d')");
                $query->where("DATE_FORMAT(a.date,'%Y%m%d') <= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d')");
            }
        }
        if (JLanguageMultilang::isEnabled()) {
            // Filter on the language.
            if ($language = $db->escape($this->getState('filter.language'))) {
                $query->where('a.language = ' . $db->quote($language));
            }
        }

        // Implement View Level Access
        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
            $query->where('(ifnull(ag.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ag.access=0))');
            $query->where('(ifnull(ac.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ac.access=0))');
            $query->where('(ifnull(ca.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ca.access=0))');
            $query->where('(ifnull(pl.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pl.access=0))');
            $query->where('(ifnull(pu.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pu.access=0))');
            $query->where('(ifnull(re.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (re.access=0))');
            $query->where('(ifnull(se.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (se.access=0))');
        }

        // Add the list ordering clause.
        $query->order($db->escape($this->getState('list.fullordering', 'a.date DESC')));

        return $query;
    }
}
