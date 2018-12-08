<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * AllEventsControllerSection
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerSection extends AllEventsController
{
    /**
     * AllEventsControllerSection::edit()
     *
     * @throws Exception
     */
    public function edit()
    {
        $app = JFactory::getApplication();
        // Get the previous edit id (if any) and the current edit id.
        $previousId = (int)$app->getUserState('com_allevents.edit.section.id');
        $editId = $app->input->getInt('id', null);
        // Set the user id for the user to edit in the session.
        $app->setUserState('com_allevents.edit.section.id', $editId);
        // Get the model.
        $model = $this->getModel('Section', 'AllEventsModel');
        // Check out the item
        if ($editId) {
            $model->checkOut($editId);
        }
        // Check in the previous user.
        if ($previousId && $previousId !== $editId) {
            $model->checkIn($previousId);
        }
        // Redirect to the edit screen.
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=sectionform&layout=edit', false));
    }

    /**
     * AllEventsControllerSection::publish()
     *
     * @throws Exception
     */
    public function publish()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Section', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');
        // Attempt to save the data.
        try {
            $return = $model->publish($data['id'], $data['state']);
            $model->checkIn($return);
            // Clear the profile id from the session.
            $app->setUserState('com_entrusters.edit.bid.id', null);
            // Redirect to the list screen.
            $this->setMessage(JText::_('COM_ENTRUSTERS_ITEM_SAVED_SUCCESSFULLY'));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }
        // Clear the profile id from the session.
        $app->setUserState('com_allevents.edit.section.id', null);
        // Flush the data from the session.
        $app->setUserState('com_allevents.edit.section.data', null);
        // Redirect to the list screen.
        $this->setMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));
        $menu = $app->getMenu();
        $item = $menu->getActive();
        $this->setRedirect(JRoute::_($item->link, false));
    }

    /**
     * AllEventsControllerSection::remove()
     *
     * @throws Exception
     */
    public function remove()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('Section', 'AllEventsModel');
        // Get the user data.
        $data = $app->input->get('jform', [], 'array');
        // Attempt to save the data.
        try {
            $return = $model->delete($data['id']);
            $model->checkIn($return);
            // Clear the profile id from the session.
            $app->setUserState('com_allevents.edit.section.id', null);
            // Flush the data from the session.
            $app->setUserState('com_allevents.edit.section.data', null);
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
