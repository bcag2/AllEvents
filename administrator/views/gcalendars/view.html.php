<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.satellites', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewGcalendars
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewGcalendars extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;

    /**
     * AllEventsViewGcalendars::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
        $this->searchterms = $this->state->get('filter.search');
        if (!class_exists('AllEventsHelperParam')) require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
        $this->params = AllEventsHelperParam::getGlobalParam();
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        AllEventsHelper::addSubmenu('gcalendars');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * AllEventsViewGcalendars::addToolbar()
     *
     */
    protected function addToolbar()
    {
        require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

        //$state = $this->get('State');
        $canDo = AllEventsHelper::getActions();

        JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_GCALENDARS'), 'broadcast');
        // Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_SITE . '/administrator/components/com_allevents/views/gcalendar';
        if (file_exists($formPath)) {
            if ($canDo->get('core.create')) {
                JToolbarHelper::addNew('gcalendar.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolbarHelper::editList('gcalendar.edit', 'JTOOLBAR_EDIT');
            }
        }
        if ($canDo->get('core.create')) {
            JToolbarHelper::custom('gcalendars.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
        }

        if ($canDo->get('core.edit')) {
            if ($this->state->get('filter.state') != 2) {
                JToolbarHelper::publish('gcalendars.publish', 'JTOOLBAR_PUBLISH', true);
                JToolbarHelper::unpublish('gcalendars.unpublish', 'JTOOLBAR_UNPUBLISH', true);
            }

            if ($this->state->get('filter.state') != -1) {
                if ($this->state->get('filter.state') != 2) {
                    JToolbarHelper::archiveList('gcalendars.archive');
                } elseif ($this->state->get('filter.state') == 2) {
                    JToolbarHelper::unarchiveList('gcalendars.publish');
                }
            }
        }

        if ($canDo->get('core.edit')) {
            JToolbarHelper::checkin('gcalendars.checkIn');
        }

        if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
            JToolbarHelper::deleteList('', 'gcalendars.delete', 'JTOOLBAR_EMPTY_TRASH');
        } elseif ($canDo->get('core.edit')) {
            JToolbarHelper::trash('gcalendars.trash');
        }

        if ($canDo->get('core.satellites')) {
            JToolbarHelper::preferences('com_allevents');
        }
        // JToolbarHelper::help('JHELP_COMPONENTS_BANNERS_BANNERS');
        // Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=gcalendars');

        $this->extra_sidebar = '';
    }

    /**
     * AllEventsViewGcalendars::getSortFields()
     *
     * @return array
     */
    protected function getSortFields()
    {
        return [
            'a.published ASC' => JText::_('JSTATUS_ASC'),
            'a.titre' => JText::_('COM_ALLEVENTS_HEADING_TITRE_DESC'),
            'a.id DESC' => JText::_('JGRID_HEADING_ID_DESC')
        ];

    }
}