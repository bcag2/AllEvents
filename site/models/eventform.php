<?php

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modelform');
jimport('joomla.event.dispatcher');
use Joomla\Utilities\ArrayHelper;

if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

// €#€
if (!class_exists('AllEventsCustomfields'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aecustomfields.php';
// €#€
require_once JPATH_SITE . '/components/com_allevents/helpers/aeeventcontactparametersfactory.php';

/**
 * AllEventsModelEventForm
 *
 * @access public
 */
class AllEventsModelEventForm extends JModelForm
{
    var $_item = null;

    /**
     * Method to check in an item.
     *
     * @param    integer        The id of the row to check out.
     *
     * @return    boolean        True on success, false on failure.
     * @throws Exception
     * @since    1.6
     */
    public function checkIn($id = null)
    {
        $app = JFactory::getApplication();
        // Get the id.
        $id = (!empty($id)) ? $id : (int)$this->getState('event.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Attempt to check the row in.
            if (method_exists($table, 'checkIn')) {
                try {
                    $table->checkIn($id);
                } catch (Exception $e) {
                    $app->enqueueMessage($e->getMessage(), 'error');

                    return false;
                }
            }
        }

        return true;
    }

    /**
     * AllEventsModelEventForm::getTable()
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
     * Method to check out an item for editing.
     *
     * @param    integer        The id of the row to check out.
     *
     * @return    boolean        True on success, false on failure.
     * @throws Exception
     * @since    1.6
     */
    public function checkOut($id = null)
    {
        $app = JFactory::getApplication();
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
                    $app->enqueueMessage($e->getMessage(), 'error');

                    return false;
                }
            }
        }

        return true;
    }

    /**
     * AllEventsModelEventForm::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm('com_allevents.eventform', 'eventform', ['control' => 'jform', 'load_data' => $loadData]);
        if (empty($form)) {
            return false;
        }

        return $form;
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
     * AllEventsModelEventForm::save()
     *
     * @param mixed $data
     * @param int $user_id
     *
     * @return bool
     */
    public function save($data, $user_id = 0)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('event.id');
        //$state = (!empty($data['state'])) ? 1 : 0;
        $params = AllEventsHelperParam::getGlobalParam();
        $config = JFactory::getConfig();
        if (empty($user_id)) {
            $user = JFactory::getUser();
        } else {
            $user = JFactory::getUser($user_id);
        }
        $jdate = new JDate('');
        $db = JFactory::getDbo();
        $isNew = false;

        if ($id) {
            // c'est une modification
            $authorised = $user->authorise('core.edit', 'com_allevents') || $user->authorise('core.edit.own', 'com_allevents');
            if ($authorised) { // The user cannot edit the state of the item.
                $data['state'] = 0;
            }
        } else {
            $isNew = true;
            $data['id'] = 0;
            if ($user->authorise('core.approve', 'com_allevents') === true) {
                $data['proposal'] = 0;
            } else {
                $data['proposal'] = 1;
            }
            $data['created_by'] = $user->get('id');
            $data['proposed_by'] = $user->get('id');
            $data['created_date'] = AllEventsHelperDate::DateToUTC($jdate->format('Y-m-d H:i:s'));
            $data['version'] = 0;
            $data['titre'] = trim($data['titre']);
            if (isset($data['alias']) == false) {
                jimport('joomla.filter.output');
                $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
            }
            if (isset($this->_item->menu_params)) {
                $data['contact_libre_access'] = (int)$this->_item->menu_params['contact_libre_access'];
                $data['contact_1_type'] = (int)$this->_item->menu_params['contact_1_type'];
                $data['contact_1_label'] = $this->_item->menu_params['contact_1_label'];
                $data['contact_1_access'] = (int)$this->_item->menu_params['contact_1_access'];
                $data['contact_2_type'] = (int)$this->_item->menu_params['contact_2_type'];
                $data['contact_2_label'] = $this->_item->menu_params['contact_2_label'];
                $data['contact_2_access'] = (int)$this->_item->menu_params['contact_2_access'];
                $data['contact_3_type'] = (int)$this->_item->menu_params['contact_3_type'];
                $data['contact_3_label'] = $this->_item->menu_params['contact_3_label'];
                $data['contact_3_access'] = (int)$this->_item->menu_params['contact_3_access'];

                // Save menu parameters for future modifications
                $event_params = [];
                $event_params['agenda_id'] = $this->_item->menu_params['agenda_id'];
                $event_params['activity_id'] = $this->_item->menu_params['activity_id'];
                $event_params['public_id'] = $this->_item->menu_params['public_id'];
                $event_params['place_id'] = $this->_item->menu_params['place_id'];
                $event_params['ressource_id'] = $this->_item->menu_params['ressource_id'];
                $event_params['section_id'] = $this->_item->menu_params['section_id'];
                $event_params['category_id'] = $this->_item->menu_params['category_id'];
                if (isset($this->_item->menu_params['evt_creation_instructions'])) {
                    $event_params['evt_creation_instructions'] = $this->_item->menu_params['evt_creation_instructions'];
                }
                switch ($this->_item->contact_1_type) {
                    case 2 :
                        if (isset($this->_item->menu_params['contact_1_details_category'])) {
                            $event_params['contact_1_details_category'] = $this->_item->menu_params['contact_1_details_category'];
                        }
                        break;
                    case 3 :
                        if (isset($this->_item->menu_params['contact_1_comprofiler_list'])) {
                            $event_params['contact_1_comprofiler_list'] = $this->_item->menu_params['contact_1_comprofiler_list'];
                        }
                }
                switch ($this->_item->contact_2_type) {
                    case 2 :
                        if (isset($this->_item->menu_params['contact_2_details_category'])) {
                            $event_params['contact_2_details_category'] = $this->_item->menu_params['contact_2_details_category'];
                        }
                        break;
                    case 3 :
                        if (isset($this->_item->menu_params['contact_2_comprofiler_list'])) {
                            $event_params['contact_2_comprofiler_list'] = $this->_item->menu_params['contact_2_comprofiler_list'];
                        }
                }
                switch ($this->_item->contact_3_type) {
                    case 2 :
                        if (isset($this->_item->menu_params['contact_3_details_category'])) {
                            $event_params['contact_3_details_category'] = $this->_item->menu_params['contact_3_details_category'];
                        }
                        break;
                    case 3 :
                        if (isset($this->_item->menu_params['contact_3_comprofiler_list'])) {
                            $event_params['contact_3_comprofiler_list'] = $this->_item->menu_params['contact_3_comprofiler_list'];
                        }
                }
                $data['params'] = json_encode($event_params);
            }
            // Check the user can create new items in this section
            $authorised = $user->authorise('core.create', 'com_allevents');
            if ($authorised) // The user cannot edit the state of the item.
            {
                $data['state'] = 0;
            }
        }

        // if ($authorised !== true) {
        // JFactory::getApplication()->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
        // return false;
        // }
        // dans tous les cas on incrémente les données de modifications
        $data['lastmod_by'] = $user->get('id');
        $data['lastmod'] = AllEventsHelperDate::DateToUTC($jdate->format('Y-m-d H:i:s'));

        if (isset($data['version'])) {
            $data['version'] = $data['version'] + 1;
        }

        if (empty($data['vignette'])) {
            $lvignette = "";
            switch ($params['gdisplay_colors']) {
                case 0: // AGENDA
                    if (isset($data['agenda_id'])) {
                        $query = $db->getQuery(true);
                        $query->select('vignette')->from('`#__allevents_agenda`')->where('id = ' . (int)$data['agenda_id']);
                        $db->setQuery($query);
                        $results = $db->loadObject();
                        if ($results) {
                            $lvignette = $results->vignette;
                        }
                    }
                    break;
                case 1: // ACTIVITY
                    if (isset($data['activity_id'])) {
                        $query = $db->getQuery(true);
                        $query->select('vignette')->from('`#__allevents_activities`')->where('id = ' . (int)$data['activity_id']);
                        $db->setQuery($query);
                        $results = $db->loadObject();
                        if ($results) {
                            $lvignette = $results->vignette;
                        }
                    }
                    break;
                case 2: // CATEGORY
                    if (isset($data['category_id'])) {
                        $query = $db->getQuery(true);
                        $query->select('vignette')->from('`#__allevents_categories`')->where('id = ' . (int)$data['category_id']);
                        $db->setQuery($query);
                        $results = $db->loadObject();
                        if ($results) {
                            $lvignette = $results->vignette;
                        }
                    }
                    break;
            }
            $data['vignette'] = $lvignette;
        }

        //$dt = new DateTimeZone($user->getParam('timezone', $config->get('offset')));

        // on va mettre les dates au format UTC+00Z
        if ($data['allday'] == "1") {
            $date = DateTime::createFromFormat($params['gdate_format'], $data['date']);
            $enddate = DateTime::createFromFormat($params['gdate_format'], $data['enddate']);
        } else {
            $date = DateTime::createFromFormat($params['gdatetime_format'], $data['date']);
            $enddate = DateTime::createFromFormat($params['gdatetime_format'], $data['enddate']);
        }

        $dt = new DateTimeZone($user->getParam('timezone', $config->get('offset')));
        if (!empty($date)) {
            $ldate = new JDate($date->format('Y-m-d H:i'), $dt);
            $data['date'] = $ldate->format('Y-m-d H:i', false, false);
        } else {
            $data['date'] = '';
        }

        if (!empty($enddate)) {
            $ldate = new JDate($enddate->format('Y-m-d H:i'), $dt);
            $data['enddate'] = $ldate->format('Y-m-d H:i', false, false);
        } else {
            $data['enddate'] = '';
        }

        if (!empty($data['closingdate'])) {
            $data['closingdate'] = AllEventsHelperDate::DateToUTC($data['closingdate']);
        } else {
            // par défaut, la date de fin d'inscription = date début de l'évènement
            $data['closingdate'] = $data['date'];
        }
        if (!empty($data['openingdate']))
            $data['openingdate'] = AllEventsHelperDate::DateToUTC($data['openingdate']);
        if (!empty($data['expirationdate']))
            $data['expirationdate'] = AllEventsHelperDate::DateToUTC($data['expirationdate']);
        if (!empty($data['publishingdate']))
            $data['publishingdate'] = AllEventsHelperDate::DateToUTC($data['publishingdate']);

        $table = $this->getTable();
        if ($table->save($data) === true) {
            $event_id = $table->id;
            // €€€
            // Save Custom Fields to database
            if (isset($data['custom_fields']) && is_array($data['custom_fields'])) {
                AllEventsCustomfields::saveToData($data['custom_fields'], 'event', $event_id);
            }
            // €€€

            // on vient compléter les données avec les plugins AllEvents (Développements spécifiques)
            $dispatcher = JEventDispatcher::getInstance();
            JPluginHelper::importPlugin('allevents');
            $dispatcher->trigger('onAfterAlleventsEventSave', [&$data, $isNew, $event_id]);

            return $event_id;
        } else {
            return false;
        }
    }

    /**
     * AllEventsModelEventForm::populateState()
     *
     * @throws Exception
     */
    protected function populateState()
    {
        $id = JFactory::getApplication('com_allevents')->input->getInt('id');
        $this->setState('event.id', $id);
    }

    /**
     * AllEventsModelEventForm::loadFormData()
     *
     * @return array|mixed|null|object
     * @throws Exception
     */
    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.event.data', []);
        if (empty($data)) {
            $data = $this->getData();
        }

        return $data;
    }

    /**
     * AllEventsModelEventForm::getData()
     *
     * @param mixed $id
     *
     * @return null|object
     * @throws Exception
     */
    public function &getData($id = null)
    {
        $params = AllEventsHelperParam::getGlobalParam();
        $app = JFactory::getApplication();
        $db = JFactory::getDbo();
        if (empty($id)) {
            $id = $this->getState('event.id');
        }
        $user = JFactory::getUser();
        $user_view_levels = $user->getAuthorisedViewLevels();
        // Get a level row instance.
        $table = $this->getTable();
        // Attempt to load the row.
        $table->reset();
        try {
            if ($table->load($id)) {
                $id = $table->id;
                $canEdit = $user->authorise('core.edit', 'com_allevents') || $user->authorise('core.create', 'com_allevents');
                if (!$canEdit && $user->authorise('core.edit.own', 'com_allevents.' . $id)) {
                    $canEdit = $user->get('id') == $table->created_by;
                }

                if (!$canEdit) {
                    $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
                }
                // Check published state.
                if ($published = $this->getState('filter.published')) {
                    if ($table->state != $published) {
                        return $this->_item;
                    }
                }
                // Convert the JTable to a clean JObject.
                $properties = $table->getProperties(1);

                $this->_item = ArrayHelper::toObject($properties, 'JObject');
                $this->_item->event_contacts_parameters = [];
                $this->_item->entities_parameters = [];
                $this->_item->agenda_title = "";

                if (empty($this->_item->id)) {
                    // Override vith default values
                    $this->_item->enrolment_enabled = $params['genrol_on'];
                    $this->_item->menu_params = $app->getMenu()->getActive()->params->toArray();

                    if ($params['controlpanel_showagendas'] && $params['geventshow_agenda']) {
                        if (empty($this->_item->menu_params['agenda_id'])) {
                            $agendas_model = JModelLegacy::getInstance('Agendas', 'AllEventsModel');
                            $agenda_id = $agendas_model->GetDefaultAgendaId();
                        } elseif ($this->_item->menu_params['agenda_id'] == -1) {
                            $agendas_model = JModelLegacy::getInstance('Agendas', 'AllEventsModel');
                            $agenda_id = $agendas_model->GetDefaultAgendaId();
                        } else {
                            $agenda_id = (int)$this->_item->menu_params['agenda_id'];
                        }
                    } else {
                        $agenda_id = 0;
                    }
                    $this->_item->agenda_id = isset($agenda_id) ? (int)$agenda_id : 0;

                    if ($params['controlpanel_showactivities'] && $params['geventshow_activity']) {
                        if (empty($this->_item->menu_params['activity_id'])) {
                            $activity_id = 0;
                        } elseif ($this->_item->menu_params['activity_id'] == -1) {
                            $activities_model = JModelLegacy::getInstance('Activities', 'AllEventsModel');
                            $activity_id = $activities_model->GetDefaultActivityIdForAgenda($agenda_id);
                        } else {
                            $activity_id = (int)$this->_item->menu_params['activity_id'];
                        }
                    } else {
                        $activity_id = 0;
                    }
                    $this->_item->activity_id = isset($activity_id) ? (int)$activity_id : 0;

                    if ($params['controlpanel_showpublics'] && $params['geventshow_public']) {
                        if (empty($this->_item->menu_params['public_id'])) {
                            $public_id = 0;
                        } elseif ($this->_item->menu_params['public_id'] == -1) {
                            $publics_model = JModelLegacy::getInstance('Publics', 'AllEventsModel');
                            $public_id = $publics_model->GetDefaultPublicIdForAgenda($agenda_id);
                        } else {
                            $public_id = (int)$this->_item->menu_params['public_id'];
                        }
                    } else {
                        $public_id = 0;
                    }
                    $this->_item->public_id = isset($public_id) ? (int)$public_id : 0;

                    if ($params['controlpanel_showplaces'] && $params['geventshow_place']) {
                        if (empty($this->_item->menu_params['place_id'])) {
                            $place_id = 0;
                        } elseif ($this->_item->menu_params['place_id'] == -1) {
                            $places_model = JModelLegacy::getInstance('Places', 'AllEventsModel');
                            $place_id = $places_model->GetDefaultPlaceIdForAgenda($agenda_id);
                        } else {
                            $place_id = (int)$this->_item->menu_params['place_id'];
                        }
                    } else {
                        $place_id = 0;
                    }
                    $this->_item->place_id = isset($place_id) ? (int)$place_id : 0;

                    if ($params['controlpanel_showressources'] && $params['geventshow_ressource']) {
                        if (empty($this->_item->menu_params['ressource_id'])) {
                            $ressource_id = 0;
                        } elseif ($this->_item->menu_params['ressource_id'] == -1) {
                            $ressources_model = JModelLegacy::getInstance('Ressources', 'AllEventsModel');
                            $ressource_id = $ressources_model->GetDefaultRessourceIdForAgenda($agenda_id);
                        } else {
                            $ressource_id = (int)$this->_item->menu_params['ressource_id'];
                        }
                    } else {
                        $ressource_id = 0;
                    }
                    $this->_item->ressource_id = isset($ressource_id) ? (int)$ressource_id : 0;

                    if ($params['controlpanel_showsections'] && $params['geventshow_section']) {
                        if (empty($this->_item->menu_params['section_id'])) {
                            $section_id = 0;
                        } elseif ($this->_item->menu_params['section_id'] == -1) {
                            $sections_model = JModelLegacy::getInstance('Sections', 'AllEventsModel');
                            $section_id = $sections_model->GetDefaultSectionId();
                        } else {
                            $section_id = (int)$this->_item->menu_params['section_id'];
                        }
                    } else {
                        $section_id = 0;
                    }
                    $this->_item->section_id = isset($section_id) ? (int)$section_id : 0;

                    if ($params['controlpanel_showcategories'] && $params['geventshow_category']) {
                        if (empty($this->_item->menu_params['category_id'])) {
                            $category_id = 0;
                        } elseif ($this->_item->menu_params['category_id'] == -1) {
                            $categories_model = JModelLegacy::getInstance('Categories', 'AllEventsModel');
                            $category_id = $categories_model->GetDefaultCategoryIdForSection($section_id);
                        } else {
                            $category_id = (int)$this->_item->menu_params['category_id'];
                        }
                    } else {
                        $category_id = 0;
                    }
                    $this->_item->category_id = isset($category_id) ? (int)$category_id : 0;

                    // Override contacts parameters
                    $this->_item->contact_libre_access = !isset($this->_item->menu_params['contact_libre_access']) ? "" : (int)$this->_item->menu_params['contact_libre_access'];
                    $this->_item->contact_1_type = !isset($this->_item->menu_params['contact_1_type']) ? "" : (int)$this->_item->menu_params['contact_1_type'];
                    $this->_item->contact_1_label = !isset($this->_item->menu_params['contact_1_label']) ? "" : $this->_item->menu_params['contact_1_label'];
                    $this->_item->contact_1_access = !isset($this->_item->menu_params['contact_1_access']) ? "" : (int)$this->_item->menu_params['contact_1_access'];
                    $this->_item->contact_2_type = !isset($this->_item->menu_params['contact_2_type']) ? "" : (int)$this->_item->menu_params['contact_2_type'];
                    $this->_item->contact_2_label = !isset($this->_item->menu_params['contact_2_label']) ? "" : $this->_item->menu_params['contact_2_label'];
                    $this->_item->contact_2_access = !isset($this->_item->menu_params['contact_2_access']) ? "" : (int)$this->_item->menu_params['contact_2_access'];
                    $this->_item->contact_3_type = !isset($this->_item->menu_params['contact_3_type']) ? "" : (int)$this->_item->menu_params['contact_3_type'];
                    $this->_item->contact_3_label = !isset($this->_item->menu_params['contact_3_label']) ? "" : $this->_item->menu_params['contact_3_label'];
                    $this->_item->contact_3_access = !isset($this->_item->menu_params['contact_3_access']) ? "" : (int)$this->_item->menu_params['contact_3_access'];

                    // Entities parameters
                    $this->_item->entities_parameters['agenda_id'] = !isset($this->_item->menu_params['agenda_id']) ? "" : $this->_item->menu_params['agenda_id'];
                    $this->_item->entities_parameters['activity_id'] = !isset($this->_item->menu_params['activity_id']) ? "" : $this->_item->menu_params['activity_id'];
                    $this->_item->entities_parameters['public_id'] = !isset($this->_item->menu_params['public_id']) ? "" : $this->_item->menu_params['public_id'];
                    $this->_item->entities_parameters['place_id'] = !isset($this->_item->menu_params['place_id']) ? "" : $this->_item->menu_params['place_id'];
                    $this->_item->entities_parameters['ressource_id'] = !isset($this->_item->menu_params['ressource_id']) ? "" : $this->_item->menu_params['ressource_id'];
                    $this->_item->entities_parameters['section_id'] = !isset($this->_item->menu_params['section_id']) ? "" : $this->_item->menu_params['section_id'];
                    $this->_item->entities_parameters['category_id'] = !isset($this->_item->menu_params['category_id']) ? "" : $this->_item->menu_params['category_id'];

                    // Contacts parameters
                    $event_contact_parameters = AllEventsContactParametersFactory::getEventContactParametersInstance(1, $this->_item->contact_1_type,
                        $this->_item->contact_1_label, $this->_item->contact_1_access,
                        isset($this->_item->menu_params['contact_1_details_category']) ? $this->_item->menu_params['contact_1_details_category'] : null,
                        isset($this->_item->menu_params['contact_1_comprofiler_list']) ? $this->_item->menu_params['contact_1_comprofiler_list'] : null);
                    if (isset($event_contact_parameters)) {
                        $this->_item->event_contacts_parameters[] = $event_contact_parameters;
                    }
                    $event_contact_parameters = AllEventsContactParametersFactory::getEventContactParametersInstance(2, $this->_item->contact_2_type,
                        $this->_item->contact_2_label, $this->_item->contact_2_access,
                        isset($this->_item->menu_params['contact_2_details_category']) ? $this->_item->menu_params['contact_2_details_category'] : null,
                        isset($this->_item->menu_params['contact_2_comprofiler_list']) ? $this->_item->menu_params['contact_2_comprofiler_list'] : null);
                    if (isset($event_contact_parameters)) {
                        $this->_item->event_contacts_parameters[] = $event_contact_parameters;
                    }
                    $event_contact_parameters = AllEventsContactParametersFactory::getEventContactParametersInstance(3, $this->_item->contact_3_type,
                        $this->_item->contact_3_label, $this->_item->contact_3_access,
                        isset($this->_item->menu_params['contact_3_details_category']) ? $this->_item->menu_params['contact_3_details_category'] : null,
                        isset($this->_item->menu_params['contact_3_comprofiler_list']) ? $this->_item->menu_params['contact_3_comprofiler_list'] : null);
                    if (isset($event_contact_parameters)) {
                        $this->_item->event_contacts_parameters[] = $event_contact_parameters;
                    }

                    $this->_item->evt_creation_instructions = !isset($this->_item->menu_params['evt_creation_instructions']) ? "" : $this->_item->menu_params['evt_creation_instructions'];

                    if (isset($this->_item->menu_params['contact_libre_access'])) {
                        $this->_item->contact_libre_allowed = in_array($this->_item->menu_params['contact_libre_access'], $user_view_levels);
                    } else {
                        $this->_item->contact_libre_allowed = false;
                    }
                } else {
                    if (isset($this->_item->params) && $this->_item->params != '') {
                        $this->_item->menu_params = json_decode($this->_item->params, true);
                    } else {
                        $this->_item->menu_params = [];
                    }

                    // Entities parameters
                    if (isset($this->_item->menu_params['agenda_id'])) {
                        $this->_item->entities_parameters['agenda_id'] = $this->_item->menu_params['agenda_id'];
                    }
                    if (isset($this->_item->menu_params['activity_id'])) {
                        $this->_item->entities_parameters['activity_id'] = $this->_item->menu_params['activity_id'];
                    }
                    if (isset($this->_item->menu_params['public_id'])) {
                        $this->_item->entities_parameters['public_id'] = $this->_item->menu_params['public_id'];
                    }
                    if (isset($this->_item->menu_params['place_id'])) {
                        $this->_item->entities_parameters['place_id'] = $this->_item->menu_params['place_id'];
                    }
                    if (isset($this->_item->menu_params['ressource_id'])) {
                        $this->_item->entities_parameters['ressource_id'] = $this->_item->menu_params['ressource_id'];
                    }
                    if (isset($this->_item->menu_params['section_id'])) {
                        $this->_item->entities_parameters['section_id'] = $this->_item->menu_params['section_id'];
                    }
                    if (isset($this->_item->menu_params['category_id'])) {
                        $this->_item->entities_parameters['category_id'] = $this->_item->menu_params['category_id'];
                    }

                    // Contacts parameters
                    $event_contact_parameters = AllEventsContactParametersFactory::getEventContactParametersInstance(1, $this->_item->contact_1_type,
                        $this->_item->contact_1_label, $this->_item->contact_1_access,
                        isset($this->_item->menu_params['contact_1_details_category']) ? $this->_item->menu_params['contact_1_details_category'] : null,
                        isset($this->_item->menu_params['contact_1_comprofiler_list']) ? $this->_item->menu_params['contact_1_comprofiler_list'] : null);
                    if (isset($event_contact_parameters)) {
                        $this->_item->event_contacts_parameters[] = $event_contact_parameters;
                    }
                    $event_contact_parameters = AllEventsContactParametersFactory::getEventContactParametersInstance(2, $this->_item->contact_2_type,
                        $this->_item->contact_2_label, $this->_item->contact_2_access,
                        isset($this->_item->menu_params['contact_2_details_category']) ? $this->_item->menu_params['contact_2_details_category'] : null,
                        isset($this->_item->menu_params['contact_2_comprofiler_list']) ? $this->_item->menu_params['contact_2_comprofiler_list'] : null);
                    if (isset($event_contact_parameters)) {
                        $this->_item->event_contacts_parameters[] = $event_contact_parameters;
                    }
                    $event_contact_parameters = AllEventsContactParametersFactory::getEventContactParametersInstance(3, $this->_item->contact_3_type,
                        $this->_item->contact_3_label, $this->_item->contact_3_access,
                        isset($this->_item->menu_params['contact_3_details_category']) ? $this->_item->menu_params['contact_3_details_category'] : null,
                        isset($this->_item->menu_params['contact_3_comprofiler_list']) ? $this->_item->menu_params['contact_3_comprofiler_list'] : null);
                    if (isset($event_contact_parameters)) {
                        $this->_item->event_contacts_parameters[] = $event_contact_parameters;
                    }

                    $this->_item->evt_creation_instructions = isset($this->_item->menu_params['evt_creation_instructions']) ? $this->_item->menu_params['evt_creation_instructions'] : null;
                    $this->_item->contact_libre_allowed = in_array($this->_item->contact_libre_access, $user_view_levels);
                }
            }
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
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
                }
            }
        }
        // on vient compléter les données avec les plugins AllEvents (Développements spécifiques)
        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('allevents');
        $dispatcher->trigger('onBeforeAlleventsEventForm', [&$this->_item]);

        return $this->_item;
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