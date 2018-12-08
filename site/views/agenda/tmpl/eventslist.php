<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);
AllEventsHelperOverride::jquery();
AllEventsHelperOverride::uikit();
$document = JFactory::getDocument();
$document->addStyleSheet('https://cdn.datatables.net/1.10.13/css/dataTables.uikit.min.css');
$document->addScript('https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js');
$document->addScript('https://cdn.datatables.net/1.10.13/js/dataTables.uikit.min.js');

$app = JFactory::getApplication();
$params = AllEventsHelperParam::getGlobalParam();
$Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

// $document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
// $document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
?>

<?php if ($this->item) : ?>

    <div class="event_container" style="margin-bottom: 20px;">
        <div class="eml_event_content se_agenda_<?php echo $this->item->id; ?>_summary">
            <div class="eml_event_image">
                <div class="eml_nailthumb-container">
                    <?php
                    if (isset($this->item->vignette) && ($this->item->vignette <> '')) {
                        echo '<img alt="' . $this->item->titre . '" src="' . JUri::root(true) . '/' . $this->item->vignette . '" class="eml_event_logo" class="eml_event_logo"/>';
                    } else {
                        echo '<img alt="' . $this->item->titre . '" src="' . AllEventsHelperOverride::GetImage('no_photo.png') . '" class="eml_event_logo"/>';
                    }
                    ?>
                </div>
            </div>

            <div class="eml_event_top_informations">
                <h3>
                    <?php echo $this->item->titre; ?>
                </h3>

                <?php if (isset($this->item->contact_name) && ($this->item->contact_name <> "")) : ?>
                    <span>
                        <i class="fa fa-user"></i>&nbsp;
                        <a title="<?php echo $this->item->contact_name; ?>"><?php echo $this->item->contact_name; ?></a>
                    </span>
                <?php endif; ?>
            </div>

            <div id="allevents_description">
                <?php echo $this->item->description; ?>
            </div>

            <div id="allevents_list">
                <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed&a=' . $this->item->id . '&Itemid=' . $Itemid, false); ?>">
                    <i class="fa fa-rss" title="<?php echo JText::_('COM_ALLEVENTS_RSS_SUBSCRIBE'); ?>"></i>
                </a>
                &nbsp;
                <a href="<?php echo JRoute::_('index.php?option=com_allevents&task=agenda.export&id=' . $this->item->id) ?>">
                    <i class="fa fa-calendar-o title="<?php echo JText::_('JTOOLBAR_EXPORT_ICAL'); ?>""></i>
                </a>
                &nbsp;
                <?php
                echo "<a href='" . JRoute::_('index.php?option=com_allevents&view=events&a=' . $this->item->id, false) . "'>" . JText::_('EVENTS_LIST') . "</a>";
                ?>
            </div>
        </div>
    </div>
    <?php
    $sContent = '<table id="AE_Events" class="uk-table uk-table-hover uk-table-striped" cellspacing="0" width="100%">';
    $sContent .= '<thead>';
    $sContent .= '<tr>';
    $sContent .= '<th>' . JText::_('COM_ALLEVENTS_EVENTS_DATE') . '</th>';
    $sContent .= '<th>' . JText::_('COM_ALLEVENTS_TITRE') . '</th>';
    $sContent .= '<th>' . JText::_('COM_ALLEVENTS_VIGNETTE') . '</th>';
    $sContent .= '</tr>';
    $sContent .= '</thead>';
    $sContent .= '<tbody>';
    $i = 0;
    foreach ($this->events as $event) {
        $i++;
        $date = JHtml::_('date', $event->date, AllEventsHelperDate::jVersionFormat($event->allday ? $params['gdate_format'] : $params['gdatetime_format']));
        $sContent .= '<tr>';
        $sContent .= '<td>' . $date . '</td>';
        $sContent .= '<td><a href="' . AllEventsHelperRoute::getEventRoute($event->id, $event->alias) . '">' . $event->titre . '</a></td>';
        $sContent .= '<td>' . AllEventsHelperEventDisplay::getVignette($event, $params['gdisplay_colors']) . '</td>';
        $sContent .= '</tr>';
    }
    $sContent .= '</tbody>';
    $sContent .= '</table>';
    echo $sContent;
