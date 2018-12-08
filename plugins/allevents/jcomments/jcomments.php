<?php
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

$document = JFactory::getDocument();
$docType = $document->getType();
// only in html
if ($docType != 'html') {
    return;
}

/**
 * plgAlleventsJComments
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsJComments extends JPlugin
{
    /**
     * plgAlleventsJComments::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        JPlugin::loadLanguage('plg_allevents_jcomments', JPATH_ADMINISTRATOR);
    }

    /**
     * plgAlleventsJComments::onAlleventsCommentsBlock()
     *
     * @param mixed $item
     *
     * @return string
     * @throws Exception
     */
    public function onAlleventsCommentsBlock(&$item)
    {
        $result = '';
        if (!JFactory::getApplication()->input->getInt('print')) {
            $commentsAPI = JPATH_SITE . '/components/com_jcomments/jcomments.php';
            if (is_file($commentsAPI)) {
                require_once($commentsAPI);
                $result = JComments::showComments($item->id, 'com_allevents', $item->titre);
            }
        }

        return $result;
    }

    /**
     * plgAlleventsJComments::onAlleventsCommentsCounter()
     *
     * @param mixed $item
     *
     * @return string
     */
    public function onAlleventsCommentsCounter(&$item)
    {
        $result = '';

        $commentsAPI = JPATH_SITE . '/components/com_jcomments/jcomments.php';
        if (is_file($commentsAPI)) {
            require_once($commentsAPI);
            $count = JComments::getCommentsCount($item->id, 'com_allevents');

            if ($count == 0) {
                $link = JRoute::_('index.php?option=com_allevents&view=event&id=' . $item->id . ':' . $item->alias, false) . '#addcomments';
                $text = JText::_('PLG_COM_ALLEVENTS_JCOMMENTS_LINK_ADD_COMMENT');
            } else {
                $link = JRoute::_('index.php?option=com_allevents&view=event&id=' . $item->id . ':' . $obj->alias, false) . '#comments';
                $text = JText::sprintf('PLG_COM_ALLEVENTS_JCOMMENTS_LINK_READ_COMMENTS', $count);
            }

            $anchor_css = $this->params->get('anchor_css');
            $class = empty($anchor_css) ? '' : ' class="' . $anchor_css . '"';

            $result = '<a href="' . $link . '"' . $class . ' title="' . $text . '">' . $text . '</a>';
        }

        return $result;
    }

    /**
     * plgAlleventsJComments::onAfterAlleventsSave()
     *
     * @param mixed $item
     * @param mixed $isNew
     *
     * @return bool
     */
    public function onAfterAlleventsSave(&$item, $isNew)
    {
        if ($this->params->get('autosubscribe')) {
            if (!empty($item->id) && !empty($item->created_by) && $isNew) {
                $commentsAPI = JPATH_SITE . '/components/com_jcomments/jcomments.php';
                if (is_file($commentsAPI)) {
                    require_once($commentsAPI);
                    require_once(JPATH_SITE . '/components/com_jcomments/jcomments.subscription.php');
                    $manager = JCommentsSubscriptionManager::getInstance();
                    $manager->subscribe($item->id, 'com_allevents', $item->created_by);
                }
            }
        }

        return true;
    }
}
