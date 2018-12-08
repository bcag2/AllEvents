<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');
JHtml::_('bootstrap.modal', 'collapseModal');
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsViewEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewEvents extends JViewLegacy
{
    /**
     * An array of items
     *
     * @var  array
     */
    protected $items;
    /**
     * The pagination object
     *
     * @var  JPagination
     */
    protected $pagination;
    /**
     * The model state
     *
     * @var  object
     */
    protected $state;
    protected $params;
    protected $AgendasMostViewed;
    protected $NbAgendas;
    protected $agendas;
    protected $layout;

    /**
     * AllEventsViewEvents::display()
     * Display the view
     *
     * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
     *
     * @return mixed A string if successful, otherwise an Error object.
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
        $this->params = AllEventsHelperParam::getGlobalParam();
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        if ($this->getLayout() !== 'modal') {
            AllEventsHelper::addSubmenu('events');
        }

        $jinput = JFactory::getApplication()->input;
        $this->layout = $jinput->getCmd('layout', $this->params['gtemplateadminevents']);
        $this->setLayout($this->layout);

        if ($this->layout == 'calendar') {
            $model = JModelList::getInstance('Agendas', 'AllEventsModel');
            $this->agendas = $model->getItems();
            $this->NbAgendas = $model->getNbAgendas();
            $this->AgendasMostViewed = $model->getAgendasMostViewed();
        }

        // We don't need toolbar in the modal window.
        if ($this->getLayout() !== 'modal') {
            $this->addToolbar();
            $this->sidebar = JHtmlSidebar::render();
        }

        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * AllEventsViewEvents::addToolbar()
     *
     */
    protected function addToolbar()
    {
        require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

        if ($this->layout == 'default') {
            //$state = $this->get('State');
            $canDo = AllEventsHelper::getActions();
            $bar = JToolbar::getInstance('toolbar');

            JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_EVENTS'), 'calendar');
            // Check if the form exists before showing the add/edit buttons
            $formPath = JPATH_SITE . '/administrator/components/com_allevents/views/event';
            if (file_exists($formPath)) {
                if ($canDo->get('core.create')) {
                    JToolbarHelper::addNew('event.add', 'JTOOLBAR_NEW');
                }

                if ($canDo->get('core.edit') && isset($this->items[0])) {
                    JToolbarHelper::editList('event.edit', 'JTOOLBAR_EDIT');
                }
            }
            if ($canDo->get('core.create')) {
                JToolbarHelper::custom('events.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
            }

            if ($canDo->get('core.edit')) {
                if ($this->state->get('filter.state') != 2) {
                    JToolbarHelper::publish('events.publish', 'JTOOLBAR_PUBLISH', true);
                    JToolbarHelper::unpublish('events.unpublish', 'JTOOLBAR_UNPUBLISH', true);
                }

                if ($this->state->get('filter.state') != -1) {
                    if ($this->state->get('filter.state') != 2) {
                        JToolbarHelper::archiveList('events.archive');
                    } elseif ($this->state->get('filter.state') == 2) {
                        JToolbarHelper::unarchiveList('events.publish');
                    }
                }
            }

            if ($canDo->get('core.edit')) {
                JToolbarHelper::checkin('events.checkIn');
            }

            // Add a import button
            if ($canDo->get('core.create') && $canDo->get('core.edit') && $this->params['gshow_samples']) {
                $title = JText::_('COM_ALLEVENTS_TOOLBAR_IMPORT');
                $layout = new JLayoutFile('import', $basePath = JPATH_SITE . '/administrator/components/com_allevents/layouts');
                $dhtml = $layout->render(['title' => $title]);
                $bar->appendButton('Custom', $dhtml, 'batch');
            }

            // Add a batch button
            if ($canDo->get('core.create') && $canDo->get('core.edit')) {
                $title = JText::_('JTOOLBAR_BATCH');
                $layout = new JLayoutFile('batch', $basePath = JPATH_SITE . '/administrator/components/com_allevents/layouts');
                $dhtml = $layout->render(['title' => $title]);
                $bar->appendButton('Custom', $dhtml, 'batch');
            }

            if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete')) {
                JToolbarHelper::deleteList('', 'events.delete', 'JTOOLBAR_EMPTY_TRASH');
            } elseif ($canDo->get('core.edit')) {
                JToolbarHelper::trash('events.trash');
            }

            if ($canDo->get('core.satellites')) {
                JToolbarHelper::preferences('com_allevents');
            }
            JToolBarHelper::custom('events.export', 'grid', '', JText::_('JTOOLBAR_EXPORT'), false);

            JHtmlSidebar::setAction('index.php?option=com_allevents&view=events');

            if ($this->params['controlpanel_showactivities']) {
                JHtmlSidebar::addFilter(JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('ACTIVITY')), 'filter_activity', JHtml::_('select.options', $this->get('Activities'), 'value', 'text', $this->state->get('filter.activity'), true));
            }
            if ($this->params['controlpanel_showagendas']) {
                JHtmlSidebar::addFilter(JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('AGENDA')), 'filter_agenda', JHtml::_('select.options', $this->get('Agendas'), 'value', 'text', $this->state->get('filter.agenda'), true));
            }
            if ($this->params['controlpanel_showcategories']) {
                JHtmlSidebar::addFilter(JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('CATEGORY')), 'filter_category', JHtml::_('select.options', $this->get('Categories'), 'value', 'text', $this->state->get('filter.category'), true));
            }
            if ($this->params['controlpanel_showplaces']) {
                JHtmlSidebar::addFilter(JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('PLACE')), 'filter_place', JHtml::_('select.options', $this->get('Places'), 'value', 'text', $this->state->get('filter.place'), true));
            }
            if ($this->params['controlpanel_showpublics']) {
                JHtmlSidebar::addFilter(JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('PUBLIC')), 'filter_public', JHtml::_('select.options', $this->get('Publics'), 'value', 'text', $this->state->get('filter.public'), true));
            }
            if ($this->params['controlpanel_showressources']) {
                JHtmlSidebar::addFilter(JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('RESOURCE')), 'filter_ressource', JHtml::_('select.options', $this->get('Ressources'), 'value', 'text', $this->state->get('filter.ressource'), true));
            }
            if ($this->params['controlpanel_showsections']) {
                JHtmlSidebar::addFilter(JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('SECTION')), 'filter_section', JHtml::_('select.options', $this->get('Sections'), 'value', 'text', $this->state->get('filter.section'), true));
            }
            if (JLanguageMultilang::isEnabled()) {
                JHtmlSidebar::addFilter(JText::_('JOPTION_SELECT_LANGUAGE'), 'filter_language', JHtml::_('select.options', JHtml::_('contentlanguage.existing', true, true), 'value', 'text', $this->state->get('filter.language')));
            }
            JHtmlSidebar::setAction('index.php?option=com_allevents&view=events');
        } else {
            JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_EVENTS'), 'calendar');
            JHtmlSidebar::setAction('index.php?option=com_allevents&view=events');
        }
    }

    /**
     * AllEventsViewEvents::getSortFields()
     *
     * @return array
     */
    protected function getSortFields()
    {
        return [
            'a.published ASC' => JText::_('JSTATUS_ASC'),
            'a.date' => JText::_('JSTATUS_ASC'),
            'a.titre' => JText::_('COM_ALLEVENTS_HEADING_TITRE_DESC'),
            'a.proposed_by' => JText::_('COM_ALLEVENTS_HEADING_PROPOSED_BY_DESC'),
            'a.language' => JText::_('COM_ALLEVENTS_HEADING_LANGUAGE_DESC'),
            'a.id' => JText::_('JGRID_HEADING_ID_DESC')];
    }
}