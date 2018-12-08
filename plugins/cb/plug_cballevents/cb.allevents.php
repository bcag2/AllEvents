<?php

defined('_JEXEC') or die;
/**
 * Description : Plugin pour Community Builder
 * Ce plugin va afficher dans la page de profil de l'utilisateur CB un onglet supplémentaire "Mes inscriptions"
 * S'y retrouvera la liste des inscriptions de la personne dont le profil est affiché
 */

if (!(defined('_VALID_CB') || defined('_JEXEC') || defined('_VALID_MOS')))
    jexit('Restricted access');

if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

JHtml::_('bootstrap.tooltip');

/**
 * getAllEventsEvents : Affichage de la liste des propositions d'évènements
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class getAllEventsEvents extends cbTabHandler
{
    /**
     * getAllEventsEvents::getAllEventsEvents()
     */
    function __construct()
    {
        $this->cbTabHandler();
    }

    /**
     * Fonction interne à CB pour afficher un onglet dans la page de profil
     *
     * @param object $tab reflecting the tab database entry
     * @param object $user reflecting the user being displayed
     * @param int $ui 1 for front-end, 2 for back-end
     *                     (non-PHPdoc)
     *
     * @see administrator/components/com_comprofiler/cbTabHandler#getDisplayTab($tab, $user, $ui)
     * @return string
     */
    function getDisplayTab($tab, $user, $ui)
    {
        $document = JFactory::getDocument();
        $document = JFactory::getDocument();
        $document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.6/footable.standalone.min.css');
        $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.6/footable.min.js');
        $document->addStyleDeclaration('table.footable>thead>tr>th.footable-sortable{padding-right: 0;text-align: center;}');
        $document->addStyleDeclaration('.footable .pagination a {text-decoration: none !important;}');

        // Récupère le code HTML qui va servir comme contenu de l'onglet : la liste des évènements proposés par l'utilisateur
        // dont CB est occupé à afficher la page de profil
        $user_id = isset($_REQUEST['user']) ? (int)$_REQUEST['user'] : $user->get('id');
        if (!class_exists('AllEventsHelperParam'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
        if (!class_exists('AllEventsHelperDate'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
        if (!class_exists('AllEventsHelperOverride'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
        // Load admin language file
        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);
        $aeparams = AllEventsHelperParam::getGlobalParam();
        $params = $this->params;

        $document = JFactory::getDocument();
        JHtml::_('jquery.framework');

        if ($user_id != null) {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select('e.id, e.alias, e.titre, DATE_FORMAT(e.date, "%Y-%m-%d %H:%i") date, e.allday');
            $query->select('e.activity_id, ac.titre activity_titre');
            $query->select('e.agenda_id, ag.titre agenda_titre');
            $query->select('e.category_id, ca.titre category_titre');
            $query->select('e.place_id, pl.titre place_titre');
            $query->select('e.public_id, pu.titre public_titre');
            $query->select('e.ressource_id, re.titre ressource_titre');
            $query->select('e.section_id, se.titre section_titre');
            $query->from('`#__allevents_events` AS e');
            $query->where('(e.published = 1)');
            $query->where('(e.cancelled = 0)');
            $query->where('(e.proposal = 0)');
            $query->leftJoin('`#__allevents_agenda` AS ag ON ag.id = e.agenda_id and ag.published = 1');
            $query->leftJoin('`#__allevents_activities` AS ac ON ac.id = e.activity_id and ac.published = 1');
            $query->leftJoin('`#__allevents_categories` AS ca ON ca.id = e.category_id and ca.published = 1');
            $query->leftJoin('`#__allevents_places` AS pl ON pl.id = e.place_id and pl.published = 1');
            $query->leftJoin('`#__allevents_public` AS pu ON pu.id = e.public_id and pu.published = 1');
            $query->leftJoin('`#__allevents_ressources` AS re ON re.id = e.ressource_id and re.published = 1');
            $query->leftJoin('`#__allevents_sections` AS se ON se.id = e.section_id and se.published = 1');
            $query->where('(e.proposed_by = ' . (int)$user_id . ')');
            $query->order('e.date desc');
            $db->setQuery($query);
            $enrolments = $db->loadObjectList();
            $sContent .= '<table class="table"  data-sorting="true" id="AE_CB_Events">';
            $sContent .= '<thead>';
            $sContent .= '<tr>';
            $sContent .= '<th class="titre">' . JText::_('COM_ALLEVENTS_TITRE') . '</th>';
            $sContent .= '<th class="date">' . JText::_('COM_ALLEVENTS_EVENTS_DATE') . '</th>';
            $sContent .= ($params->get('ae_ShowAgenda', true) == true) ? '<th class="agenda">' . JText::_('AGENDA') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowActivity', true) == true) ? '<th data-breakpoints="xs sm md" class="activity">' . JText::_('ACTIVITY') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowPublic', true) == true) ? '<th data-breakpoints="xs sm md" class="public">' . JText::_('PUBLIC') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowSection', false) == true) ? '<th data-breakpoints="xs sm md" class="section">' . JText::_('SECTION') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowCategory', false) == true) ? '<th data-breakpoints="xs sm md" class="category">' . JText::_('CATEGORY') . '</th>' : '';
            $sContent .= '</tr>';
            $sContent .= '</thead>';
            $sContent .= '<tbody>';
            if ((isset($events)) && (count($events) > 0)) {
                $i = 0;
                foreach ($enrolments as $enrolment) {
                    $i++;
                    $date = JHtml::_('date', $enrolment->date, AllEventsHelperDate::jVersionFormat($enrolment->allday ? $aeparams['gdate_format'] : $aeparams['gdatetime_format']));
                    $link = AllEventsHelperRoute::getEventRoute($enrolment->id, $enrolment->alias);
                    $sContent .= '<tr>';
                    $sContent .= '<td class="titre"><a href="' . $link . '">' . $enrolment->titre . '</a></td>';
                    $sContent .= '<td class="date">' . $date . '</td>';
                    $sContent .= ($params->get('ae_ShowAgenda', true) == true) ? '<td class="agenda"><a href="' . JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $enrolment->agenda_id, false) . '"> ' . $enrolment->agenda_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowActivity', true) == true) ? '<td class="activity"><a href="' . JRoute::_('index.php?option=com_allevents&view=activity&id=' . $enrolment->activity_id, false) . '"> ' . $enrolment->activity_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowPublic', true) == true) ? '<td class="public"><a href="' . JRoute::_('index.php?option=com_allevents&view=public&id=' . $enrolment->public_id, false) . '"> ' . $enrolment->public_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowSection', false) == true) ? '<td class="section"><a href="' . JRoute::_('index.php?option=com_allevents&view=section&id=' . $enrolment->section_id, false) . '"> ' . $enrolment->section_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowCategory', false) == true) ? '<td class="category"><a href="' . JRoute::_('index.php?option=com_allevents&view=category&id=' . $enrolment->category_id, false) . '">' . $enrolment->category_titre . '</a></td>' : '';
                    $sContent .= '</tr>';
                }
            }
        }
        $sContent .= '</tbody>';
        $sContent .= '</table>';

        $sContent .= "<script type='text/javascript'>";
        $sContent .= "jQuery(function($){";
        $sContent .= "  $('#AE_CB_Events').footable({});";
        $sContent .= "});";
        $sContent .= "</script>";

        return $sContent;
    }
}

