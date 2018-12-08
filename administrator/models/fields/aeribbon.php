<?php
defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_allevents/models/fields/aegenericlist.php';

/**
 * JFormFieldAERibbon
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAERibbon extends JFormFieldAEGenericList
{
    public $type = 'AERibbon';
    protected $class_names = [];
    protected $model_name = 'Ribbons';
    protected $method_name = 'GetRibbons';
    protected $id_name = 'id';
    protected $display_name = 'display';
    protected $default_name = 'default';

    /**
     * JFormFieldAERibbon::getOptions() provides the options for the select
     *
     * @return  array
     */
    protected function getOptions()
    {
        return self::getAEOptions($this->class_names, $this->model_name, $this->method_name, $this->id_name, $this->display_name, $this->default_name);
    }
}
