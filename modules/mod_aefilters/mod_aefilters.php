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
$Agendas = modAEFiltersHelper::getAgendas();

jimport('joomla.html.parameter');
jimport('joomla.application.module.helper');
$modid = $module->id;
$params = JModuleHelper2::findModuleParams($modid);
$moduleParams = new JRegistry();
$moduleParams->loadString($params);
$dc = (int)$moduleParams->get('display_colors');
$dct = (int)$moduleParams->get('display_colors_fore');
$dcb = (int)$moduleParams->get('display_colors_back');
if (empty($dc) || empty($dct) || empty($dcb)) {
    $params = AllEventsHelperParam::getGlobalParam();
    if (empty($dc)) {
        $dc = $params['gdisplay_colors'];
    }
    if (empty($dct)) {
        $dct = $params['gdisplay_colors_fore'];
    }
    if (empty($dcb)) {
        $dcb = $params['gdisplay_colors_back'];
    }
}

require(JModuleHelper::getLayoutPath('mod_aefilters'));

