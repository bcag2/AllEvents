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

            js("#jform_iconmap").change(function () {
                console.log('http://maps.google.com/mapfiles/ms/micons/' + js('#jform_iconmap').val() + '.png');
                js("#iconmap_id").attr('src', 'http://maps.google.com/mapfiles/ms/micons/' + js('#jform_iconmap').val() + '.png');
            });

        });

        Joomla.submitbutton = function (task) {
            if (task == 'agenda.cancel') {
                Joomla.submitform(task, document.getElementById('agenda-form'));
            }
            else {

                if (task != 'agenda.cancel' && document.formvalidator.isValid(document.id('agenda-form'))) {

                    Joomla.submitform(task, document.getElementById('agenda-form'));
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

    $AgendaTag = 'agenda';
    $AgendaTitle = JText::_('AGENDA', true);
    $DescTag = 'desc';
    $DescTitle = JText::_('COM_ALLEVENTS_DESC', true);
    $ModelTag = 'model';
    $ModelTitle = JText::_('COM_ALLEVENTS_MODELE', true);
    $ContactsTag = 'contacts';
    $ContactsTitle = JText::_('COM_ALLEVENTS_CONTACTS_PARAMS', true);
    $SystemInfoTag = 'publishing';
    $SystemInfoTitle = JText::_('JGLOBAL_FIELDSET_PUBLISHING', true);

    JHtml::_('formbehavior.chosen', 'select');
    jimport('joomla.html.html.bootstrap');

    $aePanAgenda = 'aeTab';
    $aePanDesc = 'aeTab';
    $aePanModel = 'aeTab';
    $aePanContacts = 'aeTab';
    $aePanSystemInfo = 'aeTab';
    $aemapDisplay = '1';
    $startPane = 'bootstrap.startTabSet';
    $addPanel = 'bootstrap.addTab';
    $endPanel = 'bootstrap.endTab';
    $endPane = 'bootstrap.endTabSet';
    $AgendaTag1 = $AgendaTag;
    $AgendaTag2 = $AgendaTitle;
    $DescTag1 = $DescTag;
    $DescTag2 = $DescTitle;
    $ModelTag1 = $ModelTag;
    $ModelTag2 = $ModelTitle;
    $ContactsTag1 = $ContactsTag;
    $ContactsTag2 = $ContactsTitle;
    $SystemInfoTag1 = $SystemInfoTag;
    $SystemInfoTag2 = $SystemInfoTitle;
    ?>

    <form
        action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id, false); ?>"
        method="post" enctype="multipart/form-data" name="adminForm" id="agenda-form" class="form-validate">
        <div class="span12">
            <div class="form-inline form-inline-header">
                <?php echo $this->form->renderField('titre'); ?>
                <?php echo $this->form->renderField('alias'); ?>
            </div>
            <!-- Begin Content -->
            <div>
                <div class="row-fluid span10 form-horizontal">

                    <!-- Open Panel Set -->
                    <?php echo JHtml::_($startPane, 'aeTab', ['active' => 'agenda']); ?>

                    <!-- Panel Event -->
                    <?php echo JHtml::_($addPanel, $aePanAgenda, $AgendaTag1, $AgendaTag2); ?>

                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('couleur'); ?>
                                <?php echo $this->form->renderField('couleur_texte'); ?>
                                <?php echo $this->form->renderField('contact_id'); ?>
                                <?php echo $this->form->renderField('max_hits'); ?>
                            </div>
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('vignette'); ?>
                                <?php
                                if ($this->item->image_bullet == "") {
                                    $this->item->image_bullet = "/images/com_allevents/bullets/agenda.png";
                                }
                                ?>
                                <?php echo $this->form->renderField('image_bullet'); ?>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('iconmap'); ?></div>

                                    <div class="controls"><?php echo $this->form->getInput('iconmap'); ?><img
                                            style="margin-left:180px;" id="iconmap_id"
                                            alt="<?php echo $this->item->iconmap; ?>"
                                            src="<?php echo 'http://maps.google.com/mapfiles/ms/micons/' . $this->item->iconmap . '.png'; ?>"/>
                                    </div>
                                </div>
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

                    <!-- Panel Model -->
                    <?php echo JHtml::_($addPanel, $aePanModel, $ModelTag1, $ModelTag2); ?>

                    <div class="aepanel aeleft">
                        <h5><?php echo JText::_('COM_ALLEVENTS_AGENDA_MODELE_INFO'); ?></h5>
                        <hr>
                        <div class="row-fluid">
                            <div class="span10 aeleft">
                                <?php echo $this->form->getInput('modele'); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo JHtml::_($endPanel); ?>

                    <!-- Panel Contacts -->
                    <?php if ($params["controlpanel_showjusers"] == 1 || $params["controlpanel_showjcontacts"] == 1 || $params["controlpanel_showcbusers"] == 1) {
                        echo JHtml::_($addPanel, $aePanContacts, $ContactsTag1, $ContactsTag2); ?>

                        <div class="aepanel aeleft">
                            <h4><?php echo JText::_('COM_ALLEVENTS_AGENDA_CONTACTS_INFO'); ?></h4>
                            <hr>
                            <div class="span6 aeleft">
                                <?php
                                $fields_names = ['contact_libre_label', 'contact_libre_default_access',
                                    'contact_1_label', 'contact_1_default_type', 'contact_1_default_label', 'contact_1_default_access',
                                    'contact_2_label', 'contact_2_default_type', 'contact_2_default_label', 'contact_2_default_access',
                                    'contact_3_label', 'contact_3_default_type', 'contact_3_default_label', 'contact_3_default_access'];
                                foreach ($fields_names as $field_name) {
                                    $standard_field = new AEStandardField($this->form, $field_name);
                                    echo $standard_field->getHtml();
                                }
                                ?>
                            </div>
                        </div>

                        <?php echo JHtml::_($endPanel);
                    } ?>

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
                    <?php echo $this->form->renderField('published'); ?>
                    <?php echo $this->form->renderField('default'); ?>
                    <?php echo $this->form->renderField('defaultstate'); ?>
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