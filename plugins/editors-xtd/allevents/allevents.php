<?php
/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */
defined('_JEXEC') or die;
// Import Joomla! Plugin library file
jimport('joomla.plugin.plugin');
jimport('joomla.html.parameter');

/**
 * Class plgButtonAllEventsButton
 */
class plgButtonAllEvents extends JPlugin
{
    /**
     * Display the button
     *
     * @param   string $name The name of the button to add
     *
     * @return JObject
     */
    function onDisplay($name)
    {
        /*
         * Javascript to insert the link
         * View element calls jSelectEvent when an article is clicked
         * jSelectEvent creates the link tag, sends it to the editor,
         * and closes the select frame.
         */
        $js = "
               function jSelectEvent(id, title, catid, object, link, lang)
               {
                   var hreflang = '';
                   if (lang !== '')
                   {
                       var hreflang = ' hreflang = \"' + lang + '\"';
                   }
                   var tag = '<a' + hreflang + ' href=\"' + link + '\">' + title + '</a>';
                   jInsertEditorText(tag, '" . $name . "');
                   jModalClose();
               }";

        $doc = JFactory::getDocument();
        $doc->addScriptDeclaration($js);

        /*
         * Use the built-in element view to select the event
         * Currently uses blank class.
         */
        $link = 'index.php?option=com_allevents&amp;view=events&amp;layout=modal&amp;tmpl=component&amp;' . JSession::getFormToken() . '=1';

        $button = new JObject;
        $button->modal = true;
        $button->class = 'btn';
        $button->link = $link;
        $button->text = JText::_('AllEvents');
        $button->name = 'calendar';
        $button->options = "{handler: 'iframe', size: {x: 800, y: 500}}";

        return $button;
    }
}
