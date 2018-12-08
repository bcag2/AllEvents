<?php

/**
 * @version   3.4.5.1 premium
 * @package   com_allevents
 * @copyright Copyright (C) 2009-2017. All rights reserved.
 * @license   GNU General Public License version 2 ou version superior; see LICENSE.txt
 * @author    elecoest (elecoest@gmail.com) - https://www.allevents3.com
 * @access    public
 */


defined('_JEXEC') or die;


if (!class_exists('AllEventsHelperOverride'))

    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

if (!class_exists('AllEventsHelperEventDisplay'))

    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';


require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/html/aestandardfield.php';


jimport('joomla.user.helper');

$user = JFactory::getUser();

$userProfile = JUserHelper::getProfile($user->id);

if (empty($userProfile->profile['address1'])) {

    $userProfile->profile['address1'] = "";

}

if (empty($userProfile->profile['phone'])) {

    $userProfile->profile['phone'] = "";

}

if (empty($userProfile->profile['favoritebook'])) {

    $userProfile->profile['favoritebook'] = "";

}

AllEventsHelperOverride::jquery();

AllEventsHelperOverride::uikit();

$document = JFactory::getDocument();

$lang = substr($document->language, 0, 2);

$gmapkey = $this->params['gmapkey'];

// jquery-ui : obligatoire pour la fonction autocomplete

$document->addScript('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js');

$document->addScript('https://maps.googleapis.com/maps/api/js?language=' . $lang . '&key=' . $gmapkey);

$document->addScript(JUri::root(true) . '/media/com_allevents/js/jquery.ui.addresspicker.js');

$document->addScript(AllEventsHelperOverride::GetScript('jquery.timepicker.js'));

$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js');

$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.js');

$document->addScript(AllEventsHelperOverride::GetScript('pikaday.jquery.js'));

$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/datepair.js/0.4.15/datepair.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/datepair.js/0.4.15/jquery.datepair.min.js');


$document->addStyleSheet('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/cupertino/jquery-ui.css');

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));

AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.21.0/css/uikit.gradient.css');

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('jquery.timepicker.css'));

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('pikaday.css'));


$document->addStyleDeclaration("

#place-form > p {

    color: red;

}



.comment-text-area {

    width: 100% !important;

}

.uk-wizard {

    border: 1px solid rgba(0, 0, 0, 0.1);

    border-radius: 4px;

    margin-bottom: 20px;

    position: relative;

    background-color: #fff;

    padding: 0;

    list-style: none;

}

* + .uk-wizard {

    margin-top: 20px;

}

.uk-wizard .uk-step {

    padding: 10px 10px 10px 15px;

    position: relative;

}

.uk-wizard:not(.uk-wizard-vertical) .uk-step:not(:last-child):before,

.uk-wizard:not(.uk-wizard-vertical) .uk-step:not(:last-child):after {

    content: '';

    width: 0;

    height: 0;

    border-image: none;

    border-style: solid;

    position: absolute;

    right: 0;

    top: 50%;

    border-width: 20px 8px;

    margin-top: -20px;

    margin-right: -17px;

    z-index: 1;

}

.uk-wizard:not(.uk-wizard-vertical) .uk-step:not(:last-child):before {

    border-color: transparent transparent transparent rgba(0, 0, 0, 0.1);

}

.uk-wizard:not(.uk-wizard-vertical) .uk-step:not(:last-child):after {

    border-color: transparent transparent transparent rgba(255, 255, 255, 1);

    right: 1px;

}

.uk-wizard.uk-wizard-hover .uk-step:not(.uk-active):hover {

    background-color: #fafafa;

}

.uk-wizard.uk-wizard-hover .uk-step:not(.uk-active):hover:after {

    border-left-color: #fafafa;

}

.uk-wizard:not(.uk-wizard-vertical) .uk-step + .uk-step {

    border-left: 1px solid rgba(0, 0, 0, 0.1);

}

.uk-wizard.uk-wizard-vertical .uk-step + .uk-step {

    border-top: 1px solid rgba(0, 0, 0, 0.1);

}

.uk-wizard .uk-step.uk-active {

    background-color: #f1f1f1;

}

.uk-wizard .uk-step.uk-active:after {

    border-left-color: #f1f1f1 !important;

}

.uk-wizard .uk-complete .uk-wizard-icon:before {

    font-family: 'FontAwesome' !important;

    font-size: 30px !important;

    content: '\f00c' !important;

    color: #21ba45;

}

.uk-wizard .uk-complete .uk-wizard-icon > * { display: none; }

.uk-wizard .uk-step-content {}

.uk-wizard .uk-wizard-title {

    font-family: 'RobotoSlab-Regular', Arial, sans-serif;

    font-size: 16px;

}

.uk-wizard .uk-active .uk-wizard-title {

    color: #0077dd;

}

.uk-wizard .uk-wizard-desc {

    font-size: 13px;

    color: #aaa;

}

.uk-wizard .uk-active .uk-wizard-desc {

    color: #555;

}

.uk-wizard .uk-wizard-icon {

    float: left;

    font-size: 30px;

    line-height: 38px;

    margin-right: 10px;

    position: relative;

    text-align: center;

    min-width: 30px;

}

.uk-wizard .uk-step > a:hover { text-decoration: none; }

");


// on met à la fin les scripts génériques

JHtml::_('behavior.tooltip');

JHtml::_('behavior.formvalidation');

JHtml::_('behavior.keepalive');

JHtml::_('formbehavior.chosen', 'select');


$app = JFactory::getApplication();

$params = AllEventsHelperParam::getGlobalParam();

$Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);

// Load admin language file

$lang = JFactory::getLanguage();

$lang->load('com_allevents', JPATH_ADMINISTRATOR);

// global vars

