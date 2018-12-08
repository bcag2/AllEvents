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

JLoader::register('JHtmlEvent', JPATH_ADMINISTRATOR . '/components/com_allevents/helpers/html/event.php');

extract($displayData);
?>

<?php if (!$events): ?>
    <div class="no-results">
        No events found!
    </div>
<?php else: ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width: 50px;"><?php echo JText::_('COM_ALLEVENTS_STATE'); ?></th>
            <th style="width: 50px;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_CANCELLED'); ?></th>
            <th style="width: 50px;"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_PROPOSAL'); ?></th>
            <th><?php echo JText::_('COM_ALLEVENTS_TITRE'); ?></th>
            <th style="width: 100px;"><?php echo JText::_('EVENT_DATE'); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($events as $event): ?>
            <tr>
                <td>
                    <?php echo JHtml::_('event.state', $event->published); ?>
                </td>

                <td>
                    <?php echo JHtml::_('event.cancelled', $event->cancelled); ?>
                </td>

                <td>
                    <?php echo JHtml::_('event.approval', $event->proposal); ?>
                </td>

                <td>
                    <a href="index.php?option=com_allevents&task=event.edit&id=<?php echo $event->id; ?>"
                       style="font-weight: bold;">
                        <?php echo $event->titre; ?>
                    </a>
                </td>

                <td>
                    <?php echo JHtml::_('date.relative', $event->created_date); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
