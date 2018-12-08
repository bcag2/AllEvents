<?php

defined('_JEXEC') or die;
require_once JPATH_SITE . '/components/com_allevents/controller.php';

/**
 * Agendas list controller class.
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AlleventsControllerAgendas extends AlleventsController
{
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
    public function &getModel($name = 'Agendas', $prefix = 'AlleventsModel')
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }
}
