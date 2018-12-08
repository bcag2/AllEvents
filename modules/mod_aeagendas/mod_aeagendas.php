<?php
/**
 * mod_aeagendas
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

// Include the helper functions only once
JLoader::register('modAEAgendasHelper', __DIR__ . '/helper.php');

$cacheid = md5($module->id);

$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'modAEAgendasHelper';
$cacheparams->method = 'getItems';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;

$list = JModuleHelper::moduleCache($module, $params, $cacheparams);

if (!empty($list)) {
    $moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');
    require JModuleHelper::getLayoutPath('mod_aeagendas', $params->get('layout', 'default'));
}
