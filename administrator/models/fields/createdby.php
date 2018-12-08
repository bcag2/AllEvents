<?php
defined('_JEXEC') or die;

jimport('joomla.form.formfield');

/**
 * JFormFieldCreatedby
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldCreatedby extends JFormField
{
    protected $type = 'createdby';

    /**
     * JFormFieldCreatedby::getInput()
     *
     * @return string
     */
    protected function getInput()
    {
        // Initialize variables.
        $html = [];
        // Load user
        $user_id = $this->value;
        if ($user_id) {
            $user = JFactory::getUser($user_id);
            if (isset($user)) {
                $html[] = '<input type="text" readonly="" value="' . $user->get('name') . " (" . $user->get('username') . ')" >';
            } else {
                $html[] = '<input type="text" readonly="" value="-" >';
            }
        } else {
            $user = JFactory::getUser();
            $html[] = '<input type="hidden" name="' . $this->name . '" value="' . $user->get('id') . '" />';
        }

        return implode($html);
    }
}