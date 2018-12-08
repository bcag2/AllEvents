<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/helpers/mails.php';
jimport('joomla.application.component.controlleradmin');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerEnrolments
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerEnrolments extends JControllerAdmin
{
    /**
     * AllEventsController::__construct()
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerTask('disable_enrolment', 'enable_enrolment');
    }

    /**
     * AllEventsControllerEnrolments::saveOrderAjax()
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
            echo "1";
        }
        // Close the application
        JFactory::getApplication()->close();
    }

    /**
     * AllEventsControllerEnrolments::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'enrolment', $prefix = 'AllEventsModel', $config = [])
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }

    /**
     * AllEventsController::enable_enrolment()
     *
     * @throws Exception
     */
    public function enable_enrolment()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');
        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            $values = ['enable_enrolment' => 1, 'disable_enrolment' => 0];
            $value = ArrayHelper::getValue($values, $this->getTask(), 0, 'int');
            $params = AllEventsHelperParam::getGlobalParam();
            $str = "";

            // Make sure the item ids are integers
            ArrayHelper::toInteger($ids);

            $mod_event = $this->getModel('event');
            $mod_inscriptions = $this->getModel('enrolment');
            if ($value == $values['enable_enrolment']) {
                $mod_inscriptions = $this->getModel('enrolment');
                if (!$mod_inscriptions->enable($ids, $value)) {
                    JFactory::getApplication()->enqueueMessage($mod_inscriptions->getError(), 'warning');
                }
            } else {
                $enrolment_id = $ids[0];
                $dataenrol = $mod_inscriptions->getItem($enrolment_id);
                $data = (array )$mod_event->getData($dataenrol->event_id);
                if ($params['gmail_on'])
                    AllEventsHelperMails::SendMailEnrolment($data, 1, $dataenrol->user_id, 'admin');

                if (!$mod_inscriptions->enable($ids, $value)) {
                    JFactory::getApplication()->enqueueMessage($mod_inscriptions->getError(), 'warning');
                }
            }
            $str = JText::_('COM_ALLEVENTS_ENROLMENTUPDATED');
        }
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=enrolments', false), $str);
    }

    /**
     * AllEventsController::enrol_approved()
     *
     * @throws Exception
     */
    public function enrol_approved()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');
        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            $mod_event = $this->getModel('event');
            $mod_inscriptions = $this->getModel('enrolment');
            $str = '';

            // Make sure the item ids are integers
            ArrayHelper::toInteger($ids);

            $enrolment_id = $ids[0];
            $dataenrol = $mod_inscriptions->getItem($enrolment_id);
            $data = (array )$mod_event->getData($dataenrol->event_id);
            AllEventsHelperMails::SendMailEnrolment($data, 2, $dataenrol->user_id, 'admin');

            $mod_inscriptions = $this->getModel('enrolment');
            if (!$mod_inscriptions->approved($ids)) {
                JFactory::getApplication()->enqueueMessage($mod_inscriptions->getError(), 'warning');
            }
        }
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=enrolments', false), $str);
    }

    /**
     * AllEventsController::enrol_unapproved()
     *
     * @throws Exception
     */
    public function enrol_unapproved()
    {
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            $mod_event = $this->getModel('event');
            $mod_inscriptions = $this->getModel('enrolment');
            $str = '';

            // Make sure the item ids are integers
            ArrayHelper::toInteger($ids);

            $enrolment_id = $ids[0];
            $dataenrol = $mod_inscriptions->getItem($enrolment_id);
            $data = (array )$mod_event->getData($dataenrol->event_id);
            AllEventsHelperMails::SendMailEnrolment($data, 1, $dataenrol->user_id, 'admin');

            $mod_inscriptions = $this->getModel('enrolment');
            if (!$mod_inscriptions->unapproved($ids)) {
                JFactory::getApplication()->enqueueMessage($mod_inscriptions->getError(), 'warning');
            }
        }
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=enrolments', false), $str);
    }

    /**
     * AllEventsController::export()
     *
     * @throws Exception
     */
    public function export()
    {
        $model = $this->getModel('enrolments');
        $model->getState();
        $model->setState('list.limit', 0);

        $registrations = $model->getItems();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . 'participants-' . date('Y-m-d') . '.csv');
        $fp = fopen('php://output', 'w');

        fputcsv($fp, [
            'event_titre',
            'event_date',
            'event_enddate',
            // 'commentaire',
            'user_name',
            'user_email'
        ]);

        foreach ($registrations as $registration) {
            fputcsv($fp, [
                $registration->event_titre,
                $registration->event_date,
                $registration->event_enddate,
                // $registration->commentaire,
                $registration->user_name,
                $registration->user_email
            ]);
        }

        fclose($fp);

        jexit();
    }
}
