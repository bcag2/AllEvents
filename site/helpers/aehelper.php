<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.html.parameter');
jimport('joomla.registry.registry');
jimport('joomla.user.helper');
jimport('joomla.access.access');

/**
 * AEModelAEhelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AEModelAEhelper extends JModelItem
{
    protected $orderinfo;
    protected $orderitems;
    protected $orders_site;
    protected $orders_email;
    protected $order_authorized;

    /**
     * AEModelAEhelper::count_Events()
     *
     * @return
     */
    public function count_Events()
    {
        // Get Params Menu
        //$app = JFactory::getApplication();
        //$AEmenuParams = $app->getParams();
        // Get Data
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('count(e.id) AS nbevents')->from('#__allevents_events AS e');
        // Adding Filter if State Published
        $where = "(e.published = 1)";
        // Adding Filter per Time in Navigation
        $where .= ' AND e.date >= (CURDATE())';
        // Access Control
        $user = JFactory::getUser();
        //$userID = $user->get('id');
        $userLevels = $user->getAuthorisedViewLevels();
        $userGroups = $user->groups;
        $groupid = JComponentHelper::getParams('com_allevents')->get('approvalGroups', ["8"]);

        jimport('joomla.access.access');
        $adminUsersArray = [];
        foreach ($groupid as $gp) {
            $adminUsers = JAccess::getUsersByGroup($gp, false);
            $adminUsersArray = array_merge($adminUsersArray, $adminUsers);
        }
        // Test if user has Access Permissions
        if (!in_array('8', $userGroups)) {
            $useraccess = implode(', ', $userLevels);
            $where .= ' AND e.access IN (' . $useraccess . ')';
        }
        // Test if user logged-in has Approval Rights
        // if (!in_array($userID, $adminUsersArray) AND !in_array('8', $userGroups)) {
        // $where.=' AND e.approval <> 1';
        // } else {
        // $where.=' AND e.approval < 2';
        // }
        $query->where($where);
        $db->setQuery($query);
        $result = $db->loadObject()->nbevents;

        return $result;
    }

    /**
     * AllEventsHelper::getitemid()
     *  pass the link for which you want the ItemId.
     *
     * @param mixed $link
     *
     * @return int|mixed
     * @throws Exception
     */
    function getitemid($link)
    {
        $itemid = 0;

        global $mainframe;
        $mainframe = JFactory::getApplication();
        if ($mainframe->isAdmin()) {
            $db = JFactory::getDbo();
            $query = "SELECT id FROM `#__menu` WHERE link LIKE '%" . $link . "%' AND published = 1 LIMIT 1";
            $db->setQuery($query);
            $itemid = $db->loadResult();
        } else {
            // getting MENU  Itemid
            $menu = $mainframe->getMenu();
            $items = $menu->getItems('link', $link);
            if (isset($items[0])) {
                $itemid = $items[0]->id;
            }

            //IF NO MENU FOR LINK THEN FETCH FROM db
            if (empty($itemid)) {
                $db = JFactory::getDbo();
                $query = "SELECT id FROM #__menu WHERE link LIKE '%" . $link . "%' AND published = 1 LIMIT 1";
                $db->setQuery($query);
                $itemid = $db->loadResult();
            }
        }
        // if Itemid is empty then get from request and return it
        if (!$itemid) {
            $jinput = JFactory::getApplication()->input;
            $itemid = $jinput->get('Itemid');
        }

        return $itemid;
    }

    /**
     * AllEventsHelper::appendExtraFieldData()
     *
     * THIS function take orderid and array of data to be store in extra field of order table
     *
     * @param mixed $data array :: data to be store in extra field
     * @param mixed $order_id INTERGER
     * @param integer $curr_exchange_msg
     *
     * @return json string  :: json_encoded extra field data
     */
    function appendExtraFieldData($data, $order_id, $curr_exchange_msg = 0)
    {
        $db = JFactory::getDbo();
        $q = "SELECT `extra` FROM `#__allevents_orders` WHERE `id` =" . $order_id;
        $db->setQuery($q);
        $oldres = $db->loadResult();
        if (empty($oldres)) {
            if ($curr_exchange_msg == 1) {
                // called from currecy exchange function
                $exchange_msg['currency_exchange'] = $data;
            } elseif ($curr_exchange_msg == 0) { // mean we are going to save payment response msg
                $exchange_msg['payment_response'] = $data;
            }

            return json_encode($exchange_msg);
        } else {
            // Take already exist extra data
            $olddata = json_decode($oldres);
            //ADD or UPDATE  currency_exchange data
            if ($curr_exchange_msg == 1) {
                // called from currecy exchange function
                $olddata->currency_exchange = $data;
            } elseif ($curr_exchange_msg == 0) { // mean we are going to save payment response msg
                $olddata->payment_response = $data;
            }

            return json_encode($olddata);
        }
    } // end of appendExtraFieldData

    /**
     * AllEventsHelper::updatestatus()
     *
     * @param mixed $order_id : int id of order
     * @param mixed $status : string status of order
     * @param string $comment : string default='' comment added if any
     * @param integer $send_mail : int default=1 weather to send status change mail or not.
     * @param integer $store_id : INTEGER (1/0) if we are updating store product status
     *
     * @return bool
     * @throws Exception
     */
    function updatestatus($order_id, $status, $comment = '', $send_mail = 1, $store_id = 0)
    {
        global $mainframe;
        $params = JComponentHelper::getParams('com_allevents');
        $comquick2cartHelper = new comquick2cartHelper();
        switch ($status) {
            case 'C':
                /// to reduce stock
                $usestock = $params->get('usestock');
                //$outofstock_allowship = $params->get('outofstock_allowship');

                if ($usestock == 1) //$outofstock_allowship==1)
                {
                    $comquick2cartHelper->updateItemStock($order_id);
                }
                $comquick2cartHelper->updateStoreFee($order_id);
        }
        $mainframe = JFactory::getApplication();
        $db = JFactory::getDbo();
        if ($send_mail == 1) {
            $query = "SELECT o.status FROM #__allevents_orders AS o WHERE o.id =" . $order_id;
            $db->setQuery($query);
            $order_oldstatus = $db->loadResult();
        }
        $res = new stdClass();
        // UPDATING STORE ORDER CHANGES
        if (!empty($store_id)) {
            // change ORDER_ITEM STATUS// here i want order_item_id to update status of all order item releated to store
            $isOrderStatusChanged = $comquick2cartHelper->updateOrderItemStatus($order_id, $store_id, $status);
            if (empty($isOrderStatusChanged)) // 1 for order status change, 0 for order item change
            {
                //    return ;
            }
        } else {
            // IF admin changes ORDER status
            $res->status = $status;
            $res->id = $order_id;
            if (!$db->updateObject('#__allevents_orders', $res, 'id')) {
                return 2;
            }
            /** @noinspection PhpUnusedLocalVariableInspection */
            $isOrderStatusChanged = $comquick2cartHelper->updateOrderItemStatus($order_id, 0, $status);
            // UPDATE ORDER ITEM STATUS ALSO
        }
        //START Q2C Sample development
        $query = "SELECT o.* FROM #__allevents_orders AS o WHERE o.id =" . $order_id;
        $db->setQuery($query);
        $orderobj = $db->loadObject();
        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('system');
        $dispatcher->trigger('Onq2cOrderUpdate', [$orderobj]); //Call the plugin and get the result
        //END Q2C Sample development
        if ($send_mail == 1 && $order_oldstatus != $status) {
            $params = JComponentHelper::getParams('com_allevents');
            //$adminemails = comquick2cartHelper::adminMails();
            $query = "SELECT ou.user_id,ou.user_email,ou.firstname FROM `#__kart_users` AS ou WHERE ou.address_type='BT' AND ou.order_id = " . $order_id;
            $db->setQuery($query);
            $orderuser = $db->loadObjectList();
            //Change for backward compatiblity for user info not saving order id against it
            if (empty($orderuser)) {
                $query = "SELECT ou.user_id,ou.user_email,ou.firstname";
                $query .= "FROM #__users as ou ";
                $query .= "WHERE ou.address_type='BT' AND ou.order_id IS NULL AND ou.user_id = (SELECT o.user_info_id FROM `#__allevents_orders` as o WHERE o.id =" . $order_id . ")";
                $db->setQuery($query);
                $orderuser = $db->loadObjectList();
            }
            $orderuser = $orderuser[0];
            switch ($status) {
                case 'C':
                    $orderstatus = JText::_('QTC_CONFR');
                    /*for invoice*/
                    $jinput = JFactory::getApplication()->input;
                    $jinput->set('orderid', $order_id);
                    $order = $order_bk = $comquick2cartHelper->getorderinfo($order_id);
                    $this->orderinfo = $order['order_info'];
                    $this->orderitems = $order['items'];
                    $this->orders_site = 1;
                    $this->orders_email = 1;
                    $this->order_authorized = 1;
                    if ($this->orderinfo[0]->address_type == 'BT') {
                        $billemail = $this->orderinfo[0]->user_email;
                    } else {
                        if ($this->orderinfo[1]->address_type == 'BT') {
                            $billemail = $this->orderinfo[1]->user_email;
                        }
                    }
                    //$fullorder_id = $order['order_info'][0]->prefix . $order_id;
                    if (!JFactory::getUser()->id && $params->get('guest')) {
                        $jinput->set('email', md5($billemail));
                    }

                    // check for view override
                    $view = $comquick2cartHelper->getViewpath('orders', 'invoice');
                    ob_start();
                    include($view);
                    $invoicehtml = ob_get_contents();
                    ob_end_clean();
                    /*for invoice*/
                    break;
                case 'RF':
                    $orderstatus = JText::_('QTC_REFUN');
                    break;
                case 'S':
                    $orderstatus = JText::_('QTC_SHIP');
                    break;
                case 'E':
                    $orderstatus = JText::_('QTC_ERR');
                    break;
                case 'P':
                    $orderstatus = JText::_('QTC_PENDIN');
                    break;
                default:
                    $orderstatus = $status;
                    break;
            }

            $fullorder_id = $orderobj->prefix . $order_id;
            if (!empty($store_id)) {
                $productStatus = $comquick2cartHelper->getProductStatus($order_id);
                $body = JText::sprintf('QTC_STORE_PRODUCT_STATUS_CHANGE_BODY', $productStatus);
            } else {
                $body = JText::_('QTC_STATUS_CHANGE_BODY');
            }
            $site = $mainframe->get('sitename');
            if ($comment) {
                $comment = str_replace('{COMMENT}', $comment, JText::_('QTC_COMMENT_TEXT'));
                $find = [
                    '{ORDERNO}',
                    '{STATUS}',
                    '{SITENAME}',
                    '{NAME}',
                    '{COMMENTTEXT}'];
                $replace = [
                    $fullorder_id,
                    $orderstatus,
                    $site,
                    $orderuser->firstname,
                    $comment];
            } else {
                $find = [
                    '{ORDERNO}',
                    '{STATUS}',
                    '{SITENAME}',
                    '{NAME}',
                    '{COMMENTTEXT}'];
                $replace = [
                    $fullorder_id,
                    $orderstatus,
                    $site,
                    $orderuser->firstname,
                    ''];
            }

            $body = str_replace($find, $replace, $body);
            $guest_email = '';
            if (!$orderuser->user_id && $params->get('guest')) {
                $guest_email = "&email=" . md5($orderuser->user_email);
            }

            $Itemid = $comquick2cartHelper->getitemid('index.php?option=com_allevents&view=orders');
            $link = JUri::root() . substr(JRoute::_('index.php?option=com_allevents&view=orders&layout=order' . $guest_email . '&orderid=' . $order_id . '&Itemid=' . $Itemid), strlen(JUri::base(true)) + 1);
            $order_link = '<a href="' . $link . '">' . JText::_('QTC_ORDER_GUEST_LINK') . '</a>';
            $body = str_replace('{LINK}', $order_link, $body);
            $body = nl2br($body);
            if (!empty($invoicehtml)) {
                $body = $body . '<div>' . JText::_('QTC_ORDER_INVOICE_IN_MAIL') . '</div>';
                $invoicehtml = $body . $invoicehtml;
                $invoicesubject = JText::sprintf('QTC_INVOICE_MAIL_SUB', $site, $fullorder_id);
                $comquick2cartHelper->sendmail($orderuser->user_email, $invoicesubject, $invoicehtml, $params->get('sale_mail'));
            } else {
                $subject = JText::sprintf('QTC_STATUS_CHANGE_SUBJECT', $fullorder_id);
                $comquick2cartHelper->sendmail($orderuser->user_email, $subject, $body, $params->get('sale_mail'));
            }
        }

        return true;
    } // END OF updatestatus

    /**
     * AllEventsHelper::getOrderInfo()
     *
     * @param mixed $order_id
     *
     * @return mixed
     */
    function getOrderInfo($order_id)
    {
        $db = JFactory::getDbo();
        $query = "SELECT * FROM `#__allevents_orders` WHERE `id`=" . $order_id;
        $db->setQuery($query);

        return $order_result = $db->loadObject();
    }
}


