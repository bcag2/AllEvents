<?php
// No direct access
defined('_JEXEC') or die;

/**
 * Class plgAllEventsAllEventsVoteInstallerScript
 */
class plgAllEventsAllEventsVoteInstallerScript
{
    /**
     * @param $parent
     */
    function install($parent)
    {
        echo JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_ENABLED_0');
    }

    /**
     * @param $parent
     */
    function update($parent)
    {
        echo JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_ENABLED_' . plgAllEventsAllEventsVoteInstallerScript::isEnabled());
    }

    /**
     * @return mixed
     */
    function isEnabled()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select($db->quoteName('enabled'))
            ->from($db->quoteName('#__extensions'))
            ->where($db->quoteName('element') . ' = ' . $db->quote('alleventsvote'))
            ->where($db->quoteName('folder') . ' = ' . $db->quote('allevents'));
        $db->setQuery($query);

        return $db->loadResult();
    }
}