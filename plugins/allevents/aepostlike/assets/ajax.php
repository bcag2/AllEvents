<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

define('_JEXEC', 1);

// No direct access.
defined('_JEXEC') or die;

define('DS', DIRECTORY_SEPARATOR);

define('JPATH_BASE', dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . '..');

require_once(JPATH_BASE . '/includes/defines.php');
require_once(JPATH_BASE . '/includes/framework.php');

jimport('joomla.database.database');
jimport('joomla.database.table');

$app = JFactory::getApplication('site');
$app->initialise();

$user = JFactory::getUser();

$plugin = JPluginHelper::getPlugin('content', 'postlike');

$params = new JRegistry;
$params->loadString($plugin->params);

if ($params->get('access') == 1 && !$user->get('id')) {
    echo 'login';
} else {
    $user_rating = JRequest::getVar('user_rating');
    $cid = 0;
    $select = JRequest::getInt('select');
    $cid = JRequest::getInt('cid');
    $db = JFactory::getDbo();
    $currip = $_SERVER['REMOTE_ADDR'];
    $query = "SELECT * FROM #__allevents_postlike WHERE event_id = " . $cid;
    $db->setQuery($query);
    $votesdb = $db->loadObject();
    if ($select == 1) {
        $select_count = "rating_dislike";
    } elseif ($select == 0) {
        $select_count = "rating_like";
    }
    if (!$votesdb) {
        $query = "INSERT INTO #__allevents_postlike ( event_id, lastip, " . $select_count . ")"
            . "\n VALUES ( " . $cid . ", " . $db->Quote($currip) . ", 1 )";
        $db->setQuery($query);
        $db->query() or die($db->getErrorMsg());
    } else {
        if ($currip != ($votesdb->lastip)) {
            $query = "UPDATE #__allevents_postlike"
                . "\n SET " . $select_count . " = " . $select_count . " + 1, lastip = " . $db->Quote($currip)
                . "\n WHERE event_id = " . $cid;
            $db->setQuery($query);
            $db->query() or die($db->getErrorMsg());
        } else {
            echo 'voted';
            exit();
        }
    }
    echo 'thanks';
}