$arrsatellites = ['activity', 'agenda', 'category', 'place', 'public', 'ressource', 'section'];


// make sure user is logged in

if ($user->get('id') == 0) {

    JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_ERROR_MUST_LOGIN'), 'warning');

    $joomlaLoginUrl = 'index.php?option=com_users&view=login';

    echo "<br><a href='" . JRoute::_($joomlaLoginUrl) . "'>" . JText::_('COM_ALLEVENTS_LOG_IN') . "</a><br>";

}


$Form = JForm::getInstance('com_allevents.place_sdn', 'place_sdn', ['control' => 'place']);

// $Form->setFieldAttribute('titre', 'required', true);

// $Form->setFieldAttribute('email', 'required', true);

$place_formAE = '<div id="place-form" class="uk-form">';

$place_formAE .= "<p>Merci de bien vérifier que le lieu de votre événement n'existe pas déjà dans la liste. Toute proposition contenant un doublon sera automatiquement supprimé</p>";

$place_formAE .= '    <input type="hidden" id="place_token" value="' . JSession::getFormToken() . '" />';

$place_formAE .= '<div class="uk-grid">';

$place_formAE .= '    <div class="uk-width-1-2">';

$place_formAE .= $Form->renderField('titre');

$place_formAE .= $Form->renderField('address');

$place_formAE .= $Form->renderField('email');

$place_formAE .= $Form->renderField('numero');

$place_formAE .= $Form->renderField('rue');

$place_formAE .= $Form->renderField('ville');

$place_formAE .= $Form->renderField('codepostal');

$place_formAE .= $Form->renderField('country');

$place_formAE .= $Form->renderField('latitude');

$place_formAE .= $Form->renderField('longitude');

$place_formAE .= $Form->renderField('zoom');

$place_formAE .= '    </div>';

$place_formAE .= '    <div class="uk-width-1-2">';

$place_formAE .= $Form->renderField('phone');

$place_formAE .= $Form->renderField('fax');

$place_formAE .= $Form->renderField('website');

$place_formAE .= '    </div>';

$place_formAE .= '</div>';

$place_formAE .= '    <div class="btn-toolbar">';

$place_formAE .= '        <div class="btn-group">';

$place_formAE .= '            <button type="button" class="btn btn-primary" id="place-save-button">';

$place_formAE .= '                <i class="icon-ok"></i>' . JText::_('JSAVE');

$place_formAE .= '            </button>';

$place_formAE .= '        </div>';

$place_formAE .= '        <div class="btn-group">';

$place_formAE .= '            <button type="button" class="btn" id="' . 'place' . '-cancel-button">';

$place_formAE .= '                <i class="icon-cancel"></i>' . JText::_('JCANCEL');

$place_formAE .= '            </button>';

$place_formAE .= '        </div>';

$place_formAE .= '    </div>';

$place_formAE .= '</div>';


?>

