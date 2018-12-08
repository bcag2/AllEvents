<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.admin', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewCustomfield
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewCustomfield extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;

    /**
     * AllEventsViewCustomfield::display()
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
     * AllEventsViewCustomfield::addToolbar()
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
        JToolbarHelper::title($isNew ? 'AllEvents <span style="font-size:14px;">- ' . JText::_('COM_ALLEVENTS_LEGEND_NEW_CUSTOMFIELD') . '</span>' : 'AllEvents <span style="font-size:14px;">- ' . JText::_('COM_ALLEVENTS_LEGEND_EDIT_CUSTOMFIELD') . '</span>', $isNew ? 'new' : 'pencil-2');

        $aeTitle = $isNew ? JText::_('COM_ALLEVENTS_LEGEND_NEW_CUSTOMFIELD') : JText::_('COM_ALLEVENTS_LEGEND_EDIT_CUSTOMFIELD');

        $app = JFactory::getApplication();
        $sitename = $app->get('sitename');
        $title = $sitename . ' - ' . JText::_('JADMINISTRATION') . ' - AllEvents: ' . $aeTitle;
        $document = JFactory::getDocument();
        $document->setTitle($title);
        // If not checked out, can save the item.
        if (!$checkedOut && ($canDo->get('core.edit') || ($canDo->get('core.create')))) {
            JToolbarHelper::apply('customfield.apply', 'JTOOLBAR_APPLY');
            JToolbarHelper::save('customfield.save', 'JTOOLBAR_SAVE');
        }
        if (!$checkedOut && ($canDo->get('core.create'))) {
            JToolbarHelper::custom('customfield.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
        }
        // If an existing item, can save to a copy.
        if (!$isNew && $canDo->get('core.create')) {
            JToolbarHelper::custom('customfield.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
        }
        if (empty($this->item->id)) {
            JToolbarHelper::cancel('customfield.cancel', 'JTOOLBAR_CANCEL');
        } else {
            JToolbarHelper::cancel('customfield.cancel', 'JTOOLBAR_CLOSE');
        }
    }
}
