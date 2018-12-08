<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewEvent extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;
    protected $statenrolmentshtml;
    protected $enrolments;

    /**
     * AllEventsViewEvent::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');
        $this->statenrolmentshtml = $this->get('StatEnrolmentsHTML');

        // Set the model
        $model = JModelList::getInstance('Enrolments', 'AllEventsModel');
        $this->enrolments = $model->getEnrolmentsByEvent($this->item->id);

        if (empty($this->item->access)) {
            $this->item->access = (int)(JFactory::getConfig()->get('access') || 1);
        }

        if (!class_exists('AllEventsHelperParam')) require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
        $this->params = AllEventsHelperParam::getGlobalParam();
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        $this->addToolbar();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * AllEventsViewEvent::addToolbar()
     *
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

        JToolbarHelper::title(JText::_('EVENT'), 'event.png');
        // If not checked out, can save the item.
        if (!$checkedOut && ($canDo->get('core.edit') || ($canDo->get('core.create')))) {
            JToolbarHelper::apply('event.apply', 'JTOOLBAR_APPLY');
            JToolbarHelper::save('event.save', 'JTOOLBAR_SAVE');
        }
        if (!$checkedOut && ($canDo->get('core.create'))) {
            JToolbarHelper::custom('event.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
        }
        // If an existing item, can save to a copy.
        if (!$isNew && $canDo->get('core.create')) {
            JToolbarHelper::custom('event.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
        }
        if (empty($this->item->id)) {
            JToolbarHelper::cancel('event.cancel', 'JTOOLBAR_CANCEL');
        } else {
            JToolbarHelper::cancel('event.cancel', 'JTOOLBAR_CLOSE');
        }
        if ((!empty($this->item->id)) && (!empty($this->enrolments))) {
            $title = JText::_('COM_ALLEVENTS_TOOLBAR_MAIL_SEND_MAIL');
            $layout = new JLayoutFile('mail1event', $basePath = JPATH_SITE . '/components/com_allevents/layouts');
            $dhtml = $layout->render(['title' => $title]);
            $bar = JToolbar::getInstance('toolbar');
            $bar->appendButton('Custom', $dhtml, 'envelope');
        }
        JToolbarHelper::help('screen.how_create_event', true);
    }
}