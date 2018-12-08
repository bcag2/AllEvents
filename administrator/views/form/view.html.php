<?php

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.forms', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AlleventsViewForm
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AlleventsViewForm extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;

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
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        $this->addToolbar();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @return void
     *
     * @throws Exception
     */
    protected function addToolbar()
    {
        JFactory::getApplication()->input->set('hidemainmenu', true);

        $user = JFactory::getUser();
        $isNew = ($this->item->id == 0);
        if (isset($this->item->checked_out)) {
            $checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
        } else {
            $checkedOut = false;
        }
        $canDo = AllEventsHelper::getActions();
        JToolbarHelper::title($isNew ? 'AllEvents <span style="font-size:14px;">- ' . JText::_('COM_ALLEVENTS_LEGEND_NEW_FORM') . '</span>' : 'AllEvents <span style="font-size:14px;">- ' . JText::_('COM_ALLEVENTS_LEGEND_EDIT_FORM') . '</span>', $isNew ? 'new' : 'pencil-2');

        $aeTitle = $isNew ? JText::_('COM_ALLEVENTS_LEGEND_NEW_FORM') : JText::_('COM_ALLEVENTS_LEGEND_EDIT_FORM');

        $app = JFactory::getApplication();
        $sitename = $app->get('sitename');
        $title = $sitename . ' - ' . JText::_('JADMINISTRATION') . ' - AllEvents: ' . $aeTitle;
        $document = JFactory::getDocument();
        $document->setTitle($title);
        // If not checked out, can save the item.
        if (!$checkedOut && ($canDo->get('core.edit') || ($canDo->get('core.create')))) {
            JToolbarHelper::apply('form.apply', 'JTOOLBAR_APPLY');
            JToolbarHelper::save('form.save', 'JTOOLBAR_SAVE');
        }
        if (!$checkedOut && ($canDo->get('core.create'))) {
            JToolbarHelper::custom('form.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
        }
        // If an existing item, can save to a copy.
        if (!$isNew && $canDo->get('core.create')) {
            JToolbarHelper::custom('form.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
        }
        if (empty($this->item->id)) {
            JToolbarHelper::cancel('form.cancel', 'JTOOLBAR_CANCEL');
        } else {
            JToolbarHelper::cancel('form.cancel', 'JTOOLBAR_CLOSE');
        }
        JToolbarHelper::help('screen.how_create_agenda', true);
    }
}
