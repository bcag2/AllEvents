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

$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

JLoader::register('modAEListHelper', __DIR__ . '/helper.php');

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

if (!class_exists('AllEventsHelperString'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/string.php';

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

$document = JFactory::getDocument();
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('mod_aelist.css'));
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

jimport('joomla.html.parameter');
jimport('joomla.application.module.helper');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$gparams = AllEventsHelperParam::getGlobalParam();

$layout = $params->get('layoutChoice');
$url = $params->get('url');
$header_tag = $params->get('header_tag', 'h3');
$shownoevent = (int)$params->get('shownoevent');
$dc = (int)$params->get('display_colors', $gparams['gdisplay_colors']);
$dcb = (int)$params->get('display_colors_back', $gparams['gdisplay_colors_back']);
$Itemid = (int)$params->get('target_itemid');
$maxLength = (int)$params->get('maxLength', 100);
$showtitle = (int)$params->get('showtitle');
$showurl = (int)$params->get('showurl');

$arrMonthNames = $gparams['arrMonthNamesShort'];

$cacheid = md5($module->id);

$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'modAEListHelper';
$cacheparams->method = 'getItems';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;

$items = JModuleHelper::moduleCache($module, $params, $cacheparams);

require(JModuleHelper::getLayoutPath('mod_aelist', $layout));