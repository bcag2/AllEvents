<?php

defined('_JEXEC') or die;

if (!class_exists('AEModelItem'))
    require(JPATH_COMPONENT . '/helpers/aemodel.php');

if (!class_exists('AEModelAEhelper'))
    require(JPATH_COMPONENT . '/helpers/aehelper.php');

/**
 * AllEventsModelbuy
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelbuy extends AEModelItem
{
    /**
     * AllEventsModelbuy::getEvent()
     *
     * @return string
     */
    public function getData()
    {
        $this->startAEModel();
        //$input = JFactory::getApplication()->input;
        // $structure = array('event' => array(
        // 'id' => '',
        // 'titre' => '',
        // 'date' => '',
        // 'enddate' => '',
        // 'classNameBS' => '',
        // 'link' => ''));

        // $ret = $this->getMyEvents($structure);
        $ret = "";

        return $ret;
    }
}
