<?php

defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

/**
 * AllEventsClassBullets
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsClassBullets
{
    /**
     * AllEventsClassBullets::MakeBullets()
     *
     * @return string
     */
    public static function MakeBullets()
    {
        // Initial settings, Just specify Source and Destination Image folder.
        $ImagesDirectory = JPATH_SITE . '/administrator/components/com_allevents/../../../images/com_allevents/bullets/'; //Source Image Directory End with Slash
        $DestImagesDirectory = $ImagesDirectory; //Destination Image Directory End with Slash
        $NewImageWidth = 16; //New Width of Image
        $NewImageHeight = 16; // New Height of Image
        $Quality = 80; //Image Quality
        $sReturn = "";
        $nbImagesOK = 0;

        if ($gdv = self::gdVersion()) {
            if ($gdv >= 2) {
                // $sReturn .= 'TrueColor functions may be used.';
            } else {
                // $sReturn .= 'GD version is 1.  Avoid the TrueColor functions.';
            }
            // Open Source Image directory, loop through each Image and resize it.
            if ($dir = opendir($ImagesDirectory)) {
                while (($file = readdir($dir)) !== false) {
                    $imagePath = $ImagesDirectory . $file;
                    $destPath = $DestImagesDirectory . $file;
                    $checkValidImage = @getimagesize($imagePath);

                    if (file_exists($imagePath) && $checkValidImage) // Continue only if 2 given parameters are true
                    {
                        $return = self::resizeImage($imagePath, $destPath, $NewImageWidth, $NewImageHeight, $Quality);
                        // Image looks valid, resize.
                        if ($return == 1) {
                            $sReturn .= $file . ' ' . JText::_('COM_ALLEVENTS_MAKEBULLETS_SUCCESS') . '<br />';
                        } elseif ($return == 2) {
                            $nbImagesOK = $nbImagesOK + 1;
                        } else {
                            $sReturn .= $file . ' ' . JText::_('COM_ALLEVENTS_MAKEBULLETS_FAILED') . '<br />';
                        }
                    }
                }
                closedir($dir);
            }
            //$sReturn = $nbImagesOK . ' ' . JText::_('COM_ALLEVENTS_MAKEBULLETS_ALREADY') . '<br />' . $sReturn;
            // La valeur de $filename est un nom de fichier (p.e. '.$entity.'.css); ajoute le path pour obtenir un nom complet
            $filename = JPATH_SITE . '/administrator/components/com_allevents/../../../images/com_allevents/bullets/index.html';
            // Si le fichier n'existe pas, on peut le créer.  S'il existe, vérifie si on peut le supprimer avant de le recréer.
            //$bOK = ((JFile::exists($filename)) ? JFile::delete($filename) : true);
            $handle = fopen($filename, 'w');
            fwrite($handle, '<html><body bgcolor="#FFFFFF"></body></html>');
            fclose($handle);
        } else {
            $sReturn = "The GD extension isn't loaded.";
        }

        return $sReturn;
    }

    /**
     * AllEventsClassBullets::gdVersion()
     * Get which version of GD is installed, if any.
     *
     * @param integer $user_ver
     *
     * @return bool|number
     *
     */
    private static function gdVersion($user_ver = 0)
    {
        if (!extension_loaded('gd')) {
            return false;
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
     * AllEventsClassBullets::resizeImage()
     *
     * @param mixed $SrcImage
     * @param mixed $DestImage
     * @param mixed $MaxWidth
     * @param mixed $MaxHeight
     * @param mixed $Quality
     *
     * @return int
     */
    function resizeImage($SrcImage, $DestImage, $MaxWidth, $MaxHeight, $Quality)
    {
        list($iWidth, $iHeight, $type) = getimagesize($SrcImage);
        $ImageScale = min($MaxWidth / $iWidth, $MaxHeight / $iHeight);
        $NewWidth = ceil($ImageScale * $iWidth);
        $NewHeight = ceil($ImageScale * $iHeight);
        $NewCanves = imagecreatetruecolor($NewWidth, $NewHeight);

        switch (strtolower(image_type_to_mime_type($type))) {
            case 'image/jpeg':
                $image_create_func = 'imagecreatefromjpeg';
                $image_save_func = 'imagejpeg';
                break;
            case 'image/png':
                $image_create_func = 'imagecreatefrompng';
                // $image_save_func = 'imagepng';
                // The quality is too high with "imagepng"
                // but you need it if you want to allow transparency
                $image_save_func = 'imagejpeg';
                break;
            case 'image/gif':
                $image_create_func = 'imagecreatefromgif';
                $image_save_func = 'imagegif';
                break;
            case 'image/bmp':
                $image_create_func = 'imagecreatefromwbmp';
                $image_save_func = 'imagewbmp';
                break;
            default:
                return 0;
        }

        $NewImage = $image_create_func($SrcImage);

        if (($iWidth <= $MaxWidth) && ($iHeight <= $MaxHeight))
            return 2;
        // Resize Image
        if (imagecopyresampled($NewCanves, $NewImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $iWidth, $iHeight)) {
            // copy file
            if ($image_save_func($NewCanves, $DestImage, $Quality)) {
                imagedestroy($NewCanves);

                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
}