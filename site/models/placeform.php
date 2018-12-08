<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modelform');
jimport('joomla.event.dispatcher');

if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

/**
 * AllEventsModelPlaceForm
 *
 * @access public
 */
class AllEventsModelPlaceForm extends JModelForm
{
    var $_item = null;

    /**
     * AllEventsModelPlaceForm::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm('com_allevents.place', 'place', ['control' => 'jform', 'load_data' => $loadData]);
        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * @param array $data
     *
     * @return bool
     * @throws Exception
     */
    public function save($data)
    {
        $dispatcher = JEventDispatcher::getInstance();
        $table = $this->getTable();
        $context = $this->option . '.' . $this->name;

        if ((!empty($data['tags']) && $data['tags'][0] != '')) {
            $table->newTags = $data['tags'];
        }

        $key = $table->getKeyName();
        $pk = (!empty($data[$key])) ? $data[$key] : (int)$this->getState($this->getName() . '.id');
        $isNew = true;

        // Allow an Exception to be thrown.
        try {
            // Load the row if saving an existing record.
            if ($pk > 0) {
                $table->load($pk);
                $isNew = false;
            }
            // Bind the data.
            $table->bind($data);

            // Prepare the row for saving
            $this->prepareTable($table);

            // Check the data.
            $table->check();

            // Store the data.
            $table->store();

            $this->_id = $table->id;
            // Clean the cache.
            $this->cleanCache();
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return false;
        }

        if (isset($table->$key)) {
            $this->setState($this->getName() . '.id', $table->$key);
        }

        $this->setState($this->getName() . '.new', $isNew);

        return true;
    }

    /**
     * AllEventsModelPlaceForm::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Place', $prefix = 'AllEventsTable', $config = [])
    {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');

        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelPlace::prepareTable()
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
                $db->setQuery('SELECT MAX(ordering) FROM `#__allevents_places`');
                $max = $db->loadResult();
                $table->ordering = $max + 1;
            }
        }
    }

    /**
     * AllEventsModelPlaceForm::populateState()
     *
     * @throws Exception
     */
    protected function populateState()
    {
        $app = JFactory::getApplication('com_allevents');

        $id = $app->input->getInt('id');

        $this->setState('place.id', $id);
    }

    /**
     * AllEventsModelPlaceForm::loadFormData()
     *
     * @return array|mixed|null|object
     * @throws Exception
     */
    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.place.data', []);
        if (empty($data)) {
            $data = $this->getData();
        }

        return $data;
    }

    /**
     * AllEventsModelPlaceForm::getData()
     *
     * @param mixed $id
     *
     * @return null|object
     * @throws Exception
     */
    public function &getData($id = null)
    {
        $params = AllEventsHelperParam::getGlobalParam();
        $app = JFactory::getApplication();
        $db = JFactory::getDbo();
        if (empty($id)) {
            $id = $this->getState('place.id');
        }
        $user = JFactory::getUser();
        $user_view_levels = $user->getAuthorisedViewLevels();
        // Get a level row instance.
        $table = $this->getTable();
        // Attempt to load the row.
        $table->reset();
        try {
            if ($table->load($id)) {
                $id = $table->id;
                $canEdit = $user->authorise('core.edit', 'com_allevents') || $user->authorise('core.create', 'com_allevents');
                if (!$canEdit && $user->authorise('core.edit.own', 'com_allevents.' . $id)) {
                    $canEdit = $user->get('id') == $table->created_by;
                }

                if (!$canEdit) {
                    $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
                }
                // Check published state.
                if ($published = $this->getState('filter.published')) {
                    if ($table->state != $published) {
                        return $this->_item;
                    }
                }
            }
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
        }

        return $this->_item;
    }
}