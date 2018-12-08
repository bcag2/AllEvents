<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsControllerPlace
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerPlace extends JControllerForm
{
    /**
     * AllEventsControllerPlace::__construct()
     */
    function __construct()
    {
        $this->view_list = 'places';
        parent::__construct();
    }

    /**
     * AllEventsControllerPlace::save()
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

        $query->select('max(id)')->from($db->quoteName('#__allevents_places'));

        $db->setQuery($query);
        $result = $db->loadResult();

        $id = $result;
        // $db = JFactory::getDbo();
        // $id = (int)$db->insertid() ;
        if (JFactory::getApplication()->input->get('ajax', 0) != 0) {
            if (!empty($id)) {
                $model = $this->getModel('place', 'AllEventsModel');
                $table = $model->getTable();
                $table->reset();
                $table->load($id);
                JFactory::getApplication()->enqueueMessage($this->message);
                echo new JResponseJson(['id' => $id, 'display' => $table->titre]);
            } else {
                JFactory::getApplication()->enqueueMessage($this->message, 'error');
                echo new JResponseJson(['id' => $id]);
            }
            JFactory::getApplication()->close();
        }

        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeCSS.php');
        $g_se_CSS = new AllEventsClassCSS();
        $g_se_CSS::MakeCSSEntity('place', 'places');
        require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeBullets.php');
        $g_se_bullets = new AllEventsClassBullets();
        $g_se_bullets::MakeBullets();

        return $return;
    }

    /**
     * AllEventsControllerPlace::unfeatured()
     *
     * @throws Exception
     */
    public function unfeatured()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            try {
                ArrayHelper::toInteger($ids);
                $model = $this->getModel('place');
                $model->unfeatured($ids);
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
            }
        }

        $redirectTo = JRoute::_('index.php?option=com_allevents&view=places&task=display', false);
        $this->setRedirect($redirectTo);
    }

    /**
     * AllEventsControllerPlace::featured()
     *
     * @throws Exception
     */
    public function featured()
    {
        // Initialise variables.
        $ids = JFactory::getApplication()->input->get('cid', [], 'array');

        if (empty($ids)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JERROR_NO_ITEMS_SELECTED'), 'warning');
        } else {
            try {
                ArrayHelper::toInteger($ids);
                $model = $this->getModel('place');
                $model->featured($ids);
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
            }
        }

        $redirectTo = JRoute::_('index.php?option=com_allevents&view=places&task=display', false);
        $this->setRedirect($redirectTo);
    }
}
