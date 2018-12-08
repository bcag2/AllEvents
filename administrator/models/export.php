<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsModelExport
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelExport extends JModelList
{
    /**
     * AllEventsModelExport::__construct()
     * Constructor.
     *
     * @param array $config An optional associative array of configuration settings.
     *
     * @see JController
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'id',
                'a.id'
            ];
        }

        parent::__construct($config);
    }

    /**
     * AllEventsModelExport::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.export', 'export', ['control' => 'jform', 'load_data' => $loadData]);

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelExport::getCSV()
     * Returns a CSV file with Events data
     *
     * @return boolean
     */
    public function getCSVevents()
    {
        $this->populateState();
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select('a.*');
        $query->from('#__allevents_events AS a');

        if (!empty($startdate)) {
            // note: open date is always after $startdate
            $query->where('((a.date IS NULL) OR (DATEDIFF(IF (a.enddate IS NOT NULL, a.enddate, a.date), ' . $db->quote($startdate) . ') >= 0))');
        }

        if (!empty($enddate)) {
            // note: open date is before $enddate as long as $enddate is not before today
            $query->where('(( AND (DATEDIFF(CURDATE(), ' . $db->quote($enddate) . ') <= 0)) OR (DATEDIFF(a.date, ' . $db->quote($enddate) . ') <= 0))');
        }

        // check if specific category's have been selected
        if (!empty($at)) {
            ArrayHelper::toInteger($at);
            $query->where('(a.agenda_id IN (' . implode(',', $at) . '))');
        }

        $db->setQuery($query);
        $items = $db->loadObjectList();

        $csv = fopen('php://output', 'w');
        fputs($csv, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        $header = array_keys($db->getTableColumns('#__allevents_events'));
        fputcsv($csv, $header, ';');
        foreach ($items as $lines) {
            fputcsv($csv, (array)$lines, ';', '"');
        }

        return fclose($csv);

    }

    /**
     * AllEventsModelExport::populateState()
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @param mixed $ordering
     * @param mixed $direction
     *
     * @return void
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');

        // Load the filter state.
        $filter_form_type = $app->getUserStateFromRequest($this->context . '.filter.form_type', 'filter_form_type');
        $this->setState('filter.form_type', $filter_form_type);

        $filter_start_date = $app->getUserStateFromRequest($this->context . '.filter.start_date', 'filter_start_date');
        $this->setState('filter.start_date', $filter_start_date);

        $filter_end_date = $app->getUserStateFromRequest($this->context . '.filter.end_date', 'filter_end_date');
        $this->setState('filter.end_date', $filter_end_date);

        // Load the parameters.
        $params = JComponentHelper::getParams('com_allevents');
        $this->setState('params', $params);

        // List state information.
        parent::populateState('a.titre', 'asc');
    }

    /**
     * AllEventsModelExport::getCSVcats()
     * Returns a CSV file with Categories data
     *
     * @return boolean
     */
    public function getCSVcategories()
    {
        $this->populateState();
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select('a.*');
        $query->from('#__allevents_categories AS a');
        $db->setQuery($query);
        $items = $db->loadObjectList();

        $csv = fopen('php://output', 'w');
        fputs($csv, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        $header = array_keys($db->getTableColumns('#__allevents_categories'));
        fputcsv($csv, $header, ';');
        foreach ($items as $lines) {
            fputcsv($csv, (array)$lines, ';', '"');
        }

        return fclose($csv);
    }

    /**
     * AllEventsModelExport::getCSVagendas()
     * Returns a CSV file with Agendas / Calendars data
     *
     * @return boolean
     */
    public function getCSVagendas()
    {
        $this->populateState();
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query->select('a.*');
        $query->from('#__allevents_agenda AS a');
        $db->setQuery($query);
        $items = $db->loadObjectList();

        $csv = fopen('php://output', 'w');
        fputs($csv, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        $header = array_keys($db->getTableColumns('#__allevents_agenda'));
        fputcsv($csv, $header, ';');
        foreach ($items as $lines) {
            fputcsv($csv, (array)$lines, ';', '"');
        }

        return fclose($csv);
    }

    /**
     * AllEventsModelExport::getCSVvenues()
     * Returns a CSV file with Venues data
     *
     * @return boolean
     */
    public function getCSVplaces()
    {
        $this->populateState();
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('#__allevents_places AS a');
        $db->setQuery($query);
        $items = $db->loadObjectList();

        $csv = fopen('php://output', 'w');
        fputs($csv, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        $header = array_keys($db->getTableColumns('#__allevents_places'));
        fputcsv($csv, $header, ';');
        foreach ($items as $lines) {
            fputcsv($csv, (array)$lines, ';', '"');
        }

        return fclose($csv);
    }

    /**
     * AllEventsModelExport::getListQuery()
     * Build an SQL query to load the Events data.
     *
     * @return JDatabaseQuery
     * @throws Exception
     */
    protected function getListQuery()
    {

        // Retrieve variables
        $jinput = JFactory::getApplication()->input;
        $startdate = $jinput->get('dates', '', 'string');
        $enddate = $jinput->get('enddates', '', 'string');
        $cats = $jinput->get('cid', [], 'array');

        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('`#__allevents_events` AS a');
        // $query->join('LEFT', '#__allevents_cats_event_relations AS rel ON rel.itemid = a.id');
        // $query->join('LEFT', '#__allevents_categories AS c ON c.id = rel.catid');

        // check if startdate and/or enddate are set.
        if (!empty($startdate)) {
            // note: open date is always after $startdate
            $query->where('((a.dates IS NULL) OR (DATEDIFF(IF (a.enddates IS NOT NULL, a.enddates, a.dates), ' . $db->quote($startdate) . ') >= 0))');
        }
        if (!empty($enddate)) {
            // note: open date is before $enddate as long as $enddate is not before today
            $query->where('(((a.dates IS NULL) AND (DATEDIFF(CURDATE(), ' . $db->quote($enddate) . ') <= 0)) OR (DATEDIFF(a.dates, ' . $db->quote($enddate) . ') <= 0))');
        }

        // check if specific category's have been selected
        if (!empty($cats)) {
            ArrayHelper::toInteger($cats);
            $query->where('  c.id IN (' . implode(',', $cats) . ')');
        }

        // Group the query
        $query->group('a.id');

        return $query;
    }
}
