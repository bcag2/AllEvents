<?php

defined('_JEXEC') or die;

/**
 * AllEventsCustomfields
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsCustomfields
{
    /**
     * Function to return list of custom fields depending on the item ID
     *
     * @access    public static
     *
     * @param      $id item ID
     *                 $published (if not defined, published is published ('1'))
     * @param null $parent_form
     * @param null $published
     *
     * @return bool|object
     *
     * @since     3.3
     */
    static public function getListCustomFields($id, $parent_form = null, $published = null)
    {
        $filter_published = isset($published) ? $published : 1;

        $db = JFactory::getDbo();
        $query = $db->getQuery(true)->select('cf.slug AS cf_slug, cf.type AS cf_type, cf.options AS cf_options, cf.titre AS cf_titre, cf.type AS cf_type, cf.required AS cf_required')->from('#__allevents_customfields AS cf')->where($db->qn('cf.published') . ' = ' . $db->q($filter_published))->where($db->qn('cf.parent_form') . ' = ' . $db->q($parent_form))->order('cf.ordering ASC');
        $db->setQuery($query);
        $list = $db->loadObjectList();
        if ($list)
            return $list;

        return false;
    }

    /**
     * Function to return list of custom fields depending on the item ID
     *
     * @access    public static
     *
     * @param      $id item ID
     *                 $published (if not defined, published is published ('1'))
     * @param null $parent_form
     * @param null $published
     *
     * @return bool|object
     *
     * @since     3.3
     */
    static public function getList($id, $parent_form = null, $published = null)
    {
        $filter_published = isset($published) ? $published : 1;

        $db = JFactory::getDbo();
        $query = $db->getQuery(true)->select('cf.slug AS cf_slug, cfd.value AS cf_value, cfd.parent_id AS cf_parent_id, cf.titre AS cf_titre, cf.required AS cf_required')->from('#__allevents_customfields AS cf')->leftJoin($db->qn('#__allevents_customfields_data') . ' AS cfd' . ' ON ' . $db->qn('cfd.parent_id') . ' = ' . (int)$id . ' AND ' . $db->qn('cf.slug') . ' = ' . $db->qn('cfd.slug'))->where($db->qn('cf.published') . ' = ' . $db->q($filter_published))->where($db->qn('cf.parent_form') . ' = ' . $db->q($parent_form))->order('cf.ordering ASC');
        $db->setQuery($query);
        $list = $db->loadObjectList();
        if ($list)
            return $list;

        return false;
    }

    /**
     * Function to return a list of filled custom fields depending on the item ID
     *
     * @access    public static
     *
     * @param      $id item ID
     *                 $published (if not defined, published is published ('1'))
     * @param null $published
     *
     * @return bool|object
     *
     * @since     3.3
     */
    static public function getListNotEmpty($id, $published = null)
    {
        $filter_published = isset($published) ? $published : 1;
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)->select('cfd.slug AS cf_slug, cfd.value AS cf_value, cfd.parent_id AS cf_parent_id, cf.titre AS cf_titre')->from('#__allevents_customfields_data AS cfd')->leftJoin($db->qn('#__allevents_customfields') . ' AS cf' . ' ON ' . $db->qn('cf.slug') . ' = ' . $db->qn('cfd.slug'))->where($db->qn('cf.published') . ' = ' . $db->q($filter_published))->where($db->qn('cfd.parent_id') . ' = ' . (int)$id)->order('cf.ordering ASC');
        $db->setQuery($query);
        $list = $db->loadObjectList();
        if ($list)
            return $list;

        return false;
    }

    /**
     * Return the HTML body of Custom fields for this parent form (parent_id)
     *
     * @param        $parent_form
     * @param string $loader_mode
     *
     * @return string HTML fields
     *
     * @throws Exception
     * @since   3.3
     */
    static public function loader($parent_form, $loader_mode = "display")
    {
        $app = JFactory::getApplication();
        // $session = JFactory::getSession();
        // $custom_fields = $session->get('custom_fields');
        $customfields = AllEventsCustomfields::getCustomfields($parent_form);
        $ae_display = '';
        if ($customfields) {
            foreach ($customfields as $icustomfield) {
                if (empty($icustomfield->value))
                    $icustomfield->value = '';

                $options_required = ['list', 'radio'];

                // If type is list or radio, should have options

                if ((in_array($icustomfield->type, $options_required) && $icustomfield->options) || !in_array($icustomfield->type, $options_required)) {
                    $ae_display .= AllEventsCustomfields::displayField($icustomfield->type, $icustomfield->titre, $icustomfield->alias, $icustomfield->slug, $icustomfield->description, $icustomfield->value, $icustomfield->options, $icustomfield->required, $loader_mode);
                }
            }

            if ($app->isAdmin())
                $ae_display .= '<hr>';
        } elseif ($app->isAdmin()) {
            $ae_display .= '<div class="alert alert-info">';
            $ae_display .= JText::_('COM_ALLEVENTS_CUSTOMFIELDS_NONE');
            $ae_display .= '</div>';
        } elseif ($app->isSite()) {
            return false;
        }

        return $ae_display;
    }

    /**
     * Gets the custom fields for this form
     *
     * @param $parent_form
     *
     * @return bool|object
     *
     * @throws Exception
     * @since   3.3
     */
    static public function getCustomfields($parent_form)
    {
        $app = JFactory::getApplication();
        $id = $app->input->getInt('id');
        if ($parent_form == 'enrol') {
            $parent_form = 1;
        } elseif ($parent_form == 'event') {
            $parent_form = 2;
        }

        // Get the database connector.
        $db = JFactory::getDbo();
        $list_slugs = [];
        if ($id) {
            $query = $db->getQuery(true)->select('id, slug')->from($db->qn('#__allevents_customfields') . ' AS cf')->where($db->qn('cf.parent_form') . ' = ' . $db->q($parent_form));

            // Run Query

            $db->setQuery($query);

            // Invoke the Query

            $all_slugs = $db->loadObjectList();

            // Create array of custom fields slugs for this event

            foreach ($all_slugs as $s) {
                $list_slugs[] = '"' . $s->slug . '"';
            }

            $list_slugs = implode(',', $list_slugs);
        }

        $query = $db->getQuery(true)->select('cf.*')->from($db->qn('#__allevents_customfields') . ' AS cf');
        if ($id && $list_slugs) {
            // Build the query
            $query->select('cfd.value AS value')->leftJoin($db->qn('#__allevents_customfields_data') . ' AS cfd' . ' ON (' . $db->qn('cfd.parent_id') . ' = ' . (int)$id . ' AND ' . $db->qn('cfd.slug') . ' = ' . $db->qn('cf.slug') . ')')->where($db->qn('cf.slug') . ' IN (' . $list_slugs . ')');
        }

        $query->where($db->qn('cf.parent_form') . ' = ' . $db->q($parent_form))->where($db->qn('cf.published') . ' = 1')->order('cf.ordering ASC');

        // Tell the database connector what query to run.
        $db->setQuery($query);

        // Invoke the query.
        if ($db->loadObjectList())
            return $db->loadObjectList();

        return false;
    }

    /**
     * Create the HTML body of the custom fields
     *
     * @param $type
     * @param $titre
     * @param $alias
     * @param $slug
     * @param $description
     * @param $value
     * @param $options
     * @param $required
     * @param $loader_mode
     *
     * @return bool|object
     *
     * @throws Exception
     * @since   3.3
     */
    static public function displayField($type, $titre, $alias, $slug, $description, $value, $options, $required, $loader_mode)
    {
        $options_required = ['list', 'radio'];
        $ic_prefix = '';
        $is_list = '';

        // If type is list or radio, should have options
        if (in_array($type, $options_required) && !$options)
            return false;
        $app = JFactory::getApplication();
        if (($app->isSite()) && ($loader_mode == "display")) {
            $ic_data = 'custom_fields';
        } else {
            $ic_data = 'jform[custom_fields]';
        }

        if (empty($value))
            $value = '';
        $text_required = $required ? ' required="true"' : '';
        $list_required = $required ? ' required' : '';
        //$radio_required = $required ? ' required' : '';

        // Required, '*' after label
        $required_icon = $required ? ' *' : '';
        $class_label = ($type == 'radio') ? $ic_prefix . 'control-label' : '';
        $aeTip_custom = $description ? htmlspecialchars('<strong>' . $titre . '</strong><br />' . $description . '') : '';


        $ae_fields = '<div class="' . $ic_prefix . 'control-group clearfix" id="' . $alias . '_alias">';
        $ae_fields .= '<div id="' . $alias . '_message"></div>';
        $ae_fields .= '<div class="' . $ic_prefix . 'control-label">';

        // Label
        $label = '<label';
        if ($app->isAdmin()) {
            if ($class_label || $aeTip_custom) {
                if ($aeTip_custom)
                    $label .= ' title="" data-original-title="' . $aeTip_custom . '"';
                $label .= ' class="';
                if ($aeTip_custom)
                    $label .= 'hasTooltip';
                if ($aeTip_custom && $class_label)
                    $label .= ' ';
                if ($class_label)
                    $label .= $class_label;
                $label .= '"';
            }
        }

        if ($type != 'radio') {
            $label .= ' for="' . $slug . '_slug"';
        }

        $label .= '>';
        $label .= $titre;

        $label .= $required_icon;

        $label .= '</label>';
        $ae_fields .= $label;
        $ae_fields .= '</div>';
        $ae_fields .= '<div class="' . $ic_prefix . 'controls' . $is_list . '">';

        // Field Type TEXT
        if ($type == 'text') {
            $ae_fields .= '<input type="' . $type . '"';
            $ae_fields .= (($app->isSite()) && ($loader_mode == "display")) ? 'disabled=""' : '';
            $ae_fields .= ' class="input-large"';
            $ae_fields .= ' id="' . $slug . '_slug"';
            $ae_fields .= ' name="' . $ic_data . '[' . $slug . ']"';
            $ae_fields .= ' value="' . $value . '"';
            $ae_fields .= ' placeholder="' . $options . '"';
            $ae_fields .= $text_required;
            $ae_fields .= ' />';
        } // Field Type LIST
        elseif ($type == 'list') {
            $ae_fields .= '<select' . $list_required . ' type="list"';
            $ae_fields .= (($app->isSite()) && ($loader_mode == "display")) ? 'disabled=""' : '';
            $ae_fields .= ' class="select-large" id="' . $slug . '_slug" name="' . $ic_data . '[' . $slug . ']">';
            //$empty_selected = empty($value) ? ' selected="selected"' : '';
            $ae_fields .= '<option value="">- ' . JText::_('FILTER_SELECT_AN_OPTION') . ' -</option>';
            $opts_list = str_replace("\n", "##BREAK##", $options);
            $opts_list = explode("##BREAK##", $opts_list);
            foreach ($opts_list as $opts) {
                $opt = explode("=", $opts);
                if ($opt[0] && $opt[1]) {
                    if (empty($value)) {
                        $selected = isset($opt[2]) ? ' selected="selected"' : '';
                    } else {
                        $selected = '';
                    }

                    $ae_fields .= '<option value="' . $opt[0] . '"';
                    if ($value == $opt[0]) {
                        $ae_fields .= ' selected="selected"';
                    }

                    $ae_fields .= '' . $selected . '>';
                    $ae_fields .= $opt[1] . '</option>';
                }
            }

            $ae_fields .= '</select>';
        } // Field Type RADIO
        elseif ($type == 'radio') {
            $ae_fields .= '<fieldset ';
            $ae_fields .= (($app->isSite()) && ($loader_mode == "display")) ? 'disabled=""' : '';
            $ae_fields .= ' class="' . $ic_prefix . 'radio ' . $ic_prefix . 'btn-group">';
            $opts_list = str_replace("\n", "##BREAK##", $options);
            $opts_list = explode("##BREAK##", $opts_list);
            foreach ($opts_list as $opts) {
                $opt = explode("=", $opts);
                if (($opt[0] || $opt[0] == 0) && $opt[1]) {
                    if (empty($value)) {
                        $checked = isset($opt[2]) ? ' checked="checked"' : '';
                        $default = $checked ? $ic_prefix . 'btn-success' : '';
                    } elseif ($value == $opt[0]) {
                        $checked = '';
                        $default = $ic_prefix . 'btn-success';
                    } else {
                        $checked = '';
                        $default = '';
                    }

                    // $class_btn = $app->isSite() ? 'ic-btn ' : '';
                    $class_btn = '';
                    $ae_fields .= '<label class="' . $class_btn . $default . '">';
                    $ae_fields .= '<input type="radio"';
                    $ae_fields .= ' id="' . $slug . '_slug"';
                    $ae_fields .= ' name="' . $ic_data . '[';
                    $ae_fields .= $slug;
                    $ae_fields .= ']"';
                    $ae_fields .= ' value="' . $opt[0] . '"';
                    if ($value == $opt[0]) {
                        $ae_fields .= ' checked="checked"';
                    }

                    $ae_fields .= $checked . '/>';
                    $ae_fields .= $opt[1] . '</label>';
                }
            }

            $ae_fields .= '</fieldset>';
        }

        if ($aeTip_custom && $app->isSite()) {
            $ae_fields .= ' <span title="' . $aeTip_custom . '"></span>';
        }

        $ae_fields .= '</div>';
        $ae_fields .= '</div>';

        return $ae_fields;
    }

    /**
     * Save Custom Fields to the database if at least one is filled
     * or update existing data from custom fields.
     *
     * @since   3.3
     *
     * @param        $custom_fields
     * @param        $parent_form
     * @param        $parent_id
     * @param int $published
     * @param string $language
     *
     * @return bool
     */
    static public function saveToData($custom_fields, $parent_form, $parent_id, $published = 1, $language = '*')
    {
        $db = JFactory::getDbo();
        if ($parent_form == 'enrol') {
            $parent_form = 1;
        } elseif ($parent_form == 'event') {
            $parent_form = 2;
        }

        if (isset($custom_fields) && is_array($custom_fields)) {
            foreach ($custom_fields as $name => $value) {
                $customfields_data = new stdClass();
                $customfields_data->slug = $name;
                $customfields_data->value = $value;
                $customfields_data->published = $published;
                $customfields_data->parent_form = $parent_form;
                $customfields_data->parent_id = $parent_id;
                $customfields_data->language = $language;
                $query = $db->getQuery(true)->select('id')->from($db->qn('#__allevents_customfields_data'))->where($db->qn('slug') . ' = ' . $db->q($customfields_data->slug))->where($db->qn('parent_form') . ' = ' . $db->q($customfields_data->parent_form))->where($db->qn('parent_id') . ' = ' . $db->q($customfields_data->parent_id));
                $db->setQuery($query);
                $id_exists = $db->loadResult();
                if (!$id_exists && $customfields_data->value) {
                    $db->insertObject('#__allevents_customfields_data', $customfields_data, 'id');
                } elseif (empty($customfields_data->value)) {
                    $query = $db->getQuery(true);

                    // Delete any empty slug records from the __allevents_customfields_data table if exists

                    $conditions = [$db->quoteName('parent_id') . ' = ' . $db->quote($customfields_data->parent_id), $db->quoteName('slug') . ' = ' . $db->quote($customfields_data->slug)];
                    $query->delete($db->quoteName('#__allevents_customfields_data'));
                    $query->where($conditions);
                    $db->setQuery($query);
                    if (!$db->execute()) {
                        return false;
                    }
                } else {
                    $customfields_data->id = $id_exists;
                    $db->updateObject('#__allevents_customfields_data', $customfields_data, 'id');
                }
            }
        }

        return true;
    }

    /**
     * Delete Custom Fields from the database
     * or update existing data from custom fields.
     *
     * @since    3.3
     *
     * @param $parent_form
     * @param $parent_id
     *
     * @return bool
     */
    static public function deleteData($parent_form, $parent_id)
    {
        $db = JFactory::getDbo();
        if ($parent_form == 'enrol') {
            $parent_form = 1;
        } elseif ($parent_form == 'event') {
            $parent_form = 2;
        }

        // Delete any unwanted customfields records from the __allevents_customfields_data table

        $query = $db->getQuery(true)->delete($db->qn('#__allevents_customfields_data'))->where('parent_id = ' . (int)$parent_id)->where('parent_form = ' . (int)$parent_form);
        $db->setQuery($query);
        if (!$db->execute()) {
            return false;
        }

        return true;
    }

    /**
     * Clean Custom Fields from the database (fix for previous versions)
     *
     * @since   3.3
     *
     * @param $parent_form
     *
     * @return bool
     */
    static public function cleanData($parent_form)
    {
        $db = JFactory::getDbo();

        // Get Enrolments ids
        if ($parent_form == 'enrol') {
            $parent_form = 1;
            $query = $db->getQuery(true)->select('id')->from($db->qn('#__allevents_enrolments'));
            $db->setQuery($query);
            $list = $db->loadColumn();
        } // Get Events ids
        elseif ($parent_form == 'event') {
            $parent_form = 2;
            $query = $db->getQuery(true)->select('id')->from($db->qn('#__allevents_events'));
            $db->setQuery($query);
            $list = $db->loadColumn();
        }

        $parent_ids = isset($list) && is_array($list) ? implode(',', $list) : '';

        // Delete any unwanted customfields records from the __allevents_customfields_data table

        $query = $db->getQuery(true)->delete($db->qn('#__allevents_customfields_data'))->where('parent_form = ' . (int)$parent_form)->where('parent_id NOT IN (' . $parent_ids . ')');
        $db->setQuery($query);
        if (!$db->execute()) {
            return false;
        }

        return true;
    }
}
