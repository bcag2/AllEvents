<?php
defined('_JEXEC') or die;

jimport('joomla.html.html.bootstrap');
jimport('joomla.application.component.view');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsViewMain
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewMain extends JViewLegacy
{
    protected $ActivitiesMostViewed;
    protected $AgendasMostViewed;
    protected $CategoriesMostViewed;
    protected $EnrolmentsToApprove;
    protected $Events;
    protected $EventsMostViewed;
    protected $EventsAppointments;
    protected $EventsToApprove;
    protected $NbActivities;
    protected $NbAgendas;
    protected $NbCategories;
    protected $NbCustomfields;
    protected $NbEnrolmentsToApprove;
    protected $NbEvents;
    protected $NbEventsMostViewed;
    protected $NbEventsToApprove;
    protected $NbRibbons;
    protected $NbGCalendars;
    protected $NbPlaces;
    protected $NbPublics;
    protected $NbRessources;
    protected $NbSections;
    protected $agendas;
    protected $extension_id;
    protected $hasPostInstallationMessages;
    protected $params;
    protected $slidesOptions;
    protected $state;

    /*new layout panel*/
    protected $pan_version;
    protected $pan_orders;
    protected $pan_events;
    protected $pan_setup;
    protected $pan_settings;
    protected $pan_refresh = [
        'payments' => 1,
        'orders' => 1,
        'reports' => 1,
        'version' => 60,
        'events' => 1,
    ];


    /**
     * AllEventsViewMain::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/main.php');
        $g_se_Main = new AllEventsClassMain();
        AllEventsHelper::addSubmenu('main');
        $this->params = AllEventsHelperParam::getGlobalParam();

        $dlid = $this->params['downloadid'];
        if (!empty($dlid) && (preg_match('/^([0-9]{1,}:)?[0-9a-f]{32}$/i', $dlid))) {
            $extra_query = "'key=$dlid'";
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                ->update('#__update_sites')
                ->set('extra_query = ' . $extra_query)
                ->where('name = "AllEvents - Component"');
            $db->setQuery($query);
            $db->execute();
        }

        $this->state = $this->get('State');

        $model = JModelList::getInstance('Activities', 'AllEventsModel');
        $this->NbActivities = $model->getNbActivities();
        $this->ActivitiesMostViewed = $model->getActivitiesMostViewed();

        $model = JModelList::getInstance('Agendas', 'AllEventsModel');
        $this->agendas = $model->getItems();
        $this->NbAgendas = $model->getNbAgendas();
        $this->AgendasMostViewed = $model->getAgendasMostViewed();

        $model = JModelList::getInstance('Categories', 'AllEventsModel');
        $this->NbCategories = $model->getNbCategories();
        $this->CategoriesMostViewed = $model->getCategoriesMostViewed();

        $model = JModelList::getInstance('Events', 'AllEventsModel');
        $this->Events = $model->getAllEvents();
        $this->NbEvents = count($this->Events);
        $this->EventsToApprove = $model->getEventsToApprove();
        $this->NbEventsToApprove = count($this->EventsToApprove);
        $this->EventsMostViewed = $model->getEventsMostViewed();
        $this->NbEventsMostViewed = count($this->EventsMostViewed);
        $this->EventsAppointments = $model->getEventsAppointments();

        $model = JModelList::getInstance('Enrolments', 'AllEventsModel');
        $this->EnrolmentsToApprove = $model->getEnrolmentsToApprove();
        $this->NbEnrolmentsToApprove = count($this->EnrolmentsToApprove);

        //€€€
        $model = JModelList::getInstance('GCalendars', 'AllEventsModel');
        $this->NbGCalendars = $model->getNbGCalendars();

        $model = JModelList::getInstance('Customfields', 'AllEventsModel');
        $this->NbCustomfields = $model->getNbCustomfields();

        $model = JModelList::getInstance('Ribbons', 'AllEventsModel');
        $this->NbRibbons = $model->getNbRibbons();
        //€€€

        $model = JModelList::getInstance('Places', 'AllEventsModel');
        $this->NbPlaces = $model->getNbPlaces();

        $model = JModelList::getInstance('Publics', 'AllEventsModel');
        $this->NbPublics = $model->getNbPublics();

        $model = JModelList::getInstance('Ressources', 'AllEventsModel');
        $this->NbRessources = $model->getNbRessources();

        $model = JModelList::getInstance('Sections', 'AllEventsModel');
        $this->NbSections = $model->getNbSections();

        $this->extension_id = $g_se_Main->get_extension_id();
        $this->hasPostInstallationMessages = $g_se_Main->hasPostInstallMessages();
        $this->addToolbar();
        $this->sidebar = JHtmlSidebar::render();

        // $this->pan_version = $this->get('Version');
        $this->pan_orders = $this->get('Orders');
        $this->pan_events = $this->get('Events');
        $this->pan_setup = $this->getSetup();
        $this->pan_settings = JComponentHelper::getParams('com_allevents');

        // Define slides options
        $this->slidesOptions = [ // "active" => "slide2_id" // It is the ID of the active tab.
        ];
        $this->setLayout($this->params['gtemplatemain']);

        parent::display($tpl);
    }

    /**
     * AllEventsViewMain::addToolbar()
     *
     */
    protected function addToolbar()
    {
        require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';
        JToolbarHelper::title(JText::_("COM_ALLEVENTS_TITLE_MAIN"), 'home-2');
        JToolbarHelper::help('screen.main', true);
        JToolbarHelper::preferences('com_allevents');
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=main');
    }

    /**
     * AllEventsViewMain::getSetup()
     *
     */
    private function getSetup()
    {
        /*new layout panel*/
        $default = [
            [
                'column' => 0,
                'panel' => 'events',
                'status' => 'open',
            ],
            [
                'column' => 0,
                'panel' => 'orders',
                'status' => 'open',
            ],
            // array(
            // 'column' => 0,
            // 'panel'  => 'version',
            // 'status' => 'open',
            // ),
        ];

        $default = json_encode($default);
        $input = JFactory::getApplication()->input;
        $setup = [];
        $cookie = $input->cookie->get('aemain', $default, 'raw');

        $decoded = json_decode($cookie);

        foreach ($decoded as $item) {
            $setup[$item->column][$item->panel] = $item->status;
        }

        return $setup;
    }

}
