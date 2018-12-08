<?php

/**
 * facebook notify
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

define('_JEXEC', 1);

define('JPATH_BASE', realpath(dirname(__file__) . "/../../../../"));
require_once(JPATH_BASE . '/includes/defines.php');
require_once(JPATH_BASE . '/includes/framework.php');

jimport('joomla.plugin.helper');

require_once(JPATH_BASE . '/libraries/joomla/factory.php');
$app = JFactory::getApplication('site');

if (JPluginHelper::isEnabled('allevents', 'aesocial')) {
    $plugin = JPluginHelper::getPlugin('allevents', 'aesocial');
    // get plugin parameter
    if (class_exists('JParameter')) {
        jimport('joomla.html.parameter');
        $pluginParams = new JParameter($plugin->params);
    } else {
        jimport('joomla.registry.registry');
        $pluginParams = new JRegistry($plugin->params);
    }

    if ($pluginParams->get('enable_notification_comment') == '1') {
        if ((isset($_REQUEST['href'])) && ($_REQUEST['href'] != '')) {
            $href = $_REQUEST['href'];
            if (preg_match('%^(|http:|https:)//www\.facebook\.com.*?url=(.*?)$%im', $href, $regs)) {
                $href = urldecode($regs[2]);
                if (preg_match('%^(|http:|https:)//' . $_SERVER['HTTP_HOST'] . '.*?$%i', $href, $regs)) {
                    notify($href, $app);
                }
            } elseif (preg_match('%^(|http:|https:)//' . $_SERVER['HTTP_HOST'] . '.*?$%i', $href, $regs)) {
                notify($href, $app);
            }
        }
    }
}

/**
 * notify()
 *
 * @param mixed $href
 * @param mixed $app
 *
 * @return void
 */
function notify($href, &$app)
{
    $app->initialise();
    $mailer = JFactory::getMailer();
    $config = new JConfig();
    $sender = [$config->mailfrom, $config->fromname];
    $mailer->setSender($sender);
    $mailer->addRecipient($config->mailfrom);
    $mailer->setSubject("New comment");
    $mailer->setBody("There is a new comment on " . $config->sitename . " for this <a href='" . $href . "'>page</a>.");
    $mailer->isHtml(true);
    $mailer->Send();
    //return $send;
}
