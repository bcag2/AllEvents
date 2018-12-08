<?php
// No direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');
if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';

/**
 * plgAllEventsAllEventsVote
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAllEventsAllEventsVote extends JPlugin
{
    protected $event_id;
    protected $view;
    /**
     * Load the language file on instantiation
     */
    protected $autoloadLanguage = true;
    protected $config = '';

    /**
     * plgAllEventsAllEventsVote::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     *
     * @throws Exception
     */
    public function __construct(& $subject, $config)
    {
        $app = JFactory::getApplication();
        $this->view = $app->input->get('view');
        $this->config = json_decode($config['params']);
        $this->loadLanguage();
        parent::__construct($subject, $config);
    }

    /**
     * plgAllEventsAllEventsVote::onContentPrepareForm()
     *
     * @param $form
     * @param $data
     * @return bool
     */
    public function onContentPrepareForm($form, $data)
    {
        if (!($form instanceof JForm)) {
            $this->_subject->setError('JERROR_NOT_A_FORM');

            return false;
        }
        if ($form->getName() == 'com_allevents.event') {
            JForm::addFormPath(__dir__ . '/forms');
            $form->loadFile('rating', false);
            $doc = JFactory::getDocument();
            JHtml::_('jquery.framework');
            $doc->addScript(JUri::root() . 'media/jui/js/jquery.ui.core.min.js');
            $doc->addScript(JUri::root() . 'media/jui/js/jquery.ui.sortable.min.js');
            $doc->addScript(JUri::root() . 'plugins/allevents/alleventsvote/assets/alleventsvoteb.js');
            $doc->addStyleSheet(JUri::root() . 'plugins/allevents/alleventsvote/assets/alleventsvote.css');
            $doc->addStyleDeclaration('#jform_attribs_rates {display: none}');

            return true;
        } else {
            return true;
        }
    }

    /**
     * plgAllEventsAERating::onAlleventsAfterDisplayEvent()
     *
     * @param mixed $event
     * @param mixed $params
     *
     * @return string
     * @internal param mixed $context
     * @internal param int $page
     */
    public function onAlleventsAfterDisplayEvent(&$event, &$params)
    {
        if (!property_exists($event, 'id') || !isset($event->id)) {
            return null;
        }

        $user = JFactory::getUser();
        $attribs = json_decode($event->attribs);
        $showOverall = isset($attribs->show_overall) ? $attribs->show_overall : false;
        $ratings = isset($attribs->rates) ? json_decode($attribs->rates) : false;
        $show_counter = $this->params->get('show_counter', 1);
        $show_rating = $this->params->get('show_rating', 1);
        $rating_mode = $this->params->get('rating_mode', 1);
        $show_unrated = $this->params->get('show_unrated', 1);
        $initial_hide = $this->params->get('initial_hide', 0);
        $access = $this->params->get('access', 1);
        $currip = $_SERVER['REMOTE_ADDR'];

        $db = JFactory::getDbo();
        $query = 'SELECT * FROM `#__allevents_aevote` WHERE extra_id!=0 AND event_id=' . $event->id . ' ORDER BY extra_id ASC';
        $db->setQuery($query);
        $votes = $db->loadObjectList();

        AllEventsHelperOverride::jquery();
        AllEventsHelperOverride::bootstrap();
        AllEventsHelperOverride::uikit();

        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JURI::root() . '/plugins/allevents/alleventsvote/assets/circle.css');
        $doc->addStyleDeclaration('.alleventsvote-stars {display: table; margin: 0 auto !important;}');
        $doc->addStyleDeclaration('.alleventsvote-info {display: table; margin: 0 auto !important;}');

        // variables init
        $output = '';
        $rating_sum = 0;
        $nb_ratings = count($votes);

        // no content - nothing to render
        if (!$votes) {
            return;
        }
        $output .= '<div class="uk-grid" style ="margin-top: 30px"> ';
        if ($showOverall) {
            foreach ($votes as $rate) {
                $rating_sum += $rate->rating_count ? floatval($rate->rating_sum) / floatval($rate->rating_count) : 0;
            }
            $rating_sum0 = $nb_ratings ? round($rating_sum * 20 / $nb_ratings, 0) : 100;
            $rating_sum1 = $nb_ratings ? round($rating_sum * 20 / $nb_ratings, 1) : 100;

            $output .= '<div class="uk-width-medium-2-' . ($nb_ratings + 2) . '">';
            $output .= '<div class="c100 p' . $rating_sum0 . ' center orange">';
            $output .= '    <span>' . $rating_sum1 . '%</span>';
            $output .= '    <div class="slice">';
            $output .= '        <div class="bar"></div>';
            $output .= '        <div class="fill"></div>';
            $output .= '    </div>';
            $output .= '</div>';
            $output .= '<div style="text-align: center;">' . JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_OVERALL') . '</div>';
            $output .= '</div>';
        }

        // Partial results
        $i = 1;
        foreach ($votes as $rate) {
            $rate_value0 = $rate->rating_count ? round(floatval($rate->rating_sum) * 20 / floatval($rate->rating_count), 0) : 100;
            $rate_value1 = $rate->rating_count ? round(floatval($rate->rating_sum) * 20 / floatval($rate->rating_count), 1) : 100;

            // partie HTML
            $output .= '<div class="uk-width-medium-1-' . ($nb_ratings + 2) . '">';
            $output .= '<div class="c100 p' . $rate_value0 . ' center green">';
            $output .= '    <span>' . $rate_value1 . '%</span>';
            $output .= '    <div class="slice">';
            $output .= '        <div class="bar"></div>';
            $output .= '        <div class="fill"></div>';
            $output .= '    </div>';
            $output .= '</div>';
            $output .= '<div style="text-align: center;">' . $rate->label . '</div>';

            // partie stars			
            if ($access == 1) {
                $output .= $this->plgAllEventsAllEventsVoteStars($event->id, $rate->rating_sum, $rate->rating_count, $i, $rate->ip);
            } elseif ($access == 2 && $user->get('id')) {
                $output .= $this->plgAllEventsAllEventsVoteStars($event->id, $rate->rating_sum, $rate->rating_count, $i, $rate->ip);
            }
            $output .= '</div>';
            $i++;
        }

        return ($output);
    }

    /**
     * plgAllEventsAllEventsVote::plgAllEventsAllEventsVoteStars()
     *
     * @param mixed $id
     * @param mixed $rating_sum
     * @param mixed $rating_count
     * @param mixed $xid
     * @param mixed $ip
     *
     * @return string
     */
    protected function plgAllEventsAllEventsVoteStars($id, $rating_sum, $rating_count, $xid, $ip)
    {
        $document = JFactory::getDocument();

        if ($this->params->get('css', 1)) {
            $document->addStyleSheet(JUri::root(true) . '/plugins/allevents/alleventsvote/assets/alleventsvote.css');
        }

        $document->addScript(JUri::root(true) . '/plugins/allevents/alleventsvote/assets/alleventsvotef.js?v=1.1');

        global $plgAllEventsAllEventsVoteAddScript;

        $show_counter = $this->params->get('show_counter', 1);
        $show_rating = $this->params->get('show_rating', 1);
        $rating_mode = $this->params->get('rating_mode', 1);
        $show_unrated = $this->params->get('show_unrated', 1);
        $initial_hide = $this->params->get('initial_hide', 0);
        $currip = $_SERVER['REMOTE_ADDR'];
        $add_snippets = 0;
        $rating = 0;

        if (!$plgAllEventsAllEventsVoteAddScript) {
            $document->addScriptDeclaration("
                var ev_basefolder = '" . JUri::base(true) . "';
                var alleventsvote_text=Array('" .
                JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_MESSAGE_NO_AJAX') . "','" .
                JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_MESSAGE_LOADING') . "','" .
                JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_MESSAGE_THANKS') . "','" .
                JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_MESSAGE_LOGIN') . "','" .
                JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_MESSAGE_RATED') . "','" .
                JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_LABEL_VOTES') . "','" .
                JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_LABEL_VOTE') . "','" .
                JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_LABEL_RATING') .
                "');
            ");
            $plgAllEventsAllEventsVoteAddScript = 1;
        }

        if ($rating_count != 0) {
            $rating = ($rating_sum / intval($rating_count));
            $add_snippets = $this->params->get('snippets', 0);
        } elseif ($show_unrated == 0) {
            $show_counter = -1;
            $show_rating = -1;
        }

        $container = 'div';
        $class = 'size-' . $this->params->get('size', 1);

        if ((int)$xid) {
            if ($show_counter == 2) $show_counter = 0;
            if ($show_rating == 2) $show_rating = 0;
            $container = 'span';
            $class .= ' alleventsvote-small';
            $add_snippets = 0;
        } else {
            if ($show_counter == 3) $show_counter = 0;
            if ($show_rating == 3) $show_rating = 0;
            $class .= ' alleventsvote';
        }

        $stars = (($this->params->get('table', 1) != 1 && !(int)$xid) ? 5 : $this->params->get('stars', 10));
        $spans = '';

        for ($i = 0, $j = 5 / $stars; $i < $stars; $i++, $j += 5 / $stars) {
            $spans .= " <span class='alleventsvote-star'>";
            $spans .= "<a href='javascript:void(null)' onclick='JVXVote(" . $id . "," . $j . "," . $rating_sum . "," . $rating_count . ",\"" . $xid . "\"," . $show_counter . "," . $show_rating . "," . $rating_mode . ");' title='" . JTEXT::_('PLG_ALLEVENTS_ALLEVENTSVOTE_RATING_' . ($j * 10) . '_OUT_OF_5') . "' class='ev-" . ($j * 10) . "-stars'>1</a>";
            $spans .= "</span>";
        }

        $html = "<" . $container . " class=\"" . $class . "\">";
        $html .= "<span class=\"alleventsvote-stars\"" . ($add_snippets ? " itemprop=\"aggregateRating\" itemscope itemtype=\"http://schema.org/AggregateRating\"" : "") . ">" . ($add_snippets ? "<meta itemprop=\"ratingCount\" content=\"" . $rating_count . "\" /> " : "");
        $html .= "   <span id=\"rating_" . $id . "_" . $xid . "\" class=\"current-rating\"" . ((!$initial_hide || $currip == $ip) ? " style=\"width:" . round($rating * 20) . "%;\"" : "") . "" . ($add_snippets ? " itemprop=\"ratingValue\"" : "") . ">" . ($add_snippets ? $rating : "");
        $html .= "   </span>";
        $html .= $spans;
        $html .= "</span>";
        $html .= "<span class=\"alleventsvote-info" . (($initial_hide && $currip != $ip) ? " ihide\"" : "") . "\" id=\"alleventsvote_" . $id . "_" . $xid . "\">";

        if ($show_rating > 0) {
            if ($rating_mode == 0) {
                $rating = round($rating * 20) . '%';
            } else {
                $rating = number_format($rating, 2);
            }
            $html .= JTEXT::sprintf('PLG_ALLEVENTS_ALLEVENTSVOTE_LABEL_RATING', $rating);
        }

        if ($show_counter > 0) {
            if ($rating_count != 1) {
                $html .= JTEXT::sprintf('PLG_ALLEVENTS_ALLEVENTSVOTE_LABEL_VOTES', $rating_count);
            } else {
                $html .= JTEXT::sprintf('PLG_ALLEVENTS_ALLEVENTSVOTE_LABEL_VOTE', $rating_count);
            }
        }

        $html .= "</span>";
        $html .= "</" . $container . ">";

        return $html;
    }

    /**
     * onAlleventsAfterDisplayEvent::onAfterAlleventsEventSave()
     *
     * @param mixed $item
     * @param bool $isNew
     * @param int $eventid
     *
     * @return array|bool
     */
    public function onAfterAlleventsEventSave($item, $isNew, $eventid)
    {
        $i = 1;
        $labels = [];

        $db = JFactory::getDbo();
        foreach (json_decode($item['attribs']['rates']) as $k => $v) {
            $query = $db->getQuery(true);
            $query = 'SELECT * FROM `#__allevents_aevote` WHERE label="' . $v->label . '" AND event_id=' . $eventid;
            $db->setQuery($query);
            $rating = $db->loadObject();

            if ($rating) {
                $query = "UPDATE #__allevents_aevote SET extra_id=" . $i . " WHERE (event_id = " . $eventid . ") AND (label = '" . $v->label . "')";
            } else {
                $query = "INSERT INTO #__allevents_aevote (event_id, extra_id, lastip, rating_sum, rating_count, label) VALUES (" . $eventid . "," . $i . ",'',0,0,'" . $v->label . "')";
            }
            $db->setQuery($query);
            $db->execute();
            $labels [] = $v->label;

            $i++;
        }
        $query = 'DELETE FROM #__allevents_aevote WHERE (event_id = ' . $eventid . ') AND (label NOT IN ("' . implode('","', $labels) . '"))';
        $db->setQuery($query);
        $db->execute();

        return true;
    }

    /**
     * plgAllEventsAllEventsVote::onAlleventsBeforeDisplayEvent()
     *
     * @param mixed $event
     * @param mixed $params
     *
     * @return string
     */
    public function onAlleventsGetEventRating(&$event, &$params)
    {
        $db = JFactory::getDbo();
        // vote majeur (extra_id=0)
        $query = 'SELECT * FROM `#__allevents_aevote` WHERE extra_id=0 AND event_id=' . $event->id;
        $db->setQuery($query);
        $vote = $db->loadObject();

        if ($vote) {
            $reviewCount = intval($vote->rating_count);
            $ratingValue = ($vote->rating_sum / $reviewCount);

            return '"aggregateRating": {"@type": "AggregateRating","ratingValue": "' . $ratingValue . '","reviewCount": "' . $reviewCount . '"},';
        } else {
            return '';
        }
    }

    /**
     * plgAllEventsAllEventsVote::onAlleventsBeforeDisplayEvent()
     *
     * @param mixed $event
     * @param mixed $params
     *
     * @return string
     */
    public function onAlleventsBeforeDisplayEvent(&$event, &$params)
    {
        $this->event_id = $event->id;
        $this->alleventsvotePrepare($event, $params);
        if ($this->view == 'event') {
            $event->xid = 0;

            return $this->AllEventsAllEventsVote($event, $params);
        }

        return '';
    }

    /**
     * plgAllEventsAllEventsVote::alleventsvotePrepare()
     *
     * @param mixed $event
     * @param mixed $params
     *
     * @return void
     */
    protected function alleventsvotePrepare($event, &$params)
    {
        if (isset($this->event_id)) {
            $extra = $this->params->get('extra', 1);
            $main = $this->params->get('main', 1);

            if ($extra != 0) {
                $regex = "/{alleventsvote\s*([0-9]+)}/i";

                if ($this->view != 'event' && stripos($event->intro, 'alleventsvote')) {
                    if ($extra == 2) {
                        $event->intro = preg_replace($regex, '', $event->intro);
                    } else {
                        $event->intro = preg_replace_callback($regex, [$this, 'plgAllEventsAllEventsVoteReplacer'], $event->intro);
                    }
                } elseif (stripos($event->description, 'alleventsvote')) {
                    $event->description = preg_replace_callback($regex, [$this, 'plgAllEventsAllEventsVoteReplacer'], $event->description);
                }
            }

            if ($main != 0) {

                $strposIntro = isset($event->intro) ? stripos($event->intro, 'mainvote') : false;
                $strposText = stripos($event->description, 'mainvote');

                $regex = "/{mainvote\s*([0-9]*)}/i";

                if ($main == 2 && $this->view != 'event' && $strposIntro) {
                    $event->intro = preg_replace($regex, '', $event->intro);
                } else {
                    $this->event_id = $event->id;
                    if ($this->view == 'event' && $strposText) {
                        $event->description = preg_replace_callback($regex, [$this, 'plgAllEventsAllEventsVoteReplacer'], $event->description);
                    } elseif ($strposIntro) {
                        $event->intro = preg_replace_callback($regex, [$this, 'plgAllEventsAllEventsVoteReplacer'], $event->intro);
                    }
                }
            }
        }
    }

    /**
     * plgAllEventsAllEventsVote::AllEventsAllEventsVote()
     *
     * @param mixed $event
     * @param mixed $params
     *
     * @return string
     */
    protected function AllEventsAllEventsVote(&$event, &$params)
    {
        $rating_count = $rating_sum = 0;
        $html = $ip = '';

        $db = JFactory::getDbo();
        $query = 'SELECT * FROM `#__allevents_aevote` WHERE event_id=' . $this->event_id;
        $db->setQuery($query);
        $vote = $db->loadObject();

        if ($vote) {
            $rating_sum = $vote->rating_sum;
            $rating_count = intval($vote->rating_count);
            $ip = $vote->lastip;
        }

        $html .= $this->plgAllEventsAllEventsVoteStars($this->event_id, $rating_sum, $rating_count, $event->xid, $ip);

        return $html;
    }

    /**
     * plgAllEventsAllEventsVote::plgAllEventsAllEventsVoteReplacer()
     *
     * @param mixed $matches
     *
     * @return string
     */
    protected function plgAllEventsAllEventsVoteReplacer(&$matches)
    {
        $db = JFactory::getDbo();
        $cid = 0;
        $xid = 0;
        if (isset($matches[1])) {
            if (stripos($matches[0], 'alleventsvote')) {
                $xid = (int)$matches[1];
            } else {
                $cid = (int)$matches[1];
            }
        }
        if ($cid == 0 && ($this->params->get('event_id') || $xid == 0)) {
            $cid = $this->event_id;
        }
        $rating_sum = 0;
        $rating_count = 0;

        if ($xid == 0) {
            global $alleventsvote_mainvote;
            $alleventsvote_mainvote .= 'x';
            $xid = $alleventsvote_mainvote;
            $db->setQuery('SELECT * FROM `#__allevents_aevote` WHERE event_id=' . (int)$cid);
        } else {
            $db->setQuery('SELECT * FROM `#__allevents_aevote` WHERE event_id=' . (int)$cid . ' AND extra_id=' . (int)$xid);
        }
        $vote = $db->loadObject();
        if ($vote) {
            if ($vote->rating_count != 0) {
                $rating_sum = $vote->rating_sum;
            }
            $rating_count = intval($vote->rating_count);
        }

        return $this->plgAllEventsAllEventsVoteStars($cid, $rating_sum, $rating_count, $xid, ($vote ? $vote->lastip : ''));
    }
}
