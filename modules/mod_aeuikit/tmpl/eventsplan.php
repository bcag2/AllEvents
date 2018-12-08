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

if (!empty($showtitle)) {
    if ($showtitle) {
        echo '<' . $header_tag . '>' . JText::_('MOD_AEUIKIT_TITLE', true) . '</' . $header_tag . '>';
    }
}

$first = true;
if (!empty($items)) {
    foreach ($items as $obj) {

    }
} else {
    if (!empty($shownoevent)) {
        if ($shownoevent) {
            echo JText::_('MOD_AEUIKIT_NO_EVENT', true);
        }
    }
}

/*
 * .tm-text-uppercase {
    font-size: 14px;
    letter-spacing: 1px;
    line-height: 25px;
    text-transform: uppercase;
}
 *
 *
 * <div class="uk-panel">
    <h2><span class="tm-text-highlight">Eventplan 2016</span></h2>

    <div class="uk-grid uk-flex uk-margin-large-top tm-margin-xlarge-bottom" data-uk-grid-margin="">
        <div class="uk-width-large-1-2 uk-flex-middle uk-row-first">

            <ul class="uk-list uk-list-line ">


                <li>



                    <h3 class="uk-default uk-margin-remove"></h3>
                    <h3 class="uk-margin-remove">
                        <div class="uk-clearfix">
                            <p>
                                <span class="tm-text-uppercase">APR 16th / Veggy festival</span>
                                <span class="uk-float-right">LA, Market Place</span>
                            </p>
                        </div>
                    </h3>


                </li>


                <li>



                    <h3 class="uk-default uk-margin-remove"></h3>
                    <h3 class="uk-margin-remove">
                        <div class="uk-clearfix">
                            <p>
                                <span class="tm-text-uppercase">MAY 25th / Summersplash</span>
                                <span class="uk-float-right">LA, Malibu Beach</span>
                            </p>
                        </div>
                    </h3>


                </li>


                <li>



                    <h3 class="uk-default uk-margin-remove"></h3>
                    <h3 class="uk-margin-remove">
                        <div class="uk-clearfix">
                            <span class="tm-text-uppercase">JUN 25th / Lunatic Festival</span>
                            <span class="uk-float-right">LA, Malibu Road</span>
                            <p></p>
                        </div>
                    </h3>


                </li>


                <li>



                    <h3 class="uk-default uk-margin-remove"></h3>
                    <h3 class="uk-margin-remove">
                        <div class="uk-clearfix">
                            <p>
                                <span class="tm-text-uppercase">JUL 16th / Food Truck Day</span>
                                <span class="uk-float-right">LA, Market Place</span>
                            </p>
                        </div>
                    </h3>


                </li>


            </ul>

        </div>
        <div class="uk-width-large-1-2 uk-flex-middle">

            <ul class="uk-list uk-list-line ">


                <li>



                    <h3 class="uk-default uk-margin-remove"></h3>
                    <h3 class="uk-margin-remove">
                        <div class="uk-clearfix">
                            <p>
                                <span class="tm-text-uppercase">AUG 10th / Color festival</span>
                                <span class="uk-float-right">LA, White Beach</span>
                            </p>
                        </div>
                    </h3>


                </li>


                <li>



                    <h3 class="uk-default uk-margin-remove"></h3>
                    <h3 class="uk-margin-remove">
                        <div class="uk-clearfix">
                            <p>
                                <span class="tm-text-uppercase">SEP 04th / ArtDAY</span>
                                <span class="uk-float-right">LA, Venice Beach</span>
                            </p>
                        </div>
                    </h3>


                </li>


                <li>



                    <h3 class="uk-default uk-margin-remove"></h3>
                    <h3 class="uk-margin-remove">
                        <div class="uk-clearfix">
                            <span class="tm-text-uppercase">SEP 09th / Indie Festival</span> <span class="uk-float-right">LA, Fonda Theater</span>
                            <p></p>
                        </div>
                    </h3>


                </li>


                <li>



                    <h3 class="uk-default uk-margin-remove"></h3>
                    <h3 class="uk-margin-remove">
                        <div class="uk-clearfix">
                            <p>
                                <span class="tm-text-uppercase">OKT 20th / GreenJam</span>
                                <span class="uk-float-right">LA, City Park</span>
                            </p>
                        </div>
                    </h3>


                </li>


            </ul>

        </div>
    </div>



    <div id="wk-grida8a" class="uk-grid-width-1-2 uk-grid-width-small-1-3 uk-grid-width-medium-1-6 uk-grid uk-grid-match uk-text-left " data-uk-grid-match="{target:'&gt; div &gt; .uk-panel', row:true}" data-uk-grid-margin="">


        <div class="uk-row-first">
            <div class="uk-panel" style="min-height: 93px;">





                <div class="uk-margin">
                    <h3 class="uk-text-center"><span class="tm-text-highlight">Our <br>Sponsors</span></h3>
                </div>




            </div>
        </div>


        <div>
            <div class="uk-panel" style="min-height: 93px;">



                <div class="uk-text-center uk-panel-teaser"><img src="/themes/joomla/2016/edge/images/yootheme/events-logo-01.svg" class=" uk-overlay-scale" alt="Events Logo 01"></div>





            </div>
        </div>


        <div>
            <div class="uk-panel" style="min-height: 93px;">



                <div class="uk-text-center uk-panel-teaser"><img src="/themes/joomla/2016/edge/images/yootheme/events-logo-02.svg" class=" uk-overlay-scale" alt="Events Logo 02"></div>





            </div>
        </div>


        <div>
            <div class="uk-panel" style="min-height: 93px;">



                <div class="uk-text-center uk-panel-teaser"><img src="/themes/joomla/2016/edge/images/yootheme/events-logo-03.svg" class=" uk-overlay-scale" alt="Events Logo 03"></div>





            </div>
        </div>


        <div>
            <div class="uk-panel" style="min-height: 93px;">



                <div class="uk-text-center uk-panel-teaser"><img src="/themes/joomla/2016/edge/images/yootheme/events-logo-04.svg" class=" uk-overlay-scale" alt="Events Logo 04"></div>





            </div>
        </div>


        <div>
            <div class="uk-panel" style="min-height: 93px;">



                <div class="uk-text-center uk-panel-teaser"><img src="/themes/joomla/2016/edge/images/yootheme/home-logo-05.svg" class=" uk-overlay-scale" alt="Home Logo 05"></div>





            </div>
        </div>


    </div>

    <script>
        (function($) {

            // get the images of the gallery and replace it by a canvas of the same size to fix the problem with overlapping images on load.
            $('img[width][height]:not(.uk-overlay-panel)', $('#wk-grida8a')).each(function() {

                var $img = $(this);

                if (this.width == 'auto' || this.height == 'auto' || !$img.is(':visible')) {
                    return;
                }

                var $canvas = $('&lt;canvas class="uk-responsive-width"&gt;&lt;/canvas&gt;').attr({
                        width: $img.attr('width'),
                        height: $img.attr('height')
                    }),
                    img = new Image,
                    release = function() {
                        $canvas.remove();
                        $img.css('display', '');
                        release = function() {};
                    };

                $img.css('display', 'none').after($canvas);

                $(img).on('load', function() {
                    release();
                });
                setTimeout(function() {
                    release();
                }, 1000);

                img.src = this.src;

            });

        })(jQuery);
    </script>

</div>
 */