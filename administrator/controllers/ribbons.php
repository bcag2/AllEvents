<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

use Joomla\Utilities\ArrayHelper;

/**
 * AlleventsControllerRibbons
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.1
 */
class AlleventsControllerRibbons extends JControllerAdmin
{
    /**
     * Method to clone existing Ribbons
     *
     * @return void
     * @throws Exception
     */
    public function duplicate()
    {
        // Check for request forgeries
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Get id(s)
        $pks = $this->input->post->get('cid', [], 'array');

        try {
            if (empty($pks)) {
                throw new Exception(JText::_('COM_ALLEVENTS_NO_ELEMENT_SELECTED'));
            }

            ArrayHelper::toInteger($pks);
            $model = $this->getModel();
            $model->duplicate($pks);
            $this->setMessage(Jtext::_('COM_ALLEVENTS_ITEMS_SUCCESS_DUPLICATED'));
        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'warning');
        }

        $this->setRedirect('index.php?option=com_allevents&view=ribbons');
    }

    /**
     * Proxy for getModel.
     *
     * @param   string $name Optional. Model name
     * @param   string $prefix Optional. Class prefix
     * @param   array $config Optional. Configuration array for model
     *
     * @return  object    The Model
     *
     * @since    1.6
     */
    public function getModel($name = 'ribbon', $prefix = 'AlleventsModel', $config = [])
    {
        $model = parent::getModel($name, $prefix, ['ignore_request' => true]);

        return $model;
    }

    /**
     * Method to save the submitted ordering values for records via AJAX.
     *
     * @return  void
     *
     * @throws Exception
     * @since   3.0
     */
    public function saveOrderAjax()
    {
        // Get the input
        $input = JFactory::getApplication()->input;
        $pks = $input->post->get('cid', [], 'array');
        $order = $input->post->get('order', [], 'array');

        // Sanitize the input
        ArrayHelper::toInteger($pks);
        ArrayHelper::toInteger($order);

        // Get the model
        $model = $this->getModel();

        // Save the ordering
        $return = $model->saveorder($pks, $order);

        if ($return) {
            echo "1";
        }

        // Close the application
        JFactory::getApplication()->close();
    }
}
