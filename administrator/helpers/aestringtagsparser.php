<?php

/**
 * AEStringTagsParser
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

/**
 * Parse string to find {xx} style tags and check if tags are in a known tags list
 */
abstract class AEStringTagsParser

{
    protected $available_tags;
    protected $used_tags;
    protected $unavailable_tags;
    protected $current_string;
    protected $message;

    /**
     * AEStringTagsParser constructor.
     *
     * @param $available_tags
     */
    protected function __construct($available_tags)
    {
        $this->available_tags = $available_tags;
    }

    /**
     * AEStringTagsParser::getAvailableTags()
     *
     * Return available tags
     * return tags
     */
    public function getAvailableTags()
    {
        return $this->available_tags;
    }

    /**
     * AEStringTagsParser::parseString($string)
     *
     * @param $string :
     *                string to parse
     *                return true if success
     *
     * @return bool
     */
    public function parseString($string)
    {
        JFactory::getLanguage()->load('com_allevents', JPATH_ADMINISTRATOR, JFactory::getLanguage()->getTag(), true);

        $this->current_string = $string;
        $this->message = "";

        // Extract tags list
        $result = preg_match_all('#{+(.*?)}#', $string, $tags, PREG_PATTERN_ORDER);
        if ($result === false) {
            $this->message = JText::_('COM_ALLEVENTS_STRINGPARSER_ERRSYN', $string);

            return false;
        }
        $this->used_tags = array_unique($tags[1], SORT_STRING);

        // Check tags names
        $this->unavailable_tags = array_diff($this->used_tags, $this->available_tags);
        if (!empty($this->unavailable_tags)) {
            $unavailable_tags = '{' . implode('}, {', $this->unavailable_tags) . '}';
            $available_tags = '{' . implode('}, {', $this->available_tags) . '}';
            $this->message = JText::sprintf('COM_ALLEVENTS_STRINGPARSER_ERRFIELD', $unavailable_tags, $available_tags);

            return false;
        }

        return true;
    }

    /**
     * AEStringTagsParser::getMessage()
     *
     * Return error message if error detected in parseString($string)
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * AEStringTagsParser::getUsedTags()
     *
     * Return tags extracted by parseString($string)
     */
    public function getUsedTags()
    {
        return $this->used_tags;
    }

    /**
     * AEStringTagsParser::populateDatas($datas)
     *
     * @param array $datas
     *
     * @return mixed|string
     */
    public function populateDatas($datas = [])
    {
        $formatted_string = $this->current_string;
        foreach ($this->used_tags as $used_tag) {
            if (isset($datas[$used_tag])) {
                $value = $datas[$used_tag];
            } else {
                $value = "";
            }
            $formatted_string = str_replace('{' . $used_tag . '}', $value, $formatted_string);
        }
        $formatted_string = trim($formatted_string);
        while (strpos($formatted_string, "  ") !== false) {
            $formatted_string = str_replace("  ", " ", $formatted_string);
        }
        while (strpos($formatted_string, "\n\n") !== false) {
            $formatted_string = str_replace("\n\n", "\n", $formatted_string);
        }

        return $formatted_string;
    }
}
