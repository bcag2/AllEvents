<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');
if (!class_exists('AllPlacesHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';
// Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_allevents', JPATH_ADMINISTRATOR);

/**
 * AllPlacesViewPlaces
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllPlacesViewPlaces extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;
    protected $params;
    protected $globalparams;
    protected $location;

    /**
     * AllPlacesViewPlaces::display()
     *
     * @param mixed $tpl
     *
     * @return void
     */
    public function display($tpl = null)
    {
        $this->params = AllPlacesHelperParam::getGlobalParam();
        // $jinput = JFactory::getApplication()->input;
        $doc = JFactory::getDocument();
        $model = $this->getModel();

        $this->items = $model->getItems();

        foreach ($this->items as $item) {
            $title = $this->escape($item->titre);
            $title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');

            $itemRSS = new JFeedItem();
            $itemRSS->title = $title;
            $itemRSS->link = JRoute::_('index.php?option=com_allevents&view=place&id=' . $item->id);
            $itemRSS->description = $item->description;
            $itemRSS->date = $item->date;
            $itemRSS->author = $item->contact_name;
            $itemRSS->location = $item->place_titre;
            // loads item info into rss array
            $doc->addItem($itemRSS);
        }
    }
}