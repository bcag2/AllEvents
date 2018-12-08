<?php
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file');

use CBLib\AhaWow\Access;
use CBLib\Application\Application;

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base() . 'components/com_comprofiler/plugin/templates/default/bootstrap.css');

/**
 * plgAlleventsCBUsers
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsCBUsers extends JPlugin
{
    /**
     * plgAlleventsCBUsers::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        JPlugin::loadLanguage('plg_allevents_cbusers', JPATH_ADMINISTRATOR);
    }

    /**
     * plgAlleventsCBUsers::onAlleventsGetCBTypes()
     *
     * @return void
     */
    public function onAlleventsGetCBTypes()
    {
        $component = 'com_comprofiler';
        $component_enabled = JComponentHelper::isInstalled($component) && JComponentHelper::isEnabled($component);
        if ($component_enabled) {
            // Initialize CB framework
            global $_PLUGINS, $_CB_framework;
            include_once JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php';
            cbimport('cb.plugins');
            if ($_CB_framework->getUi() == 1) {
                cbimport('language.front');
            } else {
                cbimport('language.all');
            }
            $_PLUGINS->loadPluginGroup('user');

            $typeHandlers = [];
            $registeredTypes = $_PLUGINS->getUserFieldTypes();
            foreach ($registeredTypes as $type) {
                $typeHandlers[$type] = new cbFieldHandler();
                $tmpField = new stdClass();
                $tmpField->_db = Application::Database();
                $tmpField->pluginid = null;
                $tmpField->type = $type;
                $typeObject = new stdClass();
                $typeObject->name = $type;
                $typeObject->label_default = $typeHandlers[$type]->getFieldTypeLabel($tmpField, false);
                if ($typeObject->label_default) {
                    $typeObject->label_translated = CBTxt::T($typeObject->label_default);
                } else {
                    $typeObject->label_translated = $typeObject->label_default;
                }
                $this->types[$type] = $typeObject;
            }
        }
    }

    /**
     * plgAlleventsCBUsers::onAlleventsEnrolmentsBlock()
     *
     * @param mixed $item
     * @param mixed $enrolments
     * @param mixed $params
     *
     * @return string
     */
    public function onAlleventsEnrolmentsBlock(&$item, &$enrolments, &$params)
    {
        $sContent = '';
        $component = 'com_comprofiler';
        $component_enabled = JComponentHelper::isInstalled($component) && JComponentHelper::isEnabled($component);
        if ($component_enabled) {
            global $_PLUGINS;
            include_once(JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php');
            $keywords_array = explode(";", $this->params->get('cbusers_extra_fields_name', ''));
            $cbUser = CBuser::getInstance(JFactory::getUser()->id);

            $sContent .= '<table class = "cb_template cb_template_default" id="AE_EventsParticipants">';
            $sContent .= '<thead>';
            $sContent .= '<tr>';
            $sContent .= ($this->params->get('cbusers_showparticipantordering', true)) ? '<th class="nbr">#</th>' : '';
            $sContent .= ($this->params->get('cbusers_showparticipantavatar', true)) ? '<th>' . JText::_('Photo') . '</th>' : '';
            $sContent .= ($this->params->get('cbusers_showparticipantalias', true)) ? '<th>' . JText::_('COM_ALLEVENTS_HEADING_NAME') . '</th>' : '';
            $sContent .= ($this->params->get('cbusers_showparticipantformatname', true)) ? '<th>' . JText::_('COM_ALLEVENTS_HEADING_NAME') . '</th>' : '';
            $sContent .= ($this->params->get('cbusers_showparticipantenroldate', true)) ? '<th>' . JText::_('COM_ALLEVENTS_ENROLMENTS_ENROLDATE') . '</th>' : '';
            if (($cbUser !== null) && (!empty($keywords_array))) {
                $user = $cbUser->getUserData();
                $tabs = $cbUser->_getCbTabs();
                foreach ($keywords_array as $fldname) {
                    if (!empty($fldname)) {
                        $fields = $tabs->_getTabFieldsDb(null, $user, 'profile', $fldname, true, false);
                        if (isset($fields[0])) {
                            $field = $fields[0];
                            $sReturn = $_PLUGINS->callField($field->type, 'getFieldTitle', [
                                &$field,
                                &$user,
                                'html',
                                'none',
                                'profile',
                                false], $field);
                        } else {
                            $sReturn = $fldname;
                        }
                        $sContent .= '<th>' . $sReturn . '</th>';
                    }
                }
            }
            $sContent .= ($this->params->get('cbusers_showparticipantpending', true)) ? '<th>' . JText::_('COM_ALLEVENTS_ENROLMENTS_PENDING') . '</th>' : '';
            $sContent .= ($this->params->get('cbusers_showparticipantparticipant', true)) ? '<th>' . JText::_('COM_ALLEVENTS_PARTICIPANTS') . '</th>' : '';
            $sContent .= ($this->params->get('cbusers_showparticipantcommentaire', true)) ? '<th>' . JText::_('COM_ALLEVENTS_COMMENTAIRE') . '</th>' : '';
            $sContent .= '</tr>';
            $sContent .= '</thead>';
            $sContent .= '<tbody>';
            if ((isset($enrolments)) && (count($enrolments) > 0)) {
                foreach ($enrolments as $enrolment) {
                    $enroldate = JHtml::_('date', $enrolment->enroldate, AllEventsHelperDate::jVersionFormat($params['gdate_format']));
                    $published = "";
                    $rank = "";
                    $cbUserData = null;
                    $avatar = "/components/com_comprofiler/plugin/templates/default/images/avatar/nophoto_n.png";
                    $alias = "";
                    $formatname = "";
                    $cbUser = CBuser::getInstance($enrolment->user_id);
                    if ($cbUser !== null) {
                        $formatname = $cbUser->getField('formatname', null, 'html', 'none', 'list', 0, true);
                        $avatar = $cbUser->getField('avatar', null, 'html', 'none', 'list', 0, true);
                    }
                    switch ($enrolment->enroltype) {
                        //_EnrolType_YES
                        case '0':
                            $rank = $enrolment->rank;
                            if (($item->enrolment_max_participant <> 0) && ($item->allow_overbooking) && ($enrolment->rank > $item->enrolment_max_participant)) {
                                $enrolment->published = 0;
                            }
                            if ($enrolment->published == 1) {
                                $published = '<span class="icon-enrol_green" title="">' . JText::_('AE_CONFIRMED') . '</span>';
                            } else {
                                $published = '<span class="icon-enrol_yellow" title="">' . JText::_('ENROL_OVERBOOKING') . '</span>';
                            }
                            break;
                        //_EnrolType_NO
                        case '1':
                            $rank = '';
                            $published = '<span class="icon-enrol_red" title="">' . JText::_('ENROL_NO') . '</span>';
                            break;
                        //_EnrolType_PERHAPS
                        case '2':
                            $rank = '';
                            $published = '<span class="icon-enrol_yellow" title="">' . JText::_('ENROL_UNCERTAIN') . '</span>';
                            break;
                        // EnrolType_Pending signifie : l'inscription est valide (soit _EnrolType_YES) mais pas définitive parce que p.e. en attente d'approbation ou non publiée.
                        case '3':
                            $rank = '';
                            $published = '<span class="icon-enrol_yellow" title="">' . JText::_('ENROL_OVERBOOKING') . '</span>';
                            break;
                    }

                    $sContent .= '<tr>';
                    $sContent .= ($this->params->get('cbusers_showparticipantordering', true)) ? '<td class="nbr">' . $rank . '</td>' : '';
                    $sContent .= ($this->params->get('cbusers_showparticipantavatar', true)) ? '<td>' . $avatar . '</td>' : '';
                    $sContent .= ($this->params->get('cbusers_showparticipantalias', true)) ? '<td>' . $alias . '</td>' : '';
                    $sContent .= ($this->params->get('cbusers_showparticipantformatname', true)) ? '<td>' . $formatname . '</td>' : '';
                    $sContent .= ($this->params->get('cbusers_showparticipantenroldate', true)) ? '<td>' . $enroldate . '</td>' : '';
                    if (($cbUser !== null) && (!empty($keywords_array))) {
                        foreach ($keywords_array as $fldname) {
                            $sContent .= (!empty($fldname)) ? '<td>' . $cbUser->getField($fldname, null, 'html', 'none', 'profile') . '</td>' : '';
                        }
                    }
                    $sContent .= ($this->params->get('cbusers_showparticipantpending', true)) ? '<td>' . $published . '</td>' : '';
                    $sContent .= ($this->params->get('cbusers_showparticipantparticipant', true)) ? '<td>' . $enrolment->companions . '</td>' : '';
                    $sContent .= ($this->params->get('cbusers_showparticipantcommentaire', true)) ? '<td>' . $enrolment->commentaire . '</td>' : '';
                    $sContent .= '</tr>';
                }
            }
            $sContent .= '</tbody>';
            $sContent .= '</table>';
        }

        return $sContent;
    }
}
