<?php

/**
 * ExtensionsAllEventsInstaller
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;

/**
 * Class ExtensionsAllEventsInstaller
 */
class ExtensionsAllEventsInstaller
{
    /**
     * ExtensionsAllEventsInstaller::install()
     * Install an extension from either folder, url or upload.
     *
     * @return  boolean result of install.
     *
     * @throws Exception
     * @since   1.5
     */
    public function install()
    {
        // $this->setState('action', 'install');

        // Set FTP credentials, if given.
        JClientHelper::setCredentialsFromRequest('ftp');
        $app = JFactory::getApplication();

        // Load installer plugins for assistance if required:
        JPluginHelper::importPlugin('installer');
        $dispatcher = JEventDispatcher::getInstance();

        $package = null;

        // This event allows an input pre-treatment, a custom pre-packing or custom installation.
        // (e.g. from a JSON description).
        $results = $dispatcher->trigger('onInstallerBeforeInstallation', [$this, &$package]);

        if (in_array(true, $results, true)) {
            return true;
        }

        if (in_array(false, $results, true)) {
            return false;
        }

        // $installType = $app->input->getWord('installtype');
        $installType = 'url';

        if ($package === null) {
            switch ($installType) {
                case 'folder':
                    // Remember the 'Install from Directory' path.
                    $app->getUserStateFromRequest($this->_context . '.install_directory', 'install_directory');
                    $package = $this->_getPackageFromFolder();
                    break;

                case 'upload':
                    $package = $this->_getPackageFromUpload();
                    break;

                case 'url':
                    $package = $this->_getPackageFromUrl();
                    break;

                default:
                    $app->setUserState('com_installer.message', JText::_('COM_INSTALLER_NO_INSTALL_TYPE_FOUND'));

                    return false;
                    break;
            }
        }

        // This event allows a custom installation of the package or a customization of the package:
        $results = $dispatcher->trigger('onInstallerBeforeInstaller', [$this, &$package]);

        if (in_array(true, $results, true)) {
            return true;
        }

        if (in_array(false, $results, true)) {
            if (in_array($installType, ['upload', 'url'])) {
                JInstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);
            }

            return false;
        }

        // Was the package unpacked?
        if (!$package || !$package['type']) {
            if (in_array($installType, ['upload', 'url'])) {
                JInstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);
            }

            $app->enqueueMessage(JText::_('COM_INSTALLER_UNABLE_TO_FIND_INSTALL_PACKAGE'), 'error');

