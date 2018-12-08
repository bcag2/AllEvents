<?php
/**
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.modal');
$document = JFactory::getDocument();

$document->addStyleSheet(JUri::root(true) . '/media/com_allevents/css/allevents.css');
?>

<?php if (!empty($this->sidebar)): ?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
    <?php else : ?>
    <div id="j-main-container">
        <?php endif; ?>

        <?php
        $xml = simplexml_load_file(JPATH_SITE . '/administrator/components/com_allevents/allevents.xml');
        $version = (string)$xml->version;
        echo '<table><tr><td><img style="width: 400px;" src="../media/com_allevents/css/images/allevents.png" /></td><td width="10px"></td><td style="font-size: 20px"><b>' . JText::_('COM_ALLEVENTS') . '<span style="font-size: 11px"> v ' . $version . ' </span></b><br /><span style="font-size: 16px; color:#555555;">' . JText::_('COM_ALLEVENTS_XML_DESC') . '</span><br /><br /><span style="font-size: 13px">&#8226; <b>' . JText::_('COM_ALLEVENTS_FEATURES_LANGUAGES') . '</b> English <img src="../media/mod_languages/images/en.gif" height="10px"/> - French <img src="../media/mod_languages/images/fr.gif" height="10px"/><br />' . '<br />&#8226; ' . JText::_('COM_ALLEVENTS_FEATURES_BACKEND') . '<br />&#8226; ' . JText::_('COM_ALLEVENTS_FEATURES_FRONTEND') . '<br /></span></td></tr></table><br /><br />';
        ?>

        <div class="span4">
            <div>
                <a href="https://www.allevents3.com/">Blog AllEvents</a><br/>
                <a href="http://www.facebook.com/com.allevents">Facebook Fan page</a><br/>
                <a href="http://twitter.com/elecoest">Twitter page</a><br/>
                <a href="https://bitbucket.org/elecoest/ae3/issues/new">Remonter un bug</a><br/>
            </div>
            <br/>
            <?php echo JText::_('AE_CREDITS_DESC'); ?>
            <div class="span6">
                <div style="width: 100%;padding:0;">
                    <strong><?php echo JText::_('AE_SUPPORT_DESC'); ?></strong>
                    <br>
                    <?php
                    jimport("joomla.filesystem.folder");
                    $apps = [];

                    // Joomla
                    $app = new stdClass();
                    $app->name = "Joomla";
                    $version = new JVersion();
                    $app->version = $version->getShortVersion();
                    $apps[$app->name] = $app;

                    // components (including Allevents)
                    $xmlfiles3 = array_merge(JFolder::files(JPATH_ADMINISTRATOR . "/components", "manifest\.xml", true, true),
                        JFolder::files(JPATH_ADMINISTRATOR . "/components", "sh404sef\.xml", true, true),
                        JFolder::files(JPATH_ADMINISTRATOR . "/components", "virtuemart\.xml", true, true),
                        JFolder::files(JPATH_ADMINISTRATOR . "/components", "jce\.xml", true, true),
                        JFolder::files(JPATH_ADMINISTRATOR . "/components", "jcomments\.xml", true, true),
                        JFolder::files(JPATH_ADMINISTRATOR . "/components", "jmailalerts\.xml", true, true),
                        JFolder::files(JPATH_ADMINISTRATOR . "/components", "allevents\.xml", true, true),
                        JFolder::files(JPATH_ADMINISTRATOR . "/components", "hikashop\.xml", true, true)
                    );
                    foreach ($xmlfiles3 as $manifest) {
                        $manifestdata = JInstaller::parseXMLInstallFile($manifest);
                        $app = new stdClass();
                        $app->name = $manifestdata["name"];
                        $app->version = $manifestdata["version"];
                        // is sh404sef disabled ?
                        if (basename(dirname($manifest)) == "com_sh404sef") {
                            if (is_callable("Sh404sefFactory::getConfig")) {
                                $sefConfig = Sh404sefFactory::getConfig();
                                if (!$sefConfig->Enabled) {
                                    $app->version = $manifestdata["version"] . " (Disabled in SH404 settings)";
                                }
                            } else {
                                $app->version = $manifestdata["version"] . " (sh404sef system plugins not enabled)";
                            }
                        }
                        $name = "component_" . basename(dirname($manifest));
                        $apps[$name] = $app;
                    }

                    // modules
                    if (JFolder::exists(JPATH_SITE . "/modules")) {
                        $xmlfiles4 = JFolder::files(JPATH_SITE . "/modules", "\.xml", true, true);
                    } else {
                        $xmlfiles4 = [];
                    }
                    foreach ($xmlfiles4 as $manifest) {
                        if (strpos($manifest, "mod_ae") === false)
                            continue;

                        $manifestdata = JInstaller::parseXMLInstallFile($manifest);

                        $app = new stdClass();
                        $app->name = $manifestdata["name"];
                        $app->version = $manifestdata["version"];
                        $app->criticalversion = "";
                        $name = "module_" . str_replace(".xml", "", basename($manifest));
                        $apps[$name] = $app;
                    }

                    $output = "<textarea rows='20' cols='80' class='versionsinfo' style='width: 100%;'>[code]\n";
                    $output .= "PHP Version : " . phpversion() . "\n";
                    $output .= "MySQL Version : " . JFactory::getDbo()->getVersion() . "\n";
                    foreach ($apps as $appname => $app) {
                        $output .= "$appname : $app->version\n";
                    }
                    $output .= "[/code]</textarea>";
                    echo $output;
                    ?>
                </div>
            </div>
        </div>

        <div class="se_footer">
            %%ae3.copyright%%
            <a href="https://www.allevents3.com/"><img width="120" title="AllEvents - visit the website" target="_blank"
                                                       alt="AllEvents"
                                                       src="../media/com_allevents/css/images/allevents.png"></a>
            <a target="_blank" href="https://twitter.com/elecoest"><img title="Get in Touch, follow us on Twitter"
                                                                        alt="Follow us on Twitter"
                                                                        src="../media/com_allevents/css/images/follow-us-on-twitter.png"></a>
            <a target="_blank" href="https://www.facebook.com/com.allevents"><img
                    title="Stay informed, follow us on Facebook" alt="Follow us on Facebook"
                    src="../media/com_allevents/css/images/follow-us-on-facebook.png"></a>
        </div>

        <div class="se_footer">
            <table
                style="float:left;visibility:visible !important;background-color:#D0E0D0;border:1px dashed #5D84A9;">
                <tbody>
                <tr>
                    <td width="85px">
                        <a target="_blank" href="https://www.allevents3.com/presentation">
                            <img
                                style="visibility:visible !important;"
                                alt="paypal"
                                src="<?php echo JUri::root(true); ?>/media/com_allevents/css/images/paypal.png">
                        </a>
                    </td>
                    <td style="vertical-align:middle;width:350px;"><?php echo JText::_('COM_ALLEVENTS_GIVE_PAYPAL'); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>