<?php

defined('_JEXEC') or die;
jimport('joomla.application.component.view');

/**
 * AllEventsViewFullcalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewFullcalendar extends JViewLegacy
{
    protected $params;
    protected $data;
    protected $places;
    protected $item;
    protected $events;
    protected $calendars;

    /**
     * AllEventsViewFullcalendar::display()
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

        if ($layout == 'jsonevt')
            $this->events = $this->get('Events');
        if ($layout == 'mod_aefullcalendar')
            $this->events = $this->get('Events');
        if ($layout == 'place_crud')
            $this->places = $this->get('Places');
        if ($layout == 'filters')
            $this->item = $this->get('Data');
        if ($layout == 'event_select')
            $this->events = $this->get('Event');
        if ($layout == 'jsongcal')
            $this->calendars = $this->get('Calendars');
        if ($layout == 'jsonicscal')
            $this->calendars = $this->get('CalendarsICS');

        parent::display($tpl);

        return;
    }
}


