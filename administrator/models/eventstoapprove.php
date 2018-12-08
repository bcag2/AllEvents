<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelEventsToApprove
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelEventsToApprove extends JModelList
{
    /**
     * AllEventsModelEventsToApprove::__construct()
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
                'description',
                'a.description',
                'intro',
                'a.intro',
                'public_id',
                'a.public_id',
                'activity_id',
                'a.activity_id',
                'date',
                'a.date',
                'enddate',
                'a.enddate',
                'vignette',
                'a.vignette',
                'affiche',
                'a.affiche',
                'banniere',
                'a.banniere',
                'published',
                'a.published',
                'enrolment_enabled',
                'a.enrolment_enabled',
                'enrolment_max_participant',
                'a.enrolment_max_participant',
                'proposal',
                'a.proposal',
                'proposed_by',
                'a.proposed_by',
                'agenda_id',
                'a.agenda_id',
                'lastmod',
                'a.lastmod',
                'access',
                'a.access',
                'hits',
                'a.hits',
                'intern_album_id',
                'a.intern_album_id',
                'extern_album_id',
                'a.extern_album_id',
                'lastmod_by',
                'a.lastmod_by',
                'created_date',
                'a.created_date',
                'version',
                'a.version',
                'section_id',
                'a.section_id',
                'category_id',
                'a.category_id',
                'ressource_id',
                'a.ressource_id',
                'place_id',
                'a.place_id',
                'allow_overbooking',
                'a.allow_overbooking',
                'hot',
                'a.hot',
                'contiguous_date',
                'a.contiguous_date',
                'closingdate',
                'a.closingdate',
                'openingdate',
                'a.openingdate',
                'expirationdate',
                'a.expirationdate',
                'showincalendar',
                'a.showincalendar',
                'ordering',
                'a.ordering',
                'created_by',
                'a.created_by',
                'additional_info',
                'a.additional_info',
                'enrolment_info',
                'a.enrolment_info',
                'metakey',
                'a.metakey',
                'metadesc',
                'a.metadesc',
                'metarobots',
                'a.metarobots',
                'publishingdate',
                'a.publishingdate',
                'cancelled',
                'a.cancelled'];
        }

        parent::__construct($config);
    }

    /**
     * AllEventsModelEventsToApprove::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        $items = parent::getItems();

        foreach ($items as $oneItem) {
            if (isset($oneItem->public_id)) {
                $values = explode(',', $oneItem->public_id);

                $textValue = [];
                foreach ($values as $value) {
                    $db = $this->getDbo();
                    $query = $db->getQuery(true);
                    $query->select('image_bullet')->from('`#__allevents_public`')->where('id = ' . (int)$db->quote($db->escape($value)));
                    $db->setQuery($query);
                    $results = $db->loadObject();
                    if ($results) {
                        $textValue[] = $results->image_bullet;
                    }
                }

                $oneItem->public_id = !empty($textValue) ? implode(', ', $textValue) : $oneItem->public_id;
            }

            if (isset($oneItem->activity_id)) {
                $values = explode(',', $oneItem->activity_id);

                $textValue = [];
                foreach ($values as $value) {
                    $db = $this->getDbo();
                    $query = $db->getQuery(true);
                    $query->select('image_bullet')->from('`#__allevents_activities`')->where('id = ' . $db->quote($db->escape($value)));
                    $db->setQuery($query);
                    $results = $db->loadObject();
                    if ($results) {
                        $textValue[] = $results->image_bullet;
                    }
                }

                $oneItem->activity_id = !empty($textValue) ? implode(', ', $textValue) : $oneItem->activity_id;
            }

            if (isset($oneItem->agenda_id)) {
                $values = explode(',', $oneItem->agenda_id);

                $textValue = [];
                foreach ($values as $value) {
                    $db = $this->getDbo();
                    $query = $db->getQuery(true);
                    $query->select('image_bullet')->from('`#__allevents_agenda`')->where('id = ' . (int)$db->quote($db->escape($value)));
                    $db->setQuery($query);
                    $results = $db->loadObject();
                    if ($results) {
                        $textValue[] = $results->image_bullet;
                    }
                }

                $oneItem->agenda_id = !empty($textValue) ? implode(', ', $textValue) : '';
            }
            // if (isset($oneItem->intern_album_id)) {
            // $values = explode(',', $oneItem->intern_album_id);
            // $textValue = array();
            // foreach ($values as $value) {
            // $db    = $this->getDbo();
            // $query = $db->getQuery(true);
            // $query->select('image_bullet')->from('`#__allevents_albums`')->where('id = ' .(int) $db->quote($db->escape($value)));
            // $db->setQuery($query);
            // $results = $db->loadObject();
            // if ($results) {
            // $textValue[] = $results->image_bullet;
            // }
            // }
            // $oneItem->intern_album_id = !empty($textValue) ? implode(', ', $textValue) : $oneItem->intern_album_id;
            // }
            if (isset($oneItem->section_id)) {
                $values = explode(',', $oneItem->section_id);

                $textValue = [];
                foreach ($values as $value) {
                    $db = $this->getDbo();
                    $query = $db->getQuery(true);
                    $query->select('image_bullet')->from('`#__allevents_sections`')->where('id = ' . (int)$db->quote($db->escape($value)));
                    $db->setQuery($query);
                    $results = $db->loadObject();
                    if ($results) {
                        $textValue[] = $results->image_bullet;
                    }
                }

                $oneItem->section_id = !empty($textValue) ? implode(', ', $textValue) : $oneItem->section_id;
            }

            if (isset($oneItem->category_id)) {
                $values = explode(',', $oneItem->category_id);

                $textValue = [];
                foreach ($values as $value) {
                    $db = $this->getDbo();
                    $query = $db->getQuery(true);
                    $query->select('image_bullet')->from('`#__allevents_categories`')->where('id = ' . (int)$db->quote($db->escape($value)));
                    $db->setQuery($query);
                    $results = $db->loadObject();
                    if ($results) {
                        $textValue[] = $results->image_bullet;
                    }
                }

                $oneItem->category_id = !empty($textValue) ? implode(', ', $textValue) : $oneItem->category_id;
            }

            if (isset($oneItem->ressource_id)) {
                $values = explode(',', $oneItem->ressource_id);

                $textValue = [];
                foreach ($values as $value) {
                    $db = $this->getDbo();
                    $query = $db->getQuery(true);
                    $query->select('image_bullet')->from('`#__allevents_ressources`')->where('id = ' . (int)$db->quote($db->escape($value)));
                    $db->setQuery($query);
                    $results = $db->loadObject();
                    if ($results) {
                        $textValue[] = $results->image_bullet;
                    }
                }

                $oneItem->ressource_id = !empty($textValue) ? implode(', ', $textValue) : $oneItem->ressource_id;
            }

            if (isset($oneItem->place_id)) {
                $values = explode(',', $oneItem->place_id);

                $textValue = [];
                foreach ($values as $value) {
                    $db = $this->getDbo();
                    $query = $db->getQuery(true);
                    $query->select('image_bullet')->from('`#__allevents_places`')->where('id = ' . (int)$db->quote($db->escape($value)));
                    $db->setQuery($query);
                    $results = $db->loadObject();
                    if ($results) {
                        $textValue[] = $results->image_bullet;
                    }
                }

                $oneItem->place_id = !empty($textValue) ? implode(', ', $textValue) : $oneItem->place_id;
            }
        }

        return $items;
    }

    /**
     * AllEventsModelEventsToApprove::populateState()
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
     * AllEventsModelEventsToApprove::getStoreId()
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
     * AllEventsModelEventsToApprove::getListQuery()
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
        $query->from('`#__allevents_events` AS a');
        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
        // Join over the foreign key 'public_id'
        $query->select('#__allevents_public_1119840.titre AS publics_titre_1119840');
        $query->join('LEFT', '#__allevents_public AS #__allevents_public_1119840 ON #__allevents_public_1119840.id = a.public_id');
        // Join over the foreign key 'activity_id'
        $query->select('#__allevents_activities_1119841.titre AS activity_titre');
        $query->join('LEFT', '#__allevents_activities AS #__allevents_activities_1119841 ON #__allevents_activities_1119841.id = a.activity_id');
        // Join over the user field 'proposed_by'
        $query->select('proposed_by.name AS proposed_by');
        $query->join('LEFT', '#__users AS proposed_by ON proposed_by.id = a.proposed_by');
        // Join over the foreign key 'agenda_id'
        $query->select('#__allevents_agenda_1119852.titre AS agenda_titre');
        $query->join('LEFT', '#__allevents_agenda AS #__allevents_agenda_1119852 ON #__allevents_agenda_1119852.id = a.agenda_id');
        // Join over the foreign key 'intern_album_id'
        // $query->select('#__allevents_albums_1119857.titre AS albums_titre_1119857');
        // $query->join('LEFT', '#__allevents_albums AS #__allevents_albums_1119857 ON #__allevents_albums_1119857.id = a.intern_album_id');
        // Join over the user field 'lastmod_by'
        $query->select('lastmod_by.name AS lastmod_by');
        $query->join('LEFT', '#__users AS lastmod_by ON lastmod_by.id = a.lastmod_by');
        // Join over the foreign key 'section_id'
        $query->select('#__allevents_sections_1119862.titre AS section_titre');
        $query->join('LEFT', '#__allevents_sections AS #__allevents_sections_1119862 ON #__allevents_sections_1119862.id = a.section_id');
        // Join over the foreign key 'category_id'
        $query->select('#__allevents_categories_1119863.id AS categories_id_1119863');
        $query->join('LEFT', '#__allevents_categories AS #__allevents_categories_1119863 ON #__allevents_categories_1119863.id = a.category_id');
        // Join over the foreign key 'ressource_id'
        $query->select('#__allevents_ressources_1119864.titre AS ressources_titre_1119864');
        $query->join('LEFT', '#__allevents_ressources AS #__allevents_ressources_1119864 ON #__allevents_ressources_1119864.id = a.ressource_id');
        // Join over the foreign key 'place_id'
        $query->select('#__allevents_places_1119865.titre AS places_titre_1119865');
        $query->join('LEFT', '#__allevents_places AS #__allevents_places_1119865 ON #__allevents_places_1119865.id = a.place_id');
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
        // on ne prend pas les elements supprimes
        $query->where('(a.proposal = 1)');
        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int)substr($search, 3));
            } else {
                $search = $db->quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.titre LIKE ' . $search . '  OR  a.date LIKE ' . $search . '  OR  a.enddate LIKE ' . $search . ' )');
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
