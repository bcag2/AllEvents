<?php

defined('_JEXEC') or die;

/**
 * AllEventsHelperString
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelperString
{
    /**
     * AllEventsHelperString::cleanText()
     *
     * @param      $text
     * @param int $maxLength
     * @param bool $allowHtml
     *
     * @return mixed
     */
    public static function cleanText($text, $maxLength = 100, $allowHtml = false)
    {
        // $introtext = JHtml::_('content.prepare', $text);
        $fulltext = '';

        $pattern = '#<hr\s+id=("|\')system-readmore("|\')\s*\/*>#i';
        $tagPos = preg_match($pattern, $text);

        if ($tagPos == 0) {
            $introtext = $text;
        } else {
            list ($introtext, $fulltext) = preg_split($pattern, $text, 2);
        }

        if ($allowHtml) {
            $introtext = trim(strip_tags($introtext));
            $introtext = addcslashes($introtext, '"\\/');
        }

        return JHtml::_('string.truncate', $introtext, $maxLength, $noSplit = true, $allowHtml);
    }
}

