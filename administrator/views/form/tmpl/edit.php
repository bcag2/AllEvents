<?php
/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
JHtml::_('jquery.framework');
JHtml::_('script', 'jui/cms.js', false, true);

require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/html/aestandardfield.php';

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
?>
    <script type="text/javascript">
        js = jQuery.noConflict();
        js(document).ready(function () {

        });

        Joomla.submitbutton = function (task) {
            if (task == 'form.cancel') {
                Joomla.submitform(task, document.getElementById('form-form'));
            }
            else {
                if (task != 'form.cancel' && document.formvalidator.isValid(document.id('form-form'))) {

                    Joomla.submitform(task, document.getElementById('form-form'));
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
    $params = JComponentHelper::getParams('com_allevents');

    $document = JFactory::getDocument();

    $FormTag = 'form';
    $FormTitle = JText::_('FORM', true);
    $DescTag = 'desc';
    $DescTitle = JText::_('COM_ALLEVENTS_DESC', true);
    $FieldsTag = 'fields';
    $FieldsTitle = JText::_('COM_ALLEVENTS_FORM_FIELDS_LABEL', true);
    $SystemInfoTag = 'publishing';
    $SystemInfoTitle = JText::_('JGLOBAL_FIELDSET_PUBLISHING', true);

    JHtml::_('formbehavior.chosen', 'select');
    jimport('joomla.html.html.bootstrap');

    $aePanForm = 'aeTab';
    $aePanDesc = 'aeTab';
    $aePanFields = 'aeTab';
    $aePanSystemInfo = 'aeTab';


    $aemapDisplay = '1';
    $startPane = 'bootstrap.startTabSet';
    $addPanel = 'bootstrap.addTab';
    $endPanel = 'bootstrap.endTab';
    $endPane = 'bootstrap.endTabSet';
    $FormTag1 = $FormTag;
    $FormTag2 = $FormTitle;
    $DescTag1 = $DescTag;
    $DescTag2 = $DescTitle;
    $FieldsTag1 = $FieldsTag;
    $FieldsTag2 = $FieldsTitle;
    $SystemInfoTag1 = $SystemInfoTag;
    $SystemInfoTag2 = $SystemInfoTitle;

    ?>

    <form
        action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id, false); ?>"
        method="post" enctype="multipart/form-data" name="adminForm" id="form-form" class="form-validate">
        <div class="span12">
            <div class="form-inline form-inline-header">
                <?php echo $this->form->renderField('titre'); ?>
                <?php echo $this->form->renderField('alias'); ?>
            </div>
            <!-- Begin Content -->
            <div>
                <div class="row-fluid span10 form-horizontal">

                    <!-- Open Panel Set -->
                    <?php echo JHtml::_($startPane, 'aeTab', ['active' => 'form']); ?>

                    <!-- Panel Event -->
                    <?php echo JHtml::_($addPanel, $aePanForm, $FormTag1, $FormTag2); ?>

                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('template'); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo JHtml::_($endPanel); ?>

                    <!-- Panel Description -->
                    <?php echo JHtml::_($addPanel, $aePanDesc, $DescTag1, $DescTag2); ?>

                    <div class="aepanel aeleft">
                        <h5><?php echo JText::_('COM_ALLEVENTS_DESC'); ?></h5>
                        <hr>
                        <div class="row-fluid">
                            <div class="span10 aeleft">
                                <?php echo $this->form->getInput('description'); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo JHtml::_($endPanel); ?>

                    <!-- Panel Description -->
                    <?php echo JHtml::_($addPanel, $aePanFields, $FieldsTag1, $FieldsTag2); ?>

                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span10 aeleft">
                                <?php
                                $fields = $this->form->getFieldSet('field_config');
                                if ($fields) {
                                    foreach ($fields AS $field) {
                                        echo $field->input;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php echo JHtml::_($endPanel); ?>

                    <!-- Panel System -->
                    <?php echo JHtml::_($addPanel, $aePanSystemInfo, $SystemInfoTag1, $SystemInfoTag2); ?>
                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('created_date'); ?>
                                <?php echo $this->form->renderField('proposed_by'); ?>
                                <?php echo $this->form->renderField('lastmod'); ?>
                                <?php echo $this->form->renderField('lastmod_by'); ?>
                                <?php echo $this->form->renderField('version'); ?>
                                <?php echo $this->form->renderField('hits'); ?>
                                <?php echo $this->form->renderField('id'); ?>
                            </div>
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('metadesc'); ?>
                                <?php echo $this->form->renderField('metakey'); ?>
                                <?php echo $this->form->renderField('metarobots'); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo JHtml::_($endPanel); ?>

                    <?php echo JHtml::_($endPane, 'aeTab'); ?>
                </div>

                <!-- Begin Sidebar -->
                <div class="span2 aeleft">
                    <h4><?php echo JText::_('COM_ALLEVENTS_DETAILS'); ?></h4>
                    <hr>
                    <?php echo $this->form->renderField('access'); ?>
                    <?php echo $this->form->renderField('state'); ?>
                    <?php if (JLanguageMultilang::isEnabled()) {
                        echo $this->form->renderField('language');
                    } ?>
                    <?php echo $this->form->renderField('note'); ?>
                    <hr>
                </div>
                <!-- End Sidebar -->
            </div>
            <div class="clr"></div>
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