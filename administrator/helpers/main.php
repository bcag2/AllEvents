<?php

defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

/**
 * AllEventsClassMain
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsClassMain
{
    /**
     * Returns true if we are installed in Joomla! 3.2 or later and we have post-installation messages for our component
     * which must be showed to the user.
     *
     * Returns null if the com_postinstall component is broken because the user screwed up his Joomla! site following
     * some idiot's advice. Apparently there's no shortage of idiots giving terribly bad advice to Joomla! users.
     *
     * @return bool|null
     */
    public function hasPostInstallMessages()
    {
        $extension_id = self::get_extension_id();

        if (!defined('FOF_INCLUDED')) {
            include_once JPATH_SITE . '/libraries/fof/include.php';
        }

        if (!defined('FOF_INCLUDED')) {
            return false;
        }

        // Do I have messages?
        try {
            $pimModel = FOFModel::getTmpInstance('Messages', 'PostinstallModel');
            $pimModel->savestate(false);
            $pimModel->setState('eid', $extension_id);

            $list = $pimModel->getList();
            $result = count($list) >= 1;
        } catch (\Exception $e) {
            $result = null;
        }

        return ($result);
    }

    /**
     * Returns the extension ID for our component
     *
     * @return bool|null
     */
    public function get_extension_id()
    {
        // Get the extension ID for our component
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('extension_id')->from('#__extensions')->where($db->qn('element') . ' = ' . $db->q('com_allevents'));
        $db->setQuery($query);

        try {
            $ids = $db->loadColumn();
        } catch (Exception $exc) {
            return false;
        }

        if (empty($ids)) {
            return false;
        }

        $extension_id = array_shift($ids);

        return ($extension_id);
    }
}