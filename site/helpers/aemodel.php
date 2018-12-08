<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.html.parameter');
jimport('joomla.registry.registry');
jimport('joomla.user.helper');
jimport('joomla.access.access');

if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';
if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

use Joomla\Utilities\ArrayHelper;

/**
 * AEModelItem
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AEModelItem extends JModelItem
{
    protected $msg;
    protected $filters;
    protected $options;
    protected $itObj;
    protected $where;
    protected $query;
    protected $params;
    protected $agendas;
    protected $categories;
    protected $activities;
    protected $places;
    protected $calendars;
    private $gparams;
    private $datetimeformat;
    private $dateformat;

    /**
     * AEModelItem::error404()
     *
     * @return bool
     * @throws Exception
     */
    public static function error404()
    {
        JFactory::getApplication()->enqueueMessage('<div>&nbsp;</div><div class="hero-unit center"><h1>' . JTEXT::_('COM_COMALLEVENTS_PAGE_NOT_FOUND') . ' <small><font face="Tahoma" color="red">' . JTEXT::_('JERROR_ERROR') . ' 404</font></small></h1><br /><p>' . JTEXT::_('COM_ALLEVENTS_REQUESTED_PAGE_NOT_FOUND') . ', ' . JTEXT::_('COM_ALLEVENTS_CONTACT_THE_WEBMASTER_OR_TRY_AGAIN') .
            '. ' . JTEXT::_('COM_ALLEVENTS_USE_YOUR_BROWSERS_BACK_BUTTON') . '</p><p><b>' . JTEXT::_('COM_ALLEVENTS_OR_JUST_PRESS_BUTTON') . '</b></p><a href="index.php" class="btn btn-large btn-info button"><i class="icon-home icon-white"></i>&nbsp;' . JTEXT::_('JERROR_LAYOUT_HOME_PAGE') .
            '</a></div><div align="center"><img src="/media/com_all_events/images/iconall_events48.png"></div>', 'error');

        return false;
    }

    /**
     * AEModelItem::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'all_events', $prefix = 'all_eventsTable', $config = [])
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AEModelItem::startAEModel()
     *
     */
    protected function startAEModel()
    {
        $this->filters = [];
        $this->options = [];
        $this->params = [];
        $this->agendas = [];
        $this->categories = [];
        $this->activities = [];
        $this->places = [];
        $this->calendars = [];
        $this->itObj = new stdClass;
        $this->gparams = AllEventsHelperParam::getGlobalParam();
        $this->datetimeformat = $this->gparams['gdatetime_format'];
        $this->dateformat = $this->gparams['gdate_format'];
    }

    /**
     * AEModelItem::getItems()
     *
     * @param mixed $structure
     *
     * @return stdClass
     */
    protected function getItems($structure)
    {
        $this->agendas = $this->getDBagendas();
        $this->categories = $this->getDBcategories();
        $this->places = $this->getDBplaces();
        $this->activities = $this->getDBactivities();
        $this->itObj = new stdClass();

        foreach ($structure as $k => $v) {
            $this->itObj->$k = $this->$k($v);
        }

        return $this->itObj;
    }

    /**
     * AEModelItem::getDBagendas()
     *
     * @return stdClass
     */
    protected function getDBagendas()
    {
        return self::getDBtables('#__allevents_agenda');
    }

    /**
     * AEModelItem::getDBtables()
     *
     * @param $table_name
     *
     * @return stdClass
     */
    protected function getDBtables($table_name)
    {
        $db = $this->getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);
        $query->select('a.id, a.titre, a.image_bullet');
        $query->from('`' . $table_name . '` AS a');
        $query->where('(a.published = 1)');
        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
        }
        $query->order('a.titre ASC');
        $db->setQuery($query);
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AEModelItem::getDBcategories()
     *
     * @return stdClass
     */
    protected function getDBcategories()
    {
        return self::getDBtables('#__allevents_categories');
    }

    /**
     * AEModelItem::getDBplaces()
     *
     * @return stdClass
     */
    protected function getDBplaces()
    {
        return self::getDBtables('#__allevents_places');
    }

    /**
     * AEModelItem::getDBactivities()
     *
     * @return stdClass
     */
    protected function getDBactivities()
    {
        return self::getDBtables('#__allevents_activities');
    }

    /**
     * AEModelItem::getMyPlaces()
     *
     * @param mixed $structure
     *
     * @return stdClass
     */
    protected function getMyPlaces($structure)
    {
        $this->places = $this->getDBplaces();
        $this->itObj = new stdClass();

        foreach ($structure as $k => $v) {
            $this->itObj->$k = $this->$k($v);
        }

        return $this->itObj;
    }

    /**
     * AEModelItem::getMyCalendars()
     *
     * @param mixed $structure
     *
     * @return stdClass
     */
    protected function getMyCalendars($structure)
    {
        $this->calendars = $this->getDBcalendars();
        $this->itObj = new stdClass();

        foreach ($structure as $k => $v) {
            $this->itObj->$k = $this->$k($v);
        }

        return $this->itObj;
    }

    /**
     * AEModelItem::getDBcalendars()
     *
     * @return mixed
     */
    protected function getDBcalendars()
    {
        $db = $this->getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);
        $query->select('a.id, a.id_gcalendar, a.classe, a.couleur, a.couleur_texte');
        $query->from('`#__allevents_gcalendar` AS a');
        $query->where('(a.caltype = "GCAL")');
        $query->where('(a.published = 1)');
        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
        }

        $db->setQuery($query);
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AEModelItem::getMyICSCalendars()
     *
     * @param mixed $structure
     *
     * @return stdClass
     */
    protected function getMyICSCalendars($structure)
    {
        $this->calendars = $this->getDBICScalendars();
        $this->itObj = new stdClass();

        foreach ($structure as $k => $v) {
            $this->itObj->$k = $this->$k($v);
        }

        return $this->itObj;
    }

    /**
     * AEModelItem::getDBICScalendars()
     *
     * @return mixed
     */
    protected function getDBICScalendars()
    {
        $db = $this->getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);
        $query->select('a.id, a.id_gcalendar, a.classe, a.couleur, a.couleur_texte');
        $query->from('`#__allevents_gcalendar` AS a');
        $query->where('(a.caltype = "ICS")');
        $query->where('(a.published = 1)');
        if (!$user->authorise('core.admin')) {
            $query->where('(a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (a.access=0))');
        }

        $db->setQuery($query);
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AEModelItem::getMyEvents()
     *
     * @param mixed $structure
     *
     * @return stdClass
     */
    protected function getMyEvents($structure)
    {
        $this->events = $this->getDBevents();
        $this->itObj = new stdClass();

        foreach ($structure as $k => $v) {
            $this->itObj->$k = $this->$k($v);
        }

        return $this->itObj;
    }

    /**
     * AEModelItem::getDBevents()
     *
     * @return mixed
     */
    protected function getDBevents()
    {
        $db = $this->getDbo();
        $user = JFactory::getUser();
        $db->setQuery('SET SQL_BIG_SELECTS=1');
        $db->execute();
        $query = $db->getQuery(true);

        $query->select('(e.id*1000000000 + UNIX_TIMESTAMP( cal.dt )) id');
        $query->select('e.id event_id, e.asset_id, e.titre, e.alias, e.description, e.intro, e.public_id, e.activity_id, e.vignette, e.banniere, e.affiche, e.published, e.enrolment_enabled, e.enrolment_max_participant, e.contact_1_id, e.proposal, e.proposed_by, e.agenda_id, e.lastmod, e.access, e.deleted, e.hits, e.intern_album_id, e.extern_album_id, e.lastmod_by, e.created_date, e.version, e.section_id,e.category_id, e.ressource_id, e.place_id, e.allow_overbooking, e.contact_person, e.hot, e.form_id, e.contiguous_date, e.closingdate, e.openingdate, e.expirationdate, e.showincalendar, e.adminLock, e.ordering, e.additional_info, e.enrolment_info, e.metakey, e.metadesc, e.metarobots, e.publishingdate, e.cancelled, e.showreadmore, e.checked_out, e.checked_out_time, e.created_by, e.allday, e.fichier_annexe, e.contact_libre, e.language, e.contact_1_details_id');
        $query->select('DATE_FORMAT(e.date, "%Y-%m-%d %H:%i") date, DATE_FORMAT(e.enddate, "%Y-%m-%d %H:%i") enddate');
        $query->select('concat (DATE_FORMAT(cal.dt, "%Y-%m-%d"), " ", DATE_FORMAT(e.date, "%H:%i")) dt');
        $query->select('ag.couleur, ag.couleur_texte, ag.titre as agenda_titre, ag.image_bullet as agenda_image_bullet');
        $query->select('ac.couleur as activity_couleur, ac.couleur_texte as activity_couleur_texte, ac.titre as activity_titre, ac.image_bullet as activity_image_bullet');
        $query->select('ca.couleur as category_couleur, ca.couleur_texte as category_couleur_texte, ca.titre as category_titre, ca.image_bullet as category_image_bullet');
        $query->select('pl.titre as place_titre, pl.vignette as place_vignette, pl.image_bullet as place_image_bullet');
        $query->select('pl.numero as place_numero');
        $query->select('pl.rue as place_rue');
        $query->select('pl.codepostal as place_codepostal');
        $query->select('pl.ville as place_ville');
        $query->select('pl.pays as place_pays');
        $query->select('(select count(*) from `#__allevents_enrolments` b where b.event_id=e.id and b.published=1 and b.enroltype=0) nb_enrolyes');
        $query->select('(select count(*) from `#__allevents_enrolments` b1 where b1.event_id=e.id and b1.published=1 and b1.enroltype=0 and b1.user_id = ' . $user->get('id') . ') enrol_yes');
        $query->select('(select count(*) from `#__allevents_enrolments` b2 where b2.event_id=e.id and b2.published=1 and b2.enroltype=1 and b2.user_id = ' . $user->get('id') . ') enrol_no');
        $query->select('(select count(*) from `#__allevents_enrolments` b2 where b2.event_id=e.id and b2.published=1 and b2.enroltype=2 and b2.user_id = ' . $user->get('id') . ') enrol_perhaps');
        $query->select("(CASE WHEN DATE_FORMAT(e.enddate,'%Y%m%d') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') THEN 1 ELSE 0 END) AS event_in_past");
        $query->select('(select max(id) from `#__allevents_enrolments` b2 where b2.event_id=e.id and b2.published=1 and b2.enroltype in(0,1,2) and b2.user_id = ' . $user->get('id') . ') id_enrolment');
        $query->select('0 eventfull');
        $query->select('0 enrolment_finished');
        $query->from('`#__allevents_events` AS e');
        $query->where('(e.published = 1)');
        $query->where('(e.cancelled = 0)');
        $query->where('(ifnull(e.publishingdate,now()) <= now())');

        $query->where('(e.proposal  = 0)');
        if (isset($this->params['ei']) and ((int)$this->params['ei'] > 0)) {
            $query->where('(e.id = ' . (int)$this->params['ei'] . ')');
        }
        if (isset($this->params['a']) and ((int)$this->params['a'] > 0)) {
            $query->where('(e.agenda_id = ' . (int)$this->params['a'] . ')');
        }
        if (isset($this->params['l']) and ((int)$this->params['l'] > 0)) {
            $query->where('(e.place_id = ' . (int)$this->params['l'] . ')');
        }
        if (isset($this->params['p']) and ((int)$this->params['p'] > 0)) {
            $query->where('(e.activity_id = ' . (int)$this->params['p'] . ')');
        }
        if (isset($this->params['d']) and ((int)$this->params['d'] > 0)) {
            $query->where('(e.public_id = ' . (int)$this->params['d'] . ')');
        }
        if (isset($this->params['s']) and ((int)$this->params['s'] > 0)) {
            $query->where('(e.section_id = ' . (int)$this->params['s'] . ')');
        }
        if (isset($this->params['c']) and ((int)$this->params['c'] > 0)) {
            $query->where('(e.category_id = ' . (int)$this->params['c'] . ')');
        }

        if (!(empty($this->params['at']))) {
            $at = json_decode($this->params['at']);
        }
        if (!(empty($this->params['lt']))) {
            $lt = json_decode($this->params['lt']);
        }
        if (!(empty($this->params['pt']))) {
            $pt = json_decode($this->params['pt']);
        }
        if (!(empty($this->params['dt']))) {
            $dt = json_decode($this->params['dt']);
        }
        if (!(empty($this->params['st']))) {
            $st = json_decode($this->params['st']);
        }
        if (!(empty($this->params['ct']))) {
            $ct = json_decode($this->params['ct']);
        }
        if (!(empty($this->params['et']))) {
            $et = json_decode($this->params['et']);
        }

        if (!empty($at)) {
            ArrayHelper::toInteger($at);
            $at = implode(",", $at);
            $query->where('(e.agenda_id IN (' . $at . '))');
        }
        if (!empty($lt)) {
            ArrayHelper::toInteger($lt);
            $lt = implode(",", $lt);
            $query->where('(e.place_id IN (' . $lt . '))');
        }
        if (!empty($pt)) {
            ArrayHelper::toInteger($pt);
            $pt = implode(",", $pt);
            $query->where('(e.activity_id IN (' . $pt . '))');
        }
        if (!empty($dt)) {
            ArrayHelper::toInteger($dt);
            $dt = implode(",", $dt);
            $query->where('(e.public_id IN (' . $dt . '))');
        }
        if (!empty($st)) {
            ArrayHelper::toInteger($st);
            $st = implode(",", $st);
            $query->where('(e.section_id IN (' . $st . '))');
        }
        if (!empty($ct)) {
            ArrayHelper::toInteger($ct);
            $ct = implode(",", $ct);
            $query->where('(e.category_id IN (' . $ct . '))');
        }
        if (!empty($et)) {
            ArrayHelper::toInteger($et);
            $et = implode(",", $et);
            $query->where('(e.ressource_id IN (' . $et . '))');
        }

        if (isset($this->params['h']) and ((int)$this->params['h'] > 0))
            $query->where('(e.hot = 1)');

        // affichage Filtres AEFC
        if (isset($this->params['tabAgendas'])) {
            if (empty($this->params['tabAgendas'])) {
                // $query->where('(e.agenda_id = -1)');
            } else {
                $query->where('(e.agenda_id in (' . $this->params['tabAgendas'] . '))');
            }
        }
        if (isset($this->params['start']) and ($this->params['start'] > 0) and isset($this->params['end']) and ($this->params['end'] > 0)) {
            $query->where('(e.date between CAST(FROM_UNIXTIME( ' . $this->params['start'] . ') as datetime) and CAST(FROM_UNIXTIME( ' . $this->params['end'] . ') as datetime))');
        } // affichage AEFC
        // affichage fullcalendar v2
        elseif (isset($this->params['range_end']) and isset($this->params['range_start'])) {
            $query->where('(e.date between CAST("' . $this->params['range_start'] . '" as datetime) and CAST("' . $this->params['range_end'] . '" as datetime))');
        } // affichage AEBootstrap et fullcalendar v1
        elseif (isset($this->params['from']) and isset($this->params['to'])) {
            $query->where('(e.date between DATE(\'' . $this->params['from'] . '\') and date( \'' . $this->params['to'] . '\'))');
        }
        // affichage mod_aecalendar
        if (isset($this->params['year']) and isset($this->params['month'])) {
            $query->where('((YEAR(e.date)=' . $this->params['year'] . ') and (MONTH(e.date)=' . $this->params['month'] . '))');
        }

        if (isset($this->params['ano']) and isset($this->params['mes'])) {
            $query->where('((YEAR(e.date)=' . $this->params['ano'] . ') and (MONTH(e.date)=' . $this->params['mes'] . '))');
        }

        // affichage events table
        if (!isset($this->params['period'])) {
            $this->params['period'] = 0;
        }
        if (!isset($this->params['pivot'])) {
            $this->params['pivot'] = 0;
        }
        if (!isset($this->params['sort_by'])) {
            $this->params['sort_by'] = 0;
        }
        // on force les données à 0 si on est avec un affichage module
        if ((isset($this->params['layout'])) && ($this->params['layout'] == 'mod_aecalendar')) {
            $this->params['period'] = 0;
            $this->params['pivot'] = 0;
            $this->params['sort_by'] = 0;
        }

        //current : date <= sysdate <= enddate
        //PAST : enddate < sysdate
        //PAST & current : enddate < sysdate _OR_ date <= sysdate <= enddate
        //NEXT : sysdate < date
        //NEXT & current : sysdate < date _OR_ date <= sysdate <= enddate
        switch ($this->params['period']) {
            case 1: // <option value="1">CURRENT</option>
                switch ($this->params['pivot']) {
                    case 1: // DAY
                        $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(e.date,'%Y%m%d') and DATE_FORMAT(e.enddate,'%Y%m%d'))");
                        break;
                    case 2: // WEEK
                        $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u') between DATE_FORMAT(e.date,'%Y%u') and DATE_FORMAT(e.enddate,'%Y%u'))");
                        break;
                    case 3: // MONTH
                        $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m') between DATE_FORMAT(e.date,'%Y%m') and DATE_FORMAT(e.enddate,'%Y%m'))");
                        break;
                    case 4: // YEAR
                        $query->where("(DATE_FORMAT(UTC_TIMESTAMP(),'%Y') between DATE_FORMAT(e.date,'%Y') and DATE_FORMAT(e.enddate,'%Y'))");
                        break;
                }
                break;
            case 2: // <option value="2">NEXT</option>
                switch ($this->params['pivot']) {
                    case 1: // DAY
                        $query->where("(DATE_FORMAT(e.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d'))");
                        break;
                    case 2: // WEEK
                        $query->where("(DATE_FORMAT(e.date,'%Y%u') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u'))");
                        break;
                    case 3: // MONTH
                        $query->where("(DATE_FORMAT(e.date,'%Y%m') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m'))");
                        break;
                    case 4: // YEAR
                        $query->where("(DATE_FORMAT(e.date,'%Y') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y'))");
                        break;
                }

                break;
            case 3: // <option value="3">NEXTANDCURRENT</option>
                switch ($this->params['pivot']) {
                    case 1: // DAY
                        $query->where("((DATE_FORMAT(e.date,'%Y%m%d') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(e.date,'%Y%m%d') and DATE_FORMAT(e.enddate,'%Y%m%d')))");
                        break;
                    case 2: // WEEK
                        $query->where("((DATE_FORMAT(e.date,'%Y%u') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u') between DATE_FORMAT(e.date,'%Y%u') and DATE_FORMAT(e.enddate,'%Y%u')))");
                        break;
                    case 3: // MONTH
                        $query->where("((DATE_FORMAT(e.date,'%Y%m') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m') between DATE_FORMAT(e.date,'%Y%m') and DATE_FORMAT(e.enddate,'%Y%m')))");
                        break;
                    case 4: // YEAR
                        $query->where("((DATE_FORMAT(e.date,'%Y') > DATE_FORMAT(UTC_TIMESTAMP(),'%Y')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y') between DATE_FORMAT(e.date,'%Y') and DATE_FORMAT(e.enddate,'%Y')))");
                        break;
                }

                break;
            case 4: // <option value="4">PAST</option>
                switch ($this->params['pivot']) {
                    case 1: // DAY
                        $query->where("(DATE_FORMAT(e.enddate,'%Y%m%d') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d'))");
                        break;
                    case 2: // WEEK
                        $query->where("(DATE_FORMAT(e.enddate,'%Y%u') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u'))");
                        break;
                    case 3: // MONTH
                        $query->where("(DATE_FORMAT(e.enddate,'%Y%m') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m'))");
                        break;
                    case 4: // YEAR
                        $query->where("(DATE_FORMAT(e.enddate,'%Y') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y'))");
                        break;
                }

                break;
            case 5: // <option value="5">PASTANDCURRENT</option>
                switch ($this->params['pivot']) {
                    case 1: // DAY
                        $query->where("((DATE_FORMAT(e.enddate,'%Y%m%d') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') between DATE_FORMAT(e.date,'%Y%m%d') and DATE_FORMAT(e.enddate,'%Y%m%d')))");
                        break;
                    case 2: // WEEK
                        $query->where("((DATE_FORMAT(e.enddate,'%Y%u') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%u') between DATE_FORMAT(e.date,'%Y%u') and DATE_FORMAT(e.enddate,'%Y%u')))");
                        break;
                    case 3: // MONTH
                        $query->where("((DATE_FORMAT(e.enddate,'%Y%m') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m') between DATE_FORMAT(e.date,'%Y%m') and DATE_FORMAT(e.enddate,'%Y%m')))");
                        break;
                    case 4: // YEAR
                        $query->where("((DATE_FORMAT(e.enddate,'%Y') <= DATE_FORMAT(UTC_TIMESTAMP(),'%Y')) or (DATE_FORMAT(UTC_TIMESTAMP(),'%Y') between DATE_FORMAT(e.date,'%Y') and DATE_FORMAT(e.enddate,'%Y')))");
                        break;
                }

                break;
        }
        switch ($this->params['sort_by']) {
            case 0: // <option value="0">EVENTS_SORT_BY_DATE_ASC</option>
                $query->order('case e.allday when 0 then e.date when 1 then date(e.date) end asc, weight DESC');
                break;
            case 1: // <option value="1">EVENTS_SORT_BY_DATE_DESC</option>
                $query->order('case e.allday when 0 then e.date when 1 then date(e.date) end desc, weight DESC');
                break;
            case 2: // <option value="2">EVENTS_SORT_BY_ENDDATE_ASC</option>
                $query->order('case e.allday when 0 then e.enddate when 1 then date(e.enddate) end asc, weight DESC');
                break;
            case 3: // <option value="3">EVENTS_SORT_BY_ENDDATE_DESC</option>
                $query->order('case e.allday when 0 then e.enddate when 1 then date(e.enddate) end desc, weight DESC');
                break;
            case 4: // <option value="4">EVENTS_SORT_BY_ID_ASC</option>
                $query->order('e.ID asc');
                break;
            case 5: // <option value="5">EVENTS_SORT_BY_ID_DESC</option>
                $query->order('e.ID Desc');
                break;
        }

        $query->where('DATE_FORMAT(e.enddate, "%Y-%m-%d %H:%i") <> "00 00-00-00 00:00"');

        $query->leftJoin('`#__allevents_agenda` AS ag ON ag.id = e.agenda_id and ag.published = 1');
        $query->leftJoin('`#__allevents_activities` AS ac ON ac.id = e.activity_id and ac.published = 1');
        $query->leftJoin('`#__allevents_categories` AS ca ON ca.id = e.category_id and ca.published = 1');
        $query->leftJoin('`#__allevents_places` AS pl ON pl.id = e.place_id and pl.published = 1');

        if ((!$user->authorise('core.admin')) && (empty($this->params['admin']))) {
            $query->where('(e.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (e.access=0))');
            $query->where('(ifnull(ag.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ag.access=0))');
            $query->where('(ifnull(ac.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ac.access=0))');
            $query->where('(ifnull(pl.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pl.access=0))');
            $query->where('(ifnull(ca.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ca.access=0))');
        }

        if (empty($this->params['gshow_eventallday'])) {
            $query->innerJoin('`#__allevents_calendar` AS cal on cal.dt = date(e.date)');
        } elseif (($this->params['view'] == 'fullcalendar') && ($this->params['layout'] != 'ajaxeventscards')) {
            $this->params['start'] = (empty($this->params['start'])) ? 0 : $this->params['start'];
            $this->params['limit'] = (empty($this->params['limit'])) ? 0 : $this->params['limit'];
            $query->innerJoin('`#__allevents_calendar` AS cal on cal.dt between date(e.date) and date(e.enddate)');
            $query->setLimit($this->params['limit'], $this->params['start']);
        } else {
            $query->innerJoin('`#__allevents_calendar` AS cal on cal.dt = date(e.date)');
        }
        $db->setQuery($query);
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AEModelItem::addFilter()
     *
     * @param mixed $name
     * @param mixed $value
     */
    protected function addFilter($name, $value)
    {
        $this->filters[$name] = $value;
    }

    /**
     * AEModelItem::addOption()
     *
     * @param mixed $name
     * @param mixed $value
     */
    protected function addOption($name, $value)
    {
        $this->options[$name] = $value;
    }

    /**
     * AEModelItem::addParam()
     *
     * @param mixed $name
     * @param mixed $value
     */
    protected function addParam($name, $value)
    {
        if ($value <> "") {
            $this->params[$name] = $value;
        } else {
            $this->params[$name] = $this->gparams[$name];
        }
    }

    /**
     * AEModelItem::agendas()
     *
     * @param mixed $atr
     *
     * @return stdClass
     */
    protected function agendas($atr)
    {
        $atr = $atr['agenda'];

        if ($this->agendas == null) {
            return null;
        } else {
            $agendas = $this->agendas;
            $itDef = self::getitDef($atr, $agendas);

            return $itDef;
        }
    }

    /**
     * AEModelItem::getitDef()
     *
     * @param $atr
     * @param $table
     *
     * @return stdClass
     * @internal param mixed $i
     */
    private function getitDef($atr, $table)
    {
        $itDef = new stdClass();
        foreach ($table as $i) {
            $it = new stdClass;
            $id = $i->id;
            foreach ($atr as $k => $v) {
                if (!empty($i->$k)) {
                    $it->$k = $i->$k;
                } else {
                    if (method_exists($this, $k)) {
                        $it->$k = $this->$k($i);
                    }
                }
            }
            $itDef->$id = $it;
        }

        return $itDef;
    }

    /**
     * AEModelItem::places()
     *
     * @param mixed $atr
     *
     * @return stdClass
     */
    protected function places($atr)
    {
        $atr = $atr['place'];
        if ($this->places == null) {
            return null;
        } else {
            $places = $this->places;
            $itDef = self::getitDef($atr, $places);

            return $itDef;
        }
    }

    /**
     * AEModelItem::calendars()
     *
     * @param mixed $atr
     *
     * @return stdClass
     */
    protected function calendars($atr)
    {
        $atr = $atr['calendar'];

        if ($this->calendars == null) {
            return null;
        } else {
            $calendars = $this->calendars;
            $itDef = self::getitDef($atr, $calendars);

            return $itDef;
        }
    }

    /**
     * AEModelItem::categories()
     *
     * @param mixed $atr
     *
     * @return stdClass
     */
    protected function categories($atr)
    {
        $atr = $atr['category'];

        if ($this->categories == null) {
            return null;
        } else {
            $categories = $this->categories;
            $itDef = self::getitDef($atr, $categories);

            return $itDef;
        }
    }

    /**
     * AEModelItem::activities()
     *
     * @param mixed $atr
     *
     * @return stdClass
     */
    protected function activities($atr)
    {
        $atr = $atr['activity'];

        if ($this->activities == null) {
            return null;
        } else {
            $activities = $this->activities;
            $itDef = self::getitDef($atr, $activities);

            return $itDef;
        }
    }

    /**
     * AEModelItem::event()
     *
     * @param mixed $atr
     *
     * @return stdClass
     */
    protected function event($atr)
    {
        if ($this->events == null) {
            return null;
        } else {
            $events = $this->events;
            $itDef = self::getitDef($atr, $events);

            return $itDef;
        }
    }

    /**
     * AEModelItem::titre()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function titre($i)
    {
        return $i->titre;
    }

    /**
     * AEModelItem::cancelled()
     *
     * @param mixed $i
     *
     * @return boolean
     */
    protected function cancelled($i)
    {
        return $i->cancelled;
    }

    /**
     * AEModelItem::vignette()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function vignette($i)
    {
        return $i->vignette;
    }

    /**
     * AEModelItem::image_bullet()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function image_bullet($i)
    {
        return $i->image_bullet;
    }

    /**
     * AEModelItem::published()
     *
     * @param mixed $i
     *
     * @return boolean
     */
    protected function published($i)
    {
        return $i->published;
    }

    /**
     * AEModelItem::id()
     *
     * @param mixed $i
     *
     * @return integer
     */
    protected function id($i)
    {
        return $i->id;
    }

    /**
     * AEModelItem::date()
     *
     * @param mixed $i
     *
     * @return mixed
     */
    protected function date($i)
    {
        $format = ($i->allday) ? $this->dateformat : $this->datetimeformat;

        $date = JHtml::_('date', $i->date, $format);

        return $date;
    }

    /**
     * AEModelItem::dateUTC()
     *
     * @param mixed $i
     *
     * @return  string
     */
    protected function dateUTC($i)
    {
        $date = $i->date;

        return $date;
    }

    /**
     * AEModelItem::enddateUTC()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function enddateUTC($i)
    {
        $date = $i->enddate;

        return $date;
    }

    /**
     * AEModelItem::start()
     *
     * @param mixed $i
     *
     * @return mixed|string
     */
    protected function start($i)
    {
        $format = ($i->allday) ? $this->dateformat : $this->datetimeformat;
        $date = JHtml::_('date', $i->date, $format);
        if (substr($date, -5) == '00:00')
            $date = rtrim(substr($date, 0, strlen($date) - 5));

        return $date;
    }

    /**
     * AEModelItem::end()
     *
     * @param mixed $i
     *
     * @return mixed|string
     */
    protected function end($i)
    {
        $format = ($i->allday) ? $this->dateformat : $this->datetimeformat;

        $enddate = JHtml::_('date', $i->enddate, $format);
        if (substr($enddate, -5) == '00:00') {
            $enddate = rtrim(substr($enddate, 0, strlen($enddate) - 5));
        }

        return $enddate;
    }

    /**
     * AEModelItem::startISO()
     *
     * @param mixed $i
     *
     * @return mixed|string
     */
    protected function startISO($i)
    {
        //fullcalendar2 : $format = ($i->allday) ? 'Y-m-d' : 'c';
        $format = ($i->allday) ? 'Y-m-d' : 'Y-m-d H:i';
        $date = JHtml::_('date', $i->date, $format);
        if (substr($date, -5) == '00:00') {
            $date = rtrim(substr($date, 0, strlen($date) - 5));
        }

        return $date;
    }

    /**
     * AEModelItem::startdateISO()
     *
     * @param mixed $i
     *
     * @return mixed
     */
    protected function startdateISO($i)
    {
        $date = JHtml::_('date', $i->date, 'Y-m-d');

        return $date;
    }

    /**
     * AEModelItem::startaefc()
     *
     * @param mixed $i
     *
     * @return mixed
     */
    protected function startaefc($i)
    {
        $date = JHtml::_('date', $i->date, 'c');

        return $date;
    }

    /**
     * AEModelItem::starttimeISO()
     *
     * @param mixed $i
     *
     * @return mixed|string
     */
    protected function starttimeISO($i)
    {
        $date = ($i->allday) ? '' : JHtml::_('date', $i->date, 'H:i');

        return $date;
    }

    /**
     * AEModelItem::enddateISO()
     *
     * @param mixed $i
     *
     * @return mixed
     */
    protected function enddateISO($i)
    {
        $date = JHtml::_('date', $i->enddate, 'Y-m-d');

        return $date;
    }

    /**
     * AEModelItem::endaefc()
     *
     * @param mixed $i
     *
     * @return mixed
     */
    protected function endaefc($i)
    {
        $date = JHtml::_('date', $i->enddate, 'c');

        return $date;
    }

    /**
     * AEModelItem::endtimeISO()
     *
     * @param mixed $i
     *
     * @return mixed|string
     */
    protected function endtimeISO($i)
    {
        $date = ($i->allday) ? '' : JHtml::_('date', $i->enddate, 'H:i');

        return $date;
    }

    /**
     * AEModelItem::startaebic()
     *
     * @param mixed $i
     *
     * @return mixed
     */
    protected function startaebic($i)
    {
        return JHtml::_('date', $i->dt, 'j/n/Y');
    }

    /**
     * AEModelItem::startaecal()
     *
     * @param mixed $i
     *
     * @return mixed
     */
    protected function startaecal($i)
    {
        $format = ($i->allday) ? 'Y-m-d' : 'Y-m-d H:i:00';

        return JHtml::_('date', $i->dt, $format);
    }

    /**
     * AEModelItem::startaezabuto()
     *
     * @param mixed $i
     *
     * @return mixed
     */
    protected function startaezabuto($i)
    {
        return JHtml::_('date', $i->dt, 'Y-m-d');
    }

    /**
     * AEModelItem::endISO()
     *
     * @param mixed $i
     *
     * @return mixed|string
     */
    protected function endISO($i)
    {
        //fullcalendar 2 : $format = ($i->allday) ? 'Y-m-d' : 'c';
        $format = ($i->allday) ? 'Y-m-d' : 'Y-m-d H:i';
        $enddate = JHtml::_('date', $i->enddate, $format);
        if (substr($enddate, -5) == '00:00') {
            $enddate = rtrim(substr($enddate, 0, strlen($enddate) - 5));
        }

        return $enddate;
    }

    /**
     * AEModelItem::borderColor()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function borderColor($i)
    {
        return self::textColor($i);
    }

    /**
     * AEModelItem::textColor()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function textColor($i)
    {
        $dc_type = $this->params['dct'];
        $dc = (isset($this->params['dc']) && ($this->params['dc'] <> "")) ? $this->params['dc'] : 0;
        if (empty($dc)) {
            return ($dc_type == 1) ? $i->couleur_texte : $i->couleur;
        } elseif ($dc == 1) {
            return ($dc_type == 1) ? $i->activity_couleur_texte : $i->activity_couleur;
        } elseif ($dc == 2) {
            return ($dc_type == 1) ? $i->category_couleur_texte : $i->category_couleur;
        }

        return $i->couleur_texte;
    }

    /**
     * AEModelItem::backgroundColor()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function backgroundColor($i)
    {
        $dc_type = $this->params['dcb'];
        $dc = (isset($this->params['dc']) && ($this->params['dc'] <> "")) ? $this->params['dc'] : 0;
        if (empty($dc)) {
            return ($dc_type == 1) ? $i->couleur_texte : $i->couleur;
        } elseif ($dc == 1) {
            return ($dc_type == 1) ? $i->activity_couleur_texte : $i->activity_couleur;
        } elseif ($dc == 2) {
            return ($dc_type == 1) ? $i->category_couleur_texte : $i->category_couleur;
        }

        return $i->couleur;
    }

    /**
     * AEModelItem::description()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function description($i)
    {
        return $i->description;
    }

    /**
     * AEModelItem::descriptionbic()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function descriptionbic($i)
    {
        return $i->description;
    }

    /**
     * AEModelItem::editable()
     *
     * @param mixed $i
     *
     * @return bool
     */
    protected function editable($i)
    {
        $user = JFactory::getUser();
        if ($user->authorise('core.edit', 'com_allevents') !== true) {
            return false;
        } elseif ($user->authorise('core.edit.own', 'com_allevents') !== true) {
            return false;
        } elseif ($i->adminLock == 1) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * AEModelItem::event_location()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function event_location($i)
    {
        $event_location = [];

        $line1 = $i->place_numero . ' ' . $i->place_rue;
        $line2 = $i->place_codepostal . ' ' . $i->place_ville;
        $line3 = $i->place_pays;
        if (!empty($line1))
            $event_location[] = $line1;
        if (!empty($line2))
            $event_location[] = $line2;
        if (!empty($line3))
            $event_location[] = $line3;

        $place_adress = implode(', ', $event_location);

        return $place_adress;
    }

    /**
     * AEModelItem::allDay()
     *
     * @param mixed $i
     *
     * @return bool
     */
    protected function allDay($i)
    {
        if ($i->allday) {
            return true;
        } else {
            $date = JHtml::_('date', $i->date, AllEventsHelperDate::jVersionFormat($this->datetimeformat));
            $enddate = JHtml::_('date', $i->enddate, AllEventsHelperDate::jVersionFormat($this->datetimeformat));
            if (($date === $enddate) and (substr($date, -5) == '00:00')) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * AEModelItem::className()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function className($i)
    {
        return 'se_agenda_' . $i->agenda_id . '_bullet';
    }

    /**
     * AEModelItem::classNameBS()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function classNameBS($i)
    {
        return 'se_agenda_' . $i->agenda_id . '_bs';
    }

    /**
     * AEModelItem::link()
     *
     * @param mixed $obj
     *
     * @return string
     */
    protected function link($obj)
    {
        return AllEventsHelperRoute::getEventRoute($obj->event_id, $obj->alias);
    }

    /**
     * AEModelItem::type_action()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function type_action($i)
    {
        return 'XXX';
    }

    /**
     * AEModelItem::activity_id()
     *
     * @param mixed $i
     *
     * @return integer
     */
    protected function activity_id($i)
    {
        return $i->activity_id;
    }

    /**
     * AEModelItem::agenda_id()
     *
     * @param mixed $i
     *
     * @return integer
     */
    protected function agenda_id($i)
    {
        return $i->agenda_id;
    }

    /**
     * AEModelItem::category_id()
     *
     * @param mixed $i
     *
     * @return integer
     */
    protected function category_id($i)
    {
        return $i->category_id;
    }

    /**
     * AEModelItem::place_id()
     *
     * @param mixed $i
     *
     * @return integer
     */
    protected function place_id($i)
    {
        return $i->place_id;
    }

    /**
     * AEModelItem::allow_overbooking()
     *
     * @param mixed $i
     *
     * @return boolean
     */
    protected function allow_overbooking($i)
    {
        return $i->allow_overbooking;
    }

    /**
     * AEModelItem::enrolments()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function enrolments($i)
    {
        $sreturn = "";

        if (($i->enrolment_max_participant == 0) || (($i->enrolment_max_participant > 0) && ($i->nb_enrolyes <= $i->enrolment_max_participant))) {
            $enrolstate = "ok";
        } elseif ($i->allow_overbooking) {
            $enrolstate = "overbooking";
        } else {
            $enrolstate = "full";
        }

        $sreturn .= '<span style="float:left" title="';
        $sreturn .= sprintf(JText::_('ENROL_NBRDEFINITIVE'), $i->nb_enrolyes);
        $sreturn .= '" class="ae_enrol ' . $enrolstate . '"> ';

        $sreturn .= $i->nb_enrolyes;
        $sreturn .= '&nbsp;/&nbsp;';
        $sreturn .= ($i->enrolment_max_participant == 0) ? '&infin;' : $i->enrolment_max_participant;
        $sreturn .= '</span>&nbsp;';
        $sreturn .= sprintf(JText::_('ENROL_NBRDEFINITIVE'), $i->nb_enrolyes);

        return $sreturn;
    }

    /**
     * AEModelItem::enrolment_enabled()
     *
     * @param mixed $i
     *
     * @return boolean
     */
    protected function enrolment_enabled($i)
    {
        return $i->enrolment_enabled;
    }

    /**
     * AEModelItem::place_vignette()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function place_vignette($i)
    {
        return $i->place_vignette;
    }

    /**
     * AEModelItem::activity_titre()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function activity_titre($i)
    {
        return $i->activity_titre;
    }

    /**
     * AEModelItem::activity_vignette()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function activity_vignette($i)
    {
        return $i->activity_vignette;
    }

    /**
     * AEModelItem::agenda_titre()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function agenda_titre($i)
    {
        return $i->agenda_titre;
    }

    /**
     * AEModelItem::agenda_image_bullet()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function agenda_image_bullet($i)
    {
        return $i->agenda_image_bullet;
    }

    /**
     * AEModelItem::activity_image_bullet()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function activity_image_bullet($i)
    {
        return $i->activity_image_bullet;
    }

    /**
     * AEModelItem::place_image_bullet()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function place_image_bullet($i)
    {
        return $i->place_image_bullet;
    }

    /**
     * AEModelItem::agenda_vignette()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function agenda_vignette($i)
    {
        return $i->agenda_vignette;
    }

    /**
     * AEModelItem::category_vignette()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function category_vignette($i)
    {
        return $i->category_vignette;
    }

    /**
     * AEModelItem::place_titre()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function place_titre($i)
    {
        return $i->place_titre;
    }

    /**
     * AEModelItem::enrolment_max_participant()
     *
     * @param mixed $i
     *
     * @return integer
     */
    protected function enrolment_max_participant($i)
    {
        return (int)$i->enrolment_max_participant;
    }

    /**
     * AEModelItem::nb_enrolyes()
     *
     * @param mixed $i
     *
     * @return integer
     */
    protected function nb_enrolyes($i)
    {
        return (int)$i->nb_enrolyes;
    }

    /**
     * AEModelItem::hot()
     *
     * @param mixed $i
     *
     * @return integer
     */
    protected function hot($i)
    {
        return (int)$i->hot;
    }

    /**
     * AEModelItem::canenrol()
     *
     * @param mixed $i
     *
     * @return bool
     */
    protected function canenrol($i)
    {
        // si pas invité
        if (JFactory::getUser()->guest)
            return false;

        $bClosed = false;
        // S'il y a une date de début des inscriptions; il faut que la date système soit après la date de début;
        // sinon la période d'inscription n'est donc pas encore ouverte
        if ($i->openingdate != null)
            $bClosed = !AllEventsHelperDate::isPast($i->openingdate);
        // Si la date de clôture des inscriptions n'est pas dans le futur, c'est donc que la période d'inscription est échue.
        if ($bClosed === false)
            $bClosed = !AllEventsHelperDate::isFuture($i->closingdate);

        return $bClosed;
    }

    /**
     * AEModelItem::affiche()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function affiche($i)
    {
        return $i->affiche;
    }

    /**
     * AEModelItem::banniere()
     *
     * @param mixed $i
     *
     * @return string
     */
    protected function banniere($i)
    {
        return $i->banniere;
    }

    /**
     * AEModelItem::enrolment_finished()
     *
     * @param mixed $i
     *
     * @return int
     */
    protected function enrolment_finished($i)
    {
        $enrolment_finished = 0;
        if (empty($i->openingdate)) {

        } else {
            if (JHtml::date($i->openingdate, 'y') == '-1') {

            } else {
                if (new JDate($i->openingdate) > new JDate('now')) {
                    $enrolment_finished = 1;
                }
            }
        }
        if (empty($i->closingdate)) {

        } else {
            if (JHtml::date($i->closingdate, 'y') == '-1') {

            } else {
                if (new JDate($i->closingdate) < new JDate('now')) {
                    $enrolment_finished = 1;
                }
            }
        }

        return $enrolment_finished;
    }

    /**
     * AEModelItem::eventfull()
     *
     * @param mixed $i
     *
     * @return bool
     */
    protected function eventfull($i)
    {
        if (($i->enrolment_max_participant == 0) || (($i->enrolment_max_participant > 0) && ($i->nb_enrolyes < $i->enrolment_max_participant)) || ($i->allow_overbooking)) {
            $eventfull = false;
        } else {
            $eventfull = true;
        }

        return $eventfull;
    }

    /**
     * AEModelItem::enroltype()
     *
     * @param mixed $i
     *
     * @return string
     * @throws Exception
     */
    protected function enroltype($i)
    {
        $Itemid = (int)JFactory::getApplication()->input->getInt('Itemid', null);
        $Itemid = ($this->gparams['gforcenomenuitem']) ? '' : $Itemid;
        $item = new stdClass();
        $item->id = $i->event_id;
        $item->nb_enrolyes = $i->nb_enrolyes;
        $item->id_enrolment = $i->id_enrolment;
        $item->enrol_perhaps = $i->enrol_perhaps;
        $item->enrol_yes = $i->enrol_yes;
        $item->enrol_no = $i->enrol_no;
        $item->enrolment_enabled = $i->enrolment_enabled;
        $item->eventfull = $i->eventfull;
        $item->enrolment_finished = $i->enrolment_finished;
        $item->cancelled = $i->cancelled;
        $item->event_in_past = $i->event_in_past;
        $item->enrol_commentaire = "";
        $item->enrol_companions = "";
        $sReturn = AllEventsHelperEventDisplay::getBlocEnrolmentForm($item, $Itemid);
        $sReturn .= AllEventsHelperEventDisplay::getBlocEnrolment($item, $this->gparams, false);

        return ($sReturn);
    }

    /**
     * AEModelItem::event_in_past()
     *
     * @param mixed $i
     *
     * @return int
     */
    protected function event_in_past($i)
    {
        return (int)$i->event_in_past;
    }

    /**
     * AEModelItem::enrol_yes()
     *
     * @param mixed $i
     *
     * @return int
     */
    protected function enrol_yes($i)
    {
        return (int)$i->enrol_yes;
    }

    /**
     * AEModelItem::enrol_no()
     *
     * @param mixed $i
     *
     * @return int
     */
    protected function enrol_no($i)
    {
        return (int)$i->enrol_no;
    }

    /**
     * AEModelItem::enrol_perhaps()
     *
     * @param mixed $i
     *
     * @return int
     */
    protected function enrol_perhaps($i)
    {
        return (int)$i->enrol_perhaps;
    }
}
