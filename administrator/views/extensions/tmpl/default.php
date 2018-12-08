<?php
/**
 * @version        %%ae3.version%%
 * @package        %%ae3.package%%
 * @copyright      %%ae3.copyright%%
 * @license        %%ae3.license%%
 * @author         %%ae3.author%%
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.framework');
JHtml::_('behavior.tooltip');
JHtml::_('bootstrap.popover');
JHtml::_('behavior.modal');
$document = JFactory::getDocument();
$config = JComponentHelper::getParams('com_allevents');
$user = JFactory::getUser();
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/ckbox.css');
$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/extensionsmanagerck.css');
$document->addScript(JUri::root(true) . '/media/com_allevents/js/ckbox.js');
$document->addScript(JUri::root(true) . '/media/com_allevents/js/extensionsmanagerck.js');
?>
<table class="table table-striped table-hover" id="extensionsList">
    <thead>
    <tr>
        <th class="left">
            <?php echo JText::_('AE_NAME'); ?>
        </th>
        <th class="">
            <?php echo JText::_('AE_TYPE'); ?>
        </th>
        <th class="center">
            <?php echo JText::_('AE_INSTALLED_VERSION'); ?>
        </th>
        <th class="center">
            <?php echo JText::_('AE_LATEST_VERSION'); ?>
        </th>
        <th class="center">

        </th>
        <th class="">
            <?php echo JText::_('AE_ACTION'); ?>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($this->items as $i => $item) :
        if ($item->type == 'group') {
            ?>
            <tr>
                <th colspan="7" class="ckheading">
                    <?php echo $item->name; ?>
                </th>
            </tr>
            <?php
        } else {
            ?>
            <tr class="row<?php echo $i % 2; ?> ckextension"
                data-installed="<?php echo $item->isInstalled ?>"
                data-element="<?php echo $item->element ?>"
                data-type="<?php echo $item->types[0] ?>"
                data-folder="<?php echo $item->folder ?>"
                data-updatexml="<?php echo $item->updatexml ?>"
                data-downloadid="<?php echo $item->downloadid ?>"
            >
                <td>
                    <?php echo " - " . $item->name; ?>
                </td>
                <td>
                    <?php
                    $icon = '';
                    foreach ($item->types as $type) :
                        switch ($type) {
                            case 'mod':
                                $icon = '<span class="label label-important">M</span>';
                                break;
                            case 'plg':
                                $icon = '<span class="label label-info">P</span>';
                                break;
                            case 'plg_system':
                                $icon = '<span class="label label-info">P<small>S</small></span>';
                                break;
                            case 'plg_editors-xtd':
                                $icon = '<span class="label label-info">P<small>B</small></span>';
                                break;
                            case 'com':
                                $icon = '<span class="label label-success">C</span>';
                                break;
                        }
                        echo $icon;
                    endforeach;
                    ?>
                </td>
                <td class="center ckinstalledversion">
                    <span class="badge"><?php echo $item->installedVersion; ?></span>
                </td>
                <td class="center cklatestversion">
                    <span class="badge"><span>Loading ...</span></span>
                </td>
                <td class="center ckreleasenotes">
                    <span style="display:none;" class="btn btn-small ckreleasenotesbtn" style=""
                          onclick="ckShowReleaseNotes(this)"><?php echo JText::_('AE_SEE_RELEASE_NOTES') ?></span>
                    <div style="display:none;" class="ckreleasenotespopup"
                         id="ckreleasenotespopup<?php echo $i ?>"></div>
                </td>
                <td>
                    <?php if ($user->authorise('core.admin', 'com_installer') && $user->authorise('core.manage', 'com_installer')) { ?>
                        <?php if (!$item->ispaid) { ?>
                            <?php if (!$item->isInstalled && $item->downloadid) { ?>
                                <span class="btn btn-info btn-small ckinstallbtn" style=""
                                      onclick="ckInstallExt(this)"><?php echo JText::_('AE_INSTALL') ?></span>
                            <?php } ?>
                            <span class="btn btn-warning btn-small ckupdatebtn" style="display:none;"
                                  onclick="ckInstallExt(this)"><?php echo JText::_('AE_UPDATE') ?></span>
                        <?php } else { ?>
                            <a class="btn btn-info btn-small ckupdatebtn" style=""
                               href="http://www.joomlack.fr/index.php?option=com_dms&view=document&id=<?php echo $item->downloadid ?>"
                               target="_blank"><?php echo JText::_('AE_PURCHASE') ?></a>
                        <?php } ?>
                    <?php } ?>
                </td>
                <td>
                    <?php /*if ($item->isInstalled) : ?>
                            <span class="btn btn-danger btn-small" onclick="ckUninstall()"><?php echo JText::_('AE_UNINSTALL') ?></span>
                        <?php endif;*/ ?>
                </td>
            </tr>
        <?php } ?>
    <?php endforeach; ?>
    </tbody>
</table>