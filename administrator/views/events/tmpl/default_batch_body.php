<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */
defined('_JEXEC') or die;
$published = $this->state->get('filter.published');
?>

<div class="row-fluid">
    <div class="control-group span6">
        <div class="controls">
            <?php echo JHtml::_('batch.language'); ?>
        </div>
    </div>
    <div class="control-group span6">
        <div class="controls">
            <?php echo JHtml::_('batch.access'); ?>
        </div>
    </div>
</div>

<div class="row-fluid">
    <?php if ($published >= 0) : ?>
        <div class="control-group span6">
            <div class="controls">
                <label id="batch-choose-action-lbl"
                       for="batch-choose-action"><?php echo JText::_('ALLEVENTS_BATCH_MENU_LABEL'); ?></label>
                <div id="batch-choose-action" class="control-group">
                    <select name="batch[agenda_id]" class="inputbox" id="batch-category-id">
                        <option value=""><?php echo JText::_('ALLEVENTS_BATCH_NO_AGENDA'); ?></option>
                        <?php
                        // Create the copy/move options.
                        $options = [
                            JHtml::_('select.option', 'c', JText::_('ALLEVENTS_BATCH_COPY')),
                            JHtml::_('select.option', 'm', JText::_('ALLEVENTS_BATCH_MOVE'))
                        ];
                        $db = JFactory::getDbo();
                        $db->setQuery("SELECT `id`, `titre`, `image_bullet` FROM `#__allevents_agenda` WHERE published = 1 ORDER BY 2");
                        $items = $db->loadObjectList();
                        foreach ($items as $item) {
                            echo '<option class="se_agenda_' . $item->id . '_bullet se_agenda_' . $item->id . '_color"  value="' . $item->id . '" >' . $item->titre . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div id="batch-copy-move" class="control-group radio">
                    <?php echo JText::_('ALLEVENTS_BATCH_MOVE_QUESTION'); ?>
                    <?php echo JHtml::_('select.radiolist', $options, 'batch[move_copy]', '', 'value', 'text', 'm'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
