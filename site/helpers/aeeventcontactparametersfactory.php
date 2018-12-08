<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');

/**
 * AllEventsContactParametersFactory
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsContactParametersFactory
{
    /**
     * AllEventsContactParametersFactory::getEventContactParametersInstance
     *
     * @param
     *            $id
     * @param unknown $contact_type
     * @param unknown $contact_label
     * @param unknown $contact_access
     * @param null $contact_details_category
     * @param null $contact_comprofiler_list
     *
     * @return array
     */
    static function getEventContactParametersInstance($id, $contact_type, $contact_label, $contact_access,
                                                      $contact_details_category = null, $contact_comprofiler_list = null)
    {
        $contact_datas = [];

        // Authorization check
        $user = JFactory::getUser();
        $user_view_levels = $user->getAuthorisedViewLevels();
        $view_allowed = in_array($contact_access, $user_view_levels);
        if (!$view_allowed) {
            return null;
        }

        $contact_datas['id'] = $id;
        $contact_datas['type'] = $contact_type;
        $contact_datas['label'] = $contact_label;
        switch ($contact_type) {
            case 0 :
                return null;
            case 1 :
                $contact_datas['readonly'] = false;
                break;
            case 2 :
                if (isset($contact_details_category)) {
                    $contact_datas['contact_details_category'] = $contact_details_category;
                    $contact_datas['readonly'] = false;
                } else {
                    $contact_datas['readonly'] = true;
                }
                break;
            case 3 :
                if (isset($contact_comprofiler_list)) {
                    $contact_datas['contact_comprofiler_list'] = $contact_comprofiler_list;
                    $contact_datas['readonly'] = false;
                } else {
                    $contact_datas['readonly'] = true;
                }
        }

        return $contact_datas;
    }
}
