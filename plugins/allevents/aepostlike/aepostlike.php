<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 * plgAlleventsPostLike
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAllEventsAEpostlike extends JPlugin
{
    protected $event_id;

    /**
     * plgAlleventsPostLike::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     */
    public function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
        JPlugin::loadLanguage('plg_allevents_aepostlike', JPATH_ADMINISTRATOR);
    }

    /**
     * plgAlleventsPostLike::__construct()
     *
     * @param $event
     * @param $params
     *
     * @return string
     * @throws Exception
     */
    public function onAlleventsPostLike($event, $params)
    {
        if (JFactory::getApplication()->getName() != 'site') {
            return "";
        }
        $this->event_id = $event->id;

        return $this->AllEventsPostLike();
    }

    /**
     * plgAlleventsPostLike::__construct()
     *
     */
    private function AllEventsPostLike()
    {
        $rating_dislike = 0;
        $rating_like = 0;

        $db = JFactory::getDBO();
        $query = 'SELECT * FROM #__allevents_postlike WHERE event_id=' . (int)$this->event_id;
        $db->setQuery($query);
        $vote = $db->loadObject();

        if ($vote) {
            $rating_like = intval($vote->rating_like);
        }

        $html = $this->plgAllEventsPostLikeStars($this->event_id, $rating_like);

        return $html;
    }


    /**
     * plgAlleventsPostLike::__construct()
     *
     * @param $id
     * @param $rating_like
     *
     * @return string
     */
    private function plgAllEventsPostLikeStars($id, $rating_like)
    {
        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI::root(true) . '/plugins/allevents/aepostlike/assets/postlike.css');
        global $plgEventPostLikeAddScript;
        if (!$plgEventPostLikeAddScript) {
            $document->addScriptDeclaration("
   function AEPLVote(select,id,i,total_count){
   var currentURL = window.location;
   var live_site = currentURL.protocol+'//'+currentURL.host;
   var msg = document.getElementById('msg_'+id);
   if(select == 0){         
      var info = document.getElementById('postlike_dis_'+id);
   }   
   if(select == 1){
      var info = document.getElementById('postlike_'+id);
   }
   var text = info.innerHTML;
   if (info.className != 'aepostlike-info voted') {
      var ajax=new XMLHttpRequest();
      ajax.onreadystatechange=function() {
      var response;
         if(ajax.readyState==4){      
               response = ajax.responseText;
               if(response=='thanks') msg.innerHTML = '" . JTEXT::_('PLG_ALLEVENTS_AEPOSTLIKE_THANKS') . "';
               if(response=='login') msg.innerHTML = '" . JTEXT::_('PLG_ALLEVENTS_AEPOSTLIKE_LOGIN') . "';
               if(response=='voted') msg.innerHTML = '" . JTEXT::_('PLG_ALLEVENTS_AEPOSTLIKE_VOTED') . "';
               
               if(response=='thanks'){
                  text = '';
                  var newtotal  = total_count+1;
                  text += newtotal;
                  info.innerHTML = text;
               }
         }
      }
        ajax.open(\"GET\",
        live_site+\"/plugins/allevents/aepostlike/assets/ajax.php?select=\"+select+\"&task=vote&user_rating=\"+i+\"&cid=\"+id,
        true);
              ajax.send(0);
           }
           info.className = 'aepostlike-info voted';
        }
         ");
            $plgEventPostLikeAddScript = 1;
        }

        $container = 'span';
        $class = 'aepostlike';
        $spans = '';

        $j = 1;

        $spans .= "<span onclick=\"AEPLVote(0," . $id . "," . $j . "," . $rating_like . ");\"><span class='fa fa-fw fa-heart-o'></span></span>";
        $spans .= "<span class=\"aepostlike-info\" id=\"postlike_dis_" . $id . "\">" . $rating_like . "</span>";

        // $spans .= "<span class=\"like-button\" onclick=\"AEPLVote(0,".$id.",".$j.",".$rating_like.");\">".JTEXT::_('PLG_ALLEVENTS_AEPOSTLIKE_LIKE')."</span>";
        // $spans .= "<span class=\"aepostlike-info\" id=\"postlike_dis_".$id."\">".$rating_like."</span>";
        // $spans .= "<span class=\"dislike-button\" onclick=\"AEPLVote(1,".$id.",".$j.",".$rating_dislike.");\">".JTEXT::_('PLG_ALLEVENTS_AEPOSTLIKE_DISLIKE')."</span>";
        // $spans .= "<span class=\"aepostlike-info\" id=\"postlike_".$id."\">". $rating_dislike."</span>";

        $html = "<" . $container . " class=\"uk-link " . $class . "\">";
        $html .= "<span id=\"rating_" . $id . "\" class=\"current-rating\"></span>" . $spans .
            $html .= "<span class=\"msg-info\" id=\"msg_" . $id . "\"></span>";
        $html .= "</" . $container . ">";

        return $html;
    }
}
