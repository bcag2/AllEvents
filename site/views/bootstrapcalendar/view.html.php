<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
if (!class_exists('AllEventsHelperParam')) require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

/**
 * AllEventsViewBootstrapcalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewBootstrapcalendar extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;
    protected $params;
    protected $globalparams;
    protected $events;

    /**
     * AllEventsViewBootstrapcalendar::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->params = AllEventsHelperParam::getGlobalParam();
        $this->form = $this->get('Form');
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        $this->setLayout($this->params['display_template']);

        $this->_prepareDocument();
        parent::display($tpl);
    }

    /**
     * AllEventsViewBootstrapcalendar::_prepareDocument()
     *
     * @throws Exception
     */
    protected function _prepareDocument()
    {
        $app = JFactory::getApplication();
        $config = JFactory::getConfig();
        $menus = $app->getMenu();
        $title = null;
        // Because the application sets a default page title,
        // we need to get it from the menu item itself
        $menu = $menus->getActive();
        if ($menu) {
            $this->params->def('page_heading', $this->params->get('page_title', $menu->title));
        } else {
            $this->params->def('page_heading', JText::_('COM_ALLEVENTS_DEFAULT_PAGE_TITLE'));
        }
        $title = $this->params->get('page_title', '');
        if (empty($title)) {
            $title = $config->get('sitename');
        } elseif ($config->get('sitename_pagetitles', 0) == 1) {
            $title = JText::sprintf('JPAGETITLE', $config->get('sitename'), $title);
        } elseif ($config->get('sitename_pagetitles', 0) == 2) {
            $title = JText::sprintf('JPAGETITLE', $title, $config->get('sitename'));
        }
        $this->document = JFactory::getDocument();
        $this->document->setTitle($title);

        if ($this->params->get('menu-meta_description')) {
            $this->document->setDescription($this->params->get('menu-meta_description'));
        }

        if ($this->params->get('menu-meta_keywords')) {
            $this->document->setMetaData('keywords', $this->params->get('menu-meta_keywords'));
        }

        if ($this->params->get('robots')) {
            $this->document->setMetaData('robots', $this->params->get('robots'));
        }
    }
}
