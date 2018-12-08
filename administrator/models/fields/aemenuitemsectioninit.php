<?php

defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('hidden');
JModelLegacy::addIncludePath(JPATH_BASE . '/components/com_allevents/models', 'ContentModel');

/**
 * JFormFieldAEMenuItemSectionInit
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

/**
 * Initialize eventform menu item definition
 */
class JFormFieldAEMenuItemSectionInit extends JFormFieldHidden
{

    public $type = 'AEMenuItemSectionInit';

    /**
     * JFormFieldAEMenuItemSectionInit:setup()
     *
     * {@inheritDoc}
     * @see JFormField::setup()
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        $element['hidden'] = true;

        $params = JComponentHelper::getParams('com_allevents');

        if (!is_null($this->form->getValue('section_id', $group))) {
            return parent::setup($element, $value, $group);
        }

        // Initializing form data
        if ($params['controlpanel_showsections']) {
            $sections_model = JModelLegacy::getInstance('Sections', 'AllEventsModel');
            $section_id = $sections_model->GetDefaultSectionId();
            $section_id = is_null($section_id) ? 0 : $section_id;
        } else {
            $section_id = 0;
        }
        $this->form->setValue('item_id', $group, $section_id);

        return parent::setup($element, $section_id, $group);
    }

    /**
     * JFormFieldAEMenuItemSectionInit:setForm()
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
