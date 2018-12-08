<?php
/**
 * JFormFieldExtcalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die();

JLoader::import('components.com_allevents.helpers.allevents', JPATH_ADMINISTRATOR);

/**
 * Class JFormFieldExtcalendar
 */
class JFormFieldExtcalendar extends JFormField
{
    protected $type = 'Extcalendar';

    /**
     * @return string
     */
    public function getInput()
    {
        JFactory::getSession()->set('extcalendarOrigin', JUri::getInstance()->toString(), 'AllEvents');

        JFactory::getDocument()->addStyleDeclaration('#general .controls {margin-left: 0}');
        JFactory::getDocument()->addScript(JUri::base() . 'components/com_allevents/libraries/iframe-resizer/jquery.iframeResizer.min.js');
        JFactory::getDocument()->addScriptDeclaration("jQuery(document).ready(function() {jQuery('iframe').iFrameResize({log: true});});");
        $url = 'index.php?option=com_allevents&view=extcalendars';
        $url .= '&aeplugin=' . $this->element['plugin'];
        $url .= '&import=' . $this->element['import'];
        $url .= '&tmpl=component';
        $buffer = '<iframe src="' . JRoute::_($url) . '" style="width:100%; border:0"></iframe>';

        return $buffer;
    }
}
