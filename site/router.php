<?php

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

/**
 * AllEventsBuildRoute()
 *
 * @param mixed $query
 *
 * @return array
 */
function AllEventsBuildRoute(&$query)
{
    $segments = [];
    if (isset($query['view'])) {
        $segments[] = $query['view'];
        unset($query['view']);
    }
    if (isset($query['id'])) {
        $segments[] = $query['id'];
        unset($query['id']);
    }
    if (isset($query['layout'])) {
        $segments[] = $query['layout'];
        unset($query['layout']);
    }
    if (isset($query['order_id'])) {
        $segments[] = $query['order_id'];
        unset($query['order_id']);
    }
    if (isset($query['task'])) {
        $segments[] = implode('/', explode('.', $query['task']));
        unset($query['task']);
    }
    if (isset($query['format'])) {
        $segments[] = $query['format'];
        unset($query['format']);
    }
    if (isset($query['processor'])) {
        $segments[] = $query['processor'];
        unset($query['processor']);
    }
    return $segments;
}

/**
 * AllEventsParseRoute()
 *
 * @param mixed $segments
 *
 * @return array
 * @throws Exception
 */
function AllEventsParseRoute($segments)
{
    $vars = [];
    switch ($segments[0]) {
        case 'imagehandler':
            $vars['view'] = $segments[0];
            $vars['layout'] = $segments[1];
            if (isset($segments[2])) $vars['task'] = $segments[2];
            if (isset($segments[3])) $vars['pid'] = $segments[3];
            break;
        // Cas des vues simples
        case 'bootstrapcalendar':
        case 'fullcalendar':
        case 'agendas':
            $vars['view'] = $segments[0];
            break;
        // Cas particuliers des Ã©vÃ¨nemets avec le format feed
        case 'events':
            $vars['view'] = $segments[0];
            if (in_array('format', $segments)) {
                $vars['format'] = 'feed';
            }
            break;
        // cas des écrans simples
        case 'activity':
        case 'agenda':
        case 'category':
        case 'enrolment':
        case 'enrolmentform':
        case 'event':
        case 'eventform':
        case 'place':
        case 'public':
        case 'ressource':
        case 'section':
            $vars['view'] = $segments[0];
            if (isset($segments[1])) {
                $id = explode(':', $segments[1]);
                $vars['id'] = (int)$id[0];
            }
            if (isset($segments[2])) {
                $vars['layout'] = $segments[2];
            }
            break;
        case 'payment':
            $vars['view'] = $segments[0];
            if (isset($segments[1])) {
                $vars['layout'] = $segments[1];
            }
            if (isset($segments[2])) {
                $id = explode(':', $segments[2]);
                if ((!empty($vars['layout'])) && ($vars['layout'] == 'pay')) {
                    $vars['order_id'] = (int)$id[0];
                } else {
                    $vars['id'] = (int)$id[0];
                }
            }
            break;
        case 'orders':
            $vars['view'] = $segments[0];
            if (isset($segments[1])) {
                $layout = explode(':', $segments[1]);
                $vars['layout'] = $layout[0];
            }
            if (isset($segments[2])) {
                $id = explode(':', $segments[2]);
                if ((!empty($vars['layout'])) && ($vars['layout'] == 'order')) {
                    $vars['order_id'] = (int)$id[0];
                }
            }
            if (isset($segments[3])) {
                $vars['processor'] = $segments[3];
            }
            break;
    }

    return $vars;
}