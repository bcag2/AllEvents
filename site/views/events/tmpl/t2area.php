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
$Itemid = ($this->params['gforcenomenuitem']) ? '' : '&Itemid=' . (int)JFactory::getApplication()->input->getInt('Itemid', null);
?>
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" id="adminForm"
      name="adminForm">
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="option" value="com_allevents"/>
    <input type="hidden" name="limitstart" value=""/>
    <?php
    echo JHtml::_('form.token');
    if (!((int)$this->params['infinite_scroll'])) {
        echo JLayoutHelper::render('joomla.searchtools.default', ['view' => $this]);
    }
    ?>
</form>

<div id="event_listing_sport" class="event_listing_sport">
    <?php $show = false; ?>

    <?php if (count($this->currentitems) > 0) { ?>
        <div>
            <h2 class="se_event_chapitre"><?php echo JText::_('TODAY'); ?></h2>
        </div>
    <?php } ?>
    <?php foreach ($this->currentitems as $item) : ?>

    <?php
    $canEdit = JFactory::getUser()->authorise('core.edit', 'com_allevents');
    if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_allevents.' . $item->id)) {
        $canEdit = JFactory::getUser()->id == $item->created_by;
    }
    if (($item->published == 1 || ($item->published == 0 && JFactory::getUser()->authorise('core.edit.own', ' com_allevents.' . $item->id))) && !($item->cancelled)):
    $show = true;
    ?>

    <div class="event_container <?php echo $item->event_class; ?>">
        <form id="form-event-delete-<?php echo $item->id; ?>" style="display:inline;"
              action="<?php echo JRoute::_('index.php?option=com_allevents&task=event.remove', false); ?>" method="post"
              class="form-validate" enctype="multipart/form-data">
            <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
            <input type="hidden" name="option" value="com_allevents"/>
            <input type="hidden" name="task" value="event.remove"/>
            <?php echo JHtml::_('form.token'); ?>
        </form>
        <form id="form-event-state-<?php echo $item->id ?>" style="display:inline;"
              action="<?php echo JRoute::_('index.php?option=com_allevents&task=event.save', false); ?>" method="post"
              class="form-validate" enctype="multipart/form-data">
            <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
            <input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->published); ?>"/>
            <input type="hidden" name="option" value="com_allevents"/>
            <input type="hidden" name="task" value="event.publish"/>
            <?php echo JHtml::_('form.token'); ?>
        </form>

        <?php
        echo AllEventsHelperEventDisplay::getRibbon($item, $this->params);
        echo '<div class="event_content">';
        ?>

        <div class="eml_event_image">
            <div class="eml_nailthumb-container">
                <?php echo AllEventsHelperEventDisplay::getVignette($item, $this->params['gdisplay_colors']); ?>
            </div>
        </div>

        <div class="event_arrow">
            <a href="<?php echo($item->event_link); ?>"
               title="<?php echo JText::_('COM_ALLEVENTS_BTN_VIS') ?>">
                <?php echo '<img alt="' . $item->titre . '" src="' . AllEventsHelperOverride::GetImage('sport_arrow.png') . '" />'; ?>
            </a>
        </div>

        <div class="map_icon">
            <a>
                <?php
                if ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) {
                    echo '<img alt="' . $item->place_titre . '" src="' . AllEventsHelperOverride::GetImage('maps_icon.png') . '" />';
                } else {
                    echo '<img alt="' . $item->place_titre . '" src="' . AllEventsHelperOverride::GetImage('maps_icon_blank.png') . '" />';
                }
                ?>
            </a>
        </div>

        <h3>
            <b>
                <?php echo ($item->hot) ? '<i class="fa fa-star" style="color:gold"></i>' : ''; ?>
                <a href="<?php echo($item->event_link); ?>"><?php echo $item->titre; ?></a>
                <?php echo ($item->hot) ? '<i class="fa fa-star" style="color:gold"></i>' : ''; ?>
            </b>
        </h3>
        <dl>
            <?php
            echo JText::_('COM_ALLEVENTS_VISITED') . '&nbsp;' . $item->hits . '&nbsp;' . JText::_('COM_ALLEVENTS_TIMES');
            if (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 1)) {
                if ($item->allday == "1") {
                    echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                } else {
                    echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                }
            } elseif (($this->params['show_date'] == 0) && ($this->params['show_enddate'] == 1)) {
                if ($item->allday == "1") {
                    echo '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                } else {
                    echo '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                }
            } elseif (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 0)) {
                if ($item->allday == "1") {
                    echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '...</div>';
                } else {
                    echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '...</div>';
                }
            }

            $stip = "";
            if ($this->params['show_agenda'] == 1) $stip .= ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) ? "<span class='se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'><a href='" . $item->agenda_link . "'>" . $item->agenda_titre . "</a><br/></span>" : "";
            if ($this->params['show_activity'] == 1) $stip .= ((isset($item->activity_id)) && ($item->activity_id != null) && ($item->activity_id > 0)) ? "<span class='se_event_info_activity se_activity_" . $item->activity_id . "_bullet'><a href='" . $item->activity_link . "'>" . $item->activity_titre . "</a><br/></span>" : "";
            if ($this->params['show_public'] == 1) $stip .= ((isset($item->public_id)) && ($item->public_id != null) && ($item->public_id > 0)) ? "<span class='se_event_info_public se_public_" . $item->public_id . "_bullet'><a href='" . $item->public_link . "'>" . $item->public_titre . "</a><br/></span>" : "";
            if ($this->params['show_section'] == 1) $stip .= ((isset($item->section_id)) && ($item->section_id != null) && ($item->section_id > 0)) ? "<span class='se_event_info_section se_section_" . $item->section_id . "_bullet'><a href='" . $item->section_link . "'>" . $item->section_titre . "</a><br/></span>" : "";
            if ($this->params['show_category'] == 1) $stip .= ((isset($item->category_id)) && ($item->category_id != null) && ($item->category_id > 0)) ? "<span class='se_event_info_category se_category_" . $item->category_id . "_bullet'><a href='" . $item->category_link . "'>" . $item->category_titre . "</a><br/></span>" : "";
            if ($this->params['show_place'] == 1) $stip .= ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) ? "<span class='se_event_info_place se_place_" . $item->place_id . "_bullet'><a href='" . $item->place_link . "'>" . $item->place_titre . "</a><br/></span>" : "";
            if ($this->params['show_ressource'] == 1) $stip .= ((isset($item->ressource_id)) && ($item->ressource_id != null) && ($item->ressource_id > 0)) ? "<span class='se_event_info_ressource se_ressource_" . $item->ressource_id . "_bullet'><a href='" . $item->ressource_link . "'>" . $item->ressource_titre . "</a><br/></span>" : "";
            echo $stip;
            ?>
        </dl>

        <?php if ($canEdit) : ?>
            <div class="btn-group">
                <button type="button" class="btn btn-info"><?php echo JText::_('JTOOLBAR_BATCH') ?></button>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="<?php echo($item->event_link); ?>"><i
                                class="fa fa-eye">&nbsp;<?php echo JText::_('COM_ALLEVENTS_BTN_VIS') ?></i></a></li>
                    <?php if (($canEdit) && ($item->checked_out == 0)): ?>
                        <li>
                            <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=eventform&id=' . $item->id . $Itemid, false); ?>"><i
                                    class="fa fa-pencil">&nbsp;<?php echo JText::_('JTOOLBAR_EDIT') ?></i></a></li>
                    <?php endif; ?>

                    <?php if (JFactory::getUser()->authorise('core.edit', 'com_allevents')): ?>
                        <?php if ($item->published == 1): ?>
                            <li>
                                <a href="javascript:document.getElementById('form-event-state-<?php echo $item->id; ?>').submit();"><i
                                        class="fa fa-check-square-o">
                                        &nbsp;<?php echo JText::_('COM_ALLEVENTS_UNPUBLISH_ITEM') ?></i></a></li>
                        <?php else : ?>
                            <li>
                                <a href="javascript:document.getElementById('form-event-state-<?php echo $item->id; ?>').submit();"><i
                                        class="fa fa-square-o">
                                        &nbsp;<?php echo JText::_('COM_ALLEVENTS_PUBLISH_ITEM') ?></i></a></li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if (JFactory::getUser()->authorise('core.edit', 'com_allevents')): ?>
                        <li><a href="javascript:deleteItem(<?php echo $item->id; ?>);"><i class="fa fa-trash-o">
                                    &nbsp;<?php echo JText::_('JTOOLBAR_DELETE') ?></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php endif; ?>
