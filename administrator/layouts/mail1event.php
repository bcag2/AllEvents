<?php
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::_('behavior.core');

$title = $displayData['title'];
$message = JText::_('JLIB_HTML_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST');
$message = addslashes($message);
?>
<button data-toggle="modal" onclick="jQuery( '#collapseModalMail' ).modal('show'); return true;" class="btn btn-small">
    <span class="icon-envelope" title="<?php echo $title; ?>"></span>
    <?php echo $title; ?>
</button>


