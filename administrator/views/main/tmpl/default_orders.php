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

$layout = new JLayoutFile('main.orders', JPATH_ADMINISTRATOR . '/components/com_allevents/layouts');
?>

<div class="items">
    <?php echo $layout->render(['orders' => $this->pan_orders]); ?>
</div>

<div class="actions">
    <!--<a href="index.php?option=com_allevents&view=orders&filter[status]=10">All pending</a>-->
    <!--<a href="index.php?option=com_allevents&view=orders&filter[status]=30">All under review</a>-->
    <a href="index.php?option=com_allevents&view=orders&filter[status]="><?php echo JText::_('COM_ALLEVENTS_ALL_ORDERS'); ?></a>
</div>

