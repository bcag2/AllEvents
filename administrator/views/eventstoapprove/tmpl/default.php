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

require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/html/event.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons.css');
$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');

$user = JFactory::getUser();
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$sortFields = $this->getSortFields();
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.nailthumb-container').nailthumb({
            width: 100,
            heigth: 100,
            method: 'resize',
            fitDirection: 'center,center',
            maxEnlargement: 1
        });
        if (!(jQuery('.js-stools-btn-filter').hasClass('btn-primary'))) {
            jQuery('.js-stools-btn-filter').click();
        }
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&view=eventstoapprove', false); ?>" method="post"
      name="adminForm" id="adminForm">
    <?php if (!empty($this->sidebar)): ?>
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
        <?php else : ?>
        <div id="j-main-container">
            <?php endif; ?>

            <?php
            echo JLayoutHelper::render('joomla.searchtools.default', ['view' => $this]);
            ?>

            <?php if (empty($this->items)) : ?>
                <div class="alert alert-no-items">
                    <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
                </div>
            <?php else : ?>

                <table class="table table-striped" id="eventList">
                    <thead>
                    <tr>
                        <th width="1%" class="hidden-phone">
                            <?php echo JHtml::_('grid.checkall'); ?>
                        </th>
                        <th width="1%" style="min-width:55px;" class="nowrap center">
                            <?php echo JHtml::_('searchtools.sort', 'JSTATUS', 'a.published', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left'>
                            <?php echo JHtml::_('searchtools.sort', 'COM_ALLEVENTS_TITRE', 'a.titre', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('AGENDA'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_VIGNETTE'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_EVENTS_DATE'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('ENDDATE'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_EVENTS_ENROLMENT_ENABLED'); ?>
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
                        $canCreate = $user->authorise('core.edit', 'com_allevents');
                        $canEdit = $user->authorise('core.edit', 'com_allevents');
                        $canCheckin = $user->authorise('core.edit', 'com_allevents');
                        $canChange = $user->authorise('core.edit', 'com_allevents');
                        $archived = $this->state->get('filter.published') == 2 ? true : false;
                        $trashed = $this->state->get('filter.published') == -2 ? true : false;
                        ?>
                        <tr class="row<?php echo $i % 2; ?>">
                            <td class="center hidden-phone">
                                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <?php echo JHtml::_('jgrid.published', $item->published, $i, 'events.', $canChange, 'cb', '', ''); ?>
                                    <?php echo JHtml::_('event.featured', $item->hot, $i, $canChange); ?>
                                    <?php
                                    // Create dropdown items
                                    $action = $archived ? 'unarchive' : 'archive';
                                    JHtml::_('actionsdropdown.' . $action, 'cb' . $i, 'events');

                                    $action = $trashed ? 'untrash' : 'trash';
                                    JHtml::_('actionsdropdown.' . $action, 'cb' . $i, 'events');

                                    // Render dropdown list
                                    echo JHtml::_('actionsdropdown.render', $this->escape($item->titre));
                                    ?>
                                </div>
                            </td>

                            <td>
                                <?php if (isset($item->checked_out) && $item->checked_out) : ?>
                                    <?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'events.', $canCheckin); ?>
                                <?php endif; ?>
                                <?php if ($canEdit) : ?>
                                    <a href="<?php echo JRoute::_('index.php?option=com_allevents&task=event.edit&id=' . (int)$item->id, false); ?>">
                                        <?php echo $this->escape($item->titre); ?></a>
                                <?php else : ?>
                                    <?php echo $this->escape($item->titre); ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($item->agenda_id) : ?>
                                    <?php echo "<span class='se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'>" . $item->agenda_titre . "<br/></span>" ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($item->vignette) : ?>
                                    <div class="nailthumb-container">
                                        <?php if ($item->vignette) : ?>
                                            <?php if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $item->vignette)) : ?>
                                                <img src="<?php echo $item->vignette; ?>"/>
                                            <?php else : ?>
                                                <img src="<?php echo JUri::root(true) . '/' . $item->vignette; ?>"/>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <img
                                                src="<?php echo JUri::root(true) . '/media/com_allevents/css/images/no_photo.png'; ?>"/>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                if ($item->allday) {
                                    echo JHtml::date($item->date, $this->params['gdate_format']);
                                } else {
                                    echo JHtml::date($item->date, $this->params['gdatetime_format']);
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($item->allday) {
                                    echo JHtml::date($item->enddate, $this->params['gdate_format'], false);
                                } else {
                                    echo JHtml::date($item->enddate, $this->params['gdatetime_format'], false);
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $enrolment_enabled = empty($item->enrolment_enabled) ? 0 : $item->enrolment_enabled;
                                echo JHtml::_('event.enrolment_enabled', $enrolment_enabled, $i);
                                ?>
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