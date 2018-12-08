<?php

defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

/**
 * AllEventsClassCalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsClassCalendar
{
    /**
     * AllEventsClassCalendar::MakeCalendar()
     *
     */
    public static function MakeCalendar()
    {
        $db = JFactory::getDbo();

        $sql = "DELETE FROM `#__allevents_calendar` ; ";

        $db->setQuery($sql);
        $db->execute();

        $sql = "INSERT INTO `#__allevents_calendar` (dt)
                SELECT DATE('2010-01-01') + INTERVAL a.i*10000 + b.i*1000 + c.i*100 + d.i*10 + e.i DAY
                FROM (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) a 
                JOIN (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) b 
                JOIN (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) c 
                JOIN (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) d 
                JOIN (SELECT 0 i UNION SELECT 1 UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9) e
                WHERE (a.i*10000 + b.i*1000 + c.i*100 + d.i*10 + e.i) <= 11322
                ORDER BY 1;";

        $db->setQuery($sql);
        $db->execute();

        $sql = "UPDATE `#__allevents_calendar`
                SET isWeekday = CASE WHEN dayofweek(dt) IN (1,7) THEN 0 ELSE 1 END,
                    y = YEAR(dt),
                    q = quarter(dt),
                    m = MONTH(dt),
                    d = dayofmonth(dt),
                    dw = dayofweek(dt),
                    monthname = monthname(dt),
                    dayname = dayname(dt),
                    w = week(dt);";

        $db->setQuery($sql);
        $db->execute();
    }
}
