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
jimport('joomla.html.parameter');
jimport('joomla.application.module.helper');
$module = JModuleHelper::getModule('mod_aedrag');
$moduleParams = new JRegistry();
$moduleParams->loadString($module->params);
$sID = $moduleParams->get('events');
$Events = modAEDragHelper::getDBevents($sID);

require(JModuleHelper::getLayoutPath('mod_aedrag'));
