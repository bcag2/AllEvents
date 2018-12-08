<?php
defined('_JEXEC') or die();

require_once JPATH_SITE . '/administrator/components/com_allevents/models/fields/aegenericlist.php';

/**
 * JFormFieldAEPlace2
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEPlace extends JFormFieldAEGenericList
{

    public $type = 'AEPlace';

    protected $class_names = ['se_place_%d_bullet', 'se_place_%d_color'];
    protected $model_name = 'Places';
    protected $method_name = 'GetPlacesFromAgenda';
    protected $id_name = 'id';
    protected $display_name = 'display';
    protected $default_name = 'default';
    protected $parent_field = 'agenda_id';

    /**
     * JFormFieldAEPlace2::getOptions() provides the options for the select
     *
     * @return  array
     */
    protected function getOptions()
    {
        return self::getAEOptions($this->class_names, $this->model_name, $this->method_name, $this->id_name, $this->display_name, $this->default_name, $this->parent_field);
    }
}
