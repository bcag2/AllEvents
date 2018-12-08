<?php

defined('_JEXEC') or die ('Restricted access');
JFormHelper::loadFieldClass('textarea');

/**
 * Class JFormFieldRatingManager
 */
class JFormFieldRatingManager extends JFormFieldTextarea
{

    protected $type = 'RatingManager';

    /**
     * @return string
     */
    protected function getInput()
    {
        // interface elements
        $html = '<div id="ratingmanager_errors" data-exists-text="' . JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_ERROR_EXISTS') . '" data-empty-text="' . JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_ERROR_EMPTY') . '"></div><div class="ratingmanager_form"><label for="ratingmanager_feature">' . JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_FEATURE_LABEL') . '</label>';
        $html .= '<div class="input-prepend">';
        $html .= '<input type="text" name="ratingmanager_feature" id="ratingmanager_feature" value="" placeholder="' . JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_FEATURE_PLACEHOLDER') . '">';
        // $html .= '<div class="input-prepend">		             <label for="ratingmanager_nb">'.JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_NB_LABEL').'</label>';
        // $html .= '<input type="number" name="ratingmanager_nb" id="ratingmanager_nb" min="1" max="1000000" step="1" value="1" />		             </div>';
        // $html .= '<div class="input-prepend"><label for="ratingmanager_value">'.JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_VALUE_LABEL').'</label>';
        // $html .= '<input type="number" name="ratingmanager_value" id="ratingmanager_value" min="1" max="100000000" step="0.5" value="10" />';
        $html .= '<input type="button" class="btn" id="ratingform_add" value="' . JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_ADD') . '" /></div>';
        $html .= '<ul class="ratingWrapper" style="list-style: none;" data-remove-text="' . JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_REMOVE') . '">';
        if ($this->value && json_decode($this->value) !== null && is_array(json_decode($this->value))) {
            foreach (json_decode($this->value) as $k => $v) {
                $html .= '<li>';
                $html .= '<span class="icon-menu"></span>';
                $html .= '<span class="rate-label">' . $v->label . '</span>';
                // $html .= ' - ';
                // $html .= '<span class="rate-value">'.$v->val.'</span>';
                // $html .= ' / <span class="rate-nb"> '.$v->nb.'</span>';
                // $html .= ' : <span> '.$v->val / $v->nb.'</span>';
                $html .= '<a href="#" class="rate-remove">' . JText::_('PLG_ALLEVENTS_ALLEVENTSVOTE_REMOVE') . '</a>';
                // $html .= '</label>' ;
                $html .= '</li>';
            }
        }
        $html .= '</ul></div>';
        // render text area with DRY attitude :)
        $html .= parent::getInput();
        $plugin = JPluginHelper::getPlugin('allevents', 'alleventsvote');
        $params = new JRegistry($plugin->params);

        return $html;
    }
}