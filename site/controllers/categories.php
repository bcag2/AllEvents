<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * AllEventsControllerCategories
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerCategories extends AllEventsController
{
    /**
     * AllEventsControllerCategories::GetCategoriesFromSection()
     *
     * @return bool
     * @throws Exception
     */
    public function GetCategoriesFromSection()
    {
        $app = JFactory::getApplication();
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);
        if ($app->input->get('ajax', 0) != 0) {
            $model = $this->getModel('Categories', 'AllEventsModel');
            $table = $model->GetCategoriesFromSection($app->input->getInt('section_id'));
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
    public function &getModel($name = 'Categories', $prefix = 'AlleventsModel')
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }
}