<script type="text/javascript">

    (function ($) {

        $(document).ready(function () {

            var addresspickerMap = $("#place_address").addresspicker({

                //regionBias: "fr",

                language: "<?php echo JFactory::getLanguage()->getTag();?>",

                elements: {

                    lat: '#place_latitude',

                    lng: '#place_longitude',

                    street_number: '#place_numero',

                    route: '#place_rue',

                    locality: '#place_ville',

                    country: '#place_country',

                    postal_code: '#place_codepostal'

                }

            });



            <?php

            foreach ($arrsatellites as $value) {

                echo "$('input:hidden." . $value . "_id').each(function(){" . chr(0x0D) . chr(0x0A)

                    . "    var name = $(this).attr('name');" . chr(0x0D) . chr(0x0A)

                    . "    if(name.indexOf('" . $value . "_idhidden')){" . chr(0x0D) . chr(0x0A)

                    . "        $('#jform_" . $value . "_id option[value=\"'+$(this).val()+'\"]').attr('selected',true);" . chr(0x0D) . chr(0x0A)

                    . "    }" . chr(0x0D) . chr(0x0A)

                    . "});" . chr(0x0D) . chr(0x0A)

                    . "$('#jform_" . $value . "_id').trigger('liszt:updated').click ().click ();" . chr(0x0D) . chr(0x0A);

            }

            ?>

            $("#jform_section_id").change(function () {

                var str = "";

                $("#jform_section_id").find("option:selected").each(function () {

                    str = $(this).val();

                });

                var data = {};

                data['ajax'] = '1';

                data['section_id'] = str;

                $('#jform_category_id_chzn , #jform_category_id-lbl').fadeToggle();


                $.ajax({

                    type: 'POST',

                    url: 'index.php?option=com_allevents&task=eventform.GetCategoriesFromSection',

                    data: data,

                    success: function (data) {

                        var json = $.parseJSON(data);

                        $('#jform_category_id').find('option:not(:first)').remove().end();

                        $.each(json.data, function (key, value) {

                            $('#jform_category_id').append('<option value=\"' + value.id + '\">' + value.display + '</option>');

                        });

                        $('#jform_category_id').trigger("liszt:updated");

                    }

                });


                $('#jform_category_id_chzn , #jform_category_id-lbl').fadeToggle();

            });


            $("#jform_titre").change(function () {

                $("#recap_titre").text($("#jform_titre").val());

            });


            $('*[rel=tooltip]').tooltip();


            // Turn radios into btn-group

            $('.radio.btn-group label').addClass('btn');

            $('.btn-group label:not(.active)').click(function () {

                var label = $(this),

                    input = $('#' + label.attr('for'));


                if (!input.prop('checked')) {

                    label.closest('.btn-group').find('label').removeClass('active btn-success btn-danger btn-primary');

                    if (input.val() == '') {

                        label.addClass('active btn-primary');

                    } else if (input.val() == 0) {

                        label.addClass('active btn-danger');

                    } else {

                        label.addClass('active btn-success');

                    }

                    input.prop('checked', true);

                }

            });


            $('.btn-group input[checked=checked]').each(function () {

                if ($(this).val() == '') {

                    $('label[for=' + $(this).attr('id') + ']').addClass('active btn-primary');

                } else if ($(this).val() == 0) {

                    $('label[for=' + $(this).attr('id') + ']').addClass('active btn-danger');

                } else {

                    $('label[for=' + $(this).attr('id') + ']').addClass('active btn-success');

                }

            });


            $('#alternateUiWidgetsExample').find('.time').timepicker({

                'showDuration': true,

                'timeFormat': '<?php echo $this->params['gtime_format']; ?>'

            });


            $('#eml_date').pikaday({

                showWeekNumber: true,

                field: document.getElementById('datepicker-week-numbers'),

                firstDay: <?php echo $this->params['gfirstday_week'];?>, //(0: Sunday, 1: Monday, etc)

                mainCalendar: 'right',

                numberOfMonths: 1,

                format: '<?php echo strtoupper($this->params['gdate_formatAE']); ?>',

                minDate: new Date('2000-01-01'),

                maxDate: new Date('2020-12-31'),

                // defaultDate : new Date('<?php echo JHtml::_('date', $this->item->date, 'Y-m-d');?>'),

                yearRange: [2000, 2020],

                i18n: {

                    previousMonth: '<?php echo JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_PREVIOUSMONTH'); ?>',

                    nextMonth: '<?php echo JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_NEXTMONTH'); ?>',

                    months: [<?php echo $this->params['monthNames']; ?>],

                    weekdays: [<?php echo $this->params['dayNames']; ?>],

                    weekdaysShort: [<?php echo $this->params['dayNamesShort']; ?>]

                }

            });


            $('#eml_enddate').pikaday({

                showWeekNumber: true,

                field: document.getElementById('datepicker-week-numbers'),

                firstDay: <?php echo $this->params['gfirstday_week'];?>, //(0: Sunday, 1: Monday, etc)

                mainCalendar: 'right',

                numberOfMonths: 1,

                format: '<?php echo strtoupper($this->params['gdate_formatAE']); ?>',

                minDate: new Date('2000-01-01'),

                maxDate: new Date('2020-12-31'),

                // defaultDate : new Date('<?php echo JHtml::_('date', $this->item->enddate, 'Y-m-d');?>'),

                yearRange: [2000, 2020],

                i18n: {

                    previousMonth: '<?php echo JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_PREVIOUSMONTH'); ?>',

                    nextMonth: '<?php echo JText::_('COM_ALLEVENTS_FULLCALENDAR_TEXT_NEXTMONTH'); ?>',

                    months: [<?php echo $this->params['monthNames']; ?>],

                    weekdays: [<?php echo $this->params['dayNames']; ?>],

                    weekdaysShort: [<?php echo $this->params['dayNamesShort']; ?>]

                }

            });

            var picker = $('#eml_date').data('pikaday');

            picker.setDate('<?php echo JHtml::_('date', $this->item->date, 'Y-m-d');?>');


            picker = $('#eml_enddate').data('pikaday');

            picker.setDate('<?php echo JHtml::_('date', $this->item->enddate, 'Y-m-d');?>');


            var jform_allday = <?php echo (isset($this->item->allday)) ? $this->item->allday : 0;?> ;

            jform_allday = !jform_allday;


            var alternateUiWidgetsExampleEl = document.getElementById('alternateUiWidgetsExample');

            var alternateWidgetsDatepair = new Datepair(alternateUiWidgetsExampleEl, {

                parseTime: function (input) {

                    // use moment.js to parse time

                    var m = moment(input.value, '<?php echo $this->params['gtime_formatAEFC']; ?>');

                    return m.toDate();

                },

                updateTime: function (input, dateObj) {

                    var m = moment(dateObj);

                    $(input).timepicker('setTime', m.format('<?php echo $this->params['gtime_formatAEFC']; ?>'));

                    if (jform_allday == 1) {

                        if ($('#eml_time').val() == "") {

                            $('#jform_date').val($('#eml_date').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);

                        } else {

                            $('#jform_date').val($('#eml_date').val() + ' ' + $('#eml_time').val());

                        }

                        if ($('#eml_endtime').val() == "") {

                            $('#jform_enddate').val($('#eml_enddate').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);

                        } else {

                            $('#jform_enddate').val($('#eml_enddate').val() + ' ' + $('#eml_endtime').val());

                        }

                    }

                    else {

                        $('#jform_date').val($('#eml_date').val());

                        $('#jform_enddate').val($('#eml_enddate').val());

                    }

                    return (true);

                },

                parseDate: function (input) {

                    var picker = $(input).data('pikaday');

                    return picker.getDate();

                },

                updateDate: function (input, dateObj) {

                    var picker = $(input).data('pikaday');

                    return picker.setDate(dateObj);

                }

            });


            $('#jform_date').val("<?php

                if ($this->item->allday == "1") {

                    echo JHtml::_('date', $this->item->date, $this->params['gdate_format']);

                } else {

                    echo JHtml::_('date', $this->item->date, $this->params['gdatetime_format']);

                } ?>");


            $('#jform_enddate').val("<?php

                if ($this->item->allday == "1") {

                    echo JHtml::_('date', $this->item->enddate, $this->params['gdate_format']);

                } else {

                    echo JHtml::_('date', $this->item->enddate, $this->params['gdatetime_format']);

                } ?>");


            $("#eml_date, #eml_time, #eml_enddate, #eml_endtime").change(function () {

                if (jform_allday == 1) {

                    if ($('#eml_time').val() == "") {

                        $('#jform_date').val($('#eml_date').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);

                    } else {

                        $('#jform_date').val($('#eml_date').val() + ' ' + $('#eml_time').val());

                    }

                    if ($('#eml_endtime').val() == "") {

                        $('#jform_enddate').val($('#eml_enddate').val() + ' ' + <?php echo '"' . $this->params['gtime_null'] . '"';?>);

                    } else {

                        $('#jform_enddate').val($('#eml_enddate').val() + ' ' + $('#eml_endtime').val());

                    }

                }

                else {

                    $('#jform_date').val($('#eml_date').val());

                    $('#jform_enddate').val($('#eml_enddate').val());

                }


                $('#recap_date').text("Du " + $('#jform_date').val() + " au " + $('#jform_enddate').val());

            });


            $("#jform_sdn_accred_prenom, #jform_sdn_accred_nom").change(function () {

                $('#recap_contactaccred').text($('#jform_sdn_accred_nom').val() + " " + $('#jform_sdn_accred_prenom').val());

            });


            $("#jform_sdn_surplace_prenom, #jform_sdn_surplace_nom").change(function () {

                $('#recap_contactsurplace').text($('#jform_sdn_surplace_nom').val() + " " + $('#jform_sdn_surplace_prenom').val());

            });


            $('#eml_sdn_defraiement').hide();

            $('#eml_sdn_places').hide();

            $('#eml_sdn_tickets_repas').hide();

            $('#eml_sdn_tickets_boisson').hide();


            $('#place_rue').hide();

            $('#place_numero').hide();

            $('#place_ville').hide();

            $('#place_codepostal').hide();

            $('#place_country').hide();

            $('#place_latitude').hide();

            $('#place_longitude').hide();

            $('#place_zoom').hide();


            $('#place_rue-lbl').hide();

            $('#place_numero-lbl').hide();

            $('#place_ville-lbl').hide();

            $('#place_codepostal-lbl').hide();

            $('#place_country-lbl').hide();

            $('#place_latitude-lbl').hide();

            $('#place_longitude-lbl').hide();

            $('#place_zoom-lbl').hide();


            $('#place_phone-lbl').text('Tel. Fixe');

            $('#place_fax-lbl').text('Tel Portable');

            $('#place_email-lbl').text('Email');

            $('#place_website-lbl').text('Site web');

            $('#place_titre-lbl').text('Nom du Lieu').prop('title', "Merci d'indiquer le lieu sans article, même si celui-ci s'utilise habituellement. ex : 'Aéronef' et non 'L aéronef'");

            $('#place_titre').prop('title', "Merci d'indiquer le lieu sans article, même si celui-ci s'utilise habituellement. ex : 'Aéronef' et non 'L aéronef'");


            eml_sdn_defraiement_flag = 0;

            <?php if ($this->item->sdn_defraiement_flag) { ?>

            $('#eml_sdn_defraiement').show();

            eml_sdn_defraiement_flag = 1;

            <?php }?>



            eml_sdn_places_flag = 0;

            <?php if ($this->item->sdn_places_flag) { ?>

            $('#eml_sdn_places').show();

            eml_sdn_tickets_flag = 1;

            <?php }?>



            eml_sdn_tickets_repas_flag = 0;

            <?php if ($this->item->sdn_tickets_repas_flag) { ?>

            $('#eml_sdn_tickets_repas').show();

            eml_sdn_tickets_repas_flag = 1;

            <?php }?>



            eml_sdn_tickets_boisson_flag = 0;

            <?php if ($this->item->sdn_tickets_boisson_flag) { ?>

            $('#eml_sdn_tickets_boisson').show();

            eml_sdn_tickets_boisson_flag = 1;

            <?php }?>



            eml_sdn_acces_backstage_flag = 0;

            <?php if ($this->item->sdn_acces_backstage) { ?>

            eml_sdn_acces_backstage_flag = 1;

            <?php }?>



            $('#jform_sdn_defraiement_flag0').click(function () {

                eml_sdn_acces_backstage_flag = 1;

                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_defraiement_flag1').click(function () {

                eml_sdn_acces_backstage_flag = 0;

                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_defraiement_flag0').click(function () {

                $('#eml_sdn_defraiement').show();

                eml_sdn_defraiement_flag = 1;


                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_defraiement_flag1').click(function () {

                $('#eml_sdn_defraiement').hide();

                eml_sdn_defraiement_flag = 0;


                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_places_flag0').click(function () {

                $('#eml_sdn_places').show();

                eml_sdn_places_flag = 1;


                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_places_flag1').click(function () {

                $('#eml_sdn_places').hide();

                eml_sdn_places_flag = 0;


                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_tickets_repas_flag0').click(function () {

                $('#eml_sdn_tickets_repas').show();

                eml_sdn_tickets_repas_flag = 1;


                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_tickets_repas_flag1').click(function () {

                $('#eml_sdn_tickets_repas').hide();

                eml_sdn_tickets_repas_flag = 0;


                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_tickets_boisson_flag0').click(function () {

                $('#eml_sdn_tickets_boisson').show();

                eml_sdn_tickets_boisson_flag = 1;


                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            $('#jform_sdn_tickets_boisson_flag1').click(function () {

                $('#eml_sdn_tickets_boisson').hide();

                eml_sdn_tickets_boisson_flag = 0;


                montext = "";

                if (eml_sdn_defraiement_flag) montext += " Défraiement";

                if (eml_sdn_places_flag) montext += " Places";

                if (eml_sdn_tickets_repas_flag) montext += " Repas";

                if (eml_sdn_tickets_boisson_flag) montext += " Boisson";

                if (eml_sdn_acces_backstage_flag) montext += " Accès Backstage";

                $('#recap_conditions').text(montext);

            });


            var sdn_accredChecked = function () {

                if ($('#sdn_accred_flag').prop('checked')) {

                    $("#jform_sdn_accred_nom").prop('readonly', true).val('<?php echo $user->name; ?>');

                    $("#jform_sdn_accred_prenom").prop('readonly', true);

                    $("#jform_sdn_accred_structure").prop('readonly', true).val('<?php echo $userProfile->profile['address1']; ?>');

                    $("#jform_sdn_accred_mail").prop('readonly', true).val('<?php echo $user->email; ?>');

                    $("#jform_sdn_accred_fixe").prop('readonly', true).val('<?php echo $userProfile->profile['phone']; ?>');

                    $("#jform_sdn_accred_portable").prop('readonly', true).val('<?php echo $userProfile->profile['favoritebook']; ?>');

                    $('#recap_contactaccred').text($('#jform_sdn_accred_nom').val() + " " + $('#jform_sdn_accred_prenom').val());

                } else {

                    $("#jform_sdn_accred_nom").prop('readonly', false).val('');

                    $("#jform_sdn_accred_prenom").prop('readonly', false).val('');

                    $("#jform_sdn_accred_structure").prop('readonly', false).val('');

                    $("#jform_sdn_accred_mail").prop('readonly', false).val('');

                    $("#jform_sdn_accred_fixe").prop('readonly', false).val('');

                    $("#jform_sdn_accred_portable").prop('readonly', false).val('');

                    $('#recap_contactaccred').text($('#jform_sdn_accred_nom').val() + " " + $('#jform_sdn_accred_prenom').val());

                }

            };

            var sdn_surplaceChecked = function () {

                if ($('#sdn_surplace_flag').prop('checked')) {

                    $("#jform_sdn_surplace_nom").prop('readonly', true).val('<?php echo $user->name; ?>');

                    $("#jform_sdn_surplace_prenom").prop('readonly', true);

                    $("#jform_sdn_surplace_structure").prop('readonly', true).val('<?php echo $userProfile->profile['address1']; ?>');

                    $("#jform_sdn_surplace_mail").prop('readonly', true).val('<?php echo $user->email; ?>');

                    $("#jform_sdn_surplace_fixe").prop('readonly', true).val('<?php echo $userProfile->profile['phone']; ?>');

                    $("#jform_sdn_surplace_portable").prop('readonly', true).val('<?php echo $userProfile->profile['favoritebook']; ?>');

                    $('#recap_contactsurplace').text($('#jform_sdn_surplace_nom').val() + " " + $('#jform_sdn_surplace_prenom').val());

                } else {

                    $("#jform_sdn_surplace_nom").prop('readonly', false).val('');

                    $("#jform_sdn_surplace_prenom").prop('readonly', false).val('');

                    $("#jform_sdn_surplace_structure").prop('readonly', false).val('');

                    $("#jform_sdn_surplace_mail").prop('readonly', false).val('');

                    $("#jform_sdn_surplace_fixe").prop('readonly', false).val('');

                    $("#jform_sdn_surplace_portable").prop('readonly', false).val('');

                    $('#recap_contactsurplace').text($('#jform_sdn_surplace_nom').val() + " " + $('#jform_sdn_surplace_prenom').val());

                }

            };

            $('#sdn_accred_flag').on("click", sdn_accredChecked);

            $('#sdn_surplace_flag').on("click", sdn_surplaceChecked);


            $('#place-save-button').click(function () {

                var data = {

                    jform: {

                        titre: $('#place_titre').val(),

                        address: $('#place_address').val(),

                        latitude: $('#place_latitude').val(),

                        longitude: $('#place_longitude').val(),

                        numero: $('#place_numero').val(),

                        rue: $('#place_rue').val(),

                        ville: $('#place_ville').val(),

                        country: $('#place_country').val(),

                        codepostal: $('#place_codepostal').val(),

                        phone: $('#place_phone').val(),

                        fax: $('#place_fax').val(),

                        email: $('#place_email').val(),

                        website: $('#place_website').val(),

                        agenda_id: 0

                    }

                };

                data[$('#place_token').val()] = '1';

                data['ajax'] = '1';

                data['id'] = 0;


                if (document.formvalidator.isValid(document.id('place-form'))) {

                    $.ajax({

                        type: 'POST',

                        url: 'index.php?option=com_allevents&task=placeform.save',

                        data: data,

                        success: function (data) {

                            var json = $.parseJSON(data);

                            if (json.data.id != null && json.data.display != null) {

                                $('#jform_place_id').append('<option value="' + json.data.id + '" selected="selected">' + json.data.display + '</option>');

                                $('#jform_place_id').trigger("liszt:updated");

                            }

                            Joomla.renderMessages(json.messages);

                            $('#place_titre-lbl').removeClass('required');

                            $('#place_email-lbl').removeClass('required');

                            $('#place_address-lbl').removeClass('required');

                            $('#place-form').fadeToggle();

                        }

                    });

                }

            });

            $('#place_titre').removeClass('required').attr("aria-required", "false");

            $('#place_titre-lbl').text($('#place_titre-lbl').text() + " *");

            $('#place_titre-lbl').removeClass('required').attr("aria-required", "false");


            $('#place_email-lbl').text($('#place_email-lbl').text() + " *");

            $('#place_email-lbl').removeClass('required').attr("aria-required", "false");

            $('#place_email').removeClass('required').attr("aria-required", "false");


            $('#place_address').removeClass('required').attr("aria-required", "false");

            $('#place_address-lbl').text($('#place_address-lbl').text() + " *");

            $('#place_address-lbl').removeClass('required').attr("aria-required", "false");


            $('#place-activator').click(function () {

                $('#place_titre-lbl').addClass('required').attr("aria-required", "true");

                $('#place_titre').addClass('required').attr("aria-required", "true");


                $('#place_email-lbl').addClass('required').attr("aria-required", "true");

                $('#place_email').addClass('required').attr("aria-required", "true");


                $('#place_address-lbl').addClass('required').attr("aria-required", "true");

                $('#place_address').addClass('required').attr("aria-required", "true");


                $('#place-form').fadeToggle();

            });


            $('#place-cancel-button').click(function () {

                $('#place_titre-lbl').removeClass('required').attr("aria-required", "false");

                $('#place_titre').removeClass('required').attr("aria-required", "false");


                $('#place_email-lbl').removeClass('required').attr("aria-required", "false");

                $('#place_email').removeClass('required').attr("aria-required", "false");


                $('#place_address-lbl').removeClass('required').attr("aria-required", "false");

                $('#place_address').removeClass('required').attr("aria-required", "false");


                $('#place-form').fadeToggle();

            });


            $('#place-form').hide();


            Joomla.submitbutton = function (task) {

                if (task == 'eventform.cancel') {

                    Joomla.submitform(task, document.getElementById('adminForm'));

                }

                else {

                    if (task != 'eventform.cancel' && document.formvalidator.isValid(document.id('adminForm'))) {

                        Joomla.submitform(task, document.getElementById('adminForm'));

                    }

                    else {

                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');

                    }

                }

            }

        });

    })(jQuery);


</script>


<form action="<?php echo JRoute::_('index.php?option=com_allevents', false); ?>" method="post" id="adminForm">


    <div class="uk-container uk-container-center uk-margin-top uk-margin-bottom">

        <div class="uk-panel uk-panel-box uk-panel-padding">

            <?php if (!empty($this->item->id)): ?>

                <h1><?php echo JText::_('COM_ALLEVENTS_EVENT_UPDATE'); ?></h1>

            <?php else: ?>

                <h1><?php echo JText::_('COM_ALLEVENTS_EVENT_ADD'); ?></h1>

            <?php endif; ?>


            <ul class="uk-wizard uk-wizard-hover uk-wizard uk-wizard-hover uk-grid uk-grid-collapse uk-grid-width-medium-1-3 uk-grid-width-large-1-6"

                data-uk-switcher="{connect:'#subnav-pill-content-1'}">

                <li class="uk-step">

                    <a href="#">

                        <div class="uk-step-content uk-text-truncate">

                            <div class="uk-wizard-icon"><i class="uk-icon-calendar"></i></div>

                            <div class="uk-wizard-title">Evénement</div>

                            <div class="uk-wizard-desc"></div>

                        </div>

                    </a>

                </li>

                <li class="uk-step">

                    <a href="#">

                        <div class="uk-step-content">

                            <div class="uk-wizard-icon"><i class="uk-icon-cogs"></i></div>

                            <div class="uk-wizard-title">Détails</div>

                            <div class="uk-wizard-desc"></div>

                        </div>

                    </a>

                </li>

                <li class="uk-step">

                    <a href="#">

                        <div class="uk-step-content">

                            <div class="uk-wizard-icon"><i class="uk-icon-user"></i></div>

                            <div class="uk-wizard-title">Contacts</div>

                            <div class="uk-wizard-desc"></div>

                        </div>

                    </a>

                </li>

                <li class="uk-step">

                    <a href="#">

                        <div class="uk-step-content">

                            <div class="uk-wizard-icon"><i class="uk-icon-align-justify"></i></div>

                            <div class="uk-wizard-title">Description</div>

                            <div class="uk-wizard-desc"></div>

                        </div>

                    </a>

                </li>

                <li class="uk-step">

                    <a href="#">

                        <div class="uk-step-content">

                            <div class="uk-wizard-icon"><i class="uk-icon-info"></i></div>

                            <div class="uk-wizard-title">Conditions</div>

                            <div class="uk-wizard-desc"></div>

                        </div>

                    </a>

                </li>

                <li class="uk-step">

                    <a href="#">

                        <div class="uk-step-content">

                            <div class="uk-wizard-icon"><i class="uk-icon-eye"></i></div>

                            <div class="uk-wizard-title">Récapitulatif</div>

                            <div class="uk-wizard-desc"></div>

                        </div>

                    </a>

                </li>

            </ul>

            <ul id="subnav-pill-content-1" class="uk-switcher">

                <li id="step-1">

                    <?php echo $this->form->renderField('titre'); ?>

                    <div class="control-group">

                        <div class="control-label"><?php echo $this->form->getLabel('date'); ?></div>

                        <div id="alternateUiWidgetsExample" style="display:table-caption;">

                            <?php

                            // utc to user timezone

                            if (isset($this->item->date)) {

                                $date = JHtml::_('date', $this->item->date, $this->params['gdate_format']);

                                $time = JHtml::_('date', $this->item->date, $this->params['gtime_format']);

                            } else {

                                $date = null;

                                $time = '20:00';

                            }

                            if ($this->item->allday == "1") {

                                echo '<div class="input-append">';

                                echo '<input class="date start inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_date" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';

                                echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';

                                echo '<input style="display: none;" class="time start inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_time" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';

                                echo '<span style="display: none;" class="add-on " id="eml_time_clock"> <i class="fa fa-clock-o"></i></span>';

                                echo '</div>';

                            } else {

                                echo '<div class="input-append">';

                                echo '<input class="date start inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_date" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';

                                echo '<span class="add-on"><i class="fa fa-calendar"></i></span>';

                                echo '<input class="time start inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_time" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';

                                echo '<span class="add-on" id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';

                                echo '</div>';

                            }

                            if (isset($this->item->enddate)) {

                                $date = JHtml::_('date', $this->item->enddate, $this->params['gdate_format']);

                                $time = JHtml::_('date', $this->item->enddate, $this->params['gtime_format']);

                            } else {

                                $date = null;

                                $time = '23:00';

                            }

                            if ($this->item->allday == "1") {

                                echo '<div class="input-append">';

                                echo '<input class="date end inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_enddate" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . ' value="' . $date . '" data-view="Dropdown" data-field="date">';

                                echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';

                                echo '<input style="display: none;" class="time end inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_endtime" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . ' value="' . $time . '" data-view="Dropdown" data-field="time">';

                                echo '<span style="display: none;" class="add-on " id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';

                                echo '</div>';

                            } else {

                                echo '<div class="input-append">';

                                echo '<input class="date end inputbox hasTooltip" size="' . strlen($this->params['gdate_formatAE']) . '" id="eml_enddate" type="text" placeholder="' . strtoupper($this->params['gdate_formatAE']) . '" value="' . $date . '" data-view="Dropdown" data-field="date">';

                                echo '<span class="add-on "><i class="fa fa-calendar"></i></span>';

                                echo '<input class="time end inputbox hasTooltip" size="' . strlen($this->params['gtime_formatAE']) . '" id="eml_endtime" type="text" placeholder="' . strtoupper($this->params['gtime_formatAE']) . '" value="' . $time . '" data-view="Dropdown" data-field="time">';

                                echo '<span class="add-on " id="eml_time_clock"><i class="fa fa-clock-o"></i></span>';

                                echo '</div>';

                            }

                            ?>

                        </div>

                    </div>

                    <?php echo $this->form->renderField('affiche'); ?>

                    <div class="control-group">

                        <div class="control-label">

                            <?php echo $this->form->getLabel('enrolment_enabled'); ?>

                        </div>

                        <div class="controls">

                            <?php echo 'Les inscriptions de reporters sont autorisées'; ?>

                        </div>

                    </div>

                    <button class="btn btn-small btn-primary btn-lg pull-right " data-uk-switcher-item="next"

                            type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>

                </li>

                <li id="step-2">

                    <h3><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DETAILS'); ?></h3>

                    <div class="control-group">

                        <div class="control-label">

                            <?php echo $this->form->getLabel('agenda_id'); ?>

                        </div>

                        <div class="controls">

                            <?php echo '<span style="padding:4px" class="se_agenda_' . $this->item->agenda_id . '_bullet se_agenda_' . $this->item->agenda_id . '_color">' . $this->item->agenda_title . '</span>'; ?>

                        </div>

                    </div>


                    <?php

                    echo $this->form->renderField('public_id');

                    foreach ((array)$this->item->public_id as $value) {

                        if (!is_array($value)) {

                            echo '<input type="hidden" class="public_id" name="jform[public_idhidden][' . $value . ']"

                                     value="' . $value . '"/>';

                        }

                    }

                    ?>

                    <div class="control-group">

                        <div class="control-label"><?php echo $this->form->getLabel('place_id'); ?></div>

                        <div class="controls"><?php echo $this->form->getInput('place_id'); ?>

                            <?php echo '<a class="btn btn-micro" href="javascript:void(0);" id="place-activator" title="Si le LIEU de votre événement n\'existe PAS DANS LA LISTE, cliquer ici pour CREER UN NOUVEAU LIEU"><i class="icon-new"></i>Nouveau lieu</a>'; ?>

                        </div>

                    </div>


                    <?php

                    echo $place_formAE;

                    foreach ((array)$this->item->place_id as $value) {

                        if (!is_array($value)) {

                            echo '<input type="hidden" class="place_id" name="jform[place_idhidden][' . $value . ']"

                                     value="' . $value . '"/>';

                        }

                    }


                    echo $this->form->renderField('activity_id');

                    foreach ((array)$this->item->activity_id as $value) {

                        if (!is_array($value)) {

                            echo '<input type="hidden" class="activity_id" name="jform[activity_idhidden][' . $value . ']"

                                     value="' . $value . '"/>';

                        }

                    }

                    echo $this->form->renderField('section_id');

                    foreach ((array)$this->item->section_id as $value) {

                        if (!is_array($value)) {

                            echo '<input type="hidden" class="section_id" name="jform[section_idhidden][' . $value . ']"

                                     value="' . $value . '"/>';

                        }

                    }

                    ?>

                    <button class="btn btn-small btn-primary btn-lg pull-right " data-uk-switcher-item="next"

                            type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>

                </li>

                <li id="step-3">

                    <div class="uk-grid">

                        <div class="uk-width-medium-1-2">

                            <div class="uk-panel">

                                <h3 class="uk-panel-title">Contact pour la gestion de l'accréditation</h3>

                                <label><input id="sdn_accred_flag" type="checkbox">Reprendre les coordonnées de

                                    l'utilisateur connecté</label>

                                <div class="uk-form uk-form-stacked">

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_accred_nom'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_accred_nom'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_accred_prenom'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_accred_prenom'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_accred_structure'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_accred_structure'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_accred_mail'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_accred_mail'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_accred_fixe'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_accred_fixe'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_accred_portable'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_accred_portable'); ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="uk-width-medium-1-2">

                            <div class="uk-panel">

                                <h3 class="uk-panel-title">Contact sur place lors de l'événement</h3>

                                <label><input id="sdn_surplace_flag" type="checkbox">Reprendre les coordonnées de

                                    l'utilisateur connecté</label>

                                <div class="uk-form uk-form-stacked">

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_surplace_nom'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_surplace_nom'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_surplace_prenom'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_surplace_prenom'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_surplace_structure'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_surplace_structure'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_surplace_mail'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_surplace_mail'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_surplace_fixe'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_surplace_fixe'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_surplace_portable'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_surplace_portable'); ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="uk-width-medium-1-1">

                            <div class="uk-panel">

                                <div class="uk-form uk-form-stacked">

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_contacts_libre'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_contacts_libre'); ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <button class="btn btn-small btn-primary btn-lg pull-right " data-uk-switcher-item="next"

                            type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>

                </li>

                <li id="step-4">

                    <div class="control-group">

                        <div class="controls"><?php echo $this->form->getInput('description'); ?></div>

                    </div>

                    <button class="btn btn-small btn-primary btn-lg pull-right " data-uk-switcher-item="next"

                            type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>

                </li>

                <li id="step-5">

                    <div class="uk-grid">

                        <div class="uk-width-medium-1-1">

                            <div class="uk-panel">

                                <h3 class="uk-panel-title">Conditions d'accueil</h3>

                                <div class="uk-form uk-form-stacked">

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_defraiement_flag'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_defraiement_flag'); ?>

                                            <span

                                                id="eml_sdn_defraiement"><?php echo $this->form->getInput('sdn_defraiement_montant'); ?>

                                                <label

                                                    class="uk-form-label uk-margin-right uk-float-right"><?php echo JText::_('PLG_ALLEVENTS_SDN_DEFRAIEMENT_MONTANT'); ?></label></span>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_places_flag'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_places_flag'); ?>

                                            <span id="eml_sdn_places">

                                                <?php echo $this->form->getInput('sdn_places_nombre'); ?>

                                                <label

                                                    class="uk-form-label uk-margin-right uk-float-right"><?php echo JText::_('PLG_ALLEVENTS_SDN_PLACES_NOMBRE'); ?></label>

                                                </span>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_tickets_repas_flag'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_tickets_repas_flag'); ?>

                                            <span id="eml_sdn_tickets_repas">

                                                <?php echo $this->form->getInput('sdn_tickets_repas_nombre'); ?>

                                                <label

                                                    class="uk-form-label uk-margin-right uk-float-right"><?php echo JText::_('PLG_ALLEVENTS_SDN_TICKETS_REPAS_NOMBRE'); ?></label>

                                                </span>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_tickets_boisson_flag'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_tickets_boisson_flag'); ?>

                                            <span id="eml_sdn_tickets_boisson">

                                                <?php echo $this->form->getInput('sdn_tickets_boisson_nombre'); ?>

                                                <label

                                                    class="uk-form-label uk-margin-right uk-float-right"><?php echo JText::_('PLG_ALLEVENTS_SDN_TICKETS_BOISSON_NOMBRE'); ?></label>

                                                </span>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_acces_backstage'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_acces_backstage'); ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label

                                            class="uk-form-label"><?php echo $this->form->getLabel('sdn_accueil_libre'); ?></label>

                                        <div class="uk-form-controls">

                                            <?php echo $this->form->getInput('sdn_accueil_libre'); ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <button class="btn btn-small btn-primary btn-lg pull-right " data-uk-switcher-item="next"

                            type="button"><?php echo JText::_('COM_ALLEVENTS_NEXT'); ?></button>

                </li>

                <li id="step-6">

                    <div class="uk-grid">

                        <div class="uk-width-medium-1-1">

                            <div class="uk-panel">

                                <h3 class="uk-panel-title">Récapitulatif</h3>

                                <p>Bonjour <?php echo $user->name; ?></p>

                                <p>Merci de vérifier les informations que vous souhaitez soumettre au Collectif Scènes

                                    du Nord</p>

                                <div class="uk-form uk-form-stacked">

                                    <div class="uk-form-row">

                                        <label class="uk-form-label">Evénement</label>

                                        <div class="uk-form-controls">

                                            <div id="recap_titre">{...}</div>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label class="uk-form-label">Date</label>

                                        <div class="uk-form-controls">

                                            <div id="recap_date">{...}</div>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label class="uk-form-label">Lieu</label>

                                        <div class="uk-form-controls">

                                            <div id="recap_lieu">{...}</div>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label class="uk-form-label">Proposé par</label>

                                        <div class="uk-form-controls">

                                            <?php echo $user->name; ?>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label class="uk-form-label">Contact pour la gestion de l'accreditation</label>

                                        <div class="uk-form-controls">

                                            <div id="recap_contactaccred"></div>

                                        </div>

                                    </div>

                                    <div class="uk-form-row">

                                        <label class="uk-form-label">Contact sur place</label>

                                        <div class="uk-form-controls">

                                            <div id="recap_contactsurplace"></div>

                                        </div>

                                    </div>

                                </div>

                                </br></br>

                                <p>A noter : avant d'être publié, votre événement peut nécessiter la validation par un

                                    administrateur du collectif Scènes du Nord </p>

                            </div>

                        </div>

                    </div>

                    <?php echo $this->getToolbarSDN(); ?>

                </li>

            </ul>

        </div>

    </div>

    <input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>"/>

    <input type="hidden" name="jform[agenda_id]" value="<?php echo $this->item->agenda_id; ?>"/>

    <input type="hidden" name="jform[enrolment_max_participant]" value="0"/>

    <input type="hidden" name="jform[enrolment_enabled]" value="1"/>

    <input type="hidden" name="jform[proposal]" value="1"/>

    <input type="hidden" name="jform[allow_overbooking]" value="1"/>

    <input type="hidden" name="jform[contact_libre]" value=""/>

    <input type="hidden" name="jform[hot]" value="0"/>

    <input type="hidden" name="jform[published]" value="1"/>

    <input type="hidden" name="jform[allday]" value="0"/>

    <input type="hidden" name="task" value=""/>

    <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>"/>

    <input type="hidden" name="option" value="com_allevents"/>

    <input id="jform_date" style="display: none;" class="inputbox required" type="text" aria-required="true"

           required="required" value="" name="jform[date]" aria-invalid="false">

    <input id="jform_enddate" style="display: none;" class="inputbox required" type="text" aria-required="true"

           required="required" value="" name="jform[enddate]">

    <?php echo JHtml::_('form.token'); ?>

</form>


<?php

echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);

?>

