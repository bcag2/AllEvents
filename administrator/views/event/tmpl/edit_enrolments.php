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
<div id="container_enrolments" class="aepanel aeleft">
    <div class="row-fluid">
        <div class="aeleft">
            <?php echo $this->form->renderField('enrolment_enabled'); ?>
            <div class="span12 block_enrolment" style="margin-left:0!important;">
                <div class="span6 aeleft">
                    <?php if ($this->params['controlpanel_showpayments']) : ?>
                        <div class="control-group">
                            <div
                                class="control-label"><?php echo $this->form->getLabel('price'); ?></div>
                            <div class="controls">
                                <div class="input-append">
                                    <input type="text" class="validate-numeric input-small money"
                                           placeholder="<?php echo JText::_('AE_PRICE_TOOLTIP'); ?>"
                                           value="<?php echo $this->item->price; ?>"
                                           id="jform_price" name="jform[price]">
                                    <span
                                        class="add-on"><?php echo $this->params['addcurrency']; ?></span>
                                </div>
                                <span
                                    class="help-inline"><?php echo JText::_('AE_FREE_TICKET_MSG'); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php echo $this->form->renderField('enrolment_max_participant'); ?>
                    <?php echo $this->form->renderField('allow_overbooking'); ?>
                </div>
                <div class="span6 aeleft">
                    <?php echo $this->form->renderField('openingdate'); ?>
                    <?php echo $this->form->renderField('closingdate'); ?>
                </div>
            </div>
            <div class="span12 block_enrolment" style="margin-left:0!important;">
                <?php echo $this->form->renderField('enrolment_info'); ?>
            </div>
        </div>
    </div>
</div>