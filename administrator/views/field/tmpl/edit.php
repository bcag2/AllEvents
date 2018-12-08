<?php
/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */

// No direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function () {

    });

    Joomla.submitbutton = function (task) {
        if (task == 'field.cancel') {
            Joomla.submitform(task, document.getElementById('field-form'));
        }
        else {

            if (task != 'field.cancel' && document.formvalidator.isValid(document.id('field-form'))) {

                Joomla.submitform(task, document.getElementById('field-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form
    action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id); ?>"
    method="post" enctype="multipart/form-data" name="adminForm" id="field-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', ['active' => 'general']); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_ALLEVENTS_TITLE_FIELD', true)); ?>
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

                    <input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>"/>
                    <?php echo $this->form->renderField('titre'); ?>
                    <?php echo $this->form->renderField('alias'); ?>
                    <?php echo $this->form->renderField('description'); ?>
                    <?php echo $this->form->renderField('css_class'); ?>
                    <input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>"/>
                    <input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>"/>
                    <input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>"/>
                    <input type="hidden" name="jform[checked_out_time]"
                           value="<?php echo $this->item->checked_out_time; ?>"/>

                    <?php if (empty($this->item->created_by)) { ?>
                        <input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>"/>

                    <?php } else { ?>
                        <input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>"/>

                    <?php } ?>                <?php echo $this->form->renderField('created_date'); ?>

                    <?php if (empty($this->item->modified_by)) { ?>
                        <input type="hidden" name="jform[modified_by]" value="<?php echo JFactory::getUser()->id; ?>"/>

                    <?php } else { ?>
                        <input type="hidden" name="jform[modified_by]" value="<?php echo $this->item->modified_by; ?>"/>

                    <?php } ?>                <?php echo $this->form->renderField('modified_date'); ?>
                    <?php echo $this->form->renderField('access'); ?>
                    <?php echo $this->form->renderField('form_id'); ?>
                    <?php echo $this->form->renderField('formfieldset_id'); ?>
                    <?php echo $this->form->renderField('label'); ?>
                    <?php echo $this->form->renderField('required'); ?>
                    <?php echo $this->form->renderField('placeholder'); ?>
                    <?php echo $this->form->renderField('readonly'); ?>


                    <?php if ($this->state->params->get('save_history', 1)) : ?>
                        <?php echo $this->form->renderField('version_note'); ?>
                    <?php endif; ?>
                </fieldset>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>



        <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value=""/>
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>
