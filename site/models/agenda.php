<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');
use Joomla\Utilities\ArrayHelper;

if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';

require_once dirname(__FILE__) . '/eventslist.php';

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
class AllEventsModelAgenda extends AllEventsModelEventslist
{
    private $_item;

    /**
     * AllEventsModelAgenda::getData()
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
                $id = $this->getState('agenda.id');
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
        $this->_item->contact_name = "";
        if (isset($this->_item->lastmod_by)) {
            $this->_item->lastmod_by = JFactory::getUser($this->_item->lastmod_by)->name;
        }
        if (isset($this->_item->contact_id)) {
            $this->_item->contact_name = JFactory::getUser($this->_item->contact_id)->name;
        }
        if (isset($this->_item->created_by)) {
            $this->_item->created_by = JFactory::getUser($this->_item->created_by)->name;
        }
        $this->setState('filter.agenda.id', $id);

        return $this->_item;
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
    public function getTable($type = 'Agenda', $prefix = 'AlleventsTable', $config = [])
    {
        $this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');

        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelAgenda::checkIn()
     *
     * @param mixed $id
     *
     * @return bool
     * @throws Exception
     */
    public function checkIn($id = null)
    {
        // Get the id.
        $id = (!empty($id)) ? $id : (int)$this->getState('agenda.id');

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
     * AllEventsModelAgenda::checkOut()
     *
     * @param mixed $id
     *
     * @return bool
     * @throws Exception
     */
    public function checkOut($id = null)
    {
        // Get the user id.
        $id = (!empty($id)) ? $id : (int)$this->getState('agenda.id');

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
     * AllEventsModelAgenda::getCategoryName()
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
     * AllEventsModelAgenda::publish()
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
     * AllEventsModelAgenda::delete()
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
        $config = ["unique_id" => "allevents3.com", "filename" => "export_agenda.ics"];
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
     * AllEventsModelAgenda::populateState()
     *
     * @param null $ordering
     * @param null $direction
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication('com_allevents');
        // Load state from the request userState on edit or from the passed variable on default
        if ($app->input->getString('layout') == 'edit') {
            $id = $app->getUserState('com_allevents.edit.agenda.id');
        } else {
            $id = $app->input->getInt('id');
            $app->setUserState('com_allevents.edit.agenda.id', $id);
        }
        $this->setState('agenda.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $params_array = $params->toArray();
        if (isset($params_array['item_id'])) {
            $this->setState('agenda.id', $params_array['item_id']);
        }
        $this->setState('params', $params);
    }
}
