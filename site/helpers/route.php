<?php

/**
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.5
 */

defined('_JEXEC') or die;

/**
 * Class AllEventsHelperRoute
 */
class AllEventsHelperRoute
{
    /**
     * Génère un lien vers une page évènementielle.
     *
     * @param int|Numéro $id Numéro de l'évènement
     * @param alias|string $alias |Alias $alias Alias de l'évènement
     *
     * @return string URL SEF
     */
    public static function getEventRoute($id = 0, $alias = "")
    {
        $menuItems = JApplicationCms::getInstance('site')->getMenu()->getItems('link', 'index.php?option=com_allevents&view=event', false);
        $MenuItemid = "";
        foreach ($menuItems as $menuItem) {
            $params = $menuItem->params;
            if ($params['item_id'] == $id) {
                // $MenuItemid = $menuItem->id;
                $MenuItemid = $menuItem->alias;
            }
        }
        if (!empty($MenuItemid)) {
            // $link = JRoute::_('index.php?Itemid=' . $MenuItemid, false);
            $link = JRoute::_($MenuItemid . '.html', false);
        } else {
            $slug = (!empty($alias)) ? $id . ':' . $alias : $id;
            $link = JRoute::_('index.php?option=com_allevents&view=event&id=' . $slug, false);
        }

        return $link;
    }
}
