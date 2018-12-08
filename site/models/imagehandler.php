<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.model');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

/**
 * AllEventsModelImagehandler
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */
class AllEventsModelImagehandler extends JModelLegacy
{
    /**
     * Pagination object
     *
     * @var object
     */
    var $_pagination = null;

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct();

        $app = JFactory::getApplication();
        $input = $app->input;
        $option = $input->getString('option', 'com_allevents');
        $task = $input->getString('task', '');
        $limit = $app->getUserStateFromRequest($option . 'imageselect' . $task . 'limit', 'limit', $app->get('list_limit'), 'int');
        $limitstart = $app->getUserStateFromRequest($option . 'imageselect' . $task . 'limitstart', 'limitstart', 0, 'int');
        $limitstart = $limit ? (int)(floor($limitstart / $limit) * $limit) : 0;
        $search = $app->getUserStateFromRequest($option . '.filter_search', 'filter_search', '', 'string');
        $search = trim(strtolower($search));

        $this->setState('limit', $limit);
        $this->setState('limitstart', $limitstart);
        $this->setState('search', $search);
    }

    /**
     * Build imagelist
     *
     * @return array $list The imagefiles from a directory to display
     *
     */
    function getImages()
    {
        $list = $this->getList();

        $listimg = [];

        $s = $this->getState('limitstart') + 1;

        for ($i = ($s - 1); $i < $s + $this->getState('limit'); $i++) {
            if ($i + 1 <= $this->getState('total')) {

                $list[$i]->size = $this->_parseSize(filesize($list[$i]->path));

                $info = @getimagesize($list[$i]->path);
                $list[$i]->width = @$info[0];
                $list[$i]->height = @$info[1];
                //$list[$i]->type= @$info[2];
                ////$list[$i]->mime= @$info['mime'];

                if (($info[0] > 60) || ($info[1] > 60)) {
                    $dimensions = $this->_imageResize($info[0], $info[1], 60);
                    $list[$i]->width_60 = $dimensions[0];
                    $list[$i]->height_60 = $dimensions[1];
                } else {
                    $list[$i]->width_60 = $list[$i]->width;
                    $list[$i]->height_60 = $list[$i]->height;
                }
                $listimg[] = $list[$i];
            }
        }

        return $listimg;
    }

    /**
     * Build imagelist
     *
     * @return array $list The imagefiles from a directory
     *
     */
    function getList()
    {
        static $list;
        // Only process the list once per request
        if (is_array($list)) {
            return $list;
        }

        // Get folder from request
        $folder = $this->getState('folder');
        $search = $this->getState('search');

        // Initialize variables
        $basePath = JPATH_SITE . '/images/com_allevents/' . $folder;

        $images = [];

        // Get the list of files and folders from the given folder
        $fileList = JFolder::files($basePath);

        // Iterate over the files if they exist
        if ($fileList !== false) {
            foreach ($fileList as $file) {
                if (is_file($basePath . '/' . $file) && substr($file, 0, 1) != '.') {

                    if ($search == '') {
                        $tmp = new JObject();
                        $tmp->name = $file;
                        $tmp->path = JPath::clean($basePath . '/' . $file);

                        $images[] = $tmp;

                    } elseif (stristr($file, $search)) {
                        $tmp = new JObject();
                        $tmp->name = $file;
                        $tmp->path = JPath::clean($basePath . '/' . $file);

                        $images[] = $tmp;
                    }
                }
            }
        }

        $this->setState('total', count($images));

        return $images;
    }

    /**
     * @param null $property
     * @param null $default
     *
     * @return mixed
     * @throws Exception
     */
    function getState($property = null, $default = null)
    {
        static $set;

        if (!$set) {
            $folder = JFactory::getApplication()->input->get('folder', '');
            $this->setState('folder', $folder);

            $set = true;
        }

        return parent::getState($property);
    }

    /**
     * Return human readable size info
     *
     * @param $size
     *
     * @return string size of image
     *
     */
    protected function _parseSize($size)
    {
        if ($size < 1024) {
            return $size . ' bytes';
        } else {
            if ($size >= 1024 && $size < 1024 * 1024) {
                return sprintf('%01.2f', $size / 1024.0) . ' Kb';
            } else {
                return sprintf('%01.2f', $size / (1024.0 * 1024)) . ' Mb';
            }
        }
    }

    /**
     * Build display size
     *
     * @param $width
     * @param $height
     * @param $target
     *
     * @return array width and height
     *
     */
    protected function _imageResize($width, $height, $target)
    {
        //takes the larger size of the width and height and applies the
        //formula accordingly...this is so this script will work
        //dynamically with any size image
        if ($width > $height) {
            $percentage = ($target / $width);
        } else {
            $percentage = ($target / $height);
        }

        //gets the new value and applies the percentage, then rounds the value
        $width = round($width * $percentage);
        $height = round($height * $percentage);

        return [$width, $height];
    }

    /**
     * Method to get a pagination object for the images
     *
     * @access public
     * @return JPagination|object
     */
    function getPagination()
    {
        if (empty($this->_pagination)) {
            jimport('joomla.html.pagination');
            $this->_pagination = new JPagination($this->getState('total'), $this->getState('limitstart'), $this->getState('limit'));
        }

        return $this->_pagination;
    }
}