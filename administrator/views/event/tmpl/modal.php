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

JHtml::_('bootstrap.tooltip', '.hasTooltip', ['placement' => 'bottom']);

$function = JFactory::getApplication()->input->getCmd('function', 'jEditEvent_' . (int)$this->item->id);

// Function to update input title when changed
JFactory::getDocument()->addScriptDeclaration('
function jEditEventModal() {
   if (window.parent && document.formvalidator.isValid(document.getElementById("item-form"))) {
      return window.parent.' . $this->escape($function) . '(document.getElementById("jform_title").value);
   } 
}
');
?>
<button id="applyBtn" type="button" class="hidden"
        onclick="Joomla.submitbutton('event.apply'); jEditEventModal();"></button>
<button id="saveBtn" type="button" class="hidden"
        onclick="Joomla.submitbutton('event.save'); jEditEventModal();"></button>
<button id="closeBtn" type="button" class="hidden" onclick="Joomla.submitbutton('event.cancel');"></button>
<div class="container-popup">
    <?php $this->setLayout('edit'); ?>
    <?php echo $this->loadTemplate(); ?>
</div>
