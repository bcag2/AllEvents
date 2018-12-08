<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerImport
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerImport extends JControllerAdmin
{
    /**
     * AllEventsControllerImport::saveOrderAjax()
     *
     * @throws Exception
     */
    public function saveOrderAjax()
    {
        // Get the input
        $input = JFactory::getApplication()->input;
        $pks = $input->post->get('cid', [], 'array');
        $order = $input->post->get('order', [], 'array');
        // Sanitize the input
        ArrayHelper::toInteger($pks);
        ArrayHelper::toInteger($order);
        // Get the model
        $model = $this->getModel();
        // Save the ordering
        $return = $model->saveorder($pks, $order);

        if ($return) {
            echo "1";
        }
        // Close the application
        JFactory::getApplication()->close();
    }

    /**
     * AllEventsControllerImport::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'import', $prefix = 'AllEventsModel', $config = [])
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }

    /**
     * AllEventsControllerImport::importical()
     *
     * @throws Exception
     */
    function importical()
    {
        $model = $this->getModel();
        $jinput = JFactory::getApplication()->input;
        $dataform = JComponentHelper::filterText($jinput->post->get('jform', '', 'raw'));
        if (!$model->importical($dataform)) {
            JFactory::getApplication()->enqueueMessage($model->getError(), "error");
        }
        // JFactory::getApplication()->close() ;
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=import&layout=importical', false));
    }

    /**
     * AllEventsControllerImport::cancel()
     *
     * @throws Exception
     */
    public function cancel()
    {
        $this->setRedirect(JRoute::_('index.php?option=com_allevents', false));
    }

    /**
     * AllEventsControllerImport::importicsv()
     * Imports events from a CSV file and saves them to the DB
     *
     * @throws Exception
     * @internal param string $key
     * @internal param string $urlVar
     */
    function importicsv()
    {
        $app = JFactory::getApplication();
        $db = JFactory::getDbo();
        $msg = '';
        $count = 0;
        $today = date('Y-m-d');
        $fileType = $_FILES['jform']['type']['csvfile'];

        $data = $app->input->get('jform', [], 'array');

        if (!empty($_FILES) && (($fileType == "application/octet-stream") || ($fileType == "application/vnd.ms-excel") || ($fileType == "text/plain") || ($fileType == "text/csv"))) {
            $filename = $_FILES['jform']['name']['csvfile'];
            $tmpName = $_FILES['jform']['tmp_name']['csvfile'];
            $path = JPATH_SITE . '/cache/';
            if (is_writable($path)) {
                if (!move_uploaded_file($tmpName, $path . $filename)) {
                    $msg = '<span class="error">' . JText::_('COM_ALLEVENTS_IMPORT_ERROR_UPLOAD_FAILED') . ": " . $_FILES['jform']['error']['csvfile'] . '</span><br>\n';
                } else {
                    $start_dt_column = $data['start_dt'];
                    $end_dt_column = $data['end_dt'];
                    $start_time_column = $data['start_time'];
                    $end_time_column = $data['end_time'];
                    $event_titre_column = $data['titre'];
                    $agenda_column = $data['agenda'];

                    $delim = $data['delimiter'];
                    $offset = $data['record_number'];
                    $agenda_id = $data['agenda_id'];

                    $offset = $offset - 1; // an array starts at 0 instead of 1
                    $start_dt_column = $start_dt_column - 1;
                    $end_dt_column = $end_dt_column - 1;
                    $start_time_column = $start_time_column - 1;
                    $end_time_column = $end_time_column - 1;
                    $event_titre_column = $event_titre_column - 1;
                    $agenda_column = $agenda_column - 1;

                    $content = file($path . $filename);

                    if (sizeof($content) > 0) {
                        for ($i = $offset; $i < sizeof($content); $i++) {

                            $event = explode($delim, $content[$i]);

                            $event[$event_titre_column] = ltrim(rtrim($event[$event_titre_column]));

                            $start_dt = date('Y-m-d', strtotime($event[$start_dt_column]));
                            $end_dt = date('Y-m-d', strtotime($event[$end_dt_column]));
                            $event[$start_dt_column] = ltrim(rtrim($start_dt));
                            $event[$end_dt_column] = ltrim(rtrim($end_dt));

                            if ($event[$start_time_column] != '' && $event[$start_time_column] != '0') {
                                $start_time = date('H:i', strtotime($today . ' ' . $event[$start_time_column]));
                            } else {
                                $start_time = null;
                            }
                            if ($event[$end_time_column] != '' && $event[$end_time_column] != '0') {
                                $end_time = date('H:i', strtotime($today . ' ' . $event[$end_time_column]));
                            } else {
                                $end_time = null;
                            }
                            $event[$start_time_column] = ltrim(rtrim($start_time));
                            $event[$end_time_column] = ltrim(rtrim($end_time));

                            $event[$agenda_column] = ltrim(rtrim($event[$agenda_column]));

                            // Category: if it's not numeric, try to guess the category ID from the description.
                            if (!is_numeric($event[$agenda_column])) {
                                $catQuery = $db->getQuery(true);
                                $catQuery->select('MAX(id) AS id')->from('#__allevents_agenda')->where('titre = \'' . $event[$agenda_column] . '\'')->group('titre');

                                $db->setQuery($catQuery);
                                $data = $db->loadRow();
                                if (sizeof($data) > 0) {
                                    $event[$agenda_column] = $data[0];
                                }
                            } else {
                                if ($event[$agenda_column] == null || $event[$agenda_column] == '') {
                                    $event[$agenda_column] = $agenda_id;
                                }
                            }

                            $event[$event_titre_column] = str_replace('"', '', utf8_encode($event[$event_titre_column]));
                            $event[$start_dt_column] = str_replace('"', '', $event[$start_dt_column]);
                            $event[$end_dt_column] = str_replace('"', '', $event[$end_dt_column]);
                            $event[$start_time_column] = str_replace('"', '', $event[$start_time_column]);
                            $event[$end_time_column] = str_replace('"', '', $event[$end_time_column]);
                            $event[$agenda_column] = str_replace('"', '', utf8_encode($event[$agenda_column]));

                            // Formatting dates and times
                            if ($event[$end_dt_column] == '' || $event[$end_dt_column] == date('Y-m-d', strtotime('1970-01-01'))) {
                                $event[$end_dt_column] = null;
                            }
                            if ($event[$start_time_column] == '' || $event[$start_time_column] == date('H:s', strtotime('00:00'))) {
                                $event[$start_time_column] = null;
                            }
                            if ($event[$end_time_column] == '' || $event[$end_time_column] == date('H:s', strtotime('00:00'))) {
                                $event[$end_time_column] = null;
                            }
                            $event[$date_column] = ($event[$start_dt_column] == null) ? null : $event[$start_dt_column];
                            $event[$date_column] = ($event[$start_time_column] == null) ? $event[$date_column] : $event[$date_column] . ' ' . $event[$start_time_column];
                            $event[$enddate_column] = ($event[$end_dt_column] == null) ? null : $event[$end_dt_column];
                            $event[$enddate_column] = ($event[$end_time_column] == null) ? $event[$enddate_column] : $event[$enddate_column] . ' ' . $event[$end_time_column];


                            //==> model event.save($data : $data['date']=...)
                            if (!empty($event[$event_titre_column])) {
                                $columnsArray = [
                                    'titre',
                                    'date',
                                    'enddate',
                                    'agenda_id'];

                                $valuesArray = [
                                    $db->quote($event[$event_titre_column]),
                                    $db->quote($event[$date_column]),
                                    $event[$enddate_column] == null || $event[$enddate_column] == '' || $event[$enddate_column] == '0' ? 'null' : $db->quote($event[$enddate_column]),
                                    $event[$agenda_column] == null ? $db->quote($agenda_id) : $db->quote($event[$agenda_column])];

                                $query = $db->getQuery(true);

                                $query->insert($db->quoteName('#__simplecalendar'))->columns($db->quoteName($columnsArray))->values(implode(',', $valuesArray));

                                $db->setQuery($query);
                                $db->execute();
                                $error = 0;
                                try {
                                    $db->setQuery($query);
                                    $db->execute();
                                } catch (RuntimeException $e) {
                                    $error = $e->getCode();
                                    $msg = $e->getMessage();
                                }

                                if ($error) {
                                    if ($error == 1062) {
                                        $msg = JText::_('COM_ALLEVENTS_IMPORT_ERROR_EVENT_EXISTS') . ": " . $event['titre'];
                                    } else {
                                        $msg = $msg . "<br />\n";
                                    }
                                } else {
                                    $count++;
                                }
                            }
                        }
                    } else {
                        $msg = JText::_('COM_ALLEVENTS_IMPORT_ERROR_FILE_EMPTY');
                    }

                    if (!unlink($path . $filename)) {
                        $msg = JText::_('COM_ALLEVENTS_IMPORT_ERROR_DELETING_FILE') . ": " . $path . " | " . $filename;
                    }
                }
            } else {
                $msg = JText::_('COM_ALLEVENTS_IMPORT_FOLDER_NOT_WRITABLE');
            }
        } else {
            $msg = JText::_('JERROR_AN_ERROR_HAS_OCCURRED');
        }

        if ($msg == '') {
            $msg = $count . ' ' . JText::_('COM_ALLEVENTS_IMPORT_N_EVENTS_SUCCESSFULLY_IMPORTED');
        }
        $link = 'index.php?option=com_allevents&view=events';
        $this->setRedirect($link, $msg);
    }
}
