<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');
if (!class_exists('AEModelAEhelper'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aehelper.php';

/**
 * AllEventsViewOrders
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */
class AllEventsViewOrders extends JViewLegacy
{
    private $orderinfo;

    /**
     * Execute and display a template script.
     *
     * @param   string $tpl The name of the template file to parse; automatically searches through the template paths
     *
     * @return  mixed  A string if successful, otherwise a Error object.
     * @see     JViewLegacy::loadTemplate()
     * @since   12.2
     * @throws Exception
     */
    function display($tpl = null)
    {
        $jinput = JFactory::getApplication()->input;
        $layout = $jinput->get("layout", 'order');

        if ($layout == "order") {
            $AEModelAEhelper = new AEModelAEhelper;
            $order_id = $jinput->get("order_id", '');

            if (!empty($order_id)) {
                $this->orderinfo = $AEModelAEhelper->getOrderInfo($order_id);
            } else {
                echo JText::_('COM_ALLEVENTS_ILLEGAL_ORDERID');
            }
        }
        parent::display($tpl);
    }
}