<?php
defined('_JEXEC') or die();

jimport('joomla.form.formfield');
jimport('joomla.html.parameter.element');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
JHtml::_('script', 'media/mediafield-mootools.min.js', true, true, false, false, true);

// Tooltip for INPUT showing whole image path
$options = ['onShow' => 'jMediaRefreshImgpathTip'];
JHtml::_('behavior.tooltip', '.hasTipImgpath', $options);

$options = ['onShow' => 'jMediaRefreshPreviewTip'];
JHtml::_('behavior.tooltip', '.hasTipPreview', $options);

/**
 * JFormFieldImageselect
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */
class JFormFieldImageselect extends JFormFieldList
{
    protected $type = 'Imageselect';
    protected $allowSelect = true;

    // on va garder les fonctionnalités du pere
    // public function getLabel()
    // {
    // code that returns HTML that will be shown as the label
    // }

    /**
     * Method to get the field input markup.
     *
     * @return    string    The field input markup.
     *
     */
    public function getInput()
    {
        // Load the modal behavior script.
        JHtml::_('behavior.modal', 'a.modal');

        // ImageType
        $imagetype = $this->element['imagetype'];

        $id = $this->id;
        $value = $this->value;

        $imgattr = [
            'id' => $id . '_preview',
            'class' => 'media-preview'
        ];
        if ($value && file_exists(JPATH_ROOT . '/' . $value)) {
            $src = JUri::root() . $value;
        } else {
            $src = '';
        }

        $img = JHtml::image($src, JText::_('JLIB_FORM_MEDIA_PREVIEW_ALT'), $imgattr);
        $previewImgEmpty = '<div id="' . $id . '_preview_empty"' . ($src ? ' style="display:none"' : '') . '>' . JText::_('JLIB_FORM_MEDIA_PREVIEW_EMPTY') . '</div>';
        $previewImg = '<div id="' . $id . '_preview_img"' . ($src ? '' : ' style="display:none"') . '>' . $img . '</div>';

        // Build the script.
        $script = [];
        $script[] = '   function jInsertFieldValue(value, id) {';
        $script[] = '      var $ = jQuery.noConflict();';
        $script[] = '      var old_value = $("#" + id).val();';
        $script[] = '      if (old_value != value) {';
        $script[] = '         var $elem = $("#" + id);';
        $script[] = '         $elem.val(value);';
        $script[] = '         $elem.trigger("change");';
        $script[] = '         if (typeof($elem.get(0).onchange) === "function") {';
        $script[] = '            $elem.get(0).onchange();';
        $script[] = '         }';
        $script[] = '         jMediaRefreshPreview(id);';
        $script[] = '      }';
        $script[] = '   }';
        $script[] = '   function jMediaRefreshPreview(id) {';
        $script[] = '      var $ = jQuery.noConflict();';
        $script[] = '      var value = $("#" + id).val();';
        $script[] = '      var $img = $("#" + id + "_preview");';
        $script[] = '      if ($img.length) {';
        $script[] = '         if (value) {';
        $script[] = '            $img.attr("src", "' . JUri::root() . '" + value);';
        $script[] = '            $("#" + id + "_preview_empty").hide();';
        $script[] = '            $("#" + id + "_preview_img").show()';
        $script[] = '         } else { ';
        $script[] = '            $img.attr("src", "")';
        $script[] = '            $("#" + id + "_preview_empty").show();';
        $script[] = '            $("#" + id + "_preview_img").hide();';
        $script[] = '         } ';
        $script[] = '      } ';
        $script[] = '   }';

        $script[] = 'function Select' . $imagetype . 's(pid, image) {';
        $script[] = '   imagename = \'images/com_allevents/' . $imagetype . 's/\' + image ';
        $script[] = '   window.parent.SqueezeBox.close()';
        $script[] = '   document.id(pid).value = imagename ;';
        $script[] = '}';

        $task = '';
        $taskselect = '';

        switch ($imagetype) {
            case 'vignette':
                $task = 'vignetteimg';
                $taskselect = 'selectvignetteimg';
                break;
            case 'affiche':
                $task = 'afficheimg';
                $taskselect = 'selectafficheimg';
                break;
            case 'banniere':
                $task = 'banniereimg';
                $taskselect = 'selectbanniereimg';
                break;
        }

        // Add the script to the document head.
        JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

        // Setup variables for display.

        $link = 'index.php?option=com_allevents&amp;view=imagehandler&amp;layout=uploadimage&amp;task=' . $task . '&amp;pid=' . $id . '&amp;tmpl=component';
        $link2 = 'index.php?option=com_allevents&amp;view=imagehandler&amp;layout=default&amp;task=' . $taskselect . '&amp;pid=' . $id . '&amp;tmpl=component';
        $tooltip = $previewImgEmpty . $previewImg;
        $attr = ' class="hasTipImgpath input-small field-media-input ';
        $options = [
            'title' => JText::_('JLIB_FORM_MEDIA_PREVIEW_SELECTED_IMAGE'),
            'text' => '<i class="icon-eye"></i>',
            'class' => 'hasTipPreview'
        ];

        $html = [];
        $html[] = "<div class=\"input-prepend input-append\" style = \"float: left;\">";
        $html[] = '<div class="media-preview add-on">';
        $html[] = JHtml::tooltip($tooltip, $options);
        $html[] = '</div>';
        $html[] = '<input type="text" name="' . $this->name . '" id="' . $this->id . '" value="'
            . htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '" readonly="readonly"' . $attr . ' data-basepath="'
            . JUri::root() . '"/>';

        $this->allowSelect = ((string)$this->element['select']) !== 'false';
        if ($this->allowSelect) {
            $html[] = "<a class=\"modal btn\" title=\"" . JText::_('COM_ALLEVENTS_SELECTIMAGE') . "\" href=\"$link2\" rel=\"{handler: 'iframe', size: {x: 650, y: 375}}\">" . JText::_('COM_ALLEVENTS_SELECTIMAGE') . "</a>";
        }
        $html[] = "<a class=\"modal btn\" title=\"" . JText::_('COM_ALLEVENTS_UPLOAD') . "\" href=\"$link\" rel=\"{handler: 'iframe', size: {x: 650, y: 375}}\">" . JText::_('COM_ALLEVENTS_UPLOAD') . "</a>";

        $html[] = '<a class="btn hasTooltip " title="' . JText::_('JLIB_FORM_BUTTON_CLEAR') . '" href="#" onclick="';
        $html[] = 'jInsertFieldValue(\'\', \'' . $this->id . '\');';
        $html[] = 'return false;';
        $html[] = '">';
        $html[] = '<i class="icon-remove"></i></a>';
        $html[] = "</div>";

        return implode("\n", $html);
    }
}
