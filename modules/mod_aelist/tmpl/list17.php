<?php

defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

$document = JFactory::getDocument();
$document->addStyleSheet('https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic');

echo '<div class="mod_aelist17 ' . $moduleclass_sfx . '">';
if (!empty($showtitle)) {
    if ($showtitle) {
        echo '<' . $header_tag . '>' . JText::_('MOD_AELIST_TITLE', true) . '</' . $header_tag . '>';
    }
}
if (!empty($items)) {
    foreach ($items as $event) {
        $event->link = modAEListHelper::getLink($event, $Itemid, $gparams['gforcenomenuitem']);
        $event->couleur_texte = modAEListHelper::getColor($event, $dc, $dcb);
        $event->couleur_fond = modAEListHelper::getBackColor($event, $dc, $dcb);
        $event->entite_titre = modAEListHelper::getEntityTitle($event, $dc);
        $event->vignette_defaut = modAEListHelper::getVignette($event, $dc, true);
        $event->start_year = (int)JHtml::_('date', $event->date, "Y");
        $event->start_month = (int)JHtml::_('date', $event->date, "m");
        $event->start_day = (int)JHtml::_('date', $event->date, "d");
        $event->end_year = (int)JHtml::_('date', $event->enddate, "Y");
        $event->end_month = (int)JHtml::_('date', $event->enddate, "m");
        $event->end_day = (int)JHtml::_('date', $event->enddate, "d");
        $event->intro = AllEventsHelperString::cleanText($event->description, $maxLength);
        $event->mydate = "";
        if ($event->allday == 1) {
            $event->mydate .= JHtml::_('date', $event->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdate_format']));
        } else {
            $event->mydate .= JHtml::_('date', $event->mydatetime, AllEventsHelperDate::jVersionFormat($params['gdatetime_format']));
        }

        // on évite le bug de la date où tout est égal à 0
        if ($event->start_month > 0) {

            echo '<div class="event-grid">';
            echo '   <div class="event_img">';
            echo '            <img src="' . $event->vignette_defaut . '" title="' . $event->titre . '" alt="' . $event->titre . '">';
            echo '   </div>';
            echo '   <div class="event_desc">';
            echo '      <h4><span>' . $event->titre . '</span></h4>';
            echo '      <h4>' . $event->mydate . '</h4>';
            echo '      <p>' . $event->intro . '<a href="' . $event->link . '">[...]</a></p>';
            echo '   </div>';
            echo '   <div class="clear"> </div>';
            echo '</div>';
        }
    }
    if ($showurl) {
        echo '<div class="view - all"><a href="' . $url . '">' . JText::_('MOD_AELIST_TITLELINK', true) . '</a></div>';
    }
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            $sReturn .= JText::_('MOD_AELIST_NO_EVENT', true);
        }
    }
}
echo '</div >';