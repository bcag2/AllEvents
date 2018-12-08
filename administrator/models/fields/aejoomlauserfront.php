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
class JFormFieldAEJoomlaUserFront extends JFormFieldList
{
    public $type = 'AEJoomlaUserFront';

    /**
     * JFormFieldAEContactDetailsFront::getOptions()
     *
     * @return array
     */
    public function getOptions()
    {
        $options = parent::getOptions();

        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id`, `name` FROM `#__users` WHERE `block`=0 ORDER BY 2");
        $items = $db->loadObjectList();
        foreach ($items as $item) {
            $option = new stdClass();
            $option->checked = false;
            //$classes = "";
            $option->class = '';
            $option->disable = false;
            $option->selected = false;
            $option->text = $item->name;
            $option->value = $item->id;
            $options[] = $option;
        }

        return $options;
    }
}