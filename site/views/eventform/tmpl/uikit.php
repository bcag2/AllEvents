<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
// TODO: #45: FrontEnd - notification de création d'événement ou de modification = même message

defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('jquery.framework');
JHtml::_('script', 'jui/cms.js', false, true);

if (!class_exists('AllEventsHelperOverride'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeoverride.php';
if (!class_exists('AllEventsHelperEventDisplay'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/eventdisplay.php';

// AllEventsHelperOverride::jquery(false,false);
AllEventsHelperOverride::uikit();

$document = JFactory::getDocument();
$document->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/css/components/autocomplete.min.css');
$document->addScript('https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.4/js/components/autocomplete.min.js');

JHtml::_('formbehavior.chosen', 'select');

// $document->addStyleSheet(AllEventsHelperOverride::GetStyleSheet('allevents.css'));

AllEventsHelperOverride::custom_css();

$document->addStyleDeclaration('
#jform_allday label {width: auto!important}
#jform_vignette, #jform_affiche, #jform_banniere, #jform_start_date, #jform_end_date, #jform_start_time, #jform_end_time {height: auto;margin-bottom:0;width: auto}
');

require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/html/aestandardfield.php';

$app = JFactory::getApplication();
$params = AllEventsHelperParam::getGlobalParam();
$Itemid = ($params['gforcenomenuitem']) ? '' : (int)JFactory::getApplication()->input->getInt('Itemid', null);
// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

// Global vars
$user = JFactory::getUser();
// make sure user is logged in
if ($user->get('id') == 0) {
    JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_ERROR_MUST_LOGIN'), 'warning');
    $joomlaLoginUrl = 'index.php?option=com_users&view=login';
    echo "<br><a href='" . JRoute::_($joomlaLoginUrl) . "'>" . JText::_('COM_ALLEVENTS_LOG_IN') . "</a><br>";
}
?>

<?php echo $this->getToolbar(); ?>

<form action="<?php echo JRoute::_('index.php?option=com_allevents', false); ?>" method="post" id="adminForm"
      class="uk-form">
    <article class="uk-article">
        <?php if (!empty($this->item->id)): ?>
            <h1 class="uk-article-title"><?php echo JText::_('COM_ALLEVENTS_EVENT_UPDATE'); ?></h1>
        <?php else: ?>
            <h1 class="uk-article-title"><?php echo JText::_('COM_ALLEVENTS_EVENT_ADD'); ?></h1>
        <?php endif; ?>
        <p class="uk-article-meta">meta</p>
        <p class="uk-article-lead"><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_EVENT'); ?></p>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('titre'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('titre'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('hot'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('hot'); ?>
            </div>
        </div>
        <!-- €€€ -->
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <?php
            if ($this->params['controlpanel_showcustomfields']) {
                $customfields = AllEventsCustomfields::getCustomfields('event');
                if ($customfields) {
                    // echo '<h3>'.JText::_('COM_ALLEVENTS_CUSTOMFIELDS').'</h3>' ;
                    echo AllEventsCustomfields::loader('event');
                }
            }
            ?>
        </div>
        <!-- €€€ -->
        <hr class="uk-article-divider">
        <p class="uk-article-lead"><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DATES'); ?></p>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('start_date'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('start_date'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('start_time'); ?>
            </div>
        </div>

        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('end_date'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('end_date'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('end_time'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('allday'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('allday'); ?>
            </div>
        </div>

        <hr class="uk-article-divider">
        <p class="uk-article-lead"><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DETAILS'); ?></p>
        <?php if (($this->params['controlpanel_showagendas']) && ($this->params['geventshow_agenda'])) : ?>
            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getlabel('agenda_id'); ?>
                </div>
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getinput('agenda_id'); ?>
                </div>
            </div>

            <?php
            foreach ((array)$this->item->agenda_id as $value):
                if (!is_array($value)):
                    echo '<input type="hidden" class="agenda_id" name="jform[agenda_idhidden][' . $value . ']" value="' . $value . '" />';
                endif;
            endforeach;

            ?>
        <?php endif; ?>
        <?php if (($this->params['controlpanel_showpublics']) && ($this->params['geventshow_public'])) : ?>
            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getlabel('public_id'); ?>
                </div>
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getinput('public_id'); ?>
                </div>
            </div>

            <?php
            foreach ((array)$this->item->public_id as $value):
                if (!is_array($value)):
                    echo '<input type="hidden" class="public_id" name="jform[public_idhidden][' . $value . ']" value="' . $value . '" />';
                endif;
            endforeach;
            ?>
        <?php endif; ?>
        <?php if (($this->params['controlpanel_showplaces']) && ($this->params['geventshow_place'])) : ?>
            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getlabel('place_id'); ?>
                </div>
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getinput('place_id'); ?>
                </div>
            </div>

            <?php
            foreach ((array)$this->item->place_id as $value):
                if (!is_array($value)):
                    echo '<input type="hidden" class="place_id" name="jform[place_idhidden][' . $value . ']" value="' . $value . '" />';
                endif;
            endforeach;
            ?>
        <?php endif; ?>
        <?php if (($this->params['controlpanel_showactivities']) && ($this->params['geventshow_activity'])) : ?>
            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getlabel('activity_id'); ?>
                </div>
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getinput('activity_id'); ?>
                </div>
            </div>

            <?php
            foreach ((array)$this->item->activity_id as $value):
                if (!is_array($value)):
                    echo '<input type="hidden" class="activity_id" name="jform[activity_idhidden][' . $value . ']" value="' . $value . '" />';
                endif;
            endforeach;
            ?>
        <?php endif; ?>
        <?php if (($this->params['controlpanel_showcategories']) && ($this->params['geventshow_category'])) : ?>
            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getlabel('category_id'); ?>
                </div>
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getinput('category_id'); ?>
                </div>
            </div>

            <?php
            foreach ((array)$this->item->category_id as $value):
                if (!is_array($value)):
                    echo '<input type="hidden" class="category_id" name="jform[category_idhidden][' . $value . ']" value="' . $value . '" />';
                endif;
            endforeach;
            ?>
        <?php endif; ?>
        <?php if (($this->params['controlpanel_showressources']) && ($this->params['geventshow_ressource'])) : ?>
            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getlabel('ressource_id'); ?>
                </div>
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getinput('ressource_id'); ?>
                </div>
            </div>

            <?php
            foreach ((array)$this->item->ressource_id as $value):
                if (!is_array($value)):
                    echo '<input type="hidden" class="ressource_id" name="jform[ressource_idhidden][' . $value . ']" value="' . $value . '" />';
                endif;
            endforeach;
            ?>
        <?php endif; ?>
        <?php if (($this->params['controlpanel_showsections']) && ($this->params['geventshow_section'])) : ?>
            <div class="uk-grid uk-grid-small uk-margin-bottom" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getlabel('section_id'); ?>
                </div>
                <div class="uk-width-medium-1-3">
                    <?php echo $this->form->getinput('section_id'); ?>
                </div>
            </div>

            <?php
            foreach ((array)$this->item->section_id as $value):
                if (!is_array($value)):
                    echo '<input type="hidden" class="section_id" name="jform[section_idhidden][' . $value . ']" value="' . $value . '" />';
                endif;
            endforeach;
            ?>
        <?php endif; ?>
        <hr class="uk-article-divider">
        <p class="uk-article-lead"><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_REGISTRATIONS'); ?></p>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('enrolment_enabled'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('enrolment_enabled'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('enrolment_max_participant'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('enrolment_max_participant'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('allow_overbooking'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('allow_overbooking'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('contact_libre'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('contact_libre'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('openingdate'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('openingdate'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('closingdate'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('closingdate'); ?>
            </div>
        </div>
        <hr class="uk-article-divider">
        <p class="uk-article-lead"><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_DESCRIPTION'); ?></p>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-1"><?php echo $this->form->getInput('description'); ?></div>
        </div>
        <hr class="uk-article-divider">
        <p class="uk-article-lead"><?php echo JText::_('COM_ALLEVENTS_EVENT_STEP_PICTURES'); ?></p>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('vignette'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('vignette'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('affiche'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('affiche'); ?>
            </div>
        </div>
        <div class="uk-grid uk-grid-small" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getlabel('banniere'); ?>
            </div>
            <div class="uk-width-medium-1-3">
                <?php echo $this->form->getinput('banniere'); ?>
            </div>
        </div>
    </article>
    <input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>"/>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>"/>
    <input type="hidden" name="option" value="com_allevents"/>
    <input id="jform_published" style="display: none;" class="inputbox required" type="text" aria-required="true"
           required="required" value="1" name="jform[published]" aria-invalid="false">
    <input id="jform_date" style="display: none;" class="inputbox required" type="text" aria-required="true"
           required="required" value="" name="jform[date]" aria-invalid="false">
    <input id="jform_enddate" style="display: none;" class="inputbox required" type="text" aria-required="true"
           required="required" value="" name="jform[enddate]">
    <?php echo JHtml::_('form.token'); ?>
</form>

<?php
echo $this->getToolbar();
echo AllEventsHelperEventDisplay::getPoweredBy($this->params["gshow_poweredby"]);
?>
