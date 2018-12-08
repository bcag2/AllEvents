<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';
require_once JPATH_SITE . '/components/com_allevents/helpers/mails.php';
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

/**
 * AllEventsControllerEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerEvent extends AllEventsController
{
    /**
     * AllEventsControllerEvent::edit()
     *
     * @throws Exception
     */
    public function edit()
    {
        $app = JFactory::getApplication();
        // Get the previous edit id (if any) and the current edit id.
        $params = AllEventsHelperParam::getGlobalParam();
        $previousId = (int)$app->getUserState('com_allevents.edit.event.id');
        $editId = (int)$app->input->getInt('id', null);
        // Set the user id for the user to edit in the session.
        $app->setUserState('com_allevents.edit.event.id', $editId);
        // Get the model.
        $model = $this->getModel('Event', 'AllEventsModel');
        // Check out the item
        if ($editId) {
            $model->checkOut($editId);
        }
        // Check in the previous user.
        if ($previousId && $previousId !== $editId) {
            $model->checkIn($previousId);
        }
        // Redirect to the edit screen.
        if ($params['gforcenomenuitem']) {
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=eventform&id=' . $editId, false));
        } else {
            $Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=eventform&id=' . $editId . '&Itemid=' . $Itemid, false));
        }
    }

    /**
     * AllEventsControllerEvent::recurrent()
     *
     * @throws Exception
     */
    public function recurrent()
    {
        $app = JFactory::getApplication();
        // Get the previous edit id (if any) and the current edit id.
        $params = AllEventsHelperParam::getGlobalParam();
        $previousId = (int)$app->getUserState('com_allevents.edit.event.id');
        $editId = (int)$app->input->getInt('id', null);

        // Set the user id for the user to edit in the session.
        $app->setUserState('com_allevents.edit.event.id', $editId);
        // Get the model.
        $model = $this->getModel('Event', 'AllEventsModel');
        // Check out the item
        if ($editId) {
            $model->checkOut($editId);
        }
        // Check in the previous user.
        if ($previousId && $previousId !== $editId) {
            $model->checkIn($previousId);
        }

        if ($params['gforcenomenuitem']) {
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=eventform&layout=recurrent', false));
        } else {
            $Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=eventform&layout=recurrent&Itemid=' . $Itemid, false));
        }
    }

    /**
     * AllEventsControllerEvent::publish()
     *
     * @throws Exception
     */
    public function publish()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $params = AllEventsHelperParam::getGlobalParam();
        $app = JFactory::getApplication();
        $model = $this->getModel('Event', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');

        try {
            // Attempt to save the data.
            $return = $model->publish($data['id'], $data['state']);
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
            $return = false;
        }

        // Check in the profile.
        if ($return) {
            $model->checkIn($return);
        }
        // Clear the profile id from the session.
        $app->setUserState('com_allevents.edit.bid.id', null);
        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);
        $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));

        // Clear the profile id from the session.
        $app->setUserState('com_allevents.edit.event.id', null);
        // Flush the data from the session.
        $app->setUserState('com_allevents.edit.event.data', null);
        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);
        // Redirect to the list screen.
        $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));
        $menu = $app->getMenu();
        $item = $menu->getActive();

        $url = isset($item->link) ? $item->link : 'index.php?Itemid=' . $params['gmenuitem'];

        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::remove()
     *
     * @throws Exception
     */
    public function remove()
    {
        $params = AllEventsHelperParam::getGlobalParam();
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Event', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');
        try {
            $return = $model->delete($data['id']);
            $model->checkIn($return);
            // Clear the profile id from the session.
            $app->setUserState('com_allevents.edit.event.id', null);
            // Flush the data from the session.
            $app->setUserState('com_allevents.edit.event.data', null);
            $lang = JFactory::getLanguage();
            $lang->load('com_allevents', JPATH_ADMINISTRATOR);
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_DELETED_SUCCESSFULLY'));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }
        $menu = $app->getMenu();
        $item = $menu->getActive();
        $url = isset($item->link) ? $item->link : 'index.php?Itemid=' . $params['gmenuitem'];

        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::approve()
     *
     * @throws Exception
     */
    public function approve()
    {
        $params = AllEventsHelperParam::getGlobalParam();
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Event', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');
        try {
            $return = $model->approve($data['id']);
            $model = $this->getModel('Event', 'AllEventsModel');
            $data = (array )$model->getData($data['id']);
            $params = AllEventsHelperParam::getGlobalParam();
            if ($params['gmail_on']) {
                AllEventsHelperMails::SendMailProposition_hasbeenapproved($data);
            }
            $model->checkIn($return);
            // Clear the profile id from the session.
            $app->setUserState('com_allevents.edit.event.id', null);
            // Flush the data from the session.
            $app->setUserState('com_allevents.edit.event.data', null);
            $lang = JFactory::getLanguage();
            $lang->load('com_allevents', JPATH_ADMINISTRATOR);
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_ITEM_APPROVED_SUCCESSFULLY'));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }
        $menu = $app->getMenu();
        $item = $menu->getActive();
        $url = isset($item->link) ? $item->link : 'index.php?Itemid=' . $params['gmenuitem'];
        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::cancel()
     *
     * @throws Exception
     */
    public function cancel()
    {
        $params = AllEventsHelperParam::getGlobalParam();
        $app = JFactory::getApplication();
        $menu = $app->getMenu();
        $item = $menu->getActive();
        $url = isset($item->link) ? $item->link : 'index.php?Itemid=' . $params['gmenuitem'];
        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::exportgc()
     *
     * @throws Exception
     */
    public function exportgc()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $data = JFactory::getApplication()->input->get('jform', [], 'array');
        $url = AllEventsHelperRoute::getEventRoute($data['id'], $data['alias']);
        $this->setRedirect(JRoute::_($url, false));
    }

    /**
     * AllEventsControllerEvent::exportical()
     *
     * @throws Exception
     */
    public function exportical()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $data = JFactory::getApplication()->input->get('jform', [], 'array');
        $url = AllEventsHelperRoute::getEventRoute($data['id'], $data['alias']);
        $this->setRedirect(JRoute::_($url, false));
    }
}
