<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

AllEventsHelperOverride::uikit();

$document = JFactory::getDocument();
$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addStyleDeclaration('
.ae-article{background:#fff none repeat scroll 0 0;border-radius:0;box-shadow:0 5px 8px 0 rgba(160,166,168,0.35);padding:50px}
* + .ae-margin-xlarge{margin-top:50px}
.ae-margin-xlarge{margin-bottom:50px}
.ae-margin-xlarge-bottom{margin-bottom:50px!important}
.uk-description-list-horizontal{overflow:visible}
.ae-tag-4{border-top-style:solid;border-top-width:4px}
');

$first_event = true;
$nb_image_events = 0;
$nb_hot_events = 0;
$image_events = "";
$list_events = "";
$hot_events = "";

foreach ($this->items as $item) {
    if ($nb_image_events < 6) {
        $image_events .= ($first_event) ? '<div class="uk-row-first">' : '<div>';
        $image_events .= '  <div class="uk-panel">';
        $image_events .= '    <div class="uk-text-center uk-panel-teaser">';
        $image_events .= '      <img src="' . AllEventsHelperEventDisplay::getVignetteName($item, $this->params['gdisplay_colors']) . '" class="uk-overlay-scale" alt="Image' . $item->id . '">';
        $image_events .= '    </div>';
        $image_events .= '  </div>';
        $image_events .= '</div>';
        $nb_image_events++;
    }

    $list_events .= '<dt>' . JHtml::date($item->date, $this->params['gdate_format']) . '</dt>';
    $list_events .= '<dd class="ae-margin-xlarge-bottom">';
    $list_events .= '    <h6 class="uk-margin-bottom">' . $item->titre;
    $list_events .= (!empty($item->place_titre)) ? ' // ' . $item->place_titre : '';
    $list_events .= '    </h6>';
    $list_events .= '    <p>' . AllEventsHelperString::cleanText($item->description, 100);
    $list_events .= '        <a alt="' . JText::_('COM_ALLEVENTS_READMORE') . '" class="uk-margin-small-left" href="' . $item->event_link . '">';
    $list_events .= '            <i class="uk-icon-arrow-right"></i>';
    $list_events .= '        </a>';
    $list_events .= '    </p>';
    $list_events .= '</dd>';

    if ($item->hot) {
        if ($nb_hot_events < 4) {
            $hot_events .= ($first_event) ? '<div class="uk-row-first">' : '<div>';
            $hot_events .= ' <div class="uk-panel uk-panel-box ae-tag-4 se_agenda_' . $item->agenda_id . '_color">';
            $hot_events .= '    <div class="ae-tag-border"></div>';
            $hot_events .= '    <span class="uk-badge">' . $item->agenda_titre . '</span><h3 class="uk-h2 uk-margin-top-remove">' . JHtml::date($item->date, $this->params['gdate_format']) . '</h3>';
            $hot_events .= '    <div class="uk-margin">';
            $hot_events .= '         <p class="uk-text-muted">' . $item->titre . '</p>';
            $hot_events .= '     </div>';
            $hot_events .= ' </div>';
            $hot_events .= '</div>';
            $nb_hot_events++;
        }
    }
    $first_event = false;
}
?>

    <div class="uk-container uk-container-center">
        <div id="ae-main" class="uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="ae-main uk-width-large-1-1 uk-flex-order-last uk-row-first">
                <main id="ae-content" class="ae-content">
                    <div id="system-message-container">
                    </div>
                    <article class="uk-article ae-article">
                        <div class="ae-article-container ">
                            <div class="uk-text-center uk-margin-large-bottom">
                                <h1 class="uk-article-title uk-margin-top-remove">
                                    <?php echo $this->params['page_title']; ?>
                                </h1>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-align-center uk-width-1-1 uk-width-large-2-3">
                                    <p class="uk-text-large uk-text-muted uk-text-center"><?php echo $this->params['menu-meta_description']; ?></p>
                                </div>
                            </div>
                            <div class="ae-margin-xlarge">
                                <div id="wk-grid2ba"
                                     class="uk-grid-width-1-2 uk-grid-width-small-1-3 uk-grid-width-medium-1-6 uk-grid uk-grid-match uk-grid-collapse uk-text-left "
                                     data-uk-grid-match="{target:'&gt; div &gt; .uk-panel', row:true}"
                                     data-uk-grid-margin="">
                                    <?php echo $image_events; ?>
                                </div>
                                <script>
                                    (function ($) {
                                        // get the images of the gallery and replace it by a canvas of the same size to fix the problem with overlapping images on load.
                                        $('img[width][height]:not(.uk-overlay-panel)', $('#wk-grid2ba')).each(function () {
                                            var $img = $(this);
                                            if (this.width == 'auto' || this.height == 'auto' || !$img.is(':visible')) {
                                                return;
                                            }
                                            var $canvas = $('<canvas class="uk-responsive-width"></canvas>').attr({
                                                    width: $img.attr('width'),
                                                    height: $img.attr('height')
                                                }),
                                                img = new Image,
                                                release = function () {
                                                    $canvas.remove();
                                                    $img.css('display', '');
                                                    release = function () {
                                                    };
                                                };
                                            $img.css('display', 'none').after($canvas);
                                            $(img).on('load', function () {
                                                release();
                                            });
                                            setTimeout(function () {
                                                release();
                                            }, 1000);
                                            img.src = this.src;
                                        });
                                    })(jQuery);
                                </script>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-align-center uk-width-1-1 uk-width-large-4-5">
                                    <div class="uk-panel uk-panel-blank">
                                        <dl class="uk-description-list uk-description-list-horizontal">
                                            <?php echo $list_events; ?>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </div>
        <section id="ae-bottom-a" class="ae-bottom-a uk-grid" data-uk-grid-match="{target:'&gt; div &gt; .uk-panel'}"
                 data-uk-grid-margin="">
            <div class="uk-width-1-1 uk-row-first">
                <div class="uk-panel">
                    <div id="wk-gridec6"
                         class="ae-grid-monday uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid uk-grid-match uk-text-center"
                         data-uk-grid-margin="">
                        <?php echo $hot_events; ?>
                    </div>
                    <script>
                        (function ($) {
                            // get the images of the grid and replace it by a canvas of the same size to fix the problem with overlapping images on load.
                            $('img[width][height]:not(.uk-overlay-panel)', $('#wk-gridec6')).each(function () {
                                var $img = $(this);
                                if (this.width == 'auto' || this.height == 'auto' || !$img.is(':visible')) {
                                    return;
                                }
                                var $canvas = $('<canvas class="uk-responsive-width"></canvas>').attr({
                                        width: $img.attr('width'),
                                        height: $img.attr('height')
                                    }),
                                    img = new Image;
                                $img.css('display', 'none').after($canvas);
                                img.onload = function () {
                                    $canvas.remove();
                                    $img.css('display', '');
                                };
                                img.src = this.src;
                            });
                        })(jQuery);
                    </script>
                </div>
            </div>
        </section>
    </div>
<?php
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
echo AllEventsHelperEventDisplay::getRichSnippet($this->richsnippetsblock);
?>