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
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.2/js/core/switcher.js');

if (!empty($showtitle)) {
    if ($showtitle) {
        echo '<' . $header_tag . '>' . JText::_('MOD_AEUIKIT_TITLE', true) . '</' . $header_tag . '>';
    }
}

$first = true;
if (!empty($items)) {
    echo '<div class="uk-grid-margin ' . $moduleclass_sfx . '">';
    echo "<ul class=\"uk-subnav uk-subnav-pill\" data-uk-switcher=\"{connect:'#ae-switcher', animation: 'slide-horizontal'}\">";
    $first = true;
    foreach ($items as $obj) {
        $active = ($first) ? "uk-active" : "";
        echo " <li class=\"" . $active . "\" aria-expanded=\"true\"><a href=\"#\">" . JHtml::_('date', $obj->date, "j F") . "</a></li>";
        $first = false;
    }
    echo "</ul>";

    echo '<ul id="ae-switcher" class="uk-switcher uk-text-left uk-margin-top" data-uk-check-display="">';
    $first = true;
    foreach ($items as $obj) {
        $li = ($first) ? '<li aria-hidden="false" class="uk-active">' : '<li aria-hidden="true">';
        $link = modAEuikitHelper::getLink($obj, $Itemid, $gparams['gforcenomenuitem']);
        $couleur_texte = modAEuikitHelper::getColor($obj, $dc, $dcb);
        $couleur_fond = modAEuikitHelper::getBackColor($obj, $dc, $dcb);
        $entite_titre = modAEuikitHelper::getEntityTitle($obj, $dc);
        $vignette_defaut = modAEuikitHelper::getVignette($obj, $dc);
        $obj->intro = AllEventsHelperString::cleanText($obj->description, $maxLength);

        echo $li;
        echo '<div class="uk-panel">';
        echo '    <div class="uk-margin uk-text-center">';
        echo '        <div class="uk-overlay uk-overlay-hover "><img src="' . $vignette_defaut . '" class=" uk-overlay-scale" alt="' . $obj->titre . '">';
        echo '            <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon uk-overlay-fade"></div>';
        echo '            <a class="uk-position-cover" href="' . $link . '"></a>';
        echo '        </div>';
        echo '    </div>';
        echo '    <span class="">' . $entite_titre . '</span>';
        echo '    <h3 class="uk-panel-title">' . $obj->titre . '</h3>';
        echo '    <div>';
        if (!empty($obj->place_titre)) {
            echo '        <span class="uk-float-left">';
            echo '            <i class="uk-icon-map-marker">&nbsp;</i>' . $obj->place_titre;
            echo '        </span>';
        }
        echo '        <span class="uk-float-right"><i class="uk-icon-clock-o">&nbsp;</i>' . JHtml::_('date', $obj->mydatetime, AllEventsHelperDate::jVersionFormat($params['gtime_format'])) . '</span>';
        echo '    </div>';
        echo '    <div class="uk-margin">';
        echo '        <p>' . $obj->intro . '</p>';
        echo '    </div>';
        echo '    <p><a class="uk-button uk-button-link" href="' . $link . '">' . JText::_('MOD_AEUIKIT_READMORE', true) . '</a></p>';
        echo '</div>';
        echo '</li>';
    }
    echo "</ul>";
    echo '</div>';
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            echo JText::_('MOD_AEUIKIT_NO_EVENT', true);
        }
    }
}