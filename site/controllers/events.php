<?php

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_allevents/controller.php';
require_once JPATH_SITE . '/components/com_allevents/helpers/mails.php';
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

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
class AllEventsControllerEvents extends AllEventsController
{
    /**
     * AllEventsControllerEvents::close()
     *
     */
    public function close()
    {
        $this->setRedirect('index.php');
    }

    /**
     * AllEventsControllerEvents::edit()
     *
     * @throws Exception
     */
    public function edit()
    {
        // Flush the data from the session.
        $app = JFactory::getApplication();
        $params = AllEventsHelperParam::getGlobalParam();
        $Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);

        $app->setUserState('com_allevents.edit.event.data', null);
        $app->setUserState('com_allevents.edit.event.id', null);

        $url = 'index.php?option=com_allevents&view=eventform&Itemid=' . $Itemid . '&id=0';

        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::enrol_yes()
     *
     * @throws Exception
     */
    public function enrol_yes()
    {
        $app = JFactory::getApplication();
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);
        // Initialise variables.
        $dataform = $app->input->get('jform', [], 'array');
        $model = $this->getModel('Event', 'AllEventsModel');
        $data = (array )$model->getData($dataform['id']);
        $model = $this->getModel('Enrolment', 'AllEventsModel');
        $nb = (int)$model->getNbParticipant($data['id']) + 1;
        $data['enrolment_max_participant'] = (isset($data['enrolment_max_participant'])) ? $data['enrolment_max_participant'] : 0;

        $user = JFactory::getUser();
        $url = '';
        if (!$user->guest) {
            /**
             * open bar ou il reste des places ou overbooking possible
             */
            if ($data['price'] == 0) {
                $url = $dataform['url'];
                $data['id_user'] = (empty($dataform['id_user'])) ? 0 : $dataform['id_user'];

                if (($data['enrolment_max_participant'] == 0) || (($data['enrolment_max_participant'] != 0) && ($nb <= $data['enrolment_max_participant'])) || (($data['enrolment_max_participant'] != 0) && ($data['allow_overbooking'] == 1))) {
                    // évènement gratuit
                    if ($user->authorise('core.enrolhimself', 'com_allevents')) {
                        AllEventsHelperMails::SendMailEnrolmentCompleted($data);
                        $model->enrol_type($dataform['id'], $dataform['id_enrolment'], 0, $data['id_user']);
                    } elseif (($data['enrolment_max_participant'] <> 0) && ($nb >= $data['enrolment_max_participant']) && ($data['allow_overbooking'] == 1)) {
                        AllEventsHelperMails::SendMailEnrolmentWaiting($data);
                        $model->enrol_type($dataform['id'], $dataform['id_enrolment'], 0, $data['id_user']);
                    } else {
                        AllEventsHelperMails::SendMailEnrolmentPending($data, 3);
                        $model->enrol_type($dataform['id'], $dataform['id_enrolment'], 0, $data['id_user']);
                    }
                    $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));
                } else {
                    $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_ENROLMENT_IMPOSSIBLE'));
                }
            } else {
                // évènement payant
                $url = JRoute::_('index.php?option=com_allevents&view=payment&layout=default&id=' . $data['id'] . '&eid=' . $data['id_enrolment'], false);
            }
        } else {
            $app->enqueueMessage(JText::_('AE_LOGIN_BEFORE_ENROL'));
            $url = JRoute::_('index.php?option=com_users&view=login', false);
        }
        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::enrol_no()
     *
     * @throws Exception
     */
    public function enrol_no()
    {
        $app = JFactory::getApplication();
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $model = $this->getModel('Enrolment', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');
        $url = $data['url'];
        $data['id_user'] = (empty($data['id_user'])) ? 0 : $data['id_user'];
        // Attempt to save the data.
        try {
            $model->enrol_type($data['id'], $data['id_enrolment'], 1, $data['id_user']);

            $user = JFactory::getUser();
            if (!$user->guest) {
                // 1 : enrolment_no
                $model = $this->getModel('Event', 'AllEventsModel');
                $data = (array )$model->getData($data['id']);
                AllEventsHelperMails::SendMailEnrolment($data, 1, $user->get('id'));
                $lang = JFactory::getLanguage();
                $lang->load('com_allevents', JPATH_ADMINISTRATOR);
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));
            } else {
                $app->enqueueMessage(JText::_('AE_LOGIN_BEFORE_ENROL'));
                $url = JRoute::_('index.php?option=com_users&view=login', false);
            }
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }

        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::enrol_perhaps()
     *
     * @throws Exception
     */
    public function enrol_perhaps()
    {
        $app = JFactory::getApplication();
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $model = $this->getModel('Enrolment', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');
        $url = $data['url'];
        $data['id_user'] = (empty($data['id_user'])) ? 0 : $data['id_user'];
        // Attempt to save the data.
        try {
            $model->enrol_type($data['id'], $data['id_enrolment'], 2, $data['id_user']);
            $user = JFactory::getUser();
            if (!$user->guest) {
                // 4 : enrolment_perhaps
                $model = $this->getModel('Event', 'AllEventsModel');
                $data = (array )$model->getData($data['id']);
                AllEventsHelperMails::SendMailEnrolment($data, 4);
                $lang = JFactory::getLanguage();
                $lang->load('com_allevents', JPATH_ADMINISTRATOR);
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));
            } else {
                $app->enqueueMessage(JText::_('AE_LOGIN_BEFORE_ENROL'));
                $url = JRoute::_('index.php?option=com_users&view=login', false);
            }
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }

        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::enrol_companions()
     *
     * @throws Exception
     */
    public function enrol_companions()
    {
        $app = JFactory::getApplication();
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $params = AllEventsHelperParam::getGlobalParam();
        //$model = $this->getModel('Enrolment', 'AllEventsModel');
        $data = $app->input->get('jform', [], 'array');
        $url = $data['url'];
        $companions = $data['companions'];

        $model = $this->getModel('Event', 'AllEventsModel');
        $data = (array )$model->getData($data['id']);
        $model = $this->getModel('Enrolment', 'AllEventsModel');

        if ($params['gevent_companions']) {
            $nb = $model->getNbParticipant($data['id']) + (int)$companions;
        } else {
            $nb = $model->getNbParticipant($data['id']) + 1;
        }

        $user = JFactory::getUser();

        if (!isset($data['enrolment_max_participant'])) {
            $data['enrolment_max_participant'] = 0;
        }
        if ((!$user->guest)) {
            try {
                $model->enrol_companions($data['id'], $data['id_enrolment'], $companions);
            } catch (RuntimeException $e) {
                $app->enqueueMessage(JText::sprintf($e->getMessage()), 'warning');
            }
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));
        } else {
            $app->enqueueMessage(JText::sprintf('Save failed'), 'warning');
        }

        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::enrol_commentaire()
     *
     * @return void
     * @throws Exception
     */
    public function enrol_commentaire()
    {
        $app = JFactory::getApplication();
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $model = $this->getModel('Enrolment', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');
        $url = $data['url'];
        // Attempt to save the data.
        $user = JFactory::getUser();
        if ((!$user->guest)) {
            try {
                $model->enrol_commentaire($data['id'], $data['id_enrolment'], $data['commentaire']);
            } catch (RuntimeException $e) {
                $app->enqueueMessage(JText::sprintf($e->getMessage()), 'warning');
            }
        } else {
            $app->enqueueMessage(JText::sprintf('Save failed'), 'warning');
        }

        $this->setRedirect(JRoute::_($url, false));
    }
}
