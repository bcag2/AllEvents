<?php
/**
 * JFormFieldAEToggleEnrolType
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
 * Class JFormFieldAEToggleEnrolType
 */
class JFormFieldAEToggleEnrolType extends JFormFieldCategory
{
    public $type = 'AEToggleEnrolType';

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
        $options[] = JHtml::_('select.option', 0, JText::_('COM_ALLEVENTS_EVENT_ENROL_YES'));
        $options[] = JHtml::_('select.option', 1, JText::_('COM_ALLEVENTS_EVENT_ENROL_NO'));
        $options[] = JHtml::_('select.option', 2, JText::_('COM_ALLEVENTS_EVENT_ENROL_PERHAPS'));
        $options[] = JHtml::_('select.option', 3, JText::_('COM_ALLEVENTS_EVENT_ENROL_PENDING'));

        return $options;
    }
}
