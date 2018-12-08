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
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

if (!class_exists('AllEventsModelEventForm'))
    require(JPATH_SITE . '/components/com_allevents/models/eventform.php');

$jinput = JFactory::getApplication()->input;
$event = $jinput->getString('event');
$data = json_decode($event, true);
$user = JFactory::getUser($jinput->get('user_id'));
$myevent = new AllEventsModelEventForm();
$params = AllEventsHelperParam::getGlobalParam();
$date_ok = true;

// on va mettre les dates au format UTC+00Z
// if (!empty($data['allday'])) {
// if ((!strptime($data['start'], $params['gdate_format'])) || (!strptime($data['end'], $params['gdate_format'])))
// {
// $date_ok=false ;
// }
// } else {
// if ((!strptime($data['start'], $params['gdatetime_format'])) || (!strptime($data['end'], $params['gdatetime_format'])))
// {
// $date_ok=false ;
// }
// }

if ($date_ok) {
    if ($data['type_action'] == "UPD2") {
        // on met JREQUEST_ALLOWRAW  et non JREQUEST_ALLOWHTML car ce dernier vient "bousiller" les code <"color">
        $data['description'] = JComponentHelper::filterText($jinput->post->get('event_description', '', 'raw'));
        $data['type_action'] = "UPD";
    } elseif ($data['type_action'] == "INS2") {
        // on met JREQUEST_ALLOWRAW  et non JREQUEST_ALLOWHTML car ce dernier vient "bousiller" les code <"color">
        $data['description'] = JComponentHelper::filterText($jinput->post->get('event_description', '', 'raw'));
        $data['type_action'] = "INS";
    }

    $data_save['date'] = '';
    $data_save['enddate'] = '';
    $data_save['openingdate'] = date(JFactory::getDate()->toSql(false));
    $data_save['expirationdate'] = JFactory::getDbo()->getNullDate();
    // $dt = new DateTimeZone($user->getParam('timezone', $config->get('offset')));
    // on va mettre les dates au format UTC+00Z
    if (!empty($data['allDay'])) {
        $data_save['allday'] = "1";
        $date = DateTime::createFromFormat($params['gdate_format'], $data['start']);
        $enddate = DateTime::createFromFormat($params['gdate_format'], $data['end']);

        if (!empty($date)) {
            $ldate = new JDate($date->format('Y-m-d H:i'));
            $data_save['date'] = $ldate->format($params['gdate_format'], false, false);
        }

        if (!empty($enddate)) {
            $ldate = new JDate($enddate->format('Y-m-d H:i'));
            $data_save['enddate'] = $ldate->format($params['gdate_format'], false, false);
        }
    } else {
        $data_save['allday'] = "0";
        $date = DateTime::createFromFormat($params['gdatetime_format'], $data['start']);
        $enddate = DateTime::createFromFormat($params['gdatetime_format'], $data['end']);
        if (!empty($date)) {
            $ldate = new JDate($date->format('Y-m-d H:i'));
            $data_save['date'] = $ldate->format($params['gdatetime_format'], false, false);
        }

        if (!empty($enddate)) {
            $ldate = new JDate($enddate->format('Y-m-d H:i'));
            $data_save['enddate'] = $ldate->format($params['gdatetime_format'], false, false);
        }
    }

    $canEdit = $user->authorise('core.edit', 'com_allevents');
    if (!$canEdit && $user->authorise('core.edit.own', 'com_allevents')) {
        $canEdit = $user->id == $this->item->created_by;
    }

    if (($canEdit !== true)
        && (($data['type_action'] == "UPD") || ($data['type_action'] == "MOV") || ($data['type_action'] == "DEL"))
    ) {
        return false;
    }

    switch ($data['type_action']) {
        case "INS":
            if ($user->authorise('core.create', 'com_allevents') !== true) {
                return false;
            }
            $data_save['activity_id'] = $data['activity_id'];
            $data_save['agenda_id'] = $data['agenda_id'];
            $data_save['contiguous_date'] = 1;
            $data_save['description'] = isset($data['description']) ? $data['description'] : "";
            $data_save['enrolment_max_participant'] = $data['enrolment_max_participant'];
            $data_save['hot'] = $data['hot'];
            $data_save['id'] = 0;
            $data_save['place_id'] = $data['place_id'];
            $data_save['proposed_by'] = $user->get('id');
            $data_save['titre'] = $data['title'];
            $bReturn = $myevent->save($data_save, $user->id);
            echo ($bReturn === false) ? 0 : 1;
            break;

        case "UPD":
            $data_save['activity_id'] = $data['activity_id'];
            $data_save['agenda_id'] = $data['agenda_id'];
            $data_save['contiguous_date'] = 1;
            $data_save['description'] = $data['description'];
            $data_save['enrolment_max_participant'] = $data['enrolment_max_participant'];
            $data_save['hot'] = $data['hot'];
            $data_save['id'] = $data['id'];
            $data_save['place_id'] = $data['place_id'];
            $data_save['titre'] = $data['title'];
            $bReturn = $myevent->save($data_save, $user->id);
            echo ($bReturn === false) ? 0 : 1;
            break;

        case "MOV":
            $data_save['id'] = $data['id'];
            $bReturn = $myevent->save($data_save, $user->id);
            echo ($bReturn === false) ? 0 : 1;
            break;

        case "DEL":
            $bReturn = $myevent->delete($data['id'], $user->id);
            echo ($bReturn === false) ? 0 : 1;
            break;

        default:
            echo 0;
    }
} else {
    echo 0;
}
