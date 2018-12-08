<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerMain
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerMain extends JControllerAdmin
{
    /**
     * AllEventsControllerMain::saveOrderAjax()
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
     * AllEventsControllerMain::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'main', $prefix = 'AllEventsModel', $config = [])
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }

    /**
     * AllEventsControllerMain::agendadelete()
     *
     * @return void
     * @throws Exception
     */
    public function agendadelete()
    {
        $id = JFactory::getApplication()->input->getInt('id');
        $ids[] = $id;
        $model = $this->getModel('agenda');
        if (!$model->delete($ids)) {
            JFactory::getApplication()->enqueueMessage($model->getError(), 'warning');
        }

        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=main&manage=1', false));
    }

    /**
     * AllEventsControllerMain::agendaexport()
     *
     * @return void
     * @throws Exception
     */
    public function agendaexport()
    {
        $id = JFactory::getApplication()->input->getInt('id');
        $model = $this->getModel('agenda');
        if (!$model->export($id)) {
            JFactory::getApplication()->enqueueMessage($model->getError(), 'warning');
        }

        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=main&manage=1', false));
    }

    /**
     * AllEventsControllerMain::reset()
     *
     * @return void
     */
    public function reset()
    {
        $this->input->cookie->set('dashboard', '', time() - 24 * 60 * 60, '/');
        $this->setRedirect('index.php?option=com_allevents&view=main');
    }
}
