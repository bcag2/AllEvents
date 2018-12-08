<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsViewBuy
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */
class AllEventsViewBuy extends JViewLegacy
{
    protected $state;
    protected $item;
    protected $form;
    protected $params;
    protected $globalparams;
    protected $enrolments;
    protected $print;

    /**
     * AllEventsViewBuy::display()
     *
     * @param mixed $tpl
     *
     * @return bool
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $app = JFactory::getApplication();

        $this->state = $this->get('State');
        $this->item = $this->get('Data');


        $this->item = new stdClass();
        $this->item->id = 16;
        $this->item->titre = "Mon premier évènement";
        $this->item->date = "";
        $this->item->enddate = "";
        $this->item->allday = 0;
        $this->item->available_tickets = 25;
        $this->item->price = 150;

        if (empty($this->item->titre)) {
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_ERROR_EVENT_NOT_FOUND'), 'error');

            return false;
        }

        // debut gateway
        $dispatcher = JEventDispatcher::getInstance();
        JPluginHelper::importPlugin('payment');
        $com_params = JComponentHelper::getParams('com_allevents');
        $gatewaysconfig = $com_params->get('gateways');
        $gateways = [];

        if (!empty($gatewaysconfig)) {
            $gateways = $dispatcher->trigger('onTP_GetInfo', [$gatewaysconfig]);
        }
        $newgateways = [];
        foreach ($gateways as $gateway) {
            if (!empty($gateway->id)) {
                if (empty($gateway->name)) {
                    $gateway->name = $gateway->id;
                }

                $newgateways[] = $gateway;
            }
        }
        $this->gateways = $newgateways;
//--- fin gateway
        $this->form = $this->get('Form');
        $this->params = AllEventsHelperParam::getGlobalParam();

        $this->_prepareDocument();

        parent::display($tpl);
// Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        return true;
    }

    /**
     * AllEventsViewBuy::_prepareDocument()
     *
     */
    protected function _prepareDocument()
    {
        $app = JFactory::getApplication();
        $menus = $app->getMenu();
        $title = null;
// Because the application sets a default page title,
// we need to get it from the menu item itself
        $menu = $menus->getActive();
        if ($menu) {
            $this->params->def('page_heading', $this->params->get('page_title', $menu->title));
        } else {
            $this->params->def('page_heading', JText::_('COM_ALLEVENTS_DEFAULT_PAGE_TITLE'));
        }
        $title = $this->params->get('page_title', '');
        if (empty($title)) {
            $title = JText::sprintf('JPAGETITLE', $this->item->titre, $app->get('sitename'));
        } elseif ($app->get('sitename_pagetitles', 0) == 1) {
            $title = JText::sprintf('JPAGETITLE', $app->get('sitename'), $title);
        } elseif ($app->get('sitename_pagetitles', 0) == 2) {
            $title = JText::sprintf('JPAGETITLE', $title, $app->get('sitename'));
        }
        $this->document->setTitle($title . ' | ' . $this->item->titre);

        if ($this->print) {
            $this->document->setMetaData('robots', 'noindex, nofollow');
        }
    }

    /**
     * AllEventsViewBuy::getToolbar()
     *
     * @return string
     */
    function getToolbar()
    {
        $bar_render = '';

        return $bar_render;
    }
}
