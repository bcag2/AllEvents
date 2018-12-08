<?php

defined('_JEXEC') or die;

/**
 * AllEventsHelperInfiniteScroll
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsHelperInfiniteScroll
{
    /**
     * AllEventsHelperInfiniteScroll::GetInfiniteScroll()
     *
     * @param mixed $container
     * @param mixed $item
     * @param bool $value
     *
     * @return string
     */
    public static function GetInfiniteScroll($container, $item, $value = false)
    {
        $sReturn = '';
        if ($value) {
            $sReturn .= "<script type='text/javascript'>";
            $sReturn .= "  (function ($) {";
            $sReturn .= "    $(document).ready(function() {";
            $sReturn .= "      var ias = jQuery.ias({";
            $sReturn .= "        container:  '" . $container . "',";
            $sReturn .= "        item:       '" . $item . "',";
            $sReturn .= "        pagination: '.pagination ',";
            $sReturn .= "        next:       '.pagination-next a.pagenav,a[title=\'Next\'].pagenav,a[title=\'Suivant\'],li:nth-last-child(2) a.pagenav'";
            $sReturn .= "        });";
            $sReturn .= "      ias.extension(new IASSpinnerExtension({";
            $sReturn .= "        src: 'media/com_allevents/css/images/AjaxLoader.gif' ,";
            $sReturn .= "        html: '<div class=\"iasj-spinner\" style=\"text-align:center;clear:both\"><img style=\"width:16px;height:auto\" src=\"{src}\"/></div>'";
            $sReturn .= "      }));";
            $sReturn .= "      ias.extension(new IASNoneLeftExtension({";
            $sReturn .= "        text: '" . JText::_('COM_ALLEVENTS_NO_MORE_EVENTS') . "',";
            $sReturn .= "        html: '<div class=\"iasj-noneleft\" style=\"text-align:center;clear:both;\">{text}</div>'";
            $sReturn .= "      }));";
            $sReturn .= "    });";
            $sReturn .= "  })(jQuery);";
            $sReturn .= "</script>";
        }

        return $sReturn;
    }
}