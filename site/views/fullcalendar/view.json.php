<?php
// No direct access to this file
defined('_JEXEC') or die;

// import Joomla view library
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
     * @return void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $input = JFactory::getApplication()->input;
        $layout = $input->getString('layout');
        $this->params = AllEventsHelperParam::getGlobalParam();

        if (in_array($layout, [
            'jsonevt',
            'jsonadmin',
            'mod_aefullcalendar',
            'jsoneventstable',
            'jsoneventstable2',
            'jsoneventstabler',
            'mod_aecalendar',
            'mod_aemonthly',
            'mod_aebiccalendar',
            'mod_aezabuto'])) {
            $this->events = $this->get('Events');
        } elseif (in_array($layout, [
            'jsonplace',
            'jsonagenda',
            'jsonactivity'])) {
            $this->data = $this->get('Data');
        } elseif ($layout == 'place_crud') {
            $this->places = $this->get('Places');
        } elseif ($layout == 'filters') {
            $this->item = $this->get('Data');
        } elseif ($layout == 'event_select') {
            $this->events = $this->get('Event');
        } elseif ($layout == 'jsongcal') {
            $this->calendars = $this->get('Calendars');
        } elseif ($layout == 'jsonicscal') {
            $this->calendars = $this->get('ICSCalendars');
        }
        parent::display($tpl);
    }
}
