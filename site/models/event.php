<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelper'))
    require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/allevents.php';
if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

// ###
require_once JPATH_SITE . '/components/com_allevents/helpers/aeeventcontactfactory.php';

// ###
use Joomla\Registry\Registry;
use Joomla\Utilities\ArrayHelper;

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_contact/models', 'ContactModel');

/**
 * AllEventsModelEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelEvent extends JModelItem
{
    /**
     * AllEventsModelEvent::getData()
     *
     * @param mixed $id
     *
     * @return array|bool|null|object
     * @throws Exception
     */
    public function &getData($id = null)
    {
        $globalparams = AllEventsHelperParam::getGlobalParam();
        // $globalparams = JComponentHelper::getParams('com_allevents');
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $user_view_levels = $user->getAuthorisedViewLevels();
        //$date = new JDate();
        if ($this->_item === null) {
            $this->_item = false;
            if (empty($id)) {
                $id = $this->getState('event.id');
            }
            try {
                // Get a level row instance.
                $table = $this->getTable();
                // Attempt to load the row.
                $table->reset();
                if ($table->load($id)) {
                    // Check published state.
                    if ($published = $this->getState('filter.published')) {
                        if ($table->state != $published) {
                            return $this->_item;
                        }
                    }
                    $table->hits = $table->hits + 1;
                    $table->store();
                    // Convert the JTable to a clean JObject.
                    $properties = $table->getProperties(1);
                    $this->_item = ArrayHelper::toObject($properties, 'JObject');
                }
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
            }
        }

        $this->_item->activity_access = "";
        $this->_item->activity_title = "";
        $this->_item->activity_published = 0;
        $this->_item->agenda_access = "";
        $this->_item->agenda_vignette = "";
        $this->_item->activity_vignette = "";
        $this->_item->category_vignette = "";
        $this->_item->agenda_max_hits = 1000;
        $this->_item->agenda_contact_email = "";
        $this->_item->agenda_title = "";
        $this->_item->agenda_published = 0;
        $this->_item->category_access = "";
        $this->_item->category_link = "";
        $this->_item->category_title = "";
        $this->_item->category_published = 0;
        $this->_item->event_link = JUri::root() . AllEventsHelperRoute::getEventRoute($this->_item->id, $this->_item->alias);
        $this->_item->enrol_no = false;
        $this->_item->enrol_perhaps = false;
        $this->_item->enrol_yes = false;
        $this->_item->enrol_companions = 0;
        $this->_item->enrol_commentaire = "";
        $this->_item->place_address = "";
        $this->_item->place_access = "";
        $this->_item->place_adress = "";
        $this->_item->place_front = 0;
        $this->_item->place_latitude = 0;
        $this->_item->place_link = "";
        $this->_item->place_longitude = 0;
        $this->_item->place_title = "";
        $this->_item->place_codepostal = "";
        $this->_item->place_ville = "";
        $this->_item->place_street = "";
        $this->_item->place_country = "";
        $this->_item->place_zoom = 0;
        $this->_item->place_published = 0;
        $this->_item->proposed_email = "";
        $this->_item->proposed_name = "";
        $this->_item->public_access = "";
        $this->_item->public_title = "";
        $this->_item->public_published = 0;
        $this->_item->ressource_access = "";
        $this->_item->ressource_title = "";
        $this->_item->ressource_published = 0;
        $this->_item->section_access = "";
        $this->_item->section_title = "";
        $this->_item->section_published = 0;
        $this->_item->ribbon_couleur = "";
        $this->_item->ribbon_titre = "";

        //Insertion AUP
        /** Vérification du solde AUP */
        // $api_AUP = JPATH_SITE . '/components/com_alphauserpoints/helper.php';
        // if (file_exists($api_AUP))
        // {
        // require_once ($api_AUP);
        // $user = JFactory::getUser();
        // $useridaup = $user->id;
        // //Check user points
        // $referreid = AlphaUserPointsHelper::getAnyUserReferreID($useridaup);
        // $profil = AlphaUserPointsHelper::getUserInfo($referreid);
        // if (isset($profil))
        // {
        // $points = $profil->points;
        // if ($points == '0.00')
        // {
        // $this->_item->enrolment_enabled = 0;
        // }
        // }
        // }
        //Fin de l'insertion code AUP
        $this->_item->enrolmentshtml = "";
        $this->_item->enrolment_finished = 0;
        if ((!empty($this->_item->openingdate))
            && (JHtml::date($this->_item->openingdate, 'y') != '-1')
            && (new JDate($this->_item->openingdate)) > new JDate('now')
        ) {
            $this->_item->enrolment_enabled = 0;
            $this->_item->enrolment_finished = 1;
        }
        if ((!empty($this->_item->closingdate)) && (JHtml::date($this->_item->closingdate, 'y') != '-1') && (new JDate($this->_item->closingdate)) < new JDate('now')) {
            $this->_item->enrolment_finished = 1;
            $this->_item->enrolment_enabled = 0;
        }

        if (isset($this->_item->public_id) && $this->_item->public_id != '') {
            if (is_object($this->_item->public_id)) {
                $this->_item->public_id = ArrayHelper::fromObject($this->_item->public_id);
            }
            $values = (is_array($this->_item->public_id)) ? $this->_item->public_id : explode(',', $this->_item->public_id);
            //$textValue = array();
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('titre, access, published')->from('`#__allevents_public`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->public_title = $results->titre;
                    $this->_item->public_access = $results->access;
                    $this->_item->public_published = $results->published;
                    $this->_item->public_link = JRoute::_('index.php?option=com_allevents&view=public&id=' . $this->_item->public_id, false);
                }
            }
        }
        if (isset($this->_item->activity_id) && $this->_item->activity_id != '') {
            if (is_object($this->_item->activity_id)) {
                $this->_item->activity_id = ArrayHelper::fromObject($this->_item->activity_id);
            }
            $values = (is_array($this->_item->activity_id)) ? $this->_item->activity_id : explode(',', $this->_item->activity_id);
            //$textValue = array();
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('titre, vignette, access, published')->from('`#__allevents_activities`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->activity_title = $results->titre;
                    $this->_item->activity_published = $results->published;
                    $this->_item->activity_access = $results->access;
                    $this->_item->activity_link = JRoute::_('index.php?option=com_allevents&view=activity&id=' . $this->_item->activity_id, false);
                    $this->_item->vignette = (empty($this->_item->vignette) && ($globalparams->get("gdisplay_colors") == 1)) ? $results->vignette : $this->_item->vignette;
                }
            }
        }

        $this->_item->event_contacts = [];
        // €#€
        $event_contact = AllEventsContactFactory::getEventContactInstance($this->_item->contact_1_type, $this->_item->contact_1_label, $this->_item->contact_1_id, $this->_item->contact_1_details_id, $this->_item->contact_1_comprofiler_id, $this->_item->contact_1_access);
        if (isset($event_contact)) {
            $this->_item->event_contacts[] = $event_contact;
        }
        $event_contact = AllEventsContactFactory::getEventContactInstance($this->_item->contact_2_type, $this->_item->contact_2_label, $this->_item->contact_2_id, $this->_item->contact_2_details_id, $this->_item->contact_2_comprofiler_id, $this->_item->contact_2_access);
        if (isset($event_contact)) {
            $this->_item->event_contacts[] = $event_contact;
        }
        $event_contact = AllEventsContactFactory::getEventContactInstance($this->_item->contact_3_type, $this->_item->contact_3_label, $this->_item->contact_3_id, $this->_item->contact_3_details_id, $this->_item->contact_3_comprofiler_id, $this->_item->contact_3_access);
        if (isset($event_contact)) {
            $this->_item->event_contacts[] = $event_contact;
        }
        //€#€
        $this->_item->contact_libre_allowed = in_array($this->_item->contact_libre_access, $user_view_levels);

        if (isset($this->_item->proposed_by)) {
            $this->_item->proposed_name = JFactory::getUser($this->_item->proposed_by)->get('name');
            $this->_item->proposed_email = JFactory::getUser($this->_item->proposed_by)->get('email');
        } else {
            $this->_item->proposed_name = JFactory::getUser($globalparams->get("defaultuser"))->get('name');
            $this->_item->proposed_email = JFactory::getUser($globalparams->get("defaultuser"))->get('email');
        }
        if (isset($this->_item->agenda_id) && $this->_item->agenda_id != '') {
            if (is_object($this->_item->agenda_id)) {
                $this->_item->agenda_id = ArrayHelper::fromObject($this->_item->agenda_id);
            }
            $values = (is_array($this->_item->agenda_id)) ? $this->_item->agenda_id : explode(',', $this->_item->agenda_id);
            //$textValue = array();
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('titre, alias, access, contact_id, vignette, published, max_hits')->from('`#__allevents_agenda`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->agenda_title = $results->titre;
                    $this->_item->agenda_published = $results->published;
                    $this->_item->agenda_access = $results->access;
                    $this->_item->agenda_max_hits = $results->max_hits;
                    if (empty($this->_item->agenda_max_hits)) {
                        $this->_item->agenda_max_hits = 100;
                    }
                    $this->_item->agenda_link = JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $this->_item->agenda_id . ':' . $results->alias, false);
                    $this->_item->agenda_contact_id = $results->contact_id;
                    $this->_item->agenda_contact_email = JFactory::getUser($results->contact_id)->get('email');
                    $this->_item->vignette = (empty($this->_item->vignette) && ($globalparams->get("gdisplay_colors") == 0)) ? $results->vignette : $this->_item->vignette;
                }
            }
        }
        if (isset($this->_item->lastmod_by)) {
            $this->_item->lastmod_by = JFactory::getUser($this->_item->lastmod_by)->get('name');
        }
        if (isset($this->_item->section_id) && $this->_item->section_id != '') {
            if (is_object($this->_item->section_id)) {
                $this->_item->section_id = ArrayHelper::fromObject($this->_item->section_id);
            }
            $values = (is_array($this->_item->section_id)) ? $this->_item->section_id : explode(',', $this->_item->section_id);
            //$textValue = array();
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('titre, access, published')->from('`#__allevents_sections`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->section_title = $results->titre;
                    $this->_item->section_access = $results->access;
                    $this->_item->section_published = $results->published;
                    $this->_item->section_link = JRoute::_('index.php?option=com_allevents&view=section&id=' . $this->_item->section_id, false);
                }
            }
        }
        if (isset($this->_item->ribbon_id) && $this->_item->ribbon_id != '') {
            $values = (is_array($this->_item->ribbon_id)) ? $this->_item->ribbon_id : explode(',', $this->_item->ribbon_id);
            //$textValue = array();
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('titre, couleur')->from('`#__allevents_ribbon`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->ribbon_couleur = $results->couleur;
                    $this->_item->ribbon_titre = $results->titre;
                }
            }
        }
        if (isset($this->_item->category_id) && $this->_item->category_id != '') {
            if (is_object($this->_item->category_id)) {
                $this->_item->category_id = ArrayHelper::fromObject($this->_item->category_id);
            }
            $values = (is_array($this->_item->category_id)) ? $this->_item->category_id : explode(',', $this->_item->category_id);
            //$textValue = array();
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('titre, vignette, access, published')->from('`#__allevents_categories`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->category_title = $results->titre;
                    $this->_item->category_access = $results->access;
                    $this->_item->category_published = $results->published;
                    $this->_item->category_link = JRoute::_('index.php?option=com_allevents&view=category&id=' . $this->_item->category_id, false);
                    $this->_item->vignette = (empty($this->_item->vignette) && ($globalparams->get("gdisplay_colors") == 1)) ? $results->vignette : $this->_item->vignette;
                }
            }
        }
        if (isset($this->_item->ressource_id) && $this->_item->ressource_id != '') {
            if (is_object($this->_item->ressource_id)) {
                $this->_item->ressource_id = ArrayHelper::fromObject($this->_item->ressource_id);
            }
            $values = (is_array($this->_item->ressource_id)) ? $this->_item->ressource_id : explode(',', $this->_item->ressource_id);
            //$textValue = array();
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('titre, access, published')->from('`#__allevents_ressources`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->ressource_title = $results->titre;
                    $this->_item->ressource_access = $results->access;
                    $this->_item->ressource_published = $results->published;
                    $this->_item->ressource_link = JRoute::_('index.php?option=com_allevents&view=ressource&id=' . $this->_item->ressource_id, false);
                }
            }
        }
        if (isset($this->_item->place_id) && $this->_item->place_id != '') {
            if (is_object($this->_item->place_id)) {
                $this->_item->place_id = ArrayHelper::fromObject($this->_item->place_id);
            }
            $values = (is_array($this->_item->place_id)) ? $this->_item->place_id : explode(',', $this->_item->place_id);
            //$textValue = array();
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('titre, access, published')->from('`#__allevents_places`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->place_title = $results->titre;
                    $this->_item->place_access = $results->access;
                    $this->_item->place_published = $results->published;
                    $this->_item->place_link = JRoute::_('index.php?option=com_allevents&view=place&id=' . $this->_item->place_id, false);
                }
            }
            if (is_object($this->_item->place_id)) {
                $this->_item->place_id = ArrayHelper::fromObject($this->_item->place_id);
            }
            $values = (is_array($this->_item->place_id)) ? $this->_item->place_id : explode(',', $this->_item->place_id);
            $textValue = [];
            foreach ($values as $value) {
                $query = $db->getQuery(true);
                $query->select('p.numero, p.rue, p.ville, p.codepostal, p.latitude, p.longitude, p.zoom, p.front, p.phone, p.fax, p.email, p.website, p.description, p.country');
                $query->from('`#__allevents_places` p')->where('p.id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $line1 = $results->numero . ' ' . $results->rue;
                    $line2 = $results->codepostal . ' ' . $results->ville;
                    $event_location = '';
                    if ($line1 <> ' ')
                        $event_location .= $line1 . ' ';
                    if ($line2 <> ' ')
                        $event_location .= $line2;
                    $textValue[] = $event_location;
                    $this->_item->place_latitude = $results->latitude;
                    $this->_item->place_longitude = $results->longitude;
                    $this->_item->place_zoom = $results->zoom;
                    $this->_item->place_front = $results->front;
                    $this->_item->place_phone = $results->phone;
                    $this->_item->place_fax = $results->fax;
                    $this->_item->place_email = $results->email;
                    $this->_item->place_website = $results->website;
                    $this->_item->place_description = $results->description;
                    $this->_item->place_address = $results->numero . ' ' . $results->rue . ', ' . $results->codepostal . ' ' . $results->ville . ', ' . $results->country;
                    $this->_item->place_street = $line1;
                    $this->_item->place_codepostal = $results->codepostal;
                    $this->_item->place_ville = $results->ville;
                    $this->_item->place_country = $results->country;
                }
            }
            $this->_item->place_adress = implode(', ', $textValue);
        }
        if (isset($this->_item->contact_person)) {
            $this->_item->contact_person = JFactory::getUser($this->_item->contact_person)->get('name');
        }
        if (isset($this->_item->created_by)) {
            $this->_item->created_by_id = JFactory::getUser($this->_item->created_by)->get('id');
            $this->_item->created_by = JFactory::getUser($this->_item->created_by)->get('name');
        }
        $this->_item->id_enrolment = 0;
        $this->_item->yet_enrolment = 0;
        $this->_item->enroldate = '';
        $this->_item->enroltype = -1;
        $this->_item->pending = 0;
        $this->_item->event_pasted = 1;
        $this->_item->event_in_past = 1;
        $this->_item->news = 0;
        $this->_item->lastdays = 0;
        $this->_item->closingdate = 1;
        $this->_item->veille = "";
        $this->_item->nb_enrolments = 0;
        $this->_item->nb_enrolyes = 0;
        $this->_item->statenrolments = '';
        $this->_item->available_tickets = 0;

        $user = JFactory::getUser();

        if (!empty($this->_item->id)) {
            $query = $db->getQuery(true);
            $query->select('(CASE WHEN date < NOW() THEN 1 WHEN date > NOW() THEN 0 ELSE 1 END) AS event_pasted');
            $query->select('(CASE WHEN created_date >= DATE_ADD(NOW(),INTERVAL -3 DAY) THEN 1 ELSE 0 END) as news');
            $query->select('(CASE WHEN NOW() >= DATE_ADD(DATE_FORMAT(date,"%Y-%m-%d"), INTERVAL -5 DAY) THEN 1 ELSE 0 END) as lastdays');
            $query->from('`#__allevents_events`');
            $query->where('id = ' . $this->_item->id);
            $db->setQuery($query);
            $results = $db->loadObject();
            if ($results) {
                $this->_item->event_pasted = $results->event_pasted;
                $this->_item->news = $results->news;
                $this->_item->lastdays = $results->lastdays;
            }

            $query = $db->getQuery(true);
            $query->select("(CASE WHEN DATE_FORMAT(enddate,'%Y%m%d') < DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d') THEN 1 ELSE 0 END) AS event_in_past");
            $query->from('`#__allevents_events`');
            $query->where('id = ' . $this->_item->id);
            $db->setQuery($query);
            $results = $db->loadObject();
            if ($results) {
                $this->_item->event_in_past = $results->event_in_past;
            }

            $query = $db->getQuery(true);
            $query->select('CASE WHEN IF(closingdate IS NULL,0,1)=0 THEN 0 WHEN IF(closingdate = "",0,1) THEN 0 WHEN closingdate < NOW() THEN 1 WHEN closingdate > NOW() THEN 0 ELSE 1 END AS closingdate, DATE_ADD(date, INTERVAL -1 DAY) as veille');
            $query->from('`#__allevents_events`');
            $query->where('id = ' . $this->_item->id);
            $db->setQuery($query);
            $results = $db->loadObject();
            if ($results) {
                $this->_item->closingdate = $results->closingdate;
                $this->_item->veille = $results->veille;
            }

            $query = $db->getQuery(true);
            $query->select('1 as nb, id, enroldate, enroltype, pending, companions, commentaire')->from('`#__allevents_enrolments`');
            $query->where('event_id = ' . (int)$this->_item->id);
            $query->where('user_id = ' . (int)$user->get('id'));
            $query->where('(published = 1)');
            $db->setQuery($query);
            $results = $db->loadObject();
            if ($results) {
                $this->_item->yet_enrolment = $results->nb;
                $this->_item->enroldate = $results->enroldate;
                $this->_item->enroltype = $results->enroltype;
                $this->_item->pending = $results->pending;
                $this->_item->id_enrolment = $results->id;
                $this->_item->enrol_commentaire = isset($results->commentaire) ? $results->commentaire : "";
                $this->_item->enrol_companions = isset($results->companions) ? $results->companions : 0;
            }
            $this->_item->enrol_yes = ($this->_item->enroltype == 0) ? true : false;
            $this->_item->enrol_no = ($this->_item->enroltype == 1) ? true : false;
            $this->_item->enrol_perhaps = ($this->_item->enroltype == 2) ? true : false;

            $count_partipants = ($globalparams->get("gevent_companions")) ? "sum(companions+1)" : "count(*)";

            $query = $db->getQuery(true);
            $query->select($count_partipants . ' as nb');
            $query->from('`#__allevents_enrolments`');
            $query->where('event_id = ' . $this->_item->id);
            $query->where('(published = 1)');
            $db->setQuery($query);
            $results = $db->loadObject();
            if ($results) {
                $this->_item->nb_enrolments = $results->nb;
            }

            $query = $db->getQuery(true);
            $query->select($count_partipants . ' as nb');
            $query->from('`#__allevents_enrolments`');
            $query->where('(event_id = ' . $this->_item->id . ')');
            $query->where('(published = 1)');
            $query->where('(enroltype = 0)');
            $db->setQuery($query);
            $results = $db->loadObject();
            if ($results) {
                $this->_item->nb_enrolyes = $results->nb;
            }

            $count_partipants = ($globalparams->get("gevent_companions")) ? "sum(companions+1)" : "count(*)";
            $sql = 'select e.enroltype, ' . $count_partipants . ' nb from `#__allevents_enrolments` AS e where (event_id = ' . $this->_item->id . ') and (published = 1) group by e.enroltype';
            $sql .= ' union all select 9 enroltype, ' . $count_partipants . ' nb from `#__allevents_enrolments` AS e where (event_id = ' . $this->_item->id . ') and (published = 1) and (enroltype=0)';
            $sql .= ' union all select 10 enroltype, ' . $count_partipants . ' nb from `#__allevents_enrolments` AS e where (event_id = ' . $this->_item->id . ') and (published = 0)';

            $db->setQuery($sql);
            $this->_item->statenrolments = $db->loadObjectList();
        }

        if (($this->_item->enrolment_max_participant == 0) || (($this->_item->enrolment_max_participant > 0) && ($this->_item->nb_enrolyes < $this->_item->enrolment_max_participant)) || ($this->_item->allow_overbooking)) {
            $this->_item->eventfull = false;
            $this->_item->available_tickets = 1000;
        } else {
            $this->_item->eventfull = true;
        }
        if (($this->_item->enrolment_max_participant > 0) && ($this->_item->nb_enrolyes < $this->_item->enrolment_max_participant)) {
            $this->_item->available_tickets = $this->_item->enrolment_max_participant - $this->_item->nb_enrolyes;
        }
        $this->_item->enrolment_info_empty = false;
        if (empty($this->_item->enrolment_info)) {
            $this->_item->enrolment_info = JText::_('COM_ALLEVENTS_NO_DESC');
            $this->_item->enrolment_info_empty = true;
        }

        if ((($this->_item->access <> 0) && (!in_array($this->_item->access, $user->getAuthorisedViewLevels()))) || (isset($this->_item->activity_access) && ($this->_item->activity_access <> '') && ($this->_item->activity_access <> 0) && (!in_array($this->_item->activity_access, $user->getAuthorisedViewLevels()))) || (isset($this->_item->agenda_access) && ($this->_item->agenda_access <> '') && ($this->_item->agenda_access <> 0) && (!in_array($this->_item->agenda_access, $user->getAuthorisedViewLevels()))) || (isset($this->_item->category_access) && ($this->_item->category_access <> '') && ($this->_item->category_access <> 0) && (!in_array($this->_item->category_access, $user->getAuthorisedViewLevels()))) || (isset($this->_item->place_access) && ($this->_item->place_access <> '') && ($this->_item->place_access <> 0) && (!in_array($this->_item->place_access, $user->getAuthorisedViewLevels()))) || (isset($this->_item->public_access) && ($this->_item->public_access <> '') && ($this->_item->public_access <> 0) && (!in_array($this->_item->public_access, $user->getAuthorisedViewLevels()))) || (isset($this->_item->ressource_access) && ($this->_item->ressource_access <> '') && ($this->_item->ressource_access <> 0) && (!in_array($this->_item->ressource_access, $user->getAuthorisedViewLevels()))) || (isset($this->_item->section_access) && ($this->_item->section_access <> '') && ($this->_item->section_access <> 0) && (!in_array($this->_item->section_access, $user->getAuthorisedViewLevels())))
        ) {
            // $this->_item = 403;
            // $this->_item->titre = '403' ; 
            // return $this->_item;
            return 403;
        }

        $this->_item->lastplaces = false;
        if ((($this->_item->enrolment_max_participant - $this->_item->nb_enrolyes) < 5) && (($this->_item->enrolment_max_participant - $this->_item->nb_enrolyes) > 0)) {
            $this->_item->lastplaces = true;
        }

        if ((($this->_item->enrolment_max_participant - $this->_item->nb_enrolyes) < (0.05 * $this->_item->enrolment_max_participant)) && (($this->_item->enrolment_max_participant - $this->_item->nb_enrolyes) > 0)) {
            $this->_item->lastplaces = true;
        }

        $langs = JLanguageMultilang::isEnabled() ? AllEventsHelper::getInstalledLanguages() : [];
        $curlang = JFactory::getLanguage()->getTag();

        $this->_item->date_format = $globalparams->get("gdate_format");
        $this->_item->time_format = $globalparams->get("gtime_format");

        foreach ($langs as $lg) {
            if ($lg->lang_code == $curlang) {
                $montitre = 'titre' . $lg->postfix;
                $mondate_format = 'date_format' . $lg->postfix;
                $montime_format = 'time_format' . $lg->postfix;
                $mondescription = 'description' . $lg->postfix;
                $this->_item->titre = empty($this->_item->$montitre) ? $this->_item->titre : $this->_item->$montitre;
                $this->_item->date_format = empty($this->_item->$mondate_format) ? $this->_item->date_format : $this->_item->$mondate_format;
                $this->_item->time_format = empty($this->_item->$montime_format) ? $this->_item->time_format : $this->_item->$montime_format;
                $this->_item->description = empty($this->_item->$mondescription) ? $this->_item->description : $this->_item->$mondescription;
            }
        }

        // on vient compléter les données avec les plugins AllEvents (Développements spécifiques)
        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('allevents');
        $dispatcher->trigger('onBeforeAlleventsEventForm', [&$this->_item]);
        if (!isset($this->_item->fields)) {
            $this->_item->fields = [];
        }
        if (class_exists('FieldsHelper')) {
            // Convert parameter fields to objects.
            $this->_item->params = new Registry($this->_item->params);
            $this->_item->params = $this->_item->params->toArray();
            $this->_item->fields = FieldsHelper::getFields('com_allevents.event', $this->_item, true, $this->_item->params);
        }

        return $this->_item;
    }

    /**
     * AllEventsModelEvent::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Event', $prefix = 'AllEventsTable', $config = [])
    {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');

        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelEvent::checkin()
     *
     * @param mixed $id
     *
     * @return bool
     * @throws Exception
     */
    public function checkin($id = null)
    {
        // Get the id.
        $id = (!empty($id)) ? $id : (int)$this->getState('event.id');
        if ($id) {
            // Initialise the table
            $table = $this->getTable();
            // Attempt to check the row in.
            if (method_exists($table, 'checkin')) {
                try {
                    $table->checkIn($id);
                } catch (Exception $e) {
                    JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                    return false;
                }
            }
        }

        return true;
    }

    /**
     * AllEventsModelEvent::checkout()
     *
     * @param mixed $id
     *
     * @return bool
     * @throws Exception
     */
    public function checkout($id = null)
    {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int)$this->getState('event.id');
        if ($id) {
            // Initialise the table
            $table = $this->getTable();
            // Get the current user object.
            $user = JFactory::getUser();
            // Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                try {
                    $table->checkOut($user->get('id'), $id);
                } catch (Exception $e) {
                    JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                    return false;
                }

            }
        }

        return true;
    }

    /**
     * AllEventsModelEvent::publish()
     *
     * @param mixed $id
     * @param mixed $state
     *
     * @return bool
     * @throws Exception
     */
    public function publish($id, $state)
    {
        try {
            $table = $this->getTable();
            $table->reset();
            if ($table->load($id)) {
                $table->published = $state;

                return $table->store();
            }
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return false;
        }

        return true;
    }

    /**
     * AllEventsModelEvent::delete()
     *
     * @param mixed $id
     * @param int $user_id
     *
     * @return bool
     * @throws Exception
     */
    public function delete($id, $user_id = 0)
    {
        if (empty($user_id)) {
            $user = JFactory::getUser();
        } else {
            $user = JFactory::getUser($user_id);
        }
        $jdate = new JDate('');
        if ($user->authorise('core.edit', 'com_allevents') !== true) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }
        $table = $this->getTable();
        $table->reset();
        try {
            if ($table->load($id)) {
                // $table->deleted    = 1;
                $table->published = -2;
                $table->lastmod_by = $user->get('id');
                $table->lastmod = AllEventsHelperDate::DateToUTC($jdate->format('Y-m-d H:i:s'));

                return $table->store();
            }
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
        }

        return false;
    }

    /**
     * AllEventsModelEvent::approve()
     *
     * @param mixed $id
     *
     * @return bool
     * @throws Exception
     */
    public function approve($id)
    {
        $dispatcher = JEventDispatcher::getInstance();

        if (JFactory::getUser()->authorise('core.approve', 'com_allevents') !== true) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }
        try {
            $table = $this->getTable();
            $table->reset();
            if ($table->load($id)) {
                $table->proposal = 0;
                $table->store();
                $dispatcher->trigger('onApproveEvent', $id);

                return true;
            }
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return false;
        }

        return false;
    }

    /**
     * AllEventsModelEvent::getEnrolments()
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function &getEnrolments($id = null)
    {
        $db = JFactory::getDbo();
        if (empty($id)) {
            $id = $this->getState('event.id');
        }
        if (empty($id)) {
            return null;
        }
        $sql = '';
        $sql .= ' select e.titre event_titre, DATE_FORMAT(e.date, "%Y-%m-%d %H:%i") AS event_date, DATE_FORMAT(e.enddate, "%Y-%m-%d %H:%i") AS event_enddate,  e.allday AS event_allday,';
        $sql .= '     e.activity_id, ac.titre activity_titre,';
        $sql .= '     e.agenda_id, ag.titre agenda_titre,';
        $sql .= '     e.category_id, ca.titre category_titre,';
        $sql .= '     e.place_id, pl.titre place_titre,';
        $sql .= '     e.public_id, pu.titre public_titre,';
        $sql .= '     e.ressource_id, re.titre ressource_titre,';
        $sql .= '     e.section_id, se.titre section_titre,';
        $sql .= '     user_id.name AS created_by, en.user_id,';
        $sql .= '     en.pending, en.published, en.event_id, en.enroltype, en.commentaire, en.enroldate, en.rank, en.id, en.lastmod, en.companions+1 as companions';
        $sql .= ' from (SELECT u1.user_id, u1.published, u1.event_id, u1.id, u1.enroltype, u1.lastmod, u1.commentaire, u1.companions, DATE_FORMAT(u1.enroldate, "%Y-%m-%d %H:%i") enroldate, u1.pending, count(u2.enroldate)+1 as rank';
        $sql .= '       FROM #__allevents_enrolments u1';
        $sql .= '       LEFT OUTER JOIN #__allevents_enrolments as u2 ON ((u2.enroldate < u1.enroldate) and (u2.event_id = u1.event_id) and (u2.enroltype = u1.enroltype) and (u2.published = u1.published))';
        $sql .= '       where (u1.published IN (0, 1) and (u1.published = 1))';
        $sql .= '       GROUP BY u1.user_id, u1.published, u1.event_id, u1.id, u1.enroltype, u1.lastmod, u1.commentaire, u1.enroldate, u1.pending) as en ';
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
        $sql .= ' and (e.proposal = 0)';
        $sql .= ' and (en.event_id=' . (int)$id . ' )';
        $sql .= ' order by (case when en.enroltype = 0 then 0 when en.enroltype = 1 then 3 when en.enroltype = 2 then 2 when en.enroltype = 3 then 1 end) ASC, en.rank asc';
        $db->setQuery($sql);
        $this->_enrolments = $db->loadObjectList();

        return $this->_enrolments;
    }

    /**
     * AllEventsModelEvent::validate()
     *
     * @param mixed $form
     * @param mixed $data
     * @param mixed $group
     *
     * @return mixed
     */
    public function validate($form, $data, $group = null)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('event.id');
        $user = JFactory::getUser();
        $jdate = new JDate('', 'UTC');
        // si création
        if ($id == 0) {
            $data['proposed_by'] = !empty($data['proposed_by']) ? $data['proposed_by'] : $user->get('id');
            $data['created_by'] = $user->get('id');
            $data['created_date'] = $jdate->format('Y-m-d H:i:s');
            $data['version'] = 0;
            if (!isset($data['alias'])) {
                $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
            }
        }

        if (empty($data['alias'])) {
            $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
        }
        $data['lastmod_by'] = $user->get('id');
        $data['lastmod'] = $jdate->format('Y-m-d H:i:s');
        $data['version'] = $data['version'] + 1;
        $lang = JFactory::getLanguage();
        $curlang = $lang->getTag();
        $langs = JLanguageMultilang::isEnabled() ? AllEventsHelper::getInstalledLanguages() : [];
        foreach ($langs as $lg) {
            if ($lg->lang_code == $curlang) {
                $data['description' . $lg->postfix] = $data['description'];
            }
        }

        return parent::validate($form, $data, $group);
    }

    /**
     * AllEventsModelEvent::populateState()
     *
     * @throws Exception
     */
    protected function populateState()
    {
        $app = JFactory::getApplication('com_allevents');
        // Load state from the request userState on edit or from the passed variable on default
        if ($app->input->getString('layout') == 'edit') {
            $id = $app->getUserState('com_allevents.edit.event.id');
        } else {
            $id = $app->input->getInt('id');
            $app->setUserState('com_allevents.edit.event.id', $id);
        }
        $this->setState('event.id', $id);
        // Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if (isset($params_array['item_id'])) {
            $this->setState('event.id', $params_array['item_id']);
        }
        $this->setState('params', $params);
    }

    /**
     * AllEventsModelEvent::preprocessForm()
     *
     * @param JForm $form
     * @param array $data
     * @param string $group
     *
     * @throws Exception
     * @internal param bool $loadData
     */
    protected function preprocessForm(JForm $form, $data, $group = 'user')
    {
        // Get the dispatcher.
        JPluginHelper::importPlugin('allevents');
        $dispatcher = JEventDispatcher::getInstance();

        // Trigger the form preparation event.
        $dispatcher->trigger('onAllEventsPrepareForm', [$form, $data]);

        parent::preprocessForm($form, $data, $group);
    }
}
