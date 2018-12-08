<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * AlleventsControllerRibbon
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.1
 */
class AlleventsControllerRibbon extends JControllerForm
{
    /**
     * Constructor
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->view_list = 'ribbons';
        parent::__construct();
    }
}
