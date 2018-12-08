<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * AllEventsControllerImport
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsControllerExport extends JControllerAdmin
{
    /**
     * AllEventsControllerExport::exportevents()
     *
     * @return void
     */
    public function exportevents()
    {
        $this->sendHeaders("events.csv");
        $this->getModel()->getCSVevents();
        jexit();
    }

    /**
     * AllEventsControllerExport::sendHeaders()
     *
     * @param string $filename
     * @param string $contentType
     *
     * @return void
     */
    private function sendHeaders($filename = 'export.csv', $contentType = 'text/csv')
    {
        header("Content-type: " . $contentType . ";");
        header("Content-Disposition: attachment; filename=" . $filename);
        header("Pragma: no-cache");
        header("Expires: 0");
    }

    /**
     * AllEventsControllerExport::getModel()
     *
     * @param string $name
     * @param string $prefix
     * @param array $config
     *
     * @return object
     */
    public function getModel($name = 'Export', $prefix = 'AllEventsModel', $config = [])
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }

    /**
     * AllEventsControllerExport::exportcategories()
     *
     * @return void
     */
    public function exportcategories()
    {
        $this->sendHeaders("categories.csv");
        $this->getModel()->getCSVcategories();
        jexit();
    }

    /**
     * AllEventsControllerExport::exportagendas()
     *
     * @return void
     */
    public function exportagendas()
    {
        $this->sendHeaders("calendars.csv");
        $this->getModel()->getCSVagendas();
        jexit();
    }

    /**
     * AllEventsControllerExport::exportplaces()
     *
     * @return void
     */
    public function exportplaces()
    {
        $this->sendHeaders("venues.csv");
        $this->getModel()->getCSVplaces();
        jexit();
    }
}
