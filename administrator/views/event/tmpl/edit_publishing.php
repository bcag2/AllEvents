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
<div id="container_publishing" class="aepanel aeleft">
    <div class="row-fluid">
        <div class="span6 aeleft">
            <?php echo $this->form->renderField('created_date'); ?>
            <?php echo $this->form->renderField('proposed_by'); ?>
            <?php echo $this->form->renderField('lastmod'); ?>
            <?php echo $this->form->renderField('lastmod_by'); ?>
            <?php echo $this->form->renderField('version'); ?>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('hits'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('hits'); ?></div>
                <a onclick="document.id('jform_hits').value='0';" class="btn"><i
                        class="icon-refresh"></i> Reset <?php echo JText::_('JGLOBAL_HITS'); ?></a>
            </div>
            <?php echo $this->form->renderField('id'); ?>
        </div>
        <div class="span6 aeleft">
            <?php echo $this->form->renderField('publishingdate'); ?>
            <?php echo $this->form->renderField('expirationdate'); ?>
        </div>
    </div>
</div>