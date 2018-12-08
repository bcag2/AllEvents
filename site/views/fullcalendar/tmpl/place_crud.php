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

$data = json_decode(JFactory::getApplication()->input->getString('place'), true);
$user = JFactory::getUser();

if (!class_exists('AllEventsModelPlace')) require(JPATH_COMPONENT . '/models/place.php');

$data_save = [];
$myplace = new AllEventsModelPlace();
switch ($data['type_action']) {
    case "INS":
        if ($user->authorise('core.satellites', 'com_allevents') !== true) {
            echo false;
        } else {
            $data_save['id'] = null;
            $data_save['titre'] = $data['title'];
            $data_save['rue'] = $data['address'];
            $data_save['codepostal'] = $data['zipcode'];
            $data_save['ville'] = $data['city'];
            $data_save['published'] = 1;
            $data_save['image_bullet'] = 'media/com_allevents/images/bullets/map.png';
            $data_save['created_date'] = JFactory::getDate()->toSql(false);
            $bReturn = $myplace->save($data_save);
            echo ($bReturn === false) ? false : true;
        }
        break;
    case "READ":
        $sReturn = '<select name="AEFC-search-places" id="AEFC-search-places">';
        $sReturn .= '<option value="0" class="avatar" title="media/com_allevents/images/bullets/map.png">' . JText::_('PLACES') . '</option>';
        if (isset($this->places)) {
            foreach ($this->places as $place) {
                if (isset($place)) {
                    foreach ($place as $item) {
                        $sReturn .= '<option value="' . $item->id . '" class="avatar" title="' . $item->image_bullet . '">' . $item->titre . '</option>';
                    }
                }
            }
        }
        $sReturn .= '</select>';
        echo $sReturn;
        break;
}

