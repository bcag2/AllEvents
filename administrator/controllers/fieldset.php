<?php
/**
 * AlleventsControllerFieldset
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Fieldset controller class.
 *
 * @since  1.6
 */
class AlleventsControllerFieldset extends JControllerForm
{
    /**
     * Constructor
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->view_list = 'fieldsets';
        parent::__construct();
    }
}
