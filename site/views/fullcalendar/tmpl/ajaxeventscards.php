<?php

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperString'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/string.php';

if (isset($this->events)) {
    foreach ($this->events as $event) {
        if (isset($event)) {
            foreach ($event as $item) {
                $title = $item->titre;
                $maxLength = 250;
                $description = AllEventsHelperString::cleanText($item->description, $maxLength);
                $url = $item->link;
                $imageURL = JUri::root(true) . '/' . $item->vignette;
                $card = "";
                if (!empty($imageURL)) {
                    $card .= '<a href="' . $url . '"><div class="card_masonry_top" style="background: url("' . $imageURL . '") top left no-repeat;"></div></a>';
                }
                $card .= '<span class="card_masonry_date">' . $item->start . '</span>';
                $card .= "<a href='" . $url . "'><h2 class='card_masonry_title'>" . $title . "</h2></a>";
                $card .= "<p>$description</p>";

                echo str_replace("\n", "", $card) . "\n";
            }
        }
    }
}

