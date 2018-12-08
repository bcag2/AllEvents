<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');
if (!class_exists('AEModelAEhelper'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aehelper.php';

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsModelPayment
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelPayment extends JModelLegacy
{
    /**
     * AllEventsModelPayment::confirmpayment()
     *
     * @param mixed $pg_plugin
     * @param mixed $oid
     * @throws Exception
     */
    public function confirmpayment($pg_plugin, $oid)
    {
        $jinput = JFactory::getApplication()->input;
        $post = $jinput->post->getArray([]);
        //$post = JRequest::get('post');
        $vars = $this->getPaymentVars($pg_plugin, $oid);
        if (!empty($post) && !empty($vars)) {
            JPluginHelper::importPlugin('payment', $pg_plugin);
            $dispatcher = JEventDispatcher::getInstance();
            $dispatcher->trigger('onTP_ProcessSubmit', [$post, $vars]);
        } else {
            JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');
        }
    }

    /**
     * AllEventsModelPayment::getPaymentVars()
     *
     * @param mixed $pg_plugin - plugin name
     * @param mixed $order_id - order id
     *
     * @return stdClass - HTML from payment gateway
     * @throws Exception
     */
    private function getPaymentVars($pg_plugin, $order_id)
    {
        $AEModelAEhelper = new AEModelAEhelper;
        $params = AllEventsHelperParam::getGlobalParam();

        //GETTING MENU Itemid
        //$params = JComponentHelper::getParams('com_allevents');
        $orderItemid = $AEModelAEhelper->getitemid('index.php?option=com_allevents&view=payment');

        $pass_data = $this->getOrderInfo($order_id);
        $vars = new stdClass;
        $vars->order_id = $order_id;
        $vars->user_id = $pass_data->user_info_id;
        $vars->user_firstname = $pass_data->name;
        $vars->user_email = $pass_data->email;
        // $vars->phone = !empty($pass_data->phone) ? $pass_data->phone : '';
        $vars->item_name = $pass_data->titre . ' (' . JHtml::date($pass_data->date, $params['gdate_format']) . ')'; //  order prod name

        // URL SPECIFICATIONS
        $vars->submiturl = JRoute::_("index.php?option=com_allevents&task=payment.confirmpayment&processor={$pg_plugin}");
        $vars->return = JUri::root() . substr(JRoute::_("index.php?option=com_allevents&view=orders&layout=order&order_id=" . ($order_id) . "&processor={$pg_plugin}&Itemid=" . $orderItemid, false), strlen(JUri::base(true)) + 1);

        $vars->cancel_return = JUri::root() . substr(JRoute::_("index.php?option=com_allevents&view=orders&layout=cancel&processor={$pg_plugin}&Itemid=" . $orderItemid, false), strlen(JUri::base(true)) + 1);
        $vars->url = $vars->notify_url = JRoute::_(JUri::root() . "index.php?option=com_allevents&task=payment.processpayment&order_id=" . ($order_id) . "&processor=" . $pg_plugin, false);

        $vars->currency_code = $pass_data->currency;
        $vars->comment = $pass_data->customer_note;
        $vars->amount = $pass_data->amount;
        $vars->payment_description = JText::_('COM_ALLEVENTS_ORDER_PAYMENT_DESC');

        return $vars;
    }

    /**
     * AllEventsModelPayment::getOrderInfo()
     *
     * @param mixed $order_id
     *
     * @return mixed
     */
    public function getOrderInfo($order_id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('a.user_info_id,a.name,a.email,a.currency,a.customer_note,a.processor,a.amount');
        $query->from('`#__allevents_orders` AS a');
        $query->where('(a.id=' . $order_id . ')');

        $query->select('e.titre, e.date');
        $query->join('INNER', '#__allevents_events AS e ON e.id=a.event_id');

        $db->setQuery($query);

        return $order_result = $db->loadObject();
    }

    /**
     * AllEventsModelPayment::processpayment()
     *
     * @param mixed $post
     * @param mixed $pg_plugin
     * @param mixed $order_id
     *
     * @return array
     * @throws Exception
     */
    public function processpayment($post, $pg_plugin, $order_id)
    {
        $jinput = JFactory::getApplication()->input;
        $jinput->set('remote', 1);

        $return_resp = [];

        //Authorise Post Data
        // if (!empty($post['plugin_payment_method']) && $post['plugin_payment_method'] == 'onsite') {
        //$plugin_payment_method = $post['plugin_payment_method'];
        // }

        //START :: TRIGGER PAYMENT PLUGIN
        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('payment', $pg_plugin);
        $data = $dispatcher->trigger('onTP_Processpayment', [$post]);
        $data = $data[0];
        //END :: TRIGGER PAYMENT PLUGIN

        // Add details in log file
        @$this->storelog($pg_plugin, $data);

        //get order id
        if (empty($order_id)) {
            $order_id = $data['order_id'];
        }

        // RIGHT NOW WE R NOT ADDING CODE FOR GUEST USER
        $guest_email = "";
        $data['processor'] = $pg_plugin;
        $data['status'] = trim($data['status']);
        $query = "SELECT o.amount FROM `#__allevents_orders` AS o WHERE o.id=" . $order_id;
        $this->_db->setQuery($query);
        $order_amount = $this->_db->loadResult();
        // Check that the amount is correct
        $order_amount = (float)$order_amount;
        $return_resp['status'] = '0';
        $data['total_paid_amt'] = (float)$data['total_paid_amt'];
        $epsilon = 0.01;

        if (empty($data['status'])) {
            $data['status'] = 'P';
            $data['pending'] = 1;
            $return_resp['status'] = '0';
        } elseif ($data['status'] == 'C' && ($order_amount - $data['total_paid_amt']) < $epsilon) {
            $data['status'] = 'C';
            $data['pending'] = 0;
            $return_resp['status'] = '1';
        } elseif ($order_amount != $data['total_paid_amt']) {
            $data['status'] = 'E';
            $data['pending'] = 1;
            $return_resp['status'] = '0';
        }
        // IF NOT CONFORM ORDER GET ERORR MSG
        if ($data['status'] != 'C' && !empty($data['error'])) {
            $return_resp['msg'] = $data['error']['code'] . " " . $data['error']['desc'];
        }
        $this->updateOrder($data);
        $return_resp['return'] = JUri::root() . substr(JRoute::_("index.php?option=com_allevents&view=orders&layout=order" . $guest_email . "&order_id=" . ($order_id) . "&processor=" . $pg_plugin, false), strlen(JUri::base(true)) + 1);

        return $return_resp;
    }

    /**
     * AllEventsModelPayment::storelog()
     *
     * @param mixed $name
     * @param mixed $data
     */
    private function storelog($name, $data)
    {
        $data1 = [];
        $data1['raw_data'] = $data['raw_data'];
        $data1['AE_CLIENT'] = "com_allevents";

        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('payment', $name);
        $dispatcher->trigger('onTP_Storelog', [$data1]);
    }

    /**
     * AllEventsModelPayment::updateOrder()
     *
     * @param mixed $data
     * @throws Exception
     */
    private function updateOrder($data)
    {
        $db = JFactory::getDbo();
        $res = new stdClass();
        $eoid = $data['order_id']; // $eoid means extracted order id
        $res->id = $eoid;
        $res->mdate = date("Y-m-d H:i:s");
        $res->transaction_id = $data['transaction_id'];
        $res->status = $data['status'];
        $res->processor = $data['processor'];
        //$res->payee_id= $data['buyer_email'];
        //appending raw data to orders's extra field data
        $AEModelAEhelper = new AEModelAEhelper;
        $res->extra = $AEModelAEhelper->appendExtraFieldData($data['raw_data'], $eoid);
        if (!$db->updateObject('#__allevents_orders', $res, 'id')) {
            //return false;
        }

        $db = JFactory::getDbo();
        if ($data['pending'] == 1) {
            $db->setQuery('UPDATE #__allevents_enrolments SET pending = 1, enroltype=3 WHERE order_id = ' . $data['order_id']);
        } else {
            $db->setQuery('UPDATE #__allevents_enrolments SET pending = 0, enroltype=0 WHERE order_id = ' . $data['order_id']);
        }
        $db->execute();
    }

    /**
     * AllEventsModelPayment::store()
     *
     * @param mixed $post
     *
     * @return bool
     */
    public function store($post)
    {
        $db = JFactory::getDbo();
        $user = JFactory::getUser();

        $row = new stdClass;

        // Get the IP Address
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = 'unknown';
        }

        $row->payee_id = $user->id;
        $row->user_info_id = $user->id;
        $row->name = $user->name;
        $row->email = $user->email;
        // FINAL AMOUNT
        $row->amount = $post['total_amt'];

        // ORIGINAL AMT FOR PRODUCT/ ITEMS    // we are not considering tax and shipping charges
        $row->original_amount = $post['price'];
        $row->ticketscount = $post['type_ticketcount'];
        $row->event_id = $post['event_id'];

        //NOT CONSIDERING TAX, ADD ACCORDING TO YOUR NEED
        $row->order_tax = 0;
        $row->order_tax_details = '';

        //NOT CONSIDERING SHIPPING, ADD ACCORDING TO YOUR NEED
        $row->order_shipping = 0;
        $row->order_shipping_details = '';

        //NOT CONSIDERING COUPON, ADD ACCORDING TO YOUR NEED
        $row->coupon_code = '';

        $row->customer_note = '';
        $row->processor = $post['gateways'];
        $row->status = 'P';

        $row->cdate = date("Y-m-d H:i:s");
        $row->mdate = date("Y-m-d H:i:s");
        $row->ip_address = $ip;

        // GETTING CURRENCY FROM COMPONENT PARAMS
        $params = JComponentHelper::getParams('com_allevents');
        $row->currency = $params->get("addcurrency", "EUR");

        try {
            $db->insertObject('#__allevents_orders', $row, 'id');

            return $insert_order_id = $db->insertid();
        } catch (RuntimeException $e) {
            //$error = $e->getCode();
            return false;
        }
    }

    /**
     * AllEventsModelPayment::getHTML()
     *
     * @param mixed $pg_plugin - plugin name
     * @param mixed $tid - order id
     *
     * @return array - HTML from payment gateway
     */
    public function getHTML($pg_plugin, $tid)
    {
        // GETTING PAYMENT FORM VARIABLES
        $vars = $this->getPaymentVars($pg_plugin, $tid);
        //GETTING PAYMENT HTML
        JPluginHelper::importPlugin('payment', $pg_plugin);
        $dispatcher = JEventDispatcher::getInstance();
        $html = $dispatcher->trigger('onTP_GetHTML', [$vars]);

        return $html;
    }
}
