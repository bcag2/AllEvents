<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

// No direct access to this file
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$app = JFactory::getApplication();

// Access Administration Newsletter check.
if (JFactory::getUser()->authorise('core.newsletter', 'com_allevents')) {

    $script = "\t" . 'Joomla.submitbutton = function(pressbutton) {' . "\n";
    $script .= "\t\t" . 'var form = document.adminForm;' . "\n";
    $script .= "\t\t" . 'if (pressbutton == \'mail.cancel\') {' . "\n";
    $script .= "\t\t\t" . 'Joomla.submitform(pressbutton);' . "\n";
    $script .= "\t\t\t" . 'return;' . "\n";
    $script .= "\t\t" . '}' . "\n";
    $script .= "\t\t" . '// do field validation' . "\n";
    $script .= "\t\t" . 'if (form.jform_subject.value == ""){' . "\n";
    $script .= "\t\t\t" . 'alert("' . JText::_('COM_ALLEVENTS_MAIL_PLEASE_FILL_IN_THE_SUBJECT', true) . '");' . "\n";
// $script .= "\t\t" . '} else if (form.jform_message.value == ""){' . "\n";
// $script .= "\t\t\t" . 'alert("' . JText::_('COM_ALLEVENTS_MAIL_PLEASE_FILL_IN_THE_MESSAGE', true) . '");' . "\n";
    $script .= "\t\t" . '} else {' . "\n";
    $script .= "\t\t\t" . 'Joomla.submitform(pressbutton);' . "\n";
    $script .= "\t\t" . '}' . "\n";
    $script .= "\t\t" . '}' . "\n";

    JHtml::_('behavior.core');
    JHtml::_('formbehavior.chosen', 'select');

    JFactory::getDocument()->addScriptDeclaration($script);
    ?>

    <form action="<?php echo JRoute::_('index.php?option=com_allevents&view=mail'); ?>" name="adminForm" method="post"
          id="adminForm">
        <div class="row-fluid">
            <div class="span9">
                <fieldset class="adminform">
                    <?php echo $this->form->renderField('subject'); ?>
                    <?php echo $this->form->renderField('message'); ?>
                </fieldset>
                <input type="hidden" name="task" value=""/>
                <?php echo JHtml::_('form.token'); ?>
            </div>
            <div class="span3">
                <fieldset class="form-inline">
                    <?php echo $this->form->renderField('event_id'); ?>
                    <div class="control-group checkbox">
                        <div
                            class="control-label"><?php echo $this->form->getInput('mode'); ?><?php echo $this->form->getLabel('mode'); ?></div>
                    </div>
                    <div class="control-group checkbox">
                        <div
                            class="control-label"><?php echo $this->form->getInput('bcc'); ?><?php echo $this->form->getLabel('bcc'); ?></div>
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
    <?php
} else {
    $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'warning');
    $app->redirect(htmlspecialchars_decode('index.php?option=com_allevents&view=main'));
}
