<?php
defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_allevents/models/fields/aegenericlist.php';

/**
 * JFormFieldAESection2
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAESection extends JFormFieldAEGenericList
{

    public $type = 'AESection';

    protected $class_names = ['se_section_%d_bullet', 'se_section_%d_color'];
    protected $model_name = 'Sections';
    protected $method_name = 'GetSections';
    protected $id_name = 'id';
    protected $display_name = 'display';
    protected $default_name = 'default';

    /**
     * JFormFieldAESection2::getOptions() provides the options for the select
     *
     * @return  array
     */
    protected function getOptions()
    {
        return self::getAEOptions($this->class_names, $this->model_name, $this->method_name, $this->id_name, $this->display_name, $this->default_name);
    }
}
