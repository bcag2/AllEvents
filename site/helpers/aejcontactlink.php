<?php
/**
 * AllEventsJContactLink
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('JPATH_BASE') or die;

JLoader::register('ContactHelperRoute', JPATH_ROOT . '/components/com_contact/helpers/route.php');

/**
 * Simply reuse ContactHelperRoute from mod_contact
 */
class AllEventsJContactLink extends ContactHelperRoute
{
}
