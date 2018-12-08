<?php

defined('_JEXEC') or die;

define('CMP_OG_LINKIMG', JUri::root(true) . '/plugins/allevents/aesocial/media/linkcmp.png');
define('CMP_FB_LOGOIMG', JUri::root(true) . '/plugins/allevents/aesocial/media/fbcmp.png');
define('CMP_PLG_NOTIFY', JUri::root(true) . '/plugins/allevents/aesocial/facebook/notify.php');
define('CUSTOM_FB_SHARE_IMG', JUri::root(true) . '/plugins/allevents/aesocial/media/fbicon.png');
define('CUSTOM_TWITTER_IMG', JUri::root(true) . '/plugins/allevents/aesocial/media/twittericon.png');
define('CUSTOM_GOOGLE_IMG', JUri::root(true) . '/plugins/allevents/aesocial/media/googleicon.png');
define('CUSTOM_LINKEDIN_IMG', JUri::root(true) . '/plugins/allevents/aesocial/media/linkedinicon.png');
define('CUSTOM_PINTEREST_IMG', JUri::root(true) . '/plugins/allevents/aesocial/media/pinteresticon.png');
define('_BEFORE', 1);
define('_AFTER', 2);

$document = JFactory::getDocument();
$docType = $document->getType();
// only in html
if ($docType != 'html') {
    return;
}
if (!class_exists('JSite'))
    require_once(JPATH_SITE . '/includes/application.php');

jimport('joomla.plugin.plugin');
jimport('joomla.environment.browser');

