<?php
defined('_JEXEC') or die;
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */


function plug_cb_allevents_install()
{
    // Copie des fichiers de langue du plugin
    $source = JPATH_ROOT . '/components/com_comprofiler/plugin/user/plug_cballevents/language';
    $target = JPATH_ROOT . '/language/';
    // Retrouve la liste des fichiers de langues qui se trouvent dans le dossier /language du plugin AllEvents
    $arrFiles = JFolder::files($source, '.ini', false, false, ['.']);
    // Et copie chaque fichier dans le dossier de language adéquat (en-GB, fr-FR, ...) de Joomla
    if (count($arrFiles) > 0) {
        $j = count($arrFiles);
        try {
            for ($i = 1; $i <= $j; $i++) {
                // Récupère le nom du fichier (p.e. fr-FR.plg_cb_allevents.ini)
                $file = $arrFiles[($i - 1)];
                // Extrait le code ISO de la langue (p.e. fr-FR)
                $code = substr($file, 0, 5);
                // Si le dossier /language/CODE_LANGE existe (/language/fr-FR), copie le fichier à cet endroit
                if (JFolder::exists($target . $code)) {
                    JFile::copy($source . DIRECTORY_SEPARATOR . $file, $target . $code . DIRECTORY_SEPARATOR . $file);
                }
            }
        } catch (Exception $e) {
        }
    }
}
