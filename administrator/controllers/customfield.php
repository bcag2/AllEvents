<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * AllEventsControllerCustomfield
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerCustomfield extends JControllerForm
{
    /**
     * AllEventsControllerCustomfield constructor.
     */
    function __construct()
    {
        $this->view_list = 'customfields';
        parent::__construct();
    }
}
