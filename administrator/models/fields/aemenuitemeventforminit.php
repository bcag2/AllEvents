<?php

defined('JPATH_BASE') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('hidden');
JModelLegacy::addIncludePath(JPATH_BASE . '/components/com_allevents/models', 'ContentModel');

/**
 * JFormFieldAEMenuItemEventformInit
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

/**
 * Initialize eventform menu item definition
 */
class JFormFieldAEMenuItemEventformInit extends JFormFieldHidden
{

    public $type = 'AEMenuItemEventformInit';

    /**
     * JFormFieldAEMenuItemEventformInit:setup()
     *
     * {@inheritDoc}
     * @see JFormField::setup()
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {

        $element['hidden'] = true;

        $params = JComponentHelper::getParams('com_allevents');

        if (!is_null($this->form->getValue('agenda_id', $group))) {
            return parent::setup($element, $value, $group);
        }

        // Initializing form data
        if ($params['controlpanel_showagendas']) {
            $agendas_model = JModelLegacy::getInstance('Agendas', 'AllEventsModel');
            $agenda_id = $agendas_model->GetDefaultAgendaId();
            $agenda_id = is_null($agenda_id) ? 0 : $agenda_id;
        } else {
            $agenda_id = 0;
        }
        $this->form->setValue('agenda_id', $group, $agenda_id);

        if ($agenda_id != 0) {
            $agenda_model = JModelLegacy::getInstance('Agenda', 'AllEventsModel');
            $agenda_contacts = $agenda_model->GetAgendaContactsParams($agenda_id);
            $this->form->setValue('contact_libre_access', $group, $agenda_contacts->contact_libre_default_access);
            $this->form->setValue('contact_1_type', $group, $agenda_contacts->contact_1_default_type);
            $this->form->setValue('contact_1_label', $group, $agenda_contacts->contact_1_default_label);
            $this->form->setValue('contact_1_access', $group, $agenda_contacts->contact_1_default_access);
            $this->form->setValue('contact_2_type', $group, $agenda_contacts->contact_2_default_type);
            $this->form->setValue('contact_2_label', $group, $agenda_contacts->contact_2_default_label);
            $this->form->setValue('contact_2_access', $group, $agenda_contacts->contact_2_default_access);
            $this->form->setValue('contact_3_type', $group, $agenda_contacts->contact_3_default_type);
            $this->form->setValue('contact_3_label', $group, $agenda_contacts->contact_3_default_label);
            $this->form->setValue('contact_3_access', $group, $agenda_contacts->contact_3_default_access);
        } else {
            $this->form->setValue('contact_libre_access', $group, 0);
            $this->form->setValue('contact_1_type', $group, 0);
            $this->form->setValue('contact_1_label', $group, '');
            $this->form->setValue('contact_1_access', $group, 0);
            $this->form->setValue('contact_2_type', $group, 0);
            $this->form->setValue('contact_2_label', $group, '');
            $this->form->setValue('contact_2_access', $group, 0);
            $this->form->setValue('contact_3_type', $group, 0);
            $this->form->setValue('contact_3_label', $group, '');
            $this->form->setValue('contact_3_access', $group, 0);
        }

        if ($params['controlpanel_showactivities']) {
            $activities_model = JModelLegacy::getInstance('Activities', 'AllEventsModel');
            $activity_id = $activities_model->GetDefaultActivityIdForAgenda($agenda_id);
            $activity_id = is_null($activity_id) ? 0 : $activity_id;
        } else {
            $activity_id = 0;
        }
        $this->form->setValue('activity_id', $group, $activity_id);

        if ($params['controlpanel_showpublics'] && $params['geventshow_public']) {
            $publics_model = JModelLegacy::getInstance('Publics', 'AllEventsModel');
            $public_id = $publics_model->GetDefaultPublicIdForAgenda($agenda_id);
            $public_id = is_null($public_id) ? 0 : $public_id;
        } else {
            $public_id = 0;
        }
        $this->form->setValue('public_id', $group, $public_id);

        if ($params['controlpanel_showplaces']) {
            $places_model = JModelLegacy::getInstance('Places', 'AllEventsModel');
            $place_id = $places_model->GetDefaultPlaceIdForAgenda($agenda_id);
            $place_id = is_null($place_id) ? 0 : $place_id;
        } else {
            $place_id = 0;
        }
        $this->form->setValue('place_id', $group, $place_id);

        if ($params['controlpanel_showressources']) {
            $ressources_model = JModelLegacy::getInstance('Ressources', 'AllEventsModel');
            $ressource_id = $ressources_model->GetDefaultRessourceIdForAgenda($agenda_id);
            $ressource_id = is_null($ressource_id) ? 0 : $ressource_id;
        } else {
            $ressource_id = 0;
        }
        $this->form->setValue('ressource_id', $group, $ressource_id);

        if ($params['controlpanel_showsections']) {
            $sections_model = JModelLegacy::getInstance('Sections', 'AllEventsModel');
            $section_id = $sections_model->GetDefaultSectionId();
            $section_id = is_null($section_id) ? 0 : $section_id;
        } else {
            $section_id = 0;
        }
        $this->form->setValue('section_id', $group, $section_id);

        if ($params['controlpanel_showcategories']) {
            $categories_model = JModelLegacy::getInstance('Categories', 'AllEventsModel');
            $category_id = $categories_model->GetDefaultCategoryIdForSection($section_id);
            $category_id = is_null($category_id) ? 0 : $category_id;
        } else {
            $category_id = 0;
        }
        $this->form->setValue('category_id', $group, $category_id);

        // Adding contacts params update script
        $script = [];
        $script[] = 'jQuery.noConflict();';
        $script[] = 'function modified_agenda_id() {';
        $script[] = '	var selectedValue = jQuery("#jform_params_agenda_id").val();';
        $script[] = '	jQuery.ajax({';
        $script[] = '		type : "POST",';
        $script[] = '		url : "index.php?option=com_allevents&task=agenda.GetAgendaContactsParams",';
        $script[] = '		data : {';
        $script[] = '			"ajax" : 1,';
        $script[] = '			"agenda_id" : selectedValue';
        $script[] = '		},';
        $script[] = '		success : function (result) {';
        $script[] = '			var json = jQuery.parseJSON(result);';
        $script[] = '			jQuery("#jform_params_contact_libre_access").val(json.data.contact_libre_default_access).trigger("liszt:updated");';
        $script[] = '			jQuery("#jform_params_contact_1_type").val(json.data.contact_1_default_type).trigger("liszt:updated");';
        $script[] = '			jQuery("#jform_params_contact_1_access").val(json.data.contact_1_default_access).trigger("liszt:updated");';
        $script[] = '			jQuery("#jform_params_contact_1_label").val(json.data.contact_1_default_label);';
        $script[] = '			jQuery("#jform_params_contact_2_type").val(json.data.contact_2_default_type).trigger("liszt:updated");';
        $script[] = '			jQuery("#jform_params_contact_2_access").val(json.data.contact_2_default_access).trigger("liszt:updated");';
        $script[] = '			jQuery("#jform_params_contact_2_label").val(json.data.contact_2_default_label);';
        $script[] = '			jQuery("#jform_params_contact_3_type").val(json.data.contact_3_default_type).trigger("liszt:updated");';
        $script[] = '			jQuery("#jform_params_contact_3_access").val(json.data.contact_3_default_access).trigger("liszt:updated");';
        $script[] = '			jQuery("#jform_params_contact_3_label").val(json.data.contact_3_default_label);';
        $script[] = '			switch (json.data.contact_1_default_type) {';
        $script[] = '				case "0":';
        $script[] = '					jQuery("#jform_params_contact_1_label").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_1_access").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_1_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_1_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "1":';
        $script[] = '					jQuery("#jform_params_contact_1_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_1_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_1_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_1_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "2":';
        $script[] = '					jQuery("#jform_params_contact_1_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_1_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_1_details_category").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_1_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "3":';
        $script[] = '					jQuery("#jform_params_contact_1_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_1_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_1_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_1_comprofiler_list").closest(".control-group").show();';
        $script[] = '			}';
        $script[] = '			switch (json.data.contact_2_default_type) {';
        $script[] = '				case "0":';
        $script[] = '					jQuery("#jform_params_contact_2_label").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_2_access").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_2_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_2_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "1":';
        $script[] = '					jQuery("#jform_params_contact_2_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_2_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_2_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_2_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "2":';
        $script[] = '					jQuery("#jform_params_contact_2_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_2_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_2_details_category").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_2_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "3":';
        $script[] = '					jQuery("#jform_params_contact_2_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_2_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_2_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_2_comprofiler_list").closest(".control-group").show();';
        $script[] = '			}';
        $script[] = '			switch (json.data.contact_3_default_type) {';
        $script[] = '				case "0":';
        $script[] = '					jQuery("#jform_params_contact_3_label").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_3_access").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_3_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_3_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "1":';
        $script[] = '					jQuery("#jform_params_contact_3_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_3_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_3_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_3_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "2":';
        $script[] = '					jQuery("#jform_params_contact_3_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_3_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_3_details_category").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_3_comprofiler_list").closest(".control-group").hide();';
        $script[] = '					break;';
        $script[] = '				case "3":';
        $script[] = '					jQuery("#jform_params_contact_3_label").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_3_access").closest(".control-group").show();';
        $script[] = '					jQuery("#jform_params_contact_3_details_category").closest(".control-group").hide();';
        $script[] = '					jQuery("#jform_params_contact_3_comprofiler_list").closest(".control-group").show();';
        $script[] = '			}';
        $script[] = '		}';
        $script[] = '	})';
        $script[] = '};';
        $script[] = 'jQuery(document).ready(function() {';
        $script[] = '	jQuery("#jform_params_agenda_id").chosen().change(function(event) {';
        $script[] = '		modified_agenda_id();';
        $script[] = '	})';
        $script[] = '})';

        JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

        return parent::setup($element, $agenda_id, $group);
    }

    /**
     * JFormFieldAEMenuItemEventformInit:setForm()
     *
     * {@inheritDoc}
     * @see JFormField::setForm()
     */
    public function setForm(JForm $form)
    {
        JFactory::getDocument()->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');

        return parent::setForm($form);
    }
}
