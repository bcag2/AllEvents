<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

$document = JFactory::getDocument();
AllEventsHelperOverride::jquery();
AllEventsHelperOverride::bootstrap();
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.min.css');
$document->addScript('https://cdn.datatables.net/s/dt/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,af-2.1.0,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,cr-1.3.0,fc-3.2.0,fh-3.1.0,kt-2.1.0,r-2.0.0,rr-1.1.0,sc-1.4.0,se-1.1.0/datatables.min.js');
?>
<h1><?php echo $this->params['page_title']; ?></h1>
<div id="ListEvents">
    <table id="tbl" style="cursor:pointer;" class="display" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th><?php echo JText::_(''); ?></th>
            <th><?php echo JText::_('COM_ALLEVENTS_TITRE'); ?></th>
            <th><?php echo JText::_('AGENDA'); ?></th>
            <th><?php echo JText::_('ACTIVITY'); ?></th>
            <th><?php echo JText::_('PLACE'); ?></th>
            <th><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_DATE'); ?></th>
            <th><?php echo JText::_('ENDDATE'); ?></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th><?php echo JText::_(''); ?></th>
            <th><?php echo JText::_('COM_ALLEVENTS_TITRE'); ?></th>
            <th><?php echo JText::_('AGENDA'); ?></th>
            <th><?php echo JText::_('ACTIVITY'); ?></th>
            <th><?php echo JText::_('PLACE'); ?></th>
            <th><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_DATE'); ?></th>
            <th><?php echo JText::_('ENDDATE'); ?></th>
        </tr>
        </tfoot>
    </table>
</div>

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            //var selected = [];
            // Ajoute les filtres en footer
            $("#tbl").find("tfoot th").each(function () {
                var title = $('#tbl').find('thead th').eq($(this).index()).text();
                $(this).html('<input type="text" placeholder=" ' + title + '" />');
            });

            var table = $('#tbl').DataTable({
                dom: 'BRlrtip',
                pagingType: "simple_numbers",
                responsive: true,
                <?php
                // tri par défaut
                switch ($this->params['sort_by']) {
                    case "0": //EVENTS_SORT_BY_DATE_ASC
                        echo '"order": [[ 5, "asc" ]],';
                        break;
                    case "1": //EVENTS_SORT_BY_DATE_DESC
                        echo '"order": [[ 5, "desc" ]],';
                        break;
                    case "2": //EVENTS_SORT_BY_ENDDATE_ASC
                        echo '"order": [[ 6, "asc" ]],';
                        break;
                    case "3": //EVENTS_SORT_BY_ENDDATE_DESC
                        echo '"order": [[ 6, "desc" ]],';
                        break;
                }
                ?>
                lengthMenu: [[5, 10, 15, 20, 25, 30, 50, 100, -1], [5, 10, 15, 20, 25, 30, 50, 100, "<?php echo JText::_('JALL'); ?>"]],
                iDisplayLength: 25,
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<?php echo JText::_('COM_ALLEVENTS_COPY'); ?>',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        autoPrint: false,
                        text: "<?php echo JText::_('COM_ALLEVENTS_PRINT'); ?>",
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                ajax: {
                    url: '<?php echo JUri::root(true) . '/index.php?option=com_allevents&view=fullcalendar&layout=jsoneventstable&format=json&tableperiod=' . $this->params['tableperiod'] . '&at=' . json_encode($this->params['at']) . '&pt=' . json_encode($this->params['pt']) . '&et=' . json_encode($this->params['et']) . '&dt=' . json_encode($this->params['dt']) . '&st=' . json_encode($this->params['st']) . '&ct=' . json_encode($this->params['ct']) . '&lt=' . json_encode($this->params['lt']) . '&h=' . $this->params['h'] ?>',
                    dataSrc: ""
                },
                language: {
                    processing: "<?php echo JText::_('COM_ALLEVENTS_PROCESSING'); ?>",
                    search: "<?php echo JText::_('COM_ALLEVENTS_SEARCH'); ?>",
                    lengthMenu: "<?php echo JText::_('COM_ALLEVENTS_LENGTHMENU'); ?>",
                    info: "<?php echo JText::_('COM_ALLEVENTS_INFO'); ?>",
                    infoEmpty: "<?php echo JText::_('COM_ALLEVENTS_INFOEMPTY'); ?>",
                    infoFiltered: "<?php echo JText::_('COM_ALLEVENTS_INFOFILTERED'); ?>",
                    infoPostFix: "",
                    loadingRecords: "<?php echo JText::_('COM_ALLEVENTS_LOADING'); ?>",
                    zeroRecords: "<?php echo JText::_('COM_ALLEVENTS_NO_ITEMS'); ?>",
                    emptyTable: "<?php echo JText::_('COM_ALLEVENTS_NO_ITEMS'); ?>",
                    paginate: {
                        first: "<?php echo JText::_('COM_ALLEVENTS_FIRST'); ?>",
                        previous: "<?php echo JText::_('COM_ALLEVENTS_PREV'); ?>",
                        next: "<?php echo JText::_('COM_ALLEVENTS_NEXT'); ?>",
                        last: "<?php echo JText::_('COM_ALLEVENTS_LAST'); ?>"
                    },
                    aria: {
                        sortAscending: "<?php echo JText::_('COM_ALLEVENTS_SORTASCENDING'); ?>",
                        sortDescending: "<?php echo JText::_('COM_ALLEVENTS_SORTDESCENDING'); ?>"
                    },
                    buttons: {
                        'colvis': '<?php echo JText::_('COM_ALLEVENTS_COLUMNS'); ?>'
                    }
                },
                columns: [
                    /* la numérotation commence à 0*/
                    {"data": "link"},
                    {"data": "titre"},
                    {"data": "agenda"},
                    {"data": "activity"},
                    {"data": "place"},
                    {"data": "date"},
                    {"data": "enddate"}
                ],
                "columnDefs": [
                    {"visible": false, "targets": [0]},
                    //Column 0 will never be visible, regardless of the browser width and the data will not be shown in a child row
                    {"className": "never", "targets": [0]},
                    {"type": "datetime-ae", "targets": [5]},
                    {"type": "datetime-ae", "targets": [6]}
                ],
                deferRender: true,
                initComplete: function () {
                    var api = this.api();

                    api.columns().indexes().flatten().each(function (i) {
                        // index des colonnes à passer en liste de valeur
                        if ((i == 2) || (i == 3) || (i == 1)) {
                            var column = api.column(i);
                            var select = $('<select><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>')
                            });
                        }
                    });
                }
            });

            //new $.fn.dataTable.FixedHeader( table );

            $('body').on('click', '#tbl tbody tr', function () {
                var data = table.row($(this)).data();
                window.open(data['link'], '<?php echo(empty($this->params['display_openlinkself']) ? $this->params['gdisplay_openlinkself'] : $this->params['display_openlinkself']);?>');
            });

            // Apply the filter
            $("#tbl").find("tfoot input").on('keyup change', function () {
                table
                    .column($(this).parent().index() + ':visible')
                    .search(this.value)
                    .draw();
            });
        });

        <?php echo AllEventsHelperDataTable::GetExtendDataTable($this->params); ?>
    })(jQuery);
</script>