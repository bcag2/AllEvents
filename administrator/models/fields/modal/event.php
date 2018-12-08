<?php
defined('JPATH_BASE') or die;

/**
 * JFormFieldModal_Event
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @sinc      3.4.6
 */
class JFormFieldModal_Event extends JFormField
{
    /**
     * The form field type.
     *
     * @var    string
     * @since  1.6
     */
    protected $type = 'Modal_Event';

    /**
     * Method to get the field input markup.
     *
     * @return  string  The field input markup.
     *
     * @throws Exception
     * @since   1.6
     */
    protected function getInput()
    {
        $allowNew = ((string)$this->element['new'] == 'true');
        $allowEdit = ((string)$this->element['edit'] == 'true');
        $allowClear = ((string)$this->element['clear'] != 'false');
        $allowSelect = ((string)$this->element['select'] != 'false');

        // Load language
        JFactory::getLanguage()->load('com_allevents', JPATH_ADMINISTRATOR);

        // The active event id field.
        $value = (int)$this->value > 0 ? (int)$this->value : '';

        // Create the modal id.
        $modalId = 'Event_' . $this->id;

        // Add the modal field script to the document head.
        JHtml::_('jquery.framework');
        JHtml::_('script', 'system/modal-fields.js', ['version' => 'auto', 'relative' => true]);

        // Script to proxy the select modal function to the modal-fields.js file.
        if ($allowSelect) {
            static $scriptSelect = null;

            if (is_null($scriptSelect)) {
                $scriptSelect = [];
            }

            if (!isset($scriptSelect[$this->id])) {
                JFactory::getDocument()->addScriptDeclaration("
                function jSelectEvent_" . $this->id . "(id, title, catid, object, url, language) {
                   window.processModalSelect('Event', '" . $this->id . "', id, title, catid, object, url, language);
                }");

                $scriptSelect[$this->id] = true;
            }
        }

        // Setup variables for display.
        $linkEvents = 'index.php?option=com_allevents&amp;view=events&amp;layout=modal&amp;tmpl=component&amp;' . JSession::getFormToken() . '=1';
        $linkEvent = 'index.php?option=com_allevents&amp;view=event&amp;layout=modal&amp;tmpl=component&amp;' . JSession::getFormToken() . '=1';

        if (isset($this->element['language'])) {
            $linkEvents .= '&amp;forcedLanguage=' . $this->element['language'];
            $linkEvent .= '&amp;forcedLanguage=' . $this->element['language'];
            $modalTitle = JText::_('COM_ALLEVENTS_CHANGE_EVENT') . ' &#8212; ' . $this->element['label'];
        } else {
            $modalTitle = JText::_('COM_ALLEVENTS_CHANGE_EVENT');
        }

        $urlSelect = $linkEvents . '&amp;function=jSelectEvent_' . $this->id;
        $urlEdit = $linkEvent . '&amp;task=event.edit&amp;id=\' + document.getElementById("' . $this->id . '_id").value + \'';
        $urlNew = $linkEvent . '&amp;task=event.add';

        if ($value) {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true)
                ->select($db->quoteName('titre'))
                ->from($db->quoteName('#__allevents_events'))
                ->where($db->quoteName('id') . ' = ' . (int)$value);
            $db->setQuery($query);

            try {
                $title = $db->loadResult();
            } catch (RuntimeException $e) {
                JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
            }
        }

        $title = empty($title) ? JText::_('COM_ALLEVENTS_SELECT_AN_EVENT') : htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

        // The current event display field.
        $html = '<span class="input-append">';
        $html .= '<input class="input-medium" id="' . $this->id . '_name" type="text" value="' . $title . '" disabled="disabled" size="35" />';

        // Select event button
        if ($allowSelect) {
            $html .= '<a'
                . ' class="btn hasTooltip' . ($value ? ' hidden' : '') . '"'
                . ' id="' . $this->id . '_select"'
                . ' data-toggle="modal"'
                . ' role="button"'
                . ' href="#ModalSelect' . $modalId . '"'
                . ' title="' . JHtml::tooltipText('COM_ALLEVENTS_CHANGE_EVENT') . '">'
                . '<span class="icon-file" aria-hidden="true"></span> ' . JText::_('JSELECT')
                . '</a>';
        }

        // New event button
        if ($allowNew) {
            $html .= '<a'
                . ' class="btn hasTooltip' . ($value ? ' hidden' : '') . '"'
                . ' id="' . $this->id . '_new"'
                . ' data-toggle="modal"'
                . ' role="button"'
                . ' href="#ModalNew' . $modalId . '"'
                . ' title="' . JHtml::tooltipText('COM_ALLEVENTS_NEW_EVENT') . '">'
                . '<span class="icon-new" aria-hidden="true"></span> ' . JText::_('JACTION_CREATE')
                . '</a>';
        }

        // Edit event button
        if ($allowEdit) {
            $html .= '<a'
                . ' class="btn hasTooltip' . ($value ? '' : ' hidden') . '"'
                . ' id="' . $this->id . '_edit"'
                . ' data-toggle="modal"'
                . ' role="button"'
                . ' href="#ModalEdit' . $modalId . '"'
                . ' title="' . JHtml::tooltipText('COM_ALLEVENTS_EDIT_EVENT') . '">'
                . '<span class="icon-edit" aria-hidden="true"></span> ' . JText::_('JACTION_EDIT')
                . '</a>';
        }

        // Clear event button
        if ($allowClear) {
            $html .= '<a'
                . ' class="btn' . ($value ? '' : ' hidden') . '"'
                . ' id="' . $this->id . '_clear"'
                . ' href="#"'
                . ' onclick="window.processModalParent(\'' . $this->id . '\'); return false;">'
                . '<span class="icon-remove" aria-hidden="true"></span>' . JText::_('JCLEAR')
                . '</a>';
        }

        $html .= '</span>';

        // Select event modal
        if ($allowSelect) {
            $html .= JHtml::_(
                'bootstrap.renderModal',
                'ModalSelect' . $modalId,
                [
                    'title' => $modalTitle,
                    'url' => $urlSelect,
                    'height' => '400px',
                    'width' => '800px',
                    'bodyHeight' => '70',
                    'modalWidth' => '80',
                    'footer' => '<a role="button" class="btn" data-dismiss="modal" aria-hidden="true">' . JText::_('JLIB_HTML_BEHAVIOR_CLOSE') . '</a>',
                ]
            );
        }

        // New event modal
        if ($allowNew) {
            $html .= JHtml::_(
                'bootstrap.renderModal',
                'ModalNew' . $modalId,
                [
                    'title' => JText::_('COM_ALLEVENTS_NEW_EVENT'),
                    'backdrop' => 'static',
                    'keyboard' => false,
                    'closeButton' => false,
                    'url' => $urlNew,
                    'height' => '400px',
                    'width' => '800px',
                    'bodyHeight' => '70',
                    'modalWidth' => '80',
                    'footer' => '<a role="button" class="btn" aria-hidden="true"'
                        . ' onclick="window.processModalEdit(this, \'' . $this->id . '\', \'add\', \'event\', \'cancel\', \'item-form\'); return false;">'
                        . JText::_('JLIB_HTML_BEHAVIOR_CLOSE') . '</a>'
                        . '<a role="button" class="btn btn-primary" aria-hidden="true"'
                        . ' onclick="window.processModalEdit(this, \'' . $this->id . '\', \'add\', \'event\', \'save\', \'item-form\'); return false;">'
                        . JText::_('JSAVE') . '</a>'
                        . '<a role="button" class="btn btn-success" aria-hidden="true"'
                        . ' onclick="window.processModalEdit(this, \'' . $this->id . '\', \'add\', \'event\', \'apply\', \'item-form\'); return false;">'
                        . JText::_('JAPPLY') . '</a>',
                ]
            );
        }

        // Edit event modal
        if ($allowEdit) {
            $html .= JHtml::_(
                'bootstrap.renderModal',
                'ModalEdit' . $modalId,
                [
                    'title' => JText::_('COM_ALLEVENTS_EDIT_EVENT'),
                    'backdrop' => 'static',
                    'keyboard' => false,
                    'closeButton' => false,
                    'url' => $urlEdit,
                    'height' => '400px',
                    'width' => '800px',
                    'bodyHeight' => '70',
                    'modalWidth' => '80',
                    'footer' => '<a role="button" class="btn" aria-hidden="true"'
                        . ' onclick="window.processModalEdit(this, \'' . $this->id . '\', \'edit\', \'event\', \'cancel\', \'item-form\'); return false;">'
                        . JText::_('JLIB_HTML_BEHAVIOR_CLOSE') . '</a>'
                        . '<a role="button" class="btn btn-primary" aria-hidden="true"'
                        . ' onclick="window.processModalEdit(this, \'' . $this->id . '\', \'edit\', \'event\', \'save\', \'item-form\'); return false;">'
                        . JText::_('JSAVE') . '</a>'
                        . '<a role="button" class="btn btn-success" aria-hidden="true"'
                        . ' onclick="window.processModalEdit(this, \'' . $this->id . '\', \'edit\', \'event\', \'apply\', \'item-form\'); return false;">'
                        . JText::_('JAPPLY') . '</a>',
                ]
            );
        }

        // Note: class='required' for client side validation.
        $class = $this->required ? ' class="required modal-value"' : '';

        $html .= '<input type="hidden" id="' . $this->id . '_id" ' . $class . ' data-required="' . (int)$this->required . '" name="' . $this->name
            . '" data-text="' . htmlspecialchars(JText::_('COM_ALLEVENTS_SELECT_AN_EVENT', true), ENT_COMPAT, 'UTF-8') . '" value="' . $value . '" />';

        return $html;
    }

    /**
     * Method to get the field label markup.
     *
     * @return  string  The field label markup.
     *
     * @since   3.4
     */
    protected function getLabel()
    {
        return str_replace($this->id, $this->id . '_id', parent::getLabel());
    }
}
