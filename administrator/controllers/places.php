<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerPlaces
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerPlaces extends JControllerAdmin
{
    /**
     * AllEventsControllerPlaces::saveOrderAjax()
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
     * AllEventsControllerPlaces::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'place', $prefix = 'AllEventsModel', $config = [])
    {
        return parent::getModel($name, $prefix, ['ignore_request' => true]);
    }

    /**
     * AllEventsControllerPlaces::duplicate()
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
            $model = $this->getModel();
            $model->duplicate($pks);
            $this->setMessage(JText::plural('COM_ALLEVENTS_N_ITEMS_DUPLICATED', count($pks)));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }

        $this->setRedirect('index.php?option=com_allevents&view=places');
    }

    /**
     * AllEventsControllerPlaces::GetPlacesFromAgenda()
     *
     * @return bool
     * @throws Exception
     */
    public function GetPlacesFromAgenda()
    {
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);
        if (JFactory::getApplication()->input->get('ajax', 0) !== 0) {
            $model = $this->getModel('Places');
            $table = $model->GetPlacesFromAgenda(JFactory::getApplication()->input->getInt('agenda_id'));
            JFactory::getApplication()->enqueueMessage($this->message);
            echo new JResponseJson($table);
            JFactory::getApplication()->close();
        }

        return true;
    }
}
