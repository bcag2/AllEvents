<?php

defined('_JEXEC') or die;

/**
 * modAEDragHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class modAEDragHelper
{
    /**
     * modAEDragHelper::getDBevents()
     *
     * @param mixed $sIDs
     *
     * @return mixed
     */
    public static function getDBevents($sIDs)
    {
        // Preparing connection to db
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $query = $db->getQuery(true);
        $query->select('e.id, e.titre, e.date, e.enddate, ag.couleur, ag.couleur_texte, e.agenda_id, e.activity_id, e.place_id, e.hot');
        $query->from('`#__allevents_events` AS e');
        $query->where('(e.published = 1)');
        $query->where('(e.cancelled = 0)');
        // $query->where('(e.deleted = 0)');
        $query->where('(e.proposal = 0)');
        if ($sIDs == "") {
            $query->where('(e.id = -1)');
        } else {
            $query->where('(e.id in (' . $sIDs . '))');
        }

        $query->leftJoin('`#__allevents_agenda` AS ag ON ag.id = e.agenda_id and ag.published = 1');
        $query->leftJoin('`#__allevents_activities` AS ac ON ac.id = e.activity_id and ac.published = 1');
        $query->leftJoin('`#__allevents_places` AS pl ON pl.id = e.place_id and pl.published = 1');
        if (!$user->authorise('core.admin')) {
            $query->where('(e.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (e.access=0))');
            $query->where('(ifnull(ag.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ag.access=0))');
            $query->where('(ifnull(ac.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (ac.access=0))');
            $query->where('(ifnull(pl.access,1) IN (' . implode(',', $user->getAuthorisedViewLevels()) . ') or (pl.access=0))');
        }

        $db->setQuery($query);
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }
}

