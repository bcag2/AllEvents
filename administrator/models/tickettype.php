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
 * AllEventsModelTickettype
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelTickettype extends JModelAdmin
{
    protected $text_prefix = 'COM_ALLEVENTS';

    /**
     * AllEventsModelTickettype::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.tickettype', 'tickettype', ['control' => 'jform', 'load_data' => $loadData]);

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelTickettype::validate()
     *
     * @param mixed $form
     * @param mixed $data
     * @param mixed $group
     *
     * @return bool|mixed
     * @throws Exception
     */
    public function validate($form, $data, $group = null)
    {
        //$id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('tickettype.id');
        //$user = JFactory::getUser();
        //$jdate = new JDate('', 'UTC');

        if (empty($data['event_id'])) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_EVENT_REQUIRED'), 'warning');

            return false;
        }

        return parent::validate($form, $data, $group);
    }

    /**
     * AllEventsModelTickettype::enable()
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
            $query = 'UPDATE #__allevents_tickettypes SET published = ' . (int)$state . ' WHERE id IN ( ' . implode(',', $cid) . ' )';
            $this->_db->setQuery($query);
            try {
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
        $user = JFactory::getUser();
        $authorised = $user->authorise('core.tickettype', 'com_allevents');

        if ($authorised !== true) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }

        // Get Event ID from the result back to the Table after saving.
        $table = $this->getTable();

        if ($table->save($data) === true) {
            return true;
        } else {
            $data['id'] = null;

            return false;
        }
    }

    /**
     * AllEventsModelTickettype::getTable()
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
    public function getTable($type = 'Tickettype', $prefix = 'AllEventsTable', $config = [])
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelTickettype::loadFormData()
     *
     * @return array|mixed
     * @throws Exception
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.tickettype.data', []);

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
     * AllEventsModelTickettype::getItem()
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
     * AllEventsModelTickettype::prepareTable()
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
                $db->setQuery('SELECT MAX(ordering) FROM #__allevents_tickettypes');
                $max = $db->loadResult();
                $table->ordering = $max + 1;
            }
        }
    }
}
