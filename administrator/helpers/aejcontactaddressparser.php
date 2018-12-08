<?php

/**
 * AEJContactAddressParser
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;

require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/aestringtagsparser.php';

/**
 * Parse string to find {xx} style tags and check if tags are Joomla Contacts tags
 */
class AEJContactAddressParser extends AEStringTagsParser
{
    /**
     * AEJContactAddressParser constructor.
     */
    public function __construct()
    {
        parent::__construct(["address", "zipcode", "city", "state", "country"]);
    }
}
