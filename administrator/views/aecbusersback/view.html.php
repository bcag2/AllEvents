<?php
defined('_JEXEC') or die;

/**
 * AllEventsViewAECBUsersBack
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

/**
 * View class for a list of CB users.
 */
class AllEventsViewAECBUsersBack extends JViewLegacy
{
    /**
     * The item data.
     *
     * @var object
     */
    protected $items;

    /**
     * The pagination object.
     *
     * @var JPagination
     */
    protected $pagination;

    /**
     * The model state.
     *
     * @var JObject
     */
    protected $state;

    /**
     * Display the view
     *
     * @param string $tpl
     *            The name of the template file to parse; automatically searches through the template paths.
     *
     * @return boolean
     */
    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
        if (count($errors = $this->get('Errors'))) {
            return false;
        }

        parent::display($tpl);

        return true;
    }

    /**
     * Returns an array of fields the table can be sorted by
     *
     * @return array Array containing the field name to sort by as the key and display text as value
     */
    protected function getSortFields()
    {
        return ['ju.name' => JText::_('COM_ALLEVENTS_USERNAME'), 'ju.username' => JText::_('JGLOBAL_USERNAME'),
            'ju.email' => JText::_('JGLOBAL_EMAIL'), 'cbu.id' => JText::_('JGRID_HEADING_ID')];
    }
}
