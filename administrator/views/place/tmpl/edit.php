<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

JHtml::_('jquery.framework');

$document = JFactory::getDocument();
$lang = substr($document->language, 0, 2);
$gmapkey = $this->params['gmapkey'];
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
?>

<?php
$app = JFactory::getApplication();

if (JFactory::getUser()->authorise('core.satellites', 'com_allevents')) {
    $document = JFactory::getDocument();

    $PlaceTitle = JText::_('PLACE', true);
    $AdressTitle = JText::_('COM_ALLEVENTS_TITLE_PLACE_ADRESS', true);
    $DescTitle = JText::_('COM_ALLEVENTS_DESC', true);
    $SystemInfoTitle = JText::_('JGLOBAL_FIELDSET_PUBLISHING', true);

    JHtml::_('formbehavior.chosen', 'select');
    jimport('joomla.html.html.bootstrap');

    $aePanPlace = 'aeTab';
    $aePanDesc = 'aeTab';
    $aePanSystemInfo = 'aeTab';
    $aemapDisplay = '1';
    $startPane = 'bootstrap.startTabSet';
    $addPanel = 'bootstrap.addTab';
    $endPanel = 'bootstrap.endTab';
    $endPane = 'bootstrap.endTabSet';
    $PlaceTag1 = 'place';
    $PlaceTag2 = $PlaceTitle;
    $AdressTag1 = 'address';
    $AdressTag2 = $AdressTitle;
    $DescTag1 = 'desc';
    $DescTag2 = $DescTitle;
    $SystemInfoTag1 = 'publishing';
    $SystemInfoTag2 = $SystemInfoTitle;
    ?>


    <form
            action="<?php echo JRoute::_('index.php?option=com_allevents&layout=edit&id=' . (int)$this->item->id, false); ?>"
            method="post" enctype="multipart/form-data" name="adminForm" id="place-form" class="form-validate">
        <div class="span12">
            <div class="form-inline form-inline-header">
                <?php
                echo $this->form->renderField('titre');
                echo $this->form->renderField('alias');
                ?>
            </div>
            <div class="form-inline form-inline-header">
                <?php
                echo $this->form->renderField('agenda_id');
                ?>
            </div>
            <div>
                <div class="row-fluid span10 form-horizontal">
                    <!-- Open Panel Set -->
                    <?php echo JHtml::_($startPane, 'aeTab', ['active' => 'address']); ?>

                    <?php echo JHtml::_($addPanel, $aePanDesc, $AdressTag1, $AdressTag2); ?>

                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span6 aeleft">
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('address'); ?></div>
                                    <div class="controls">
                                        <input type="text" name="jform[address]" id="jform_address"
                                               value="<?php echo $this->item->address ; ?>"
                                               autocomplete="off" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('numero'); ?></div>
                                    <div class="controls">
                                        <input type="text" name="jform[numero]" id="jform_numero"
                                               data-geo="street_number"
                                               value="<?php echo $this->item->numero ; ?>" class="readonly" readonly=""
                                               aria-invalid="false">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('rue'); ?></div>
                                    <div class="controls">
                                        <input type="text" name="jform[rue]" id="jform_rue" value="<?php echo $this->item->rue ; ?>" data-geo="route"
                                               class="readonly" readonly="" aria-invalid="false">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('ville'); ?></div>
                                    <div class="controls">
                                        <input type="text" name="jform[ville]" id="jform_ville" data-geo="locality"
                                               value="<?php echo $this->item->ville ; ?>" class="readonly" readonly="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('codepostal'); ?></div>
                                    <div class="controls">
                                        <input type="text" name="jform[codepostal]"
                                               id="jform_codepostal" value="<?php echo $this->item->codepostal ; ?>" class="readonly" data-geo="postal_code"
                                               readonly="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('country'); ?></div>
                                    <div class="controls">
                                        <input type="text" name="jform[country]" id="jform_country" data-geo="country"
                                               value="<?php echo $this->item->country ; ?>" class="readonly" readonly="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('latitude'); ?></div>
                                    <div class="controls">
                                        <input type="text" name="jform[latitude]" id="jform_latitude" data-geo="lat"
                                               value="<?php echo $this->item->latitude ; ?>" class="readonly" readonly="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="control-label"><?php echo $this->form->getLabel('longitude'); ?></div>
                                    <div class="controls">
                                        <input type="text" name="jform[longitude]"
                                               id="jform_longitude" value="<?php echo $this->item->longitude ; ?>" class="readonly" data-geo="lng"
                                               readonly="">
                                    </div>
                                </div>
                            </div>

                            <div class="span6 aeright">
                                <div class='map-wrapper'>
                                    <div id="map" class="map_canvas"></div>
                                    <div id="legend"><?php echo JText::_('COM_ALLEVENTS_MAPS_LEGEND') ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo JHtml::_($endPanel); ?>

                    <!-- Panel Event -->
                    <?php echo JHtml::_($addPanel, $aePanPlace, $PlaceTag1, $PlaceTag2); ?>

                    <div class="row-fluid">
                        <div class="span6 aeleft">
                            <?php
                            // echo $this->form->renderField('agenda_id');
                            echo $this->form->renderField('phone');
                            echo $this->form->renderField('fax');
                            echo $this->form->renderField('email');
                            echo $this->form->renderField('website');
                            echo $this->form->renderField('contact');
                            echo $this->form->renderField('vignette');
                            echo $this->form->renderField('image_bullet');
                            ?>
                        </div>
                    </div>

                    <?php echo JHtml::_($endPanel); ?>

                    <!-- Panel Description -->
                    <?php echo JHtml::_($addPanel, $aePanDesc, $DescTag1, $DescTag2); ?>

                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span10 aeleft">
                                <?php echo $this->form->getInput('description'); ?>
                            </div>
                        </div>
                    </div>

                    <?php echo JHtml::_($endPanel); ?>

                    <!-- Panel Info -->
                    <?php echo JHtml::_($addPanel, $aePanSystemInfo, $SystemInfoTag1, $SystemInfoTag2); ?>
                    <div class="aepanel aeleft">
                        <div class="row-fluid">
                            <div class="span6 aeleft">
                                <?php
                                echo $this->form->renderField('created_date');
                                echo $this->form->renderField('proposed_by');
                                echo $this->form->renderField('lastmod');
                                echo $this->form->renderField('lastmod_by');
                                echo $this->form->renderField('version');
                                echo $this->form->renderField('hits');
                                echo $this->form->renderField('id');
                                ?>
                            </div>
                            <div class="span6 aeleft">
                                <?php
                                echo $this->form->renderField('metadesc');
                                echo $this->form->renderField('metakey');
                                echo $this->form->renderField('metarobots');
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php echo JHtml::_($endPanel); ?>
                    <?php echo JHtml::_($endPane, 'aeTab'); ?>
                </div>

                <!-- Begin Sidebar -->
                <div class="span2 aeleft">
                    <h4><?php echo JText::_('COM_ALLEVENTS_DETAILS'); ?></h4>
                    <hr>
                    <?php
                    echo $this->form->renderField('access');
                    echo $this->form->renderField('published');
                    echo $this->form->renderField('default');
                    echo $this->form->renderField('front');
                    if (JLanguageMultilang::isEnabled()) {
                        echo $this->form->renderField('language');
                    }
                    echo $this->form->renderField('note');
                    ?>
                    <hr>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>

        <input type="hidden" name="task" value=""/>
        <?php echo JHtml::_('form.token'); ?>
        <div class="clr"></div>
    </form>
    <?php
} else {
    $app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'), 'warning');
    $app->redirect(htmlspecialchars_decode('index.php?option=com_allevents&view=main'));
} ?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places<?php echo '&key=' . $gmapkey ; ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"></script>

<script>
    $(function () {
        $("#jform_address").geocomplete({
            map: ".map_canvas",
            details: "form",
            detailsAttribute: "data-geo",
            types: ["geocode", "establishment"],
        });
    });

    Joomla.submitbutton = function (task) {
        /* on retire les espaces en trop*/
        var obj = document.getElementById("jform_email");
        var str = obj.value;
        obj.value = str.trim();

        if (task == 'place.cancel') {
            Joomla.submitform(task, document.getElementById('place-form'));
        } else {
            if (task != 'place.cancel' && document.formvalidator.isValid(document.id('place-form'))) {
                Joomla.submitform(task, document.getElementById('place-form'));
            } else {
                alert('<?php echo $this->escape(JText::_(' JGLOBAL_VALIDATION_FORM_FAILED ')); ?>');
            }
        }
    }
</script>