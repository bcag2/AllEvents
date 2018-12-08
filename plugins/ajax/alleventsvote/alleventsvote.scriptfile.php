<?php

// No direct access
defined('_JEXEC') or die;

/**
 * plgAjaxAllEventsVoteInstallerScript
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAjaxAllEventsVoteInstallerScript
{
    /**
     * plgAjaxAllEventsVoteInstallerScript::install()
     *
     * @param mixed $parent
     *
     * @return void
     */
    function install($parent)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->update($db->quoteName('#__extensions'))
            ->set($db->quoteName('enabled') . ' = ' . $db->quote(1))
            ->where($db->quoteName('element') . ' = ' . $db->quote('alleventsvote'));
        $db->setQuery($query);

        try {
            $db->execute();
        } catch (RuntimeException $e) {
            echo JText::_('PLG_AJAX_ALLEVENTSVOTE_ENABLED_0');
        }

        echo JText::_('PLG_AJAX_ALLEVENTSVOTE_ENABLED_1');
    }

    /**
     * plgAjaxAllEventsVoteInstallerScript::update()
     *
     * @param mixed $parent
     *
     * @return void
     */
    function update($parent)
    {
        echo JText::_('PLG_AJAX_ALLEVENTSVOTE_ENABLED_' . plgAjaxAllEventsVoteInstallerScript::isEnabled());
    }

    /**
     * plgAjaxAllEventsVoteInstallerScript::isEnabled()
     *
     * @return array
     */
    function isEnabled()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select($db->quoteName('enabled'))
            ->from($db->quoteName('#__extensions'))
            ->where($db->quoteName('element') . ' = ' . $db->quote('alleventsvote'))
            ->where($db->quoteName('folder') . ' = ' . $db->quote('ajax'));
        $db->setQuery($query);

        return $db->loadResult();
    }
}