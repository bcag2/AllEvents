<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

JLoader::discover('JHtml', JPATH_ADMINISTRATOR . '/components/com_allevents/helpers/html');

extract($displayData);

?>

<?php if (!$orders): ?>
    <div class="no-results">
        <?php echo JText::_('COM_ALLEVENTS_ERROR_ORDER_NOT_FOUND'); ?>
    </div>
<?php else: ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width: 90px;"><?php echo JText::_('PAYMENT_STATUS'); ?></th>
            <th><?php echo JText::_('COM_ALLEVENTS_TITRE'); ?></th>
            <th style="width: 100px; text-align: right;"><?php echo JText::_('PAID_AMOUNT'); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td>
                    <?php echo JHtml::_('order.order_status', $order->status); ?>
                </td>

                <td style="line-height: normal;">
                    <a href="index.php?option=com_allevents&task=order.edit&id=<?php echo $order->id; ?>"
                       style="font-weight: bold;">
                        <?php echo (empty($order->transaction_id)) ? '-' : $order->transaction_id; ?>
                    </a>

                    <!-- <div class="small muted">
                        <?php if ($order->event_id): ?>
                            <a href="index.php?option=com_allevents&task=event.edit&id=<?php echo $order->event_id; ?>">
                                <span class="fa fa-fw fa-bookmark"
                                      style="margin-right: 4px;"></span><?php echo $order->event_title; ?>
                            </a>
                        <?php else: ?>
                            <?php echo JText::_('COM_ALLEVENTS_ERROR_EVENT_NOT_FOUND'); ?>
                        <?php endif; ?>
                    </div>-->

                    <div class="small muted">
                        <?php if ($order->processor): ?>
                            <?php echo $order->processor; ?>
                        <?php else: ?>
                            <?php echo JText::_('COM_ALLEVENTS_NO_PAYMENT_GATEWAY'); ?>
                        <?php endif; ?>
                    </div>
                </td>

                <td style="text-align: right; font-weight: bold;">
                    <?php echo JText::sprintf('AE_AMOUNT', $order->original_amount, $order->currency); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
