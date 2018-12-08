<?php

defined('_JEXEC') or die;

if (!class_exists('AEModelItem'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aemodel.php';
if (!class_exists('AEModelAEhelper'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aehelper.php';
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

/**
 * AllEventsModelFullcalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelFullcalendar extends AEModelItem
{
    /**
     * AllEventsModelFullcalendar::getData()
     *
     * @return stdClass
     */
    public function getData()
    {
        $this->startAEModel();
        $structure = [
            'agendas' => ['agenda' => [
                'id' => '',
                'titre' => '',
                'image_bullet' => '',
            ]],
            'activities' => ['activity' => [
                'id' => '',
                'titre' => '',
                'image_bullet' => '',
            ]],
            'places' => ['place' => [
                'id' => '',
                'titre' => '',
                'image_bullet' => '',
            ]]];

        return $this->getItems($structure);
    }

    /**
     * AllEventsModelFullcalendar::getPlaces()
     *
     * @return stdClass
     */
    public function getPlaces()
    {
        $this->startAEModel();
        $structure = ['places' => ['place' => [
            'id' => '',
            'titre' => '',
            'image_bullet' => '',
        ]],];

        return $this->getMyPlaces($structure);
    }

    /**
     * AllEventsModelFullcalendar::getCalendars()
     *
     * @return stdClass
     */
    public function getCalendars()
    {
        $this->startAEModel();
        $structure = ['calendars' => ['calendar' => [
            'id' => '',
            'id_gcalendar' => '',
            'classe' => '',
            'couleur' => '',
            'couleur_texte' => '']],];

        return $this->getMyCalendars($structure);
    }

    /**
     * AllEventsModelFullcalendar::getICSCalendars()
     *
     * @return stdClass
     */
    public function getICSCalendars()
    {
        $this->startAEModel();
        $structure = ['calendars' => ['calendar' => [
            'id' => '',
            'id_gcalendar' => '',
            'classe' => '',
            'couleur' => '',
            'couleur_texte' => '']],];

        return $this->getMyICSCalendars($structure);
    }

    /**
     * AllEventsModelFullcalendar::getEvents()
     *
     * @return stdClass
     * @throws Exception
     */
    public function getEvents()
    {
        $params = AllEventsHelperParam::getGlobalParam();
        $this->startAEModel();
        $input = JFactory::getApplication()->input;
        $this->addParam('gshow_eventallday', $params['gshow_eventallday']);

        $this->addParam('a', $input->getInt('a'));
        $this->addParam('ano', $input->getInt('ano'));
        $this->addParam('at', $input->getString('at')); //AGENDA tab
        $this->addParam('c', $input->getInt('c'));
        $this->addParam('ct', $input->getString('ct')); //CATEGORY tab
        $this->addParam('d', $input->getInt('d'));
        $this->addParam('dc', $input->getInt('dc'));
        $this->addParam('dcb', $input->getInt('dcb'));
        $this->addParam('dct', $input->getInt('dct'));
        $this->addParam('dt', $input->getString('dt')); //PUBLIC tab
        $this->addParam('end', $input->getString('end'));
        $this->addParam('et', $input->getString('et')); //RESSOURCE tab
        $this->addParam('h', $input->getInt('h'));
        $this->addParam('itemid', $input->getInt('itemid'));
        $this->addParam('Itemid', $input->getInt('Itemid'));
        $this->addParam('l', $input->getInt('l'));
        $this->addParam('layout', $input->getString('layout'));// events - cards
        $this->addParam('limit', $input->getInt('limit'));// events - cards
        $this->addParam('lt', $input->getString('lt')); //PLACE tab
        $this->addParam('mes', $input->getInt('mes'));
        $this->addParam('month', $input->getInt('month'));
        $this->addParam('p', $input->getInt('p'));
        $this->addParam('period', $input->getInt('period')); // events - table
        $this->addParam('pivot', $input->getInt('pivot')); // events - table
        $this->addParam('pt', $input->getString('pt')); //ACTIVITY tab
        $this->addParam('s', $input->getInt('s'));
        $this->addParam('sort_by', $input->getInt('sort_by')); // events - table
        $this->addParam('st', $input->getString('st')); //SECTION tab
        // $this->addParam('start', $input->getString('start'));
        // $this->addParam('end', $input->getString('end'));

        $datstart = $input->getString('start');
        $datend = $input->getString('end');
        if (!empty($datstart) && !empty($datend)) {
            $range_end = AllEventsHelperDate::parseDateTime($datend);
            $this->addParam('range_end', $range_end->format('c'));

            // add a rule to bloc the error with template adding a date param
            if (substr($datstart, 0, 1) == 'R') {
                $range_start = $range_end;
                $range_start->modify('-2 month');
                $this->addParam('range_start', $range_start->format('c'));
            } else {
                $range_start = AllEventsHelperDate::parseDateTime($datstart);
                $this->addParam('range_start', $range_start->format('c'));
            }
        }

        // AEFC V2.5
        $datestart = $input->getString('startdate');
        $dateend = $input->getString('enddate');
        if (!empty($datestart) && !empty($dateend)) {
            $range_start = AllEventsHelperDate::parseDateTime($datestart);
            $this->addParam('range_start', $range_start->format('c'));

            $range_end = AllEventsHelperDate::parseDateTime($dateend);
            $this->addParam('range_end', $range_end->format('c'));
        }
        $view = $input->get('view');
        $view = (empty($view)) ? 'aefc' : $view;

        $this->addParam('mod', $input->getInt('mod'));
        $this->addParam('admin', $input->getInt('admin'));
        $this->addParam('view', $view);
        $tabAgendas = json_decode($input->getString('tabAgendas'), true);
        if (isset($tabAgendas)) {
            $this->addParam('tabAgendas', implode(",", $tabAgendas));
        }
        // appel via la vue
        if (empty($this->params['mod'])) {
            $structure = ['event' => [
                'activity_id' => '',
                'activity_image_bullet' => '',
                'activity_titre' => '',
                'affiche' => '',
                'banniere' => '',
                'agenda_id' => '',
                'agenda_image_bullet' => '',
                'agenda_titre' => '',
                'allDay' => '',
                'allow_overbooking' => '',
                'backgroundColor' => '',
                'borderColor' => '',
                'canenrol' => '',
                'category_id' => '',
                'className' => '',
                'dateUTC' => '',
                'description' => '',
                'descriptionbic' => '',
                'editable' => '',
                'end' => '',
                'endaefc' => '',
                'endISO' => '',
                'enddateUTC' => '',
                'enrolment_enabled' => '',
                'enrolment_max_participant' => '',
                'enrolments' => '',
                'enroltype' => '',
                'event_id' => '',
                'event_location' => '',
                'hot' => '',
                'id' => '',
                'link' => '',
                'nb_enrolyes' => '',
                'place_id' => '',
                'place_image_bullet' => '',
                'place_titre' => '',
                'start' => '',
                'startISO' => '',
                'startaefc' => '',
                'startaebic' => '',
                'startaecal' => '',
                'startdateISO' => '',
                'starttimeISO' => '',
                'enddateISO' => '',
                'endtimeISO' => '',
                'startaezabuto' => '',
                'textColor' => '',
                'titre' => '',
                'type_action' => '',
                'vignette' => '']];
        } else {
            // appel via le module
            $structure = ['event' => [
                'id' => '',
                'event_id' => '',
                'titre' => '',
                'startISO' => '',
                'endISO' => '',
                'borderColor' => '',
                'textColor' => '',
                'backgroundColor' => '',
                'allDay' => '',
                'startdateISO' => '',
                'enddateISO' => '',
                'starttimeISO' => '',
                'endtimeISO' => '',
                'link' => '']];
        }

        $ret = $this->getMyEvents($structure);

        return $ret;
    }

    /**
     * AllEventsModelFullcalendar::getEvent()
     *
     * @return stdClass
     * @throws Exception
     */
    public function getEvent()
    {
        $this->startAEModel();
        $input = JFactory::getApplication()->input;
        if (is_numeric($input->get('ei'))) {
            $this->addParam('ei', $input->getInt('ei'));
            $params = AllEventsHelperParam::getGlobalParam();
            $this->addParam('dc', $params['gdisplay_colors']);
            $this->addParam('dct', $params['gdisplay_colors_fore']);
            $this->addParam('dcb', $params['gdisplay_colors_back']);

            $structure = ['event' => [
                'id' => '',
                'titre' => '',
                'start' => '',
                'end' => '',
                'borderColor' => '',
                'textColor' => '',
                'backgroundColor' => '',
                'description' => '',
                'editable' => '',
                'allDay' => '',
                'className' => '',
                'link' => '',
                'type_action' => '',
                'activity_id' => '',
                'agenda_id' => '',
                'place_id' => '',
                'activity_titre' => '',
                'agenda_titre' => '',
                'place_titre' => '',
                'enrolment_max_participant' => '',
                'hot' => '',
                'canenrol' => '',
                'affiche' => '',
                'banniere' => '',
                'vignette' => '',
            ]];
            $ret = $this->getMyEvents($structure);
        }

        return $ret;
    }
}
