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

JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JHtml::_('formbehavior.chosen', 'select');

JFactory::getDocument()->addScriptDeclaration('
	Joomla.submitbutton = function(task) {
		if (task == "event.cancel" || document.formvalidator.isValid(document.getElementById("item-form"))) {
			Joomla.submitform(task, document.getElementById("item-form"));
		}
	};
');
?>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id); ?>"
      id="item-form" method="post" name="adminForm" class="form-validate">

    <div class="row-fluid">
        <div class="span6">
            <h2><?php echo JText::_('COM_ALLEVENTS_DETAILS'); ?></h2>

            <?php echo $this->form->renderField('titre'); ?>
            <?php echo $this->form->renderField('agenda_id'); ?>
            <?php echo $this->form->renderField('place_id'); ?>
            <?php echo $this->form->renderField('enrolment_enabled'); ?>
            <?php echo $this->form->renderField('proposed_by'); ?>
            <?php echo $this->form->renderField('affiche'); ?>
            <?php echo $this->form->renderField('description'); ?>
        </div>

        <div class="span6">
            <h2><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DATES'); ?></h2>
            <?php echo $this->form->renderField('allday'); ?>
            <?php echo $this->form->renderField('date'); ?>
            <?php echo $this->form->renderField('enddate'); ?>
            <?php echo $this->form->renderField('publishingdate'); ?>

            <h2><?php echo JText::_('COM_ALLEVENTS_CPANEL_ENROLMENTS'); ?></h2>
            <?php echo $this->form->renderField('openingdate'); ?>
            <?php echo $this->form->renderField('closingdate'); ?>
        </div>
    </div>

    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="task" value=""/>
    <?php echo JHtml::_('form.token'); ?>
</form>
