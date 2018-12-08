<?php
defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsModelAECBUsersBack
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

/**
 * Methods supporting a list of CB user records.
 */
class AllEventsModelAECBUsersBack extends JModelList
{
    /**
     * Constructor.
     *
     * @param array $config
     *            An optional associative array of configuration settings.
     *
     * @see JModelList
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = ['id', 'cbu.id', 'username', 'ju.username', 'name', 'ju.name', 'email',
                'ju.email', 'cbu.id', 'group_id', 'range', 'state'];
        }

        parent::__construct($config);
    }

    /**
     * Gets the list of users and adds expensive joins to the result set.
     *
     * @return mixed An array of data items on success, false on failure.
     * @throws Exception
     */
    public function getItems()
    {
        // Get a storage key.
        $store = $this->getStoreId();

        // Try to load the data from internal storage.
        if (empty($this->cache[$store])) {
            $groups = $this->getState('filter.groups');
            $groupId = $this->getState('filter.group_id');

            if (isset($groups) && (empty($groups) || $groupId && !in_array($groupId, $groups))) {
                $items = [];
            } else {
                $items = parent::getItems();
            }

            // Bail out on an error or empty list.
            if (empty($items)) {
                $this->cache[$store] = $items;

                return $items;
            }

            // Joining the groups with the main query is a performance hog.
            // Find the information only on the result set.

            // First pass: get list of the user id's and reset the counts.
            $userIds = [];

            foreach ($items as $item) {
                $userIds[] = (int)$item->id;
                $item->group_count = 0;
                $item->group_names = '';
            }

            // Get the counts from the database only for the users in the list.
            $db = $this->getDbo();
            $query = $db->getQuery(true);

            // Join over the group mapping table.
            $query->select('map.user_id, COUNT(map.group_id) AS group_count')->from('#__user_usergroup_map AS map')->where(
                'map.user_id IN (' . implode(',', $userIds) . ')')->group('map.user_id')->
            // Join over the user groups table.
            join('LEFT', '#__usergroups AS g2 ON g2.id = map.group_id');

            $db->setQuery($query);

            // Load the counts into an array indexed on the user id field.
            try {
                $userGroups = $db->loadObjectList('user_id');
            } catch (RuntimeException $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }

            // Second pass: collect the group counts into the master items array.
            foreach ($items as &$item) {
                if (isset($userGroups[$item->id])) {
                    $item->group_count = $userGroups[$item->id]->group_count;

                    // Group_concat in other databases is not supported
                    $item->group_names = $this->_getUserDisplayedGroups($item->id);
                }
            }

            // Add the items to the internal cache.
            $this->cache[$store] = $items;
        }

        return $this->cache[$store];
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param string $id
     *            A prefix for the store id.
     *
     * @return string A store id.
     */
    protected function getStoreId($id = '')
    {
        // Compile the store id.
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.group_id');

        return parent::getStoreId($id);
    }

    /**
     * @param integer $user_id
     *            User identifier
     *
     * @return string Groups titles imploded :$
     */
    protected function _getUserDisplayedGroups($user_id)
    {
        $db = $this->getDbo();
        $query = "SELECT title FROM " . $db->quoteName('#__usergroups') . " ug LEFT JOIN " .
            $db->quoteName('#__user_usergroup_map') . " map ON (ug.id = map.group_id)" . " WHERE map.user_id=" .
            (int)$user_id;

        $db->setQuery($query);
        $result = $db->loadColumn();

        return implode("\n", $result);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @param string $ordering
     *            An optional ordering field.
     * @param string $direction
     *            An optional direction (asc|desc).
     *
     * @return void
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication('administrator');

        // Adjust the context to support modal layouts.
        if ($layout = $app->input->get('layout', 'default', 'cmd')) {
            $this->context .= '.' . $layout;
        }

        // Load the filter state.
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $groupId = $this->getUserStateFromRequest($this->context . '.filter.group', 'filter_group_id', null, 'int');
        $this->setState('filter.group_id', $groupId);

        $groups = json_decode(base64_decode($app->input->get('groups', '', 'BASE64')));

        if (isset($groups)) {
            ArrayHelper::toInteger($groups);
        }

        $this->setState('filter.groups', $groups);

        $excluded = json_decode(base64_decode($app->input->get('excluded', '', 'BASE64')));

        if (isset($excluded)) {
            ArrayHelper::toInteger($excluded);
        }

        $this->setState('filter.excluded', $excluded);

        // Load the parameters.
        $params = JComponentHelper::getParams('com_users');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('ju.name', 'asc');
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return JDatabaseQuery
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select($this->getState('list.select', 'cbu.id, ju.username, ju.name, ju.email'));

        $query->from($db->quoteName('#__comprofiler') . ' AS cbu');
        $query->innerJoin($db->quoteName('#__users') . ' AS ju ON cbu.`user_id`=ju.`id`');
        $query->where('cbu.`confirmed`', 'AND');
        $query->where('NOT cbu.`banned`', 'AND');
        $query->where('NOT ju.`block`', 'AND');

        // Filter the items over the group id if set.
        $groupId = $this->getState('filter.group_id');
        $groups = $this->getState('filter.groups');

        if ($groupId || isset($groups)) {
            $query->leftJoin('`#__user_usergroup_map` AS map2 ON map2.`user_id` = ju.`id`')->group(
                $db->quoteName(
                    ['ju.id', 'ju.name', 'ju.username', 'ju.password', 'ju.block', 'ju.sendEmail',
                        'ju.registerDate', 'ju.lastvisitDate', 'ju.activation', 'ju.params', 'ju.email']));

            if ($groupId) {
                $query->where('map2.`group_id` = ' . (int)$groupId);
            }

            if (isset($groups)) {
                $query->where('map2.`group_id` IN (' . implode(',', $groups) . ')');
            }
        }

        // Filter the items over the search string if set.
        if ($this->getState('filter.search') !== '' && $this->getState('filter.search') !== null) {
            // Escape the search token.
            $search = trim($this->getState('filter.search'));
            $search_like = $db->quote('%' . str_replace(' ', '%', $db->escape($search, true) . '%'));

            // Compile the different search clauses.
            $searches = [];
            $searches[] = 'ju.name LIKE ' . $search_like;
            $searches[] = 'ju.username LIKE ' . $search_like;
            $searches[] = 'ju.email LIKE ' . $search_like;
            $filter_options = ['options' => ['min_range' => 1]];
            if (filter_var($search, FILTER_VALIDATE_INT, $filter_options) !== false) {
                $searches[] = 'cbu.id = ' . filter_var($search, FILTER_VALIDATE_INT, $filter_options);
            }
            // Add the clauses to the query.
            $query->where('(' . implode(' OR ', $searches) . ')');
        }

        // Add the list ordering clause.
        $query->order(
            $db->qn($db->escape($this->getState('list.ordering', 'ju.name'))) . ' ' .
            $db->escape($this->getState('list.direction', 'ASC')));

        return $query;
    }
}
