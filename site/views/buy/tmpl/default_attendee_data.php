<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

$document = JFactory::getDocument();
?>
<form name="attendee_field_form" action="" id="attendee_field_form" class="form-validate">
    <?php
    $eventid = $post->get('eventid', '', 'INT');
    $ticketypeobj = $this->alleventsmainhelper->GetTicketTypes($eventid);
    $ticket_type_arr = [];

    foreach ($ticketypeobj AS $key => $value) {
        $ticket_type_arr[$value->id] = $value->title;
    }

    $date_format_to_show = JText::_('COM_ALLEVENTS_DATE_FORMAT');
    $i = 0;
    foreach ($this->orderitems AS $key => $oitem) {
        if ($this->fields) {
            ?>
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-horizontal">
                        <!-- Start of Repeating Div -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 com_allevents_repeating_block_attendee1"
                             id="com_allevents_repeating_block<?php echo $i; ?>">
                            <h4> <?php echo JText::_('COM_ALLEVENTS_ATTENDEE_INFORMATION'); ?></h4>
                            <input type="hidden" id="attendee_field[<?php echo $i; ?>][order_items_id]"
                                   name="attendee_field[<?php echo $i; ?>][order_items_id]" placeholder=""
                                   value="<?php if (isset($oitem->id)) echo $oitem->id; ?>">
                            <input type="hidden" id="attendee_field[<?php echo $i; ?>][ticket_type]"
                                   name="attendee_field[<?php echo $i; ?>][ticket_type]" placeholder=""
                                   value="<?php if (isset($oitem->id)) echo $oitem->type_id; ?>">
                            <input type="hidden" id="attendee_field[<?php echo $i; ?>][attendee_id]"
                                   name="attendee_field[<?php echo $i; ?>][attendee_id]" placeholder=""
                                   value="<?php if (isset($oitem->attendee_id)) echo $oitem->attendee_id; ?>">
                            <div class="form-group">
                                <label class=" col-lg-2 col-md-2 col-sm-3 col-xs-12 control-label" for=""
                                       title=""><?php echo JText::_('TICKET_TYPE'); ?></label>
                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                    <b><?php echo $ticket_type_arr[$oitem->type_id]; ?></b>
                                </div>
                            </div>
                            <?php
                            if (!empty($this->fields['universal_attendee_fields']) and !empty($this->fields['attendee_fields'])) {
                                $allfields = array_merge((array)$this->fields['core_fields'], (array)$this->fields['universal_attendee_fields'], (array)$this->fields['attendee_fields']);
                            } else if (!empty($this->fields['attendee_fields'])) {
                                $allfields = array_merge((array)$this->fields['core_fields'], (array)$this->fields['attendee_fields']);
                            } else if (!empty($this->fields['universal_attendee_fields'])) {
                                $allfields = array_merge((array)$this->fields['core_fields'], (array)$this->fields['universal_attendee_fields']);
                            } else {
                                $allfields = $this->fields['core_fields'];
                            }

                            foreach ($allfields AS $akey => $field) {
                                // Important trick for universal fields, this is needed to save fields based on id(event specific) & name(universal)
                                if (isset($field->is_universal) && $field->is_universal) {
                                    $field->id = $field->name;
                                }

                                ?>
                                <div class="form-group">
                                    <div class="">
                                        <label for="<?php echo "attendee_field_" . $field->id . "_" . $i; ?>"
                                               class=" col-lg-2 col-md-2 col-sm-3 col-xs-12 control-label">
                                            <?php
                                            // Show required fields
                                            if ($field->required) {
                                                echo JHtml::tooltip(JText::_($field->label), JText::_($field->label), '', '* ' . JText::_($field->label));
                                            } else {
                                                echo JHtml::tooltip(JText::_($field->label), JText::_($field->label), '', JText::_($field->label));
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="">
                                        <?php
                                        $flag = 0;
                                        $name = $field->name;

                                        if (isset($field->options)) {
                                            $field_options = explode("|", $field->options);
                                            $att_fld_default_sel_opt = explode("|", $field->default_selected_option);
                                        }


                                        switch ($field->type) {
                                        case 'text':
                                            ?>
                                        <input type="<?php echo $field->type; ?>"
                                               id="attendee_field_<?php echo $field->id; ?>_<?php echo $i; ?>"
                                            <?php if ($field->js_function) echo $field->js_function; ?>
                                               class="<?php if ($field->required) echo "required";
                                               echo $field->validation_class; ?>"
                                               name="attendee_field[<?php echo $i; ?>][<?php echo $field->id; ?>]"
                                               placeholder="<?php if (isset($field->placehoder)) $field->placehoder;
                                               else  echo $field->label ?>"
                                               value="<?php if (isset($final_order_items_value[$oitem->attendee_id][$field->name])) echo $final_order_items_value[$oitem->attendee_id][$field->name]; ?>">
                                        <?php
                                        break;
                                        case 'textarea':
                                        ?>
                                            <textarea
                                                id="attendee_field_<?php echo $field->id; ?>_<?php echo $i; ?>" <?php if ($field->js_function) echo $field->js_function; ?>
                                                class="<?php if ($field->required) echo "required";
                                                echo $field->validation_class; ?>"
                                                name="attendee_field[<?php echo $i; ?>][<?php echo $field->id; ?>]"
                                                placeholder="<?php if (isset($field->placehoder)) $field->placehoder;
                                                else  echo $field->label ?>"><?php if (isset($final_order_items_value[$oitem->attendee_id][$field->name])) echo $final_order_items_value[$oitem->attendee_id][$field->name]; ?></textarea>
                                        <?php
                                        break;
                                        case 'calendar':

                                        $date = '';
                                        if (isset($final_order_items_value[$oitem->attendee_id][$field->name])) {
                                            $date = JFactory::getDate($final_order_items_value[$oitem->attendee_id][$field->name])->format(JText::_('COM_ALLEVENTS_DATE_FORMAT_SHOW_SHORT'));
                                        }

                                        $calendar_field_id = '';
                                        $calendar_field_id = "attendee_field[" . $i . "][" . $field->id . "]";
                                        //Bind calendar events to field
                                        $calenderScript = 'window.addEvent(\'domready\', function() {Calendar.setup({
                                 inputField: "' . $calendar_field_id . '",          // id of the input field
                                 ifFormat: "%Y-%m-%d",        // format of the input field
                                 button: "' . $calendar_field_id . '_img",          // trigger for the calendar (button ID)
                                 align: "Tl",                            // alignment (defaults to "Bl")
                                 singleClick: true
                           });});';
                                        ?>
                                            <span class="date_field">
                     <?php
                     echo JHtml::_('calendar',
                         $date,
                         "attendee_field[" . $i . "][" . $field->id . "]",
                         "attendee_field[" . $i . "][" . $field->id . "]",
                         JText::_('COM_ALLEVENTS_DATE_FORMAT_CALENDER')
                     );
                     ?>
                     </span>
                                        <?php $document->addScriptDeclaration($calenderScript); ?>
                                            <script>
                                                <?php echo $calenderScript; ?>
                                            </script>
                                        <?php
                                        break;
                                        case 'single_select':
                                        case 'multi_select':
                                        $multiple_select_string = '';
                                        if ($field->type == "multi_select")
                                            $multiple_select_string = "multiple='multiple'";
                                        ?>
                                            <select
                                                class="<?php echo "chzn-done";
                                                echo $field->validation_class ?>"
                                                <?php if (isset($multiple_select_string)) echo $multiple_select_string; ?>
                                                name="attendee_field[<?php echo $i; ?>][<?php echo $field->id; ?>][]"
                                                id="attendee_field_<?php echo $field->id; ?>_<?php echo $i; ?>">
                                                <?php
                                                $field_options_str = $field->default_selected_option;

                                                if (!empty($field_options_str)) {
                                                    $field_val_array = explode("|", $final_order_items_value[$oitem->attendee_id][$field->name]);

                                                    //Universal Fields returns array
                                                    if (is_array($field_options_str)) {
                                                        $field_options = $field_options_str;
                                                    } else {
                                                        $field_options = explode("|", $field_options_str);
                                                    }

                                                    foreach ($field_options AS $option) {
                                                        $selected_str = '';
                                                        if (is_array($field_options_str)) {
                                                            if (isset($final_order_items_value[$oitem->attendee_id][$field->name]) and in_array($option->value, $field_val_array)) {
                                                                $selected_str = 'selected="selected"';
                                                            }

                                                        } else {
                                                            if (isset($final_order_items_value[$oitem->attendee_id][$field->name]) and in_array($option, $field_val_array)) {
                                                                $selected_str = 'selected="selected"';
                                                            }

                                                        }


                                                        ?>
                                                        <option <?php if (!empty($selected_str)) echo $selected_str; ?>
                                                            value="<?php if (is_array($field_options_str)) echo $option->value;
                                                            else echo $option; ?>"><?php if (is_array($field_options_str)) echo $option->options;
                                                            else echo $option; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        <?php
                                        break;

                                        case 'radio':
                                        $j = 0;

                                        if (!is_array($field->default_selected_option))
                                        {
                                        $field_options_str = $field->default_selected_option;
                                        $field_options = explode("|", $field_options_str);
                                        $selected_str = "checked='checked'";

                                        if (!empty($field_options))
                                        {
                                        foreach ($field_options AS $option)
                                        {
                                        if (!empty($final_order_items_value) and $final_order_items_value[$oitem->attendee_id][$field->name] == $option) {
                                            $selected_str = "checked='checked'";
                                        }

                                        $j++;

                                        ?>
                                        <input <?php if (!empty($selected_str)) echo $selected_str; ?>
                                            type="radio"
                                            id="<?php echo "attendee_field_" . $field->id . $j; ?>"
                                            name="attendee_field[<?php echo $i; ?>][<?php echo $field->id; ?>]"
                                            value="<?php echo $option; ?>"
                                            class="<?php echo $field->validation_class; ?>">
                                            <?php echo $option; ?>
                                            &nbsp;
                                            <?php
                                        }
                                        }
                                        }
                                        else {
                                            //$field_options_str = ;
                                            $field_options = $field->default_selected_option;

                                        if (!empty($field_options)) {
                                            $selected_str = "checked='checked'";

                                        foreach ($field_options AS $option) {
                                            if (!empty($final_order_items_value) and $final_order_items_value[$oitem->attendee_id][$field->name] == $option) {
                                                $selected_str = "checked='checked'";
                                            } else {

                                                if ($option->default_option == 1) {
                                                    $selected_str = "checked='checked'";
                                                }

                                            }

                                            $j++;

                                            ?>
                                        <input <?php if (!empty($selected_str)) echo $selected_str; ?>
                                            type="radio"
                                            id="<?php echo "attendee_field_" . $field->id . $j; ?>"
                                            name="attendee_field[<?php echo $i; ?>][<?php echo $field->id; ?>]"
                                            value="<?php echo $option->value; ?>"
                                            class="<?php echo $field->validation_class; ?>">
                                            <?php echo $option->options; ?>
                                            &nbsp;
                                        <?php
                                        }
                                        }
                                        }

                                        //break;
                                        break;
                                        case   'default':
                                        case   '':
                                        ?>
                                        <input
                                            type="<?php echo $field->type; ?>"
                                            id="attendee_field_<?php echo $field->id; ?>_<?php echo $i; ?>"
                                            <?php if ($field->js_function) echo $field->js_function; ?>
                                            class="<?php if ($field->required) echo "required";
                                            echo $field->validation_class; ?>"
                                            name="attendee_field[<?php echo $i; ?>][<?php echo $field->id; ?>]"
                                            placeholder="<?php if (isset($field->placehoder)) $field->placehoder;
                                            else  echo $field->label ?>"
                                            value="">
                                            <?php
                                            break;

                                        }// End Switch

                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <hr class="hr hr-condensed"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Repeating Div -->
            <?php
        } // End IF
        $i++;
    }//for each
    ?>
</form>
