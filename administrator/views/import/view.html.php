<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');
// Access check.
if (!JFactory::getUser()->authorise('core.admin', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewImport
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewImport extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;

    /**
     * AllEventsViewImport::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->form = $this->get('Form');
        if (!class_exists('AllEventsHelperParam'))
            require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
        $this->params = AllEventsHelperParam::getGlobalParam();
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }
        AllEventsHelper::addSubmenu('import');

        $this->setLayout('importical');
        $this->addToolbar();

        $this->sidebar = JHtmlSidebar::render();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * AllEventsViewImport::addToolbar()
     *
     */
    protected function addToolbar()
    {
        JToolbarHelper::title(JText::_("COM_ALLEVENTS_TITLE_IMPORT"), 'download');
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=import');
        JToolbarHelper::cancel('import.cancel', 'JTOOLBAR_CLOSE');
        JToolbarHelper::custom('import.importical', 'download.png', 'download_f2.png', 'COM_ALLEVENTS_TITLE_IMPORT', false);
    }

    /**
     * AllEventsViewImport::getHolidayCountries()
     *
     * @return array
     */
    function getHolidayCountries()
    {
        $countries = [
            (object)["value" => "", "text" => JText::_("AE_SELECT_COUNTRY")],
            (object)["value" => "ago", "text" => "Angola"],
            (object)["value" => "aus", "text" => "Australia"],
            (object)["value" => "aut", "text" => "Austria"],
            (object)["value" => "bel", "text" => "Belgium"],
            (object)["value" => "can", "text" => "Canada"],
            (object)["value" => "chn", "text" => "China"],
            (object)["value" => "hrv", "text" => "Croatia"],
            (object)["value" => "cze", "text" => "Czech Republic"],
            (object)["value" => "dnk", "text" => "Denmark"],
            (object)["value" => "eng", "text" => "England"],
            (object)["value" => "est", "text" => "Estonia"],
            (object)["value" => "fin", "text" => "Finland"],
            (object)["value" => "fra", "text" => "France"],
            (object)["value" => "ger", "text" => "Germany"],
            (object)["value" => "hkg", "text" => "Hong Kong"],
            (object)["value" => "hun", "text" => "Hungary"],
            (object)["value" => "isl", "text" => "Iceland"],
            (object)["value" => "irl", "text" => "Ireland"],
            (object)["value" => "imn", "text" => "Isle of Man"],
            (object)["value" => "isr", "text" => "Israel"],
            (object)["value" => "ita", "text" => "Italy"],
            (object)["value" => "jpn", "text" => "Japan"],
            (object)["value" => "lva", "text" => "Latvia"],
            (object)["value" => "ltu", "text" => "Lithuania"],
            (object)["value" => "lux", "text" => "Luxembourg"],
            (object)["value" => "mex", "text" => "Mexico"],
            (object)["value" => "nld", "text" => "Netherlands"],
            (object)["value" => "nzl", "text" => "New Zealand"],
            (object)["value" => "nir", "text" => "Northern Ireland"],
            (object)["value" => "nor", "text" => "Norway"],
            (object)["value" => "pol", "text" => "Poland"],
            (object)["value" => "prt", "text" => "Portugal"],
            (object)["value" => "rus", "text" => "Russia"],
            (object)["value" => "srb", "text" => "Serbia"],
            (object)["value" => "svk", "text" => "Slovakia"],
            (object)["value" => "svn", "text" => "Slovenia"],
            (object)["value" => "zaf", "text" => "South Africa"],
            (object)["value" => "rok", "text" => "South Korea"],
            (object)["value" => "swe", "text" => "Sweden"],
            (object)["value" => "ukr", "text" => "Ukraine"],
            (object)["value" => "usa", "text" => "United States"],
            (object)["value" => "wal", "text" => "Wales"]];

        return $countries;
    }

    /**
     * AllEventsViewImport::getHolidayRegions()
     *
     * @param $country
     *
     * @return mixed
     */
    function getHolidayRegions($country)
    {
        $regions = [
            "aus" => [
                (object)["value" => "Australian+Capital+Territory", "text" => "Australian Capital Territory"],
                (object)["value" => "Queensland", "text" => "Queensland"],
                (object)["value" => "New+South+Wales", "text" => "New South Wales"],
                (object)["value" => "Northern+Territory", "text" => "Northern Territory"],
                (object)["value" => "South+Australia", "text" => "South Australia"],
                (object)["value" => "Tasmania", "text" => "Tasmania"],
                (object)["value" => "Victoria", "text" => "Victoria"],
                (object)["value" => "Western+Australia", "text" => "Western Australia"]],
            "can" => [
                (object)["value" => "Alberta", "text" => "Alberta"],
                (object)["value" => "British+Columbia", "text" => "British Columbia"],
                (object)["value" => "Manitoba", "text" => "Manitoba"],
                (object)["value" => "New+Brunswick", "text" => "New Brunswick"],
                (object)["value" => "Newfoundland+and+Labrador", "text" => "Newfoundland and Labrador"],
                (object)["value" => "Northwest+Territories", "text" => "Northwest Territories"],
                (object)["value" => "Nova+Scotia", "text" => "Nova Scotia"],
                (object)["value" => "Nunavut", "text" => "Nunavut"],
                (object)["value" => "Ontario", "text" => "Ontario"],
                (object)["value" => "Prince+Edward+Island", "text" => "Prince Edward Island"],
                (object)["value" => "Quebec", "text" => "Quebec"],
                (object)["value" => "Saskatchewan", "text" => "Saskatchewan"],
                (object)["value" => "Yukon", "text" => "Yukon"]],
            "fra" => [(object)["value" => "Alsace", "text" => "Alsace"], (object)["value" => "Moselle", "text" => "Moselle"]],
            "ger" => [
                (object)["value" => "Baden-Wurttemberg", "text" => "Baden-Wurttemberg"],
                (object)["value" => "Bavaria", "text" => "Bavaria"],
                (object)["value" => "Berlin", "text" => "Berlin"],
                (object)["value" => "Brandenburg", "text" => "Brandenburg"],
                (object)["value" => "Bremen", "text" => "Bremen"],
                (object)["value" => "Hamburg", "text" => "Hamburg"],
                (object)["value" => "Hesse", "text" => "Hesse"],
                (object)["value" => "Mecklenburg-Vorpommern", "text" => "Mecklenburg-Vorpommern"],
                (object)["value" => "Lower+Saxony", "text" => "Lower Saxony"],
                (object)["value" => "North+Rhine-Westphalia", "text" => "North Rhine-Westphalia"],
                (object)["value" => "Rhineland-Palatinate", "text" => "Rhineland-Palatinate"],
                (object)["value" => "Saarland", "text" => "Saarland"],
                (object)["value" => "Saxony", "text" => "Saxony"],
                (object)["value" => "Saxony-Anhalt", "text" => "Saxony-Anhalt"],
                (object)["value" => "Schleswig-Holstein", "text" => "Schleswig-Holstein"],
                (object)["value" => "Thuringia", "text" => "Thuringia"]],
            "nzl" => [
                (object)["value" => "Auckland", "text" => "Auckland"],
                (object)["value" => "Canterbury", "text" => "Canterbury"],
                (object)["value" => "Chatham+Islands", "text" => "Chatham Islands"],
                (object)["value" => "Hawkes' Bay", "text" => "Hawkes' Bay"],
                (object)["value" => "Marlborough", "text" => "Marlborough"],
                (object)["value" => "Nelson", "text" => "Nelson"],
                (object)["value" => "Otago", "text" => "Otago"],
                (object)["value" => "South+Canterbury", "text" => "South Canterbury"],
                (object)["value" => "Southland", "text" => "Southland"],
                (object)["value" => "Taranaki", "text" => "Taranaki"],
                (object)["value" => "Wellington", "text" => "Wellington"],
                (object)["value" => "Westland", "text" => "Westland"]],
            "usa" => [
                (object)["value" => "Alabama", "text" => "Alabama"],
                (object)["value" => "Alaska", "text" => "Alaska"],
                (object)["value" => "Arizona", "text" => "Arizona"],
                (object)["value" => "Arkansas", "text" => "Arkansas"],
                (object)["value" => "California", "text" => "California"],
                (object)["value" => "Colorado", "text" => "Colorado"],
                (object)["value" => "Connecticut", "text" => "Connecticut"],
                (object)["value" => "Delaware", "text" => "Delaware"],
                (object)["value" => "District+Of+Columbia", "text" => "District Of Columbia"],
                (object)["value" => "Florida", "text" => "Florida"],
                (object)["value" => "Georgia", "text" => "Georgia"],
                (object)["value" => "Hawaii", "text" => "Hawaii"],
                (object)["value" => "Idaho", "text" => "Idaho"],
                (object)["value" => "Illinois", "text" => "Illinois"],
                (object)["value" => "Indiana", "text" => "Indiana"],
                (object)["value" => "Iowa", "text" => "Iowa"],
                (object)["value" => "Kansas", "text" => "Kansas"],
                (object)["value" => "Kentucky", "text" => "Kentucky"],
                (object)["value" => "Louisiana", "text" => "Louisiana"],
                (object)["value" => "Maine", "text" => "Maine"],
                (object)["value" => "Maryland", "text" => "Maryland"],
                (object)["value" => "Massachusetts", "text" => "Massachusetts"],
                (object)["value" => "Michigan", "text" => "Michigan"],
                (object)["value" => "Minnesota", "text" => "Minnesota"],
                (object)["value" => "Mississippi", "text" => "Mississippi"],
                (object)["value" => "Missouri", "text" => "Missouri"],
                (object)["value" => "Montana", "text" => "Montana"],
                (object)["value" => "Nebraska", "text" => "Nebraska"],
                (object)["value" => "Nevada", "text" => "Nevada"],
                (object)["value" => "New+Hampshire", "text" => "New Hampshire"],
                (object)["value" => "New+Jersey", "text" => "New Jersey"],
                (object)["value" => "New+Mexico", "text" => "New Mexico"],
                (object)["value" => "New+York", "text" => "New York"],
                (object)["value" => "North+Carolina", "text" => "North Carolina"],
                (object)["value" => "North+Dakota", "text" => "North Dakota"],
                (object)["value" => "Ohio", "text" => "Ohio"],
                (object)["value" => "Oklahoma", "text" => "Oklahoma"],
                (object)["value" => "Oregon", "text" => "Oregon"],
                (object)["value" => "Pennsylvania", "text" => "Pennsylvania"],
                (object)["value" => "Rhode+Island", "text" => "Rhode Island"],
                (object)["value" => "South+Carolina", "text" => "South Carolina"],
                (object)["value" => "South+Dakota", "text" => "South Dakota"],
                (object)["value" => "Tennessee", "text" => "Tennessee"],
                (object)["value" => "Texas", "text" => "Texas"],
                (object)["value" => "Utah", "text" => "Utah"],
                (object)["value" => "Vermont", "text" => "Vermont"],
                (object)["value" => "Virginia", "text" => "Virginia"],
                (object)["value" => "Washington", "text" => "Washington"],
                (object)["value" => "West+Virginia", "text" => "West Virginia"],
                (object)["value" => "Wisconsin", "text" => "Wisconsin"],
                (object)["value" => "Wyoming", "text" => "Wyoming"]]];

        return @$regions[$country];
    }
}
