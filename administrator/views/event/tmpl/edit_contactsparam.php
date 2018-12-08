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
    <h4><?php echo JText::_('COM_ALLEVENTS_CONTACTS_PARAMS'); ?></h4>
    <hr>
    <div class="span6 aeleft">
        <?php
        $fields_names = ['contact_libre_label', 'contact_libre_access',
            'contact_1_lbl', 'contact_1_type', 'contact_1_label', 'contact_1_access',
            'contact_2_lbl', 'contact_2_type', 'contact_2_label', 'contact_2_access',
            'contact_3_lbl', 'contact_3_type', 'contact_3_label', 'contact_3_access'];
        foreach ($fields_names as $field_name) {
            $standard_field = new AEStandardField($this->form, $field_name);
            echo $standard_field->getHtml();
        }
        ?>
    </div>
</div>