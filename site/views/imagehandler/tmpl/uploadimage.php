<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 * @since     3.4.5
 */


defined('_JEXEC') or die;
?>

<form method="post" action="<?php echo htmlspecialchars($this->request_url); ?>" enctype="multipart/form-data"
      name="adminForm" id="adminForm">

    <table class="noshow">
        <tr>
            <td width="50%" valign="top">

                <?php if ($this->ftp): ?>
                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_ALLEVENTS_FTP_TITLE'); ?></legend>

                        <?php echo JText::_('COM_ALLEVENTS_FTP_DESC'); ?>

                        <?php if (JError::isError($this->ftp)): ?>
                            <p><?php echo JText::_($this->ftp->message); ?></p>
                        <?php endif; ?>

                        <table class="adminform nospace">
                            <tbody>
                            <tr>
                                <td width="120">
                                    <label for="username"><?php echo JText::_('COM_ALLEVENTS_USERNAME'); ?>:</label>
                                </td>
                                <td>
                                    <input type="text" id="username" name="username" class="input_box" size="70"
                                           value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td width="120">
                                    <label for="password"><?php echo JText::_('COM_ALLEVENTS_PASSWORD'); ?>:</label>
                                </td>
                                <td>
                                    <input type="password" id="password" name="password" class="input_box" size="70"
                                           value=""/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                <?php endif; ?>

                <fieldset class="adminform">
                    <legend><?php echo JText::_('COM_ALLEVENTS_SELECT_IMAGE_UPLOAD'); ?></legend>
                    <table class="admintable">
                        <tbody>
                        <tr>
                            <td>
                                <input class="inputbox" name="userfile" id="userfile" type="file"/>
                                <br/><br/>
                                <input class="button" type="submit"
                                       value="<?php echo JText::_('COM_ALLEVENTS_UPLOAD') ?>" name="adminForm"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </fieldset>

            </td>
            <td width="50%" valign="top">

                <fieldset class="adminform">
                    <legend><?php echo JText::_('COM_ALLEVENTS_ATTENTION'); ?></legend>
                    <table class="admintable">
                        <tbody>
                        <tr>
                            <td>
                                <b><?php echo JText::_('COM_ALLEVENTS_TARGET_DIRECTORY') . ':'; ?></b>
                                <?php
                                if ($this->task == 'vignetteimg') {
                                    echo "/images/com_allevents/vignettes/";
                                    $this->task = 'imagehandler.vignetteimgup';
                                } else if ($this->task == 'afficheimg') {
                                    echo "/images/com_allevents/affiches/";
                                    $this->task = 'imagehandler.afficheimgup';
                                } else if ($this->task == 'banniereimg') {
                                    echo "/images/com_allevents/bannieres/";
                                    $this->task = 'imagehandler.banniereimgup';
                                }
                                ?>
                                <br/>
                                <b><?php echo JText::_('COM_ALLEVENTS_IMAGE_FILESIZE') . ':'; ?></b> <?php echo $this->aesettings->sizelimit; ?>
                                kb<br/>

                                <?php
                                if ($this->aesettings->gddisabled == 0 || (imagetypes() & IMG_PNG)) {
                                    echo "<br /><span style='color:green'>" . JText::_('COM_ALLEVENTS_PNG_SUPPORT') . "</span>";
                                } else {
                                    echo "<br /><span style='color:red'>" . JText::_('COM_ALLEVENTS_NO_PNG_SUPPORT') . "</span>";
                                }
                                if ($this->aesettings->gddisabled == 0 || (imagetypes() & IMG_JPEG)) {
                                    echo "<br /><span style='color:green'>" . JText::_('COM_ALLEVENTS_JPG_SUPPORT') . "</span>";
                                } else {
                                    echo "<br /><span style='color:red'>" . JText::_('COM_ALLEVENTS_NO_JPG_SUPPORT') . "</span>";
                                }
                                if ($this->aesettings->gddisabled == 0 || (imagetypes() & IMG_GIF)) {
                                    echo "<br /><span style='color:green'>" . JText::_('COM_ALLEVENTS_GIF_SUPPORT') . "</span>";
                                } else {
                                    echo "<br /><span style='color:red'>" . JText::_('COM_ALLEVENTS_NO_GIF_SUPPORT') . "</span>";
                                }
                                ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </fieldset>

            </td>
        </tr>
    </table>

    <?php if ($this->aesettings->gddisabled) { ?>

        <table class="noshow">
            <tr>
                <td>

                    <fieldset class="adminform">
                        <legend><?php echo JText::_('COM_ALLEVENTS_ATTENTION'); ?></legend>
                        <table class="admintable">
                            <tbody>
                            <tr>
                                <td class="center">
                                    <?php echo JText::_('COM_ALLEVENTS_GD_WARNING'); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>

                </td>
            </tr>
        </table>

    <?php } ?>

    <?php echo JHtml::_('form.token'); ?>
    <input type="hidden" name="option" value="com_allevents"/>
    <input type="hidden" name="task" value="<?php echo $this->task; ?>"/>
    <input type="hidden" name="pid" value="<?php echo $this->pid; ?>"/>
</form>