<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

// No direct access to this file
defined('_JEXEC') or die;

/**
 * View class Admin - List of Custom Fields - AllEvents.
 */
class AllEventsViewCustomfields extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;
    protected $params;

    /**
     * Display the view
     *
     * @since    3.4.0
     *
     * @param null $tpl
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

        AllEventsHelper::addSubmenu('customfields');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since    3.4.0
     */
    protected function addToolbar()
    {
        require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

        //$state        = $this->get('State');
        //$user = JFactory::getUser();
        //$userId        = $user->get('id');
        $canDo = AllEventsHelper::getActions();

        JToolbarHelper::title(JText::_('COM_ALLEVENTS_CUSTOMFIELDS'), 'menu-3');

        //Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_SITE . '/administrator/components/com_allevents/views/customfield';
        if (file_exists($formPath)) {
            if ($canDo->get('core.create')) {
                JToolbarHelper::addNew('customfield.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolbarHelper::editList('customfield.edit', 'JTOOLBAR_EDIT');
            }
        }
        if ($canDo->get('core.create')) {
            // interet ???
            // JToolbarHelper::custom('customfields.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
        }

        if ($canDo->get('core.edit')) {
            if ($this->state->get('filter.state') != 2) {
                JToolbarHelper::publish('customfields.publish', 'JTOOLBAR_PUBLISH', true);
                JToolbarHelper::unpublish('customfields.unpublish', 'JTOOLBAR_UNPUBLISH', true);
            }

            if ($this->state->get('filter.state') != -1) {
                if ($this->state->get('filter.state') != 2) {
                    JToolbarHelper::archiveList('customfields.archive');
                } elseif ($this->state->get('filter.state') == 2) {
                    JToolbarHelper::unarchiveList('customfields.publish');
                }
            }
        }

        if ($canDo->get('core.edit')) {
            JToolbarHelper::checkin('customfields.checkIn');
        }

        if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
            JToolbarHelper::deleteList('', 'customfields.delete', 'JTOOLBAR_EMPTY_TRASH');
        } elseif ($canDo->get('core.edit')) {
            JToolbarHelper::trash('customfields.trash');
        }

        if ($canDo->get('core.satellites')) {
            JToolbarHelper::preferences('com_allevents');
        }
        // JToolbarHelper::help('JHELP_COMPONENTS_BANNERS_BANNERS');
        // Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=customfields');

        $this->extra_sidebar = '';
    }

    /**
     * AllEventsViewActivities::getSortFields()
     *
     * @return array
     */
    protected function getSortFields()
    {
        return [
            'cf.published ASC' => JText::_('JSTATUS_ASC'),
            'cf.titre' => JText::_('COM_ALLEVENTS_HEADING_TITRE_DESC'),
            'cf.id DESC' => JText::_('JGRID_HEADING_ID_DESC')
        ];

    }
}
