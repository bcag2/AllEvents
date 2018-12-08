<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

//TODO : rajouter les contrôles inscriptions à valider
//TODO : rajouter les contrôles overbooking
defined('_JEXEC') or die;
if (!class_exists('AllEventsHelperParam')) require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

$document = JFactory::getDocument();
$user = JFactory::getUser();
$userId = $user->get('id');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/main.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/icons48.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js');

$params = AllEventsHelperParam::getGlobalParam();
$canEdit = $user->authorise('core.edit', 'com_allevents');
?>

<?php if (!empty($this->sidebar)): ?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span12">
    <?php else : ?>
    <div id="j-main-container">
        <?php endif; ?>

        <?php if ($this->hasPostInstallationMessages): ?>
            <div class="alert alert-info">
                <h4>
                    <?php echo JText::_('ALLEVENTS_CPANEL_PIM_TITLE'); ?>
                </h4>
                <p>
                    <?php echo JText::_('ALLEVENTS_CPANEL_PIM_DESC'); ?>
                </p>
                <p>
                    <a class="btn btn-primary"
                       href="index.php?option=com_postinstall&eid=<?php echo $this->extension_id ?>">
                        <?php echo JText::_('ALLEVENTS_CPANEL_PIM_BUTTON'); ?>
                    </a>
                </p>
            </div>
        <?php elseif (is_null($this->hasPostInstallationMessages)): ?>
            <div class="alert alert-info">
                <h4>
                    <?php echo JText::_('ALLEVENTS_CPANEL_PIM_ERROR_TITLE'); ?>
                </h4>
                <p>
                    <?php echo JText::_('ALLEVENTS_CPANEL_PIM_ERROR_DESC'); ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if ($params['gnewbie'] == 1) : ?>
            <script type="text/javascript">
                function RemoveParamNewbie() {
                    if (confirm("<?php echo JText::_('COM_ALLEVENTS_DELETE_PARAMNEWBIE'); ?>")) {
                        document.getElementById('form-remove-newbie').submit();
                    }
                }
            </script>

            <form id="form-remove-newbie" style="display:inline;"
                  action="<?php echo JRoute::_('index.php?option=com_allevents', false); ?>" method="post"
                  class="form-validate" enctype="multipart/form-data">
                <input type="hidden" name="option" value="com_allevents"/>
                <input type="hidden" name="task" value="RemoveParamNewbie"/>
                <?php echo JHtml::_('form.token'); ?>
            </form>

            <div class="application">
                <button onclick="RemoveParamNewbie()" class="close" type="button">×</button>
                <div class="little-block howto">
                    <form id="catForm" name="catForm" method="post" autocomplete="off">
                        <h3 style="block-title;">
                            <?php echo JText::_('COM_ALLEVENTS_HOWTO'); ?>
                        </h3>

                        <div class="howto">
                            <h4 class="subtitle"><?php echo JText::_('COM_ALLEVENTS_HOWTO_DESC'); ?></h4>
                            <ul class="categorieslist" style="">
                                <li><?php echo JText::_('COM_ALLEVENTS_HOWTO_AGENDA'); ?>
                                    <div class="addcat">
                                        <a title="<?php echo JText::_('COM_ALLEVENTS_ADD_ITEM'); ?>"
                                           href="<?php echo JRoute::_('index.php?option=com_allevents&view=agenda&layout=edit'); ?>">
                                            <i class="fa fa-plus"> </i>
                                        </a>
                                    </div>
                                </li>
                                <li><?php echo JText::_('COM_ALLEVENTS_HOWTO_PLACES'); ?>
                                    <div class="addcat">
                                        <a title="<?php echo JText::_('COM_ALLEVENTS_ADD_ITEM'); ?>"
                                           href="<?php echo JRoute::_('index.php?option=com_allevents&view=place&layout=edit'); ?>">
                                            <i class="fa fa-plus"> </i>
                                        </a>
                                    </div>
                                </li>
                                <li><?php echo JText::_('COM_ALLEVENTS_HOWTO_EVENTS'); ?>
                                    <div class="addcat">
                                        <a title="<?php echo JText::_('COM_ALLEVENTS_ADD_ITEM'); ?>"
                                           href="<?php echo JRoute::_('index.php?option=com_allevents&view=event&layout=edit'); ?>">
                                            <i class="fa fa-plus"> </i>
                                        </a>
                                    </div>
                                </li>
                                <li><?php echo JText::_('COM_ALLEVENTS_HOWTO_HELP'); ?></li>
                            </ul>
                        </div>
                        <?php echo JHtml::_('form.token'); ?>
                    </form>
                </div>
                <div class="little-block agendas">
                    <form id="actForm" name="actForm" method="post">
                        <h3 style="block-title;">
                            <?php echo JText::_('COM_ALLEVENTS_TITLE_AGENDAS'); ?>
                        </h3>
                        <div class="add">
                            <a title="<?php echo JText::_('COM_ALLEVENTS_ADD_ITEM'); ?>"
                               href="<?php echo JRoute::_('index.php?option=com_allevents&view=agenda&layout=edit'); ?>">
                                <i class="fa fa-plus"> </i>
                            </a>
                        </div>
                        <div class="list-container-agendas">
                            <ul class="agendalist" style="">
                                <?php
                                foreach ($this->agendas as $i => $item) {
                                    if ($user->authorise('core.satellites')) {
                                        echo "<li><a href=" . JRoute::_('index.php?option=com_allevents&task=agenda.edit&id=' . $item->id) . ">" . $item->titre . '<div class="count" style="display:inline-block;float:right;"></div></a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <?php echo JHtml::_('form.token'); ?>
                    </form>
                </div>
                <div class="little-block events">
                    <form id="actForm" name="actForm" method="post">
                        <h3 style="block-title;">
                            <?php echo JText::_('COM_ALLEVENTS_TITLE_EVENTS'); ?>
                        </h3>
                        <div class="add">
                            <a title="<?php echo JText::_('COM_ALLEVENTS_ADD_ITEM'); ?>"
                               href="<?php echo JRoute::_('index.php?option=com_allevents&view=event&layout=edit'); ?>">
                                <i class="fa fa-plus"> </i>
                            </a>
                        </div>
                        <div class="list-container-events">
                            <ul class="eventslist" style="">
                                <?php foreach ($this->Events as $i => $item) {
                                    $canEdit = $user->authorise('core.edit');
                                    $canEditOwn = $user->authorise('core.edit.own') && $item->created_by == $userId;

                                    if ($canEdit || $canEditOwn) {
                                        ?>
                                        <li>
                                            <a href="<?php echo JRoute::_('index.php?option=com_allevents&task=event.edit&id=' . $item->id); ?>"><?php echo $item->titre; ?>
                                                <div class="count" style="display:inline-block;float:right;"></div>
                                            </a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <?php echo JHtml::_('form.token'); ?>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <div style="text-align: center;" class="span3 CPallevents">
            <?php if ($user->authorise('core.satellites', 'com_allevents') === true) : ?>
                <?php
                $arrsatellites = [
                    [
                        'activity',
                        'activities',
                        'COM_ALLEVENTS_TITLE_ACTIVITIES',
                        'COM_ALLEVENTS_INFO_ACTIVITIES',
                        'controlpanel_showactivities',
                        $this->NbActivities],
                    [
                        'agenda',
                        'agendas',
                        'COM_ALLEVENTS_TITLE_AGENDAS',
                        'COM_ALLEVENTS_INFO_AGENDAS',
                        'controlpanel_showagendas',
                        $this->NbAgendas],
                    [
                        'category',
                        'categories',
                        'COM_ALLEVENTS_TITLE_CATEGORIES',
                        'COM_ALLEVENTS_INFO_CATEGORIES',
                        'controlpanel_showcategories',
                        $this->NbCategories],
                    [
                        'map',
                        'places',
                        'PLACES',
                        'COM_ALLEVENTS_INFO_PLACES',
                        'controlpanel_showplaces',
                        $this->NbPlaces],
                    [
                        'public',
                        'publics',
                        'COM_ALLEVENTS_TITLE_PUBLICS',
                        'COM_ALLEVENTS_INFO_PUBLICS',
                        'controlpanel_showpublics',
                        $this->NbPublics],
                    [
                        'ressource',
                        'ressources',
                        'COM_ALLEVENTS_TITLE_RESSOURCES',
                        'COM_ALLEVENTS_INFO_RESSOURCES',
                        'controlpanel_showressources',
                        $this->NbRessources],
                    [
                        'section',
                        'sections',
                        'COM_ALLEVENTS_TITLE_SECTIONS',
                        'COM_ALLEVENTS_INFO_SECTIONS',
                        'controlpanel_showsections',
                        $this->NbSections],
                    // ##€
                    [
                        'gcalendar',
                        'gcalendars',
                        'COM_ALLEVENTS_TITLE_GCALENDARS',
                        'COM_ALLEVENTS_INFO_GCALENDARS',
                        'controlpanel_showgcalendars',
                        $this->NbGCalendars],
                    [
                        'customfield',
                        'customfields',
                        'COM_ALLEVENTS_CUSTOMFIELDS',
                        'COM_ALLEVENTS_INFO_CUSTOMFIELDS',
                        'controlpanel_showcustomfields',
                        $this->NbCustomfields],
                    [
                        'ribbon',
                        'ribbons',
                        'COM_ALLEVENTS_RIBBONS',
                        'COM_ALLEVENTS_INFO_RIBBONS',
                        'controlpanel_showribbons',
                        $this->NbRibbons],
                    // €##
                ];

                $nbelem = 0;
                $firstline = true;
                foreach ($arrsatellites as $value) {
                    if ($params[$value[4]] == "1") {
                        echo '<div class="pull-left icon">';
                        echo '   <ul style="list-style: outside none none;">';
                        echo '     <li>';
                        echo '       <a title="' . JText::_($value[3]) . '" href="index.php?option=com_allevents&amp;view=' . $value[1] . '">';
                        echo '           <div align="center" class="se_img48_container">';
                        echo '             <span title="" class="se_img48_sprite se_img48 se_img48_' . $value[0] . '"></span>';
                        echo '           </div>';
                        echo '         <span class="iconText">' . JText::_($value[2]) . ' (' . $value[5] . ')</span>';
                        echo '       </a>';
                        echo '     </li>';
                        echo '   </ul>';
                        echo '</div>';
                    }
                }
                ?>
            <?php endif; ?>
        </div>

        <div style="text-align: center;" class="span3 CPallevents">
            <div class="pull-left icon">
                <ul style="list-style: outside none none;">
                    <li>
                        <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_EVENTS'); ?>"
                           href="index.php?option=com_allevents&amp;view=events">
                            <div align="center" class="se_img48_container">
                                <span title="" class="se_img48_sprite se_img48 se_img48_events"></span>
                            </div>
                            <span
                                class="iconText"><?php echo JText::_('COM_ALLEVENTS_CPANEL_LIST_EVENTS') . ' (' . $this->NbEvents . ')'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="pull-left icon">
                <ul style="list-style: outside none none;">
                    <li>
                        <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_EVENT'); ?>"
                           href="index.php?option=com_allevents&amp;view=event&amp;layout=edit">
                            <div align="center" class="se_img48_container">
                                <span title="" class="se_img48_sprite se_img48 se_img48_event-add"></span>
                            </div>
                            <span class="iconText"><?php echo JText::_('COM_ALLEVENTS_ADDEVENT'); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="pull-left icon">
                <ul style="list-style: outside none none;">
                    <li>
                        <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_EVENTSTOAPPROVE'); ?>"
                           href="index.php?option=com_allevents&amp;view=eventstoapprove">
                            <div align="center" class="se_img48_container">
                                <span title="" class="se_img48_sprite se_img48 se_img48_event-approve"></span>
                            </div>
                            <span
                                class="iconText <?php echo ($this->NbEventsToApprove > 0) ? 'bold' : ''; ?>"><?php echo JText::_('COM_ALLEVENTS_CPANEL_EVENTS_TO_APPROVE') . ' (' . $this->NbEventsToApprove . ')'; ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="pull-left icon">
                <ul style="list-style: outside none none;">
                    <li>
                        <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_ENROLMENTS'); ?>"
                           href="index.php?option=com_allevents&amp;view=enrolments">
                            <div align="center" class="se_img48_container">
                                <span title="" class="se_img48_sprite se_img48 se_img48_enrolments"></span>
                            </div>
                            <span class="iconText"><?php echo JText::_('COM_ALLEVENTS_CPANEL_ENROLMENTS'); ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- ### -->
            <?php if ($params['controlpanel_showpayments'] == "1") : ?>
                <div class="pull-left icon">
                    <ul style="list-style: outside none none;">
                        <li>
                            <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_PAYMENTS'); ?>"
                               href="index.php?option=com_allevents&amp;view=orders">
                                <div align="center" class="se_img48_container">
                                    <span title="" class="se_img48_sprite se_img48 se_img48_payment"></span>
                                </div>
                                <span class="iconText"><?php echo JText::_('COM_ALLEVENTS_CPANEL_PAYMENTS'); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- ### -->
        </div>

        <div style="text-align: center;" class="span3 CPallevents">
            <?php if ($user->authorise('core.admin', 'com_allevents') === true) : ?>
                <div class="pull-left icon">
                    <ul style="list-style: outside none none;">
                        <li>
                            <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_INFO'); ?>"
                               href="index.php?option=com_allevents&amp;view=info">
                                <div align="center" class="se_img48_container">
                                    <span title="" class="se_img48_sprite se_img48 se_img48_info"></span>
                                </div>
                                <span class="iconText"><?php echo JText::_('COM_ALLEVENTS_CPANEL_INFO'); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pull-left icon">
                    <ul style="list-style: outside none none;">
                        <li>
                        </li>
                    </ul>
                </div>
                <div class="pull-left icon">
                    <ul style="list-style: outside none none;">
                        <li>
                            <!-- €€€ -->
                            <?php if ($params['controlpanel_showimport'] == "1") : ?>
                                <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_IMPORT'); ?>"
                                   href="index.php?option=com_allevents&amp;view=import">
                                    <div align="center" class="se_img48_container">
                                        <span title="" class="se_img48_sprite se_img48 se_img48_import"></span>
                                    </div>
                                    <span class="iconText"><?php echo JText::_('COM_ALLEVENTS_CPANEL_IMPORT'); ?></span>
                                </a>
                            <?php endif; ?>
                            <!-- €€€ -->
                        </li>
                    </ul>
                </div>
                <div class="pull-left icon">
                    <ul style="list-style: outside none none;">
                        <li>
                            <a title="<?php echo JText::_('COM_ALLEVENTS_INFO_PLUGIN'); ?>"
                               href="index.php?option=com_plugins&filter_search=allevents">
                                <div align="center" class="se_img48_container">
                                    <span title="" class="se_img48_sprite se_img48 se_img48_plugin"></span>
                                </div>
                                <span class="iconText"><?php echo JText::_('COM_ALLEVENTS_CPANEL_PLUGIN'); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <div class="span3 CPallevents">
            <div class="well">
                <img width="100%" src="../media/com_allevents/css/images/allevents.png" alt="AllEvents" target="_blank"
                     title="AllEvents - visit the website">
                <div class="blockbtn" style="font-size:0.9em;">
                    <b>%%ae3.version%%</b>&nbsp;|&nbsp;<?php echo substr('%%build.date%%', 0, 10); ?></div>
            </div>

            <?php
            echo JHtml::_('bootstrap.startAccordion', 'slide-group-id', $this->slidesOptions);
            $nb = ($this->NbEventsToApprove) ? ' <span class="badge badge-important">' . $this->NbEventsToApprove . '</span>' : ' <span class="badge badge-success">0</span>';
            echo JHtml::_('bootstrap.addSlide', 'slide-group-id', JText::_('COM_ALLEVENTS_CONTROL_PROPOSITIONS') . $nb, 'slide1_id');
            if ($this->NbEventsToApprove) {
                echo '<ul>';
                foreach ($this->EventsToApprove as $item) {
                    echo '<li>';
                    if ($canEdit) {
                        echo '<a href="' . JRoute::_('index.php?option=com_allevents&task=event.edit&id=' . (int)$item->id, false) . '">' . $this->escape($item->titre) . '</a>';
                    } else {
                        echo $this->escape($item->titre);
                    }
                    echo '</li>';
                }
                echo '</ul>';
            } else {
                echo JText::_('COM_ALLEVENTS_CONTROL_NO_PROPOSITIONS');
            }
            echo JHtml::_('bootstrap.endSlide');

            echo JHtml::_('bootstrap.addSlide', 'slide-group-id', JText::_('COM_ALLEVENTS_CONTROL_STATISTICS'), 'slide3_id');
            echo '<div class="how_many">' . JText::_('COM_ALLEVENTS_CPANEL_LIST_EVENTS') . '</div><div class="figure">' . $this->NbEvents . '</div>';
            foreach ($arrsatellites as $value) {
                if ($params[$value[4]] == "1") {
                    echo '<div class="how_many">' . JText::_($value[2]) . '</div><div class="figure">' . $value[5] . '</div>';
                }
            }
            echo JHtml::_('bootstrap.endSlide');

            echo JHtml::_('bootstrap.addSlide', 'slide-group-id', JText::_('COM_ALLEVENTS_CONTROL_EVENTS_MOST_VIEWED'), 'slide4_id');
            if ($this->NbEventsMostViewed) {
                echo '<ol>';
                foreach ($this->EventsMostViewed as $item) {
                    echo '<li>';
                    if ($canEdit) {
                        echo '<a href="' . JRoute::_('index.php?option=com_allevents&task=event.edit&id=' . (int)$item->id, false) . '">' . $this->escape($item->titre) . ' (<span class="figure">' . $item->hits . '</span>)</a>';
                    } else {
                        echo $this->escape($item->titre) . ' (<span class="figure">' . $item->hits . '</span>)';
                    }
                    echo '</li>';
                }
                echo '</ol>';
                echo '<canvas id="myChartEvents" width="200" height="200"></canvas>';
            } else {
                echo JText::_('COM_ALLEVENTS_ERROR_EVENT_NOT_FOUND');
            }
            echo JHtml::_('bootstrap.endSlide');

            echo JHtml::_('bootstrap.addSlide', 'slide-group-id', JText::_('COM_ALLEVENTS_CONTROL_AGENDAS_MOST_VIEWED'), 'slide5_id');
            echo '<canvas id="myChartAgendas" width="200" height="200"></canvas>';
            echo JHtml::_('bootstrap.endSlide');
            echo JHtml::_('bootstrap.endAccordion');
            ?>
        </div>

        <script>
            (function ($) {
                $(document).ready(function ($) {
                    function Colour(col, amt) {
                        var usePound = false;
                        if (col[0] == "#") {
                            col = col.slice(1);
                            usePound = true;
                        }
                        var num = parseInt(col, 16);
                        var r = (num >> 16) + amt;
                        if (r > 255) {
                            r = 255;
                        }
                        else {
                            if (r < 0) {
                                r = 0;
                            }
                        }
                        var b = ((num >> 8) & 0x00FF) + amt;
                        if (b > 255) {
                            b = 255;
                        }
                        else {
                            if (b < 0) {
                                b = 0;
                            }
                        }
                        var g = (num & 0x0000FF) + amt;
                        if (g > 255) {
                            g = 255;
                        }
                        else {
                            if (g < 0) {
                                g = 0;
                            }
                        }
                        return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16);
                    }

                    <?php
                    echo 'var dataevents=[';
                    foreach ($this->EventsMostViewed as $item) {
                        echo '{value:' . $item->hits . ',color:"' . $item->couleur . '",highlight:Colour("' . $item->couleur . '",10),label:"' . $item->titre . '"},';
                    }
                    echo '];';
                    echo 'var dataagendas=[';
                    switch ($params['gdisplay_colors']) {
                        case 0 :
                            //AGENDA
                            foreach ($this->AgendasMostViewed as $item) {
                                echo '{value:' . $item->hits . ',color:"' . $item->couleur . '",highlight:Colour("' . $item->couleur . '",10),label:"' . $item->titre . '"},';
                            }
                            break;
                        case 1 :
                            //ACTIVITY
                            foreach ($this->ActivitiesMostViewed as $item) {
                                echo '{value:' . $item->hits . ',color:"' . $item->couleur . '",highlight:Colour("' . $item->couleur . '",10),label:"' . $item->titre . '"},';
                            }
                            break;
                        case 2 :
                            //CATEGORY
                            foreach ($this->CategoriesMostViewed as $item) {
                                echo '{value:' . $item->hits . ',color:"' . $item->couleur . '",highlight:Colour("' . $item->couleur . '",10),label:"' . $item->titre . '"},';
                            }
                            break;
                    }
                    echo '];';
                    ?>
                    <?php if ($this->NbEventsMostViewed) : ?>
                    var moduleEvents = new Chart(document.getElementById("myChartEvents").getContext('2d')).Doughnut(dataevents, {
                        segmentStrokeColor: "#000",
                        tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %> hits",
                        animation: false
                    });
                    <?php endif ; ?>
                    var moduleAgendas = new Chart(document.getElementById('myChartAgendas').getContext('2d')).Doughnut(dataagendas, {
                        segmentStrokeColor: "#000",
                        tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %> <?php echo JText::_('COM_ALLEVENTS_TITLE_EVENTS'); ?>",
                        animation: false
                    });
                    var legendHolder = document.createElement('div');
                    legendHolder.innerHTML = moduleAgendas.generateLegend();
                    // Include a html legend template after the module doughnut itself
                    Chart.helpers.each(legendHolder.firstChild.childNodes, function (legendNode, index) {
                        Chart.helpers.addEvent(legendNode, 'mouseover', function () {
                            var activeSegment = moduleAgendas.segments[index];
                            activeSegment.save();
                            activeSegment.fillColor = activeSegment.highlightColor;
                            moduleAgendas.showTooltip([activeSegment]);
                            activeSegment.restore();
                        });
                    });
                    Chart.helpers.addEvent(legendHolder.firstChild, 'mouseout', function () {
                        moduleAgendas.draw();
                    });
                    document.getElementById('myChartAgendas').parentNode.parentNode.appendChild(legendHolder.firstChild);
                });
            }(jQuery));
        </script>

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