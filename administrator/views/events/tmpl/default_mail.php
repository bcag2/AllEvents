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
$script = "\t" . 'Joomla.submitbutton = function(pressbutton) {' . "\n";
$script .= "\t\t" . 'var form = document.adminForm;' . "\n";
$script .= "\t\t" . 'if (pressbutton == \'mail.cancel\') {' . "\n";
$script .= "\t\t\t" . 'Joomla.submitform(pressbutton);' . "\n";
$script .= "\t\t\t" . 'return;' . "\n";
$script .= "\t\t" . '}' . "\n";
$script .= "\t\t" . 'if (pressbutton !== \'event.emailing\') {' . "\n";
$script .= "\t\t\t" . 'Joomla.submitform(pressbutton);' . "\n";
$script .= "\t\t\t" . 'return;' . "\n";
$script .= "\t\t" . '}' . "\n";
$script .= "\t\t" . '// do field validation' . "\n";
$script .= "\t\t" . 'if (form.batch_subject.value == ""){' . "\n";
$script .= "\t\t\t" . 'alert("' . JText::_('COM_ALLEVENTS_MAIL_PLEASE_FILL_IN_THE_SUBJECT', true) . '");' . "\n";
$script .= "\t\t" . '} else if (form.batch_message.value == ""){' . "\n";
$script .= "\t\t\t" . 'alert("' . JText::_('COM_ALLEVENTS_MAIL_PLEASE_FILL_IN_THE_MESSAGE', true) . '");' . "\n";
$script .= "\t\t" . '} else {' . "\n";
$script .= "\t\t\t" . 'Joomla.submitform(pressbutton);' . "\n";
$script .= "\t\t" . '}' . "\n";
$script .= "\t\t" . '}' . "\n";

JHtml::_('behavior.core');
JHtml::_('formbehavior.chosen', 'select');

JFactory::getDocument()->addScriptDeclaration($script);
?>

<div class="modal hide fade" id="collapseModalMail">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&#215;</button>
        <h3><?php echo JText::_('COM_ALLEVENTS_MAILS_OPTIONS'); ?></h3>
    </div>
    <div class="modal-body modal-mail row-fluid">
        <div class="span9">
            <fieldset class="adminform">
                <div class="control-group">
                    <div class="control-label">
                        <label title=""
                               class="hasTooltip"><?php echo JText::_('COM_ALLEVENTS_MAIL_FIELD_SUBJECT_LABEL'); ?></label>
                    </div>
                    <div class="controls">
                        <input title="" type="text" maxlength="150" size="30" class="span8" value="" id="batch_subject"
                               name="batch[subject]"/>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-label">
                        <label title=""
                               class="hasTooltip"><?php echo JText::_('COM_ALLEVENTS_MAIL_FIELD_MESSAGE_LABEL'); ?></label>
                    </div>
                    <div class="controls">
                        <textarea class="span11 vert" rows="15" cols="70" id="batch_message"
                                  name="batch[message]"></textarea>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="span3">
            <fieldset class="form-inline">
                <div class="control-group checkbox">
                    <div class="control-label"><input title="" type="checkbox" value="1" id="batch_mode"
                                                      name="batch[mode]"/>
                        <label title=""
                               class="hasTooltip"><?php echo JText::_('COM_ALLEVENTS_MAIL_FIELD_SEND_IN_HTML_MODE_LABEL'); ?></label>
                    </div>
                </div>
                <div class="control-group checkbox">
                    <div class="control-label"><input title="" type="checkbox" checked="" value="1" id="batch_bcc"
                                                      name="batch[bcc]"/>
                        <label title=""
                               class="hasTooltip"><?php echo JText::_('COM_ALLEVENTS_MAIL_FIELD_SEND_AS_BLIND_CARBON_COPY_LABEL'); ?></label>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" type="button" onclick="document.getElementById('batch-category-id').value='';"
                data-dismiss="modal">
            <?php echo JText::_('JCANCEL'); ?>
        </button>
        <button class="btn btn-primary" type="submit" onclick="Joomla.submitbutton('events.emailing');">
            <?php echo JText::_('COM_ALLEVENTS_TOOLBAR_MAIL_SEND_MAIL'); ?>
        </button>
    </div>
</div>