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

$layout = new JLayoutFile('main.events', JPATH_ADMINISTRATOR . '/components/com_allevents/layouts');

?>

<div class="items">
    <?php echo $layout->render([
        'events' => $this->pan_events,
        'settings' => $this->pan_settings,
    ]); ?>
</div>

<div class="actions">
    <a href="index.php?option=com_allevents&view=events&filter[state]="><?php echo JText::_('COM_ALLEVENTS_ALL_EVENTS'); ?></a>
    <a href="index.php?option=com_allevents&view=events&filter[state]=1"><?php echo JText::_('COM_ALLEVENTS_ALL_PUBLISHED'); ?></a>
    <a href="index.php?option=com_allevents&view=eventstoapprove"><?php echo JText::_('COM_ALLEVENTS_ALL_SUBMITTED'); ?></a>
</div>
