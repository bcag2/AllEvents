<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
if (!class_exists('AllEventsHelperParam')) require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsViewEventform
 *
 * @version   3.4.5 premium
 * @package   com_allevents
 * @copyright Copyright (C) 2009-2016. All rights reserved.
 * @license   GNU General Public License version 2 ou version superior; see LICENSE.txt
 * @author    elecoest (elecoest@gmail.com) - https://www.allevents3.com
 * @access    public
 */
class AllEventsViewEventform extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;
    protected $params;

    /**
     * AllEventsViewEventform::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $app = JFactory::getApplication();
        $user = JFactory::getUser();
        $this->state = $this->get('State');
        $this->item = $this->get('Data');
        $this->form = $this->get('Form');

        $this->params = AllEventsHelperParam::getGlobalParam();

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        if ($user->authorise('core.create', 'com_allevents') !== true) {
            throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
        }

        if ($user->authorise('core.approve', 'com_allevents') !== true) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_EVENT_TO_APPROVAL'));
        }

        $this->_prepareDocument();
        $layout = $app->input->getString('layout');

        if (empty($layout)) {
            if ($this->params['force_template']) {
                $layout = $this->params['templateeventform'];
            } else {
                $layout = $this->params['gtemplateeventform'];
            }
        }
        if (strpos($layout, ':') === false) {
            $this->setLayout($layout);
            parent::display($tpl);
        } else {
            $temp = explode(':', $layout);
            $layoutPath = JPATH_ROOT . '/plugins/allevents/' . $temp[0] . '/layouts/' . $temp[1] . '.php';
            if (file_exists($layoutPath)) {
                require $layoutPath;
            }
        }
        // parent::display($tpl);
    }

    /**
     * AllEventsViewEventform::_prepareDocument()
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

    /**
     * AllEventsViewEventform::getToolbar()
     *
     * @return string
     */
    function getToolbar()
    {
        // load the JToolBar library and create a toolbar
        jimport('cms.html.toolbar');
        $bar = new JToolBar('toolbar');
        // and make whatever calls you require
        $bar->appendButton('Standard', 'save', JText::_('JTOOLBAR_SAVE'), 'eventform.save', false);
        $bar->appendButton('Separator');

        if (empty($this->item->id)) {
            $bar->appendButton('Standard', 'cancel', JText::_('JTOOLBAR_CANCEL'), 'eventform.cancel', false);
        } else {
            $bar->appendButton('Standard', 'cancel', JText::_('JTOOLBAR_CLOSE'), 'eventform.cancel', false);
        }

        // generate the html and return
        return $bar->render();
    }

    /**
     * AllEventsViewEventform::getToolbarSDN()
     *
     * @return string html
     */
    function getToolbarSDN()
    {
        // load the JToolBar library and create a toolbar
        jimport('cms.html.toolbar');
        $bar = new JToolBar('toolbar');
        if (empty($this->item->id)) {
            $bar->appendButton('Standard', 'cancel', JText::_('JTOOLBAR_CANCEL'), 'eventform.cancel', false);
        } else {
            $bar->appendButton('Standard', 'cancel', JText::_('JTOOLBAR_CLOSE'), 'eventform.cancel', false);
        }
        $bar->appendButton('Separator');
        $bar->appendButton('Standard', 'save', JText::_('JTOOLBAR_SAVE'), 'eventform.save', false);

        return $bar->render();
    }
}