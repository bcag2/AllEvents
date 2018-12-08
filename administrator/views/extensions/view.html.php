<?php

/**
 * AllEventsModelExtensions
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

/**
 * Class AllEventsViewExtensions
 */
class AllEventsViewExtensions extends JViewLegacy
{
    protected $items;

    /**
     * AllEventsViewExtensions::display()
     * Display the view
     *
     * @param mixed $tpl
     *
     * @return bool|mixed
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->items = $this->get('Items');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JFactory::getApplication()->enqueueMessage(implode("\n", $errors), 'error');

            return false;
        }

        $this->addToolbar();

        parent::display($tpl);

        return true;
    }

    /**
     * AllEventsViewExtensions::addToolbar()
     * Add the page title and toolbar.
     */
    protected function addToolbar()
    {
        $user = JFactory::getUser();

        // Get the toolbar object instance
        $bar = JToolbar::getInstance('toolbar');

        JToolbarHelper::title(JText::_('COM_ALLEVENTS'), 'extensionsmanagercktitle');

        if ($user->authorise('core.admin', 'com_installer') && $user->authorise('core.manage', 'com_installer')) {
            $dhtml = '<button class="btn btn-small" onclick="ckloadAllData(\'1\')"><span class="icon-reload">&nbsp;</span>  ' . JText::_('AE_RELOAD') . '</button>';
            $bar->appendButton('Custom', $dhtml, 'ckloadAllData');
        }
    }


    /**
     * AllEventsViewExtensions::getActions()
     * List the actions that can be performed.
     *
     * @return Object - the action list
     */
    protected function getActions()
    {
        $user = JFactory::getUser();
        $result = new stdClass();
        $ext = 'com_allevents';

        $actions = [
            'core.admin',
            'core.manage',
        ];

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $ext));
        }

        return $result;
    }
}
