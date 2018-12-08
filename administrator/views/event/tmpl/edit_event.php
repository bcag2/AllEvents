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
$user = JFactory::getUser();

$arrsatellites = [];
if ($this->params['controlpanel_showagendas']) $arrsatellites[] = 'agenda';
if ($this->params['controlpanel_showactivities']) $arrsatellites[] = 'activity';
if ($this->params['controlpanel_showpublics']) $arrsatellites[] = 'public';
if ($this->params['controlpanel_showplaces']) $arrsatellites[] = 'place';
if ($this->params['controlpanel_showressources']) $arrsatellites[] = 'ressource';
if ($this->params['controlpanel_showsections']) $arrsatellites[] = 'section';
if ($this->params['controlpanel_showcategories']) $arrsatellites[] = 'category';

if (JFactory::getUser()->authorise('core.manage', 'com_allevents')) {
    $document = JFactory::getDocument();

    JHtml::_('formbehavior.chosen', 'select');
    jimport('joomla.html.html.bootstrap');
    foreach ($arrsatellites as $value) {
        $Form = JForm::getInstance('com_allevents.' . $value, $value, ['control' => $value]);
        $Form->setFieldAttribute('titre', 'required', false);
        $formname = $value . '_formAE';

        $$formname = '<div id="' . $value . '-form">';
        $$formname .= '    <div class="btn-toolbar">';
        $$formname .= '        <div class="btn-group">';
        $$formname .= '            <button type="button" class="btn btn-primary" id="' . $value . '-save-button">';
        $$formname .= '                <i class="icon-ok"></i>' . JText::_('JSAVE');
        $$formname .= '            </button>';
        $$formname .= '        </div>';
        $$formname .= '        <div class="btn-group">';
        $$formname .= '            <button type="button" class="btn" id="' . $value . '-cancel-button">';
        $$formname .= '                <i class="icon-cancel"></i>' . JText::_('JCANCEL');
        $$formname .= '            </button>';
        $$formname .= '        </div>';
        $$formname .= '    </div>';
        $$formname .= '    <input type="hidden" id="' . $value . '_token" value="' . JSession::getFormToken() . '" />';
        $$formname .= '    <div class="control-group">';
        $$formname .= '        <div class="control-label">' . $Form->getLabel('titre') . '</div>';
        $$formname .= '        <div class="controls">' . $Form->getInput('titre') . '</div>';
        $$formname .= '    </div>';

        if ((in_array($value, ['agenda', 'activity', 'category'])) && (in_array($value, $arrsatellites))) {
            $$formname .= '    <div class="control-group">';
            $$formname .= '        <div class="control-label">' . $Form->getLabel('couleur') . '</div>';
            $$formname .= '        <div class="controls">' . $Form->getInput('couleur') . '</div>';
            $$formname .= '    </div>';
            $$formname .= '    <div class="control-group">';
            $$formname .= '        <div class="control-label">' . $Form->getLabel('couleur_texte') . '</div>';
            $$formname .= '        <div class="controls">' . $Form->getInput('couleur_texte') . '</div>';
            $$formname .= '    </div>';
        }
        $$formname .= '</div>';
    }
}
?>
    <div class="aepanel aeleft">
        <div class="row-fluid">
            <div class="span6 aeleft">
                <?php echo $this->form->renderField('allday'); ?>
                <?php echo $this->form->renderField('date'); ?>
                <?php echo $this->form->renderField('enddate'); ?>
                <?php echo $this->form->renderField('vignette'); ?>
                <?php echo $this->form->renderField('affiche'); ?>
                <?php echo $this->form->renderField('banniere'); ?>
                <!-- #€# -->
                <?php echo $this->form->renderField('fichier_annexe'); ?>
                <!-- #€# -->
            </div>

            <div class="span6 aeleft">
                <?php if ($this->params['controlpanel_showagendas']) : ?>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('agenda_id'); ?></div>
                        <?php if ($user->authorise('core.satellites')) : ?>
                            <div class="control-label"><a class="btn btn-micro"
                                                          href="javascript:void(0);"
                                                          id="agenda-activator"><i class="icon-new"></i></a>
                            </div>
                        <?php endif; ?>
                        <div class="controls"><?php echo $this->form->getInput('agenda_id'); ?></div>
                    </div>
                    <?php echo $agenda_formAE; ?>
                <?php endif; ?>

                <?php if ($this->params['controlpanel_showactivities']) : ?>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('activity_id'); ?></div>
                        <?php if ($user->authorise('core.satellites')) : ?>
                            <div class="control-label"><a class="btn btn-micro"
                                                          href="javascript:void(0);"
                                                          id="activity-activator"><i
                                        class="icon-new"></i></a></div>
                        <?php endif; ?>
                        <div class="controls"><?php echo $this->form->getInput('activity_id'); ?></div>
                    </div>
                    <?php echo $activity_formAE; ?>
                <?php endif; ?>

                <?php if ($this->params['controlpanel_showpublics']) : ?>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('public_id'); ?></div>
                        <?php if ($user->authorise('core.satellites')) : ?>
                            <div class="control-label"><a class="btn btn-micro"
                                                          href="javascript:void(0);"
                                                          id="public-activator"><i class="icon-new"></i></a>
                            </div>
                        <?php endif; ?>
                        <div class="controls"><?php echo $this->form->getInput('public_id'); ?></div>
                    </div>
                    <?php echo $public_formAE; ?>
                <?php endif; ?>

                <?php if ($this->params['controlpanel_showplaces']) : ?>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('place_id'); ?></div>
                        <?php if ($user->authorise('core.satellites')) : ?>
                            <div class="control-label"><a class="btn btn-micro"
                                                          href="javascript:void(0);"
                                                          id="place-activator"><i class="icon-new"></i></a>
                            </div>
                        <?php endif; ?>
                        <div class="controls"><?php echo $this->form->getInput('place_id'); ?></div>
                    </div>
                    <?php echo $place_formAE; ?>
                <?php endif; ?>

                <?php if ($this->params['controlpanel_showressources']) : ?>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('ressource_id'); ?></div>
                        <?php if ($user->authorise('core.satellites')) : ?>
                            <div class="control-label"><a class="btn btn-micro"
                                                          href="javascript:void(0);"
                                                          id="ressource-activator"><i
                                        class="icon-new"></i></a></div>
                        <?php endif; ?>
                        <div class="controls"><?php echo $this->form->getInput('ressource_id'); ?></div>
                    </div>
                    <?php echo $ressource_formAE; ?>
                <?php endif; ?>
                <?php if ($this->params['controlpanel_showsections']) : ?>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('section_id'); ?></div>
                        <?php if ($user->authorise('core.satellites')) : ?>
                            <div class="control-label"><a class="btn btn-micro"
                                                          href="javascript:void(0);"
                                                          id="section-activator"><i
                                        class="icon-new"></i></a></div>
                        <?php endif; ?>
                        <div class="controls"><?php echo $this->form->getInput('section_id'); ?></div>
                    </div>
                    <?php echo $section_formAE; ?>
                <?php endif; ?>

                <?php if ($this->params['controlpanel_showcategories']) : ?>
                    <div class="control-group">
                        <div
                            class="control-label"><?php echo $this->form->getLabel('category_id'); ?></div>
                        <?php if ($user->authorise('core.satellites')) : ?>
                            <div class="control-label"><a class="btn btn-micro"
                                                          href="javascript:void(0);"
                                                          id="category-activator"><i
                                        class="icon-new"></i></a></div>
                        <?php endif; ?>
                        <div class="controls"><?php echo $this->form->getInput('category_id'); ?></div>
                    </div>
                    <?php echo $category_formAE; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php
// €€€
if ($this->params['controlpanel_showcustomfields']) {
    $customfields = AllEventsCustomfields::getCustomfields('event');
    if ($customfields) {
        // echo '<h3>'.JText::_('COM_ALLEVENTS_CUSTOMFIELDS').'</h3>' ;
        echo AllEventsCustomfields::loader('event');
    }
}
// €€€
?>