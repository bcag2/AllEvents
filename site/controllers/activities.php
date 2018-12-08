<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * AllEventsControllerActivities
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerActivities extends AllEventsController
{
    /**
     * AllEventsControllerActivities::GetActivitiesFromAgenda()
     *
     * @return bool
     * @throws Exception
     */
    public function GetActivitiesFromAgenda()
    {
        $app = JFactory::getApplication();
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);
        if ($app->input->get('ajax', 0) != 0) {
            $model = $this->getModel('Activities', 'AllEventsModel');
            $table = $model->GetActivitiesFromAgenda($app->input->getInt('agenda_id'));
            $app->enqueueMessage($this->message);
            echo new JResponseJson($table);
            $app->close();
        }

        return true;
    }

    /**
     * Proxy for getModel.
     *
     * @since    1.6
     *
     * @param string $name
     * @param string $prefix
     *
     * @return object
     */
    public function &getModel($name = 'Activities', $prefix = 'AlleventsModel')
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }
}
