<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * AllEventsViewBootstrapcalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewBootstrapcalendar extends JViewLegacy
{
    protected $params;
    protected $events;

    /**
     * AllEventsViewBootstrapcalendar::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $input = JFactory::getApplication()->input;
        $layout = $input->getString('layout');

        if ($layout == 'jsonevt') $this->events = $this->get('Events');
        parent::display($tpl);

        return;
    }
}


