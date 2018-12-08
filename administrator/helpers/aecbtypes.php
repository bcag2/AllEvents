<?php

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

/**
 * Community Builder fields types
 */

defined('_JEXEC') or die;

/**
 * Community Builder fields types
 *
 * Defined in components/com_comprofiler/plugin/user/plug_cbcore/cb.core.php
 */
class AECBTypes
{
    protected static $instance = null;
    protected $types;

    /**
     * Protected constructor (use getInstance())
     */
    protected function __construct()
    {
        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('allevents');
        $types = $dispatcher->trigger('onAlleventsGetCBTypes');

        if (empty($types)) {
            $this->types = [];
        } else {
            $this->types = $types;
        }
    }

    /**
     * For singleton
     *
     * @return AECBTypes
     */
    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new AECBTypes();
        }

        return self::$instance;
    }

    /**
     *
     * @return array of types
     */
    public function &getTypes()
    {
        return $this->types;
    }

    /**
     *
     * @param string $type
     *
     * @return type or null if not exists
     */
    public function getType($type)
    {
        return isset($this->types[$type]) ? $this->types[$type] : null;
    }
}
