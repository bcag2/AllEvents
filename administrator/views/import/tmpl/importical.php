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

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.modal');

$app = JFactory::getApplication();
$user = JFactory::getUser();
$userId = $user->get('id');
$document = JFactory::getDocument();

$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');

$params = JComponentHelper::getParams('com_allevents');

$js = [];
$js[] = 'function load_sample(i)';
$js[] = '{';
$js[] = '	var urls = [';
$js[] = '		"http://americanhistorycalendar.com/eventscalendar?format=ical",';
$js[] = '		"http://americanhistorycalendar.com/peoplecalendar?format=ical"';
$js[] = '	];';
$js[] = '	jQuery("#jform_url").val(urls[i]);';
$js[] = '}';
$js[] = '';
$js[] = 'function load_holiday(regionid)';
$js[] = '{';
$js[] = '	var year = new Date().getFullYear();';
$js[] = '	var fromdate = "01-01-" + year;';
$js[] = '	var todate = "01-01-" + (year + 3);';
$js[] = '	var country = jQuery("#country").val();';
$js[] = '	var en = jQuery("#en").val();';
$js[] = '	var regions = ["aus","can","fra","ger","nzl","usa"];';
$js[] = '	var regionindex = -1;';
$js[] = '	if(regionid)';
$js[] = '	{';
$js[] = '		regionindex = regions.indexOf(regionid);';
$js[] = '	}';
$js[] = '	else';
$js[] = '	{';
$js[] = '		regionindex = regions.indexOf(country);';
$js[] = '		jQuery("#region_aus_chzn").hide();';
$js[] = '		jQuery("#region_aus").val("").trigger("liszt:updated" );';
$js[] = '		jQuery("#region_can_chzn").hide();';
$js[] = '		jQuery("#region_can").val("").trigger("liszt:updated" );';
$js[] = '		jQuery("#region_fra_chzn").hide();';
$js[] = '		jQuery("#region_fra").val("").trigger("liszt:updated" );';
$js[] = '		jQuery("#region_ger_chzn").hide();';
$js[] = '		jQuery("#region_ger").val("").trigger("liszt:updated" );';
$js[] = '		jQuery("#region_nzl_chzn").hide();';
$js[] = '		jQuery("#region_nzl").val("").trigger("liszt:updated" );';
$js[] = '		jQuery("#region_usa_chzn").hide();';
$js[] = '		jQuery("#region_usa").val("").trigger("liszt:updated" );';
$js[] = '	}';
$js[] = '	if(regionindex >= 0)';
$js[] = '	{';
$js[] = '		jQuery("#region_" + regions[regionindex] + "_chzn").show();';
$js[] = '		jQuery("#region_" + regions[regionindex]).val("").trigger("liszt:updated" );';
$js[] = '	}';
$js[] = '	var region = "";';
$js[] = '	if(regionid)';
$js[] = '	{';
$js[] = '		region = jQuery("#" + regionid).val();';
$js[] = '	}';
$js[] = '	var url = "http://www.kayaposoft.com/enrico/ics/v1.0?" +';
$js[] = '		"fromDate=" + fromdate + "&toDate=" + todate +';
$js[] = '		"&country=" + country + "&region=" + region +';
$js[] = '		"&en=" + en;';
$js[] = '';
$js[] = '	jQuery("#jform_url").val(url);';
$js[] = '}';
$js[] = '';
$js[] = 'jQuery(function() {';
$js[] = '';
$js[] = 'load_holiday();';
$js[] = '';
$js[] = 'jQuery("#jform_import_type").change(function(){';
$js[] = '	if ( jQuery("#jform_import_type").val()=="f") {';
$js[] = '		jQuery("#jform_userfile").parent().parent().show() ;';
$js[] = '		jQuery("#jform_url").parent().parent().hide() ;';
$js[] = '		jQuery("#ae_sampledata").hide() ;';
$js[] = '		jQuery("#ae_holidays").hide() ;';
$js[] = '	}';
$js[] = '	if ( jQuery("#jform_import_type").val()=="u") {';
$js[] = '		jQuery("#jform_userfile").parent().parent().hide() ;';
$js[] = '		jQuery("#jform_url").parent().parent().show() ;';
$js[] = '		jQuery("#ae_sampledata").show() ;';
$js[] = '		jQuery("#ae_holidays").show() ;';
$js[] = '	}';
$js[] = '});';
$js[] = '';
$js[] = 'jQuery("#jform_import_mode_cat").change(function(){';
$js[] = '	if ( jQuery("#jform_import_mode_cat").val()=="1") {';
if ($params['controlpanel_showsections']) {
    $js[] = '		jQuery("#jform_section_id").parent().parent().show() ;';
}
$js[] = '		jQuery("#jform_category_id").parent().parent().show() ;';
$js[] = '		jQuery("#jform_newcat").parent().parent().hide() ;';
$js[] = '	}';
$js[] = '	if ( jQuery("#jform_import_mode_cat").val()=="2") {';
$js[] = '		jQuery("#jform_section_id").parent().parent().hide() ;';
$js[] = '		jQuery("#jform_category_id").parent().parent().hide() ;';
$js[] = '		jQuery("#jform_newcat").parent().parent().hide() ;';
$js[] = '	}';
$js[] = '	if ( jQuery("#jform_import_mode_cat").val()=="3") {';
if ($params['controlpanel_showsections']) {
    $js[] = '		jQuery("#jform_section_id").parent().parent().show() ;';
}
$js[] = '		jQuery("#jform_category_id").parent().parent().hide() ;';
$js[] = '		jQuery("#jform_newcat").parent().parent().show() ;';
$js[] = '	}';
$js[] = '});';
$js[] = '';
$js[] = 'jQuery("#jform_import_mode_place").change(function(){';
$js[] = '	if ( jQuery("#jform_import_mode_place").val()=="1") {';
$js[] = '		jQuery("#jform_place_id").parent().parent().show() ;';
$js[] = '		jQuery("#jform_newplace").parent().parent().hide() ;';
$js[] = '	}';
$js[] = '	if ( jQuery("#jform_import_mode_place").val()=="2") {';
$js[] = '		jQuery("#jform_place_id").parent().parent().hide() ;';
$js[] = '		jQuery("#jform_newplace").parent().parent().hide() ;';
$js[] = '	}';
$js[] = '	if ( jQuery("#jform_import_mode_place").val()=="3") {';
$js[] = '		jQuery("#jform_place_id").parent().parent().hide() ;';
$js[] = '		jQuery("#jform_newplace").parent().parent().show() ;';
$js[] = '	}';
$js[] = '});';
$js[] = '';
$js[] = '// init : URL';
$js[] = '// separate place / category';
$js[] = 'jQuery("#jform_import_type").val("u").trigger( "liszt:updated" ).click ()  ;';
$js[] = 'jQuery("#jform_userfile").parent().parent().hide() ;';
$js[] = 'jQuery("#jform_url").parent().parent().show() ;';
$js[] = 'jQuery("#ae_sampledata").show() ;';
$js[] = 'jQuery("#ae_holidays").show() ;';
$js[] = 'jQuery("#jform_import_mode_cat").val("2").trigger( "liszt:updated" ).click ();';
$js[] = 'jQuery("#jform_category_id").parent().parent().hide() ;';
$js[] = 'jQuery("#jform_section_id").parent().parent().hide() ;';
$js[] = 'jQuery("#jform_newcat").parent().parent().hide() ;';
$js[] = 'jQuery("#jform_import_mode_place").val("2").trigger( "liszt:updated" ).click ();';
$js[] = 'jQuery("#jform_place_id").parent().parent().hide() ;';
$js[] = 'jQuery("#jform_newplace").parent().parent().hide() ;';
$js[] = 'jQuery("#jform_url").val("");';
if (!$params['controlpanel_showactivities']) {
    $js[] = 'jQuery("#jform_activity_id").parent().parent().hide() ;';
}
if (!$params['controlpanel_showpublics']) {
    $js[] = 'jQuery("#jform_public_id").parent().parent().hide() ;';
}
if (!$params['controlpanel_showressources']) {
    $js[] = 'jQuery("#jform_ressource_id").parent().parent().hide() ;';
}
$js[] = '});';