<?php endforeach; ?>

<?php if (count($this->currentitems) > 0) { ?>
    <div class="event_container">
        <div class="event_content" style="min-height:0!important;padding:0;"></div>
    </div>
<?php } ?>

<?php if (count($this->nextitems) > 0) { ?>
    <div>
        <h2 class="se_event_chapitre"><?php echo JText::_('COM_ALLEVENTS_NEXT_EVENTS'); ?></h2>
    </div>
<?php } ?>

<?php foreach ($this->nextitems as $item) : ?>

    <?php
    $canEdit = JFactory::getUser()->authorise('core.edit', 'com_allevents');
    if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_allevents.' . $item->id)) {
        $canEdit = JFactory::getUser()->id == $item->created_by;
    }
    if (($item->published == 1 || ($item->published == 0 && JFactory::getUser()->authorise('core.edit.own', ' com_allevents.' . $item->id))) && !($item->cancelled)):
        $show = true;
        ?>
        <div class="event_container <?php echo $item->event_class; ?>">
            <form id="form-event-delete-<?php echo $item->id; ?>" style="display:inline;"
                  action="<?php echo JRoute::_('index.php?option=com_allevents&task=event.remove', false); ?>"
                  method="post"
                  class="form-validate" enctype="multipart/form-data">
                <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
                <input type="hidden" name="option" value="com_allevents"/>
                <input type="hidden" name="task" value="event.remove"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>
            <form id="form-event-state-<?php echo $item->id ?>" style="display:inline;"
                  action="<?php echo JRoute::_('index.php?option=com_allevents&task=event.save', false); ?>"
                  method="post"
                  class="form-validate" enctype="multipart/form-data">
                <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
                <input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->published); ?>"/>
                <input type="hidden" name="option" value="com_allevents"/>
                <input type="hidden" name="task" value="event.publish"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>

            <?php
            echo AllEventsHelperEventDisplay::getRibbon($item, $this->params);
            echo '<div class="event_content">';
            ?>

            <div class="eml_event_image">
                <div class="eml_nailthumb-container">
                    <?php echo AllEventsHelperEventDisplay::getVignette($item, $this->params['gdisplay_colors']); ?>
                </div>
            </div>

            <div class="event_arrow">
                <a href="<?php echo($item->event_link); ?>"
                   title="<?php echo JText::_('COM_ALLEVENTS_BTN_VIS') ?>">
                    <?php echo '<img alt="' . $item->titre . '" src="' . AllEventsHelperOverride::GetImage('sport_arrow.png') . '" />'; ?>
                </a>
            </div>

            <div class="map_icon">
                <a>
                    <?php
                    if ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) {
                        echo '<img alt="' . $item->place_titre . '" src="' . AllEventsHelperOverride::GetImage('maps_icon.png') . '" />';
                    } else {
                        echo '<img alt="' . $item->place_titre . '" src="' . AllEventsHelperOverride::GetImage('maps_icon_blank.png') . '" />';
                    }
                    ?>
                </a>
            </div>

            <h3>
                <b>
                    <?php echo ($item->hot) ? '<i class="fa fa-star" style="color:gold"></i>' : ''; ?>
                    <a href="<?php echo($item->event_link); ?>"><?php echo $item->titre; ?></a>
                    <?php echo ($item->hot) ? '<i class="fa fa-star" style="color:gold"></i>' : ''; ?>
                </b>
            </h3>
            <dl>
                <?php
                echo JText::_('COM_ALLEVENTS_VISITED') . '&nbsp;' . $item->hits . '&nbsp;' . JText::_('COM_ALLEVENTS_TIMES');
                if (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 1)) {
                    if ($item->allday == "1") {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                    } else {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                    }
                } elseif (($this->params['show_date'] == 0) && ($this->params['show_enddate'] == 1)) {
                    if ($item->allday == "1") {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                    } else {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                    }
                } elseif (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 0)) {
                    if ($item->allday == "1") {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '...</div>';
                    } else {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '...</div>';
                    }
                }

                $stip = "";
                if ($this->params['show_agenda'] == 1) $stip .= ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) ? "<span class='se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'><a href='" . $item->agenda_link . "'>" . $item->agenda_titre . "</a><br/></span>" : "";
                if ($this->params['show_activity'] == 1) $stip .= ((isset($item->activity_id)) && ($item->activity_id != null) && ($item->activity_id > 0)) ? "<span class='se_event_info_activity se_activity_" . $item->activity_id . "_bullet'><a href='" . $item->activity_link . "'>" . $item->activity_titre . "</a><br/></span>" : "";
                if ($this->params['show_public'] == 1) $stip .= ((isset($item->public_id)) && ($item->public_id != null) && ($item->public_id > 0)) ? "<span class='se_event_info_public se_public_" . $item->public_id . "_bullet'><a href='" . $item->public_link . "'>" . $item->public_titre . "</a><br/></span>" : "";
                if ($this->params['show_section'] == 1) $stip .= ((isset($item->section_id)) && ($item->section_id != null) && ($item->section_id > 0)) ? "<span class='se_event_info_section se_section_" . $item->section_id . "_bullet'><a href='" . $item->section_link . "'>" . $item->section_titre . "</a><br/></span>" : "";
                if ($this->params['show_category'] == 1) $stip .= ((isset($item->category_id)) && ($item->category_id != null) && ($item->category_id > 0)) ? "<span class='se_event_info_category se_category_" . $item->category_id . "_bullet'><a href='" . $item->category_link . "'>" . $item->category_titre . "</a><br/></span>" : "";
                if ($this->params['show_place'] == 1) $stip .= ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) ? "<span class='se_event_info_place se_place_" . $item->place_id . "_bullet'><a href='" . $item->place_link . "'>" . $item->place_titre . "</a><br/></span>" : "";
                if ($this->params['show_ressource'] == 1) $stip .= ((isset($item->ressource_id)) && ($item->ressource_id != null) && ($item->ressource_id > 0)) ? "<span class='se_event_info_ressource se_ressource_" . $item->ressource_id . "_bullet'><a href='" . $item->ressource_link . "'>" . $item->ressource_titre . "</a><br/></span>" : "";
                echo $stip;
                ?>
            </dl>

            <?php if ($canEdit) : ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-info"><?php echo JText::_('JTOOLBAR_BATCH') ?></button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo($item->event_link); ?>"><i
                                    class="fa fa-eye">&nbsp;<?php echo JText::_('COM_ALLEVENTS_BTN_VIS') ?></i></a></li>
                        <?php if (($canEdit) && ($item->checked_out == 0)): ?>
                            <li>
                                <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=eventform&id=' . $item->id . $Itemid, false); ?>"><i
                                        class="fa fa-pencil">&nbsp;<?php echo JText::_('JTOOLBAR_EDIT') ?></i></a></li>
                        <?php endif; ?>

                        <?php if (JFactory::getUser()->authorise('core.edit', 'com_allevents')): ?>
                            <?php if ($item->published == 1): ?>
                                <li>
                                    <a href="javascript:document.getElementById('form-event-state-<?php echo $item->id; ?>').submit();"><i
                                            class="fa fa-check-square-o">
                                            &nbsp;<?php echo JText::_('COM_ALLEVENTS_UNPUBLISH_ITEM') ?></i></a></li>
                            <?php else : ?>
                                <li>
                                    <a href="javascript:document.getElementById('form-event-state-<?php echo $item->id; ?>').submit();"><i
                                            class="fa fa-square-o">
                                            &nbsp;<?php echo JText::_('COM_ALLEVENTS_PUBLISH_ITEM') ?></i></a></li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (JFactory::getUser()->authorise('core.edit', 'com_allevents')): ?>
                            <li><a href="javascript:deleteItem(<?php echo $item->id; ?>);"><i class="fa fa-trash-o">
                                        &nbsp;<?php echo JText::_('JTOOLBAR_DELETE') ?></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        </div>

    <?php endif; ?>
