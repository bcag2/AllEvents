<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewEnrolment
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewEnrolment extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;

    /**
     * AllEventsViewEnrolment::display()
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
        if (empty($this->item->access)) {
            $this->item->access = (int)(JFactory::getConfig()->get('access') || 1);
        }
        $this->form = $this->get('Form');
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
     * AllEventsViewEnrolment::addToolbar()
     *
     */
    protected function addToolbar()
    {
        JFactory::getApplication()->input->set('hidemainmenu', true);
        JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_ENROLMENT'), 'users.png');

        if (isset($this->item) && !empty($this->item)) {
            $user = JFactory::getUser();
            $isNew = ($this->item->id == 0);
            if (isset($this->item->checked_out)) {
                $checkedOut = !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
            } else {
                $checkedOut = false;
            }
            $canDo = AllEventsHelper::getActions();
            // If not checked out, can save the item.
            if (!$checkedOut && ($canDo->get('core.edit') || ($canDo->get('core.create')))) {
                JToolbarHelper::apply('enrolment.apply', 'JTOOLBAR_APPLY');
                JToolbarHelper::save('enrolment.save', 'JTOOLBAR_SAVE');
            }
            if (!$checkedOut && ($canDo->get('core.create'))) {
                JToolbarHelper::custom('enrolment.save2same', 'save-new.png', 'save-new_f2.png', 'COM_ALLEVENTS_ENROLMENT_SAVE_AND_SAME', false);
                JToolbarHelper::custom('enrolment.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
            }
            // If an existing item, can save to a copy.
            if (!$isNew && $canDo->get('core.create')) {
                JToolbarHelper::custom('enrolment.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
            }
            if (empty($this->item->id)) {
                JToolbarHelper::cancel('enrolment.cancel', 'JTOOLBAR_CANCEL');
            } else {
                JToolbarHelper::cancel('enrolment.cancel', 'JTOOLBAR_CLOSE');
            }
        } else {
            JToolbarHelper::cancel('enrolment.cancel', 'JTOOLBAR_CLOSE');
        }
    }
}