$document->addScriptDeclaration(implode("\n", $js));
$countries = $this->getHolidayCountries();
$language = ["en" => JText::_("AE_IMPORT_ENGLISH_LANGUAGE"), "" => JText::_("AE_IMPORT_NATIVE_LANGUAGE")];
?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>

<div id="j-main-container">
    <div class="span10 form-horizontal">
        <form name="adminForm" id="adminForm" action="index.php?option=com_allevents&view=import&layout=importical"
              method="post" enctype="multipart/form-data">
            <fieldset class="adminForm">
                <legend><?php echo JText::_("AE_IMPORT_ICALENDAR_IMPORT"); ?></legend>
                <?php foreach ($this->form->getFieldset('ical') as $field) : ?>
                    <div class="control-group">
                        <div class="control-label"><?php echo $field->label; ?></div>
                        <div class="controls"><?php echo $field->input; ?></div>
                    </div>
                <?php endforeach; ?>
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                <div id="ae_holidays" class="control-group">
                    <div class="control-label"><?php echo JText::_("AE_IMPORT_HOLIDAYS"); ?></div>
                    <div class="controls">
                        <?php echo JHtml::_("select.genericlist", $language, "en", 'class="btn-group" onchange="load_holiday();"'); ?>
                        <?php echo JHtml::_("select.genericlist", $countries, "country", 'size="5" onchange="load_holiday();"'); ?>
                        <?php echo JHtml::_("select.genericlist", $this->getHolidayRegions("aus"), "region_aus", 'size="5" style="display:none;" onchange="load_holiday(\'region_aus\');"'); ?>
                        <?php echo JHtml::_("select.genericlist", $this->getHolidayRegions("can"), "region_can", 'size="5" style="display:none;" onchange="load_holiday(\'region_can\');"'); ?>
                        <?php echo JHtml::_("select.genericlist", $this->getHolidayRegions("fra"), "region_fra", 'size="5" style="display:none;" onchange="load_holiday(\'region_fra\');"'); ?>
                        <?php echo JHtml::_("select.genericlist", $this->getHolidayRegions("ger"), "region_ger", 'size="5" style="display:none;" onchange="load_holiday(\'region_ger\');"'); ?>
                        <?php echo JHtml::_("select.genericlist", $this->getHolidayRegions("nzl"), "region_nzl", 'size="5" style="display:none;" onchange="load_holiday(\'region_nzl\');"'); ?>
                        <?php echo JHtml::_("select.genericlist", $this->getHolidayRegions("usa"), "region_usa", 'size="5" style="display:none;" onchange="load_holiday(\'region_usa\');"'); ?>
                        <p></p>
                        <p><?php echo JText::_("AE_IMPORT_LANGUAGE_DESC"); ?></p>
                        <p><?php echo JText::_("AE_IMPORT_DATA_PROVIDED_BY"); ?> <a
                                href="http://www.kayaposoft.com/enrico/" target="_blank">Enrico Service</a></p>
                    </div>
                </div>
                <div id="ae_sampledata" class="control-group">
                    <div class="control-label"><?php echo JText::_("AE_IMPORT_SAMPLE_DATA"); ?></div>
                    <div class="controls">
                        <a class="btn"
                           onclick="load_sample(0);"><?php echo JText::_("AE_IMPORT_AMERICAN_HISTORY_EVENTS") ?></a>
                        <a class="btn"
                           onclick="load_sample(1);"><?php echo JText::_("AE_IMPORT_AMERICAN_HISTORY_BIRTHDAYS") ?></a><br/>
                        <p></p>
                        <p><?php echo JText::_("AE_IMPORT_DATA_PROVIDED_BY"); ?> <a
                                href="http://AmericanHistoryCalendar.com"
                                target="_blank">AmericanHistoryCalendar.com</a> <a
                                href="https://www.facebook.com/AmericanHistoryCalendar" target="_blank"> <span
                                    class="zicon-facebook" style="font-size:120%;"></span></a></p>
                    </div>
                </div>
                <div class="control-group">
                    <p></p>
                    <p><?php echo sprintf(JText::_("AE_IMPORT_ICALENDAR_VALIDATOR_INFO"), "http://icalendar.org/validator.html", "http://icalendar.org", "iCalendar.org"); ?></p>
                </div>
            </fieldset>
            <input type="hidden" name="task" value="importical"/>
            <?php echo JHtml::_('form.token'); ?>
        </form>
    </div>
</div>