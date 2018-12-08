<?php

defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * JHtmlEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class JHtmlEvent
{
    /**
     * JHtmlEvent::featured()
     *
     * @param int $value
     * @param int $i
     * @param boolean $canChange
     *
     * @return string
     */
    public static function featured($value = 0, $i, $canChange = true)
    {
        JHtml::_('bootstrap.tooltip');
        // Array of image, task, title, action
        $states = [
            0 => [
                'unfeatured',
                'events.hot',
                'COM_ALLEVENTS_UNFEATURED',
                'COM_ALLEVENTS_TOGGLE_TO_FEATURE'],
            1 => [
                'featured',
                'events.unhot',
                'COM_ALLEVENTS_FEATURED',
                'COM_ALLEVENTS_TOGGLE_TO_UNFEATURE'],
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

    /**
     * JHtmlEvent::approved()
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
        // la valeur contient la donnée proposal donc le contraire.
        $value = ($value == 0) ? 1 : 0;
        // Array of image, task, title, action
        $states = [
            0 => [
                'unapproved',
                'events.approved',
                'COM_ALLEVENTS_UNAPPROVED',
                'COM_ALLEVENTS_TOGGLE_TO_APPROVE'],
            1 => [
                'approved',
                '',
                'COM_ALLEVENTS_APPROVED',
                'COM_ALLEVENTS_TOGGLE_TO_UNAPPROVE'],
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

    /**
     * JHtmlEvent::enrolment_enabled()
     *
     * @param integer $value
     * @param mixed $i
     *
     * @return string
     */
    static function enrolment_enabled($value = 0, $i)
    {
        $states = [
            -1 => [
                '',
                '',
                '',
                '',
                'COM_ALLEVENTS_EVENT_ENROLMENT_CLOSED',
                true,
                ' icon-16-sprite icon-16 icon-16-no_enrolment',
                ' icon-16-sprite icon-16 icon-16-no_enrolment'],
            0 => [
                '',
                'events.enrolment',
                '',
                '',
                'COM_ALLEVENTS_EVENT_NO_ENROLMENT',
                true,
                ' icon-16-sprite icon-16 icon-16-no_enrolment',
                ' icon-16-sprite icon-16 icon-16-no_enrolment'],
            1 => [
                '',
                'events.unenrolment',
                '',
                'COM_ALLEVENTS_EVENT_ENROLMENT',
                '',
                true,
                ' icon-16-sprite icon-16 icon-16-enrolment',
                ' icon-16-sprite icon-16 icon-16-enrolment'],
        ];

        $state = ArrayHelper::getValue($states, (int)$value, $states[1]);

        $html = '<a class="btn btn-micro hasTooltip" href="javascript:void(0);" onclick="return listItemTask(\'cb' . $i . '\',\'' . $state[1] . '\')" title="' . JText::_($state[3]) . '" data-original-title="' . JText::_($state[4]) . '"><i class="' . JText::_($state[6]) . '"></i></a>';

        return $html;
    }

    /**
     * JHtmlEvent::enable_event()
     *
     * @param int $value
     * @param int $i
     *
     * @return string
     */
    static function enable_event($value = 0, $i)
    {
        $states = [
            0 => [
                '',
                'events.enable_event',
                '',
                '',
                'JLIB_HTML_PUBLISH_ITEM',
                true,
                ' icon-unpublish',
                ' icon-unpublish'],
            1 => [
                '',
                'events.disable_event',
                '',
                'JLIB_HTML_UNPUBLISH_ITEM',
                '',
                true,
                ' icon-publish',
                ' icon-publish'],
            2 => [
                '',
                'events.disable_event',
                'JLIB_HTML_UNPUBLISH_ITEM',
                'JARCHIVED',
                true,
                'icon-archive',
                'icon-archive'],
            -2 => [
                '',
                'enable_event',
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
     * JHtmlEvent::state()
     *
     * @param int $state
     *
     * @return string
     */
    public static function state($state = 0)
    {
        if ((int)$state == 1) {
            return '<span class="label label-success event-state">' . JText::_('JPUBLISHED') . '</span>';
        }

        if ((int)$state == 0) {
            return '<span class="label label-important event-state">' . JText::_('JUNPUBLISHED') . '</span>';
        }

        if ((int)$state == -1) {
            return '<span class="label label-warning event-state">' . JText::_('JARCHIVED') . '</span>';
        }

        if ($state == -2) {
            return '<span class="label label-warning event-state">' . JText::_('JTRASHED') . '</span>';
        }

        return '<span class="label event-state">' . $state . '</span>';
    }

    /**
     * JHtmlEvent::approval()
     *
     * @param int $approval
     *
     * @return string
     */
    public static function approval($approval = 0)
    {
        if (0 === (int)$approval) {
            return '<span class="label label-success event-state">' . JText::_('AE_APPROVED') . '</span>';
        }

        if (1 === (int)$approval) {
            return '<span class="label event-state">' . JText::_('AE_NOT_APPROVED') . '</span>';
        }

        return '<span class="label event-state">' . $approval . '</span>';
    }

    /**
     * JHtmlEvent::cancelled()
     *
     * @param int $cancelled
     *
     * @return string
     */
    public static function cancelled($cancelled = 0)
    {
        if (0 === (int)$cancelled) {
            return '<span class="label label-success event-state">' . JText::_('AE_CONFIRMED') . '</span>';
        }

        if (1 === (int)$cancelled) {
            return '<span class="label label-important event-state">' . JText::_('AE_CANCELLED') . '</span>';
        }

        return '<span class="label event-state">' . $cancelled . '</span>';
    }

}
