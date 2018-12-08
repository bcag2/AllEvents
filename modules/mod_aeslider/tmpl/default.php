<?php
defined('_JEXEC') or die;

/**
 * mod_aeslider
 *
 * @package
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.3
 *
 * inspired by JoomShaper http://www.joomshaper.com slider
 */

?>
<div class="ae-slider <?php echo $moduleclass_sfx ?>">

    <?php if ($params->get('showFeatured')) { ?>
        <span style="background-color: <?php echo $params->get('highilightedColor'); ?>;" class="news-title">
        <?php echo $params->get('featuredText'); ?>
    </span>
    <?php } ?>

    <div id="ae-slider<?php echo $module->id ?>" class="owl-carousel">
        <?php foreach ($items as $item) { ?>
            <div class="item">
                <div class="item-inner">
                    <img class="img-responsive" src="<?php echo $item->image; ?>">
                    <div class="item-content">
                        <h2 class="item-title"><?php echo $item->title; ?></h2>
                        <div class="item-meta">
                            <a style="color:<?php echo $params->get('highilightedColor'); ?>;"
                               href="<?php echo $item->categoryLink ?>">
                                <span class="item-category"><?php echo $item->categoryname; ?></span>
                            </a>
                            |
                            <span
                                class="item-date"><?php echo JHtml::_('date', $item->date, JText::_('DATE_FORMAT_LC3')); ?></span>
                        </div>
                        <p class="item-introtext"><?php echo $item->introtext; ?></p>
                        <?php if ($params->get('showReadmore')) { ?>
                            <a class="readmore" style="color:<?php echo $params->get('highilightedColor'); ?>;"
                               href="<?php echo $item->link ?>"><?php echo $params->get('readmoreText') ?> <i
                                    class="fa fa-angle-right"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
    jQuery(function ($) {
        $(document).ready(function () {
            $("#ae-slider<?php echo $module->id ?>").owlCarousel({
                <?php if ($params->get('showNavigation')) { ?>
                navigation: true,
                <?php } ?>
                slideSpeed: <?php echo $params->get('speed') ?>,
                paginationSpeed: <?php echo $params->get('speed') ?>,
                <?php if($params->get('autoPlay')) { ?>
                autoPlay: <?php echo $params->get('autoPlaySpeed') ?>,
                <?php } ?>
                <?php if($params->get('transitionStyle')) { ?>
                transitionStyle: "<?php echo $params->get('transitionStyle'); ?>",
                <?php } ?>
                singleItem: true,
                autoHeight: true
            });
        });
    });
</script>