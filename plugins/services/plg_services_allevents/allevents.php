<?php

defined('_JEXEC') or die('Restricted access');

include_once JPATH_PLUGINS . '/services/allevents/allevents/agenda.php';

/**
 * plgServicesAllEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgServicesAllEvents extends \Slim\Middleware
{
    /**
     * Load the language file on instantiation. Note this is only available in Joomla 3.1 and higher.
     * If you want to support 3.0 series you must override the constructor
     *
     * @var    boolean
     * @since  3.1
     */
    protected $autoloadLanguage = true;

    /**
     * plgServicesAllEvents::__construct()
     */
    function __construct()
    {
        $lang = JFactory::getLanguage();
        $lang->load('plg_services_allevents', dirname(__file__));

        $agenda = new agendaServicesAllEvents();
        $agenda->__construct();
    }

    /**
     * plgServicesAllEvents::call()
     *
     * @return
     */
    function call()
    {
        return $this->next->call();
    }
}
