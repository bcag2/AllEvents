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
?>
<div class="aepanel aeleft">
    <div class="span6 aeleft">
        <?php
        $fields_names = [['contact_1_id', 'contact_1_label']
            , ['contact_1_details_id', 'contact_1_label']
            //#€ç
            , ['contact_1_comprofiler_id', 'contact_1_label']
            //ç€#
            , ['contact_2_id', 'contact_2_label']
            , ['contact_2_details_id', 'contact_2_label']
            //ç€#
            , ['contact_2_comprofiler_id', 'contact_2_label']
            //#€ç
            , ['contact_3_id', 'contact_3_label']
            , ['contact_3_details_id', 'contact_3_label']
            //#ç#
            , ['contact_3_comprofiler_id', 'contact_3_label']
            //#ç#
        ];
        foreach ($fields_names as $field_name) {
            $standard_field = new AEStandardField($this->form, $field_name[0]);
            $standard_field->setLabelField($field_name[1]);
            echo $standard_field->getHtml();
        }
        $standard_field = new AEStandardField($this->form, 'contact_libre');
        echo $standard_field->getHtml();
        ?>
    </div>
</div>