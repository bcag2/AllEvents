<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.modeladmin');
jimport('joomla.filter.output');
if (!class_exists('AllEventsHelperDate'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/date.php';

use Joomla\String\StringHelper;
use Joomla\Utilities\ArrayHelper;
use When\When;

JModelLegacy::addIncludePath(JPATH_BASE . '/components/com_allevents/models', 'AllEventsModel');

// €#€
if (!class_exists('AllEventsCustomfields'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aecustomfields.php';
require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/When.php');
require_once(JPATH_SITE . '/administrator/components/com_allevents/helpers/Valid.php');
// €#€

/**
 * AllEventsModelEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelEvent extends JModelAdmin
{
    /**
     * The type alias for this content type (for example, 'com_content.article').
     *
     * @var      string
     * @since    3.2
     */
    public $typeAlias = 'com_allevents.event';
    /**
     *
     * @var string The prefix to use with controller messages.
     * @since 1.6
     */
    protected $text_prefix = 'COM_ALLEVENTS';
    /**
     * Batch copy/move command. If set to false,
     * the batch copy/move command is not supported
     *
     * @var string
     */
    protected $batch_copymove = 'agenda_id';

    /**
     * Allowed batch commands
     *
     * @var array
     */
    protected $batch_commands = [
        'assetgroup_id' => 'batchAccess',
        'language_id' => 'batchLanguage',
        'tag' => 'batchTag'
    ];

    /**
     * AllEventsModelEvent::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.event', 'event', ['control' => 'jform', 'load_data' => $loadData]);
        if (empty($form)) {
            return false;
        }

        if ($form->getFieldAttribute('lastmod', 'default') == 'NOW') {
            $form->setFieldAttribute('lastmod', 'default', date('Y-m-d H:i:s'));
        }

        return $form;
    }

    /**
     * AllEventsModelEvent::hot()
     *
     * @param mixed $cid
     * @param mixed $hot
     *
     * @return bool
     * @throws Exception
     */
    public function hot($cid = [], $hot)
    {
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $cids = implode(',', $cid);
            $query = 'UPDATE #__allevents_events SET version=version+1, hot = ' . (int)$hot . ' WHERE id IN ( ' . $cids . ' )';
            $this->_db->setQuery($query);
            try {
                $this->_db->execute();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        return true;
    }

    /**
     * AllEventsModelEvent::approve()
     *
     * @param mixed $cid
     *
     * @return bool
     * @throws Exception
     */
    public function approve($cid = [])
    {
        $app = JFactory::getApplication();
        if (JFactory::getUser()->authorise('core.approve', 'com_allevents') !== true) {
            $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return false;
        }

        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $cids = implode(',', $cid);
            $query = 'UPDATE `#__allevents_events` SET proposal = 0 WHERE id IN ( ' . $cids . ' )';
            try {
                $this->_db->setQuery($query);
                $this->_db->execute();
            } catch (Exception $e) {
                $app->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        return true;
    }

    /**
     * AllEventsModelEvent::enrolment()
     *
     * @param mixed $cid
     * @param mixed $value
     *
     * @return bool
     * @throws Exception
     */
    public function enrolment($cid = [], $value)
    {
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $cids = implode(',', $cid);
            $query = 'UPDATE `#__allevents_events` SET version=version+1, enrolment_enabled = ' . (int)$value . ' WHERE id IN ( ' . $cids . ' )';
            $this->_db->setQuery($query);
            try {
                $this->_db->execute();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        return true;
    }

    /**
     * AllEventsModelEvent::validate()
     *
     * @param mixed $form
     * @param mixed $data
     * @param mixed $group
     *
     * @return mixed
     */
    public function validate($form, $data, $group = null)
    {
        $id = (!empty($data['id'])) ? $data['id'] : (int)$this->getState('event.id');
        $user = JFactory::getUser();
        $jdate = new JDate('', 'UTC');
        // si création
        if ($id == 0) {
            $data['proposed_by'] = !empty($data['proposed_by']) ? $data['proposed_by'] : $user->get('id');
            $data['created_by'] = $user->get('id');
            $data['created_date'] = $jdate->format('Y-m-d H:i:s');
            $data['version'] = 0;
            if (!isset($data['alias'])) {
                $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
            }
        }

        if (empty($data['alias'])) {
            $data['alias'] = JFilterOutput::stringURLSafe($data['titre']);
        }
        $data['lastmod_by'] = $user->get('id');
        $data['lastmod'] = $jdate->format('Y-m-d H:i:s');
        $data['version'] = $data['version'] + 1;
        $lang = JFactory::getLanguage();
        $curlang = $lang->getTag();
        $langs = JLanguageMultilang::isEnabled() ? AllEventsHelper::getInstalledLanguages() : [];
        foreach ($langs as $lg) {
            if ($lg->lang_code == $curlang) {
                $data['description' . $lg->postfix] = $data['description'];
            }
        }

        return parent::validate($form, $data, $group);
    }

    /**
     * AllEventsModelEvent::save()
     *
     * @param mixed $data
     *
     * @return bool
     * @throws Exception
     */
    public function save($data)
    {

        $data['date'] = trim($data['date']);
        $data['titre'] = trim($data['titre']);
        $isNew = (empty($data['date'])) ? true : false;

        if ((empty($data['date'])) || (empty($data['titre']))) {
            return false;
        }
        $params = AllEventsHelperParam::getGlobalParam();
        $db = $this->getDbo();

        if (empty($data['vignette'])) {
            $lvignette = null;
            $tab = new SplFixedArray(3);
            $tab[0] = ['`#__allevents_agenda`', 'agenda_id'];
            $tab[1] = ['`#__allevents_activities`', 'activity_id'];
            $tab[2] = ['`#__allevents_categories`', 'category_id'];

            $query = $db->getQuery(true);
            $query->select('vignette')->from($tab[$params['gdisplay_colors']][0])->where('id = ' . (int)$data[$tab[$params['gdisplay_colors']][1]]);
            $db->setQuery($query);
            $results = $db->loadObject();
            if ($results) {
                $lvignette = $results->vignette;
            }
            $data['vignette'] = $lvignette;
        }

        $data['openingdate'] = (empty($data['openingdate'])) ? date("Y-m-d H:i:s") : $data['openingdate'];
        $data['closingdate'] = (empty($data['closingdate'])) ? $data['date'] : $data['closingdate'];

        // Set File Uploaded
        $jinput = JFactory::getApplication()->input;
        $files = $jinput->files->get('jform');
        if (!empty($files['fichier_annexe'])) {
            $data['fichier_annexe'] = $this->upload($files['fichier_annexe']);
        } else {
            $data['fichier_annexe'] = "";
        }

        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('allevents');
        $dispatcher->trigger('onBeforeAlleventsEventSave', [&$data, $isNew]);

        //$ok = true ;
        $table = $this->getTable();
        $table_serie = $this->getTable('serie');
        if (empty($data['rrule'])) {
            if ($table->save($data) === true) {
                if (isset($table->id)) {
                    $this->setState($this->getName() . '.id', $table->id);
                }

                // Save Custom Fields to database
                if (isset($data['custom_fields']) && is_array($data['custom_fields'])) {
                    AllEventsCustomfields::saveToData($data['custom_fields'], 'event', $table->id);
                }

                // on vient compléter les données avec les plugins AllEvents (Développements spécifiques)
                // $dispatcher = JEventDispatcher::getInstance();
                // JPluginHelper::importPlugin('allevents');
                $dispatcher->trigger('onAfterAlleventsEventSave', [&$data, $isNew, $table->id]);

                return ($table->id);
            } else {
                return false;
            }
        } else {
            // ##€
            $rdate = new When();
            $ldate = DateTime::createFromFormat('Y-m-d H:i:s', $data['date'])->format('Ymd\THis');
            $rdate->startDate(new DateTime($ldate))->rrule($data['rrule'])->generateOccurrences();

            $rrule = preg_replace("/;DTSTART=.*;INTERVAL=/", ";INTERVAL=", $data['rrule']);

            $renddate = new When();
            $lenddate = DateTime::createFromFormat('Y-m-d H:i:s', $data['enddate'])->format('Ymd\THis');
            $renddate->startDate(new DateTime($lenddate))->rrule($rrule)->generateOccurrences();
            $renddates = $renddate->occurrences;

            //$ropeningdate = new When();
            //$lopeningdate = DateTime::createFromFormat('Y-m-d H:i:s', $data['openingdate'])->format('Ymd\THis');
            //$ropeningdate->startDate(new DateTime($lopeningdate))->rrule($rrule)->generateOccurrences();

            $rclosingdate = new When();
            $lclosingdate = DateTime::createFromFormat('Y-m-d H:i:s', $data['closingdate'])->format('Ymd\THis');
            $rclosingdate->startDate(new DateTime($lclosingdate))->rrule($rrule)->generateOccurrences();
            $rclosingdates = $rclosingdate->occurrences ;

            $alias = $data['alias'];
            $first = true;
            $i = 0;

            foreach ($rdate->occurrences as $occurence) {
                if (!$first) {
                    $data['alias'] = $alias . '_' . $occurence->format('U');
                }

                $data['date'] = $occurence->format('Y-m-d H:i');
                $data['enddate'] = $renddates[$i]->format('Y-m-d H:i');
                $data['openingdate'] = JFactory::getDbo()->getNullDate();
                $data['closingdate'] = $rclosingdates[$i]->format('Y-m-d H:i');
                $data['occurrence_number'] = $i;
                $table->save($data);
                if ($first) {
                    if (isset($table->id)) {
                        $this->setState($this->getName() . '.id', $table->id);
                    }

                    $idmaster = $table->id;
                    $data_serie['id'] = '';
                    $data_serie['event_id'] = $idmaster;
                    $data_serie['rrule'] = $data['rrule'];
                    $data_serie['startdate'] = $rdate->startDate->format('Y-m-d H:i');
                    $data_serie['freq'] = $rdate->freq;
                    $data_serie['until'] = $rdate->until->format('Y-m-d H:i');
                    $data_serie['count'] = $rdate->count;
                    $data_serie['interval'] = $rdate->interval;

                    $table_serie->save($data_serie);
                    $idserie = $table_serie->id;
                    $data['serie_id'] = $idserie;
                    $first = false;
                }

                $i++;

                // €€€
                // Save Custom Fields to database
                if (isset($data['custom_fields']) && is_array($data['custom_fields'])) {
                    AllEventsCustomfields::saveToData($data['custom_fields'], 'event', $table->id);
                }
                // €€€
            }

            return ($idmaster);
            // €##
        }

    }

    /**
     * AllEventsModelEvent::upload()
     *
     * AllEventsModelEvent::upload
     *
     * @param mixed $file
     *
     * @return string
     * @throws Exception
     * @sind 3.3.2
     */
    public function upload($file)
    {
        jimport('joomla.filesystem.file');
        jimport('joomla.filesystem.folder');
        $app = JFactory::getApplication();
        $filename = JFile::makeSafe($file['name']);
        if (!empty($filename)) {
            $src = $file['tmp_name'];
            $dest = JPATH_SITE . "/media/com_allevents/files/" . $filename;

            if (JFile::upload($src, $dest, false)) {
                $app->enqueueMessage(JText::_('COM_ALLEVENTS_UPLOAD_OK'));

                return "/media/com_allevents/files/" . $filename;
            }

            return "/media/com_allevents/files/" . $filename;
        }

        return null;
    }

    /**
     * AllEventsModelEvent::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Event', $prefix = 'AllEventsTable', $config = [])
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelEvent::duplicate()
     *
     * @param mixed $pks
     *
     * @return bool
     * @throws Exception
     */
    public function duplicate(&$pks)
    {
        $user = JFactory::getUser();
        //$db = $this->getDbo();
        $jdate = new JDate('', 'UTC');
        // Access checks.
        if (!$user->authorise('core.create', 'com_allevents')) {
            throw new Exception(JText::_('JERROR_CORE_CREATE_NOT_PERMITTED'));
        }

        $table = $this->getTable();

        foreach ($pks as $pk) {
            try {
                $table->reset();
                $table->load($pk, true);
                // Reset the id to create a new record.
                $table->id = 0;
                // Alter the titre.
                $m = null;
                if (preg_match('#\((\d+)\)$#', $table->titre, $m)) {
                    $table->titre = preg_replace('#\(\d+\)$#', '(' . ($m[1] + 1) . ')', $table->titre);
                }

                $data = $this->genereNouveauTitre($table->titre);
                $table->titre = $data[0];

                $table->created_by = $user->get('id');
                $table->created_date = $jdate->format('Y-m-d H:i:s');
                $table->alias = StringHelper::increment($table->titre, 'dash');
                $table->lastmod_by = $user->get('id');
                $table->lastmod = $jdate->format('Y-m-d H:i:s');
                $table->version = 1;

                $table->check();
                $table->store();
                // Checkin original & copy
                $table->checkIn($pk);
                $table->checkIn($table->id);

                $sql = ' INSERT INTO `#__allevents_enrolments` (`id`, `asset_id`, `event_id`,     `published`, `enroldate`, `user_id`, `access`, `deleted`, `pending`, `lastmod`, `reminder_date`, `section_id`, `points`, `enroltype`, `locked`, `proposed_by`, `lastmod_by`, `ordering`, `adminLock`, `checked_out`, `checked_out_time`, `created_by`, `companions`, `commentaire`)  SELECT 0, `asset_id`, ' . $table->id . ', 0, `enroldate`, `user_id`, `access`, `deleted`, `pending`, `lastmod`, `reminder_date`, `section_id`, `points`, `enroltype`, `locked`, `proposed_by`, `lastmod_by`, `ordering`, `adminLock`, `checked_out`, `checked_out_time`, `created_by`, 0, ""';
                $sql .= ' from `#__allevents_enrolments`';
                $sql .= ' where `event_id` = ' . $pk;
                $sql .= ' and `published` = 1';

                $db = $this->getDbo();
                $db->setQuery($sql);
                $db->execute();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }
        // Clear modules cache
        $this->cleanCache();

        return true;
    }

    /**
     * AllEventsModelEvent::genereNouveauTitre()
     *
     * @param   string $title The title.
     *
     * @return  array  Contains the modified title.
     * @since   3.2.25
     */
    protected function genereNouveauTitre($title)
    {
        $table = $this->getTable();
        while ($table->load(['titre' => $title])) {
            $title = StringHelper::increment($title);
        }

        return [$title];
    }

    /**
     * AllEventsModelEvent::getData()
     *
     * @param mixed $id
     *
     * @return bool|object
     * @throws Exception
     */
    public function &getData($id = null)
    {
        //$globalparams = JComponentHelper::getParams('com_allevents');
        //$db = $this->getDbo();
        $this->_item = false;
        if (empty($id)) {
            $id = $this->getState('event.id');
        }
        // Get a level row instance.
        $table = $this->getTable();
        $table->reset();
        // Attempt to load the row.
        try {
            $table->load($id);
            // Check published state.
            if ($published = $this->getState('filter.published')) {
                if ($table->state != $published) {
                    return $this->_item;
                }
            }
            $table->hits = $table->hits + 1;
            $table->store();
            // Convert the JTable to a clean JObject.
            $properties = $table->getProperties(1);
            $this->_item = ArrayHelper::toObject($properties, 'JObject');

        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

            return false;
        }

        return $this->_item;
    }

    /**
     * AllEventsModelEvent::samples()
     *
     * @return bool
     */
    public function samples()
    {
        $sqlorder[0][0] = "TRUNCATE `#__allevents_activities`;";
        $sqlorder[1][0] = "TRUNCATE `#__allevents_agenda`;";
        $sqlorder[2][0] = "TRUNCATE `#__allevents_albums`;";
        $sqlorder[3][0] = "TRUNCATE `#__allevents_categories`;";
        $sqlorder[4][0] = "TRUNCATE `#__allevents_countries`;";
        $sqlorder[5][0] = "TRUNCATE `#__allevents_enrolments`;";
        $sqlorder[6][0] = "TRUNCATE `#__allevents_events`;";
        $sqlorder[7][0] = "TRUNCATE `#__allevents_forms`;";
        $sqlorder[8][0] = "TRUNCATE `#__allevents_formsfields`;";
        $sqlorder[9][0] = "TRUNCATE `#__allevents_formsfieldstype`;";
        $sqlorder[10][0] = "TRUNCATE `#__allevents_gcalendar`;";
        $sqlorder[11][0] = "TRUNCATE `#__allevents_groups`;";
        $sqlorder[12][0] = "TRUNCATE `#__allevents_links`;";
        $sqlorder[13][0] = "TRUNCATE `#__allevents_pictures`;";
        $sqlorder[14][0] = "TRUNCATE `#__allevents_places`;";
        $sqlorder[15][0] = "TRUNCATE `#__allevents_public`;";
        $sqlorder[16][0] = "TRUNCATE `#__allevents_ressources`;";
        $sqlorder[17][0] = "TRUNCATE `#__allevents_sections`;";
        $sqlorder[18][0] = "TRUNCATE `#__allevents_settings`;";
        $sqlorder[19][0] = "TRUNCATE `#__allevents_users`;";
        $sqlorder[20][0] = "INSERT INTO `#__allevents_agenda` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `ordering`, `image_bullet`, `access`, `deleted`, `version`, `hits`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `template`, `vignette`, `contact_id`, `adminLock`, `metakey`, `metadesc`, `metarobots`, `modele`) VALUES(1, 'Accueil extra scolaire', 'accueil-extra-scolaire', '#de4863', '#ffffff', 1, '<p>L''accueil extra scolaire du village existe au sein du Réseau Coordination Enfance. Il travaille en convention avec la Commune et plus particulièrement avec l''Echevin de l''Enfance.</p>\r\n<p>Chaque samedi matin de l''année, des activités pour enfants entre <strong>2,5 ans et 12 ans</strong> sont proposés.</p>', '', 1, 'media/com_allevents/images/bullets/plus-shield.png', 1, 0, 3, 0, '2017-03-05 14:59:00', 42, '2017-03-06 10:53:14', 42, NULL, 'media/com_allevents/images/thumbnails/atl.png', NULL, 0, '', '', 'noindex, nofollow', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<h3 class=\"se_event_chapitre\">Inscription</h3>\r\n<p>Pour une meilleure organisation, nous vous demandons d''inscrire vos enfants <strong>via le site web</strong> ou <strong>par téléphone au plus tard le mercredi </strong>qui précède l''activité.</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>\r\n<p>&nbsp;</p>\r\n<p>Pour l''inscription ou pour tout renseignement complémentaire, n''hésitez pas à contacter Vicky ou Isabelle</p>\r\n');";
        $sqlorder[21][0] = "INSERT INTO `#__allevents_agenda` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `ordering`, `image_bullet`, `access`, `deleted`, `version`, `hits`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `template`, `vignette`, `contact_id`, `adminLock`, `metakey`, `metadesc`, `metarobots`, `modele`) VALUES(2, 'Les mains blanches', 'les-mains-blanches', '#fff27a', '#7a0b12', 1, '', '', 2, 'media/com_allevents/images/bullets/flower.png', 1, 0, 2, 0, '2017-03-05 15:10:00', 42, '2017-03-05 14:33:50', 42, 'yoo_cloud', 'media/com_allevents/images/thumbnails/mains_blanches.jpg', NULL, 0, '', '', 'noindex, nofollow', '');";
        $sqlorder[22][0] = "INSERT INTO `#__allevents_agenda` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `ordering`, `image_bullet`, `access`, `deleted`, `version`, `hits`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `template`, `vignette`, `contact_id`, `adminLock`, `metakey`, `metadesc`, `metarobots`, `modele`) VALUES(3, 'Le comité paroissial', 'le-comite-paroissial', '#b7dea6', '#422f07', 1, '<p>Le comité paroissial est celui qui anime la paroisse du village. Il aide à la gestion du culte. Par exemple, le repas annuel qu''il organise sert&nbsp; à embellir ou entretenir l''église (achat d''une crèche pour Noël, investissement dans l''achat de nouvelles chaises, achat d''un tapis pour les cérémonies, amélioration de la qualité acoustique ou de l''électricité, achat de matériel pour le catéchisme, achat d''un évier et d''un chauffe - eau pour la sacristie.....).</p>\r\n<p>Le comité paroissial organise différents évènements comme des repas ou des visites afin de récolter de l''argent pour l''entretien de l''église.</p>', '', 3, 'media/com_allevents/images/bullets/eglise.png', 1, 0, 4, 0, '2017-03-05 15:26:00', 42, '2017-03-05 15:29:19', 42, 'yoo_neo', 'media/com_allevents/images/thumbnails/eglise.jpg', NULL, 0, '', '', 'noindex, nofollow', '');";
        $sqlorder[23][0] = "INSERT INTO `#__allevents_agenda` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `ordering`, `image_bullet`, `access`, `deleted`, `version`, `hits`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `template`, `vignette`, `contact_id`, `adminLock`, `metakey`, `metadesc`, `metarobots`, `modele`) VALUES(4, 'Amicale locale du Télévie', 'amicale-locale-du-televie', '#ffffff', '#fc190b', 1, '<p>Le <a target=\"_blank\" title=\"Télévie @ wikipedia.org\" href=\"http://fr.wikipedia.org/wiki/T%C3%A9l%C3%A9vie\">Télévie</a>, organisé par la chaîne de télévision privée belge francophone RTL-TVI depuis 1989, est une émission caritative qui se bat contre la leucémie, et plus généralement contre toutes les formes de cancer.</p>\r\n<p>L''objectif de l''amicale est de récolter des fonds afin de les reverser ensuite à la recherche scientifique.</p>', '', 4, 'media/com_allevents/images/bullets/coeur.png', 1, 0, 3, 0, '2017-03-05 15:28:00', 42, '2017-03-05 15:34:23', 42, NULL, 'media/com_allevents/images/thumbnails/televie.gif', 42, 0, '', '', 'noindex, nofollow', '<p>xxxxxxxx</p>\r\n<p>souper le xxxxxx xx xxxx xxxxx à partir de xxhxx</p>\r\n<p>Livraison à domicile entre xxhxx et xxhxx.</p>\r\n<ul>\r\n<li>BOULETTES SAUCE TOMATE, FRITES, TARTE (adulte : 12 euros, enfant : 8 euros)</li>\r\n<li>BOULETTES SAUCE LIEGEOISE, FRITES, TARTE (adulte : 12 euros, enfant : 8 euros)</li>\r\n<li>AMERICAIN CRUDITES, FRITES, TARTE (adulte : 12 euros, enfant :8 euros)</li>\r\n<li>DES DE POULET A L’ANTILLAISE (ananas, poivrons, oignons), FRITES, TARTE (adulte : 14 euros, enfant : 8 euros)</li>\r\n</ul>\r\n<h4><strong>RESERVATION POUR LE XXXXXX</strong></h4>');";
        $sqlorder[24][0] = "INSERT INTO `#__allevents_agenda` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `ordering`, `image_bullet`, `access`, `deleted`, `version`, `hits`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `template`, `vignette`, `contact_id`, `adminLock`, `metakey`, `metadesc`, `metarobots`, `modele`) VALUES(5, 'Ecole du village', 'ecole-du-village', '#ffcc40', '#fa1b39', 1, '<p>A l’école de village, le projet d’établissement s’articule autour des réponses données aux trois questions que l’on est en droit de poser à tout enfant sortant après une journée bien remplie : Qu’as-tu appris ? T’es-tu bien amusé ? T’es-tu bien conduit ?</p>', '', 5, 'media/com_allevents/images/bullets/book.png', 1, 0, 2, 0, '2017-03-05 15:30:00', 42, '2017-03-05 15:31:55', 42, NULL, 'media/com_allevents/images/thumbnails/ecole.png', NULL, 0, '', '', 'noindex, nofollow', '');";
        $sqlorder[25][0] = "INSERT INTO `#__allevents_agenda` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `ordering`, `image_bullet`, `access`, `deleted`, `version`, `hits`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `template`, `vignette`, `contact_id`, `adminLock`, `metakey`, `metadesc`, `metarobots`, `modele`) VALUES(6, 'Les ateliers créatifs ', 'les-ateliers-creatifs', '#81f7be', '#0920ed', 1, '<p>Les ateliers créatifs se déroulent le dimanche matin des mois de Février à Avril.</p>\r\n<p>Les animatrices motivées invitent les enfants à faire des réalisations artistiques ( cuisine, peinture sur verre, Scrapbooking, feutrine...) plutôt que de simples bricolages.</p>', '', 6, 'media/com_allevents/images/bullets/cadeau.png', 1, 0, 3, 0, '2017-03-05 15:47:00', 42, '2017-03-05 15:30:51', 42, NULL, 'media/com_allevents/images/thumbnails/ateliers.png', NULL, 0, '', '', 'noindex, nofollow', '');";
        $sqlorder[26][0] = "INSERT INTO `#__allevents_agenda` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `ordering`, `image_bullet`, `access`, `deleted`, `version`, `hits`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `template`, `vignette`, `contact_id`, `adminLock`, `metakey`, `metadesc`, `metarobots`, `modele`) VALUES(7, 'Le centre culturel', 'centre-culturel', '#c6ff7a', '#1c9e6f', 1, '<p>Un Centre d’éducation permanente dont l’objectif est d’animer le village par la création d’activités visant à la promotion individuelle et collective. En un mot : visant à rendre un village vivant et dynamique en faveur de chacune et de chacun.</p>\r\n<p>L’Oasis est reconnu par la Communauté française comme Centre d’éducation permanente, par la Province de Liège et par la commune de Lincent comme Comité culturel.</p>\r\n<p>Depuis 1971, l’Oasis est à votre service.</p>', '', 7, 'media/com_allevents/images/bullets/centre_culturel.png', 1, 0, 1, 0, '2017-03-09 14:09:00', 42, '2017-03-09 13:15:30', 42, NULL, 'media/com_allevents/images/thumbnails/centre_culturel.png', 0, 0, '', '', 'noindex, nofollow', '');";
        $sqlorder[27][0] = "INSERT INTO `#__allevents_activities` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `access`, `deleted`, `image_bullet`, `ordering`, `default`, `agenda_id`, `vignette`, `created_date`, `lastmod`, `lastmod_by`, `proposed_by`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(1, 'Bricolage', 'bricolage', '#FFFFFF', '#000000', 1, '<p>Le bricolage regroupe les occupations exercées hors du cadre professionnel en tant qu''amateur et liées à la création, l''amélioration, la réparation et l''entretien de toutes choses matérielles.</p>\r\n<p>On dit d''une personne habile de ses mains qu''il est un « bon bricoleur ». À l''inverse, l''expression « bricoleur du dimanche » est plus péjorative. On évoque aussi un « système D » pour une réalisation particulièrement ingénieuse. (source <a target=\"_blank\" title=\"Bricolage @ wikipedia.org\" href=\"http://fr.wikipedia.org/wiki/Bricolage\">wikipedia</a>)</p>', '', 1, 0, 'media/com_allevents/images/bullets/bricolage.png', 1, 0, 6, 'media/com_allevents/images/thumbnails/bricolage.png', '2017-03-06 13:12:00', '2017-03-06 12:17:28', 42, 42, 0, 1, 0, '', '', 'noindex, nofollow');";
        $sqlorder[28][0] = "INSERT INTO `#__allevents_activities` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `access`, `deleted`, `image_bullet`, `ordering`, `default`, `agenda_id`, `vignette`, `created_date`, `lastmod`, `lastmod_by`, `proposed_by`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(2, 'Peinture', 'peinture', '#FFFFFF', '#000000', 1, '<p>Les peintres et leurs tableaux font partie du patrimoine culturel, dès le plus jeune âge les enfants peuvent être sensibilisés à l''art de la peinture. Les fiches d''activité de Tête à modeler proposent aux enfants des activités de peinture à la manière des grands peintres classiques ou contemporains. Pour réaliser un tableau à la manière d''un grand peintre il suffit de cliquer sur les visuels pour voir les fiches explicatives illustrées de visuels (source <a target=\"_blank\" title=\"Tête à modeler @ teteamodeler.com\" href=\"http://www.teteamodeler.com/dossier/peinture.asp\">tête à modeler</a>).</p>', '', 1, 0, 'media/com_allevents/images/bullets/pinceau.png', 2, 0, 6, 'media/com_allevents/images/thumbnails/peinture.png', '2017-03-06 13:17:00', '2017-03-06 12:23:59', 42, 42, 0, 1, 0, '', '', 'noindex, nofollow');";
        $sqlorder[29][0] = "INSERT INTO `#__allevents_activities` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `access`, `deleted`, `image_bullet`, `ordering`, `default`, `agenda_id`, `vignette`, `created_date`, `lastmod`, `lastmod_by`, `proposed_by`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(3, 'Cuisine', 'cuisine', '#FFFFFF', '#000000', 1, '<p>Les enfants vont apprendre à faire la cuisine, à cuisiner des lègumes, à faire de la patisserie.</p>', '', 1, 0, 'media/com_allevents/images/bullets/gateau.png', 1, 0, NULL, 'media/com_allevents/images/thumbnails/cuisine.png', '2017-03-08 06:03:00', '2017-03-08 05:09:50', 42, 42, 0, 1, 0, '', '', 'noindex, nofollow');";
        $sqlorder[30][0] = "INSERT INTO `#__allevents_categories` (`id`, `section_id`, `titre`, `alias`, `couleur`, `couleur_texte`, `ordering`, `access`, `deleted`, `description`, `intro`, `published`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `default`, `vignette`, `image_bullet`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(1, 1, 'Bienfaisance', 'bienfaisance', '#FFFFFF', '#000000', 1, 1, 0, '<p>Souper dont l''objectif est de récolter des fonds pour une bonne oeuvre</p>', '', 1, '2017-03-06 16:02:00', 42, '2017-03-06 15:12:07', 42, 0, 'media/com_allevents/images/thumbnails/coeur.png', 'media/com_allevents/images/bullets/coeur.png', 0, 2, 0, '', '', 'noindex, nofollow');";
        $sqlorder[31][0] = "INSERT INTO `#__allevents_public` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `published`, `description`, `intro`, `access`, `deleted`, `ordering`, `default`, `image_bullet`, `agenda_id`, `vignette`, `created_date`, `lastmod`, `lastmod_by`, `proposed_by`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(1, 'Enfants', 'enfants', '#FFFFFF', '#000000', 1, '<p>Un enfant est un être humain dans sa période de développement située entre la naissance et la puberté (ce qui inclut le nouveau-né, le nourrisson, le jeune enfant…).</p>\r\n<p>Enfant est également une désignation relative à la filiation, généalogique ou symbolique.</p>\r\n<p>L''enfant figure aussi un état, opposable à l''état parent, et préliminaire à l''état adulte (source <a target=\"_blank\" title=\"Enfant @ wikipedia.org\" href=\"http://fr.wikipedia.org/wiki/Enfant\">wikipedia</a>)</p>', '', 1, 0, 1, 0, 'media/com_allevents/images/bullets/poussin.png', 1, 'media/com_allevents/images/thumbnails/enfants.png', '2017-03-05 15:46:00', '2017-03-06 14:34:50', 42, 42, 0, 2, 0, '', '', 'noindex, nofollow');";
        $sqlorder[32][0] = "INSERT INTO `#__allevents_sections` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `access`, `deleted`, `description`, `intro`, `ordering`, `published`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `default`, `agenda_id`, `vignette`, `image_bullet`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(1, 'Souper', 'souper', '#FFFFFF', '#000000', 1, 0, '<p>Soupers entre amis, entre personnes partageant un même objectif, une même passion.&nbsp;&nbsp; Les soupers sont souvent l''occasion de récolter de l''argent pour une bonne cause comme participer aux frais de l''école, à la réfection de l''église, à faire un don pour une bonne oeuvre.</p>', '', 1, 1, '2017-03-06 15:53:00', 42, '2017-03-06 15:15:05', 42, 0, NULL, 'media/com_allevents/images/thumbnails/souper.jpg', 'media/com_allevents/images/bullets/fourchette.png', 0, 3, 0, '', '', 'noindex, nofollow');";
        $sqlorder[33][0] = "INSERT INTO `#__allevents_places` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `description`, `intro`, `map_id`, `map_url`, `rue`, `numero`, `ville`, `codepostal`, `pays`, `published`, `access`, `deleted`, `default`, `image_bullet`, `vignette`, `ordering`, `agenda_id`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `showmap`, `zoom`, `kmlfile`, `latitude`, `longitude`, `maptype`, `phone`, `fax`, `email`, `website`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(1, 'La Pellainoise', 'la-pellainoise', '#FFFFFF', '#000000', '', '', 0, '', 'rue des Alliés', '', 'Pellaines', '4287', 1, 1, 1, 0, 0, 'media/com_allevents/images/bullets/map.png', 'media/com_allevents/images/thumbnails/salle_pellainoise.png', 1, NULL, '2017-03-06', 42, '2017-03-06 09:35:37', 42, 1, 18, '', '50.72598015073311', '5.007544755935669', 1, '', '', '', '', 0, 2, 0, '', '', 'noindex, nofollow');";
        $sqlorder[34][0] = "INSERT INTO `#__allevents_places` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `description`, `intro`, `map_id`, `map_url`, `rue`, `numero`, `ville`, `codepostal`, `pays`, `published`, `access`, `deleted`, `default`, `image_bullet`, `vignette`, `ordering`, `agenda_id`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `showmap`, `zoom`, `kmlfile`, `latitude`, `longitude`, `maptype`, `phone`, `fax`, `email`, `website`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(2, 'Ecole communale', 'ecole-communale', '#FFFFFF', '#000000', '', '', 0, '', 'rue de Landen', '85', 'Racour', '4287', 1, 1, 1, 0, 0, 'media/com_allevents/images/bullets/map.png', 'media/com_allevents/images/thumbnails/ecole.png', 1, NULL, '2017-03-06', 42, '2017-03-06 09:22:32', 42, 1, 18, '', '50.74086853023286', '5.033669471740723', 1, '', '', '', '', 0, 1, 0, '', '', 'noindex, nofollow');";
        $sqlorder[35][0] = "INSERT INTO `#__allevents_places` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `description`, `intro`, `map_id`, `map_url`, `rue`, `numero`, `ville`, `codepostal`, `pays`, `published`, `access`, `deleted`, `default`, `image_bullet`, `vignette`, `ordering`, `agenda_id`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `showmap`, `zoom`, `kmlfile`, `latitude`, `longitude`, `maptype`, `phone`, `fax`, `email`, `website`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(3, 'Salle communale', 'salle-communale', '#FFFFFF', '#000000', '', '', 0, '', 'Place St Christophe', '1', 'Racour', '4287', 1, 1, 1, 0, 0, 'media/com_allevents/images/bullets/maison.png', 'media/com_allevents/images/thumbnails/salle_communale.png', 1, NULL, '2017-03-06', 42, '2017-03-06 09:27:57', 42, 1, 18, '', '50.73848534954982', '5.029444992542267', 1, '', '', '', '', 0, 1, 0, '', '', 'noindex, nofollow');";
        $sqlorder[36][0] = "INSERT INTO `#__allevents_places` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `description`, `intro`, `map_id`, `map_url`, `rue`, `numero`, `ville`, `codepostal`, `pays`, `published`, `access`, `deleted`, `default`, `image_bullet`, `vignette`, `ordering`, `agenda_id`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `showmap`, `zoom`, `kmlfile`, `latitude`, `longitude`, `maptype`, `phone`, `fax`, `email`, `website`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(4, 'Eglise', 'eglise', '#FFFFFF', '#000000', '', '', 0, '', 'Place St Sépulcre', '1-6', 'Racour', '4287', 1, 1, 1, 0, 0, 'media/com_allevents/images/bullets/eglise.png', 'media/com_allevents/images/thumbnails/eglise.jpg', 1, NULL, '2017-03-06', 42, '2017-03-06 09:40:10', 42, 1, 18, '', '50.73869', '5.029628', 1, '', '', '', '', 0, 1, 0, '', '', 'noindex, nofollow');";
        $sqlorder[37][0] = "INSERT INTO `#__allevents_places` (`id`, `titre`, `alias`, `couleur`, `couleur_texte`, `description`, `intro`, `map_id`, `map_url`, `rue`, `numero`, `ville`, `codepostal`, `pays`, `published`, `access`, `deleted`, `default`, `image_bullet`, `vignette`, `ordering`, `agenda_id`, `created_date`, `proposed_by`, `lastmod`, `lastmod_by`, `showmap`, `zoom`, `kmlfile`, `latitude`, `longitude`, `maptype`, `phone`, `fax`, `email`, `website`, `adminLock`, `version`, `hits`, `metakey`, `metadesc`, `metarobots`) VALUES(5, 'Herboristerie', 'herboristerie', '#FFFFFF', '#000000', '<p>Propriété de l''herboristerie. &nbsp; Lieu d''organisation du festival.</p>', '', 0, '', '', '', '', '', 1, 1, 1, 0, 0, 'media/com_allevents/images/bullets/fleur.png', 'media/com_allevents/images/thumbnails/festival.png', 1, NULL, '2017-03-09', 42, '2017-03-09 13:19:11', 42, 1, 16, '', '50.7396944', '5.0291339000000335', 0, '', '', '', '', 0, 1, 0, '', '', 'noindex, nofollow');";
        $sqlorder[38][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(1, 'Souper Télévie', 'souper-televie', '<p>C’est avec la plus grande joie que le Comité Télévie de l’Entité vous invite à participer au dîner qu’il organise au profit du Télévie. Nous vous attendons nombreux le Dimanche 11 mars 2012 à partir de 12h00</p>\r\n<p>Livraison à domicile entre 11h30 et 13h00.</p>\r\n<ul></ul>\r\n<p>Menu adulte : 14 euros<br />Menu enfant : 8 euros</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>SAUMON AUX PETITS LEGUMES, CROQUETTES, DESSERT</li>\r\n<li>ROTI SAUCE CHAMPIGNONS, CROQUETTES, DESSERT</li>\r\n<li>ROTI SAUCE PROVENCALE, CROQUETTES, DESSERT</li>\r\n</ul>\r\n<ul></ul>\r\n<h4><strong>RESERVATION POUR LE 7 mars 2012</strong></h4>', '', NULL, NULL, '2017-03-11 11:00:00', '2017-03-11 11:00:00', 'media/com_allevents/images/thumbnails/televie.gif', '', 1, 1, 0, 0, 0, 42, 4, '2017-03-06 15:22:08', 1, 0, 0, NULL, NULL, 42, '2017-03-05 15:52:00', 3, 1, 1, NULL, 1, 0, NULL, 0, 1, 0, '2017-03-11 11:00:00', '2017-03-05 14:53:00', '0000-00-00 00:00:00', 1, 0, 10, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[39][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(2, 'Souper Télévie', 'souper-televie-10', '<p>Nous proposons différents menus</p>\r\n<ul>\r\n<li>Adulte : 14€</li>\r\n<li>Enfant : 8€</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>SAUMON AUX PETITS LEGUMES, CROQUETTES, DESSERT<br />ROTI SAUCE CHAMPIGNONS, CROQUETTES, DESSERT<br />ROTI SAUCE PROVENCALE, CROQUETTES, DESSERT</p>\r\n<p>&nbsp;</p>\r\n<p><strong>RESERVATION POUR LE 9 MARS 2011</strong></p>', '<p>C’est avec la plus grande joie que le Comité Télévie de l’Entité vous invite à participer au diner qu’il organise au profit du Télévie. Nous vous attendons nombreux le Dimanche 13 mars 2011 à partir de 12h00.</p>\r\n<p>Livraison à domicile entre 11h30 et 13h00</p>', NULL, NULL, '2016-03-13 11:00:00', '2016-03-13 11:00:00', 'media/com_allevents/images/thumbnails/televie.gif', '', 1, 1, 0, 0, 0, 42, 4, '2017-03-06 15:21:02', 1, 0, 0, NULL, NULL, 42, '2017-03-05 16:20:00', 3, 1, 1, NULL, 3, 0, NULL, 0, 1, 0, '2016-03-13 11:00:00', '2017-03-05 15:21:00', '0000-00-00 00:00:00', 1, 0, 9, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[30][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(3, 'Journée des églises ouvertes', 'journee-des-eglises-ouvertes', '<p>La journée des Églises Ouvertes permet à tous et toutes de visiter des lieux chargés d''histoire sous un œil différent...en Wallonie et Bruxelles, le 03/06</p>\r\n<p>C''est un jour de fête pour tous les édifices religieux en Belgique !</p>\r\n<p>Un évènement culturel et festif car vous pourrez, selon les lieux, assister à :</p>\r\n<ul>\r\n<li>Un concert,</li>\r\n<li>Une visite guidée,</li>\r\n<li>Un circuit,</li>\r\n<li>Des conférences,</li>\r\n<li>Des exposition,</li>\r\n<li>...</li>\r\n</ul>\r\n<p>Bref, tout ce qui contribue à la mise en valeur du patrimoine religieux.</p>', '', NULL, NULL, '2017-06-02 22:00:00', '2017-06-04 22:00:00', 'media/com_allevents/images/thumbnails/eglise.jpg', 'media/com_allevents/images/affiches/journee-des-eglises-ouvertes.png', 1, 1, 0, 0, 0, 42, 3, '2017-03-06 16:03:48', 1, 0, 3, NULL, NULL, 42, '2017-03-05 16:21:00', 3, NULL, NULL, NULL, 4, 0, NULL, 0, 1, 1, '2017-06-02 22:00:00', '2017-03-05 15:23:00', '0000-00-00 00:00:00', 1, 0, 5, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[41][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(4, '20ème diner - Eglise Saint-Christophe', '20eme-diner-eglise-saint-christophe', '<p>Les membres du comité paroissial vous invitent à vous rassembler dans la joie, autour de Monsieur le Curé Bruno VILLERS, lors du 20ème dîner organisé au profit de l’entretien de l’église, le <strong>dimanche 16 octobre 2012 à partir de 11h30</strong>, en la salle communale du village.<br /><br />Nous espérons que vous serez des nôtres et que vous inviterez vos amis pour passer ensemble quelques heures dans la joie et la bonne humeur. Vous nous aideriez aussi dans l’organisation de ce repas en remettant le talon d’inscription ci-joint, <strong>avant le mercredi 12 octobre 2012</strong>, auprès de:<br /><br />Cette année encore, nous portons à domicile, uniquement pour les personnes qui ont des difficultés à se déplacer.<br /><br />Si vous ne pouvez pas être présents à ce dîner, vos dons peuvent aussi être versés au compte n° 999-9999999-99 de « Caisse paroissiale du village » avec la mention: « entretien de l''Eglise ».</p>', '', NULL, NULL, '2017-10-16 09:30:00', '2017-10-16 16:00:00', 'media/com_allevents/images/thumbnails/eglise.jpg', '', 1, 1, 0, 0, 0, 42, 3, '2017-03-09 16:43:23', 1, 0, 53, NULL, NULL, 42, '2017-03-05 16:25:00', 6, 1, 1, NULL, 2, 0, NULL, 0, 2, 0, '2017-10-16 09:30:00', '2017-03-05 15:26:00', '0000-00-00 00:00:00', 1, 0, 10, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[42][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(5, 'Souper Télévie', 'souper-televie-46', '<p>C’est avec la plus grande joie que le Comité Télévie de l’Entité vous invite à participer au souper qu’il organise au profit du Télévie. Nous vous attendons nombreux le Samedi 9 Octobre 2010 à partir de 18h30.</p>\r\n<p>Livraison à domicile entre 18h00 et 19h30.</p>\r\n<ul>\r\n<li>APERO, BOULETTES SAUCE TOMATE, GATEAU DES 10 ANS (adulte : 12 euros, enfant : 8 euros)</li>\r\n<li>APERO, BOULETTES SAUCE LIEGEOISE, GATEAU DES 10 ANS (adulte : 12 euros, enfant : 8 euros)</li>\r\n<li>APERO, AMERICAIN CRUDITES, GATEAU DES 10 ANS (adulte : 12 euros, enfant :8 euros)</li>\r\n<li>APERO, DES DE POULET A L’ANTILLAISE (ananas, poivrons, oignons), GATEAU DES 10 ANS (adulte : 14 euros, enfant : 8 euros)</li>\r\n</ul>\r\n<p><br /><strong>RESERVATION POUR LE 6 OCTOBRE 2010</strong></p>', '', NULL, NULL, '2010-10-09 16:30:00', '2010-10-09 21:30:00', 'media/com_allevents/images/thumbnails/televie.gif', '', 1, 1, 0, 0, 0, 42, 4, '2017-03-06 15:20:20', 1, 0, 0, NULL, NULL, 42, '2017-03-06 10:41:00', 2, 1, 1, NULL, 1, 0, NULL, 0, 1, 0, '2010-10-09 16:30:00', '2017-03-06 09:43:00', '0000-00-00 00:00:00', 1, 0, 8, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[43][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(6, 'Souper Télévie', 'souper-televie-81', '<p>Nous souhaitons avant tout vous remercier de votre présence toujours plus nombreuse à nos activités. <strong>Grâce à votre générosité, la somme de 97.500 euros a été offerte au Télévie au cours des 10 années écoulées. </strong></p>\r\n<p>Pour continuer ensemble cette belle aventure, nous espérons vous rencontrer lors de notre souper le samedi 8 octobre 2011 à partir de 18h30.<br />Livraison à domicile entre 18h00 et 19h30.</p>\r\n<ul>\r\n<li>BOULETTES SAUCE TOMATE, FRITES, TARTE (adulte : 12 euros, enfant : 8 euros)</li>\r\n<li>BOULETTES SAUCE LIEGEOISE, FRITES, TARTE (adulte : 12 euros, enfant : 8 euros)</li>\r\n<li>AMERICAIN CRUDITES, FRITES, TARTE (adulte : 12 euros, enfant :8 euros)</li>\r\n<li>DES DE POULET A L’ANTILLAISE (ananas, poivrons, oignons), FRITES, TARTE (adulte : 14 euros, enfant : 8 euros)</li>\r\n</ul>\r\n<p><strong><br /></strong></p>\r\n<p><strong>RESERVATION POUR LE 5 OCTOBRE 2011</strong></p>', '', NULL, NULL, '2016-10-08 16:30:00', '2016-10-08 21:30:00', 'media/com_allevents/images/thumbnails/televie.gif', '', 1, 1, 0, 0, 0, 42, 4, '2017-03-06 15:19:57', 1, 0, 0, NULL, NULL, 42, '2017-03-06 10:43:00', 2, 1, 1, NULL, 3, 0, NULL, 0, 1, 0, '2016-10-08 16:30:00', '2017-03-06 09:44:00', '0000-00-00 00:00:00', 1, 0, 7, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[44][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(7, 'Activité artistique et créative', 'activite-artistique-et-creative', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<p>&nbsp;</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>', '<p class=\"se_event_chapitre\">C''est le printemps !&nbsp; Les enfants vont faire un montage floral.</p>', 1, 1, '2017-03-24 08:00:00', '2017-03-24 11:00:00', 'media/com_allevents/images/thumbnails/atl.png', '', 1, 1, 0, 0, 0, 42, 1, '2017-03-06 14:47:02', 1, 0, 0, NULL, NULL, 42, '2017-03-06 10:45:00', 2, NULL, NULL, NULL, 2, 0, NULL, 0, 1, 0, '2017-03-24 08:00:00', '2017-03-06 09:46:00', NULL, 1, 0, 12, '', '', '', '', 'noindex, nofollow', NULL, 0, 1);";
        $sqlorder[45][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(8, 'Activité culinaire', 'activite-culinaire', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<p>&nbsp;</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>', '<p class=\"se_event_chapitre\">C''est la Chandeleur!&nbsp; Préparons et dégustons de bonnes crêpes!</p>', 1, NULL, '2017-02-04 08:00:00', '2017-02-04 11:00:00', '', '', 1, 1, 0, 0, 0, 42, 1, '2017-03-06 10:06:40', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:05:00', 1, NULL, NULL, NULL, 2, 0, NULL, 0, 1, 0, '2017-02-04 08:00:00', '2017-03-06 10:06:40', '0000-00-00 00:00:00', 1, 0, 2, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[46][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(9, 'Saint Valentin', 'saint-valentin', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<p>&nbsp;</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>', '<p class=\"se_event_chapitre\">Le 14 février, c''est la fête des amoureux!&nbsp; Pour cette occasion, fabriquons un joli cadeau à offrir à quelqu''un que l''on aime.</p>', 1, 1, '2017-02-11 08:00:00', '2017-02-11 11:00:00', 'media/com_allevents/images/thumbnails/atl.png', '', 1, 1, 0, 0, 0, 42, 1, '2017-03-06 14:46:45', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:06:00', 2, NULL, NULL, NULL, 2, 0, NULL, 0, 1, 0, '2017-02-11 08:00:00', '2017-03-06 10:08:00', '0000-00-00 00:00:00', 1, 0, 11, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[47][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(10, 'Carnaval', 'carnaval', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<p>&nbsp;</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>', '<p class=\"se_event_chapitre\">Les enfants sont invités à venir déguisés car ce matin nous organisons une grande fête de carnaval!</p>', 1, NULL, '2017-02-18 08:00:00', '2017-02-18 11:00:00', '', '', 1, 1, 0, 0, 0, 42, 1, '2017-03-06 10:09:32', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:08:00', 1, NULL, NULL, NULL, 2, 0, NULL, 0, 1, 0, '2017-02-18 08:00:00', '2017-03-06 10:09:32', '0000-00-00 00:00:00', 1, 0, 4, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[48][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(11, 'Sortie à Pretland', 'sortie-a-pretland', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<p>&nbsp;</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>', '<p class=\"se_event_chapitre\">Pretland est un grand jardin d''enfants couvert situé à Linter. Une matinée de rires et découvertes attends les enfants !</p>\r\n<p class=\"se_event_chapitre\"><strong>Départ : 9h15 - Retour : 13h00</strong></p>', 1, NULL, '2017-03-03 08:00:00', '2017-03-03 12:00:00', '', '', 1, 1, 0, 0, 0, 42, 1, '2017-03-06 10:11:30', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:09:00', 1, NULL, NULL, NULL, 2, 0, NULL, 0, 1, 0, '2017-03-03 08:00:00', '2017-03-06 10:11:30', '0000-00-00 00:00:00', 1, 0, 5, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[49][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(12, 'Atelier culinaire', 'atelier-culinaire', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<p>&nbsp;</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>', '<p class=\"se_event_chapitre\">Ce matin, nous allons préparer une bonne soupe de saison.</p>', 1, 3, '2017-03-10 08:00:00', '2017-03-10 11:00:00', 'media/com_allevents/images/thumbnails/atl.png', '', 1, 1, 0, 0, 0, 42, 1, '2017-03-09 15:03:12', 1, 0, 3, NULL, NULL, 42, '2017-03-06 11:11:00', 2, NULL, NULL, NULL, 2, 0, NULL, 0, 1, 0, '2017-03-10 08:00:00', '2017-03-06 10:12:00', '0000-00-00 00:00:00', 1, 0, 14, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[50][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(13, 'Bricolons comme papa', 'bricolons-comme-papa', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<p>&nbsp;</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>', '<p class=\"se_event_chapitre\">Création d''une mangeoire pour oiseaux.</p>', 1, 1, '2017-03-17 08:00:00', '2017-03-17 11:00:00', 'media/com_allevents/images/thumbnails/atl.png', '', 1, 1, 0, 0, 0, 42, 1, '2017-03-06 14:51:55', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:12:00', 3, NULL, NULL, NULL, 2, 0, NULL, 0, 1, 0, '2017-03-17 08:00:00', '2017-03-06 10:13:00', '0000-00-00 00:00:00', 1, 0, 13, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[51][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(14, 'C''est le printemps !', 'cest-le-printemps', '<h3 class=\"se_event_chapitre\">Pour qui ?</h3>\r\n<p>Les activités sont destinées aux enfants de <strong>2,5 ans à 8 ans</strong>.</p>\r\n<h3 class=\"se_event_chapitre\">A quel prix ?</h3>\r\n<p>4€ par enfant (ou 10€ pour 3 enfants de la même famille).&nbsp; Un supplément de 3€ par enfant vous sera demandé lors des sorties.</p>\r\n<p>&nbsp;</p>\r\n<p>N''oubliez pas de prévoir une collation pour 10h00 !</p>', '<p class=\"se_event_chapitre\">C''est le printemps !&nbsp; Les enfants vont faire un montage floral.</p>', 1, 1, '2017-03-24 08:00:00', '2017-03-24 11:00:00', 'media/com_allevents/images/thumbnails/atl.png', '', 1, 1, 0, 0, 0, 42, 1, '2017-03-06 14:45:42', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:13:00', 2, NULL, NULL, NULL, 2, 0, NULL, 0, 1, 0, '2017-03-24 08:00:00', '2017-03-06 10:14:00', '0000-00-00 00:00:00', 1, 0, 9, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[52][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(15, 'Fête de Wallonie : messe en wallon', 'fete-de-wallonie-messe-en-wallon', '<p>Messe en wallon en l''église Saint-Christophe.</p>', '', NULL, NULL, '2017-09-16 06:00:00', '2017-09-16 07:30:00', '', '', 1, 1, 0, 0, 0, 42, 3, '2017-03-06 15:51:16', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:14:00', 1, NULL, NULL, NULL, 4, 0, NULL, 1, 1, 0, '2017-09-16 06:00:00', '2017-03-06 10:15:49', '0000-00-00 00:00:00', 1, 0, 6, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[53][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(16, 'Goûter aux crêpes et fête de la Saint – Nicolas', 'fete-de-la-saint-nicolas', '<p><img style=\"margin-right: 10px; float: left;\" title=\"Saint-Nicolas approche à grand pas.......\" alt=\"saint_nicolas\" src=\"images/demo/saint-nicolas.png\" height=\"227\" width=\"168\" />Visite du grand Saint à l''Oasis ce 25 Novembre dès 13h00.</p>\r\n<p>Les enfants donneront un spectacle spécialement à son intention suivi d''une remise de cadeau à chaque enfants du village ayant moins de 12 ans le jour de la remise du cadeau.</p>\r\n<p>&nbsp;</p>', '', 1, NULL, '2017-11-25 12:00:00', '2017-11-25 17:00:00', 'media/com_allevents/images/thumbnails/saint_nicolas.jpg', '', 1, 1, 0, 0, 0, 42, 6, '2017-03-16 07:37:02', 1, 0, 15, NULL, NULL, 42, '2017-03-06 11:15:00', 4, NULL, NULL, NULL, 3, 0, NULL, 1, 1, 0, '2017-11-25 12:00:00', '2017-03-06 10:21:00', NULL, 1, 0, 6, '', '', '', '', 'noindex, nofollow', NULL, 0, 1);";
        $sqlorder[54][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(17, 'Atelier pour les enfants', 'atelier-pour-les-enfants', '<p>Peinture sur verre</p>', '', 1, 2, '2017-03-18 09:00:00', '2017-03-18 10:30:00', 'media/com_allevents/images/thumbnails/ateliers.png', '', 1, 1, 0, 0, 0, 42, 6, '2017-03-08 05:01:44', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:26:00', 2, NULL, NULL, NULL, 3, 0, NULL, 0, 1, 0, '2017-03-18 09:00:00', '2017-03-06 10:27:00', '0000-00-00 00:00:00', 1, 0, 5, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";
        $sqlorder[55][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(18, 'Village de Racour', 'village-de-racour', '<p>Ramassage des détritus jetés dans la végétation et aux abords de notre beau village.</p>', '', NULL, NULL, '2017-01-08 09:00:00', '2017-01-08 11:00:00', 'media/com_allevents/images/thumbnails/mains_blanches.jpg', '', 1, 1, 0, 0, 0, 42, 2, '2017-03-09 09:51:49', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:28:00', 3, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, '2017-01-08 09:00:00', '2017-03-06 10:31:00', NULL, 1, 0, 8, '', '', '', '', 'noindex, nofollow', NULL, 0, 0);";
        $sqlorder[56][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(19, 'Village de Lincent', 'village-de-lincent', '<p>Ramassage des détritus jetés dans la végétation et aux abords de notre beau village.</p>', '', NULL, NULL, '2017-05-06 08:00:00', '2017-05-06 10:00:00', 'media/com_allevents/images/thumbnails/mains_blanches.jpg', '', 1, 1, 0, 0, 0, 42, 2, '2017-03-09 09:51:17', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:31:00', 2, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, '2017-05-06 08:00:00', '2017-03-06 10:32:00', '0000-00-00 00:00:00', 1, 0, 7, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 0);";
        $sqlorder[57][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(20, 'Village de Pellaines', 'village-de-pellaines', '<p>Ramassage des détritus jetés dans la végétation et aux abords de notre beau village.</p>', '', NULL, NULL, '2017-10-07 08:00:00', '2017-10-07 10:00:00', 'media/com_allevents/images/thumbnails/mains_blanches.jpg', '', 1, 1, 0, 0, 0, 42, 2, '2017-03-09 09:50:38', 1, 0, 0, NULL, NULL, 42, '2017-03-06 11:32:00', 3, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, '2017-10-07 08:00:00', '2017-03-06 10:34:00', '0000-00-00 00:00:00', 1, 0, 6, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 0);";
        $sqlorder[58][0] = "INSERT INTO `#__allevents_events` (`id`, `titre`, `alias`, `description`, `intro`, `public_id`, `activity_id`, `date`, `enddate`, `vignette`, `affiche`, `published`, `enrolment_enabled`, `enrolment_max_participant`, `contact_1_id`, `proposal`, `proposed_by`, `agenda_id`, `lastmod`, `access`, `deleted`, `hits`, `intern_album_id`, `extern_album_id`, `lastmod_by`, `created_date`, `version`, `section_id`, `category_id`, `ressource_id`, `place_id`, `allow_overbooking`, `contact_person`, `hot`, `form_id`, `contiguous_date`, `closingdate`, `openingdate`, `expirationdate`, `showincalendar`, `adminLock`, `ordering`, `additional_info`, `enrolment_info`, `metakey`, `metadesc`, `metarobots`, `publishingdate`, `cancelled`, `showreadmore`) VALUES(21, 'Festival international de peinture', 'festival-international-de-peinture', '<p>Comme chaque année, des artistes français, luxembourgeois et surtout québécois feront de cette animation une nouvelle rencontre des artistes et de leur public.</p>\r\n<p>Et l''on n''oubliera pas que le festival est jumelé avec le \"Rendez-vous des artistes de Saint-Léonard (Nouveau-Brunswick - Canada)\". Nos amis canadiens ne manquent jamais d''en faire mention officielle, comme l''atteste cette photo.</p>\r\n<p>Il sera organisé par le Centre d''animation culturelle et avec le concours de l''Amicale locale du télévie.</p>\r\n<p>Le Festival international ..à noter et renoter dans vos agendas. De l''art à consommer sans modération !</p>\r\n<h3 class=\"se_event_chapitre\">Video de présentation</h3>\r\n<p>{youtube}mYGqM8_yR0g{/youtube}</p>', '', NULL, NULL, '2016-05-27 16:00:00', '2016-05-29 18:00:00', 'media/com_allevents/images/thumbnails/centre_culturel.png', '', 1, 0, 0, 0, 0, 42, 7, '2017-03-09 14:58:01', 1, 0, 5, 1, NULL, 42, '2017-03-09 14:20:00', 2, NULL, NULL, NULL, 5, 0, NULL, 1, 1, 1, '2016-05-27 16:00:00', '2017-03-09 13:24:00', '0000-00-00 00:00:00', 1, 0, 2, '', '', '', '', 'noindex, nofollow', '0000-00-00 00:00:00', 0, 1);";

        $db = JFactory::getDbo();
        foreach ($sqlorder as $key => $value) {
            $db->setQuery($value[0]);
            $db->execute();
        }

        return (true);
    }

    /**
     * AllEventsModelEvent::getStatEnrolmentsHTML()
     *
     * @param mixed $id
     *
     * @return string
     */
    public function &getStatEnrolmentsHTML($id = null)
    {
        $db = JFactory::getDbo();
        if (empty($id)) {
            $id = $this->getState('event.id');
        }
        if (empty($id)) {
            $this->_statenrolmentshtml = null;

            return $this->_statenrolmentshtml;
        }


        $sql = 'SELECT e.enroltype, count(*) nb FROM `#__allevents_enrolments` AS e WHERE (event_id = ' . $id . ') AND (published = 1) GROUP BY e.enroltype';
        $sql .= ' union all select 9 enroltype, count(*) nb from `#__allevents_enrolments` AS e where (event_id = ' . $id . ') and (published = 1)';
        $sql .= ' union all select 10 enroltype, count(*) nb from `#__allevents_enrolments` AS e where (event_id = ' . $id . ') and (published = 0)';
        $db->setQuery($sql);
        $this->_statenrolments = $db->loadObjectList();

        $enrol_yes = '<td><span title="' . sprintf(JText::_('ENROL_NBRDEFINITIVE'), 0) . '" class="icon-enrol_yes"></span></td><td>0</td>';
        $enrol_no = '<td><span title="' . sprintf(JText::_('ENROL_NBRCANCELLED'), 0) . '" class="icon-enrol_no"></span></td><td>0</td>';
        $enrol_perhaps = '<td><span title="' . sprintf(JText::_('ENROL_NBRPERHAPS'), 0) . '" class="icon-enrol_perhaps"></span></td><td>0</td>';
        $enrol_total = '<td><span title="' . sprintf(JText::_('ENROLMENT_NO_LIMIT'), 0) . '" class="icon-enrol_total"></span></td><td>0</td>';
        $enrol_unpublished = '<td><span title="' . sprintf(JText::_('ENROL_NBRUNPUBLISHED'), 0) . '" class="icon-enrol_unpublished"></span></td><td>0</td>';

        foreach ($this->_statenrolments as $statenrolment) {
            if (($statenrolment->enroltype == 0) && ($statenrolment->nb <> 0)) {
                if (($statenrolment->nb <= $this->_item->enrolment_max_participant) || ($this->_item->enrolment_max_participant == 0)) {
                    $enrol_yes = '<td><span title="' . sprintf(JText::_('ENROL_NBRDEFINITIVE'), $statenrolment->nb) . '" class="icon-enrol_yes"></span></td><td>' . $statenrolment->nb . '</td>';
                } else {
                    $enrol_yes = '<td><span title="' . sprintf(JText::_('ENROL_NBRDEFINITIVE_WITH_SURBOOKING'), $this->_item->enrolment_max_participant, $statenrolment->nb - $this->_item->enrolment_max_participant) . '" class="icon-enrol_yes"></span></td><td>' . $statenrolment->nb . '</td>';
                }
            }
            if (($statenrolment->enroltype == 1) && ($statenrolment->nb <> 0)) {
                $enrol_no = '<td><span title="' . sprintf(JText::_('ENROL_NBRCANCELLED'), $statenrolment->nb) . '" class="icon-enrol_no"></span></td><td>' . $statenrolment->nb . '</td>';
            }
            if (($statenrolment->enroltype == 2) && ($statenrolment->nb <> 0)) {
                $enrol_perhaps = '<td><span title="' . sprintf(JText::_('ENROL_NBRPERHAPS'), $statenrolment->nb) . '" class="icon-enrol_perhaps"></span></td><td>' . $statenrolment->nb . '</td>';
            }
            if (($statenrolment->enroltype == 9) && ($statenrolment->nb <> 0)) {
                if ($this->_item->enrolment_max_participant == 0) {
                    $enrol_total = '<td><span title="' . sprintf(JText::_('ENROLMENT_NO_LIMIT'), $statenrolment->nb) . '" class="icon-enrol_total"></span></td><td><div style="background:#E4E4E4; color:#777; padding: 2px 5px; border-radius: 5px;">' . $statenrolment->nb . '&nbsp;/&nbsp;&infin;</div></td>';
                } else {
                    $enrol_total = '<td><span title="' . sprintf(JText::_('ENROLMENT_MAX_ALLOWED'), $this->_item->enrolment_max_participant) . '" class="icon-enrol_total"></span></td><td><div style="background:#E4E4E4; color:#777; padding: 2px 5px; border-radius: 5px;">' . $statenrolment->nb . '&nbsp;/&nbsp;' . $this->_item->enrolment_max_participant . '</div></td>';
                }
            }
            if (($statenrolment->enroltype == 10) && ($statenrolment->nb <> 0)) {
                $enrol_unpublished = '<td><span title="' . sprintf(JText::_('ENROL_NBRUNPUBLISHED'), $statenrolment->nb) . '" class="icon-enrol_unpublished"></span></td><td>' . $statenrolment->nb . '</td>';
            }
        }

        $this->_statenrolmentshtml = '<br/><br/>' . JText::_('ENROL_RECAPITULATIF') . '<table><tr>' . $enrol_total . $enrol_yes . $enrol_no . $enrol_perhaps . $enrol_unpublished . '</tr></table>';

        return $this->_statenrolmentshtml;
    }

    /**
     * AllEventsModelEvent::emailing()
     *
     * @param mixed $data
     * @param mixed $id
     * @param mixed $enrolment_max_participant
     *
     * @return bool
     * @throws Exception
     * @since   3.3.1
     */
    public function emailing($data, $id, $enrolment_max_participant)
    {
// TODO: ajouter le responsable de l'agenda
// TODO: ajouter le contact de l'agenda

        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));
        $app = JFactory::getApplication();
        // Set the model
        $model = JModelList::getInstance('Enrolments', 'AllEventsModel');

        $rowsYes = $model->getEnrolmentsYesByEvent($id, $enrolment_max_participant);
        $rowsNo = $model->getEnrolmentsNoByEvent($id);
        $rowsPerhaps = $model->getEnrolmentsPerhapsByEvent($id);
        $rowsPending = $model->getEnrolmentsPendingByEvent($id);
        $rowsWaiting = $model->getEnrolmentsWaitingByEvent($id, $enrolment_max_participant);

        $mode = array_key_exists('mode', $data) ? (int)$data['mode'] : 0;
        $subject = array_key_exists('subject', $data) ? $data['subject'] : '';
        $bcc = array_key_exists('bcc', $data) ? (int)$data['bcc'] : 0;
        $message_body = array_key_exists('message', $data) ? $data['message'] : '';
        $enrol_yes = array_key_exists('enrol_yes', $data) ? (int)$data['enrol_yes'] : 0;
        $enrol_no = array_key_exists('enrol_no', $data) ? (int)$data['enrol_no'] : 0;
        $enrol_perhaps = array_key_exists('enrol_perhaps', $data) ? (int)$data['enrol_perhaps'] : 0;
        $enrol_pending = array_key_exists('enrol_pending', $data) ? (int)$data['enrol_pending'] : 0;
        $enrol_waiting = array_key_exists('enrol_waiting', $data) ? (int)$data['enrol_waiting'] : 0;

        // Automatically removes html formatting
        if (!$mode) {
            $message_body = JFilterInput::getInstance()->clean($message_body, 'string');
        }

        // Check for a message body and subject
        if (!$message_body || !$subject) {
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_PLEASE_FILL_IN_THE_FORM_CORRECTLY'), 'error');

            return false;
        }

        if (!count($rowsYes) && !count($rowsNo) && !count($rowsPerhaps) && !count($rowsPending) && !count($rowsWaiting)) {
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_NO_USERS_COULD_BE_FOUND_IN_THIS_EVENT'), 'error');

            return false;
        }

        // Get the Mailer
        $mailer = JFactory::getMailer();
        $params = JComponentHelper::getParams('com_users');

        // Build email message format.
        $mailer->setSender([$app->get('mailfrom'), $app->get('fromname')]);
        $mailer->setSubject($params->get('mailSubjectPrefix') . stripslashes($subject));
        $mailer->setBody($message_body . $params->get('mailBodySuffix'));
        $mailer->isHtml($mode);

        // Add recipients
        if ($bcc) {
            if (($enrol_yes) && !empty($rowsYes)) $mailer->addBcc($rowsYes);
            if (($enrol_no) && !empty($rowsNo)) $mailer->addBcc($rowsNo);
            if (($enrol_perhaps) && !empty($rowsPerhaps)) $mailer->addBcc($rowsPerhaps);
            if (($enrol_pending) && !empty($rowsPending)) $mailer->addBcc($rowsPending);
            if (($enrol_waiting) && !empty($rowsWaiting)) $mailer->addBcc($rowsWaiting);
            $mailer->addRecipient($app->get('mailfrom'));
        } else {
            if (($enrol_yes) && !empty($rowsYes)) $mailer->addRecipient($rowsYes);
            if (($enrol_no) && !empty($rowsNo)) $mailer->addRecipient($rowsNo);
            if (($enrol_perhaps) && !empty($rowsPerhaps)) $mailer->addRecipient($rowsPerhaps);
            if (($enrol_pending) && !empty($rowsPending)) $mailer->addRecipient($rowsPending);
            if (($enrol_waiting) && !empty($rowsWaiting)) $mailer->addRecipient($rowsWaiting);
        }

        // Send the Mail
        $rs = $mailer->Send();

        // Check for an error
        if ($rs instanceof Exception) {
            $app->enqueueMessage($rs->getMessage(), 'error');

            return false;
        } elseif (empty($rs)) {
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_MAIL_THE_MAIL_COULD_NOT_BE_SENT'), 'error');

            return false;
        } else {
            $app->enqueueMessage(JText::plural('COM_ALLEVENTS_MAIL_EMAIL_SENT_TO_N_USERS', count($rowsYes) + count($rowsNo) + count($rowsPerhaps) + count($rowsPending) + count($rowsWaiting)), 'message');

            return true;
        }
    }

    /**
     * AllEventsModelEvent::batch()
     *
     * Method to perform batch operations on an item or a set of items.
     *
     * @param   array $commands An array of commands to perform.
     * @param   array $pks An array of item ids.
     * @param   array $contexts An array of item contexts.
     *
     * @return  boolean  Returns true on success, false on failure.
     *
     * @throws Exception
     * @since   12.2
     */
    public function batch($commands, $pks, $contexts)
    {
        // Sanitize ids.
        $pks = array_unique($pks);
        ArrayHelper::toInteger($pks);

        // Remove any values of zero.
        if (array_search(0, $pks, true)) {
            unset($pks[array_search(0, $pks, true)]);
        }

        if (empty($pks)) {
            JFactory::getApplication()->enqueueMessage(JText::_('JGLOBAL_NO_ITEM_SELECTED'), 'error');

            return false;
        }

        $done = false;

        // Set some needed variables.
        $this->user = JFactory::getUser();
        $this->table = $this->getTable();
        $this->tableClassName = get_class($this->table);
        $this->contentType = new JUcmType;
        $this->type = $this->contentType->getTypeByTable($this->tableClassName);
        $this->batchSet = true;

        if ($this->type == false) {
            $type = new JUcmType;
            $this->type = $type->getTypeByAlias($this->typeAlias);
        }

        $this->tagsObserver = $this->table->getObserverOfClass('JTableObserverTags');

        if ($this->batch_copymove && !empty($commands[$this->batch_copymove])) {
            $cmd = ArrayHelper::getValue($commands, 'move_copy', 'c');

            if ($cmd == 'c') {
                $result = $this->batchCopy($commands[$this->batch_copymove], $pks, $contexts);

                if (is_array($result)) {
                    foreach ($result as $old => $new) {
                        $contexts[$new] = $contexts[$old];
                    }
                    $pks = array_values($result);
                } else {
                    return false;
                }
            } elseif ($cmd == 'm' && !$this->batchMove($commands[$this->batch_copymove], $pks, $contexts)) {
                return false;
            }

            $done = true;
        }

        foreach ($this->batch_commands as $identifier => $command) {
            if (strlen($commands[$identifier]) > 0) {
                if (!$this->$command($commands[$identifier], $pks, $contexts)) {
                    return false;
                }

                $done = true;
            }
        }

        if (!$done) {
            JFactory::getApplication()->enqueueMessage(JText::_('JLIB_APPLICATION_ERROR_INSUFFICIENT_BATCH_INFORMATION'), 'error');

            return false;
        }

        // Clear the cache
        $this->cleanCache();

        return true;
    }

    /**
     * AllEventsModelEvent::batchCopy()
     *
     * Batch copy items to a new category or current.
     *
     * @param   integer $value The new category.
     * @param   array $pks An array of row IDs.
     * @param   array $contexts An array of item contexts.
     *
     * @return  mixed  An array of new IDs on success, boolean false on failure.
     *
     * @throws Exception
     * @since    3.3.6
     */
    protected function batchCopy($value, $pks, $contexts)
    {
        self::SetbatchSet();

        $agendaId = $value;

        if (!static::checkAgendaId($agendaId)) {
            return false;
        }

        $newIds = [];

        // Parent exists so let's proceed
        while (!empty($pks)) {
            try {
                // Pop the first ID off the stack
                $pk = array_shift($pks);

                $this->table->reset();

                // Check that the row actually exists
                $this->table->load($pk);

                static::generateTitle($agendaId, $this->table);

                // Reset the ID because we are making a copy
                $this->table->id = 0;

                // Unpublish because we are making a copy
                if (isset($this->table->published)) {
                    $this->table->published = 0;
                } elseif (isset($this->table->state)) {
                    $this->table->state = 0;
                }

                $this->table->agenda_id = $agendaId;

                // Check the row.
                $this->table->check();

                if (!empty($this->type)) {
                    $this->createTagsHelper($this->tagsObserver, $this->type, $pk, $this->typeAlias, $this->table);
                }

                // Store the row.
                $this->table->store();

                // Get the new item ID
                $newId = $this->table->get('id');

                // Add the new ID to the array
                $newIds[$pk] = $newId;
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        // Clean the cache
        $this->cleanCache();

        return $newIds;
    }

    private function SetbatchSet()
    {
        if (empty($this->batchSet)) {
            // Set some needed variables.
            $this->user = JFactory::getUser();
            $this->table = $this->getTable();
            $this->tableClassName = get_class($this->table);
            $this->contentType = new JUcmType;
            $this->type = $this->contentType->getTypeByTable($this->tableClassName);
        }
    }

    /**
     * AllEventsModelEvent::checkAgendaId()
     *
     * Method to check the validity of the agenda ID for batch copy and move
     *
     * @param   integer $agendaId The agenda ID to check
     *
     * @return  boolean
     *
     * @throws Exception
     * @since   3.3.6
     */
    protected function checkAgendaId($agendaId)
    {
        $app = JFactory::getApplication();
        // Check that the category exists
        if ($agendaId) {
            $agendaTable = JTable::getInstance($type = 'Agenda', $prefix = 'AllEventsTable', $config = []);

            if (!$agendaTable->load($agendaId)) {
                $app->enqueueMessage(JText::_('ALLEVENTS_ERROR_BATCH_MOVE_CATEGORY_NOT_FOUND'), 'error');

                return false;
            }
        }

        if (empty($agendaId)) {
            $app->enqueueMessage(JText::_('ALLEVENTS_ERROR_BATCH_MOVE_CATEGORY_NOT_FOUND'), 'error');

            return false;
        }

        // Check that the user has create permission for the component
        $extension = $app->input->get('option', '');

        if (!$this->user->authorise('core.create', $extension . '.agenda.' . $agendaId)) {
            $app->enqueueMessage(JText::_('ALLEVENTS_ERROR_BATCH_CANNOT_CREATE'), 'error');

            return false;
        }

        return true;
    }

    /**
     * AllEventsModelEvent::generateTitle()
     *
     * A method to preprocess generating a new title in order to allow tables with alternative names
     * for alias and title to use the batch move and copy methods
     *
     * @param   integer $agendaId The target agenda id
     * @param   JTable $table The JTable within which move or copy is taking place
     *
     * @return  void
     *
     * @since   3.3.6
     */
    public function generateTitle($agendaId, $table)
    {
        // Alter the title & alias
        $data = $this->generateNewTitle($agendaId, $table->alias, $table->title);
        $table->title = $data['0'];
        $table->alias = $data['1'];
    }

    /**
     * AllEventsModelEvent::generateNewTitle()
     *
     * Method to change the title & alias.
     *
     * @param   integer $agenda_id The id of the category.
     * @param   string $alias The alias.
     * @param   string $title The title.
     *
     * @return    array  Contains the modified title and alias.
     *
     * @since    3.3.6
     */
    protected function generateNewTitle($agenda_id, $alias, $title)
    {
        // Alter the title & alias
        $table = $this->getTable();

        while ($table->load(['alias' => $alias, 'catid' => $agenda_id])) {
            $title = StringHelper::increment($title);
            $alias = StringHelper::increment($alias, 'dash');
        }

        return [$title, $alias];
    }

    /**
     * AllEventsModelEvent::batchMove()
     *
     * Batch move items to a new category
     *
     * @param   integer $value The new category ID.
     * @param   array $pks An array of row IDs.
     * @param   array $contexts An array of item contexts.
     *
     * @return  boolean  True if successful, false otherwise and internal error is set.
     *
     * @throws Exception
     * @since    3.3.6
     */
    protected function batchMove($value, $pks, $contexts)
    {
        self::SetbatchSet();

        $agendaId = (int)$value;

        if (!static::checkAgendaId($agendaId)) {
            return false;
        }

        // Parent exists so we proceed
        foreach ($pks as $pk) {
            if (!$this->user->authorise('core.edit', $contexts[$pk])) {
                JFactory::getApplication()->enqueueMessage(JText::_('ALLEVENTS_ERROR_BATCH_CANNOT_EDIT'), 'error');

                return false;
            }
            try {
                // Check that the row actually exists
                $this->table->load($pk);

                // Set the new category ID
                $this->table->agenda_id = $agendaId;

                // Check the row.
                $this->table->check();

                if (!empty($this->type)) {
                    $this->createTagsHelper($this->tagsObserver, $this->type, $pk, $this->typeAlias, $this->table);
                }

                // Store the row.
                $this->table->store();
            } catch (Exception $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                return false;
            }
        }

        // Clean the cache
        $this->cleanCache();

        return true;
    }

    /**
     * AllEventsModelEvent::preprocessForm()
     *
     * @param JForm $form
     * @param array $data
     * @param string $group
     *
     * @throws Exception
     * @internal param bool $loadData
     */
    protected function preprocessForm(JForm $form, $data, $group = 'user')
    {
        // Get the dispatcher.
        JPluginHelper::importPlugin('allevents');
        $dispatcher = JEventDispatcher::getInstance();

        // Trigger the form preparation event.
        $dispatcher->trigger('onAllEventsPrepareForm', [$form, $data]);

        // ###
        if (JLanguageMultilang::isEnabled()) {
            $multiLanguage = new multiLanguages();
            $multiLanguage->preprocessForm($form, 'form', $data);
        }
        // ###

        parent::preprocessForm($form, $data, $group);
    }

    /**
     * AllEventsModelEvent::loadFormData()
     *
     * @return array|mixed
     * @throws Exception
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.event.data', []);

        if (empty($data)) {
            $data = $this->getItem();
            $data = json_decode(json_encode($data), true);
        }

        return $data;
    }

    /**
     * AllEventsModelEvent::getItem()
     *
     * @param mixed $pk
     *
     * @return mixed
     */
    public function getItem($pk = null)
    {
        $params = AllEventsHelperParam::getGlobalParam();

        if ($item = parent::getItem($pk)) {
            if (empty($item->id)) {
                // Override with default values

                if ($params['controlpanel_showagendas']) {
                    $agendas_model = JModelLegacy::getInstance('Agendas', 'AllEventsModel');
                    $agenda_id = $agendas_model->GetDefaultAgendaId();
                    $agenda_id = is_null($agenda_id) ? 0 : $agenda_id;
                } else {
                    $agenda_id = 0;
                }
                $item->agenda_id = $agenda_id;

                if ($agenda_id != 0) {
                    $agenda_model = JModelLegacy::getInstance('Agenda', 'AllEventsModel');
                    $data = $agenda_model->getAgendaContactsParams($agenda_id);
                    $item->contact_libre_access = $data->contact_libre_default_access;
                    $item->contact_1_type = $data->contact_1_default_type;
                    $item->contact_1_label = $data->contact_1_default_label;
                    $item->contact_1_access = $data->contact_1_default_access;
                    $item->contact_2_type = $data->contact_2_default_type;
                    $item->contact_2_label = $data->contact_2_default_label;
                    $item->contact_2_access = $data->contact_2_default_access;
                    $item->contact_3_type = $data->contact_3_default_type;
                    $item->contact_3_label = $data->contact_3_default_label;
                    $item->contact_3_access = $data->contact_3_default_access;
                } else {
                    $item->contact_libre_access = 0;
                    $item->contact_1_type = 0;
                    $item->contact_1_label = '';
                    $item->contact_1_access = 0;
                    $item->contact_2_type = 0;
                    $item->contact_2_label = '';
                    $item->contact_2_access = 0;
                    $item->contact_3_type = 0;
                    $item->contact_3_label = '';
                    $item->contact_3_access = 0;
                }

                if ($params['controlpanel_showactivities']) {
                    $activities_model = JModelLegacy::getInstance('Activities', 'AllEventsModel');
                    $activity_id = $activities_model->GetDefaultActivityIdForAgenda($agenda_id);
                    $activity_id = is_null($activity_id) ? 0 : $activity_id;
                } else {
                    $activity_id = 0;
                }
                $item->activity_id = $activity_id;

                if ($params['controlpanel_showpublics']) {
                    $publics_model = JModelLegacy::getInstance('Publics', 'AllEventsModel');
                    $public_id = $publics_model->GetDefaultPublicIdForAgenda($agenda_id);
                    $public_id = is_null($public_id) ? 0 : $public_id;
                } else {
                    $public_id = 0;
                }
                $item->public_id = $public_id;

                if ($params['controlpanel_showplaces']) {
                    $places_model = JModelLegacy::getInstance('Places', 'AllEventsModel');
                    $place_id = $places_model->GetDefaultPlaceIdForAgenda($agenda_id);
                    $place_id = is_null($place_id) ? 0 : $place_id;
                } else {
                    $place_id = 0;
                }
                $item->place_id = $place_id;

                if ($params['controlpanel_showressources']) {
                    $ressources_model = JModelLegacy::getInstance('Ressources', 'AllEventsModel');
                    $ressource_id = $ressources_model->GetDefaultRessourceIdForAgenda($agenda_id);
                    $ressource_id = is_null($ressource_id) ? 0 : $ressource_id;
                } else {
                    $ressource_id = 0;
                }
                $item->ressource_id = $ressource_id;

                if ($params['controlpanel_showsections']) {
                    $sections_model = JModelLegacy::getInstance('Sections', 'AllEventsModel');
                    $section_id = $sections_model->GetDefaultSectionId();
                    $section_id = is_null($section_id) ? 0 : $section_id;
                } else {
                    $section_id = 0;
                }
                $item->section_id = $section_id;

                if ($params['controlpanel_showcategories']) {
                    $categories_model = JModelLegacy::getInstance('Categories', 'AllEventsModel');
                    $category_id = $categories_model->GetDefaultCategoryIdForSection($section_id);
                    $category_id = is_null($category_id) ? 0 : $category_id;
                } else {
                    $category_id = 0;
                }
                $item->category_id = $category_id;

                $item->enrolment_enabled = $params['genrol_on'];
            }
        }

        // Convert the params field to an array.
        $registry = new JRegistry;
        $registry->loadString($item->attribs);
        $item->attribs = $registry->toArray();

        // on vient compléter les données avec les plugins AllEvents (Développements spécifiques)
        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('allevents');
        $dispatcher->trigger('onBeforeAlleventsEventForm', [&$item]);

        $this->_item = $item;

        return $item;
    }

    /**
     * AllEventsModelEvent::prepareTable()
     *
     * @param mixed $table
     */
    protected function prepareTable($table)
    {
        jimport('joomla.filter.output');
        if (empty($table->id)) {
            // Set ordering to the last item if not set
            if (@$table->ordering === '') {
                $db = $this->getDbo();
                $db->setQuery('SELECT MAX(ordering) FROM #__allevents_events');
                $max = $db->loadResult();
                $table->ordering = $max + 1;
            }
        }
    }

    /**
     * AllEventsModelEvent::batchAccess()
     *
     * Batch access level changes for a group of rows.
     *
     * @param   integer $value The new value matching an Asset Group ID.
     * @param   array $pks An array of row IDs.
     * @param   array $contexts An array of item contexts.
     *
     * @return  boolean  True if successful, false otherwise and internal error is set.
     *
     * @throws Exception
     * @since   3.3.6
     */
    protected function batchAccess($value, $pks, $contexts)
    {
        self::SetbatchSet();

        foreach ($pks as $pk) {
            if ($this->user->authorise('core.edit', $contexts[$pk])) {
                try {
                    $this->table->reset();
                    $this->table->load($pk);
                    $this->table->access = (int)$value;

                    if (!empty($this->type)) {
                        $this->createTagsHelper($this->tagsObserver, $this->type, $pk, $this->typeAlias, $this->table);
                    }

                    $this->table->store();
                } catch (Exception $e) {
                    JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                    return false;
                }
            } else {
                JFactory::getApplication()->enqueueMessage(JText::_('ALLEVENTS_ERROR_BATCH_CANNOT_EDIT'), 'error');

                return false;
            }
        }

        // Clean the cache
        $this->cleanCache();

        return true;
    }

    /**
     * AllEventsModelEvent::batchLanguage()
     * Batch language changes for a group of rows.
     *
     * @param   string $value The new value matching a language.
     * @param   array $pks An array of row IDs.
     * @param   array $contexts An array of item contexts.
     *
     * @return  boolean  True if successful, false otherwise and internal error is set.
     *
     * @throws Exception
     * @since   3.3.6
     */
    protected function batchLanguage($value, $pks, $contexts)
    {
        self::SetbatchSet();

        foreach ($pks as $pk) {
            if ($this->user->authorise('core.edit', $contexts[$pk])) {
                try {
                    $this->table->reset();
                    $this->table->load($pk);
                    $this->table->language = $value;
                    if (!empty($this->type)) {
                        $this->createTagsHelper($this->tagsObserver, $this->type, $pk, $this->typeAlias, $this->table);
                    }
                    $this->table->store();
                } catch (Exception $e) {
                    JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');

                    return false;
                }
            } else {
                JFactory::getApplication()->enqueueMessage(JText::_('ALLEVENTS_ERROR_BATCH_CANNOT_EDIT'), 'error');

                return false;
            }
        }

        // Clean the cache
        $this->cleanCache();

        return true;
    }

    /**
     * AllEventsModelEvent::batchTag()
     *
     * Batch tag a list of item.
     *
     * @param   integer $value The value of the new tag.
     * @param   array $pks An array of row IDs.
     * @param   array $contexts An array of item contexts
     *
     * @return  boolean
     * @throws Exception
     * @since   3.3.6
     */
    protected function batchTag($value, $pks, $contexts)
    {
        // Set the variables
        $user = JFactory::getUser();
        $table = $this->getTable();
        $ret = true;
        foreach ($pks as $pk) {
            if ($user->authorise('core.edit', $contexts[$pk])) {
                try {
                    $table->reset();
                    $table->load($pk);
                    $tags = [$value];

                    /**
                     * @var  JTableObserverTags $tagsObserver
                     */
                    $tagsObserver = $table->getObserverOfClass('JTableObserverTags');
                    $tagsObserver->setNewTags($tags, false);
                } catch (Exception $e) {
                    JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
                    $ret = false;
                }
            } else {
                JFactory::getApplication()->enqueueMessage(JText::_('ALLEVENTS_ERROR_BATCH_CANNOT_EDIT'), 'error');
                $ret = false;
            }
        }

        // Clean the cache
        $this->cleanCache();

        return $ret;
    }
}