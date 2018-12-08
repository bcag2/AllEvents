<?php
defined('_JEXEC') or die;

/**
 * AllEventsHelperDate
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelperDate
{
    /**
     * AllEventsHelperDate::Edit()
     *
     * Construit la date pour l'édition. Format JJ-MM-AAAA HH:MM
     *
     * @param mixed $date
     * @param string $format
     *
     * @return JDate|mixed|null
     */
    public static function Edit($date = null, $format = 'EDIT_DATE_FORMAT')
    {
        if (($date != null) && ($date != JFactory::getDbo()->getNullDate())) {
            $dte = JFactory::getDate($date);
            if (strtolower($date) != 'now')
                $dte = JHtml::_('date', $dte, self::jVersionFormat($format)); //$dte->setOffset($this->_tmzOffset);
            return $dte;
        } else {
            return null;
        }
    }

    /**
     * AllEventsHelperDate::jVersionFormat()
     *
     * Ajuste, si besoin, un format de date qui serait un format type Jooma 1.5 en un format Joomla 1.6+
     * Remplace %M par i, %S par s, ... et retire les signes %
     *
     * @param mixed $format
     *
     * @return mixed|string
     */
    public static function jVersionFormat($format)
    {
        $format = JText::_($format);
        $format = str_replace("%M", "i", $format);
        $format = str_replace("%B", "M", $format);
        $format = str_replace("%S", "s", $format);
        $format = str_replace("%", "", $format);

        return $format;
    }

    /**
     * AllEventsHelperDate::DateFormat()
     *
     * Formate la date de l'�v�nement (stock�e au format YYYY-MM-DD HH:MM:SS).   Retourne p.e. "vendredi 15/01/2010 18:00"
     *
     * @param mixed $date
     * @param string $format
     *
     * @return mixed|null|string
     */

    public static function DateFormat($date, $format = '0')
    {
        if (($date != null) && ($date != JFactory::getDbo()->getNullDate())) {
            // Construit la date/heure en tenant du timezone (p.e. +2heures)
            $date = JHtml::_('date', $date, self::jVersionFormat($format));
            if (substr($date, -5) == '00:00') {
                $date = substr($date, 0, strlen($date) - 5);
            }
            $date = rtrim($date);
        } else {
            $date = null;
        }

        return $date;
    }

    /**
     * AllEventsHelperDate::DateToUTC()
     *
     * Ajuste une date pour tenir compte du timezone de l'utilisateur.  L'ajustement vise à convertir la date "utilisateur" au format UTC 00
     *
     * @param mixed $dte
     *
     * @return null|string
     */

    public static function DateToUTC($dte)
    {
        if ((isset($dte)) && (!empty($dte))) {
            $_tmzOffset = self::getTMZ();
            if (!(is_string($dte)))
                $dte = $dte->toMySQL($local = false);
            // Si la date est entourée de ', supprime le caractère pour ne conserver que la date
            $dte = trim($dte, "'");

            return JFactory::getDate($dte, $_tmzOffset)->format('Y-m-d H:i:s', $local = false);
        } else {
            return null;
        }
    }

    /**
     * AllEventsHelperDate::getTMZ()
     *
     * Retrouve le timezone de l'utilisateur et, si pas défini, celui du serveur
     *
     * @return mixed
     */
    private static function getTMZ()
    {
        $_ServertmzOffset = JFactory::getConfig()->get('config.offset');
        $_tmzOffset = $_ServertmzOffset;
        // Retrouve le timezone de l'utilisateur.  Si présent et non vide, le timezone de l'utilisateur est utilisé en lieu et place de celui
        // du serveur web
        if (JFactory::getUser()->get('guest') == 0) {
            $userTMZ = JFactory::getUser()->getParam('timezone');
            if (isset($userTMZ))
                $_tmzOffset = $userTMZ;
        }

        return $_tmzOffset;
    }

    /**
     * AllEventsHelperDate::DateToUTC_withformat()
     *
     * Ajuste une date pour tenir compte du timezone de l'utilisateur.  L'ajustement vise à convertir la date "utilisateur" au format UTC 00
     *
     * @param mixed $dte string
     * @param mixed $format string
     * @param string $defaultdate
     *
     * @return null|string
     * @throws Exception
     */

    public static function DateToUTC_withformat($dte, $format, $defaultdate = "")
    {
        $dte = trim($dte);
        $defaultdate = trim($defaultdate);

        $tags = explode(':', $dte);
        $num_tags = count($tags);
        if ($num_tags == 3) {
            $format .= ':s';
        }

        if ((!empty($dte)) && (!empty($format))) {
            JFactory::getApplication()->enqueueMessage('0-' . print_r($dte, true) . '-' . print_r($format, true), 'info');
            $date = DateTime::createFromFormat($format, $dte);
            JFactory::getApplication()->enqueueMessage('1-' . print_r($date, true), 'info');
            if ($date != null) {
                JFactory::getApplication()->enqueueMessage('2-' . print_r($date, true), 'info');
                $ldate = new JDate($date->format('Y-m-d H:i'), new DateTimeZone(JFactory::getUser()->getParam('timezone', JFactory::getConfig()->get('offset'))));
                JFactory::getApplication()->enqueueMessage('3-' . print_r($ldate, true), 'info');

                return $ldate->format('Y-m-d H:i', false, false);
            } else {
                return null;
            }
        } else {
            if (!empty($defaultdate)) {
                return ($defaultdate);
            } else {
                $ldate = new JDate();

                return $ldate->format('Y-m-d H:i', false, false);
            }
        }
    }

    /**
     * AllEventsHelperDate::adjustDateFields()
     *
     * Ajuste toutes les dates de $post afin de convertir les dates au format UTC 00.  Fonction appelée avant stockage dans la base de données
     *
     * @param mixed $post
     */

    public static function adjustDateFields(&$post)
    {
        // Liste des champs de type Date.   Ces champs seront traités par la méthode store() afin d'ajuster la date en date UTC
        static $_arrDateFields = [
            'closingdate',
            'created_date',
            'date',
            'enddate',
            'expirationdate',
            'lastmod',
            'openingdate',
            'publishingdate'];

        $_tmzOffset = self::getTMZ();
        // Sauvegarde des dates en UTC : scanne chaque champs de la table et s'il s'agit d'un champs de type date
        // (voir la constante $this->_arrDateFields), JFactory::getDate() est appelé avec comme second paramètre le timezone du site.
        // JFactory::getDate() va alors convertir la date en UTC.   Par exemple, pour un site à Bruxelles (UTC +1), la méthode getDate()
        // retranche une heure.
        // Exemple : dans le formulaire d'édition d'un évènement, l'utilisateur introduit comme date de début 06/12/1974 06:45,
        // si le site est en UTC+1, la date renvoyée par $dte->toMySQL(false) sera 06/12/1974 05:45.
        $arrFields = array_keys($post->getProperties());

        foreach ($_arrDateFields as $fieldname) {
            if (in_array($fieldname, $arrFields)) {
                $dte = $post->$fieldname;
                // Le champs lastmod (date dernière modif.) est toujours égal à la date système lorsqu'on sauve les données
                switch ($fieldname) {
                    case 'created_date':
                        $dte = ((($dte == null) || ($dte == JFactory::getDbo()->getNullDate())) ? 'now' : $dte);
                        break;
                    case 'lastmod':
                        $dte = 'now';
                        break;
                } // switch ($fieldname)
                if ($dte == 'now') {
                    // Retrouve la date/heure UTC
                    $dte = JFactory::getDate($dte, $_ServertmzOffset);
                    $post->$fieldname = $dte->toMySQL($local = false);
                } else
                    if (($dte != null) && ($dte != JFactory::getDbo()->getNullDate())) {
                        // Une date est fournie à la fonction.   La date étant dans le timezone de l'utilisateur, il faut
                        // la convertir en UTC.
                        $dte = JFactory::getDate($dte, $_tmzOffset);
                        $post->$fieldname = $dte->toMySQL($local = false);
                    }
            }
        }

        return;
    }

    /**
     * AllEventsHelperDate::getTomorrow()
     *
     * Retourne la date de demain matin (00:00) mais en tenant compte de décalage fuseau horaire.
     * Ainsi, si nous sommes le 14/10/2011 avec un UTC+1, la date de demain sera ... 14/10/2011 23:00 (soit demain -1 heure)
     *
     * @return array
     */

    public static function getTomorrow()
    {
        static $_start = null;
        static $_end = null;

        if ($_start == null) {
            list($_today_start, $_today_end) = self::getToday();

            $date = new DateTime($_today_start);
            // Demain, c'est aujourd'hui + 1 jour
            $date->modify("+1 day");
            // Retourne p.e. 2011-10-17 23:00 pour indiquer que demain, avec un UTC+1, commence à 23h00 aujourd'hui
            $_start = $date->format("Y-m-d H:i:s");

            $date = new DateTime($_today_end);
            $date->modify("+1 day");
            $_end = $date->format("Y-m-d H:i:s"); // Aujourd'hui, heure 23:59 (mais en tenant compte du fuseau horaire)

        }

        return [$_start, $_end];
    }

    /**
     * AllEventsHelperDate::getToday()
     *
     * Retourne la date d'aujourd'hui matin (00:00) mais en tenant compte de décalage fuseau horaire.
     * Ainsi, si nous sommes le 14/10/2011 avec un UTC+1, la date d'aujourd'hui 00h00 sera ... 13/10/2011 23:00 (soit demain -1 heure)
     *
     * @return array
     */

    public static function getToday()
    {
        static $_start = null;
        static $_end = null;

        if ($_start == null) {
            $_tmzOffset = self::getTMZ();
            // Récupère la date/heure courante
            $dte = JFactory::getDate('now', $_tmzOffset);
            // $dte-toFormat() retourne p.e. "2011-10-14 10:02:52".  Extrait l'année-mois-jour
            $arr = explode(' ', $dte->toFormat());
            $today = $arr[0];
            // Prends en compote le décalage de fuseau horaire.  Ainsi, si aujourd'hui est 2011-10-14 et que le UTC est +1,
            // aujourd'hui est en fait 2011-10-13 23:00
            $dte = JFactory::getDate($today, $_tmzOffset);

            $_start = $dte->toMySQL($local = false);

            $date = new DateTime($_start);
            $date->modify("+1 day");
            $date->modify("-1 second");
            $_end = $date->format("Y-m-d H:i:s"); // Aujourd'hui, heure 23:59 (mais en tenant compte du fuseau horaire)

        }

        return [$_start, $_end];
    }

    /**
     * AllEventsHelperDate::getYesterday()
     *
     * Retourne la date de hier matin (00:00) mais en tenant compte de décalage fuseau horaire.
     * Ainsi, si nous sommes le 14/10/2011 avec un UTC+1, la date de hier matin sera ... 12/10/2011 23:00
     *
     * @return array
     */

    public static function getYesterday()
    {
        static $_start = null;
        static $_end = null;

        if ($_start == null) {
            list($_today_start, $_today_end) = self::getToday();

            $date = new DateTime($_today_start);
            // Demain, c'est aujourd'hui + 1 jour
            $date->modify("-1 day");
            // Retourne p.e. 2011-10-17 23:00 pour indiquer que demain, avec un UTC+1, commence à 23h00 aujourd'hui
            $_start = $date->format("Y-m-d H:i:s");

            $date = new DateTime($_today_end);
            $date->modify("-1 day");
            $_end = $date->format("Y-m-d H:i:s"); // Aujourd'hui, heure 23:59 (mais en tenant compte du fuseau horaire)

        }

        return [$_start, $_end];
    }

    /**
     * AllEventsHelperDate::getNow()
     *
     * Retourne la date et l'heure système en tenant compte ou pas du timezone de l'utilisateur
     *
     * @param bool $local
     *
     * @return JDate
     */

    public static function getNow($local = false)
    {
        if ($local == false) {
            return JFactory::getDate('now', null);
        } else {
            // Retourne l'heure en tenant compte du timezone de l'utilisateur
            $_tmzOffset = (($local == false) ? self::getTMZ() : null);

            return JFactory::getDate('now', $_tmzOffset);
        }
    }

    /**
     * AllEventsHelperDate::GetDate()
     *
     * Retourne la date sous forme lisible pour l'affichage
     *
     * @param mixed $pDate
     *
     * @return string
     */

    public static function GetDate($pDate)
    {
        if (substr($pDate, 0, 10) != '0000-00-00') {
            $tab = explode("-", $pDate);
            $annee = $tab[0];
            $mois = $tab[1];
            $tab = explode(" ", $tab[2]);
            $jour = $tab[0];

            $sDate = $jour . '/' . $mois . '/' . $annee;
        } else {
            $sDate = '';
        }

        return $sDate;
    }

    /**
     * AllEventsHelperDate::getYear()
     *
     * @return string
     */

    public static function getYear()
    {
        // Retrouve la date et l'année et les expose aux codes appellants aux travers de $g_se_Date->year et $g_se_Date->date
        $_year = JFactory::getDate()->format('Y');

        return ((strlen($_year) == 2) ? '20' . $_year : $_year);
    }

    /**
     * AllEventsHelperDate::parseDateTime()
     * Parses a string into a DateTime object, optionally forced into the given timezone.
     *
     * @param mixed $string
     * @param mixed $timezone
     *
     * @return DateTime
     */
    public static function parseDateTime($string, $timezone = null)
    {
        $date = new DateTime($string, $timezone ? $timezone : new DateTimeZone('UTC') // Used only when the string is ambiguous.
        // Ignored if string has a timezone offset in it.
        );
        if ($timezone) {
            // If our timezone was ignored above, force it.
            $date->setTimezone($timezone);
        }

        return $date;
    }

    /**
     * AllEventsHelperDate::parseTimestamp()
     * Parses a timestamp into a DateTime object, optionally forced into the given timezone.
     *
     * @param mixed $string
     * @param mixed $timezone
     *
     * @return DateTime
     */
    public static function parseTimestamp($string, $timezone = null)
    {
        $date = DateTime::createFromFormat('U', $string);
        if ($timezone) {
            // If our timezone was ignored above, force it.
            $date->setTimezone($timezone);
        }

        return $date;
    }

    /**
     * AllEventsHelperDate::stripTime()
     * Takes the year/month/date values of the given DateTime and converts them to a new DateTime,
     * but in UTC.
     *
     * @param mixed $datetime
     *
     * @return DateTime
     */
    public static function stripTime($datetime)
    {
        return new DateTime($datetime->format('Y-m-d'));
    }

    /**
     * AllEventsHelperDate::DayInMonth()
     *
     * @param mixed $month
     * @param mixed $year
     *
     * @return int|mixed
     */
    static function DayInMonth($month, $year)
    {
        $daysInMonth = [
            31,
            28,
            31,
            30,
            31,
            30,
            31,
            31,
            30,
            31,
            30,
            31];
        if ($month != 2)
            return $daysInMonth[$month - 1];

        return (checkdate($month, 29, $year)) ? 29 : 28;
    }

    /*
    * Find the number of days in a month
    * Year is between 1 and 32767 inclusive
    * Month is between 1 and 12 inclusive
    */

    /**
     * AllEventsHelperDate::isToday()
     *
     * @param mixed $date
     *
     * @return bool
     */
    static function isToday($date)
    {
        $config = JFactory::getConfig();
        $offset = $config->get("offset");
        $dtz = new DateTimeZone($offset);
        $dt = new DateTime("now", $dtz);
        $now = time() + $dtz->getOffset($dt);

        return gmdate('Y-m-d', $date) == gmdate('Y-m-d', $now);
    }

    /**
     * AllEventsHelperDate::isBeforeToday()
     *
     * @param mixed $date
     *
     * @return bool
     */
    static function isBeforeToday($date)
    {
        $config = JFactory::getConfig();
        $offset = $config->get("offset");
        $dtz = new DateTimeZone($offset);
        $dt = new DateTime("now", $dtz);
        $now = time() + $dtz->getOffset($dt);

        return mktime(0, 0, 0, date('m', $now), date('d', $now), date('Y', $now)) > mktime(0, 0, 0, date('m', $date), date('d', $date), date('Y', $now));
    }

    /**
     * AllEventsHelperDate::isAfterToday()
     *
     * @param mixed $date
     *
     * @return bool
     */
    static function isAfterToday($date)
    {
        $config = JFactory::getConfig();
        $offset = $config->get("offset");
        $dtz = new DateTimeZone($offset);
        $dt = new DateTime("now", $dtz);
        $now = time() + $dtz->getOffset($dt);

        return mktime(0, 0, 0, date('m', $now), date('d', $now), date('Y', $now)) < mktime(0, 0, 0, date('m', $date), date('d', $date), date('Y', $now));
    }

    /**
     * AllEventsHelperDate::isTomorrow()
     *
     * @param mixed $date
     *
     * @return bool
     */
    static function isTomorrow($date)
    {
        $config = JFactory::getConfig();
        $offset = $config->get("offset");
        $dtz = new DateTimeZone($offset);
        $dt = new DateTime("now", $dtz);
        $now = time() + $dtz->getOffset($dt);

        return gmdate('Y-m-d', $date) == gmdate('Y-m-d', $now + 60 * 60 * 24);
    }

    /**
     * AllEventsHelperDate::isFuture()
     *
     * @param mixed $date
     *
     * @return bool
     */
    static function isFuture($date)
    {
        $config = JFactory::getConfig();
        $offset = $config->get("offset");
        $dtz = new DateTimeZone($offset);
        $dt = new DateTime("now", $dtz);
        $now = time() + $dtz->getOffset($dt);

        return $date > $now;
    }

    /**
     * AllEventsHelperDate::isPast()
     *
     * @param mixed $date
     *
     * @return bool
     */
    static function isPast($date)
    {
        $config = JFactory::getConfig();
        $offset = $config->get("offset");
        $dtz = new DateTimeZone($offset);
        $dt = new DateTime("now", $dtz);
        $now = time() + $dtz->getOffset($dt);

        return $date < $now;
    }

    /**
     * AllEventsHelperDate::isWeekend()
     *
     * @param mixed $date
     *
     * @return bool
     */
    static function isWeekend($date)
    {
        $dow = gmdate('w', $date);

        return $dow == 0 || $dow == 6;
    }

    /**
     * AllEventsHelperDate::mySqlDateTime()
     *
     * @param integer $t
     *
     * @return string
     */
    static function mySqlDateTime($t = 0)
    {
        return self::toSqlDateTime($t);
    }

    /**
     * AllEventsHelperDate::toSqlDateTime()
     *
     * @param integer $t
     *
     * @return string
     */
    static function toSqlDateTime($t = 0)
    {
        date_default_timezone_set('GMT');
        if ($t == 0)
            return gmdate('Y-m-d H:i:s', self::now());

        return gmdate('Y-m-d H:i:s', $t);
    }

    /**
     * AllEventsHelperDate::now()
     *
     * @return int
     */
    static function now()
    {
        $config = JFactory::getConfig();
        $offset = $config->get("offset");
        $dtz = new DateTimeZone($offset);
        $dt = new DateTime("now", $dtz);
        $now = time() + $dtz->getOffset($dt);

        return $now;
    }

    /**
     * AllEventsHelperDate::mySqlDate()
     *
     * @param integer $t
     *
     * @return string
     */
    static function mySqlDate($t = 0)
    {
        return self::toSqlDate($t);
    }

    /**
     * AllEventsHelperDate::toSqlDate()
     *
     * @param integer $t
     *
     * @return string
     */
    static function toSqlDate($t = 0)
    {
        date_default_timezone_set('GMT');
        if ($t == 0)
            return gmdate('Y-m-d', self::now());

        return gmdate('Y-m-d', $t);
    }

    /**
     * AllEventsHelperDate::mySqlTime()
     *
     * @param integer $t
     *
     * @return string
     */
    static function mySqlTime($t = 0)
    {
        date_default_timezone_set('GMT');
        if ($t == 0)
            return gmdate('H:i:s', self::now());

        return gmdate('H:i:s', $t);
    }

    /**
     * AllEventsHelperDate::getDayOfWeekName()
     *
     * @param mixed $dow
     *
     * @return mixed
     */
    static function getDayOfWeekName($dow)
    {
        $day = [
            0 => JText::_('SUNDAY'),
            1 => JText::_('MONDAY'),
            2 => JText::_('TUESDAY'),
            3 => JText::_('WEDNESDAY'),
            4 => JText::_('THURSDAY'),
            5 => JText::_('FRIDAY'),
            6 => JText::_('SATURDAY')];

        return $day[$dow];
    }

    /**
     * AllEventsHelperDate::getLongMonthName()
     *
     * @param mixed $month
     *
     * @return mixed|string
     */
    static function getLongMonthName($month)
    {
        $months = self::getMonths();
        if ($month < 1 || $month > 12)
            return JText::_('AE_ERROR_BAD_DATA');

        return $months[$month];
    }

    /**
     * @return array
     */
    private function getMonths()
    {
        $months = [
            1 => JText::_('JANUARY'),
            2 => JText::_('FEBRUARY'),
            3 => JText::_('MARCH'),
            4 => JText::_('APRIL'),
            5 => JText::_('MAY'),
            6 => JText::_('JUNE'),
            7 => JText::_('JULY'),
            8 => JText::_('AUGUST'),
            9 => JText::_('SEPTEMBER'),
            10 => JText::_('OCTOBER'),
            11 => JText::_('NOVEMBER'),
            12 => JText::_('DECEMBER')];

        return $months;
    }

    /**
     * AllEventsHelperDate::html_hourpicker()
     *
     * @param mixed $start
     * @param mixed $end
     * @param mixed $tag_name
     * @param mixed $tag_attribs
     * @param mixed $selected
     * @param string $format
     *
     * @return
     */
    static function html_hourpicker($start, $end, $tag_name, $tag_attribs, $selected, $format = "")
    {
        $start = intval($start);
        $end = intval($end);
        //$inc = intval($inc);
        $arr = [];
        //$tmpi = "";
        for ($i = $start; $i <= $end; $i++) {
            if (1 == 1) { // US time
                if ($i > 11) {
                    $tmpi = ($i - 12) . " pm";
                } else {
                    $tmpi = $i . " am";
                }
            } else {
                $tmpi = $format ? sprintf("$format", $i) : "$i";
            }
            $fi = $format ? sprintf("$format", $i) : "$i";
            $arr[] = mosHTML::makeOption($fi, $tmpi);
        }

        return mosHTML::selectList($arr, $tag_name, $tag_attribs, 'value', 'text', $selected);
    }

    /**
     * AllEventsHelperDate::html_monthpicker()
     *
     * @param integer $month
     *
     * @return string
     */
    static function html_monthpicker($month = 0)
    {
        $htmlstr = "";
        if ($month == 0) {
            $month = gmdate("n");
        }
        $months = self::getMonths();

        $htmlstr .= "<select name='month' onchange='submit()'>\n";
        for ($i = 1; $i <= 12; $i++) {
            $htmlstr .= "<option value='" . $i . "'";
            if ($i == $month)
                $htmlstr .= " selected";
            $htmlstr .= ">" . $months[$i] . "</option>\n";
        }
        $htmlstr .= "</select>\n";

        return $htmlstr;
    }

    /**
     * AllEventsHelperDate::html_yearpicker()
     *
     * @param integer $year
     *
     * @return string
     */
    static function html_yearpicker($year = 0)
    {
        $htmlstr = "";
        $currentyear = gmdate('Y');
        if ($year == 0) {
            $year = $currentyear;
        }
        if ($year + 1 < $currentyear || $year - 2 > $currentyear) {
            $year = $currentyear;
        }
        $years = [
            0 => (int)$currentyear - 1,
            1 => (int)$currentyear,
            2 => (int)$currentyear + 1,
            3 => (int)$currentyear + 2];

        $htmlstr .= "<select name='year' onchange='submit()'>\n";
        foreach ($years as $value) {
            $htmlstr .= "<option name='" . $value . "'";
            if ($value == $year)
                $htmlstr .= " selected";
            $htmlstr .= ">" . $value . "</option>\n";
        }
        $htmlstr .= "</select>\n";

        return $htmlstr;
    }

    //return true if Unix DateTime is in DST

    /**
     * AllEventsHelperDate::inDST()
     *
     * @param mixed $dt
     *
     * @return int
     */
    static function inDST($dt)
    {
        $sqldt = self::toSqlDateTime($dt);
        if (self::toUnixDateTime($sqldt, 0) == self::toUnixDateTime($sqldt, 1))
            return 0;

        return 1;
    }

    /**
     * AllEventsHelperDate::toUnixDateTime()
     *
     * @param mixed $datetime
     * @param integer $dst
     *
     * @return int
     */
    static function toUnixDateTime($datetime, $dst = -1)
    {
        // convert to absolute dates if neccessary
        $datetime = self::getAbsDate($datetime);
        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 5, 2);
        $day = substr($datetime, 8, 2);
        $hour = 0;
        $minute = 0;
        $second = 0;
        if (strlen($datetime) > 10) {
            $hour = substr($datetime, 11, 2);
            $minute = substr($datetime, 14, 2);
            $second = substr($datetime, 17, 2);
        }

        return gmmktime($hour, $minute, $second, $month, $day, $year, $dst);
    }

    // $datetime is in iCal time format( YYYYMMDD or YYYYMMDDTHHMMSS or YYYYMMDDTHHMMSSZ )

    /**
     * AllEventsHelperDate::getAbsDate()
     *
     * @param mixed $date
     * @param string $rdate
     *
     * @return mixed|string
     */
    static function getAbsDate($date, $rdate = "")
    {
        if (str_replace([
                "y",
                "m",
                "d",
                "h",
                "n"], "", strtolower($date)) != strtolower($date)
        ) {
            date_default_timezone_set("UTC");
            if ($rdate == "")
                $udate = time();
            else
                $udate = self::toUnixDateTime($rdate);
            $values = explode(",", strtolower($date));
            $y = 0;
            $m = 0;
            $d = 0;
            $h = 0;
            $n = 0;
            foreach ($values as $value) {
                $rtype = substr($value, strlen($value) - 1);
                $rvalue = intval(substr($value, 0, strlen($value) - 1));
                switch ($rtype) {
                    case 'y':
                        $y = $rvalue;
                        break;
                    case 'm':
                        $m = $rvalue;
                        break;
                    case 'd':
                        $d = $rvalue;
                        break;
                    case 'h':
                        $h = $rvalue;
                        break;
                    case 'n':
                        $n = $rvalue;
                        break;
                }
                // for "-" values, move to start of day , otherwise, move to end of day
                if ($rvalue[0] == '-')
                    $udate = mktime(0, 0, 0, date('m', $udate), date('d', $udate), date('Y', $udate));
                else
                    $udate = mktime(0, -1, 0, date('m', $udate), date('d', $udate) + 1, date('Y', $udate));
                $udate = self::addDate($udate, $h, $n, 0, $m, $d, $y);
                //$date = self::toSqlDate(self::addDate(time(),$h,$n,0,$m,$d,$y));
            }
            $date = self::toSqlDateTime($udate);
        }

        return $date;
    }

    /**
     * AllEventsHelperDate::addDate()
     *
     * @param mixed $date
     * @param mixed $hour
     * @param mixed $min
     * @param mixed $sec
     * @param mixed $month
     * @param mixed $day
     * @param mixed $year
     * @param string $tzid
     *
     * @return int
     */
    static function addDate($date, $hour, $min, $sec, $month, $day, $year, $tzid = "UTC")
    {
        if ($tzid == -1) // old param

            $tzid = "UTC";
        date_default_timezone_set($tzid);
        //date_default_timezone_set("UTC");
        //$tdate=getdate($date);
        //print_r($tdate);
        $sqldate = self::toSqlDateTime($date);
        $tdate = [];
        $tdate["year"] = (int)substr($sqldate, 0, 4);
        $tdate["mon"] = (int)substr($sqldate, 5, 2);
        $tdate["mday"] = (int)substr($sqldate, 8, 2);
        $tdate["hours"] = (int)substr($sqldate, 11, 2);
        $tdate["minutes"] = (int)substr($sqldate, 14, 2);
        $tdate["seconds"] = (int)substr($sqldate, 17, 2);
        $newdate = mktime($tdate["hours"] + (int)$hour, $tdate["minutes"] + (int)$min, $tdate["seconds"] + (int)$sec, $tdate["mon"] + (int)$month, $tdate["mday"] + (int)$day, $tdate["year"] + (int)$year);
        date_default_timezone_set("UTC");

        //echo self::toSQLDateTime($date) . " => " . self::toSQLDateTime($newdate) . " ($hour:$min:$sec $month/$day/$year)<br/>\n";
        return $newdate;
    }

    // convert iCal duration string to # of seconds

    /**
     * AllEventsHelperDate::toSQLTime()
     *
     * @param string $time
     *
     * @return string
     */
    static function toSQLTime($time = "12am")
    {
        //$htmlstr = "";
        $timeoffset = 0;
        $time = trim($time);
        $checkpm = strtoupper(substr($time, strlen($time) - 2));
        if ($checkpm == "AM" || $checkpm == "PM") {
            $time = substr($time, 0, strlen($time) - 2);
            if ($checkpm == "PM" && $time > 12)
                $timeoffset = 12;
        }
        $times = explode(":", $time);
        $hour = count($times) >= 1 ? intval($times[0]) + $timeoffset : 0;
        $minute = count($times) >= 2 ? intval($times[1]) : 0;
        $second = count($times) >= 3 ? intval($times[2]) : 0;

        return sprintf("%02d:%02d:%02d", $hour, $minute, $second);
    }

    /**
     * AllEventsHelperDate::fromiCaltoUnixDateTime()
     *
     * @param mixed $datetime
     * @param integer $dst
     *
     * @return int|null
     */
    static function fromiCaltoUnixDateTime($datetime, $dst = -1)
    {
        // first check format
        $formats = [];
        $formats[] = "/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/";
        $formats[] = "/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]T[0-9][0-9][0-9][0-9][0-9][0-9]/";
        $formats[] = "/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]T[0-9][0-9][0-9][0-9][0-9][0-9]Z/";
        $ok = false;
        foreach ($formats as $format) {
            if (preg_match($format, $datetime)) {
                $ok = true;
                break;
            }
        }
        if (!$ok)
            return null;
        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 4, 2);
        $day = substr($datetime, 6, 2);
        $hour = 0;
        $minute = 0;
        $second = 0;
        if (strlen($datetime) > 8 && $datetime{8} == "T") {
            $hour = substr($datetime, 9, 2);
            $minute = substr($datetime, 11, 2);
            $second = substr($datetime, 13, 2);
        }

        return gmmktime($hour, $minute, $second, $month, $day, $year);
    }

    // see if event falls in date range
    // event: event object
    // begin, end: range in Unix timestamp format (UTC)
    // tzid: timezone of calendar, or null (will use event if not specified)

    /**
     * AllEventsHelperDate::fromUnixDateTimetoiCal()
     *
     * @param mixed $datetime
     *
     * @return string
     */
    static function fromUnixDateTimetoiCal($datetime)
    {
        date_default_timezone_set('GMT');

        return gmdate("Ymd\THis", $datetime);
    }

    /**
     * AllEventsHelperDate::iCalDurationtoSeconds()
     *
     * @param mixed $duration
     *
     * @return int
     */
    static function iCalDurationtoSeconds($duration)
    {
        $secs = 0;
        if ($duration{0} == "P") {
            $duration = str_replace([
                "H",
                "M",
                "S",
                "T",
                "D",
                "W",
                "P"], [
                "H,",
                "M,",
                "S,",
                "",
                "D,",
                "W,",
                ""], $duration);
            $dur2 = explode(",", $duration);
            foreach ($dur2 as $dur) {
                $val = intval($dur);
                if (strlen($dur) > 0) {
                    switch ($dur{strlen($dur) - 1}) {
                        case "H":
                            $secs += 60 * 60 * $val;
                            break;
                        case "M":
                            $secs += 60 * $val;
                            break;
                        case "S":
                            $secs += $val;
                            break;
                        case "D":
                            $secs += 60 * 60 * 24 * $val;
                            break;
                        case "W":
                            $secs += 60 * 60 * 24 * 7 * $val;
                            break;
                    }
                }
            }
        }

        return $secs;
    }

    // $datetime is in SQL date or date/time format

    /**
     * AllEventsHelperDate::inDay()
     * see if date range (begin-end) falls on day
     *
     * @param mixed $daystart
     * @param mixed $begin
     * @param mixed $end
     *
     * @return bool
     */
    static function inDay($daystart, $begin, $end)
    {
        //$dayend = $daystart + 60*60*24 - 60;
        // add 1 day to determine end of day
        // don't use 24 hours, since twice a year DST Sundays are 23 hours and 25 hours in length
        // adding 1 day takes this into account
        $dayend = self::addDate($daystart, 0, 0, 0, 0, 1, 0);

        $end = max($begin, $end); // $end can't be less than $begin
        $inday = ($daystart <= $begin && $begin < $dayend) || ($daystart < $end && $end < $dayend) || ($begin <= $daystart && $end > $dayend);

        return $inday;
    }

    // $datetime is in SQL date format

    /**
     * AllEventsHelperDate::inRange()
     *
     * @param mixed $event
     * @param mixed $begin
     * @param mixed $end
     * @param mixed $tzid
     *
     * @return bool
     */
    static function inRange($event, $begin, $end, $tzid = null)
    {
        if (empty($tzid))
            $tzid = $event->tzid;
        if ($event->event_type == 1)
            $tzid = ""; // no timezone for all day events

        $end = max($begin, $end); // $end can't be less than $begin

        $eventstart = self::toUnixDateTime($event->event_start);
        $eventend = self::toUnixDateTime($event->event_end);
        if ($event->event_type == 2) {
            // convert meetings to local time zone
            $eventstart = self::toUnixDateTime(self::toLocalDateTime($event->event_start, $tzid));
            $eventend = self::toUnixDateTime(self::toLocalDateTime($event->event_end, $tzid));
        }
        $inrange = ($eventstart <= $begin && $begin < $eventend) || ($eventstart < $end && $end <= $eventend) || ($begin <= $eventstart && $end > $eventend);

        /*
        echo "inRange(" .
        self::toSQLDateTime($eventstart) . " - " .
        self::toSQLDateTime($eventend) . ", " .
        self::toSQLDateTime($begin) . ", " .
        self::toSQLDateTime($end) . "): " . ($inrange ? "true" : "false" ) . "<br/>\n";
        */

        return $inrange;
    }

    //date math: add to current date to get new date

    /**
     * AllEventsHelperDate::toLocalDateTime()
     *
     * @param mixed $sqldate
     * @param mixed $tzid
     *
     * @return mixed|string
     */
    static function toLocalDateTime($sqldate, $tzid = null)
    {
        if (empty($tzid))
            $tzid = "UTC";
        //$date = JDate::getInstance($sqldate, $tzid);
        try {
            $timezone = new DateTimeZone($tzid);
        } catch (Exception $e) {
            // bad time zone specified
            return $sqldate;
        }
        $udate = self::toUnixDateTime($sqldate);
        $daydatetime = new DateTime("@" . $udate);
        $tzoffset = $timezone->getOffset($daydatetime);

        //echo "toLocaldateTime: $sqldate ($tzid) to " . self::toSqlDateTime($udate + $tzoffset) . "($tzoffset)<br/>\n";
        return self::toSqlDateTime($udate + $tzoffset);
        /*
        $offset = $date->getOffsetFromGMT();
        if($offset >= 0)
        $date->add(new DateInterval("PT".$offset."S"));
        else
        $date->sub(new DateInterval("PT".abs($offset)."S"));
        return $date->toSql(true);
        */
    }

    // formatDate(): use gmdate() or strftime() depending if '%' is present
    // strftime supports other languages

    /**
     * AllEventsHelperDate::toUnixDate()
     *
     * @param mixed $datetime
     * @param integer $dst
     *
     * @return int
     */
    static function toUnixDate($datetime, $dst = -1)
    {
        $datetime = self::convertDate($datetime);
        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 5, 2);
        $day = substr($datetime, 8, 2);

        return mktime(0, 0, 0, $month, $day, $year, $dst);
    }

    // Zap Calendar version of strftime, with Joomla language support

    /**
     * AllEventsHelperDate::convertDate()
     *
     * @param mixed $d
     *
     * @return string
     */
    static function convertDate($d)
    {
        if (strpos($d, "/") > 0) { // mm/dd/yyyy
            $dd = explode("/", $d);
            $m = sprintf("%02d", $dd[0]);
            $d = sprintf("%02d", $dd[1]);
            $y = sprintf("%04d", $dd[2]);
        } elseif (strpos($d, ".") > 0) { // dd.mm.yyyy
            $dd = explode(".", $d);
            $d = sprintf("%02d", $dd[0]);
            $m = sprintf("%02d", $dd[1]);
            $y = sprintf("%04d", $dd[2]);
        } elseif (strpos($d, "-") > 0) { // yyyy-mm-dd
            $dd = explode("-", $d);
            $y = sprintf("%04d", $dd[0]);
            $m = sprintf("%02d", $dd[1]);
            $d = sprintf("%02d", $dd[2]);
        } else
            return "";

        return "$y-$m-$d";

    }

    // date math: get date from week and day in specified month, i.e. second Tuesday, last Friday
    // params:
    // date - Unix datetime
    // week - week number, 0 is first , -1 is last
    // wday - day of week, like Unix, 0 is Sunday .. 6 is Saturday
    // second Tuesday is 1,2 , last Friday is -1,5

    /**
     * AllEventsHelperDate::formatDate()
     *
     * @param mixed $format
     * @param mixed $date
     * @param mixed $tz
     *
     * @return string
     */
    static function formatDate($format, $date, $tz = null)
    {
        date_default_timezone_set("UTC");
        if (strpos($format, '%') !== false)
            $d = self::Zstrftime($format, $date);
        else
            $d = gmdate($format, $date);
        //echo "format: $format, " .
        //    (strpos($format,'%')!== false? "true":"false") . "<br/>date: $d";exit;
        return $d;
    }

    //return first day of month in specified date

    /**
     * AllEventsHelperDate::Zstrftime()
     *
     * @param mixed $format
     * @param mixed $date
     *
     * @return string
     */
    static function Zstrftime($format, $date)
    {
        $days = [
            0 => JText::_('SUNDAY'),
            1 => JText::_('MONDAY'),
            2 => JText::_('TUESDAY'),
            3 => JText::_('WEDNESDAY'),
            4 => JText::_('THURSDAY'),
            5 => JText::_('FRIDAY'),
            6 => JText::_('SATURDAY')];

        $months = self::getMonths();

        $format = str_replace([
            '%A', // i.e. "Monday"
            '%a', // "Mon"
            '%B', // "January"
            '%b', // "Jan"
            '%h' // "Jan" (alias for %b)
        ], [
            $days[gmstrftime('%w', $date)],
            substr($days[gmstrftime('%w', $date)], 0, 3),
            $months[intval(gmstrftime('%m', $date))],
            substr($months[intval(gmstrftime('%m', $date))], 0, 3),
            substr($months[intval(gmstrftime('%m', $date))], 0, 3),
        ], $format);
        $d = gmstrftime($format, $date);

        return $d;
    }

    //return last day of month in specified date

    /**
     * AllEventsHelperDate::getDateFromDay()
     *
     * @param mixed $date
     * @param mixed $week
     * @param mixed $wday
     * @param string $tzid
     *
     * @return mixed
     */
    static function getDateFromDay($date, $week, $wday, $tzid = "UTC")
    {
        //echo "getDateFromDay(" . self::toSqlDateTime($date) . ",$week,$wday)<br/>\n";
        // determine first day in month
        $tdate = getdate($date);
        $monthbegin = gmmktime(0, 0, 0, $tdate["mon"], 1, $tdate["year"]);
        $monthend = self::addDate($monthbegin, 0, 0, 0, 1, -1, 0, $tzid); // add 1 month and subtract 1 day
        $day = self::addDate($date, 0, 0, 0, 0, 1 - $tdate["mday"], 0, $tzid);
        $month = [[]];
        while ($day <= $monthend) {
            $tdate = getdate($day);
            $month[$tdate["wday"]][] = $day;
            //echo self::toSQLDateTime($day) . "<br/>\n";
            $day = self::addDate($day, 0, 0, 0, 0, 1, 0, $tzid); // add 1 day
        }
        $dayinmonth = ($week >= 0) ? $month[$wday][$week] : $month[$wday][count($month[$wday]) - 1];

        return $dayinmonth;
    }

    /**
     * AllEventsHelperDate::monthend()
     *
     * @param mixed $date
     */
    static function monthend($date)
    {
        self::addDate(self::monthbegin($date), 0, 0, 0, 1, -1, 0); // add 1 month and subtract 1 day
    }

    /**
     * AllEventsHelperDate::monthbegin()
     *
     * @param mixed $date
     *
     * @return int
     */
    static function monthbegin($date)
    {
        // determine first day in month
        $tdate = getdate($date);
        $mbegin = mktime(0, 0, 0, $tdate["mon"], 1, $tdate["year"], -1);

        return $mbegin;
    }


    // convert UTC date/time to local/date time using JDate and PHP's DateTime class (new in PHP 5.3)

    /**
     * AllEventsHelperDate::toUserTime()
     *
     * @param string $time
     * @param integer $shortmode
     * @param integer $militarytime
     *
     * @return string
     */
    static function toUserTime($time = "00:00:00", $shortmode = 0, $militarytime = 12)
    {
        //$htmlstr = "";
        $times = explode(":", $time);
        $hour = isset($times[0]) ? intval($times[0]) : 0;
        $minute = isset($times[1]) ? intval($times[1]) : 0;
        //$second = isset($times[2]) ? intval($times[2]) : 0;
        if ($militarytime == 24) {
            $htmlstr = sprintf("%02d:%02d", $hour, $minute);
        } else {
            $ampm = ($shortmode == 0 ? "am" : "a");
            if ($hour >= 12) {
                $ampm = ($shortmode == 0 ? "pm" : "p");
                if ($hour >= 13)
                    $hour -= 12;
            } else
                if ($hour == 0) {
                    $hour = 12;
                }
            if ($minute > 0)
                $htmlstr = sprintf("%d:%02d%s", $hour, $minute, $ampm);
            else
                $htmlstr = sprintf("%d%s", $hour, $ampm);
        }

        return $htmlstr;
    }

    // convert local date/time to UTC date time using JDate and PHP's DateTime class (new in PHP 5.3)

    /**
     * AllEventsHelperDate::fromUserTime()
     *
     * @param mixed $usertime
     *
     * @return string
     */
    static function fromUserTime($usertime)
    {
        $times = explode(":", trim($usertime));
        $pmtime = false;
        $amtime = false;
        $count = 0;
        $hour = 0;
        $minute = 0;
        $second = 0;
        foreach ($times as $value) {
            switch ($count) {
                case 0:
                    $hour = intval($value) % 24;
                    break;
                case 1:
                    $minute = intval($value) % 60;
                    break;
                case 2:
                    $second = intval($value) % 60;
                    break;
            }
            if (strpos(strtolower($value), "pm") > 0) {
                $pmtime = true;
            }
            if (strpos(strtolower($value), "am") > 0) {
                $amtime = true;
            }
            $count += 1;
        }
        if ($pmtime && $hour < 12) {
            $hour += 12;
        }
        if ($amtime && $hour == 12) {
            $hour = 0;
        }
        $htmlstr = sprintf("%02d:%02d:%02d", $hour, $minute, $second);

        //echo $time . " => " . $htmlstr;
        return $htmlstr;
    }

    // return date, convert to absolute date if a relative date
    // absolute date is in the format yyyy-mm-dd
    // relative date uses y, m or d ("-2y": 2 years ago, "18m": 18 months after today, etc.)
    // relative date can include combined, comma separated values, i.e. "-1y,-1d" for 1 year and 1 day ago
    // date relative to current date or $rdate if specified

    /**
     * AllEventsHelperDate::toUTCDateTime()
     *
     * @param mixed $sqldate
     * @param string $timezone
     *
     * @return string
     * @throws Exception
     */
    static function toUTCDateTime($sqldate, $timezone = "UTC")
    {
        date_default_timezone_set("UTC");
        $date = JDate::getInstance($sqldate, $timezone);
        $offset = $date->getOffsetFromGmt();
        if ($offset >= 0)
            $date->sub(new DateInterval("PT" . $offset . "S"));
        else
            $date->add(new DateInterval("PT" . abs($offset) . "S"));

        return $date->toSql(true);
    }

    // format into iCal time format from Unix date/time stamp

    /**
     * AllEventsHelperDate::toiCalDateTime()
     *
     * @param mixed $datetime
     *
     * @return string
     */
    static function toiCalDateTime($datetime = null)
    {
        date_default_timezone_set('UTC');
        if ($datetime == null)
            $datetime = time();

        return gmdate("Ymd\THis", $datetime);
    }

    // format into iCal date format from Unix date/time stamp

    /**
     * AllEventsHelperDate::toiCalDate()
     *
     * @param mixed $datetime
     *
     * @return string
     */
    static function toiCalDate($datetime = null)
    {
        date_default_timezone_set('UTC');
        if ($datetime == null)
            $datetime = time();

        return gmdate("Ymd", $datetime);
    }
}
