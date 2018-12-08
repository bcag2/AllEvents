<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerAgenda
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerAgenda extends JControllerForm
{
    /**
     * AllEventsControllerAgenda::__construct()
     *
     * @throws Exception
     */
    function __construct()
    {
        $this->view_list = 'agendas';
        parent::__construct();
    }

    /**
     * AllEventsControllerAgenda::getModele()
     *
     * @param mixed $key
     * @param mixed $urlVar
     *
     * @throws Exception
     * @since 3.3.1
     */
    public function getModele($key = null, $urlVar = null)
    {
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);
        $id = JFactory::getApplication()->input->getInt('id');
        if ((int)JFactory::getApplication()->input->get('ajax', 0) != 0) {
            if (!empty($id)) {
                $table = $this->getModel()->getTable();
                $table->load($id);
                echo new  JResponseJson(['id' => $id, 'modele' => $table->modele]);
            } else {
                JFactory::getApplication()->enqueueMessage($this->message, 'error');
                echo new  JResponseJson(['id' => $id]);
            }
            JFactory::getApplication()->close();
        }
    }

    /**
     * AllEventsControllerAgenda::getAgendaContactsParams()
     *
     * @return boolean
     * @throws Exception
     */
    public function getAgendaContactsParams()
    {
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);
        if (JFactory::getApplication()->input->get('ajax', 0) != 0) {
            $model = $this->getModel();
            $table = $model->getAgendaContactsParams(JFactory::getApplication()->input->getInt('agenda_id'));
            JFactory::getApplication()->enqueueMessage($this->message);
            echo new  JResponseJson($table);
            JFactory::getApplication()->close();
        }

        return true;
    }

    /**
     * AllEventsControllerAgenda::save()
     *
     * @param mixed $key
     * @param mixed $urlVar
     *
     * @return bool
     * @throws Exception
     */
    public function save($key = null, $urlVar = null)
    {
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);

        $return = parent::save($key, $urlVar);

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('max(id)')->from($db->quoteName('#__allevents_agenda'));

        $db->setQuery($query);
        $result = $db->loadResult();

        $id = $result;
        // $db = JFactory::getDbo();
        // $id = (int)$db->insertid() ;
        if (JFactory::getApplication()->input->get('ajax', 0) != 0) {
            if (!empty($id)) {
                $table = $this->getModel()->getTable();
                $table->reset();
                $table->load($id);
                JFactory::getApplication()->enqueueMessage($this->message);
                echo new  JResponseJson(['id' => $id, 'display' => $table->titre]);
            } else {
                JFactory::getApplication()->enqueueMessage($this->message, 'error');
                echo new  JResponseJson(['id' => $id]);
            }
            JFactory::getApplication()->close();
        }

        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeCSS.php');
        $g_se_CSS = new AllEventsClassCSS();
        $g_se_CSS::MakeCSSEntity('agenda', 'agenda');
        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeBullets.php');
        $g_se_bullets = new AllEventsClassBullets();
        $g_se_bullets::MakeBullets();

        return $return;
    }

    /**
     * AllEventsControllerAgenda::unfeatured()
     *
     * @throws Exception
     */
    public function unfeatured()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'error');
        } else {
            try {
                ArrayHelper::toInteger($ids);
                $model = $this->getModel();
                $model->unfeatured($ids);
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
            }
        }

        $redirectTo = JRoute::_('index.php?option=com_allevents&view=agendas&task=display', false);
        $this->setRedirect($redirectTo);
    }

    /**
     * AllEventsControllerAgenda::featured()
     *
     * @throws Exception
     */
    public function featured()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'error');
        } else {
            try {
                ArrayHelper::toInteger($ids);
                $model = $this->getModel();
                $model->featured($ids);
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
            }
        }

        $redirectTo = JRoute::_('index.php?option=com_allevents&view=agendas&task=display', false);
        $this->setRedirect($redirectTo);
    }
}
