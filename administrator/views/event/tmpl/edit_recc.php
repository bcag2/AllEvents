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
<div class="control-group" id="scheduling-options">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling'); ?>
    </div>
</div>
<div class="control-group" id="scheduling-options-end">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling_end_date'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_end_date'); ?>
    </div>
</div>
<div class="control-group" id="scheduling-options-interval">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling_interval'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_interval'); ?>
    </div>
</div>
<div class="control-group" id="scheduling-options-repeat_count">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling_repeat_count'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_repeat_count'); ?>
    </div>
</div>
<div class="control-group" id="scheduling-options-day">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling_daily_weekdays'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_daily_weekdays'); ?>
    </div>
</div>
<div class="control-group" id="scheduling-options-week">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling_weekly_days'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_weekly_days'); ?>
    </div>
</div>
<div class="control-group scheduling-options-month" id="scheduling-options-month-options">
    <div class="control-label">
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_monthly_options'); ?>
    </div>
</div>
<div class="control-group scheduling-options-month" id="scheduling-options-month-days">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling_monthly_days'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_monthly_days'); ?>
    </div>
</div>
<div class="control-group scheduling-options-month" id="scheduling-options-month-week">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling_monthly_week'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_monthly_week'); ?>
    </div>
</div>
<div class="control-group scheduling-options-month" id="scheduling-options-month-week-days">
    <div class="control-label">
        <?php echo $this->form->getLabel('scheduling_monthly_week_days'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('scheduling_monthly_week_days'); ?>
    </div>
</div>
<div class="control-group" id="scheduling-expert-button">
    <div class="control-label">
        <button type="button" class="btn"
                style="float:left;clear:left;"><?php echo JText::_('COM_ALLEVENTS_FIELD_SCHEDULING_EXPERT_LABEL'); ?></button>
    </div>
    <div class="controls">
    </div>
</div>
<div class="control-group" id="scheduling-rrule">
    <div class="control-label">
        <?php echo $this->form->getLabel('rrule'); ?>
    </div>
    <div class="controls">
        <?php echo $this->form->getInput('rrule'); ?>
    </div>
    <div class="control-label">
        <?php echo $this->form->getLabel('rruledates'); ?>
    </div>
    <div class="controls">
        <table id="eventdates"></table>
    </div>
</div>