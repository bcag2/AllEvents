<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');
JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_contact/models', 'ContactModel');
// JControllerLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_contact/controllers', 'ContactModel');

/**
 * AllEventsControllerContact
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerContact extends ContactControllerContact
{
    /**
     * AllEventsControllerAgenda::__construct()
     *
     * @throws Exception
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * AllEventsControllerAgenda::save()
     *
     * @param mixed $key
     * @param mixed $urlVar
     *
     * @return bool
     * @throws Exception
     */
    public function save($key = null, $urlVar = null)
    {
        JLoader::import('components.com_languages.helpers.jsonresponse', JPATH_ADMINISTRATOR);

        $model = $this->getModel('contact');
        // $table = $this->getTable();
        $data = $this->input->post->get('jform', [], 'array');
        $data['id'] = 0;
        $data['alias'] = '';
        $data['published'] = 1;
        $data['params']['linka'] = '';
        $data['params']['linkb'] = '';
        $data['params']['linkc'] = '';
        $data['params']['linkd'] = '';
        $data['params']['linke'] = '';
        $data['catid'] = 0;
        $data['language'] = '*';
        $data['metadata'] = [];
        /*
$data['alias']= '' ; 
$data['version_note']= '' ; 
$data['user_id']=0 ;
// $data['published']=1 ;
// $data['catid']=4 ;
$data['access']=1 ;
$data['misc']= '' ; 
$data['created_by']=0 ;
$data['created_by_alias']= '' ; 
$data['created']= '' ; 
$data['modified']= '' ; 
$data['modified_by']= '' ; 
$data['publish_up']= '' ; 
$data['publish_down']= '' ; 
$data['metakey']= '' ; 
$data['metadesc']= '' ; 
$data['language']='*' ; 
$data['featured']=0 ;
$data['image']= '' ; 
$data['con_position']= '' ; 
$data['email_to']= '' ; 
$data['address']= '' ; 
$data['suburb']= '' ; 
$data['state']= '' ; 
$data['postcode']= '' ; 
$data['country']= '' ; 
$data['telephone']= '' ; 
$data['mobile']= '' ; 
$data['fax']= '' ; 
$data['webpage']= '' ; 
$data['sortname1']= '' ; 
$data['sortname2']= '' ; 
$data['sortname3']= '' ; 
// [params']=Array ( [show_contact_category']=[show_contact_list']=[presentation_style']=[show_tags']=[show_name']=[show_position']=[show_email']=[show_street_address']=[show_suburb']=[show_state']=[show_postcode']=[show_country']=[show_telephone']=[show_mobile']=[show_fax']=[show_webpage']=[show_misc']=[show_image']=[allow_vcard']=[show_articles']=[articles_display_num']=[show_profile']=[show_links']=[linka_name']=[linka']=[linkb_name']=[linkb']=[linkc_name']=[linkc']=[linkd_name']=[linkd']=[linke_name']=[linke']=[contact_layout']=[show_email_form']=[show_email_copy']=[banned_email']=[banned_subject']=[banned_text']=[validate_session']=[custom_reply']=[redirect']=) 
$data['metadata']['robots']='' ; 
$data['metadata']['rights']='' ; 
$data['hits']= '' ; 
$data['version']= '' ; 
$data['associations']['fr-FR']='' ; 
$data['associations']['en-GB']='' ; 
$data['tags']= '' ; */


        // echo '<pre>'.print_r($model,true).'</pre>' ; 

        //throw new Exception('<pre>' . print_r($model, true) . '</pre>');

        $return = $model->save($data);

        if (JFactory::getApplication()->input->get('ajax', 0) != 0) {
            JFactory::getApplication()->enqueueMessage($this->message);
            echo new  JResponseJson(['id' => 0, 'display' => $table->titre]);
            JFactory::getApplication()->close();
        }

        return $return;
    }
}
