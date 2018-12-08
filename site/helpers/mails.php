<?php

defined('_JEXEC') or die;
jimport('joomla.filesystem.file');
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
if (!class_exists('AllEventsContactFactory'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeeventcontactfactory.php';
if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

/**
 * AllEventsHelperMails
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelperMails
{
    /**
     * AllEventsHelperMails::SendMailEnrolmentCompleted()
     *
     * @param mixed $data
     * @param integer $userid
     * @param string $type
     */
    public static function SendMailEnrolmentCompleted($data, $userid = 0, $type = 'site')
    {
        self::SendMailEnrolment($data, 6);
    }

    /**
     * AllEventsHelperMails::SendMailEnrolment()
     *
     * @param mixed $data
     * @param mixed $enroltype
     * @param integer $userid
     * @param string $type
     *
     * @throws Exception
     */
    public static function SendMailEnrolment($data, $enroltype, $userid = 0, $type = 'site')
    {
        $app = JFactory::getApplication();
        $config = JFactory::getConfig();
        $mailer = JFactory::getMailer();
        $params = AllEventsHelperParam::getGlobalParam();
        if ($type == 'admin') {
            $user = JFactory::getUser($userid);
        } else {
            $user = JFactory::getUser();
        }
        if ($params['gmail_on']) {
            switch ($enroltype) {
                case 1:
                    // refused by admin or by user
                    $body = self::BuildBody($params['gmail_enrolment_no'], $params['gmail_title']);
                    break;
                case 2:
                    // accepted by admin
                    $body = self::BuildBody($params['gmail_enrolment_ok'], $params['gmail_title']);
                    break;
                case 3:
                    $body = self::BuildBody($params['gmail_enrolment_pending'], $params['gmail_title']);
                    break;
                case 4:
                    $body = self::BuildBody($params['gmail_enrolment_perhaps'], $params['gmail_title']);
                    break;
                case 5:
                    $body = self::BuildBody($params['gmail_enrolment_yes'], $params['gmail_title']);
                    break;
                case 6:
                    $body = self::BuildBody($params['gmail_enrolment_yes'], $params['gmail_title']);
                    break;
            }
            // Set sender array so that my name will show up neatly in your inbox
            $sender = [$config->get('mailfrom'), $config->get('fromname')];
            $mailer->setSender($sender);
            // Add a recipient -- this can be a single address (string) or an array of addresses
            if (!empty($user->email)) {
                $mailer->addRecipient($user->email);
            }
            $cc = [];
            // Add a CC -- this can be a single address (string) or an array of addresses
            if ((($params['gmail_authorupd']) && ($enroltype == 1)) || (($params['gmail_authorvalid']) && ($enroltype == 2)) || (($params['gmail_authornew']) && ($enroltype == 3)) || (($params['gmail_authornew']) && ($enroltype == 4)) || (($params['gmail_authorwait']) && ($enroltype == 5)) || (($params['gmail_authorvalid']) && ($enroltype ==
                        6))
            ) {
                if (!empty($data['contact_email'])) {
                    $cc[] = $data['contact_email'];
                }

                if (!empty($data['proposed_email'])) {
                    $cc[] = $data['proposed_email'];
                }
            }
            // mode user
            if (($params['gmail_by'] == 1)) {
                if ((($params['gmail_agendaupd']) && ($enroltype == 1)) || (($params['gmail_agendaupd']) && ($enroltype == 2)) || (($params['gmail_agendanew']) && ($enroltype == 3)) || (($params['gmail_agendanew']) && ($enroltype == 4)) || (($params['gmail_agendaupd']) && ($enroltype == 5)) || (($params['gmail_agendaupd']) && ($enroltype ==
                            6))
                ) {
                    if (!empty($data['agenda_contact_email'])) {
                        $cc[] = $data['agenda_contact_email'];
                    }
                }
                if ((($params['gmail_adminupd']) && ($enroltype == 1)) || (($params['gmail_adminupd']) && ($enroltype == 2)) || (($params['gmail_adminnew']) && ($enroltype == 3)) || (($params['gmail_adminnew']) && ($enroltype == 4)) || (($params['gmail_adminupd']) && ($enroltype == 5)) || (($params['gmail_adminupd']) && ($enroltype ==
                            6))
                ) {
                    $user = JFactory::getUser($params['defaultuser']);
                    if (!empty($user->email)) {
                        $cc[] = $user->email;
                    }
                }
                // si le user de contact = user de création, un seul mail
                if (!empty($cc)) {
                    $cc = array_unique($cc);
                    $mailer->addCc($cc);
                }
            }

            // mode groupe
            if (($params['gmail_by'] == 0) && ($app->get('massmailoff', 0) == 1)) {
                $access = new JAccess;
                // Get users in the group out of the ACL
                $to = [];
                foreach ($params['gmail_usergroupupd'] as $group) {
                    $to = array_merge($to, $access->getUsersByGroup($group, $params['gmail_recurse']));
                }
                $db = JFactory::getDbo();
                if (!empty($to)) {
                    // Get all users email and group except for senders
                    $query = $db->getQuery(true)->select('email')->from('#__users')->where('id != ' . (int)JFactory::getUser()->get('id'));
                    $query->where('id IN (' . implode(',', $to) . ')');
                } else {
                    $query = $db->getQuery(true)->select('email')->from('#__users')->where('id = ' . (int)JFactory::getUser()->get('id'));
                }
                $db->setQuery($query);
                $rows = $db->loadColumn();

                if (!empty($rows)) {
                    if ($params['gmail_bcc']) {
                        $mailer->addBcc($rows);
                        $mailer->addRecipient($config->get('config.mailfrom'));
                    } else {
                        $mailer->addRecipient($rows);
                    }
                }
            }

            $Subject = JText::_('COM_ALLEVENTS_MAIL_ENROLMENT_SUBJECT');
            $Subject = str_replace('[EVENT_TITLE]', $data['titre'], $Subject);

            $date = DateTime::createFromFormat($params['gdate_format'], $data['date']);
            if (!isset($date) || ($date == '')) {
                $date = DateTime::createFromFormat($params['gdatetime_format'], $data['date']);
            }
            if (!isset($date) || ($date == '')) {
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $data['date']);
            }
            $enddate = DateTime::createFromFormat($params['gdate_format'], $data['enddate']);
            if (!isset($enddate) || ($enddate == '')) {
                $enddate = DateTime::createFromFormat($params['gdatetime_format'], $data['enddate']);
            }
            if (!isset($enddate) || ($enddate == '')) {
                $enddate = DateTime::createFromFormat('Y-m-d H:i:s', $data['enddate']);
            }

            $Subject = str_replace('[EVENT_DATE]', JHtml::date($date->format('Y-m-d H:i:s'), $params['gdate_format']), $Subject);
            $Subject = str_replace('[EVENT_ENDDATE]', JHtml::date($enddate->format('Y-m-d H:i:s'), $params['gdate_format']), $Subject);
            $mailer->setSubject($Subject);

            $body = self::MergeBody($body, $data, $userid, $type);

            $mailer->setBody($body);
            $mailer->isHtml(true);
            $mailer->Encoding = 'base64';
            // Optional file attached
            // $mailer->addAttachment(JPATH_COMPONENT.'/assets/document.pdf');
            // Optionally add embedded image
            // $mailer->AddEmbeddedImage( JPATH_COMPONENT.'/assets/logo128.jpg', 'logo_id', 'logo.jpg', 'base64', 'image/jpeg' );
            // Send once you have set all of your options
            $send = $mailer->Send();
            if ($send !== true) {
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_NOTSENT') . ':' . $send, 'error');
            } else {
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_SENT'));
            }
        }
    }

    /**
     * AllEventsHelperMails::BuildBody()
     *
     * @param mixed $body
     * @param mixed $title
     *
     * @return string
     */
    public static function BuildBody($body, $title)
    {
        $sReturn = '';
        $sReturn .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $sReturn .= '<html>';
        $sReturn .= '   <head>';
        $sReturn .= '      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
        $sReturn .= '      <title>' . $title . '</title>';
        $sReturn .= '      <base href="%SITE_URL%/media/com_allevents/" />';
        $sReturn .= '      <link rel="stylesheet" href="css/mail.css" type="text/css" />';
        $sReturn .= '        <style type="text/css">';
        $sReturn .= '         .qrcode{background:url("{Mails Action=QRCode|Status=Pending|Size=2|Type=base64|Content=EVENT_TITLE#EVENT_DATE#EVENT_ENDDATE#USER_NAME#EVENT_URL}") no-repeat center center #f1f6fa;min-height:141px;min-width:141px;padding:10px 10px 10px 30px;display:inline-block;border:1px solid #b4cee2;}';
        $sReturn .= '      </style>';
        $sReturn .= '   </head>';
        $sReturn .= '   <body>';
        $sReturn .= $body;
        $sReturn .= '   </body>';
        $sReturn .= '</html>';

        return $sReturn;
    }

    /**
     * AllEventsHelperMails::MergeBody()
     *
     * @param mixed $body
     * @param mixed $data
     * @param int $userid
     * @param string $origin
     *
     * @return mixed|string
     * @throws Exception
     */
    public static function MergeBody($body, $data, $userid = 0, $origin = 'site')
    {
        $app = JFactory::getApplication();
        $header = self::get_header();
        $sReturn = $header . $body;
        $params = AllEventsHelperParam::getGlobalParam();
        $arr = [];
        // $user = JFactory::getUser();
        if ($origin == 'admin') {
            $user = JFactory::getUser($userid);
        } else {
            $user = JFactory::getUser();
        }

        $style = 'display:inline !important;hidden:false !important;visibility:visible !important;clear:both !important;padding-top:10px !important;font-family:verdana, sans-serif !important;font-size:xx-small !important;';
        $img = '<span class="icon-8-sprite icon-8 icon-8-poweredby" style="' . $style . '"></span>';
        // Surcharge avec les valeurs par defaut
        $db = JFactory::getDbo();

        $data['activity_title'] = '';
        if (isset($data['activity_id']) && is_numeric($data['activity_id'])) {
            $db->setQuery("SELECT max(`titre`) titre FROM `#__allevents_activities` WHERE `id`=" . $data['activity_id']);
            $loaddb = $db->loadObjectList();
            foreach ($loaddb as $row) {
                $data['activity_title'] = $row->titre;
            }
        }

        $data['agenda_title'] = '';
        if (isset($data['agenda_id']) && is_numeric($data['agenda_id'])) {
            $db->setQuery("SELECT max(`titre`) titre FROM `#__allevents_agenda` WHERE `id`=" . $data['agenda_id']);
            $loaddb = $db->loadObjectList();
            foreach ($loaddb as $row) {
                $data['agenda_title'] = $row->titre;
            }
        }

        $data['category_title'] = '';
        if (isset($data['category_id']) && is_numeric($data['category_id'])) {
            $db->setQuery("SELECT max(`titre`) titre FROM `#__allevents_categories` WHERE `id`=" . $data['category_id']);
            $loaddb = $db->loadObjectList();
            foreach ($loaddb as $row) {
                $data['category_title'] = $row->titre;
            }
        }

        $data['place_title'] = '';
        if (isset($data['place_id']) && is_numeric($data['place_id'])) {
            $db->setQuery("SELECT max(`titre`) titre FROM `#__allevents_places` WHERE `id`=" . $data['place_id']);
            $loaddb = $db->loadObjectList();
            foreach ($loaddb as $row) {
                $data['place_title'] = $row->titre;
            }
        }

        $data['public_title'] = '';
        if (isset($data['public_id']) && is_numeric($data['public_id'])) {
            $db->setQuery("SELECT max(`titre`) titre FROM `#__allevents_public` WHERE `id`=" . $data['public_id']);
            $loaddb = $db->loadObjectList();
            foreach ($loaddb as $row) {
                $data['public_title'] = $row->titre;
            }
        }

        $data['ressource_title'] = '';
        if (isset($data['ressource_id']) && is_numeric($data['ressource_id'])) {
            $db->setQuery("SELECT max(`titre`) titre FROM `#__allevents_ressources` WHERE `id`=" . $data['ressource_id']);
            $loaddb = $db->loadObjectList();
            foreach ($loaddb as $row) {
                $data['ressource_title'] = $row->titre;
            }
        }

        $data['section_title'] = '';
        if (isset($data['section_id']) && is_numeric($data['section_id'])) {
            $db->setQuery("SELECT max(`titre`) titre FROM `#__allevents_sections` WHERE `id`=" . $data['section_id']);
            $loaddb = $db->loadObjectList();
            foreach ($loaddb as $row) {
                $data['section_title'] = $row->titre;
            }
        }

        $date = DateTime::createFromFormat($params['gdate_format'], $data['date']);
        if (!isset($date) || ($date == '')) {
            $date = DateTime::createFromFormat($params['gdatetime_format'], $data['date']);
        }
        if (!isset($date) || ($date == '')) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $data['date']);
        }

        $enddate = DateTime::createFromFormat($params['gdate_format'], $data['enddate']);
        if (!isset($enddate) || ($enddate == '')) {
            $enddate = DateTime::createFromFormat($params['gdatetime_format'], $data['enddate']);
        }
        if (!isset($enddate) || ($enddate == '')) {
            $enddate = DateTime::createFromFormat('Y-m-d H:i:s', $data['enddate']);
        }

        if ($data['allday']) {
            $arr['EVENT_DATE'] = (isset($date) && ($date <> '')) ? JHtml::date($date->format('Y-m-d H:i:s'), $params['gdate_format']) : $data['date'] . '(+ ' . JFactory::getConfig()->get('offset') . ')';
            $arr['EVENT_ENDDATE'] = (isset($enddate) && ($enddate <> '')) ? JHtml::date($enddate->format('Y-m-d H:i:s'), $params['gdate_format']) : $data['enddate'] . '(+ ' . JFactory::getConfig()->get('offset') . ')';
        } else {
            $arr['EVENT_DATE'] = (isset($date) && ($date <> '')) ? JHtml::date($date->format('Y-m-d H:i:s'), $params['gdatetime_format']) : $data['date'] . '(+ ' . JFactory::getConfig()->get('offset') . ')';
            $arr['EVENT_ENDDATE'] = (isset($enddate) && ($enddate <> '')) ? JHtml::date($enddate->format('Y-m-d H:i:s'), $params['gdatetime_format']) : $data['enddate'] . '(+ ' . JFactory::getConfig()->get('offset') . ')';
        }

        $arr['ENROL_USERALIAS'] = $user->get('username');
        $arr['ENROL_USERNAME'] = $user->get('name');
        $arr['EVENT_ACTIVITY'] = $data['activity_title'];
        $arr['EVENT_AGENDA'] = $data['agenda_title'];
        $arr['EVENT_CATEGORY'] = $data['category_title'];
        $arr['EVENT_DESC'] = $data['description'];
        $arr['EVENT_ID'] = $data['id'];
        $arr['EVENT_LINK'] = AllEventsHelperRoute::getEventRoute($data['id'], $data['alias']);
        $arr['EVENT_PLACE'] = $data['place_title'];
        $arr['EVENT_PUBLIC'] = $data['public_title'];
        $arr['EVENT_RESSOURCE'] = $data['ressource_title'];
        $arr['EVENT_SECTION'] = $data['section_title'];
        $arr['EVENT_TITLE'] = $data['titre'];
        $arr['EVENT_URL'] = $arr['EVENT_LINK'];
        $arr['POWERED_BY'] = "\n<div style='" . $style . "'>\n" . $img . "&#160;" . "<a href='https://www.allevents3.com/' title='" . str_replace("'", "&#145;", JText::_('COM_ALLEVENTS')) . "' target='_blank'>" . sprintf(JText::_('POWERED_BY'), 'AllEvents') . "</a>&#160;" . $img . "\n</div>\n";
        $arr['SITE_NAME'] = JHtml::link(trim(JUri::root(false), '/'), $app->get('sitename'));
        $arr['SITE_URL'] = trim(JUri::root(false), '/');
        $arr['SITE_WEBMASTER'] = $app->get('mailfrom');
        if (!empty($data['contact_id'])) {
            $arr['EVENT_CONTACT'] = JFactory::getUser($data['contact_id'])->name;
        }
        $event_contact1 = AllEventsContactFactory::getEventContactInstance($data['contact_1_type'], $data['contact_1_label'], $data['contact_1_id'], $data['contact_1_details_id'], $data['contact_1_comprofiler_id'], $data['contact_1_access']);
        if (isset($event_contact1)) {
            $arr['EVENT_CONTACT1'] = $event_contact1['name'];
        }
        $event_contact2 = AllEventsContactFactory::getEventContactInstance($data['contact_2_type'], $data['contact_2_label'], $data['contact_2_id'], $data['contact_2_details_id'], $data['contact_2_comprofiler_id'], $data['contact_2_access']);
        if (isset($event_contact2)) {
            $arr['EVENT_CONTACT2'] = $event_contact2['name'];
        }
        $event_contact3 = AllEventsContactFactory::getEventContactInstance($data['contact_3_type'], $data['contact_3_label'], $data['contact_3_id'], $data['contact_3_details_id'], $data['contact_3_comprofiler_id'], $data['contact_3_access']);
        if (isset($event_contact3)) {
            $arr['EVENT_CONTACT3'] = $event_contact3['name'];
        }
        // Localisation des mails : utilisation des textes issus des fichiers de langue de AllEvents
        $arrText = [];
        $arrText[] = 'COM_ALLEVENTS_ADDITIONAL_INFO';
        $arrText[] = 'COM_ALLEVENTS_MAIL_CONTACT_US';
        $arrText[] = 'COM_ALLEVENTS_MAIL_CANCEL_TITLE';
        $arrText[] = 'COM_ALLEVENTS_MAIL_CANCEL_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_CANCEL_SHORT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROL_APPROVED_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROL_CONFIRMED_SHORT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROL_PENDING_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROL_PENDING_TITLE';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROL_PENDING_SHORT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROL_TITLE';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROL_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROLMENT_CODE';
        $arrText[] = 'COM_ALLEVENTS_MAIL_STAY_INFORMED';
        $arrText[] = 'COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING';
        $arrText[] = 'COM_ALLEVENTS_MAIL_TALK_ABOUT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_UNCERTAIN_ENROL_TITLE';
        $arrText[] = 'COM_ALLEVENTS_MAIL_UNCERTAIN_ENROL_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_UNCERTAIN_ENROL_SHORT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_WAITING_ENROL_TITLE';
        $arrText[] = 'COM_ALLEVENTS_MAIL_WAITING_ENROL_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_WAITING_ENROL_SHORT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_ENROL_APPROVED_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_PROPOSAL_TITLE';
        $arrText[] = 'COM_ALLEVENTS_MAIL_PROPOSAL_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_PROPOSAL_TEXT_SHORT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_PROPOSAL_APPROVED_TEXT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_PROPOSAL_APPROVED_SHORT';
        $arrText[] = 'COM_ALLEVENTS_MAIL_PROPOSAL_HASBEENAPPROVED';
        $arrText[] = 'ACTIVITY';
        $arrText[] = 'AGENDA';
        $arrText[] = 'CATEGORY';
        $arrText[] = 'CONTACT_PERSON';
        $arrText[] = 'DATE';
        $arrText[] = 'DESCRIPTION';
        $arrText[] = 'ENDDATE';
        $arrText[] = 'EVENT_INFO';
        $arrText[] = 'LINK_URL';
        $arrText[] = 'PARTICIPANT';
        $arrText[] = 'PLACE';
        $arrText[] = 'PUBLIC';
        $arrText[] = 'SECTION';
        $arrText[] = 'TITLE';
        // Remplace les textes par leur équivalent dans la langue de l'utilisateur
        foreach ($arrText as $key => $value) {
            $sReturn = str_replace('[' . $value . ']', JText::_($value), $sReturn);
        }
        // Remplace les valeurs (comme p.e. le titre de l'évènement) par sa valeur
        foreach ($arr as $key => $value) {
            $sReturn = str_replace('[' . $key . ']', $value, $sReturn);
        }
        // Analyse le texte du mail et cherche les occurences des conditions <!--AE_IF -->
        // Par exemple : "<!--AE_IF [EVENT_AGENDA]--><li>[AGENDA] : [EVENT_AGENDA]</li><!--AE_IF-->"
        $sReturn = preg_replace('/<!--AE_IF -->.*<!--AE_IF-->/', '', $sReturn);

        $sReturn = str_replace('&quot;', '"', str_replace('&gt;', '>', str_replace('&lt;', '<', $sReturn)));

        return $sReturn;
    }

    /**
     * AllEventsHelperMails::get_header()
     *
     * @return string
     */
    protected static function get_header()
    {
        $header = '';
        $header .= '<head>';
        $header .= '    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
        $header .= '    <title>[EVENT_TITLE]</title>';
        $header .= '    <base href="[SITE_URL]/media/com_allevents/" />';
        $header .= '    <link rel="stylesheet" href="css/mail.css" type="text/css" />';
        $header .= '    <style type="text/css">';
        $header .= '        .qrcode{background:url("{Mails Action=QRCode|Status=Pending|Size=2|Type=base64|Content=EVENT_TITLE#EVENT_DATE#EVENT_ENDDATE#USER_NAME#EVENT_URL}") no-repeat center center #f1f6fa;min-height:141px;min-width:141px;padding:10px 10px 10px 30px;display:inline-block;border:1px solid #b4cee2;}';
        $header .= '    </style>';
        $header .= '</head>';

        return ($header);
    }

    /**
     * AllEventsHelperMails::SendMailEnrolmentPending()
     *
     * @param mixed $data
     * @param integer $userid
     * @param string $type
     */
    public static function SendMailEnrolmentPending($data, $userid = 0, $type = 'site')
    {
        self::SendMailEnrolment($data, 3);
    }

    /**
     * AllEventsHelperMails::SendMailEnrolmentWaiting()
     *
     * @param mixed $data
     * @param integer $userid
     * @param string $type
     */
    public static function SendMailEnrolmentWaiting($data, $userid = 0, $type = 'site')
    {
        self::SendMailEnrolment($data, 5);
    }

    /**
     * AllEventsHelperMails::SendMailProposition_hasbeenapproved()
     *
     * @param mixed $data
     * @param string $origin
     *
     * @throws Exception
     */
    public static function SendMailProposition_hasbeenapproved($data, $origin = 'site')
    {
        $app = JFactory::getApplication();

        $config = JFactory::getConfig();
        $mailer = JFactory::getMailer();
        $params = AllEventsHelperParam::getGlobalParam();

        if ($params['gmail_on']) {
            // Set sender array so that my name will show up neatly in your inbox
            $sender = [$config->get('mailfrom'), $config->get('fromname')];
            $mailer->setSender($sender);
            if ($params['gmail_authorupd']) {
                // Add a recipient -- this can be a single address (string) or an array of addresses
                if (!empty($data['contact_email'])) {
                    $recipient[] = $data['contact_email'];
                }

                if (!empty($data['proposed_email'])) {
                    $recipient[] = $data['proposed_email'];
                }
                $user = JFactory::getUser();
                $recipient[] = $user->email;
            }
            // si le user de contact = user de création, un seul mail
            if (!empty($recipient)) {
                $recipient = array_unique($recipient);
                $mailer->addRecipient($recipient);
            }

            // mode user
            if (($params['gmail_by'] == 1)) {
                if ($params['gmail_agendaupd']) {
                    if (!empty($data['agenda_contact_email'])) {
                        // soit le contact défini au niveau de l'agenda
                        $cc[] = $data['agenda_contact_email'];
                    }
                }

                if ($params['gmail_adminupd']) {
                    $user = JFactory::getUser($params['defaultuser']);
                    if (!empty($user->email)) {
                        $cc[] = $user->email;
                    }
                }

                // si le user de contact = user de création, un seul mail
                if (!empty($cc)) {
                    $cc = array_unique($cc);
                    $mailer->addCc($cc);
                }
            }
            $db = JFactory::getDbo();
            // mode groupe
            if (($params['gmail_by'] == 0) && ($app->get('massmailoff', 0) == 1)) {
                $access = new JAccess;
                // Get users in the group out of the ACL
                $to = [];
                foreach ($params['gmail_usergroupupd'] as $group) {
                    $to = array_merge($to, $access->getUsersByGroup($group, $params['gmail_recurse']));
                }

                if (!empty($to)) {
                    // Get all users email and group except for senders
                    $query = $db->getQuery(true)->select('email')->from('#__users')->where('id != ' . (int)JFactory::getUser()->get('id'));
                    $query->where('id IN (' . implode(',', $to) . ')');
                } else {
                    $query = $db->getQuery(true)->select('email')->from('#__users')->where('id = ' . (int)JFactory::getUser()->get('id'));
                }
                $db->setQuery($query);
                $rows = $db->loadColumn();

                if (!empty($rows)) {
                    if ($params['gmail_bcc']) {
                        $mailer->addBcc($rows);
                        $mailer->addRecipient($config->get('config.mailfrom'));
                    } else {
                        $mailer->addRecipient($rows);
                    }
                }
            }

            $Subject = '[EVENT_TITLE]';
            $Subject = str_replace('[EVENT_TITLE]', $data['titre'], $Subject);
            $date = DateTime::createFromFormat($params['gdate_format'], $data['date']);
            if (!isset($date) || ($date == '')) {
                $date = DateTime::createFromFormat($params['gdatetime_format'], $data['date']);
            }
            if (!isset($date) || ($date == '')) {
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $data['date']);
            }
            $enddate = DateTime::createFromFormat($params['gdate_format'], $data['enddate']);
            if (!isset($enddate) || ($enddate == '')) {
                $enddate = DateTime::createFromFormat($params['gdatetime_format'], $data['enddate']);
            }
            if (!isset($enddate) || ($enddate == '')) {
                $enddate = DateTime::createFromFormat('Y-m-d H:i:s', $data['enddate']);
            }

            $Subject = str_replace('[EVENT_DATE]', JHtml::date($date->format('Y-m-d H:i:s'), $params['gdate_format']), $Subject);
            $Subject = str_replace('[EVENT_ENDDATE]', JHtml::date($enddate->format('Y-m-d H:i:s'), $params['gdate_format']), $Subject);
            $mailer->setSubject($Subject);

            $body = self::BuildBody($params['gmail_proposition_hasbeenapproved'], $params['gmail_title']);
            $body = self::MergeBody($body, $data, 0, 'admin');
            $mailer->setBody($body);
            $mailer->isHtml(true);
            $mailer->Encoding = 'base64';
            // Optional file attached
            // $mailer->addAttachment(JPATH_COMPONENT.'/assets/document.pdf');
            // Optionally add embedded image
            // $mailer->AddEmbeddedImage( JPATH_COMPONENT.'/assets/logo128.jpg', 'logo_id', 'logo.jpg', 'base64', 'image/jpeg' );
            // Send once you have set all of your options
            $send = $mailer->Send();
            if ($send !== true) {
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_NOTSENT') . ':' . $send, 'error');
            } else {
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_SENT'));
            }
        }
    }

    /**
     * AllEventsHelperMails::SendMailProposition()
     *
     * @param mixed $data
     * @param string $origin
     *
     * @throws Exception
     */
    public static function SendMailProposition($data, $origin = 'site')
    {
        $app = JFactory::getApplication();
        $config = JFactory::getConfig();
        $mailer = JFactory::getMailer();
        $params = AllEventsHelperParam::getGlobalParam();

        if ($params['gmail_on']) {
            if ($data['proposal'] == 1) {
                $body = self::BuildBody($params['gmail_proposition'], $params['gmail_title']);
            } else {
                $body = self::BuildBody($params['gmail_proposition_approved'], $params['gmail_title']);
            }
            // Set sender array so that my name will show up neatly in your inbox
            $sender = [$config->get('mailfrom'), $config->get('fromname')];
            $mailer->setSender($sender);
            // Add a recipient -- this can be a single address (string) or an array of addresses
            if ($params['gmail_authornew']) {
                if (!empty($data['contact_email'])) {
                    $recipient[] = $data['contact_email'];
                }

                if (!empty($data['proposed_email'])) {
                    $recipient[] = $data['proposed_email'];
                }
                $user = JFactory::getUser();
                $recipient[] = $user->email;
            }

            // si le user de contact = user de création, un seul mail
            if (!empty($recipient)) {
                $recipient = array_unique($recipient);
                $mailer->addRecipient($recipient);
            }

            // mode groupe
            if (($params['gmail_by'] == 1)) {
                // Add a CC -- this can be a single address (string) or an array of addresses
                if ($params['gmail_agendanew']) {
                    if (isset($data['agenda_contact_email']) && ($data['agenda_contact_email'] != "")) {
                        // soit le contact défini au niveau de l'agenda
                        if (!empty($data['agenda_contact_email'])) {
                            $cc[] = $data['agenda_contact_email'];
                        }
                    }
                }

                if ($params['gmail_adminnew']) {
                    $useradmin = JFactory::getUser($params['defaultuser']);
                    if (!empty($useradmin->email)) {
                        $cc[] = $useradmin->email;
                    }
                }

                if (!empty($cc)) {
                    // si le user de contact = user de création, un seul mail
                    $cc = array_unique($cc);
                    $mailer->addCc($cc);
                }
            }
            $db = JFactory::getDbo();
            // mode groupe
            if (($params['gmail_by'] == 0) && ($app->get('massmailoff', 0) == 1)) {
                $access = new JAccess;
                $to = [];
                foreach ($params['gmail_usergroupnew'] as $group) {
                    $to = array_merge($to, $access->getUsersByGroup($group, $params['gmail_recurse']));
                }

                if (!empty($to)) {
                    // Get all users email and group except for senders
                    $query = $db->getQuery(true)->select('email')->from('#__users')->where('id != ' . (int)JFactory::getUser()->get('id'));
                    $query->where('id IN (' . implode(',', $to) . ')');
                } else {
                    $query = $db->getQuery(true)->select('email')->from('#__users')->where('id = ' . (int)JFactory::getUser()->get('id'));
                }
                $db->setQuery($query);
                $rows = $db->loadColumn();

                if (!empty($rows)) {
                    if ($params['gmail_bcc']) {
                        $mailer->addBcc($rows);
                        $mailer->addRecipient($config->get('config.mailfrom'));
                    } else {
                        $mailer->addRecipient($rows);
                    }
                }
            }

            $Subject = JText::_('COM_ALLEVENTS_MAIL_PROPOSAL_SUBJECT');
            $Subject = str_replace('[EVENT_TITLE]', $data['titre'], $Subject);
            $date = DateTime::createFromFormat($params['gdate_format'], $data['date']);
            if (!isset($date) || ($date == '')) {
                $date = DateTime::createFromFormat($params['gdatetime_format'], $data['date']);
            }
            if (!isset($date) || ($date == '')) {
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $data['date']);
            }
            $enddate = DateTime::createFromFormat($params['gdate_format'], $data['enddate']);
            if (!isset($enddate) || ($enddate == '')) {
                $enddate = DateTime::createFromFormat($params['gdatetime_format'], $data['enddate']);
            }
            if (!isset($enddate) || ($enddate == '')) {
                $enddate = DateTime::createFromFormat('Y-m-d H:i:s', $data['enddate']);
            }

            $Subject = str_replace('[EVENT_DATE]', JHtml::date($date->format('Y-m-d H:i:s'), $params['gdate_format']), $Subject);
            $Subject = str_replace('[EVENT_ENDDATE]', JHtml::date($enddate->format('Y-m-d H:i:s'), $params['gdate_format']), $Subject);
            $mailer->setSubject($Subject);

            $body = self::MergeBody($body, $data);

            $mailer->setBody($body);
            $mailer->isHtml(true);
            $mailer->Encoding = 'base64';
            // Optional file attached
            // $mailer->addAttachment(JPATH_COMPONENT.'/assets/document.pdf');
            // Optionally add embedded image
            // $mailer->AddEmbeddedImage( JPATH_COMPONENT.'/assets/logo128.jpg', 'logo_id', 'logo.jpg', 'base64', 'image/jpeg' );
            // Send once you have set all of your options
            $send = $mailer->Send();
            if ($send !== true) {
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_NOTSENT') . ':' . $send, 'error');
            } else {
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_SENT'));
            }
        }
    }
}
