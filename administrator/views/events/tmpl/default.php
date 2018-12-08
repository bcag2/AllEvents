<?php
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/html/event.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons.css');
$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');

$user = JFactory::getUser();
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$sortFields = $this->getSortFields();

if (!empty($this->extra_sidebar)) {
    $this->sidebar .= $this->extra_sidebar;
}
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.eml_nailthumb-container50').nailthumb({
            width: 50,
            heigth: 50,
            method: 'resize',
            fitDirection: 'center center'
        });
        if (!(jQuery('.js-stools-btn-filter').hasClass('btn-primary'))) {
            jQuery('.js-stools-btn-filter').click();
        }
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_allevents&view=events', false); ?>" method="post"
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
                        <th class='left hidden-phone'>
                            <?php echo JText::_('COM_ALLEVENTS_VIGNETTE'); ?>
                        </th>
                        <th class='left'>
                            <?php echo JHtml::_('searchtools.sort', 'COM_ALLEVENTS_EVENTS_DATE', 'a.date', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left hidden-phone'>
                            <?php echo JHtml::_('searchtools.sort', 'COM_ALLEVENTS_EVENTS_PROPOSED_BY', 'a.proposed_by', $listDirn, $listOrder); ?>
                        </th>
                        <th class='left hidden-phone'>
                            <?php echo JText::_('COM_ALLEVENTS_EVENTS_ENROLMENT_ENABLED'); ?>
                        </th>
                        <th class='left hidden-phone'>
                            <?php echo JText::_('JGRID_HEADING_ACCESS'); ?>
                        </th>
                        <?php if (JLanguageMultilang::isEnabled()): ?>
                            <th width="5%" class="nowrap hidden-phone">
                                <?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_LANGUAGE', 'a.language', $listDirn, $listOrder); ?>
                            </th>
                        <?php endif; ?>
                        <th class='left hidden-phone'>
                            <?php echo JText::_('JGLOBAL_HITS'); ?>
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
                            <?php
                            if ($this->params['gdisplay_colors'] == 0) {
                                if ($item->agenda_id) {
                                    echo '<td class="center hidden-phone" style="background-color:' . $item->agenda_couleur . '">';
                                } else {
                                    echo '<td class="center hidden-phone">';
                                }
                            } elseif ($this->params['gdisplay_colors'] == 1) {
                                if ($item->activity_id) {
                                    echo '<td class="center hidden-phone" style="background-color:' . $item->activity_couleur . '">';
                                } else {
                                    echo '<td class="center hidden-phone">';
                                }
                            } elseif ($this->params['gdisplay_colors'] == 2) {
                                if ($item->category_id) {
                                    echo '<td class="center hidden-phone" style="background-color:' . $item->category_couleur . '">';
                                } else {
                                    echo '<td class="center hidden-phone">';
                                }
                            }
                            ?>
                            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                            </td>
                            <td class="center">
                                <div class="btn-group">
                                    <?php
                                    echo JHtml::_('jgrid.published', $item->published, $i, 'events.', $canChange, 'cb', $item->publishingdate, $item->expirationdate);
                                    echo JHtml::_('event.featured', $item->hot, $i, $canChange);
                                    echo JHtml::_('event.approved', $item->proposal, $i, $canChange);

                                    JHtml::_('actionsdropdown.addCustomItem', JText::_('JTOOLBAR_EDIT'), 'edit', 'cb' . $i, 'event.edit');
                                    JHtml::_('actionsdropdown.duplicate', 'cb' . $i, 'events');

                                    JHtml::_('actionsdropdown.divider');

                                    $action = $item->published ? 'unpublish' : 'publish';
                                    JHtml::_('actionsdropdown.' . $action, 'cb' . $i, 'events');

                                    $action = $item->hot ? 'unfeature' : 'feature';
                                    JHtml::_('actionsdropdown.' . $action, 'cb' . $i, 'events');

                                    // Create dropdown items
                                    JHtml::_('actionsdropdown.divider');
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
                                <?php
                                if (($this->params['gdisplay_colors'] == 0) && (!empty($item->agenda_id))) {
                                    echo '<div class="small">' . JText::_('AGENDA') . ': ' . $item->agenda_titre . ' ';
                                    echo '<a rel="tooltip" data-original-title="' . JText::sprintf('COM_ALLEVENTS_FILTER', JText::_('AGENDA')) . '" href="' . JRoute::_('index.php?option=com_allevents&view=events&filter_agenda=' . $item->agenda_id) . '"><i class="icon-share-alt hide-icon"></i></a>';
                                    echo '</div>';
                                } elseif (($this->params['gdisplay_colors'] == 1) && (!empty($item->activity_id))) {
                                    echo '<div class="small">' . JText::_('ACTIVITY') . ': ' . $item->activity_titre . ' ';
                                    echo '<a rel="tooltip" data-original-title="' . JText::sprintf('COM_ALLEVENTS_FILTER', JText::_('ACTIVITY')) . '" href="' . JRoute::_('index.php?option=com_allevents&view=events&filter_activity=' . $item->activity_id) . '"><i class="icon-share-alt hide-icon"></i></a>';
                                    echo '</div>';
                                } elseif (($this->params['gdisplay_colors'] == 2) && (!empty($item->category_id))) {
                                    echo '<div class="small">' . JText::_('CATEGORY') . ': ' . $item->category_titre . ' ';
                                    echo '<a rel="tooltip" data-original-title="' . JText::sprintf('COM_ALLEVENTS_FILTER', JText::_('CATEGORY')) . '" href="' . JRoute::_('index.php?option=com_allevents&view=events&filter_category=' . $item->category_id) . '"><i class="icon-share-alt hide-icon"></i></a>';
                                    echo '</div>';
                                }
                                ?>
                                <a target="_blank" class="btn btn-success btn-mini"
                                   href="<?php echo JUri::root() . 'index.php?option=com_allevents&view=event&id=' . $item->id; ?>">
                                    <?php echo JText::_('COM_ALLEVENTS_PREVIEW'); ?></a>

                                <?php if (!empty($item->menuitem) && ($item->use_menuitem)) {
                                    echo '<img src="' . JUri::root(true) . '/media/com_allevents/css/images/flag_menu.png' . '"/>';
                                }
                                if (isset($item->attribs)) {
                                    if (!empty($item->attribs['url_from'])) {
                                        echo '<a target="_blank" href="' . $item->attribs['url_from'] . '">';
                                        echo '<img style="max-height:20px" src="' . JUri::root(true) . '/plugins/aemagnet/' . $item->attribs['from'] . '/assets/' . $item->attribs['from'] . '.png' . '" />';
                                        echo '</a>';
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <div class="eml_nailthumb-container50">
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
                            </td>
                            <td>
                                <div style="background:#E4E4E4; color:#777; padding: 2px 5px; border-radius: 5px;">
                                    <?php
                                    if ($item->allday) {
                                        $startdate = JHtml::date($item->date, $this->params['gdate_format'], false);
                                        $enddate = JHtml::date($item->enddate, $this->params['gdate_format'], false);
                                    } else {
                                        $startdate = JHtml::date($item->date, $this->params['gdatetime_format'], false);
                                        $enddate = JHtml::date($item->enddate, $this->params['gdatetime_format'], false);
                                    }

                                    if ($enddate == $startdate) {
                                        echo '<div style="width:100%;text-align:left;font-weight: bold;">' . $startdate . '<br/></div>';
                                    } else {
                                        echo '<div style="width:100%;text-align:left;font-weight: bold;">' . $startdate . '<br/></div>';
                                        echo '<div style="width:100%;text-align:right;font-style: italic;">' . $enddate . '</div>';
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="hidden-phone">
                                <?php
                                echo '<div>' . $item->proposed_by_name . '</div>';
                                if (!empty($item->proposed_by_username)) echo '[' . $item->proposed_by_username . '] ';
                                if (!empty($item->proposed_by_id)) echo '<a rel="tooltip" data-original-title="' . JText::sprintf('COM_ALLEVENTS_FILTER', JText::_('COM_ALLEVENTS_LEGEND_USER')) . '" href="' . JRoute::_('index.php?option=com_allevents&view=events&filter_proposed_by=' . $item->proposed_by_id) . '"><i class="icon-share-alt hide-icon"></i></a>'; ?>
                            </td>
                            <td>
                                <?php
                                $enrolment_published = empty($item->enrolment_enabled) ? 0 : $item->published;
                                if (($item->price != 0) && $this->params['controlpanel_showpayments']) {
                                    if ($this->params['addcurrency'] == 'EUR') {
                                        echo '<i style="font-size:16px;margin-right:10px;" class="fa fa-eur" aria-hidden="true"></i>';
                                    } else {
                                        echo '<i style="font-size:16px;margin-right:10px;" class="fa fa-usd" aria-hidden="true"></i></span>';
                                    }
                                }

                                echo JHtml::_('jgrid.published', $enrolment_published, $i, '', true, '', $item->openingdate, $item->closingdate);

                                if ($enrolment_published == 1) {
                                    echo '<a title="' . JText::_('COM_ALLEVENTS_INFO_ENROLMENTS') . '" href="' . JRoute::_('index.php?option=com_allevents&view=enrolments&filter_event_id=' . $item->id, false) . '">';

                                    if (($item->enrolment_max_participant == 0) || (($item->enrolment_max_participant > 0) && ($item->nb_enrol_yes < $item->enrolment_max_participant))) {
                                        echo '<span class="ae_enrol ok ae_clickable"> ';
                                    } elseif ($item->allow_overbooking) {
                                        echo '<span class="ae_enrol overbooking ae_clickable"> ';
                                    } else {
                                        echo '<span class="ae_enrol full ae_clickable"> ';
                                    }

                                    echo $item->nb_enrol_yes;
                                    echo '&nbsp;/&nbsp;';
                                    if ($item->enrolment_max_participant == 0) {
                                        echo '&infin;';
                                    } else {
                                        echo $item->enrolment_max_participant;
                                    }
                                    echo '</span>';
                                    echo '</a>';
                                    if (($item->enrolment_max_participant != 0)) {
                                        if ($item->nb_enrol_yes > $item->enrolment_max_participant) {
                                            echo '<div style="margin-top:10px; height:10px; width:100%; background-color:red;"></div>';
                                        } else {
                                            echo '<div style="margin-top:10px; height:10px; width:' . ($item->nb_enrol_yes * 100 / $item->enrolment_max_participant) . '%; background-color:green;"></div>';
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $item->access_level; ?>
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
                            <td class="hidden-phone center">
                                <span class="badge badge-info">
                                    <?php echo (int)$item->hits; ?>
                                </span>
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
            <?php if ($user->authorise('core.create', 'com_allevents')
                && $user->authorise('core.edit', 'com_allevents')
                && $this->params['gshow_samples']
            ): ?>
                <?php echo JHtml::_(
                    'bootstrap.renderModal',
                    'collapseModalImport',
                    [
                        'title' => JText::_('COM_ALLEVENTS_SAMPLES_OPTIONS'),
                        'footer' => $this->loadTemplate('import_footer')
                    ],
                    $this->loadTemplate('import_body')
                ); ?>
            <?php endif; ?>
            <?php if ($user->authorise('core.create', 'com_allevents')
                && $user->authorise('core.edit', 'com_allevents')
                && $user->authorise('core.edit.state', 'com_allevents')
            ) : ?>
                <?php echo JHtml::_(
                    'bootstrap.renderModal',
                    'collapseModalBatch',
                    [
                        'title' => JText::_('COM_ALLEVENTS_BATCH_OPTIONS'),
                        'footer' => $this->loadTemplate('batch_footer')
                    ],
                    $this->loadTemplate('batch_body')
                ); ?>
            <?php endif; ?>

            <input type="hidden" name="task" value=""/>
            <input type="hidden" name="boxchecked" value="0"/>
            <?php echo JHtml::_('form.token'); ?>
        </div>
</form>