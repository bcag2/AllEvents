<?php

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.forms', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AlleventsViewFields
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AlleventsViewFields extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;

    /**
     * Display the view
     *
     * @param   string $tpl Template name
     *
     * @return void
     *
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        AllEventsHelper::addSubmenu('fields');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @return void
     *
     * @since    1.6
     */
    protected function addToolbar()
    {
        require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

        //$state = $this->get('State');
        $canDo = AllEventsHelper::getActions();

        JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_FIELDS'), '');
        // Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_SITE . '/administrator/components/com_allevents/views/field';
        if (file_exists($formPath)) {
            if ($canDo->get('core.create')) {
                JToolbarHelper::addNew('field.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolbarHelper::editList('field.edit', 'JTOOLBAR_EDIT');
            }
        }
        if ($canDo->get('core.create')) {
            JToolbarHelper::custom('fields.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
        }

        if ($canDo->get('core.edit')) {
            if ($this->state->get('filter.state') != 2) {
                JToolbarHelper::publish('fields.publish', 'JTOOLBAR_PUBLISH', true);
                JToolbarHelper::unpublish('fields.unpublish', 'JTOOLBAR_UNPUBLISH', true);
            }

            if ($this->state->get('filter.state') != -1) {
                if ($this->state->get('filter.state') != 2) {
                    JToolbarHelper::archiveList('fields.archive');
                } elseif ($this->state->get('filter.state') == 2) {
                    JToolbarHelper::unarchiveList('fields.publish');
                }
            }
        }

        if ($canDo->get('core.edit')) {
            JToolbarHelper::checkin('fields.checkIn');
        }

        if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
            JToolbarHelper::deleteList('', 'fields.delete', 'JTOOLBAR_EMPTY_TRASH');
        } elseif ($canDo->get('core.edit')) {
            JToolbarHelper::trash('fields.trash');
        }

        if ($canDo->get('core.satellites')) {
            JToolbarHelper::preferences('com_allevents');
        }
        // JToolbarHelper::help('JHELP_COMPONENTS_BANNERS_BANNERS');
        // Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=fields');

        $this->extra_sidebar = '';
    }

    /**
     * Method to order fields
     *
     * @return array()
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
