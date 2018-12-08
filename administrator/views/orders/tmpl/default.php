<?php
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/html/order.php';

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$user = JFactory::getUser();
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$sortFields = $this->getSortFields();

if (!empty($this->extra_sidebar)) {
    $this->sidebar .= $this->extra_sidebar;
}

$pstatus1 = [];

$pstatus1 = [
    'P' => JText::_('AE_PSTATUS_PENDING'),
    'C' => JText::_('AE_PSTATUS_COMPLETED'),
    'D' => JText::_('AE_PSTATUS_DECLINED'),
    'E' => JText::_('AE_PSTATUS_FAILED'),
    'UR' => JText::_('AE_PSTATUS_UNDERREVIW'),
    'RF' => JText::_('AE_PSTATUS_REFUNDED'),
    'CRV' => JText::_('AE_PSTATUS_CANCEL_REVERSED'),
    'RV' => JText::_('AE_PSTATUS_REVERSED'),
];

?>
<script>
    function selectstatusorder(appid, processor, ele) {
        document.getElementById('order_id').value = appid;
        document.getElementById('payment_status').value = ele.value;
        document.getElementById('processor').value = processor;
        document.adminForm.task.value = 'orders.save';
        Joomla.submitform('orders.save');
    }
</script>
<form action="<?php echo JRoute::_('index.php?option=com_allevents&view=orders', false); ?>" method="post"
      name="adminForm" id="adminForm">
    <?php if (!empty($this->sidebar)): ?>
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
        <?php else : ?>
        <div id="j-main-container">
            <?php endif; ?>

            <?php
            echo JLayoutHelper::render('joomla.searchtools.default', ['view' => $this]);
            ?>

            <?php if (empty($this->items)) : ?>
                <div class="alert alert-no-items">
                    <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
                </div>
            <?php else : ?>

                <table class="table table-striped" id="placeList">
                    <thead>
                    <tr>
                        <th width="1%" class="hidden-phone">
                            <?php echo JHtml::_('grid.checkall'); ?>
                        </th>
                        <th width="1%" class="nowrap center hidden-phone">
                            <?php echo JHtml::_('searchtools.sort', 'ORDER_ID', 'a.id', $listDirn, $listOrder); ?>
                        </th>
                        <th width="5%" align="center">
                            <?php echo JText::_('TRANSACTION_ID'); ?>
                        </th>
                        <th align="center">
                            <?php echo JHtml::_('searchtools.sort', 'PAY_METHOD', 'a.processor', $listDirn, $listOrder); ?>
                        </th>
                        <th align="center">
                            <?php echo JText::_('NUMBEROFTICKETS_SOLD'); ?>
                        </th>
                        <th align="center">
                            <?php echo JText::_('ORIGINAL_AMOUNT'); ?>
                        </th>
                        <th align="center">
                            <?php echo JText::_('PAID_AMOUNT'); ?>
                        </th>
                        <th align="center">
                            <?php echo JHtml::_('searchtools.sort', 'PAYMENT_STATUS', 'a.status', $listDirn, $listOrder); ?>
                        </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <?php
                    if (isset($this->items[0])) {
                        $colspan = count(get_object_vars($this->items[0]));
                    } else {
                        $colspan = 10;
                    }
                    ?>
                    <tr>
                        <td colspan="<?php echo $colspan ?>">
                            <?php echo $this->pagination->getListFooter(); ?>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $totalnooftickets = $subpaid = 0;
                    foreach ($this->items as $i => $item) :
                        $link_for_orders = "";
                        $totalnooftickets = $totalnooftickets + $item->ticketscount;
                        ?>success
                        <tr class="row<?php echo $i % 2; ?> 
                       <?php if ($item->status == 'P') {
                            echo 'warning';
                        } elseif ($item->status == 'C') {
                            echo 'success';
                        } else echo '';
                        ?>">
                            <td class="center hidden-phone">
                                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>

                            <td align="center">
                                <a rel="{handler: 'iframe', size: {x: 600, y: 600}}" class="modal"
                                   href="<?php echo $link_for_orders; ?>"><?php echo $item->id; ?></a>
                            </td>

                            <td>
                                <?php echo (empty($item->transaction_id)) ? '-' : $item->transaction_id; ?>
                            </td>


                            <td align="center">
                                <? phpecho $item->processor; ?>
                            </td>

                            <td align="center">
                                <?php echo $item->ticketscount ?>
                            </td>

                            <td align="center">
                                <?php echo JText::sprintf('AE_AMOUNT', $item->original_amount, $item->currency); ?>
                            </td>

                            <td align="center">
                                <?php $subpaid += $item->amount;
                                echo JText::sprintf('AE_AMOUNT', $item->amount, $item->currency); ?>
                            </td>

                            <td align="center">
                                <?php if (($item->status) AND (!empty($item->processor))) {
                                    // echo JHtml::_('order.order_status', $item->status, $i);
                                    $processor = "'" . $item->processor . "'";
                                    echo JHtml::_('select.genericlist', $pstatus1, "pstatus" . $i, 'onChange="selectstatusorder(' . $item->id . ',' . $processor . ',this);"', "value", "text", $item->status);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" align="right">
                            <div class="jtright">
                                <b><?php echo JText::_('TOTAL'); ?></b>
                            </div>
                        </td>
                        <td align="center">
                            <b><?php echo $totalnooftickets; ?></b>
                        </td>
                        <td align="center">
                        </td>
                        <td align="center">
                            <b><?php echo JText::sprintf('AE_AMOUNT', $subpaid, $item->currency); ?></b>
                        </td>

                        <td align="center" colspan="2"></td>
                    </tr>
                    </tbody>
                </table>

            <?php endif; ?>

            <input type="hidden" id='order_id' name="order_id" value=""/>
            <input type="hidden" id='payment_status' name="payment_status" value=""/>
            <input type="hidden" id='processor' name="processor" value=""/>
            <input type="hidden" name="task" value=""/>

            <input type="hidden" name="boxchecked" value="0"/>
            <?php echo JHtml::_('form.token'); ?>
        </div>
</form>