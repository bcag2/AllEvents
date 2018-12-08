<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * AllEventsControllerPublics
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerPublics extends AllEventsController
{

    /**
     * AllEventsControllerPublics::GetPublicsFromAgenda()
     *
     * @return bool
     * @throws Exception
     */
    public function GetPublicsFromAgenda()
    {
        $app = JFactory::getApplication();
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);
        if ($app->input->get('ajax', 0) != 0) {
            $model = $this->getModel('Publics', 'AllEventsModel');
            $table = $model->GetPublicsFromAgenda($app->input->getInt('agenda_id'));
            $app->enqueueMessage($this->message);
            echo new JResponseJson($table);
            $app->close();
        }

        return true;
    }
}
