<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
// TODO: #14 mettre en place la langue
defined('_JEXEC') or die;
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

$app = JFactory::getApplication();

require_once(JPATH_SITE . '/components/com_allevents/helpers/image.class.php');

// Include dependancies
jimport('joomla.application.component.controller');
// Require helper file
JLoader::register('AllEventsHelper', dirname(__FILE__) . '/helpers/allevents.php');

// check multilanguages tables
$app = JFactory::getApplication();
if ($app->isAdmin() AND method_exists('AllEventsHelper', 'getMultilangTables') AND class_exists('multiLanguages')) {
    $tables = AllEventsHelper::getMultilangTables();
    $multiLanguage = new multiLanguages();
    $multiLanguage->setExtension('allevents');
    $multiLanguage->checkTables($tables);
}

AllEventsHelper::UpdateEnrolmentsFromOrders();

$controller = JControllerLegacy::getInstance('AllEvents');
$controller->execute($app->input->getString('task'));

$controller->redirect();