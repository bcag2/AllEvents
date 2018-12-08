<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$user = JFactory::getUser();
$userId = $user->get('id');
require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/html/tickettype.php';
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$sortFields = $this->getSortFields();

if (!empty($this->extra_sidebar)) {
    $this->sidebar .= $this->extra_sidebar;
}
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        if (!(jQuery('.js-stools-btn-filter').hasClass('btn-primary'))) {
            jQuery('.js-stools-btn-filter').click();
        }
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&view=tickettypes', false); ?>" method="post"
      name="adminForm" id="adminForm">
    <?php if (!empty($this->sidebar)): ?>
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
        <?php else : ?>
        <div id="j-main-container">
            <?php endif; ?>

            <?php echo JLayoutHelper::render('joomla.searchtools.default', ['view' => $this]); ?>

            <?php if (empty($this->items)) : ?>
                <div class="alert alert-no-items">
                    <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
                </div>
            <?php else : ?>

                <table class="table table-striped" id="tickettypeList">
                    <thead>
                    <tr>
                        <th width="1%" class="hidden-phone">
                            <?php echo JHtml::_('grid.checkall'); ?>
                        </th>
                        <?php if (isset($this->items[0]->published)): ?>
                            <th width="1%" class="nowrap center">
                                <?php echo JHtml::_('searchtools.sort', 'JSTATUS', 't.published', $listDirn, $listOrder); ?>
                            </th>
                        <?php endif; ?>

                        <th class='left'>
                            <?php echo JHtml::_('searchtools.sort', 'EVENT', 't.event_id', $listDirn, $listOrder); ?>
                        </th>

                        <?php if (isset($this->items[0]->id)): ?>
                            <th width="1%" class="nowrap center hidden-phone">
                                <?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_ID', 't.id', $listDirn, $listOrder); ?>
                            </th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tfoot>
                    <?php
                    if (isset($this->items[0])) {
                        $colspan = count(get_object_vars($this->items[0]));
                    } else {
                        $colspan = 10;
                    }

                    ?>
                    <tr>
                        <td colspan="<?php echo $colspan ?>">
                            <?php echo $this->pagination->getListFooter(); ?>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach ($this->items as $i => $item) :
                        $canCreate = $user->authorise('core.satellites', 'com_allevents');
                        $canEdit = $user->authorise('core.satellites', 'com_allevents');
                        $canCheckin = $user->authorise('core.satellites', 'com_allevents');
                        $canChange = $user->authorise('core.satellites', 'com_allevents');
                        ?>
                        <tr class="row<?php echo $i % 2; ?>">

                            <td class="center hidden-phone">
                                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                            <td class="center">
                                <?php
                                $enabled = empty($item->published) ? 0 : $item->published;
                                echo JHtml::_('tickettype.enable_tickettype', $enabled, $i);
                                ?>
                            </td>
                            <td>
                                <div style="background:#E4E4E4; color:#777; padding: 2px 5px; border-radius: 5px;">
                                    <?php if ($canEdit) : ?>
                                        <a href="<?php echo JRoute::_('index.php?option=com_allevents&task=event.edit&id=' . (int)$item->event_id, false); ?>">
                                            <?php echo $this->escape($item->event_titre); ?></a>
                                    <?php else : ?>
                                        <?php echo $this->escape($item->event_titre); ?>
                                    <?php endif; ?>
                                    <span style="color:#3071a9;float:right;font-size:20px;">
                            <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=tickettypes&filter_event_id=' . (int)$item->event_id, false); ?>"
                               data-original-title="<?php echo JText::sprintf('COM_ALLEVENTS_FILTER', JText::_('EVENT')); ?>"
                               rel="tooltip">
                                <i class="fa fa-filter"></i>
                            </a>
                        </span>
                                </div>
                            </td>
                            <td>
                                <?php if ($canEdit) : ?>
                                    <a href="<?php echo JRoute::_('index.php?option=com_allevents&task=tickettype.edit&id=' . (int)$item->id, false); ?>">
                                        <?php echo $this->escape($item->id); ?></a>
                                <?php else : ?>
                                    <?php echo $this->escape($item->id); ?>
                                <?php endif; ?>
                            </td>

                            <?php if (isset($this->items[0]->id)): ?>
                                <td class="center hidden-phone">
                                    <?php echo (int)$item->id; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>

        </div>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="boxchecked" value="0"/>
        <?php echo JHtml::_('form.token'); ?>
</form>