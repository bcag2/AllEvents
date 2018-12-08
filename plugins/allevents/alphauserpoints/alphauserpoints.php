<?php

defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

$document = JFactory::getDocument();
$docType = $document->getType();
// only in html
if ($docType != 'html') {
    return;
}

/**
 * plgAlleventsAlphaUserPoints
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsAlphaUserPoints extends JPlugin
{
    /**
     * plgAlleventsAlphaUserPoints::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        JPlugin::loadLanguage('plg_allevents_alphauserpoints', JPATH_ADMINISTRATOR);
    }

    /**
     * plgAlleventsAlphaUserPoints::onAfterAlleventsSendMailEnrolment()
     *
     * @param mixed $item
     *
     * @return bool
     * @internal param mixed $isNew
     */
    public function onAfterAlleventsSendMailEnrolment(&$item)
    {
        $api_AUP = JPATH_SITE . DS . 'components' . DS . 'com_alphauserpoints' . DS . 'helper.php';
        if (file_exists($api_AUP)) {
            require_once($api_AUP);
            AlphaUserPointsHelper::newpoints('sysplgaup_enrolment');
        }

        return true;
    }

    /**
     * plgAlleventsAlphaUserPoints::onAfterAlleventsEnrolAvailable()
     *
     * @param mixed $item
     *
     * @return bool
     * @internal param mixed $isNew
     */
    public function onBeforeAlleventsEnrolAvailable(&$item)
    {
        /** Vérification du solde AUP */
        $api_AUP = JPATH_SITE . DS . 'components' . DS . 'com_alphauserpoints' . DS . 'helper.php';
        if (file_exists($api_AUP)) {
            require_once($api_AUP);
        }
        $user = JFactory::getUser();
        //$useridaup = $user->id;
        //Check user points
        $referreid = AlphaUserPointsHelper::getAnyUserReferreID($user->id);
        $profil = AlphaUserPointsHelper::getUserInfo($referreid);
        //$points = $profil->points;
        if ($profil->points == '0.00') {
            return false;
        }

        return true;
    }

    /**
     * plgAlleventsAlphaUserPoints::onAfterAlleventsSave()
     *
     * @param mixed $item
     * @param mixed $isNew
     *
     * @return bool
     */
    public function onAfterAlleventsSave(&$item, $isNew)
    {
        return true;
    }
}
