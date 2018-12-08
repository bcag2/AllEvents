<?php
defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_allevents/models/fields/aegenericlist.php';

/**
 * JFormFieldAEAgenda2
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEAgenda extends JFormFieldAEGenericList
{

    public $type = 'AEAgenda';

    protected $class_names = ['se_agenda_%d_bullet', 'se_agenda_%d_color'];
    protected $model_name = 'Agendas';
    protected $method_name = 'GetAgendas';
    protected $id_name = 'id';
    protected $display_name = 'display';
    protected $default_name = 'default';

    /**
     * @return array|mixed
     */
    public function getFrontOptions()
    {
// Initialize variables.
        $options = [];

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->select('a.id As value, a.titre As text');
        $query->from('#__allevents_agenda AS a');
        $query->order('a.titre');
        $query->where('a.published= 1');

        // Get the options.
        $db->setQuery($query);

        $options = $db->loadObjectList();

        // Check for a database error.
        if ($db->getErrorNum()) {
            JError::raiseWarning(500, $db->getErrorMsg());
        }

        return $options;
    }

    /**
     * JFormFieldAEAgenda2::getOptions() provides the options for the select
     *
     * @return  array
     */
    protected function getOptions()
    {
        return self::getAEOptions($this->class_names, $this->model_name, $this->method_name, $this->id_name, $this->display_name, $this->default_name);
    }
}
