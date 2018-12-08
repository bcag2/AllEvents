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

foreach ($list as $item) : ?>
    <li>
    <<?php echo $params->get('item_heading'); ?>>
    <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=agenda&id=' . $item->id); ?>">
        <?php echo $item->titre; ?>
        <?php if ($params->get('numitems')) : ?>
            (<?php echo $item->numitems; ?>)
        <?php endif; ?>
    </a>
    </<?php echo $params->get('item_heading'); ?>>

    <?php if ($params->get('show_description', 0)) : ?>
        <?php echo JHtml::_('content.prepare', $item->description, '', 'mod_aeagendas.description'); ?>
    <?php endif; ?>
    </li>
<?php endforeach; ?>
