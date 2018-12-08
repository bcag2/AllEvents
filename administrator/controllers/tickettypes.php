<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/helpers/mails.php';
jimport('joomla.application.component.controlleradmin');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerTickettypes
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerTickettypes extends JControllerAdmin
{
    /**
     * AllEventsController::__construct()
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->registerTask('disable_tickettype', 'enable_tickettype');
    }

    /**
     * AllEventsControllerTickettypes::saveOrderAjax()
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
     * AllEventsControllerTickettypes::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'tickettype', $prefix = 'AllEventsModel', $config = [])
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }
}
