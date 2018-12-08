<?php
/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

$document = JFactory::getDocument();
AllEventsHelperOverride::jquery();
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/zabuto_calendar/1.6.3/zabuto_calendar.min.js');
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/zabuto_calendar/1.6.3/zabuto_calendar.min.css');

$languages = explode("-", JFactory::getLanguage()->getTag());
?>

<div id="mod_aecalendar4" class="<?php echo $moduleclass_sfx; ?>"></div>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $("#mod_aecalendar4").zabuto_calendar({
                ajax: {
                    url: '<?php echo "index.php?option=com_allevents&task=display&view=fullcalendar&layout=mod_aezabuto&format=json&dcb=" . $dcb . "&dc=" . $dc . "&at=" . json_encode($at) . "&pt=" . json_encode($pt) . "&dt=" . json_encode($dt) . "&st=" . json_encode($st) . "&et=" . json_encode($et) . "&ct=" . json_encode($ct) . "&Itemid=" . $Itemid . "&lt=" . json_encode($lt) . "&h=" . $h;?>',
                    modal: false
                },
                language: "<?php echo $languages[0]; ?>",
                show_previous: true,
                show_next: true,
                cell_border: true,
                today: true,
                show_days: true,
                weekstartson: <?php echo $startWeekDay; ?>,
                action: function () {
                    window.open($("#" + this.id).attr("link"), "_self");
                }
            });
        });
    })(jQuery);
</script>