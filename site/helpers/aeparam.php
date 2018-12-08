<?php

defined('_JEXEC') or die;

/**
 * AllEventsHelperParam
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelperParam
{
    /**
     * AllEventsHelperParam::getGlobalParam()
     *
     * @return \Joomla\Registry\Registry
     * @throws Exception
     */
    public static function getGlobalParam()
    {
        $app = JFactory::getApplication();
        if ($app->isSite()) {
            $app = JFactory::getApplication();
            $params = $app->getParams('com_allevents');
        } else {
            $params = JComponentHelper::getParams('com_allevents');
        }

        $params['gforcenomenuitem'] = isset($params['gforcenomenuitem']) ? $params['gforcenomenuitem'] : 0;
        $params['controlpanel_organizersare'] = isset($params['controlpanel_organizersare']) ? $params['controlpanel_organizersare'] : 1;
        $params['controlpanel_showactivities'] = isset($params['controlpanel_showactivities']) ? $params['controlpanel_showactivities'] : 1;
        $params['controlpanel_showagendas'] = isset($params['controlpanel_showagendas']) ? $params['controlpanel_showagendas'] : 1;
        $params['controlpanel_showcategories'] = isset($params['controlpanel_showcategories']) ? $params['controlpanel_showcategories'] : 1;
        $params['controlpanel_showcustomfields'] = isset($params['controlpanel_showcustomfields']) ? $params['controlpanel_showcustomfields'] : 1;
        $params['controlpanel_showgcalendars'] = isset($params['controlpanel_showgcalendars']) ? $params['controlpanel_showgcalendars'] : 1;
        $params['controlpanel_showimport'] = isset($params['controlpanel_showimport']) ? $params['controlpanel_showimport'] : 1;
        $params['controlpanel_showplaces'] = isset($params['controlpanel_showplaces']) ? $params['controlpanel_showplaces'] : 1;
        $params['controlpanel_showplanifications'] = isset($params['controlpanel_showplanifications']) ? $params['controlpanel_showplanifications'] : 0;
        $params['controlpanel_showpublics'] = isset($params['controlpanel_showpublics']) ? $params['controlpanel_showpublics'] : 1;
        $params['controlpanel_showressources'] = isset($params['controlpanel_showressources']) ? $params['controlpanel_showressources'] : 1;
        $params['controlpanel_showribbons'] = isset($params['controlpanel_showribbons']) ? $params['controlpanel_showribbons'] : 0;
        $params['controlpanel_showrssfeed'] = isset($params['controlpanel_showrssfeed']) ? $params['controlpanel_showrssfeed'] : 1;
        $params['controlpanel_showsections'] = isset($params['controlpanel_showsections']) ? $params['controlpanel_showsections'] : 1;
        $params['gaebs_bullet'] = isset($params['gaebs_bullet']) ? $params['gaebs_bullet'] : "bullet";
        $params['gcontrol_eventwithenrolments'] = isset($params['gcontrol_eventwithenrolments']) ? $params['gcontrol_eventwithenrolments'] : 1;
        $params['gdate_format'] = isset($params['gdate_format']) ? $params['gdate_format'] : "Y-m-d";
        $params['gdisplay_colors'] = isset($params['gdisplay_colors']) ? $params['gdisplay_colors'] : 0;
        $params['gdisplay_colors_back'] = isset($params['gdisplay_colors_back']) ? $params['gdisplay_colors_back'] : 0;
        $params['gdisplay_colors_fore'] = isset($params['gdisplay_colors_fore']) ? $params['gdisplay_colors_fore'] : 1;
        $params['genrol_on'] = isset($params['genrol_on']) ? $params['genrol_on'] : 0;
        $params['geventshow_activity'] = isset($params['geventshow_activity']) ? $params['geventshow_activity'] : 1;
        $params['geventshow_additional_info'] = isset($params['geventshow_additional_info']) ? $params['geventshow_additional_info'] : 0;
        $params['geventshow_affiche'] = isset($params['geventshow_affiche']) ? $params['geventshow_affiche'] : 1;
        $params['geventshow_agenda'] = isset($params['geventshow_agenda']) ? $params['geventshow_agenda'] : 1;
        $params['geventshow_author'] = isset($params['geventshow_author']) ? $params['geventshow_author'] : 1;
        $params['geventshow_buttongoogleevent'] = isset($params['geventshow_buttongoogleevent']) ? $params['geventshow_buttongoogleevent'] : 1;
        $params['geventshow_buttonics'] = isset($params['geventshow_buttonics']) ? $params['geventshow_buttonics'] : 1;
        $params['geventshow_buttonmail'] = isset($params['geventshow_buttonmail']) ? $params['geventshow_buttonmail'] : 1;
        $params['geventshow_buttonprint'] = isset($params['geventshow_buttonprint']) ? $params['geventshow_buttonprint'] : 1;
        $params['geventshow_category'] = isset($params['geventshow_category']) ? $params['geventshow_category'] : 1;
        $params['geventshow_closebutton'] = isset($params['geventshow_closebutton']) ? $params['geventshow_closebutton'] : 1;
        $params['geventshow_comments'] = isset($params['geventshow_comments']) ? $params['geventshow_comments'] : 1;
        $params['geventshow_description'] = isset($params['geventshow_description']) ? $params['geventshow_description'] : 1;
        $params['geventshow_enddate'] = isset($params['geventshow_enddate']) ? $params['geventshow_enddate'] : 1;
        $params['geventshow_enrolmentbloc'] = isset($params['geventshow_enrolmentbloc']) ? $params['geventshow_enrolmentbloc'] : 1;
        $params['geventshow_enrolmentdisplay'] = isset($params['geventshow_enrolmentdisplay']) ? $params['geventshow_enrolmentdisplay'] : 1;
        $params['geventshow_enrolments'] = isset($params['geventshow_enrolments']) ? $params['geventshow_enrolments'] : 1;
        $params['geventshow_enrolno'] = isset($params['geventshow_enrolno']) ? $params['geventshow_enrolno'] : 1;
        $params['geventshow_enrolperhaps'] = isset($params['geventshow_enrolperhaps']) ? $params['geventshow_enrolperhaps'] : 1;
        $params['geventshow_fullmap'] = isset($params['geventshow_fullmap']) ? $params['geventshow_fullmap'] : 0;
        $params['geventshow_fullmapadress'] = isset($params['geventshow_fullmapadress']) ? $params['geventshow_fullmapadress'] : 0;
        $params['geventshow_fullmapgps'] = isset($params['geventshow_fullmapgps']) ? $params['geventshow_fullmapgps'] : 0;
        $params['geventshow_map'] = isset($params['geventshow_map']) ? $params['geventshow_map'] : 1;
        $params['geventshow_organizer'] = isset($params['geventshow_organizer']) ? $params['geventshow_organizer'] : 1;
        $params['geventshow_organizeraddress'] = isset($params['geventshow_organizeraddress']) ? $params['geventshow_organizeraddress'] : 0;
        $params['geventshow_organizerbloc'] = isset($params['geventshow_organizerbloc']) ? $params['geventshow_organizerbloc'] : 1;
        $params['geventshow_organizercountry'] = isset($params['geventshow_organizercountry']) ? $params['geventshow_organizercountry'] : 0;
        $params['geventshow_organizerfax'] = isset($params['geventshow_organizerfax']) ? $params['geventshow_organizerfax'] : 0;
        $params['geventshow_organizerlink'] = isset($params['geventshow_organizerlink']) ? $params['geventshow_organizerlink'] : 1;
        $params['geventshow_organizermail'] = isset($params['geventshow_organizermail']) ? $params['geventshow_organizermail'] : 1;
        $params['geventshow_organizermisc'] = isset($params['geventshow_organizermisc']) ? $params['geventshow_organizermisc'] : 0;
        $params['geventshow_organizermobile'] = isset($params['geventshow_organizermobile']) ? $params['geventshow_organizermobile'] : 0;
        $params['geventshow_organizername'] = isset($params['geventshow_organizername']) ? $params['geventshow_organizername'] : 1;
        $params['geventshow_organizerposition'] = isset($params['geventshow_organizerposition']) ? $params['geventshow_organizerposition'] : 0;
        $params['geventshow_organizerpostalcode'] = isset($params['geventshow_organizerpostalcode']) ? $params['geventshow_organizerpostalcode'] : 0;
        $params['geventshow_organizerstate'] = isset($params['geventshow_organizerstate']) ? $params['geventshow_organizerstate'] : 0;
        $params['geventshow_organizersuburb'] = isset($params['geventshow_organizersuburb']) ? $params['geventshow_organizersuburb'] : 0;
        $params['geventshow_organizertelephone'] = isset($params['geventshow_organizertelephone']) ? $params['geventshow_organizertelephone'] : 0;
        $params['geventshow_organizerwebpage'] = isset($params['geventshow_organizerwebpage']) ? $params['geventshow_organizerwebpage'] : 0;
        $params['geventshow_ribbon'] = isset($params['geventshow_ribbon']) ? $params['geventshow_ribbon'] : 1;
        $params['geventshow_stdribbon'] = isset($params['geventshow_stdribbon']) ? $params['geventshow_stdribbon'] : 1;
        $params['geventshow_title'] = isset($params['geventshow_title']) ? $params['geventshow_title'] : 1;
        $params['geventshow_place'] = isset($params['geventshow_place']) ? $params['geventshow_place'] : 1;
        $params['geventshow_public'] = isset($params['geventshow_public']) ? $params['geventshow_public'] : 1;
        $params['gevent_companions'] = isset($params['gevent_companions']) ? $params['gevent_companions'] : 0;
        $params['geventshow_ressource'] = isset($params['geventshow_ressource']) ? $params['geventshow_ressource'] : 1;
        $params['geventshow_section'] = isset($params['geventshow_section']) ? $params['geventshow_section'] : 1;
        $params['geventshow_vignette'] = isset($params['geventshow_vignette']) ? $params['geventshow_vignette'] : 1;
        $params['gfirstday_week'] = isset($params['gfirstday_week']) ? $params['gfirstday_week'] : 1;
        $params['gjquery'] = isset($params['gjquery']) ? $params['gjquery'] : 1;
        $params['gbootstrap'] = isset($params['gbootstrap']) ? $params['gbootstrap'] : 1;
        $params['guikit'] = isset($params['guikit']) ? $params['guikit'] : 1;
        $params['gcustom_css'] = isset($params['gcustom_css']) ? $params['gcustom_css'] : "";

        $params['gmail_adminnew'] = isset($params['gmail_adminnew']) ? $params['gmail_adminnew'] : 1;
        $params['gmail_adminupd'] = isset($params['gmail_adminupd']) ? $params['gmail_adminupd'] : 1;
        $params['gmail_agendanew'] = isset($params['gmail_agendanew']) ? $params['gmail_agendanew'] : 1;
        $params['gmail_agendaupd'] = isset($params['gmail_agendaupd']) ? $params['gmail_agendaupd'] : 1;
        $params['gmail_authornew'] = isset($params['gmail_authornew']) ? $params['gmail_authornew'] : 1;
        $params['gmail_authorupd'] = isset($params['gmail_authorupd']) ? $params['gmail_authorupd'] : 1;
        $params['gmail_authorvalid'] = isset($params['gmail_authorvalid']) ? $params['gmail_authorvalid'] : 1;
        $params['gmail_authorwait'] = isset($params['gmail_authorwait']) ? $params['gmail_authorwait'] : 1;
        $params['gmail_bcc'] = isset($params['gmail_bcc']) ? $params['gmail_bcc'] : 1;
        $params['gmail_by'] = isset($params['gmail_by']) ? $params['gmail_by'] : 1;
        $params['gmail_on'] = isset($params['gmail_on']) ? $params['gmail_on'] : 1;
        $params['gmail_recurse'] = isset($params['gmail_recurse']) ? $params['gmail_recurse'] : 0;
        $params['gmail_usergroupnew'] = isset($params['gmail_usergroupnew']) ? $params['gmail_usergroupnew'] : 0;
        $params['gmail_usergroupupd'] = isset($params['gmail_usergroupupd']) ? $params['gmail_usergroupupd'] : 0;
        $params['gnewbie'] = isset($params['gnewbie']) ? $params['gnewbie'] : 0;

        $params['gmultipleenrolmentsallow'] = isset($params['gmultipleenrolmentsallow']) ? $params['gmultipleenrolmentsallow'] : 1;
        $params['gmultipleenrolmentsmax'] = isset($params['gmultipleenrolmentsmax']) ? $params['gmultipleenrolmentsmax'] : 10;

        $params['gshow_poweredby'] = isset($params['gshow_poweredby']) ? $params['gshow_poweredby'] : 1;
        $params['gshow_samples'] = isset($params['gshow_samples']) ? $params['gshow_samples'] : 0;
        $params['gtemplateeventform'] = isset($params['gtemplateeventform']) ? $params['gtemplateeventform'] : 'default';
        $params['gtemplateevent'] = isset($params['gtemplateevent']) ? $params['gtemplateevent'] : 'default';
        $params['gtemplatemain'] = isset($params['gtemplatemain']) ? $params['gtemplatemain'] : 'default';
        $params['gtemplateadminevents'] = isset($params['gtemplateadminevents']) ? $params['gtemplateadminevents'] : 'default';
        $params['gadmineventslite'] = isset($params['gadmineventslite']) ? $params['gadmineventslite'] : 0;
        $params['gtime_format'] = isset($params['gtime_format']) ? $params['gtime_format'] : "H:i";
        $params['gtime_step'] = isset($params['gtime_step']) ? $params['gtime_step'] : 30;

        $params['show_agenda'] = isset($params['show_agenda']) ? $params['show_agenda'] : $params['geventshow_agenda'];
        $params['show_activity'] = isset($params['show_activity']) ? $params['show_activity'] : $params['geventshow_activity'];
        $params['show_public'] = isset($params['show_public']) ? $params['show_public'] : $params['geventshow_public'];
        $params['show_section'] = isset($params['show_section']) ? $params['show_section'] : $params['geventshow_section'];
        $params['show_category'] = isset($params['show_category']) ? $params['show_category'] : $params['geventshow_category'];
        $params['show_place'] = isset($params['show_place']) ? $params['show_place'] : $params['geventshow_place'];
        $params['show_ressource'] = isset($params['show_ressource']) ? $params['show_ressource'] : $params['geventshow_ressource'];
        $params['show_date'] = isset($params['show_date']) ? $params['show_date'] : 1;
        $params['show_enddate'] = isset($params['show_enddate']) ? $params['show_enddate'] : $params['geventshow_enddate'];
        $params['addcurrency'] = isset($params['addcurrency']) ? $params['addcurrency'] : 'EUR';
        $params['order_format'] = isset($params['order_format']) ? $params['order_format'] : 'AE-%05d';

        $params['gdisplay_openlinkself'] = isset($params['gdisplay_openlinkself']) ? $params['gdisplay_openlinkself'] : '_blank';
        $params['gmail_title'] = isset($params['gmail_title']) ? $params['gmail_title'] : '[EVENT_TITLE]';
        $params['gmail_enrolment_no'] = isset($params['gmail_enrolment_no']) ? $params['gmail_enrolment_no'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_CANCEL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_CANCEL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p></td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_enrolment_ok'] = isset($params['gmail_enrolment_ok']) ? $params['gmail_enrolment_ok'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_ENROL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_ENROL_APPROVED_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_enrolment_pending'] = isset($params['gmail_enrolment_pending']) ? $params['gmail_enrolment_pending'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_ENROL_PENDING_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_ENROL_PENDING_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_enrolment_perhaps'] = isset($params['gmail_enrolment_perhaps']) ? $params['gmail_enrolment_perhaps'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_UNCERTAIN_ENROL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_UNCERTAIN_ENROL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul></td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_enrolment_waiting'] = isset($params['gmail_enrolment_waiting']) ? $params['gmail_enrolment_waiting'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_WAITING_ENROL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_WAITING_ENROL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_enrolment_yes'] = isset($params['gmail_enrolment_yes']) ? $params['gmail_enrolment_yes'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_ENROL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_ENROL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_event_updated'] = isset($params['gmail_event_updated']) ? $params['gmail_event_updated'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"> <td> <p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"> <td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_PROPOSAL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_PROPOSAL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/> </p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/> </p></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a> </p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_proposition'] = isset($params['gmail_proposition']) ? $params['gmail_proposition'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"> <td> <p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"> <td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_PROPOSAL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_PROPOSAL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/> </p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/> </p></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a> </p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_proposition_approved'] = isset($params['gmail_proposition_approved']) ? $params['gmail_proposition_approved'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_PROPOSAL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_PROPOSAL_APPROVED_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        $params['gmail_proposition_hasbeenapproved'] = isset($params['gmail_proposition_hasbeenapproved']) ? $params['gmail_proposition_hasbeenapproved'] :
            '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_PROPOSAL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_PROPOSAL_HASBEENAPPROVED]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';

        if ($params['gdate_format'] == 'CUSTOM') {
            $params['gdate_format'] = JText::_('COM_ALLEVENTS_CUSTOM_DATE_FORMAT');
        }
        if (empty($params['evts_table_height'])) {
            $params['evts_table_height'] = 500;
        }

        $healthy = ["Y", "m", "d", "H", "i", "A", "g"];
        $AEFC = ["yyyy", "MM", "dd", "HH", "mm", "A", "hh"];
        $AE = ["yyyy", "MM", "dd", "HH", "mm", "tt", "hh"];
        $nulltime = ["", "", "", "00", "00", "AM", "00"];
        $technicalAE = ["%Y", "%m", "%d", "%H", "%M", "%p", "%I"];
        $moment = ["YYYY", "MM", "DD", "HH", "mm", "A", "hh"];

        $params['gdatetime_format'] = $params['gdate_format'] . ' ' . $params['gtime_format'];
        $params['gtime_formatAEFC'] = str_replace($healthy, $AEFC, $params['gtime_format']);
        $params['gdate_formatAEFC'] = str_replace($healthy, $AEFC, $params['gdate_format']);
        $params['gtime_formatmoment'] = str_replace($healthy, $moment, $params['gtime_format']);
        $params['gdate_formatmoment'] = str_replace($healthy, $moment, $params['gdate_format']);
        $params['gtime_formatAE'] = str_replace($healthy, $AE, $params['gtime_format']);
        $params['gdate_formatAE'] = str_replace($healthy, $AE, $params['gdate_format']);
        $params['gdatetime_formatAE'] = $params['gdate_formatAE'] . ' ' . $params['gtime_formatAE'];
        $params['gtime_technicalformatAE'] = str_replace($healthy, $technicalAE, $params['gtime_format']);
        $params['gdate_technicalformatAE'] = str_replace($healthy, $technicalAE, $params['gdate_format']);
        $params['gdatetime_technicalformatAE'] = $params['gdate_technicalformatAE'] . ' ' . $params['gtime_technicalformatAE'];
        $params['gtime_null'] = str_replace($healthy, $nulltime, $params['gtime_format']);

        $params['arrMonthNamesShort'] = [
            JText::_('JANUARY_SHORT', true),
            JText::_('FEBRUARY_SHORT', true),
            JText::_('MARCH_SHORT', true),
            JText::_('APRIL_SHORT', true),
            JText::_('MAY_SHORT', true),
            JText::_('JUNE_SHORT', true),
            JText::_('JULY_SHORT', true),
            JText::_('AUGUST_SHORT', true),
            JText::_('SEPTEMBER_SHORT', true),
            JText::_('OCTOBER_SHORT', true),
            JText::_('NOVEMBER_SHORT', true),
            JText::_('DECEMBER_SHORT', true)];

        $params['arrmonthNames'] = [
            JText::_('JANUARY', true),
            JText::_('FEBRUARY', true),
            JText::_('MARCH', true),
            JText::_('APRIL', true),
            JText::_('MAY', true),
            JText::_('JUNE', true),
            JText::_('JULY', true),
            JText::_('AUGUST', true),
            JText::_('SEPTEMBER', true),
            JText::_('OCTOBER', true),
            JText::_('NOVEMBER', true),
            JText::_('DECEMBER', true)];

        $params['monthNames'] = "'" . JText::_('JANUARY', true) . "', '" . JText::_('FEBRUARY', true) . "', '" . JText::_('MARCH', true) . "', '" . JText::_('APRIL', true) . "'," . "'" . JText::_('MAY', true) . "', '" . JText::_('JUNE', true) . "', '" . JText::_('JULY', true) . "', '" . JText::_('AUGUST', true) . "'," . "'" . JText::_('SEPTEMBER', true) . "', '" . JText::_('OCTOBER', true) . "','" . JText::_('NOVEMBER', true) . "', '" . JText::_('DECEMBER', true) . "'";
        $params['dayNamesShort'] = "'" . JText::_('SUN', true) . "', '" . JText::_('MON', true) . "','" . JText::_('TUE', true) . "', '" . JText::_('WED', true) . "', '" . JText::_('THU', true) . "', '" . JText::_('FRI', true) . "', '" . JText::_('SAT', true) . "'";
        $params['monthNamesShort'] = "'" . JText::_('JANUARY_SHORT', true) . "','" . JText::_('FEBRUARY_SHORT', true) . "','" . JText::_('MARCH_SHORT', true) . "','" . JText::_('APRIL_SHORT', true) . "','" . JText::_('MAY_SHORT', true) . "','" . JText::_('JUNE_SHORT', true) . "','" . JText::_('JULY_SHORT', true) . "','" . JText::_('AUGUST_SHORT', true) . "','" . JText::_('SEPTEMBER_SHORT', true) . "','" . JText::_('OCTOBER_SHORT', true) . "','" . JText::_('NOVEMBER_SHORT', true) . "','" . JText::_('DECEMBER_SHORT', true) . "'";
        $params['dayNames'] = "'" . JText::_('SUNDAY', true) . "','" . JText::_('MONDAY', true) . "','" . JText::_('TUESDAY', true) . "','" . JText::_('WEDNESDAY', true) . "','" . JText::_('THURSDAY', true) . "','" . JText::_('FRIDAY', true) . "','" . JText::_('SATURDAY', true) . "'";

        return $params;
    }
}
