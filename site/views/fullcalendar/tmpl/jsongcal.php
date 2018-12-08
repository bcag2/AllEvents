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
$Array = [];
$rowArray = [];

if (isset($this->calendars)) {
    foreach ($this->calendars as $calendar) {
        if (isset($calendar)) {
            foreach ($calendar as $item) {
                $rowArray['id'] = $item->id;
                $rowArray['id_gcalendar'] = $item->id_gcalendar;
                $rowArray['className'] = $item->classe;
                $rowArray['color'] = $item->couleur;
                $rowArray['textColor'] = $item->couleur_texte;

                array_push($Array, $rowArray);
            }
        }
    }
}

echo json_encode($Array);

