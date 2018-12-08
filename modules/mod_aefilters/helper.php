<?php

defined('_JEXEC') or die;

/**
 * modAEFiltersHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class modAEFiltersHelper
{
    /**
     * modAEFiltersHelper::getAgendas()
     *
     * @return mixed
     */
    public static function getAgendas()
    {
        // Obtain a database connection
        $db = JFactory::getDbo();
        $user = JFactory::getUser();
        $sql = '';
        $sql .= ' select concat("A",a.id) as id, a.titre, a.image_bullet, a.couleur_texte, a.couleur, a.defaultstate ';
        $sql .= ' from `#__allevents_agenda` AS a';
        $sql .= ' where a.published = 1';
        if (!$user->authorise('core.admin')) {
            $sql .= ' and ((a.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ')) or (a.access=0))';
        }
        $sql .= ' union all ';
        $sql .= ' select concat("G",g.id) as id, g.titre, "" as image_bullet, g.couleur_texte, g.couleur, 1 defaultstate';
        $sql .= ' from `#__allevents_gcalendar` AS g';
        $sql .= ' where g.published = 1';
        if (!$user->authorise('core.admin')) {
            $sql .= ' and ((g.access IN (' . implode(',', $user->getAuthorisedViewLevels()) . ')) or (g.access=0))';
        }
        $db->setQuery($sql);
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }
}

