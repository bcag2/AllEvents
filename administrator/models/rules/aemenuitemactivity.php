<?php

/**
 * JFormRuleAEMenuItemActivity
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

/**
 * Class JFormRuleAEMenuItemActivity
 */
class JFormRuleAEMenuItemActivity extends JFormRule
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
        if ($params['controlpanel_showactivities']) {
            return true;
        } else {
            $element->addAttribute('message', 'ALLEVENTS_ACTIVITIES_NOT_USED');

            return false;
        }
    }

}