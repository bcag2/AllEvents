<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * AllEventsControllerCustomfields
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerCustomfields extends JControllerAdmin
{
    /**
     * AllEventsControllerCustomfields::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'customfield', $prefix = 'AllEventsModel', $config = [])
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }
}
