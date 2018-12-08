<?php
defined('_JEXEC') or die;
jimport('joomla.form.formfield');
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * JFormFieldTimecreated
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldTimecreated extends JFormField
{
    protected $type = 'timecreated';

    /**
     * JFormFieldTimecreated::getInput()
     *
     * @return string
     */
    protected function getInput()
    {
        // Initialize variables.
        $params = AllEventsHelperParam::getGlobalParam();
        $html = [];

        $time_created = $this->value;
        $hidden = (boolean)$this->element['hidden'];
        if ($hidden == null || !$hidden) {
            if (!strtotime($time_created)) {
                $html[] = '<input type="text" readonly="" class="" value="-">';
            } else {
                $html[] = '<input type="text" readonly="" class="" value="' . JHtml::_('date', $time_created, $params['gdatetime_format']) . '">';
            }
        } else {
            $html[] = '<input type="hidden" name="' . $this->name . '" value="' . JHtml::_('date', null, $params['gdatetime_format']) . '" />';
        }

        return implode($html);
    }
}