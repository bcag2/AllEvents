<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * AllEventsModelPublics
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelPublics extends JModelList
{

    /**
     * AllEventsModelPublics::GetPublicsFromAgenda()
     *
     * @param mixed $agenda_id
     *
     * @return array
     */
    public function GetPublicsFromAgenda($agenda_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `id`, `titre` AS `display`, `default` FROM `#__allevents_public` WHERE `published`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ") ORDER BY 2");
        $loaddb = $db->loadObjectList();

        return ((array)$loaddb);
    }

    /**
     * AllEventsModelPublics::GetDefaultPublicIdForAgenda()
     *
     * @param mixed $agenda_id
     *
     * @return mixed
     */
    public function GetDefaultPublicIdForAgenda($agenda_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_public` WHERE published=1 AND `default`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ")");
        $loaddb = $db->loadResult();
        if (empty($loaddb)) {
            $db->setQuery("SELECT MAX(`id`) FROM `#__allevents_public` WHERE `published`=1 AND (`agenda_id`=0 OR `agenda_id`=" . $agenda_id . ")");
            $loaddb = $db->loadResult();
        }

        return $loaddb;
    }
}
