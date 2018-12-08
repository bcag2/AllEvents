<?php

/**
 * AECBFields
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/aecbtypes.php';

/**
 * Retrieve CB fields information
 */
class AECBFields
{
    protected static $instance = null;
    protected $cb_fields;
    protected $cb_tabs;
    private $sort_key;

    /**
     * Load AECBFields and tabs définitions
     */
    private function __construct()
    {
        $this->cb_fields = [];
        $this->cb_tabs = [];
        $component = 'com_comprofiler';
        $component_enabled = JComponentHelper::isInstalled($component) && JComponentHelper::isEnabled($component);
        if ($component_enabled) {
            // Initialize CB framework
            global $_CB_framework;
            include_once JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php';
            cbimport('cb.plugins');
            if ($_CB_framework->getUi() == 1) {
                cbimport('language.front');
            } else {
                cbimport('language.all');
            }

            $query = 'SELECT f.`fieldid` AS `f_fieldid`, f.`tabid` AS `f_tabid`, f.`ordering` AS `f_ordering`, f.`name` AS `f_name`, ' .
                'f.`table` AS `f_table`, f.`tablecolumns` AS `f_tablecolumns`, f.`title` AS `f_title`, f.`type` AS `f_type`, ' .
                't.`position` AS `t_position`, t.`title` AS `t_title`, t.`ordering` AS `t_ordering`, t.`viewaccesslevel` AS `t_viewaccesslevel` ' .
                'FROM `#__comprofiler_fields` AS f ' .
                'INNER JOIN `#__comprofiler_tabs` AS t ON t.`tabid` = f.`tabid` ' .
                'WHERE t.`enabled` = 1 AND f.`published` = 1 ' .
                'ORDER BY t.`position`, t.`ordering`, f.`ordering`, f.`name`';

            // Execute query
            $db = JFactory::getDbo();
            $db->setQuery($query);
            $items = $db->loadObjectList();

            foreach ($items as $item) {
                $cb_field = [];
                if (!array_key_exists($item->f_tabid, $this->cb_tabs)) {
                    $cb_tab = [];
                    $cb_tab['tabid'] = $item->f_tabid;
                    $cb_tab['position'] = $item->t_position;
                    $cb_tab['ordering'] = $item->t_ordering;
                    $cb_tab['title_default'] = $item->t_title;
                    $cb_tab['title_translated'] = CBTxt::T($cb_tab['title_default']);
                    $cb_tab['viewaccesslevel'] = $item->t_viewaccesslevel;
                    $this->cb_tabs[$cb_tab['tabid']] = $cb_tab;
                }
                $cb_field['tab'] = $this->cb_tabs[$item->f_tabid];
                $cb_field['fieldid'] = $item->f_fieldid;
                $cb_field['ordering'] = $item->f_ordering;
                $cb_field['name'] = $item->f_name;
                $cb_field['title_default'] = $item->f_title;
                $cb_field['title_translated'] = CBTxt::T($cb_field['title_default']);
                if ($item->f_table != '') {
                    $cb_field['table'] = $item->f_table;
                }
                $cb_tablecolumns = explode(',', $item->f_tablecolumns);
                if (!empty($cb_tablecolumns)) {
                    $cb_field['tablecolumns'] = $cb_tablecolumns;
                }
                $cb_field['type'] = AECBTypes::getInstance()->getType($item->f_type);
                $this->cb_fields[$cb_field['fieldid']] = $cb_field;
            }
        }
    }

    /**
     * For singleton
     *
     * @return AECBFields
     */
    static public function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = new AECBFields();

        return self::$instance;
    }

    /**
     * getFields()
     *
     * @param integer $key
     *            0: key is field id, 1 key is field name
     * @param integer $sort
     *            0: by position, 1: by name, 2: by default title, 3: by translated title
     *
     * @return array
     * @throws Exception
     */
    public function getFields($key = 0, $sort = 0)
    {
        // Select fields
        $result = [];
        foreach ($this->cb_fields as $cb_field) {
            if ($key == 0) {
                $result[$cb_field['fieldid']] = $cb_field;
            } elseif ($key == 1) {
                $result[$cb_field['name']] = $cb_field;
            }
        }

        // Sort fields (default is by position)
        if ($sort) {
            $this->sort_key = $sort;
            if (!usort($result, [__CLASS__, 'sort_cb_fields_compare'])) {
                throw new Exception('CB fields sort error');
            }
        }

        return $result;
    }

    /**
     * getFieldsByTypes()
     *
     * @param string $types
     *            list with ',' separator or array
     * @param integer $key
     *            0: key is field id, 1 key is field name
     * @param integer $sort
     *            0: by position, 1: by name, 2: by default title, 3: by translated title
     *
     * @return array
     * @throws Exception
     */
    public function getFieldsByTypes($types = '', $key = 0, $sort = 0)
    {
        if ($types) {
            if (is_string($types)) {
                $types = explode(',', $types);
            }
        } else {
            $types = null;
        }

        // Select fields
        $result = [];
        foreach ($this->cb_fields as $cb_field) {
            if (isset($cb_field['type']->name)) {
                if (is_null($types) || in_array($cb_field['type']->name, $types)) {
                    if ($key == 0) {
                        $result[$cb_field['fieldid']] = $cb_field;
                    } elseif ($key == 1) {
                        $result[$cb_field['name']] = $cb_field;
                    }
                }
            }
        }

        // Sort fields (default is by position)
        if ($sort) {
            $this->sort_key = $sort;
            if (!usort($result, [__CLASS__, 'sort_cb_fields_compare'])) {
                throw new Exception('CB fields sort error');
            }
        }

        return $result;
    }

    /**
     * Callback function for fields sort
     *
     * @param array $cb_field_1
     * @param array $cb_field_2
     *
     * @return number
     */
    private function sort_cb_fields_compare($cb_field_1, $cb_field_2)
    {
        if ($this->sort_key == 1) {
            return strcmp($cb_field_1['name'], $cb_field_2['name']);
        } elseif ($this->sort_key == 2) {
            return strcmp($cb_field_1['title_default'], $cb_field_2['title_default']);
        } elseif ($this->sort_key == 3) {
            return strcmp($cb_field_1['title_translated'], $cb_field_2['title_translated']);
        } else {
            return 0;
        }
    }
}
