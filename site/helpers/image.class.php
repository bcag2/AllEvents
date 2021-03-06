<?php

defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

/**
 * AllEventsImage
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */
class AllEventsImage
{
    /**
     * @param $name
     * @param $filename
     * @param $new_w
     * @param $new_h
     * @throws Exception
     */
    static function thumb($name, $filename, $new_w, $new_h)
    {
        // load the image manipulation class
        //require 'path/to/Zebra_Image.php';

        // create a new instance of the class
        $image = new Zebra_Image();

        // indicate a source image (a GIF, PNG or JPEG file)
        $image->source_path = $name;

        // indicate a target image
        // note that there's no extra property to set in order to specify the target
        // image's type -simply by writing '.jpg' as extension will instruct the script
        // to create a 'jpg' file
        $image->target_path = $filename;

        // since in this example we're going to have a jpeg file, let's set the output
        // image's quality (95% has no visible effect but saves some bytes)
        $image->jpeg_quality = 95;

        // some additional properties that can be set
        // read about them in the documentation
        $image->preserve_aspect_ratio = true;
        $image->enlarge_smaller_images = false;
        $image->preserve_time = true;

        // resize the image to at best 100x100 pixels by using the "not boxed" method
        // (read more in the overview section or in the documentation)
        // and if there is an error, check what the error is about
        if (!$image->resize($new_w, $new_h, ZEBRA_IMAGE_NOT_BOXED, -1)) {

            //only admins will see these errors
            if (JFactory::getUser()->authorise('core.manage')) {

                // if there was an error, let's see what the error is about
                switch ($image->error) {
                    case 1:
                        JFactory::getApplication()->enqueueMessage("Source file $name could not be found!", 'warning');
                        break;
                    case 2:
                        JFactory::getApplication()->enqueueMessage("Source file $name is not readable!", 'warning');
                        break;
                    case 3:
                        JFactory::getApplication()->enqueueMessage("Could not write target file $filename !", 'warning');
                        break;
                    case 4:
                        JFactory::getApplication()->enqueueMessage('Unsupported source file format!', 'warning');
                        break;
                    case 5:
                        JFactory::getApplication()->enqueueMessage('Unsupported target file format!', 'warning');
                        break;
                    case 6:
                        JFactory::getApplication()->enqueueMessage('GD library version does not support target file format!', 'warning');
                        break;
                    case 7:
                        JFactory::getApplication()->enqueueMessage('GD library is not installed!', 'warning');
                        break;
                }
            }
        }
    }

    /**
     * Determine the GD version
     * Code from php.net
     *
     * @param int
     *
     * @return int
     */
    static function gdVersion($user_ver = 0)
    {
        if (!extension_loaded('gd')) {
            return;
        }
        static $gd_ver = 0;

        // Just accept the specified setting if it's 1.
        if ($user_ver == 1) {
            $gd_ver = 1;

            return 1;
        }
        // Use the static variable if function was called previously.
        if ($user_ver != 2 && $gd_ver > 0) {
            return $gd_ver;
        }
        // Use the gd_info() function if possible.
        if (function_exists('gd_info')) {
            $ver_info = gd_info();
            preg_match('/\d/', $ver_info['GD Version'], $match);
            $gd_ver = $match[0];

            return $match[0];
        }
        // If phpinfo() is disabled use a specified / fail-safe choice...
        if (preg_match('/phpinfo/', ini_get('disable_functions'))) {
            if ($user_ver == 2) {
                $gd_ver = 2;

                return 2;
            } else {
                $gd_ver = 1;

                return 1;
            }
        }
        // ...otherwise use phpinfo().
        ob_start();
        phpinfo(8);
        $info = ob_get_contents();
        ob_end_clean();
        $info = stristr($info, 'gd version');
        preg_match('/\d/', $info, $match);
        $gd_ver = $match[0];

        return $match[0];
    }

    /**
     * Creates image information of an image
     *
     * @param string $image The image name
     * @param string $type event or venue
     *
     * @return bool if available
     * @internal param array $settings
     */
    static function flyercreator($image, $type)
    {
        // $settings = AllEvents::config();

        //define the environment based on the type
        if ($type == 'event') {
            $folder = 'events';
        } else if ($type == 'category') {
            $folder = 'categories';
        } else if ($type == 'venue') {
            $folder = 'venues';
        } else {
            return false;
        }

        if ($image) {
            $img_orig = 'images/com_allevents/' . $folder . '/' . $image;
            $img_thumb = 'images/com_allevents/' . $folder . '/small/' . $image;

            $filepath = JPATH_SITE . '/' . $img_orig;
            $save = JPATH_SITE . '/' . $img_thumb;

            // At least original image must exist
            if (!file_exists($filepath)) {
                return false;
            }

            //set paths
            $dimage['original'] = $img_orig;
            $dimage['thumb'] = $img_thumb;

            //get imagesize of the original
            $iminfo = @getimagesize($img_orig);

            //if the width or height is too large this formula will resize them accordingly
            if (($iminfo[0] > $settings->imagewidth) || ($iminfo[1] > $settings->imagehight)) {

                $iRatioW = $settings->imagewidth / $iminfo[0];
                $iRatioH = $settings->imagehight / $iminfo[1];

                if ($iRatioW < $iRatioH) {
                    $dimage['width'] = round($iminfo[0] * $iRatioW);
                    $dimage['height'] = round($iminfo[1] * $iRatioW);
                } else {
                    $dimage['width'] = round($iminfo[0] * $iRatioH);
                    $dimage['height'] = round($iminfo[1] * $iRatioH);
                }
            } else {
                $dimage['width'] = $iminfo[0];
                $dimage['height'] = $iminfo[1];
            }

            if (JFile::exists(JPATH_SITE . '/' . $img_thumb)) {
                //get imagesize of the thumbnail
                $thumbiminfo = @getimagesize($img_thumb);
                $dimage['thumbwidth'] = $thumbiminfo[0];
                $dimage['thumbheight'] = $thumbiminfo[1];
            }

            return $dimage;
        }

        return false;
    }

