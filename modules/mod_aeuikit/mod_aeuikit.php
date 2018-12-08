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

JLoader::register('modAEuikitHelper', __DIR__ . '/helper.php');

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

if (!class_exists('JModuleHelper2'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/module.php';

if (!class_exists('AllEventsHelperString'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/string.php';

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

AllEventsHelperOverride::uikit();
$document = JFactory::getDocument();
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));

jimport('joomla.html.parameter');
jimport('joomla.application.module.helper');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

$gparams = AllEventsHelperParam::getGlobalParam();

$header_tag = $params->get('header_tag', 'h3');
$shownoevent = $params->get('shownoevent');
$dc = $params->get('display_colors', $params['gdisplay_colors']);
$dcb = $params->get('display_colors_back', $params['gdisplay_colors_back']);
$Itemid = $params->get('target_itemid');
$maxLength = (int)$params->get('maxLength', 100);
$showtitle = $params->get('showtitle');
$layout = $params->get('layoutChoice');
$url = $params->get('url');
$showurl = $params->get('showurl');

$arrMonthNames = $params['arrMonthNamesShort'];

$cacheid = md5($module->id);

$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'modAEuikitHelper';
$cacheparams->method = 'getItems';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;

$items = JModuleHelper::moduleCache($module, $params, $cacheparams);

require(JModuleHelper::getLayoutPath('mod_aeuikit', $layout));