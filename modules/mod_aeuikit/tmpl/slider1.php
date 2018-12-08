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
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.2/css/components/slider.css');
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.2/css/components/slidenav.css');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.2/js/components/slider.js');

if (!empty($showtitle)) {
    if ($showtitle) {
        echo '<' . $header_tag . '>' . JText::_('MOD_AEUIKIT_TITLE', true) . '</' . $header_tag . '>';
    }
}
$first = true;
if (!empty($items)) {
    echo '    <div class="uk-slidenav-position ' . $moduleclass_sfx . '" data-uk-slider>';
    echo '        <div class="uk-slider-container">';
    echo '            <ul class="uk-slider uk-grid-width-medium-1-3">';

    foreach ($items as $obj) {
        //$li = ($first) ? '<li>' : '<li aria-hidden="true">';
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
        echo '<li>';
        echo '    <div class="uk-content-pro-item uk-overlay">';
        echo '        <div class="uk-content-pro-image">';
        echo '                <img src="' . $vignette_defaut . '" draggable="false" width="1000" height="600">';
        echo '        </div>';
        echo '        <div class="uk-overlay-panel uk-overlay-background uk-overlay-bottom">';
        echo '            <h4>';
        echo '                <a href="' . $link . '" draggable="false">' . $obj->titre . '</a>';
        echo '            </h4>';
        echo '            <div class="uk-article-details">';
        echo '                <span class="uk-article-date"><i class="uk-icon-clock-o">&nbsp;</i>' . $obj->start_day . '</em>&nbsp;' . $arrMonthNames[$obj->start_month - 1] . '&nbsp;' . $obj->start_year . '</span>';
        echo '            </div>';
        echo '        </div>';
        echo '    </div>';
        echo '</li>';
    }
    echo '        </ul>';
    echo '    </div>';
    echo '    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>';
    echo '    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>';
    echo '</div>';

} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            echo JText::_('MOD_AEUIKIT_NO_EVENT', true);
        }
    }
}