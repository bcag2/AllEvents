<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');
jimport('joomla.mail.mail');

/**
 * AllEventsModelMail
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelMail extends JModelAdmin
{
    protected $text_prefix = 'COM_ALLEVENTS';

    /**
     * AllEventsModelMail::getTable()
     *
     * @param string $type
     * @param string $prefix
     * @param array $config
     *
     * @return bool|JTable
     */
    public function getTable($type = 'Event', $prefix = 'AllEventsTable', $config = [])
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * AllEventsModelMail::getForm()
     *
     * @param array $data
     * @param boolean $loadData
     *
     * @return bool|mixed
     */
    public function getForm($data = [], $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm('com_allevents.mail', 'mail', ['control' => 'jform', 'load_data' => $loadData]);

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * AllEventsModelMail::getItem()
     *
     * @param mixed $pk
     *
     * @return mixed
     */
    public function getItem($pk = null)
    {
        if ($item = parent::getItem($pk)) {
            //Do any procesing on fields here if needed
        }

        return $item;
    }

    /**
     * Send mail
     *
     */
    function getMail()
    {

        $app = JFactory::getApplication();
        $data = $app->input->post->get('jform', [], 'array');
        //$user = JFactory::getUser();
        //$access = new JAccess;
        //$db = $this->getDbo();

        $mailer = JFactory::getMailer();
        //$config = JFactory::getConfig();

        $send = '';
        $sender = [$app->get('mailfrom'), $app->get('fromname')];

        $mailer->setSender($sender);

        $list = array_key_exists('list', $data) ? $data['list'] : '';
        $subject = array_key_exists('subject', $data) ? $data['subject'] : '';
        $messageget = array_key_exists('message', $data) ? $data['message'] : '';

        $recipient = explode(', ', $list);
        $obj = $subject;
        $message = $messageget;


        $recipient = array_filter($recipient);
        //        $mailer->addRecipient($recipient);
        //        $mailer->addRecipient($sender);
        $mailer->addBcc($recipient);

        $content = stripcslashes($message);
        $body = str_replace('src="images/', 'src="' . JUri::root() . '/images/', $content);
        //        $mailer->setSender(array( $mailfrom, $fromname ));
        $mailer->setSubject($obj);
        $mailer->isHtml(true);
        $mailer->Encoding = 'base64';
        $mailer->setBody($body);

        if ($obj == "") {
            echo '<div><b>' . JText::_('COM_ALLEVENTS_NEWSLETTER_NO_OBJ_ALERT') . '</b></div>';
            echo '<script type="text/javascript">';
            echo '    alert("' . JText::_('COM_ALLEVENTS_NEWSLETTER_NO_OBJ_ALERT', true) . '");';
            echo '</script>';
        }
        if ($body == "") {
            echo '<div><b>' . JText::_('COM_ALLEVENTS_NEWSLETTER_NO_BODY_ALERT') . '</b></div>';
            echo '<script type="text/javascript">';
            echo '    alert("' . JText::_('COM_ALLEVENTS_NEWSLETTER_NO_BODY_ALERT', true) . '");';
            echo '</script>';
        }
        if (($obj != "") && ($body != "")) {
            $send = $mailer->Send();
        }
        if ($send !== true) {
            //            echo 'Error in sending the e-mail: ' . $send->message;
            echo '<div>' . JText::_('COM_ALLEVENTS_NEWSLETTER_ERROR_ALERT') . '</div>';
        } else {
            echo '<div><h2>' . JText::_('COM_ALLEVENTS_NEWSLETTER_SUCCESS') . '</h2></div>';
            /**
             * @param     $recipient
             * @param int $level
             */
            function listArray($recipient, $level = 0)
            {
                foreach ($recipient as $key => $value) {
                    if (is_array($value) | is_object($value))
                        listArray($value, $level += 1);
                    else {
                        $number = ($key + 1);
                        echo str_repeat("&nbsp;", $level * 3);
                        echo $number . " : " . $value . "<br>";
                    }
                }
                echo '<div>&nbsp;</div>';
                echo '<i>' . JText::_('COM_ALLEVENTS_NEWSLETTER_NB_EMAIL_SEND') . ' = ' . $number . '</i>';
            }

            listArray($recipient);
            //            echo '<pre>'.print_r($recipient, true).'</pre>';
        }
    }

    /**
     * AllEventsModelMail::loadFormData()
     *
     * @return array|mixed
     * @throws Exception
     */
    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState('com_allevents.edit.mail.data', []);
        $this->preprocessData('com_allevents.mail', $data);

        return $data;
    }

    /**
     * AllEventsModelMail::prepareTable()
     *
     * @param mixed $table
     */
    protected function prepareTable($table)
    {
        jimport('joomla.filter.output');
    }

    /**
     * Override preprocessForm to load the user plugin group instead of content.
     *
     * @param JForm $form
     * @param mixed $data
     * @param string $group
     *
     * @throws Exception if there is an error in the form event.
     * @internal param A $object form object.
     * @internal param The $mixed data expected for the form.
     * @since    1.6
     */
    protected function preprocessForm(JForm $form, $data, $group = 'user')
    {
        parent::preprocessForm($form, $data, $group);
    }

}
