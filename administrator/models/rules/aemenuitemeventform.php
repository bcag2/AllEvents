<?php

/**
 * JFormRuleAEMenuItemEventform
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die();

/**
 * Check menu item eventform parameters
 */
class JFormRuleAEMenuItemEventform extends JFormRule
{
    /**
     * @param SimpleXMLElement $element
     * @param mixed $value
     * @param null $group
     * @param JRegistry|null $input
     * @param JForm|null $form
     *
     * @return bool
     */
    public function test(SimpleXMLElement $element, $value, $group = null, JRegistry $input = null, JForm $form = null)
    {
        $params = JComponentHelper::getParams('com_allevents');

        $fields_prefix = (empty($group) ? '' : $group . '.');
        $error = false;
        $message = '';

        // Agenda & (Activity, Public, Place, Ressource) consistency check
        if ($params['controlpanel_showagendas'] && $input->get($fields_prefix . 'agenda_id') == -1 && ($params['controlpanel_showactivities'] &&
                $input->get($fields_prefix . 'activity_id') != -1 ||
                $params['controlpanel_showpublics'] && $input->get($fields_prefix . 'public_id') != -1 ||
                $params['controlpanel_showplaces'] && $input->get($fields_prefix . 'place_id') != -1 ||
                $params['controlpanel_showressources'] && $input->get($fields_prefix . 'ressource_id') != -1)
        ) {
            $message .= (empty($message) ? "" : "\n") . JText::_('COM_ALLEVENTS_MENU_ITEM_EVENTFORM_AGENDA_ERR') . '.';
            $error = true;
        }

        // Section & Category consistency check
        if ($params['controlpanel_showsections'] && $input->get($fields_prefix . 'section_id') == -1 &&
            ($params['controlpanel_showcategories'] && $input->get($fields_prefix . 'category_id') != -1)
        ) {
            $message .= (empty($message) ? "" : "\n") . JText::_('COM_ALLEVENTS_MENU_ITEM_EVENTFORM_SECTION_ERR') . '.';
            $error = true;
        }

        // Labels check
        for ($i = 1; $i <= 3; $i++) {
            $templabel = trim($input->get($fields_prefix . 'contact_' . $i . '_label'));
            if ($input->get($fields_prefix . 'contact_' . $i . '_type') &&
                empty($templabel)
            ) {
                $message .= (empty($message) ? "" : "\n") . JText::_('COM_ALLEVENTS_MENU_ITEM_EVENTFORM_MISSING_LABEL') . '.';
                $error = true;
                break;
            }
        }

        // CB lists check
        for ($i = 1; $i <= 3; $i++) {
            if ($input->get($fields_prefix . 'contact_' . $i . '_type') == 3 &&
                is_null($input->get($fields_prefix . 'contact_' . $i . '_label'))
            ) {
                $message .= (empty($message) ? "" : "\n") . JText::_('COM_ALLEVENTS_MENU_ITEM_EVENTFORM_MISSING_CBLIST') . '.';
                $error = true;
                break;
            }
        }

        if ($error) {
            $element->addAttribute('message', $message);
        }

        return !$error;
    }
}