            return false;
        }

        // Get an installer instance.
        $installer = JInstaller::getInstance();

        // Install the package.
        if (!$installer->install($package['dir'])) {
            // There was an error installing the package.
            $msg = JText::sprintf('COM_INSTALLER_INSTALL_ERROR', JText::_('COM_INSTALLER_TYPE_TYPE_' . strtoupper($package['type'])));
            $result = false;
            $msgType = 'error';
        } else {
            // Package installed sucessfully.
            $msg = JText::sprintf('COM_INSTALLER_INSTALL_SUCCESS', JText::_('COM_INSTALLER_TYPE_TYPE_' . strtoupper($package['type'])));
            $result = true;
            $msgType = 'message';
        }

        // This event allows a custom a post-flight:
        $dispatcher->trigger('onInstallerAfterInstaller', [
            $this,
            &$package,
            $installer,
            &$result,
            &$msg]);

        // Set some model state values.
        $app = JFactory::getApplication();
        $app->enqueueMessage($msg, $msgType);
        // $this->setState('name', $installer->get('name'));
        // $this->setState('result', $result);
        $app->setUserState('com_installer.message', $installer->message);
        $app->setUserState('com_installer.extension_message', $installer->get('extension_message'));
        $app->setUserState('com_installer.redirect_url', $installer->get('redirect_url'));

        // Cleanup the install files.
        if (!is_file($package['packagefile'])) {
            $config = JFactory::getConfig();
            $package['packagefile'] = $config->get('tmp_path') . '/' . $package['packagefile'];
        }

        JInstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);

        return $result;
    }

    /**
     * ExtensionsAllEventsInstaller::_getPackageFromUpload()
     * Works out an installation package from a HTTP upload.
     *
     * @return bool|package
     * @throws Exception
     */
    protected function _getPackageFromUpload()
    {
        // Get the uploaded file information.
        $input = JFactory::getApplication()->input;

        // Do not change the filter type 'raw'. We need this to let files containing PHP code to upload. See JInputFiles::get.
        $userfile = $input->files->get('install_package', null, 'raw');

        // Make sure that file uploads are enabled in php.
        if (!(bool)ini_get('file_uploads')) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_INSTALLER_MSG_INSTALL_WARNINSTALLFILE'), 'warning');

            return false;
        }

        // Make sure that zlib is loaded so that the package can be unpacked.
        if (!extension_loaded('zlib')) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_INSTALLER_MSG_INSTALL_WARNINSTALLZLIB'), 'warning');

            return false;
        }

        // If there is no uploaded file, we have a problem...
        if (!is_array($userfile)) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_INSTALLER_MSG_INSTALL_NO_FILE_SELECTED'), 'warning');

            return false;
        }

        // Is the PHP tmp directory missing?
        if ($userfile['error'] && ($userfile['error'] == UPLOAD_ERR_NO_TMP_DIR)) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_INSTALLER_MSG_INSTALL_WARNINSTALLUPLOADERROR') . '<br />' . JText::_('COM_INSTALLER_MSG_WARNINGS_PHPUPLOADNOTSET'), 'warning');

            return false;
        }

        // Is the max upload size too small in php.ini?
        if ($userfile['error'] && ($userfile['error'] == UPLOAD_ERR_INI_SIZE)) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_INSTALLER_MSG_INSTALL_WARNINSTALLUPLOADERROR') . '<br />' . JText::_('COM_INSTALLER_MSG_WARNINGS_SMALLUPLOADSIZE'), 'warning');

            return false;
        }

        // Check if there was a different problem uploading the file.
        if ($userfile['error'] || $userfile['size'] < 1) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_INSTALLER_MSG_INSTALL_WARNINSTALLUPLOADERROR'), 'warning');

            return false;
        }

        // Build the appropriate paths.
        $config = JFactory::getConfig();
        $tmp_dest = $config->get('tmp_path') . '/' . $userfile['name'];
        $tmp_src = $userfile['tmp_name'];

        // Move uploaded file.
        jimport('joomla.filesystem.file');
        JFile::upload($tmp_src, $tmp_dest, false, true);

        // Unpack the downloaded package file.
        $package = JInstallerHelper::unpack($tmp_dest, true);

        return $package;
    }

    /**
     * ExtensionsAllEventsInstaller::_getPackageFromUrl()
     *
     * Install an extension from a URL.
     *
     * @return bool|Package
     *
     * @throws Exception
     * @since   1.5
     */
    protected function _getPackageFromUrl()
    {
        $input = JFactory::getApplication()->input;

        // Get the URL of the package to install.
        $url = $input->getString('install_url');

        // Did you give us a URL?
        if (!$url) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_INSTALLER_MSG_INSTALL_ENTER_A_URL'), 'warning');

            return false;
        }

        // Handle updater XML file case:
        if (preg_match('/\.xml\s*$/', $url)) {
            jimport('joomla.updater.update');
            $update = new JUpdate;
            $update->loadFromXml($url);
            $package_url = trim($update->get('downloadurl', false)->_data);

            if ($package_url) {
                $url = $package_url;
            }

            unset($update);
        }

        // Download the package at the URL given.
        $p_file = JInstallerHelper::downloadPackage($url);

        // Was the package downloaded?
        if (!$p_file) {
            JFactory::getApplication()->enqueueMessage(JText::_('COM_INSTALLER_MSG_INSTALL_INVALID_URL'), 'warning');

            return false;
        }

        $config = JFactory::getConfig();
        $tmp_dest = $config->get('tmp_path');

        // Unpack the downloaded package file.
        $package = JInstallerHelper::unpack($tmp_dest . '/' . $p_file, true);

        return $package;
    }
}
