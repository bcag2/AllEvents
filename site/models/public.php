<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsModelPublic
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelPublic extends JModelItem
{
    /**
     * AllEventsModelPublic::getData()
     *
     * @param mixed $id
     *
     * @return array|bool|object
     * @throws Exception
     */
    public function &getData($id = null)
    {
        if ($this->_item === null) {
            $this->_item = false;

            if (empty($id)) {
                $id = $this->getState('public.id');
            }
            try {
                // Get a level row instance.
                $table = $this->getTable();
                // Attempt to load the row.
                $table->reset();
                if ($table->load($id)) {
                    // Check published state.
                    if ($published = $this->getState('filter.published')) {
                        if ($table->state != $published) {
                            return $this->_item;
                        }
                    }
                    // Convert the JTable to a clean JObject.
                    $properties = $table->getProperties(1);
                    $this->_item = ArrayHelper::toObject($properties);
                }
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
            }

        }
        if (isset($this->_item->agenda_id) && $this->_item->agenda_id != '') {
            if (is_object($this->_item->agenda_id)) {
                $this->_item->agenda_id = ArrayHelper::fromObject($this->_item->agenda_id);
            }
            $values = (is_array($this->_item->agenda_id)) ? $this->_item->agenda_id : explode(',', $this->_item->agenda_id);

            //$textValue = array();
            foreach ($values as $value) {
                $db = JFactory::getDbo();
                $query = $db->getQuery(true);
                $query->select('titre,alias')->from('`#__allevents_agenda`')->where('id = ' . (int)$value);
                $db->setQuery($query);
                $results = $db->loadObject();
                if ($results) {
                    $this->_item->agenda_titre = $results->titre;
                    $this->_item->agenda_link = JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $this->_item->agenda_id . ':' . $results->alias, false);
                }
            }
        }
        if (isset($this->_item->created_by)) {
            $this->_item->created_by = JFactory::getUser($this->_item->created_by)->name;
        }

        return $this->_item;
    }

    /**
     * AllEventsModelPublic::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Public', $prefix = 'AlleventsTable', $config = [])
    {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');

        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelPublic::checkIn()
     *
     * @param mixed $id
     *
     * @return bool
     * @throws Exception
     */
    public function checkIn($id = null)
    {
        // Get the id.
        $id = (!empty($id)) ? $id : (int)$this->getState('public.id');

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
     * AllEventsModelPublic::checkOut()
     *
     * @param mixed $id
     *
     * @return bool
     * @throws Exception
     */
    public function checkOut($id = null)
    {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int)$this->getState('public.id');

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
     * AllEventsModelPublic::getCategoryName()
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function getCategoryName($id)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('title')->from('#__categories')->where('id = ' . (int)$id);
        $db->setQuery($query);

        return $db->loadObject();
    }

    /**
     * AllEventsModelPublic::publish()
     *
     * @param mixed $id
     * @param mixed $state
     *
     * @return bool
     */
    public function publish($id, $state)
    {
        $table = $this->getTable();
        $table->reset();
        $table->load($id);
        $table->state = $state;

        return $table->store();
    }

    /**
     * AllEventsModelPublic::delete()
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
     * AllEventsModelPublic::populateState()
     *
     * @throws Exception
     */
    protected function populateState()
    {
        $id = JFactory::getApplication('com_allevents')->input->getInt('id');
        $this->setState('public.id', $id);
    }
}
