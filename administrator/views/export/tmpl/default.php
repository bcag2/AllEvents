<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('jquery.framework');
JHtml::_('behavior.modal');
JFormHelper::addFieldPath(JPATH_COMPONENT . '/models/fields');
JFormHelper::addFieldPath(JPATH_SITE . '/administrator/components/com_allevents/models/fields');

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

?>

<form action="index.php" method="post" name="adminForm" enctype="multipart/form-data" id="adminForm">
    <?php if (isset($this->sidebar)) : ?>
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
        <?php endif; ?>

        <div class="span5">
            <fieldset class="adminform form-horizontal">
                <legend><?php echo JText::_('COM_ALLEVENTS_TITLE_EVENTS'); ?></legend>

                <?php foreach ($this->form->getFieldset('csv') as $field) : ?>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $field->label; ?>
                        </div>
                        <div class="controls">
                            <?php echo $field->input; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="control-group">
                    <div class="control-label"><label></label></div>
                    <div class="controls">
                        <button class="btn btn-small" type="submit" name="exportevents" id="exportevents"
                                onclick="document.getElementsByName('task')[0].value='export.exportevents';return true;">
                            <i
                                class='fa fa-file-excel-o'></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_EXPORT_FILE'); ?>
                        </button>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="span5">
            <fieldset class="adminform form-horizontal">
                <legend><?php echo JText::_('COM_ALLEVENTS_TITLE_OTHERS'); ?></legend>

                <div class="control-group">
                    <div class="control-label"><label><?php echo JText::_('COM_ALLEVENTS_TITLE_CATEGORIES'); ?></label>
                    </div>
                    <div class="controls">
                        <button class="btn btn-small" type="submit" name="exportcategories" id="exportcategories"
                                onclick="document.getElementsByName('task')[0].value='export.exportcategories';return true;">
                            <i class='fa fa-file-excel-o'></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_EXPORT_FILE'); ?>
                        </button>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label"><label><?php echo JText::_('COM_ALLEVENTS_TITLE_AGENDAS'); ?></label>
                    </div>
                    <div class="controls">
                        <button class="btn btn-small" type="submit" name="exportagendas" id="exportagendas"
                                onclick="document.getElementsByName('task')[0].value='export.exportagendas';return true;">
                            <i class='fa fa-file-excel-o'></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_EXPORT_FILE'); ?>
                        </button>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label"><label><?php echo JText::_('COM_ALLEVENTS_TITLE_PLACES'); ?></label>
                    </div>
                    <div class="controls">
                        <button class="btn btn-small" type="submit" name="exportplaces" id="exportplaces"
                                onclick="document.getElementsByName('task')[0].value='export.exportplaces';return true;">
                            <i class='fa fa-file-excel-o'></i>&nbsp;<?php echo JText::_('COM_ALLEVENTS_EXPORT_FILE'); ?>
                        </button>
                    </div>
                </div>
            </fieldset>
        </div>
        <?php if (isset($this->sidebar)) : ?>
    </div>
<?php endif; ?>

    <input type="hidden" name="option" value="com_allevents"/>
    <input type="hidden" name="view" value="export"/>
    <input type="hidden" name="controller" value="export"/>
    <input type="hidden" name="task" value=""/>
</form>