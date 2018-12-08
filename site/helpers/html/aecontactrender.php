<?php
defined('_JEXEC') or die;

/**
 * AEContactRender
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AEContactRender
{
    protected $aecontact;

    /**
     *
     * @param $aecontact
     *
     * @internal param unknown $this ->aecontact
     */
    public function __construct($aecontact)
    {
        $this->aecontact = $aecontact;
    }

    /**
     * getHtml()
     *
     * @return string code
     */
    public function getHtml()
    {
        if ($this->aecontact['type'] == 1) {
            return self::getHtmlJUser();
        } elseif ($this->aecontact['type'] == 2) {
            return self::getHtmlJContact();
            // ##€
        } elseif ($this->aecontact['type'] == 3) {
            return self::getHtmlCBUser();
            // €##
        }

        return "";
    }

    /**
     * getHtmlJUser()
     *
     * @return string code for Joomla User
     */
    protected function getHtmlJUser()
    {
        $params = JComponentHelper::getParams('com_allevents');

        $html = [];

        if ($params['geventshow_jusername'] && isset($this->aecontact['name'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_NAME') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['name'] . '</span>';
        }

        if ($params['geventshow_juserusername'] && isset($this->aecontact['username'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_USERNAME') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['username'] . '</span>';
        }

        if ($params['geventshow_jusermail'] && isset($this->aecontact['mail'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_EMAIL') . '</strong>';
            $html[] = '<span class="float2">';
            if ($params['geventshow_jusermail'] == 1) {
                $html[] = JHtml::_('email.cloak', $this->aecontact['mail'], 0);
            } elseif ($params['geventshow_jusermail'] == 2) {
                $html[] = JHtml::_('email.cloak', $this->aecontact['mail'], 1);
            }
            $html[] = '</span>';
        }

        return implode("\n", $html);
    }

    /**
     * getHtmlJContact()
     *
     * @return string code for Joomla Contact
     */
    protected function getHtmlJContact()
    {
        $params = JComponentHelper::getParams('com_allevents');

        $html = [];

        if ($params['geventshow_jcontactname'] && isset($this->aecontact['name'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_NAME') . '</strong>';
            if ($params['geventshow_jcontactlink']) {
                $html[] = '<span class="float2">';
                $html[] = '<a href="' . $this->aecontact['link'] . '" target="_blank">' . $this->aecontact['name'] .
                    '</a>';
                $html[] = '</span>';
            } else {
                $html[] = '<span class="float2">' . $this->aecontact['name'] . '</span>';
            }
        }

        if ($params['geventshow_jcontactusername'] && isset($this->aecontact['username'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_USERNAME') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['username'] . '</span>';
        }

        if ($params['geventshow_jusermail'] && isset($this->aecontact['mail'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_EMAIL') . '</strong>';
            $html[] = '<span class="float2">';
            if ($params['geventshow_jusermail'] == 1) {
                $html[] = JHtml::_('email.cloak', $this->aecontact['mail'], 0);
            } elseif ($params['geventshow_jusermail'] == 2) {
                $html[] = JHtml::_('email.cloak', $this->aecontact['mail'], 1);
            }
            $html[] = '</span>';
        }

        if ($params['geventshow_jcontactposition'] && isset($this->aecontact['position'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_POSITION') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['position'] . '</span>';
        }

        if ($params['geventshow_jcontactaddress'] && isset($this->aecontact['address'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_ADDRESS') . '</strong>';
            $html[] = '<span class="float2">' . nl2br(htmlspecialchars($this->aecontact['address'])) . '</span>';
        }

        if ($params['geventshow_jcontactphone'] && isset($this->aecontact['phone'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_TELEPHONE') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['phone'] . '</span>';
        }

        if ($params['geventshow_jcontactmobile'] && isset($this->aecontact['mobile'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_MOBILE') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['mobile'] . '</span>';
        }

        if ($params['geventshow_jcontactfax'] && isset($this->aecontact['fax'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_FAX') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['fax'] . '</span>';
        }

        if ($params['geventshow_jcontactwebsite'] && isset($this->aecontact['website'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_WEBPAGE') . '</strong>';
            $html[] = '<span class="float2">';
            $html[] = '<a href="' . $this->aecontact['website'] . '" target="_blank" itemprop="url">';
            $html[] = JStringPunycode::urlToUTF8($this->aecontact['website']) . '</a>';
            $html[] = '</span>';
        }

        if ($params['geventshow_jcontactmisc'] && isset($this->aecontact['misc'])) {
            $html[] = '<div class="float3">' . $this->aecontact['misc'] . '</div>';
        }

        return implode("\n", $html);
    }

    // €#€
    /**
     * getHtmlCBUser()
     *
     * @return string code for Community Builder User
     */
    protected function getHtmlCBUser()
    {
        $params = JComponentHelper::getParams('com_allevents');

        $html = [];

        if ($params['geventshow_cbusername'] && isset($this->aecontact['name'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_NAME') . '</strong>';
            if ($params['geventshow_cbuserlink']) {
                $html[] = '<span class="float2">';
                $html[] = '<a href="' . $this->aecontact['link'] . '" target="_blank">' . $this->aecontact['name'] .
                    '</a>';
                $html[] = '</span>';
            } else {
                $html[] = '<span class="float2">' . $this->aecontact['name'] . '</span>';
            }
        }

        if ($params['geventshow_cbuserusername'] && isset($this->aecontact['username'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_USERNAME') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['username'] . '</span>';
        }

        if ($params['geventshow_cbusermaildisp'] && isset($this->aecontact['mail'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_EMAIL') . '</strong>';
            $html[] = '<span class="float2">';
            if ($params['geventshow_cbusermaildisp'] == 1) {
                $html[] = JHtml::_('email.cloak', $this->aecontact['mail'], 0);
            } elseif ($params['geventshow_cbusermaildisp'] == 2) {
                $html[] = JHtml::_('email.cloak', $this->aecontact['mail'], 1);
            }
            $html[] = '</span>';
        }

        if ($params['geventshow_cbuserorganization'] && isset($this->aecontact['organization'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_ORGANIZATION') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['organization'] . '</span>';
        }

        if ($params['geventshow_cbuserposition'] && isset($this->aecontact['position'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_POSITION') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['position'] . '</span>';
        }

        if ($params['geventshow_cbuseraddress'] && isset($this->aecontact['address'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_ADDRESS') . '</strong>';
            $html[] = '<span class="float2">' . nl2br(htmlspecialchars($this->aecontact['address'])) . '</span>';
        }

        if ($params['geventshow_cbuserphone'] && isset($this->aecontact['phone'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_TELEPHONE') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['phone'] . '</span>';
        }

        if ($params['geventshow_cbusermobile'] && isset($this->aecontact['mobile'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_MOBILE') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['mobile'] . '</span>';
        }

        if ($params['geventshow_cbuserfax'] && isset($this->aecontact['fax'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_FAX') . '</strong>';
            $html[] = '<span class="float2">' . $this->aecontact['fax'] . '</span>';
        }

        if ($params['geventshow_cbuserwebsite'] && isset($this->aecontact['website'])) {
            $html[] = '<strong class="float">' . JText::_('COM_ALLEVENTS_WEBPAGE') . '</strong>';
            $html[] = '<span class="float2">';
            $html[] = '<a href="' . $this->aecontact['website'] . '" target="_blank" itemprop="url">';
            $html[] = JStringPunycode::urlToUTF8($this->aecontact['website']) . '</a>';
            $html[] = '</span>';
        }

        if ($params['geventshow_cbusermisc'] && isset($this->aecontact['misc'])) {
            $html[] = '<div class="float3">' . $this->aecontact['misc'] . '</div>';
        }

        return implode("\n", $html);
    }
    // €#€
}
