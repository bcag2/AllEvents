<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

/**
 * AllEventsViewPlaces
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewPlaces extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;
    protected $params;

    /**
     * AllEventsViewPlaces::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->params = AllEventsHelperParam::getGlobalParam();
        $model = $this->getModel();
        $model->addParam('geolocated', $this->params['geolocated']);
        $model->addParam('sort_by', $this->params['sort_by']);
        $model->addParam('e', $this->params['e']);
        $model->addParam('period', $this->params['period']);

        $this->state = $this->get('State');
        // Set the filters based on the layout params : default == map
        if ($this->params['layout'] != 'table') {
            $model->setState('list.start', 0);
            $model->setState('list.limit', 0);
        }

        $this->pagination = $this->get('Pagination');

        $this->items = $model->getItems();
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        $this->setLayout($this->params['layout']);
        $this->_prepareDocument();
        parent::display($tpl);
    }

    /**
     * AllEventsViewPlaces::_prepareDocument()
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
}
