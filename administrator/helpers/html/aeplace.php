<?php

defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * JHtmlAEPlace
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class JHtmlAEPlace
{
    /**
     * JHtmlAEPlace::featured()
     *
     * @param int $value
     * @param int $i
     *
     * @return string
     */
    static function featured($value = 0, $i)
    {
        $states = [
            0 => [
                '',
                'place.featured',
                '',
                '',
                'COM_ALLEVENTS_SET_TO_DEFAULT',
                true,
                ' icon-16-sprite icon-16 icon-unfeatured',
                ' icon-16-sprite icon-16 icon-unfeatured'],
            1 => [
                '',
                'place.unfeatured',
                '',
                'COM_ALLEVENTS_DEFAULT',
                '',
                true,
                ' icon-16-sprite icon-16 icon-featured',
                ' icon-16-sprite icon-16 icon-featured'],
        ];

        $state = ArrayHelper::getValue($states, (int)$value, $states[1]);

        $html = '<a class="btn btn-micro hasTooltip" href="javascript:void(0);" onclick="return listItemTask(\'cb' . $i . '\',\'' . $state[1] . '\')" title="' . JText::_($state[3]) . '" data-original-title="' . JText::_($state[4]) . '"><i class="' . JText::_($state[6]) . '"></i></a>';

        return $html;
    }

    /**
     * JHtmlAEPlace::coordinates()
     *
     * @param integer $value
     *
     * @return string
     * @internal param mixed $i
     */
    static function coordinates($value = 0)
    {
        $states = [
            0 => [
                '',
                '',
                '',
                '',
                'COM_ALLEVENTS_PLACE_NO_COORD',
                true,
                ' icon-16-sprite icon-16 icon-notification-2',
                ' icon-16-sprite icon-16 icon-notification-2'],
            1 => [
                '',
                '',
                '',
                'COM_ALLEVENTS_PLACE_COORD',
                '',
                true,
                ' icon-16-sprite icon-16 icon-location',
                ' icon-16-sprite icon-16 icon-location'],
        ];

        $state = ArrayHelper::getValue($states, (int)$value, $states[1]);

        $html = '<a class="btn btn-micro hasTooltip" href="javascript:void(0);" title="' . JText::_($state[3]) . '" data-original-title="' . JText::_($state[4]) . '"><i style="height:14px" class="' . JText::_($state[6]) . '"></i></a>';

        return $html;
    }
}
