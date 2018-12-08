<?php

defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * JHtmlTickettype
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class JHtmlTickettype
{
    /**
     * JHtmlTickettype::enable_Tickettype()
     *
     * @param int $value
     * @param int $i
     *
     * @return string
     */
    static function enable_Tickettype($value = 0, $i)
    {
        $states = [
            0 => [
                '',
                'Tickettypes.enable_Tickettype',
                '',
                '',
                'JLIB_HTML_PUBLISH_ITEM',
                true,
                ' icon-unpublish',
                ' icon-unpublish'],
            1 => [
                '',
                'Tickettypes.disable_Tickettype',
                '',
                'JLIB_HTML_UNPUBLISH_ITEM',
                '',
                true,
                ' icon-publish',
                ' icon-publish'],
            2 => [
                '',
                'Tickettypes.disable_Tickettype',
                'JLIB_HTML_UNPUBLISH_ITEM',
                'JARCHIVED',
                true,
                'icon-archive',
                'icon-archive'],
            -2 => [
                '',
                'Tickettypes.enable_Tickettype',
                'JLIB_HTML_PUBLISH_ITEM',
                'JTRASHED',
                true,
                'icon-trash',
                'icon-trash']];

        $state = ArrayHelper::getValue($states, (int)$value, $states[1]);

        $html = '<a class="btn btn-micro hasTooltip" href="javascript:void(0);" onclick="return listItemTask(\'cb' . $i . '\',\'' . $state[1] . '\')" title="' . JText::_($state[3]) . '" data-original-title="' . JText::_($state[4]) . '"><i class="' . JText::_($state[6]) . '"></i></a>';

        return $html;
    }

    /**
     * JHtmlTickettype::Tickettype_enroltype()
     *
     * @param int $value
     * @param int $i
     *
     * @return string
     */
    static function Tickettype_enroltype($value = 0, $i)
    {
        // Array of image, task, title, action
        $states = [
            0 => [
                '',
                'Tickettypes.enrol_unapproved',
                '',
                '',
                'COM_ALLEVENTS_EVENT_ENROL_YES',
                true,
                ' icon-enrol_yes',
                'icon-16-enrol_yes'],
            1 => [
                '',
                'Tickettypes.enrol_approved',
                '',
                '',
                'COM_ALLEVENTS_EVENT_ENROL_NO',
                true,
                ' icon-enrol_no',
                'icon-16-enrol_no'],
            2 => [
                '',
                'Tickettypes.enrol_approved',
                '',
                '',
                'COM_ALLEVENTS_EVENT_ENROL_PERHAPS',
                true,
                ' icon-enrol_perhaps',
                'icon-16-enrol_perhaps'],
            3 => [
                '',
                'Tickettypes.enrol_approved',
                '',
                '',
                'COM_ALLEVENTS_EVENT_ENROL_PENDING',
                true,
                ' icon-enrol_pending',
                'icon-16-enrol_pending'],
        ];

        $state = ArrayHelper::getValue($states, (int)$value, $states[1]);

        $html = '<a class="btn btn-micro hasTooltip" href="javascript:void(0);" onclick="return listItemTask(\'cb' . $i . '\',\'' . $state[1] . '\')" title="' . JText::_($state[3]) . '" data-original-title="' . JText::_($state[4]) . '"><i class="' . JText::_($state[6]) . '"></i></a>';

        return $html;
    }

    /**
     * JHtmlTickettype::approved()
     *
     * @param integer $value
     * @param mixed $i
     * @param boolean $canChange
     *
     * @return string
     */
    public static function approved($value = 0, $i, $canChange = true)
    {
        JHtml::_('bootstrap.tooltip');
        // Array of image, task, title, action
        $states = [
            1 => [
                'unapproved',
                'Tickettypes.enrol_approved',
                'COM_ALLEVENTS_UNAPPROVED',
                'COM_ALLEVENTS_TOGGLE_TO_APPROVE'],
            0 => [
                'approved',
                '',
                'COM_ALLEVENTS_APPROVED',
                ''],
        ];
        $state = ArrayHelper::getValue($states, (int)$value, $states[1]);
        $icon = $state[0];

        if ($canChange) {
            $html = '<a href="#" onclick="return listItemTask(\'cb' . $i . '\',\'' . $state[1] . '\')" class="btn btn-micro hasTooltip' . ($value == 1 ? ' active' : '') . '" title="' . JHtml::tooltipText($state[3]) . '"><i class="icon-' . $icon . '"></i></a>';
        } else {
            $html = '<a class="btn btn-micro hasTooltip disabled' . ($value == 1 ? ' active' : '') . '" title="' . JHtml::tooltipText($state[2]) . '"><i class="icon-' . $icon . '"></i></a>';
        }

        return $html;
    }
}
