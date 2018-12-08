<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
jimport('joomla.filesystem.file');

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsViewPayment
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */
class AllEventsViewPayment extends JViewLegacy
{
    protected $params;
    protected $item;
    protected $gateways;
    protected $processor;
    protected $payhtml;

    /**
     * AllEventsViewPayment::display()
     *
     * @param mixed $tpl
     *
     * @return boolean
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $app = JFactory::getApplication();
        $jinput = $app->input;
        $layout = $jinput->get("layout", 'default');
        $id = $jinput->get("id");
        $this->params = AllEventsHelperParam::getGlobalParam();
        $model = JModelList::getInstance('Event', 'AllEventsModel');
        $this->item = $model->getData($id);

        if ($layout == "default") {
            if (empty($this->item->titre)) {
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_ERROR_EVENT_NOT_FOUND'), 'error');

                return false;
            }
            //START :: getting payment gateway data
            $dispatcher = JEventDispatcher::getInstance();
            JPluginHelper::importPlugin('payment');
            if (!is_array($this->params->get('gateways'))) {
                $gateway_param[] = $this->params->get('gateways');
            } else {
                $gateway_param = $this->params->get('gateways');
            }
            $gateways = "";

            if (!empty($gateway_param)) {
                $gateways = $dispatcher->trigger('onTP_GetInfo', [$gateway_param]);
            }
            $this->gateways = $gateways;
            //START :: getting payment gateway data
        } else {
            // getting order id
            $order_id = $jinput->get("order_id", '');
            if (!empty($order_id)) {
                $model = $this->getModel('payment');
                // GETTING ORDER INFO
                $orderinfo = $model->getOrderInfo($order_id);
                $this->processor = $orderinfo->processor;
                // GETTING USER PAYMENT HTML
                $this->payhtml = $model->getHTML($orderinfo->processor, $order_id);
            }
        }
        parent::display($tpl);

        return true;
    }
}
