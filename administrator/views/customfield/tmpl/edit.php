<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

$app = JFactory::getApplication();
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');

// Access Administration Categories check.
if (JFactory::getUser()->authorise('core.admin', 'com_allevents')) {

    $PanelOne_Tag = 'customfield';
    $PanelOne_Title = JText::_('COM_ALLEVENTS_CUSTOMFIELD_PANEL_TITLE', true);
    $PublishingTag = 'publishing';
    $PublishingTitle = JText::_('JGLOBAL_FIELDSET_PUBLISHING', true);

    JHtml::_('formbehavior.chosen', 'select');
    jimport('joomla.html.html.bootstrap');

    $aePanFirst = 'aeTab';
    $aePanPublishing = 'aeTab';


    $aemapDisplay = '1';
    $startPane = 'bootstrap.startTabSet';
    $addPanel = 'bootstrap.addTab';
    $endPanel = 'bootstrap.endTab';
    $endPane = 'bootstrap.endTabSet';
    $PanelOne_Tag1 = $PanelOne_Tag;
    $PanelOne_Tag2 = $PanelOne_Title;
    $PublishingTag1 = $PublishingTag;
    $PublishingTag2 = $PublishingTitle;

    ?>

    <script type="text/javascript">
        Joomla.submitbutton = function (task) {
            if (task == 'customfield.cancel' || document.formvalidator.isValid(document.id('customfield-form'))) {
                Joomla.submitform(task, document.getElementById('customfield-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
            }
        }
    </script>

    <form action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id); ?>"
          method="post" name="adminForm" id="customfield-form" class="form-validate">
        <div class="span12">
            <div class="form-inline form-inline-header">
                <?php echo $this->form->renderField('titre'); ?>
                <?php echo $this->form->renderField('alias'); ?>
            </div>
            <!-- Begin Content -->
            <div class="row-fluid">
                <div class="span10 form-horizontal">

                    <!-- Open Panel Set -->
                    <?php echo JHtml::_($startPane, 'aeTab', ['active' => 'customfield']); ?>

                    <!-- Panel Event -->
                    <?php echo JHtml::_($addPanel, $aePanFirst, $PanelOne_Tag1, $PanelOne_Tag2); ?>

                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('slug'); ?>
                                <?php echo $this->form->renderField('parent_form'); ?>
                            </div>
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('type'); ?>
                                <?php echo $this->form->renderField('options'); ?>
                                <?php echo $this->form->renderField('required'); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo JHtml::_($endPanel); ?>

                    <?php echo JHtml::_($addPanel, $aePanPublishing, $PublishingTag1, $PublishingTag2); ?>
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
                    <?php echo $this->form->renderField('published'); ?>
                    <?php if (JLanguageMultilang::isEnabled()) {
                        echo $this->form->renderField('language');
                    } ?>
                    <hr/>
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