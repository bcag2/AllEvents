<?php
defined('_JEXEC') or die;
jimport('joomla.form.formfield');
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * JFormFieldTimeupdated
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldTimeupdated extends JFormField
{
    protected $type = 'timeupdated';

    /**
     * JFormFieldTimeupdated::getInput()
     *
     * @return string
     */
    protected function getInput()
    {
        // Initialize variables.
        $params = AllEventsHelperParam::getGlobalParam();
        $html = [];

        $old_time_updated = $this->value;
        $hidden = (boolean)$this->element['hidden'];
        if ($hidden == null || !$hidden) {
            if (!strtotime($old_time_updated)) {
                $html[] = '<input type="text" readonly="" class="" value="-">';
            } else {
                $html[] = '<input type="text" readonly="" class="" value="' . JHtml::_('date', $old_time_updated, $params['gdatetime_format']) . '">';
            }
        } else {
            $html[] = '<input type="hidden" name="' . $this->name . '" value="' . JHtml::_('date', null, $params['gdatetime_format']) . '" />';
        }

        return implode($html);
    }
}