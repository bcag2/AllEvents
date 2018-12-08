<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
define('_JEXEC', 1);

$path = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if (isset($_SERVER["SCRIPT_FILENAME"])) {
    $path = dirname(dirname(dirname(dirname(dirname($_SERVER["SCRIPT_FILENAME"])))));
}

define('JPATH_BASE', $path);
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';
JLoader::import('components.com_allevents.helpers.allevents', JPATH_ADMINISTRATOR);

JLog::addLogger([
    'text_file' => 'com_alleventss.cli.notify.errors.php'
], JLog::ERROR, 'com_allevents');

JLog::addLogger([
    'text_file' => 'com_alleventss.cli.notify.php'
], JLog::NOTICE, 'com_allevents');

error_reporting(E_ALL);
ini_set('display_errors', 1);

set_error_handler("AEErrorHandler");

/**
 * @param $error_level
 * @param $error_message
 * @param $error_file
 * @param $error_line
 * @param $error_context
 */
function AEErrorHandler($error_level, $error_message, $error_file, $error_line, $error_context)
{
    JLog::add('Fatal Error during fetch! Exception is in file ' . $error_file . ' on line ' . $error_line . ': ' . PHP_EOL . $error_message,
        JLog::ERROR, 'com_allevents');
}

JLog::add('Starting with the AllEvents notification', JLog::DEBUG, 'com_allevents');

