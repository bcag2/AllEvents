<?php

defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('hidden');
JModelLegacy::addIncludePath(JPATH_BASE . '/components/com_allevents/models', 'ContentModel');

/**
 * JFormFieldAEMenuItemRessourceInit
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    ressource
 */

/**
 * Initialize eventform menu item definition
 */
class JFormFieldAEMenuItemRessourceInit extends JFormFieldHidden
{

    public $type = 'AEMenuItemRessourceInit';

    /**
     * JFormFieldAEMenuItemRessourceInit:setup()
     *
     * {@inheritDoc}
     * @see JFormField::setup()
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        $element['hidden'] = true;

        $params = JComponentHelper::getParams('com_allevents');

        if (!is_null($this->form->getValue('agenda_id', $group))) {
            return parent::setup($element, $value, $group);
        }

        // Initializing form data
        if ($params['controlpanel_showagendas']) {
            $agendas_model = JModelLegacy::getInstance('Agendas', 'AllEventsModel');
            $agenda_id = $agendas_model->GetDefaultAgendaId();
            $agenda_id = is_null($agenda_id) ? 0 : $agenda_id;
        } else {
            $agenda_id = 0;
        }
        $this->form->setValue('agenda_id', $group, $agenda_id);

        if ($params['controlpanel_ressource']) {
            $ressources_model = JModelLegacy::getInstance('Ressources', 'AllEventsModel');
            $ressource_id = $ressources_model->GetDefaultRessourceIdForAgenda($agenda_id);
            $ressource_id = is_null($ressource_id) ? 0 : $ressource_id;
        } else {
            $ressource_id = 0;
        }
        $this->form->setValue('item_id', $group, $ressource_id);

        return parent::setup($element, $ressource_id, $group);
    }

    /**
     * JFormFieldAEMenuItemRessourceInit:setForm()
     *
     * {@inheritDoc}
     * @see JFormField::setForm()
     */
    public function setForm(JForm $form)
    {
        JFactory::getDocument()->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');

        return parent::setForm($form);
    }
}
