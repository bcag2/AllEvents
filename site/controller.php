<?php

defined('_JEXEC') or die;

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
     * AllEventsController::proxy()
     *
     * @throws Exception
     */
    function proxy()
    {
        $manu = new JApplicationWeb();
        $manu->setHeader('Content-type', 'text/plain');
        $app = JFactory::getApplication();
        $app->input->set('tmpl', 'component');

        //$url = $_GET['url'];
        // $notallowedurls = array(
        // 'https://www.allevents3.com',
        // 'https://www.allevents3.com');

        $content = preg_replace('~\R~u', "\r\n", file_get_contents(urldecode($_GET['url'])));

        //prevent insidious file
        $content = preg_replace('/.*<body[^>]*>/msi', '', $content);
        $content = preg_replace('/<\/body>.*/msi', '', $content);
        $content = preg_replace('/<?\/body[^>]*>/msi', '', $content);
        $content = preg_replace('/<--[\S\s]*?-->/msi', '', $content);
        $content = preg_replace('/<noscript[^>]*>[\S\s]*?' . '<\/noscript>/msi', '', $content);
        $content = preg_replace('/<script[^>]*>[\S\s]*?<\/script>/msi', '', $content);
        $content = preg_replace('/<script.*\/>/msi', '', $content);

        echo $content;

        $app->close();
    }
}