/**
 * getAllEventsEnrolments : Affichage de la liste des inscriptions de l'utilisateur
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class getAllEventsEnrolments extends cbTabHandler
{
    /**
     * getAllEventsEnrolments::getAllEventsEnrolments()
     */
    function __construct()
    {
        $this->cbTabHandler();
    }

    /**
     * Fonction interne à CB pour afficher un onglet dans la page de profil
     *
     * @param object $tab reflecting the tab database entry
     * @param object $user reflecting the user being displayed
     * @param int $ui 1 for front-end, 2 for back-end
     *                     (non-PHPdoc)
     *
     * @see administrator/components/com_comprofiler/cbTabHandler#getDisplayTab($tab, $user, $ui)
     * @return string
     */
    function getDisplayTab($tab, $user, $ui)
    {
        $sContent = "";
        $user_id = isset($_REQUEST['user']) ? (int)$_REQUEST['user'] : $user->get('id');
        if (!class_exists('AllEventsHelperParam'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
        if (!class_exists('AllEventsHelperDate'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
        if (!class_exists('AllEventsHelperOverride'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
        // Load admin language file
        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);
        $aeparams = AllEventsHelperParam::getGlobalParam();
        $params = $this->params;
        $document = JFactory::getDocument();
        $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('icons.css'));
        JHtml::_('jquery.framework');

        if ($user_id != null) {
            // partie SQL
            $juser = JFactory::getUser($user_id);
            $db = JFactory::getDbo();
            $sql = '';
            $sql .= ' select e.id, e.alias, e.titre, DATE_FORMAT(e.date, "%Y-%m-%d %H:%i") date, e.allday,';
            $sql .= '        e.activity_id, ac.titre activity_titre,';
            $sql .= '        e.agenda_id, ag.titre agenda_titre,';
            $sql .= '        e.category_id, ca.titre category_titre,';
            $sql .= '        e.place_id, pl.titre place_titre,';
            $sql .= '        e.public_id, pu.titre public_titre,';
            $sql .= '        e.ressource_id, re.titre ressource_titre,';
            $sql .= '        e.section_id, se.titre section_titre,';
            $sql .= '        e.enrolment_max_participant, e.allow_overbooking,e.published,';
            $sql .= '        en.pending, en.enroltype, en.enroldate, en.rank';
            $sql .= ' from (SELECT u1.user_id, u1.event_id, u1.id, u1.enroltype, DATE_FORMAT(u1.enroldate, "%Y-%m-%d %H:%i") enroldate, u1.pending, count(u2.enroldate)+1 as rank';
            $sql .= '       FROM #__allevents_enrolments u1';
            $sql .= '       LEFT OUTER JOIN #__allevents_enrolments as u2 ON ((u2.enroldate < u1.enroldate) and (u2.event_id = u1.event_id) and (u2.published = u1.published))';
            $sql .= '       where (u1.published = 1)';
            $sql .= '       GROUP BY u1.user_id, u1.event_id, u1.id, u1.enroltype, u1.enroldate, u1.pending) as en ';
            $sql .= ' inner join #__allevents_events AS e ON en.event_id = e.id';
            $sql .= ' left outer join #__allevents_agenda AS ag ON ag.id = e.agenda_id and ag.published = 1';
            $sql .= ' left outer join #__allevents_activities AS ac ON ac.id = e.activity_id and ac.published = 1';
            $sql .= ' left outer join #__allevents_categories AS ca ON ca.id = e.category_id and ca.published = 1';
            $sql .= ' left outer join #__allevents_places AS pl ON pl.id = e.place_id and pl.published = 1';
            $sql .= ' left outer join #__allevents_public AS pu ON pu.id = e.public_id and pu.published = 1';
            $sql .= ' left outer join #__allevents_ressources AS re ON re.id = e.ressource_id and re.published = 1';
            $sql .= ' left outer join #__allevents_sections AS se ON se.id = e.section_id and se.published = 1';
            $sql .= ' where (e.published = 1)';
            $sql .= ' and (e.cancelled = 0)';
            $sql .= ' and (e.proposal = 0)';
            $sql .= ' and (en.user_id = ' . $user_id . ')';
            $sql .= ' and (e.access IN (' . implode(',', $juser->getAuthorisedViewLevels()) . ') or (e.access=0))';
            $sql .= ' and (ifnull(ag.access,1) IN (' . implode(',', $juser->getAuthorisedViewLevels()) . ') or (ag.access=0))';
            $sql .= ' and (ifnull(ac.access,1) IN (' . implode(',', $juser->getAuthorisedViewLevels()) . ') or (ac.access=0))';
            $sql .= ' and (ifnull(ca.access,1) IN (' . implode(',', $juser->getAuthorisedViewLevels()) . ') or (ca.access=0))';
            $sql .= ' and (ifnull(pl.access,1) IN (' . implode(',', $juser->getAuthorisedViewLevels()) . ') or (pl.access=0))';
            $sql .= ' and (ifnull(pu.access,1) IN (' . implode(',', $juser->getAuthorisedViewLevels()) . ') or (pu.access=0))';
            $sql .= ' and (ifnull(re.access,1) IN (' . implode(',', $juser->getAuthorisedViewLevels()) . ') or (re.access=0))';
            $sql .= ' and (ifnull(se.access,1) IN (' . implode(',', $juser->getAuthorisedViewLevels()) . ') or (se.access=0))';
            $sql .= ' order by e.date desc';

            $db->setQuery($sql);
            $enrolments = $db->loadObjectList();

            // partie HTML
            $sContent .= '<table id="AE_CB_Enrolments" class="table"  data-sorting="true">';
            $sContent .= '<thead>';
            $sContent .= '<tr>';
            $sContent .= '<th>' . JText::_('COM_ALLEVENTS_TITRE') . '</th>';
            $sContent .= '<th>' . JText::_('COM_ALLEVENTS_EVENTS_DATE') . '</th>';
            $sContent .= ($params->get('ae_ShowEnrolDate', true) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('COM_ALLEVENTS_ENROLMENTS_ENROLDATE') . '</th>' : '';
            $sContent .= '<th>' . JText::_('COM_ALLEVENTS_ENROLMENTS_PENDING') . '</th>';
            $sContent .= ($params->get('ae_ShowAgenda', true) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('AGENDA') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowActivity', true) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('ACTIVITY') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowPublic', true) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('PUBLIC') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowSection', false) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('SECTION') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowCategory', false) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('CATEGORY') . '</th>' : '';
            $sContent .= '</tr>';
            $sContent .= '</thead>';
            $sContent .= '<tbody>';
            if ((isset($enrolments)) && (count($enrolments) > 0)) {
                $i = 0;
                foreach ($enrolments as $enrolment) {
                    $i++;
                    $date = JHtml::_('date', $enrolment->date, AllEventsHelperDate::jVersionFormat($enrolment->allday ? $aeparams['gdate_format'] : $aeparams['gdatetime_format']));
                    $enroldate = JHtml::_('date', $enrolment->enroldate, AllEventsHelperDate::jVersionFormat($aeparams['gdatetime_format']));

                    switch ($enrolment->enroltype) {
                        //_EnrolType_YES
                        case '0':
                            if (($enrolment->enrolment_max_participant <> 0) && ($enrolment->allow_overbooking) && ($enrolment->rank > $enrolment->enrolment_max_participant)) {
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
                            $published = '<span class="icon-enrol_red" title="">' . JText::_('ENROL_NO') . '</span>';
                            break;
                        //_EnrolType_PERHAPS
                        case '2':
                            $published = '<span class="icon-enrol_yellow" title="">' . JText::_('ENROL_UNCERTAIN') . '</span>';
                            break;
                        // EnrolType_Pending signifie : l'inscription est valide (soit _EnrolType_YES) mais pas définitive parce que p.e. en attente d'approbation ou non publiée.
                        case '3':
                            $published = '<span class="icon-enrol_yellow" title="">' . JText::_('ENROL_OVERBOOKING') . '</span>';
                            break;
                    }

                    $link = AllEventsHelperRoute::getEventRoute($enrolment->id, $enrolment->alias);
                    $sContent .= '<tr>';
                    $sContent .= '<td class="titre"><a href="' . $link . '">' . $enrolment->titre . '</a></td>';
                    $sContent .= '<td>' . $date . '</td>';
                    $sContent .= ($params->get('ae_ShowEnrolDate', true) == true) ? '<td>' . $enroldate . '</td>' : '';
                    $sContent .= '<td>' . $published . '</td>';
                    $sContent .= ($params->get('ae_ShowAgenda', true) == true) ? '<td class="agenda"><a href="' . JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $enrolment->agenda_id, false) . '"> ' . $enrolment->agenda_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowActivity', true) == true) ? '<td class="activity"><a href="' . JRoute::_('index.php?option=com_allevents&view=activity&id=' . $enrolment->activity_id, false) . '"> ' . $enrolment->activity_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowPublic', true) == true) ? '<td class="public"><a href="' . JRoute::_('index.php?option=com_allevents&view=public&id=' . $enrolment->public_id, false) . '"> ' . $enrolment->public_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowSection', false) == true) ? '<td class="section"><a href="' . JRoute::_('index.php?option=com_allevents&view=section&id=' . $enrolment->section_id, false) . '"> ' . $enrolment->section_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowCategory', false) == true) ? '<td class="category"><a href="' . JRoute::_('index.php?option=com_allevents&view=category&id=' . $enrolment->category_id, false) . '">' . $enrolment->category_titre . '</a></td>' : '';
                    $sContent .= '</tr>';
                }
            }
        }
        $sContent .= '</tbody>';
        $sContent .= '</table>';

        $sContent .= "<script type='text/javascript'>";
        $sContent .= "jQuery(function($){";
        $sContent .= "  $('#AE_CB_Enrolments').footable({});";
        $sContent .= "});";
        $sContent .= "</script>";

        return $sContent;
    }
}

