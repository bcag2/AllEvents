<?php

/**
 * JFormRuleAEMenuItemRessource
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
 * Class JFormRuleAEMenuItemRessource
 */
class JFormRuleAEMenuItemRessource extends JFormRule
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
        if ($params['controlpanel_showressources']) {
            return true;
        } else {
            $element->addAttribute('message', 'ALLEVENTS_RESSOURCES_NOT_USED');

            return false;
        }
    }

}