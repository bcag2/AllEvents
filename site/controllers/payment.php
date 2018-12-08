<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * AllEventsControllerPayment
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */
class AllEventsControllerPayment extends AllEventsController
{
    /**
     * AllEventsControllerPayment::getHTML()
     *
     */
    function getHTML()
    {
        $model = $this->getModel('payment');
        $jinput = JFactory::getApplication()->input;
        $pg_plugin = $jinput->get('processor');
        //$user = JFactory::getUser();
        //$session = JFactory::getSession();
        $order_id = $jinput->get('order');
        $html = $model->getHTML($pg_plugin, $order_id);
        if (!empty($html[0])) {
            echo $html[0];
        }
        jexit();
    }

    /**
     * AllEventsControllerPayment::confirmpayment()
     *
     */
    function confirmpayment()
    {
        $model = $this->getModel('payment');
        $session = JFactory::getSession();
        $jinput = JFactory::getApplication()->input;
        $order_id = $session->get('order_id');
        $pg_plugin = $jinput->get('processor');
        $response = $model->confirmpayment($pg_plugin, $order_id);

        return $response;
    }

    /**
     * AllEventsControllerPayment::processpayment()
     *
     * Payment gateway sends payment response to notify URL.
     *
     */
    function processpayment()
    {
        $mainframe = JFactory::getApplication();
        $jinput = JFactory::getApplication()->input;
        $session = JFactory::getSession();
        //$post = JRequest::get('post');

        if ($session->has('payment_submitpost')) {
            $post = $session->get('payment_submitpost');
            $session->clear('payment_submitpost');
        } else {
            $jinput = JFactory::getApplication()->input;
            $rawDataPost = $jinput->post->getArray([]);
            $rawDataGet = $jinput->get->getArray([]);
            //$rawDataPost = JRequest::get('POST', 2);
            //$rawDataGet = JRequest::get('GET', 2);
            $post = array_merge($rawDataGet, $rawDataPost);
        }

        $pg_plugin = $jinput->get('processor');
        $order_id = $jinput->get('order_id', '', 'STRING');

        if (empty($post) || empty($pg_plugin)) {
            JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), 'error');

            return;
        }
        //$person = json_encode($post);

        $model = $this->getModel('payment');
        $response = $model->processpayment($post, $pg_plugin, $order_id);
        $mainframe->redirect($response['return'], $response['msg']);
    }

    /**
     * AllEventsControllerPayment::save()
     *
     */
    function save()
    {
        //$post = JRequest::get('post');
        $jinput = JFactory::getApplication()->input;
        $post = $jinput->post->getArray([]);
        $model = $this->getModel('payment', 'AllEventsModel');
        $order_id = $model->store($post);
        $session = JFactory::getSession();
        $session->set('order_id', $order_id);
        $model = $this->getModel('Enrolment', 'AllEventsModel');
        $model->enrol_orders($post['event_id'], 0, (int)$post['type_ticketcount'] - 1, $order_id);
        $msg = '';
        $link = JUri::root() . substr(JRoute::_('index.php?option=com_allevents&view=payment&layout=pay&order_id=' . $order_id, false), strlen(JUri::base(true)) + 1);
        JFactory::getApplication()->redirect($link, $msg);
    }
}
