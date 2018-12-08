<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
use Joomla\Utilities\ArrayHelper;

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

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
    protected $pagination;
    protected $state;
    protected $params;
    protected $globalparams;
    protected $arrMonthNames;
    protected $arrMonthLongNames;
    protected $print;
    protected $location;

    /**
     * AllEventsViewEvents::display()
     *
     * @param mixed $tpl
     *
     * @return void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->params = AllEventsHelperParam::getGlobalParam();
        $jinput = JFactory::getApplication()->input;
        $model = $this->getModel();

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

        $model->addParam('layout', 'rss');
        $model->addParam('h', $this->params['h']);
        $model->addParam('pivot', $jinput->get('pivot', $this->params['pivot']));
        $model->addParam('period', $jinput->get('period', $this->params['period']));
        $model->addParam('sort_by', $jinput->get('sort_by', $this->params['sort_by']));
        $model->addParam('fromdate', $this->params['fromdate']);
        $model->addParam('todate', $this->params['todate']);
        $model->addParam('layout', $this->params['layout']);
        $model->addParam('nb_top', $this->params['nb_top']);

        $this->state = $this->get('State');
        $this->pagination = $this->get('Pagination');
        $this->sortDirection = $this->state->get('list.direction');
        $this->sortColumn = $this->state->get('list.ordering');
        $this->searchterms = $this->state->get('filter.search');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');

        $model->setState('list.limit', 0);
        $model->setState('list.start', 0);
        $this->items = $model->getItems();

        $doc = JFactory::getDocument();

        foreach ($this->items as $item) {
            $title = $this->escape($item->titre);
            $title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');

            $itemRSS = new JFeedItem();
            $itemRSS->title = $title;
            $itemRSS->link = AllEventsHelperRoute::getEventRoute($item->id, $item->alias);
            $itemRSS->description = $item->description;
            $itemRSS->date = $item->date;
            $itemRSS->author = $item->contact_name;
            $itemRSS->location = $item->place_titre;
            // loads item info into rss array
            $doc->addItem($itemRSS);
        }
    }
}