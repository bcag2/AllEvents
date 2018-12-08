<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

/**
 * AllEventsControllerImagehandler
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */
class AllEventsControllerImagehandler extends JControllerLegacy
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Register Extra task
        $this->registerTask('vignetteimgup', 'uploadimage');
        $this->registerTask('afficheimgup', 'uploadimage');
        $this->registerTask('banniereimgup', 'uploadimage');
    }

    /**
     * logic for uploading an image
     *
     * @access public
     * @return void
     * @throws Exception
     */
    function uploadimage()
    {
        $app = JFactory::getApplication();

        // Check for request forgeries
        JSession::checkToken() or jexit('Invalid token');
        $aesettings = [];
        $aesettings['sizelimit'] = 8000;
        $aesettings['gddisabled'] = false;
        $aesettings = (object)$aesettings;

        $file = JFactory::getApplication()->input->files->get('userfile', [], 'array');
        $task = JFactory::getApplication()->input->get('task', '');
        $pid = JFactory::getApplication()->input->get('pid', '');

        // Set FTP credentials, if given
        jimport('joomla.client.helper');
        JClientHelper::setCredentialsFromRequest('ftp');
        $base_Dir = JPATH_SITE . '/images/com_allevents/';

        //set the target directory
        if ($task == 'vignetteimgup') {
            $repertoire = 'vignettes';
        } else if ($task == 'banniereimgup') {
            $repertoire = 'bannieres';
        } else if ($task == 'afficheimgup') {
            $repertoire = 'affiches';
        }
        $base_Dir = JPATH_SITE . '/images/com_allevents/' . $repertoire . '/';

        //do we have an upload?
        if (empty($file['name'])) {
            echo "<script> alert('" . JText::_('COM_ALLEVENTS_IMAGE_EMPTY') . "'); window.history.go(-1); </script>\n";
            $app->close();
        }

        //check the image
        $check = AllEventsImage::check($file, $aesettings);

        if ($check === false) {
            $app->redirect($_SERVER['HTTP_REFERER']);
        }

        //sanitize the image filename
        $filename = AllEventsImage::sanitize($base_Dir, $file['name']);
        $filepath = $base_Dir . $filename;

        //upload the image
        if (!JFile::upload($file['tmp_name'], $filepath)) {
            echo "<script> alert('" . JText::_('COM_ALLEVENTS_UPLOAD_FAILED') . "'); window.history.go(-1); </script>\n";
            $app->close();
        } else {
            echo "<script> alert('" . JText::_('COM_ALLEVENTS_UPLOAD_COMPLETE') . "'); window.history.go(-1); window.parent.Select" . $repertoire . "('$pid','$filename'); </script>\n";
            $app->close();
        }
    }

    /**
     * logic to mass delete images
     *
     * @access public
     * @return void
     * @throws Exception
     */
    function delete()
    {
        $app = JFactory::getApplication();

        // Set FTP credentials, if given
        jimport('joomla.client.helper');
        JClientHelper::setCredentialsFromRequest('ftp');

        // Get some data from the request
        $images = JFactory::getApplication()->input->get('rm', [], 'array');
        $folder = JFactory::getApplication()->input->get('folder', '');

        if (count($images)) {
            foreach ($images as $image) {
                if ($image !== JFilterInput::getInstance()->clean($image, 'path')) {
                    JFactory::getApplication()->enqueueMessage(JText::_('COM_ALLEVENTS_UNABLE_TO_DELETE') . ' ' . htmlspecialchars($image, ENT_COMPAT, 'UTF-8'), 'error');
                    continue;
                }

                $fullPath = JPath::clean(JPATH_SITE . '/images/com_allevents/' . $folder . '/' . $image);
                $fullPaththumb = JPath::clean(JPATH_SITE . '/images/com_allevents/' . $folder . '/small/' . $image);
                if (is_file($fullPath)) {
                    JFile::delete($fullPath);
                    if (JFile::exists($fullPaththumb)) {
                        JFile::delete($fullPaththumb);
                    }
                }
            }
        }
        $task = "";
        if ($folder == 'vignettes') {
            $task = 'selectvignetteimg';
        } else if ($folder == 'affiches') {
            $task = 'selectafficheimg';
        }

        $app->redirect('index.php?option=com_allevents&view=imagehandler&layout=default&task=' . $task . '&tmpl=component');
    }
}
