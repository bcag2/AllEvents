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
 * plgAlleventsOpenGraphHelper
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsOpenGraphHelper
{
    /**
     * plgAlleventsOpenGraphHelper::renderTag()
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
 * plgAlleventsOpenGraph
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class plgAlleventsOpenGraph extends JPlugin
{
    /**
     * plgAlleventsOpenGraph::__construct()
     *
     * @param mixed $subject
     * @param mixed $config
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        JPlugin::loadLanguage('plg_allevents_opengraph', JPATH_ADMINISTRATOR);
    }

    /**
     * plgAlleventsOpenGraph::onAlleventsOpenGraphEvent()
     *
     * @param mixed $item
     * @param mixed $params
     *
     * @throws Exception
     * @internal param mixed $enrolments
     */
    public function onAlleventsOpenGraphEvent(&$item, &$params)
    {
        $app = JFactory::getApplication();
        $config = JFactory::getConfig();

        if (($app->getName() != 'site') || ($this->params->get('displaye', 1) == 0)) {
            return;
        }

        // param suffixe
        $suffix = "_e";
        $type = $this->params->get('render_type', 1);

        // Title
        if ($this->params->get('title' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:title', $this->params->get('title' . $suffix, ''), $type);
        } elseif ($item->titre != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:title', $item->titre, $type);
        }

        // Type
        plgAlleventsOpenGraphHelper::renderTag('og:type', $this->params->get('type' . $suffix, 'article'), $type);

        // Image
        if ($this->params->get('image' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:image', JUri::base(false) . $this->params->get('image' . $suffix, ''), $type);
        } elseif (isset($item->banniere) && ($item->banniere) != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:image', JUri::base(false) . $item->banniere, $type);
        } elseif (isset($item->affiche) && ($item->affiche) != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:image', JUri::base(false) . $item->affiche, $type);
        } elseif (isset($item->vignette) && ($item->vignette) != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:image', JUri::base(false) . $item->vignette, $type);
        } else {
            $content = "";
            // Try to find image in article
            if (isset($item->description) && ($item->description) != '') {
                $content = $item->description;
            }
            preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $content, $src);
            if (isset($src[1]) && $src[1] != '') {
                plgAlleventsOpenGraphHelper::renderTag('og:image', JUri::base(false) . $src[1], $type);
            } elseif (isset($item->id) && (int)$item->id > 0) {
                jimport('joomla.filesystem.file');
                $imgPath = '';
                $path = JPATH_ROOT . '/images/com_allevents/aeopengraph/';
                if (JFile::exists($path . (int)$item->id . '.png')) {
                    $imgPath = JUri::base(false) . 'images/com_allevents/aeopengraph/' . (int)$item->id . '.png';
                } elseif (JFile::exists($path . (int)$item->id . '.jpg')) {
                    $imgPath = JUri::base(false) . 'images/com_allevents/aeopengraph/' . (int)$item->id . '.jpg';
                } elseif (JFile::exists($path . (int)$item->id . '.gif')) {
                    $imgPath = JUri::base(false) . 'images/com_allevents/aeopengraph/' . (int)$item->id . '.gif';
                }

                if ($imgPath != '') {
                    plgAlleventsOpenGraphHelper::renderTag('og:image', $imgPath, $type);
                }
            }
        }

        //URL
        if ($this->params->get('url' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:url', $this->params->get('url' . $suffix, ''), $type);
        } else {
            plgAlleventsOpenGraphHelper::renderTag('og:url', JUri::current(), $type);
        }

        // Site Name
        if ($this->params->get('site_name' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:site_name', $this->params->get('site_name' . $suffix, ''), $type);
        } else {
            plgAlleventsOpenGraphHelper::renderTag('og:site_name', $config->get('sitename'), $type);
        }

        // Description
        if ($this->params->get('description' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:description', $this->params->get('description' . $suffix, ''), $type);
        } elseif (isset($item->metadesc) && ($item->metadesc != '')) {
            plgAlleventsOpenGraphHelper::renderTag('og:description', $item->metadesc, $type);
        } elseif ($config->get('MetaDesc') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:description', $config->get('MetaDesc'), $type);
        } else {
            $introtext = AllEventsHelperString::cleanText($item->description, 200);

            if (isset($introtext) && ($introtext != '')) {
                $iTD = str_replace("\r\n", ' ', strip_tags($introtext));
                $iTD = str_replace("\n", ' ', $iTD);
                $iTD = str_replace("\n", ' ', $iTD);
                plgAlleventsOpenGraphHelper::renderTag('og:description', $iTD, $type);
            }
        }

        // FB App ID - COMMON
        if ($this->params->get('app_id', '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('fb:app_id', $this->params->get('app_id', ''), $type);
        }

        // Other
        if ($this->params->get('other', '') != '') {
            $other = explode(';', $this->params->get('other', ''));
            if (!empty($other)) {
                foreach ($other as $v) {
                    if ($v != '') {
                        $vother = explode('=', $v);
                        if (!empty($vother)) {
                            if (isset($vother[0]) && isset($vother[1])) {
                                plgAlleventsOpenGraphHelper::renderTag(strip_tags($vother[0]), $vother[1], $type);
                            }
                        }
                    }

                }
            }
        }


        //todo video
        // if ((preg_match('/<meta property="og:video"/i', $body) == 0))
        // {
        // if (preg_match('%<object.*(?:data|value)=[\\\\"\'](.*?\.(?:flv|swf))["\'].*?</object>%si', $body, $regsu))
        // {
        // if ((preg_match('%<object.*width=["\'](.*?)["\'].*</object>%si', $body, $regsw)) && (preg_match('%<object.*height=["\'](.*?)["\'].*</object>%si', $body, $regsh)))
        // {
        // if (preg_match('/^http/i', $regsu[1]))
        // {
        // $video = $regsu[1];
        // }
        // else
        // {
        // $video = JUri::root() . preg_replace('#^/#', '', $regsu[1]);
        // }
        // $type = "video";
        // }
        // }
        // elseif (preg_match('%<iframe.*src=["\'](.*?(?:www\.(?:youtube|youtube-nocookie)\.com|vimeo.com)/(?:embed|v)/(?!videoseries).*?)["\'].*?</iframe>%si', $body, $regsu))
        // {
        // if ((preg_match('%<iframe.*width=["\'](.*?)["\'].*</iframe>%si', $body, $regsw)) && (preg_match('%<iframe.*height=["\'](.*?)["\'].*</iframe>%si', $body, $regsh)))
        // {
        // if ($opengraph_directyoutube == 0)
        // {
        // $video = $regsu[1];
        // }
        // else
        // {
        // $video = preg_replace('%embed/(?!videoseries)%i', 'v/', $regsu[1]);
        // }
        // $type = "video";
        // }
        // }
        // if ($type == "video")
        // {
        // $meta .= "<meta property=\"og:video\" content=\"$video\"/>" . PHP_EOL;
        // $meta .= "<meta property=\"og:video:type\" content=\"application/x-shockwave-flash\"/>" . PHP_EOL;
        // $meta .= "<meta property=\"og:video:width\" content=\"$regsw[1]\">" . PHP_EOL;
        // $meta .= "<meta property=\"og:video:height\" content=\"$regsh[1]\">" . PHP_EOL;
        // }

        // }

        //todo image
        // if (preg_match('/<meta property="og:image"/i', $body) == 0)
        // {
        // if ($opengraph_defaultimage == "")
        // {
        // $opengraph_defaultimage = JUri::root() . CMP_OG_LINKIMG;
        // }
        // else
        // {
        // if (!preg_match('%^(?://|http://|https://)%', $opengraph_defaultimage))
        // {
        // $opengraph_defaultimage = preg_replace('#^/#', '', $opengraph_defaultimage);
        // $opengraph_defaultimage = JUri::root() . $opengraph_defaultimage;
        // }
        // }
        // if ($opengraph_onlydefaultimage == '1')
        // {
        // $this->images[] = $opengraph_defaultimage;
        // }
        // else
        // {
        // $this->find_youtube_images($body, $this->images);
        // $this->find_images($body, $this->images);
        // if (count($this->images) == 0)
        // $this->images[] = $opengraph_defaultimage;
        // }

        // if (count($this->images) != 0)
        // {
        // foreach ($this->images as $value)
        // {
        // $meta .= "<meta property=\"og:image\" content=\"$value\"/>" . PHP_EOL;
        // }
        // }
        // }

        if (!empty($item->place_latitude) && !empty($item->place_longitude)) {
            plgAlleventsOpenGraphHelper::renderTag('og:latitude', $item->place_latitude, $type);
            plgAlleventsOpenGraphHelper::renderTag('og:longitude', $item->place_longitude, $type);
        }
        if (!empty($item->place_street)) {
            plgAlleventsOpenGraphHelper::renderTag('og:street-address', $item->place_street, $type);
        }
        if (!empty($item->place_codepostal)) {
            plgAlleventsOpenGraphHelper::renderTag('og:postal-code', $item->place_codepostal, $type);
        }
        if (!empty($item->place_ville)) {
            plgAlleventsOpenGraphHelper::renderTag('og:locality', $item->place_ville, $type);
        }
        if (!empty($item->place_country)) {
            plgAlleventsOpenGraphHelper::renderTag('og:country-name', $item->place_country, $type);
        }
        if (!empty($item->place_email)) {
            plgAlleventsOpenGraphHelper::renderTag('og:email', $item->place_email, $type);
        }
        if (!empty($item->place_phone)) {
            plgAlleventsOpenGraphHelper::renderTag('og:phone_number', $item->place_phone, $type);
        }
        if (!empty($item->place_fax)) {
            plgAlleventsOpenGraphHelper::renderTag('og:fax_number', $item->place_fax, $type);
        }
    }

    /**
     * plgAlleventsOpenGraph::onAlleventsOpenGraphListEvent()
     *
     * @param       $titre
     * @param       $banniere
     * @param       $metadesc
     * @param mixed $params
     *
     * @throws Exception
     * @internal param mixed $item
     * @internal param mixed $enrolments
     */
    public function onAlleventsOpenGraphListEvent(&$titre, &$banniere, &$metadesc, &$params)
    {
        $app = JFactory::getApplication();
        $config = JFactory::getConfig();

        if (($app->getName() != 'site') || ($this->params->get('display_e', 1) == 0)) {
            return;
        }

        // param suffixe
        $suffix = "_e";
        $type = $this->params->get('render_type', 1);

        // Title
        if ($this->params->get('title' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:title', $this->params->get('title' . $suffix, ''), $type);
        } elseif ($titre != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:title', $titre, $type);
        }

        // Type
        plgAlleventsOpenGraphHelper::renderTag('og:type', $this->params->get('type' . $suffix, 'article'), $type);

        // Image
        if (isset($banniere) && ($banniere) != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:image', JUri::base(false) . $banniere, $type);
        } elseif ($this->params->get('image' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:image', JUri::base(false) . $this->params->get('image' . $suffix, ''), $type);
        }

        //URL
        if ($this->params->get('url' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:url', $this->params->get('url' . $suffix, ''), $type);
        } else {
            plgAlleventsOpenGraphHelper::renderTag('og:url', JUri::current(), $type);
        }

        // Site Name
        if ($this->params->get('site_name' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:site_name', $this->params->get('site_name' . $suffix, ''), $type);
        } else {
            plgAlleventsOpenGraphHelper::renderTag('og:site_name', $config->get('sitename'), $type);
        }

        // Description
        if (isset($metadesc) && ($metadesc != '')) {
            plgAlleventsOpenGraphHelper::renderTag('og:description', $metadesc, $type);
        } elseif ($this->params->get('description' . $suffix, '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:description', $this->params->get('description' . $suffix, ''), $type);
        } elseif ($config->get('MetaDesc') != '') {
            plgAlleventsOpenGraphHelper::renderTag('og:description', $config->get('MetaDesc'), $type);
        }

        // FB App ID - COMMON
        if ($this->params->get('app_id', '') != '') {
            plgAlleventsOpenGraphHelper::renderTag('fb:app_id', $this->params->get('app_id', ''), $type);
        }
    }
}
