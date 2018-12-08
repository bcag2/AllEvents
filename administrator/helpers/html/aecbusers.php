<?php
defined('_JEXEC') or die;

/**
 * AECBUsersHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

/**
 * Community Builder Users component helper for AllEvents
 */
class AECBUsersHelper
{
    /**
     * Get a list of the user groups for filtering.
     *
     * @return array An array of JHtmlOption elements.
     * @throws Exception
     */
    public static function getGroups()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)->select('a.id AS value')->select('a.title AS text')->select(
            'COUNT(DISTINCT b.id) AS level')->from('#__usergroups AS a')->join('LEFT',
            '#__usergroups AS b ON a.lft > b.lft AND a.rgt < b.rgt')->group('a.id, a.title, a.lft, a.rgt')->order(
            'a.lft ASC');
        $db->setQuery($query);

        try {
            $options = $db->loadObjectList();
        } catch (RuntimeException $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return null;
        }

        foreach ($options as &$option) {
            $option->text = str_repeat('- ', $option->level) . $option->text;
        }

        return $options;
    }
}
