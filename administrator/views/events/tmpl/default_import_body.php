<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */
defined('_JEXEC') or die;
$published = $this->state->get('filter.published');
?>

<div class="modal-body modal-batch">
    <p><?php echo JText::_('COM_ALLEVENTS_SAMPLES_2'); ?></p>
    <p><?php echo JText::_('COM_ALLEVENTS_SAMPLES_3'); ?></p>
    <p><?php echo JText::_('COM_ALLEVENTS_SAMPLES_4'); ?></p>
    <p><?php echo JText::sprintf('COM_ALLEVENTS_SAMPLES_5', JText::_('JGLOBAL_BATCH_PROCESS')); ?></p>
    <p><?php echo JText::_('COM_ALLEVENTS_SAMPLES_WARNING'); ?></p>
</div>