<?php
defined('_JEXEC') or die;
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);
AllEventsHelperOverride::bootstrap();
$document = JFactory::getDocument();
$app = JFactory::getApplication();
$params = AllEventsHelperParam::getGlobalParam();
$Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);

$document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));
AllEventsHelperOverride::custom_css();

$document->addScript('https://cdn.jsdelivr.net/jquery.nailthumb/1.1/jquery.nailthumb.min.js');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

?>
<?php if ($this->item) : ?>

    <div class="event_container">
        <div class="eml_event_content se_ressource_<?php echo $this->item->id; ?>_summary">
            <div class="eml_event_top_informations">
                <h3>
                    <?php echo $this->item->titre; ?>
                </h3>
                <?php echo ((isset($this->item->agenda_id)) && ($this->item->agenda_id != null) && ($this->item->agenda_id > 0)) ? "<span class='se_event_info_agenda se_agenda_" . $this->item->agenda_id . "_bullet'><a href='" . $this->item->agenda_link . "'>" . $this->item->agenda_titre . "</a><br/></span>" : ""; ?>
            </div>

            <div id="allevents_description">
                <?php echo $this->item->description; ?>
            </div>
        </div>
    </div>
    <?php
else:
    echo JText::_('COM_ALLEVENTS_ITEM_NOT_LOADED');
endif;
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.eml_nailthumb-container').nailthumb({width: 140, height: 140, method: 'resize'});
    });
</script>