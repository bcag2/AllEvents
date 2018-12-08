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
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);
use Joomla\Utilities\ArrayHelper;

JLoader::register('modAECalendarHelper', __DIR__ . '/helper.php');

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
if (!class_exists('JModuleHelper2'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/module.php';

jimport('joomla.html.parameter');
jimport('joomla.application.module.helper');

$gparams = AllEventsHelperParam::getGlobalParam();

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$layout = $params->get('layoutChoice', 'default');
$nbevt = $params->get('nb', 5);
$showDescription = $params->get('showDescription');
$height = (int)$params->get('height');
$startWeekDay = $params->get('startWeekDay', $gparams['gfirstday_week']);
$ampm = $params->get('ampm', $gparams['gtime_format']);
$dc = $params->get('display_colors', $gparams['gdisplay_colors']);
$dcb = $params->get('display_colors_back', $gparams['gdisplay_colors_back']);
$dct = $params->get('display_colors_fore', $gparams['gdisplay_colors_fore']);
$Itemid = $params->get('target_itemid');
$h = $params->get('h', 0);
$r = $params->get('r', 0);

$at = (array)$params->get('at', []);
$pt = (array)$params->get('pt', []);
$dt = (array)$params->get('dt', []);
$st = (array)$params->get('st', []);
$ct = (array)$params->get('ct', []);
$lt = (array)$params->get('lt', []);
$et = (array)$params->get('et', []);

ArrayHelper::toInteger($at);
ArrayHelper::toInteger($lt);
ArrayHelper::toInteger($pt);
ArrayHelper::toInteger($dt);
ArrayHelper::toInteger($st);
ArrayHelper::toInteger($ct);

if ($layout == 'default') {
    $nbevt = 0;
}
$smonthNames = $gparams['monthNames'];
$dayNames = $gparams['dayNamesShort'];

$cacheid = md5($module->id);

$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'modAECalendarHelper';
$cacheparams->method = 'getItems';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;

$items = JModuleHelper::moduleCache($module, $params, $cacheparams);

require(JModuleHelper::getLayoutPath('mod_aecalendar', $layout));