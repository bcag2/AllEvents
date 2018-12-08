<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');
jimport('joomla.filter.output');
use Joomla\String\StringHelper;
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsModelCategory
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelCategory extends JModelAdmin
{
    protected $text_prefix = 'COM_ALLEVENTS';
    protected $_id;

    /**
     * AllEventsModelCategory::getId()
     *
     * @return
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * AllEventsModelCategory::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.category', 'category', ['control' => 'jform', 'load_data' => $loadData]);

        if ($form->getFieldAttribute('lastmod', 'default') == 'NOW') {
            $form->setFieldAttribute('lastmod', 'default', date('Y-m-d H:i:s'));
        }
        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelCategory::validate()
     *
     * @param mixed $form
     * @param mixed $data
     * @param mixed $group
     *
     * @return mixed
     */
    public function validate($form, $data, $group = null)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('category.id');
        $user = JFactory::getUser();
        $jdate = new JDate('', 'UTC');

        if ($id == 0) {
            $data['proposed_by'] = !empty($data['proposed_by']) ? $data['proposed_by'] : $user->get('id');
            $data['created_by'] = $user->get('id');
            $data['created_date'] = $jdate->format('Y-m-d H:i:s');
            $data['version'] = 0;
            if (isset($data['alias']) == false) {
                $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
            }
            if (empty($data['vignette'])) {
                $data['vignette'] = 'images/com_allevents/bullets/category.png';
            }
        }
        if ($data['alias'] == "") {
            $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
        }

        $data['lastmod_by'] = $user->get('id');
        $data['lastmod'] = $jdate->format('Y-m-d H:i:s');
        $data['version'] = $data['version'] + 1;

        return parent::validate($form, $data, $group);
    }

    /**
     * AllEventsModelCategory::featured()
     *
     * @param mixed $cid
     *
     * @return bool
     * @throws Exception
     */
    public function featured($cid)
    {
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $cids = implode(',', $cid);
            $query = 'UPDATE `#__allevents_categories` SET `default` = 1 WHERE id IN ( ' . $cids . ' )';
            $this->_db->setQuery($query);
            try {
                $this->_db->execute();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
            $query = 'UPDATE `#__allevents_categories` SET `default` = 0 WHERE id NOT IN ( ' . $cids . ' )';
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
     * AllEventsModelCategory::unfeatured()
     *
     * @param mixed $cid
     *
     * @return bool
     * @throws Exception
     */
    public function unfeatured($cid)
    {
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $cids = implode(',', $cid);
            $query = 'UPDATE `#__allevents_categories` SET `default` = 0 WHERE id IN ( ' . $cids . ' )';
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
     * AllEventsModelCategory::duplicate()
     *
     * @param mixed $pks
     *
     * @return bool
     * @throws Exception
     */
    public function duplicate(&$pks)
    {
        $user = JFactory::getUser();
        $jdate = new JDate('', 'UTC');
        // Access checks.
        if (!$user->authorise('core.satellites', 'com_allevents')) {
            throw new Exception(JText::_('JERROR_CORE_CREATE_NOT_PERMITTED'));
        }

        $table = $this->getTable();

        foreach ($pks as $pk) {
            try {
                $table->reset();
                $table->load($pk, true);
                // Reset the id to create a new record.
                $table->id = 0;
                // Alter the titre.
                $m = null;
                if (preg_match('#\((\d+)\)$#', $table->titre, $m)) {
                    $table->titre = preg_replace('#\(\d+\)$#', '(' . ($m[1] + 1) . ')', $table->titre);
                }

                $data = $this->genereNouveauTitre($table->titre);
                $table->titre = $data[0];

                $table->created_by = $user->get('id');
                $table->created_date = $jdate->format('Y-m-d H:i:s');
                $table->alias = StringHelper::increment($table->titre, 'dash');
                $table->lastmod_by = $user->get('id');
                $table->lastmod = $jdate->format('Y-m-d H:i:s');
                $table->version = 1;
                $table->default = 0;

                $table->check();
                $table->store();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }
        // Clear modules cache
        $this->cleanCache();

        return true;
    }

    /**
     * AllEventsModelCategory::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Category', $prefix = 'AllEventsTable', $config = [])
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to change the title.
     *
     * @param   string $title The title.
     *
     * @return  array  Contains the modified title.
     *
     * @since   2.5
     */
    protected function genereNouveauTitre($title)
    {
        $table = $this->getTable();
        while ($table->load(['titre' => $title])) {
            $title = StringHelper::increment($title);
        }

        return [$title];
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

        // Include the plugins for the save events.
        JPluginHelper::importPlugin($this->events_map['save']);

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

            // Trigger the before save event.
            $dispatcher->trigger($this->event_before_save, [
                $context,
                $table,
                $isNew]);

            // Store the data.
            $table->store();
            $this->_id = $table->id;
            // Clean the cache.
            $this->cleanCache();

            // Trigger the after save event.
            $dispatcher->trigger($this->event_after_save, [
                $context,
                $table,
                $isNew]);
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return false;
        }

        if (isset($table->$key)) {
            $this->setState($this->getName() . '.id', $table->$key);
        }

        $this->setState($this->getName() . '.new', $isNew);

        if ($this->associationsContext && JLanguageAssociations::isEnabled()) {
            $associations = $data['associations'];

            // Unset any invalid associations
            $associations = Joomla\Utilities\ArrayHelper::toInteger($associations);

            // Unset any invalid associations
            foreach ($associations as $tag => $id) {
                if (!$id) {
                    unset($associations[$tag]);
                }
            }

            // Show a notice if the item isn't assigned to a language but we have associations.
            if ($associations && ($table->language == '*')) {
                JFactory::getApplication()->enqueueMessage(JText::_(strtoupper($this->option) . '_ERROR_ALL_LANGUAGE_ASSOCIATED'), 'notice');
            }

            // Adding self to the association
            $associations[$table->language] = (int)$table->$key;

            // Deleting old association for these items
            $db = $this->getDbo();
            $query = $db->getQuery(true)->delete($db->qn('#__associations'))->where($db->qn('context') . ' = ' . $db->quote($this->associationsContext))->where($db->qn('id') . ' IN (' . implode(',', $associations) . ')');
            $db->setQuery($query);
            $db->execute();

            if ((count($associations) > 1) && ($table->language != '*')) {
                // Adding new association for these items
                $key = md5(json_encode($associations));
                $query = $db->getQuery(true)->insert('#__associations');

                foreach ($associations as $id) {
                    $query->values(((int)$id) . ',' . $db->quote($this->associationsContext) . ',' . $db->quote($key));
                }

                $db->setQuery($query);
                $db->execute();
            }
        }

        return true;
    }

    /**
     * AllEventsModelCategory::prepareTable()
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
                $db->setQuery('SELECT MAX(ordering) FROM #__allevents_categories');
                $max = $db->loadResult();
                $table->ordering = $max + 1;
            }
        }
    }

    /**
     * AllEventsModelCategory::loadFormData()
     *
     * @return array|mixed
     * @throws Exception
     */
    protected function loadFormData()
    {
        $params = JComponentHelper::getParams('com_allevents');

        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.category.data', []);

        if (empty($data)) {
            $data = $this->getItem();

            // Get default Section
            if ($params['controlpanel_showsections']) {
                if (is_null($data->section_id)) {
                    $sections_model = JModelLegacy::getInstance('Sections', 'AllEventsModel');
                    $section_id = $sections_model->GetDefaultSectionId();
                    $data->section_id = is_null($section_id) ? 0 : $section_id;
                }
            } else {
                $data->section_id = 0;
            }
        }

        return $data;
    }

    /**
     * AllEventsModelCategory::getItem()
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

        return $item;
    }
}
