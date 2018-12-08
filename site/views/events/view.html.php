<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

if (!class_exists('AllEventsHelperString'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/string.php';

if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

if (!class_exists('AllEventsHelperInfiniteScroll'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeinfinitescroll.php';

if (!class_exists('AllEventsHelperDataTable'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aedatatable.php';
use Joomla\Utilities\ArrayHelper;

// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

/**
 * AllEventsViewEvents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewEvents extends JViewLegacy
{
    protected $items;
    protected $params;
    protected $print;
    protected $currentitems;
    protected $pasteditems;
    protected $nextitems;
    protected $arrMonthNames;
    protected $arrMonthLongNames;
    protected $richsnippetsblock;

    /**
     * AllEventsViewEvents::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->params = AllEventsHelperParam::getGlobalParam();
        $app = JFactory::getApplication();
        $jinput = $app->input;
        // $model = $this->getModel();
		$model = JModelList::getInstance('Events', 'AllEventsModel');
        $layout = $this->params['layout'];

        $this->state = $this->get('State');
        if (($layout !== 'search') && ($layout !== 'simple')) {
            $this->state->set('filter.agenda', '');
            $this->state->set('filter.date', '');
            $this->state->set('filter.enddate', '');
            $this->state->set('filter.search', '');
        }

        $model->addParam('a', $jinput->getInt('a', $this->params['a']));
        $model->addParam('p', $jinput->getInt('p', $this->params['p']));
        $model->addParam('d', $jinput->getInt('d', $this->params['d']));
        $model->addParam('s', $jinput->getInt('s', $this->params['s']));
        $model->addParam('c', $jinput->getInt('c', $this->params['c']));
        $model->addParam('l', $jinput->getInt('l', $this->params['l']));
        $model->addParam('layout', $layout);
        $model->addParam('gforcenomenuitem', $this->params['gforcenomenuitem']);
        $var = $jinput->getString('at');
        if (!empty ($var)) {
            $model->addParam('at', json_decode($var));
            $var = json_decode($var);
            ArrayHelper::toInteger($var);
            $this->params['at'] = $var;
        } else {
            $model->addParam('at', $this->params['at']);
        }
        $var = $jinput->getString('pt');
        if (!empty ($var)) {
            $model->addParam('pt', json_decode($var));
            $var = json_decode($var);
            ArrayHelper::toInteger($var);
            $this->params['pt'] = $var;
        } else {
            $model->addParam('pt', $this->params['pt']);
        }
        $var = $jinput->getString('dt');
        if (!empty ($var)) {
            $model->addParam('dt', json_decode($var));
            $var = json_decode($var);
            ArrayHelper::toInteger($var);
            $this->params['dt'] = $var;
        } else {
            $model->addParam('dt', $this->params['dt']);
        }
        $var = $jinput->getString('st');
        if (!empty ($var)) {
            $model->addParam('st', json_decode($var));
            $var = json_decode($var);
            ArrayHelper::toInteger($var);
            $this->params['st'] = $var;
        } else {
            $model->addParam('st', $this->params['st']);
        }
        $var = $jinput->getString('ct');
        if (!empty ($var)) {
            $model->addParam('ct', json_decode($var));
            $var = json_decode($var);
            ArrayHelper::toInteger($var);
            $this->params['ct'] = $var;
        } else {
            $model->addParam('ct', $this->params['ct']);
        }
        $var = $jinput->getString('lt');
        if (!empty ($var)) {
            $model->addParam('lt', json_decode($var));
            $var = json_decode($var);
            ArrayHelper::toInteger($var);
            $this->params['lt'] = $var;
        } else {
            $model->addParam('lt', $this->params['lt']);
        }
        $var = $jinput->getString('et');
        if (!empty ($var)) {
            $model->addParam('et', json_decode($var));
            $var = json_decode($var);
            ArrayHelper::toInteger($var);
            $this->params['et'] = $var;
        } else {
            $model->addParam('et', $this->params['et']);
        }

        $model->addParam('h', $this->params['h']);
        $model->addParam('pivot', $jinput->get('pivot', $this->params['pivot']));
        $model->addParam('period', $jinput->get('period', $this->params['period']));
        $model->addParam('sort_by', $jinput->get('sort_by', $this->params['sort_by']));
        $model->addParam('fromdate', $this->params['fromdate']);
        $model->addParam('todate', $this->params['todate']);
        $model->addParam('nb_top', $this->params['nb_top']);
        $model->addParam('gevent_companions', $this->params['gevent_companions']);

        $this->pagination = $this->get('Pagination');
        $this->sortDirection = $this->state->get('list.direction');
        $this->sortColumn = $this->state->get('list.ordering');
        $this->searchterms = $this->state->get('filter.search');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
        $this->print = $app->input->getBool('print');

        $this->items = $model->getItems();
        $this->currentitems = $model->getCurrentItems();
        $this->pasteditems = $model->getPastedItems();
        $this->nextitems = $model->getNextItems();

        $this->arrMonthNames = [
            JText::_('JANUARY_SHORT', true),
            JText::_('FEBRUARY_SHORT', true),
            JText::_('MARCH_SHORT', true),
            JText::_('APRIL_SHORT', true),
            JText::_('MAY_SHORT', true),
            JText::_('JUNE_SHORT', true),
            JText::_('JULY_SHORT', true),
            JText::_('AUGUST_SHORT', true),
            JText::_('SEPTEMBER_SHORT', true),
            JText::_('OCTOBER_SHORT', true),
            JText::_('NOVEMBER_SHORT', true),
            JText::_('DECEMBER_SHORT', true)];

        $this->arrMonthLongNames = [
            JText::_('JANUARY', true),
            JText::_('FEBRUARY', true),
            JText::_('MARCH', true),
            JText::_('APRIL', true),
            JText::_('MAY', true),
            JText::_('JUNE', true),
            JText::_('JULY', true),
            JText::_('AUGUST', true),
            JText::_('SEPTEMBER', true),
            JText::_('OCTOBER', true),
            JText::_('NOVEMBER', true),
            JText::_('DECEMBER', true)];

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        $vcal = $app->input->getString('vcal');
        if ($vcal) {
            $tpl = 'vcal';
        }

        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('allevents');
        $this->richsnippetsblock = $dispatcher->trigger('onAlleventsRichSnippetsEvents', [&$this->items, &$this->params]);

        $this->_prepareDocument();

        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);

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
    }

    /**
     * AllEventsViewEvents::_prepareDocument()
     *
     * @throws Exception
     */
    protected function _prepareDocument()
    {
        $app = JFactory::getApplication();
        $this->document = $app->getDocument();
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

        if ($this->print) {
            $this->document->setMetaData('robots', 'noindex, nofollow');
        }

        $titre = $title;
        $banniere = $this->params->get('banniere');
        $metadesc = $this->params->get('menu-meta_description');
        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('allevents');
        $dispatcher->trigger('onAlleventsOpenGraphListEvent', [&$titre, &$banniere, &$metadesc, &$this->params]);
    }

    /**
     * AllEventsViewEvents::getToolbar()
     *
     * @return string
     * @throws Exception
     */
    function getToolbar()
    {
        $app = JFactory::getApplication();

        if ($this->print) {
            // link to print an article
            $text = '<span class="icon-print"></span>' . JText::_('JGLOBAL_PRINT');
            $bar_render = '<a href="#" onclick="window.print();return false;">' . $text . '</a>';
        } else {
            $Itemid = ($this->params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);
            $bar_render = '<div id="toolbar" class="btn-toolbar">';
            if ($this->params['geventshow_closebutton']) {
                $bar_render .= '<div id="toolbar-cancel" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= '    <a onclick="Joomla.submitbutton(\'events.close\')">';
                $bar_render .= '    <i class="fa fa-times"></i>&nbsp;' . JText::_('JTOOLBAR_CLOSE') . '</a>';
                $bar_render .= '</div>';
            }
            $canEdit = JFactory::getUser()->authorise('core.edit', 'com_allevents');
            if ($canEdit) {
                $bar_render .= '<div id="toolbar-edit" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= '    <a onclick="Joomla.submitbutton(\'events.edit\')">';
                $bar_render .= '    <i class="fa fa-plus"></i>&nbsp;' . JText::_('JTOOLBAR_NEW') . '</a>';
                $bar_render .= '</div>';
            }
            if ($this->params->get("geventshow_buttonprint")) {
                $url = 'index.php?option=com_allevents&view=events&tmpl=component&print=1';
                $url .= (!empty ($Itemid) && !($this->params->get['gforcenomenuitem'])) ? '&Itemid=' . $Itemid : '';

                $status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no';
                $text = '<i class="fa fa-print"></i>&nbsp;' . JText::_('JGLOBAL_PRINT');

                $attribs['title'] = JText::_('JGLOBAL_PRINT');
                $attribs['onclick'] = "window.open(this.href,'win2','" . $status . "'); return false;";
                $attribs['rel'] = 'nofollow';

                $bar_render .= '<div id="toolbar-print" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= JHtml::_('link', JRoute::_($url), $text, $attribs);
                $bar_render .= '</div>';
            }
            if ($this->params->get("geventshow_buttonmail")) {
                require_once JPATH_SITE . '/components/com_mailto/helpers/mailto.php';

                $uri = JUri::getInstance();
                $base = $uri->toString([
                    'scheme',
                    'host',
                    'port']);
                $template = $app->getTemplate();
                $url = 'index.php?option=com_allevents&view=events';
                $url .= (!empty ($Itemid) && !($this->params->get['gforcenomenuitem'])) ? '&Itemid=' . $Itemid : '';

                $link = $base . JRoute::_($url, false);
                /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
                $url = 'index.php?option=com_mailto&tmpl=component&template=' . $template . '&link=' . MailToHelper::addLink($link);

                $status = 'width=400,height=350,menubar=yes,resizable=yes';

                $text = '<i class="fa fa-envelope-o"></i>&nbsp;' . JText::_('JGLOBAL_EMAIL');

                $attribs['title'] = JText::_('JGLOBAL_EMAIL');
                $attribs['onclick'] = "window.open(this.href,'win2','" . $status . "'); return false;";
                $attribs['rel'] = 'nofollow';

                $bar_render .= '<div id="toolbar-mail" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= JHtml::_('link', JRoute::_($url), $text, $attribs);
                $bar_render .= '</div>';
            }
            $bar_render .= '</div>';
        }

        return $bar_render;
    }

    /**
     * Check if state is set
     *
     * @param   mixed $state State
     *
     * @return bool
     */
    public function getState($state)
    {
        return isset($this->state->{$state}) ? $this->state->{$state} : false;
    }
}