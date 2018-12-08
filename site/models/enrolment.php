<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');
use Joomla\Utilities\ArrayHelper;

/**
 * AlleventsModelEnrolmentForm
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.3
 */
class AlleventsModelEnrolment extends JModelItem
{
    /**
     * AlleventsModelEnrolment::getItemIdByAlias()
     *
     * @param mixed $alias
     *
     * @return
     */
    public function getItemIdByAlias($alias)
    {
        $table = $this->getTable();

        $table->load(['alias' => $alias]);

        return $table->id;
    }

    /**
     * AlleventsModelEnrolment::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param mixed $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Enrolment', $prefix = 'AlleventsTable', $config = [])
    {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');

        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AlleventsModelEnrolment::checkIn()
     *
     * @param null $id
     *
     * @return bool
     * @throws Exception
     */
    public function checkIn($id = null)
    {
        // Get the id.
        $id = (!empty($id)) ? $id : (int)$this->getState('enrolment.id');

        if ($id) {
            // Initialise the table
            $table = $this->getTable();

            // Attempt to check the row in.
            if (method_exists($table, 'checkIn')) {
                try {
                    $table->checkIn($id);
                } catch (Exception $e) {
                    JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                    return false;
                }
            }
        }

        return true;
    }

    /**
     * AlleventsModelEnrolment::checkOut()
     *
     * @param null $id
     *
     * @return bool
     * @throws Exception
     */
    public function checkOut($id = null)
    {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int)$this->getState('enrolment.id');

        if ($id) {

            // Initialise the table
            $table = $this->getTable();

            // Get the current user object.
            $user = JFactory::getUser();

            // Attempt to check the row out.
            if (method_exists($table, 'checkout')) {
                try {
                    $table->checkOut($user->get('id'), $id);
                } catch (Exception $e) {
                    JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                    return false;
                }
            }
        }

