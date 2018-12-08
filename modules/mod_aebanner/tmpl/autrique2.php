<?php
defined('_JEXEC') or die;

/**
 * mod_aebanner
 *
 * @package
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.4
 */
$nb = 0;
?>

<div class="js-latest-three-visits-list row gr <?php echo $moduleclass_sfx; ?>">
    <?php foreach ($items as $item) { ?>
        <?php
        $card = " ";
        $nb++;
        if ($nb == 1) $card = "card__first ";
        if ($nb == $nbevent) $card = "card__last ";
        if ($orientation == "h") $card .= "span3 col-xs-12 col-md-3";
        $vignette_defaut = modAEBannerHelper::getVignette($item, $dc);
        ?>
        <div class="visit_card pan <?php echo $card; ?>">
            <div class="visit-card__block js-visitor-card">
                <p class="mbn pll visit-card__headline"><?php echo JHtml::_('date', $item->date, JText::_('DATE_FORMAT_LC3')); ?></p>
                <div title="Category" data-toggle="tooltip" itemprop="itemTags"
                     class="category category_<?php echo $item->agenda_id ?>"><?php echo $item->agenda_titre ?></div>
                <div class="tal visit-card__fullname-container bd">
                    <a class="visit-card__fullname" href="<?php echo $item->link; ?>">
                        <h4><?php echo $item->title; ?></h4>
                    </a>
                </div>
                <div class="visit-card__blur">
                    <div class="">
                        <a title="<?php echo $item->title; ?>"
                           href="<?php echo $item->link; ?>"><img alt="" class="" src="<?php echo $vignette_defaut; ?>"></a>
                    </div>
                </div>
                <div class="event_details">
                    <div class="rc">
                    </div>

                    <?php if (!empty($item->introtext)) { ?>
                        <div class="">
                            <p title="<?php echo $item->introtext; ?>"
                               class="introtext"><?php echo $item->introtext; ?></p>
                        </div>
                    <?php } ?>
                    <?php if ($params->get('showReadmore')) { ?>
                        <a title="<?php echo $item->title; ?>" class="btn btn-primary btn-block"
                           href="<?php echo $item->link; ?>"><?php echo $params->get('readmoreText'); ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php

    } ?>
</div>