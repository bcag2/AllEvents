<?php
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * AllEventsViewEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsViewEvent extends JViewLegacy
{
    protected $user;
    protected $afterdisplayeventblock;
    protected $beforedisplayeventblock;
    protected $comments;
    protected $enrolments;
    protected $enrolmentsblock;
    protected $form;
    protected $globalparams;
    protected $item;
    protected $params;
    protected $print;
    protected $richsnippetsblock;
    protected $state;

    /**
     * AllEventsViewEvent::display()
     * Execute and display a template script.
     *
     * @param string $tpl The name of the template file to parse; automatically searches through the template paths.
     *
     * @return bool|mixed A string if successful, otherwise an Error object.
     * @throws Exception
     */
    public function display($tpl = null)
    {
        $app = JFactory::getApplication();
        $user = JFactory::getUser();
        $dispatcher = JEventDispatcher::getInstance();

        $this->item = $this->get('Data');
        $this->print = $app->input->getBool('print');
        $this->state = $this->get('State');
        $this->user = $user;
        $this->enrolments = $this->get('Enrolments');
        $this->form = $this->get('Form');
        $this->params = AllEventsHelperParam::getGlobalParam();

        if ($this->item == '403') {
            if ($this->user->get('guest')) {
                $return = base64_encode(JUri::getInstance());
                $login_url_with_return = JRoute::_('index.php?option=com_users&view=login&return=' . $return);
                $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'notice');
                $app->redirect($login_url_with_return, 403);
            } else {
                $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'error');
                $app->setHeader('status', 403, true);

                return;
            }

            return;
        } elseif (empty($this->item->titre)) {
            $app->enqueueMessage(JText::_('COM_ALLEVENTS_ERROR_EVENT_NOT_FOUND'), 'error');
            $app->setHeader('status', 404, true);

            return;
        }
        // Check the view access to the article (the model has already computed the values).


        $layout = $app->input->getString('layout');

        JPluginHelper::importPlugin('content');
        $this->item->text = $this->item->description;
        JFactory::getApplication()->triggerEvent(
            'onContentPrepare',
            [
                'com_allevents.event',
                &$this->item,
                &$this->params,
                0
            ]
        );
        $this->item->description = $this->item->text;

        JPluginHelper::importPlugin('allevents');
        $this->comments = $dispatcher->trigger('onAlleventsCommentsBlock', [&$this->item]);
        $this->enrolmentsblock = $dispatcher->trigger('onAlleventsEnrolmentsBlock', [
            &$this->item,
            &$this->enrolments,
            &$this->params]);
        $this->richsnippetsblock = $dispatcher->trigger('onAlleventsRichSnippetsEvent', [&$this->item, &$this->params]);
        $dispatcher->trigger('onAlleventsEventPrepare', [&$this->item, &$this->params]);
        $this->beforedisplayeventblock = $dispatcher->trigger('onAlleventsBeforeDisplayEvent', [&$this->item, &$this->params]);
        $this->afterdisplayeventblock = $dispatcher->trigger('onAlleventsAfterDisplayEvent', [&$this->item, &$this->params]);
        $dispatcher->trigger('onAlleventsOpenGraphEvent', [&$this->item, &$this->params]);
        $dispatcher->trigger('onAlleventsTwitterCardEvent', [&$this->item, &$this->params]);

        $vcal = $app->input->getString('vcal');
        if ($vcal) {
            $tpl = 'vcal';
        }
        $this->_prepareDocument();
        $layout = (empty($layout)) ? $this->params['gtemplateevent'] : $layout;

        if (strpos($layout, ':') !== false) {
            $temp = explode(':', $layout);
            $layoutPath = JPATH_ROOT . '/plugins/allevents/' . $temp[0] . '/layouts/' . $temp[1] . '.php';
            if (file_exists($layoutPath)) {
                require $layoutPath;
            }
        } else {
            $this->setLayout($layout);
            parent::display($tpl);
        }

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            throw new Exception(implode("\n", $errors));
        }

        return true;
    }

    /**
     * AllEventsViewEvent::_prepareDocument()
     *
     * @throws Exception
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
        $this->document->setTitle($title);

        if ($this->item->metadesc) {
            $this->document->setDescription($this->item->metadesc);
        } elseif ($this->params->get('menu-meta_description')) {
            $this->document->setDescription($this->params->get('menu-meta_description'));
        }

        if ($this->item->metakey) {
            $this->document->setMetaData('keywords', $this->item->metakey);
        } elseif ($this->params->get('menu-meta_keywords')) {
            $this->document->setMetaData('keywords', $this->params->get('menu-meta_keywords'));
        } else {
            $this->document->setMetaData('keywords', $this->item->titre);
        }

        if ($this->params->get('robots')) {
            $this->document->setMetaData('robots', $this->params->get('robots'));
        }

        if ($this->print) {
            $this->document->setMetaData('robots', 'noindex, nofollow');
        }

        if (!empty($this->item->canonical)) {
            $this->document->addCustomTag(sprintf('<link rel="canonical" href="%s" />', htmlspecialchars($this->item->canonical, ENT_COMPAT, 'UTF-8', false)));
        }
    }

    /**
     * AllEventsViewEvent::getToolbar()
     *
     * @return string
     * @throws Exception
     */
    function getToolbar()
    {
        if ($this->print) {
            // link to print an article
            $text = '<span class="icon-print"></span>' . JText::_('JGLOBAL_PRINT');
            $bar_render = '<a href="#" onclick="window.print();return false;">' . $text . '</a>';
        } else {
            $bar_render = '<div id="toolbar" class="btn-toolbar">';
            if ($this->params['geventshow_closebutton']) {
                $bar_render .= '<div id="toolbar-cancel" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= '    <a onclick="Joomla.submitbutton(\'event.cancel\')">';
                $bar_render .= '    <i class="fa fa-times"></i>&nbsp;' . JText::_('JTOOLBAR_CLOSE') . '</a>';
                $bar_render .= '</div>';
            }
            if (JFactory::getUser()->authorise('core.approve', 'com_allevents') === true) {
                if ($this->item->proposal == 1) {
                    $bar_render .= '<div id="toolbar-publish" class="btn-wrapper btn btn-small hidden-print">';
                    $bar_render .= '    <a onclick="Joomla.submitbutton(\'event.approve\')">';
                    $bar_render .= '    <i class="fa fa-check-square-o"></i>&nbsp;' . JText::_('JTOOLBAR_APPROVE') . '</a>';
                    $bar_render .= '</div>';
                }
            }
            $canEdit = JFactory::getUser()->authorise('core.edit', 'com_allevents');
            if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_allevents')) {
                $canEdit = JFactory::getUser()->id == $this->item->created_by_id;
            }
            if ($canEdit && JFactory::getUser()->authorise('core.delete', 'com_allevents')) {
                $bar_render .= '<div id="toolbar-remove" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= '    <a onclick="Joomla.submitbutton(\'event.remove\')">';
                $bar_render .= '    <i class="fa fa-trash-o"></i>&nbsp;' . JText::_('JTOOLBAR_REMOVE') . '</a>';
                $bar_render .= '</div>';
            }
            if ($canEdit) {
                $bar_render .= '<div id="toolbar-edit" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= '    <a onclick="Joomla.submitbutton(\'event.edit\')">';
                $bar_render .= '    <i class="fa fa-pencil"></i>&nbsp;' . JText::_('JTOOLBAR_EDIT') . '</a>';
                $bar_render .= '</div>';
            }
            if ($this->params->get("geventshow_buttongoogleevent")) {
                $bar_render .= '<div id="toolbar-exportgc" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= '    <a onclick="Joomla.submitbutton(\'event.exportgc\')">';
                $bar_render .= '    <i class="fa fa-google"></i>&nbsp;' . JText::_('JTOOLBAR_EXPORT_GC') . '</a>';
                $bar_render .= '</div>';
            }
            if ($this->params->get("geventshow_buttonics")) {
                $bar_render .= '<div id="toolbar-exportical" class="btn-wrapper btn btn-small hidden-print">';
                $bar_render .= '    <a onclick="Joomla.submitbutton(\'event.exportical\')">';
                $bar_render .= '    <i class="fa fa-calendar"></i>&nbsp;' . JText::_('JTOOLBAR_EXPORT_ICAL') . '</a>';
                $bar_render .= '</div>';
            }
            if ($this->params->get("geventshow_buttonprint")) {
                // popup link to print an article
                $url = 'index.php?option=com_allevents&view=event&id=' . (int)$this->item->id . '&tmpl=component&print=1';
                $status = 'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no';
                $text = '<i class="fa fa-print"></i>&nbsp;' . JText::_('JGLOBAL_PRINT');

                $attribs['title'] = JText::_('JGLOBAL_PRINT');
                $attribs['onclick'] = "window.open(this.href,'win2','" . $status . "'); return false;";
                $attribs['rel'] = 'nofollow';

                $bar_render .= '<div id="toolbar-print" class="btn-wrapper btn btn-small hidden-print hidden-print">';
                $bar_render .= JHtml::_('link', JRoute::_($url), $text, $attribs);
                $bar_render .= '</div>';
            }
            if ($this->params->get("geventshow_buttonmail")) {
                require_once JPATH_SITE . '/components/com_mailto/helpers/mailto.php';

                $uri = JUri::getInstance();
                $base = $uri->toString(['scheme', 'host', 'port']);
                $template = JFactory::getApplication()->getTemplate();
                $url = 'index.php?option=com_allevents&view=event&id=' . (int)$this->item->id . '&layout=default';

                $link = $base . JRoute::_($url, false);
                $url = 'index.php?option=com_mailto&tmpl=component&template=' . $template . '&link=' . MailToHelper::addLink($link);
                $status = 'width=400,height=350,menubar=yes,resizable=yes';
                $text = '<i class="fa fa-envelope-o"></i>&nbsp;' . JText::_('JGLOBAL_EMAIL');
                $attribs['title'] = JText::_('JGLOBAL_EMAIL');
                $attribs['onclick'] = "window.open(this.href,'win2','" . $status . "'); return false;";
                $attribs['rel'] = 'nofollow';

                $bar_render .= '<div id="toolbar-mail" class="btn-wrapper btn btn-small hidden-print hidden-print">';
                $bar_render .= JHtml::_('link', JRoute::_($url), $text, $attribs);
                $bar_render .= '</div>';
            }

            $bar_render .= '</div>';
        }

        return $bar_render;
    }
}
