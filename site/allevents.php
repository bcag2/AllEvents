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
// Include dependancies
jimport('joomla.application.component.controller');
require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/allevents.php';
require_once(JPATH_SITE . '/components/com_allevents/helpers/image.class.php');

AllEventsHelper::UpdateEnrolmentsFromOrders();

// Execute the task.
$controller = JControllerLegacy::getInstance('AllEvents');
$controller->execute(JFactory::getApplication()->input->getString('task'));
$controller->redirect();