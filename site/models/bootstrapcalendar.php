<?php

defined('_JEXEC') or die;

if (!class_exists('AEModelItem'))
    require(JPATH_COMPONENT . '/helpers/aemodel.php');

if (!class_exists('AEModelAEhelper'))
    require(JPATH_COMPONENT . '/helpers/aehelper.php');

/**
 * AllEventsModelBootstrapcalendar
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelBootstrapcalendar extends AEModelItem
{
    /**
     * AllEventsModelBootstrapcalendar::getEvents()
     *
     * @return stdClass
     * @throws Exception
     */
    public function getEvents()
    {
        $this->startAEModel();
        $input = JFactory::getApplication()->input;
        // $this->addParam('a', $input->getInt('a'));
        // $this->addParam('l', $input->getInt('l'));
        // $this->addParam('p', $input->getInt('p'));
        $this->addParam('dc', $input->getInt('dc'));
        $this->addParam('end', $input->getFloat('to') / 1000);
        $this->addParam('start', $input->getFloat('from') / 1000);
        $this->addParam('view', 'aebs');
        $tabAgendas = trim(json_decode($input->getString('tabAgendas'), true));
        if (isset($tabAgendas) && !empty($tabAgendas)) {
            $this->addParam('tabAgendas', implode(",", $tabAgendas));
        }

        $structure = ['event' => [
            'id' => '',
            'titre' => '',
            'date' => '',
            'enddate' => '',
            'classNameBS' => '',
            'link' => '']];

        $ret = $this->getMyEvents($structure);

        return $ret;
    }
}
