<?php
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

/**
 * AllEventsViewImagehandler
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */
class AllEventsViewImagehandler extends JViewLegacy
{
    /**
     * Image selection List
     *
     * @param null $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    function display($tpl = null)
    {
        $app = JFactory::getApplication();
        $option = $app->input->getString('option', 'com_allevents');

        JHtml::_('behavior.framework');

        if ($this->getLayout() == 'uploadimage') {
            $this->_displayuploadimage($tpl);

            return;
        }

        //get vars
        $task = $app->input->get('task', '');
        $pid = $app->input->get('pid', '');
        $search = $app->getUserStateFromRequest($option . '.filter_search', 'filter_search', '', 'string');
        $search = trim(strtolower($search));

        $folder = $app->input->get('folder', '');;
        $redi = "";
        //set variables
        if ($task == 'selectafficheimg') {
            $folder = 'affiches';
            $task = 'afficheimg';
            $redi = 'selectafficheimg';
        } else if ($task == 'selectbanniereimg') {
            $folder = 'bannieres';
            $task = 'banniereimg';
            $redi = 'selectbanniereimg';
        } else if ($task == 'selectvignetteimg') {
            $folder = 'vignettes';
            $task = 'vignetteimg';
            $redi = 'selectvignetteimg';
        }
        $app->input->set('folder', $folder);

        // Do not allow cache
        $app->allowCache(false);

        // Load css
        $document = JFactory::getDocument();
        // $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
        $document->addStyleDeclaration('
            div.item{float:left;border:1px solid #CCC;margin:3px;position:relative}
            div.imgBorder{height:72px;vertical-align:middle;width:88px;overflow:hidden}
            div.imgBorder a{height:72px;width:88px;display:block;cursor:pointer}
            div.imgBorder a:hover{height:72px;width:88px;background-color:#F0F0F0;color:#F60}
            div.controls{text-align:center;height:20px;line-height:20px;background-color:#F9FCF9;border-top:1px solid #DDD}
            div.controls img{vertical-align:middle}
            div.imageinfo{background:#F9F9F9;font-family:Arial,Helvetica,sans-serif;font-size:10px;width:88px;height:15px;vertical-align:middle;text-align:center;overflow:hidden}
            div.pnav{padding:5px;text-align:center;background:#F3F3F3;border:1px solid #CCC}
            div.imghead{padding:3px;border:1px solid #CCC}
            div.pagination{clear:inherit;float:both;text-align:center!important;margin:15px 0 0!important}
            div.pagination p.counter{font-style:italic}
            div.pagination ul{list-style:none;text-align:center!important;padding:0}
            div.pagination ul li{list-style:none;display:inline;padding:0 5px}
        }');

        //get images
        $images = $this->get('images');
        $pagination = $this->get('Pagination');

        if (count($images) > 0 || $search) {
            $this->images = $images;
            $this->folder = $folder;
            $this->task = $redi;
            $this->pid = $pid;
            $app->input->set('task', $this->task);
            $this->search = $search;
            $this->state = $this->get('state');
            $this->pagination = $pagination;
            parent::display($tpl);
        } else {
            //no images in the folder, redirect to uploadscreen and raise notice
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_NO_IMAGES_AVAILABLE'), 'warning');
            $this->setLayout('uploadimage');
            $this->_displayuploadimage($tpl);

            return;
        }
    }

    /**
     * Prepares the upload image screen
     *
     * @param $tpl
     * @throws Exception
     */
    protected function _displayuploadimage($tpl = null)
    {
        //initialise variables
        $uri = JUri::getInstance();
        $aesettings = [];
        $aesettings['sizelimit'] = 8000;
        $aesettings['gddisabled'] = false;
        $aesettings = (object)$aesettings;

        //get vars
        $app = JFactory::getApplication();
        $task = $app->input->get('task', '');
        $pid = $app->input->get('pid', '');

        // Load css
        $document = JFactory::getDocument();
        $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));

        jimport('joomla.client.helper');
        $ftp = JClientHelper::setCredentialsFromRequest('ftp');

        //assign data to template
        $this->task = $task;
        $this->pid = $pid;
        $this->aesettings = $aesettings;
        $this->request_url = $uri;
        $this->ftp = $ftp;

        parent::display($tpl);
    }

    /**
     * @param int $index
     */
    function setImage($index = 0)
    {
        if (isset($this->images[$index])) {
            $this->_tmp_img = $this->images[$index];
        } else {
            $this->_tmp_img = new JObject;
        }
    }
}

