<?php
defined('_JEXEC') or die;

/**
 * AllEventsViewMail
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewMail extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;

    /**
     * AllEventsViewMail::display()
     *
     * @uses : Display the view
     *
     * @param mixed $tpl
     *
     * @return bool|mixed
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');

        // if ($_POST) $this->get('Mail');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JFactory::getApplication()->enqueueMessage(implode("\n", $errors), 'error');

            return false;
        }
        $this->addToolbar();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);

        return true;
    }

    /**
     * AllEventsViewMail::addToolbar()
     *
     * @uses : Add the page title and toolbar.
     */
    protected function addToolbar()
    {
        JFactory::getApplication()->input->set('hidemainmenu', true);

        JToolbarHelper::title(JText::_('COM_ALLEVENTS_TITLE_MAIL'), 'mail.png');
        JToolbarHelper::custom('mail', 'envelope.png', 'send_f2.png', 'COM_ALLEVENTS_TOOLBAR_MAIL_SEND_MAIL', false);
        JToolbarHelper::cancel('mail.cancel', 'JTOOLBAR_CLOSE');
    }
}
