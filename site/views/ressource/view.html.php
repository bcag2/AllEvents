<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * AllEventsViewRessource
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewRessource extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * AllEventsViewRessource::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $user = JFactory::getUser();
        $this->params = AllEventsHelperParam::getGlobalParam();
        $this->state = $this->get('State');
        $this->item = $this->get('Data');
        $this->form = $this->get('Form');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        if ($this->_layout == 'edit') {
            if ($user->authorise('core.satellites', 'com_allevents') !== true) {
                throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
            }
        }

        $this->_prepareDocument();

        parent::display($tpl);
    }

    /**
     * AllEventsViewRessource::_prepareDocument()
     *
     * @throws Exception
     */
    protected function _prepareDocument()
    {
        $app = JFactory::getApplication();
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
            $title = JText::sprintf('JPAGETITLE', $this->item->titre, $app->get('sitename'));
        } elseif ($app->get('sitename_pagetitles', 0) == 1) {
            $title = JText::sprintf('JPAGETITLE', $app->get('sitename'), $title);
        } elseif ($app->get('sitename_pagetitles', 0) == 2) {
            $title = JText::sprintf('JPAGETITLE', $title, $app->get('sitename'));
        }
        $this->document->setTitle($title);


        if ($this->item->metadesc) {
            $this->document->setDescription($this->item->metadesc);
        } elseif ($this->params->get('menu-meta_description')) {
            $this->document->setDescription($this->params->get('menu-meta_description'));
        }

        if ($this->item->metakey) {
            $this->document->setMetaData('keywords', $this->item->metakey);
        } elseif ($this->params->get('menu-meta_keywords')) {
            $this->document->setMetaData('keywords', $this->params->get('menu-meta_keywords'));
        }

        if ($this->params->get('robots')) {
            $this->document->setMetaData('robots', $this->params->get('robots'));
        }
    }
}