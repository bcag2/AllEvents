<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');
jimport('joomla.filter.output');
use Joomla\String\StringHelper;

/**
 * AllEventsModelCustomfield
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelCustomfield extends JModelAdmin
{
    protected $text_prefix = 'COM_ALLEVENTS';

    /**
     * AllEventsModelCustomfield::getTable()
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
    public function getTable($type = 'Customfield', $prefix = 'AllEventsTable', $config = [])
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelCustomfield::getForm()
     * Method to get the record form.
     *
     * @param    array $data An optional array of data for the form to interogate.
     * @param    boolean $loadData True if the form is to load its own data (default case), false if not.
     *
     * @return bool|JForm
     * @since    3.4.0
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.customfield', 'customfield', ['control' => 'jform', 'load_data' => $loadData]);

        if ($form->getFieldAttribute('lastmod', 'default') == 'NOW') {
            $form->setFieldAttribute('lastmod', 'default', date('Y-m-d H:i:s'));
        }
        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelCustomfield::loadFormData()
     * Method to get the data that should be injected in the form.
     *
     * @return    mixed    The data for the form.
     * @throws Exception
     * @since    3.4.0
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.customfield.data', []);
        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

    /**
     * AllEventsModelCustomfield::getItem()
     * Method to get a single record.
     *
     * @param    integer    The id of the primary key.
     *
     * @return    mixed    Object on success, false on failure.
     * @since    3.4.0
     */
    public function getItem($pk = null)
    {
        if ($item = parent::getItem($pk)) {
            //Do any procesing on fields here if needed
        }

        return $item;
    }

    /**
     * AllEventsModelCustomfield::prepareTable()
     * Prepare and sanitise the table prior to saving.
     *
     * @since    3.4.0
     *
     * @param JTable $table
     *
     * @throws Exception
     */
    protected function prepareTable($table)
    {
        $app = JFactory::getApplication();

        $date = JFactory::getDate();
        $user = JFactory::getUser();

        if (empty($table->id)) {
            // Set the values
            $table->created_date = $date->toSql();

            // Set ordering to the last item if not set
            if (empty($table->ordering)) {
                $db = JFactory::getDbo();
                $query = $db->getQuery(true)->select('MAX(ordering)')->from($db->quoteName('#__allevents_customfields'));
                $db->setQuery($query);
                $max = $db->loadResult();

                $table->ordering = $max + 1;
            }
        } else {
            // Set the values
            $table->lastmod = $date->toSql();
            $table->lastmod_by = $user->get('id');
        }

        // Alter the title for save as copy
        if ($app->input->getString('task') == 'save2copy') {
            $table->titre = StringHelper::increment($table->titre);
            $table->alias = StringHelper::increment($table->alias, 'dash');
            $table->slug = StringHelper::increment($table->slug, 'underscore');
            $table->state = '0';
        }
    }
}
