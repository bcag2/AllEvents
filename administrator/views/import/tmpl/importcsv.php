<?php
/**
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
?>

<script type="text/javascript">
    Joomla.submitbutton = function (task) {
        if (task == 'importevents.cancel' || document.formvalidator.isValid(document.id('importevents-form'))) {
            Joomla.submitform(task, document.getElementById('importevents-form'));
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&task=importevents.save'); ?>" method="post"
      name="adminForm" id="importevents-form" class="form-validate form-horizontal" enctype="multipart/form-data">
    <div class="span10 form-horizontal">
        <fieldset>
            <div class="tab-pane" id="otherparams">
                <?php foreach ($this->form->getFieldset('details') as $field) : ?>
                    <div class="control-group">
                        <div class="control-label" style="width:250px;">
                            <?php echo $field->label; ?>
                        </div>
                        <div class="controls">
                            <?php echo $field->input; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </fieldset>
        <input type="hidden" name="task" value=""/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
