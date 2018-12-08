<?php

defined('_JEXEC') or die;

require_once(JPATH_BASE . '/components/com_community/libraries/core.php');
include_once(COMMUNITY_COM_PATH . DS . 'libraries/activities.php');
include_once(COMMUNITY_COM_PATH . DS . 'helpers/time.php');

/**
 * plgAlleventsJomSocial
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsJomSocial extends JPlugin
{
    /**
     * plgAlleventsJomSocial::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     */
    public function __construct(&$subject, $config)
    {
        $this->_path = JPATH_ROOT . '/administrator/components/com_community';
        $this->_my = CFactory::getUser();
        parent::__construct($subject, $config);
        JPlugin::loadLanguage('plg_allevents_jomsocial', JPATH_ADMINISTRATOR);
    }

    /**
     * plgAlleventsJomSocial::onEventCreate()
     *
     * @param mixed $post
     *
     * @return boolean notifystatus
     */
    public function onEventCreate($post)
    {
        $notifier_oncreate = $this->params->get('notifier_oncreate', 1);
        $notifier_endpoint = $this->params->get('notifier_jomsoc', 1);

        if (!$notifier_oncreate) {
            $notifystatus = false;
        } else {
            if ($notifier_endpoint) {
                if (!file_exists($this->_path . '/admin.community.php')) {
                    $notifystatus = false;
                } else {
                    $user = CFactory::getRequestUser();
                    $userId = $user->id;
                    $itemId = $this->_getAllEventsItemId();

                    $eventid = $post['id'];
                    $eventtitle = $post['titre'];
                    //$starttitle = $post['date'];
                    //$starttime = $post['date'];
                    //$status = $post['published'];
                    $locid = $post['place_id'];
                    $startdate = new JDate($post['date']);
                    $starttime = new JDate($post['date']);
                    $locname = $this->_getLoc($locid);

                    $act = new stdClass();

                    $act->cmd = 'wall.write';
                    $act->actor = $userId;
                    $act->target = 0;
                    $act->title = JText::_('{actor} created an event. ');
                    $act->title .= "<br><a class=\"aenotifier-title-link\" href=\"";
                    $act->title .= JRoute::_("index.php?option=com_allevents&view=event&id=$eventid&Itemid=$itemId") . '">';
                    $act->title .= $eventtitle . '</a><br>';
                    $act->title .= "<span class='aenotifier-datetime'>" . $startdate->toFormat('%d %b') . ' - ' . $starttime->toFormat('%H:%M') . "</span>";
                    $act->title .= $locname;
                    $act->content = "";
                    $act->app = 'allevents';
                    $act->cid = 0;

                    CFactory::load('libraries', 'activities');
                    CActivityStream::add($act);
                    $notifystatus = true;
                }
            }
        }

        return $notifystatus;
    }

    /**
     * plgAlleventsJomSocial::getAllEventsItemId()
     *
     * @return number
     */
    private function _getAllEventsItemId()
    {
        // get database object
        $database = &JFactory::getDbo();
        $query = "SELECT id" . "\nFROM #__menu" . "\nWHERE link LIKE ('%index.php?option=com_allevents%')";
        $database->setQuery($query);
        $Itemid = $database->loadResult();

        return $Itemid;
    }

    /**
     * plgAlleventsJomSocial::_getLoc()
     *
     * Returns a location name
     *
     * @param mixed $locid
     *
     * @return    String    Location Name
     * @access private
     */
    private function _getLoc($locid)
    {
        $db = &JFactory::getDbo();
        $query = 'SELECT titre  FROM `#__allevents_places` WHERE id = ' . $db->quote($locid);
        $db->setQuery($query);
        $result = $db->loadObjectList();

        return $result;
    }

    /**
     * plgAlleventsJomSocial::onRegistrationAccepted()
     *
     * @param mixed $argu
     *
     * @return boolean notifystatus
     */
    public function onRegistrationAccepted($argu)
    {
        $notifier_onaccept = $this->params->get('notifier_onaccept', 1);
        $notifier_endpoint = $this->params->get('notifier_jomsoc', 1);

        if (!$notifier_onaccept) {
            $notifystatus = false;
        } else {
            if ($notifier_endpoint) {
                if (!file_exists($this->_path . '/admin.community.php')) {
                    $notifystatus = false;
                } else {
                    $eventid = $argu['id'];
                    $uid = $argu['cid'];
                    $event = $this->_getEvent($eventid);
                    $registered_user = $this->_getUser($uid);
                    $user = CFactory::getRequestUser();
                    $userId = $user->id;
                    $itemId = $this->_getAllEventsItemId();

                    $eventtitle = $event[0]->titre;
                    //$status = $event[0]->published;
                    $locid = $event[0]->place_id;
                    $startdate = new JDate($event[0]->date);
                    $locname = $this->_getLoc($locid);

                    foreach ($registered_user as $rkey => $rvalue) {

                        $act = new stdClass();

                        $act->cmd = 'wall.write';
                        $act->actor = $userId;
                        $act->target = 0; // no target
                        $act->title = "<a class=\"aenotifier-title-link\" target='_blank' href=\"";
                        $act->title .= JRoute::_("index.php?option=com_allevents&view=users&rdid={$rvalue->rdid}&Itemid=$itemId") . '">';
                        $act->title .= JText::_($rvalue->firstname . '&nbsp;' . $rvalue->lastname . '</a> registered to an event. ');
                        $act->title .= "<br><a class=\"aenotifier-title-link\" href=\"";
                        $act->title .= JRoute::_("index.php?option=com_allevents&view=event&did=$eventid&Itemid=$itemId") . '">';
                        $act->title .= $eventtitle . '</a><br>';
                        $act->title .= "<span class='aenotifier-datetime'>" . $startdate->toFormat('%d %b') . ' - ' . $startdate->toFormat('%H:%M') . "</span>";
                        $act->title .= $locname;
                        $act->content = "";
                        $act->app = 'allevents';
                        $act->cid = 0;

                        CFactory::load('libraries', 'activities');
                        CActivityStream::add($act);
                        $notifystatus = true;
                    }
                }
            }
        }

        return $notifystatus;
    }

    /**
     * plgAlleventsJomSocial::_getEvent()
     *
     * @param mixed $id
     *
     * @return mixed
     */
    private function _getEvent($id)
    {
        $db = &JFactory::getDbo();
        $query = 'SELECT * FROM `#__allevents_events` AS a WHERE a.id=' . $db->quote($id);
        $db->setQuery($query);
        $result = $db->loadObjectList();

        return $result;
    }

    /**
     * plgAlleventsJomSocial::_getUser()
     *
     * @param mixed $id
     *
     * @return mixed
     */
    private function _getUser($id = [])
    {
        $db = &JFactory::getDbo();
        $query = 'SELECT * FROM `#__allevents_enrolments` AS r WHERE r.user_id IN (' . implode(',', $id) . ') ';
        $db->setQuery($query);
        $result = $db->loadObjectList();

        return $result;
    }
}
