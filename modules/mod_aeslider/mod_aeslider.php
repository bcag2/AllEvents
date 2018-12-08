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
 * @since     3.3.3
 *
 * inspired by JoomShaper http://www.joomshaper.com slider
 */

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
JLoader::register('modAESliderHelper', __DIR__ . '/helper.php');

$cacheid = md5($module->id);

$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'modAESliderHelper';
$cacheparams->method = 'getItems';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;

$items = JModuleHelper::moduleCache($module, $params, $cacheparams);

if (count($items)) {
    JHtml::_('jquery.framework');
    $doc = JFactory::getDocument();
    $doc->addScript('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js');
    $doc->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css');
    $doc->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('mod_aeslider.css'));
    $doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

    if ($params->get('transitionStyle')) {
        $doc->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.min.css');
	}

    require JModuleHelper::getLayoutPath('mod_aeslider', $params->get('layout', 'default'));
} else {
    echo "<div class='alert alert-info'><strong>AE Featured Slider</strong></p>" . JText::_('NO_FEATURED_EVENTS') . "</p></div>";
}
