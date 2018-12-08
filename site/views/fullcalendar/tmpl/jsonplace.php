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
$rowArray['key'] = 0;
$rowArray['label'] = JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('PLACE'));
array_push($Array, $rowArray);
if (isset($this->data->places)) {
    foreach ($this->data->places as $obj) {
        if (isset($obj)) {
            $rowArray['key'] = $obj->id;
            $rowArray['label'] = $obj->titre;
            array_push($Array, $rowArray);
        }
    }
}
echo json_encode($Array);

