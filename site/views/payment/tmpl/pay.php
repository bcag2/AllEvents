<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */
defined('_JEXEC') or die;
?>
<h2><?php echo $this->processor; ?> &nbsp;
    <small><?php echo JText::_('COM_ALLEVENTS_PAYMENT_GATEWAY'); ?></small>
</h2>
<?php
if (!empty($this->payhtml[0])) {
    echo $this->payhtml[0];
}
?>
<!--
<h2><?php echo JText::_('COM_ALLEVENTS_COUPAN_ITEMID2'); ?></h2>

    <form method="post" name="adminForm" >
      <table>
        <tr>
          <td><b><?php echo JText::_('COM_ALLEVENTS_MANDATORY_PARMS'); ?></b></td>
        </tr>
         <tr>
          <td><?php echo JText::_('COM_ALLEVENTS_ORDERID'); ?>: </td>
          <td><input name="order_id" value="<?php echo (empty($posted['order_id'])) ? '' : $posted['order_id'] ?>" /></td>
          <td><?php echo JText::_('COM_ALLEVENTS_USERID'); ?>: </td>
          <td><input name="userid" id="firstname" value="<?php echo (empty($posted['userid'])) ? '' : $posted['userid']; ?>" /></td>
        </tr>
<tr>
          <td><?php echo JText::_('COM_ALLEVENTS_EMAIL'); ?>: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
          <td><?php echo JText::_('COM_ALLEVENTS_PHONE'); ?>: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
        </tr>
        <tr>
          
          <td><?php echo JText::_('COM_ALLEVENTS_FIRST_NAME'); ?>: </td>
          <td><input name="name" id="name" value="<?php echo (empty($posted['name'])) ? '' : $posted['name']; ?>" /></td>
        </tr>

        <tr>
          <td><?php echo JText::_('COM_ALLEVENTS_PROD_INFO'); ?>: </td>
          <td colspan="3"><input name="productinfo" value="<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>" size="64" /></td>
        </tr>
        <tr>
<td><?php echo JText::_('COM_ALLEVENTS_AMUNT'); ?>: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
        </tr>
        <tr>
          <td><?php echo JText::_('COM_ALLEVENTS_SUCCESS_INFO'); ?>: </td>
          <td colspan="3"><input name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td><?php echo JText::_('COM_ALLEVENTS_FAILURE_URI'); ?>: </td>
          <td colspan="3"><input name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>
        <tr>
            <td><?php echo JText::_('SEL_GATEWAY'); ?>:</td>
            <td colspan="3">

<?php

$default = "";
if (empty($this->gateways))
    echo JText::_('NO_PAYMENT_GATEWAY');
else {
// SETTING FIRST AS DEFAULT 
    $default = $this->gateways[0]->id;
    $pg_list = JHtml::_('select.radiolist', $this->gateways, 'gateways', 'class="inputbox required" ', 'id', 'name', $default, false);
    echo $pg_list;
}


?>
</div>
</div>  
</td>
        </tr>
      </table>
      <div>
      <input type="hidden" name="option" value="com_allevents" />
      <input type="hidden" name="controller" value="payment" />
<input type="hidden" name="task" value="save" />
<input type="submit" value="<?php echo JText::_('COM_ALLEVENTS_PLACE_ORDER'); ?>" />

</div>
      
    </form>
-->
