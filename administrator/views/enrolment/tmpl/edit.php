<?php
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// €#€
if (!class_exists('AllEventsCustomfields'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aecustomfields.php';
// €#€

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons.css');
?>
    <script type="text/javascript">
        js = jQuery.noConflict();
        js(document).ready(function () {
            js('input:hidden.event_id').each(function () {
                var name = js(this).attr('name');
                if (name.indexOf('event_idhidden')) {
                    js('#jform_event_id option[value="' + js(this).val() + '"]').attr('selected', true);
                }
            });
            js("#jform_event_id").trigger("liszt:updated");
            js('#jform_event_id_chzn').prop('title', js("div#jform_event_id_chzn.chzn-container.chzn-container-single.chzn-container-active a.chzn-single span").text());
            js("#jform_event_id").change(function () {
                js('#jform_event_id_chzn').prop('title', js("div#jform_event_id_chzn.chzn-container.chzn-container-single.chzn-container-active a.chzn-single span").text());
            });
        });

        Joomla.submitbutton = function (task) {
            if (task == 'enrolment.cancel') {
                Joomla.submitform(task, document.getElementById('enrolment-form'));
            } else {
                if (task != 'enrolment.cancel' && document.formvalidator.isValid(document.id('enrolment-form'))) {
                    Joomla.submitform(task, document.getElementById('enrolment-form'));
                } else {
                    alert('<?php echo $this->escape(JText::_(' JGLOBAL_VALIDATION_FORM_FAILED ')); ?>');
                }
            }
        }
    </script>

<?php if ($this->item) : ?>
    <?php
    if ($this->item->id == 0) {
        $this->item->event_id = JFactory::getApplication()->input->getCmd('event_id', 'event_id');
    }
    ?>
    <form
        action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id, false); ?>"
        method="post" enctype="multipart/form-data" name="adminForm" id="enrolment-form" class="form-validate">
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">
                    <?php echo $this->form->renderField('event_id'); ?>

                    <?php
                    foreach ((array)$this->item->event_id as $value):
                        if (!is_array($value)):
                            echo '<input type="hidden" class="event_id" name="jform[event_idhidden][' . $value . ']" value="' . $value . '" />';
                        endif;
                    endforeach;
                    ?>
                    <?php echo $this->form->renderField('published'); ?>
                    <?php echo $this->form->renderField('user_id'); ?>
                    <?php echo $this->form->renderField('enroltype'); ?>
                    <?php echo $this->form->renderField('commentaire'); ?>
                    <?php echo $this->form->renderField('companions'); ?>
                    <?php echo $this->form->renderField('order_id'); ?>
                </fieldset>
                <!-- €€€ -->
                <?php
                if ($this->params['controlpanel_showcustomfields']) {
                    $customfields = AllEventsCustomfields::getCustomfields('enrol');
                    if ($customfields) {
                        // echo '<h3>'.JText::_('COM_ALLEVENTS_CUSTOMFIELDS').'</h3>' ;
                        echo AllEventsCustomfields::loader('enrol');
                    }
                }
                ?>
                <!-- €€€ -->
            </div>

            <input type="hidden" name="task" value=""/>
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>

    <?php
else:
    echo JText::_('COM_ALLEVENTS_ITEM_NOT_LOADED');
endif;
?>