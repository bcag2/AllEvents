<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.satellites', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AlleventsViewRibbons
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.1
 */
class AlleventsViewRibbons extends JViewLegacy
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

        AllEventsHelper::addSubmenu('ribbons');

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
        $state = $this->get('State');
        $canDo = AllEventsHelper::getActions();

        JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_RIBBONS'), 'ribbons.png');

        // Check if the form exists before showing the add/edit buttons
        $formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/ribbon';

        if (file_exists($formPath)) {
            if ($canDo->get('core.create')) {
                JToolbarHelper::addNew('ribbon.add', 'JTOOLBAR_NEW');
                JToolbarHelper::custom('ribbons.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
            }

            if ($canDo->get('core.edit') && isset($this->items[0])) {
                JToolbarHelper::editList('ribbon.edit', 'JTOOLBAR_EDIT');
            }
        }

        if ($canDo->get('core.edit.state')) {
            if (isset($this->items[0]->state)) {
                JToolbarHelper::divider();
                JToolbarHelper::custom('ribbons.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
                JToolbarHelper::custom('ribbons.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
            } elseif (isset($this->items[0])) {
                // If this component does not use state then show a direct delete button as we can not trash
                JToolbarHelper::deleteList('', 'ribbons.delete', 'JTOOLBAR_DELETE');
            }

            if (isset($this->items[0]->state)) {
                JToolbarHelper::divider();
                JToolbarHelper::archiveList('ribbons.archive', 'JTOOLBAR_ARCHIVE');
            }

            if (isset($this->items[0]->checked_out)) {
                JToolbarHelper::custom('ribbons.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
            }
        }

        // Show trash and delete for components that uses the state field
        if (isset($this->items[0]->state)) {
            if ($state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolbarHelper::deleteList('', 'ribbons.delete', 'JTOOLBAR_EMPTY_TRASH');
                JToolbarHelper::divider();
            } elseif ($canDo->get('core.edit.state')) {
                JToolbarHelper::trash('ribbons.trash', 'JTOOLBAR_TRASH');
                JToolbarHelper::divider();
            }
        }

        if ($canDo->get('core.admin')) {
            JToolbarHelper::preferences('com_allevents');
        }

        // Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=ribbons');

        $this->extra_sidebar = '';
    }

    /**
     * Method to order fields
     *
     * @return array|void
     */
    protected function getSortFields()
    {
        return [
            'a.`id`' => JText::_('JGRID_HEADING_ID'),
            'a.`titre`' => JText::_('COM_ALLEVENTS_RIBBONS_TITRE'),
            'a.`couleur`' => JText::_('COM_ALLEVENTS_RIBBONS_COULEUR'),
            'a.`couleur_texte`' => JText::_('COM_ALLEVENTS_RIBBONS_COULEUR_TEXTE'),
            'a.`ordering`' => JText::_('JGRID_HEADING_ORDERING'),
            'a.`published`' => JText::_('COM_ALLEVENTS_RIBBONS_PUBLISHED'),
        ];
    }
}
