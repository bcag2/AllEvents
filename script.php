<?php

defined('_JEXEC') or die;
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

/**
 * com_AllEventsInstallerScript
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class com_AllEventsInstallerScript
{
    /**
     * The title of the component (printed on installation and uninstallation messages)
     *
     * @var string
     */
    protected $componentTitle = 'AllEvents';

    /**
     * The component's name
     *
     * @var   string
     */
    protected $componentName = 'com_allevents';

    /**
     * The minimum PHP version required to install this extension
     *
     * @var   string
     */
    protected $minimumPHPVersion = '5.3.10';

    /**
     * The minimum Joomla! version required to install this extension
     *
     * @var   string
     */
    protected $minimumJoomlaVersion = '3.7';
    protected $release;

    /**
     * Post-installation message definitions for Joomla! 3.2 or later.
     *
     * This array contains the message definitions for the Post-installation Messages component added in Joomla! 3.2 and
     * later versions. Each element is also a hashed array. For the keys used in these message definitions please
     *
     * @see F0FUtilsInstallscript::addPostInstallationMessage
     *
     * @var array
     */
    protected $postInstallationMessages = [ // FREE
        'accept_support' => [
            'type' => 'message',
            'title_key' => 'ALLEVENTS_POSTSETUP_LBL_ACCEPTSUPPORT',
            'description_key' => 'ALLEVENTS_POSTSETUP_DESC_ACCEPTSUPPORT',
            'action_key' => 'ALLEVENTS_POSTSETUP_BTN_I_CONFIRM_THIS',
            'language_extension' => 'com_allevents',
            'language_client_id' => '1',
            'version_introduced' => '3.2.17'] // EERF
    ];

    /**
     * @var array Obsolete files and folders to remove from the AllEvents oldest releases
     */
    private $AllEventsRemoveFiles = [
        'files' => [
            'administrator/components/com_allevents/updatelogs.txt',
            'administrator/components/com_allevents/helpers/AEupload.php',
            'administrator/components/com_allevents/helpers/AEuploadICS.php',
            'administrator/components/com_allevents/view/main/design.php',
            'media/com_allevents/pdf/external.php'],
        'folders' => [
            'media/com_allevents/javascript',
            'media/com_allevents/emails',
            'media/com_allevents/css/themes']];

    /**
     * com_AllEventsInstallerScript::install()
     *
     * @param mixed $parent
     */
    function install($parent)
    {
        JFactory::getLanguage()->load('com_installer', JPATH_ADMINISTRATOR);
        $params = JComponentHelper::getParams('com_media');
        $manifest = $parent->get("manifest");
        $parent = $parent->getParent();
        $source = $parent->getPath("source");
        $installer = new JInstaller();
        echo '<link rel="stylesheet" href="' . JUri::root(true) . '/media/com_allevents/css/allevents.css" type="text/css">';

        echo '<div class="alert">';
        echo '    <button type="button" class="close" data-dismiss="alert">&times;</button>' . JText::_('COM_ALLEVENTS_POST_INSTALL_MSG');
        echo '</div>';

        echo '<style>';
        echo '.aeinstalltable{background:#fff none repeat scroll 0 0;border:1px solid #ccc;border-radius:3px;border-spacing:0;color:#4d4d4d;font-family:"Trebuchet MS",Helvetica,sans-serif;font-size:13px!important;font-weight:400!important;margin:7px 15px 15px!important;width:95%}';
        echo '.aeinstalltable tr:hover{background:#e8f6fe none repeat scroll 0 0;transition:all .1s ease-in-out 0}';
        echo '.aeinstalltable tr.row1{background-color:#f0f0ee}';
        echo '.aeinstalltable td,.aeinstalltable th{border-left:1px solid #ccc;border-top:1px solid #ccc;padding:10px!important;text-align:left}';
        echo '.aeinstalltable th{background-image:linear-gradient(#fdfdfd,#f4f4f4);border-bottom:4px solid #1272a5!important;border-top:medium none;color:#333!important;text-shadow:0 1px 1px #fff}';
        echo '.aeinstalltable td:first-child,.aeinstalltable th:first-child{border-left:medium none}';
        echo '.aeinstalltable th:first-child{border-radius:3px 0 0}';
        echo '.aeinstalltable th:last-child{border-radius:0 3px 0 0}';
        echo '.aeinstalltable th:only-child{border-radius:6px 6px 0 0}';
        echo '.aeinstalltable tr:last-child td:first-child{border-radius:0 0 0 3px}';
        echo '.aeinstalltable tr:last-child td:last-child{border-radius:0 0 3px}';
        echo '.aeinstalltable em,.aeinstalltable strong{color:#1272a5;font-weight:700}';
        echo '</style>';

        echo '<table class="aeinstalltable">';
        echo '    <thead align="left">';
        echo '        <tr>';
        echo '            <th class="title" align="left">' . JText::_('COM_ALLEVENTS_COMPONENT') . '</th>';
        echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_STATUS') . '</th>';
        echo '        </tr>';
        echo '    </thead>';
        echo '    <tbody>';
        echo '        <tr class="row0">';
        echo '            <td class="key">' . JText::_('COM_ALLEVENTS') . '</td>';
        echo '            <td><strong style="color: green">' . JText::_('COM_ALLEVENTS_INSTALLED') . '</strong></td>';
        echo '        </tr>';
        echo '    </tbody>';
        echo '</table>';

        $rows = 1;

        // Proceed
        if (is_object($manifest->modules) && isset($manifest->modules->module)) {
            echo '<table class="aeinstalltable">';
            echo '    <thead align="left">';
            echo '        <tr>';
            echo '            <th class="title" align="left">' . JText::_('COM_ALLEVENTS_MODULE') . '</th>';
            echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_CLIENT') . '</th>';
            echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_STATUS') . '</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($manifest->modules->module as $module) {
                $attributes = $module->attributes();
                $mod = $source . '/' . $attributes['folder'] . '/' . $attributes['module'];
                $installer->install($mod);
                $installModules[] = $attributes['module'];
                echo '<tr class="row' . ($rows++ % 2) . '">';
                echo '    <td class="key">' . $attributes['name'] . '&nbsp;(' . $attributes['aetype'] . ')&nbsp;' . '</td>';
                echo '    <td class="key">' . JText::_('COM_ALLEVENTS_SITE') . '</td>';
                echo '    <td><strong style="color:green">' . JText::_('COM_ALLEVENTS_INSTALLED') . '</strong></td>';
                echo '</tr>';
            }
            echo '    </tbody>';
            echo '</table>';
        }

        if (is_object($manifest->plugins) && isset($manifest->plugins->plugin)) {
            echo '<table class="aeinstalltable">';
            echo '    <thead align="left">';
            echo '        <tr>';
            echo '            <th class="title" align="left">' . JText::_('COM_ALLEVENTS_PLUGIN') . '</th>';
            echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_GROUP') . '</th>';
            echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_STATUS') . '</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($manifest->plugins->plugin as $plugin) {
                $attributes = $plugin->attributes();
                $plg = $source . '/' . $attributes['folder'] . '/' . $attributes['plugin'];
                $installer->install($plg);
                echo '<tr class="row' . ($rows++ % 2) . '">';
                echo '    <td class="key">' . $attributes['name'] . '&nbsp;(' . $attributes['aetype'] . ')&nbsp;' . '</td>';
                echo '    <td class="key">' . $attributes['group'] . '</td>';
                echo '    <td><strong style="color:green">' . JText::_('COM_ALLEVENTS_INSTALLED') . '</strong></td>';
                echo '</tr>';
            }
            echo '    </tbody>';
            echo '</table>';
        }

        echo '<br />';
        $image_path = $params->get('image_path');
        $folder[0][0] = 'com_allevents/';
        $folder[0][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[0][0];
        $folder[1][0] = 'com_allevents/affiches/';
        $folder[1][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[1][0];
        $folder[2][0] = 'com_allevents/bullets/';
        $folder[2][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[2][0];
        $folder[3][0] = 'com_allevents/files/';
        $folder[3][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[3][0];
        $folder[4][0] = 'com_allevents/vignettes/';
        $folder[4][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[4][0];
        $folder[5][0] = 'com_allevents/uploads/';
        $folder[5][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[5][0];
        $folder[6][0] = 'com_allevents/aeopengraph/';
        $folder[6][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[6][0];
        $folder[7][0] = 'com_allevents/aetwittercard/';
        $folder[7][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[7][0];
        $folder[8][0] = 'com_allevents/bannieres/';
        $folder[8][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[8][0];

        $message = '<div><i>' . JText::_('COM_ALLEVENTS_FOLDER_CREATION') . '</i></div>';
        $error = [];
        foreach ($folder as $key => $value) {
            if (!JFolder::exists($value[1])) {
                if (JFolder::create($value[1], 0755)) {
                    $data = "<html>\n<body bgcolor=\"#FFFFFF\">\n</body>\n</html>";
                    JFile::write($value[1] . "/index.html", $data);
                    $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/' . $value[0] . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_CREATED') . '</span></b></div>';
                    $error[] = 0;
                } else {
                    $message .= '<div><b><span style="color:#CC0033">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/' . $value[0] . ' <span style="color:#CC0033">' . JText::_('COM_ALLEVENTS_CREATION_FAILED') . '</span></b> ' . JText::_('COM_ALLEVENTS_PLEASE_CREATE_MANUALLY') . '</div>';
                    $error[] = 1;
                }
            } else // Folder exist
            {
                $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/' . $value[0] . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_EXISTS') . '</span></b></div>';
                $error[] = 0;
            }
        }

        $message .= '<br />';
        if (JFolder::exists(JPATH_ROOT . '/media/com_allevents/images/affiches/')) {
            JFolder::copy(JPATH_ROOT . '/media/com_allevents/images/affiches/', JPATH_ROOT . '/' . $image_path . '/com_allevents/affiches/', '', true);
            $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/com_allevents/affiches/' . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_COPIED') . '</span></b></div>';
        }

        if (JFolder::exists(JPATH_ROOT . '/media/com_allevents/images/bullets/')) {
            JFolder::copy(JPATH_ROOT . '/media/com_allevents/images/bullets/', JPATH_ROOT . '/' . $image_path . '/com_allevents/bullets/', '', true);
            $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/com_allevents/bullets/' . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_COPIED') . '</span></b></div>';
        }

        if (JFolder::exists(JPATH_ROOT . '/media/com_allevents/images/vignettes/')) {
            JFolder::copy(JPATH_ROOT . '/media/com_allevents/images/vignettes/', JPATH_ROOT . '/' . $image_path . '/com_allevents/vignettes/', '', true);
            $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/com_allevents/vignettes/' . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_COPIED') . '</span></b></div>';
        }

        $message .= '<br /><br />';
        echo $message;
    }

    /**
     * com_AllEventsInstallerScript::uninstall()
     *
     * @param mixed $parent
     */
    function uninstall($parent)
    {
        echo '<p>' . JText::_('COM_ALLEVENTS_UNINSTALL') . '</p>';
        $db = JFactory::getDbo();
        $query = 'DELETE FROM `#__postinstall_messages` WHERE `language_extension` = ' . $db->quote('com_allevents');
        $db->setQuery($query);
        $db->execute();
    }

    /**
     * com_AllEventsInstallerScript::update()
     *
     * @param mixed $parent
     */
    function update($parent)
    {
        $params = JComponentHelper::getParams('com_media');
        $manifest = $parent->get("manifest");
        $parent = $parent->getParent();
        $source = $parent->getPath("source");
        $installer = new JInstaller();

        echo '<link rel="stylesheet" href="' . JUri::root(true) . '/media/com_allevents/css/allevents.css" type="text/css">';

        echo '<div class="alert">';
        echo '    <button type="button" class="close" data-dismiss="alert">&times;</button>' . JText::_('COM_ALLEVENTS_POST_INSTALL_MSG');
        echo '</div>';

        echo '<style>';
        echo '.aeinstalltable{background:#fff none repeat scroll 0 0;border:1px solid #ccc;border-radius:3px;border-spacing:0;color:#4d4d4d;font-family:"Trebuchet MS",Helvetica,sans-serif;font-size:13px!important;font-weight:400!important;margin:7px 15px 15px!important;width:95%}';
        echo '.aeinstalltable tr:hover{background:#e8f6fe none repeat scroll 0 0;transition:all .1s ease-in-out 0}';
        echo '.aeinstalltable tr.row1{background-color:#f0f0ee}';
        echo '.aeinstalltable td,.aeinstalltable th{border-left:1px solid #ccc;border-top:1px solid #ccc;padding:10px!important;text-align:left}';
        echo '.aeinstalltable th{background-image:linear-gradient(#fdfdfd,#f4f4f4);border-bottom:4px solid #1272a5!important;border-top:medium none;color:#333!important;text-shadow:0 1px 1px #fff}';
        echo '.aeinstalltable td:first-child,.aeinstalltable th:first-child{border-left:medium none}';
        echo '.aeinstalltable th:first-child{border-radius:3px 0 0}';
        echo '.aeinstalltable th:last-child{border-radius:0 3px 0 0}';
        echo '.aeinstalltable th:only-child{border-radius:6px 6px 0 0}';
        echo '.aeinstalltable tr:last-child td:first-child{border-radius:0 0 0 3px}';
        echo '.aeinstalltable tr:last-child td:last-child{border-radius:0 0 3px}';
        echo '.aeinstalltable em,.aeinstalltable strong{color:#1272a5;font-weight:700}';
        echo '</style>';

        echo '<table class="aeinstalltable">';
        echo '    <thead align="left">';
        echo '        <tr>';
        echo '            <th class="title" align="left">' . JText::_('COM_ALLEVENTS_COMPONENT') . '</th>';
        echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_STATUS') . '</th>';
        echo '        </tr>';
        echo '    </thead>';
        echo '    <tbody>';
        echo '        <tr class="row0">';
        echo '            <td class="key">' . JText::_('COM_ALLEVENTS') . '</td>';
        echo '            <td><strong style="color: green">' . JText::_('COM_ALLEVENTS_INSTALLED') . '</strong></td>';
        echo '        </tr>';
        echo '    </tbody>';
        echo '</table>';

        $rows = 1;

        // Proceed
        if (is_object($manifest->modules) && isset($manifest->modules->module)) {
            echo '<table class="aeinstalltable">';
            echo '    <thead align="left">';
            echo '        <tr>';
            echo '            <th class="title" align="left">' . JText::_('COM_ALLEVENTS_MODULE') . '</th>';
            echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_CLIENT') . '</th>';
            echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_STATUS') . '</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($manifest->modules->module as $module) {
                $attributes = $module->attributes();
                $mod = $source . '/' . $attributes['folder'] . '/' . $attributes['module'];
                $installer->install($mod);
                $installModules[] = $attributes['module'];
                echo '<tr class="row' . ($rows++ % 2) . '">';
                echo '    <td class="key">' . $attributes['name'] . '&nbsp;(' . $attributes['aetype'] . ')&nbsp;' . '</td>';
                echo '    <td class="key">' . JText::_('COM_ALLEVENTS_SITE') . '</td>';
                echo '    <td><strong style="color:green">' . JText::_('COM_ALLEVENTS_UPDATED') . '</strong></td>';
                echo '</tr>';
            }
            echo '    </tbody>';
            echo '</table>';
        }

        if (is_object($manifest->plugins) && isset($manifest->plugins->plugin)) {
            echo '<table class="aeinstalltable">';
            echo '    <thead align="left">';
            echo '        <tr>';
            echo '            <th class="title" align="left">' . JText::_('COM_ALLEVENTS_PLUGIN') . '</th>';
            echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_GROUP') . '</th>';
            echo '            <th width="25%">' . JText::_('COM_ALLEVENTS_STATUS') . '</th>';
            echo '        </tr>';
            echo '    </thead>';
            echo '    <tbody>';
            foreach ($manifest->plugins->plugin as $plugin) {
                $attributes = $plugin->attributes();
                $plg = $source . '/' . $attributes['folder'] . '/' . $attributes['plugin'];
                $installer->install($plg);
                echo '<tr class="row' . ($rows++ % 2) . '">';
                echo '    <td class="key">' . $attributes['name'] . '&nbsp;(' . $attributes['aetype'] . ')&nbsp;' . '</td>';
                echo '    <td class="key">' . $attributes['group'] . '</td>';
                echo '    <td><strong style="color:green">' . JText::_('COM_ALLEVENTS_UPDATED') . '</strong></td>';
                echo '</tr>';
            }
            echo '    </tbody>';
            echo '</table>';
        }

        echo '<br />';
        $image_path = $params->get('image_path');
        $folder[0][0] = 'com_allevents/';
        $folder[0][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[0][0];
        $folder[1][0] = 'com_allevents/affiches/';
        $folder[1][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[1][0];
        $folder[2][0] = 'com_allevents/bullets/';
        $folder[2][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[2][0];
        $folder[3][0] = 'com_allevents/files/';
        $folder[3][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[3][0];
        $folder[4][0] = 'com_allevents/vignettes/';
        $folder[4][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[4][0];
        $folder[5][0] = 'com_allevents/uploads/';
        $folder[5][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[5][0];
        $folder[6][0] = 'com_allevents/aeopengraph/';
        $folder[6][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[6][0];
        $folder[7][0] = 'com_allevents/aetwittercard/';
        $folder[7][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[7][0];
        $folder[8][0] = 'com_allevents/bannieres/';
        $folder[8][1] = JPATH_ROOT . '/' . $image_path . '/' . $folder[8][0];
        $message = '<div><i>' . JText::_('COM_ALLEVENTS_FOLDER_CREATION') . '</i></div>';
        $error = [];
        foreach ($folder as $key => $value) {
            if (!JFolder::exists($value[1])) {
                if (JFolder::create($value[1], 0755)) {
                    $data = "<html>\n<body bgcolor=\"#FFFFFF\">\n</body>\n</html>";
                    JFile::write($value[1] . "/index.html", $data);
                    $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/' . $value[0] . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_CREATED') . '</span></b></div>';
                    $error[] = 0;
                } else {
                    $message .= '<div><b><span style="color:#CC0033">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/' . $value[0] . ' <span style="color:#CC0033">' . JText::_('COM_ALLEVENTS_CREATION_FAILED') . '</span></b> ' . JText::_('COM_ALLEVENTS_PLEASE_CREATE_MANUALLY') . '</div>';
                    $error[] = 1;
                }
            } else // Folder exist
            {
                $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/' . $value[0] . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_EXISTS') . '</span></b></div>';
                $error[] = 0;
            }
        }

        $message .= '<br />';
        if (JFolder::exists(JPATH_ROOT . '/media/com_allevents/images/affiches/')) {
            JFolder::copy(JPATH_ROOT . '/media/com_allevents/images/affiches/', JPATH_ROOT . '/' . $image_path . '/com_allevents/affiches/', '', true);
            $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/com_allevents/affiches/' . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_COPIED') . '</span></b></div>';
        }

        if (JFolder::exists(JPATH_ROOT . '/media/com_allevents/images/bullets/')) {
            JFolder::copy(JPATH_ROOT . '/media/com_allevents/images/bullets/', JPATH_ROOT . '/' . $image_path . '/com_allevents/bullets/', '', true);
            $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/com_allevents/bullets/' . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_COPIED') . '</span></b></div>';
        }

        if (JFolder::exists(JPATH_ROOT . '/media/com_allevents/images/vignettes/')) {
            JFolder::copy(JPATH_ROOT . '/media/com_allevents/images/vignettes/', JPATH_ROOT . '/' . $image_path . '/com_allevents/vignettes/', '', true);
            $message .= '<div><b><span style="color:#009933">' . JText::_('COM_ALLEVENTS_FOLDER') . '</span> ' . $image_path . '/com_allevents/vignettes/' . ' <span style="color:#009933">' . JText::_('COM_ALLEVENTS_COPIED') . '</span></b></div>';
        }

        $message .= '<br /><br />';
        echo $message;
    }

    /**
     * com_AllEventsInstallerScript::preflight()
     * method to run before an install/update/uninstall method
     *
     * @param mixed $type
     * @param mixed $parent
     *
     * @return void
     * @throws Exception
     */
    function preflight($type, $parent)
    {
        $jversion = new JVersion();
        // Installing component manifest file version
        $this->release = $parent->get("manifest")->version;
        // Manifest file minimum Joomla version
        $this->minimumJoomlaVersion = $parent->get("manifest")->attributes()->version;
        echo '<table><tr><td><img style="width: 400px;" src="../media/com_allevents/css/images/allevents.png" /></td><td width="10px"></td><td style="font-size: 20px"><b>' . JText::_('COM_ALLEVENTS') . '<span style="font-size: 11px"> v ' . $this->release . ' </span></b><br /><span style="font-size: 16px; color:#555555;">' .
            JText::_('COM_ALLEVENTS_XML_DESC') . '</span><br /><br /><span style="font-size: 13px">&#8226; <b>' . JText::_('COM_ALLEVENTS_FEATURES_LANGUAGES') .
            '</b> English <img src="../media/mod_languages/images/en.gif" height="10px"/> - French <img src="../media/mod_languages/images/fr.gif" height="10px"/> - Spanish <img src="../media/mod_languages/images/es.gif" height="10px"/><br />' . '<br />&#8226; ' . JText::_('COM_ALLEVENTS_FEATURES_BACKEND') . '<br />&#8226; ' .
            JText::_('COM_ALLEVENTS_FEATURES_FRONTEND') . '<br /></span></td></tr></table><br /><br />';
        if ($type == 'install') {
            echo '<span style="text-transform:uppercase; font-size: 14px"><b>' . JText::_('COM_ALLEVENTS_WELCOME_1') . $this->release . '</span>';
            echo '<span style="text-transform:uppercase; font-size: 14px">' . JText::_('COM_ALLEVENTS_WELCOME_2') . '</b></span>';
            echo '<span style="text-transform:uppercase; letter-spacing: 3px; font-size: 14px">' . JText::_('COM_ALLEVENTS_WELCOME_3') . '</span><br /><br />';
            echo '<button class="btn btn-small" onclick="location.href=\'index.php?option=com_config&view=component&component=com_allevents\';">';
            echo '<span class="icon-options"></span>' . JText::_('JTOOLBAR_OPTIONS') . '</button>';
        }
        // Show the essential information at the install/update back-end
        echo '<br /><p style="font-size: 10px">' . JText::_('COM_ALLEVENTS_INSTALL_THIS_RELEASE') . '<b> ' . $this->release . '</b>';
        if ($type == 'update') {
            echo '<br />' . JText::_('COM_ALLEVENTS_INSTALL_CACHE_VERSION') . '<b> ' . $this->getParam('version') . '</b>';
        }

        echo '<br />' . JText::_('COM_ALLEVENTS_INSTALL_MINIMUM_JOOMLA_VERSION') . '<b> ' . $this->minimumJoomlaVersion . '</b>';
        echo '<br />' . JText::_('COM_ALLEVENTS_INSTALL_CURRENT_JOOMLA_VERSION') . '<b> ' . $jversion->getShortVersion() . '</b><br /><br />';
        // abort if the current Joomla release is older
        if (version_compare($jversion->getShortVersion(), $this->minimumJoomlaVersion, 'lt')) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_INSTALL_ERROR_JOOMLA_VERSION') . ' ' . $this->minimumJoomlaVersion, 'warning');
        }
    }

    /**
     * com_AllEventsInstallerScript::getParam()
     *
     * @param mixed $name
     *
     * @return
     */
    function getParam($name)
    {
        $db = JFactory::getDbo();
        $db->setQuery('SELECT manifest_cache FROM `#__extensions` WHERE name = "allevents"');
        $manifest = json_decode($db->loadResult(), true);

        return $manifest[$name];
    }

    /**
     * com_AllEventsInstallerScript::postflight()
     *
     * @param mixed $type
     * @param mixed $parent
     *
     * @throws Exception
     */
    function postflight($type, $parent)
    {
        $params = [];
        // Remove obsolete files and folders
        $this->_removeObsoleteFilesAndFolders();

        // always create or modify these parameters
        // here : nothing
        if ($type == 'install') {
            $params['controlpanel_showactivities'] = 0;
            $params['controlpanel_showagendas'] = 1;
            $params['controlpanel_showcategories'] = 0;
            $params['controlpanel_showcustomfields'] = 0;
            $params['controlpanel_showgcalendars'] = 0;
            $params['controlpanel_showimport'] = 1;
            $params['controlpanel_showpayments'] = 0;
            $params['controlpanel_showplaces'] = 1;
            $params['controlpanel_showpublics'] = 0;
            $params['controlpanel_showressources'] = 0;
            $params['controlpanel_showsections'] = 0;
            $params['controlpanel_showplanifications'] = 0;
            $params['controlpanel_showribbons'] = 0;
            $params['gcustom_css'] = "";
            $params['gaebs_bullet'] = "bullet";
            $params['gcontrol_eventwithenrolments'] = 1;
            $params['gdate_format'] = "Y-m-d";
            $params['gdisplay_colors'] = 0; // agenda par défaut
            $params['gdisplay_colors_back'] = 0; //COM_ALLEVENTS_FORECOLOR par défaut
            $params['gdisplay_colors_fore'] = 1; //COM_ALLEVENTS_FORECOLOR par défaut
            $params['genrol_on'] = 0;
            $params['geventshow_activity'] = 1;
            $params['geventshow_affiche'] = 1;
            $params['geventshow_agenda'] = 1;
            $params['geventshow_author'] = 1;
            $params['geventshow_buttonics'] = 1;
            $params['geventshow_buttongoogleevent'] = 1;
            $params['geventshow_buttonmail'] = 1;
            $params['geventshow_buttonprint'] = 1;
            $params['geventshow_category'] = 1;
            $params['gevent_companions'] = 0;
            $params['geventshow_title'] = 1;
            $params['geventshow_closebutton'] = 1;
            $params['geventshow_comments'] = 1;
            $params['geventshow_description'] = 1;
            $params['geventshow_additional_info'] = 0;
            $params['geventshow_enddate'] = 1;
            $params['geventshow_enrolmentbloc'] = 1;
            $params['geventshow_enrolmentdislay'] = 0;
            $params['geventshow_enrolments'] = 1;
            $params['geventshow_enrolno'] = 1;
            $params['geventshow_enrolperhaps'] = 1;
            $params['geventshow_fullmap'] = 0;
            $params['geventshow_fullmapadress'] = 0;
            $params['geventshow_fullmapgps'] = 0;
            $params['geventshow_map'] = 1;
            $params['controlpanel_showjusers'] = 0;
            $params['controlpanel_showjcontacts'] = 0;
            $params['controlpanel_showcbusers'] = 0;
            $params['geventshow_contactsbloc'] = 1;
            $params['geventshow_juserusername'] = 0;
            $params['geventshow_jusername'] = 1;
            $params['geventshow_jusermail'] = 2;
            $params['geventshow_jcontactusername'] = 0;
            $params['geventshow_jcontactname'] = 1;
            $params['geventshow_jcontactlink'] = 1;
            $params['geventshow_jcontactposition'] = 0;
            $params['geventshow_jcontactmail'] = 2;
            $params['geventshow_jcontactaddress'] = "{address}\n{zipcode} {city} {state} {country}";
            $params['geventshow_jcontactphone'] = 1;
            $params['geventshow_jcontactmobile'] = 1;
            $params['geventshow_jcontactfax'] = 0;
            $params['geventshow_jcontactwebsite'] = 1;
            $params['geventshow_jcontactmisc'] = 0;
            $params['geventshow_cbuserusername'] = 0;
            $params['geventshow_cbusername'] = 1;
            $params['geventshow_cbuserlink'] = 1;
            $params['geventshow_cbuserorganization'] = 0;
            $params['geventshow_cbuserposition'] = 0;
            $params['geventshow_cbuseremail'] = 50;
            $params['geventshow_cbusermaildisp'] = 2;
            $params['geventshow_cbuseraddress'] = "";
            $params['geventshow_cbuserphone'] = 0;
            $params['geventshow_cbusermobile'] = 0;
            $params['geventshow_cbuserfax'] = 0;
            $params['geventshow_cbuserwebsite'] = 0;
            $params['geventshow_cbusermisc'] = 0;
            $params['geventshow_place'] = 1;
            $params['geventshow_public'] = 1;
            $params['geventshow_ribbon'] = 1;
            $params['geventshow_stdribbon'] = 1;
            $params['geventshow_section'] = 1;
            $params['geventshow_summary'] = 1;
            $params['geventshow_vignette'] = 1;
            $params['gfirstday_week'] = 1;
            $params['gmail_adminnew'] = 1;
            $params['gmail_adminupd'] = 1;
            $params['gmail_agendanew'] = 1;
            $params['gmail_agendaupd'] = 1;
            $params['gnewbie'] = 1;
            $params['gmail_by'] = 1;
            $params['gmail_usergroupnew'] = 0;
            $params['gmail_usergroupupd'] = 0;
            $params['gmail_recurse'] = 0;
            $params['gmail_bcc'] = 0;
            $params['gtemplatemain'] = 'default';
            $params['gtemplateadminevents'] = 'default';
            $params['gadmineventslite'] = 0;
            // $params['gmail_authorendenrol'] = 1;
            $params['gmail_authornew'] = 1;
            $params['gmail_authorupd'] = 1;
            $params['gmail_authorvalid'] = 1;
            $params['gmail_authorwait'] = 1;
            $params['gmail_on'] = 1;
            $params['gmultipleenrolmentsallow'] = 1;
            $params['gmultipleenrolmentsmax'] = 10;
            $params['addcurrency'] = 'EUR';
            $params['order_format'] = 'AE-%05d';

            $params['gjquery'] = 1;
            $params['gbootstrap'] = 1;
            $params['guikit'] = 1;
            $params['gshow_eventallday'] = 0;
            $params['gshow_samples'] = 0;
            $params['gtime_format'] = "H:i";
            $params['gtime_step'] = 30;
            $params['gshow_poweredby'] = 1;
            $params['gdisplay_openlinkself'] = '_blank';
            $params['gmail_title'] = '[EVENT_TITLE]';
            $params['gmail_enrolment_no'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_CANCEL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_CANCEL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p></td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_enrolment_ok'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_ENROL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_ENROL_APPROVED_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_enrolment_pending'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_ENROL_PENDING_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_ENROL_PENDING_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_enrolment_perhaps'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_UNCERTAIN_ENROL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_UNCERTAIN_ENROL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul></td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_enrolment_waiting'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_WAITING_ENROL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_WAITING_ENROL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_enrolment_yes'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_ENROL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_ENROL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[PARTICIPANT] : <span style="font-weight:bold;">[ENROL_USERNAME] ([ENROL_USERALIAS])</span></li><li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p><div class="qrcode"></div></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_event_updated'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"> <td> <p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"> <td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_PROPOSAL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_PROPOSAL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/> </p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/> </p></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a> </p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_proposition'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"> <td> <p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"> <td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_PROPOSAL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_PROPOSAL_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/> </p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/> </p></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a> </p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_proposition_approved'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_PROPOSAL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_PROPOSAL_APPROVED_TEXT]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
            $params['gmail_proposition_hasbeenapproved'] =
                '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg1"> <tr> <td align="center"> <table width="600" border="0" cellspacing="0" cellpadding="0" class="bg2"> <tr class="header"><td><p class="sitetitle">[SITE_NAME]</p></td></tr><tr class="spacer"><td></td></tr><tr> <td valign="top" class="body"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="370" valign="top" class="mainbar" align="left"> <h2>[COM_ALLEVENTS_MAIL_PROPOSAL_TITLE]</h2> <p>[COM_ALLEVENTS_MAIL_PROPOSAL_HASBEENAPPROVED]</p><p class="more"><a href="[EVENT_LINK]">[EVENT_TITLE]</a> <img alt="" src="images/external_link.png"/></p><h2>[COM_ALLEVENTS_ADDITIONAL_INFO]</h2> <ul> <li>[DATE] : [EVENT_DATE]</li><li>[ENDDATE] : [EVENT_ENDDATE]</li><li>[AGENDA] : [EVENT_AGENDA]</li><li>[PUBLIC] : [EVENT_PUBLIC]</li><li>[ACTIVITY] : [EVENT_ACTIVITY]</li><li>[PLACE] : [EVENT_PLACE]</li></ul> </td><td width="20"></td><td valign="top" width="170" class="sidebar" align="left"> <h3>[COM_ALLEVENTS_MAIL_TALK_ABOUT]</h3> <p>[COM_ALLEVENTS_MAIL_TALK_ABOUT_TEXT]</p><h3>[COM_ALLEVENTS_MAIL_STAY_INFORMED]</h3> <p>[COM_ALLEVENTS_MAIL_STAY_INFORMED_CHECKING] <img alt="" src="images/external_link.png"/></p></td></tr></table> </td></tr><tr> <td valign="middle" align="left" class="footer" height="61"> <p><a href="mailto:[SITE_WEBMASTER]?subject=[EVENT_TITLE]">[COM_ALLEVENTS_MAIL_CONTACT_US]</a></p><div style="font-size:xx-small;">[POWERED_BY]</div></td></tr></table> </td></tr></table>';
        }

        $this->setParams($params);

        $db = JFactory::getDbo();

        try {
            $db->setQuery("CREATE TABLE `#__allevents_gcalendar` (
                            `id` INT(11) NOT NULL AUTO_INCREMENT,
                            `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
                            `ordering` INT(11) NOT NULL DEFAULT '0',
                            `titre` VARCHAR(200) DEFAULT NULL,
                            `id_gcalendar` VARCHAR(200) DEFAULT NULL,
                            `couleur` CHAR(7) DEFAULT NULL,
                            `couleur_texte` CHAR(7) DEFAULT NULL,
                            `classe` CHAR(50) DEFAULT NULL,
                            `published` TINYINT(1) NOT NULL DEFAULT '1',
                            `access` TINYINT(1) NOT NULL DEFAULT '0',
                            `deleted` TINYINT(1) DEFAULT '0',
                            `created_date` DATE NOT NULL,
                            `proposed_by` INT(11) UNSIGNED DEFAULT NULL,
                            `lastmod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                            `lastmod_by` INT(11) UNSIGNED DEFAULT NULL,
                            `version` INT(11) UNSIGNED NOT NULL DEFAULT '0',
                            `checked_out` INT(11) NOT NULL,
                            `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                            `created_by` INT(11) NOT NULL,
                            PRIMARY KEY (`id`),
                            KEY `ndx_access` (`access`),
                            KEY `ndx_deleted` (`deleted`),
                            KEY `ndx_published` (`published`)
                          ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_gcalendar : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {

        }

        try {
            $db->setQuery("CREATE TABLE `#__allevents_calendar` (
                            dt DATE NOT NULL PRIMARY KEY,
                            y SMALLINT NULL,
                            q TINYINT NULL,
                            m TINYINT NULL,
                            d TINYINT NULL,
                            dw TINYINT NULL,
                            monthName VARCHAR(9) NULL,
                            dayName VARCHAR(9) NULL,
                            w TINYINT NULL,
                            isWeekday BINARY(1) NULL
                        );");
            $db->execute();
            echo '<div>#__allevents_calendar : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {

        }

        try {
            $db->setQuery("CREATE TABLE `#__allevents_series` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `event_id` INT(11)  NOT NULL ,
                            `startdate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                            `enddate` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
                            `repeatinstances` INT(1)  NOT NULL DEFAULT 300,
                            `periodtype` TINYINT(4)  NOT NULL ,
                            `frequency` INT(11)  NOT NULL DEFAULT 1,
                            `mo` TINYINT(1)   NULL ,
                            `tu` TINYINT(1)   NULL ,
                            `we` TINYINT(1)   NULL ,
                            `th` TINYINT(1)   NULL ,
                            `fr` TINYINT(1)   NULL ,
                            `sa` TINYINT(1)   NULL ,
                            `su` TINYINT(1)   NULL ,
                            `day` TINYINT(4)   NULL ,
                            `month` TINYINT(4)   NULL ,
                            `countsense` TINYINT(1)   NULL ,
                            `weekdayofmonth` TINYINT(2)   NULL ,
                            PRIMARY KEY (`id`),
                            KEY `fky_event` (`event_id`)
                          ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_series : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {

        }

        //version 3.3
        try {
            $db->setQuery("CREATE TABLE `#__allevents_customfields` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `ordering` INT(11) NOT NULL,
                            `published` TINYINT(1) NOT NULL DEFAULT '1',
                            `checked_out` INT(11) NOT NULL,
                            `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                            `titre` VARCHAR(255) NOT NULL,
                            `alias` VARCHAR(255) NOT NULL,
                            `slug` VARCHAR(255) NOT NULL,
                            `description` MEDIUMTEXT NOT NULL,
                            `parent_form` INT(11) NOT NULL DEFAULT '0',
                            `type` VARCHAR(255) NOT NULL,
                            `options` MEDIUMTEXT NULL,
                            `default` VARCHAR(255) NOT NULL,
                            `required` TINYINT(3) NOT NULL DEFAULT '0',
                            `language` VARCHAR(10) NOT NULL DEFAULT '*',
                            `params` MEDIUMTEXT NULL,
                            `created_date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                            `created_by` INT(10) UNSIGNED NOT NULL DEFAULT '0',
                            `lastmod` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                            `lastmod_by` INT(10) UNSIGNED NOT NULL DEFAULT '0',
                            PRIMARY KEY (`id`)
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_customfields : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        //version 3.3
        try {
            $db->setQuery("CREATE TABLE `#__allevents_customfields_data` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `published` TINYINT(1) NOT NULL DEFAULT '1',
                            `slug` VARCHAR(255) NOT NULL,
                            `parent_form` INT(11) NOT NULL DEFAULT '0',
                            `parent_id` INT(11) NOT NULL DEFAULT '0',
                            `value` VARCHAR(255) NOT NULL,
                            `language` VARCHAR(10) NOT NULL DEFAULT '*',
                            PRIMARY KEY (`id`)
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_customfields_data : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        //version 3.3.4.16
        try {
            $db->setQuery("CREATE TABLE IF NOT EXISTS `#__allevents_orders` (
                            `id` INT(11) NOT NULL AUTO_INCREMENT,
                            `prefix` VARCHAR(23) NOT NULL,
                            `user_info_id` INT(11) DEFAULT NULL,
                            `name` VARCHAR(255) DEFAULT NULL,
                            `email` VARCHAR(100) DEFAULT NULL,
                            `cdate` DATETIME DEFAULT NULL,
                            `mdate` DATETIME DEFAULT NULL,
                            `transaction_id` VARCHAR(100) DEFAULT NULL,
                            `payee_id` VARCHAR(100) DEFAULT NULL,
                            `original_amount` FLOAT(10,2) NOT NULL,
                            `amount` FLOAT(10,2) NOT NULL,
                            `coupon_code` VARCHAR(100) NOT NULL,
                            `order_tax` FLOAT(10,2) DEFAULT NULL,
                            `order_tax_details` TEXT NOT NULL,
                            `order_shipping` FLOAT(10,2) DEFAULT NULL,
                            `order_shipping_details` TEXT,
                            `fee` FLOAT(10,2) DEFAULT NULL,
                            `customer_note` TEXT,
                            `status` VARCHAR(100) DEFAULT NULL,
                            `processor` VARCHAR(100) DEFAULT NULL,
                            `ip_address` VARCHAR(50) DEFAULT NULL,
                            `ticketscount` INT(11) NOT NULL,
                            `currency` VARCHAR(16) NOT NULL,
                            `checked_out` INT(11) NOT NULL,
                            `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                            `created_by` INT(11) NOT NULL,
                            `extra` TEXT,
                            PRIMARY KEY (`id`)
                        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Store Information' AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_orders : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        //version 3.3.7
        try {
            $db->setQuery("CREATE TABLE `#__allevents_tickettypes` (
                            `id` INT(10) NOT NULL AUTO_INCREMENT,
                            `titre` VARCHAR(500) NOT NULL,
                            `description` VARCHAR(500) NOT NULL,
                            `price` FLOAT(10,2) NOT NULL,
                            `deposit_fee` FLOAT(10,2) NOT NULL,
                            `available` INT(10) NOT NULL,
                            `count` INT(10) NOT NULL,
                            `unlimited_seats` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1=unlimited 0=limited',
                            `event_id` INT(10) NOT NULL,
                            `max_limit_ticket` INT(11) NOT NULL,
                            `access` TINYINT(4) NULL DEFAULT NULL,
                            `published` TINYINT(1) NOT NULL DEFAULT '1',
                            PRIMARY KEY (`id`)
                        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Store Information' AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_tickettypes : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        try {
            $db->setQuery("CREATE TABLE `#__allevents_queue` (
                            `id` INT(11) NOT NULL AUTO_INCREMENT,
                            `order_id` INT(11) NOT NULL COMMENT 'id of #__allevents_order table',
                            `subject` TEXT NOT NULL,
                            `content` TEXT NOT NULL,
                            `reminder_type_id` INT(11) NOT NULL,
                            `reminder_type` VARCHAR(500) NOT NULL,
                            `date_to_sent` DATETIME NOT NULL,
                            `email` TEXT NOT NULL,
                            `mobile_no` BIGINT(20) NOT NULL,
                            `sent` INT(11) NOT NULL DEFAULT '0' COMMENT '0=not sent 1=sent 2=expired 3=delayed so it can be sent when cron runs later',
                            `sent_date` DATETIME NOT NULL,
                            `user_id` INT(11) NOT NULL,
                            `event_id` INT(11) NOT NULL,
                            PRIMARY KEY (`id`),
                            UNIQUE INDEX `id` (`id`)
                        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Store Information' AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_queue : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        try {
            $db->setQuery("CREATE TABLE `#__allevents_reminder_types` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
                            `ordering` INT(11) NOT NULL,
                            `state` TINYINT(1) NOT NULL,
                            `checked_out` INT(11) NOT NULL,
                            `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                            `created_by` INT(11) NOT NULL,
                            `title` VARCHAR(500) NOT NULL,
                            `description` TEXT NOT NULL,
                            `days` INT(11) NOT NULL,
                            `hours` INT(11) NOT NULL,
                            `minute` INT(11) NOT NULL,
                            `subject` VARCHAR(600) NOT NULL,
                            `sms` VARCHAR(255) NOT NULL,
                            `email` VARCHAR(255) NOT NULL,
                            `css` TEXT NOT NULL,
                            `email_template` TEXT NOT NULL,
                            `sms_template` TEXT NOT NULL,
                            `event_id` INT(11) NOT NULL,
                            `replytoemail` VARCHAR(255) NOT NULL,
                            `reminder_params` TEXT NOT NULL,
                            PRIMARY KEY (`id`)
                        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Store Information' AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_reminder_types : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }
        try {
            $db->setQuery("CREATE TABLE `#__allevents_form` (
                             `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                             `titre` VARCHAR(255)  NOT NULL ,
                             `alias` VARCHAR(255) COLLATE utf8_bin NOT NULL ,
                             `description` TEXT NOT NULL ,
                             `template` VARCHAR(255)  NOT NULL ,
                             `ordering` INT(11)  NOT NULL ,
                             `state` TINYINT(1)  NOT NULL ,
                             `checked_out` INT(11)  NOT NULL ,
                             `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                             `created_by` INT(11)  NOT NULL ,
                             `created_date` DATETIME NOT NULL ,
                             `modified_by` INT(11)  NOT NULL ,
                             `modified_date` DATETIME NOT NULL ,
                             `access` INT(11)  NOT NULL ,
                             PRIMARY KEY (`id`)
                             ) DEFAULT COLLATE=utf8mb4_unicode_ci;");
            $db->execute();
            echo '<div>#__allevents_form : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }
        try {
            $db->setQuery("CREATE TABLE `#__allevents_formfieldset` (
                              `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                              `titre` VARCHAR(255)  NOT NULL ,
                              `alias` VARCHAR(255) COLLATE utf8_bin NOT NULL ,
                              `description` TEXT NOT NULL ,
                              `css_class` VARCHAR(255)  NOT NULL ,
                              `ordering` INT(11)  NOT NULL ,
                              `state` TINYINT(1)  NOT NULL ,
                              `checked_out` INT(11)  NOT NULL ,
                              `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                              `created_by` INT(11)  NOT NULL ,
                              `created_date` DATETIME NOT NULL ,
                              `modified_by` INT(11)  NOT NULL ,
                              `modified_date` DATETIME NOT NULL ,
                              `access` INT(11)  NOT NULL ,
                              `form_id` INT(11) UNSIGNED,
                              PRIMARY KEY (`id`)
                              ) DEFAULT COLLATE=utf8mb4_unicode_ci;");
            $db->execute();
            echo '<div>#__allevents_formfieldset : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        try {
            $db->setQuery("CREATE TABLE `#__allevents_formfield` (
                              `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                              `titre` VARCHAR(255)  NOT NULL ,
                              `alias` VARCHAR(255) COLLATE utf8_bin NOT NULL ,
                              `description` TEXT NOT NULL ,
                              `css_class` VARCHAR(255)  NOT NULL ,
                              `ordering` INT(11)  NOT NULL ,
                              `state` TINYINT(1)  NOT NULL ,
                              `checked_out` INT(11)  NOT NULL ,
                              `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                              `created_by` INT(11)  NOT NULL ,
                              `created_date` DATETIME NOT NULL ,
                              `modified_by` INT(11)  NOT NULL ,
                              `modified_date` DATETIME NOT NULL ,
                              `access` INT(11)  NOT NULL ,
                              `form_id` INT(11)  NOT NULL ,
                              `formfieldset_id` INT(11)  NOT NULL ,
                              `label` VARCHAR(255)  NOT NULL ,
                              `required` BOOLEAN NOT NULL ,
                              `placeholder` VARCHAR(255)  NOT NULL ,
                              `readonly` BOOLEAN NOT NULL ,
                              `params` TEXT NULL,
                              `typefield` TEXT NULL,
                              PRIMARY KEY (`id`)
                              ) DEFAULT COLLATE=utf8mb4_unicode_ci;");
            $db->execute();
            echo '<div>#__allevents_formfield : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        try {
            $db->setQuery("DROP TABLE `#__allevents_paypals` ;");
            $db->execute();
            echo '<div>drop #__allevents_paypals : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        //version 3.4.1
        try {
            $db->setQuery("CREATE TABLE `#__allevents_ribbon` (
                             `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                             `titre` VARCHAR(200)  NOT NULL ,
                             `description` VARCHAR(1000),
                             `couleur` VARCHAR(20)  NOT NULL ,
                             `adminlock` TINYINT(1)  NOT NULL ,
                             `ordering` INT(11)  NOT NULL ,
                             `published` TINYINT(1)  NOT NULL ,
                             `checked_out` INT(11)  NOT NULL ,
                             `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
                             `created_by` INT(11)  NOT NULL ,
                             `lastmod_by` INT(11)  NOT NULL ,
                             `language` VARCHAR(10) NOT NULL DEFAULT '*',
                             PRIMARY KEY (`id`)
                          ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
            $db->execute();
            echo '<div>#__allevents_ribbon : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
        } catch (Exception $e) {
        }

        //$sqlorder = new array();
        $sqlorder[] = ["ALTER TABLE `#__allevents_activities` ADD COLUMN `checked_out`INT(11) NOT NULL", "activities.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_activities` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "activities.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_activities` ADD COLUMN `created_by` INT(11) NOT NULL", "activities.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `asset_id` INT(10) UNSIGNED NULL DEFAULT 0", "agenda.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `checked_out`INT(11) NULL DEFAULT NULL", "agenda.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `checked_out_time`DATETIME NULL DEFAULT '0000-00-00 00:00:00'", "agenda.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `created_by` INT(11) NULL DEFAULT NULL", "agenda.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_albums` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "albums.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_albums` ADD COLUMN `checked_out`INT(11) NOT NULL", "albums.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_albums` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "albums.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_albums` ADD COLUMN `created_by` INT(11) NOT NULL", "albums.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_categories` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "categories.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_categories` ADD COLUMN `checked_out`INT(11) NOT NULL", "categories.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_categories` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "categories.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_categories` ADD COLUMN `created_by` INT(11) NOT NULL", "categories.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_countries`ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "countries.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_countries`ADD COLUMN `checked_out`INT(11) NOT NULL", "countries.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_countries`ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "countries.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_countries`ADD COLUMN `created_by` INT(11) NOT NULL", "countries.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "enrolments.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` ADD COLUMN `checked_out`INT(11) NOT NULL", "enrolments.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "enrolments.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` ADD COLUMN `created_by` INT(11) NOT NULL", "enrolments.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "events.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `checked_out`INT(11) NOT NULL", "events.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "events.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `created_by` INT(11) NOT NULL", "events.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_forms` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "forms.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_forms` ADD COLUMN `checked_out`INT(11) NOT NULL", "forms.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_forms` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "forms.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_forms` ADD COLUMN `created_by` INT(11) NOT NULL", "forms.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfields` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "formsfields.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfields` ADD COLUMN `checked_out`INT(11) NOT NULL", "formsfields.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfields` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "formsfields.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfields` ADD COLUMN `created_by` INT(11) NOT NULL", "formsfields.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfieldstype` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "formsfieldstype.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfieldstype` ADD COLUMN `checked_out`INT(11) NOT NULL", "formsfieldstype.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfieldstype` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "formsfieldstype.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfieldstype` ADD COLUMN `created_by` INT(11) NOT NULL", "formsfieldstype.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_groups` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "groups.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_groups` ADD COLUMN `checked_out`INT(11) NOT NULL", "groups.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_groups` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "groups.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_groups` ADD COLUMN `created_by` INT(11) NOT NULL", "groups.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_links`ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "links.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_links`ADD COLUMN `checked_out`INT(11) NOT NULL", "links.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_links`ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "links.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_links`ADD COLUMN `created_by` INT(11) NOT NULL", "links.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_pictures` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "pictures.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_pictures` ADD COLUMN `checked_out`INT(11) NOT NULL", "pictures.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_pictures` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "pictures.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_pictures` ADD COLUMN `created_by` INT(11) NOT NULL", "pictures.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "places.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ADD COLUMN `checked_out`INT(11) NOT NULL", "places.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "places.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ADD COLUMN `created_by` INT(11) NOT NULL", "places.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_public` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "public.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_public` ADD COLUMN `checked_out`INT(11) NOT NULL", "public.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_public` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "public.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_public` ADD COLUMN `created_by` INT(11) NOT NULL", "public.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "ressources.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` ADD COLUMN `checked_out`INT(11) NOT NULL", "ressources.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "ressources.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` ADD COLUMN `created_by` INT(11) NOT NULL", "ressources.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_sections` ADD COLUMN `asset_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "sections.asset_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_sections` ADD COLUMN `checked_out`INT(11) NOT NULL", "sections.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_sections` ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "sections.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_sections` ADD COLUMN `created_by` INT(11) NOT NULL", "sections.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_users`ADD COLUMN `checked_out`INT(11) NOT NULL", "users.checked_out", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_users`ADD COLUMN `checked_out_time`DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'", "users.checked_out_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_users`ADD COLUMN `created_by` INT(11) NOT NULL", "users.created_by", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `allday` TINYINT(1) DEFAULT 0", "events.allday", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `fichier_annexe` VARCHAR(100) DEFAULT NULL", "events.fichier_annexe", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ADD COLUMN `contact` VARCHAR(100) DEFAULT NULL ;", "places.contact", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_gcalendar` ADD COLUMN `caltype` VARCHAR(4) DEFAULT 'GCAL' ;", "gcalendar.caltype", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` ADD COLUMN `vignette` VARCHAR(100) DEFAULT NULL", "ressources.vignette", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `default` TINYINT(1) NOT NULL DEFAULT '0'", "agenda.default", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ADD COLUMN `address` VARCHAR(600)    DEFAULT NULL", "places.address", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ADD COLUMN `front` TINYINT(1) NOT NULL DEFAULT '0'", "places.front", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_gcalendar` ADD COLUMN `alias` VARCHAR(100) DEFAULT NULL", "gcalendar.alias", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_gcalendar` ADD COLUMN `default` TINYINT(1) NOT NULL DEFAULT '0'", "gcalendar.default", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_activities` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "activities.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "agenda.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_albums` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "albums.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_categories` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "categories.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_countries` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "countries.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "enrolments.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "events.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_forms` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "forms.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfields` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "formsfields.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfieldstype` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "formsfieldstype.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_gcalendar` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "gcalendar.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_groups` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "groups.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_links` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "links.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_pictures` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "pictures.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "places.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_public` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "public.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "ressources.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_sections` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "sections.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_users` CHANGE `lastmod` `lastmod` DATETIME NULL DEFAULT NULL", "users.lastmod", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_libre` MEDIUMTEXT DEFAULT NULL", "events.contact_libre", false];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET published=-2 WHERE deleted=1", "events.deleted", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET access=1 WHERE access=0", "events.access", true];
        $sqlorder[] = ["UPDATE `#__allevents_activities` SET access=1 WHERE access=0", "activities.access", true];
        $sqlorder[] = ["UPDATE `#__allevents_agenda` SET access=1 WHERE access=0", "agenda.access", true];
        $sqlorder[] = ["UPDATE `#__allevents_categories` SET access=1 WHERE access=0", "categories.access", true];
        $sqlorder[] = ["UPDATE `#__allevents_places` SET access=1 WHERE access=0", "places.access", true];
        $sqlorder[] = ["UPDATE `#__allevents_public` SET access=1 WHERE access=0", "public.access", true];
        $sqlorder[] = ["UPDATE `#__allevents_ressources` SET access=1 WHERE access=0", "ressources.access", true];
        $sqlorder[] = ["UPDATE `#__allevents_sections` SET access=1 WHERE access=0", "sections.access", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` CHANGE `checked_out` `checked_out` INT(11) NOT NULL", "agenda.checked_out", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ADD COLUMN `country` VARCHAR(100) DEFAULT NULL", "places.country", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "events.language", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `serie_id` INT(10) NOT NULL DEFAULT 0", "events.serie_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `occurrence_number` INT(3) NOT NULL DEFAULT 0", "events.occurrence_number", false];
        //version 3.2.24
        $sqlorder[] = ["DELETE a FROM `#__allevents_enrolments` a INNER JOIN (SELECT event_id, user_id,published, min(id) id FROM `#__allevents_enrolments` GROUP BY event_id, user_id,published HAVING count(*) >1) b ON a.event_id=b.event_id AND a.user_id=b.user_id AND a.published=b.published AND a.id != b.id", "enrolments.unique clean", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` ADD CONSTRAINT unique_enrol UNIQUE (user_id, event_id, published)", "enrolments.unique index", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_series` ALTER `periodtype` DROP DEFAULT", "series.periodtype (default)", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_series` CHANGE COLUMN `startdate` `startdate` DATETIME NULL DEFAULT '0000-00-00 00:00:00'", "series.startdate", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_series` CHANGE COLUMN `periodtype` `periodtype` TINYINT(4) NULL", "series.periodtype", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_series` ADD COLUMN `rrule` VARCHAR(255) NULL DEFAULT NULL", "series.rrule", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_series` CHANGE COLUMN `periodtype` `periodtype` VARCHAR(10) NULL DEFAULT NULL", "series.periodtype", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_series` DROP COLUMN `mo`,DROP COLUMN `tu`,DROP COLUMN `we`,DROP COLUMN `th`,DROP COLUMN `fr`,DROP COLUMN `sa`,DROP COLUMN `su`,DROP COLUMN `day`,DROP COLUMN `month`,DROP COLUMN `countsense`,DROP COLUMN `weekdayofmonth`", "series clean", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_series` CHANGE COLUMN `enddate` `until` DATETIME NULL DEFAULT '0000-00-00 00:00:00', CHANGE COLUMN `repeatinstances` `count` INT(1) NOT NULL DEFAULT '300' , CHANGE COLUMN `periodtype` `freq` VARCHAR(10) NULL DEFAULT NULL , CHANGE COLUMN `frequency` `interval` INT(11) NOT NULL DEFAULT '1'", "series rename", false];
        //version 3.2.25
        $sqlorder[] = ["DELETE FROM `#__allevents_events` WHERE titre IS NULL OR date IS NULL", "events clean nulls", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ALTER `titre` DROP DEFAULT, ALTER `date` DROP DEFAULT", "events.titre not null", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` CHANGE COLUMN `titre` `titre` VARCHAR(200) NOT NULL , CHANGE COLUMN `date` `date` DATETIME NOT NULL",
            "events.titre not default", true];
        //version 3.3.1
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `catid` INT(10) NOT NULL DEFAULT 0", "events.catid", false];
        //version 3.3.3
        $sqlorder[] = ["ALTER TABLE  `#__allevents_activities` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "activities.language", false];
        $sqlorder[] = ["ALTER TABLE  `#__allevents_agenda` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "agenda.language", false];
        $sqlorder[] = ["ALTER TABLE  `#__allevents_categories` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "categories.language", false];
        $sqlorder[] = ["ALTER TABLE  `#__allevents_places` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "places.language", false];
        $sqlorder[] = ["ALTER TABLE  `#__allevents_public` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "public.language", false];
        $sqlorder[] = ["ALTER TABLE  `#__allevents_ressources` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "ressources.language", false];
        $sqlorder[] = ["ALTER TABLE  `#__allevents_sections` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "sections.language", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_gcalendar` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "gcalendar.language", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_customfields` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "customfields.language", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` ADD COLUMN `companions` INT(10) UNSIGNED NOT NULL DEFAULT 0", "enrolments.companions", false];
        //version 3.3.4.2
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_details_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "events.contact_details", false];
        //version 3.3.4.6
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `public_export` TINYINT(1) NOT NULL DEFAULT 1", "agenda.public_export", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `defaultstate` TINYINT(1) NOT NULL DEFAULT 1", "agenda.defaultstate", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `weight` TINYINT(1) NOT NULL DEFAULT 1", "events.weight", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `content_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "events.content_id", false];
        //version 3.3.4.8
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `attribs` VARCHAR(5120)", "events.attribs", false];
        //version 3.3.5.1
        $sqlorder[] = ["ALTER TABLE `#__allevents_activities` ADD COLUMN `note` VARCHAR(255)", "activities.note", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `note` VARCHAR(255)", "agenda.note", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_categories` ADD COLUMN `note` VARCHAR(255)", "categories.note", false];
        $sqlorder[] = ["ALTER TABLE  `#__allevents_places` ADD COLUMN `note` VARCHAR(255)", "places.note", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_public` ADD COLUMN `note` VARCHAR(255)", "public.note", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` ADD COLUMN `note` VARCHAR(255)", "ressources.note", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_sections` ADD COLUMN `note` VARCHAR(255)", "sections.note", false];
        //version 3.3.6
        $sqlorder[] = ["UPDATE `#__allevents_events` SET published=2 WHERE published=-1", "events.archive", true];
        //version 3.3.7
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `price` FLOAT(10,2) NOT NULL", "events.price", false];
        //version 3.4
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` CHANGE COLUMN `contact_libre` `contact_libre` MEDIUMTEXT", "events.contacts", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_libre_access` TINYINT(1) DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_1_type` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_1_label` VARCHAR(40) NOT NULL DEFAULT ''", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` CHANGE COLUMN `contact_id` `contact_1_id` INT(11) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` CHANGE COLUMN `contact_details_id` `contact_1_details_id` INT(11) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_1_comprofiler_id` INT NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_1_access` TINYINT(1) DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_2_type` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_2_label` VARCHAR(40) NOT NULL DEFAULT ''", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_2_id` INT(11) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_2_details_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_2_comprofiler_id` INT NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_2_access` TINYINT(1) DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_3_type` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_3_label` VARCHAR(40) NOT NULL DEFAULT ''", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_3_id` INT(11) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_3_details_id` INT(10) UNSIGNED NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_3_comprofiler_id` INT NOT NULL DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `contact_3_access` TINYINT(1) DEFAULT 0", "events.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `params` TEXT NOT NULL", "events.contacts", false];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `contact_1_type`=1, `contact_1_label`='Organisateur' WHERE `contact_1_type`=0 AND `contact_1_id`<>0", "events.contacts", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `contact_1_type`=2,`contact_1_label`='Organisateur' WHERE `contact_1_type`=0 AND `contact_1_details_id`<>0", "events.contacts", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `contact_1_access`=`access` WHERE `contact_1_type`=1 AND `contact_1_access`=0", "events.contacts", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` AS e INNER JOIN `#__contact_details` AS c ON e.`contact_1_details_id`=c.`id` SET e.`contact_1_access`=c.`access` WHERE e.`contact_1_type`=2 AND e.`contact_1_access`=0", "events.contacts", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `contact_libre_access`=`access` WHERE `contact_libre_access`=0", "events.contacts", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_libre_default_access` TINYINT(1) DEFAULT 0", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_1_default_type` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_1_default_label` VARCHAR(40) NOT NULL DEFAULT ''", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_1_default_access` TINYINT(1) DEFAULT 0", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_2_default_type` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_2_default_label` VARCHAR(40) NOT NULL DEFAULT ''", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_2_default_access` TINYINT(1) DEFAULT 0", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_3_default_type` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_3_default_label` VARCHAR(40) NOT NULL DEFAULT ''", "agendas.contacts", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `contact_3_default_access` TINYINT(1) DEFAULT 0", "agendas.contacts", false];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `agenda_id`=0 WHERE `agenda_id` IS NULL", "events.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `activity_id`=0 WHERE `activity_id` IS NULL", "events.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `public_id`=0 WHERE `public_id` IS NULL", "events.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `place_id`=0 WHERE `place_id` IS NULL", "events.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `ressource_id`=0 WHERE `ressource_id` IS NULL", "events.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `section_id`=0 WHERE `section_id` IS NULL", "events.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_events` SET `category_id`=0 WHERE `category_id` IS NULL", "events.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ALTER COLUMN `agenda_id` SET DEFAULT 0", "events.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ALTER COLUMN `activity_id` SET DEFAULT 0", "events.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ALTER COLUMN `public_id` SET DEFAULT 0", "events.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ALTER COLUMN `place_id` SET DEFAULT 0", "events.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ALTER COLUMN `ressource_id` SET DEFAULT 0", "events.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ALTER COLUMN `section_id` SET DEFAULT 0", "events.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ALTER COLUMN `category_id` SET DEFAULT 0", "events.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_activities` SET `agenda_id`=0 WHERE `agenda_id` IS NULL", "activities.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_activities` ALTER COLUMN `agenda_id` SET DEFAULT 0", "activities.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_public` SET `agenda_id`=0 WHERE `agenda_id` IS NULL", "public.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_public` ALTER COLUMN `agenda_id` SET DEFAULT 0", "public.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_places` SET `agenda_id`=0 WHERE `agenda_id` IS NULL", "places.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` ALTER COLUMN `agenda_id` SET DEFAULT 0", "places.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_ressources` SET `agenda_id`=0 WHERE `agenda_id` IS NULL", "ressources.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` ALTER COLUMN `agenda_id` SET DEFAULT 0", "ressources.ids", true];
        $sqlorder[] = ["UPDATE `#__allevents_categories` SET `section_id`=0 WHERE `section_id` IS NULL", "categories.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_categories` ALTER COLUMN `section_id` SET DEFAULT 0", "categories.ids", true];
        $sqlorder[] = ["ALTER TABLE `#__allevents_form` ADD COLUMN `language` VARCHAR(10) NOT NULL DEFAULT '*'", "forms.language", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_form` ADD COLUMN `note` VARCHAR(255)", "forms.note", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `date_format` VARCHAR(10)", "events.date_format", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `time_format` VARCHAR(10)", "events.time_format", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `ribbon` VARCHAR(40)", "events.ribbon", false];
        // 3.4 RC2
        $sqlorder[] = ["ALTER TABLE `#__allevents_orders` ADD COLUMN `event_id` INT(11)", "orders.event_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_orders` ADD COLUMN `enrol_id` INT(11)", "orders.enrol_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` ADD COLUMN `order_id` INT(11)", "enrolments.order_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `conveyance` VARCHAR(255)", "events.conveyance", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `location` VARCHAR(255)", "events.location", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `gathering_place_id` INT(11)", "events.gathering_place_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `organizer_contact_id` INT(11)", "events.organizer_contact_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `producer_contact_id` INT(11)", "events.producer_contact_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `soundman_contact_id` INT(11)", "events.soundman_contact_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `steward_contact_id` INT(11)", "events.steward_contact_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `speaker_contact_id` INT(11)", "events.speaker_contact_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `photographer_contact_id` INT(11)", "events.photographer_contact_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `technicians_going_time` TIME", "events.technicians_going_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `technicians_arrival_time` TIME", "events.technicians_arrival_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `technicians_return_time` TIME", "events.technicians_return_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `musicians_going_time` TIME", "events.musicians_going_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `musicians_arrival_time` TIME", "events.musicians_arrival_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `musicians_return_time` TIME", "events.musicians_return_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `stage_available_time` TIME", "events.stage_available_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `install_time` TIME", "events.install_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `sound_balance_time` TIME", "events.sound_balance_time", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `service_price` DOUBLE", "events.service_price", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `travel_expenses` DOUBLE", "events.travel_expenses", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `service_cachet` DOUBLE", "events.service_cachet", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `service_profit` DOUBLE", "events.service_profit", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `artetvie` TINYINT(1)", "events.artetvie", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `launch_expenses` DOUBLE", "events.launch_expenses", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `accommodation_expenses` DOUBLE", "events.accommodation_expenses", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `representative_contact_id` INT(11)", "events.representative_contact_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `planification_description` MEDIUMTEXT", "events.planification_description", false];
        // version 3.4.1
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `ribbon_id` INT(11) DEFAULT 0", "events.ribbon_id", false];
        $sqlorder[] = ["INSERT INTO `#__allevents_ribbon` (`id`, `titre`, `description`, `couleur`, `adminlock`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created_by`, `lastmod_by`, `language`) VALUES (3, 'COM_ALLEVENTS_CANCELLED', 'COM_ALLEVENTS_CANCELLED_DESC', 'red', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, '*')", "events.ribbon.cancelled", false];
        $sqlorder[] = ["INSERT INTO `#__allevents_ribbon` (`id`, `titre`, `description`, `couleur`, `adminlock`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created_by`, `lastmod_by`, `language`) VALUES (2, 'COM_ALLEVENTS_COMPLETE', 'COM_ALLEVENTS_COMPLETE_DESC', 'red', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, '*')", "events.ribbon.complete", false];
        $sqlorder[] = ["INSERT INTO `#__allevents_ribbon` (`id`, `titre`, `description`, `couleur`, `adminlock`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created_by`, `lastmod_by`, `language`) VALUES (8, 'COM_ALLEVENTS_GOLD', 'COM_ALLEVENTS_GOLD_DESC', 'gold', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, '*')", "events.ribbon.gold", false];
        $sqlorder[] = ["INSERT INTO `#__allevents_ribbon` (`id`, `titre`, `description`, `couleur`, `adminlock`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created_by`, `lastmod_by`, `language`) VALUES (7, 'COM_ALLEVENTS_LASTDAYS', 'COM_ALLEVENTS_LASTDAYS_DESC', 'orange', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, '*')", "events.ribbon.lastdays", false];
        $sqlorder[] = ["INSERT INTO `#__allevents_ribbon` (`id`, `titre`, `description`, `couleur`, `adminlock`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created_by`, `lastmod_by`, `language`) VALUES (5, 'COM_ALLEVENTS_LASTPLACES', 'COM_ALLEVENTS_LASTPLACES_DESC', 'orange', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, '*')", "events.ribbon.lastplaces", false];
        $sqlorder[] = ["INSERT INTO `#__allevents_ribbon` (`id`, `titre`, `description`, `couleur`, `adminlock`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created_by`, `lastmod_by`, `language`) VALUES (4, 'COM_ALLEVENTS_NEWS', 'COM_ALLEVENTS_NEWS_DESC', 'green', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, '*')", "events.ribbon.news", false];
        $sqlorder[] = ["INSERT INTO `#__allevents_ribbon` (`id`, `titre`, `description`, `couleur`, `adminlock`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created_by`, `lastmod_by`, `language`) VALUES (1, 'COM_ALLEVENTS_TODAY', 'COM_ALLEVENTS_TODAY_DESC', 'red', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, '*')", "events.ribbon.today", false];
        $sqlorder[] = ["INSERT INTO `#__allevents_ribbon` (`id`, `titre`, `description`, `couleur`, `adminlock`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created_by`, `lastmod_by`, `language`) VALUES (6, 'COM_ALLEVENTS_TOMORROW', 'COM_ALLEVENTS_TOMORROW_DESC', 'orange', 1, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, '*')", "events.ribbon.tomarrow", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `iconmap` VARCHAR(100)", "agenda.iconmap", false];
        $sqlorder[] = ["update`#__allevents_agenda` set `iconmap` ='blue' where `iconmap` is null", "agenda.iconmap", false];
        // version 3.4.3
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` ADD COLUMN `max_hits` INT(11)", "agenda.max_hits", false];
        $sqlorder[] = ["update`#__allevents_agenda` set `max_hits` = 1000 where `max_hits` is null", "agenda.max_hits", false];
        // UTF-8 Multibyte (utf8mb4) conversion for MySQL
        // enlarge some database columns to avoid data losses, then convert all tables
        // to utf8mb4 or utf8, then set default character sets and collations for all
        // tables
        $sqlorder[] = ["ALTER TABLE `#__allevents_activities` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "activities.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_aevote` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "aevote.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_agenda` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "agenda.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_albums` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "albums.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_calendar` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "calendar.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_categories` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "categories.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_countries` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "countries.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_customfields` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "customfields.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_customfields_data` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "customfields_data.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_enrolments` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "enrolments.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "events.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_form` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "form.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formfield` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "formfield.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formfieldset` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "formfieldset.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_forms` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "forms.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfields` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "formsfields.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_formsfieldstype` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "formsfieldstype.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_gcalendar` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "gcalendar.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_groups` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "groups.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_links` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "links.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_orders` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "orders.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_pictures` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "pictures.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_places` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "places.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_public` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "public.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_queue` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "queue.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_reminder_types` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "reminder_types.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ressources` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "ressources.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_ribbon` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "ribbon.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_sections` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "sections.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_series` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "series.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_settings` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "settings.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_tickettypes` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "tickettypes.utf8mb4", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_users` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci", "users.utf8mb4", false];
        // version 3.4.5.1
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `menuitem` INT(11) DEFAULT 0", "events.menuitem", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `use_menuitem` INT(1) DEFAULT 0", "events.use_menuitem", false];

        // version 3.4.6
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `banniere` VARCHAR(100) DEFAULT NULL", "events.banniere", false];

        // version 3.4.7.10
        $sqlorder[] = ["ALTER TABLE `#__allevents_events` ADD COLUMN `canonical` VARCHAR(1000) DEFAULT NULL", "events.canonical", false];

		// version 3.5.2
        $sqlorder[] = ["ALTER TABLE `#__allevents_aevote` ADD COLUMN `user_id` INT(11) DEFAULT NULL", "aevote.user_id", false];
        $sqlorder[] = ["ALTER TABLE `#__allevents_aevote` ADD COLUMN `label` VARCHAR(50) DEFAULT NULL", "aevote.label", false];
		
        $elements = [];
        foreach ($sqlorder as $key => $value) {
            try {
                $db->setQuery($value[0]);
                $db->execute();
                if (strpos($value[0], 'CHANGE') == false) {
                    if (!isset($elements[$value[1]])) {
                        // echo '<div>' . $value[1] . ' : ' . JText::_('COM_ALLEVENTS_CREATED') . '</div>';
                        $elements[$value[1]] = true;
                    }
                }
            } catch (Exception $e) {
                if ($value[2]) {
                    JFactory::getApplication()->enqueueMessage('Error ' . $e->getMessage() . ' on ' . $value[1], 'error');
                }
                // echo '<div>' . $e . ' : ' . JText::_('COM_ALLEVENTS_EXISTS') . '</div>';
            }
        }

        require_once(JPATH_ROOT . '/administrator/components/com_allevents/helpers/MakeCSS.php');
        require_once(JPATH_ROOT . '/administrator/components/com_allevents/helpers/MakeCalendar.php');

        $g_se_CSS = new AllEventsClassCSS();
        $g_se_CSS::MakeCSSEntity('activity', 'activities');
        $g_se_CSS::MakeCSSEntity('agenda', 'agenda');
        $g_se_CSS::MakeCSSEntity('category', 'categories');
        $g_se_CSS::MakeCSSEntity('place', 'places');
        $g_se_CSS::MakeCSSEntity('public', 'public');
        $g_se_CSS::MakeCSSEntity('ressource', 'ressources');
        $g_se_CSS::MakeCSSEntity('section', 'sections');
        echo JText::_('COM_ALLEVENTS_MAKECSS');
        echo '<br /><br />';
        $g_se_Calendar = new AllEventsClassCalendar();
        $g_se_Calendar::MakeCalendar();
        echo JText::_('COM_ALLEVENTS_MAKECALENDAR');
        echo '<br /><br />';
        // Add post-installation messages on Joomla! 3.2 and later
        $this->_applyPostInstallationMessages();
    }

    /**
     * method to run after an install/update/uninstall method
     *
     * @return void
     */
    private function _removeObsoleteFilesAndFolders()
    {
        // Remove files
        jimport('joomla.filesystem.file');
        if (!empty($this->AllEventsRemoveFiles['files'])) {
            foreach ($this->AllEventsRemoveFiles['files'] as $file) {
                $f = JPATH_ROOT . '/' . $file;
                if (!JFile::exists($f))
                    continue;
                JFile::delete($f);
            }
        }

        // Remove folders
        jimport('joomla.filesystem.file');
        if (!empty($this->AllEventsRemoveFiles['folders'])) {
            foreach ($this->AllEventsRemoveFiles['folders'] as $folder) {
                $f = JPATH_ROOT . '/' . $folder;
                if (!JFolder::exists($f))
                    continue;
                JFolder::delete($f);
            }
        }
    }

    /**
     * sets parameter values in the component's row of the extension table
     */

    /**
     * com_AllEventsInstallerScript::setParams()
     *
     * @param mixed $param_array
     */
    function setParams($param_array)
    {
        if (count($param_array) > 0) {
            // read the existing component value(s)
            $db = JFactory::getDbo();
            $db->setQuery('SELECT params FROM `#__extensions` WHERE name = ' . $db->quote('allevents'));
            $params = json_decode($db->loadResult(), true);
            // Add the new variable(s) to the existing one(s)
            foreach ($param_array as $name => $value) {
                if (!isset($params[(string )$name])) {
                    $params[(string )$name] = (string )$value;
                } elseif (($params[(string )$name] == '') && ($params[(string )$name] <> 0)) {
                    $params[(string )$name] = (string )$value;
                }
            }
            // Store the combined new and existing values back as a JSON string
            $paramsString = json_encode($params);
            $db->setQuery('UPDATE `#__extensions` SET params = ' . $db->quote($paramsString) . ' WHERE name = ' . $db->quote('allevents'));
            $db->execute();
        }
    }

    /**
     * Applies the post-installation messages for Joomla! 3.2 or later
     *
     * @return void
     */
    protected
    function _applyPostInstallationMessages()
    {
        // Make sure it's Joomla! 3.2.0 or later
        if (!version_compare(JVERSION, '3.2.0', 'ge')) {
            return;
        }

        // Make sure there are post-installation messages
        if (empty($this->postInstallationMessages)) {
            return;
        }

        // Get the extension ID for our component
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('extension_id')->from('#__extensions')->where($db->qn('element') . ' = ' . $db->q($this->componentName));
        $db->setQuery($query);

        try {
            $ids = $db->loadColumn();
        } catch (Exception $exc) {
            return;
        }

        if (empty($ids)) {
            return;
        }

        $extension_id = array_shift($ids);

        foreach ($this->postInstallationMessages as $message) {
            $message['extension_id'] = $extension_id;
            $this->addPostInstallationMessage($message);
        }
    }

    /**
     * Adds or updates a post-installation message (PIM) definition for Joomla! 3.2 or later. You can use this in your
     * post-installation script using this code:
     *
     * The $options array contains the following mandatory keys:
     *
     * extension_id        The numeric ID of the extension this message is for (see the #__extensions table)
     *
     * type                One of message, link or action. Their meaning is:
     *                    message        Informative message. The user can dismiss it.
     *                    link        The action button links to a URL. The URL is defined in the action parameter.
     *                  action      A PHP action takes place when the action button is clicked. You need to specify the
     *                              action_file (RAD path to the PHP file) and action (PHP function name) keys. See
     *                              below for more information.
     *
     * title_key        The JText language key for the title of this PIM
     *                    Example: COM_FOOBAR_POSTINSTALL_MESSAGEONE_TITLE
     *
     * description_key    The JText language key for the main body (description) of this PIM
     *                    Example: COM_FOOBAR_POSTINSTALL_MESSAGEONE_DESC
     *
     * action_key        The JText language key for the action button. Ignored and not required when type=message
     *                    Example: COM_FOOBAR_POSTINSTALL_MESSAGEONE_ACTION
     *
     * language_extension    The extension name which holds the language keys used above. For example, com_foobar,
     *                    mod_something, plg_system_whatever, tpl_mytemplate
     *
     * language_client_id   Should we load the front-end (0) or back-end (1) language keys?
     *
     * version_introduced   Which was the version of your extension where this message appeared for the first time?
     *                        Example: 3.2.1
     *
     * enabled              Must be 1 for this message to be enabled. If you omit it, it defaults to 1.
     *
     * condition_file        The RAD path to a PHP file containing a PHP function which determines whether this message
     *                        should be shown to the user. @see F0FTemplateUtils::parsePath() for RAD path format. Joomla!
     *                        will include this file before calling the condition_method.
     *                      Example:   admin://components/com_foobar/helpers/postinstall.php
     *
     * condition_method     The name of a PHP function which will be used to determine whether to show this message to
     *                      the user. This must be a simple PHP user function (not a class method, static method etc)
     *                        which returns true to show the message and false to hide it. This function is defined in the
     *                        condition_file.
     *                        Example: com_foobar_postinstall_messageone_condition
     *
     * When type=message no additional keys are required.
     *
     * When type=link the following additional keys are required:
     *
     * action                The URL which will open when the user clicks on the PIM's action button
     *                        Example:    index.php?option=com_foobar&view=tools&task=installSampleData
     *
     * Then type=action the following additional keys are required:
     *
     * action_file            The RAD path to a PHP file containing a PHP function which performs the action of this PIM.
     *
     * @see                   F0FTemplateUtils::parsePath() for RAD path format. Joomla! will include this file
     *                        before calling the function defined in the action key below.
     *                        Example:   admin://components/com_foobar/helpers/postinstall.php
     *
     * action                The name of a PHP function which will be used to run the action of this PIM. This must be a
     *                      simple PHP user function (not a class method, static method etc) which returns no result.
     *                        Example: com_foobar_postinstall_messageone_action
     *
     * @param array $options See description
     *
     * @return  void
     *
     * @throws Exception
     */
    protected
    function addPostInstallationMessage(array $options)
    {
        // Make sure there are options set
        if (!is_array($options)) {
            throw new Exception('Post-installation message definitions must be of type array', 500);
        }

        // Initialise array keys
        $defaultOptions = [
            'extension_id' => '',
            'type' => '',
            'title_key' => '',
            'description_key' => '',
            'action_key' => '',
            'language_extension' => '',
            'language_client_id' => '',
            'action_file' => '',
            'action' => '',
            'condition_file' => '',
            'condition_method' => '',
            'version_introduced' => '',
            'enabled' => '1',
        ];

        $options = array_merge($defaultOptions, $options);

        // Array normalisation. Removes array keys not belonging to a definition.
        $defaultKeys = array_keys($defaultOptions);
        $allKeys = array_keys($options);
        $extraKeys = array_diff($allKeys, $defaultKeys);

        if (!empty($extraKeys)) {
            foreach ($extraKeys as $key) {
                unset($options[$key]);
            }
        }

        // Normalisation of integer values
        $options['extension_id'] = (int)$options['extension_id'];
        $options['language_client_id'] = (int)$options['language_client_id'];
        $options['enabled'] = (int)$options['enabled'];

        // Normalisation of 0/1 values
        foreach (['language_client_id', 'enabled'] as $key) {
            $options[$key] = $options[$key] ? 1 : 0;
        }

        // Make sure there's an extension_id
        if (!(int)$options['extension_id']) {
            throw new Exception('Post-installation message definitions need an extension_id', 500);
        }

        // Make sure there's a valid type
        if (!in_array($options['type'], [
            'message',
            'link',
            'action'])
        ) {
            throw new Exception('Post-installation message definitions need to declare a type of message, link or action', 500);
        }

        // Make sure there's a title key
        if (empty($options['title_key'])) {
            throw new Exception('Post-installation message definitions need a title key', 500);
        }

        // Make sure there's a description key
        if (empty($options['description_key'])) {
            throw new Exception('Post-installation message definitions need a description key', 500);
        }

        // If the type is anything other than message you need an action key
        if (($options['type'] != 'message') && empty($options['action_key'])) {
            throw new Exception('Post-installation message definitions need an action key when they are of type "' . $options['type'] . '"', 500);
        }

        // You must specify the language extension
        if (empty($options['language_extension'])) {
            throw new Exception('Post-installation message definitions need to specify which extension contains their language keys', 500);
        }

        // The action file and method are only required for the "action" type
        if ($options['type'] == 'action') {
            if (empty($options['action_file'])) {
                throw new Exception('Post-installation message definitions need an action file when they are of type "action"', 500);
            }

            $file_path = F0FTemplateUtils::parsePath($options['action_file'], true);

            if (!@is_file($file_path)) {
                throw new Exception('The action file ' . $options['action_file'] . ' of your post-installation message definition does not exist', 500);
            }

            if (empty($options['action'])) {
                throw new Exception('Post-installation message definitions need an action (function name) when they are of type "action"', 500);
            }
        }

        if ($options['type'] == 'link') {
            if (empty($options['link'])) {
                throw new Exception('Post-installation message definitions need an action (URL) when they are of type "link"', 500);
            }
        }

        // The condition file and method are only required when the type is not "message"
        if ($options['type'] != 'message') {
            if (empty($options['condition_file'])) {
                throw new Exception('Post-installation message definitions need a condition file when they are of type "' . $options['type'] . '"', 500);
            }

            $file_path = F0FTemplateUtils::parsePath($options['condition_file'], true);

            if (!@is_file($file_path)) {
                throw new Exception('The condition file ' . $options['condition_file'] . ' of your post-installation message definition does not exist', 500);
            }

            if (empty($options['condition_method'])) {
                throw new Exception('Post-installation message definitions need a condition method (function name) when they are of type "' . $options['type'] . '"', 500);
            }
        }

        // Check if the definition exists
        $tableName = '#__postinstall_messages';

        $db = JFactory::getDbo();
        $query = $db->getQuery(true)->select('*')->from($db->qn($tableName))->where($db->qn('extension_id') . ' = ' . $db->q($options['extension_id']))->where($db->qn('type') . ' = ' . $db->q($options['type']))->where($db->qn('title_key') . ' = ' . $db->q($options['title_key']));
        $existingRow = $db->setQuery($query)->loadAssoc();

        // Is the existing definition the same as the one we're trying to save (ignore the enabled flag)?
        if (!empty($existingRow)) {
            $same = true;

            foreach ($options as $k => $v) {
                if ($k == 'enabled') {
                    continue;
                }

                if ($existingRow[$k] != $v) {
                    $same = false;
                    break;
                }
            }

            // Trying to add the same row as the existing one; quit
            if ($same) {
                return;
            }

            // Otherwise it's not the same row. Remove the old row before insert a new one.
            $query = $db->getQuery(true)->delete($db->qn($tableName))->where($db->q('extension_id') . ' = ' . $db->q($options['extension_id']))->where($db->q('type') . ' = ' . $db->q($options['type']))->where($db->q('title_key') . ' = ' . $db->q($options['title_key']));
            $db->setQuery($query)->execute();
        }

        // Insert the new row
        $options = (object)$options;
        $db->insertObject($tableName, $options);
    }
}