<?php endforeach; ?>

<?php if (count($this->nextitems) > 0) { ?>
    <div class="event_container">
        <div class="event_content" style="min-height:0!important;padding:0;"></div>
    </div>
<?php } ?>


<?php if (count($this->pasteditems) > 0) { ?>
    <div>
        <h2 class="se_event_chapitre"><?php echo JText::_('COM_ALLEVENTS_PREVIOUS_EVENTS'); ?></h2>
    </div>
<?php } ?>
<?php foreach ($this->pasteditems as $item) : ?>

    <?php
    $canEdit = JFactory::getUser()->authorise('core.edit', 'com_allevents');
    if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_allevents.' . $item->id)) {
        $canEdit = JFactory::getUser()->id == $item->created_by;
    }
    if (($item->published == 1 || ($item->published == 0 && JFactory::getUser()->authorise('core.edit.own', ' com_allevents.' . $item->id))) && !($item->cancelled)):
        $show = true;
        ?>
        <div class="event_container <?php echo $item->event_class; ?>">
            <form id="form-event-delete-<?php echo $item->id; ?>" style="display:inline;"
                  action="<?php echo JRoute::_('index.php?option=com_allevents&task=event.remove', false); ?>"
                  method="post"
                  class="form-validate" enctype="multipart/form-data">
                <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
                <input type="hidden" name="option" value="com_allevents"/>
                <input type="hidden" name="task" value="event.remove"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>
            <form id="form-event-state-<?php echo $item->id ?>" style="display:inline;"
                  action="<?php echo JRoute::_('index.php?option=com_allevents&task=event.save', false); ?>"
                  method="post"
                  class="form-validate" enctype="multipart/form-data">
                <input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>"/>
                <input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->published); ?>"/>
                <input type="hidden" name="option" value="com_allevents"/>
                <input type="hidden" name="task" value="event.publish"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>

            <?php
            echo AllEventsHelperEventDisplay::getRibbon($item, $this->params);
            echo '<div class="event_content">';
            ?>

            <div class="eml_event_image">
                <div class="eml_nailthumb-container">
                    <?php echo AllEventsHelperEventDisplay::getVignette($item, $this->params['gdisplay_colors']); ?>
                </div>
            </div>

            <div class="event_arrow">
                <a href="<?php echo($item->event_link); ?>"
                   title="<?php echo JText::_('COM_ALLEVENTS_BTN_VIS') ?>">
                    <?php echo '<img alt="' . $item->titre . '" src="' . AllEventsHelperOverride::GetImage('sport_arrow.png') . '" />'; ?>
                </a>
            </div>

            <div class="map_icon">
                <a>
                    <?php
                    if ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) {
                        echo '<img alt="' . $item->place_titre . '" src="' . AllEventsHelperOverride::GetImage('maps_icon.png') . '" />';
                    } else {
                        echo '<img alt="' . $item->place_titre . '" src="' . AllEventsHelperOverride::GetImage('maps_icon_blank.png') . '" />';
                    }
                    ?>
                </a>
            </div>

            <h3>
                <b>
                    <?php echo ($item->hot) ? '<i class="fa fa-star" style="color:gold"></i>' : ''; ?>
                    <a href="<?php echo($item->event_link); ?>"><?php echo $item->titre; ?></a>
                    <?php echo ($item->hot) ? '<i class="fa fa-star" style="color:gold"></i>' : ''; ?>
                </b>
            </h3>
            <dl>
                <?php
                echo JText::_('COM_ALLEVENTS_VISITED') . '&nbsp;' . $item->hits . '&nbsp;' . JText::_('COM_ALLEVENTS_TIMES');
                if (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 1)) {
                    if ($item->allday == "1") {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                    } else {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '&nbsp;-&nbsp;' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                    }
                } elseif (($this->params['show_date'] == 0) && ($this->params['show_enddate'] == 1)) {
                    if ($item->allday == "1") {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdate_format']) . '</div>';
                    } else {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;...' . JHtml::date($item->enddate, $this->params['gdatetime_format']) . '</div>';
                    }
                } elseif (($this->params['show_date'] == 1) && ($this->params['show_enddate'] == 0)) {
                    if ($item->allday == "1") {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdate_format']) . '...</div>';
                    } else {
                        echo '<div><i class="fa fa-clock-o"></i>&nbsp;' . JHtml::date($item->date, $this->params['gdatetime_format']) . '...</div>';
                    }
                }

                $stip = "";
                if ($this->params['show_agenda'] == 1) $stip .= ((isset($item->agenda_id)) && ($item->agenda_id != null) && ($item->agenda_id > 0)) ? "<span class='se_event_info_agenda se_agenda_" . $item->agenda_id . "_bullet'><a href='" . $item->agenda_link . "'>" . $item->agenda_titre . "</a><br/></span>" : "";
                if ($this->params['show_activity'] == 1) $stip .= ((isset($item->activity_id)) && ($item->activity_id != null) && ($item->activity_id > 0)) ? "<span class='se_event_info_activity se_activity_" . $item->activity_id . "_bullet'><a href='" . $item->activity_link . "'>" . $item->activity_titre . "</a><br/></span>" : "";
                if ($this->params['show_public'] == 1) $stip .= ((isset($item->public_id)) && ($item->public_id != null) && ($item->public_id > 0)) ? "<span class='se_event_info_public se_public_" . $item->public_id . "_bullet'><a href='" . $item->public_link . "'>" . $item->public_titre . "</a><br/></span>" : "";
                if ($this->params['show_section'] == 1) $stip .= ((isset($item->section_id)) && ($item->section_id != null) && ($item->section_id > 0)) ? "<span class='se_event_info_section se_section_" . $item->section_id . "_bullet'><a href='" . $item->section_link . "'>" . $item->section_titre . "</a><br/></span>" : "";
                if ($this->params['show_category'] == 1) $stip .= ((isset($item->category_id)) && ($item->category_id != null) && ($item->category_id > 0)) ? "<span class='se_event_info_category se_category_" . $item->category_id . "_bullet'><a href='" . $item->category_link . "'>" . $item->category_titre . "</a><br/></span>" : "";
                if ($this->params['show_place'] == 1) $stip .= ((isset($item->place_id)) && ($item->place_id != null) && ($item->place_id > 0)) ? "<span class='se_event_info_place se_place_" . $item->place_id . "_bullet'><a href='" . $item->place_link . "'>" . $item->place_titre . "</a><br/></span>" : "";
                if ($this->params['show_ressource'] == 1) $stip .= ((isset($item->ressource_id)) && ($item->ressource_id != null) && ($item->ressource_id > 0)) ? "<span class='se_event_info_ressource se_ressource_" . $item->ressource_id . "_bullet'><a href='" . $item->ressource_link . "'>" . $item->ressource_titre . "</a><br/></span>" : "";
                echo $stip;
                ?>
            </dl>

            <?php if ($canEdit) : ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-info"><?php echo JText::_('JTOOLBAR_BATCH') ?></button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo($item->event_link); ?>"><i
                                    class="fa fa-eye">&nbsp;<?php echo JText::_('COM_ALLEVENTS_BTN_VIS') ?></i></a></li>
                        <?php if (($canEdit) && ($item->checked_out == 0)): ?>
                            <li>
                                <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=eventform&id=' . $item->id . $Itemid, false); ?>"><i
                                        class="fa fa-pencil">&nbsp;<?php echo JText::_('JTOOLBAR_EDIT') ?></i></a></li>
                        <?php endif; ?>

                        <?php if (JFactory::getUser()->authorise('core.edit', 'com_allevents')): ?>
                            <?php if ($item->published == 1): ?>
                                <li>
                                    <a href="javascript:document.getElementById('form-event-state-<?php echo $item->id; ?>').submit();"><i
                                            class="fa fa-check-square-o">
                                            &nbsp;<?php echo JText::_('COM_ALLEVENTS_UNPUBLISH_ITEM') ?></i></a></li>
                            <?php else : ?>
                                <li>
                                    <a href="javascript:document.getElementById('form-event-state-<?php echo $item->id; ?>').submit();"><i
                                            class="fa fa-square-o">
                                            &nbsp;<?php echo JText::_('COM_ALLEVENTS_PUBLISH_ITEM') ?></i></a></li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (JFactory::getUser()->authorise('core.edit', 'com_allevents')): ?>
                            <li><a href="javascript:deleteItem(<?php echo $item->id; ?>);"><i class="fa fa-trash-o">
                                        &nbsp;<?php echo JText::_('JTOOLBAR_DELETE') ?></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>

<?php if (count($this->pasteditems) > 0) { ?>
    <div class="event_container">
        <div class="event_content" style="min-height:0!important;padding:0;"></div>
    </div>
<?php } ?>

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>

<script type="text/javascript">
    function deleteItem(item_id) {
        if (confirm("<?php echo JText::_('COM_ALLEVENTS_DELETE_MESSAGE'); ?>")) {
            document.getElementById('form-event-delete-' + item_id).submit();
        }
    }

    jQuery(document).ready(function () {
        jQuery('.nailthumb-container').nailthumb({
            width: 116,
            height: 116,
            method: 'resize',
            fitDirection: 'center center'
        });
    });
</script>