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

<div class="js-latest-three-visits-list gr <?php echo $moduleclass_sfx; ?>">
    <?php foreach ($items as $item) { ?>
        <?php
        $card = " ";
        $nb++;
        if ($nb == 1) $card = "card__first ";
        if ($nb == $nbevent) $card = "card__last ";
        if ($orientation == "h") $card .= "span3 ";
        $vignette_defaut = modAEBannerHelper::getVignette($item, $dc);
        if ($nb <= $nbevent) {
            ?>
            <div class="visit_card pan <?php echo $card; ?>">
                <div class="visit-card__block js-visitor-card">
                    <div class="visit-card__blur">
                        <div class="visit-card__blur-container">
                            <img alt="" class="visit-card__blur-background" src="<?php echo $vignette_defaut; ?>">
                        </div>
                    </div>
                    <div class="rc mts pll">
                        <div class="visit-card__visitor-picture img-left mbs mrm">
                            <a class="dispb" href="<?php echo $item->link; ?>">
                                <div class="visit-card__visitor-picture-subcontainer">
                                    <img width="140" height="140" class="visit-card__picture bac"
                                         alt="<?php echo $item->title; ?>" src="<?php echo $vignette_defaut; ?>">
                                </div>
                                <?php if ($item->hot) { ?>
                                    <div class="visit-card__visitor-flags">
                                        <div class="visit-card__visitor-picture-star dispib"></div>
                                    </div>
                                <?php } ?>
                            </a>
                        </div>
                        <div class="tal visit-card__fullname-container bd">
                            <a class="visit-card__fullname"
                               href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                        </div>
                    </div>
                    <p class="mbn pll visit-card__headline"><?php echo JHtml::_('date', $item->date, JText::_('DATE_FORMAT_LC3')); ?></p>
                    <?php if (!empty($item->place_titre)) { ?>
                        <div class="mts pll visit-card__location">
                            <i class="fa fa-map-marker"></i>
                            <span class="tac visit-cards__location-town"><?php echo $item->place_titre; ?></span>
                        </div>
                    <?php } ?>

                    <?php if (!empty($item->introtext)) { ?>
                        <div class="mts mll mrl prxs visit-card__tagline-container ">
                            <p title="<?php echo $item->introtext; ?>"
                               class="mbn plxs visit-card__tagline"><?php echo $item->introtext; ?></p>
                        </div>
                    <?php } ?>
                    <!-- <div class="rc visit-card__footer">
                         <div class="img-right">
                             <div class="prl visit-card__footer-cta-container tar blue">
                                 <span class="divider-before-btn-solid" onclick="EnrolYesItem(3978);"><i
                                         class="fa fa-user-plus"></i>&nbsp;Participe</span>
                             </div>
                         </div>
                         <div class="bd pll pbxs rc ptxs">
                             <i class="fa fa-users"></i>
                         <span class="plxs dispb visit-card__footer-common">
                     344 contacts
               </span>
                         </div>
                     </div>-->


                </div>
            </div>
            <?php
        }
        // <div class="visit-card__opportunity">
        // <div class="bd pll tal visit-card__opportunity-text">Cet évènement est complet</div>
        // </div>
    } ?>
</div>