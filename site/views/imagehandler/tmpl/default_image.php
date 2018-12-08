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
<div class="item">
    <div class="imgBorder center">
        <a onclick="window.parent.Select<?php echo $this->folder; ?>('<?php echo $this->pid; ?>','<?php echo $this->_tmp_img->name; ?>');">
            <div class="image">
                <img
                    src="<?php echo JUri::root(true) . '/images/com_allevents/' . $this->folder; ?>/<?php echo $this->_tmp_img->name; ?>"
                    width="<?php echo $this->_tmp_img->width_60; ?>" height="<?php echo $this->_tmp_img->height_60; ?>"
                    alt="<?php echo $this->_tmp_img->name; ?> - <?php echo $this->_tmp_img->size; ?>"/>
            </div>
        </a>
    </div>
    <div class="controls">
        <?php echo $this->_tmp_img->size; ?> -
        <!-- <a class="delete-item"
           href="index.php?option=com_allevents&amp;view=imagehandler&amp;layout=default&amp;task=imagehandler.delete&amp;tmpl=component&amp;folder=<?php echo $this->folder; ?>&amp;rm[]=<?php echo $this->_tmp_img->name; ?>">
      <img src="<?php echo JUri::root(true) . '/media/com_allevents/css/images/publish_r.png'; ?>"
                     width="16" height="16" alt="<?php echo JText::_('COM_ALLEVENTS_DELETE_IMAGE'); ?>"/>					 					
        </a>-->
    </div>
    <div class="imageinfo">
        <?php echo $this->escape(substr($this->_tmp_img->name, 0, 20) . (strlen($this->_tmp_img->name) > 20 ? '...' : '')); ?>
    </div>
</div>