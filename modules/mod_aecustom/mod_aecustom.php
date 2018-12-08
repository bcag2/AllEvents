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

require_once __dir__ . '/helper.php';

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
if (!class_exists('JModuleHelper2'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/module.php';

jimport('joomla.html.parameter');
use Joomla\Utilities\ArrayHelper;

// $modid = $module->id;
// $params = JModuleHelper2::findModuleParams($modid);
// $moduleParams = new JRegistry();
// $moduleParams->loadString($params);

// Parameter
$mcount = $params->get('count');
$formatdate = $params->get('formatdate');
$align = $params->get('align');
$formattime = $params->get('formattime');
$type = $params->get('type');
$at = (array)$params->get('at');
$pt = (array)$params->get('pt');
$dt = (array)$params->get('dt');
$st = (array)$params->get('st');
$ct = (array)$params->get('ct');
$lt = (array)$params->get('lt');
$et = (array)$params->get('et');

ArrayHelper::toInteger($at);
ArrayHelper::toInteger($lt);
ArrayHelper::toInteger($pt);
ArrayHelper::toInteger($dt);
ArrayHelper::toInteger($st);
ArrayHelper::toInteger($ct);
ArrayHelper::toInteger($et);

$h = (int)$params->get('h');
$r = $params->get('r');

$format = (int)$params->get('format');
$layout = 'default';

//getItemid
$modAECustomHelper = new modAECustomHelper;
$Itemid = $modAECustomHelper->getItemId();

// get event lists
$rows = $modAECustomHelper->getRecords($params, $type, $mcount, $at, $lt, $pt, $dt, $st, $ct, $et, $h, $r);

// display events
require(JModuleHelper::getLayoutPath('mod_aecustom', $layout));

