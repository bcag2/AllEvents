<?php
defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('textarea');
require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/aejcontactaddressparser.php';

/**
 * JFormFieldAEJContactAddressFormat
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

/**
 * Initialize Joomla Contact address field
 */
class JFormFieldAEJContactAddressFormat extends JFormFieldTextarea
{
    public $type = 'AEJContactAddressFormat';

    /**
     * Set field description
     *
     * {@inheritDoc}
     *
     * @see JFormFieldTextarea::setup()
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        $component = 'com_contact';
        $component_enabled = JComponentHelper::isInstalled($component) && JComponentHelper::isEnabled($component);
        if ($component_enabled) {
            $parser = new AEJContactAddressParser();
            $element['description'] = JText::sprintf("COM_ALLEVENTS_SHOW_JCONTACTADDRESS_DESC",
                '{' . implode('}, {', $parser->getAvailableTags()) . '}');
        }

        return parent::setup($element, $value, $group);
    }
}
