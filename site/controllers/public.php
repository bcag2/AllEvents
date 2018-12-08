<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * AllEventsControllerPublic
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerPublic extends AllEventsController
{
    /**
     * AllEventsControllerPublic::edit()
     *
     * @throws Exception
     */
    public function edit()
    {
        $app = JFactory::getApplication();
        // Get the previous edit id (if any) and the current edit id.
        $previousId = (int)$app->getUserState('com_allevents.edit.public.id');
        $editId = $app->input->getInt('id', null);
        // Set the user id for the user to edit in the session.
        $app->setUserState('com_allevents.edit.public.id', $editId);
        // Get the model.
        $model = $this->getModel('Public', 'AllEventsModel');
        // Check out the item
        if ($editId) {
            $model->checkOut($editId);
        }
        // Check in the previous user.
        if ($previousId && $previousId !== $editId) {
            $model->checkIn($previousId);
        }
        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=publicform&layout=edit', false));
    }

    /**
     * AllEventsControllerPublic::publish()
     *
     * @throws Exception
     */
    public function publish()
    {
        try {
            // Check for request forgeries.
            JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
            // Initialise variables.
            $app = JFactory::getApplication();
            $model = $this->getModel('Public', 'AllEventsModel');
            // Get the user data.
            $data = $app->input->get('jform', [], 'array');
            // Attempt to save the data.
            $return = $model->publish($data['id'], $data['state']);
            // Check for errors.
            // Check in the profile.
            if ($return) {
                $model->checkIn($return);
            }
            // Clear the profile id from the session.
            $app->setUserState('com_entrusters.edit.bid.id', null);
            // Redirect to the list screen.
            $this->setMessage(JText::_('COM_ENTRUSTERS_ITEM_SAVED_SUCCESSFULLY'));

            // Clear the profile id from the session.
            $app->setUserState('com_allevents.edit.public.id', null);
            // Flush the data from the session.
            $app->setUserState('com_allevents.edit.public.data', null);
            // Redirect to the list screen.
            $this->setMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));
            $menu = $app->getMenu();
            $item = $menu->getActive();
            $this->setRedirect(JRoute::_($item->link, false));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }
    }

    /**
     * AllEventsControllerPublic::remove()
     *
     * @throws Exception
     */
    public function remove()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Public', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');
        // Attempt to save the data.
        try {
            $return = $model->delete($data['id']);
            $model->checkIn($return);
            // Clear the profile id from the session.
            $app->setUserState('com_allevents.edit.public.id', null);
            // Flush the data from the session.
            $app->setUserState('com_allevents.edit.public.data', null);
            $this->setMessage(JText::_('COM_ALLEVENTS_ITEM_DELETED_SUCCESSFULLY'));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }
        // Redirect to the list screen.
        $menu = $app->getMenu();
        $item = $menu->getActive();
        $this->setRedirect(JRoute::_($item->link, false));
    }
}
