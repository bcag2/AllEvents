<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

$document = JFactory::getDocument();
AllEventsHelperOverride::jquery();
AllEventsHelperOverride::bootstrap();


$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet('https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.min.css');

$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
$document->addScript('https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.min.js');
$Itemid = JFactory::getApplication()->input->getInt('Itemid', null);

$show = false;
$n = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$user = JFactory::getUser();
$authorised = $user->authorise('core.enrolment', 'com_allevents');
echo AllEventsHelperEventDisplay::getBlocEnrolmentJS();
?>

<h1><?php echo $this->params['page_title']; ?></h1>

<table id="tablepro" style="cursor:pointer;" class="display" cellspacing="0">
    <thead>
    <tr>
        <th><?php echo JText::_(''); ?></th>
        <th><?php echo JText::_('COM_ALLEVENTS_TITRE'); ?></th>
        <th><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_DATE'); ?></th>
        <th><?php echo JText::_('ENDDATE'); ?></th>
        <th><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_ENROLMENT'); ?></th>
    </tr>
    </thead>
    <?php
    foreach ($this->items as $item) :
        $canEdit = JFactory::getUser()->authorise('core.edit', 'com_allevents');
        if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_allevents')) {
            $canEdit = JFactory::getUser()->id == $item->created_by;
        }
        if ($item->published == 1 || ($item->published == 0 && JFactory::getUser()->authorise('core.edit.own', ' com_allevents'))):
            $show = true;
            ?>
            <?php
            echo '<tr id="' . $item->id . '">';
            echo '<td>' . $item->link . '</td>';
            echo '<td>' . $item->titre . '</td>';
            echo '<td>';
            if ($item->allday == "1") {
                echo JHtml::date($item->date, $this->params['gdate_format']);
            } else {
                echo JHtml::date($item->date, $this->params['gdatetime_format']);
            }
            echo '</td>';
            echo '<td>';
            if ($item->allday == "1") {
                echo JHtml::date($item->enddate, $this->params['gdate_format']);
            } else {
                echo JHtml::date($item->enddate, $this->params['gdatetime_format']);
            }
            echo '</td>';
            echo '<td>';
            if (($item->enrolment_max_participant == 0) || (($item->enrolment_max_participant > 0) && ($item->nb_enrolyes < $item->enrolment_max_participant))) {
                $eventfull = false;
            } elseif ($item->allow_overbooking) {
                $eventfull = false;
            } else {
                $eventfull = true;
            }
            if (($item->enrolment_enabled) && !($item->enrolment_finished)) {
                if (($authorised) && !($item->cancelled)) {
                    if ($eventfull) {
                        // echo JText::_('EVENT_FULL');
                    } else {
                        if ($item->event_in_past) {
                            // echo JText::_('event_in_past') ;
                        } else {
                            if ($item->enrol_perhaps) {
                                echo '<span class="divider-before-btn"><i class="fa fa-user"></i>&nbsp;' . JText::_('I_WILL_PERHAPS_COME') . '</span>';
                            }
                            // elseif (($item->enrol_perhaps) || ($item->enrol_yes))
                            // {
                            // echo '<span onclick="EnrolPerhapsItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user"></i>&nbsp;' . JText::_('I_WILL_PERHAPS_COME') . '</span>' ;
                            // }

                            if ($item->enrol_no) {
                                echo '<span class="divider-before-btn"><i class="fa fa-user-times"></i>&nbsp;' . JText::_('CLICK_AND_DONT_PARTICIPATE') . '</span>';
                            } elseif (($item->enrol_perhaps) || ($item->enrol_no) || ($item->enrol_yes)) {
                                if ($this->params['geventshow_enrolno']) {
                                    echo '<span onclick="EnrolNoItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-times"></i>&nbsp;' . JText::_('CLICK_AND_DONT_PARTICIPATE') . '</span>';
                                }
                            }

                            if ($item->enrol_yes) {
                                echo '<span class="divider-before-btn"><i class="fa fa-user-plus"></i>&nbsp;' . JText::_('CLICK_AND_PARTICIPATE') . '</span>';
                            } else {
                                echo '<span onclick="EnrolYesItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-plus"></i>&nbsp;' . JText::_('CLICK_AND_PARTICIPATE') . '</span>';
                            }
                        }
                    }
                } else {
                    echo '<span class="divider-before-btn" style="width:200px">';
                    echo JText::_('NO_ENROL_PERMISSION');
                    echo '</span>';
                }
            }
            echo '</td>';
            echo AllEventsHelperEventDisplay::getBlocEnrolmentForm($item, $Itemid);
            echo '</tr>';
        endif;
    endforeach;
    ?>

    <tfoot>
    <tr>
        <th><?php echo JText::_(''); ?></th>
        <th><?php echo JText::_('COM_ALLEVENTS_TITRE'); ?></th>
        <th><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_DATE'); ?></th>
        <th><?php echo JText::_('ENDDATE'); ?></th>
        <th><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_ENROLMENT'); ?></th>
    </tr>
    </tfoot>
