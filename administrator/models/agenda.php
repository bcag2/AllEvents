<?php

defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';
jimport('joomla.application.component.modeladmin');
jimport('joomla.filter.output');
use Joomla\String\StringHelper;
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsModelAgenda
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelAgenda extends JModelAdmin
{
    protected $text_prefix = 'COM_ALLEVENTS';

    /**
     * AllEventsModelAgenda::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.agenda', 'agenda', ['control' => 'jform', 'load_data' => $loadData]);

        if ($form->getFieldAttribute('lastmod', 'default') == 'NOW') {
            $form->setFieldAttribute('lastmod', 'default', date('Y-m-d H:i:s'));
        }
        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelAgenda::validate()
     *
     * @param mixed $form
     * @param mixed $data
     * @param mixed $group
     *
     * @return mixed
     */
    public function validate($form, $data, $group = null)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('agenda.id');
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
     * AllEventsModelAgenda::featured()
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
            $query = 'UPDATE `#__allevents_agenda` SET `default` = 1 WHERE id IN ( ' . $cids . ' )';
            $this->_db->setQuery($query);
            try {
                $this->_db->execute();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
            $query = 'UPDATE `#__allevents_agenda` SET `default` = 0 WHERE id NOT IN ( ' . $cids . ' )';
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
     * AllEventsModelAgenda::unfeatured()
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
            $query = 'UPDATE `#__allevents_agenda` SET `default` = 0 WHERE id IN ( ' . $cids . ' )';
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
     * AllEventsModelAgenda::duplicate()
     *
     * @param mixed $pks
     *
     * @return bool
     * @throws Exception
     */
    public function duplicate(&$pks)
    {
        $user = JFactory::getUser();
        //$db = $this->getDbo();
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
     * AllEventsModelAgenda::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Agenda', $prefix = 'AllEventsTable', $config = [])
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
     * AllEventsModelAgenda::getAgendaContactsParams()
     *
     * @param int $agenda_id
     *
     * @return array
     */
    public function getAgendaContactsParams($agenda_id)
    {
        $db = $this->getDbo();
        $db->setQuery("SELECT `contact_libre_default_access`, " .
            "`contact_1_default_type`, `contact_1_default_label`, `contact_1_default_access`, " .
            "`contact_2_default_type`, `contact_2_default_label`, `contact_2_default_access`, " .
            "`contact_3_default_type`, `contact_3_default_label`, `contact_3_default_access` " .
            "FROM `#__allevents_agenda` where id=" . $agenda_id);
        $loaddb = $db->loadObject();

        return $loaddb;
    }

    /**
     * AllEventsModelAgenda::export()
     *
     * @param integer $agenda_id
     *
     * @return mixed
     */
    public function export($agenda_id)
    {
        require_once JPATH_SITE . '/components/com_allevents/helpers/iCalcreator.php';
        require_once JPATH_SITE . '/components/com_allevents/helpers/lib/iCalBase.class.php';
        require_once JPATH_SITE . '/components/com_allevents/helpers/lib/vcalendar.class.php';

        $v = new vCalendar();
        $config = ["unique_id" => "allevents3.com", "filename" => "export_agenda_" . $agenda_id . ".ics"];
        $v->setConfig($config);
        $v->setProperty("x-wr-calname", "Calendar Allevents");
        $v->setProperty("X-WR-CALDESC", "Events extraction");
        $v->setProperty("X-WR-TIMEZONE", "UTC");
        $v->setProperty('method', 'PUBLISH');

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('a.id AS value, a.title AS text, COUNT(DISTINCT b.id) AS level');
        $query->from($db->quoteName('#__usergroups') . ' AS a');
        $query->join('LEFT', $db->quoteName('#__usergroups') . ' AS b ON a.lft > b.lft AND a.rgt < b.rgt');
        $query->group('a.id, a.title, a.lft, a.rgt');
        $query->order('a.lft ASC');
        $db->setQuery($query);
        $options = $db->loadObjectList();
        $usergroups = [];

        for ($i = 0, $n = count($options); $i < $n; $i++) {
            $usergroups[$options[$i]->value] = $options[$i]->text;
        }
        $query = $db->getQuery(true);
        $query->select('a.id, a.titre, a.alias, a.date, a.enddate, a.description, a.proposal, a.hot, a.access');
        $query->select('pl.titre place_titre, pl.numero place_numero, pl.rue place_rue, pl.codepostal place_codepostal,pl.ville place_ville');
        $query->select('ac.titre activity_titre');
        $query->select('ag.titre agenda_titre');
        $query->select('ca.titre category_titre');
        $query->select('pu.titre public_titre');
        $query->select('re.titre ressource_titre');
        $query->select('se.titre section_titre');
        $query->from('`#__allevents_events` AS a');
        $query->join('LEFT', '#__allevents_categories AS ca ON ca.id = a.category_id');
        $query->join('LEFT', '#__allevents_ressources AS re ON re.id = a.ressource_id');
        $query->join('LEFT', '#__allevents_places AS pl ON pl.id = a.place_id');
        $query->join('LEFT', '#__allevents_agenda AS ag ON ag.id = a.agenda_id');
        $query->join('LEFT', '#__allevents_sections AS se ON se.id = a.section_id');
        $query->join('LEFT', '#__allevents_public AS pu ON pu.id = a.public_id');
        $query->join('LEFT', '#__allevents_activities AS ac ON ac.id = a.activity_id');

        $query->where("DATE_FORMAT(a.date,'%Y%m%d') >= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d')");
        $query->where('(a.published =1 )');
        $query->where('(a.agenda_id = ' . (int)$agenda_id . ')');
        $query->where('(a.titre <> \'\')');

        $query->order('a.date ASC');
        $db->setQuery($query);
        $items = $db->loadObjectList();

        foreach ($items as $item) {
            $line1 = $item->place_numero . ' ' . $item->place_rue;
            $line2 = $item->place_codepostal . ' ' . $item->place_ville;

            $place_adress = '';
            if ($line1 <> ' ')
                $place_adress .= $line1 . ' ';
            if ($line2 <> ' ')
                $place_adress .= $line2;

            $link = AllEventsHelperRoute::getEventRoute($item->id, $item->alias);
            //-----------------------------------------
            $vevent = $v->newComponent("vevent");
            $vevent->setProperty('summary', $item->titre);
            $vevent->setProperty('dtstart', JHtml::date($item->date, 'Ymd', 'UTC') . 'T' . JHtml::date($item->date, 'Hi', 'UTC') . '00Z');
            $vevent->setProperty('dtend', JHtml::date($item->enddate, 'Ymd', 'UTC') . 'T' . JHtml::date($item->enddate, 'Hi', 'UTC') . '00Z');
            $vevent->setProperty('description', strip_tags($item->description));
            if (!empty($item->activity_titre)) {
                $vevent->setProperty('categories', $item->activity_titre);
            }
            if (!empty($item->agenda_titre)) {
                $vevent->setProperty('categories', $item->agenda_titre);
            }
            if (!empty($item->category_titre)) {
                $vevent->setProperty('categories', $item->category_titre);
            }
            if (!empty($item->public_titre)) {
                $vevent->setProperty('categories', $item->public_titre);
            }
            if (!empty($item->ressource_titre)) {
                $vevent->setProperty('resources', $item->ressource_titre);
            }
            if (!empty($item->section_titre)) {
                $vevent->setProperty('categories', $item->section_titre);
            }
            $vevent->setProperty('location', $item->place_titre . ' - ' . $place_adress);
            $vevent->setProperty('status', ($item->proposal) ? JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_PROPOSAL') : '');
            $vevent->setProperty('class', $usergroups[$item->access]);
            $vevent->setProperty('priority', ($item->hot) ? JText::_('JYES') : JText::_('JNO'));
            $vevent->setProperty('url', $link);
            $vevent->setUid($item->id);
            //if ($item->contact_name != '') {
            //    $vevent->setOrganizer($item->contact_name, $item->contact_email);
            //}

            $v->setComponent($vevent);
        }
        $v->returnCalendar();
        // le exit est obligatoire !
        exit;
    }

    /**
     * AllEventsModelAgenda::loadFormData()
     *
     * @return array|mixed
     * @throws Exception
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.agenda.data', []);
        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

    /**
     * AllEventsModelAgenda::getItem()
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
     * AllEventsModelAgenda::prepareTable()
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
                $db->setQuery('SELECT MAX(ordering) FROM `#__allevents_agenda`');
                $max = $db->loadResult();
                $table->ordering = $max + 1;
            }
        }
    }
}
