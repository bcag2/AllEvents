<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');
jimport('joomla.filter.output');
use Joomla\Utilities\ArrayHelper;

// €#€
if (!class_exists('AllEventsCustomfields'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aecustomfields.php';
// €#€

/**
 * AllEventsModelEnrolment
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelEnrolment extends JModelAdmin
{
    protected $text_prefix = 'COM_ALLEVENTS';

    /**
     * AllEventsModelEnrolment::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.enrolment', 'enrolment', ['control' => 'jform', 'load_data' => $loadData]);

        if ($form->getFieldAttribute('lastmod', 'default') == 'NOW') {
            $form->setFieldAttribute('lastmod', 'default', date('Y-m-d H:i:s'));
        }

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelEnrolment::validate()
     *
     * @param mixed $form
     * @param mixed $data
     * @param mixed $group
     *
     * @return mixed
     * @throws Exception
     */
    public function validate($form, $data, $group = null)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('enrolment.id');
        $user = JFactory::getUser();
        $jdate = new JDate('', 'UTC');
        $app = JFactory::getApplication();

        if (empty($data['event_id'])) {
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_EVENT_REQUIRED'), 'warning');

            return false;
        }

        $db = $this->getDbo();
        $db->setQuery("SELECT 1 AS flag FROM `#__allevents_enrolments` WHERE (published=1) AND (id<>" . $data['id'] . ") AND (event_id=" . $data['event_id'] . ") AND (user_id=" . $data['user_id'] . ")");
        $loaddb = $db->loadObjectList();
        $exist = (count($loaddb)) ? true : false;

        if ($exist) {
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_ENROL_ALREADY_EXIST'), 'warning');

            return false;
        }

        if ($id == 0) {
            $data['proposed_by'] = !empty($data['proposed_by']) ? $data['proposed_by'] : $user->get('id');
            $data['created_by'] = $user->get('id');
            $data['created_date'] = $jdate->format('Y-m-d H:i:s');
            $data['version'] = 0;
            if (isset($data['alias']) == false) {
                $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
            }
        }

        if ($data['alias'] == "") {
            $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
        }

        $data['lastmod_by'] = $user->get('id');
        $data['lastmod'] = $jdate->format('Y-m-d H:i:s');
        $data['version'] = $data['version'] + 1;
        $data['enroldate'] = $jdate->format('Y-m-d H:i:s');

        return parent::validate($form, $data, $group);
    }

    /**
     * AllEventsModelEnrolment::getNbParticipant()
     *
     * @param mixed $event_id
     *
     * @return mixed
     */
    public function getNbParticipant($event_id)
    {
        $db = $this->getDbo();

        $query = "SELECT count(id) AS nbr FROM `#__allevents_enrolments` WHERE (published=1) AND (event_id=" . $event_id . ") GROUP BY event_id";
        $db->setQuery($query);

        return $db->loadObject();
    }

    /**
     * AllEventsModelEnrolment::getEnrolmentsContacts()
     *
     * @param mixed $cid
     *
     * @return mixed
     */
    public function getEnrolmentsContacts($cid)
    {
        $db = $this->getDbo();

        $db->setQuery("SELECT DISTINCT event_id, contact_id, user_id FROM `#__allevents_enrolments` WHERE AND (published=1) AND event_id IN ( " . $cid . " )");
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AllEventsModelEnrolment::getEnrolmentsContact()
     *
     * @param mixed $cid
     *
     * @return mixed
     */
    public function getEnrolmentsContact($cid)
    {
        $db = $this->getDbo();

        $db->setQuery("SELECT DISTINCT event_id, contact_id, user_id FROM `#__allevents_enrolments` WHERE (published=1) AND id IN ( " . $cid . " )");
        $loaddb = $db->loadObjectList();

        return $loaddb;
    }

    /**
     * AllEventsModelEnrolment::enable()
     *
     * @param mixed $cid
     * @param mixed $state
     *
     * @return bool
     * @throws Exception
     */
    public function enable($cid, $state)
    {
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $query = 'UPDATE `#__allevents_enrolments` SET published = ' . (int)$state . ' WHERE id IN ( ' . implode(',', $cid) . ' )';
            try {
                $this->_db->setQuery($query);
                $this->_db->execute();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        return true;
    }

    /**
     * AllEventsModelEnrolment::approved()
     *
     * @param mixed $cid
     *
     * @return bool
     * @throws Exception
     */
    public function approved($cid)
    {
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $query = 'UPDATE #__allevents_enrolments SET pending = 0, enroltype=0 WHERE id IN ( ' . implode(',', $cid) . ' )';
            try {
                $this->_db->setQuery($query);
                $this->_db->execute();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        return true;
    }

    /**
     * AllEventsModelEnrolment::unapproved()
     *
     * @param mixed $cid
     *
     * @return bool
     * @throws Exception
     */
    public function unapproved($cid)
    {
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $query = 'UPDATE #__allevents_enrolments SET enroltype=1 WHERE id IN ( ' . implode(',', $cid) . ' )';
            try {
                $this->_db->setQuery($query);
                $this->_db->execute();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        return true;
    }

    /**
     * Method to save the form data.
     *
     * @param   array $data The form data.
     *
     * @return  boolean  True on success.
     *
     * @throws Exception
     * @since    3.5.6
     */
    public function save($data)
    {
        $app = JFactory::getApplication();
        // ###
        if ($app->input->getString('task') == 'delete') {
            AllEventsCustomfields::deleteData('enrol', $data['id']);
        }
        // ###

        $user = JFactory::getUser();
        $authorised = $user->authorise('core.enrolment', 'com_allevents');

        if ($authorised !== true) {
            $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }

        // Get Event ID from the result back to the Table after saving.
        $table = $this->getTable();

        if ($table->save($data) === true) {
            $data['id'] = $table->id;
            // Save Custom Fields to database
            if (isset($data['custom_fields']) && is_array($data['custom_fields'])) {
                AllEventsCustomfields::saveToData($data['custom_fields'], 'enrol', $data['id']);
            }

            return true;
        } else {
            $data['id'] = null;

            return false;
        }
    }

    /**
     * AllEventsModelEnrolment::getTable()
     * Returns a reference to the a Table object, always creating it.
     *
     * @param string|The $type
     * @param string $prefix A prefix for the table class name. Optional.
     * @param array $config Configuration array for model. Optional.
     *
     * @return JTable A database object
     * @internal param The $type table type to instantiate
     * @since    3.4.0
     */
    public function getTable($type = 'Enrolment', $prefix = 'AllEventsTable', $config = [])
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelEnrolment::loadFormData()
     *
     * @return array|mixed
     * @throws Exception
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.enrolment.data', []);

        if (empty($data)) {
            $data = $this->getItem();
            if (isset($data) && !empty($data)) {
                // Support for multiple or not foreign key field: event_id
                $array = [];
                foreach ((array )$data->event_id as $value):
                    if (!is_array($value)):
                        $array[] = $value;
                    endif;
                endforeach;
                $data->event_id = implode(',', $array);
            }
        }

        return $data;
    }

    /**
     * AllEventsModelEnrolment::getItem()
     *
     * @param mixed $pk
     *
     * @return mixed
     */
    public function getItem($pk = null)
    {
        if ($item = parent::getItem($pk)) {
            // Do any procesing on fields here if needed
        }

        $db = $this->getDbo();
        if (isset($item->event_id) && is_numeric($item->event_id) && ($item->event_id > 0)) {
            $item->is_pasted = true;
            $db->setQuery("SELECT 1 AS flag FROM `#__allevents_events` WHERE (DATE_FORMAT(date,'%Y%m%d') >= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d')) AND (id=" . $item->event_id . ")");
            $loaddb = $db->loadObjectList();
            $item->is_pasted = (count($loaddb)) ? false : true;
        } else {
            $item->is_pasted = false;
        }

        return $item;
    }

    /**
     * AllEventsModelEnrolment::prepareTable()
     *
     * @param mixed $table
     */
    protected function prepareTable($table)
    {
        jimport('joomla.filter.output');

        if (empty($table->id)) {
            // Set ordering to the last item if not set
            if (@$table->ordering === '') {
                $db = $this->getDbo();
                $db->setQuery('SELECT MAX(ordering) FROM #__allevents_enrolments');
                $max = $db->loadResult();
                $table->ordering = $max + 1;
            }
        }
    }
}
