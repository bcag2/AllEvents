<?php

defined('_JEXEC') or die;

jimport('joomla.form.formfield');

// Test if translation is missing, set to en-GB by default
$language = JFactory::getLanguage();
$language->load('com_allevents', JPATH_ADMINISTRATOR, 'en-GB', true);
$language->load('com_allevents', JPATH_ADMINISTRATOR, null, true);
$document = JFactory::getDocument();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');

/**
 * JFormFieldAETitleImg
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAETitleImg extends JFormField
{
    protected $type = 'AETitleImg';

    /**
     * JFormFieldAETitleImg::getInput()
     *
     * @return string
     */
    protected function getInput()
    {
        return ' ';
    }

    /**
     * JFormFieldAETitleImg::getLabel()
     *
     * @return string
     */
    protected function getLabel()
    {
        $html = [];

        // Affichage texte

        $label = $this->element['label'];
        $label = $this->translateLabel ? JText::_($label) : $label;

        $style = $this->element['style'];
        $style = $this->translateLabel ? JText::_($style) : $style;

        $class = $this->element['class'];
        $class = $this->translateLabel ? JText::_($class) : $class;

        $aeimage = $this->element['aeimage'];
        $image = '../media/com_allevents/images/' . $aeimage . '';

        $aeicon = $this->element['aeicon'];

        // Contruction
        $html[] = '<div class="' . $class . '" style="' . $style . 'display:block;clear:both;">';

        if (!empty($aeimage)) {
            $html[] = '<img src="' . $image . '" style="float:left; padding: 6px 10px 10px 0px;" />';
        } elseif (!empty($aeicon)) {
            $html[] = '<i class="fa fa-' . $aeicon . '" style="padding:10px"></i>';
        }

        $html[] = $label;
        $html[] = '</div>';

        return implode('', $html);
    }
}
