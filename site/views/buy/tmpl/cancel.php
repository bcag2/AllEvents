<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

$session = JFactory::getSession();
$session->set('JT_orderid', '');
$session->set("JT_fee", '');
echo $msg = JText::_('OPERATION_CANCELLED');
$user = JFactory::getUser();
$input = JFactory::getApplication()->input;
$eventid = $input->get('eventid', '', 'INT');
$itemid = 0;
$integration = 2;
$linkcreateevent = '';
if ($integration == 2) {
    $linkcreateevent = JRoute::_(JUri::base() . '?option=com_allevents&view=events' . '&Itemid=' . $itemid);
} elseif ($integration == 3) {
    $linkcreateevent = JRoute::_(JUri::base() . '?option=com_jevents&task=month.calendar' . '&Itemid=' . $itemid);
} elseif ($integration == 1) {
    $linkcreateevent = JRoute::_(JUri::base() . '?option=com_community&view=events&task=viewevent' . '&Itemid=' . $itemid);
}
echo '<div style="float:right"><a href="' . $linkcreateevent . '">' . JText::_('BACK') . '</a></div>';
