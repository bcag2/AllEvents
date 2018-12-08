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

JHtml::addIncludePath(JPATH_SITE . '/administrator/components/com_allevents/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

// €#€
if (!class_exists('AllEventsCustomfields'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aecustomfields.php';
// €#€
require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/html/enrolment.php';

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$user = JFactory::getUser();
$userId = $user->get('id');
// $canCreate = $user->authorise('core.satellites', 'com_allevents');
$canEdit = $user->authorise('core.satellites', 'com_allevents');
// $canCheckin = $user->authorise('core.satellites', 'com_allevents');
$canChange = $user->authorise('core.satellites', 'com_allevents');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$sortFields = $this->getSortFields();

if (!empty($this->extra_sidebar)) {
    $this->sidebar .= $this->extra_sidebar;
}
?>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&view=enrolments', false); ?>" method="post"
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

                <table class="table table-striped" id="enrolmentList">
                    <thead>
                    <tr>
                        <th width="1%" class="hidden-phone">
                            <?php echo JHtml::_('grid.checkall'); ?>
                        </th>
                        <?php if (isset($this->items[0]->published)): ?>
                            <th width="1%" class="nowrap center">
                                <?php echo JHtml::_('searchtools.sort', 'JSTATUS', 'e.published', $listDirn, $listOrder); ?>
                            </th>
                        <?php endif; ?>

                        <th class='left'>
                            <?php echo JHtml::_('searchtools.sort', 'EVENT', 'e.titre', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left'>
                            <?php echo JHtml::_('searchtools.sort', 'COM_ALLEVENTS_ENROLMENTS_USER_NAME', 'user_id.name', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left'>
                            <?php echo JHtml::_('searchtools.sort', '#', 'en.rank', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left'>
                            <?php echo JHtml::_('searchtools.sort', 'COM_ALLEVENTS_ENROLMENTS_ENROLDATE', 'en.enroldate', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_ENROLTYPE'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_COMPANIONS_TITLE'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JText::_('COM_ALLEVENTS_LASTMOD'); ?>
                        </th>
                        <?php if (isset($this->items[0]->id)): ?>
                            <th width="1%" class="nowrap center hidden-phone">
                                <?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_ID', 'en.id', $listDirn, $listOrder); ?>
                            </th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tfoot>
                    <?php $colspan = (isset($this->items[0])) ? count(get_object_vars($this->items[0])) : 10; ?>
                    <tr>
                        <td colspan="<?php echo $colspan ?>">
                            <?php echo $this->pagination->getListFooter(); ?>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach ($this->items as $i => $item) :
                        // $archived    = $this->state->get('filter.published') == 2 ? true : false;
                        // $trashed    = $this->state->get('filter.published') == -2 ? true : false;

// #€#
                        // Load Custom fields DATA
                        $customfields = AllEventsCustomfields::getListNotEmpty($item->id);
                        // if ($customfields) :
                        // foreach ($customfields AS $customfield) :
                        // $cf_value = isset($customfield->cf_value) ? $customfield->cf_value : JText::_('AE_NOT_SPECIFIED');
                        // echo '<div class="small">' ;
                        // echo $customfield->cf_title . ': <strong>' . $cf_value . '</strong>';
                        // echo '</div>' ;
                        // endforeach;
                        // endif;
// #€#

                        ?>
                        <tr class="row<?php echo $i % 2; ?>">

                            <td class="center hidden-phone">
                                <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                            <td class="center">
                                <?php
                                $enabled = empty($item->published) ? 0 : $item->published;
                                echo JHtml::_('enrolment.enable_enrolment', $enabled, $i);
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
                            <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=enrolments&filter_event_id=' . (int)$item->event_id, false); ?>"
                               data-original-title="<?php echo JText::sprintf('COM_ALLEVENTS_FILTER', JText::_('EVENT')); ?>"
                               rel="tooltip">
                                <i class="fa fa-filter"></i>
                            </a>
                        </span>
                                    <div class="small">
                                        <i class="fa fa-clock-o"></i>
                                        <?php
                                        if ($item->event_allday == "1") {
                                            echo JHtml::date($item->event_date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->event_enddate, $this->params['gdate_format']);
                                        } else {
                                            echo JHtml::date($item->event_date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->event_enddate, $this->params['gdatetime_format']);
                                        }
                                        ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php if ($canEdit) : ?>
                                    <a href="<?php echo JRoute::_('index.php?option=com_allevents&task=enrolment.edit&id=' . (int)$item->id, false); ?>">
                                        <?php echo $this->escape($item->user_name); ?></a>
                                <?php else : ?>
                                    <?php echo $this->escape($item->user_name); ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo $item->rank; ?>
                            </td>
                            <td>
                                <?php echo JHtml::date($item->enroldate, $this->params['gdatetime_format']); ?>
                            </td>
                            <td>
                                <?php echo JHtml::_('enrolment.enrolment_enroltype', $item->enroltype, $i, $canChange); ?>
                                <?php echo empty($item->commentaire) ? '' : '<i style="color:#3071a9" class="fa fa-comment" title="' . $item->commentaire . '"></i>'; ?>
                            </td>
                            <td>
                                <?php echo $item->companions; ?>
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
        </div>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="boxchecked" value="0"/>
        <?php echo JHtml::_('form.token'); ?>
</form>

<script type="text/javascript">
    jQuery(document).ready(function () {
        if (!(jQuery('.js-stools-btn-filter').hasClass('btn-primary'))) {
            jQuery('.js-stools-btn-filter').click();
        }
    });
</script>