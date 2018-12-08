<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

// Access check.
if (!JFactory::getUser()->authorise('core.orders', 'com_allevents')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

/**
 * AllEventsViewOrders
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewOrders extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;

    /**
     * AllEventsViewOrders::display()
     *
     * @param mixed $tpl
     *
     * @return mixed|void
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
        $this->searchterms = $this->state->get('filter.search');
        $this->params = AllEventsHelperParam::getGlobalParam();
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        AllEventsHelper::addSubmenu('orders');

        $this->addToolbar();
        $paymentStatus = [];
        $paymentStatus[] = JHtml::_('select.option', 'P', JText::_('AE_PSTATUS_PENDING'));
        $paymentStatus[] = JHtml::_('select.option', 'C', JText::_('AE_PSTATUS_COMPLETED'));
        $paymentStatus[] = JHtml::_('select.option', 'D', JText::_('AE_PSTATUS_DECLINED'));
        $paymentStatus[] = JHtml::_('select.option', 'E', JText::_('AE_PSTATUS_FAILED'));
        $paymentStatus[] = JHtml::_('select.option', 'UR', JText::_('AE_PSTATUS_UNDERREVIW'));
        $paymentStatus[] = JHtml::_('select.option', 'RF', JText::_('AE_PSTATUS_REFUNDED'));
        $paymentStatus[] = JHtml::_('select.option', 'CRV', JText::_('AE_PSTATUS_CANCEL_REVERSED'));
        $paymentStatus[] = JHtml::_('select.option', 'RV', JText::_('AE_PSTATUS_REVERSED'));
        $this->paymentStatus = $paymentStatus;

        $this->sidebar = JHtmlSidebar::render();
        // FREE
        JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_VERSION_FREE'), 'warning');
        // EERF
        parent::display($tpl);
    }

    /**
     * AllEventsViewOrders::addToolbar()
     *
     */
    protected function addToolbar()
    {
        require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/allevents.php';

        //$state = $this->get('State');
        $canDo = AllEventsHelper::getActions();

        JToolbarHelper::title(JText::_('PAYMENTS'), 'basket');
        if ($canDo->get('core.delete')) {
            JToolbarHelper::deleteList('', 'orders.remove', 'JTOOLBAR_EMPTY_TRASH');
        }

        // Set sidebar action - New in 3.0
        JHtmlSidebar::setAction('index.php?option=com_allevents&view=orders');

        $this->extra_sidebar = '';
    }

    /**
     * AllEventsViewOrders::getSortFields()
     *
     * @return array
     */
    protected function getSortFields()
    {
        return ['a.id DESC' => JText::_('JGRID_HEADING_ID_DESC')];
    }
}
