<?php

defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('ExtensionsAllEventsInstaller'))
    require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/installer.php');

jimport('joomla.application.component.controller');

/**
 * AllEventsController
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsController extends JControllerLegacy
{
    /**
     * AllEventsController::__construct()
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * AllEventsController::MakeMD()
     *
     */
    function MakeMD()
    {
        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeMD.php');
        $g_se_MD = new AllEventsClassMD();
        $msg = $g_se_MD::MakeMDExtension();
        $msg .= '<br/>, ' . $g_se_MD::MakeMDConfig();
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'activity');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'agenda');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'category');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'enrolment');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'event');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'events');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'gcalendar');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'mail');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'place');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'public');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'ressource');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'ribbon');
        $msg .= '<br/>, ' . $g_se_MD::MakeMDObject('com_allevents', 'section');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('aerating', 'plugins', 'allevents');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('aesocial', 'plugins', 'allevents');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('aevote', 'plugins', 'ajax');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('aevote', 'plugins', 'allevents');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('allevents', 'plugins', 'acymailing');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('allevents', 'plugins', 'content');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('allevents', 'plugins', 'editors-xtd');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('allevents', 'plugins', 'finder');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('allevents', 'plugins', 'quickicon');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('allevents', 'plugins', 'search');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('alleventsupdate', 'plugins', 'quickicon');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('bycheck', 'plugins', 'payment');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('byorder', 'plugins', 'payment');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('cbusers', 'plugins', 'allevents');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'activities');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'activity');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'agenda');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'agendas');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'bootstrapcalendar');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'categories');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'category');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'event');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'eventform');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'events');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'fullcalendar');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'place');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'places');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'public');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'ressource');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'section');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('default', 'views', 'sections');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('jcomments', 'plugins', 'allevents');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aebanner', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aecalendar', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aecustom', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aedeck', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aedrag', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aefilters', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aefullcalendar', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aelist', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aeslide', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aeslider', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('mod_aeuikit', 'modules');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('opengraph', 'plugins', 'allevents');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('paypal', 'plugins', 'payment');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('richsnippets', 'plugins', 'allevents');
        $msg .= '<br/>, ' . $g_se_MD::MakeMD('twittercard', 'plugins', 'allevents');
        // $msg .= '<br/>, ' . $g_se_MD->MakeMD('default', 'views', 'buy');
        // $msg .= '<br/>, ' . $g_se_MD->MakeMD('aegoogle', 'plugins', 'allevents');
        // $msg .= '<br/>, ' . $g_se_MD->MakeMD('alphauserpoints', 'plugins', 'allevents');
        // $msg .= '<br/>, ' . $g_se_MD->MakeMD('cb.allevents', 'plugins', 'cb/plug_cballevents');
        // $msg .= '<br/>, '. $g_se_MD->MakeMD('default','views','orders');
        // $msg .= '<br/>, '. $g_se_MD->MakeMD('default','views','payment');

        $this->setRedirect('index.php?option=com_allevents', $msg);
    }

    /**
     * AllEventsController::MakeCSS()
     *
     */
    function MakeCSS()
    {
        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeCSS.php');
        $g_se_CSS = new AllEventsClassCSS();
        $g_se_CSS::MakeCSSEntity('activity', 'activities');
        $g_se_CSS::MakeCSSEntity('agenda', 'agenda');
        $g_se_CSS::MakeCSSEntity('category', 'categories');
        $g_se_CSS::MakeCSSEntity('place', 'places');
        $g_se_CSS::MakeCSSEntity('public', 'public');
        $g_se_CSS::MakeCSSEntity('ressource', 'ressources');
        $g_se_CSS::MakeCSSEntity('section', 'sections');

        $msg = JText::_('COM_ALLEVENTS_MAKECSS');
        $this->setRedirect('index.php?option=com_allevents', $msg);
    }

    /**
     * AllEventsController::RemoveParamNewbie()
     *
     */
    function RemoveParamNewbie()
    {
        $db = JFactory::getDbo();

        try {
            $db->transactionStart();
            $db->setQuery('SELECT params FROM #__extensions WHERE element = ' . $db->quote('com_allevents'));
            $params = json_decode($db->loadResult(), true);

            $params['gnewbie'] = 0;

            // Store the combined new and existing values back as a JSON string
            $paramsString = json_encode($params);
            $db->setQuery('UPDATE #__extensions SET params = ' . $db->quote($paramsString) . ' WHERE element = ' . $db->quote('com_allevents'));
            $db->execute();

            $db->transactionCommit();
            $msg = JText::_('COM_ALLEVENTS_PARAMNEWBIE_REMOVED');
            $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=main', false), $msg);
        } catch (Exception $e) {
            // catch any database errors.
            $db->transactionRollback();
            JErrorPage::render($e);
        }
    }

    /**
     * AllEventsController::uploadics()
     *
     * @throws Exception
     */
    function uploadics()
    {
        JFactory::getDocument()->setMimeEncoding('application/json');
        $app = JFactory::getApplication();
        $app->setHeader('Content-Disposition', 'attachment;filename="progress-report-results.json"');
        $app->input->set('tmpl', 'component');

        // Allowed extentions.
        $allowedExts = ["ics", "ICS"];
        // Get filename.
        $temp = explode(".", $_FILES["file"]["name"]);
        // Get extension.
        $extension = end($temp);
        // check that again on the server side.
        if (in_array($extension, $allowedExts)) {
            move_uploaded_file($_FILES["file"]["tmp_name"], JPATH_ROOT . "/media/com_allevents/ics/" . $_FILES["file"]["name"]);
            echo json_encode(["file" => $_FILES["file"]["name"]]);
        } else {
            echo stripslashes(json_encode('BAD EXTENSION'));
        }
        $app->close();
    }

    /**
     * AllEventsController::MakeBullets()
     *
     */
    function MakeBullets()
    {
        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeBullets.php');
        $g_se_bullets = new AllEventsClassBullets();
        $info = $g_se_bullets::MakeBullets();
        $this->setRedirect(JRoute::_('index.php?option=com_allevents', false), $info);
    }

    /**
     * AllEventsController::display()
     * Method to display a view.
     *
     * @param boolean $cachable If true, the view output will be cached
     * @param array|bool $urlparams An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}
     *                              .
     *
     * @return AllEventsController
     * @throws Exception
     * @since 1.5
     */
    public function display($cachable = false, $urlparams = false)
    {
        require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';
        $app = JFactory::getApplication();
        $view = $app->input->getCmd('view', 'main');
        $app->input->set('view', $view);

        parent::display($cachable, $urlparams);

        return $this;
    }

    /**
     * AllEventsController::ajaxGetFile()
     * Load the file from the url
     *
     * @return void
     * @throws Exception
     */
    public function ajaxGetFile()
    {
        $app = JFactory::getApplication();

        $url = $this->input->get('url', '', 'string');
        $reload = $this->input->get('reload', 0, 'string');

        $key = 'com_extensionsmanagerck_' . $url;
        if (!($data = $app->getUserState($key)) || ($reload !== 0 && ($reload == 1 || $reload == $url))) {
            $data = $this->loadFileFromUrl($url);
            $app->setUserState($key, $data);
        }

        echo $data;
        exit();
    }

    /**
     * AllEventsController::loadFileFromUrl()
     * Check how to get the file content from the url
     *
     * @param mixed $url
     *
     * @return mixed|string
     */
    private function loadFileFromUrl($url)
    {
        $result = '';
        if (function_exists('file_get_contents')) {
            $result = @file_get_contents($url);
        }
        // look for curl
        if (($result == '') && extension_loaded('curl')) {
            $ch = curl_init();
            $timeout = 30;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $result = curl_exec($ch);
            curl_close($ch);
        }

        return $result;
    }

    /**
     * AllEventsController::ajaxInstallExt()
     * Install the extension
     *
     * @return void
     */
    public function ajaxInstallExt()
    {
        $installer = new ExtensionsAllEventsInstaller;
        $installer->install();
    }
}
