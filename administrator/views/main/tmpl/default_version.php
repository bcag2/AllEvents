<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

$layout = new JLayoutFile('main.version', JPATH_ADMINISTRATOR . '/components/com_allevents/layouts');

?>

<div class="items">
    <?php echo $layout->render(['version' => $this->version]); ?>
</div>

<div class="actions">
    <a href="index.php?option=com_allevents&view=settings">Settings</a>
    <a href="index.php?option=com_allevents&view=about">About Extension</a>
</div>
