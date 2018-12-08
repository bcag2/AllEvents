<?php
defined('_JEXEC') or die;
// Require the component's router file

// require_once JPATH_SITE . '/components/com_allevents/router.php';
// JLoader::register('ContentHelperRoute', JPATH_SITE . '/components/com_allevents/router.php');


/**
 * PlgSearchAllevents : All functions need to get wrapped in class PlgSearchAllevents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class PlgSearchAllevents extends JPlugin
{
    /**
     * Load the language file on instantiation.
     *
     * @var    boolean
     * @since  3.1
     */
    protected $autoloadLanguage = true;

    /**
     * PlgSearchAllevents::__construct()
     *
     * @param object $subject
     * @param array $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        $this->loadLanguage();
    }

    /**
     * PlgSearchAllevents::onContentSearch()
     *
     * The real function has to be created. The database connection should be made.
     * The function will be closed with an } at the end of the file.
     * The sql must return the following fields that are used in a common display
     * routine: href, title, section, created, text, browsernav
     *
     * @param mixed $text Target search string
     * @param string $phrase mathcing option, exact|any|all
     * @param string $ordering ordering option, newest|oldest|popular|alpha|category
     * @param mixed $areas An array if the search it to be restricted to areas, null if search all
     *
     * @return mixed|null
     * @throws Exception
     */
    function onContentSearch($text, $phrase = '', $ordering = '', $areas = null)
    {
        $db = JFactory::getDbo();
        $app = JFactory::getApplication();
        //$tag = JFactory::getLanguage()->getTag();
        //$user = JFactory::getUser();
        //$groups = implode(',', $user->getAuthorisedViewLevels());
        // If the array is not correct, return it:
        if (is_array($areas)) {
            if (!array_intersect($areas, array_keys($this->onContentSearchAreas()))) {
                return [];
            }
        }
        // Now retrieve the plugin parameters
        $search_name = $this->params->get('search_name', JText::_('COM_ALLEVENTS_PLG_SEARCH_SECTION_EVENTS'));
        if ($search_name == 'COM_ALLEVENTS_PLG_SEARCH_SECTION_EVENTS')
            $search_name = 'Events';
        $search_limit = $this->params->get('search_limit', '50');
        $search_target = $this->params->get('search_target', '0');
        $sContent = $this->params->get('search_content', 1);
        $sArchived = $this->params->get('search_archived', 0);
        $sPasted = $this->params->get('search_pasted', 1);
        $state = [];

        if ($sContent) {
            $state[] = 1;
        }

        if ($sArchived) {
            $state[] = 2;
        }

        if (empty($state)) {
            return [];
        }

        // Use the PHP function trim to delete spaces in front of or at the back of the searching terms
        $text = trim($text);
        // Return Array when nothing was filled in.
        if ($text == '') {
            return [];
        }
        // Database part.
        //$wheres = array();

        switch ($phrase) {
            // Search exact
            case 'exact':
                $text = $db->quote('%' . $db->escape($text, true) . '%', false);
                $wheres2 = [];
                $wheres2[] = 'LOWER(e.titre) LIKE LOWER (' . $text . ') ';
                $wheres2[] = 'LOWER(e.description) LIKE LOWER (' . $text . ') ';
                $where = '(' . implode(') OR (', $wheres2) . ')';
                break;
            // Search all or any
            case 'all':
            case 'any':
                // Set default
            default:
                $words = explode(' ', $text);
                $wheres = [];

                foreach ($words as $word) {
                    $word = $db->quote('%' . $db->escape($word, true) . '%', false);
                    $wheres2 = [];
                    $wheres2[] = 'LOWER(e.titre) LIKE LOWER(' . $word . ')';
                    $wheres2[] = 'LOWER(ac.titre) LIKE LOWER(' . $word . ')';
                    $wheres2[] = 'LOWER(a.titre) LIKE LOWER(' . $word . ')';
                    $wheres2[] = 'LOWER(c.titre) LIKE LOWER(' . $word . ')';
                    $wheres2[] = 'LOWER(pl.titre) LIKE LOWER(' . $word . ')';
                    $wheres2[] = 'LOWER(p.titre) LIKE LOWER(' . $word . ')';
                    $wheres2[] = 'LOWER(r.titre) LIKE LOWER(' . $word . ')';
                    $wheres2[] = 'LOWER(e.description) LIKE LOWER (' . $word . ')';
                    $wheres[] = implode(' OR ', $wheres2);
                }

                $where = '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
                break;
        }
        // Ordering of the results
        switch ($ordering) {
            // Alphabetic, ascending
            case 'alpha':
                $order = 'e.titre ASC';
                break;
            // Oldest first
            case 'oldest':
                $order = 'e.date ASC';
                break;
            // Popular first
            case 'popular':
                $order = 'e.hits DESC';
                break;
            // Newest first
            case 'newest':
                $order = 'e.date DESC';
                break;
            // Category
            case 'category':
                $order = 'c.titre ASC, e.titre ASC';
                break;
            // Default setting: alphabetic, ascending
            default:
                $order = 'e.titre ASC';
        }
        // Section
        $section = $search_name;
        // List of Events menu Itemid Request
        $AE_list_menus = self::AElistMenuItemsInfo();
        $nb_menu = count($AE_list_menus);
        $nolink = $nb_menu ? false : true;
        // The database query;
        $query = $db->getQuery(true);
        $query->select('e.titre AS title, e.created_date AS created, e.description AS text, e.id AS eventID, e.alias AS alias, c.id AS catid, "" AS language');
        $query->select($query->concatenate([$db->quote($section), 'c.titre'], " / ") . ' AS section');
        $query->select('"' . $search_target . '" AS browsernav');
        $query->from('`#__allevents_events` AS e');
        $query->leftJoin('`#__allevents_activities` as ac ON ac.id = e.activity_id');
        $query->leftJoin('`#__allevents_agenda` as a ON a.id = e.agenda_id');
        $query->leftJoin('`#__allevents_categories` as c ON c.id = e.category_id');
        $query->leftJoin('`#__allevents_places` as pl ON pl.id = e.place_id');
        $query->leftJoin('`#__allevents_public` as p ON p.id = e.public_id');
        $query->leftJoin('`#__allevents_ressources` as r ON r.id = e.ressource_id');
        $query->leftJoin('`#__allevents_sections` as s ON s.id = e.section_id');

        $query->where('(' . $where . ')' . ' AND e.published IN (' . implode(',', $state) . ') ');
        // si l'utilisateur ne peut pas appouver un evt, on ne montre que les évènement validés
        if (JFactory::getUser()->authorise('core.approve', 'com_allevents') !== true) {
            $query->where(' e.proposal = 0 ');
        }
        // Filter by language.
        // if ($app->isSite() && JLanguageMultilang::isEnabled())
        // {
        // $query->where('e.language in (' . $db->quote($tag) . ',' . $db->quote('*') . ')');
        // }

        if (!$sPasted) {
            $query->where(' e.date > now() ');
        }

        $query->order($order);
        // Set query
        $db->setQuery($query, 0, $search_limit);
        $AEevents = $db->loadObjectList();
        // $limit -= count($list);
        // The 'output' of the displayed link.
        if (isset($AEevents)) {
            foreach ($AEevents as $key => $AEevent) {
                // set menu link for each event (itemID) depending of category and/or language
                //$onecat = $multicat = '0';
                $link_one = $link_multi = '';

                //$item_catid = $AEevent->catid;

                $array_menus_cat_not_set = [];

                foreach ($AE_list_menus as $AEm) {
                    $value = explode('-', $AEm);
                    $AEmenu_id = $value['0'];
                    $AEmenu_mcatid = $value['1'];
                    $AEmenu_lang = $value['2'];

                    $AEmenu_mcatid_array = !is_array($AEmenu_mcatid) ? explode(',', $AEmenu_mcatid) : '';

                    if ($AEmenu_mcatid && $AEmenu_lang == $AEevent->language) {
                        $nb_cat_filter = count($AEmenu_mcatid_array);

                        for ($i = $AEevent->catid; in_array($i, $AEmenu_mcatid_array); $i++) {
                            if ($nb_cat_filter == 1) {
                                $link_one = $AEmenu_id;
                            } elseif ($nb_cat_filter > 1) {
                                $link_multi = $AEmenu_id;
                            }
                        }
                    } else {
                        array_push($array_menus_cat_not_set, $AEmenu_id);
                    }
                }

                if ($link_one) {
                    $linkid = $link_one;
                } elseif ($link_multi) {
                    $linkid = $link_multi;
                } else {
                    $linkid = count($array_menus_cat_not_set) ? $array_menus_cat_not_set['0'] : null;
                }

                $event_slug = empty($AEevent->alias) ? $AEevent->eventID : $AEevent->eventID . ':' . $AEevent->alias;

                $AEevents[$key]->href = 'index.php?option=com_allevents&view=event&id=' . $event_slug . '&Itemid=' . $linkid;
            }
        }
        // If menu item Allevents list of events exists, returns events found.
        if ($nolink) {
            // Displays a warning that no menu item to the list of events is published.
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_PLG_SEARCH_ALERT_NO_COM_ALLEVENTS_MENUITEM'), 'warning');
        } else {
            // Return the search results in an array
            return $AEevents;
        }

        return null;
    }

    /**
     * PlgSearchAllevents::onContentSearchAreas()
     * Define a function to return an array of search areas.
     * Note the value of the array key is normally a language string     *
     *
     * @return array
     */
    function onContentSearchAreas()
    {
        $search_name = $this->params->get('search_name', JText::_('COM_ALLEVENTS_PLG_SEARCH_SECTION_EVENTS'));
        if ($search_name == 'COM_ALLEVENTS_PLG_SEARCH_SECTION_EVENTS')
            $search_name = 'Events';

        return ['allevents' => $search_name];
    }

    /**
     * PlgSearchAllevents::AElistMenuItemsInfo()
     * Function to return all published 'List of Events' menu items
     *
     * @access   public static
     * @return array of menu item info this way : Itemid-mcatid-lang
     * @throws Exception
     * @internal param $none $
     */
    static public function AElistMenuItemsInfo()
    {
        $app = JFactory::getApplication();
        // List all menu items linking to list of events
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('m.title, m.published, m.id, m.params, m.language')->from('`#__menu` AS m')->where("(link = 'index.php?option=com_allevents&view=events') AND (published = 1)");
        $db->setQuery($query);
        $link = $db->loadObjectList();

        $AE_list_menus = [];

        foreach ($link as $AElistMenu) {
            $menuitemid = $AElistMenu->id;
            $menulang = $AElistMenu->language;

            if ($menuitemid) {
                $menu = $app->getMenu();
                $menuparams = $menu->getParams($menuitemid);
                $mcatid = $menuparams->get('mcatid');
                if (is_array($mcatid)) {
                    $mcatid = implode(',', $mcatid);
                }

                array_push($AE_list_menus, $menuitemid . '-' . $mcatid . '-' . $menulang);
            }
        }

        return $AE_list_menus;
    }
}
