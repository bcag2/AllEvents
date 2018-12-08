<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeCSS.php');
require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/MakeBullets.php');

/**
 * AllEventsControllerEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerEvent extends JControllerForm
{
    /**
     * AllEventsControllerEvent::__construct()
     */
    function __construct()
    {
        $this->view_list = 'events';
        parent::__construct();
    }

    /**
     * AllEventsControllerEvent::save()
     *
     * @param mixed $key
     * @param mixed $urlVar
     *
     * @return bool
     * @throws Exception
     */
    public function save($key = null, $urlVar = null)
    {
        $return = parent::save($key, $urlVar);

        $g_se_CSS = new AllEventsClassCSS();
        $g_se_CSS::MakeCSSEntity('activity', 'activities');
        $g_se_CSS::MakeCSSEntity('agenda', 'agenda');
        $g_se_CSS::MakeCSSEntity('category', 'categories');
        $g_se_CSS::MakeCSSEntity('place', 'places');
        $g_se_CSS::MakeCSSEntity('public', 'public');
        $g_se_CSS::MakeCSSEntity('ressource', 'ressources');
        $g_se_CSS::MakeCSSEntity('section', 'sections');
        $g_se_bullets = new AllEventsClassBullets();
        $info = $g_se_bullets::MakeBullets();
        JFactory::getApplication()->enqueueMessage($info);

        return $return;
    }

    /**
     * AllEventsControllerEvent::import()
     *
     * @param mixed $key
     * @param mixed $urlVar
     *
     * @throws Exception
     */
    public function import($key = null, $urlVar = null)
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $return = parent::save($key, $urlVar);
        echo($return);
        JFactory::getApplication()->close();
    }

    /**
     * AllEventsControllerEvent::emailing()
     *
     * @return
     */
    public function emailing()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $model = $this->getModel();

        $data = $this->input->post->get('batch', [], 'array');
        $cid = $this->input->post->get('cid', [], 'array');
        $jform = $this->input->post->get('jform', [], 'array');
        $id = array_key_exists('id', $jform) ? (int)$jform['id'] : $cid[0];
        $enrolment_max_participant = array_key_exists('enrolment_max_participant', $jform) ? (int)$jform['enrolment_max_participant'] : 0;

        $return = $model->emailing($data, $id, $enrolment_max_participant);
        $this->setRedirect('index.php?option=com_allevents&task=event.edit&id=' . (int)$id);

        return $return;
    }

    /**
     * AllEventsControllerEvent::duplicate()
     *
     * @since 3.3.1
     */
    public function duplicate()
    {
        $cid = $this->input->post->get('cid', [], 'array');
        $jform = $this->input->post->get('jform', [], 'array');
        $id = array_key_exists('id', $jform) ? (int)$jform['id'] : $cid[0];

        $pks[] = $id;
        try {
            if (empty($pks)) {
                throw new Exception(JText::_('COM_ALLEVENTS_ERROR_NO_ITEMS_SELECTED'));
            }
            $model = $this->getModel();
            $model->duplicate($pks);
            $this->setMessage(JText::plural('COM_ALLEVENTS_N_ITEMS_DUPLICATED', count($pks)));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }

        $this->setRedirect('index.php?option=com_allevents&view=events');
    }

    /**
     * AllEventsControllerEvent::batch()
     *
     * Method to run batch operations.
     *
     * @param   object $model The model.
     *
     * @return  boolean   True if successful, false otherwise and internal error is set.
     * @since   3.3.6
     */
    public function batch($model = null)
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Set the model
        $model = $this->getModel();

        // Preset the redirect
        $this->setRedirect(JRoute::_('index.php?option=com_allevents&view=events' . $this->getRedirectToListAppend(), false));

        return parent::batch($model);
    }
}