/**
 * getAllEventsUnenrolledEvents : Affichage de la liste des inscriptions de l'utilisateur
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class getAllEventsUnenrolledEvents extends cbTabHandler
{
    /**
     * getAllEventsUnenrolledEvents::getAllEventsUnenrolledEvents()
     */
    function __construct()
    {
        $this->cbTabHandler();
    }

    /**
     * Fonction interne à CB pour afficher un onglet dans la page de profil
     *
     * @param object $tab reflecting the tab database entry
     * @param object $user reflecting the user being displayed
     * @param int $ui 1 for front-end, 2 for back-end
     *                     (non-PHPdoc)
     *
     * @see administrator/components/com_comprofiler/cbTabHandler#getDisplayTab($tab, $user, $ui)
     * @return string
     */
    function getDisplayTab($tab, $user, $ui)
    {
        $sContent = "";
        $user_id = isset($_REQUEST['user']) ? (int)$_REQUEST['user'] : $user->get('id');
        if (!class_exists('AllEventsHelperParam'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
        if (!class_exists('AllEventsHelperDate'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';
        if (!class_exists('AllEventsHelperOverride'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
        // Load admin language file
        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);
        $aeparams = AllEventsHelperParam::getGlobalParam();
        $params = $this->params;
        $document = JFactory::getDocument();
        $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('icons.css'));
        JHtml::_('jquery.framework');

        if ($user_id != null) {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select('e.id, e.titre, e.alias, DATE_FORMAT(e.date, "%Y-%m-%d %H:%i") date, e.allday');
            $query->select('e.activity_id, ac.titre activity_titre');
            $query->select('e.agenda_id, ag.titre agenda_titre');
            $query->select('e.category_id, ca.titre category_titre');
            $query->select('e.place_id, pl.titre place_titre');
            $query->select('e.public_id, pu.titre public_titre');
            $query->select('e.ressource_id, re.titre ressource_titre');
            $query->select('e.section_id, se.titre section_titre');
            $query->from('`#__allevents_events` AS e');
            $query->leftJoin('`#__allevents_agenda` AS ag ON ag.id = e.agenda_id and ag.published = 1');
            $query->leftJoin('`#__allevents_activities` AS ac ON ac.id = e.activity_id and ac.published = 1');
            $query->leftJoin('`#__allevents_categories` AS ca ON ca.id = e.category_id and ca.published = 1');
            $query->leftJoin('`#__allevents_places` AS pl ON pl.id = e.place_id and pl.published = 1');
            $query->leftJoin('`#__allevents_public` AS pu ON pu.id = e.public_id and pu.published = 1');
            $query->leftJoin('`#__allevents_ressources` AS re ON re.id = e.ressource_id and re.published = 1');
            $query->leftJoin('`#__allevents_sections` AS se ON se.id = e.section_id and se.published = 1');
            $query->where('(e.published = 1)');
            $query->where('(e.cancelled = 0)');
            $query->where('(e.proposal = 0)');
            $query->where("(DATE_FORMAT(e.date,'%Y%m%d') > DATE_FORMAT(CURRENT_DATE(),'%Y%m%d'))");
            $query->where('not exists (select 1 from `#__allevents_enrolments` AS en WHERE (en.event_id = e.id) and (en.published = 1) and (en.user_id = ' . $user_id . '))');
            $query->order('e.date desc');
            $db->setQuery($query);
            $enrolments = $db->loadObjectList();
            $sContent .= '<table class="table"  data-sorting="true" id="AE_CB_UnenrolledEvents">';
            $sContent .= '<thead>';
            $sContent .= '<tr>';
            $sContent .= '<th>' . JText::_('COM_ALLEVENTS_TITRE') . '</th>';
            $sContent .= '<th>' . JText::_('COM_ALLEVENTS_EVENTS_DATE') . '</th>';
            $sContent .= ($params->get('ae_ShowAgenda', true) == true) ? '<th>' . JText::_('AGENDA') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowActivity', true) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('ACTIVITY') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowPublic', true) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('PUBLIC') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowSection', false) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('SECTION') . '</th>' : '';
            $sContent .= ($params->get('ae_ShowCategory', false) == true) ? '<th data-breakpoints="xs sm md" >' . JText::_('CATEGORY') . '</th>' : '';
            $sContent .= '</tr>';
            $sContent .= '</thead>';
            $sContent .= '<tbody>';
            if ((isset($enrolments)) && (count($enrolments) > 0)) {
                $i = 0;
                foreach ($enrolments as $enrolment) {
                    $i++;
                    $date = JHtml::_('date', $enrolment->date, AllEventsHelperDate::jVersionFormat($enrolment->allday ? $aeparams['gdate_format'] : $aeparams['gdatetime_format']));
                    $link = AllEventsHelperRoute::getEventRoute($enrolment->id, $enrolment->alias);
                    $sContent .= '<tr>';
                    $sContent .= '<td class="titre"><a href="' . $link . '">' . $enrolment->titre . '</a></td>';
                    $sContent .= '<td>' . $date . '</td>';
                    $sContent .= ($params->get('ae_ShowAgenda', true) == true) ? '<td class="agenda"><a href="' . JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $enrolment->agenda_id, false) . '"> ' . $enrolment->agenda_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowActivity', true) == true) ? '<td class="activity"><a href="' . JRoute::_('index.php?option=com_allevents&view=activity&id=' . $enrolment->activity_id, false) . '"> ' . $enrolment->activity_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowPublic', true) == true) ? '<td class="public"><a href="' . JRoute::_('index.php?option=com_allevents&view=public&id=' . $enrolment->public_id, false) . '"> ' . $enrolment->public_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowSection', false) == true) ? '<td class="section"><a href="' . JRoute::_('index.php?option=com_allevents&view=section&id=' . $enrolment->section_id, false) . '"> ' . $enrolment->section_titre . '</a></td>' : '';
                    $sContent .= ($params->get('ae_ShowCategory', false) == true) ? '<td class="category"><a href="' . JRoute::_('index.php?option=com_allevents&view=category&id=' . $enrolment->category_id, false) . '">' . $enrolment->category_titre . '</a></td>' : '';
                    $sContent .= '</tr>';
                }
            }
        }
        $sContent .= '</tbody>';
        $sContent .= '</table>';

        $sContent .= "<script type='text/javascript'>";
        $sContent .= "jQuery(function($){";
        $sContent .= "  $('#AE_CB_UnenrolledEvents').footable({});";
        $sContent .= "});";
        $sContent .= "</script>";

        return $sContent;
    }
}