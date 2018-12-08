<?php

/**
 * AECBUserAddressParser
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
require_once JPATH_SITE . '/administrator/components/com_allevents/helpers/aecbfields.php';

/**
 * Parse string to find {xx} style tags and check if tags are Community Builder tags
 */
class AECBUserAddressParser extends AEStringTagsParser
{
    /**
     * AECBUserAddressParser constructor.
     */
    public function __construct()
    {
        $cb_fields = AECBFields::getInstance()->getFieldsByTypes(['textarea', 'text'], 0, 1);
        $cb_tags = [];
        foreach ($cb_fields as $cb_field) {
            $cb_tags[] = $cb_field['name'];
        }
        parent::__construct($cb_tags);
    }
}
