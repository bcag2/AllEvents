<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * AllEventsControllerGcalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerGcalendar extends JControllerForm
{
    /**
     * AllEventsControllerGcalendar::__construct()
     */
    function __construct()
    {
        $this->view_list = 'gcalendars';
        parent::__construct();
    }
}
