<?php

defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsHelperOverride
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelperOverride
{
    /**
     * AllEventsHelperOverride::GetStyleSheet()
     *
     * @param mixed $filename
     *
     * @return string
     * @throws Exception
     */
    public static function GetStyleSheet($filename)
    {
        $app = JFactory::getApplication();
        if (is_file(JPATH_SITE . '/templates/' . $app->getTemplate() . '/css/com_allevents/' . $filename)) {
            return (JUri::root(true) . '/templates/' . $app->getTemplate() . '/css/com_allevents/' . $filename);
        } else {
            // €#€
            return (JUri::root(true) . '/media/com_allevents/css/' . $filename);
        }
    }

    /**
     * AllEventsHelperOverride::GetScript()
     *
     * @param mixed $filename
     *
     * @return string
     * @throws Exception
     */
    public static function GetScript($filename)
    {
        $app = JFactory::getApplication();
        if (is_file(JPATH_SITE . '/templates/' . $app->getTemplate() . '/js/com_allevents/' . $filename)) {
            return (JUri::root(true) . '/templates/' . $app->getTemplate() . '/js/com_allevents/' . $filename);
        } else {
            return (JUri::root(true) . '/media/com_allevents/js/' . $filename);
        }
    }

    /**
     * AllEventsHelperOverride::GetImage()
     *
     * @param mixed $filename
     *
     * @return string
     * @throws Exception
     */
    public static function GetImage($filename)
    {
        $app = JFactory::getApplication();
        if (is_file(JPATH_SITE . '/templates/' . $app->getTemplate() . '/img/com_allevents/' . $filename)) {
            return (JUri::root(true) . '/templates/' . $app->getTemplate() . '/img/com_allevents/' . $filename);
        } else {
            return (JUri::root(true) . '/media/com_allevents/css/images/' . $filename);
        }
    }

    /**
     * Load jQuery core
     *
     * @param bool $noConflict
     * @param bool $debug
     *
     * @throws Exception
     */
    public static function jquery($noConflict = true, $debug = null)
    {
        $app = JFactory::getApplication();
        $params = AllEventsHelperParam::getGlobalParam();

        $load = $params['gjquery'];
        $client = $app->getName();
        if ($load == $client || $load == 1) {
            $jqueryLoaded = $app->get('jquery', false);
            // Only load once
            if (!$jqueryLoaded) {
                JHtml::_('jquery.framework', $noConflict, $debug);
            }
            $app->set('jquery', true);
        }
    }

    /**
     * Load bootstrap core
     *
     * @throws Exception
     * @internal param bool $noConflict
     * @internal param bool $debug
     */
    public static function bootstrap()
    {
        $app = JFactory::getApplication();
        $params = AllEventsHelperParam::getGlobalParam();

        $load = $params['gbootstrap'];
        $client = $app->getName();
        if ($load == $client || $load == 1) {
            $bootstrapLoaded = $app->get('bootstrap', false);
            // Only load once
            if (!$bootstrapLoaded) {
                JHtml::_('bootstrap.framework');
                $document = JFactory::getDocument();
                $document->addStyleSheet(JUri::root(true) . '/media/jui/css/bootstrap.css');
                $document->addStyleSheet(JUri::root(true) . '/media/jui/css/bootstrap-responsive.min.css');
            }
            $app->set('bootstrap', true);
        }
        // todo : force to unload BS2
        // $head = $this->getHeadData();
        // unset($head['scripts'][$this->baseurl.'/media/jui/js/bootstrap.min.js']);
        // $this->setHeadData($head);
        // $doc->addScript($template.'/js/bootstrap.min.js');
    }

    /**
     * Load uikit core
     *
     * @throws Exception
     */
    public static function uikit()
    {
        $app = JFactory::getApplication();
        $params = AllEventsHelperParam::getGlobalParam();

        $load = $params['guikit'];
        $client = $app->getName();
        if ($load == $client || $load == 1) {
            $bootstrapLoaded = $app->get('uikit', false);
            // Only load once
            if (!$bootstrapLoaded) {
                $document = JFactory::getDocument();
                $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/uikit.min.css');
                $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/components/datepicker.min.css');
                $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/uikit.min.js');
                $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/core/dropdown.min.js');
                $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/components/grid.min.js');
                $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/components/lightbox.min.js');
                $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/components/datepicker.min.js');
            }
            $app->set('uikit', true);
        }
    }

    /**
     * AllEventsHelperOverride::custom_css()
     * Load custom CSS
     *
     * @return void
     * @since 3.3.4.7
     */
    public static function custom_css()
    {
        $params = AllEventsHelperParam::getGlobalParam();
        $custom_css = $params['gcustom_css'];
        $document = JFactory::getDocument();
        $document->addStyleDeclaration($custom_css);
    }
}

