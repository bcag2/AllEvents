<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/helpers/html/enrolment.php';

/**
 * AllEventsHelperEventDisplay
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelperEventDisplay
{
    /**
     * AllEventsHelperEventDisplay::getTableEnrolmentsHTML()
     *
     * @param mixed $item
     * @param mixed $enrolments
     * @param mixed $params
     *
     * @return string
     */
    public static function getTableEnrolmentsHTML($item, $enrolments, $params)
    {
        $sContent = '<table id="AE_EventsParticipants">';
        $sContent .= '<thead>';
        $sContent .= '<tr>';
        $sContent .= '<th class="nbr">#</th>';
        $sContent .= '<th>' . JText::_('COM_ALLEVENTS_HEADING_NAME') . '</th>';
        $sContent .= '<th>' . JText::_('COM_ALLEVENTS_ENROLMENTS_ENROLDATE') . '</th>';
        $sContent .= '<th>' . JText::_('COM_ALLEVENTS_ENROLMENTS_PENDING') . '</th>';
        $sContent .= '<th>' . JText::_('COM_ALLEVENTS_ENROLMENTS_PUBLISHED') . '</th>';
        $sContent .= '<th>' . JText::_('COM_ALLEVENTS_PARTICIPANTS') . '</th>';
        $sContent .= '<th>' . JText::_('COM_ALLEVENTS_COMMENTAIRE') . '</th>';
        $sContent .= '</tr>';
        $sContent .= '</thead>';
        $sContent .= '<tbody>';
        if ((isset($enrolments)) && (count($enrolments) > 0)) {
            foreach ($enrolments as $i => $enrolment) {
                $enroldate = JHtml::_('date', $enrolment->enroldate, AllEventsHelperDate::jVersionFormat($params['gdate_format']));
                $enroltype = "";
                //$btnenroltype = JHtml::_('enrolment.enrolment_enroltype', $enrolment->enroltype, $i, 1);
                $published = "";
                $rank = "";
                switch ($enrolment->enroltype) {
                    //_EnrolType_YES
                    case '0':
                        $enroltype = '<span class="icon-enrol_yes" title=""></span>';
                        if (($item->enrolment_max_participant <> 0) && ($item->allow_overbooking) && ($enrolment->rank > $item->enrolment_max_participant)) {
                            $enrolment->published = 0;
                        }
                        if ($enrolment->published == 1) {
                            $published = '<span class="icon-enrol_green" title="">' . JText::_('AE_CONFIRMED') . '</span>';
                        } else {
                            $published = '<span class="icon-enrol_yellow" title="">' . JText::_('ENROL_OVERBOOKING') . '</span>';
                        }
                        $rank = $enrolment->rank;
                        break;
                    //_EnrolType_NO
                    case '1':
                        $enroltype = '<span class="icon-enrol_no" title=""></span>';
                        $rank = '';
                        $published = '<span class="icon-enrol_red" title="">' . JText::_('ENROL_NO') . '</span>';
                        break;
                    //_EnrolType_PERHAPS
                    case '2':
                        $enroltype = '<span class="icon-enrol_perhaps" title=""></span>';
                        $rank = '';
                        $published = '<span class="icon-enrol_yellow" title="">' . JText::_('ENROL_UNCERTAIN') . '</span>';
                        break;
                    // EnrolType_Pending signifie : l'inscription est valide (soit _EnrolType_YES) mais pas définitive parce que p.e. en attente d'approbation ou non publiée.
                    case '3':
                        $enroltype = '<span class="icon-enrol_pending" title=""></span>';
                        $rank = '';
                        $published = '<span class="icon-enrol_yellow" title="">' . JText::_('ENROL_OVERBOOKING') . '</span>';
                        break;
                }

                $sContent .= '<tr>';
                $sContent .= '<td class="nbr">' . $rank . '</td>';
                $sContent .= '<td>' . $enrolment->created_by . '</td>';
                $sContent .= '<td>' . $enroldate . '</td>';
                // $sContent .= '<td>' . $enroltype . '&nbsp;' . $btnenroltype . '</td>';
                $sContent .= '<td>' . $enroltype . '</td>';
                $sContent .= '<td>' . $published . '</td>';
                $sContent .= '<td>' . $enrolment->companions . '</td>';
                $sContent .= '<td>' . $enrolment->commentaire . '</td>';
                $sContent .= '</tr>';
            }
        }
        $sContent .= '</tbody>';
        $sContent .= '</table>';

        return $sContent;
    }

    /**
     * AllEventsHelperEventDisplay::getStatEnrolmentsHTML()
     *
     * @param mixed $item
     *
     * @return string
     */
    public static function getStatEnrolmentsHTML($item)
    {
        // init des 5 zones
        $enrol_yes = '<td><span title="' . sprintf(JText::_('ENROL_NBRDEFINITIVE'), 0) . '" class="icon-enrol_yes"></span></td><td>0</td>';
        $enrol_no = '<td><span title="' . sprintf(JText::_('ENROL_NBRCANCELLED'), 0) . '" class="icon-enrol_no"></span></td><td>0</td>';
        $enrol_perhaps = '<td><span title="' . sprintf(JText::_('ENROL_NBRPERHAPS'), 0) . '" class="icon-enrol_perhaps"></span></td><td>0</td>';
        $enrol_total = '<td><span title="' . sprintf(JText::_('ENROLMENT_NO_LIMIT'), 0) . '" class="icon-enrol_total"></span></td><td>0</td>';
        $enrol_unpublished = '<td><span title="' . sprintf(JText::_('ENROL_NBRUNPUBLISHED'), 0) . '" class="icon-enrol_unpublished"></span></td><td>0</td>';

        foreach ($item->statenrolments as $statenrolment) {
            if ($statenrolment->nb <> 0) {
                if ($statenrolment->enroltype == 0) {
                    if (($statenrolment->nb <= $item->enrolment_max_participant) || ($item->enrolment_max_participant == 0)) {
                        $enrol_yes = '<td><span title="' . sprintf(JText::_('ENROL_NBRDEFINITIVE'), $statenrolment->nb) . '" class="icon-enrol_yes"></span></td><td>' . (int)$statenrolment->nb . '</td>';
                    } else {
                        $enrol_yes = '<td><span title="' . sprintf(JText::_('ENROL_NBRDEFINITIVE_WITH_SURBOOKING'), $item->enrolment_max_participant, $statenrolment->nb - $item->enrolment_max_participant) . '" class="icon-enrol_yes"></span></td><td>' . (int)$statenrolment->nb . '</td>';
                    }
                } elseif ($statenrolment->enroltype == 1) {
                    $enrol_no = '<td><span title="' . sprintf(JText::_('ENROL_NBRCANCELLED'), $statenrolment->nb) . '" class="icon-enrol_no"></span></td><td>' . (int)$statenrolment->nb . '</td>';
                } elseif ($statenrolment->enroltype == 2) {
                    $enrol_perhaps = '<td><span title="' . sprintf(JText::_('ENROL_NBRPERHAPS'), $statenrolment->nb) . '" class="icon-enrol_perhaps"></span></td><td>' . (int)$statenrolment->nb . '</td>';
                } elseif ($statenrolment->enroltype == 9) {
                    if ($item->enrolment_max_participant == 0) {
                        $enrol_total = '<td><span title="' . sprintf(JText::_('ENROLMENT_NO_LIMIT'), $statenrolment->nb) . '" class="icon-enrol_total"></span></td><td><div style="background:#E4E4E4; color:#777; padding: 2px 5px; border-radius: 5px;">' . (int)$statenrolment->nb . '&nbsp;/&nbsp;&infin;</div></td>';
                    } else {
                        $enrol_total = '<td><span title="' . sprintf(JText::_('ENROLMENT_MAX_ALLOWED'), $item->enrolment_max_participant) . '" class="icon-enrol_total"></span></td><td><div style="background:#E4E4E4; color:#777; padding: 2px 5px; border-radius: 5px;">' . (int)$statenrolment->nb . '&nbsp;/&nbsp;' . $item->enrolment_max_participant . '</div></td>';
                    }
                } elseif ($statenrolment->enroltype == 10) {
                    $enrol_unpublished = '<td><span title="' . sprintf(JText::_('ENROL_NBRUNPUBLISHED'), $statenrolment->nb) . '" class="icon-enrol_unpublished"></span></td><td>' . (int)$statenrolment->nb . '</td>';
                }
            }
        }
        $statenrolmentshtml = '<br/><br/>' . JText::_('ENROL_RECAPITULATIF') . '<table><tr>' . $enrol_total . $enrol_yes . $enrol_no . $enrol_perhaps . $enrol_unpublished . '</tr></table>';

        return $statenrolmentshtml;
    }

    /**
     * AllEventsHelperEventDisplay::getBlocEnrolment()
     *
     * @param mixed $item
     * @param mixed $params
     * @param bool $all
     * @param bool $detailed
     * @param bool $forced
     *
     * @return string
     */
    public static function getBlocEnrolment($item, $params, $all = true, $detailed = false, $forced = false)
    {
        $bloc = '';
        $user = JFactory::getUser();
        $authorised = ($forced) ? $forced : $user->authorise('core.enrolment', 'com_allevents');

        if (($item->nb_enrolyes > 0) || ($item->enrolment_enabled)) {
            if ($all) {
                $bloc .= '<div class="divider-before blue">';
                $bloc .= AllEventsHelperEventDisplay::getEnrolmentsHTML($item, $params);
            }

            if (($item->enrolment_enabled) && ($authorised) && !($item->enrolment_finished) && !($item->cancelled)) {
                if ($item->eventfull) {
                    // $bloc .=  JText::_('EVENT_FULL');
                } else {
                    if ($item->event_in_past) {
                        // $bloc .=  JText::_('event_in_past') ;
                    } else {
                        if ($item->enrol_perhaps) {
                            $bloc .= '<span class="divider-before-btn"><i class="fa fa-user"></i>&nbsp;' . JText::_('I_WILL_PERHAPS_COME') . '</span>';
                            if ($params['geventshow_enrolno'] != 0) //yes or always
                            {
                                $bloc .= '<span onclick="EnrolNoItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-times"></i>&nbsp;' . JText::_('CLICK_AND_DONT_PARTICIPATE') . '</span>';
                            }
                            $bloc .= '<span onclick="EnrolYesItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-plus"></i>&nbsp;' . JText::_('CLICK_AND_PARTICIPATE') . '</span>';
                        } elseif ($item->enrol_no) {
                            if ($params['geventshow_enrolperhaps'] != 0) //yes or always
                            {
                                $bloc .= '<span onclick="EnrolPerhapsItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user"></i>&nbsp;' . JText::_('I_WILL_PERHAPS_COME') . '</span>';
                            }
                            $bloc .= '<span class="divider-before-btn"><i class="fa fa-user-times"></i>&nbsp;' . JText::_('CLICK_AND_DONT_PARTICIPATE') . '</span>';
                            $bloc .= '<span onclick="EnrolYesItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-plus"></i>&nbsp;' . JText::_('CLICK_AND_PARTICIPATE') . '</span>';
                        } elseif ($item->enrol_yes) {
                            if ($params['geventshow_enrolperhaps'] != 0) //yes or always
                            {
                                $bloc .= '<span onclick="EnrolPerhapsItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user"></i>&nbsp;' . JText::_('I_WILL_PERHAPS_COME') . '</span>';
                            }
                            if ($params['geventshow_enrolno'] != 0) //yes or always
                            {
                                $bloc .= '<span onclick="EnrolNoItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-times"></i>&nbsp;' . JText::_('CLICK_AND_DONT_PARTICIPATE') . '</span>';
                            }
                            $bloc .= '<span class="divider-before-btn"><i class="fa fa-user-plus"></i>&nbsp;' . JText::_('CLICK_AND_PARTICIPATE') . '</span>';
                            if ($detailed) {
                                if ($params["gmultipleenrolmentsallow"]) {
                                    $bloc .= '<a style="padding-left:5px;padding-right:5px" class="divider-before-btn-solid blue" data-toggle="popoverp" data-placement="bottom" data-container="body" alt="' . JText::_('COM_ALLEVENTS_COMPANIONS') . '" title="' . JText::_('COM_ALLEVENTS_COMPANIONS') . '"><i class="fa fa-users"></i></a>';
                                }
                                $bloc .= '<a style="padding-left:5px;padding-right:5px" class="divider-before-btn-solid blue" data-toggle="popoverc" data-placement="bottom" data-container="body" alt="' . JText::_('COM_ALLEVENTS_COMMENTAIRE') . '" title="' . JText::_('COM_ALLEVENTS_COMMENTAIRE') . '"><i class="fa fa-commenting-o"></i></a>';
                            }
                        } else {
                            if ($params['geventshow_enrolperhaps'] == 2) //always
                            {
                                $bloc .= '<span onclick="EnrolPerhapsItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user"></i>&nbsp;' . JText::_('I_WILL_PERHAPS_COME') . '</span>';
                            }
                            if ($params['geventshow_enrolno'] != 0) //yes or always
                            {
                                $bloc .= '<span onclick="EnrolNoItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-times"></i>&nbsp;' . JText::_('CLICK_AND_DONT_PARTICIPATE') . '</span>';
                            }
                            $bloc .= '<span onclick="EnrolYesItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-plus"></i>&nbsp;' . JText::_('CLICK_AND_PARTICIPATE') . '</span>';
                        }
                    }
                }
            } elseif (!($item->enrolment_enabled) && ($authorised) && ($item->enrol_yes)) {
                if ($params['geventshow_enrolperhaps'] != 0) //yes or always
                {
                    $bloc .= '<span onclick="EnrolPerhapsItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user"></i>&nbsp;' . JText::_('I_WILL_PERHAPS_COME') . '</span>';
                }
                if ($params['geventshow_enrolno'] != 0) //yes or always
                {
                    $bloc .= '<span onclick="EnrolNoItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-times"></i>&nbsp;' . JText::_('CLICK_AND_DONT_PARTICIPATE') . '</span>';
                }
                $bloc .= '<span class="divider-before-btn"><i class="fa fa-user-plus"></i>&nbsp;' . JText::_('CLICK_AND_PARTICIPATE') . '</span>';
            } elseif (($item->enrolment_finished) && ($authorised) && ($item->enrol_yes)) {
                if ($params['geventshow_enrolperhaps'] != 0) //yes or always
                {
                    $bloc .= '<span onclick="EnrolPerhapsItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user"></i>&nbsp;' . JText::_('I_WILL_PERHAPS_COME') . '</span>';
                }
                if ($params['geventshow_enrolno'] != 0) //yes or always
                {
                    $bloc .= '<span onclick="EnrolNoItem(' . $item->id . ');" class="divider-before-btn-solid"><i class="fa fa-user-times"></i>&nbsp;' . JText::_('CLICK_AND_DONT_PARTICIPATE') . '</span>';
                }
                $bloc .= '<span class="divider-before-btn"><i class="fa fa-user-plus"></i>&nbsp;' . JText::_('CLICK_AND_PARTICIPATE') . '</span>';
            } elseif (!$authorised) {
                // $bloc .=  '<span class="divider-before-btn">' ;
                // $bloc .=  JText::_('NO_ENROL_PERMISSION');
                // $bloc .=  '</span>' ;
            }
            if ($all) {
                $bloc .= '</div>';
            }
        }

        return $bloc;
    }

    /**
     * AllEventsHelperEventDisplay::getEnrolmentsHTML()
     *
     * @param mixed $item
     * @param       $params
     *
     * @return string HTML content
     * @internal param mixed $param
     */
    public static function getEnrolmentsHTML($item, $params)
    {
        $enrolmentshtml = "";
        if (($item->enrolment_max_participant == 0) || (($item->enrolment_max_participant > 0) && ($item->nb_enrolyes < $item->enrolment_max_participant))) {
            $enrolstate = "ok";
        } elseif ($item->allow_overbooking) {
            $enrolstate = "overbooking";
        } else {
            $enrolstate = "full";
        }

        if ($params['geventshow_enrolmentdisplay'] == 0) {
            if ($item->enrolment_max_participant == 0) {
                $enroltitle = sprintf(JText::_('ENROL_NBRDEFINITIVE'), $item->nb_enrolyes);
            } elseif ($item->nb_enrolyes > $item->enrolment_max_participant) {
                $enroltitle = sprintf(JText::_('ENROL_NBRDEFINITIVE_WITH_SURBOOKING'), $item->enrolment_max_participant, $item->nb_enrolyes - $item->enrolment_max_participant);
            } else {
                $enroltitle = sprintf(JText::_('ENROL_NBRDEFINITIVE'), $item->nb_enrolyes);
            }
            $enrolmentshtml .= '<span style="float:left" title="' . $enroltitle . '" class="ae_enrol ' . $enrolstate . '"> ';
            $enrolmentshtml .= (int)$item->nb_enrolyes;
            $enrolmentshtml .= '&nbsp;/&nbsp;';
            $enrolmentshtml .= ($item->enrolment_max_participant == 0) ? '&infin;' : $item->enrolment_max_participant;
            $enrolmentshtml .= '</span>&nbsp;' . $enroltitle;
        } elseif (($params['geventshow_enrolmentdisplay'] == 1) && ($enrolstate == "full")) {
            $enrolmentshtml .= '<span style="float:left" title="';
            $enrolmentshtml .= JText::_('COM_ALLEVENTS_EVENT_COMPLETED');
            $enrolmentshtml .= '" class="ae_enrol ' . $enrolstate . '"> ';
            $enrolmentshtml .= JText::_('COM_ALLEVENTS_EVENT_COMPLETED');
            $enrolmentshtml .= '</span>';
        } elseif (($params['geventshow_enrolmentdisplay'] == 1) && ($enrolstate == "ok")) {
            $enrolmentshtml .= '<span style="float:left" title="';
            $enrolmentshtml .= JText::_('COM_ALLEVENTS_EVENT_OPENED');
            $enrolmentshtml .= '" class="ae_enrol ' . $enrolstate . '"> ';
            $enrolmentshtml .= JText::_('COM_ALLEVENTS_EVENT_OPENED');
            $enrolmentshtml .= '</span>';
        } elseif (($params['geventshow_enrolmentdisplay'] == 1) && ($enrolstate == "overbooking")) {
            $enrolmentshtml .= '<span style="float:left" title="';
            $enrolmentshtml .= JText::_('COM_ALLEVENTS_EVENT_OPENED');
            $enrolmentshtml .= '" class="ae_enrol ' . $enrolstate . '"> ';
            $enrolmentshtml .= JText::_('COM_ALLEVENTS_EVENT_OPENED');
            $enrolmentshtml .= '</span>';
        }

        return $enrolmentshtml;
    }

    /**
     * AllEventsHelperEventDisplay::getRibbon()
     *
     * @param mixed $item
     * @param mixed $params
     *
     * @return string
     */
    public static function getRibbon($item, $params)
    {
        $bloc = "";
        $color = "";
        $text = "";
        if ($params['geventshow_ribbon'] == 0) {
            $color = "";
            $text = "";
        } elseif (!empty($item->ribbon_id)) {
            $color = $item->ribbon_couleur;
            $text = $item->ribbon_titre;
        } elseif (($params['geventshow_stdribbon'] == 1) && ($item->cancelled) && !($item->event_in_past)) {
            $color = "red";
            $text = JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_CANCELLED');
        } elseif (($params['geventshow_stdribbon'] == 1) && ($item->enrolment_max_participant > 0) && ($item->enrolment_max_participant <= $item->nb_enrolyes) && !($item->allow_overbooking) && !($item->event_in_past)) {
            $color = "red";
            $text = JText::_('COM_ALLEVENTS_COMPLETE');
        } elseif (($params['geventshow_stdribbon'] == 1) && ($item->hits >= $item->agenda_max_hits)) {
            $color = "gold";
            $text = JText::_('COM_ALLEVENTS_HOT');
        } elseif (($params['geventshow_stdribbon'] == 1) && ((JHtml::date($item->date, 'Ymd') == JHtml::date(null, 'Ymd'))) || ((JHtml::date($item->date, 'Ymd') <= JHtml::date(null, 'Ymd')) && (JHtml::date($item->enddate, 'Ymd') >= JHtml::date(null, 'Ymd')))) {
            $color = "orange";
            $text = JText::_('TODAY');
        } elseif (($params['geventshow_stdribbon'] == 1) && ($item->news) && !($item->event_in_past)) {
            $color = "green";
            $text = JText::_('COM_ALLEVENTS_NEWS');
        } elseif (($params['geventshow_stdribbon'] == 1) && ($item->enrolment_max_participant > 0) && ($item->lastplaces) && ($item->enrolment_enabled) && !($item->event_in_past)) {
            $color = "purple";
            $text = JText::_('COM_ALLEVENTS_LASTPLACES');
        } elseif (($params['geventshow_stdribbon'] == 1) && (JHtml::date($item->veille, 'Ymd') == JHtml::date(null, 'Ymd'))) {
            $color = "orange";
            $text = JText::_('COM_ALLEVENTS_TOMORROW');
        } elseif (($params['geventshow_stdribbon'] == 1) && $item->lastdays && !($item->event_in_past)) {
            $color = "orange";
            $text = JText::_('COM_ALLEVENTS_LASTDAYS');
        } elseif (($params['geventshow_stdribbon'] == 1) && $item->hot && !($item->event_in_past)) {
            $color = "gold";
            $text = JText::_('COM_ALLEVENTS_GOLD');
        }

        if (!empty($color)) {
            $bloc .= '<div class="ribbon ribbon-' . $color . '"><div class="banner"><div class="text">' . $text . '</div></div></div>';
        }

        return $bloc;
    }

    /**
     * AllEventsHelperEventDisplay::getBlocEnrolmentJS()
     *
     * @return string
     */
    public static function getBlocEnrolmentJS()
    {
        $bloc = "<script type='text/javascript'> ";
        $bloc .= "    function EnrolYesItem(item_id){document.getElementById('form-event-enrolyes-' + item_id).submit();}";
        $bloc .= "    function EnrolPerhapsItem(item_id){document.getElementById('form-event-enrolperhaps-' + item_id).submit();}";
        $bloc .= "    function EnrolNoItem(item_id){document.getElementById('form-event-enrolno-' + item_id).submit();}";
        $bloc .= "    function EnrolCommentaire(item_id){document.getElementById('form-enrolment-commentaire-' + item_id).submit();}";
        $bloc .= "    function EnrolCompanions(item_id){document.getElementById('form-enrolment-companions-' + item_id).submit();}";
        $bloc .= "</script>";

        return $bloc;
    }

    /**
     * AllEventsHelperEventDisplay::getBlocEnrolmentForm()
     *
     * @param mixed $item
     * @param mixed $Itemid
     *
     * @return string
     */
    public static function getBlocEnrolmentForm($item, $Itemid)
    {
        $bloc = '<form id="form-event-enrolyes-' . $item->id . '" style="display:inline" action="' . htmlspecialchars(JUri::getInstance()->toString()) . '" method="post" class="form-validate" enctype="multipart/form-data">';
        $bloc .= '    <input type="hidden" name="jform[id]" value="' . $item->id . '" />';
        $bloc .= '    <input type="hidden" name="jform[id_enrolment]" value = "' . $item->id_enrolment . '" />';
        $bloc .= '    <input type="hidden" name="jform[url]" value = "' . htmlspecialchars(JUri::getInstance()->toString()) . '" />';
        $bloc .= '    <input type="hidden" name="Itemid" value = "' . $Itemid . '" />';
        $bloc .= '    <input type="hidden" name="option" value="com_allevents" />';
        $bloc .= '    <input type="hidden" name="task" value="events.enrol_yes" />';
        $bloc .= JHtml::_("form.token");
        $bloc .= '</form>';

        $bloc .= '<form id="form-event-enrolno-' . $item->id . '" style="display:inline" action="' . htmlspecialchars(JUri::getInstance()->toString()) . '" method="post" class="form-validate" enctype="multipart/form-data">';
        $bloc .= '    <input type="hidden" name="jform[id]" value="' . $item->id . '" />';
        $bloc .= '    <input type="hidden" name="jform[id_enrolment]" value = "' . $item->id_enrolment . '" />';
        $bloc .= '    <input type="hidden" name="jform[url]" value = "' . htmlspecialchars(JUri::getInstance()->toString()) . '" />';
        $bloc .= '    <input type="hidden" name="Itemid" value = "' . $Itemid . '" />';
        $bloc .= '    <input type="hidden" name="option" value="com_allevents" />';
        $bloc .= '    <input type="hidden" name="task" value="events.enrol_no" />';
        $bloc .= JHtml::_("form.token");
        $bloc .= '</form>';

        $bloc .= '<form id="form-event-enrolperhaps-' . $item->id . '" style="display:inline" action="' . htmlspecialchars(JUri::getInstance()->toString()) . '" method="post" class="form-validate" enctype="multipart/form-data">';
        $bloc .= '    <input type="hidden" name="jform[id]" value="' . $item->id . '" />';
        $bloc .= '    <input type="hidden" name="jform[id_enrolment]" value = "' . $item->id_enrolment . '" />';
        $bloc .= '    <input type="hidden" name="jform[url]" value = "' . htmlspecialchars(JUri::getInstance()->toString()) . '" />';
        $bloc .= '    <input type="hidden" name="Itemid" value = "' . $Itemid . '" />';
        $bloc .= '    <input type="hidden" name="option" value="com_allevents" />';
        $bloc .= '    <input type="hidden" name="task" value="events.enrol_perhaps" />';
        $bloc .= JHtml::_("form.token");
        $bloc .= '</form>';

        $bloc .= '<form id="form-enrolment-commentaire-' . $item->id . '" style="display:inline" action="' . htmlspecialchars(JUri::getInstance()->toString()) . '" method="post" class="form-validate" enctype="multipart/form-data">';
        $bloc .= '    <input type="hidden" name="jform[id]" value="' . $item->id . '" />';
        $bloc .= '    <input type="hidden" name="jform[id_enrolment]" value = "' . $item->id_enrolment . '" />';
        if (isset($item->enrol_commentaire)) {
            $bloc .= '    <input type="hidden" name="jform[commentaire]" value = "' . $item->enrol_commentaire . '" />';
        }
        $bloc .= '    <input type="hidden" name="jform[url]" value = "' . htmlspecialchars(JUri::getInstance()->toString()) . '" />';
        $bloc .= '    <input type="hidden" name="Itemid" value = "' . $Itemid . '" />';
        $bloc .= '    <input type="hidden" name="option" value="com_allevents" />';
        $bloc .= '    <input type="hidden" name="task" value="events.enrol_commentaire" />';
        $bloc .= JHtml::_("form.token");
        $bloc .= '</form>';

        if (isset($item->enrol_companions)) {
            $bloc .= '<form id="form-enrolment-companions-' . $item->id . '" style="display:inline" action="' . htmlspecialchars(JUri::getInstance()->toString()) . '" method="post" class="form-validate" enctype="multipart/form-data">';
            $bloc .= '    <input type="hidden" name="jform[id]" value="' . $item->id . '" />';
            $bloc .= '    <input type="hidden" name="jform[id_enrolment]" value = "' . $item->id_enrolment . '" />';
            $bloc .= '    <input type="hidden" name="jform[companions]" value = "' . $item->enrol_companions . '" />';
            $bloc .= '    <input type="hidden" name="jform[url]" value = "' . htmlspecialchars(JUri::getInstance()->toString()) . '" />';
            $bloc .= '    <input type="hidden" name="Itemid" value = "' . $Itemid . '" />';
            $bloc .= '    <input type="hidden" name="option" value="com_allevents" />';
            $bloc .= '    <input type="hidden" name="task" value="events.enrol_companions" />';
            $bloc .= JHtml::_("form.token");
            $bloc .= '</form>';
        }

        return $bloc;
    }

    /**
     * AllEventsHelperEventDisplay::getPoweredBy()
     *
     * @param bool $value
     *
     * @return string
     */
    public static function getPoweredBy($value = true)
    {
        $sHTML = '';
        if ($value) {
            $style = 'display:inline !important;hidden:false !important;visibility:visible !important;' . 'clear:both !important;padding-top:10px !important;font-family:verdana, sans-serif !important;font-size:xx-small !important;' . '';
            $img = '<span class="icon-8-sprite icon-8 icon-8-poweredby" style="' . $style . '"></span>';
            $sHTML = "<div style='" . $style . "'>" . $img . "&#160;" . "<a href='https://www.allevents3.com/' title='" . str_replace("'", "&#145;", JText::_('COM_ALLEVENTS')) . "' target='_blank'>" . sprintf(JText::_('POWERED_BY'), 'AllEvents') . "</a>&#160;" . $img . "\n</div>\n";
        }

        return ($sHTML);
    }

    /**
     * AllEventsHelperEventDisplay::getRichSnippet()
     *
     * @param mixed $richsnippetsblock
     *
     * @return string
     */
    public static function getRichSnippet($richsnippetsblock)
    {
        $sHTML = "";
        if (!empty($richsnippetsblock)) {
            foreach ($richsnippetsblock as $richsnippetblock) {
                $sHTML .= $richsnippetblock;
            }
        }

        return ($sHTML);
    }

    /**
     * AllEventsHelperEventDisplay::getVignette()
     *
     * @param mixed $obj
     * @param int $dc
     *
     * @return string
     */
    public static function getVignette($obj, $dc = 0)
    {
        $vignette_defaut = "";
        if (empty($dc)) {
            $vignette_defaut = $obj->agenda_vignette;
        } elseif ($dc == 1) {
            $vignette_defaut = $obj->activity_vignette;
        } elseif ($dc == 2) {
            $vignette_defaut = $obj->category_vignette;
        }

        if (!empty($obj->vignette)) {
            $name = $obj->vignette;
        } elseif (!empty($obj->affiche)) {
            $name = $obj->affiche;
        } elseif (!empty($obj->banniere)) {
            $name = $obj->banniere;
        } elseif (!empty($vignette_defaut)) {
            $name = $vignette_defaut;
        } else {
            $name = AllEventsHelperOverride::GetImage('no_photo.png');
        }

        if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $name)) {
            //URL do nothing
        } else {
            if (empty($name) || (!file_exists($name))) {
                $name = AllEventsHelperOverride::GetImage('no_photo.png');
            } else {
                $name = JUri::root(true) . '/' . $name;
            }
        }

        $bloc = '<img alt="' . addslashes($obj->titre) . '" src="' . $name . '" class="eml_event_logo " />';

        return $bloc;
    }

    /**
     * AllEventsHelperEventDisplay::getVignetteName()
     *
     * @param mixed $item
     * @param int $dc
     *
     * @return string
     */
    public static function getVignetteName($item, $dc = 0)
    {
        $vignette_defaut = "";
        if (empty($dc)) {
            $vignette_defaut = $item->agenda_vignette;
        } elseif ($dc == 1) {
            $vignette_defaut = $item->activity_vignette;
        } elseif ($dc == 2) {
            $vignette_defaut = $item->category_vignette;
        }

        if (!empty($item->vignette)) {
            $name = $item->vignette;
        } elseif (!empty($item->affiche)) {
            $name = $item->affiche;
        } elseif (!empty($vignette_defaut)) {
            $name = $vignette_defaut;
        } else {
            $name = AllEventsHelperOverride::GetImage('no_photo.png');
        }

        if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $name)) {
            //URL do nothing
        } else {
            if (empty($name) || (!file_exists($name))) {
                $name = AllEventsHelperOverride::GetImage('no_photo.png');
            } else {
                $name = JUri::root(true) . '/' . $name;
            }
        }

        return $name;
    }

    /**
     * AllEventsHelperEventDisplay::getAfficheName()
     *
     * @param mixed $item
     * @param int $dc
     *
     * @return string
     */
    public static function getAfficheName($item, $dc = 0)
    {
        $vignette_defaut = "";
        if (empty($dc)) {
            $vignette_defaut = $item->agenda_vignette;
        } elseif ($dc == 1) {
            $vignette_defaut = $item->activity_vignette;
        } elseif ($dc == 2) {
            $vignette_defaut = $item->category_vignette;
        }

        if (!empty($item->affiche)) {
            $name = $item->affiche;
        } elseif (!empty($item->vignette)) {
            $name = $item->vignette;
        } elseif (!empty($vignette_defaut)) {
            $name = $vignette_defaut;
        } else {
            $name = AllEventsHelperOverride::GetImage('no_photo.png');
        }

        if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $name)) {
            //URL do nothing
        } else {
            if (empty($name) || (!file_exists($name))) {
                $name = AllEventsHelperOverride::GetImage('no_photo.png');
            } else {
                $name = JUri::root(true) . '/' . $name;
            }
        }

        return $name;
    }
}
