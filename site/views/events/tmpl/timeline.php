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

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('aetimeline.css'));
$document->addScript(AllEventsHelperOverride::GetScript('timeline.modernizr.min.js'));
$document->addScript(AllEventsHelperOverride::GetScript('aetimeline.js'));
?>
    <h1><?php echo $this->params['page_title']; ?></h1>
    <div class="cd-container">
        <section id="cd-timeline">

            <?php foreach ($this->items as $item): ?>
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img cd-picture">
                        <?php if (!empty($item->agenda_vignette)) {
                            echo '<img src="' . JUri::base(true) . '/' . $item->agenda_bullet . '" alt="' . $item->agenda_titre . '">';
                        }
                        ?>
                    </div>

                    <div class="cd-timeline-content">
                        <h2><?php echo $item->titre; ?></h2>
                        <img src="<?php echo JUri::base(true) . '/' . $item->affiche; ?>" class="img-responsive">
                        <p><?php echo $item->introtext; ?></p>
                        <a href="<?php echo($item->event_link); ?>" class="cd-read-more"><a
                                href="<?php echo($item->event_link); ?>"
                                class="cd-read-more"><?php echo JText::_('COM_ALLEVENTS_READMORE'); ?></a></a>
                        <span class="cd-date"><small><?php echo $item->start_day . ' ' . $this->arrMonthNames[$item->start_month - 1]; ?></small><?php echo JHtml::date($item->date, $this->params['gtime_format']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>

        </section>
    </div>

<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>