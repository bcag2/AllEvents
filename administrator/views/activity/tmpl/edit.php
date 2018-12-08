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
?>
    <script type="text/javascript">
        js = jQuery.noConflict();

        Joomla.submitbutton = function (task) {
            if (task == 'activity.cancel') {
                Joomla.submitform(task, document.getElementById('activity-form'));
            } else {
                if (task != 'activity.cancel' && document.formvalidator.isValid(document.id('activity-form'))) {

                    Joomla.submitform(task, document.getElementById('activity-form'));
                } else {
                    alert('<?php echo $this->escape(JText::_(' JGLOBAL_VALIDATION_FORM_FAILED ')); ?>');
                }
            }
        }
    </script>

<?php
if (JFactory::getUser()->authorise('core.satellites', 'com_allevents')) {
    $document = JFactory::getDocument();

    $ActivityTag = 'activity';
    $ActivityTitle = JText::_('ACTIVITY', true);
    $DescTag = 'desc';
    $DescTitle = JText::_('COM_ALLEVENTS_DESC', true);
    $SystemInfoTag = 'publishing';
    $SystemInfoTitle = JText::_('JGLOBAL_FIELDSET_PUBLISHING', true);

    JHtml::_('formbehavior.chosen', 'select');
    jimport('joomla.html.html.bootstrap');

    $aePanActivity = 'aeTab';
    $aePanDesc = 'aeTab';
    $aePanSystemInfo = 'aeTab';
    $aemapDisplay = '1';
    $startPane = 'bootstrap.startTabSet';
    $addPanel = 'bootstrap.addTab';
    $endPanel = 'bootstrap.endTab';
    $endPane = 'bootstrap.endTabSet';
    $ActivityTag1 = $ActivityTag;
    $ActivityTag2 = $ActivityTitle;
    $DescTag1 = $DescTag;
    $DescTag2 = $DescTitle;
    $SystemInfoTag1 = $SystemInfoTag;
    $SystemInfoTag2 = $SystemInfoTitle;
    ?>

    <form
        action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id, false); ?>"
        method="post" enctype="multipart/form-data" name="adminForm" id="activity-form" class="form-validate">
        <div>
            <!-- Begin Content -->
            <div class="span12">
                <div class="form-inline form-inline-header">
                    <?php echo $this->form->renderField('titre'); ?>
                    <?php echo $this->form->renderField('alias'); ?>
                </div>

                <div class="span10 form-horizontal">
                    <!-- Open Panel Set -->
                    <?php echo JHtml::_($startPane, 'aeTab', ['active' => 'activity']); ?>

                    <!-- Panel Event -->
                    <?php echo JHtml::_($addPanel, $aePanActivity, $ActivityTag1, $ActivityTag2); ?>

                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('agenda_id'); ?>
                                <?php echo $this->form->renderField('couleur'); ?>
                                <?php echo $this->form->renderField('couleur_texte'); ?>
                            </div>
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('vignette'); ?>
                                <?php
                                if ($this->item->image_bullet == "") {
                                    $this->item->image_bullet = "/images/com_allevents/bullets/activity.png";
                                }
                                ?>
                                <?php echo $this->form->renderField('image_bullet'); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo JHtml::_($endPanel); ?>

                    <!-- Panel Description -->
                    <?php echo JHtml::_($addPanel, $aePanDesc, $DescTag1, $DescTag2); ?>

                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span10 aeleft">
                                <?php echo $this->form->getInput('description'); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo JHtml::_($endPanel); ?>

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
                    <?php echo $this->form->renderField('published'); ?>
                    <?php echo $this->form->renderField('default'); ?>
                    <?php if (JLanguageMultilang::isEnabled()) {
                        echo $this->form->renderField('language');
                    } ?>
                    <?php echo $this->form->renderField('note'); ?>
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