<?php
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('sql');

/**
 * JFormFieldAEEnrolType
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEEnrolType extends JFormFieldSQL
{
    public $type = 'AEEnrolType';

    /**
     * JFormFieldAEEnrolType::getInput()
     *
     * @return string
     */
    public function getInput()
    {
        $html = '';
        $html .= '<select class ="chzn-single chzn-color-enroltype" id="' . $this->id . '" name="' . $this->name . '">';

        $html .= '<option class ="aeenrol_yes" value="0" ' . ($this->value == 0 ? 'selected="selected">' : '>') . JText::_('COM_ALLEVENTS_EVENT_ENROL_YES') . '</option>';
        $html .= '<option class ="aeenrol_no" value="1" ' . ($this->value == 1 ? 'selected="selected">' : '>') . JText::_('COM_ALLEVENTS_EVENT_ENROL_NO') . '</option>';
        $html .= '<option class ="aeenrol_perhaps" value="2" ' . ($this->value == 2 ? 'selected="selected">' : '>') . JText::_('COM_ALLEVENTS_EVENT_ENROL_PERHAPS') . '</option>';
        $html .= '<option class ="aeenrol_pending" value="3" ' . ($this->value == 3 ? 'selected="selected">' : '>') . JText::_('COM_ALLEVENTS_EVENT_ENROL_PENDING') . '</option>';

        $html .= '</select>';

        return $html;
    }
}