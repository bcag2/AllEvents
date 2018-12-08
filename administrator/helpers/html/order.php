<?php

defined('_JEXEC') or die;

/**
 * JHtmlOrder
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
abstract class JHtmlOrder
{
    /**
     * JHtmlOrder::order_status()
     *
     * @param int|string $value
     *
     * @return string
     */
    static function order_status($value = '')
    {
        if ('P' === $value) {
            return '<span class="label label-warning event-state">' . JText::_('AE_PSTATUS_PENDING') . '</span>';
        }

        if ('C' === $value) {
            return '<span class="label label-success event-state">' . JText::_('AE_PSTATUS_COMPLETED') . '</span>';
        }

        if ('D' === $value) {
            return '<span class="label event-state">' . JText::_('AE_PSTATUS_DECLINED') . '</span>';
        }
        if ('E' === $value) {
            return '<span class="label event-state">' . JText::_('AE_PSTATUS_FAILED') . '</span>';
        }
        if ('UR' === $value) {
            return '<span class="label event-state">' . JText::_('AE_PSTATUS_UNDERREVIW') . '</span>';
        }
        if ('RF' === $value) {
            return '<span class="label event-state">' . JText::_('AE_PSTATUS_REFUNDED') . '</span>';
        }
        if ('CRV' === $value) {
            return '<span class="label event-state">' . JText::_('AE_PSTATUS_CANCEL_REVERSED') . '</span>';
        }
        if ('RV' === $value) {
            return '<span class="label event-state">' . JText::_('AE_PSTATUS_REVERSED') . '</span>';
        }

        return '<span class="label event-state">' . $value . '</span>';
    }
}
