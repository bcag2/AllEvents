<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
// TODO: ajout un contrôle sur l'extension du fichier annexe
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
JHtml::_('jquery.framework');
JHtml::_('script', 'jui/cms.js', false, true);

require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/html/aestandardfield.php';

$user = JFactory::getUser();
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
// $document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/jquery.timepicker.css');
//$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css');
//$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css');

// $document->addScript(JUri::root(true) . '/media/com_allevents/js/jquery.timepicker.js');
//$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js');
// $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.js');
// $document->addScript(JUri::root(true) . '/media/com_allevents/js/pikaday.jquery.js');
// $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/datepair.js/0.4.15/datepair.min.js');
// $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/datepair.js/0.4.15/jquery.datepair.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js');
// €#€
if ((int)$this->item->id == 0) {
    $document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/rrule.js');
    // $document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/nlp.js');
    $document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/aerecc.js');

    $document->addStyleDeclaration('#jform_scheduling_weekly_days,#jform_scheduling_monthly_days,#jform_scheduling_monthly_week, #jform_scheduling_monthly_week_days {max-width:330px}');
    $document->addStyleDeclaration('#jform_scheduling_monthly_days li,#jform_scheduling_monthly_week li{float:left; margin-right:10px; list-style-type:none}');
    $document->addStyleDeclaration('#jform_scheduling_monthly_week_days li{float:left; margin-right:10px; list-style-type:none} #jform_scheduling_monthly_week_days label, #jform_scheduling_monthly_week_days input{float:left; margin-right:10px}');
    $document->addStyleDeclaration('#jform_scheduling_weekly_days li{float:left; margin-right:10px; list-style-type:none}#jform_scheduling_weekly_days label, #jform_scheduling_weekly_days input{float:left; margin-right:10px}');
}
if (!class_exists('AllEventsCustomfields'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aecustomfields.php';
$langs = JLanguageMultilang::isEnabled() ? AllEventsHelper::getInstalledLanguages() : [];
$lang = JFactory::getLanguage();
$curlang = $lang->getTag();
// €#€

// global vars
$arrsatellites = [];
if ($this->params['controlpanel_showagendas']) $arrsatellites[] = 'agenda';
if ($this->params['controlpanel_showactivities']) $arrsatellites[] = 'activity';
if ($this->params['controlpanel_showpublics']) $arrsatellites[] = 'public';
if ($this->params['controlpanel_showplaces']) $arrsatellites[] = 'place';
if ($this->params['controlpanel_showressources']) $arrsatellites[] = 'ressource';
if ($this->params['controlpanel_showsections']) $arrsatellites[] = 'section';
if ($this->params['controlpanel_showcategories']) $arrsatellites[] = 'category';
?>
<style>
    .controls.input-append {
        display: flex;
    }
</style>

<script type="text/javascript">
    AEtimeFormat = '<?php echo $this->params['gtime_formatmoment']; ?>';
    // AEdateFormat = '<?php echo $this->params['gdate_formatmoment']; ?>';
    AEdateFormat = 'YYYY-MM-DD';
    AEtimezone = '<?php $config = JFactory::getConfig();
        $offset = $config->get('offset');
        $dateTimeZone = new DateTimeZone($offset);
        $dateTime = new DateTime("now", $dateTimeZone);
        $timeOffset = round($dateTimeZone->getOffset($dateTime) / 60);
        echo $timeOffset;?>';

    <?php if ($this->params['controlpanel_showagendas']) : ?>
    function modified_agenda_id() {
        var selectedValue = jQuery("#jform_agenda_id").val();
        if (selectedValue == 0) {
            jQuery("#jform_contact_libre_access").val(1).trigger("liszt:updated");
            jQuery("#jform_contact_1_type").val(0).trigger("liszt:updated").trigger("change");
            jQuery("#jform_contact_1_access").val(1).trigger("liszt:updated");
            jQuery("#jform_contact_1_label").val("").trigger("change");
            jQuery("#jform_contact_2_type").val(0).trigger("liszt:updated").trigger("change");
            jQuery("#jform_contact_2_access").val(1).trigger("liszt:updated");
            jQuery("#jform_contact_2_label").val("").trigger("change");
            jQuery("#jform_contact_3_type").val(0).trigger("liszt:updated").trigger("change");
            jQuery("#jform_contact_3_access").val(1).trigger("liszt:updated");
            jQuery("#jform_contact_3_label").val("").trigger("change");
        } else {
            jQuery.ajax({
                type: "POST",
                url: "index.php?option=com_allevents&task=agenda.GetAgendaContactsParams",
                data: {
                    "ajax": 1,
                    "agenda_id": selectedValue
                },
                success: function (result) {
                    var json = jQuery.parseJSON(result);
                    jQuery("#jform_contact_libre_access").val(json.data.contact_libre_default_access).trigger("liszt:updated");
                    jQuery("#jform_contact_1_type").val(json.data.contact_1_default_type).trigger("liszt:updated").trigger("change");
                    jQuery("#jform_contact_1_access").val(json.data.contact_1_default_access).trigger("liszt:updated");
                    jQuery("#jform_contact_1_label").val(json.data.contact_1_default_label).trigger("change");
                    jQuery("#jform_contact_2_type").val(json.data.contact_2_default_type).trigger("liszt:updated").trigger("change");
                    jQuery("#jform_contact_2_access").val(json.data.contact_2_default_access).trigger("liszt:updated");
                    jQuery("#jform_contact_2_label").val(json.data.contact_2_default_label).trigger("change");
                    jQuery("#jform_contact_3_type").val(json.data.contact_3_default_type).trigger("liszt:updated").trigger("change");
                    jQuery("#jform_contact_3_access").val(json.data.contact_3_default_access).trigger("liszt:updated");
                    jQuery("#jform_contact_3_label").val(json.data.contact_3_default_label).trigger("change");
                }
            })
        }
    }
    <?php endif; ?>

    (function ($) {
        $(document).ready(function () {
            <?php
            foreach ($arrsatellites as $value) {
                echo ""
                    . "$('input:hidden." . $value . "_id').each(function(){"
                    . "    var name = $(this).attr('name');"
                    . "    if(name.indexOf('" . $value . "_idhidden')){"
                    . "        $('#jform_" . $value . "_id option[value=\"'+$(this).val()+'\"]').attr('selected',true);"
                    . "    }"
                    . "});"
                    . ""
                    . "$('#jform_" . $value . "_id').trigger('liszt:updated').click ();"
                    . ""
                    . "$('#" . $value . "-save-button').click(function(){"
                    . "    var data = {jform:{"
                    . "            titre: $('#" . $value . "_titre').val(),"
                    . "            couleur: $('#" . $value . "_couleur').val(),"
                    . "            couleur_texte: $('#" . $value . "_couleur_texte').val()}};"
                    . "    data[$('#" . $value . "_token').val()] = '1';"
                    . "    data['ajax'] = '1';"
                    . "    data['id'] = 0;"
                    . "    $.ajax({"
                    . "        type: 'POST',"
                    . "        url: 'index.php?option=com_allevents&task=" . $value . ".save',"
                    . "        data: data,"
                    . "        success: function (data) {"
                    . "            var json = $.parseJSON(data);"
                    . "            if(json.data.id != null && json.data.display != null) {"
                    . "                $('#jform_" . $value . "_id').append('<option value=\"'+json.data.id+'\" selected=\"selected\">'+json.data.display+'</option>');"
                    . "                $('#jform_" . $value . "_id').trigger(\"liszt:updated\");"
                    . "            }"
                    . "            Joomla.renderMessages(json.messages);"
                    . "            $('#" . $value . "-form').fadeToggle();"
                    . "        }"
                    . "    });"
                    . "});"
                    . ""
                    . "$('#" . $value . "-cancel-button, #" . $value . "-activator').click(function(){"
                    . "    $('#" . $value . "-form').fadeToggle();"
                    . "});"
                    . ""
                    . "$('#" . $value . "-form').hide();";
            }
            ?>

            $('#event-get-model').click(function () {
                var data = {jform: {}};
                data[$('#agenda_token').val()] = '1';
                data['ajax'] = '1';
                $("#jform_agenda_id").find("option:selected").each(function () {
                    data['id'] = $(this).val();
                });

                $.ajax({
                    type: 'POST',
                    url: 'index.php?option=com_allevents&task=agenda.getModele',
                    data: data,
                    success: function (data) {
                        var json = $.parseJSON(data);
                        if (json.data.id != null && json.data.modele != null) {
                            jInsertEditorText(json.data.modele, 'jform_description');
                        }
                        Joomla.renderMessages(json.messages);
                    }
                });
            });

            $('#jform_enrolment_enabled1').click(function () {
                $('.block_enrolment').hide();
            });

            $('#jform_enrolment_enabled0').click(function () {
                $('.block_enrolment').show();
            });

            <?php if  ($this->item->enrolment_enabled == 0) : ?>
            $('#jform_enrolment_enabled0').trigger("click");
            $('#jform_enrolment_enabled1').trigger("click");
            <?php endif ; ?>

            <?php if ($this->params['controlpanel_showagendas']) : ?>
            $("#jform_agenda_id").chosen().change(function (event) {
                modified_agenda_id();
            });
            <?php endif; ?>

        });
    })(jQuery);

    Joomla.submitbutton = function (task) {
        if (task == 'event.cancel') {
            Joomla.submitform(task, document.getElementById('event-form'));
        }
        else {
            if (task != 'event.cancel' && document.formvalidator.isValid(document.id('event-form'))) {
                Joomla.submitform(task, document.getElementById('event-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<?php
if (JFactory::getUser()->authorise('core.manage', 'com_allevents')) {
    $document = JFactory::getDocument();

    JHtml::_('formbehavior.chosen', 'select');
    jimport('joomla.html.html.bootstrap');
    ?>

    <form
            action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id, false); ?>"
            method="post" enctype="multipart/form-data" name="adminForm" id="event-form" class="form-validate">
        <div class="span12">
            <div class="form-inline form-inline-header">
                <?php echo $this->form->renderField('titre'); ?>
                <?php echo $this->form->renderField('alias'); ?>
            </div>

            <div id="dtBox"></div>
            <!-- Begin Content -->
            <div class="row-fluid">
                <div class="span10 form-horizontal">

                    <!-- Open Panel Set -->
                    <?php echo JHtml::_('bootstrap.startTabSet', 'aeTab', ['active' => 'event']); ?>

                    <!-- Panel Event -->
                    <?php
                    echo JHtml::_('bootstrap.addTab', 'aeTab', 'event', JText::_('EVENT', true));
                    echo $this->loadTemplate('event');
                    echo JHtml::_('bootstrap.endTab');
                    ?>

                    <!-- Panel Reccurence -->
                    <?php
                    // ##€
                    if ((int)$this->item->id == 0) {
                        echo JHtml::_('bootstrap.addTab', 'aeTab', 'recc', JText::_('COM_ALLEVENTS_LEGEND_RECCUR', true));
                        echo $this->loadTemplate('recc');
                        echo JHtml::_('bootstrap.endTab');
                    }
                    // €##
                    ?>

                    <!-- Panel Description -->
                    <?php if ($this->params['geventshow_description']) : ?>
                        <?php echo JHtml::_('bootstrap.addTab', 'aeTab', 'desc', JText::_('COM_ALLEVENTS_DESC', true)); ?>
                        <div class="aepanel aeleft">
                            <a id="event-get-model" href="#"
                               class="btn btn-primary btn-default"><?php echo JText::_('COM_ALLEVENTS_USE_AGENDA_MODEL'); ?></a>
                            <br/><br/>
                            <div class="row-fluid">
                                <div class="span9 aeleft">
                                    <?php echo $this->form->getInput('description'); ?>
                                </div>
                            </div>
                        </div>
                        <?php echo JHtml::_('bootstrap.endTab'); ?>
                    <?php endif; ?>

                    <!-- Panel Additionnal Information -->
                    <?php if ($this->params['geventshow_additional_info']) : ?>
                        <?php echo JHtml::_('bootstrap.addTab', 'aeTab', 'addi', JText::_('COM_ALLEVENTS_ADDITIONAL_INFO', true)); ?>
                        <div class="aepanel aeleft">
                            <div class="row-fluid">
                                <div class="span9 aeleft">
                                    <?php echo $this->form->getInput('additional_info'); ?>
                                </div>
                            </div>
                        </div>
                        <?php echo JHtml::_('bootstrap.endTab'); ?>
                    <?php endif; ?>

                    <!-- Panel Enrolments-->
                    <?php
                    echo JHtml::_('bootstrap.addTab', 'aeTab', 'enrol', JText::_('COM_ALLEVENTS_LEGEND_ENROLMENT', true));
                    echo $this->loadTemplate('enrolments');
                    echo JHtml::_('bootstrap.endTab');
                    ?>

                    <!-- Panel Contacts parameters -->
                    <?php
                    if ($this->params["controlpanel_showjusers"] || $this->params["controlpanel_showjcontacts"] || $this->params["controlpanel_showcbusers"]) {
                        echo JHtml::_('bootstrap.addTab', 'aeTab', 'contactsparam', JText::_('COM_ALLEVENTS_CONTACTS_PARAMS', true));
                        echo $this->loadTemplate('contactsparam');
                        echo JHtml::_('bootstrap.endTab');
                    }
                    ?>

                    <!-- Panel Contacts -->
                    <?php if ($this->params["controlpanel_showjusers"] || $this->params["controlpanel_showjcontacts"] || $this->params["controlpanel_showcbusers"]) {
                        echo JHtml::_('bootstrap.addTab', 'aeTab', 'contacts', JText::_('COM_ALLEVENTS_CONTACTS', true));
                        echo $this->loadTemplate('contacts');
                        echo JHtml::_('bootstrap.endTab');
                    } ?>

                    <!-- Panel Planification -->
                    <?php
                    if ($this->params["controlpanel_showplanifications"]) {
                        echo JHtml::_('bootstrap.addTab', 'aeTab', 'planif', JText::_('COM_ALLEVENTS_PLANIFICATION', true));
                        echo $this->loadTemplate('planification');
                        echo JHtml::_('bootstrap.endTab');
                    }
                    ?>

                    <!-- Panel System information -->
                    <?php
                    echo JHtml::_('bootstrap.addTab', 'aeTab', 'publishing', JText::_('JGLOBAL_FIELDSET_PUBLISHING', true));
                    echo $this->loadTemplate('publishing');
                    echo JHtml::_('bootstrap.endTab');
                    ?>
                    <!-- Panel Refer -->

                    <?php echo JHtml::_('bootstrap.addTab', 'aeTab', 'refer', JText::_('COM_ALLEVENTS_LEGEND_REFER', true)); ?>
                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span6 aeleft">
                                <?php echo $this->form->renderField('metadesc'); ?>
                                <?php echo $this->form->renderField('metakey'); ?>
                                <?php echo $this->form->renderField('metarobots'); ?>
                                <?php echo $this->form->renderField('canonical'); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo JHtml::_('bootstrap.endTab'); ?>

                    <!-- Dynamically load any additional fields from plugins. -->
                    <?php foreach ($this->form->getFieldsets() as $fieldset): ?>
                        <?php if (($fieldset->name != 'event') && ($fieldset->name != 'accesscontrol') && ($fieldset->name != 'basic') && ($fieldset->name != 'planification')): ?>
                            <?php $fields = $this->form->getFieldset($fieldset->name); ?>
                            <?php echo JHtml::_('bootstrap.addTab', 'aeTab', $fieldset->name, $fieldset->name); ?>
                            <div class="aepanel aeleft">
                                <div class="row-fluid">
                                    <div class="span6 aeleft">
                                        <?php foreach ($fields as $field): ?>
                                            <?php if ($field->hidden): ?>
                                                <?php echo $field->input; ?>
                                            <?php else: ?>
                                                <dl>
                                                    <dt>
                                                        <?php echo $field->label; ?>
                                                        <?php if (!$field->required && (!$field->type == "spacer")): ?>
                                                            <span
                                                                    class="optional"><?php echo JText::_('COM_ALLEVENTS_OPTIONAL'); ?></span>
                                                        <?php endif; ?>
                                                    </dt>
                                                    <dd><?php echo $field->input; ?></dd>
                                                </dl>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php echo JHtml::_('bootstrap.endTab'); ?>
                        <?php endif ?>
                    <?php endforeach; ?>
                    <?php echo JHtml::_('bootstrap.endTabSet', 'aeTab'); ?>
                </div>

                <!-- Begin Right Sidebar -->
                <div class="span2 aeleft">
                    <h4><?php echo JText::_('COM_ALLEVENTS_DETAILS'); ?></h4>
                    <hr>
                    <div class="control-group">
                        <?php echo $this->statenrolmentshtml; ?>
                    </div>
                    <?php echo $this->form->renderField('proposal'); ?>
                    <?php echo $this->form->renderField('cancelled'); ?>
                    <?php echo $this->form->renderField('published'); ?>
                    <?php echo $this->form->renderField('hot'); ?>
                    <?php echo $this->form->renderField('access'); ?>
                    <?php echo $this->form->renderField('weight'); ?>
                    <?php if (JLanguageMultilang::isEnabled()) {
                        echo $this->form->renderField('language');
                    } ?>
                    <?php echo $this->form->renderField('ribbon_id'); ?>
                    <?php echo $this->form->renderField('use_menuitem'); ?>
                    <?php echo $this->form->renderField('menuitem'); ?>
                </div>
                <!-- End Right Sidebar -->
            </div>
            <div class="clr"></div>
        </div>

        <input type="hidden" name="task" value=""/>
        <?php echo JHtml::_('form.token'); ?>
        <?php echo JHtml::_('form.token'); ?>
        <div class="clr"></div>
        <?php echo $this->loadTemplate('mail'); ?>

    </form>

    <?php
} else {
    $app = JFactory::getApplication();
    $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'warning');
    $app->redirect(htmlspecialchars_decode('index.php?option=com_allevents&view=main'));
}
?>
<script>
    (function ($) {
        $(document).ready(function () {
            $('[href="#language"]').closest('li').remove();
            $('#language').remove();

            <!-- ### -->
            $('.money').maskMoney({
                prefix: '',
                suffix: '',
                allowZero: true,
                precision: 0,
                allowNegative: false,
                thousands: '',
                decimal: ',',
                affixesStay: false
            });
            <?php
            foreach ($langs as $lg) {
                if ($lg->lang_code == $curlang) {
                    echo "$('[href=\"#language" . $lg->postfix . "\"]').closest('li').hide();";

                    echo "if ($('#jform_titre" . $lg->postfix . "').val() != '') {";
                    echo "    $('#jform_titre').val($('#jform_titre" . $lg->postfix . "').val()) ;";
                    echo "} else {";
                    echo "    $('#jform_titre" . $lg->postfix . "').val($('#jform_titre').val()) ;";
                    echo "};";

                    echo "$('#jform_titre').change(function () {";
                    echo "    $('#jform_titre" . $lg->postfix . "').val($('#jform_titre').val()) ;";
                    echo '});';

                    $html = JText::_('EVENT', true) . "&nbsp;<img src='" . $lg->img_url . "'>";
                    echo "$('[href=\"#event\"]').html(\"" . $html . "\");";
                } else {
                    $html = $lg->title . "&nbsp;<img src='" . $lg->img_url . "'>";
                    echo "$('[href=\"#language" . $lg->postfix . "\"]').html(\"" . $html . "\");";
                }
            }
            ?>
            <!-- ### -->
        });
    })(jQuery);
</script>

