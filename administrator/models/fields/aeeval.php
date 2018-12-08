<?php
/**
 * JFormFieldAEEval
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('hidden');

/**
 * Hidden field to return value of an evaluated expression)
 */
class JFormFieldAEEval extends JFormFieldHidden
{
    protected $type = 'AEEval';
    protected $ae_expr;

    /**
     * JFormFieldAEHiddenParam:setup()
     *
     * {@inheritDoc}
     *
     * @see JFormField::setup()
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        // ATTENTION Load AE parameters : ne pas supprimer car est utilisé lors de l'eval dans le champ
        $params = JComponentHelper::getParams('com_allevents');
        // ATTENTION Load AE parameters : ne pas supprimer car est utilisé lors de l'eval dans le champ

        $app = JFactory::getApplication();
        $element['hidden'] = "true";

        if (!isset($element['expr'])) {
            $app->enqueueMessage('Missing expression for field: ' . $element['name'], 'error');

            return parent::setup($element, $value, $group);
        }
        $this->ae_expr = (string)$element['expr'];
        try {
            $result = eval($this->ae_expr);
            switch (gettype($result)) {
                case "boolean" :
                    $value = $result ? "1" : "0";
                    break;
                case "integer" :
                case "double" :
                case "string" :
                    $value = $result;
                    break;
                default :
                    $app->enqueueMessage(
                        'Invalid returned type "' . gettype($result) . ' for expression "' . $this->ae_expr .
                        '" for field: ' . $element['name'], 'error');
                    $value = null;
            }
        } finally {
            $field_name = (string)$element->attributes()['name'];
            $this->form->setValue($field_name, $group, $value);

            return parent::setup($element, $value, $group);
        }
    }
}
