<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

// No direct access to this file
defined('_JEXEC') or die;

$app = JFactory::getApplication();

// Access Administration Customfields check.
if (JFactory::getUser()->authorise('core.admin', 'com_allevents')) {
    $user = JFactory::getUser();
    $userId = $user->get('id');
    $listOrder = $this->escape($this->state->get('list.ordering'));
    $listDirn = $this->escape($this->state->get('list.direction'));
    $canOrder = $user->authorise('core.edit.state', 'com_allevents');

    $saveOrder = $listOrder == 'a.ordering';

    // Include the component HTML helpers.
    JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
    JHtml::_('bootstrap.tooltip');
    JHtml::_('behavior.multiselect');
    JHtml::_('formbehavior.chosen', 'select');
    JHtml::_('dropdown.init');

    $extension = $this->escape($this->state->get('filter.extension'));
    $archived = $this->state->get('filter.published') == 2 ? true : false;
    $trashed = $this->state->get('filter.published') == -2 ? true : false;

    if ($saveOrder) {
        $saveOrderingUrl = 'index.php?option=com_allevents&task=customfields.saveOrderAjax&tmpl=component';
        JHtml::_('sortablelist.sortable', 'customfieldsList', 'adminForm', strtolower($listDirn), $saveOrderingUrl, false, true);
    }
    $sortFields = [];
    ?>
    <script type="text/javascript">
        Joomla.orderTable = function () {
            var table = document.getElementById("sortTable");
            var direction = document.getElementById("directionTable");
            var order = table.options[table.selectedIndex].value;
            var dirn = "";
            if (order == '<?php echo $listOrder; ?>') {
                dirn = direction.options[direction.selectedIndex].value;
            } else {
                dirn = 'asc';
            }
            Joomla.tableOrdering(order, dirn, '');
        }
    </script>

    <form action="<?php echo JRoute::_('index.php?option=com_allevents&view=customfields'); ?>" method="post"
          name="adminForm" id="adminForm">
        <?php if (!empty($this->sidebar)) : ?>
        <div id="j-sidebar-container" class="span2">
            <?php echo $this->sidebar; ?>
        </div>
        <div id="j-main-container" class="span10">
            <?php else : ?>
            <div id="j-main-container">
                <?php endif;
                ?>

                <?php echo JLayoutHelper::render('joomla.searchtools.default', ['view' => $this]); ?>

                <?php if (empty($this->items)) : ?>
                    <div class="alert alert-no-items">
                        <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
                    </div>
                <?php else : ?>
                    <table class="table table-striped" id="customfieldsList">
                        <thead>
                        <tr>
                            <th width="1%" class="hidden-phone">
                                <?php echo JHtml::_('grid.checkall'); ?>
                            </th>
                            <?php if (isset($this->items[0]->published)): ?>
                                <th width="1%" class="nowrap center">
                                    <?php echo JHtml::_('searchtools.sort', 'JSTATUS', 'a.published', $listDirn, $listOrder); ?>
                                </th>
                            <?php endif; ?>
                            <th>
                                <?php echo JHtml::_('searchtools.sort', 'COM_ALLEVENTS_TITRE', 'a.titre', $listDirn, $listOrder); ?>
                            </th>
                            <th>
                                <?php echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_SLUG_LBL'); ?>
                            </th>
                            <th>
                                <?php echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_PARENT_FORM_LBL'); ?>
                            </th>
                            <th>
                                <?php echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_TYPE_LBL'); ?>
                            </th>
                            <th>
                                <?php echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_REQUIRED_LBL'); ?>
                            </th>
                            <?php if (isset($this->items[0]->id)): ?>
                                <th width="1%" class="nowrap center hidden-phone">
                                    <?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                                </th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td colspan="10">
                                <?php echo $this->pagination->getListFooter(); ?>
                            </td>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($this->items as $i => $item) :
                            $ordering = ($listOrder == 'a.ordering');
                            $canCreate = $user->authorise('core.create', 'com_allevents');
                            $canEdit = $user->authorise('core.edit', 'com_allevents');
                            $canCheckin = $user->authorise('core.manage', 'com_allevents');
                            $canChange = $user->authorise('core.edit.state', 'com_allevents');
                            $canEditOwn = $user->authorise('core.edit.own', 'com_allevents');
                            ?>

                            <tr class="row<?php echo $i % 2; ?>">
                                <td class="center hidden-phone">
                                    <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                                </td>

                                <?php if (isset($this->items[0]->published)) { ?>
                                    <td class="center">
                                        <?php echo JHtml::_('jgrid.published', $item->published, $i, 'customfields.', $canChange, 'cb'); ?>
                                    </td>
                                <?php } ?>

                                <td class="nowrap has-context">
                                    <div class="pull-left">
                                        <?php if ($item->checked_out) : ?>
                                            <?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'customfields.', $canCheckin); ?>
                                        <?php endif; ?>
                                        <?php //if ($item->language == '*'):
                                        ?>
                                        <?php //$language = JText::alt('JALL', 'language'); 
                                        ?>
                                        <?php //else:
                                        ?>
                                        <?php //$language = $item->language ? $this->escape($item->language) : JText::_('JUNDEFINED'); 
                                        ?>
                                        <?php //endif;
                                        ?>
                                        <?php if ($canEdit) : ?>
                                            <a href="<?php echo JRoute::_('index.php?option=com_allevents&task=customfield.edit&id=' . $item->id); ?>"
                                               title="<?php echo JText::_('JACTION_EDIT'); ?>">
                                                <?php echo $this->escape($item->titre); ?></a>
                                        <?php else : ?>
                                            <span
                                                title="<?php echo JText::sprintf('JFIELD_ALIAS_LABEL', $this->escape($item->alias)); ?>"><?php echo $this->escape($item->titre); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pull-left">
                                        <?php
                                        // Create dropdown items
                                        /*JHtml::_('dropdown.edit', $item->id, 'customfield.');
                                        JHtml::_('dropdown.divider');
        
                                        if ($item->published) :
                                            JHtml::_('dropdown.unpublish', 'cb' . $i, 'customfields.');
                                        else :
                                            JHtml::_('dropdown.publish', 'cb' . $i, 'customfields.');
                                        endif;
        
                                        JHtml::_('dropdown.divider');
        
                                        if ($archived) :
                                            JHtml::_('dropdown.unarchive', 'cb' . $i, 'customfields.');
                                        else :
                                            JHtml::_('dropdown.archive', 'cb' . $i, 'customfields.');
                                        endif;
        
                                        if ($item->checked_out) :
                                            JHtml::_('dropdown.checkIn', 'cb' . $i, 'customfields.');
                                        endif;
        
                                        if ($trashed) :
                                            JHtml::_('dropdown.untrash', 'cb' . $i, 'customfields.');
                                        else :
                                            JHtml::_('dropdown.trash', 'cb' . $i, 'customfields.');
                                        endif;
        
                                        // Render dropdown list
                                        echo JHtml::_('dropdown.render');*/
                                        ?>
                                    </div>
                                </td>

                                <td class="hidden-phone">
                                    <?php if ($item->slug) : ?>
                                        <?php echo $this->escape($item->slug); ?>
                                    <?php endif; ?>
                                </td>

                                <td class="hidden-phone">
                                    <?php
                                    if ($item->parent_form == 1) {
                                        echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_ENROL_FORM');
                                    } elseif ($item->parent_form == 2) {
                                        echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_EVENT_FORM');
                                    }
                                    ?>
                                </td>

                                <td class="hidden-phone">
                                    <?php
                                    if ($item->type == 'text') {
                                        echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_TYPE_TEXT');
                                    } elseif ($item->type == 'list') {
                                        echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_TYPE_LIST');
                                    } elseif ($item->type == 'radio') {
                                        echo JText::_('COM_ALLEVENTS_CUSTOMFIELD_TYPE_RADIO');
                                    }
                                    ?>
                                </td>

                                <td class="hidden-phone">
                                    <?php if ($item->required == 1) : ?>
                                        <?php echo JText::_('JYES'); ?>
                                    <?php else : ?>
                                        <?php echo JText::_('JNO'); ?>
                                    <?php endif; ?>
                                </td>
                                <?php if (isset($this->items[0]->id)) { ?>
                                    <td class="center hidden-phone">
                                        <?php echo (int)$item->id; ?>
                                    </td>
                                <?php } ?>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                <input type="hidden" name="task" value=""/>
                <input type="hidden" name="boxchecked" value="0"/>
                <?php echo JHtml::_('form.token'); ?>
            </div>
    </form>
    <?php
} else {
    $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'warning');
    $app->redirect(htmlspecialchars_decode('index.php?option=com_allevents&view=main'));
}