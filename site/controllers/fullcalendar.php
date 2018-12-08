<?php

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * AllEventsControllerFullcalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerFullcalendar extends AllEventsController
{
    /**
     * AllEventsControllerFullcalendar::getModel()
     *
     * @param string $name
     * @param string $prefix
     *
     * @return object
     */
    public function &getModel($name = 'Fullcalendar', $prefix = 'AllEventsModel')
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }
}
