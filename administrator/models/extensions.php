<?php

/**
 * AllEventsModelExtensions
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

defined('_JEXEC') or die;
jimport('joomla.application.component.modellist');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

/**
 * Class AllEventsModelExtensions
 */
class AllEventsModelExtensions extends JModelList
{
    /**
     * AllEventsModelExtensions::getItems()
     * Load the extensions list
     *
     * @param mixed $ids
     *
     * @return Array - the list
     */
    public function getItems($ids = [])
    {
        $items = [];

        $xmlFile = JPATH_SITE . '/administrator/components/com_allevents/extensions.xml';
        $xml_parser = xml_parser_create();
        xml_parse_into_struct($xml_parser, file_get_contents($xmlFile), $fields);
        xml_parser_free($xml_parser);

        foreach ($fields as $field) {
            if ((strtolower($field['tag']) != 'extension' && strtolower($field['tag']) != 'group') || !isset($field['attributes'])) {
                continue;
            }

            $item = new stdClass();
            $this->initItem($item);

            foreach ($field['attributes'] as $key => $val) {
                if (strtolower($key) == 'type') {
                    $item->type = $val;
                    $item->types = explode(',', $val);
                } else {
                    $item->{strtolower($key)} = $val;
                }
            }

            // check the extension version for the current website
            $majorJVersion = substr(JVERSION, 0, 1);
            if ((int)$majorJVersion != (int)$item->joomlaversion && strtolower($field['tag']) != 'group') {
                continue;
            }

            if (strtolower($field['tag']) == 'group') {
                $item->type = 'group';
            } else {
                // check the extension status
                $item->isInstalled = (int)$this->checkIfInstalled($item);
                if ($item->isInstalled) {
                    $item->installedVersion = $this->getInstalledVersion($item);
                } else {
                    $item->installedVersion = '<span class="label">' . JText::_('AE_NOT_INSTALLED') . '</span>';
                }
                // look for actions to process
                if (!$item->isInstalled) {
                    $item->action = 'install';
                } elseif ($item->isInstalled && version_compare($item->installedVersion, $item->latestVersion) < 0) {
                    $item->action = 'update';
                }
            }
            $items[] = $item;
        }

        // var dump($items);
        return $items;
    }


    /**
     * AllEventsModelExtensions::initItem()
     * Create empty attributes for the item
     *
     * @param mixed $item
     */
    private function initItem(&$item)
    {
        $item->name = '';
        $item->type = '';
        $item->types = [];
        $item->folder = '';
        $item->element = '';
        $item->action = '';
        $item->downloadid = 0;
        $item->isInstalled = 0;
        $item->isUpToDate = false;
        $item->installedVersion = '';
        $item->latestVersion = '';
        $item->updatexml = '';
        $item->ispaid = '0';
        $item->joomlaversion = '0';
    }

    /**
     * AllEventsModelExtensions::checkIfInstalled()
     * Check if the extension is installed
     *
     * @param mixed $item
     *
     * @return Boolean - True on success
     */
    private function checkIfInstalled($item)
    {
        // if (stristr($item->type, 'com')) {
        // return JFile::exists(JPATH_SITE . $this->getExtensionFolder($item) . $item->element . '.php')
        // || JFile::exists(JPATH_SITE . '/administrator' . $this->getExtensionFolder($item) . '/' . $item->element . '.php');
        // } else if (stristr($item->type, 'mod')) {
        // return JFile::exists(JPATH_SITE . $this->getExtensionFolder($item) . $item->element . '.php');
        // } else if (stristr($item->type, 'plg')) {
        return JFile::exists(JPATH_SITE . $this->getExtensionFolder($item) . $item->element . '.php') || JFolder::exists(JPATH_SITE . $this->getExtensionFolder($item));
        // }
        //return false;
    }

    /**
     * AllEventsModelExtensions::getExtensionFolder()
     *
     * @param mixed $item
     *
     * @return string
     */
    private function getExtensionFolder($item)
    {
        if (isset($item->extensionFolder)) {
            return $item->extensionFolder;
        } elseif (stristr($item->type, 'com')) {
            $item->extensionFolder = ($item->folder ? '/' . $item->folder : '') . '/components/com_' . $item->element . '/';
        } elseif (stristr($item->type, 'mod')) {
            $item->extensionFolder = '/modules/mod_' . $item->element . '/mod_';
        } elseif (stristr($item->type, 'plg')) {
            $item->extensionFolder = '/plugins/' . $item->folder . '/' . $item->element . '/';
        }

        return $item->extensionFolder;
    }

    /**
     * AllEventsModelExtensions::getInstalledVersion()
     *
     * @param mixed $item
     *
     * @return bool|string
     */
    private function getInstalledVersion($item)
    {
        if (isset($item->version)) {
            return $item->version;
        }

        $item->version = false;
        if ($xmlContent = simplexml_load_file(JPATH_SITE . $this->getExtensionFolder($item) . $item->element . '.xml')) {
            $item->version = (string )$xmlContent->version;
        }

        return $item->version;
    }
}
