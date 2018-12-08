<?php

/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 *
 * Plugin based on the Joomla! update notification plugin
 */

defined('_JEXEC') or die;

/**
 * AllEvents Quickicon Plugin
 *
 */
class plgQuickiconAllEvents extends JPlugin
{
    /**
     * Constructor
     *
     * @param   object &$subject The object to observe
     * @param   array $config An optional associative array of configuration settings.
     *                             Recognized key values include 'name', 'group', 'params', 'language'
     *                             (this list is not meant to be comprehensive).
     *
     * @since   1.5
     */
    /**
     * plgQuickiconAllEvents constructor.
     *
     * @param object $subject
     * @param array $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
    }

    /**
     * @param $context
     *
     * @return array|bool
     */
    public function onGetIcons($context)
    {
        if ($context != $this->params->get('context', 'mod_quickicon') || !JFactory::getUser()->authorise('core.manage', 'com_allevents') || !file_exists(JPATH_COMPONENT_ADMINISTRATOR . '/helpers/allevents.php')) {
            return false;
        }

        $text = $this->params->get('displayedtext');
        if (empty($text))
            $text = JText::_('AllEvents');

        return [[
            'link' => 'index.php?option=com_allevents',
            'image' => 'calendar',
            'icon' => '',
            'text' => $text,
            'id' => 'plg_quickicon_allevents']];
    }
}
