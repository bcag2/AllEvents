<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.admin', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewInfo
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewInfo extends JViewLegacy
{
    /**
     * AllEventsViewInfo::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        // if (!class_exists('AllEventsClassMain')) require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/main.php');
        // $g_se_Main = new AllEventsClassMain();
        // $this->LastModCSSDirectory     = $g_se_Main->LastModCSSDirectory() ;
        // $this->LastModBulletsDirectory = $g_se_Main->LastModBulletsDirectory() ;
        // $this->LastModCSSDatabase      = $g_se_Main->LastModCSSDatabase() ;
        AllEventsHelper::addSubmenu('info');

        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * AllEventsViewInfo::addToolbar()
     *
     */
    protected function addToolbar()
    {
        JToolbarHelper::title(JText::_("COM_ALLEVENTS_TITLE_INFO"), 'support');
        JToolbarHelper::preferences('com_allevents');
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=info');
    }
}