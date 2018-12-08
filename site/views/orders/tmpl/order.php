<?php
defined('_JEXEC') or die(';)');
/*
 * @version %%ae3.version%%
 * @package %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license %%ae3.license%%
 * @author %%ae3.author%%
 * @access public
*/

/*$post = JRequest::get('post');
print"<pre>"; print_r($post);
//// for getting current tab status one page chkout::
$session =JFactory::getSession();
$ses_var = $session->get('processpayment');
var dump($ses_var);*/

if (!empty($this->orderinfo)) {
    $ordInfo = $this->orderinfo;
    ?>
    <h2 style="background-color:#F5F5F5;padding:15px;border-radius:4px;"><?php echo JText::_('AE_ORDER_DETAIL'); ?></h2>
    <table width="400" border="3" cellpadding="5" cellspacing="2">
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_ORDERID'); ?></td>
            <td align="left"> <?php echo $ordInfo->id; ?></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_USER_ID'); ?></td>
            <td align="left"> <?php echo $ordInfo->user_info_id; ?></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_NAME'); ?></td>
            <td align="left"> <?php echo $ordInfo->name; ?></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_EMAIL'); ?></td>
            <td align="left"> <?php echo $ordInfo->email; ?></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_CDATE'); ?></td>
            <td align="left"> <?php echo $ordInfo->cdate; ?></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_AMOUNT'); ?></td>
            <td align="left"> <?php echo $ordInfo->amount; ?></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_STATUS'); ?></td>
            <td align="left"> <?php echo $ordInfo->status; ?></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_PROCESSOR'); ?></td>
            <td align="left"> <?php echo $ordInfo->processor; ?></td>
        </tr>
        <tr bgcolor="#CCCCCC">
            <td width="150"><?php echo JText::_('AE_ORDER_IP'); ?></td>
            <td align="left"> <?php echo $ordInfo->ip_address; ?></td>
        </tr>
    </table>
    <?php
} else {
    echo JText::_('AE_ORDERDETAIL_NOT_FOUND');
}
?>


