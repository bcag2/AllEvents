<?php
/**
 * mod_aedeck
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.3.3
 *
 */
defined('_JEXEC') or die;

$sReturn = '';
$sReturn .= '<div id="mod_aedeck ' . $moduleclass_sfx . '>';
$sReturn .= '    <div class="mod_aedeck_baraja">';
$sReturn .= '        <ul id="baraja-el" class="baraja-container">';
foreach ($items as $item) {
    $vignette_defaut = modAEDeckHelper::getVignette($item, 0);
    $link = modAEDeckHelper::getLink($item, 0);
    $sReturn .= '<li>';
    $sReturn .= '   <img src="' . $vignette_defaut . '" alt="mod_aedeck_image' . $item->id . '"/>';
    $sReturn .= '   <h4>' . $item->title . '</h4>';
    $sReturn .= '   <p style="color:#666;">' . JHtml::_('date', $item->date, JText::_('DATE_FORMAT_LC3')) . '</p>';
    $sReturn .= '   <p>' . $item->introtext . '</p>';
    if ($params->get('showReadmore')) {
        $sReturn .= ' <p><a class="readmore" href="' . $link . '">' . $params->get('readmoreText') . '<i class="fa fa-angle-right"></i></a></p>';
    }
    $sReturn .= ' </li>';
}
$sReturn .= '        </ul>';
$sReturn .= '    </div>';
$sReturn .= '    <nav class="actions light">';
$sReturn .= '        <span id="nav-prev"><i class="fa fa-angle-left"></i></span>';
$sReturn .= '        <span id="nav-next"><i class="fa fa-angle-right"></i></span>';
$sReturn .= '    </nav>';
$sReturn .= '</div>';
echo $sReturn;
$transitionStyle = (int)$params->get('transitionStyle');
$transitionStyle = 1;
?>

<script type="text/javascript">
    (function ($) {
        $(function () {
            var $el = $('#baraja-el');
            var baraja = $el.baraja();
            <?php
            switch ($transitionStyle)
            {
            case 1:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 90,
                direction: 'right',
                origin: {x: 25, y: 100},
                center: true
            });
            <?php        break;
            case 2:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 90,
                direction: 'left',
                origin: {x: 75, y: 100},
                center: true
            });
            <?php        break;
            case 3:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 90,
                direction: 'right',
                origin: {minX: 20, maxX: 80, y: 100},
                center: true,
                translation: 60
            });
            <?php        break;
            case 4:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 90,
                direction: 'left',
                origin: {minX: 20, maxX: 80, y: 100},
                center: true,
                translation: 60
            });
            <?php        break;
            case 5:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 100,
                direction: 'right',
                origin: {x: 50, y: 200},
                center: true
            });
            <?php        break;
            case 6:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 80,
                direction: 'left',
                origin: {x: 200, y: 50},
                center: true
            });
            <?php        break;
            case 7:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 20,
                direction: 'right',
                origin: {x: 50, y: 200},
                center: false,
                translation: 300
            });
            <?php        break;
            case 8:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 20,
                direction: 'left',
                origin: {x: 50, y: 200},
                center: false,
                translation: 300
            });
            <?php        break;
            case 9:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 20,
                direction: 'right',
                origin: {x: 50, y: 200},
                center: false,
                translation: 300,
                scatter: true
            });
            <?php        break;
            case 10:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 20,
                direction: 'left',
                origin: {x: 50, y: 200},
                center: false,
                translation: 300,
                scatter: true
            });
            <?php        break;
            case 11:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 130,
                direction: 'left',
                origin: {x: 25, y: 100},
                center: false
            });
            <?php        break;
            case 12:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 360,
                direction: 'left',
                origin: {x: 50, y: 90},
                center: false
            });
            <?php        break;
            case 13:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 330,
                direction: 'left',
                origin: {x: 50, y: 100},
                center: true
            });
            <?php        break;
            case 14:?>        baraja.setFanSettings({
                speed: 500,
                easing: 'ease-out',
                range: 90,
                direction: 'right',
                origin: {minX: 20, maxX: 80, y: 100},
                center: true,
                translation: 60,
                scatter: true
            });
            <?php } ?>
            // navigation
            $('#nav-prev').on('click', function (event) {
                baraja.previous();
            });
            $('#nav-next').on('click', function (event) {
                baraja.next();
            });
        });
    })(jQuery);
</script>