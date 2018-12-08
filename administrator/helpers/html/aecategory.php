<?php

defined('_JEXEC') or die;
use Joomla\Utilities\ArrayHelper;

/**
 * JHtmlAECategory
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class JHtmlAECategory
{
    /**
     * JHtmlAECategory::featured()
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
                'category.featured',
                '',
                '',
                'COM_ALLEVENTS_SET_TO_DEFAULT',
                true,
                ' icon-16-sprite icon-16 icon-unfeatured',
                ' icon-16-sprite icon-16 icon-unfeatured'],
            1 => [
                '',
                'category.unfeatured',
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
}
