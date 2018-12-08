<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');
require_once JPATH_SITE . '/components/com_allevents/helpers/mails.php';

use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerEvents extends JControllerAdmin
{
    /**
     * AllEventsControllerEvents::__construct()
     */
    function __construct()
    {
        parent::__construct();
        $this->registerTask('unhot', 'hot');
        $this->registerTask('unfeatured', 'hot');
        $this->registerTask('featured', 'hot');
        $this->registerTask('unenrolment', 'enrolment');
        $this->registerTask('disable_event', 'enable_event');
        $this->registerTask('unpublish', 'publish');
        $this->registerTask('trash', 'publish');
        $this->registerTask('archive', 'publish');
    }

    /**
     * AllEventsControllerEvents::duplicate()
     */
    public function duplicate()
    {
        // Check for request forgeries
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $pks = $this->input->post->get('cid', [], 'array');
        ArrayHelper::toInteger($pks);

        try {
            if (empty($pks)) {
                throw new Exception(JText::_('COM_ALLEVENTS_ERROR_NO_ITEMS_SELECTED'));
            }
            $model = $this->getModel();
            $model->duplicate($pks);
            $this->setMessage(JText::plural('COM_ALLEVENTS_N_ITEMS_DUPLICATED', count($pks)));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }

        $this->setRedirect('index.php?option=com_allevents&view=events');
    }

    /**
     * AllEventsControllerEvents::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'event', $prefix = 'AllEventsModel', $config = [])
    {
        return parent::getModel($name, $prefix, ['ignore_request' => true]);
    }

    /**
     * AllEventsControllerEvents::saveOrderAjax()
     *
     * @throws Exception
     */
    public function saveOrderAjax()
    {
        // Get the input
        $input = JFactory::getApplication()->input;
        $pks = $input->post->get('cid', [], 'array');
        $order = $input->post->get('order', [], 'array');
        // Sanitize the input
        ArrayHelper::toInteger($pks);
        ArrayHelper::toInteger($order);
        // Get the model
        $model = $this->getModel();
        // Save the ordering
        $return = $model->saveorder($pks, $order);

        if ($return) {
            echo '1';
        }
        // Close the application
        JFactory::getApplication()->close();
    }

    /**
     * AllEventsControllerEvents::samples()
     */
    public function samples()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $model = $this->getModel();
        $model->samples();
        $this->setMessage(JText::_('COM_ALLEVENTS_IMPORT_SAMPLES_OK'));

        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeCSS.php');

        $g_se_CSS = new AllEventsClassCSS();
        $g_se_CSS::MakeCSSEntity('activity', 'activities');
        $g_se_CSS::MakeCSSEntity('agenda', 'agenda');
        $g_se_CSS::MakeCSSEntity('category', 'categories');
        $g_se_CSS::MakeCSSEntity('place', 'places');
        $g_se_CSS::MakeCSSEntity('public', 'public');
        $g_se_CSS::MakeCSSEntity('ressource', 'ressources');
        $g_se_CSS::MakeCSSEntity('section', 'sections');
        $this->setMessage(JText::_('COM_ALLEVENTS_MAKECSS'));

        // Preset the redirect
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false));
    }

    /**
     * AllEventsControllerEvent::emailing()
     *
     * @return
     * @internal param mixed $model
     */
    public function emailing()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $model = $this->getModel('event');

        $data = $this->input->post->get('batch', [], 'array');
        $cid = $this->input->post->get('cid', [], 'array');
        $jform = $this->input->post->get('jform', [], 'array');
        $id = array_key_exists('id', $jform) ? (int)$jform['id'] : $cid[0];

        $return = $model->emailing($data, $id);
        $this->setRedirect('index.php?option=com_allevents&view=events');

        return $return;
    }

    /**
     * AllEventsController::hot()
     *
     * @throws Exception
     */
    public function hot()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');
        $values = [
            'hot' => 1,
            'unhot' => 0,
            'featured' => 1,
            'unfeatured' => 0];
        $value = ArrayHelper::getValue($values, $this->getTask(), 0, 'int');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false));
        } else {
            // Make sure the item ids are integers
            ArrayHelper::toInteger($ids);

            // Get the model.
            $model = $this->getModel('event');
            // update the items.
            if (!$model->hot($ids, $value)) {
                JFactory::getApplication()->enqueueMessage($model->getError(), 'warning');
            }
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false), JText::_('COM_ALLEVENTS_EVENTUPDATED'));
        }
    }

    /**
     * AllEventsController::approved()
     *
     * @throws Exception
     */
    public function approved()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');
        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            // Get the model.
            $model = $this->getModel('event');
            // update the items.
            if (!$model->approve($ids)) {
                JFactory::getApplication()->enqueueMessage($model->getError(), 'warning');
            }

            foreach ($ids as $id) {
                $data = (array )$model->getData($id);
                $params = AllEventsHelperParam::getGlobalParam();
                if ($params['gmail_on']) {
                    AllEventsHelperMails::SendMailProposition_hasbeenapproved($data, 'admin');
                }
            }
        }
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false));
    }

    /**
     * AllEventsController::enrolment()
     *
     * @throws Exception
     */
    public function enrolment()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');
        $values = ['enrolment' => 1, 'unenrolment' => 0];
        $value = ArrayHelper::getValue($values, $this->getTask(), 0, 'int');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false));
        } else {
            $model = $this->getModel('event');
            if (!$model->enrolment($ids, $value)) {
                JFactory::getApplication()->enqueueMessage($model->getError(), 'warning');
            }
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false), JText::_('COM_ALLEVENTS_EVENTUPDATED'));
        }
    }

    /**
     * AllEventsController::enable_event()
     *
     * @throws Exception
     */
    public function enable_event()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');
        $values = ['enable_event' => 1, 'disable_event' => 0];
        $value = ArrayHelper::getValue($values, $this->getTask(), 0, 'int');
        $params = AllEventsHelperParam::getGlobalParam();
        $str = "";
        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            if ($value == $values['enable_event']) {
                // on active un evenement : aucun controle
                $mod_event = $this->getModel('event');
                if (!$mod_event->enable($ids, $value)) {
                    JFactory::getApplication()->enqueueMessage($mod_event->getError(), 'warning');
                }
                $str = JText::_('COM_ALLEVENTS_EVENTUPDATED');
                $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false), $str);
            } else {
                // on desactive un evenement : on va controler les inscriptions de l'évènement?
                if ($params['gcontrol_eventwithenrolments'] == 1) {
                    // contrôle souhaité : il ne doit plus y avoir d'inscrits
                    $mod_inscriptions = $this->getModel('enrolment');
                    $event_id = $ids[0];
                    if ($mod_inscriptions->getNbParticipant($event_id) == 0) {
                        $mod_event = $this->getModel('event');
                        if (!$mod_event->enable($ids, $value)) {
                            JFactory::getApplication()->enqueueMessage($mod_event->getError(), 'warning');
                        }

                        $str = JText::_('COM_ALLEVENTS_EVENTUPDATED');
                        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false), $str);
                    } else {
                        // controle KO...
                        $str = JText::_('COM_ALLEVENTS_EVENT_WITH_ENROLMENTS');
                        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false), $str, 'warning');
                    }
                } else {
                    // pas de contrôle souhaité
                    // on desinscrit en automatique
                    $mod_event = $this->getModel('event');
                    $mod_inscriptions = $this->getModel('enrolment');
                    $event_id = $ids[0];
                    // phase obligatoirement avant... car ensuite les inscriptiosn seront détopés
                    $contacts = $mod_inscriptions->getEnrolmentsContacts($event_id);

                    if (!empty($contacts)) {
                        foreach ($contacts as $contact) {
                            $data = (array )$mod_event->getData($contact->event_id);
                            $contact_id = empty($contact->contact_id) ? $contact->user_id : $contact->contact_id;
                            if ($params['gmail_on'])
                                AllEventsHelperMails::SendMailEnrolment($data, 1, $contact_id, 'admin');
                        }
                    }

                    if (!$mod_inscriptions->enable($ids, $value)) {
                        JFactory::getApplication()->enqueueMessage($mod_inscriptions->getError(), 'warning');
                    }

                    if (!$mod_event->enable($ids, $value)) {
                        JFactory::getApplication()->enqueueMessage($mod_event->getError(), 'warning');
                    }

                    $str = JText::_('COM_ALLEVENTS_EVENTUPDATED');
                    $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false), $str);
                }
            }
        }

        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false), $str);
    }

    /**
     * AllEventsController::approve()
     *
     * @throws Exception
     */
    public function approve()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');
        // $value = ArrayHelper::getValue($values, $this->getTask(), 0, 'int');
        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            // Get the model.
            $model = $this->getModel('event');
            // update the items.
            if (!$model->approve($ids)) {
                JFactory::getApplication()->enqueueMessage($model->getError(), 'warning');
            }

            $params = AllEventsHelperParam::getGlobalParam();
            foreach ($ids as $id) {
                $data = (array )$model->getData($id);
                if ($params['gmail_on']) {
                    AllEventsHelperMails::SendMailProposition_hasbeenapproved($data, 'admin');
                }
            }
        }

        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=eventstoapprove', false));
    }

    /**
     * AllEventsController::publish()
     *
     * @throws Exception
     */
    public function publish()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');
        $values = [
            'archive' => 2,
            'publish' => 1,
            'unpublish' => 0,
            'trash' => -2];
        $value = ArrayHelper::getValue($values, $this->getTask(), 0, 'int');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false));
        } else {
            // Get the model.
            $model = $this->getModel('event');
            // Publish the items.
            if (!$model->publish($ids, $value)) {
                JFactory::getApplication()->enqueueMessage($model->getError(), 'warning');
            }
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events', false), JText::_('COM_ALLEVENTS_EVENTUPDATED'));
        }
    }

    /**
     * AllEventsController::export()
     *
     * @throws Exception
     */
    public function export()
    {
        $model = $this->getModel('events');
        $model->getState();
        $model->setState('list.limit', 0);
        $app = JFactory::getApplication('administrator');
        // Omit double (white-)spaces and set state
        $model->setState('filter.search', preg_replace('/\s+/', ' ', $app->getUserStateFromRequest('events' . '.filter.search', 'filter_search')));
        // Filter (dropdown) state
        $model->setState('filter.state', $app->getUserStateFromRequest('events' . '.filter.state', 'filter_state', '', 'string'));
        $model->setState('filter.activity', $app->getUserStateFromRequest('events' . '.filter.activity', 'filter_activity', '', 'string'));
        $model->setState('filter.agenda', $app->getUserStateFromRequest('events' . '.filter.agenda', 'filter_agenda', '', 'string'));
        $model->setState('filter.category', $app->getUserStateFromRequest('events' . '.filter.category', 'filter_category', '', 'string'));
        $model->setState('filter.place', $app->getUserStateFromRequest('events' . '.filter.place', 'filter_place', '', 'string'));
        $model->setState('filter.public', $app->getUserStateFromRequest('events' . '.filter.public', 'filter_public', '', 'string'));
        $model->setState('filter.ressource', $app->getUserStateFromRequest('events' . '.filter.ressource', 'filter_ressource', '', 'string'));
        $model->setState('filter.section', $app->getUserStateFromRequest('events' . '.filter.section', 'filter_section', '', 'string'));
        $model->setState('filter.period', $app->getUserStateFromRequest('events' . '.filter.period', 'filter_period', '', 'string'));
        $model->setState('filter.proposed_by', $app->getUserStateFromRequest('events' . '.filter.proposed_by', 'filter_proposed_by', '', 'string'));
        $model->setState('filter.hot', $app->getUserStateFromRequest('events' . '.filter.hot', 'filter_hot', '', 'string'));
        if (JLanguageMultilang::isEnabled()) {
            $model->setState('filter.language', $app->getUserStateFromRequest('events' . '.filter.language', 'filter_language', ''));
        }

        $events = $model->getItems();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . 'events-' . date('Y-m-d') . '.csv');
        $fp = fopen('php://output', 'w');

        fputcsv($fp, [
            'Title',
            'Organizer',
            'Location',
            'Starts at',
            'Ends at',
            'TimeZone',
            'State',
        ]);

        foreach ($events as $event) {
            fputcsv($fp, [
                $event->titre,
                $event->proposed_by_name,
                $event->places_titre_1119865,
                $event->date,
                $event->enddate,
                'UTC',
                $event->published,
            ]);
        }

        fclose($fp);

        jexit();
    }
}