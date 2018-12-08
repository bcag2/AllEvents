<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.admin', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewExport
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewExport extends JViewLegacy
{
    protected $form;

    /**
     * AllEventsViewExport::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->form = $this->get('Form');
        // add toolbar
        $this->addToolbar();
        // $this->sidebar = JHtmlSidebar::render();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * AllEventsViewImport::addToolbar()
     *
     */
    protected function addToolbar()
    {
        JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_EXPORT'), 'tableexport');

        JToolbarHelper::back();
        JToolbarHelper::divider();
        JToolbarHelper::help('export', true);
    }
}