/**
 * AllEventsEventNotifier
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsEventNotifier extends JApplicationCli
{
    /**
     * AllEventsEventNotifier::getRouter()
     *
     * @param string $name
     * @param array $options
     *
     * @return JRouter|null
     */
    public static function getRouter($name = '', array $options = [])
    {
        JLoader::import('joomla.application.router');

        try {
            return new JRouter($options);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * AllEventsEventNotifier::doExecute()
     *
     */
    public function doExecute()
    {
        try {
            JLog::add('Loading the database configuration', JLog::DEBUG, 'com_allevents');
            $config = JFactory::getConfig();

            // Disabling session handling otherwise it will result in an error
            $config->set('session_handler', 'none');

            // Setting HOST
            $_SERVER['HTTP_HOST'] = $config->get('live_site');

            $db = JFactory::getDbo();
            $now = $db->quote(AllEventsHelper::getDate()->format('Y-m-d H:i:00'));

            // $now = "'2014-07-17 06:00:00'";

            $query = $db->getQuery(true)
                ->select('a.*')
                ->from('#__allevents_enrolments a');
            $query->join('RIGHT', $db->quoteName('#__allevents_events') . ' as e ON e.id = a.event_id');
            $query->where('a.reminder_sent_date is null');
            $query->where('e.state = 1');
            $query->where('a.state = 1');
            $query->where('e.start_date > ' . $now);
            $query->where(
                "(case when a.remind_type = 1
            then " . $now . " + interval a.remind_time minute <= e.start_date and
                 " . $now . " + interval 1 minute + interval a.remind_time minute > e.start_date
            when a.remind_type = 2
            then " . $now . " + interval a.remind_time hour <= e.start_date and
                 " . $now . " + interval 1 minute + interval a.remind_time hour > e.start_date
            when a.remind_type = 3
            then " . $now . " + interval a.remind_time day <= e.start_date and
                 " . $now . " + interval 1 minute + interval a.remind_time day > e.start_date
            when a.remind_type = 4
            then " . $now . " + interval 7*a.remind_time day <= e.start_date and
                 " . $now . " + interval 1 minute + interval 7*a.remind_time day > e.start_date
            when a.remind_type = 5
            then " . $now . " + interval a.remind_time month <= e.start_date and
                 " . $now . " + interval 1 minute + interval a.remind_time month > e.start_date
            end) > 0");
            $db->setQuery($query);

            JLog::add('Loading the events to notify which should be notified for ' . $now, JLog::DEBUG, 'com_allevents');

            $result = $db->loadObjectList();

            JLog::add('Found ' . count($result) . ' enrolment to notify', JLog::DEBUG, 'com_allevents');

            foreach ($result as $enrolment) {
                $this->send($enrolment);
            }

            JLog::add('Finished to send out the notification for ' . count($result) . ' bookings', JLog::DEBUG, 'com_allevents');
        } catch (Exception $e) {
            JLog::add('Error checking notifications! Exception is: ' . PHP_EOL . $e, JLog::ERROR, 'com_allevents');
        }
    }

    /**
     * AllEventsEventNotifier::send()
     *
     * @param $enrolment
     */
    private function send($enrolment)
    {
        try {
            JLog::add('Starting to send out the notificaton for the booking with the id: ' . $enrolment->id, JLog::DEBUG, 'com_allevents');
            JLog::add('Loading the event with the id: ' . $enrolment->event_id, JLog::DEBUG, 'com_allevents');

            JLoader::register('AllEventsTableEvent', JPATH_ADMINISTRATOR . '/components/com_allevents/tables/event.php');
            JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_allevents/models');
            $model = JModelLegacy::getInstance('Event', 'AllEventsModel');
            $event = $model->getItem($enrolment->event_id);
            if (empty($event)) {
                return;
            }
            $events = [$event];

            JLog::add('Setting up the texts', JLog::DEBUG, 'com_allevents');

            $siteLanguage = JComponentHelper::getParams('com_languages')->get('site', $this->get('language', 'en-GB'));
            JFactory::getConfig()->set('language', JUser::getInstance($enrolment->user_id)->getParam('language', $siteLanguage));
            JFactory::$language = null;
            JFactory::getLanguage()->load('com_allevents', JPATH_ADMINISTRATOR . '/components/com_allevents');

            $subject = AllEventsHelper::renderEvents($events, JText::_('com_allevents_BOOK_NOTIFICATION_EVENT_SUBJECT'), null);

            $variables = [
                'sitename' => JFactory::getConfig()->get('sitename'),
                'user' => JFactory::getUser()->name
            ];
            $variables['hasLocation'] = !empty($events[0]->locations);
            $body = AllEventsHelper::renderEvents($events, JText::_('com_allevents_BOOK_NOTIFICATION_EVENT_BODY'), null, $variables);

            JLog::add('Sending the mail to ' . $enrolment->email, JLog::DEBUG, 'com_allevents');
            $mailer = JFactory::getMailer();
            $mailer->setSubject($subject);
            $mailer->setBody($body);
            $mailer->IsHTML(true);
            $mailer->AddAddress($enrolment->email);
            $mailer->Send();

            $db = JFactory::getDbo();

            JLog::add('Setting the reminder send date to now', JLog::DEBUG, 'com_allevents');
            $query = $db->getQuery(true)->update('#__dpcalendar_tickets');
            $query->set('reminder_sent_date=' . $db->quote(AllEventsHelper::getDate()->toSql()));
            $query->where('id=' . (int)$enrolment->id);
            $db->setQuery($query);
            $db->query();
        } catch (Exception $e) {
            JLog::add('Error sending mail! Exception is: ' . PHP_EOL . $e, JLog::ERROR, 'com_allevents');
        }
        JLog::add('Finished to send out the notificaton for the booking with the id: ' . $enrolment->id, JLog::DEBUG, 'com_allevents');
    }

    /**
     * AllEventsEventNotifier::getCfg()
     *
     * @param      $varname
     * @param null $default
     *
     * @return mixed
     */
    public function getCfg($varname, $default = null)
    {
        $config = JFactory::getConfig();

        return $config->get('' . $varname, $default);
    }

    /**
     * AllEventsEventNotifier::getMenu()
     *
     * @param string $name
     * @param array $options
     *
     * @return null
     */
    public function getMenu($name = 'AllEvents', $options = [])
    {
        try {
            return JMenu::getInstance($name, $options);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * AllEventsEventNotifier::isSite()
     *
     */
    public function isSite()
    {
        return true;
    }

    /**
     * AllEventsEventNotifier::isAdmin()
     *
     */
    public function isAdmin()
    {
        return false;
    }

    /**
     * AllEventsEventNotifier::getLanguageFilter()
     *
     */
    public function getLanguageFilter()
    {
        return false;
    }

    /**
     * AllEventsEventNotifier::getParams()
     *
     */
    public function getParams()
    {
        return new JRegistry();
    }

    /**
     * AllEventsEventNotifier::getUserStateFromRequest()
     *
     * @param        $key
     * @param        $request
     * @param null $default
     * @param string $type
     *
     * @return null
     */
    public function getUserStateFromRequest($key, $request, $default = null, $type = 'none')
    {
        $cur_state = $this->getUserState($key, $default);
        $new_state = $this->input->get($request, null, $type);

        // Save the new value only if it was set in this request.
        if ($new_state !== null) {
            $this->setUserState($key, $new_state);
        } else {
            $new_state = $cur_state;
        }

        return $new_state;
    }

    /**
     * AllEventsEventNotifier::getUserState()
     *
     * @param      $key
     * @param null $default
     *
     * @return null
     */
    public function getUserState($key, $default = null)
    {
        $session = JFactory::getSession();
        $registry = $session->get('registry');

        if (!is_null($registry)) {
            return $registry->get($key, $default);
        }

        return $default;
    }

    /**
     * AllEventsEventNotifier::setUserState()
     *
     * @param $key
     * @param $value
     *
     * @return null
     */
    public function setUserState($key, $value)
    {
        $session = JFactory::getSession();
        $registry = $session->get('registry');

        if (!is_null($registry)) {
            return $registry->set($key, $value);
        }

        return null;
    }

    /**
     * AllEventsEventNotifier::getTemplate()
     *
     * @param bool $params
     *
     * @return string
     */
    public function getTemplate($params = false)
    {
        return 'isis';
    }

    /**
     * AllEventsEventNotifier::getClientId()
     *
     */
    public function getClientId()
    {
        return 10000;
    }
}

JApplicationCli::getInstance('AllEventsEventNotifier')->execute();