        return true;
    }

    /**
     * AlleventsModelEnrolment::publish()
     *
     * @param mixed $id
     * @param mixed $state
     *
     * @return bool
     */
    public function publish($id, $state)
    {
        $table = $this->getTable();
        $table->load($id);
        $table->state = $state;

        return $table->store();
    }

    /**
     * AlleventsModelEnrolment::delete()
     *
     * @param mixed $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $table = $this->getTable();

        return $table->delete($id);
    }

    /**
     * AllEventsModelEnrolment::enrol_pending()
     *
     * @param mixed $event_id
     * @param mixed $id
     * @throws Exception
     */
    public function enrol_pending($event_id, $id)
    {
        self::enrol_type($event_id, $id, 0);
    }

    /**
     * AllEventsModelEnrolment::enrol_type()
     *
     * @param int $event_id
     * @param int $id
     * @param int $enroltype
     * @param int $user_id
     *
     * @return bool
     * @throws Exception
     */
    public function enrol_type($event_id, $id, $enroltype, $user_id)
    {
        $user = JFactory::getUser();
        //$exist = false;
        $authorised = $user->authorise('core.enrolment', 'com_allevents');
        $autoEnrol = $user->authorise('core.enrolhimself', 'com_allevents');
        if ($authorised !== true) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }

        $db = JFactory::getDbo();
        $user_id = empty($user_id) ? $user->get('id') : $user_id;
        // $db->setQuery("SELECT 1 AS flag FROM `#__allevents_enrolments` WHERE (published=1) AND (id<>" . $id . ") AND (event_id=" . $event_id . ") AND (user_id=" . $user_id . ")");
        // $loaddb = $db->loadObjectList();
        // if (count($loaddb)) {
        // JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_ENROL_ALREADY_EXIST'), 'errors');
        // return false;
        // }

        $array = [];
        $jdate = new JDate('', 'UTC');

        if (!empty($id)) {
            $data = $this->getData($id);
            $array = get_object_vars($data);
        } else {
            $array['id'] = 0;
            $array['user_id'] = $user_id;
            $array['event_id'] = $event_id;
        }
        $array['enroldate'] = $jdate->format('Y-m-d H:i:s');
        $array['enroltype'] = ($enroltype == 0) && ($autoEnrol == false) ? 3 : $enroltype;
        $array['pending'] = ($autoEnrol == false) ? 1 : 0;
        $array['canceled'] = ($enroltype == 1) ? 1 : 0;
        $table = $this->getTable();

        return ($table->save($array));
    }

    /**
     * AlleventsModelEnrolment::getData()
     *
     * @param null $id
     *
     * @return array|bool|object
     */
    public function &getData($id = null)
    {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('enrolment.id');
            }

            // Get a level row instance.
            $table = $this->getTable();

            // Attempt to load the row.
            if ($table->load($id)) {
                // Check published state.
                if ($published = $this->getState('filter.published')) {
                    if ($table->state != $published) {
                        return $this->_item;
                    }
                }

                // Convert the JTable to a clean JObject.
                $properties = $table->getProperties(1);
                $this->_item = ArrayHelper::toObject($properties, 'JObject');
            }
        }

        if (isset($this->_item->created_by)) {
            $this->_item->created_by_name = JFactory::getUser($this->_item->created_by)->name;
        }

        return $this->_item;
    }

    /**
     * AllEventsModelEnrolment::getNbParticipant()
     *
     * @param mixed $event_id
     *
     * @return int
     */
    public function getNbParticipant($event_id)
    {
        $db = JFactory::getDbo();
        $query = "SELECT count(id) AS nbr FROM `#__allevents_enrolments` WHERE (published=1) AND (enroltype=0) AND (event_id=" . $event_id . ") GROUP BY event_id";
        $db->setQuery($query);
        $result = $db->loadObject();
        if (isset($result))
            return $result->nbr;
        else
            return 0;
    }

    /**
     * AllEventsModelEnrolment::enrol_companions()
     *
     * @param mixed $event_id
     * @param mixed $id
     * @param mixed $companions
     *
     * @return bool
     * @throws Exception
     */
    public function enrol_companions($event_id, $id, $companions)
    {
        $user = JFactory::getUser();
        $authorised = $user->authorise('core.enrolment', 'com_allevents');
        if ($authorised !== true) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }

        $db = JFactory::getDbo();
        $db->setQuery("SELECT 1 AS flag FROM `#__allevents_enrolments` WHERE (published=1) AND (id<>" . $id . ") AND (event_id=" . $event_id . ") AND (user_id=" . $user->get('id') . ")");
        $loaddb = $db->loadObjectList();

        if (count($loaddb)) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_ENROL_ALREADY_EXIST'), 'error');

            return false;
        }

        $array = [];
        //$jdate = new JDate('', 'UTC');

        if (!empty($id)) {
            $data = $this->getData($id);
            $array = get_object_vars($data);
        } else {
            $array['id'] = 0;
            $array['user_id'] = $user->get('id');
            $array['event_id'] = $event_id;
        }
        $array['companions'] = $companions;
        $table = $this->getTable();

        return ($table->save($array));
    }

    /**
     * AllEventsModelEnrolment::enrol_commentaire()
     *
     * @param mixed $event_id
     * @param mixed $id
     * @param mixed $commentaire
     *
     * @return bool
     * @throws Exception
     */
    public function enrol_commentaire($event_id, $id, $commentaire)
    {
        $user = JFactory::getUser();
        $authorised = $user->authorise('core.enrolment', 'com_allevents');
        if ($authorised !== true) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }

        $db = JFactory::getDbo();
        $db->setQuery("SELECT 1 AS flag FROM `#__allevents_enrolments` WHERE (published=1) AND (id<>" . $id . ") AND (event_id=" . $event_id . ") AND (user_id=" . $user->get('id') . ")");
        $loaddb = $db->loadObjectList();

        if (count($loaddb)) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_ENROL_ALREADY_EXIST'), 'error');

            return false;
        }

        $array = [];

        if (!empty($id)) {
            $data = $this->getData($id);
            $array = get_object_vars($data);
        } else {
            $array['id'] = 0;
            $array['user_id'] = $user->get('id');
            $array['event_id'] = $event_id;
        }
        $array['commentaire'] = $commentaire;
        $table = $this->getTable();

        return ($table->save($array));
    }

    /**
     * AllEventsModelEnrolment::enrol_orders()
     *
     * @param int $event_id
     * @param int $id
     * @param int $companions
     * @param int $order_id
     *
     * @return bool
     * @throws Exception
     */
    public function enrol_orders($event_id, $id = 0, $companions = 0, $order_id = 0)
    {
        $user = JFactory::getUser();
        $authorised = $user->authorise('core.enrolment', 'com_allevents');
        if ($authorised !== true) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }

        $db = JFactory::getDbo();
        $db->setQuery("SELECT 1 AS flag FROM `#__allevents_enrolments` WHERE (published=1) AND (id<>" . $id . ") AND (event_id=" . $event_id . ") AND (user_id=" . $user->get('id') . ")");
        $loaddb = $db->loadObjectList();

        if (count($loaddb)) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_ENROL_ALREADY_EXIST'), 'error');

            return false;
        }

        $array = [];
        $jdate = new JDate('', 'UTC');

        if (!empty($id)) {
            $data = $this->getData($id);
            $array = get_object_vars($data);
        } else {
            $array['id'] = 0;
            $array['user_id'] = $user->get('id');
            $array['event_id'] = $event_id;
        }
        $array['companions'] = $companions;
        $array['enroldate'] = $jdate->format('Y-m-d H:i:s');
        $array['enroltype'] = ($enroltype == 0) && ($autoEnrol == false) ? 3 : $enroltype;
        $array['order_id'] = $order_id;
        $array['pending'] = 1;
        $table = $this->getTable();

        return ($table->save($array));
    }

    /**
     * AlleventsModelEnrolment::populateState()
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since    1.6
     */
    protected function populateState()
    {
        $id = JFactory::getApplication('com_allevents')->input->getInt('id');
        $this->setState('enrolment.id', $id);
    }
}
