<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');
jimport('joomla.filter.output');

require_once JPATH_SITE . '/components/com_allevents/helpers/class.iCalReader.php';
require_once JPATH_SITE . '/administrator/components/com_allevents/models/category.php';
require_once JPATH_SITE . '/administrator/components/com_allevents/models/place.php';
require_once JPATH_SITE . '/administrator/components/com_allevents/models/event.php';
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsModelImport
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelImport extends JModelForm
{
    protected $text_prefix = 'COM_ALLEVENTS';

    /**
     * AllEventsModelImport::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return JTable|null
     */
    public function getTable($type = 'Import', $prefix = 'AllEventsTable', $config = [])
    {
        return null;
    }

    /**
     * AllEventsModelImport::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.import', 'import', ['control' => 'jform', 'load_data' => $loadData]);

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelImport::importical()
     *
     * @param mixed $options
     *
     * @return bool
     * @throws Exception
     */
    public function importical($options)
    {
        $app = JFactory::getApplication();
        try {
            $params = AllEventsHelperParam::getGlobalParam();
            $user = JFactory::getUser();
            //$globaloptions = JComponentHelper::getParams('com_allevents');
            $jinput = $app->input;
            $files = $jinput->files->get('jform');
            $file = $files['userfile'];
            $agenda_id = intval(@$options['agenda_id']);
            $activity_id = intval(@$options['activity_id']);
            $public_id = intval(@$options['public_id']);
            $place_id = intval(@$options['place_id']);
            $ressource_id = intval(@$options['ressource_id']);
            $section_id = intval(@$options['section_id']);
            $category_id = intval(@$options['category_id']);
            $newcat = $options['newcat'];
            $newplace = $options['newplace'];
            $import_mode_cat = intval($options['import_mode_cat']);
            $import_mode_place = intval($options['import_mode_place']);
            $import_type = $options['import_type'];
            $url = str_replace("webcal://", "http://", $options['url']);
            $newcatcount = 0;
            $placecount = 0;
            $newcount = 0;
            $updatecount = 0;
            //$groupname = "";

            if ($agenda_id == 0) {
                $app->enqueueMessage(JText::_('AE_IMPORT_YOU_MUST_SPECIFY_A_AGENDA'), 'error');

                return false;
            } elseif (($category_id == 0 && $import_mode_cat == 1) || ($newcat == '' && $import_mode_cat == 3)) {
                $app->enqueueMessage(JText::_('AE_IMPORT_YOU_MUST_SPECIFY_A_CATEGORY'), 'error');

                return false;
            } elseif (($place_id == 0 && $import_mode_place == 1) || ($newplace == '' && $import_mode_place == 3)) {
                $app->enqueueMessage(JText::_('AE_IMPORT_YOU_MUST_SPECIFY_A_PLACE'), 'error');

                return false;
            }
            if ($import_type == 'f' && $file["size"] > 2000000) {
                $app->enqueueMessage(JText::_("AE_IMPORT_ICAL_FILE_IS_TOO_BIG"), 'error');

                return false;
            } elseif ($import_type == 'f' && $file["size"] == 0) {
                $app->enqueueMessage(JText::_("AE_IMPORT_INVALID_FILE"), 'error');

                return false;
            } elseif ($import_type == 'u' && strlen($url) == 0) {
                $app->enqueueMessage(JText::_("AE_IMPORT_NO_URL_SPECIFIED"), 'error');

                return false;
            }

            // now import
            if ($import_type == 'u') {
                $ical = new ICal();
                $ical->initURL($url);
            } else {
                $ical = new ICal($file["tmp_name"]);
            }
            $events = $ical->events();
            // $this->setError('<pre>' .print_r($events,true).'</pre>')  ; 
            // return ; 

            // read categ & place
            $categories = [];
            $places = [];
            foreach ($events as $event) {
                $categories[] = isset($event['CATEGORIES_array'][1]) ? $event['CATEGORIES_array'][1] : '';
                $places[] = @$event['LOCATION'] . '#' . @$event['GEO_array'][1] . '#' . @$event['URL'];
            }
            sort($categories);
            sort($places);
            $categories = array_unique($categories);
            $places = array_unique($places);
            $categoriesDB = [];
            $placesDB = [];
            $agendasDB = [];

            $database = JFactory::getDbo();
            $database->setQuery("SELECT id, titre FROM #__allevents_categories WHERE published=1");
            $loaddb = $database->loadObjectList();
            foreach ($loaddb as $row) {
                $categoriesDB[$row->titre] = $row->id;
            }

            $database->setQuery("SELECT id, titre FROM #__allevents_places WHERE published=1");
            $loaddb = $database->loadObjectList();
            foreach ($loaddb as $row) {
                $placesDB[$row->titre] = $row->id;
            }

            $database->setQuery("SELECT id, titre FROM #__allevents_agenda WHERE published=1");
            $loaddb = $database->loadObjectList();
            foreach ($loaddb as $row) {
                $agendasDB[$row->id] = $row->titre;
            }
            $groupname = $agendasDB[$agenda_id];

            // create a category
            if ($import_mode_cat == 3) {
                if ((!empty($category)) && !(array_key_exists($category, $categoriesDB))) {
                    // pas de agenda_id dans la table category
                    $c = [
                        "titre" => $newcat,
                        "alias" => JFilterOutput::stringURLSafe($newcat),
                        "proposed_by" => $user->get('id'),
                        "vignette" => "",
                        "section_id" => $section_id,
                        "couleur" => $this->getNextColor(),
                        "published" => 1];

                    $cat = new AllEventsModelCategory();
                    $cat->save($c);
                    $categoriesDB[$newcat] = $cat->getId();
                }
            } elseif ($import_mode_cat == 2) {
                foreach ($categories as $category) {
                    if ((!empty($category)) && !(array_key_exists($category, $categoriesDB))) {
                        // pas de agenda_id dans la table category
                        $c = [
                            "titre" => $category,
                            "alias" => JFilterOutput::stringURLSafe($category),
                            "proposed_by" => $user->get('id'),
                            "vignette" => "",
                            "section_id" => $section_id,
                            "couleur" => $this->getNextColor(),
                            "published" => 1];

                        $cat = new AllEventsModelCategory();
                        $cat->save($c);
                        $categoriesDB[$category] = $cat->getId();
                        $newcatcount++;
                    }
                }
            }

            // create a place
            if ($import_mode_place == 3) {
                if (!(array_key_exists($newplace, $placesDB))) {
                    $p = [
                        "titre" => $newplace,
                        "alias" => JFilterOutput::stringURLSafe($newplace),
                        "agenda_id" => $agenda_id,
                        "proposed_by" => $user->get('id'),
                        "vignette" => "",
                        "published" => 1];
                }

                $place = new AllEventsModelPlace();
                $place->save($p);
                $placesDB[$newplace] = $place->getId();
            } elseif ($import_mode_place == 2) {
                foreach ($places as $place) {
                    $position = explode("#", $place);
                    $titre = $position[0];
                    $geo = $position[1];
                    $website = $position[2];

                    $titre = str_replace([
                        "\\,",
                        "\\;",
                        "\\n"], [
                        ",",
                        ";",
                        "\n"], $titre);

                    if (!empty($geo)) {
                        $position = explode(";", $geo);
                        $latitude = $position[0];
                        $longitude = $position[1];
                    } else {
                        $latitude = null;
                        $longitude = null;
                    }

                    if ((!empty($titre)) && !(array_key_exists($titre, $placesDB))) {
                        $p = [
                            "titre" => $titre,
                            "alias" => JFilterOutput::stringURLSafe($titre),
                            "proposed_by" => $user->get('id'),
                            "vignette" => "",
                            "website" => $website,
                            "latitude" => $latitude,
                            "longitude" => $longitude,
                            "agenda_id" => $agenda_id,
                            "published" => 1];

                        $venue = new AllEventsModelPlace();
                        $venue->save($p);
                        $placesDB[$titre] = $venue->getId();
                        $placecount++;
                    }
                }
            }

            foreach ($events as $event) {
                $c = isset($event['CATEGORIES_array'][1]) ? $event['CATEGORIES_array'][1] : '';
                $p = @$event['LOCATION'];
                $p = str_replace([
                    "\\,",
                    "\\;",
                    "\\n"], [
                    ",",
                    ";",
                    "\n"], $p);

                $place_id = 0;
                $category_id = 0;
                if (array_key_exists($p, $placesDB)) {
                    $place_id = $placesDB[$p];
                }
                if (array_key_exists($c, $categoriesDB)) {
                    $category_id = $categoriesDB[$c];
                }
                if (!empty($event['DTEND'])) {
                    $date = new DateTime();
                    $date->setTimestamp($ical->iCalDateToUnixTimestamp($event['DTSTART']));

                    $enddate = new DateTime();
                    $enddate->setTimestamp($ical->iCalDateToUnixTimestamp($event['DTEND']));

                    // In allevents, if an event is all-day the end date is inclusive. This means an event with start Nov 10 and end Nov 12 will span 3 days on the calendar.
                    if (($date->format('H:i') == '00:00') && ($enddate->format('H:i') == '00:00')) {
                        $allday = 1;
                        $enddate->sub(new DateInterval('P1D'));
                    } else {
                        $allday = 0;
                    }
                } else {
                    $date = new DateTime();
                    $date->setTimestamp($ical->iCalDateToUnixTimestamp($event['DTSTART']));
                    $enddate = new DateTime();
                    $enddate->setTimestamp($ical->iCalDateToUnixTimestamp($event['DTSTART']));

                    if (($date->format('H:i') == '00:00') && ($enddate->format('H:i') == '00:00')) {
                        $allday = 1;
                    } else {
                        $allday = 0;
                        // add one hour ta have a real event
                        $enddate->add(new DateInterval('PT1H'));
                    }
                }

                $format = ($allday) ? $params['gdate_format'] : $params['gdatetime_format'];

                $titre = str_replace([
                    "\\,",
                    "\\;",
                    "\\n"], [
                    ",",
                    ";",
                    "\n"], @$event['SUMMARY']);

                $e = [
                    "titre" => $titre,
                    "allday" => $allday,
                    "date" => $date->format($format),
                    "enddate" => $enddate->format($format),
                    "alias" => JFilterOutput::stringURLSafe(@$event['SUMMARY']),
                    "agenda_id" => $agenda_id,
                    "activity_id" => $activity_id,
                    "public_id" => $public_id,
                    "place_id" => $place_id,
                    "ressource_id" => $ressource_id,
                    "section_id" => $section_id,
                    "category_id" => $category_id,
                    "description" => @$event['DESCRIPTION'],
                    "proposed_by" => $user->get('id'),
                    "vignette" => "",
                    "published" => 1 //$event['STATUS'] ...
                ];

                $ev = new AllEventsModelEvent();
                $ev->save($e);
                $newcount++;
                // echo 'UID: ' . @$event['UID'] . "<br />\n";
                // if(array_key_exists('ORGANIZER',$event)){echo 'ORGANIZER: ' . @$event['ORGANIZER'] . "<br />\n"; }
                // echo 'ATTENDEE(S): ' . @$event['ATTENDEE'] . "<br />\n";
                // echo 'RRULE: ' . @$event['RRULE'] . "<br />\n";
            }

            $this->message = sprintf(JText::_("AE_NEW_EVENTS_IMPORTED_FOR_CALENDAR"), $newcount, $updatecount, $groupname);
            switch ($newcatcount) {
                case 0:
                    break;
                case 1:
                    $this->message .= ", " . JText::_("AE_1_NEW_CATEGORY_WAS_ALSO_CREATED");
                    break;
                default:
                    $this->message .= ", " . sprintf(JText::_("AE_NEW_CATEGORIES_WERE_ALSO_CREATED"), $newcatcount);
                    break;
            }

            switch ($placecount) {
                case 0:
                    break;
                case 1:
                    $this->message .= ", " . JText::_("AE_1_PLACE_CREATED");
                    break;
                default:
                    $this->message .= ", " . sprintf(JText::_("AE_PLACES_CREATED"), $placecount);
                    break;
            }
        } catch (Exception $e) {
            $app->enqueueMessage($e->getMessage());

            return false;
        }

        $app->enqueueMessage($this->message, 'message');

        return true;
    }

    /**
     * AllEventsModelImport::getNextColor()
     *
     * @return mixed
     */
    function getNextColor()
    {
        $newcatcolors = [
            "#ff0000",
            "#ff8000",
            "#ffff00",
            "#80ff00",
            "#00ff00",
            "#00ff80",
            "#00ffff",
            "#0080ff",
            "#0000ff",
            "#8000ff",
            "#ff00ff",
            "#ff80ff",
            "#ff8080",
            "#ffb000",
            "#ffff80",
            "#b0ff80",
            "#80ff80",
            "#80ffb0",
            "#80ffff",
            "#80b0ff",
            "#8080ff",
            "#b080ff",
            "#ff80ff",
            "#ffb0ff",
            "#800000",
            "#804000",
            "#808000",
            "#408000",
            "#008000",
            "#008040",
            "#008080",
            "#004080",
            "#000080",
            "#400080",
            "#800080",
            "#804080"];

        static $nextcolorid = -1;
        $nextcolorid = $nextcolorid + 1;
        static $catcolors = [];
        if (count($catcolors) == 0) {
            $database = JFactory::getDbo();
            // get current category for last 100 categories to ensure these colors are not re-used, if possible
            $query = "SELECT couleur FROM #__allevents_categories ORDER BY id DESC LIMIT 0, 100";
            $database->setQuery($query);
            $catcolors = $database->loadRowList();
        }
        while ($nextcolorid < count($newcatcolors) && in_array($newcatcolors[$nextcolorid], $catcolors)) {
            $nextcolorid += 1;
        }

        return $newcatcolors[$nextcolorid % count($newcatcolors)];
    }

    /**
     * @return stdClass
     */
    protected function loadFormData()
    {

        $params = JComponentHelper::getParams('com_allevents');

        $data = new stdClass();

        if ($params['controlpanel_showagendas']) {
            $agendas_model = JModelLegacy::getInstance('Agendas', 'AllEventsModel');
            $agenda_id = $agendas_model->GetDefaultAgendaId();
            $agenda_id = is_null($agenda_id) ? 0 : $agenda_id;
        } else {
            $agenda_id = 0;
        }
        $data->agenda_id = $agenda_id;

        if ($params['controlpanel_showactivities']) {
            $activities_model = JModelLegacy::getInstance('Activities', 'AllEventsModel');
            $activity_id = $activities_model->GetDefaultActivityIdForAgenda($agenda_id);
            $activity_id = is_null($activity_id) ? 0 : $activity_id;
        } else {
            $activity_id = 0;
        }
        $data->activity_id = $activity_id;

        if ($params['controlpanel_showpublics'] && $params['geventshow_public']) {
            $publics_model = JModelLegacy::getInstance('Publics', 'AllEventsModel');
            $public_id = $publics_model->GetDefaultPublicIdForAgenda($agenda_id);
            $public_id = is_null($public_id) ? 0 : $public_id;
        } else {
            $public_id = 0;
        }
        $data->public_id = $public_id;

        if ($params['controlpanel_showplaces']) {
            $places_model = JModelLegacy::getInstance('Places', 'AllEventsModel');
            $place_id = $places_model->GetDefaultPlaceIdForAgenda($agenda_id);
            $place_id = is_null($place_id) ? 0 : $place_id;
        } else {
            $place_id = 0;
        }
        $data->place_id = $place_id;

        if ($params['controlpanel_showressources']) {
            $ressources_model = JModelLegacy::getInstance('Ressources', 'AllEventsModel');
            $ressource_id = $ressources_model->GetDefaultRessourceIdForAgenda($agenda_id);
            $ressource_id = is_null($ressource_id) ? 0 : $ressource_id;
        } else {
            $ressource_id = 0;
        }
        $data->ressource_id = $ressource_id;

        if ($params['controlpanel_showsections']) {
            $sections_model = JModelLegacy::getInstance('Sections', 'AllEventsModel');
            $section_id = $sections_model->GetDefaultSectionId();
            $section_id = is_null($section_id) ? 0 : $section_id;
        } else {
            $section_id = 0;
        }
        $data->section_id = $section_id;

        if ($params['controlpanel_showcategories']) {
            $categories_model = JModelLegacy::getInstance('Categories', 'AllEventsModel');
            $category_id = $categories_model->GetDefaultCategoryIdForSection($section_id);
            $category_id = is_null($category_id) ? 0 : $category_id;
        } else {
            $category_id = 0;
        }
        $data->category_id = $category_id;

        return $data;
    }
}
