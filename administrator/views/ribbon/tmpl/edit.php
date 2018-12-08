<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @since     3.4.1
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
$document->addStyleSheet(JUri::root() . 'media/com_allevents/css/form.css');
?>
    <script type="text/javascript">
        js = jQuery.noConflict();
        js(document).ready(function () {

        });

        Joomla.submitbutton = function (task) {
            if (task == 'ribbon.cancel') {
                Joomla.submitform(task, document.getElementById('ribbon-form'));
            }
            else {

                if (task != 'ribbon.cancel' && document.formvalidator.isValid(document.id('ribbon-form'))) {

                    Joomla.submitform(task, document.getElementById('ribbon-form'));
                }
                else {
                    alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                }
            }
        }
    </script>

<?php if ((JFactory::getUser()->authorise('core.satellites', 'com_allevents')) && (!$this->item->adminlock)) { ?>
    <form
        action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id); ?>"
        method="post" enctype="multipart/form-data" name="adminForm" id="ribbon-form" class="form-validate">
        <div class="form-horizontal">
            <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', ['active' => 'general']); ?>
            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_ALLEVENTS_TITLE_RIBBON', true)); ?>
            <div class="row-fluid">
                <div class="span10 form-horizontal">
                    <fieldset class="adminform">
                        <input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>"/>
                        <?php echo $this->form->renderField('titre'); ?>
                        <?php echo $this->form->renderField('description'); ?>
                        <?php echo $this->form->renderField('couleur'); ?>
                        <input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>"/>
                        <input type="hidden" name="jform[published]" value="<?php echo $this->item->published; ?>"/>
                        <input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>"/>
                        <input type="hidden" name="jform[checked_out_time]"
                               value="<?php echo $this->item->checked_out_time; ?>"/>
                        <?php //echo $this->form->renderField('created_by');
                        ?>
                        <?php //echo $this->form->renderField('lastmod_by');
                        ?>
                    </fieldset>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>
            <?php echo JHtml::_('bootstrap.endTabSet'); ?>
            <input type="hidden" name="task" value=""/>
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
    <?php
} else {
    $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'warning');
    $app->redirect(htmlspecialchars_decode('index.php?option=com_allevents&view=main'));
}