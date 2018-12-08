<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
jimport('joomla.event.dispatcher');

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_contact/models', 'ContactModel');

/**
 * AllEventsContactFactory
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsContactFactory
{
    /**
     * AllEventsContactFactory::getEventContactInstance
     *
     * @param unknown $contact_type
     * @param unknown $contact_id
     * @param unknown $contact_label
     * @param unknown $contact_details_id
     * @param integer $contact_comprofiler_id
     * @param unknown $contact_access
     *
     * @return array
     */
    static function getEventContactInstance($contact_type, $contact_label, $contact_id, $contact_details_id,
                                            $contact_comprofiler_id, $contact_access)
    {
        $params = JComponentHelper::getParams('com_allevents');

        $contact_datas = [];
        $messages = [];
        $error_level = '';

        // Unused contact
        if ($contact_type == 0) {
            return null;
        }
        $contact_datas['type'] = $contact_type;
        if ($contact_label != '')
            $contact_datas['label'] = $contact_label;

        // Authorization check
        $user = JFactory::getUser();
        $user_view_levels = $user->getAuthorisedViewLevels();
        $view_allowed = in_array($contact_access, $user_view_levels);
        if (!$view_allowed)
            return null;

        if ($contact_type == 1) {
            // Joomla User
            if ($contact_id == 0)
                return null;
            else {
                // Read User
                $contact_juser = JFactory::getUser($contact_id);
                $contact_datas['name'] = $contact_juser->get('name');
                $contact_datas['username'] = $contact_juser->get('username');
                $contact_datas['mail'] = $contact_juser->get('email');
            }
        } elseif ($contact_type == 2) {
            // Joomla Contact
            if ($contact_details_id == 0)
                return null;
            else {
                require_once JPATH_SITE . '/components/com_allevents/helpers/aejcontactlink.php';
                require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/aejcontactaddressparser.php';
                // Read Contact
                $contact_model = JModelLegacy::getInstance('Contact', 'ContactModel', ['ignore_request' => true]); // , 'ContactModelContact', array('ignore_request' => true));
                $contact_params = JComponentHelper::getParams('com_contact');
                $contact_model->setState('params', $contact_params);
                $contact_detail = $contact_model->getItem($contact_details_id);
                // Check if Contact published
                if (!$contact_detail->published) {
                    $messages[] = ['error',
                        JText::sprintf('COM_ALLEVENTS_JCONTACT_NOT_PUBLISHED_ERR', $contact_details_id)];
                    $error_level = 'error';
                } else {
                    if (in_array($contact_detail->access, $user_view_levels))
                        $contact_datas['link'] = JRoute::_(
                            AllEventsJContactLink::getContactRoute($contact_detail->id, $contact_detail->catid));
                    if ($contact_detail->name != '')
                        $contact_datas['name'] = $contact_detail->name;
                    if ($contact_detail->con_position != '')
                        $contact_datas['position'] = $contact_detail->con_position;
                    if ($contact_detail->telephone != '')
                        $contact_datas['phone'] = $contact_detail->telephone;
                    if ($contact_detail->mobile != '')
                        $contact_datas['mobile'] = $contact_detail->mobile;
                    if ($contact_detail->fax != '')
                        $contact_datas['fax'] = $contact_detail->fax;
                    if ($contact_detail->webpage != '')
                        $contact_datas['website'] = $contact_detail->webpage;
                    if ($contact_detail->misc != '')
                        $contact_datas['misc'] = $contact_detail->misc;
                    if ($contact_detail->user_id) {
                        // Is linked to a Joomla User
                        $contact_juser = JFactory::getUser($contact_detail->user_id);
                        $contact_datas['username'] = $contact_juser->get('username');
                        $contact_datas['mail'] = $contact_juser->get('email');
                    } elseif ($contact_detail->email_to)
                        $contact_datas['mail'] = $contact_detail->email_to;
                    $address_format = $params['geventshow_jcontactaddress'];
                    if (isset($address_format) && $address_format != '') {
                        $address_parser = new AEJContactAddressParser();
                        if (!$address_parser->parseString($address_format)) {
                            $messages[] = ['W', $address_parser->getMessage()];
                            $error_level = $error_level == 'error' ? 'error' : 'warning';
                        } else {
                            $address_datas = [];
                            if ($contact_detail->address != '')
                                $address_datas['address'] = $contact_detail->address;
                            if ($contact_detail->postcode != '')
                                $address_datas['zipcode'] = $contact_detail->postcode;
                            if ($contact_detail->suburb != '')
                                $address_datas['city'] = $contact_detail->suburb;
                            if ($contact_detail->state != '')
                                $address_datas['state'] = $contact_detail->state;
                            if ($contact_detail->country != '')
                                $address_datas['country'] = $contact_detail->country;
                            $formatted_address = $address_parser->populateDatas($address_datas);
                            if ($formatted_address != '')
                                $contact_datas['address'] = $formatted_address;
                        }
                    }
                }
            }
            // #€#
        } elseif ($contact_type == 3) {
            // Community Builder User
            if ($contact_comprofiler_id == 0) {
                return null;
            } else {
                // Import AE helpers
                require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/aecbfields.php';
                require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/aecbuseraddressparser.php';
                // Initialize CB framework
                global $_CB_framework, $ueConfig;
                include_once JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php';
                cbimport('cb.plugins');
                if ($_CB_framework->getUi() == 1)
                    cbimport('language.front');
                else
                    cbimport('language.all');

                // Get CB User data
                $contact_cbuser_data = CBuser::getUserDataInstance($contact_comprofiler_id);
                if (!$contact_cbuser_data->confirmed) {
                    $messages[] = ['error',
                        JText::sprintf('COM_ALLEVENTS_CB_USER_NOT_CONFIRMED_ERR', $contact_comprofiler_id)];
                    $error_level = 'error';
                } else {
                    $aecbfields = AECBFields::getInstance();
                    $cb_fields = $aecbfields->getFields(0);
                    $cbuser_datas = [];
                    foreach ($cb_fields as $cb_field_id => $cb_field)
                        $cbuser_datas[$cb_field['name']] = $contact_cbuser_data->get($cb_field['name']);
                    $cbuser_datas['name'] = $contact_cbuser_data->name;
                    // Format address
                    $address_format = $params['geventshow_cbuseraddress'];
                    if (isset($address_format) && $address_format != '') {
                        $address_parser = new AECBUserAddressParser();
                        if (!$address_parser->parseString($address_format)) {
                            $messages[] = ['W', $address_parser->getMessage()];
                            $error_level = $error_level == 'error' ? 'error' : 'warning';
                        } else {
                            $formatted_address = $address_parser->populateDatas($cbuser_datas);
                            if ($formatted_address != '')
                                $contact_datas['address'] = $formatted_address;
                        }
                    }
                    // Link to CB User if allowed
                    if (in_array($ueConfig['profile_viewaccesslevel'], $user_view_levels))
                        $contact_datas['link'] = JUri::base(true) .
                            '/index.php?option=com_comprofiler&task=userprofile&user=' . $contact_comprofiler_id;

                    // Set other fields
                    $contact_datas['username'] = $cbuser_datas['username'];
                    $contact_datas['name'] = $cbuser_datas['name'];
                    if ($params['geventshow_cbuserorganization'] &&
                        $cbuser_datas[$cb_fields[$params['geventshow_cbuserorganization']]['name']] != ''
                    )
                        $contact_datas['organization'] = $cbuser_datas[$cb_fields[$params['geventshow_cbuserorganization']]['name']];
                    if ($params['geventshow_cbuserposition'] &&
                        $cbuser_datas[$cb_fields[$params['geventshow_cbuserposition']]['name']] != ''
                    )
                        $contact_datas['position'] = $cbuser_datas[$cb_fields[$params['geventshow_cbuserposition']]['name']];
                    if ($params['geventshow_cbuserphone'] &&
                        $cbuser_datas[$cb_fields[$params['geventshow_cbuserphone']]['name']] != ''
                    )
                        $contact_datas['phone'] = $cbuser_datas[$cb_fields[$params['geventshow_cbuserphone']]['name']];
                    if ($params['geventshow_cbusermobile'] &&
                        $cbuser_datas[$cb_fields[$params['geventshow_cbusermobile']]['name']] != ''
                    )
                        $contact_datas['mobile'] = $cbuser_datas[$cb_fields[$params['geventshow_cbusermobile']]['name']];
                    if ($params['geventshow_cbuserfax'] &&
                        $cbuser_datas[$cb_fields[$params['geventshow_cbuserfax']]['name']] != ''
                    )
                        $contact_datas['fax'] = $cbuser_datas[$cb_fields[$params['geventshow_cbuserfax']]['name']];
                    if ($params['geventshow_cbuserwebsite'] &&
                        $cbuser_datas[$cb_fields[$params['geventshow_cbuserwebsite']]['name']] != ''
                    )
                        $contact_datas['website'] = $cbuser_datas[$cb_fields[$params['geventshow_cbuserwebsite']]['name']];
                    if ($params['geventshow_cbusermisc'] &&
                        $cbuser_datas[$cb_fields[$params['geventshow_cbusermisc']]['name']] != ''
                    )
                        $contact_datas['misc'] = $cbuser_datas[$cb_fields[$params['geventshow_cbusermisc']]['name']];
                    if ($params['geventshow_cbuseremail'] &&
                        $cbuser_datas[$cb_fields[$params['geventshow_cbuseremail']]['name']] != ''
                    )
                        $contact_datas['mail'] = $cbuser_datas[$cb_fields[$params['geventshow_cbuseremail']]['name']];
                }
            }
            // #€#
        }

        $contact_datas['error_level'] = $error_level;
        $contact_datas['messages'] = $messages;

        return $contact_datas;
    }
}
