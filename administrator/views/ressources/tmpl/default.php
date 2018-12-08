<?php
/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');

$user = JFactory::getUser();
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$sortFields = $this->getSortFields();
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.nailthumb-container').nailthumb({width: 100, maxEnlargement: 1});
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&view=ressources', false); ?>" method="post"
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

                <table class="table table-striped" id="ressourceList">
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

                        <th class='left'>
                            <?php echo JHtml::_('searchtools.sort', 'COM_ALLEVENTS_TITRE', 'a.titre', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_DEFAULT'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_COULEUR'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_IMAGE_BULLET'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_LASTMOD'); ?>
                        </th>

                        <?php if (isset($this->items[0]->id)): ?>
                            <th width="1%" class="nowrap center hidden-phone">
                                <?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
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
                    <?php foreach ($this->items as $i => $item) :
                        $ordering = ($listOrder == 'a.ordering');
                        $canCreate = $user->authorise('core.satellites', 'com_allevents');
                        $canEdit = $user->authorise('core.satellites', 'com_allevents');
                        $canCheckin = $user->authorise('core.satellites', 'com_allevents');
                        $canChange = $user->authorise('core.satellites', 'com_allevents');
                        ?>
                        <tr class="row<?php echo $i % 2; ?>">

                            <td class="center hidden-phone">
                                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                            <?php if (isset($this->items[0]->published)): ?>
                                <td class="center">
                                    <?php echo JHtml::_('jgrid.published', $item->published, $i, 'ressources.', $canChange, 'cb'); ?>
                                </td>
                            <?php endif; ?>

                            <td>
                                <?php if (isset($item->checked_out) && $item->checked_out) : ?>
                                    <?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'ressources.', $canCheckin); ?>
                                <?php endif; ?>
                                <?php if ($canEdit) : ?>
                                    <a href="<?php echo JRoute::_('index.php?option=com_allevents&task=ressource.edit&id=' . (int)$item->id); ?>">
                                        <?php echo $this->escape($item->titre); ?></a>
                                <?php else : ?>
                                    <?php echo $this->escape($item->titre); ?>
                                <?php endif; ?>
                                <span class="small break-word">
                        <?php if (empty($item->note)) : ?>
                            <?php echo JText::sprintf('JGLOBAL_LIST_ALIAS', $this->escape($item->alias)); ?>
                        <?php else : ?>
                            <?php echo JText::sprintf('JGLOBAL_LIST_ALIAS_NOTE', $this->escape($item->alias), $this->escape($item->note)); ?>
                        <?php endif; ?>
                    </span>
                                <div
                                    class="small"> <?php echo ($item->nb_events == 0) ? '0 ' . JText::_('EVENT') : $item->nb_events . ' ' . JText::_('COM_ALLEVENTS_TITLE_EVENTS'); ?>
                                    <?php echo '<a rel="tooltip" data-original-title="' . JText::sprintf('COM_ALLEVENTS_FILTER', JText::_('COM_ALLEVENTS_LEGEND_RESSSOURCE')) . '" href="' . JRoute::_('index.php?option=com_allevents&view=events&filter_ressource=' . $item->id) . '"><i class="icon-share-alt hide-icon"></i></a>'; ?>
                                </div>
                            </td>
                            <td>
                                <?php
                                $hot = empty($item->default) ? 0 : $item->default;
                                echo JHtml::_('aeressource.featured', $hot, $i);
                                ?>
                            </td>
                            <td>
                                <div
                                    style="display:block; width:50px; height:40px; border-radius:5px; text-align:center; border-style: solid;<?php echo $item->couleur_texte; ?>;background:<?php echo $item->couleur; ?>;color:<?php echo $item->couleur_texte; ?>;">
                                    Text
                                </div>
                            </td>

                            <td>
                                <?php if ($item->image_bullet) : ?>
                                    <div class="nailthumb-container"><img
                                            src="<?php echo JUri::root(true) . '/' . $item->image_bullet; ?>"/></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo JHtml::date($item->lastmod, $this->params['gdatetime_format']); ?>
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

            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="boxchecked" value="0"/>


            <?php echo JHtml::_('form.token'); ?>
        </div>
</form>