</table>
<?php
if (!$show) :
    echo JText::_('COM_ALLEVENTS_NO_ITEMS');
endif;
?>

<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            var table = $('#tablepro').DataTable({
                    "pagingType": "simple_numbers",
                    "autoWidth": true,
                    responsive: true,
                    "language": {
                        "processing": "<?php echo JText::_('COM_ALLEVENTS_PROCESSING'); ?>",
                        "search": "<?php echo JText::_('COM_ALLEVENTS_SEARCH'); ?>",
                        "lengthMenu": "<?php echo JText::_('COM_ALLEVENTS_LENGTHMENU'); ?>",
                        "info": "<?php echo JText::_('COM_ALLEVENTS_INFO'); ?>",
                        "infoEmpty": "<?php echo JText::_('COM_ALLEVENTS_INFOEMPTY'); ?>",
                        "infoFiltered": "<?php echo JText::_('COM_ALLEVENTS_INFOFILTERED'); ?>",
                        "infoPostFix": "",
                        "loadingRecords": "<?php echo JText::_('COM_ALLEVENTS_LOADING'); ?>",
                        "zeroRecords": "<?php echo JText::_('COM_ALLEVENTS_NO_ITEMS'); ?>",
                        "emptyTable": "<?php echo JText::_('COM_ALLEVENTS_NO_ITEMS'); ?>",
                        "paginate": {
                            "first": "<?php echo JText::_('COM_ALLEVENTS_FIRST'); ?>",
                            "previous": "<?php echo JText::_('COM_ALLEVENTS_PREV'); ?>",
                            "next": "<?php echo JText::_('COM_ALLEVENTS_NEXT'); ?>",
                            "last": "<?php echo JText::_('COM_ALLEVENTS_LAST'); ?>"
                        },
                        "aria": {
                            "sortAscending": "<?php echo JText::_('COM_ALLEVENTS_SORTASCENDING'); ?>",
                            "sortDescending": "<?php echo JText::_('COM_ALLEVENTS_SORTDESCENDING'); ?>"
                        }
                    },
                    <?php
                    // tri par défaut
                    switch ($this->params['sort_by']) {
                        case "0": //EVENTS_SORT_BY_DATE_ASC
                            echo '"order": [[ 2, "asc" ]],';
                            break;
                        case "1": //EVENTS_SORT_BY_DATE_DESC
                            echo '"order": [[ 2, "desc" ]],';
                            break;
                        case "2": //EVENTS_SORT_BY_ENDDATE_ASC
                            echo '"order": [[ 3, "asc" ]],';
                            break;
                        case "3": //EVENTS_SORT_BY_ENDDATE_DESC
                            echo '"order": [[ 3, "desc" ]],';
                            break;
                    }
                    ?>
                    columnDefs: [
                        /* la numérotation commence à 0*/
                        //Column 0 will never be visible, regardless of the browser width and the data will not be shown in a child row
                        {"className": "never", "targets": [0]},
                        {"type": "datetime-ae", "targets": [2]},
                        {"type": "datetime-ae", "targets": [3]},
                        {"visible": false, "targets": [0]}
                    ]
                }
            );

            $('body').on('click', '#tablepro tbody tr td.col1, #tablepro tbody tr td.col2', function () {
                var data = table.row($(this).parent()).data();
                window.open(data[0], '<?php echo($this->params['gdisplay_openlinkself']);?>');
            });
        });

        <?php echo AllEventsHelperDataTable::GetExtendDataTable($this->params); ?>

    })(jQuery);
</script>

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>
