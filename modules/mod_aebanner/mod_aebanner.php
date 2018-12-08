<?php

defined('_JEXEC') or die;
/**
 * mod_aeslider
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.4
 */

JLoader::register('modAEBannerHelper', __DIR__ . '/helper.php');

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

$gparams = AllEventsHelperParam::getGlobalParam();

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
$orientation = $params->get('orientation');
$nbevent = (int)$params->get('nb', 5);
$dc = $gparams['gdisplay_colors'];

$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

$cacheid = md5($module->id);

$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'modAEBannerHelper';
$cacheparams->method = 'getItems';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;

$items = JModuleHelper::moduleCache($module, $params, $cacheparams);


if (count($items)) {
    JHtml::_('jquery.framework');
    $doc = JFactory::getDocument();
    $doc->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('mod_aebanner.css'));
    $doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
    require JModuleHelper::getLayoutPath('mod_aebanner', $params->get('layout', 'default'));
} else {
    echo "<div class='alert alert-info'><strong>AE Banner</strong></p>" . JText::_('NO_FEATURED_EVENTS') . "</p></div>";
}
