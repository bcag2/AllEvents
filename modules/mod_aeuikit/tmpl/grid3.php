<?php

defined('_JEXEC') or die;
$document->addStyleDeclaration('
.event-datum {
    background-color: #fff;
    border: 1px solid #e1e1e1;
    border-radius: 3px;
    float: right;
    font-size: 24px;
    line-height: 24px;
    padding: 9px 10px 5px;
    text-align: center;
}
.event-datum > h6 {
    color: #d3222a;
    font-family: "proxima_nova_rgbold";
    margin: 0;
}
.uk-overlay-hover .event-datum {
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10;
}
');

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

if (!empty($showtitle)) {
    if ($showtitle) {
        echo '<' . $header_tag . '>' . JText::_('MOD_AEUIKIT_TITLE', true) . '</' . $header_tag . '>';
    }
}
$first = true;
if (!empty($items)) {

    echo '<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-large-1-3 ' . $moduleclass_sfx . '" data-uk-grid-match="" data-uk-grid-margin="">';

    foreach ($items as $obj) {
        $li = ($first) ? '<div class="uk-row-first" style="min-height: 269px;">' : '<div style="min-height: 269px;">';
        $link = modAEuikitHelper::getLink($obj, $Itemid, $gparams['gforcenomenuitem']);
        $couleur_texte = modAEuikitHelper::getColor($obj, $dc, $dcb);
        $couleur_fond = modAEuikitHelper::getBackColor($obj, $dc, $dcb);
        $entite_titre = modAEuikitHelper::getEntityTitle($obj, $dc);
        $vignette_defaut = modAEuikitHelper::getVignette($obj, $dc);
        $obj->start_year = (int)JHtml::_('date', $obj->date, "Y");
        $obj->start_month = (int)JHtml::_('date', $obj->date, "m");
        $obj->start_day = (int)JHtml::_('date', $obj->date, "d");
        $obj->end_year = (int)JHtml::_('date', $obj->enddate, "Y");
        $obj->end_month = (int)JHtml::_('date', $obj->enddate, "m");
        $obj->end_day = (int)JHtml::_('date', $obj->enddate, "d");
        echo $li;

        echo '<div class="uk-panel uk-panel-blank uk-overlay-hover">';
        echo '    <a href="' . $link . '" alt="' . $obj->titre . '" class="uk-position-cover uk-position-z-index"></a>';
        echo '    <div class="event-datum uk-overlay-top"> <span>' . $obj->start_day . '</span>';
        echo '        <h6>' . $arrMonthNames[$obj->start_month - 1] . '</h6>';
        echo '    </div>';
        echo '    <div class="uk-panel-teaser uk-overlay"> <img src="' . $vignette_defaut . '" alt="' . $obj->titre . '" class="uk-width-1-1 uk-overlay-scale"> </div>';
        echo '    <p><strong>' . $obj->titre . '</strong></p><span class="uk-text-muted uk-text-truncate">' . $obj->place_titre . '</span>';

        echo '</div>';

        echo '</div>';
    }

    echo '</div>';
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            echo JText::_('MOD_AEUIKIT_NO_EVENT', true);
        }
    }
}



