<?php

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.forms', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AlleventsViewForms
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AlleventsViewForms extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;
    protected $model;

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
        $this->model = $this->getModel();

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        AllEventsHelper::addSubmenu('forms');

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

        JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_FORMS'), '');
        // Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_SITE . '/administrator/components/com_allevents/views/form';
        if (file_exists($formPath)) {
            if ($canDo->get('core.create')) {
                JToolbarHelper::addNew('form.add', 'JTOOLBAR_NEW');
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolbarHelper::editList('form.edit', 'JTOOLBAR_EDIT');
            }
        }
        if ($canDo->get('core.create')) {
            JToolbarHelper::custom('forms.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
        }

        if ($canDo->get('core.edit')) {
            if ($this->state->get('filter.state') != 2) {
                JToolbarHelper::publish('forms.publish', 'JTOOLBAR_PUBLISH', true);
                JToolbarHelper::unpublish('forms.unpublish', 'JTOOLBAR_UNPUBLISH', true);
            }

            if ($this->state->get('filter.state') != -1) {
                if ($this->state->get('filter.state') != 2) {
                    JToolbarHelper::archiveList('forms.archive');
                } elseif ($this->state->get('filter.state') == 2) {
                    JToolbarHelper::unarchiveList('forms.publish');
                }
            }
        }

        if ($canDo->get('core.edit')) {
            JToolbarHelper::checkin('forms.checkIn');
        }

        if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
            JToolbarHelper::deleteList('', 'forms.delete', 'JTOOLBAR_EMPTY_TRASH');
        } elseif ($canDo->get('core.edit')) {
            JToolbarHelper::trash('forms.trash');
        }

        if ($canDo->get('core.satellites')) {
            JToolbarHelper::preferences('com_allevents');
        }
        // JToolbarHelper::help('JHELP_COMPONENTS_BANNERS_BANNERS');
        // Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=forms');

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
