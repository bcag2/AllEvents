<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();

if ($app->isSite()) {
    JSession::checkToken('get') or die(JText::_('JINVALID_TOKEN'));
}

if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('formbehavior.chosen', 'select');

$function = $app->input->getCmd('function', 'jSelectEvent');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>
<form
    action="<?php echo JRoute::_('index.php?option=com_allevents&view=events&layout=modal&tmpl=component&function=' . $function . '&' . JSession::getFormToken() . '=1'); ?>"
    method="post" name="adminForm" id="adminForm" class="form-inline">
    <fieldset class="filter">
        <div class="btn-toolbar">
            <div class="btn-group">
                <label for="filter_search">
                    <?php echo JText::_('JSEARCH_FILTER_LABEL'); ?>
                </label>
            </div>
            <div class="btn-group">
                <input type="text" name="filter_search" id="filter_search"
                       value="<?php echo $this->escape($this->state->get('filter.search')); ?>" size="30"
                       title="<?php echo JText::_('COM_CONTENT_FILTER_SEARCH_DESC'); ?>"/>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn hasTooltip"
                        title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>" data-placement="bottom">
                    <span class="icon-search"></span><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
                <button type="button" class="btn hasTooltip"
                        title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" data-placement="bottom"
                        onclick="document.getElementById('filter_search').value='';this.form.submit();">
                    <span class="icon-remove"></span><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
            </div>
        </div>
        <hr class="hr-condensed"/>
        <div class="filters">
            <select name="filter_access" class="input-medium" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('JOPTION_SELECT_ACCESS'); ?></option>
                <?php echo JHtml::_('select.options', JHtml::_('access.assetgroups'), 'value', 'text', $this->state->get('filter.access')); ?>
            </select>

            <select name="filter_state" class="input-medium" onchange="this.form.submit()">
                <option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED'); ?></option>
                <?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true); ?>
            </select>
            <?php if ($this->params['controlpanel_showagendas']) { ?>
                <select name="filter_agenda" class="input-medium" onchange="this.form.submit()">
                    <option
                        value=""><?php echo JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('AGENDA')); ?></option>
                    <?php echo JHtml::_('select.options', $this->get('Agendas'), 'value', 'text', $this->state->get('filter.agenda')); ?>
                </select>
            <?php } ?>
        </div>
    </fieldset>

    <?php if (empty($this->items)) : ?>
        <div class="alert alert-no-items">
            <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
        </div>
    <?php else : ?>
        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th class="title">
                    <?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder); ?>
                </th>
                <th width="15%" class="center nowrap">
                    <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ACCESS', 'access_level', $listDirn, $listOrder); ?>
                </th>
                <th width="15%" class="center nowrap">
                    <?php echo JHtml::_('grid.sort', 'AGENDA', 'a.agenda_id', $listDirn, $listOrder); ?>
                </th>
                <?php if (JLanguageMultilang::isEnabled()): ?>
                    <th width="10%" class="center nowrap">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_LANGUAGE', 'language', $listDirn, $listOrder); ?>
                    </th>
                <?php endif; ?>
                <th width="5%" class="center nowrap">
                    <?php echo JHtml::_('grid.sort', 'JDATE', 'a.created', $listDirn, $listOrder); ?>
                </th>
                <th width="1%" class="center nowrap">
                    <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="15">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <?php foreach ($this->items as $i => $item) : ?>
                <?php if ($item->language && JLanguageMultilang::isEnabled()) {
                    $tag = strlen($item->language);
                    if ($tag == 5) {
                        $lang = substr($item->language, 0, 2);
                    } elseif ($tag == 6) {
                        $lang = substr($item->language, 0, 3);
                    } else {
                        $lang = "";
                    }
                } elseif (!JLanguageMultilang::isEnabled()) {
                    $lang = "";
                }
                ?>
                <tr class="row<?php echo $i % 2; ?>">
                    <td>
                        <a href="javascript:void(0)"
                           onclick="if (window.parent) {window.parent.<?php echo $this->escape($function); ?>('<?php echo $item->id; ?>', '<?php echo $this->escape(addslashes($item->titre)); ?>', '<?php echo $this->escape($item->catid); ?>', null, '<?php echo $this->escape(AllEventsHelperRoute::getEventRoute($item->id, $item->catid)); ?>', '<?php echo $this->escape($lang); ?>', null);}">
                            <?php echo $this->escape($item->titre); ?></a>
                    </td>
                    <td class="center">
                        <?php echo $this->escape($item->access_level); ?>
                    </td>
                    <td class="center">
                        <?php echo $this->escape($item->agenda_titre); ?>
                    </td>
                    <?php if (JLanguageMultilang::isEnabled()): ?>
                        <td class="small hidden-phone">
                            <?php if ($item->language == '*'): ?>
                                <?php echo JText::alt('JALL', 'language'); ?>
                            <?php else: ?>
                                <?php echo $item->language ? $this->escape($item->language) : JText::_('JUNDEFINED'); ?>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                    <td class="center nowrap">
                        <?php echo JHtml::_('date', $item->date, JText::_('DATE_FORMAT_LC4')); ?>
                    </td>
                    <td class="center">
                        <?php echo (int)$item->id; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <div>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="boxchecked" value="0"/>
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>