    /**
     * @param $file
     * @param $aesettings
     *
     * @return bool
     */
    static function check($file, $aesettings)
    {
        $sizelimit = $aesettings->sizelimit * 1024; //size limit in kb
        $imagesize = $file['size'];

        //check if the upload is an image...getimagesize will return false if not
        if (!getimagesize($file['tmp_name'])) {
            JError::raiseWarning(100, JText::_('COM_ALLEVENTS_UPLOAD_FAILED_NOT_AN_IMAGE') . ': ' . htmlspecialchars($file['name'], ENT_COMPAT, 'UTF-8'));

            return false;
        }

        //check if the imagefiletype is valid
        $fileext = strtolower(JFile::getExt($file['name']));

        $allowable = ['gif', 'jpg', 'png'];
        if (!in_array($fileext, $allowable)) {
            JError::raiseWarning(100, JText::_('COM_ALLEVENTS_WRONG_IMAGE_FILE_TYPE') . ': ' . htmlspecialchars($file['name'], ENT_COMPAT, 'UTF-8'));

            return false;
        }

        //Check filesize
        if ($imagesize > $sizelimit) {
            JError::raiseWarning(100, JText::_('COM_ALLEVENTS_IMAGE_FILE_SIZE') . ': ' . htmlspecialchars($file['name'], ENT_COMPAT, 'UTF-8'));

            return false;
        }

        //XSS check
        $xss_check = file_get_contents($file['tmp_name'], false, null, 0, 256);
        $html_tags = ['abbr', 'acronym', 'address', 'applet', 'area', 'audioscope', 'base', 'basefont', 'bdo', 'bgsound', 'big', 'blackface', 'blink', 'blockquote', 'body', 'bq', 'br', 'button', 'caption', 'center', 'cite', 'code', 'col', 'colgroup', 'comment', 'custom', 'dd', 'del', 'dfn', 'dir', 'div', 'dl', 'dt', 'em', 'embed', 'fieldset', 'fn', 'font', 'form', 'frame', 'frameset', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'hr', 'html', 'iframe', 'ilayer', 'img', 'input', 'ins', 'isindex', 'keygen', 'kbd', 'label', 'layer', 'legend', 'li', 'limittext', 'link', 'listing', 'map', 'marquee', 'menu', 'meta', 'multicol', 'nobr', 'noembed', 'noframes', 'noscript', 'nosmartquotes', 'object', 'ol', 'optgroup', 'option', 'param', 'plaintext', 'pre', 'rt', 'ruby', 's', 'samp', 'script', 'select', 'server', 'shadow', 'sidebar', 'small', 'spacer', 'span', 'strike', 'strong', 'style', 'sub', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'title', 'tr', 'tt', 'ul', 'var', 'wbr', 'xml', 'xmp', '!DOCTYPE', '!--'];
        foreach ($html_tags as $tag) {
            // A tag is '<tagname ', so we need to add < and a space or '<tagname>'
            if (stristr($xss_check, '<' . $tag . ' ') || stristr($xss_check, '<' . $tag . '>')) {
                JError::raiseWarning(100, JText::_('COM_ALLEVENTS_WARN_IE_XSS'));

                return false;
            }
        }

        return true;
    }

    /**
     * Sanitize the image file name and return an unique string
     *
     *
     * @param string $base_Dir the target directory
     * @param string $filename the unsanitized imagefile name
     *
     * @return string $filename the sanitized and unique image file name
     */
    static function sanitize($base_Dir, $filename)
    {
        //check for any leading/trailing dots and remove them (trailing shouldn't be possible cause of the getEXT check)
        $filename = preg_replace("/^[.]*/", '', $filename);
        $filename = preg_replace("/[.]*$/", '', $filename); //shouldn't be necessary, see above

        //we need to save the last dot position cause preg_replace will also replace dots
        $lastdotpos = strrpos($filename, '.');

        //replace invalid characters
        $filename = strtolower(preg_replace("/[^0-9a-zA-Z_-]/", '_', $filename));

        //get the parts before and after the dot (assuming we have an extension...check was done before)
        $beforedot = substr($filename, 0, $lastdotpos);
        $afterdot = substr($filename, $lastdotpos + 1);

        //make a unique filename for the image and check it is not already taken
        //if it is already taken keep trying till success
        //$now = time();
        $now = rand();

        while (JFile::exists($base_Dir . $beforedot . '_' . $now . '.' . $afterdot)) {
            $now++;
        }

        //create out of the seperated parts the new filename
        $filename = $beforedot . '_' . $now . '.' . $afterdot;

        return $filename;
    }
}
