<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');
jimport('joomla.filter.output');
use Joomla\String\StringHelper;
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
class AllEventsModelPublic extends JModelAdmin
{
    protected $text_prefix = 'COM_ALLEVENTS';

    /**
     * AllEventsModelPublic::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.public', 'public', ['control' => 'jform', 'load_data' => $loadData]);

        if ($form->getFieldAttribute('lastmod', 'default') == 'NOW') {
            $form->setFieldAttribute('lastmod', 'default', date('Y-m-d H:i:s'));
        }
        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelPublic::validate()
     *
     * @param mixed $form
     * @param mixed $data
     * @param mixed $group
     *
     * @return mixed
     */
    public function validate($form, $data, $group = null)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('public.id');
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
     * AllEventsModelPublic::featured()
     *
     * @param mixed $cid
     *
     * @return bool
     * @throws Exception
     */
    public function featured($cid)
    {
        $app = JFactory::getApplication();
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $cids = implode(',', $cid);
            $query = 'UPDATE `#__allevents_public` SET `default` = 1 WHERE id IN ( ' . $cids . ' )';
            $this->_db->setQuery($query);
            try {
                $this->_db->execute();
            } catch (Exception $e) {
                $app->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
            $query = 'UPDATE `#__allevents_public` SET `default` = 0 WHERE id NOT IN ( ' . $cids . ' )';
            $this->_db->setQuery($query);
            try {
                $this->_db->execute();
            } catch (Exception $e) {
                $app->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        return true;
    }

    /**
     * AllEventsModelPublic::unfeatured()
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
            $query = 'UPDATE `#__allevents_public` SET `default` = 0 WHERE id IN ( ' . $cids . ' )';
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
     * AllEventsModelPublic::duplicate()
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
     * AllEventsModelPublic::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Public', $prefix = 'AllEventsTable', $config = [])
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
     * AllEventsModelPublic::loadFormData()
     *
     * @return array|mixed
     * @throws Exception
     */
    protected function loadFormData()
    {
        $params = JComponentHelper::getParams('com_allevents');

        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.public.data', []);

        if (empty($data)) {
            $data = $this->getItem();
            // Get default Agenda
            if ($params['controlpanel_showagendas']) {
                if (is_null($data->agenda_id)) {
                    $agendas_model = JModelLegacy::getInstance('Agendas', 'AllEventsModel');
                    $agenda_id = $agendas_model->GetDefaultAgendaId();
                    $data->agenda_id = is_null($agenda_id) ? 0 : $agenda_id;
                }
            } else {
                $data->agenda_id = 0;
            }
        }

        return $data;
    }

    /**
     * AllEventsModelPublic::getItem()
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

    /**
     * AllEventsModelPublic::prepareTable()
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
                $db->setQuery('SELECT MAX(ordering) FROM #__allevents_public');
                $max = $db->loadResult();
                $table->ordering = $max + 1;
            }
        }
    }
}
