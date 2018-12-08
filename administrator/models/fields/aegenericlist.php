<?php
defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAEGenericList
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class JFormFieldAEGenericList extends JFormFieldList
{

    public $type = '';

    /**
     * JFormFieldAEGenericList::getAEOptions() provides the options
     *
     * @param array $class_names : css classes names for options (%d is subtituted by the entity id)
     * @param string|unknown $model_name : model class name to retreive data
     * @param string|unknown $method_name : method name in mode class to retreive data (initially or through ajax)
     * @param string $id_name : id property name returned by model (usually "id")
     * @param string $display_name : display property name returned by model (sometime "titre")
     * @param string $default_name : default property name returned by model (usually "default")
     * @param string $parent_field (optional): form parent field name for master data. Also used as parameter name for ajax queries (example: "agenda_id" for activity or place)
     * @param string $parent_field_group (optional): group for parent field (current group if not set either use empty string if no group name)
     *
     * @return array
     */
    protected function getAEOptions($class_names, $model_name = "", $method_name = "", $id_name, $display_name, $default_name, $parent_field = null, $parent_field_group = null)
    {
        //$params = JComponentHelper::getParams('com_allevents');
        $ajax_url = 'index.php?option=com_allevents&task=' . $model_name . '.' . $method_name;
        if (!is_null($parent_field)) {
            $parent_field_group = is_null($parent_field_group) ? $this->group : $parent_field_group;
            $parent_field_group = is_null($parent_field_group) ? '' : $parent_field_group;
            $parent_field_name = $this->formControl . '_' . ($parent_field_group == '' ? '' : $parent_field_group . '_') . $parent_field;
        } else {
            $parent_field_name = null;
        }
        $default_id = $this->element->attributes()['default'];

        // Build the js script
        $script = [];
        $script[] = 'function update_' . $this->id . '_classes() {';
        $script[] = '    sourceEntity=jQuery("#' . $this->id . ' option:selected");';
        $script[] = '    targetEntity=jQuery("#' . $this->id . '_chzn").find("span");';
        $script[] = '    targetEntity.removeClass()';
        $script[] = '    targetEntity.addClass(sourceEntity.attr("class"));';
        $script[] = '}';
        $script[] = 'jQuery(document).ready(function() {';
        if (!is_null($parent_field)) {
            $script[] = '    jQuery("#' . $parent_field_name . '").chosen().change(function(event) {';
            $script[] = '        var selectedValue=jQuery("#' . $parent_field_name . '").val();';
            $script[] = '        jQuery.ajax({';
            $script[] = '            type: "POST",';
            $script[] = '            url: "' . $ajax_url . '",';
            $script[] = '            dataType: "json",';
            $script[] = '            data: {';
            $script[] = '                "ajax": 1,';
            $script[] = '                "' . $parent_field . '": selectedValue';
            $script[] = '            },';
            $script[] = '            success:';
            $script[] = '                function(data) {';
            // If default defined in form.xml or not
            if (is_null($default_id)) {
                $script[] = '                    var defaultId=0;';
                $script[] = '                    jQuery.each(data.data, function(id, result) {';
                $script[] = '                        if (result.' . $default_name . '==1 && result.' . $id_name . '>defaultId) {';
                $script[] = '                            defaultId=result.' . $id_name . ';';
                $script[] = '                        }';
                $script[] = '                    });';
                $script[] = '                    console.log("' . $this->fieldname . '"+": défault: "+defaultId);';
            } else {
                $script[] = '                    var defaultId=' . $default_id . ';';
            }
            $script[] = '                    jQuery("select#' . $this->id . ' option").remove()';
            // Adding default options from form.xml
            foreach ($this->element->xpath('option') as $option) {
                $option_value = (string)$option['value'];
                $option_text = JText::_((string)$option);
                $option_class = (string)$option['class'];
                if ($option_value == $default_id) {
                    $script[] = '                            var option=new Option("' . $option_text . '", "' . $option_value . '", true, true);';
                } else {
                    $script[] = '                            var option=new Option("' . $option_text . '", "' . $option_value . '");';
                }
                if (!is_null($option_class)) {
                    $script[] = '                    option.className="' . $option_class . '";';
                }
                $script[] = '                        jQuery("select#' . $this->id . '").append(option);';
            }
            $script[] = '                    jQuery.each(data.data, function(id, result) {';
            $script[] = '                        if (result.id==defaultId) {';
            $script[] = '                            var option=new Option(result.' . $display_name . ', result.' . $id_name . ', true, true);';
            $script[] = '                        } else {';
            $script[] = '                            var option=new Option(result.' . $display_name . ', result.' . $id_name . ');';
            $script[] = '                        }';
            foreach ($class_names as $class_name) {
                $script[] = '                        option.addClass("' . $class_name . '".replace("%d", result.id));';
            }
            $script[] = '                        jQuery("select#' . $this->id . '").append(option);';
            $script[] = '                    });';
            $script[] = '                    jQuery("#' . $this->id . '").trigger("liszt:updated");';
            $script[] = '                    update_' . $this->id . '_classes();';
            $script[] = '                },';
            $script[] = '            error:';
            $script[] = '                function(jqXHR, textStatus, errorThrown) {';
            $script[] = '                    alert("' . $this->fieldname . ': "+textStatus+JSON.stringify(errorThrown));';
            $script[] = '                }';
            $script[] = '        })';
            $script[] = '    });';
        }
        $script[] = '    jQuery("#' . $this->id . '").chosen().change(function(event) {';
        $script[] = '        update_' . $this->id . '_classes();';
        $script[] = '    });';
        $script[] = '    update_' . $this->id . '_classes();';
        $script[] = '});';

        // Add the js script to the document head.
        JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

        // Get data form model
        JModelLegacy::addIncludePath(JPATH_BASE . '/components/com_allevents/models', 'AllEventsModel');
        $model = JModelLegacy::getInstance($model_name, 'AllEventsModel');
        if (is_null($parent_field)) {
            $items = $model->$method_name();
        } else {
            $source_id = $this->form->getValue($parent_field, $parent_field_group);
            $source_id = empty($source_id) ? 0 : $source_id;
            $items = $model->$method_name($source_id);
            //var dump($parent_field, $parent_field, $source_id, $items);
        }

        // Build the field options (with default options first)
        $options = parent::getOptions();
        if (isset($items)) {
            foreach ($items as $item) {
                $option = new stdClass();
                $option->checked = false;
                $classes = "";
                foreach ($class_names as $class_name) {
                    $classes .= sprintf($class_name, $item->$id_name) . ' ';
                }
                $option->class = trim($classes);
                $option->disable = false;
                $option->selected = false;
                $option->text = $item->$display_name;
                $option->value = $item->$id_name;
                $options[] = $option;
            }
        }
        return $options;
    }
}
