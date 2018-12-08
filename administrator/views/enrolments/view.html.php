<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewEnrolments
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewEnrolments extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;

    /**
     * AllEventsViewEnrolments::display()
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

        AllEventsHelper::addSubmenu('enrolments');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * AllEventsViewEnrolments::addToolbar()
     *
     */
    protected function addToolbar()
    {
        require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

        //$state = $this->get('State');
        $canDo = AllEventsHelper::getActions();

        JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_ENROLMENTS'), 'users');
        // Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_SITE . '/administrator/components/com_allevents/views/enrolment';
        if (file_exists($formPath)) {
            if ($canDo->get('core.create')) {
                JToolbarHelper::addNew('enrolment.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolbarHelper::editList('enrolment.edit', 'JTOOLBAR_EDIT');
            }
        }
        if ($canDo->get('core.create')) {
            JToolbarHelper::custom('enrolments.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
        }

        if ($canDo->get('core.edit')) {
            if ($this->state->get('filter.state') != 2) {
                JToolbarHelper::publish('enrolments.publish', 'JTOOLBAR_PUBLISH', true);
                JToolbarHelper::unpublish('enrolments.unpublish', 'JTOOLBAR_UNPUBLISH', true);
            }

            if ($this->state->get('filter.state') != -1) {
                if ($this->state->get('filter.state') != 2) {
                    JToolbarHelper::archiveList('enrolments.archive');
                } elseif ($this->state->get('filter.state') == 2) {
                    JToolbarHelper::unarchiveList('enrolments.publish');
                }
            }
        }

        if ($canDo->get('core.edit')) {
            JToolbarHelper::checkin('enrolments.checkIn');
        }

        if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
            JToolbarHelper::deleteList('', 'enrolments.delete', 'JTOOLBAR_EMPTY_TRASH');
        } elseif ($canDo->get('core.edit')) {
            JToolbarHelper::trash('enrolments.trash');
        }

        if ($canDo->get('core.satellites')) {
            JToolbarHelper::preferences('com_allevents');
        }
        JToolBarHelper::custom('enrolments.export', 'grid', '', JText::_('JTOOLBAR_EXPORT'), false);

        // JToolbarHelper::help('JHELP_COMPONENTS_BANNERS_BANNERS');
        // Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=enrolments');

        $this->extra_sidebar = '';
    }

    /**
     * AllEventsViewEnrolments::getSortFields()
     *
     * @return array
     */
    protected function getSortFields()
    {
        return [
            'e.titre' => JText::_('COM_ALLEVENTS_HEADING_TITRE_ASC'),
            'user_id.name' => JText::_('COM_ALLEVENTS_HEADING_NAME_ASC'),
            'en.id' => JText::_('JGRID_HEADING_ID_ASC'),
            'en.enroldate' => JText::_('COM_ALLEVENTS_HEADING_ENROL_DATE_ASC')
        ];
    }
}