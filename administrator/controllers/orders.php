<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerOrders
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerOrders extends JControllerAdmin
{
    /**
     * AllEventsControllerOrders::saveOrderAjax()
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
     * AllEventsControllerOrders::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'order', $prefix = 'AllEventsModel', $config = [])
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }

    /**
     * AllEventsControllerOrders::remove()
     *
     * Changes order status for example pending to completed
     *
     * @throws Exception
     */
    public function remove()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            $model = $this->getModel();
            // Make sure the item ids are integers
            ArrayHelper::toInteger($ids);
            if ($model->delete_order($ids)) {
                $this->setMessage(JText::plural('COM_ALLEVENTS_N_ITEMS_DELETED', count($ids)));
            } else {
                JFactory::getApplication()->enqueueMessage($model->_db->getErrorMsg(), 'error');
            }
        }
        $this->setRedirect(JUri::base() . "index.php?option=com_allevents&view=orders");
    }

    /**
     * AllEventsControllerOrders::save()
     *
     * Changes order status for example pending to completed
     *
     * @return void
     * @throws Exception
     */
    public function save()
    {
        $order_id = JFactory::getApplication()->input->get('order_id');
        $payment_status = JFactory::getApplication()->input->get('payment_status');

        $model = $this->getModel();
        if ($model->update_order_status($order_id, $payment_status)) {
            $this->setMessage(JText::plural('COM_ALLEVENTS_N_ITEMS_UPDATED_1', 1));
        } else {
            JFactory::getApplication()->enqueueMessage($model->_db->getErrorMsg(), 'error');
        }

        $this->setRedirect(JUri::base() . "index.php?option=com_allevents&view=orders");
    }
}
