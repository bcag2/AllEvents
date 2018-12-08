<?php

defined('_JEXEC') or die;
jimport('joomla.application.component.controllerform');

require_once JPATH_SITE . '/components/com_allevents/controller.php';
require_once JPATH_SITE . '/components/com_allevents/helpers/mails.php';
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsControllerEventForm
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerEventForm extends AlleventsController
{
    /**
     * AllEventsControllerEventForm::save()
     *
     * @return bool
     * @throws Exception
     */
    public function save()
    {
        // Check for request forgeries.
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app = JFactory::getApplication();
        $model = $this->getModel('EventForm', 'AlleventsModel');

        // Get the user data.
        $data = $app->input->get('jform', [], 'array');

        try {
            $return = $model->save($data);
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
            $app->setUserState('com_allevents.edit.event.data', $data);
            // Redirect back to the edit screen.
            $id = (int)$app->getUserState('com_allevents.edit.event.id');
            $this->setMessage(JText::sprintf('Save failed', $e->getMessage()), 'warning');
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=eventform&layout=edit&id=' . $id, false));

            return false;
        }

        // Check in the profile.
        if ($return) {
            $model->checkin($return);
        }

        $params = AllEventsHelperParam::getGlobalParam();
        if ($params['gmail_on']) {
            // TODO: distinguer la modification de la cr�ation #45
            $model = $this->getModel('Event', 'AllEventsModel');
            $data = (array )$model->getData($return);
            AllEventsHelperMails::SendMailProposition($data);
        }

        // Clear the profile id from the session.
        $app->setUserState('com_allevents.edit.event.id', null);

        // Redirect to the list screen.
        $this->setMessage(JText::_('COM_ALLEVENTS_ITEM_SAVED_SUCCESSFULLY'));
        $id = (int)$app->getUserState('com_allevents.edit.event.id');
        $Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);

        if ($id == 0) {
            if ($Itemid == 0) {
                $url = 'index.php?Itemid=' . $params['gmenuitem'];
                $this->setRedirect(JRoute::_($url, false));
            } else {
                $url = 'index.php?Itemid=' . $Itemid;
                $this->setRedirect(JRoute::_($url, false));
            }
        } else {
            if ($Itemid == 0) {
                $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=eventform&layout=edit&id=' . $id, false));
            } else {
                $url = 'index.php?Itemid=' . $Itemid;
                $this->setRedirect(JRoute::_($url, false));
            }
        }

        // Flush the data from the session.
        $app->setUserState('com_allevents.edit.event.data', null);

        return true;
    }

    /**
     * AllEventsControllerEventForm::cancel()
     *
     * @param null $key
     *
     * @throws Exception
     */
    public function cancel($key = null)
    {
        $app = JFactory::getApplication();
        $id = (int)$app->getUserState('com_allevents.edit.event.id');
        $Itemid = (int)$app->input->getInt('Itemid', null);
        $Itemid = ($params['gforcenomenuitem']) ? '' : $Itemid;

        if ($id == 0) {
            if ($Itemid == 0) {
                $url = 'index.php?Itemid=' . $params['gmenuitem'];
                $this->setRedirect(JRoute::_($url, false));
            } else {
                $url = 'index.php?Itemid=' . $Itemid;
                $this->setRedirect(JRoute::_($url, false));
            }
        } else {
            if ($Itemid == 0) {
                $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=event&id=' . $id, false));
            } else {
                $url = 'index.php?Itemid=' . $Itemid;
                $this->setRedirect(JRoute::_($url, false));
            }
        }
    }
}
