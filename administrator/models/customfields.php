<?php

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of AllEvents custom fields.
 */
class AllEventsModelcustomfields extends JModelList
{
    /**
     * Constructor.
     *
     * @param    array        An optional associative array of configuration settings.
     *
     * @see        JController
     * @since      3.4.0
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'id',
                'a.id',
                'published',
                'a.published',
                'titre',
                'a.titre',
                'slug',
                'a.slug',
                'parent_form',
                'a.parent_form',
                'type',
                'a.type',
                'required',
                'a.required',
            ];
        }

        parent::__construct($config);
    }

    /**
     * AllEventsModelcustomfields::getNbCustomfields()
     *
     * @return integer
     */
    function getNbCustomfields()
    {
        // Create a new query object.
        $db = JFactory::getDbo();
        $db->setQuery("SELECT count(*) AS nb FROM `#__allevents_customfields` WHERE published = 1");
        $loaddb = $db->loadObjectList();
        $nb = 0;
        foreach ($loaddb as $row) {
            $nb = $row->nb;
        }

        return $nb;
    }

    /**
     * AllEventsModelcustomfields::populateState()
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since    3.4.0
     *
     * @param null $ordering
     * @param null $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the filter state.
        $this->setState('filter.search', $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search'));
        $this->setState('filter.state', $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string'));
        $this->setState('filter.parent_form', $app->getUserStateFromRequest($this->context . '.filter.parent_form', 'filter_parent_form', '', 'string'));
        $this->setState('filter.type', $app->getUserStateFromRequest($this->context . '.filter.type', 'filter_type', '', 'string'));

        // Load the parameters.
        $params = JComponentHelper::getParams('com_allevents');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.titre', 'asc');
    }

    /**
     * AllEventsModelcustomfields::getStoreId()
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param    string $id A prefix for the store id.
     *
     * @return    string        A store id.
     * @since    3.4.0
     */
    protected function getStoreId($id = '')
    {
        // Compile the store id.
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * AllEventsModelcustomfields::getListQuery()
     * Build an SQL query to load the list data.
     *
     * @return    JDatabaseQuery
     * @since    3.4.0
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select($this->getState('list.select', 'a.*'));
        $query->from('`#__allevents_customfields` AS a');

        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

        // Filter by published state
        $published = $this->getState('filter.state');

        if (is_numeric($published)) {
            $query->where($db->qn('a.published') . ' = ' . (int)$published);
        } elseif ($published === '') {
            $query->where($db->qn('a.published') . ' IN (0, 1)');
        }

        // Filter by Parent Form
        $parent_form = $db->escape($this->getState('filter.parent_form'));

        if (!empty($parent_form)) {
            $query->where($db->qn('a.parent_form') . ' = ' . (int)$parent_form);
        }

        // Filter by Field Type
        $type = $db->escape($this->getState('filter.type'));

        if (!empty($type)) {
            $query->where($db->qn('a.type') . ' = ' . (string )$db->q($type));
        }

        // Search Filters
        $search = $this->getState('filter.search');

        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where($db->qn('a.id') . ' = ' . (int)substr($search, 3));
            } else {
                $search = $db->quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.titre LIKE ' . $search . '  OR  a.slug LIKE ' . $search . '  OR  a.type LIKE ' . $search . ' )');
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
