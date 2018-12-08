<?php

defined('_JEXEC') or die;

if (!class_exists('AllEventsHelperString'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/string.php';

jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file');

$document = JFactory::getDocument();
$docType = $document->getType();
// only in html
if ($docType != 'html') {
    return;
}

/**
 * plgAlleventsTwitterCardHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsTwitterCardHelper
{
    /**
     * plgAlleventsTwitterCardHelper::renderTag()
     *
     * @param mixed $name
     * @param mixed $value
     * @param integer $type
     *
     * @return void
     */
    public static function renderTag($name, $value, $type = 1)
    {
        $document = JFactory::getDocument();
        if ($type == 1) {
            $document->setMetaData(htmlspecialchars($name), htmlspecialchars($value));
        } else {
            $document->addCustomTag('<meta property="' . htmlspecialchars($name) . '" content="' . htmlspecialchars($value) . '" />');
        }
    }
}

/**
 * plgAlleventsTwitterCard
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsTwitterCard extends JPlugin
{
    /**
     * plgAlleventsTwitterCard::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        JPlugin::loadLanguage('plg_allevents_twittercard', JPATH_ADMINISTRATOR);
    }

    /**
     * plgAlleventsTwitterCard::onAlleventsTwitterCardEvent()
     *
     * @param mixed $item
     * @param mixed $params
     *
     * @throws Exception
     * @internal param mixed $enrolments
     */
    public function onAlleventsTwitterCardEvent(&$item, &$params)
    {
        $app = JFactory::getApplication();
        $config = JFactory::getConfig();

        if (($app->getName() != 'site') || ($this->params->get('displaye', 1) == 0)) {
            return;
        }

        // param suffixe
        $suffix = "_e";
        $type = $this->params->get('render_type', 1);

        plgAlleventsTwitterCardHelper::renderTag('twitter:card', 'summary', $type);

        // Title
        if ($this->params->get('title' . $suffix, '') != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:title', $this->params->get('title' . $suffix, ''), $type);
        } elseif ($item->titre != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:title', $item->titre, $type);
        }

        // Image
        if ($this->params->get('image' . $suffix, '') != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:image', JUri::base(false) . $this->params->get('image' . $suffix, ''), $type);
        } elseif (isset($item->banniere_rs) && ($item->banniere_rs) != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:image', JUri::base(false) . $item->banniere_rs, $type);
        } elseif (isset($item->affiche) && ($item->affiche) != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:image', JUri::base(false) . $item->affiche, $type);
        } elseif (isset($item->vignette) && ($item->vignette) != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:image', JUri::base(false) . $item->vignette, $type);
        } else {
            // Try to find image in article
            $content = !empty($item->description) ? $item->description : "";
            preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $content, $src);
            if (isset($src[1]) && $src[1] != '') {
                plgAlleventsTwitterCardHelper::renderTag('twitter:image', JUri::base(false) . $src[1], $type);
            } elseif (isset($item->id) && (int)$item->id > 0) {
                jimport('joomla.filesystem.file');
                $imgPath = '';
                $path = JPATH_ROOT . '/images/com_allevents/aetwittercard/';
                if (JFile::exists($path . (int)$item->id . '.png')) {
                    $imgPath = JUri::base(false) . 'images/com_allevents/aetwittercard/' . (int)$item->id . '.png';
                } elseif (JFile::exists($path . (int)$item->id . '.jpg')) {
                    $imgPath = JUri::base(false) . 'images/com_allevents/aetwittercard/' . (int)$item->id . '.jpg';
                } elseif (JFile::exists($path . (int)$item->id . '.gif')) {
                    $imgPath = JUri::base(false) . 'images/com_allevents/aetwittercard/' . (int)$item->id . '.gif';
                }

                if ($imgPath != '') {
                    plgAlleventsTwitterCardHelper::renderTag('twitter:image', $imgPath, $type);
                }
            }
        }

        // Description
        if ($this->params->get('description' . $suffix, '') != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:description', $this->params->get('description' . $suffix, ''), $type);
        } elseif (isset($item->metadesc) && ($item->metadesc != '')) {
            plgAlleventsTwitterCardHelper::renderTag('twitter:description', $item->metadesc, $type);
        } elseif ($config->get('MetaDesc') != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:description', $config->get('MetaDesc'), $type);
        } else {
            $introtext = AllEventsHelperString::cleanText($item->description, 200);

            if (isset($introtext) && ($introtext != '')) {
                $iTD = str_replace("\r\n", ' ', strip_tags($introtext));
                $iTD = str_replace("\n", ' ', $iTD);
                $iTD = str_replace("\n", ' ', $iTD);
                plgAlleventsTwitterCardHelper::renderTag('twitter:description', $iTD, $type);
            }
        }

        // Twitter App ID - COMMON
        if ($this->params->get('app_id', '') != '') {
            plgAlleventsTwitterCardHelper::renderTag('twitter:site', $this->params->get('app_id', ''), $type);
        }
    }
}