else:
    echo JText::_('COM_ALLEVENTS_ITEM_NOT_LOADED');
endif;

echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);

$datatable = "";
$datatable .= '(function ($) {' . PHP_EOL;
$datatable .= '    $(document).ready(function () {' . PHP_EOL;
$datatable .= '        $("#AE_Events").DataTable({' . PHP_EOL;
$datatable .= '            "columnDefs": [' . PHP_EOL;
$datatable .= '                { "type": "datetime-ae", "targets": 0 },' . PHP_EOL;
$datatable .= '                { "render": function ( data, type, row ) {' . PHP_EOL;
$datatable .= '                	               return row[2]+\'&nbsp;\'+data ;' . PHP_EOL;
$datatable .= '                            }, "targets": 1},' . PHP_EOL;
$datatable .= '                { "visible": false,  "targets": 2 },' . PHP_EOL;
$datatable .= '                { "orderable": false, "targets": 0 },' . PHP_EOL;
$datatable .= '                { "orderable": false, "targets": 1 },' . PHP_EOL;
$datatable .= '            ],' . PHP_EOL;
$datatable .= '            "autoWidth": false,' . PHP_EOL;
$datatable .= '            "order": [[ 0, "asc" ]],' . PHP_EOL;
$datatable .= '            "language" : {' . PHP_EOL;
$datatable .= '                "processing" : "' . JText::_("COM_ALLEVENTS_PROCESSING") . '",' . PHP_EOL;
$datatable .= '                "search" : "' . JText::_("COM_ALLEVENTS_SEARCH") . '",' . PHP_EOL;
$datatable .= '                "lengthMenu" : "' . JText::_("COM_ALLEVENTS_LENGTHMENU") . '",' . PHP_EOL;
$datatable .= '                "info" : "' . JText::_("COM_ALLEVENTS_INFO") . '",' . PHP_EOL;
$datatable .= '                "infoEmpty" : "' . JText::_("COM_ALLEVENTS_INFOEMPTY") . '",' . PHP_EOL;
$datatable .= '                "infoFiltered" : "' . JText::_("COM_ALLEVENTS_INFOFILTERED") . '",' . PHP_EOL;
$datatable .= '                "infoPostFix" : "",' . PHP_EOL;
$datatable .= '                "loadingRecords" : "' . JText::_("COM_ALLEVENTS_LOADING") . '",' . PHP_EOL;
$datatable .= '                "zeroRecords" : "' . JText::_("COM_ALLEVENTS_NO_ITEMS") . '",' . PHP_EOL;
$datatable .= '                "emptyTable" : "' . JText::_("COM_ALLEVENTS_NO_ITEMS") . '",' . PHP_EOL;
$datatable .= '                "paginate" : {' . PHP_EOL;
$datatable .= '                    "first" : "' . JText::_("COM_ALLEVENTS_FIRST") . '",' . PHP_EOL;
$datatable .= '                    "previous" : "' . JText::_("COM_ALLEVENTS_PREV") . '",' . PHP_EOL;
$datatable .= '                    "next" : "' . JText::_("COM_ALLEVENTS_NEXT") . '",' . PHP_EOL;
$datatable .= '                    "last" : "' . JText::_("COM_ALLEVENTS_LAST") . '"' . PHP_EOL;
$datatable .= '                },' . PHP_EOL;
$datatable .= '                "aria" : {' . PHP_EOL;
$datatable .= '                    "sortAscending" : "' . JText::_("COM_ALLEVENTS_SORTASCENDING") . '",' . PHP_EOL;
$datatable .= '                    "sortDescending" : "' . JText::_("COM_ALLEVENTS_SORTDESCENDING") . '"' . PHP_EOL;
$datatable .= '                }' . PHP_EOL;
$datatable .= '            }' . PHP_EOL;
$datatable .= '        });' . PHP_EOL;
$datatable .= '    });' . PHP_EOL;
$datatable .= '})(jQuery);';
$document->addScriptDeclaration($datatable);
?>