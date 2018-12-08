<?php
defined('_JEXEC') or die;

/**
 * mod_aeflip
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
// echo '<pre>'.print_r($items,true).'</pre>' ; 
$nb = 0;
?>
<div class="ngm-row clearfix <?php echo $moduleclass_sfx; ?>">

    <?php foreach ($items as $item) { ?>
        <?php
        $nb++;
        $vignette_defaut = modAEBannerHelper::getVignette($item, $dc);
        ?>
        <div data-start="<?php echo(300 * ($nb - 1)); ?>" data-animated="flipInX"
             class="col-xs-12 col-sm-12 col-md-6 col-lg-4 flipInX animated <?php if ($nb == 1) echo "card__first "; ?><?php if ($orientation == "h") echo "span4"; ?>"
             title="<?php echo $item->title; ?>">
            <div class="ngm-thumb">
                <a property_uid="4" property_name="<?php echo $item->title; ?>" data-toggle="modal" href=""><img
                        class="img-responsive" title="<?php echo $item->title; ?>" alt="<?php echo $item->title; ?>"
                        src="<?php echo $item->affiche; //$vignette_defaut; 
                        ?>"></a>
                <div class="mask">
                    <div class="main">
                        <h5><?php echo $item->title; ?>  </h5>
                        <div class="price">
                            <?php echo JHtml::_('date', $item->date, JText::_('DATE_FORMAT_LC3')); ?><span>&nbsp;</span>
                        </div>
                    </div>
                    <div class="content">
                        <p><?php echo $item->introtext; ?></p>
                        <?php if ($params->get('showReadmore')) { ?>
                            <a title="<?php echo $item->title; ?>" class="btn btn-primary btn-block"
                               href="<?php echo $item->link; ?>"><?php echo $params->get('readmoreText'); ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
