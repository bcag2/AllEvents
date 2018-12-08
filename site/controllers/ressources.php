<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * AllEventsControllerRessources
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerRessources extends AllEventsController
{
    /**
     * AllEventsControllerRessources::GetRessourcesFromAgenda()
     *
     * @return bool
     * @throws Exception
     */
    public function GetRessourcesFromAgenda()
    {
        $app = JFactory::getApplication();
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);
        if ($app->input->get('ajax', 0) != 0) {
            $model = $this->getModel('Ressources', 'AllEventsModel');
            $table = $model->GetRessourcesFromAgenda($app->input->getInt('agenda_id'));
            $app->enqueueMessage($this->message);
            echo new JResponseJson($table);
            $app->close();
        }

        return true;
    }
}
