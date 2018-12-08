<?php

defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

/**
 * AllEventsClassCSS
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsClassCSS
{
    /**
     * AllEventsClassCSS::MakeCSSEntity()
     *
     * @param mixed $entity
     * @param mixed $entities
     *
     * @return int
     */
    public static function MakeCSSEntity($entity, $entities)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('a.id, a.titre, a.image_bullet, a.couleur, a.couleur_texte, a.vignette');
        $query->from('`#__allevents_' . $entities . '` AS a');
        $query->where('a.published = 1');
        $db->setQuery($query);
        $loaddb = $db->loadObjectList();
        // La valeur de $filename est un nom de fichier (p.e. '.$entity.'.css); ajoute le path pour obtenir un nom complet
        $filename = JPATH_ROOT . '/media/com_allevents/css/dynamic/' . $entity . '.css';
        // Si le fichier n'existe pas, on peut le crÃ©er.  S'il existe, vÃ©rifie si on peut le supprimer avant de le recrÃ©er.
        //$bOK = ((JFile::exists($filename)) ? JFile::delete($filename) : true);
        $handle = fopen($filename, 'w');
        if (isset($loaddb)) {
            foreach ($loaddb as $row) {
                $backcolor = ((($row->couleur != null) && ($row->couleur != '')) ? $row->couleur : '');
                $forecolor = ((($row->couleur_texte != null) && ($row->couleur_texte != '')) ? $row->couleur_texte : '');
                $sLine = '.se_' . $entity . '_' . $row->id . '_color{background-color:' . $backcolor . ';color:' . $forecolor . ';}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.se_' . $entity . '_' . $row->id . '_forecolor{background-color:' . $forecolor . ';color:' . $backcolor . ';}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.se_' . $entity . '_' . $row->id . '_color a{color:' . $forecolor . ' !important;}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.se_' . $entity . '_' . $row->id . '_summary{background-color:#FFF;color:' . $backcolor . ';background:-moz-linear-gradient(top, #FFF 0%, ' . $backcolor . ' 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#FFF), color-stop(100%,' . $backcolor . '));background:-webkit-linear-gradient(top, #FFF 0%,' . $backcolor . ' 100%);background:-o-linear-gradient(top, #FFF 0%,' . $backcolor . ' 100%);background:-ms-linear-gradient(top, #FFF 0%,' . $backcolor . ' 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#FFF", endColorstr="' . $backcolor . '",GradientType=0);background:linear-gradient(top, #FFF 0%,' . $backcolor . ' 100%);-webkit-box-shadow:0 0 5px rgba(0,0,0,0.4);-moz-box-shadow:0 0 5px rgba(0,0,0,0.4);box-shadow:0 0 5px rgba(0,0,0,0.4);color:' . $forecolor . ';min-height:114px;}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.se_' . $entity . '_' . $row->id . '_summary a{color:' . $forecolor . ' !important;}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.se_' . $entity . '_' . $row->id . '_bullet{min-width:16px;padding-left:20px !important;background-repeat:no-repeat !important;background-position:0 0 !important;background-image:url(' . JUri::root() . $row->image_bullet . ');}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.se_' . $entity . '_' . $row->id . '_vignette{height:104px;min-height:104px;height:104px;width:160px;float:left;padding: 5px;background-image:url(' . JUri::root() . $row->vignette . ') no-repeat 0 0;display:inline-block;}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.chzn-color-' . $entity . '[rel="value_' . $row->id . '"]{padding-left:20px !important; background-repeat:no-repeat !important; background-position:3px 3px !important; background-color: ' . $backcolor . '; color: ' . $forecolor . '; border-color: ' . $forecolor . '; background-image:url(' . JUri::root() . $row->image_bullet . ');}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.mod_aelist .aebutton.se_' . $entity . '_' . $row->id . '_mod_aelist:before {background-color: ' . $backcolor . '; box-shadow: 0 4px ;}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.mod_aelist .aebutton.se_' . $entity . '_' . $row->id . '_mod_aelist:hover:before {background-color: ' . $forecolor . '; box-shadow: 0 4px ' . $forecolor . ';}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.mod_aelist .aebutton.se_' . $entity . '_' . $row->id . '_mod_aelist:active:before {box-shadow: 0 2px ' . $forecolor . ';}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.se_' . $entity . '_' . $row->id . '_bs_color {background-color: ' . $forecolor . ';}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.se_' . $entity . '_' . $row->id . '_bs_bullet{background-color: #fff !important;border: 0 solid #FFF !important;border-radius: 0 !important;box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.4) inset !important;height: 16px !important;width:16px !important;background-repeat:no-repeat !important;background-position:center 0 !important;background-image:url(' . JUri::root() . $row->image_bullet . ');}' . PHP_EOL;
                fwrite($handle, $sLine);
                // $sLine = '.dh-se_'.$entity.'_' . $row->id . '_bs_color, .dh-se_'.$entity.'_' . $row->id . '_bs_bullet, .dh-se_'.$entity.'_' . $row->id . '_bs_color:hover, .dh-se_'.$entity.'_' . $row->id . '_bs_bullet:hover  {  min-width:16px;padding-left:20px !important;background-repeat:no-repeat !important;background-position:0 5px !important;background-image:url(' . JUri::root() . $row->image_bullet . ');background-color:' . $backcolor . ';color:' . $forecolor . ';}'  . PHP_EOL;
                $sLine = '.dh-se_' . $entity . '_' . $row->id . '_bs_color, .dh-se_' . $entity . '_' . $row->id . '_bs_bullet, .dh-se_' . $entity . '_' . $row->id . '_bs_color:hover, .dh-se_' . $entity . '_' . $row->id . '_bs_bullet:hover  {background-color:' . $backcolor . ';color:' . $forecolor . ';}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.event-' . $entity . '_' . $row->id . ' .fc-content > span:first-child::before, .event-' . $entity . '_' . $row->id . '.event-offsite::before {color: ' . $forecolor . '}' . PHP_EOL;
                fwrite($handle, $sLine);
                $sLine = '.event-' . $entity . '_' . $row->id . ' .fc-event-title::before, .event-category.event-' . $entity . '_' . $row->id . '::before {color: ' . $forecolor . '}' . PHP_EOL;
                fwrite($handle, $sLine);
                fwrite($handle, PHP_EOL);
            } // foreach ($data as $row)
        }
        $sLine = '.se_' . $entity . '_0_color{background-color:#bef781;color:#000;}' . PHP_EOL;
        fwrite($handle, $sLine);
        $sLine = '.se_' . $entity . '_0_color a{color:#000 !important;}' . PHP_EOL;
        fwrite($handle, $sLine);
        $sLine = '.se_' . $entity . '_0_summary{background-color:#FFF;color:#bef781;background:-moz-linear-gradient(top, #FFF 0%, #bef781 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#FFF), color-stop(100%,#bef781));background:-webkit-linear-gradient(top, #FFF 0%,#bef781 100%);background:-o-linear-gradient(top, #FFF 0%,#bef781 100%);background:-ms-linear-gradient(top, #FFF 0%,#bef781 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#FFF", endColorstr="#bef781",GradientType=0);background:linear-gradient(top, #FFF 0%,#bef781 100%);-webkit-box-shadow:0 0 5px rgba(0,0,0,0.4);-moz-box-shadow:0 0 5px rgba(0,0,0,0.4);box-shadow:0 0 5px rgba(0,0,0,0.4);color:#000;min-height:114px;}' . PHP_EOL;
        fwrite($handle, $sLine);
        $sLine = '.se_' . $entity . '_0_summary a{color:#000 !important;}' . PHP_EOL;
        fwrite($handle, $sLine);
        $sLine = '.se_' . $entity . '_0_bullet{min-width:16px;padding-left:20px !important;background-repeat:no-repeat !important;background-position:0 0 !important;background-image:url(' . JUri::root() . 'images/com_allevents/bullets/' . $entity . '.png);}' . PHP_EOL;
        fwrite($handle, $sLine);
        $sLine = '.se_' . $entity . '_0_vignette{height:104px;min-height:104px;height:104px;width:160px;float:left;padding: 5px ;background-image:url(' . JUri::root() . 'images/com_allevents/bullets/default.png) no-repeat 0 0;display:inline-block;}' . PHP_EOL;
        fwrite($handle, $sLine);
        $sLine = '.chzn-color-' . $entity . '[rel="value_0"]{padding-left:20px !important; background-repeat:no-repeat !important; background-position:3px 3px !important; background-color: #FFF; color: #000; background-image:url(' . JUri::root() . 'images/com_allevents/bullets/' . $entity . '.png);}' . PHP_EOL;
        fwrite($handle, $sLine);
        fclose($handle);

        return 1;
    }
}