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
    protected $events;

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

        if ($layout == 'mod_aemonthly')
            $this->events = $this->get('Events');

        parent::display($tpl);

        return;
    }
}

?>
