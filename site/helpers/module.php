<?php
defined('_JEXEC') or die;

/**
 * JModuleHelper2
 * Auteur : Christophe Avonture
 * Description : Etend JModuleHelper afin d'y ajouter une méthode pour retrouver un module sur base de son ID
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     2.5
 */
class JModuleHelper2 extends JModuleHelper
{
    /**
     * JModuleHelper2::getModuleList() : Module list
     *
     * @return array
     * @throws Exception
     */
    public static function getModuleList()
    {
        $app = JFactory::getApplication();
        $Itemid = $app->input->getInt('Itemid');
        $groups = implode(',', JFactory::getUser()->getAuthorisedViewLevels());
        $lang = JFactory::getLanguage()->getTag();
        $clientId = (int)$app->getClientId();

        // Build a cache ID for the resulting data object
        $cacheId = $groups . $clientId . (int)$Itemid;

        $db = JFactory::getDbo();

        $query = $db->getQuery(true);
        $query->select('m.id, m.title, m.module, m.position, m.content, m.showtitle, m.params, mm.menuid');
        $query->from('#__modules AS m');
        $query->join('LEFT', '#__modules_menu AS mm ON mm.moduleid = m.id');
        $query->where('m.published = 1');
        $query->join('LEFT', '#__extensions AS e ON e.element = m.module AND e.client_id = m.client_id');
        $query->where('e.enabled = 1');

        $date = JFactory::getDate();
        $now = $date->toSql();
        $nullDate = $db->getNullDate();
        $query->where('(m.publish_up = ' . $db->quote($nullDate) . ' OR m.publish_up <= ' . $db->quote($now) . ')');
        $query->where('(m.publish_down = ' . $db->quote($nullDate) . ' OR m.publish_down >= ' . $db->quote($now) . ')');
        $query->where('m.access IN (' . $groups . ')');
        $query->where('m.client_id = ' . $clientId);
        $query->where('(mm.menuid = ' . (int)$Itemid . ' OR mm.menuid <= 0)');

        // Filter by language
        if ($app->isSite() && $app->getLanguageFilter()) {
            $query->where('m.language IN (' . $db->quote($lang) . ',' . $db->quote('*') . ')');
            $cacheId .= $lang . '*';
        }

        $query->order('m.position, m.ordering');

        // Set the query
        $db->setQuery($query);

        try {
            /** @var JCacheControllerCallback $cache */
            $cache = JFactory::getCache('com_modules', 'callback');

            $modules = $cache->get([$db, 'loadObjectList'], [], md5($cacheId), false);
        } catch (RuntimeException $e) {
            JLog::add(JText::sprintf('JLIB_APPLICATION_ERROR_MODULE_LOAD', $e->getMessage()), JLog::WARNING, 'jerror');

            return [];
        }

        return $modules;
    }

    /**
     * JModuleHelper2::findModuleParams() : Retroune un module sur base de son ID.
     *
     * @param mixed $module_id
     *
     * @return bool
     */
    public static function findModuleParams($module_id = null)
    {
        $return = false;

        if ($module_id != null) {
            $modules = JModuleHelper::getModuleList();
            $total = count($modules);

            for ($i = 0; $i < $total; $i++) {
                if ($modules[$i]->id == $module_id) {
                    $return = $modules[$i]->params;
                    break;
                }
            } // for ($i = 0; $i < $total; $i++)
        } // if ($module_id!=null)
        return $return;
    } // public function findModule($module_id=null)
} // class JModuleHelper2 extends AEClass
