<?php

defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file');

/**
 * plgAjaxAllEventsvote
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAjaxAllEventsvote extends JPlugin
{
    /**
     * plgAjaxAllEventsvote::onAjaxAllEventsvote()
     *
     * @return string
     * @throws Exception
     */
    function onAjaxAllEventsvote()
    {
        $input = JFactory::getApplication()->input;

        $user = JFactory::getUser();
        $plugin = JPluginHelper::getPlugin('allevents', 'alleventsvote');

        $params = new JRegistry;
        $params->loadString($plugin->params);

        if ($params->get('access') == 2 && !$user->get('id')) {
            return 'login';
        } else {
            $user_rating = $input->get('user_rating');
            $xid = $input->getInt('xid');
            $table = '#__allevents_aevote';
            $cid = 0;
            if ($params->get('event_id') || $xid == 0) {
                $cid = $input->getInt('cid');
            }

            $db = JFactory::getDbo();
            $query = $db->getQuery(true);

            if ($user_rating >= 0.5 && $user_rating <= 5) {
                $currip = $_SERVER['REMOTE_ADDR'];

                $query->select('*')
                    ->from($db->qn($table))
                    ->where('event_id = ' . $db->quote($cid) . ' AND extra_id = ' . $db->quote($xid));

                $db->setQuery($query);

                try {
                    $votesdb = $db->loadObject();
                } catch (RuntimeException $e) {
                    return 'error';
                }

                $query->clear();

                if (!$votesdb) {
                    $columns = ['event_id', 'rating_sum', 'rating_count', 'lastip'];
                    $values = [$cid, $user_rating, 1, $db->quote($currip)];
                    if ($table == '#__allevents_aevote') :
                        $columns[] = 'extra_id';
                        $values[] = $xid;
                    endif;
                    $query
                        ->insert($db->quoteName($table))
                        ->columns($db->quoteName($columns))
                        ->values(implode(',', $values));

                    $db->setQuery($query);

                    try {
                        $db->execute();
                    } catch (RuntimeException $e) {
                        return 'error';
                    }
                } else {
                    if ($currip != ($votesdb->lastip)) {
                        $query
                            ->update($db->quoteName($table))
                            ->set('rating_sum = rating_sum + ' . $user_rating)
                            ->set('rating_count = rating_count +' . 1)
                            ->set('lastip = ' . $db->quote($currip))
                            ->where('event_id = ' . $cid . ($table == '#__allevents_aevote' ? ' AND extra_id = ' . $xid : ''));

                        $db->setQuery($query);

                        try {
                            $db->execute();
                        } catch (RuntimeException $e) {
                            return 'error';
                        }
                    } else {
                        return 'voted';
                    }
                }

                return 'thanks';
            }
        }

        return '';
    }
}