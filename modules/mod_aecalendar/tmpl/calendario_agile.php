<?php
/**
 * @version     %%ae3.version%%
 * @package     %%ae3.package%%
 * @copyright   %%ae3.copyright%%
 * @license     %%ae3.license%%
 * @author      %%ae3.author%%
 */
defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperRoute'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/route.php';
AllEventsHelperOverride::jquery();
$document = JFactory::getDocument();
$document->addScript(AllEventsHelperOverride::GetScript('modernizr-custom.js'));
$document->addScript(AllEventsHelperOverride::GetScript('jquery.calendario.min.js'));
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('jquery.calendario.css'));
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('jquery.calendario.agile.css'));
?>

<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
      rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
<!-- //web font -->

<div id="mod_aecalendar3" class="custom-calendar-wrap agile <?php echo $moduleclass_sfx; ?>">
    <div id="custom-inner" class="custom-inner">
        <div class="w3ls-header">
            <nav>
                <span id="custom-prev" class="custom-prev"></span>
                <span id="custom-next" class="custom-next"></span>
                <span id="custom-current" class="custom-current" title="Go to current date"></span>
            </nav>
            <h2 id="custom-month" class="custom-month"></h2>
            <h3 id="custom-year" class="custom-year"></h3>
        </div>
        <div class="clear"></div>
        <div id="mod_calendario" class="fc-calendar-container"></div>
    </div>
</div>

<script type="text/javascript">
    var codropsEvents = {
        <?php
        $oldday = "0";
        $start = true;

        foreach ($items as $obj) {
            // on évite le bug de la date où tout est égal à 0
            if ($obj->start_month > 0) {
                $link = AllEventsHelperRoute::getEventRoute($obj->event_id, $obj->event_alias);
                if (empty($dc)) {
                    $couleur_texte = ($dcb == 1) ? $obj->couleur : $obj->couleur_texte;
                    $couleur_back = ($dcb == 1) ? $obj->couleur_texte : $obj->couleur;
                } elseif ($dc == 1) {
                    $couleur_texte = ($dcb == 1) ? $obj->activity_couleur : $obj->activity_couleur_texte;
                    $couleur_back = ($dcb == 1) ? $obj->activity_couleur_texte : $obj->activity_couleur;
                } elseif ($dc == 2) {
                    $couleur_texte = ($dcb == 1) ? $obj->category_couleur : $obj->category_couleur_texte;
                    $couleur_back = ($dcb == 1) ? $obj->category_couleur_texte : $obj->category_couleur;
                }

                $curday = $obj->start_month . "-" . $obj->start_day . "-" . $obj->start_year;
                if ($curday <> $oldday) {
                    if ($start == false) {
                        echo "\"," . PHP_EOL;
                    }
                    echo "'" . $curday . "' : \"<span><a style='color:" . $couleur_texte . ";backcolor:" . $couleur_back . ";' href='" . $link . "'>" . htmlentities($obj->titre) . "</a></span>";
                    $oldday = $curday;
                    $start = false;
                } else {
                    echo "<span><a style='color:" . $couleur_texte . ";' href='" . $link . "'>" . htmlentities($obj->titre) . "</a></span>";
                }
            }
        }
        echo '"' . PHP_EOL;
        ?>
    }; // fin de codropsEvents
    var monthNames = [<?php echo $smonthNames; ?>];
    var dayNames = [<?php echo $dayNames; ?>];

    (function ($) {
        $(document).ready(function () {
            $(document).on('shown.calendar.calendario', function (e, instance) {
                if (!instance) {
                    instance = cal;
                }
                var $cell = instance.getCell(new Date().getDate());
                if ($cell.hasClass('fc-today')) {
                    $cell.trigger('click.calendario');
                }
            });

            var transEndEventNames = {
                    'WebkitTransition': 'webkitTransitionEnd',
                    'MozTransition': 'transitionend',
                    'OTransition': 'oTransitionEnd',
                    'msTransition': 'MSTransitionEnd',
                    'transition': 'transitionend'
                },
                transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
                $wrapper = $('#custom-inner'),
                $calendar = $('#mod_calendario'),
                cal = $calendar.calendario({
                    onDayClick: function ($el, data, dateProperties) {
                        if (data.content.length > 0) {
                            showEvents(data.content, dateProperties);
                        }
                    },
                    caldata: codropsEvents,
                    weeks: dayNames,
                    weekabbrs: dayNames,
                    months: monthNames,
                    monthabbrs: monthNames,
                    displayWeekAbbr: true, // choose between values in options.weeks or options.weekabbrs
                    displayMonthAbbr: false, // choose between values in options.months or options.monthabbrs
                    startIn: <?php echo $startWeekDay; ?>,// left most day in the calendar (0 - Sunday, 1 - Monday, ... , 6 - Saturday)
                    events: 'click',
                    fillEmpty: true,
                    feedParser: './feed/',
                    zone: '00:00', // Ex: IST zone time is '+05:30' by default it is GMT, Sign is important.
                    checkUpdate: false//Check if any new version of Calendario is released (Details will be in the browser console)
                }),
                $month = $('#custom-month').html(cal.getMonthName()),
                $year = $('#custom-year').html(cal.getYear());

            $('#custom-next').on('click', function () {
                cal.gotoNextMonth(updateMonthYear);
            });

            $('#custom-prev').on('click', function () {
                cal.gotoPreviousMonth(updateMonthYear);
            });

            function updateMonthYear() {
                $month.html(cal.getMonthName());
                $year.html(cal.getYear());
            }

            // just an example..
            function showEvents(contentEl, dateProperties) {
                hideEvents();
                var $events = $('<div id="custom-content-reveal" class="custom-content-reveal"><h4><?php echo JText::_('MOD_AECALENDAR_EVENTS_FOR', true); ?> ' + dateProperties.day + ' ' + dateProperties.monthname + ' ' + dateProperties.year + '</h4></div>'),
                    $close = $('<span class="custom-content-close"></span>').on('click', hideEvents);
                $events.append(contentEl.join(''), $close).insertAfter($wrapper);
                setTimeout(function () {
                    $events.css('top', '0%');
                }, 25);
            }

            function hideEvents() {
                var $events = $('#custom-content-reveal');
                if ($events.length > 0) {
                    $events.css('top', '100%');
                    Modernizr.csstransitions ? $events.on(transEndEventName, function () {
                        $(this).remove();
                    }) : $events.remove();
                }
            }
        }); // document.ready(function ($)
    })(jQuery);
</script>