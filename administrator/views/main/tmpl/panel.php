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

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

$document = JFactory::getDocument();
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/uikit.min.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/components/sortable.min.css');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/uikit.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/components/grid.min.js');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/components/sortable.min.js');
// $document->addScript('https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.0/js.cookie.min.js');

$user = JFactory::getUser();
$userId = $user->get('id');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$params = AllEventsHelperParam::getGlobalParam();
$canEdit = $user->authorise('core.edit', 'com_allevents');
?>


<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>

<div id="j-main-container" class="span10">
    <form action="<?php echo JRoute::_('index.php?option=com_allevents'); ?>" id="adminForm" method="post"
          name="adminForm" style="display: none;">
        <input type="hidden" name="boxchecked" value="0"/>
        <input type="hidden" name="task" value=""/>
    </form>

    <div style="margin: 0 0 10px;">
        <a href="index.php?option=com_allevents&task=main.reset" class="btn btn-small">
            <span class="icon-refresh"></span>
            <?php echo JText::_('COM_ALLEVENTS_DASHBOARD_RESET'); ?>
        </a>
    </div>

    <div class="row-fluid columns">
        <ul class="uk-sortable uk-grid uk-grid-small uk-grid-width-1-2"
            data-uk-sortable="{handleClass:'uk-sortable-handle'}">
            <?php if (isset($this->pan_setup[0])): ?>
                <?php foreach ($this->pan_setup[0] as $panel => $status): ?>
                    <li class="uk-grid-margin">
                        <div class="uk-panel uk-panel-box">
                            <i class="uk-sortable-handle uk-icon uk-icon-bars uk-margin-small-right"></i>
                            <div class="uk-badge uk-badge-notification uk-panel-badge">0</div>
                            <div class="panel-heading">
                                <?php echo JText::_('COM_ALLEVENTS_DASHBOARD_PANEL_HEADING_' . strtoupper($panel)); ?>
                            </div>

                            <div class="panel-body">
                                <?php echo $this->loadTemplate($panel); ?>
                            </div>

                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>

    <!-- FOOTER -->
    <table style="width: 100%;margin-top: 12px;clear: both;" class="adminlist">
        <tbody>
        <tr>
            <td valign="middle" align="center" style="position: relative;" id="ae_ext_td">
                <div style="position: absolute;left: 2px;top: 7px;">
                    <a href="https://www.allevents3.com/"><img width="160"
                                                               title="<?php echo JText::_('AE_FOOTER_ALLEVENTS'); ?>"
                                                               target="_blank" alt="AllEvents"
                                                               src="../media/com_allevents/css/images/allevents.png"></a>
                    <a target="_blank" href="https://twitter.com/elecoest"><img
                            title="<?php echo JText::_('AE_FOOTER_TWITTER'); ?>"
                            src="../media/com_allevents/css/images/follow-us-on-twitter.png"></a>
                    <a target="_blank" href="https://www.facebook.com/com.allevents"><img
                            title="<?php echo JText::_('AE_FOOTER_FACEBOOK'); ?>"
                            src="../media/com_allevents/css/images/follow-us-on-facebook.png"></a>
                </div>
                <div id="ae_bottom_link">
                    <a target="_blank"
                       href="https://www.allevents3.com/">AllEvents</a>&nbsp;<?php echo JText::_('AE_FOOTER_LINK'); ?>
                    &nbsp;<a target="_blank" href="https://www.allevents3.com">Emmanuel Lecoester</a>
                </div>
                <div style="position: absolute;right: 2px;top: 7px;">
                    <a title="<?php echo JText::_('AE_FOOTER_RATE'); ?>" class="ae_ext_bottom_icon" id="ae_ext_rate"
                       target="_blank"
                       href="https://extensions.joomla.org/extensions/extension/calendars-a-events/allevents/">
                        &nbsp;</a>
                    <!-- FREE -->
                    <a title="<?php echo JText::_('AE_FOOTER_BUY'); ?>" class="ae_ext_bottom_icon"
                       style="margin: 0 2px 0 0;" id="ae_ext_buy" target="_blank"
                       href="https://www.allevents3.com/en/our-products/order/allevents-premium">
                        &nbsp;</a>
                    <!-- EERF -->
                    <a title="<?php echo JText::_('AE_FOOTER_SUPPORT'); ?>" class="ae_ext_bottom_icon"
                       id="ae_ext_support" target="_blank" href="https://www.allevents3.com/en/support">&nbsp;</a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<script>
    (function ($) {
        $(document).on('ready', function () {
            var sortable = $('[data-uk-sortable]'),
                button = $('button');
            button.click(function () {
                saveOrdering(sortable, button);
            });
            sortable.on('stop.uk.sortable', function (e, el, type) {
                setOrdering(sortable, el);
            });
            setOrdering(sortable);
        });
        function setOrdering(sortable, activeEl) {
            var ordering = 1;
            sortable.find('>li').each(function () {
                var $ele = $(this);
                $ele.data('ordering', ordering);
                $ele.find('div.uk-badge').text(ordering);
                ordering++;
            });
            if (activeEl) {
                activeEl.find('div.uk-badge').addClass('uk-animation-scale-down');
            }
        }

        function saveOrdering(sortable, button) {
            var url = 'index.php',
                data = {
                    task: 'saveOrdering',
                    ordering: {}
                };
            sortable.find('>li').each(function () {
                data.ordering[$(this).data('id')] = $(this).data('ordering');
            });
            button.prop('disabled', true);
            console.log(data); //data going to server
            $.getJSON(url, data, function (result) {
                console.log(result); //json response from server
                button.prop('disabled', false);
            });
            setTimeout(function () {
                button.prop('disabled', false);
            }, 1000);//for testing only!
        }
    })(jQuery);
</script>