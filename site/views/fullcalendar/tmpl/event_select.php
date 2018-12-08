<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
$sHTML = '';

$document = JFactory::getDocument();
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('stickytooltip.css'));

foreach ($this->events as $event) {
    if (isset($event)) {
        foreach ($event as $item) {
            $stip = '';
            $stip .= '<div id="sticky' . $item->id . '" class="stickytooltip">';
            $stip .= '<div id="detailtip" style="border: 2px solid ' . $item->backgroundColor . '" class="calendar-detailtip east">';
            $stip .= '  <div style="background: none repeat scroll 0 0 ' . $item->backgroundColor . '">';
            $stip .= '  <div class="detailtip-header" style="border-color: transparent ' . $item->textColor . ' transparent transparent;"></div>';
            $stip .= ' </div>';
            $stip .= '  <div class="detailtip-content">';
            $stip .= '      <div class="title-box" style="background:' . $item->backgroundColor . '" >';
            $stip .= '           <h3 style="color:' . $item->textColor . '" >' . $item->titre . '</h3>';

            $stip .= '<h4 style="color:' . $item->textColor . '" >';
            if ($item->allDay == 0) {
                if ($item->start == $item->end) {
                    $stip .= JText::_('COM_ALLEVENTS_THISDAY') . '&nbsp;' . $item->start;
                    // if ($arrShow['Time'])
                } else {
                    $stip .= JText::_('COM_ALLEVENTS_FROM_DAY') . '&nbsp;' . $item->start;
                    $stip .= '&nbsp;' . JText::_('COM_ALLEVENTS_TO_DAY') . '&nbsp;' . $item->end;
                }
            } else {
                if ($item->start == $item->end) {
                    $stip .= JText::_('COM_ALLEVENTS_THISDAY') . '&nbsp;' . $item->start;
                    // if ($arrShow['Time'])
                } else {
                    $stip .= JText::_('COM_ALLEVENTS_FROM_DAY') . '&nbsp;' . $item->start;
                    $stip .= '&nbsp;' . JText::_('COM_ALLEVENTS_TO_DAY') . '&nbsp;' . $item->end;
                }
            }
            $stip .= '</h4>';

            $stip .= '       </div>';

            $stip .= '       <div class="img-col nailthumb-container">';
            if ($item->vignette) {
                $stip .= '<img alt="' . $item->titre . '" class="sm" id="uxImageThumbnail" src="' . JUri::root(true) . '/' . $item->vignette . '">';
            } else {
                $stip .= '<img alt="' . $item->titre . '" src="' . AllEventsHelperOverride::GetImage('no_photo.png') . '">';
            }
            $stip .= '           <div class="status-message"></div>';
            $stip .= '       </div>';

            $stip .= '     <div class="info-col">';
            $stip .= '<p>';
            $stip .= ((isset($item->agenda_id)) && ($item->agenda_id > 0)) ? "<span class='se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'>" . $item->agenda_titre . "<br/></span>" : "";
            $stip .= ((isset($item->activity_id)) && ($item->activity_id > 0)) ? "<span class='se_event_info_activity se_activity_" . $item->activity_id . "_bullet'>" . $item->activity_titre . "<br/></span>" : "";
            $stip .= ((isset($item->place_id)) && ($item->place_id > 0)) ? "<span class='se_event_info_place se_place_" . $item->place_id . "_bullet'>" . $item->place_titre . "<br/></span>" : "";
            $stip .= '</p>';
            $stip .= '       </div>';
            $stip .= '   </div>';
            $stip .= '</div>';
            $stip .= '</div>';

            $sHTML .= $stip;
        }
    }
}
$document->addScriptDeclaration("
(function($){
    $(document).ready(function () {
        $('.nailthumb-container').nailthumb({width:200,heigth:200,method:'resize',fitDirection:'center,center',maxEnlargement:1});
    }) ;
})(jQuery);");

echo $sHTML;
