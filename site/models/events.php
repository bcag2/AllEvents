<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');
if (!class_exists('AllEventsHelperString'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/string.php';
if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

use Joomla\Utilities\ArrayHelper;

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
    protected $aeparams = array();

    /**
     * AllEventsModelEvents::__construct()
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * AllEventsModelEvents::addParam()
     *
     * @param mixed $name
     * @param mixed $value
     */
    public function addParam($name, $value)
    {
        $this->aeparams[$name] = $value;
        $this->aeparams[$name] = $value;
        //JFactory::getApplication()->enqueueMessage("<".print_r($this->aeparams,true).">", 'error' ) ;
    }

    /**
     * AllEventsModelEvents::getItems()
     *
     * @return bool|mixed
     * @throws Exception
     */
    public function getItems()
    {
        // Get a storage key.
        $store = $this->getStoreId();
        // Try to load the data from internal storage.
        if (isset($this->cache[$store])) {
            return $this->cache[$store];
        }
        // Load the list items.
        $query = $this->getListQuery();
        try {
            $items = $this->_getList($query, $this->getState('list.start'), $this->getState('list.limit'));
            $items = $this->_CompleteItems($items);

        } catch (RuntimeException $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return false;
        }
        // Add the items to the internal cache.
        $this->cache[$store] = $items;

        return $this->cache[$store];
    }


    /**
     * AllEventsModelEvents::getListQuery()
     *
     * @return JDatabaseQuery
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $user = JFactory::getUser();
        $db->setQuery('SET SQL_BIG_SELECTS=1');
        $db->execute();
        $query = $db->getQuery(true);
        // Select the required fields from the table.
        $query->select($this->getState('list.select', 'a.*'));
        if (!isset($this->aeparams['nb_top'])) $this->aeparams['nb_top'] = 0;
        if (!isset($this->aeparams['gevent_companions'])) $this->aeparams['gevent_companions'] = 0;
        $count_partipants = ($this->aeparams['gevent_companions']) ? "sum(companions+1)" : "count(*)";

        $query->select('"" proposed_name');
        $query->select('"" event_link');
        $query->select('"" activity_link');
        $query->select('"" agenda_link');
        $query->select('"" category_link');
        $query->select('"" place_link');
        $query->select('"" public_link');
        $query->select('"" ressource_link');
        $query->select('"" section_link');
        $query->select('"" introtext');
        $query->select('"" hot_i');
        $query->select('"" price_i');
        $query->select('"" access_i');
        $query->select('"" event_class');
        $query->select('TIME_TO_SEC( TIMEDIFF( a.enddate, a.date)) / 60 duration');
        $query->select('DATE_FORMAT(a.date,"%Y") start_year');
        $query->select('DATE_FORMAT(a.date,"%m") start_month');
        $query->select('DATE_FORMAT(a.date,"%d") start_day');
        $query->select('DATE_FORMAT(a.enddate,"%Y") end_year');
        $query->select('DATE_FORMAT(a.enddate,"%m") end_month');
        $query->select('DATE_FORMAT(a.enddate,"%d") end_day');
        $query->select('DATE_FORMAT(a.date, "%Y-%m-%d %H:%i") mydatetime');
        $query->select('DATE_FORMAT(a.enddate, "%Y-%m-%d %H:%i") myenddatetime');
        $query->select('#__allevents_activities_1119841.titre as activity_titre');
        $query->select('#__allevents_agenda_1119852.titre as agenda_titre');
        $query->select('#__allevents_agenda_1119852.vignette as agenda_vignette');
        $query->select('#__allevents_agenda_1119852.image_bullet as agenda_bullet');
        $query->select('#__allevents_agenda_1119852.iconmap as agenda_iconmap');
        $query->select('#__allevents_agenda_1119852.max_hits as agenda_max_hits');
        $query->select('#__allevents_categories_1119863.titre as category_titre');
        $query->select('#__allevents_places_1119865.titre as place_titre');
        $query->select('#__allevents_places_1119865.titre as place_title');
        $query->select('#__allevents_places_1119865.numero as place_numero');
        $query->select('#__allevents_places_1119865.rue as place_rue');
        $query->select('#__allevents_places_1119865.ville as place_ville');
        $query->select('#__allevents_places_1119865.country as place_country');
        $query->select('#__allevents_places_1119865.codepostal as place_codepostal');
        $query->select('#__allevents_places_1119865.latitude as place_latitude');
        $query->select('#__allevents_places_1119865.longitude as place_longitude');
        $query->select('#__allevents_places_1119865.published as place_published');
        $query->select('#__allevents_places_1119865.id as place_id');
        $query->select('#__allevents_public_1119840.titre as public_titre');
        $query->select('#__allevents_ressources_1119864.titre as ressource_titre');
        $query->select('#__allevents_sections_1119862.titre as section_titre');

        $query->select('#__allevents_activities_1119841.alias as activity_alias');
        $query->select('#__allevents_agenda_1119852.alias as agenda_alias');
        $query->select('#__allevents_categories_1119863.alias as category_alias');
        $query->select('#__allevents_places_1119865.alias as place_alias');
        $query->select('#__allevents_public_1119840.alias as public_alias');
        $query->select('#__allevents_ressources_1119864.alias as ressource_alias');
        $query->select('#__allevents_sections_1119862.alias as section_alias');

        $query->select('(select ' . $count_partipants . ' from `#__allevents_enrolments` b where b.event_id=a.id and b.published=1 and b.enroltype=0) nb_enrolyes');
        $query->select('(select ' . $count_partipants . ' from `#__allevents_enrolments` b1 where b1.event_id=a.id and b1.published=1 and b1.enroltype=0 and b1.user_id = ' . $user->get('id') . ') enrol_yes');
        $query->select('(select ' . $count_partipants . ' from `#__allevents_enrolments` b2 where b2.event_id=a.id and b2.published=1 and b2.enroltype=1 and b2.user_id = ' . $user->get('id') . ') enrol_no');
        $query->select('(select ' . $count_partipants . ' from `#__allevents_enrolments` b2 where b2.event_id=a.id and b2.published=1 and b2.enroltype=2 and b2.user_id = ' . $user->get('id') . ') enrol_perhaps');
        $query->select('(select max(id) from `#__allevents_enrolments` b2 where b2.event_id=a.id and b2.published=1 and b2.user_id = ' . $user->get('id') . ') id_enrolment');
        $query->select('(CASE WHEN a.date < NOW() THEN 1 WHEN date > NOW() THEN 0 ELSE 1 END) AS event_pasted');

        $query->select("(CASE WHEN DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d') THEN 1 ELSE 0 END) AS event_current");
        $query->select("(CASE WHEN DATE_FORMAT(a.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') THEN 1 ELSE 0 END) AS event_in_future");
        $query->select("(CASE WHEN DATE_FORMAT(a.enddate,'%Y%m%d') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') THEN 1 ELSE 0 END) AS event_in_past");

        $query->select('(CASE WHEN a.created_date >= DATE_ADD(NOW(),INTERVAL -3 DAY) THEN 1 ELSE 0 END) as news');
        $query->select('(CASE WHEN NOW() >= DATE_ADD(DATE_FORMAT(a.date,"%Y-%m-%d"), INTERVAL -5 DAY) THEN 1 ELSE 0 END) as lastdays');
        $query->select('(CASE WHEN DATE_FORMAT(UTC_TIMESTAMP(),"%Y-%m-%d") = DATE_FORMAT(DATE_ADD(a.date, INTERVAL -1 DAY),"%Y-%m-%d") THEN 1 ELSE 0 END) as tomorrow');
        // $query->select('(CASE WHEN DATE_FORMAT(UTC_TIMESTAMP(),"%Y-%m-%d") = DATE_FORMAT(a.date,"%Y-%m-%d") THEN 1 ELSE 0 END) as today') ;
        $query->select('DATE_ADD(a.date, INTERVAL -1 DAY) as veille');
        $query->from('`#__allevents_events` AS a');
        // test user access authorisations
        if (!$user->authorise('core.admin')) {
            // c'est l'affichage de l'evenement qui portera le check.
            // $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
            $query->where('(ifnull(#__allevents_agenda_1119852.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (#__allevents_agenda_1119852.access=0))');
            $query->where('(ifnull(#__allevents_activities_1119841.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (#__allevents_activities_1119841.access=0))');
            $query->where('(ifnull(#__allevents_places_1119865.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (#__allevents_places_1119865.access=0))');
            $query->where('(ifnull(#__allevents_public_1119840.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (#__allevents_public_1119840.access=0))');
            $query->where('(ifnull(#__allevents_sections_1119862.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (#__allevents_sections_1119862.access=0))');
            $query->where('(ifnull(#__allevents_categories_1119863.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (#__allevents_categories_1119863.access=0))');
        }
        // Join over the users for the checked out user.
        $query->select('uc.name AS editor');
        $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

        // agenda_id
        if ((isset($this->aeparams['a']) && ((int)$this->aeparams['a'] > 0))) {
            $query->join('INNER', '#__allevents_agenda AS #__allevents_agenda_1119852 ON #__allevents_agenda_1119852.id = a.agenda_id');
            $query->where('a.agenda_id = ' . (int)$this->aeparams['a']);
        } elseif (!(empty($this->aeparams['at']))) {
            // Make sure the item ids are integers
            ArrayHelper::toInteger($this->aeparams['at']);
            $implode = implode(",", $this->aeparams['at']);
            if (!empty($implode)) {
                $query->join('INNER', '#__allevents_agenda AS #__allevents_agenda_1119852 ON #__allevents_agenda_1119852.id = a.agenda_id and #__allevents_agenda_1119852.published=1');
                $query->where('a.agenda_id IN (' . $implode . ')');
            } else {
                $query->join('LEFT', '#__allevents_agenda AS #__allevents_agenda_1119852 ON #__allevents_agenda_1119852.id = a.agenda_id and #__allevents_agenda_1119852.published=1');
            }
        } else {
            $query->join('LEFT', '#__allevents_agenda AS #__allevents_agenda_1119852 ON #__allevents_agenda_1119852.id = a.agenda_id and #__allevents_agenda_1119852.published=1');
        }

        // activity_id
        if ((isset($this->aeparams['p']) && ((int)$this->aeparams['p'] > 0))) {
            $query->join('INNER', '#__allevents_activities AS #__allevents_activities_1119841 ON #__allevents_activities_1119841.id = a.activity_id and #__allevents_activities_1119841.published=1');
            $query->where('a.activity_id = ' . (int)$this->aeparams['p']);
        } elseif (!(empty($this->aeparams['pt']))) {
            // Make sure the item ids are integers
            ArrayHelper::toInteger($this->aeparams['pt']);
            $implode = implode(",", $this->aeparams['pt']);
            if (!empty($implode)) {
                $query->join('INNER', '#__allevents_activities AS #__allevents_activities_1119841 ON #__allevents_activities_1119841.id = a.activity_id and #__allevents_activities_1119841.published=1');
                $query->where('a.activity_id IN (' . $implode . ')');
            } else {
                $query->join('LEFT', '#__allevents_activities AS #__allevents_activities_1119841 ON #__allevents_activities_1119841.id = a.activity_id and #__allevents_activities_1119841.published=1');
            }
        } else {
            $query->join('LEFT', '#__allevents_activities AS #__allevents_activities_1119841 ON #__allevents_activities_1119841.id = a.activity_id and #__allevents_activities_1119841.published=1');
        }


        // public_id
        if ((isset($this->aeparams['d']) && ((int)$this->aeparams['d'] > 0))) {
            $query->join('INNER', '#__allevents_public AS #__allevents_public_1119840 ON #__allevents_public_1119840.id = a.public_id and #__allevents_public_1119840.published=1');
            $query->where('a.public_id = ' . (int)$this->aeparams['d']);
        } elseif (!(empty($this->aeparams['dt']))) {
            // Make sure the item ids are integers
            ArrayHelper::toInteger($this->aeparams['dt']);
            $implode = implode(",", $this->aeparams['dt']);
            if (!empty($implode)) {
                $query->join('INNER', '#__allevents_public AS #__allevents_public_1119840 ON #__allevents_public_1119840.id = a.public_id and #__allevents_public_1119840.published=1');
                $query->where('a.public_id IN (' . $implode . ')');
            } else {
                $query->join('LEFT', '#__allevents_public AS #__allevents_public_1119840 ON #__allevents_public_1119840.id = a.public_id and #__allevents_public_1119840.published=1');
            }
        } else {
            $query->join('LEFT', '#__allevents_public AS #__allevents_public_1119840 ON #__allevents_public_1119840.id = a.public_id and #__allevents_public_1119840.published=1');
        }

        // section_id
        if ((isset($this->aeparams['s']) && ((int)$this->aeparams['s'] > 0))) {
            $query->join('INNER', '#__allevents_sections AS #__allevents_sections_1119862 ON #__allevents_sections_1119862.id = a.section_id and #__allevents_sections_1119862.published=1');
            $query->where('a.section_id = ' . (int)$this->aeparams['s']);
        } elseif (!(empty($this->aeparams['st']))) {
            // Make sure the item ids are integers
            ArrayHelper::toInteger($this->aeparams['st']);
            $implode = implode(",", $this->aeparams['st']);
            if (!empty($implode)) {
                $query->join('INNER', '#__allevents_sections AS #__allevents_sections_1119862 ON #__allevents_sections_1119862.id = a.section_id and #__allevents_sections_1119862.published=1');
                $query->where('a.section_id IN (' . $implode . ')');
            } else {
                $query->join('LEFT', '#__allevents_sections AS #__allevents_sections_1119862 ON #__allevents_sections_1119862.id = a.section_id and #__allevents_sections_1119862.published=1');
            }
        } else {
            $query->join('LEFT', '#__allevents_sections AS #__allevents_sections_1119862 ON #__allevents_sections_1119862.id = a.section_id and #__allevents_sections_1119862.published=1');
        }

        // category_id
        if ((isset($this->aeparams['c']) && ((int)$this->aeparams['c'] > 0))) {
            $query->join('INNER', '#__allevents_categories AS #__allevents_categories_1119863 ON #__allevents_categories_1119863.id = a.category_id and #__allevents_categories_1119863.published=1');
            $query->where('a.category_id = ' . (int)$this->aeparams['c']);
        } elseif (!(empty($this->aeparams['ct']))) {
            // Make sure the item ids are integers
            ArrayHelper::toInteger($this->aeparams['ct']);
            $implode = implode(",", $this->aeparams['ct']);
            if (!empty($implode)) {
                $query->join('INNER', '#__allevents_categories AS #__allevents_categories_1119863 ON #__allevents_categories_1119863.id = a.category_id and #__allevents_categories_1119863.published=1');
                $query->where('a.category_id IN (' . $implode . ')');
            } else {
                $query->join('LEFT', '#__allevents_categories AS #__allevents_categories_1119863 ON #__allevents_categories_1119863.id = a.category_id and #__allevents_categories_1119863.published=1');
            }
        } else {
            $query->join('LEFT', '#__allevents_categories AS #__allevents_categories_1119863 ON #__allevents_categories_1119863.id = a.category_id and #__allevents_categories_1119863.published=1');
        }

        // place_id
        if ((isset($this->aeparams['l']) && ((int)$this->aeparams['l'] > 0))) {
            $query->join('INNER', '#__allevents_places AS #__allevents_places_1119865 ON #__allevents_places_1119865.id = a.place_id and #__allevents_places_1119865.published=1');
            $query->where('a.place_id = ' . (int)$this->aeparams['l']);
        } elseif (!(empty($this->aeparams['lt']))) {
            // Make sure the item ids are integers
            ArrayHelper::toInteger($this->aeparams['lt']);
            $implode = implode(",", $this->aeparams['lt']);
            if (!empty($implode)) {
                $query->join('INNER', '#__allevents_places AS #__allevents_places_1119865 ON #__allevents_places_1119865.id = a.place_id and #__allevents_places_1119865.published=1');
                $query->where('a.place_id IN (' . implode(",", $this->aeparams['lt']) . ')');
            } else {
                $query->join('LEFT', '#__allevents_places AS #__allevents_places_1119865 ON #__allevents_places_1119865.id = a.place_id and #__allevents_places_1119865.published=1');
            }
        } else {
            $query->join('LEFT', '#__allevents_places AS #__allevents_places_1119865 ON #__allevents_places_1119865.id = a.place_id and #__allevents_places_1119865.published=1');
        }

        // Join over the foreign key 'ressource_id'
        if ((isset($this->aeparams['e']) && ((int)$this->aeparams['e'] > 0))) {
            $query->join('INNER', '#__allevents_ressources AS #__allevents_ressources_1119864 ON #__allevents_ressources_1119864.id = a.ressource_id and #__allevents_ressources_1119864.published=1');
            $query->where('a.ressource_id = ' . (int)$this->aeparams['e']);
        } elseif (!(empty($this->aeparams['et']))) {
            // Make sure the item ids are integers
            ArrayHelper::toInteger($this->aeparams['et']);
            $implode = implode(",", $this->aeparams['et']);
            if (!empty($implode)) {
                $query->join('INNER', '#__allevents_ressources AS #__allevents_ressources_1119864 ON #__allevents_ressources_1119864.id = a.ressource_id and #__allevents_ressources_1119864.published=1');
                $query->where('a.ressource_id IN (' . implode(",", $this->aeparams['lt']) . ')');
            } else {
                $query->join('LEFT', '#__allevents_ressources AS #__allevents_ressources_1119864 ON #__allevents_ressources_1119864.id = a.ressource_id and #__allevents_ressources_1119864.published=1');
            }
        } else {
            $query->join('LEFT', '#__allevents_ressources AS #__allevents_ressources_1119864 ON #__allevents_ressources_1119864.id = a.ressource_id and #__allevents_ressources_1119864.published=1');
        }

        // Join over the created by field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');

        // Join over the ribbon by field 'ribbon_id'
        $query->select('ribbon.titre AS ribbon_titre');
        $query->select('ribbon.couleur AS ribbon_couleur');
        $query->join('LEFT', '#__allevents_ribbon AS ribbon ON ribbon.id = a.ribbon_id');

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

        // Filter by search in calendar
        $searchagenda = $this->getState('filter.agenda');
        if (!empty($searchagenda)) {
            $query->where('a.agenda_id = ' . (int)$searchagenda);
        }

        // Filter by search in date
        $searchdate = $this->getState('filter.date');
        if (!empty($searchdate)) {
            $query->where("DATE_FORMAT(a.date,'%Y-%m-%d') >= DATE_FORMAT('" . $searchdate . "','%Y-%m-%d')");
        }

        // Filter by search in date
        $searchenddate = $this->getState('filter.enddate');
        if (!empty($searchenddate)) {
            $query->where("DATE_FORMAT(a.date,'%Y-%m-%d') <= DATE_FORMAT('" . $searchenddate . "','%Y-%m-%d')");
        }

        if ((isset($this->aeparams['eid']) && ((int)$this->aeparams['eid'] > 0))) {
            $query->where('a.id = ' . (int)$this->aeparams['eid']);
        }

        $query->where('(a.published = 1)');
        $query->where('(ifnull(a.publishingdate,now()) <= now())');
        $query->where('(a.titre <> \'\')');

        // Filter by start and end dates.
        // $nullDate = $db->quote($db->getNullDate());
        // $date = JFactory::getDate();
        // $nowDate = $db->quote($date->toSql());
        // $query->where('(a.publishingdate = ' . $nullDate . ' OR a.publishingdate <= ' . $nowDate . ')')
        // ->where('(a.expirationdate = ' . $nullDate . ' OR a.expirationdate >= ' . $nowDate . ')');
        if (JFactory::getUser()->authorise('core.approve', 'com_allevents') !== true) {
            $query->where('(a.proposal = 0)');
        }
        if ((isset($this->aeparams['h']) && ((int)$this->aeparams['h'] > 0))) // hot
        {
            $query->where('(a.hot = 1)');
        }
        if (!isset($this->aeparams['period']) || ((int)$this->aeparams['nb_top'] > 0)) {
            $this->aeparams['period'] = 0;
        }
        if (!isset($this->aeparams['pivot']) || ((int)$this->aeparams['nb_top'] > 0)) {
            $this->aeparams['pivot'] = 0;
        }
        if (!isset($this->aeparams['sort_by']) || ((int)$this->aeparams['nb_top'] > 0)) {
            $this->aeparams['sort_by'] = 0;
        }
        if (!isset($this->aeparams['fromdate']) || ((int)$this->aeparams['nb_top'] > 0)) {
            $this->aeparams['fromdate'] = '1900-01-01';
        } else {
            $ldate = new JDate(JHtml::_('date', $this->aeparams['fromdate'], 'Y-m-d'));
            $this->aeparams['fromdate'] = $ldate->format('Y-m-d');
        }
        if (!isset($this->aeparams['todate']) || ((int)$this->aeparams['nb_top'] > 0)) {
            $this->aeparams['todate'] = '2900-01-01';
        } else {
            $ldate = new JDate(JHtml::_('date', $this->aeparams['todate'], 'Y-m-d'));
            $this->aeparams['todate'] = $ldate->format('Y-m-d');
        }

        $query->where("DATE_FORMAT(a.date,'%Y-%m-%d') >= DATE_FORMAT('" . $this->aeparams['fromdate'] . "','%Y-%m-%d')");
        $query->where("DATE_FORMAT(a.date,'%Y-%m-%d') <= DATE_FORMAT('" . $this->aeparams['todate'] . "','%Y-%m-%d')");

        //current : date <= sysdate <= enddate
        //PAST : enddate < sysdate
        //PAST & current : enddate < sysdate _OR_ date <= sysdate <= enddate
        //NEXT : sysdate < date
        //NEXT & current : sysdate < date _OR_ date <= sysdate <= enddate
        switch ($this->aeparams['period']) {
            case 1: // <option value="1">CURRENT</option>
                switch ($this->aeparams['pivot']) {
                    case 1: // DAY
                        $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d'))");
                        break;
                    case 2: // WEEK
                        $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u') between DATE_FORMAT(a.date,'%Y%u') and DATE_FORMAT(a.enddate,'%Y%u'))");
                        break;
                    case 3: // MONTH
                        $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m') between DATE_FORMAT(a.date,'%Y%m') and DATE_FORMAT(a.enddate,'%Y%m'))");
                        break;
                    case 4: // YEAR
                        $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y') between DATE_FORMAT(a.date,'%Y') and DATE_FORMAT(a.enddate,'%Y'))");
                        break;
                }
                break;
            case 2: // <option value="2">NEXT</option>
                switch ($this->aeparams['pivot']) {
                    case 1: // DAY
                        $query->where("(DATE_FORMAT(a.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d'))");
                        break;
                    case 2: // WEEK
                        $query->where("(DATE_FORMAT(a.date,'%Y%u') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u'))");
                        break;
                    case 3: // MONTH
                        $query->where("(DATE_FORMAT(a.date,'%Y%m') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m'))");
                        break;
                    case 4: // YEAR
                        $query->where("(DATE_FORMAT(a.date,'%Y') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y'))");
                        break;
                }
                break;
            case 3: // <option value="3">NEXTANDCURRENT</option>
                switch ($this->aeparams['pivot']) {
                    case 1: // DAY
                        $query->where("((DATE_FORMAT(a.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d')))");
                        break;
                    case 2: // WEEK
                        $query->where("((DATE_FORMAT(a.date,'%Y%u') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u') between DATE_FORMAT(a.date,'%Y%u') and DATE_FORMAT(a.enddate,'%Y%u')))");
                        break;
                    case 3: // MONTH
                        $query->where("((DATE_FORMAT(a.date,'%Y%m') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m') between DATE_FORMAT(a.date,'%Y%m') and DATE_FORMAT(a.enddate,'%Y%m')))");
                        break;
                    case 4: // YEAR
                        $query->where("((DATE_FORMAT(a.date,'%Y') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y') between DATE_FORMAT(a.date,'%Y') and DATE_FORMAT(a.enddate,'%Y')))");
                        break;
                }
                break;
            case 4: // <option value="4">PAST</option>
                switch ($this->aeparams['pivot']) {
                    case 1: // DAY
                        $query->where("(DATE_FORMAT(a.enddate,'%Y%m%d') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d'))");
                        break;
                    case 2: // WEEK
                        $query->where("(DATE_FORMAT(a.enddate,'%Y%u') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u'))");
                        break;
                    case 3: // MONTH
                        $query->where("(DATE_FORMAT(a.enddate,'%Y%m') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m'))");
                        break;
                    case 4: // YEAR
                        $query->where("(DATE_FORMAT(a.enddate,'%Y') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y'))");
                        break;
                }
                break;
            case 5: // <option value="5">PASTANDCURRENT</option>
                switch ($this->aeparams['pivot']) {
                    case 1: // DAY
                        $query->where("((DATE_FORMAT(a.enddate,'%Y%m%d') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(a.date,'%Y%m%d') and DATE_FORMAT(a.enddate,'%Y%m%d')))");
                        break;
                    case 2: // WEEK
                        $query->where("((DATE_FORMAT(a.enddate,'%Y%u') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u') between DATE_FORMAT(a.date,'%Y%u') and DATE_FORMAT(a.enddate,'%Y%u')))");
                        break;
                    case 3: // MONTH
                        $query->where("((DATE_FORMAT(a.enddate,'%Y%m') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m') between DATE_FORMAT(a.date,'%Y%m') and DATE_FORMAT(a.enddate,'%Y%m')))");
                        break;
                    case 4: // YEAR
                        $query->where("((DATE_FORMAT(a.enddate,'%Y') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y') between DATE_FORMAT(a.date,'%Y') and DATE_FORMAT(a.enddate,'%Y')))");
                        break;
                }
                break;
        }

        switch ($this->aeparams['sort_by']) {
            case 0: // <option value="0">EVENTS_SORT_BY_DATE_ASC</option>
                if ((int)$this->aeparams['nb_top'] == 0) {
                    $query->order('a.date asc');
                } else {
                    $query->order('a.hits desc');
                }
                break;
            case 1: // <option value="1">EVENTS_SORT_BY_DATE_DESC</option>
                $query->order('a.date desc');
                break;
            case 2: // <option value="2">EVENTS_SORT_BY_ENDDATE_ASC</option>
                $query->order('a.enddate asc');
                break;
            case 3: // <option value="3">EVENTS_SORT_BY_ENDDATE_DESC</option>
                $query->order('a.enddate desc');
                break;
            case 4: // <option value="4">EVENTS_SORT_BY_ID_ASC</option>
                $query->order('a.ID asc');
                break;
            case 5: // <option value="5">EVENTS_SORT_BY_ID_DESC</option>
                $query->order('a.ID Desc');
                break;
            case 6:
                $query->order('a.titre asc');
                break;
            case 7:
                $query->order('a.titre Desc');
                break;
        }

        return $query;
    }

    /**
     * AllEventsModelEvents::_CompleteItems()
     *
     * @param array $items
     *
     * @return array|bool
     * @throws Exception
     */
    protected function _CompleteItems($items)
    {
        foreach ($items as $item) {
            $item->enrolment_finished = 0;
            //_cleanIntrotext
            $maxLength = 100;
            $item->introtext = AllEventsHelperString::cleanText($item->description, $maxLength);
            if (empty($item->openingdate)) {

            } else {
                if (JHtml::date($item->openingdate, 'y') == '-1') {

                } else {
                    if (new JDate($item->openingdate) > new JDate('now')) {
                        $item->enrolment_finished = 1;
                    }
                }
            }

            if (empty($item->closingdate)) {

            } else {
                if (JHtml::date($item->closingdate, 'y') == '-1') {

                } else {
                    if (new JDate($item->closingdate) < new JDate('now')) {
                        $item->enrolment_finished = 1;
                    }
                }
            }
            $item->lastplaces = false;
            if ((($item->enrolment_max_participant - $item->nb_enrolyes) < 5) && (($item->enrolment_max_participant - $item->nb_enrolyes) > 0)) {
                $item->lastplaces = true;
            }

            if ((($item->enrolment_max_participant - $item->nb_enrolyes) < (0.05 * $item->enrolment_max_participant)) && (($item->enrolment_max_participant - $item->nb_enrolyes) > 0)) {
                $item->lastplaces = true;
            }

            $item->today = false;
            $date = JFactory::getDate();
            if (JHtml::date($item->date, 'YYYYMMDD') == JHtml::date($date, 'YYYYMMDD')) {
                $item->today = true;
            }
            if (($item->date <= $date) && ($item->enddate >= $date)) {
                $item->today = true;
            }

            if (($item->enrolment_max_participant == 0) || (($item->enrolment_max_participant > 0) && ($item->nb_enrolyes < $item->enrolment_max_participant)) || ($item->allow_overbooking)) {
                $item->eventfull = false;
            } else {
                $item->eventfull = true;
            }

            /* event_link : advenced */
            $item->event_link = AllEventsHelperRoute::getEventRoute($item->id, $item->alias);
            $item->link = AllEventsHelperRoute::getEventRoute($item->id, $item->alias);

            /**/
            $item->hot_i = ($item->hot) ? '<i class="fa fa-star-o"></i>' : '';
            $item->access_i = ($item->access > 1) ? '<i class="fa fa-key"></i>' : '';
            $item->price_i = ($item->price > 0) ? '<i class="fa fa-eur"></i>' : '';
            $slug = (!empty($item->activity_alias)) ? $item->activity_id . ':' . $item->activity_alias : $item->activity_id;
            $item->activity_link = JRoute::_('index.php?option=com_allevents&view=activity&id=' . $slug, false);
            $slug = (!empty($item->agenda_alias)) ? $item->agenda_id . ':' . $item->agenda_alias : $item->agenda_id;
            $item->agenda_link = JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $slug, false);
            $item->agenda_iconmap = '//maps.google.com/mapfiles/ms/micons/' . $item->agenda_iconmap . '.png';
            $slug = (!empty($item->category_alias)) ? $item->category_id . ':' . $item->category_alias : $item->category_id;
            $item->category_link = JRoute::_('index.php?option=com_allevents&view=category&id=' . $slug, false);
            $slug = (!empty($item->place_alias)) ? $item->place_id . ':' . $item->place_alias : $item->place_id;
            $item->place_link = JRoute::_('index.php?option=com_allevents&view=place&id=' . $slug, false);
            $slug = (!empty($item->public_alias)) ? $item->public_id . ':' . $item->public_alias : $item->public_id;
            $item->public_link = JRoute::_('index.php?option=com_allevents&view=public&id=' . $slug, false);
            $slug = (!empty($item->ressource_alias)) ? $item->ressource_id . ':' . $item->ressource_alias : $item->ressource_id;
            $item->ressource_link = JRoute::_('index.php?option=com_allevents&view=ressource&id=' . $slug, false);
            $slug = (!empty($item->section_alias)) ? $item->section_id . ':' . $item->section_alias : $item->section_id;
            $item->section_link = JRoute::_('index.php?option=com_allevents&view=section&id=' . $slug, false);
            // on surcharge les données de base car mysql le fait sur des données UTC
            $item->start_year = (int)JHtml::_('date', $item->date, "Y");
            $item->start_month = (int)JHtml::_('date', $item->date, "m");
            $item->start_day = (int)JHtml::_('date', $item->date, "d");
            $item->end_year = (int)JHtml::_('date', $item->enddate, "Y");
            $item->end_month = (int)JHtml::_('date', $item->enddate, "m");
            $item->end_day = (int)JHtml::_('date', $item->enddate, "d");
            $line1 = $item->place_numero . ' ' . $item->place_rue;
            $line2 = $item->place_codepostal . ' ' . $item->place_ville;

            $item->place_adress = '';
            if ($line1 <> ' ')
                $item->place_adress .= $line1 . ' ';
            if ($line2 <> ' ')
                $item->place_adress .= $line2;

            /**/
            $item->enrolmentshtml = "";
            if (($item->enrolment_max_participant == 0) || (($item->enrolment_max_participant > 0) && ($item->nb_enrolyes < $item->enrolment_max_participant))) {
                $enrolstate = "ok";
            } elseif ($item->allow_overbooking) {
                $enrolstate = "overbooking";
            } else {
                $enrolstate = "full";
            }
            $item->enrolmentshtml .= '<span style="float:left" title="';
            $item->enrolmentshtml .= sprintf(JText::_('ENROL_NBRDEFINITIVE'), $item->nb_enrolyes);
            $item->enrolmentshtml .= '" class="ae_enrol ' . $enrolstate . '"> ';
            $item->enrolmentshtml .= $item->nb_enrolyes;
            $item->enrolmentshtml .= '&nbsp;/&nbsp;';
            $item->enrolmentshtml .= ($item->enrolment_max_participant == 0) ? '&infin;' : $item->enrolment_max_participant;
            $item->enrolmentshtml .= '</span>&nbsp;';
            $item->enrolmentshtml .= sprintf(JText::_('ENROL_NBRDEFINITIVE'), $item->nb_enrolyes);

            if ($item->event_current) {
                $item->event_class = " event_current";
            } elseif ($item->event_in_future) {
                $item->event_class = " event_in_future";
            } elseif ($item->event_in_past) {
                $item->event_class = " event_in_past";
            }
            if (isset($item->proposed_by)) {
                $item->proposed_name = JFactory::getUser($item->proposed_by)->get('name');
                $item->proposed_email = JFactory::getUser($item->proposed_by)->get('email');
            }
        }

        return $items;
    }

    /**
     * AllEventsModelEvents::getCurrentItems()
     *
     * @return array|bool
     */
    public function getCurrentItems()
    {
        // date en jour = sysdate date asc
        $items = self::_getItems(1, 1, 0);

        return $items;
    }

    /**
     * AllEventsModelEvents::_getItems()
     *
     * @param int $period
     * @param int $pivot
     * @param int $sort_by
     *
     * @return array|bool
     * @throws Exception
     */
    protected function _getItems($period = 1, $pivot = 0, $sort_by = 0)
    {
        $this->aeparams['period'] = $period;
        $this->aeparams['pivot'] = $pivot;
        $this->aeparams['sort_by'] = $sort_by;

        $query = $this->getListQuery();
        try {
            $items = $this->_getList($query, $this->getState('list.start'), $this->getState('list.limit'));
            $items = $this->_CompleteItems($items);

            return $items;
        } catch (RuntimeException $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return false;
        }
    }

    /**
     * AllEventsModelEvents::getPastedItems()
     *
     * @return array|bool
     */
    public function getPastedItems()
    {
        // date en jour < sysdate date desc
        $items = self::_getItems(4, 1, 1);

        return $items;
    }

    /**
     * AllEventsModelEvents::getNextItems()
     *
     * @return array|bool
     */
    public function getNextItems()
    {
        // date en jour > sysdate date asc
        $items = self::_getItems(2, 1, 0);

        return $items;
    }

    /**
     * AllEventsModelEvents::populateState()
     *
     * @param mixed $ordering
     * @param mixed $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication();
        $list = $app->getUserState($this->context . '.list');

        $ordering = isset($list['filter_order']) ? $list['filter_order'] : null;
        $direction = isset($list['filter_order_Dir']) ? $list['filter_order_Dir'] : null;

        $list['ordering'] = $ordering;
        $list['direction'] = $direction;

        $app->setUserState($this->context . '.list', $list);
        $app->input->set('list', null);

        // List state information.
        parent::populateState($ordering, $direction);

        $app = JFactory::getApplication();

        $ordering = $app->getUserStateFromRequest($this->context . '.ordercol', 'filter_order', $ordering);
        $direction = $app->getUserStateFromRequest($this->context . '.orderdirn', 'filter_order_Dir', $ordering);

        $this->setState('list.ordering', $ordering);
        $this->setState('list.direction', $direction);

        if (($ordering == 'a.date') && ($direction == 'asc')) {
            $this->aeparams['sort_by'] = 1;
        }

        if (($ordering == 'a.date') && ($direction == 'desc')) {
            $this->aeparams['sort_by'] = 2;
        }

        if (($ordering == 'a.titre') && ($direction == 'asc')) {
            $this->aeparams['sort_by'] = 6;
        }

        if (($ordering == 'a.titre') && ($direction == 'desc')) {
            $this->aeparams['sort_by'] = 7;
        }

        if (strpos($this->aeparams['layout'], ':') === true) {
            $this->setState('list.limit', 1000000);
            $this->setState('list.start', 0);
        } elseif (empty($this->aeparams['nb_top'])) {
            // JFactory::getApplication()->enqueueMessage($this->aeparams['layout']) ;
            if ($this->aeparams['layout'] == 'timeline') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 'condense') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 't2area') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 'eventlist') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 'uikitsimplegrid') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 'uikitdynamicgrid') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 'uikitportfoliogrid') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 'map') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 'uikitupcomingevents') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } elseif ($this->aeparams['layout'] == 'rss') {
                $this->setState('list.limit', 0);
                $this->setState('list.start', 0);
            } else {
                $app = JFactory::getApplication();
                $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->get('list_limit'));
                $this->setState('list.limit', $limit);
                // $this->setState('list.limit', 0);
                // $this->setState('list.start', 0);
                $limitstart = $app->input->getInt('limitstart', 0);
                $this->setState('list.start', $limitstart);
            }
        } else {
            $app = JFactory::getApplication();
            $this->setState('list.limit', (int)$this->aeparams['nb_top']);
            $limitstart = $app->input->getInt('limitstart', 0);
            $this->setState('list.start', $limitstart);
        }
    }
}