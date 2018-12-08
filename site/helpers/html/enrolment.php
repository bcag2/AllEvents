<?php

defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * JHtmlEnrolment
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class JHtmlEnrolment
{
    /**
     * JHtmlEnrolment::enrolment_enroltype()
     *
     * @param int $value
     * @param int $i
     *
     * @return string
     */
    static function enrolment_enroltype($value = 0, $i)
    {
        // Array of image, task, title, action
        $states = [
            0 => [
                '',
                'enrolments.enrol_unapproved',
                '',
                '',
                'COM_ALLEVENTS_EVENT_ENROL_YES',
                true,
                ' icon-enrol_yes',
                'icon-16-enrol_yes',
                'aeenrol_yes'],
            1 => [
                '',
                'enrolments.enrol_approved',
                '',
                '',
                'COM_ALLEVENTS_EVENT_ENROL_NO',
                true,
                ' icon-enrol_no',
                'icon-16-enrol_no',
                'aeenrol_no'],
            2 => [
                '',
                'enrolments.enrol_approved',
                '',
                '',
                'COM_ALLEVENTS_EVENT_ENROL_PERHAPS',
                true,
                ' icon-enrol_perhaps',
                'icon-16-enrol_perhaps',
                'aeenrol_perhaps'],
            3 => [
                '',                                        //0
                'enrolments.enrol_approved',               //1
                '',                                        //2
                '',                                        //3
                'COM_ALLEVENTS_EVENT_ENROL_PENDING',       //4
                true,                                      //5
                ' icon-enrol_pending',                     //6
                'icon-16-enrol_pending',                   //7
                'aeenrol_pending'],
        ];

        $state = ArrayHelper::getValue($states, (int)$value, $states[1]);

        $html = '<div class="btn-group">';
        $html .= '<span class="btn btn-micro"><span class="' . JText::_($state[8]) . '">' . JText::_($state[4]) . '</span></span>';
        $html .= '<button data-toggle="dropdown" class="dropdown-toggle btn btn-micro">';
        $html .= '   <span class="caret"></span>';
        $html .= '   <span class="element-invisible"></span>';
        $html .= '</button>';
        $html .= '<ul class="dropdown-menu" style="padding:0!important">';
        $html .= '    <li><span style="cursor: pointer" onclick="SetEnrolment(' . $i . ', \'enrolment.enrol_approved\')"><span class="aeenrol_yes"></span>' . JText::_('COM_ALLEVENTS_EVENT_ENROL_YES') . '</span></li>';
        $html .= '    <li><span style="cursor: pointer" onclick="SetEnrolment(' . $i . ', \'enrolment.enrol_unapproved\')"><span class="aeenrol_no"></span>' . JText::_('COM_ALLEVENTS_EVENT_ENROL_NO') . '</span></li>';
        $html .= '    <li><span style="cursor: pointer" onclick="SetEnrolment(' . $i . ', \'enrolment.enrol_perhaps\')"><span class="aeenrol_perhaps"></span>' . JText::_('COM_ALLEVENTS_EVENT_ENROL_PERHAPS') . '</span></li>';
        $html .= '</ul>';
        $html .= '</div>';

        return $html;
    }
}