/**
 * plgAlleventsaesocial
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsAESocial extends JPlugin
{
    public $images = [];
    public $contents = [];
    public $descriptions = [];
    public $description = '';

    /**
     * plgAlleventsaesocial::plgContentfacebooklikeandshare()
     *
     * @param mixed $subject
     * @param mixed $params
     *
     * @return void
     */
    function plgContentfacebooklikeandshare(&$subject, $params)
    {
        parent::__construct($subject, $params);
    }

    /**
     * plgAlleventsaesocial::onAlleventsBeforeDisplayEvent()
     *
     * @param mixed $event
     * @param mixed $params
     *
     * @return string
     */
    function onAlleventsBeforeDisplayEvent(&$event, &$params)
    {
        return $this->InjectCode($event, $params, _BEFORE);
    }

    /**
     * plgAlleventsaesocial::InjectCode()
     *
     * @param mixed $event
     * @param mixed $params
     * @param mixed $mode
     *
     * @return string
     * @throws Exception
     */
    private function InjectCode(&$event, &$params, $mode)
    {
        if (!property_exists($event, 'id') || !isset($event->id)) {
            return '';
        }

        $app = JFactory::getApplication();
        $format = $app->input->get('format');
        if (($format == 'pdf') || ($format == 'feed')) {
            return '';
        }

        $enable_fb_comments = $this->params->get('enable_fb_comments');
        $enable_fb_like = $this->params->get('enable_fb_like');
        $enable_fb_share = $this->params->get('enable_fb_share');
        $enable_fb_send = $this->params->get('enable_fb_send');
        $enable_twitter = $this->params->get('enable_twitter');
        $enable_google = $this->params->get('enable_google');
        $enable_google_share = $this->params->get('enable_google_share');
        $enable_linkedin = $this->params->get('enable_linkedin');
        $enable_pinterest = $this->params->get('enable_pinterest');
        $pinterest_selection = $this->params->get('pinterest_selection');
        $view = $app->input->get('view');
        $view_event_buttons = $this->params->get('view_article_buttons');
        $view_event_comments = $this->params->get('view_article_comments');
        $enable_view_buttons = (($view == 'event') && ($view_event_buttons));
        $enable_view_comments = (($view == 'event') && ($view_event_comments));
        $enable_buttons = (($enable_fb_like) || ($enable_fb_share) || ($enable_fb_send) || ($enable_linkedin) || ($enable_google) || ($enable_google_share) || ($enable_twitter) || (($enable_pinterest) && (!$pinterest_selection)));
        if (($enable_buttons) && ($enable_view_buttons)) {
            $agenda_to_be_excluded_buttons = $this->params->get('agenda_to_be_excluded_buttons', '');
            $event_to_be_excluded_buttons = $this->params->get('event_to_be_excluded_buttons', '');
            $excludedContentList_buttons = @explode(",", $event_to_be_excluded_buttons);
            if (isset($event->id)) {
                if (in_array($event->id, $excludedContentList_buttons)) {
                    $enable_buttons = false;
                }
                if (is_array($agenda_to_be_excluded_buttons)) {
                    if (in_array($event->agenda_id, $agenda_to_be_excluded_buttons)) {
                        $enable_buttons = false;
                    }
                } else {
                    $excludedCatList_buttons = @explode(",", $agenda_to_be_excluded_buttons);
                    if (in_array($event->agenda_id, $excludedCatList_buttons)) {
                        $enable_buttons = false;
                    }
                }
            } else {
                $id = $app->input->get('id');
                if (is_array($agenda_to_be_excluded_buttons)) {
                    if (in_array($id, $agenda_to_be_excluded_buttons)) {
                        $enable_buttons = false;
                    }
                } else {
                    $excludedCatList_buttons = @explode(",", $agenda_to_be_excluded_buttons);
                    if (in_array($id, $excludedCatList_buttons)) {
                        $enable_buttons = false;
                    }
                }
            }
        } else {
            $enable_buttons = false;
        }

        if (($enable_fb_comments) && ($enable_view_comments)) {
            $agenda_to_be_excluded_comments = $this->params->get('agenda_to_be_excluded_comments');
            $event_to_be_excluded_comments = $this->params->get('event_to_be_excluded_comments', '');
            $excludedContentList_comments = @explode(",", $event_to_be_excluded_comments);
            if (isset($event->id)) {
                if (in_array($event->id, $excludedContentList_comments)) {
                    $enable_fb_comments = false;
                }
                if (is_array($agenda_to_be_excluded_comments)) {
                    if (in_array($event->agenda_id, $agenda_to_be_excluded_comments)) {
                        $enable_fb_comments = false;
                    }
                } else {
                    $excludedCatList_comments = @explode(",", $agenda_to_be_excluded_comments);
                    if (in_array($event->agenda_id, $excludedCatList_comments)) {
                        $enable_fb_comments = false;
                    }
                }
            } else {
                $id = $app->input->get('id');
                if (is_array($agenda_to_be_excluded_comments)) {
                    if (in_array($id, $agenda_to_be_excluded_comments)) {
                        $enable_fb_comments = false;
                    }
                } else {
                    $excludedCatList_comments = @explode(",", $agenda_to_be_excluded_comments);
                    if (in_array($id, $excludedCatList_comments)) {
                        $enable_fb_comments = false;
                    }
                }
            }

        } else {
            $enable_fb_comments = false;
        }

        $print = $app->input->get('print');
        if ($print) {
            $enable_buttons = false; // no buttons
            if ($this->params->get('fb_comments_print', '0') == '0') {
                $enable_fb_comments = false;
            }
        }

        $url = $event->event_link;
        $n = mt_rand(1, 10000);
        $htmlButtonsCode0 = '';
        $htmlButtonsCode1 = '';
        if ($enable_buttons) {
            $htmlButtonsCode0 = "{idkey=" . $n . "b0[url=" . urlencode($url) . "][title=" . urlencode($event->titre) . "][desc=" . urlencode($event->description) . "]}";
            $htmlButtonsCode1 = "{idkey=" . $n . "b1[url=" . urlencode($url) . "][title=" . urlencode($event->titre) . "][desc=" . urlencode($event->description) . "]}";
        }
        $htmlCommentsCode = ($enable_fb_comments) ? "{idkey='" . $n . "c'[url=" . urlencode($url) . "]}" : "";
        if ($mode == _BEFORE) {
            return $htmlButtonsCode0;
        } elseif ($mode == _AFTER) {
            return $htmlButtonsCode1 . $htmlCommentsCode;
        } else {
            return null;
        }
    }

    /**
     * plgAlleventsaesocial::onAlleventsAfterDisplayEvent()
     *
     * @param mixed $event
     * @param mixed $params
     *
     * @return string
     */
    function onAlleventsAfterDisplayEvent(&$event, &$params)
    {
        return $this->InjectCode($event, $params, _AFTER);
    }

    /**
     * plgAlleventsaesocial::onAlleventsAfterSave()
     *
     * permet de detecter la sauvegarde d'un évènement AllEvents et de le publier le cas échéant
     *
     * @param mixed $context
     * @param mixed $event
     * @param mixed $isNew
     *
     * @return void
     */
    function onAlleventsAfterSave($context, $event, $isNew)
    {
        if (!isset($context)) {
            $context = null;
        }
        $this->Save($context, $event, $isNew);
    } //end InjectCode

    /**
     * plgAlleventsaesocial::Save()
     *
     * @param mixed $context
     * @param mixed $event
     * @param mixed $isNew
     *
     * @return boolean
     * @throws Exception
     */
    function Save($context, $event, $isNew)
    {
        if ($_REQUEST['jform']['published'] != '1')
            return false;
        if ($_REQUEST['jform']['access'] != '1')
            return false;
        $app = JFactory::getApplication();
        $fb_enable_autopublish = $this->params->get('fb_enable_autopublish');
        $twitter_enable_autopublish = $this->params->get('twitter_enable_autopublish'); //Enable autopublish only on the events or categories where are rendered the share buttons
        $category_to_be_excluded = $this->params->get('agenda_to_be_excluded_buttons', '');
        $content_to_be_excluded = $this->params->get('event_to_be_excluded_buttons', '');
        $excludedContentList = @explode(",", $content_to_be_excluded);
        if (isset($event->id)) {
            if (in_array($event->id, $excludedContentList)) {
                return true;
            }
            if (is_array($category_to_be_excluded)) {
                if (in_array($event->agenda_id, $category_to_be_excluded)) {
                    return true;
                }
            } else {
                $excludedCatList = @explode(",", $category_to_be_excluded);
                if (in_array($event->agenda_id, $excludedCatList)) {
                    return true;
                }
            }
        } else {
            $id = $app->input->get('id');
            if (is_array($category_to_be_excluded)) {
                if (in_array($id, $category_to_be_excluded)) {
                    return true;
                }
            } else {
                $excludedCatList = @explode(",", $category_to_be_excluded);
                if (in_array($id, $excludedCatList)) {
                    return true;
                }
            }
        }

        //Enable autopublish only on "apply" action
        if ($_REQUEST['task'] != 'apply') {
            $this->show('1 not apply', 'error');

            return true;
        }
        if (($fb_enable_autopublish || $twitter_enable_autopublish) && (!extension_loaded('curl'))) {
            $this->show('Facebook or Twitter Autopublish is not possible because CURL extension is not loaded.', 'error');

            return true;
        }

        //Facebook autopublish
        if ($fb_enable_autopublish) {
            if (!class_exists('Facebook', false)) {
                require_once('facebook/facebook.php');
            }
            $fb_app_id = $this->params->get('fb_app_id');
            $fb_secret_key = $this->params->get('fb_secret_key');
            if ((method_exists($this->params, 'exists')) && ($this->params->exists('fb_extra_params'))) {
                $fb_extra_params = $this->params->get('fb_extra_params');
                $fb_ids = $fb_extra_params->fb_ids;
                $token = $fb_extra_params->fb_token;
            } else {
                $token = $this->params->get('fb_token');
                $fb_ids = $this->params->get('fb_ids');
                if ($fb_ids == '') {
                    $fb_ids = [];
                }
                if (!is_array($fb_ids)) {
                    $fb_ids = [$fb_ids];
                }
            }

            if (($fb_app_id != '') && ($fb_secret_key != '') && (count($fb_ids) > 0) && ($token != '')) {
                $title = $this->getTitle($event);
                $caption = '';
                $url = "";
                $router = JSite::getInstance('site')->getRouter('site');
                $url = $router->build($url)->toString();
                $url = str_replace('administrator/', '', $url);
                $description = $this->getDescription($event, 'event');
                if ($this->params->get('fb_autopublish_image', '1') == '1') { //first image
                    $images = $this->getPicture($event, 'event');
                    if (count($images) > 0) {
                        $pic = $images[0];
                    } else {
                        $pic = '';
                    }
                } else {
                    $pic = '';
                }

                $msg = $isNew ? $this->params->get('fb_text_new', '') : $this->params->get('fb_text_old', 'Update');
                $facebook = new Facebook([
                    'appId' => $fb_app_id,
                    'secret' => $fb_secret_key,
                    'cookie' => true]);
                $ok = true;
                $me = $facebook->api('/me/', ['access_token' => $token]);
                $info_accounts = $facebook->api('/me/accounts', ['access_token' => $token]);
                $info_groups = $facebook->api('/me/groups', ['access_token' => $token]);

                if ($ok) {
                    if (in_array($me['id'], $fb_ids)) {
                        $ok = true;
                        $facebook->api('/' . $me['id'] . '/feed', 'post', [
                            'access_token' => $token,
                            'message' => $msg,
                            'link' => $url,
                            'picture' => $pic,
                            'name' => $title,
                            'caption' => $caption,
                            'description' => $description]);
                        if ($ok) {
                            $this->show('Content published on Facebook account: ' . "<a href='" . $me['link'] . "'>" . $me['name'] . "</a>", 'message');
                        }
                    }

                    $accounts = $info_accounts['data'];
                    foreach ($accounts as $account) {
                        if (in_array($account['id'], $fb_ids)) {
                            $ok = true;
                            $pagetoken = $account['access_token'];
                            $facebook->api('/' . $account['id'] . '/feed', 'post', [
                                'access_token' => $pagetoken,
                                'message' => $msg,
                                'link' => $url,
                                'picture' => $pic,
                                'name' => $title,
                                'caption' => $caption,
                                'description' => $description]);
                            if ($ok) {
                                $info = $facebook->api('/' . $account['id'] . '/', ['access_token' => $token]);
                                $this->show("Content published on Facebook page: <a href='" . $info['link'] . "'>" . $info['name'] . "</a>", 'message');
                            }
                        }
                    }

                    $accounts = $info_groups['data'];
                    foreach ($accounts as $account) {
                        if (in_array($account['id'], $fb_ids)) {
                            $result = $facebook->api('/' . $account['id'] . '/feed', 'post', [
                                'access_token' => $token,
                                'message' => $msg,
                                'link' => $url,
                                'picture' => $pic,
                                'name' => $title,
                                'caption' => $caption,
                                'description' => $description]);
                            if (isset($result['id'])) {
                                $this->show("Content published on Facebook group <a href='//www.facebook.com/" . $account['id'] . "/'>" . $account['name'] . "</a>", 'message');
                            }
                        }
                    }
                }
            } else {
                if ($fb_app_id == '') {
                    $this->show('App ID is missing', 'error');
                }
                if ($fb_secret_key == '') {
                    $this->show('App secret key is missing', 'error');
                }
                if (count($fb_ids) == 0) {
                    $this->show('Must be specified on at least one Facebook account ID where to publish the event', 'error');
                }
                if ($token == '') {
                    $this->show('Valid access token missing', 'error');
                }
            }
        }

        //Twitter autopublish
        if ($twitter_enable_autopublish) {
            if (!class_exists('TwitterAPIExchange', false)) {
                require_once('twitteroauth/TwitterAPIExchange.php');
            }
            $consumer_key = $this->params->get('twitter_consumer_key', '');
            $consumer_secret = $this->params->get('twitter_consumer_secret', '');
            $oauth_token = $this->params->get('twitter_oauth_token', '');
            $oauth_token_secret = $this->params->get('twitter_oauth_token_secret', '');
            if (($consumer_key != '') && ($consumer_secret != '') && ($oauth_token != '') && ($oauth_token_secret != '')) {
                $settings = [
                    'oauth_access_token' => $oauth_token,
                    'oauth_access_token_secret' => $oauth_token_secret,
                    'consumer_key' => $consumer_key,
                    'consumer_secret' => $consumer_secret];
                $conn = new TwitterAPIExchange($settings);
                if (!$conn) {
                    $this->show('Connection error occurred', 'error');
                    die('Restricted access');
                }
                $title = $this->getTitle($event);
                $url = "";
                $router = JSite::getInstance('site')->getRouter('site');
                $url = $router->build($url)->toString();
                $url = str_replace('administrator/', '', $url);
                $msg = $isNew ? (substr($title, 0, 100) . " " . $url) : ("Update:" . substr($title, 0, 100) . " " . $url);

                $tw_url = 'https://api.twitter.com/1.1/statuses/update.json';
                $requestMethod = 'POST';
                $postfields = ['status' => $msg,];
                try {
                    $res = $conn->buildOauth($tw_url, $requestMethod)->setPostfields($postfields)->performRequest();
                    $res = json_decode($res, true);
                    if (count($res['errors']) > 0) {
                        $str = 'Twitter autopublish:<br>';
                        foreach ($res['errors'] as $v) {
                            $str .= $v['message'] . '<br>';
                        }
                        $this->show($str, 'error');
                    } else {
                        $this->show('Content published on Twitter', 'message');
                    }
                } catch (Exception $e) {
                    $this->show('Content not published on Twitter: ' . $e->getMessage(), 'error');
                }
            } else {
                if ($consumer_key == '') {
                    $this->show('Consumer key is missing', 'error');
                }
                if ($consumer_secret == '') {
                    $this->show('Consumer secret key is missing', 'error');
                }
                if ($oauth_token == '') {
                    $this->show('Oauth token is missing', 'error');
                }
                if ($oauth_token_secret == '') {
                    $this->show('Oauth token secret key is missing', 'error');
                }
            }
        }

        return true;
    }

    /**
     * plgAlleventsaesocial::show()
     *
     * @param mixed $var
     * @param string $mode
     *
     * @return void
     * @throws Exception
     */
    private function show($var, $mode = 'message')
    {
        JFactory::getApplication()->enqueueMessage('<pre>' . print_r($var, true) . '</pre>', $mode);
    }

    /**
     * plgAlleventsaesocial::getTitle()
     *
     * @param mixed $obj
     *
     * @return string
     */
    private function getTitle($obj)
    {
        return $obj->titre;
    }

    /**
     * plgAlleventsaesocial::getDescription()
     *
     * @param mixed $obj
     * @param mixed $view
     *
     * @return string
     */
    private function getDescription($obj, $view)
    {
        $text = $obj->description;
        $opengraph_description = '1';
        if (($opengraph_description == '1') || ($opengraph_description == '2') || ($opengraph_description == '3')) { // first paragraph or first 255 chars or only intr
            if ($opengraph_description == '2') { // first 255 chars
                $description = $this->str_encode(mb_substr(strip_tags($text), 0, 251) . "... ");
            } elseif ($opengraph_description == '3') { // only intro
                $description = $this->str_encode(strip_tags($obj->introtext));
            } else { // first paragraph
                $content = $this->str_encode(strip_tags($text));
                $pos = strpos($content, '.');
                $description = $pos === false ? $content : substr($content, 0, $pos + 1);
            }
        } else { // event meta data
            $description = $this->str_encode(strip_tags($obj->metadesc));
        }
        $description = preg_replace('/[\r\n\s]+/', ' ', $description);

        return $description;
    }

    /**
     * plgAlleventsaesocial::str_encode()
     *
     * @param mixed $str
     *
     * @return string
     */
    private function str_encode($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    }

    /**
     * plgAlleventsaesocial::getPicture()
     *
     * @param mixed $obj
     * @param mixed $view
     *
     * @return array
     */
    private function getPicture($obj, $view)
    {
        $images = [];
        $defaultimage = "";
        //$onlydefaultimage = '1';
        if ($defaultimage == "") {
            $defaultimage = JUri::root() . CMP_OG_LINKIMG;
        } else {
            if (!preg_match('%^(?://|http://|https://)%', $defaultimage)) {
                $defaultimage = preg_replace('#^/#', '', $defaultimage);
                $defaultimage = JUri::root() . $defaultimage;
            }
        }
        //if ($opengraph_onlydefaultimage == '1')
        //{
        //    $images[] = $defaultimage;
        //}
        // else
        //{
        if (property_exists($obj, 'images')) {
            if ($img = json_decode($obj->images)) {
                if ($img->{'image_intro'} != null) {
                    $images[] = JUri::root() . $img->{'image_intro'};
                } elseif ($img->{'image_fulltext'} != null) {
                    $images[] = JUri::root() . $img->{'image_fulltext'};
                }
            }
        }
        $text = isset($obj->text) ? $obj->text : $obj->introtext . $obj->fulltext;
        if ($view == 'event') {
            $this->find_youtube_images($text, $images);
            $this->find_images($text, $images);
        }
        if (count($images) == 0) {
            $images[] = $defaultimage;
        }

        //}
        return $images;
    }

    /**
     * plgAlleventsaesocial::find_youtube_images()
     *
     * @param mixed $text
     * @param mixed $images
     *
     * @return void
     */
    private function find_youtube_images($text, &$images)
    {
        if (preg_match_all('%(?:http|https)://www\.(?:youtube|youtube-nocookie)\.com/(?:v|embed)/(?!videoseries)(.*?)(?:\?|"|\')%i', $text, $regs)) {
            $regs[1] = array_unique($regs[1], SORT_REGULAR);
            foreach ($regs[1] as $value) {
                $img = "http://img.youtube.com/vi/$value/0.jpg";
                if (!in_array($img, $images)) {
                    $images[] = $img;
                }
            }
        }
    }

    // FB share

    /**
     * plgAlleventsaesocial::find_images()
     *
     * @param mixed $text
     * @param mixed $images
     *
     * @return void
     */
    private function find_images(&$text, &$images)
    {
        if (preg_match_all('/<\s*img\s+[^>]*?src\s*=\s*["\'](.*?)["\'][^>]*?>/i', $text, $regs)) {
            $regs[1] = array_unique($regs[1], SORT_REGULAR);
            foreach ($regs[1] as $value) {
                if (!preg_match('%^(?://|http://|https://)%', $value)) {
                    $value = preg_replace('#^/#', '', $value);
                    $value = JUri::root() . $value;
                }
                $manu = new JUri();
                $value = preg_replace('%^//%', $manu->getScheme() . '://', $value);
                if ($this->check_img_size($value)) {
                    $images[] = $value;
                }
            }
        }
    } // end FB share

    /**
     * plgAlleventsaesocial::check_img_size()
     *
     * @param mixed $img
     *
     * @return boolean
     */
    private function check_img_size($img)
    {
        $dim = @getimagesize($img);

        return ($dim[0] >= 200) && ($dim[1] >= 200) ? true : false;
    } // end FB like

    /**
     * plgAlleventsaesocial::onBeforeRender()
     *
     * @return void
     */
    function onBeforeRender()
    {
        $cache = JFactory::getCache('');
        $cache->setCaching(false);
    } // end FB send

    /**
     * plgAlleventsaesocial::onAfterRender()
     *
     * Just render the plugins already created and add opengraph informations
     *
     * @return void
     * @throws Exception
     */
    function onAfterRender()
    {
        //avoid caching
        $cache = JFactory::getCache('');
        if (JPluginHelper::isEnabled('system', 'cache')) {
            $cache->clean();
        }

        // no action on administration side
        $app = JFactory::getApplication();
        if ($app->isAdmin()) {
            return;
        }

        $document = JFactory::getDocument();
        $pagetitle = str_replace('"', '\'', $document->getTitle());
        $view = $app->input->get('view');
        $option = $app->input->get('option');

        $uri = JUri::getInstance();
        $query = $app->getRouter()->parse($uri);
        if ((isset($query['id'])) && (strpos($query['id'], ':') === false)) {
            if (($option == 'com_allevents') && ($view == 'event')) {
                $event = JTable::getInstance($type = 'Event', $prefix = 'AllEventsTable', $config = []);
                $event->load($query['id']);
                $alias = $event->get('alias');
                if (empty($alias)) {
                    jimport('joomla.filter.output');
                    $alias = JFilterOutput::stringURLSafe($event->get('titre'));
                }
                $slug = $event->get('id') . ':' . $alias;
                $query['id'] = $slug;
            }
        }
        $pageurl = JUri::root() . 'index.php?' . JUri::getInstance()->buildQuery($query);
        $pageurl = $app->getRouter()->build($pageurl)->toString(); //fix double base path in page url
        $basepath = JUri::base(true);
        //$pageurl = preg_replace('|(' . $basepath . ')(' . $basepath . ')|i', '\1', $pageurl);
        $body = $app->getBody();
        //$body = JResponse::getBody();
        $enable = [
            'fb_comments' => $this->params->get('enable_fb_comments'),
            'fb_like' => $this->params->get('enable_fb_like'),
            'fb_share' => $this->params->get('enable_fb_share'),
            'fb_send' => $this->params->get('enable_fb_send'),
            'fb_photo' => $this->params->get('enable_fb_photo'),
            'twitter' => $this->params->get('enable_twitter'),
            'google' => $this->params->get('enable_google'),
            'google_share' => $this->params->get('enable_google_share'),
            'linkedin' => $this->params->get('enable_linkedin'),
            'pinterest' => $this->params->get('enable_pinterest')];
        $pinterest_selection = $this->params->get('pinterest_selection');
        //$fb_enable_admin = $this->params->get('fb_enable_admin');
        //$fb_admin_ids = $this->params->get('fb_admin_ids');
        $fb_app_id = $this->params->get('fb_app_id');
        $enable['fb_photo'] = (empty($fb_app_id)) ? '0' : $enable['fb_photo'];
        $enable_buttons = (($enable['fb_like'] == '1') || ($enable['fb_share'] == '1') || ($enable['fb_send'] == '1') || ($enable['linkedin'] == '1') || ($enable['google'] == '1') || ($enable['google_share'] == '1') || ($enable['twitter'] == '1') || (($enable['pinterest'] == '1') && ($pinterest_selection == '0')));
        $position = [
            'fb_like' => $this->params->get('Position_fb_like'),
            'fb_share' => $this->params->get('Position_fb_share'),
            'fb_send' => $this->params->get('Position_fb_send'),
            'google' => $this->params->get('Position_google'),
            'google_share' => $this->params->get('Position_google_share'),
            'twitter' => $this->params->get('Position_twitter'),
            'linkedin' => $this->params->get('Position_linkedin'),
            'pinterest' => $this->params->get('Position_pinterest')];
        $weight = [
            'fb_like' => $this->params->get('weight_fb_like'),
            'fb_share' => $this->params->get('weight_fb_share'),
            'fb_send' => $this->params->get('weight_fb_send'),
            'google' => $this->params->get('weight_google'),
            'google_share' => $this->params->get('weight_google_share'),
            'twitter' => $this->params->get('weight_twitter'),
            'linkedin' => $this->params->get('weight_linkedin'),
            'pinterest' => $this->params->get('weight_pinterest')];
        asort($weight);
        $isprint = $app->input->getInt('print');
        if ($isprint == 1) { // print page mode
            $enable_buttons = 0; // no buttons
            if ($this->params->get('fb_comments_print', '0') == '0')
                $enable['fb_comments'] = '0';
        }

        if (($enable['fb_comments'] == '1') || ($enable['fb_photo'] == '1') || ($enable['fb_like'] == '1') || ($enable['fb_share'] == '1') || ($enable['fb_send'] == '1')) {
            // add root tag if necessary
            if (!preg_match('%<div[\s]+id[\s]*=[\s]*["\']fb-root["\'][\s]*>[\s]*</div>%', $body)) {
                $s = "<div id='fb-root'></div>";
                $body = preg_replace('/(<body.*?>)/', '\1' . $s, $body);
            }
            if ($this->params->get('fb_mode') == "xfbml") {
                if (!preg_match('/xmlns:fb="http:\/\/ogp\.me\/ns\/fb#"/', $body)) {
                    $body = preg_replace('/<html(.*?)>/', '<html \1 xmlns:fb="http://ogp.me/ns/fb#">', $body);
                }
            }
        }

        // render buttons
        if ($enable_buttons) {
            //content prepare + before content display
            //-----------------------( 1  )--------(   2  )----------(   3  )---------(   4  )-----------------------( 5 )-----------( 6 )---------------------
            if (preg_match_all('/\{idkey=(\d*?)b0\[url=([^]]*?)\]\[title=([^]]*?)\]\[desc=([^]]*?)\]\}\{cmp_start[^}]*?\}(.*?)\{cmp_end\}(.*?)\{idkey=\d*?b1[^}]*?\}/sim', $body, $m, PREG_SET_ORDER)) {
                foreach ($m as $match) {
                    $this->contents[] = $match[5];
                    $this->descriptions[] = $match[4];
                    $randomid = $match[1];
                    $url = $match[2];
                    $title = $match[3];
                    $code_buttons = $this->getButtonsHTMLcode($url, $title, $randomid, $enable, $position, $weight);
                    if (isset($match[6]) && !empty($match[6])) {
                        $code_buttons[1] = $code_buttons[1] . $match[6];
                    }
                    // apply change to the page body
                    $body = str_replace($match[0], $code_buttons[0] . $match[5] . $code_buttons[1], $body);
                }
            }

            //content prepare (Virtuemart)
            //----------------------------------( 1  )------( 2 )----------( 3 )---------( 4 )------( 5 )-----------
            if (preg_match_all('/\{cmp_start idkey=(\d*?)\[url=(.*?)\]\[title=(.*?)\]\[desc=(.*?)\]]*\}(.*?)\{cmp_end\}/sim', $body, $m, PREG_SET_ORDER)) {
                foreach ($m as $match) {
                    $this->contents[] = $match[5];
                    $this->descriptions[] = $match[4];
                    $randomid = $match[1];
                    $url = $match[2];
                    $title = $match[3];
                    $code_buttons = $this->getButtonsHTMLcode($url, $title, $randomid, $enable, $position, $weight); // apply change to the page body
                    $body = str_replace($match[0], $code_buttons[0] . $match[5] . $code_buttons[1], $body);
                }
            }

            //before content display + pagination
            //-----------------------( 1  )--------(   2  )----------(   3  )---------(   4  )----(( 6 )         5        )
            if (preg_match_all('/\{idkey=(\d*?)b0\[url=([^]]*?)\]\[title=([^]]*?)\]\[desc=([^]]*?)\]\}((.*?)\{cmp_start[^}]*\}){0,1}/sim', $body, $m, PREG_SET_ORDER)) {
                foreach ($m as $match) {
                    $randomid = $match[1];
                    $url = $match[2];
                    $title = $match[3];
                    $this->descriptions[] = $match[4];
                    $code_buttons = $this->getButtonsHTMLcode($url, $title, $randomid, $enable, $position, $weight);

                    if (isset($match[5]) && !empty($match[5])) {
                        $code_buttons[0] = $code_buttons[0] . $match[6];
                    }

                    // apply change to the page body
                    $body = str_replace($match[0], $code_buttons[0], $body);
                }
            }
            //------------(        1          ( 2 ))-------------(  3 )--------( 4 )----------( 5 )---------( 6 )---
            if (preg_match_all('/(\{cmp_end[^}]*\}(.*?)){0,1}\{idkey=(\d*?)b1\[url=(.*?)\]\[title=(.*?)\]\[desc=(.*?)\]\}/sim', $body, $m, PREG_SET_ORDER)) {
                foreach ($m as $match) {
                    $randomid = $match[3];
                    $url = $match[4];
                    $title = $match[5];
                    $this->descriptions[] = $match[6];
                    $code_buttons = $this->getButtonsHTMLcode($url, $title, $randomid, $enable, $position, $weight);
                    if (isset($match[1]) && !empty($match[1])) {
                        $code_buttons[1] = $match[2] . $code_buttons[1];
                    }

                    // apply change to the page body
                    $body = str_replace($match[0], $code_buttons[1], $body);
                }
            }
        } // end render buttons

        // render fb comment box
        if ($enable['fb_comments'] == '1') {
            //content prepare + before content display
            //------------------------(  1 )------------( 2 )----( 3 )----------(  4 )------------( 5 )----
            if (preg_match_all('/\{cmp_comments idkey=\'(\d*?)c\'.*?\[url=(.*?)\]\}(.*?)\{idkey=\'(\d*?)c\'.*?\[url=(.*?)\]\}/sim', $body, $m, PREG_SET_ORDER)) {
                foreach ($m as $match) {
                    $url = $match[2];
                    $code_comments = $this->getFbCommentsCode($url);
                    if (isset($match[3])) {
                        $code_comments = $match[3] . $code_comments;
                    }

                    // apply change to the page body
                    $body = str_replace($match[0], $code_comments, $body);
                }
            }
            //content prepare
            //------------------------(  1 )------------(  2 )---
            if (preg_match_all('/\{cmp_comments idkey=\'(\d*?)c\'.*?\[url=(.*?)\]\}/sim', $body, $m, PREG_SET_ORDER)) {
                foreach ($m as $match) {
                    $url = $match[2];
                    $code_comments = $this->getFbCommentsCode($url); // apply change to the page body
                    $body = str_replace($match[0], $code_comments, $body);
                }
            }
            //before content display + pagination
            //-----------(  1 )------------( 2 )----
            if (preg_match_all('/\{idkey=\'(\d*?)c\'[^[]*?\[url=(.*?)\]\}/sim', $body, $m, PREG_SET_ORDER)) {
                foreach ($m as $match) {
                    $url = $match[2];
                    $code_comments = $this->getFbCommentsCode($url);
                    // apply change to the page body
                    $body = str_replace($match[0], $code_comments, $body);
                }
            }
        } // end render comments box

        // Facebook photo button
        // put fb_photo_button in every images
        if ($enable['fb_photo'] == '1') {
            // find images in the text content
            preg_match_all('/(<\s*img)(\s+[^>]*?src\s*=\s*["\'])(.*?)(["\'][^>]*?>)/i', $body, $m, PREG_SET_ORDER);
            $m = array_unique($m, SORT_REGULAR);
            $mm = []; // for every photo fix the url
            foreach ($m as $key => &$img) {
                if (!preg_match('%^(?://|http://|https://)%', $img[3])) {
                    $img[3] = JUri::root() . preg_replace('#^/#', '', $img[3]);
                }
                $manu = new JUri();
                $img[3] = preg_replace('%^//%', $manu->getScheme() . '://', $img[3]);
                if ($this->check_img_size($img[3])) {
                    $mm[] = $img;
                }
            }
            $pic = [];
            $img = [];
            $fbp = [];
            $pin = []; // for every photo assign a ID
            foreach ($mm as $key => &$img) {
                $n = mt_rand(1, 10000);
                $pic[] = 'img' . $n;
                $fbp[] = 'fbp' . $n;
                $pin[] = 'pin' . $n;
                $mm[$key][5] = $mm[$key][1] . ' id="img' . $n . '" ' . $mm[$key][2] . $img[3] . $mm[$key][4];
                $body = str_replace($mm[$key][0], $mm[$key][5], $body);
            }

            // add the button code at the end of the text
            $tmp = '';
            foreach ($fbp as $key => $id) {
                $tmp .= "<span id='" . $id . "' class='css_fb_photo'><img src=\"" . JUri::root() . CMP_FB_LOGOIMG . "\" title=\"Add to Facebook\" onclick=\"fb_click_photo('" . $mm[$key][3] . "','" . $pagetitle . "');\" /></span>" . PHP_EOL;
            }
            $body = str_replace("</body>", $tmp . "</body>", $body);
            if (count($pic) > 0) {
                $tmp = '';
                foreach ($pic as $key => $id) {
                    $tmp .= "img = document.getElementById('" . $id . "');
                            e = document.getElementById('" . $fbp[$key] . "');
                            if (img.height > 80 && img.width > 80) {
                                p=getPos(img);
                                pT = p.top+img.height-35;
                                pL = p.left+4;
                                e.style.top=pT+'px';
                                e.style.left=pL+'px';
                            } else {
                                e.parentNode.removeChild(e);
                            }";
                }
                $n = mt_rand(1, 10000);
                $tmp = "
                    function SetFbpButtons" . $n . "(){ " . PHP_EOL . $tmp . PHP_EOL . " }
                    (function() {
                        var po = document.createElement('script'); 
                        po.type = 'text/javascript'; 
                        po.async = true;
                        po.innerHTML = 'SetFbpButtons" . $n . "();';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                     })();";
                $tmp = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . $tmp . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
                $body = str_replace("</body>", $tmp . "</body>", $body);
            }
        } // end fb photo button
        $app->setBody($body);

        //JResponse::setBody($body);
        return;
    } // end comments code

    /**
     * plgAlleventsaesocial::getButtonsHTMLcode()
     *
     * @param mixed $url
     * @param mixed $title
     * @param mixed $randomid
     * @param mixed $enable
     * @param mixed $position
     * @param mixed $weight
     *
     * @return array
     */
    private function getButtonsHTMLcode($url, $title, $randomid, $enable, $position, $weight)
    {
        $code_fb_like0 = '';
        $code_fb_like1 = '';
        $code_fb_share0 = '';
        $code_fb_share1 = '';
        $code_fb_send0 = '';
        $code_fb_send1 = '';
        $code_google0 = '';
        $code_google1 = '';
        $code_google_share0 = '';
        $code_google_share1 = '';
        $code_twitter0 = '';
        $code_twitter1 = '';
        $code_linkedin0 = '';
        $code_linkedin1 = '';
        $code_pinterest0 = '';
        $code_pinterest1 = '';
        $title = urldecode($title); // fb like button
        if ($enable['fb_like'] == '1') {
            $code_fb_like = $this->getFbLikeCode($url); // url
            if ($position['fb_like'] == '0') {
                $code_fb_like0 = $code_fb_like;
                $code_fb_like1 = '';
            } elseif ($position['fb_like'] == '1') {
                $code_fb_like0 = '';
                $code_fb_like1 = $code_fb_like;
            } elseif ($position['fb_like'] == '2') {
                $code_fb_like0 = $code_fb_like;
                $code_fb_like1 = $code_fb_like;
            }
        }
        // fb_share_button
        if ($enable['fb_share'] == '1') {
            $code_fb_share = $this->getFbShareCode($url, $randomid); // url and random number
            if ($position['fb_share'] == '0') {
                $code_fb_share0 = $code_fb_share;
                $code_fb_share1 = '';
            } elseif ($position['fb_share'] == '1') {
                $code_fb_share0 = '';
                $code_fb_share1 = $code_fb_share;
            } elseif ($position['fb_share'] == '2') {
                $code_fb_share0 = $code_fb_share;
                $code_fb_share1 = $code_fb_share;
            }
        }
        // fb_send_button
        if ($enable['fb_send'] == '1') {
            $code_fb_send = $this->getFbSendCode($url); // url
            if ($position['fb_send'] == '0') {
                $code_fb_send0 = $code_fb_send;
                $code_fb_send1 = '';
            } elseif ($position['fb_send'] == '1') {
                $code_fb_send0 = '';
                $code_fb_send1 = $code_fb_send;
            } elseif ($position['fb_send'] == '2') {
                $code_fb_send0 = $code_fb_send;
                $code_fb_send1 = $code_fb_send;
            }
        }
        // twitter_button
        if ($enable['twitter'] == '1') {
            $code_twitter = $this->getTwitterCode($url, $title); // url and title
            if ($position['twitter'] == '0') {
                $code_twitter0 = $code_twitter;
                $code_twitter1 = '';
            } elseif ($position['twitter'] == '1') {
                $code_twitter0 = '';
                $code_twitter1 = $code_twitter;
            } elseif ($position['twitter'] == '2') {
                $code_twitter0 = $code_twitter;
                $code_twitter1 = $code_twitter;
            }
        }
        // google_button
        if ($enable['google'] == '1') {
            $code_google = $this->getGoogleCode($url); // url
            if ($position['google'] == '0') {
                $code_google0 = $code_google;
                $code_google1 = '';
            } elseif ($position['google'] == '1') {
                $code_google0 = '';
                $code_google1 = $code_google;
            } elseif ($position['google'] == '2') {
                $code_google0 = $code_google;
                $code_google1 = $code_google;
            }
        }
        // google_share_button
        if ($enable['google_share'] == '1') {
            $code_google_share = $this->getGoogleShareCode($url); // url
            if ($position['google_share'] == '0') {
                $code_google_share0 = $code_google_share;
                $code_google_share1 = '';
            } elseif ($position['google_share'] == '1') {
                $code_google_share0 = '';
                $code_google_share1 = $code_google_share;
            } elseif ($position['google_share'] == '2') {
                $code_google_share0 = $code_google_share;
                $code_google_share1 = $code_google_share;
            }
        }
        // linkedin_button
        if ($enable['linkedin'] == '1') {
            $code_linkedin = $this->getLinkedinCode($url); // url
            if ($position['linkedin'] == '0') {
                $code_linkedin0 = $code_linkedin;
                $code_linkedin1 = '';
            } elseif ($position['linkedin'] == '1') {
                $code_linkedin0 = '';
                $code_linkedin1 = $code_linkedin;
            } elseif ($position['linkedin'] == '2') {
                $code_linkedin0 = $code_linkedin;
                $code_linkedin1 = $code_linkedin;
            }
        }
        // pinterest_button
        if ($enable['pinterest'] == '1') {
            $code_pinterest = $this->getPinterestCode($url); // url
            if ($position['pinterest'] == '0') {
                $code_pinterest0 = $code_pinterest;
                $code_pinterest1 = '';
            } elseif ($position['pinterest'] == '1') {
                $code_pinterest0 = '';
                $code_pinterest1 = $code_pinterest;
            } elseif ($position['pinterest'] == '2') {
                $code_pinterest0 = $code_pinterest;
                $code_pinterest1 = $code_pinterest;
            }
        }
        $code_buttons0 = "";
        $code_buttons1 = ""; // reorder buttons code
        foreach ($weight as $key => $val) {
            switch ($key) {
                case "fb_like":
                    $code_buttons0 .= $code_fb_like0;
                    $code_buttons1 .= $code_fb_like1;
                    break;
                case "fb_share":
                    $code_buttons0 .= $code_fb_share0;
                    $code_buttons1 .= $code_fb_share1;
                    break;
                case "fb_send":
                    $code_buttons0 .= $code_fb_send0;
                    $code_buttons1 .= $code_fb_send1;
                    break;
                case "twitter":
                    $code_buttons0 .= $code_twitter0;
                    $code_buttons1 .= $code_twitter1;
                    break;
                case "google":
                    $code_buttons0 .= $code_google0;
                    $code_buttons1 .= $code_google1;
                    break;
                case "google_share":
                    $code_buttons0 .= $code_google_share0;
                    $code_buttons1 .= $code_google_share1;
                    break;
                case "linkedin":
                    $code_buttons0 .= $code_linkedin0;
                    $code_buttons1 .= $code_linkedin1;
                    break;
                case "pinterest":
                    $code_buttons0 .= $code_pinterest0;
                    $code_buttons1 .= $code_pinterest1;
                    break;
            }
        } // end reorder buttons code

        if ($code_buttons0 != '') {
            $c = $this->params->get('container_buttons');
            if ($c != '0') {
                $css = $this->params->get('css_buttons');
                if ($css != '') {
                    $css = 'style="' . $css . '"';
                }
                $code_buttons0 = "<" . $c . " class=\"css_buttons0\" " . $css . ">" . $code_buttons0 . "</" . $c . ">";
            }
        }
        if ($code_buttons1 != '') {
            $c = $this->params->get('container_buttons');
            if ($c != '0') {
                $css = $this->params->get('css_buttons');
                if ($css != '') {
                    $css = 'style="' . $css . '"';
                }
                $code_buttons1 = "<" . $c . " class=\"css_buttons1\" " . $css . ">" . $code_buttons1 . "</" . $c . ">";
            }
        }

        return [$code_buttons0, $code_buttons1];
    } // end pinterest

    /**
     * plgAlleventsaesocial::getFbLikeCode()
     *
     * @param mixed $url
     *
     * @return string
     */
    private function getFbLikeCode($url)
    {
        $url = urldecode($url);
        $fb_mode = $this->params->get('fb_mode');
        $layout = $this->params->get('fb_like_layout');
        $show_faces = $this->params->get('fb_like_show_faces');
        $width = $this->params->get('fb_like_width');
        if ($width != '') {
            $width = $fb_mode == 'html5' ? "data-width=\"$width\"" : "width=\"$width\"";
        }
        $share = $this->params->get('fb_like_share') ? 'true' : 'false';
        $action = $this->params->get('fb_like_action');
        $color_scheme = $this->params->get('fb_like_color_scheme');
        $kid_directed_site = $this->params->get('kid_directed_site') ? 'true' : 'false';
        $asynchronous = $this->params->get('fb_asynchronous');
        $css = $this->params->get('fb_like_css');
        if ($css != "") {
            $css = "style=\"$css\"";
        }
        $container = $this->params->get('fb_like_container');
        if ($fb_mode == 'html5') {
            $tmp = "<div class=\"fb-like\" data-href=\"$url\" data-layout=\"$layout\" data-show_faces=\"$show_faces\" data-share=\"$share\" $width data-action=\"$action\" data-colorscheme=\"$color_scheme\" data-kid_directed_site=\"$kid_directed_site\"></div>";
        } else {
            $tmp = "<fb:like href=\"$url\" layout=\"$layout\" show_faces=\"$show_faces\" share=\"$share\" $width action=\"$action\" colorscheme=\"$color_scheme\" kid_directed_site=\"$kid_directed_site\"></fb:like>";
        }
        if ($asynchronous) {
            $tmp = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . $tmp . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
        } else {
            $tmp = $tmp . PHP_EOL;
        }

        $code = $container == '0' ? $tmp : "<$container class=\"css_fb_like\" $css>$tmp</$container>";

        return $code;
    } // end linkedin

    /**
     * plgAlleventsaesocial::getFbShareCode()
     *
     * @param mixed $url
     * @param mixed $idrnd
     *
     * @return string
     */
    private function getFbShareCode($url, $idrnd)
    {
        $url = urldecode($url);
        $fb_mode = $this->params->get('fb_mode');
        $text = $this->params->get('fb_share_button_text', 'Share');
        $layout = $this->params->get('fb_share_button_style', 'button_count');
        $width = $this->params->get('fb_share_width');
        if ($width != "") {
            $width = $fb_mode == 'html5' ? "data-width=\"$width\"" : "width=\"$width\"";
        }
        $custom_img = $this->params->get('fb_share_custom_img');
        if ($custom_img == '') {
            $custom_img = CUSTOM_FB_SHARE_IMG;
        }
        $asynchronous = $this->params->get('fb_asynchronous');
        $container = $this->params->get('fb_share_container');
        $css = $this->params->get('fb_share_css');
        if ($css != "") {
            $css = "style=\"$css\"";
        }
        $script = "<script>";
        $script .= "function fbs_click$idrnd() {";
        $script .= "FB.ui({";
        $script .= "    method: \"stream.share\",";
        $script .= "    u: \"" . $url . "\"";
        $script .= "  } ";
        $script .= "); return false; };";
        $script .= "</script>";
        $tmp = $script;
        if ($fb_mode == 'html5') {
            $code = "<div class=\"fb-share-button\" data-href=\"$url\" data-layout=\"$layout\" $width></div>";
        } else {
            $code = "<fb:share-button href=\"$url\" layout=\"$layout\" $width></fb:share-button>";
        }
        switch ($layout) {
            case "icontext":
                $tmp .= "<style>a.cmp_shareicontextlink { text-decoration: none !important; line-height: 20px !important;height: 20px !important; color: #3B5998 !important; font-size: 11px !important; font-family: arial, sans-serif !important;  padding:2px 4px 2px 20px !important; border:1px solid #CAD4E7 !important; cursor: pointer !important;  background:url(//static.ak.facebook.com/images/share/facebook_share_icon.gif?6:26981) no-repeat 1px 1px #ECEEF5 !important; -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important;} .cmp_shareicontextlink:hover {   background:url(//static.ak.facebook.com/images/share/facebook_share_icon.gif?6:26981) no-repeat 1px 1px #ECEEF5 !important;  border-color:#9dacce !important; color: #3B5998 !important;} </style><a class=\"cmp_shareicontextlink\" href=\"#\" onclick=\"return fbs_click$idrnd()\" target=\"_blank\">" . $text . "</a>";
                break;
            case "text":
                $tmp .= "<style>a.cmp_sharetextlink { text-decoration: none !important; line-height: 20px !important;height: 20px !important; color: #3B5998 !important; font-size: 11px !important; font-family: arial, sans-serif !important;  padding:2px 4px 2px 4px !important; border:1px solid #CAD4E7 !important; cursor: pointer !important;  background-color: #ECEEF5 !important; -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important;} .cmp_sharetextlink:hover {   background-color: #ECEEF5 !important;  border-color:#9dacce !important; color: #3B5998 !important;} </style><a class=\"cmp_sharetextlink\" rel=\"nofollow\" href=\"#\" onclick=\"return fbs_click$idrnd()\" target=\"_blank\">" . $text . "</a>";
                break;
            case "custom_icon":
                $tmp .= "<a class=\"cmp_sharecustomiconlink\" href=\"#\" onclick=\"return fbs_click$idrnd()\" target=\"_blank\"><img class=\"cmp_sharecustomiconimg\" src=\"" . $custom_img . "\"/></a>";
                break;
            // todo : icon en font awesome
            // ca/se "fa":
            // $tmp .= "<div class=\"btn-wrapper btn btn-small hidden-print\">";
            // $tmp .= "<a href=\"#\" onclick=\"return fbs_click$idrnd()\" target=\"_blank\"> alt=\"Facebook Share\" style=\"font-size: 36px;\"";
            // $tmp .= "<i class=\"fa-facebook-square\"></i>";
            // $tmp .= "</a></div>";
            // break;
            default:
                $tmp = $code;
        }

        if ($asynchronous) {
            $tmp = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . preg_replace('/<\/script>/i', '<\/script>', $tmp) . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
        } else {
            $tmp = $tmp . PHP_EOL;
        }

        $code = ($container == '0') ? $tmp : "<$container class=\"css_fb_share\" $css>$tmp</$container>";

        return $code;
    } // end Google

    /**
     * plgAlleventsaesocial::getFbSendCode()
     *
     * @param mixed $url
     *
     * @return string
     */
    private function getFbSendCode($url)
    {
        $url = urldecode($url);
        $fb_mode = $this->params->get('fb_mode');
        $color_scheme = $this->params->get('fb_send_color_scheme');
        $kid_directed_site = $this->params->get('kid_directed_site') ? 'true' : 'false';
        $asynchronous = $this->params->get('fb_asynchronous');
        $css = $this->params->get('fb_send_css');
        if ($css != "") {
            $css = "style=\"$css\"";
        }
        $container = $this->params->get('fb_send_container');
        if ($fb_mode == 'html5') {
            $tmp = "<div class=\"fb-send\" data-href=\"$url\" data-colorscheme=\"$color_scheme\" data-kid_directed_site=\"$kid_directed_site\"></div>";
        } else {
            $tmp = "<fb:send href=\"$url\" colorscheme=\"$color_scheme\" kid_directed_site=\"$kid_directed_site\"></fb:like>";
        }
        if ($asynchronous) {
            $tmp = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . $tmp . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
        } else {
            $tmp = $tmp . PHP_EOL;
        }

        $code = $container == '0' ? $tmp : "<$container class=\"css_fb_send\" $css>$tmp</$container>";

        return $code;
    } // end Google share

    /**
     * plgAlleventsaesocial::getTwitterCode()
     *
     * @param mixed $url
     * @param mixed $title
     *
     * @return string
     */
    function getTwitterCode($url, $title)
    {
        $url = urldecode($url);
        $show_count = $this->params->get('twitter_show_count');
        $data_via = $this->params->get('twitter_data_via');
        $data_related = $this->params->get('twitter_data_related');
        $hashtags = $this->params->get('twitter_hashtags');
        $datasize = $this->params->get('twitter_datasize');
        $opt_out = $this->params->get('twitter_opt_out');
        $container = $this->params->get('twitter_container');
        $css = $this->params->get('twitter_css');
        if ($css != "") {
            $css = "style=\"$css\"";
        }
        $asynchronous = $this->params->get('twitter_asynchronous', '1'); //custom icon mode
        if ($this->params->get('twitter_style') == 'custom_icon') {
            $custom_img = $this->params->get('twitter_custom_img');
            if ($custom_img == '') {
                $custom_img = CUSTOM_TWITTER_IMG;
            }
            $max = 140 - 22; //link
            if ($data_via != '') {
                $max = $max - 5 - strlen($data_via);
                $data_via = '&via=' . urlencode($data_via);
            }
            if ($max < strlen($title) + 1) {
                $title = substr($title, 0, $max - 4) . '...';
            }
            $link = "//twitter.com/intent/tweet?url=$url&text=" . urldecode($title) . $data_via;
            $tmp = "<a class=\"cmp_twitter_custom_icon_link\" href=\"$link\" target=\"_blank\"><img class=\"cmp_twitter_custom_icon_img\" src=\"$custom_img\"/></a>";
            $code = $container != '0' ? "<$container class=\"css_twitter\" $css>$tmp</$container>" : $tmp;

            return $code;
        } //end custom icon mode

        if ($this->params->get('auto_language')) {
            $language = JFactory::getLanguage()->getTag();
        } else {
            $language = $this->params->get('twitter_language', 'en-US');
        }
        $language = substr($language, 0, 2);
        $language = $language != "en" ? "data-lang=\"$language\"" : '';
        $data_via = $data_via != "" ? "data-via=\"$data_via\"" : '';
        $data_related = $data_related != "" ? "data-related=\"$data_related\"" : '';
        if ($hashtags != "") {
            $hashtags = "data-hashtags=\"$hashtags\"";
        }
        //if ($datasize != "") {
        //    $datasize = "data-size=\"$datasize\"";
        //}
        // if ($opt_out == "true") {
        //   $opt_out = "data-dnt=\"$opt_out\"";
        // }

        $code = "<a href=\"//twitter.com/share\" class=\"twitter-share-button\" ";
        $code .= "$language $data_via $hashtags $data_related ";
        $code .= "data-url=\"" . $url . "\" ";
        $code .= "data-text=\"$title\" ";
        $code .= "data-count=\"$show_count\">Tweet</a>";
        if ($container != '0') {
            $code = "<$container $css class=\"css_twitter\">$code</$container>";
        }
        if ($asynchronous) {
            $code = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . $code . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
        } else {
            $code = $code . PHP_EOL;
        }

        return $code;
    } // end twitter

    /**
     * plgAlleventsaesocial::getGoogleCode()
     *
     * @param mixed $url
     *
     * @return string
     */
    function getGoogleCode($url)
    {
        $url = urldecode($url);
        $mode = $this->params->get('google_mode');
        $size = $this->params->get('google_size', 'standard');
        $annotation = $this->params->get('google_annotation', 'bubble');
        $width = $this->params->get('google_width', '250');
        $asynchronous = $this->params->get('google_asynchronous', '0');
        $align = $this->params->get('google_align');
        $recommendations = $this->params->get('google_recommendations');
        /* if ($this->params->get('auto_language')) {
             $language = JFactory::getLanguage()->getTag();
         } else {
             $language = $this->params->get('google_language', 'en-US');
         }*/
        $container = $this->params->get('google_container');
        $css = $this->params->get('google_css');
        if ($css != "") {
            $css = "style=\"$css\"";
        }
        if ($mode == "0") { // not html5
            if (($width != '') && ($annotation == "inline")) {
                $width = "width=\"$width\"";
            } else {
                $width = "";
            }
            $align = $align == "right" ? "align=\"$align\"" : "";
            $annotation = $annotation != "bubble" ? "annotation=\"$annotation\"" : "";
            if ($recommendations == "0") {
                $recommendations = "recommendations=\"false\"";
            }
            $code = "<g:plusone $width $align $recommendations size=\"$size\" href=\"" . $url . "\" $annotation></g:plusone>";
        } else { // html5
            $width = ($width != '') && ($annotation == "inline") ? "data-width=\"$width\"" : "";
            $align = $align == "right" ? "data-align=\"$align\"" : "";
            $annotation = $annotation != "bubble" ? "data-annotation=\"$annotation\"" : "";
            if ($recommendations == "0") {
                $recommendations = "data-recommendations=\"false\"";
            }
            $code = "<div class=\"g-plusone\" $width $align $recommendations data-size=\"$size\" data-href=\"" . $url . "\" $annotation></div>";
        }
        if ($container != '0') {
            $code = "<$container class=\"css_google\" $css>$code</$container>";
        }
        $browser = JBrowser::getInstance();
        $browserType = $browser->getBrowser();
        if ($asynchronous && ($browserType != 'msie')) {
            $code = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . $code . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
        } else {
            $code = $code . PHP_EOL;
        }

        return $code;
    } // end on after dispatch

    /**
     * plgAlleventsaesocial::getGoogleShareCode()
     *
     * @param mixed $url
     *
     * @return string
     */
    function getGoogleShareCode($url)
    {
        $container = $this->params->get('google_share_container');
        $css = $this->params->get('google_share_css');
        if ($css != "") {
            $css = "style=\"$css\"";
        }
        //custom icon mode
        if ($this->params->get('google_share_style') == 'custom_icon') {
            $custom_img = $this->params->get('google_share_custom_img');
            if ($custom_img == '') {
                $custom_img = CUSTOM_GOOGLE_IMG;
            }
            $tmp = "<a class=\"cmp_google_custom_icon_link\" href=\"//plus.google.com/share?url=$url\" target=\"_blank\"><img class=\"cmp_google_custom_icon_img\" src=\"$custom_img\"/></a>";
            $code = $container != '0' ? "<$container class=\"css_google\" $css>$tmp</$container>" : $tmp;

            return $code;
        } //end custom icon mode

        $url = urldecode($url);
        $mode = $this->params->get('google_share_mode');
        $asynchronous = $this->params->get('google_asynchronous', '0');
        /*if ($this->params->get('auto_language')) {
            $language = JFactory::getLanguage()->getTag();
        } else {
            $language = $this->params->get('google_language', 'en-US');
        }*/
        $height = $this->params->get('google_share_height');
        $width = $this->params->get('google_share_width');
        $annotation = $this->params->get('google_share_annotation');
        $align = $this->params->get('google_share_align');
        if ($mode == "0") { // not html5
            $width = $width != '' ? "width=\"$width\"" : "";
            $height = $height != '' ? "height=\"$height\"" : "";
            $align = $align == "right" ? "align=\"$align\"" : "";
            $annotation = "annotation=\"$annotation\"";
            $code = "<g:plus action=\"share\" $width $align $height href=\"" . $url . "\" $annotation></g:plusone>";
        } else { // html5
            $width = $width != '' ? "data-width=\"$width\"" : "";
            $height = $height != '' ? "data-height=\"$height\"" : "";
            $align = $align == "right" ? "data-align=\"$align\"" : "";
            $annotation = "data-annotation=\"$annotation\"";
            $code = "<div class=\"g-plus\" data-action=\"share\" $width $align $height data-href=\"" . $url . "\" $annotation></div>";
        }
        if ($container != '0') {
            $code = "<$container class=\"css_google_share\" $css>$code</$container>";
        }
        $browser = JBrowser::getInstance();
        $browserType = $browser->getBrowser();
        if ($asynchronous && ($browserType != 'msie')) {
            $code = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . $code . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
        } else {
            $code = $code . PHP_EOL;
        }

        return $code;
    }

    /**
     * plgAlleventsaesocial::getLinkedinCode()
     *
     * @param mixed $url
     *
     * @return string
     */
    function getLinkedinCode($url)
    {
        $container = $this->params->get('linkedin_container', '1');
        $css = $this->params->get('linkedin_css');
        if ($css != "") {
            $css = "style=\"$css\"";
        }
        //custom icon mode
        if ($this->params->get('linkedin_style') == 'custom_icon') {
            $custom_img = $this->params->get('linkedin_custom_img');
            if ($custom_img == '') {
                $custom_img = CUSTOM_LINKEDIN_IMG;
            }
            $tmp = "<a class=\"cmp_linkedin_custom_icon_link\" href=\"http://www.linkedin.com/shareArticle?mini=true&url=$url\" target=\"_blank\"><img class=\"cmp_linkedin_custom_icon_img\" src=\"$custom_img\"/></a>";
            $code = $container != '0' ? "<$container class=\"css_linkedin\" $css>$tmp</$container>" : $tmp;

            return $code;
        } //end custom icon mode

        $data_counter = $this->params->get('linkedin_data-counter', 'none');
        $data_showzero = $this->params->get('linkedin_data-showzero', '0');
        $asynchronous = $this->params->get('linkedin_asynchronous', '0');
        $url = urldecode($url);
        $data_showzero = $data_counter == "none" ? "" : ($data_showzero == "0" ? "" : "data-showzero=\"true\"");
        $data_showzero = $data_counter == "none" ? "" : ($data_showzero == "0" ? "" : "data-showzero=\"true\"");
        $tmp = "<script type=\"IN/Share\" data-url=\"" . $url . "\" $data_counter $data_showzero></script>";
        $tmp = $asynchronous ? "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . preg_replace('/<\/script>/i', '<\/script>', $tmp) . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>" : $tmp . PHP_EOL;
        $code = $container != '0' ? "<$container class=\"css_linkedin\" $css>$tmp</$container>" : $tmp;

        return $code;
    }

    /**
     * plgAlleventsaesocial::getPinterestCode()
     *
     * @param mixed $url
     *
     * @return string
     */
    function getPinterestCode($url)
    {
        $selection = $this->params->get('pinterest_selection');
        //$counter = $this->params->get('pinterest_counter');
        $size = $this->params->get('pinterest_size');
        $color = $this->params->get('pinterest_color');
        $asynchronous = $this->params->get('pinterest_asynchronous');
        $container = $this->params->get('pinterest_container');
        $css = $this->params->get('pinterest_css');
        $custom_img = $this->params->get('pinterest_custom_img');
        if ($custom_img == '') {
            $custom_img = CUSTOM_PINTEREST_IMG;
        }
        $code = "";
        if (($selection == '0') || ($selection == '2')) { //user selection image
            if ($css != "") {
                $css = "style=\"$css\"";
            }
            $height = "20";
            $data_pin_height = "";
            if ($size == 'large') {
                $data_pin_height = "data-pin-height=\"28\"";
                $height = "28";
            }
            $code_color = "gray";
            $data_pin_color = "";
            if ($color != 'gray') {
                $data_pin_color = "data-pin-color=\"$color\"";
                $code_color = $color;
            }
            $lang = "en";

            $language = $this->params->get('auto_language') ? JFactory::getLanguage()->getTag() : $this->params->get('pinterest_language', 'en-US');
            $language = substr($language, 0, 2);

            $pin_lang = "";
            if ($language != 'en') {
                $pin_lang = "pin-lang=\"ja\"";
                $lang = $language;
            }
            if ($selection == '2') {
                $button_img = $custom_img;
                $tmp = "<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>" . "<img src=\"$button_img\" /></a>";
            } else {
                $button_img = "//assets.pinterest.com/images/pidgets/pinit_fg_" . $lang . "_rect_" . $code_color . "_" . $height . ".png";
                $tmp = "<a href=\"//www.pinterest.com/pin/create/button/\" data-pin-do=\"buttonBookmark\" $data_pin_color $data_pin_height $pin_lang>" . "<img src=\"$button_img\" /></a>";
            }
            $code = $container != '0' ? "<$container class=\"css_pinterest\" $css>$tmp</$container>" : $tmp;
            $code = $asynchronous ? "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . $code . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>" : $code . PHP_EOL;
        }

        return $code;
    }

    /**
     * plgAlleventsaesocial::getFbCommentsCode()
     *
     * @param mixed $url
     *
     * @return string
     */
    private function getFbCommentsCode($url)
    {
        $url = urldecode($url);
        $idrnd = 'fbcom' . rand();
        $fb_mode = $this->params->get('fb_mode');
        $asynchronous = $this->params->get('fb_asynchronous');
        $width = $this->params->get('fb_comments_width');
        if ($width != '') {
            $width = $fb_mode == 'html5' ? "data-width=\"$width\"" : "width=\"$width\"";
        }
        $max_number = $this->params->get('fb_comments_max_number');
        if ($max_number != '') {
            $max_number = $fb_mode == 'html5' ? "data-num-posts=\"$max_number\"" : "num-posts=\"$max_number\"";
        }
        $mobile = $this->params->get('fb_comments_mobile', 'auto');
        $mobile = $mobile != 'auto' ? ($fb_mode == 'html5' ? "data-mobile=\"$mobile\"" : "mobile=\"$mobile\"") : '';
        $order = $this->params->get('fb_comments_order_by');
        $autofit = $this->params->get('fb_comments_autofit');
        $color_scheme = $this->params->get('fb_comments_color_scheme');
        $container = $this->params->get('fb_comments_container');
        $css = $this->params->get('fb_comments_css');
        $notification = $this->params->get('fb_comments_notification');
        //$print = $this->params->get('fb_comments_print');
        $count_enable = $this->params->get('fb_comments_count_enable');
        //$container_count = $this->params->get('fb_comments_container_count');
        $css_count = $this->params->get('fb_comments_css_count');
        if (!empty($css)) {
            $css = "style=\"" . $css . "\"";
        }
        if (!empty($css_count)) {
            $css_count = "style=\"" . $css_count . "\"";
        }
        if ($fb_mode == 'html5') {
            $notification = ($notification == '1') ? 'data-notify="true" data-migrated="1"' : "";
            $code = "<div class=\"fb-comments\" data-href=\"" . $url . "\" $width $max_number data-colorscheme=\"$color_scheme\" data-order-by=\"$order\" $mobile $notification></div>";
        } else {
            $notification = ($notification == '1') ? 'notify="true" migrated="1"' : "";
            $code = "<fb:comments href=\"" . $url . "\" $width $max_number colorscheme=\"$color_scheme\" order_by=\"$order\" $mobile $notification></fb:comments>";
        }

        if ($asynchronous) { // async
            if ($autofit) { // async autofit
                $tmp = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL;
                $tmp .= "function getwfbcom() {" . PHP_EOL;
                $tmp .= " var efbcom = document.getElementById('" . $idrnd . "');" . PHP_EOL;
                $tmp .= " if (efbcom.currentStyle){" . PHP_EOL;
                $tmp .= "  var pl=efbcom.currentStyle['paddingLeft'].replace(/px/,'');" . PHP_EOL;
                $tmp .= "  var pr=efbcom.currentStyle['paddingRight'].replace(/px/,'');" . PHP_EOL;
                $tmp .= "  return efbcom.offsetWidth-pl-pr;" . PHP_EOL;
                $tmp .= " } else {" . PHP_EOL;
                $tmp .= "  var pl=window.getComputedStyle(efbcom,null).getPropertyValue('padding-left' ).replace(/px/,'');" . PHP_EOL;
                $tmp .= "  var pr=window.getComputedStyle(efbcom,null).getPropertyValue('padding-right').replace(/px/,'');" . PHP_EOL;
                $tmp .= "  return efbcom.offsetWidth-pl-pr;";
                $tmp .= "}}" . PHP_EOL;
                $code = preg_replace('/(width=".*?")/', 'width="\'+getwfbcom()+\'"', $code);
                $tmp .= "var tagfbcom = '" . $code . "';";
                $tmp .= "document.write(tagfbcom); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
                $code = $tmp;
            } else { // async no autofit
                $code = "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . "document.write('" . $code . "'); " . PHP_EOL . "//]]> " . PHP_EOL . "</script>";
            }
            if ($container != '0') {
                $code = "<$container $css id=\"" . $idrnd . "\" class=\"css_fb_comments\">$code</$container>";
            }
        } else { // no async
            if ($autofit) {
                $tmps = "function autofitfbcom() {";
                $tmps .= " var efbcom = document.getElementById('" . $idrnd . "');";
                $tmps .= " if (efbcom.currentStyle){";
                $tmps .= "  var pl=efbcom.currentStyle['paddingLeft'].replace(/px/,'');";
                $tmps .= "  var pr=efbcom.currentStyle['paddingRight'].replace(/px/,'');";
                $tmps .= "  var wfbcom=efbcom.offsetWidth-pl-pr;";
                $tmps .= "  try {efbcom.firstChild.setAttribute('width',wfbcom);}";
                $tmps .= "  catch(e) {efbcom.firstChild.width=wfbcom+'px';}";
                $tmps .= " } else {";
                $tmps .= "  var pl=window.getComputedStyle(efbcom,null).getPropertyValue('padding-left' ).replace(/px/,'');";
                $tmps .= "  var pr=window.getComputedStyle(efbcom,null).getPropertyValue('padding-right').replace(/px/,'');";
                $tmps .= "  efbcom.childNodes[0].setAttribute('width',efbcom.offsetWidth-pl-pr);" . PHP_EOL;
                $tmps .= "}}";
                $tmps .= "autofitfbcom();";
                $code .= "<script type=\"text/javascript\">" . PHP_EOL . "//<![CDATA[" . PHP_EOL . $tmps . PHP_EOL . "//]]> " . PHP_EOL . "</script>" . PHP_EOL;
            }
            if ($container != '0') {
                $code = "<$container $css id=\"" . $idrnd . "\" class=\"css_fb_comments\">" . $code . "</$container>";
            }
        } // end no async

        // comments counter
        if ($count_enable == '1') {
            if ($container != '0') {
                $code = "<$container class=\"css_fb_comments_count\" $css_count>
        <fb:comments-count href=\"" . $url . "\"></fb:comments-count> comments
        </$container>" . $code;
            } else {
                $code = "<fb:comments-count href=\"" . $url . "\"></fb:comments-count> comments" . $code;
            }
        }

        return $code;
    }

    /**
     * plgAlleventsaesocial::onAfterDispatch()
     * include scripts and styles
     *
     * @return void
     * @throws Exception
     */
    function onAfterDispatch()
    {
        // no action for administration interface
        $app = JFactory::getApplication();
        if ($app->isAdmin()) {
            return;
        }

        $document = JFactory::getDocument();
        $enable_fb_comments = $this->params->get('enable_fb_comments');
        $enable_fb_like = $this->params->get('enable_fb_like');
        $enable_fb_share = $this->params->get('enable_fb_share');
        $enable_fb_send = $this->params->get('enable_fb_send');
        $enable_fb_photo = $this->params->get('enable_fb_photo');
        $enable_twitter = $this->params->get('enable_twitter');
        $enable_google = $this->params->get('enable_google');
        $enable_google_share = $this->params->get('enable_google_share');
        $enable_linkedin = $this->params->get('enable_linkedin');
        $enable_pinterest = $this->params->get('enable_pinterest');
        $css_code = $this->params->get('css_code');
        if (!empty($css_code)) {
            $document->addStyleDeclaration($css_code, 'text/css');
        }

        // Facebook
        if ($enable_fb_comments || $enable_fb_like || $enable_fb_share || $enable_fb_send || $enable_fb_photo) {
            $fb_app_id = $this->params->get('fb_app_id');

            $language = $this->params->get('auto_language') ? JFactory::getLanguage()->getTag() : $this->params->get('fb_language', 'en-US');
            $fb_language = str_replace('-', '_', $language);

            if ($this->params->get('fb_asynchronous', '1') == '1') {
                $FbCode = "
                    (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.id='facebook-jssdk';
                " . PHP_EOL;
                if ($fb_app_id != '') {
                    $FbCode .= "po.src = '//connect.facebook.net/" . $fb_language . "/sdk.js#xfbml=1&version=v2.5&appId=" . $fb_app_id . "';" . PHP_EOL;
                } else {
                    $FbCode .= "po.src = '//connect.facebook.net/" . $fb_language . "/sdk.js#xfbml=1&version=v2.5';" . PHP_EOL;
                }
                $FbCode .= "
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                    })();
                " . PHP_EOL;
                $document->addScriptDeclaration($FbCode);
            } else { //not async
                if ($fb_app_id != '') {
                    $document->addScript("//connect.facebook.net/" . $fb_language . "/sdk.js#xfbml=1&version=v2.5&appId=" . $fb_app_id);
                } else {
                    $document->addScript("//connect.facebook.net/" . $fb_language . "/sdk.js#xfbml=1&version=v2.5");
                }
            }
            $fb_comments_notification = $this->params->get('enable_notification_comment');
            if (($fb_comments_notification == '1') && ($fb_app_id != '')) {
                $FbCode = "
                var request;
                function initReq(reqType,url,isAsynch,query){
                //request.onreadystatechange=handleResponse;
                    request.open(reqType,url,isAsynch);
                    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
                    request.send(query);
                }
                function httpRequest(reqType,url,asynch,query){
                    if(window.XMLHttpRequest){
                        request = new XMLHttpRequest();
                    } else if (window.ActiveXObject){
                        request=new ActiveXObject('Msxml2.XMLHTTP');
                        if (! request){
                            request=new ActiveXObject('Microsoft.XMLHTTP');
                        }
                    }
                    if(request){
                        initReq(reqType,url,asynch,query);
                    } else {
                        alert('Your browser does not permit notifications.');
                    }
                }
                //function handleResponse(  ){if(request.readyState == 4){if(request.status == 200){alert(request.responseText);} else {alert('Communication error'); }}}
                function sendData(href){
                    query='href='+encodeURIComponent(href);
                    var url='" . JUri::root() . CMP_PLG_NOTIFY . "';
                    httpRequest('POST',url,true,query);
                }
                ";
                if ($this->params->get('fb_asynchronous', '1') == '1') {
                    $FbCode .= "
                        window.fbAsyncInit = function() {
                            FB.Event.subscribe('comment.create', function(comment) {
                                sendData(comment.href);
                            });
                        }
                    ";
                } else {
                    $FbCode .= "
                        (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.innerHTML = 'FB.Event.subscribe(\"comment.create\", function(comment) {sendData(comment.href);});';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                        })();
                    ";
                }
                $document->addScriptDeclaration($FbCode);
            }

            // fb photo button
            if ($enable_fb_photo == '1') {
                $FbPhotoCode = "
                function getPos(a) { var b = 0,c = 0; if (a.offsetParent) { do b += a.offsetLeft, c += a.offsetTop; while (a = a.offsetParent); return {left: b,top: c}}}

                function fb_click_photo(imgURL,msg){
                    FB.getLoginStatus(function(response) {
                        if (response.status === 'connected') {
                            var uid = response.authResponse.userID;
                            var accessToken = response.authResponse.accessToken;
                            fb_upload_photo(uid,imgURL,msg);
                        } else {
                            FB.login(function(response) {
                                if (response.authResponse) {
                                    var uid = response.authResponse.userID;
                                    fb_upload_photo(uid,imgURL,msg);
                                }
                            }, {scope: 'user_photos,publish_stream'});
                        }
                    });
                }

                function fb_upload_photo(id,imgURL,msg){
                    FB.api('/'+id+'/photos', 'post', {
                        message:msg,
                        url:imgURL,
                    }, function(response){
                        if (!response || response.error) {
                            alert('Error occured uploading the photo to your profile: '+response.error);
                        } else {
                            alert('The photo has been successfully uploaded.' );
                        }
                    });
                }";
                $document->addScriptDeclaration($FbPhotoCode);
                $FbPhotoCss = "
                .css_fb_photo {
                    display: inline;
                    position: absolute;
                    -moz-opacity:.50;
                    filter:alpha(opacity=50);
                    opacity:.50;
                    z-index: 20;
                }
                .css_fb_photo:hover {
                    -moz-opacity:1;
                    filter:alpha(opacity=100);
                    opacity:1;
                }";
                $document->addStyleDeclaration($FbPhotoCss, 'text/css');
            } // end fb photo button
        } // end facebook

        // Twitter
        if (($enable_twitter) && ($this->params->get('twitter_style') != 'custom_icon')) {
            if ($this->params->get('twitter_asynchronous', '1') == '1') {
                $TwCode = "
                    (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.id='twitter-wjs';
                        po.src = '//platform.twitter.com/widgets.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                    })();
                ";
                $document->addScriptDeclaration($TwCode);
            } else {
                $document->addScript("//platform.twitter.com/widgets.js");
            }
        } // end Twitter

        // Google
        if ($enable_google || ($enable_google_share && ($this->params->get('google_share_style') != 'custom_icon'))) {
            if ($this->params->get('auto_language')) {
                $google_language = JFactory::getLanguage()->getTag();
            } else {
                $google_language = $this->params->get('google_language', 'en-US');
            }

            $GoogleCode = "
                window.___gcfg = {
                    lang: '" . $google_language . "'
                };
                (function() {
                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                    po.src = 'https://apis.google.com/js/plusone.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                })();
            ";
            $document->addScriptDeclaration($GoogleCode);
        } // end Google

        // LinkedIn
        if (($enable_linkedin) && ($this->params->get('linkedin_style') != 'custom_icon')) {
            $LinkedInCode = "
                (function() {
                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                    po.src = '//platform.linkedin.com/in.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                })();
            ";
            $document->addScriptDeclaration($LinkedInCode);
        } // end LinkedIn

        // Pinterest
        if ($enable_pinterest) {
            $pinterest_selection = $this->params->get('pinterest_selection');
            $PinterestCode = "
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.id='pinterest-js';
            ";
            if ($pinterest_selection == '1') { // not user select
                $PinterestCode .= "po.setAttribute('data-pin-hover', true);";
            }
            $PinterestCode .= "
                po.src = '//assets.pinterest.com/js/pinit.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
            ";
            $document->addScriptDeclaration($PinterestCode);
        } // End Pinterest

        // print mode
        if ($this->params->get('fb_comments_print', '0') == '0') { // no comments
            $PrintCss = " @media print { .css_buttons0,.css_buttons1,.css_fb_like,.css_fb_share,.css_fb_send,css_fb_photo,.css_twitter,.css_google,.css_google_share,.css_linkedin,.css_pinterest,.css_fb_comments,.css_fb_comments_count { display:none }}";
        } else {
            $PrintCss = " @media print { .css_buttons0,.css_buttons1,.css_fb_like,.css_fb_share,.css_fb_send,css_fb_photo,.css_twitter,.css_google,.css_google_share,.css_linkedin,.css_pinterest { display:none }}";
        }
        $document->addStyleDeclaration($PrintCss, 'text/css');
    }
}
