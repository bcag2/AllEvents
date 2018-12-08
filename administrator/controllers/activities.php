<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerActivities
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerActivities extends JControllerAdmin
{
    /**
     * AllEventsControllerActivities::saveOrderAjax()
     *
     * @throws Exception
     */
    public function saveOrderAjax()
    {
        // Get the input
        $app = JFactory::getApplication();
        $input = $app->input;
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
        $app->close();
    }

    /**
     * AllEventsControllerActivities::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'activity', $prefix = 'AllEventsModel', $config = [])
    {
        return parent::getModel($name, $prefix, ['ignore_request' => true]);
    }

    /**
     * AllEventsControllerActivities::duplicate()
     *
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
            $model = $this->getModel('Activities');
            $model->duplicate($pks);
            $this->setMessage(JText::plural('COM_ALLEVENTS_N_ITEMS_DUPLICATED', count($pks)));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }

        $this->setRedirect('index.php?option=com_allevents&view=activities');
    }

    /**
     * AllEventsControllerActivities::GetActivitiesFromAgenda()
     *
     * @return bool
     * @throws Exception
     */
    public function GetActivitiesFromAgenda()
    {
        $app = JFactory::getApplication();

        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);
        if ((int)$app->input->get('ajax', 0) != 0) {
            $model = $this->getModel('Activities');
            $table = $model->GetActivitiesFromAgenda($app->input->getInt('agenda_id'));
            $app->enqueueMessage($this->message);
            echo new JResponseJson($table);
            $app->close();
        }

        return true;
    }
}
