<?php
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */
defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
?>

<div class="<?php echo $moduleclass_sfx; ?>">
    <table cellpadding="2" cellspacing="0" border="0" width="100%">
        <?php
        if (empty($rows)) {
            echo JText::_('No Events');
        } else {
            for ($i = 0; $i < count($rows); $i++) {
                $row = $rows[$i];
                $format_html = $format;
                echo "<tr><td style='text-align:" . $align . "'>";
                $format_html = str_replace('%link_start%', "<a href='" . JRoute::_("index.php?option=com_allevents&view=event&Itemid=$Itemid&id=$row->event_id") . "'>", $format_html);
                $format_html = str_replace('%line_break%', '<br />', $format_html);
                $format_html = str_replace('%link_end%', '</a>', $format_html);
                $format_html = str_replace('%id%', $row->event_id, $format_html);
                $format_html = str_replace('%title%', $row->event_titre, $format_html);
                $format_html = str_replace('%location%', $row->place_titre . ', ' . $row->place_ville, $format_html);
                $format_html = str_replace('%category%', $row->category_titre, $format_html);
                $format_html = str_replace('%agenda%', $row->agenda_titre, $format_html);
                $format_html = str_replace('%start_date%', date($formatdate, strtotime($row->date)), $format_html);
                $format_html = str_replace('%end_date%', date($formatdate, strtotime($row->enddate)), $format_html);
                $format_html = str_replace('%description%', $row->description, $format_html);
                $format_html = str_replace('%affiche%', $row->affiche, $format_html);
                $format_html = str_replace('%vignette%', $row->vignette, $format_html);
                // $format_html = str_replace('%registration_start%',date($formatdate,strtotime($row->regstart)),$format_html);
                // $format_html = str_replace('%registration_stop%',date($formatdate,strtotime($row->regstop)),$format_html);
                // $format_html = str_replace('%event_status%',JText::_('CAT_MODULE_EVENTS_STATUS_'.$row->status),$format_html);
                echo $format_html;
                echo "</tr></td>";
            }
        }
        ?>
    </table>
</div>