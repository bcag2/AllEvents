<?php
defined('_JEXEC') or die;

/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

$document = JFactory::getDocument();
AllEventsHelperOverride::jquery();
JHtml::_('behavior.framework');
JHtml::_('behavior.tooltip');

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.1/masonry.pkgd.min.js');

echo '<h1>' . $this->params['page_title'] . '</h1>';
echo '<div id="cardContainer">';
echo '    <div class="grid-sizer"></div>';
echo '</div>';

echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>

<script>
    (function ($) {
        $(document).ready(function () {
            function addCard(contents) {
                var newCard = document.createElement('div');
                newCard.className = "card_masonry";
                newCard.innerHTML = contents;
                return newCard;
            }

            var container = document.querySelector('#cardContainer');
            var msnry = new Masonry(container, {
                columnWidth: ".grid-sizer",
                itemSelector: ".card_masonry",
                percentPosition: true
            });

            var heightEnd = container.offsetHeight + container.offsetTop;
            var loadBuffer = 200;

            var cardsAddedCount = 0;
            var cardsStart = 0;
            var doneLoading = true;
            var atEnd = false;
            window.onscroll = function () {
                heightEnd = container.offsetHeight + container.offsetTop;
                var yOffset = window.pageYOffset;
                var windowHeight = window.innerHeight;

                if (atEnd == false && yOffset + windowHeight >= heightEnd - loadBuffer) {
                    if (doneLoading == false) {
                        return;
                    }
                    doneLoading = false;

                    var cardsToAdd = [];
                    var fragment = document.createDocumentFragment();

                    var xmlhttp;
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.open("GET", "<?php echo JUri::root(true); ?>/index.php?option=com_allevents&view=fullcalendar&layout=ajaxeventscards&format=ajax&start=" + cardsStart + "&limit=<?php echo 5; ?>", false);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            var response = xmlhttp.responseText;
                            var cardsArray = response.split("\n");
                            var numberOfCards = cardsArray.length;
                            if (numberOfCards <= 1) {
                                atEnd = true;
                                return;
                            }

                            if (cardsArray[numberOfCards - 1] == "") {
                                numberOfCards--;
                            }

                            for (var i = 0; i < numberOfCards; i++) {
                                var newCard = addCard(cardsArray[i]);
                                fragment.appendChild(newCard);
                                cardsToAdd.push(newCard);
                                cardsAddedCount++;
                            }
                            cardsStart += 5;

                            container.appendChild(fragment);
                            msnry.appended(cardsToAdd);
                            heightEnd = container.offsetHeight + container.offsetTop;
                            doneLoading = true;
                        }
                    };
                    xmlhttp.send();
                }
            };
        });
    })(jQuery);
</script>