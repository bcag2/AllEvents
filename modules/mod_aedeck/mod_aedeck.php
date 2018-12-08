<?php
/**
 * mod_aedeck
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.3
 *
 */

defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

JLoader::register('modAEDeckHelper', __DIR__ . '/helper.php');

jimport('joomla.html.parameter');
jimport('joomla.application.module.helper');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

$modid = $module->id;
$showtitle = $module->showtitle;

$cacheid = md5($module->id);

$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'modAEDeckHelper';
$cacheparams->method = 'getItems';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;

$items = JModuleHelper::moduleCache($module, $params, $cacheparams);

// $items = modAEDeckHelper::getItems($params, $nb, $at, $itemImgSize, $itemCategory, $itemIntroText, $itemIntroTextWordLimit);

if (count($items)) {
    JHtml::_('jquery.framework');
    $doc = JFactory::getDocument();
    $doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
    $doc->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('mod_aedeck.css'));
    $doc->addScript(JUri::root(true) . '/media/com_allevents/js/modernizr-custom.js');
    $doc->addScript(JUri::root(true) . '/media/com_allevents/js/mod_aedeck.js');
    require JModuleHelper::getLayoutPath('mod_aedeck', $params->get('layout', 'default'));
} else {
    echo "<div class='alert alert-info'><strong>AE Deck</strong></p>" . JText::_('NO_FEATURED_EVENTS') . "</p></div>";
}
