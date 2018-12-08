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
        <div class="eml_event_content se_category_<?php echo $this->item->id; ?>_summary">
            <div class="eml_event_image">
                <div class="eml_nailthumb-container">
                    <?php
                    if (isset($this->item->vignette) && ($this->item->vignette <> '')) {
                        echo '<img alt="' . $this->item->titre . '" src="' . JUri::root(true) . '/' . $this->item->vignette . '" class="eml_event_logo" />';
                    } else {
                        echo '<img alt="' . $this->item->titre . '" src="' . AllEventsHelperOverride::GetImage('no_photo.png') . '" class="eml_event_logo"/>';
                    }
                    ?>
                </div>
            </div>

            <div class="eml_event_top_informations">
                <h3>
                    <?php echo $this->item->titre; ?>
                </h3>
                <?php echo ((isset($this->item->section_id)) && ($this->item->section_id != null) && ($this->item->section_id > 0)) ? "<span class='se_event_info_section se_section_" . $this->item->section_id . "_bullet'><a href='" . $this->item->section_link . "'>" . $this->item->section_titre . "</a><br/></span>" : ""; ?>
            </div>

            <div id="allevents_description">
                <?php echo $this->item->description; ?>
            </div>

            <div id="allevents_list">
                <a href="<?php echo JRoute::_('index.php?option=com_allevents&view=events&format=feed&c=' . $this->item->id . '&Itemid=' . $Itemid, false); ?>">
                    <i class="fa fa-rss"></i>
                </a>
                <?php
                echo "<a href='" . JRoute::_('index.php?option=com_allevents&view=events&c=' . $this->item->id, false) . "'>" . JText::_('EVENTS_LIST') . "</a>";
                ?>
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