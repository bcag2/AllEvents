<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */

defined('_JEXEC') or die;
?>
<form action="index.php" method="post" name="adminForm" id="adminForm">
    <div class="imghead">
        <?php echo JText::_('COM_ALLEVENTS_SEARCH') . ' '; ?>
        <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->search; ?>"
               class="text_area" onChange="document.adminForm.submit();"/>
        <button class="buttonfilter" type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
        <button class="buttonfilter" type="button"
                onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
    </div>

    <div class="imglist">
        <?php for ($i = 0; $i < count($this->images); $i++) {
            $this->setImage($i);
            echo $this->loadTemplate('image');
        } ?>
    </div>

    <div class="clear"></div>

    <div class="pnav">
        <?php echo(method_exists($this->pagination, 'getPaginationLinks') ? $this->pagination->getPaginationLinks() : $this->pagination->getListFooter()); ?>
    </div>

    <input type="hidden" name="option" value="com_allevents"/>
    <input type="hidden" name="view" value="imagehandler"/>
    <input type="hidden" name="layout" value="default"/>
    <input type="hidden" name="task" value="<?php echo $this->task; ?>"/>
    <input type="hidden" name="tmpl" value="component"/>
</form>