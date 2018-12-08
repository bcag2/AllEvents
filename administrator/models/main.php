<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * AllEventsModelMain
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelMain extends JModelLegacy
{
    protected $text_prefix = 'COM_ALLEVENTS';

    /**
     * @return string
     */
    public function getVersion()
    {
        return '%%ae3.version%%';
    }

    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function getOrders($limit = 5)
    {
        //€#€
        $model = JModelLegacy::getInstance('Orders', 'AllEventsModel', [
            'ignore_request' => true,
        ]);

        return $model->getLatest($limit);
        //€#€

        //FREE
        return null;
        // EERF
    }

    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function getEvents($limit = 5)
    {
        $model = JModelLegacy::getInstance('Events', 'AllEventsModel', [
            'ignore_request' => true,
        ]);

        return $model->getLatest($limit);
    }
}
