<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AlleventsModelAgendas
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AlleventsModelAgendas extends JModelList
{
    /**
     * AlleventsModelAgendas constructor.
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * AlleventsModelAgendas::GetAgendas()
     *
     * @return array
     */
    public function GetAgendas()
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `id`, `titre` AS `display`, `default` FROM `#__allevents_agenda` WHERE `published`=1 ORDER BY 2");
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
        $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_agenda` WHERE `published`=1 AND `default`=1");
        $loaddb = $db->loadResult();
        if (empty($loaddb)) {
            $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_agenda` WHERE `published`=1");
            $loaddb = $db->loadResult();
        }

        return $loaddb;
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since    1.6
     *
     * @param null $ordering
     * @param null $direction
     */
    protected function populateState($ordering = null, $direction = null)
    {
        $this->setState('list.limit', 0);
        $this->setState('list.start', 0);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return    JDatabaseQuery
     * @since    1.6
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select($this->getState('list.select', 'a.*'));
        $query->select('(select count(*) from `#__allevents_events` b where b.agenda_id=a.id and b.published=1) nb_events');
        $query->from('`#__allevents_agenda` AS a');
        $query->where('(a.published = 1)');
        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
        }

        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

        // Join over the created by field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

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
        $query->order('titre ASC');

        return $query;
    }
}
