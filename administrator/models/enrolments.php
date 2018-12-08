<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelEnrolments
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelEnrolments extends JModelList
{
    /**
     * AllEventsModelEnrolments::__construct()
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'id', 'en.id',
                'published', 'e.published',
                'titre', 'e.titre',
                'name', 'user_id.name',
                'rank', 'en.rank'];
        }
        parent::__construct($config);
    }

    /**
     * AllEventsModelEnrolments::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * AllEventsModelEnrolments::getEnrolmentsByEvent()
     *
     * @param mixed $event_id
     *
     * @return objectlist
     */
    public function getEnrolmentsByEvent($event_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT user_id.name, user_id.email FROM `#__allevents_enrolments` en LEFT OUTER JOIN #__users AS user_id ON user_id.id = en.user_id WHERE published=1 AND event_id = " . (int)$event_id);
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AllEventsModelEnrolments::getEnrolmentsYesByEvent()
     *
     * @param mixed $event_id
     * @param integer $limit
     *
     * @return array()
     * @since   3.3.1
     */
    public function getEnrolmentsYesByEvent($event_id, $limit)
    {
        $db = $this->getDbo();
        if ($limit == 0) {
            $db->setQuery("SELECT email FROM #__allevents_enrolments en INNER JOIN #__users ON en.user_id = #__users.id WHERE enroltype=0 AND en.published=1 AND event_id = " . (int)$event_id);
        } else {
            $db->setQuery("SELECT email FROM #__allevents_enrolments en INNER JOIN #__users ON en.user_id = #__users.id WHERE enroltype=0 AND en.published=1 AND event_id = " . (int)$event_id . " LIMIT 0," . (int)$limit);
        }
        $loaddb = $db->loadColumn();

        return $loaddb;
    }

    /**
     * AllEventsModelEnrolments::getEnrolmentsWaitingByEvent()
     *
     * @param mixed $event_id
     * @param integer $limit
     *
     * @return array()
     * @since   3.3.1
     */
    public function getEnrolmentsWaitingByEvent($event_id, $limit)
    {
        $db = $this->getDbo();
        if ($limit == 0) {
            $loaddb = [];
        } else {
            $limit = (int)$limit + 1;
            $db->setQuery("SELECT email FROM #__allevents_enrolments en INNER JOIN #__users ON en.user_id = #__users.id WHERE enroltype=0 AND en.published=1 AND event_id = " . (int)$event_id . " LIMIT " . $limit . ",1000000");
            $loaddb = $db->loadColumn();
        }

        return $loaddb;
    }

    /**
     * AllEventsModelEnrolments::getEnrolmentsNoByEvent()
     *
     * @param mixed $event_id
     *
     * @return array()
     * @since   3.3.1
     */
    public function getEnrolmentsNoByEvent($event_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT email FROM #__allevents_enrolments en INNER JOIN #__users ON en.user_id = #__users.id WHERE enroltype=1 AND en.published=1 AND event_id = " . (int)$event_id);
        $loaddb = $db->loadColumn();

        return $loaddb;
    }

    /**
     * AllEventsModelEnrolments::getEnrolmentsPerhapsByEvent()
     *
     * @param mixed $event_id
     *
     * @return array()
     * @since   3.3.1
     */
    public function getEnrolmentsPerhapsByEvent($event_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT email FROM #__allevents_enrolments en INNER JOIN #__users ON en.user_id = #__users.id WHERE enroltype=2 AND en.published=1 AND event_id = " . (int)$event_id);
        $loaddb = $db->loadColumn();

        return $loaddb;
    }

    /**
     * AllEventsModelEnrolments::getEnrolmentsPendingByEvent()
     *
     * @param mixed $event_id
     *
     * @return array()
     * @since   3.3.1
     */
    public function getEnrolmentsPendingByEvent($event_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT email FROM #__allevents_enrolments en INNER JOIN #__users ON en.user_id = #__users.id WHERE enroltype=3 AND en.published=1 AND event_id = " . (int)$event_id);
        $loaddb = $db->loadColumn();

        return $loaddb;
    }

    /**
     * AllEventsModelEvents::getEnrolmentsToApprove()
     *
     * @return mixed
     */
    public function getEnrolmentsToApprove()
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT id, user_id FROM `#__allevents_enrolments` WHERE enroltype=3 AND published=1");
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AllEventsModelEnrolments::refresh_enrol_status()
     *
     * @throws Exception
     */
    public function refresh_enrol_status()
    {
        try {
            $db = JFactory::getDbo();

            $sql = ' update #__allevents_enrolments a';
            $sql .= ' set a.pending = 0 ';
            $sql .= ' where a.pending = 1';
            $sql .= ' and a.enroltype <> 0';
            $sql .= ' and exists (select 1 from #__allevents_orders b where a.order_id = b.id and b.status = "P")';

            $db->setQuery($sql);
            $db->execute();
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage('Error ' . $e->getMessage());
        }
    }

    /**
     * AllEventsModelEnrolments::populateState()
     *
     * @param string $ordering
     * @param string $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = 'en.id', $direction = 'ASC')
    {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        $this->setState('filter.search', $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search'));
        $this->setState('filter.state', $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string'));
        $this->setState('filter.event_id', $app->getUserStateFromRequest($this->context . '.filter.event_id', 'filter_event_id', '', 'string'));
        $this->setState('filter.period', $app->getUserStateFromRequest($this->context . '.filter.period', 'filter_period', '', 'string'));
        $this->setState('filter.enroltype', $app->getUserStateFromRequest($this->context . '.filter.enroltype', 'filter_enroltype', '', 'string'));

        // Load the parameters.
        $params = JComponentHelper::getParams('com_allevents');
        $this->setState('params', $params);

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * AllEventsModelEnrolments::getStoreId()
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
     * AllEventsModelEnrolments::getListQuery()
     *
     * @return JDatabaseQuery|string
     */
    protected function getListQuery()
    {
        $user = JFactory::getUser();
        // Create a new query object.
        $db = $this->getDbo();
        $sql = ' select e.titre event_titre, DATE_FORMAT(e.date, "%Y-%m-%d %H:%i") AS event_date, DATE_FORMAT(e.enddate, "%Y-%m-%d %H:%i") AS event_enddate,  e.allday AS event_allday,';
        $sql .= '        commentaire,';
        $sql .= '        e.activity_id, ac.titre activity_titre,';
        $sql .= '        e.agenda_id, ag.titre agenda_titre,';
        $sql .= '        e.category_id, ca.titre category_titre,';
        $sql .= '        e.place_id, pl.titre place_titre,';
        $sql .= '        e.public_id, pu.titre public_titre,';
        $sql .= '        e.ressource_id, re.titre ressource_titre,';
        $sql .= '        e.section_id, se.titre section_titre,';
        $sql .= '        user_id.name AS user_name,';
        $sql .= '        user_id.email AS user_email,';
        $sql .= '        en.pending, en.companions, en.published, en.event_id, en.enroltype, en.enroldate, en.rank, en.id, en.lastmod';
        $sql .= ' from (SELECT u1.user_id, u1.published, u1.event_id, u1.id, u1.enroltype, u1.lastmod, DATE_FORMAT(u1.enroldate, "%Y-%m-%d %H:%i") enroldate, u1.commentaire, u1.companions, u1.pending, count(u2.enroldate)+1 as rank';
        $sql .= '       FROM #__allevents_enrolments u1';
        $sql .= '       LEFT OUTER JOIN #__allevents_enrolments as u2 ON ((u2.enroldate < u1.enroldate) and (u2.enroltype = u1.enroltype) and (u2.event_id = u1.event_id) and (u2.published = u1.published))';
        // Filter by published state
        $published = $this->getState('filter.state');
        if (is_numeric($published)) {
            $sql .= 'where (u1.published = ' . (int)$published . ')';
        } elseif ($published === '') {
            $sql .= 'where (u1.published IN (0, 1))';
        }

        $sql .= '       GROUP BY u1.user_id, u1.published, u1.event_id, u1.id, u1.enroltype, u1.lastmod, u1.enroldate, u1.companions, u1.pending) as en ';
        $sql .= ' inner join #__allevents_events AS e ON en.event_id = e.id';
        $sql .= ' left outer join #__allevents_agenda AS ag ON ag.id = e.agenda_id and ag.published = 1';
        $sql .= ' left outer join #__allevents_activities AS ac ON ac.id = e.activity_id and ac.published = 1';
        $sql .= ' left outer join #__allevents_categories AS ca ON ca.id = e.category_id and ca.published = 1';
        $sql .= ' left outer join #__allevents_places AS pl ON pl.id = e.place_id and pl.published = 1';
        $sql .= ' left outer join #__allevents_public AS pu ON pu.id = e.public_id and pu.published = 1';
        $sql .= ' left outer join #__allevents_ressources AS re ON re.id = e.ressource_id and re.published = 1';
        $sql .= ' left outer join #__allevents_sections AS se ON se.id = e.section_id and se.published = 1';
        $sql .= ' left outer join #__users AS user_id ON user_id.id = en.user_id';
        $sql .= ' where (e.published = 1)';
        $sql .= ' and (e.cancelled IN (0, 1))';
        $sql .= ' and (e.proposal = 0)';
        // Implement View Level Access
        if (!$user->authorise('core.admin')) {
            $sql .= ' and (e.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (e.access=0))';
            $sql .= ' and (ifnull(ag.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ag.access=0))';
            $sql .= ' and (ifnull(ac.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ac.access=0))';
            $sql .= ' and (ifnull(ca.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ca.access=0))';
            $sql .= ' and (ifnull(pl.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pl.access=0))';
            $sql .= ' and (ifnull(pu.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pu.access=0))';
            $sql .= ' and (ifnull(re.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (re.access=0))';
            $sql .= ' and (ifnull(se.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (se.access=0))';
        }
        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $sql .= ' and (en.id = ' . (int)substr($search, 3) . ' )';
            } else {
                $search = $db->quote('%' . $db->escape($search, true) . '%');
                $sql .= ' and (e.titre LIKE ' . $search . ' OR  e.date LIKE ' . $search . '  OR  e.enddate LIKE ' . $search . ' )';
            }
        }

        $event_id = $db->escape($this->getState('filter.event_id'));
        if (is_numeric($event_id)) {
            $sql .= ' and (en.event_id=' . (int)$event_id . ' )';
        }

        $enroltype = $db->escape($this->getState('filter.enroltype'));
        if (is_numeric($enroltype)) {
            $sql .= ' and (en.enroltype=' . (int)$enroltype . ' )';
        }

        $period = $db->escape($this->getState('filter.period'));
        if (is_numeric($period)) {
            if ((int)$period == 1) {
                $sql .= " and (DATE_FORMAT(e.date,'%Y%m%d') >= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d'))";
            } else {
                $sql .= " and (DATE_FORMAT(e.date,'%Y%m%d') <= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d'))";
            }
        }
        // Add the list ordering clause.
        $order_by = $db->escape($this->getState('list.fullordering', 'en.id DESC'));
        if (!empty($order_by)) {
            $sql .= ' order by ' . $order_by;
        } else {
            $sql .= ' order by en.id DESC';
        }

        return $sql;
    }
}
