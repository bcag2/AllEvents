<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * AllEventsControllerEnrolment
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerEnrolment extends JControllerForm
{
    /**
     * AllEventsControllerEnrolment::__construct()
     */
    function __construct()
    {
        $this->view_list = 'enrolments';
        parent::__construct();
    }

    /**
     * AllEventsControllerEnrolment::()
     */
    function save2same()
    {
        parent::save();
        $data = $this->input->post->get('jform', [], 'array');
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=enrolment&layout=edit&event_id=' . $data['event_id'], false));
    }
}
