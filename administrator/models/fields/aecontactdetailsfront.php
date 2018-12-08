<?php
defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * JFormFieldAEContactDetailsFront
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEContactDetailsFront extends JFormFieldList
{
    /**
     * $type
     *
     * @var string Field type
     */
    public $type = 'AEContactDetailsFront';

    /**
     * $contact_details_category
     *
     * @var string Contact category
     */
    protected $contact_details_category = null;

    /**
     * JFormFieldAEContactDetailsFront::setup()
     *
     * Field setup
     *
     * {@inheritDoc}
     *
     * @see JFormField::setup()
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        if (isset($element['contact_details_category'])) {
            //$contact_details_category = $element['contact_details_category'];
        }

        return parent::setup($element, $value, $group);
    }

    /**
     * JFormFieldAEContactDetailsFront::getOptions()
     *
     * @return array
     */
    public function getOptions()
    {
        $options = parent::getOptions();

        $user = JFactory::getUser();
        $user_view_levels = $user->getAuthorisedViewLevels();

        $db = JFactory::getDbo();
        $sql = "SELECT `id`, `name`, `access` FROM `#__contact_details` WHERE `published`=1 ";
        if (isset($this->contact_details_category)) {
            $sql .= "AND `catid`='" . $this->contact_details_category . "' ";
        }
        $sql .= "ORDER BY 2";
        $db->setQuery($sql);
        $items = $db->loadObjectList();
        foreach ($items as $item) {
            if (in_array($item->access, $user_view_levels)) {
                $option = new stdClass();
                $option->checked = false;
                $option->class = '';
                $option->disable = false;
                $option->selected = false;
                $option->text = $item->name;
                $option->value = $item->id;
                $options[] = $option;
            }
        }

        return $options;
    }
}
