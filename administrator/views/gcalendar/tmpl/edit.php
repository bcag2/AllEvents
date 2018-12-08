<?php
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function () {

    });

    Joomla.submitbutton = function (task) {
        if (task == 'gcalendar.cancel') {
            Joomla.submitform(task, document.getElementById('gcalendar-form'));
        }
        else {

            if (task != 'gcalendar.cancel' && document.formvalidator.isValid(document.id('gcalendar-form'))) {

                Joomla.submitform(task, document.getElementById('gcalendar-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<?php
$app = JFactory::getApplication();

if (JFactory::getUser()->authorise('core.satellites', 'com_allevents')) {
    $document = JFactory::getDocument();

    $GcalendarTag = 'gcalendar';
    $GcalendarTitle = JText::_('COM_ALLEVENTS_TITLE_GCALENDAR', true);
    $SystemInfoTag = 'publishing';
    $SystemInfoTitle = JText::_('JGLOBAL_FIELDSET_PUBLISHING', true);

    JHtml::_('formbehavior.chosen', 'select');
    jimport('joomla.html.html.bootstrap');

    $aePanGcalendar = 'aeTab';
    $aePanSystemInfo = 'aeTab';


    $aemapDisplay = '1';
    $startPane = 'bootstrap.startTabSet';
    $addPanel = 'bootstrap.addTab';
    $endPanel = 'bootstrap.endTab';
    $endPane = 'bootstrap.endTabSet';
    $GcalendarTag1 = $GcalendarTag;
    $GcalendarTag2 = $GcalendarTitle;
    $SystemInfoTag1 = $SystemInfoTag;
    $SystemInfoTag2 = $SystemInfoTitle;

    ?>

    <form
        action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id, false); ?>"
        method="post" enctype="multipart/form-data" name="adminForm" id="gcalendar-form" class="form-validate">
        <div class="span12">
            <div class="form-inline form-inline-header">
                <?php echo $this->form->renderField('titre'); ?>
                <?php echo $this->form->renderField('alias'); ?>
            </div>
            <!-- Begin Content -->
            <div class="row-fluid">
                <div class="span10 form-horizontal">

                    <!-- Open Panel Set -->
                    <?php echo JHtml::_($startPane, 'aeTab', ['active' => 'gcalendar']); ?>

                    <!-- Panel Event -->
                    <?php echo JHtml::_($addPanel, $aePanGcalendar, $GcalendarTag1, $GcalendarTag2); ?>
                    <?php echo $this->form->renderField('id_gcalendar'); ?>
                    <?php echo $this->form->renderField('caltype'); ?>
                    <?php echo $this->form->renderField('couleur'); ?>
                    <?php echo $this->form->renderField('couleur_texte'); ?>
                    <?php echo $this->form->renderField('classe'); ?>
                    <hr/>

                    <?php echo JHtml::_($endPanel); ?>

                    <?php echo JHtml::_($addPanel, $aePanSystemInfo, $SystemInfoTag1, $SystemInfoTag2); ?>

                    <?php echo $this->form->renderField('created_date'); ?>
                    <?php echo $this->form->renderField('proposed_by'); ?>
                    <?php echo $this->form->renderField('lastmod'); ?>
                    <?php echo $this->form->renderField('lastmod_by'); ?>
                    <?php echo $this->form->renderField('id'); ?>

                    <hr/>
                    <?php echo JHtml::_($endPanel); ?>

                    <?php echo JHtml::_($endPane, 'aeTab'); ?>
                </div>

                <!-- Begin Sidebar -->
                <div class="span2 aeleft">
                    <h4><?php echo JText::_('COM_ALLEVENTS_DETAILS'); ?></h4>
                    <hr>
                    <?php echo $this->form->renderField('access'); ?>
                    <?php echo $this->form->renderField('published'); ?>
                    <?php if (JLanguageMultilang::isEnabled()) {
                        echo $this->form->renderField('language');
                    } ?>
                    <hr>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
        <input type="hidden" name="task" value=""/>
        <?php echo JHtml::_('form.token'); ?>
        <div class="clr"></div>
    </form>

    <?php
} else {
    $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'warning');
    $app->redirect(htmlspecialchars_decode('index.php?option=com_allevents&view=main'));
}
?>
