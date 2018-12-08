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
$document = JFactory::getDocument();
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment-with-langs.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/fullcalendar.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/gcal.js');
$document->addScript(JUri::root(true) . '/media/com_allevents/js/premium/mod_aefilters.js');

// partie CSS
$sReturn = "<style type='text/css'>";
foreach ($Agendas as $obj) {
    $sReturn .= '.onoffswitch' . $obj->id . ' {';
    $sReturn .= 'position: relative; width: 150px;margin-bottom: 5px;';
    $sReturn .= '-webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-checkbox {';
    $sReturn .= 'display: none;';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-label {';
    $sReturn .= 'display: block; overflow: hidden; cursor: pointer; background-color: ' . $obj->couleur . ';';
    $sReturn .= 'border: 1px solid ' . $obj->couleur_texte . '; border-radius: 10px;';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-inner { ';
    $sReturn .= 'width: 200%; margin-left: -100%;';
    $sReturn .= '-moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;';
    $sReturn .= '-o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-inner:before, .onoffswitch' . $obj->id . '-inner:after {';
    $sReturn .= 'float: left; width: 50%; height: 20px; padding: 0; line-height: 20px;';
    $sReturn .= 'float: left; width: 50%; padding: 0; ';
    $sReturn .= 'font-size: 12px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;';
    $sReturn .= '-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-inner:before {';
    $sReturn .= 'content: "' . $obj->titre . '";';
    $sReturn .= 'padding-left: 10px;';
    $sReturn .= 'background-color: ' . $obj->couleur_texte . '; color: ' . $obj->couleur . ';';
    $sReturn .= 'background-color: ' . $obj->couleur . '; color: ' . $obj->couleur_texte . ';';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-inner:after {';
    $sReturn .= 'content: "' . $obj->titre . '"; ';
    $sReturn .= 'padding-right: 10px;';
    $sReturn .= 'background-color: #EEEEEE; color: #999999;';
    $sReturn .= 'text-align: right; ';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-switch {';
    $sReturn .= 'width: 14px; margin: 3px; ';
    $sReturn .= 'background: ' . $obj->couleur_texte . ';';
    $sReturn .= 'border: 2px solid ' . $obj->couleur_texte . '; border-radius: 10px; ';
    $sReturn .= 'position: absolute; top: 0; bottom: 0; right: 126px; ';
    $sReturn .= '-moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;';
    $sReturn .= '-o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s;';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-checkbox:checked + .onoffswitch' . $obj->id . '-label .onoffswitch' . $obj->id . '-inner {';
    $sReturn .= 'margin-left: 0;';
    $sReturn .= '}';
    $sReturn .= '.onoffswitch' . $obj->id . '-checkbox:checked + .onoffswitch' . $obj->id . '-label .onoffswitch' . $obj->id . '-switch {';
    $sReturn .= 'background: #FFFFFF;';
    $sReturn .= 'right: 0px;';
    $sReturn .= '}';
} // foreach ($agendas as $obj)
$sReturn .= "</style>";

// partie HTML
$sReturn .= '<div id="mod_aefilters">';
foreach ($Agendas as $obj) {
    $checked = ($obj->defaultstate == 1) ? 'checked' : '';
    $sReturn .= '<div class="onoffswitch' . $obj->id . '">';
    $sReturn .= '    <input type="checkbox" name="onoffswitch' . $obj->id . '" class="onoffswitch' . $obj->id . '-checkbox" id="myonoffswitch' . $obj->id . '" data-id= "' . $obj->id . '" ' . $checked . '>';
    $sReturn .= '    <label class="se_agenda_' . $obj->id . '_bullet onoffswitch' . $obj->id . '-label" for="myonoffswitch' . $obj->id . '">';
    $sReturn .= '        <div class="onoffswitch' . $obj->id . '-inner"></div>';
    $sReturn .= '        <div class="onoffswitch' . $obj->id . '-switch"></div>';
    $sReturn .= '    </label>';
    $sReturn .= '</div>';
}
$sReturn .= '</div>';

$sJS = "var modAEFC_Params = {};\n";
$sJS .= "modAEFC_Params.dc=" . $dc . ";\n";
$sJS .= "modAEFC_Params.dct=" . $dct . ";\n";
$sJS .= "modAEFC_Params.dcb=" . $dcb . ";\n";

$document = JFactory::getDocument();
$str = '<script type="text/javascript">' . $sJS . '</script>';
$document->addCustomTag($str);

echo($sReturn);
