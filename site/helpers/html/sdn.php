<?php

defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * JHtmlSdn
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class JHtmlSdn
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
        $states = [
            0 => [
                'COM_ALLEVENTS_EVENT_ENROL_YES',
                'aeenrol_yes'],
            1 => [
                'COM_ALLEVENTS_EVENT_ENROL_NO',
                'aeenrol_no'],
            2 => [
                'COM_ALLEVENTS_EVENT_ENROL_PERHAPS',
                'aeenrol_perhaps'],
            3 => [
                'COM_ALLEVENTS_EVENT_ENROL_PENDING',
                'aeenrol_pending'],
        ];

        $state = ArrayHelper::getValue($states, (int)$value, $states[1]);

        $user = JFactory::getUser();
        if ($user->authorise('core.enrolhimself', 'com_allevents') == true) {
            $html = '<div class="btn-group">';
            $html .= '<span class="btn btn-micro"><span class="' . JText::_($state[1]) . '">' . JText::_($state[0]) . '</span></span>';
            $html .= '<button data-toggle="dropdown" class="dropdown-toggle btn btn-micro">';
            $html .= '   <span class="caret"></span>';
            $html .= '   <span class="element-invisible"></span>';
            $html .= '</button>';
            $html .= '<ul class="dropdown-menu" style="padding:0!important">';
            $html .= '    <li><span style="cursor: pointer" onclick="EnrolYesItemConfirm(' . $i . ')"><span class="aeenrol_yes"></span>' . JText::_('Validation accréditation') . '</span></li>';
            $html .= '    <li><span style="cursor: pointer" onclick="EnrolNoItemConfirm(' . $i . ')"><span class="aeenrol_no"></span>' . JText::_('Refus accréditation') . '</span></li>';
            $html .= '</ul>';
            $html .= '</div>';
        } else {
            $html = '<div class="btn-group">';
            $html .= '<span class="btn btn-micro"><span class="' . JText::_($state[1]) . '">' . JText::_($state[0]) . '</span></span>';
            $html .= '</div>';
        }

        return $html;
    }
}