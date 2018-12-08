<?php
/**
 * JFormFieldAEToggleAgenda
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('category');

/**
 * Class JFormFieldAEToggleActivity
 */
class JFormFieldAEToggleActivity extends JFormFieldCategory
{
    public $type = 'AEToggleActivity';

    /**
     * Method to get the field options for category
     * Use the extension attribute in a form to specify the.specific extension for
     * which categories should be displayed.
     * Use the show_root attribute to specify whether to show the global category root in the list.
     *
     * @return  array    The field option objects.
     *
     * @since   11.1
     */
    /**
     * @return array
     */
    protected function getOptions()
    {
        $options = [];
        $db = JFactory::getDbo();
        $db->setQuery("SELECT `id`, `titre` FROM `#__allevents_activities` WHERE published = 1 ORDER BY 2");
        $items = $db->loadObjectList();

        foreach ($items as $item) {
            $options[] = JHtml::_('select.option', $item->id, $item->titre);
        }

        return $options;
    }
}
