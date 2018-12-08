<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

$document = JFactory::getDocument();
AllEventsHelperOverride::jquery();
JHtml::_('behavior.framework');
JHtml::_('behavior.tooltip');

$show = false;

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');

$app = JFactory::getApplication();
$n = count($this->items);
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>
    <h1><?php echo $this->params['page_title']; ?></h1>
    <form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" id="adminForm"
          name="adminForm">
        <?php echo $this->getToolbar(); ?>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="option" value="com_allevents"/>
        <input type="hidden" name="Itemid"
               value="<?php echo (int)JFactory::getApplication()->input->getInt('Itemid', null); ?>"/>
        <input type="hidden" name="limitstart" value=""/>
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
        <?php echo JHtml::_('form.token'); ?>
    </form>

    <div id="se_ShowTable">
        <div class="vignette">
            <div>
                <h2 class="se_event_chapitre"><?php echo JText::_('TODAY'); ?></h2>
            </div>
            <?php foreach ($this->currentitems as $item): ?>
                <?php $event_link = ($this->print) ? "" : $item->event_link; ?>

                <div class="se_summary se_agenda_<?php echo($item->agenda_id); ?>_summary ">
                    <div class="se_agenda_<?php echo($item->agenda_id); ?>_vignette"></div>
                    <span class="se_summary_info">
                            <span class="se_event_titre"><?php echo($item->titre); ?></span>
                            <span class="se_event_date">
                                <?php
                                if ($item->allday == "1") {
                                    echo JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']);
                                } else {
                                    echo JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']);
                                }

                                ?>
                            </span>
                        <?php if (!empty($item->agenda_id)): ?>
                            <span title="<?php echo $item->agenda_titre; ?>"
                                  class="se_event_info_agenda se_agenda_<?php echo($item->agenda_id); ?>_bullet">
                                    <a title="<?php echo $item->agenda_titre; ?>"
                                       href="<?php echo ($this->print) ? "" : $item->agenda_link; ?>"><?php echo $item->agenda_titre; ?>
                                    </a><br>
                                </span>
                        <?php endif; ?>
                        <?php if (!empty($item->activity_id)): ?>
                            <span title="<?php echo $item->activity_titre; ?>"
                                  class="se_event_info_activity se_activity_<?php echo $item->activity_id; ?>_bullet">
                                    <a title="<?php echo $item->activity_titre; ?>"
                                       href="<?php echo ($this->print) ? "" : $item->activity_link; ?>"><?php echo $item->activity_titre; ?></a><br>
                                </span>
                        <?php endif; ?>
                        <?php if (!empty($item->place_id)): ?>
                            <span title="<?php echo $item->place_titre; ?>"
                                  class="se_event_info_place se_place_<?php echo $item->place_id; ?>_bullet">
                                    <a title="<?php echo $item->place_titre; ?>"
                                       href="<?php echo ($this->print) ? "" : $item->place_link; ?>"><?php echo $item->place_titre; ?></a><br>
                                </span>
                        <?php endif; ?>
                        </span>
                    <span class="se_event_intro"></span>
                    <span class="se_event_moreinfo">
                            <a href="<?php echo $event_link; ?>"><?php echo JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_SHOWREADMORE'); ?></a>
                        </span>
                </div>

            <?php endforeach; ?>
        </div>

        <div class="vignette">
            <div>
                <h2 class="se_event_chapitre"><?php echo JText::_('COM_ALLEVENTS_NEXT_EVENTS'); ?></h2>
            </div>
            <ul class="se_bullet">
                <?php foreach ($this->nextitems as $item): ?>
                    <?php $event_link = ($this->print) ? "" : $item->event_link; ?>

                    <li class="se_agenda_<?php echo($item->agenda_id); ?>_bullet se_agenda_<?php echo($item->agenda_id); ?>_color">
                        <a title="<?php echo($item->titre); ?>" href="<?php echo $event_link; ?>">
                            <span class="se_titre"><?php echo($item->titre); ?></span>
                            <?php if (!empty($item->agenda_id)): ?>
                                <span title="<?php echo $item->agenda_titre; ?>"
                                      class="se_infos se_agenda_<?php echo($item->agenda_id); ?>_bullet"></span>
                            <?php endif; ?>
                            <?php if (!empty($item->activity_id)): ?>
                                <span title="<?php echo $item->activity_titre; ?>"
                                      class="se_infos se_activity_<?php echo $item->activity_id; ?>_bullet"></span>
                            <?php endif; ?>
                            <?php if (!empty($item->place_id)): ?>
                                <span title="<?php echo $item->place_titre; ?>"
                                      class="se_infos se_place_<?php echo $item->place_id; ?>_bullet"></span>
                            <?php endif; ?>
                            <span class="se_event_date">
                                    <?php
                                    if ($item->allday == "1") {
                                        echo JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']);
                                    } else {
                                        echo JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']);
                                    }
                                    ?>
                                </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="vignette">
            <div>
                <h2 class="se_event_chapitre"><?php echo JText::_('COM_ALLEVENTS_PREVIOUS_EVENTS'); ?></h2>
            </div>
            <br/>
            <table id="se_events_table_past" class="se_events_table">
                <tbody>
                <tr>
                    <th class="se_events_agenda"><?php echo JText::_('AGENDA'); ?></th>
                    <th class="se_events_date"><?php echo JText::_('COM_ALLEVENTS_EVENTS_DATE'); ?></th>
                    <th class="se_events_date"><?php echo JText::_('ENDDATE'); ?></th>
                    <th class="se_events_titre"><?php echo JText::_('COM_ALLEVENTS_TITRE'); ?></th>
                    <th class="se_events_activity"><?php echo JText::_('ACTIVITY'); ?></th>
                    <th class="se_events_category"><?php echo JText::_('CATEGORY'); ?></th>
                </tr>
                <?php foreach ($this->pasteditems as $item): ?>
                    <?php $event_link = ($this->print) ? "" : $item->event_link; ?>
                    <tr class="se_agenda_<?php echo($item->agenda_id); ?>_color">
                        <td class="se_events_agenda">
                            <?php if ($item->agenda_id > 0): ?>
                                <span title="<?php echo $item->agenda_titre; ?>"
                                      class="se_infos se_agenda_<?php echo($item->agenda_id); ?>_bullet"></span>
                            <?php endif; ?>
                        </td>
                        <td width="120" class="se_events_date">
                            <?php
                            if ($item->allday == "1") {
                                echo JHtml::date($item->date, $this->params['gdate_format']);
                            } else {
                                echo JHtml::date($item->date, $this->params['gdatetime_format']);
                            }

                            ?>
                        </td>
                        <td width="120" class="se_events_date">
                            <?php

                            if ($item->allday == "1") {
                                echo JHtml::date($item->enddate, $this->params['gdate_format']);
                            } else {
                                echo JHtml::date($item->enddate, $this->params['gdatetime_format']);
                            }

                            ?>
                        </td>
                        <td class="se_events_titre">
                            <a title="<?php echo($item->titre); ?>"
                               href="<?php echo $event_link; ?>"><?php echo($item->titre); ?></a>
                        </td>
                        <td class="se_events_activity">
                            <?php if (!empty($item->activity_id)): ?>
                                <span title="<?php echo $item->activity_titre; ?>"
                                      class="se_infos se_activity_<?php echo($item->activity_id); ?>_bullet"></span>
                            <?php endif; ?>
                        </td>
                        <td class="se_events_category">
                            <?php if (!empty($item->category_id)): ?>
                                <span title="<?php echo $item->category_titre; ?>"
                                      class="se_infos se_category_<?php echo($item->category_id); ?>_bullet"></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>