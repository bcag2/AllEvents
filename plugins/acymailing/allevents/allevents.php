<?php
defined('_JEXEC') or die;
/**
 * plgAcymailingallevents
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */

if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * Class plgAcymailingallevents
 */
class plgAcymailingallevents extends JPlugin
{
    /**
     * plgAcymailingallevents constructor()
     *
     * @param mixed $subject
     * @param mixed $config
     *
     */
    public function __construct(&$subject, $config)
    {
        parent::__construct($subject, $config);
        $this->name = 'allevents';
        if (!isset($this->params)) {
            $plugin = JPluginHelper::getPlugin('acymailing', $this->name);
            $this->params = new JParameter($plugin->params);
        }

        $this->acypluginsHelper = acymailing_get('helper.acyplugins');
        //check if the component is installed
        $this->component_installed = file_exists(JPATH_SITE . DS . 'components' . DS . 'com_allevents');
    }

    /**
     * plgAcymailingallevents::acymailing_getPluginType()
     *
     * @return null|stdClass
     * @throws Exception
     */
    function acymailing_getPluginType()
    {
        $app = JFactory::getApplication();
        if (!$this->component_installed || ($this->params->get('frontendaccess') == 'none' && !$app->isAdmin())) {
            return null;
        }
        $onePlugin = new stdClass();
        $onePlugin->name = 'AllEvents';
        $onePlugin->function = 'acymailing_' . $this->name . '_show';
        $onePlugin->help = 'plugin-' . $this->name;

        return $onePlugin;
    }

    /**
     * plgAcymailingallevents::acymailing_allevents_show()
     *
     * @throws Exception
     */
    function acymailing_allevents_show()
    {
        $config = acymailing_config();

        if ($config->get('version') < '4.9.2') {
            acymailing_display('Please download and install the latest AcyMailing version otherwise this plugin will NOT work', 'error');

            return;
        }

        $app = JFactory::getApplication();

        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);

        $pageInfo = new stdClass();
        $pageInfo->filter = new stdClass();
        $pageInfo->filter->order = new stdClass();
        $pageInfo->limit = new stdClass();
        $pageInfo->elements = new stdClass();

        $paramBase = ACYMAILING_COMPONENT . '.' . $this->name;

        $pageInfo->filter->order->value = $app->getUserStateFromRequest($paramBase . ".filter_order", 'filter_order', 'a.id', 'cmd');
        $pageInfo->filter->order->dir = $app->getUserStateFromRequest($paramBase . ".filter_order_Dir", 'filter_order_Dir', 'asc', 'word');
        if (strtolower($pageInfo->filter->order->dir) !== 'desc')
            $pageInfo->filter->order->dir = 'asc';
        $pageInfo->search = $app->getUserStateFromRequest($paramBase . ".search", 'search', '', 'string');
        $pageInfo->search = strtolower(trim($pageInfo->search));
        $pageInfo->filter_agenda = $app->getUserStateFromRequest($paramBase . ".filter_agenda", 'filter_agenda', '', 'int');
        $pageInfo->filter_type = $app->getUserStateFromRequest($paramBase . ".filter_type", 'filter_type', '', 'int');
        $pageInfo->limit->value = $app->getUserStateFromRequest($paramBase . '.list_limit', 'limit', $app->get('list_limit'), 'int');
        $pageInfo->limit->start = $app->getUserStateFromRequest($paramBase . '.limitstart', 'limitstart', 0, 'int');
        $pageInfo->contentfilter = $app->getUserStateFromRequest($paramBase . ".contentfilter", 'contentfilter', 'created', 'string');
        $pageInfo->contentorder = $app->getUserStateFromRequest($paramBase . ".contentorder", 'contentorder', 'id', 'string');
        $pageInfo->contentorderdir = $app->getUserStateFromRequest($paramBase . ".contentorderdir", 'contentorderdir', 'DESC', 'string');
        $pageInfo->cols = $app->getUserStateFromRequest($paramBase . ".cols", 'cols', '1', 'string');
        $pageInfo->pictheight = $app->getUserStateFromRequest($paramBase . ".pictheight", 'pictheight', '150', 'string');
        $pageInfo->pictwidth = $app->getUserStateFromRequest($paramBase . ".pictwidth", 'pictwidth', '150', 'string');
        $pageInfo->pict = $app->getUserStateFromRequest($paramBase . ".pict", 'pict', '1', 'string');
        $pageInfo->pictauto = $app->getUserStateFromRequest($paramBase . ".autopict", 'autopict', '1', 'string');
        $pageInfo->readmore = $app->getUserStateFromRequest($paramBase . ".readmore", 'readmore', '1', 'string');
        $pageInfo->readmoreauto = $app->getUserStateFromRequest($paramBase . ".readmoreauto", 'readmoreauto', '1', 'string');
        $pageInfo->wrap = $app->getUserStateFromRequest($paramBase . ".wrap", 'wrap', '0', 'string');
        $pageInfo->clickable = $app->getUserStateFromRequest($paramBase . ".clickable", 'clickable', '1', 'string');
        $pageInfo->clickableauto = $app->getUserStateFromRequest($paramBase . ".clickableauto", 'clickableauto', '1', 'string');

        $db = JFactory::getDbo();

        //the query's start
        $query = 'SELECT SQL_CALC_FOUND_ROWS a.*, b.titre AS agenda_titre FROM #__allevents_events AS a JOIN #__allevents_agenda AS b ON a.agenda_id = b.id ';

        //search fields...
        $searchFields = [
            'a.id',
            'a.titre',
            'b.titre'];

        //apply search fields
        if (!empty($pageInfo->search)) {
            $searchVal = '\'%' . acymailing_getEscaped($pageInfo->search, true) . '%\'';
            $filters[] = implode(" LIKE $searchVal OR ", $searchFields) . " LIKE " . $searchVal;
        }

        // we hide past events but we remove one day just to make sure we won't hide something we should not!
        // because it's a newsletter we focus onevents starting in the future; already running (multi-day) events are not new
        if ($this->params->get('hidepastevents', 'yes') == 'yes') {
            $filters[] = '(a.date >= ' . $db->quote(date('Y-m-d', time() - 86400)) . ')';
        }

        $filters[] = 'a.published = 1'; // prevent unpublished and trashed events, but also archived

        //only approved event ?
        if ($this->params->get('displaycontentapproval', 'all') == 'onlyapproved') {
            $filters[] = 'a.proposal = 0';
        }

        if ($this->params->get('showfeatured', 'yes') == 'yes') {
            $where[] = 'a.hot = 1';
        }

        //if the user filtered by category (agenda)
        if (!empty($pageInfo->filter_agenda))
            $filters[] = 'a.agenda_id = ' . intval($pageInfo->filter_agenda);

        //apply filters
        if (!empty($filters)) {
            $query .= ' WHERE (' . implode(') AND (', $filters) . ')';
        }

        //apply ordering
        if (!empty($pageInfo->filter->order->value)) {
            $query .= ' ORDER BY ' . $pageInfo->filter->order->value . ' ' . $pageInfo->filter->order->dir;
        }

        $db->setQuery($query, $pageInfo->limit->start, $pageInfo->limit->value);

        //load results
        $rows = $db->loadObjectList();

        //yellow highlighting on search matches
        if (!empty($pageInfo->search)) {
            $rows = acymailing_search($pageInfo->search, $rows);
        }

        if (!empty($rows[0]) && !isset($rows[0]->acy_created)) {
            $db->setQuery('ALTER TABLE `#__allevents_events` ADD `acy_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
            $db->execute();
        }

        //pagination
        $db->setQuery('SELECT FOUND_ROWS()');
        $pageInfo->elements->total = $db->loadResult();
        $pageInfo->elements->page = count($rows);

        jimport('joomla.html.pagination');
        $pagination = new JPagination($pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value);

        //is this an auto newsletter or a simple one ?
        $type = JFactory::getApplication()->input->getString('type');

        ?>
        <script language="javascript" type="text/javascript">
            <!--
            var selectedContents = [];
            function applyContent(contentid, rowClass) {
                <?php
                //we insert contents in the order the user selected it
                ?>
                var tmp = selectedContents.indexOf(contentid);
                if (tmp == -1) {
                    window.document.getElementById('content' + contentid).className = 'selectedrow';
                    selectedContents.push(contentid);
                } else {
                    window.document.getElementById('content' + contentid).className = rowClass;
                    delete selectedContents[tmp];
                }
                updateTag();
            }

            var selectedCat = [];
            function applyAuto(catid, rowClass) {
                if (catid == 'all') {
                    if (window.document.getElementById('cat' + catid).className == 'selectedrow') {
                        window.document.getElementById('catall').className = rowClass;
                    } else {
                        window.document.getElementById('cat' + catid).className = 'selectedrow';
                        for (key in selectedCat) {
                            if (!isNaN(key)) {
                                window.document.getElementById('cat' + key).className = rowClass;
                                delete selectedCat[key];
                            }
                        }
                    }
                } else {
                    window.document.getElementById('catall').className = 'row0';
                    if (selectedCat[catid]) {
                        window.document.getElementById('cat' + catid).className = rowClass;
                        delete selectedCat[catid];
                    } else {
                        window.document.getElementById('cat' + catid).className = 'selectedrow';
                        selectedCat[catid] = 'selectedone';
                    }
                }
                updateTagAuto();
            }

            function updateTag() {
                var tag = '';
                var otherinfo = '';
                var tmp = 0;

                <?php

                //add the fields the user wants to be displayed


                ?>
                for (var i = 0; i < document.adminForm.cbdisplay.length; i++) {
                    if (document.adminForm.cbdisplay[i].checked) {
                        if (tmp == 0) {
                            tmp += 1;
                            otherinfo += "| display:";
                            otherinfo += document.adminForm.cbdisplay[i].value;
                        } else {
                            otherinfo += ", ";
                            otherinfo += document.adminForm.cbdisplay[i].value;
                        }
                    }
                }

                <?php

                //is the titre clickable ?


                ?>
                for (var i = 0; i < document.adminForm.clickable.length; i++) {
                    if (document.adminForm.clickable[i].checked && document.adminForm.clickable[i].value == '0') {
                        otherinfo += '| nolink';
                    }
                }

                <?php

                //do we have to wrap the text ? (description for example...)


                ?>
                if (document.adminForm.wrap.value && document.adminForm.wrap.value != 0 && !isNaN(document.adminForm.wrap.value)) {
                    otherinfo += "| wrap:" + document.adminForm.wrap.value;
                }

                <?php

                //do we have to add a "read more" button ?


                ?>
                for (var i = 0; i < document.adminForm.readmore.length; i++) {
                    if (document.adminForm.readmore[i].checked && document.adminForm.readmore[i].value == '0') {
                        otherinfo += '| noreadmore';
                    }
                }

                <?php

                //picture management


                ?>
                for (var i = 0; i < document.adminForm.pict.length; i++) {
                    if (document.adminForm.pict[i].checked) {
                        if (document.adminForm.pict[i].value != '1') {
                            otherinfo += '| pict:' + document.adminForm.pict[i].value;
                        }

                        if (document.adminForm.pict[i].value == 'resized') {
                            document.getElementById('pictsize').style.display = '';
                            if (document.adminForm.pictwidth.value) {
                                otherinfo += '| maxwidth:' + document.adminForm.pictwidth.value;
                            }
                            if (document.adminForm.pictheight.value) {
                                otherinfo += '| maxheight:' + document.adminForm.pictheight.value;
                            }
                        } else {
                            document.getElementById('pictsize').style.display = 'none';
                        }
                    }
                }

                if (window.document.getElementById('jflang') && window.document.getElementById('jflang').value != '') {
                    otherinfo += '| language:' + window.document.getElementById('jflang').value;
                }

                <?php

                //insert the tags with the right order


                ?>
                for (i in selectedContents) {
                    if (selectedContents[i] && !isNaN(i)) {
                        tag = tag + '{<?php

                                echo $this->name;

                                ?>:' + selectedContents[i] + otherinfo + '}<br />';
                    }
                }
                setTag(tag);
            }


            function updateTagAuto() {
                var tag;
                var otherinfo = '';
                var tmp = 0;

                for (var i = 0; i < document.adminForm.cbdisplayauto.length; i++) {
                    if (document.adminForm.cbdisplayauto[i].checked) {
                        if (tmp == 0) {
                            tmp += 1;
                            otherinfo += "| display:";
                            otherinfo += document.adminForm.cbdisplayauto[i].value;
                        } else {
                            otherinfo += ", ";
                            otherinfo += document.adminForm.cbdisplayauto[i].value;
                        }
                    }
                }

                for (var i = 0; i < document.adminForm.clickableauto.length; i++) {
                    if (document.adminForm.clickableauto[i].checked && document.adminForm.clickableauto[i].value == '0') {
                        otherinfo += '| nolink';
                    }
                }

                if (document.adminForm.wrapauto.value && document.adminForm.wrapauto.value != 0 && !isNaN(document.adminForm.wrapauto.value)) {
                    otherinfo += "| wrap:" + document.adminForm.wrapauto.value;
                }

                for (var i = 0; i < document.adminForm.readmoreauto.length; i++) {
                    if (document.adminForm.readmoreauto[i].checked && document.adminForm.readmoreauto[i].value == '0') {
                        otherinfo += '| noreadmore';
                    }
                }

                //tmp = 0;
                for (var i = 0; i < document.adminForm.autopict.length; i++) {
                    if (document.adminForm.autopict[i].checked) {
                        if (document.adminForm.autopict[i].value != '1') {
                            otherinfo += '| pict:' + document.adminForm.autopict[i].value;
                        }

                        if (document.adminForm.autopict[i].value == 'resized') {
                            document.getElementById('pictsizeauto').style.display = '';
                            if (document.adminForm.pictwidthauto.value) {
                                otherinfo += '| maxwidth:' + document.adminForm.pictwidthauto.value;
                            }
                            if (document.adminForm.pictheightauto.value) {
                                otherinfo += '| maxheight:' + document.adminForm.pictheightauto.value;
                            }
                        } else {
                            document.getElementById('pictsizeauto').style.display = 'none';
                        }
                    }
                }

                <?php

                //on how many columns do we have to display the contents ?


                ?>
                if (document.adminForm.cols.value) {
                    otherinfo += "| cols:" + document.adminForm.cols.value;
                }

                <?php

                //limit the number of content displayed


                ?>
                if (document.adminForm.max_article.value) {
                    otherinfo += "| max:" + document.adminForm.max_article.value;
                }

                <?php

                //with what order will we display the contents


                ?>
                if (document.adminForm.contentorder.value) {
                    otherinfo += "| order:" + document.adminForm.contentorder.value + "," + document.adminForm.contentorderdir.value;
                }

                if (window.document.getElementById('jlang') && window.document.getElementById('jlang').value != '') {
                    otherinfo += '| lang:' + window.document.getElementById('jlang').value;
                }

                if (window.document.getElementById('jflangauto') && window.document.getElementById('jflangauto').value != '') {
                    otherinfo += '| language:' + window.document.getElementById('jflangauto').value;
                }

                <?php

                if ($type == 'autonews')
                {

                //minimum number of content for the newsletter to be displayed... yes, a perfect english !


                ?>
                if (document.adminForm.min_article.value) {
                    otherinfo += "| min:" + document.adminForm.min_article.value;
                }

                if (document.adminForm.mindelayevent && document.adminForm.mindelayevent.value && document.adminForm.mindelayevent.value > 0) {
                    otherinfo += '| mindelay:' + document.adminForm.mindelayevent.value;
                }
                if (document.adminForm.delayevent && document.adminForm.delayevent.value && document.adminForm.delayevent.value > 0) {
                    otherinfo += '| delay:' + document.adminForm.delayevent.value;
                }

                if (document.adminForm.contentfilter && document.adminForm.contentfilter.value != 0) {
                    otherinfo += "| filter:" + document.adminForm.contentfilter.value;
                }

                <?php

                }
                else
                {

                ?>
                if (document.adminForm.from_date && document.adminForm.from_date.value) {
                    otherinfo += '| from:' + document.adminForm.from_date.value;
                }
                if (document.adminForm.to_date && document.adminForm.to_date.value) {
                    otherinfo += '| to:' + document.adminForm.to_date.value;
                }
                <?php

                }

                ?>
                tag = '{auto<?php

                    echo $this->name;

                    ?>:';
                for (var icat in selectedCat) {
                    if (selectedCat[icat] == 'selectedone') {
                        tag += icat + '-';
                    }
                }
                tag += otherinfo + '}<br />';

                setTag(tag);
            }
            //-->
        </script>
        <?php

        // yes/no for the options
        $choice = [];
        $choice[] = JHtml::_('select.option', "1", JText::_('JOOMEXT_YES'));
        $choice[] = JHtml::_('select.option', "0", JText::_('JOOMEXT_NO'));

        // picture options
        $valImages = [];
        $valImages[] = JHtml::_('select.option', "1", JText::_('JOOMEXT_YES'));
        $valImages[] = JHtml::_('select.option', "resized", JText::_('RESIZED'));
        $valImages[] = JHtml::_('select.option', "0", JText::_('JOOMEXT_NO'));

        // filter options
        $contentfilter = [];
        $contentfilter[] = JHtml::_('select.option', "0", JText::_('ACY_ALL'));
        $contentfilter[] = JHtml::_('select.option', "created", JText::_('ONLY_NEW_CREATED'));

        // options for the Nb. columns dropdown (1 to 10)
        $column = [];
        for ($i = 1; $i < 11; $i++) {
            $column[] = JHtml::_('select.option', "$i", $i);
        }

        if (ACYMAILING_J30) {
            $paginationNb = [];
            $paginationNb[] = JHtml::_('select.option', 5, 5);
            $paginationNb[] = JHtml::_('select.option', 10, 10);
            $paginationNb[] = JHtml::_('select.option', 15, 15);
            $paginationNb[] = JHtml::_('select.option', 20, 20);
            $paginationNb[] = JHtml::_('select.option', 25, 25);
            $paginationNb[] = JHtml::_('select.option', 30, 30);
            $paginationNb[] = JHtml::_('select.option', 50, 50);
            $paginationNb[] = JHtml::_('select.option', 100, 100);
            $paginationNb[] = JHtml::_('select.option', 0, JText::_('ACY_ALL'));
        }

        $fieldsDisplay = [];
        $fieldsDisplay[] = [
            'titre' => 'titre',
            'label' => 'COM_ALLEVENTS_TITRE',
            'checked' => 'yes'];
        $fieldsDisplay[] = [
            'titre' => 'vignette',
            'label' => 'COM_ALLEVENTS_LEGEND_PICTURE',
            'checked' => 'yes'];
        $fieldsDisplay[] = [
            'titre' => 'desc',
            'label' => 'COM_ALLEVENTS_DESC',
            'checked' => 'yes'];
        $fieldsDisplay[] = [
            'titre' => 'place',
            'label' => 'PLACE',
            'checked' => 'yes'];
        $fieldsDisplay[] = [
            'titre' => 'tel',
            'label' => 'COM_ALLEVENTS_FORM_LBL_PLACE_PHONE',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'mail',
            'label' => 'JGLOBAL_EMAIL',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'site',
            'label' => 'LINK_URL',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'attach',
            'label' => 'COM_ALLEVENTS_FICHIER_ANNEXE',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'activity_titre',
            'label' => 'ACTIVITY',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'agenda_titre',
            'label' => 'AGENDA',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'category_titre',
            'label' => 'CATEGORY',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'place_titre',
            'label' => 'PLACE',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'public_titre',
            'label' => 'PUBLIC',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'ressource_titre',
            'label' => 'RESSOURCE',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'section_titre',
            'label' => 'SECTION',
            'checked' => ''];
        $fieldsDisplay[] = [
            'titre' => 'dates',
            'label' => 'COM_ALLEVENTS_FORM_LBL_EVENT_DATE',
            'checked' => ''];

        $contentfilter = [];
        $contentfilter[] = JHtml::_('select.option', "0", JText::_('ACY_ALL'));
        $contentfilter[] = JHtml::_('select.option', "created", JText::_('ONLY_NEW_CREATED'));
        $contentfilter[] = JHtml::_('select.option', "modified", JText::_('ONLY_NEW_MODIFIED'));

        $tabs = acymailing_get('helper.acytabs');

        echo $tabs->startPane($this->name . '_tab');

        // start the first tab
        echo $tabs->startPanel(JText::_('TAG_ELEMENTS'), $this->name . '_listings');

        ?>
        <br style="font-size:1px;"/>
        <table width="100%" class="adminform">
            <tr>
                <td nowrap="nowrap"><?php echo JText::_('DISPLAY'); ?></td>
                <?php

                $i = 1;
                foreach ($fieldsDisplay as $oneField) {
                    if ($i % 5 == 0) {
                        echo '</tr><tr><td/>';
                        $i++;
                    }
                    if ($i == 4) {
                        $jflanguages = acymailing_get('type.jflanguages');
                        $jflanguages->onclick = 'onchange="updateTag();"';
                        echo '<td>' . $jflanguages->display('jflang') . '</td></tr><tr><td/>';
                        $i += 2;
                    }
                    echo '<td nowrap="nowrap"><input type="checkbox" name="cbdisplay" value="' . $oneField['titre'] . '" id="' . $oneField['titre'] . '" ' . (($oneField['checked'] == 'yes') ? 'checked' : '') . ' onclick="updateTag();"/><label style="margin-left:5px" for="' . $oneField['titre'] . '">' . JText::_($oneField['label']) . '</label></td>';
                    $i++;
                }
                while ($i % 5 != 0) {
                    echo '<td></td>';
                    $i++;
                }

                ?>
            </tr>
            <tr>
                <td nowrap="nowrap"><?php

                    echo JText::_('CLICKABLE_TITLE');

                    ?></td>
                <td nowrap="nowrap" colspan="2"><?php

                    echo JHtml::_('acyselect.radiolist', $choice, 'clickable', 'size="1" onclick="updateTag();"', 'value', 'text', $pageInfo->clickable);

                    ?></td>

                <td nowrap="nowrap"><?php

                    echo JText::_('JOOMEXT_READ_MORE');

                    ?></td>
                <td nowrap="nowrap"><?php

                    echo JHtml::_('acyselect.radiolist', $choice, 'readmore', 'size="1" onclick="updateTag();"', 'value', 'text', $pageInfo->readmore);

                    ?>
            </tr>
            <tr>
                <td nowrap="nowrap" valign="top"><?php

                    echo JText::_('DISPLAY_PICTURES');

                    ?></td>
                <td nowrap="nowrap" colspan="2"><?php

                    echo JHtml::_('acyselect.radiolist', $valImages, 'pict', 'size="1" onclick="updateTag();"', 'value', 'text', $pageInfo->pict);

                    ?>
                    <span id="pictsize" <?php

                    if ($pageInfo->pict != 'resized')
                        echo 'style="display:none;"';

                    ?> ><br/>
                        <?php

                        echo JText::_('CAPTCHA_WIDTH');

                        ?>
                        <input name="pictwidth" type="text" onchange="updateTag();" value="<?php

                        echo $pageInfo->pictwidth;

                        ?>" style="width:30px;"/>
                        x <?php

                        echo JText::_('CAPTCHA_HEIGHT');

                        ?>
                        <input name="pictheight" type="text" onchange="updateTag();" value="<?php

                        echo $pageInfo->pictheight;

                        ?>" style="width:30px;"/>
                    </span>
                </td>
                <td nowrap="nowrap" colspan="2" valign="top"><?php

                    echo JText::sprintf('TRUNCATE_AFTER', '<input type="text" name="wrap" style="width:50px" value="0" onchange="updateTag();"/>');

                    ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <td nowrap="nowrap" width="100%">
                    <input placeholder="<?php

                    echo JText::_('ACY_SEARCH');

                    ?>" type="text" name="search" id="acymailingsearch" value="<?php

                    echo $pageInfo->search;

                    ?>" class="text_area" onchange="document.adminForm.submit();"/>
                    <button class="btn" onclick="this.form.submit();"><?php

                        echo JText::_('JOOMEXT_GO');

                        ?></button>
                    <button class="btn"
                            onclick="document.getElementById('acymailingsearch').value='';this.form.submit();"><?php

                        echo JText::_('JOOMEXT_RESET');

                        ?></button>
                </td>
                <td nowrap="nowrap">
                    <?php

                    echo $this->_agendas($pageInfo->filter_agenda);

                    ?>
                </td>
            </tr>
        </table>
        <table class="adminlist table table-striped table-hover" cellpadding="1" width="100%">
            <thead>
            <tr>
                <th></th>
                <th class="title">
                    <?php

                    echo JHtml::_('grid.sort', JText::_('COM_ALLEVENTS_TITRE'), 'a.titre', $pageInfo->filter->order->dir, $pageInfo->filter->order->value);

                    ?>
                </th>
                <th class="title">
                    <?php

                    echo JHtml::_('grid.sort', JText::_('AGENDA'), 'b.titre', $pageInfo->filter->order->dir, $pageInfo->filter->order->value);

                    ?>
                </th>
                <th class="title">
                    <?php

                    echo JHtml::_('grid.sort', JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_DATE'), 'a.date', $pageInfo->filter->order->dir, $pageInfo->filter->order->value);

                    ?>
                </th>
                <th class="title titleid">
                    <?php

                    echo JHtml::_('grid.sort', JText::_('ACY_ID'), 'a.id', $pageInfo->filter->order->dir, $pageInfo->filter->order->value);

                    ?>
                </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="5">
                    <?php

                    echo $pagination->getListFooter();
                    if (ACYMAILING_J30)
                        echo 'Display #' . JHtml::_('select.genericlist', $paginationNb, 'limit', 'size="1" style="width:60px" onchange="Joomla.submitform();"', 'value', 'text', $pageInfo->limit->value) . '<br />';
                    echo $pagination->getResultsCounter();

                    ?>
                </td>
            </tr>
            </tfoot>
            <tbody>
            <?php

            $k = 0;
            if (!empty($rows)) {
                foreach ($rows as $row) {

                    ?>
                    <tr id="content<?php

                    echo $row->id;

                    ?>" class="<?php

                    echo "row$k";

                    ?>" onclick="applyContent(<?php

                    echo $row->id . ",'row$k'";

                    ?>);" style="cursor:pointer;">
                        <td class="acytdcheckbox"></td>
                        <td style="text-align:center;">
                            <?php if (!empty($row->titre)) echo $row->titre; ?>
                        </td>
                        <td style="text-align:center;">
                            <?php if (!empty($row->activity_titre)) echo $row->activity_titre; ?>
                        </td>
                        <td style="text-align:center;">
                            <?php if (!empty($row->agenda_titre)) echo $row->agenda_titre; ?>
                        </td>
                        <td style="text-align:center;">
                            <?php if (!empty($row->category_titre)) echo $row->category_titre; ?>
                        </td>
                        <td style="text-align:center;">
                            <?php if (!empty($row->place_titre)) echo $row->place_titre; ?>
                        </td>
                        <td style="text-align:center;">
                            <?php if (!empty($row->public_titre)) echo $row->public_titre; ?>
                        </td>
                        <td style="text-align:center;">
                            <?php if (!empty($row->ressource_titre)) echo $row->ressource_titre; ?>
                        </td>
                        <td style="text-align:center;">
                            <?php if (!empty($row->section_titre)) echo $row->section_titre; ?>
                        </td>

                        <td style="text-align:center;">
                            <?php

                            if (!empty($row->date) && $row->date != '0000-00-00 00:00:00') {
                                echo acymailing_getDate(acymailing_getTime($row->date), JText::_('DATE_FORMAT_LC'));
                            } else {
                                $row->dates = unserialize($row->dates);
                                foreach ($row->dates as $oneDate) {
                                    if ($oneDate == '0000-00-00 00:00:00')
                                        continue;
                                    echo acymailing_getDate(acymailing_getTime($oneDate), JText::_('DATE_FORMAT_LC')) . '<br />';
                                }
                            }

                            ?>
                        </td>
                        <td style="text-align:center;">
                            <?php

                            echo $row->id;

                            ?>
                        </td>
                    </tr>
                    <?php

                    // this enables to know if we have to set the line background grey or white
                    $k = 1 - $k;
                }
            }

            ?>
            </tbody>
        </table>
        <input type="hidden" name="boxchecked" value="0"/>
        <input type="hidden" name="filter_order" value="<?php

        echo $pageInfo->filter->order->value;

        ?>"/>
        <input type="hidden" name="filter_order_Dir" value="<?php

        echo $pageInfo->filter->order->dir;

        ?>"/>

        <?php

        echo $tabs->endPanel();
        // start category tab
        echo $tabs->startPanel(JText::_('UPCOMING_EVENTS'), $this->name . '_auto');

        ?>

        <br style="font-size:1px;"/>
        <table width="100%" class="adminform">
            <tr>
                <td nowrap="nowrap"><?php echo JText::_('DISPLAY'); ?></td>
                <?php

                $i = 1;
                foreach ($fieldsDisplay as $oneField) {
                    if ($i % 5 == 0) {
                        echo '</tr><tr><td/>';
                        $i++;
                    }

                    if ($i == 4) {
                        $jflanguages->onclick = 'onchange="updateTagAuto();"';
                        $jflanguages->id = 'jflangauto';
                        $langField = $jflanguages->display('jflangauto');
                        if (empty($langField) && $jflanguages->multilingue)
                            $langField = $jflanguages->displayJLanguages('jlang');

                        echo '<td>' . $langField . '</td></tr><tr><td/>';
                        $i += 2;
                    }
                    echo '<td nowrap="nowrap"><input type="checkbox" name="cbdisplayauto" value="' . $oneField['titre'] . '" id="' . $oneField['titre'] . 'auto" ' . (($oneField['checked'] == 'yes') ? 'checked' : '') . ' onclick="updateTagAuto();"/><label style="margin-left:5px" for="' . $oneField['titre'] . 'auto">' . JText::_($oneField['label']) . '</label></td>';
                    $i++;
                }
                while ($i % 5 != 0) {
                    echo '<td></td>';
                    $i++;
                }

                ?>
            </tr>
            <tr>
                <td nowrap="nowrap"><?php

                    echo JText::_('CLICKABLE_TITLE');

                    ?></td>
                <td nowrap="nowrap" colspan="2"><?php

                    echo JHtml::_('acyselect.radiolist', $choice, 'clickableauto', 'size="1" onclick="updateTagAuto();"', 'value', 'text', $pageInfo->clickableauto);

                    ?></td>
                <td nowrap="nowrap"><?php

                    echo JText::_('JOOMEXT_READ_MORE');

                    ?></td>
                <td nowrap="nowrap"><?php

                    echo JHtml::_('acyselect.radiolist', $choice, 'readmoreauto', 'size="1" onclick="updateTagAuto();"', 'value', 'text', $pageInfo->readmoreauto);

                    ?>
            </tr>
            <tr>
                <td nowrap="nowrap" valign="top">
                    <?php

                    echo JText::_('DISPLAY_PICTURES');

                    ?>
                </td>
                <td nowrap="nowrap" colspan="2"><?php

                    echo JHtml::_('acyselect.radiolist', $valImages, 'autopict', 'size="1" onclick="updateTagAuto();"', 'value', 'text', $pageInfo->pictauto);

                    ?>
                    <span id="pictsizeauto" <?php

                    if ($pageInfo->pictauto != 'resized')
                        echo 'style="display:none;"';

                    ?> ><br/>
                        <?php

                        echo JText::_('CAPTCHA_WIDTH');

                        ?>
                        <input name="pictwidthauto" type="text" onchange="updateTagAuto();" value="<?php

                        echo $pageInfo->pictwidth;

                        ?>" style="width:30px;"/>
                        x <?php

                        echo JText::_('CAPTCHA_HEIGHT');

                        ?>
                        <input name="pictheightauto" type="text" onchange="updateTagAuto();" value="<?php

                        echo $pageInfo->pictheight;

                        ?>" style="width:30px;"/>
                    </span>
                </td>
                <td nowrap="nowrap" colspan="2" valign="top"><?php

                    echo JText::sprintf('TRUNCATE_AFTER', '<input type="text" name="wrapauto" style="width:50px" value="0" onchange="updateTagAuto();"/>');

                    ?></td>
            </tr>
            <tr>
                <td nowrap="nowrap" nowrap="nowrap">
                    <?php

                    echo JText::_('MAX_ARTICLE');

                    ?>
                </td>
                <td nowrap="nowrap" colspan="2">
                    <input type="text" name="max_article" style="width:50px;" value="20" onchange="updateTagAuto();"/>
                </td>
                <td nowrap="nowrap">
                    <?php

                    echo JText::_('ACY_ORDER');

                    ?>
                </td>
                <td nowrap="nowrap">
                    <?php

                    $values = [
                        'id' => 'ACY_ID',
                        'date' => 'COM_ALLEVENTS_EVENTS_DATE',
                        'enddate' => 'ENDDATE',
                        'titre' => 'COM_ALLEVENTS_TITRE'];
                    echo $this->acypluginsHelper->getOrderingField($values, $pageInfo->contentorder, $pageInfo->contentorderdir);

                    ?>
                </td>
            </tr>
            <?php

            if ($type == 'autonews') {

                ?>
                <tr>
                    <td nowrap>
                        <?php

                        echo JText::_('MIN_ARTICLE');

                        ?>
                    </td>
                    <td nowrap colspan="2">
                        <input type="text" name="min_article" style="width:50px;" value="1"
                               onchange="updateTagAuto();"/>
                    </td>
                    <td nowrap>
                        <?php

                        echo JText::_('FIELD_COLUMNS');

                        ?>
                    </td>
                    <td nowrap>
                        <?php

                        echo JHtml::_('select.genericlist', $column, 'cols', 'size="1" onchange="updateTagAuto();" style="width:100px;"', 'value', 'text', $pageInfo->cols);

                        ?>
                    </td>
                </tr>
                <tr>
                    <td nowrap>
                        <?php

                        echo JText::_('ACY_FROM_DATE');

                        ?>
                    </td>
                    <td nowrap colspan="2">
                        <?php

                        $delayType = acymailing_get('type.delay');
                        $delayType->onChange = "updateTagAuto();";
                        echo $delayType->display('mindelayevent', 0, 3);

                        ?>
                    </td>
                    <td nowrap>
                        <?php

                        echo JText::_('ACY_TO_DATE');

                        ?>
                    </td>
                    <td nowrap>
                        <?php

                        $delayType = acymailing_get('type.delay');
                        $delayType->onChange = "updateTagAuto();";
                        echo $delayType->display('delayevent', 7776000, 3);

                        ?>
                    </td>
                </tr>
                <tr>
                    <td nowrap="nowrap">
                        <?php

                        echo JText::_('JOOMEXT_FILTER');

                        ?>
                    </td>
                    <td nowrap="nowrap" colspan="4">
                        <?php

                        echo JHtml::_('select.genericlist', $contentfilter, 'contentfilter', 'size="1" onchange="updateTagAuto();"', 'value', 'text', $pageInfo->contentfilter);

                        ?>
                    </td>
                </tr>
                <?php

            } else {

                ?>
                <tr>
                    <td nowrap>
                        <?php

                        echo JText::_('ACY_FROM_DATE');

                        ?>
                    </td>
                    <td nowrap colspan="2">
                        <?php

                        echo JHtml::_('calendar', '', 'from_date', 'from_date', '%Y-%m-%d', ['style' => 'width:80px', 'onchange' => 'updateTagAuto();']);

                        ?>
                    </td>
                    <td nowrap>
                        <?php

                        echo JText::_('ACY_TO_DATE');

                        ?>
                    </td>
                    <td nowrap>
                        <?php

                        echo JHtml::_('calendar', '', 'to_date', 'to_date', '%Y-%m-%d', ['style' => 'width:80px', 'onchange' => 'updateTagAuto();']);

                        ?>
                    </td>
                </tr>
                <tr>
                    <td nowrap>
                        <?php

                        echo JText::_('FIELD_COLUMNS');

                        ?>
                    </td>
                    <td nowrap colspan="4">
                        <?php

                        echo JHtml::_('select.genericlist', $column, 'cols', 'size="1" onchange="updateTagAuto();" style="width:100px;"', 'value', 'text', $pageInfo->cols);

                        ?>
                    </td>
                </tr>
                <?php

            }

            ?>
        </table>
        <!--====================================================================================LISTE CATEGORIES===========================================================================-->
        <table class="adminlist table table-striped table-hover" cellpadding="1" width="100%">
            <?php

            $k = 0;

            ?>
            <tr id="catall" class="<?php

            echo "row$k";

            ?>" onclick="applyAuto('all','<?php

            echo "row$k";

            ?>');" style="cursor:pointer;">
                <td class="acytdcheckbox"></td>
                <td>
                    <?php

                    echo JText::_('ACY_ALL');

                    ?>
                </td>
            </tr>
            <?php

            if (!empty($this->agendavalues)) {
                foreach ($this->agendavalues as $oneAgenda) {
                    if (empty($oneAgenda->value))
                        continue;

                    ?>
                    <tr id="cat<?php

                    echo $oneAgenda->value;

                    ?>" class="<?php

                    echo "row$k";

                    ?>" onclick="applyAuto(<?php

                    echo $oneAgenda->value;

                    ?>,'<?php

                    echo "row$k";

                    ?>');" style="cursor:pointer;">
                        <td class="acytdcheckbox"></td>
                        <td>
                            <?php

                            echo $oneAgenda->text;

                            ?>
                        </td>
                    </tr>
                    <?php

                    $k = 1 - $k;
                }
            }

            ?>
        </table>
        <?php

        echo $tabs->endPanel();
        echo $tabs->endPane();
    }

    /**
     * plgAcymailingallevents::_agendas()
     *
     * @param mixed $filter_agenda
     *
     * @return mixed
     */
    function _agendas($filter_agenda)
    {
        //select all cats
        $db = JFactory::getDbo();
        $db->setQuery('SELECT id, titre FROM #__allevents_agenda ORDER BY titre ASC');
        $mosetAgendas = $db->loadObjectList();
        $this->agendavalues = [];
        $this->agendavalues[] = JHtml::_('select.option', 0, JText::_('ACY_ALL'));
        if (!empty($mosetAgendas))
            foreach ($mosetAgendas as $oneAgenda)
                $this->agendavalues[] = JHtml::_('select.option', $oneAgenda->id, $oneAgenda->titre);;

        return JHtml::_('select.genericlist', $this->agendavalues, 'filter_agenda', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', intval($filter_agenda));
    }

    /**
     * plgAcymailingallevents::acymailing_replacetags()
     *
     * @param mixed $email
     */
    function acymailing_replacetags(&$email)
    {
        $this->_replaceAuto($email);
        $this->_replaceOne($email);
    }

    /**
     * plgAcymailingallevents::_replaceAuto()
     *
     * @param mixed $email
     */
    function _replaceAuto(&$email)
    {
        $this->acymailing_generateautonews($email);

        if (!empty($this->tags)) {
            $email->body = str_replace(array_keys($this->tags), $this->tags, $email->body);

            if (!empty($email->altbody))
                $email->altbody = str_replace(array_keys($this->tags), $this->tags, $email->altbody);

            foreach ($this->tags as $tag => $result) {
                $email->subject = str_replace($tag, strip_tags(preg_replace('#</tr>[^<]*<tr[^>]*>#Uis', ' | ', $result)), $email->subject);
            }
        }
    }

    /**
     * plgAcymailingallevents::acymailing_generateautonews()
     *
     * @param mixed $email
     *
     * @return stdClass
     */
    function acymailing_generateautonews(&$email)
    {
        $acypluginsHelper = acymailing_get('helper.acyplugins');

        $db = JFactory::getDbo();
        $time = time();

        //load the tags
        $tags = $acypluginsHelper->extractTags($email, 'auto' . $this->name);
        $return = new stdClass();
        $return->status = true;
        $return->message = '';
        $this->tags = [];

        if (empty($tags))
            return $return;

        foreach ($tags as $oneTag => $parameter) {
            if (isset($this->tags[$oneTag]))
                continue;

            if (empty($parameter->order))
                $parameter->order = 'a.date ASC';
            if (empty($parameter->from))
                $parameter->from = date('Y-m-d H:i:s', $time);

            $allcats = explode('-', $parameter->id);
            //Load the articles based on all arguments...
            $selectedArea = [];

            foreach ($allcats as $oneAgenda) {
                if (empty($oneAgenda))
                    continue;
                $selectedArea[] = 'a.agenda_id = ' . intval($oneAgenda);
            }


            $query = 'SELECT a.id FROM #__allevents_events AS a JOIN #__allevents_agenda AS b ON a.agenda_id = b.id ';
            $where = [];

            if (!empty($selectedArea)) {
                $where[] = implode(' OR ', $selectedArea);
            }

            $where[] = 'a.published = 1';
            if (empty($parameter->allaccess))
                $where[] = 'a.access = 1';

            if (!empty($parameter->filter) && !empty($email->params['lastgenerateddate'])) {
                if ($parameter->filter == 'created') {
                    $where[] = 'a.acy_created > \'' . date('Y-m-d H:i:s', $email->params['lastgenerateddate'] - date('Z')) . '\'';
                } elseif ($parameter->filter == 'modified') {
                    $where[] = 'a.acy_created > \'' . date('Y-m-d H:i:s', $email->params['lastgenerateddate'] - date('Z')) . '\' OR a.modified > \'' . date('Y-m-d H:i:s', $email->params['lastgenerateddate'] - date('Z')) . '\'';
                }
            }

            if (!empty($parameter->unapproved))
                $where[] = 'a.proposal = 1';
            else
                $where[] = 'a.proposal = 0';

            if (!empty($parameter->addcurrent)) {
                //not finished and next events
                $where[] = 'a.enddate >= ' . $db->quote($parameter->from);
            } else {
                //not started events
                $where[] = 'a.date >= ' . $db->quote($parameter->from);
            }

            //should we display only events starting in the sending day ?
            if (!empty($parameter->todaysevent)) {
                $where[] = 'a.date <= ' . $db->quote(date('Y-m-d 23:59:59', $time));
            }

            if (!empty($parameter->mindelay))
                $where[] = 'a.date >= ' . $db->quote(date('Y-m-d H:i:s', $time + $parameter->mindelay));
            if (!empty($parameter->delay))
                $where[] = 'a.date <= ' . $db->quote(date('Y-m-d H:i:s', $time + $parameter->delay));
            if (!empty($parameter->to))
                $where[] = 'a.date <= ' . $db->quote($parameter->to);

            if (!empty($parameter->lang)) {
                $where[] = 'a.language = ' . $db->quote($parameter->lang);
            }

            $query .= ' WHERE (' . implode(') AND (', $where) . ')';

            // Ordering
            if (!empty($parameter->order)) {
                $ordering = explode(',', $parameter->order);
                if ($parameter->order == 'rand' || $ordering[0] == 'rand') {
                    $query .= ' ORDER BY rand()';
                } else {
                    $query .= ' ORDER BY a.' . acymailing_secureField(trim($ordering[0])) . ' ' . acymailing_secureField(trim($ordering[1]));
                }
            }

            if (!empty($parameter->max))
                $query .= ' LIMIT ' . intval($parameter->max);
            else
                $query .= ' LIMIT 20';

            $db->setQuery($query);
            $allArticles = acymailing_loadResultArray($db);

            if (!empty($parameter->min) && count($allArticles) < $parameter->min) {
                //We won't generate the Newsletter
                $return->status = false;
                $return->message = 'Not enough events for the tag ' . $oneTag . ' : ' . count($allArticles) . ' / ' . $parameter->min;
            }
            $stringTag = '';
            if (!empty($allArticles)) {
                if (file_exists(ACYMAILING_MEDIA . 'plugins' . DS . 'auto' . $this->name . '.php')) {
                    ob_start();
                    require(ACYMAILING_MEDIA . 'plugins' . DS . 'auto' . $this->name . '.php');
                    $stringTag = ob_get_clean();
                } else {
                    //we insert the tags one after the other in a table as they are already sorted (using |cols parameter)
                    $arrayElements = [];
                    foreach ($allArticles as $oneArticleId) {
                        $args = [];
                        $args[] = $this->name . ':' . $oneArticleId;
                        if (!empty($parameter->nolink))
                            $args[] = 'nolink';
                        if (!empty($parameter->noreadmore))
                            $args[] = 'noreadmore';
                        if (!empty($parameter->wrap))
                            $args[] = 'wrap:' . $parameter->wrap;
                        if (!empty($parameter->display))
                            $args[] = 'display:' . $parameter->display;
                        if (isset($parameter->pict))
                            $args[] = 'pict:' . $parameter->pict;
                        if (!empty($parameter->maxwidth))
                            $args[] = 'maxwidth:' . $parameter->maxwidth;
                        if (!empty($parameter->maxheight))
                            $args[] = 'maxheight:' . $parameter->maxheight;
                        if (!empty($parameter->language))
                            $args[] = 'language:' . $parameter->language;
                        if (!empty($parameter->itemid))
                            $args[] = 'itemid:' . $parameter->itemid;
                        $arrayElements[] = '{' . implode('|', $args) . '}';
                    }
                    $stringTag = $acypluginsHelper->getFormattedResult($arrayElements, $parameter);
                }
            }
            $this->tags[$oneTag] = $stringTag;
        }

        return $return;
    }

    /**
     * plgAcymailingallevents::_replaceOne()
     *
     * @param mixed $email
     * @throws Exception
     */
    function _replaceOne(&$email)
    {
        $acypluginsHelper = acymailing_get('helper.acyplugins');

        //load the tags
        $tags = $acypluginsHelper->extractTags($email, $this->name);
        if (empty($tags))
            return;

        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);

        $db = JFactory::getDbo();
        $db->setQuery('SELECT id FROM #__menu WHERE link LIKE "%index.php?option=com_allevents&view=events%" LIMIT 1');
        $this->itemid = $db->loadResult();

        //We will need the mailer class as well
        $this->mailerHelper = acymailing_get('helper.mailer');

        $this->newslanguage = new stdClass();
        if (!empty($email->language)) {
            $db = JFactory::getDbo();
            $db->setQuery('SELECT lang_id, lang_code FROM #__languages WHERE sef = ' . $db->quote($email->language) . ' LIMIT 1');
            $this->newslanguage = $db->loadObject();
        }

        //Set the read more text or image
        $this->readmore = empty($email->template->readmore) ? JText::_('JOOMEXT_READ_MORE') : '<img src="' . ACYMAILING_LIVE . $email->template->readmore . '" alt="' . JText::_('JOOMEXT_READ_MORE', true) . '" />';

        $htmlreplace = [];
        $textreplace = [];
        $subjectreplace = [];
        foreach ($tags as $i => $params) {
            if (isset($htmlreplace[$i]))
                continue;
            $content = $this->_replaceContent($tags[$i]);
            $htmlreplace[$i] = $content;
            $textreplace[$i] = $this->mailerHelper->textVersion($content, true);
            $subjectreplace[$i] = strip_tags($content);
        }
        $email->body = str_replace(array_keys($htmlreplace), $htmlreplace, $email->body);
        $email->altbody = str_replace(array_keys($textreplace), $textreplace, $email->altbody);
        $email->subject = str_replace(array_keys($subjectreplace), $subjectreplace, $email->subject);
    }

    /**
     * plgAcymailingallevents::_replaceContent()
     *
     * @param mixed $tag
     *
     * @return string
     * @throws Exception
     */
    function _replaceContent(&$tag)
    {
        $acypluginsHelper = acymailing_get('helper.acyplugins');
        $app = JFactory::getApplication();

        // extract the fields selected
        if (!empty($tag->display)) {
            $tag->display = explode(',', $tag->display);

            foreach ($tag->display as $i => $oneDisplay) {
                $oneDisplay = trim($oneDisplay);
                $tag->$oneDisplay = true;
            }
            unset($tag->display);
        }

        // load content
        $db = JFactory::getDbo();
        $sql = '';


        $sql .= ' SELECT a.id, ';
        $sql .= ' a.titre, ';
        $sql .= ' a.vignette as `vignette`,';
        $sql .= ' a.description as `desc`, ';
        $sql .= ' pl.titre as place, ';
        $sql .= ' pl.phone as tel, ';
        $sql .= ' pl.email as mail, ';
        $sql .= ' pl.website as site, ';
        $sql .= ' a.fichier_annexe as `attach`, ';
        $sql .= ' ac.titre AS `activity_titre`, ';
        $sql .= ' ag.titre AS `agenda_titre`, ';
        $sql .= ' ca.titre AS `category_titre`, ';
        $sql .= ' pl.titre AS `place_titre`, ';
        $sql .= ' pu.titre AS `public_titre`, ';
        $sql .= ' re.titre AS `ressource_titre`, ';
        $sql .= ' se.titre AS `section_titre`, ';
        $sql .= ' a.date,';
        $sql .= ' a.enddate';
        $sql .= ' FROM #__allevents_events AS a ';
        $sql .= ' left outer JOIN #__allevents_activities as ac on a.activity_id = ac.id';
        $sql .= ' left outer JOIN #__allevents_agenda     as ag on a.agenda_id = ag.id';
        $sql .= ' left outer JOIN #__allevents_categories as ca on a.category_id = ca.id';
        $sql .= ' left outer JOIN #__allevents_places     as pl on a.place_id = pl.id';
        $sql .= ' left outer JOIN #__allevents_public     as pu on a.public_id = pu.id';
        $sql .= ' left outer JOIN #__allevents_ressources as re on a.ressource_id = re.id';
        $sql .= ' left outer JOIN #__allevents_sections   as se on a.section_id = se.id';
        $sql .= ' WHERE a.id = ' . intval($tag->id);
        $sql .= ' LIMIT 1';
        $db->setQuery($sql);

        $content = $db->loadObject();

        //In case of we could not load the article for any reason...
        if (empty($content)) {
            if ($app->isAdmin())
                $app->enqueueMessage('The event "' . $tag->id . '" could not be loaded', 'notice');

            return '';
        }

        if (!empty($tag->language))
            $tag->lang = $tag->language;
        if (empty($tag->lang) && !empty($this->newslanguage) && !empty($this->newslanguage->lang_code))
            $tag->lang = $this->newslanguage->lang_code . ',' . $this->newslanguage->lang_id;
        $acypluginsHelper->translateItem($content, $tag, 'allevents_events');

        $varFields = [];
        foreach ($content as $fieldName => $oneField) {
            $varFields['{' . $fieldName . '}'] = $oneField;
        }

        if (!empty($tag->itemid))
            $itemid = $tag->itemid;
        else
            $itemid = $this->params->get('itemid');

        if (empty($itemid))
            $itemid = $this->itemid;

        // create the link for the titre and the read more button
        $link = str_replace('administrator/', '', JUri::base()) . 'index.php?option=com_allevents&view=event&id=' . $tag->id . '&Itemid=' . intval($itemid);
        $varFields['{link}'] = $link;

        $result = '<div class="acymailing_content"><table cellspacing="0" cellpadding="0" border="0" width="100%">';

        // display the titre
        if (!empty($tag->titre)) {
            $result .= '<tr><td colspan="2"><h2 class="acymailing_title">';
            if (empty($tag->nolink))
                $result .= '<a href="' . $link . '">';
            $result .= $content->titre;
            if (empty($tag->nolink))
                $result .= '</a>';
            $result .= '</h2></td></tr>';
        }

        if (!((empty($tag->vignette) || empty($content->vignette)) && (empty($tag->desc) || empty($content->desc)))) {
            $result .= '<tr><td colspan="2" style="text-align:justify;">';
            if (!(empty($tag->vignette) || empty($content->vignette))) {
                $result .= '<br/>';
                $result .= '<img style="float:left;" src="' . str_replace('administrator/', '', JUri::base()) . $content->vignette . '"/>';
                $result .= '<br/>';
                $varFields['{imagehtml}'] = '<br/><img style="float:left;" src="' . str_replace('administrator/', '', JUri::base()) . $content->vignette . '"/><br/>';
            }
            if (!(empty($tag->desc) || empty($content->desc))) {
                $result .= $acypluginsHelper->wrapText($content->desc, $tag);
            }
            $result .= '</td></tr>';
        }

        if (!empty($tag->activity_titre)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('ACTIVITY') . '</strong></td><td valign="top">' . $content->activity_titre . '</td></tr>';
        }
        if (!empty($tag->agenda_titre)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('AGENDA') . '</strong></td><td valign="top">' . $content->agenda_titre . '</td></tr>';
        }
        if (!empty($tag->category_titre)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('CATEGORY') . '</strong></td><td valign="top">' . $content->category_titre . '</td></tr>';
        }
        if (!empty($tag->place_titre)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('PLACE') . '</strong></td><td valign="top">' . $content->place_titre . '</td></tr>';
        }
        if (!empty($tag->public_titre)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('PUBLIC') . '</strong></td><td valign="top">' . $content->public_titre . '</td></tr>';
        }
        if (!empty($tag->ressource_titre)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('RESSOURCE') . '</strong></td><td valign="top">' . $content->ressource_titre . '</td></tr>';
        }
        if (!empty($tag->section_titre)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('SECTION') . '</strong></td><td valign="top">' . $content->section_titre . '</td></tr>';
        }
        if (!empty($tag->place) && !(empty($content->place) && empty($content->address))) {
            $place = [];
            if (!empty($content->place))
                $place[] = $content->place;
            if (!empty($content->address))
                $place[] = $content->address;
            if (!empty($place)) {
                $result .= '<tr><td valign="top"><strong>' . JText::_('PLACE') . '</strong></td><td valign="top">' . implode(' - ', $place) . '</td></tr>';
                $varFields['{placeformated}'] = implode(' - ', $place);
            }
        }

        // $content->params = json_decode($content->params);

        if (!empty($tag->tel) && !empty($content->phone)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('COM_ALLEVENTS_FORM_LBL_PLACE_PHONE') . '</strong></td><td valign="top">' . $content->phone . '</td></tr>';
        }

        if (!empty($tag->mail) && !empty($content->email)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('JGLOBAL_EMAIL') . '</strong></td><td valign="top">' . $content->email . '</td></tr>';
        }

        if (!empty($tag->site) && !empty($content->website)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('LINK_URL') . '</strong></td><td valign="top"><a href="' . $content->website . '">' . $content->website . '</a></td></tr>';
        }

        if (!empty($tag->attach) && !empty($content->file)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('COM_ALLEVENTS_FORM_LBL_EVENT_FICHIER_ANNEXE') . '</strong></td><td valign="top"><a href="' . str_replace('administrator/', '', JUri::base()) . $content->file . '">' . JText::_('COM_ALLEVENTS_DOWNLOAD') . '</a></td></tr>';
        }

        if (!empty($tag->dates)) {
            $result .= '<tr><td valign="top"><strong>' . JText::_('COM_ALLEVENTS_FORM_DESC_EVENT_DATE') . '</strong></td><td valign="top">';

            $dates = [];
            if (!empty($content->date) && $content->date != '0000-00-00 00:00:00') {
                $dates[] = JText::_('ACY_FROM_DATE') . ' ' . acymailing_getDate(acymailing_getTime($content->date), JText::_('DATE_FORMAT_LC'));
                $varFields['{dateformated}'] = acymailing_getDate(acymailing_getTime($content->date), JText::_('DATE_FORMAT_LC'));
            }
            if (!empty($content->enddate) && $content->enddate != '0000-00-00 00:00:00') {
                $dates[] = JText::_('ACY_TO_DATE') . ' ' . acymailing_getDate(acymailing_getTime($content->enddate), JText::_('DATE_FORMAT_LC'));
                $varFields['{enddateformated}'] = acymailing_getDate(acymailing_getTime($content->enddate), JText::_('DATE_FORMAT_LC'));
            }
            if (!empty($dates))
                $result .= implode(' - ', $dates) . '<br />';
            if (!empty($content->weekdays)) {
                $days = [
                    '0' => 'Sunday',
                    '1' => 'Monday',
                    '2' => 'Tuesday',
                    '3' => 'Wednesday',
                    '4' => 'Thursday',
                    '5' => 'Friday',
                    '6' => 'Saturday'];
                $result .= str_replace(array_keys($days), $days, $content->weekdays) . '<br />';
            }
            if (!empty($content->dates)) {
                $content->dates = unserialize($content->dates);
                foreach ($content->dates as $oneDate) {
                    if ($oneDate == '0000-00-00 00:00:00')
                        continue;
                    $result .= acymailing_getDate(acymailing_getTime($oneDate), JText::_('DATE_FORMAT_LC')) . '<br />';
                }
            }

            $result .= '</td></tr>';
        }

        if (empty($tag->noreadmore)) {
            $result .= '<tr><td colspan="2"><br /><a style="text-decoration:none;" target="_blank" href="' . $link . '"><span class="acymailing_readmore">' . $this->readmore . '</span></a></td></tr>';
        }

        $result .= '</table></div><br />';

        // load the custom template if exists
        if (file_exists(ACYMAILING_MEDIA . 'plugins' . DS . $this->name . '.php')) {
            ob_start();
            require(ACYMAILING_MEDIA . 'plugins' . DS . $this->name . '.php');
            $result = ob_get_clean();
            $result = str_replace(array_keys($varFields), $varFields, $result);
        }

        // always remove JS, there is no JS in newsletters...
        $result = $acypluginsHelper->removeJS($result);

        //resize or remove pictures
        $pictureHelper = acymailing_get('helper.acypict');
        if (isset($tag->pict)) {
            if ($tag->pict == 'resized') {
                $pictureHelper->maxHeight = empty($tag->maxheight) ? 150 : $tag->maxheight;
                $pictureHelper->maxWidth = empty($tag->maxwidth) ? 150 : $tag->maxwidth;
                if ($pictureHelper->available()) {
                    $result = $pictureHelper->resizePictures($result);
                } elseif ($app->isAdmin()) {
                    $app->enqueueMessage($pictureHelper->error, 'notice');
                }
            } else {
                $result = $pictureHelper->removePictures($result);
            }
        }

        return $result;
    }

    // partie filtres

    /**
     * plgAcymailingallevents::onAcyDisplayFilters()
     *
     * @param mixed $type
     *
     * @return string
     */
    function onAcyDisplayFilters(&$type)
    {
        $params = AllEventsHelperParam::getGlobalParam();

        $lang = JFactory::getLanguage();
        $lang->load('com_allevents', JPATH_ADMINISTRATOR);
        $type['allevents'] = JText::_('COM_ALLEVENTS');
        $acyconfig = acymailing_config();
        if (version_compare($acyconfig->get('version'), '4.9.3', '<'))
            return '<div id="filter__num__allevents">Please update AcyMailing, the Akeeba plugin may not work properly with this version</div>';

        $sql = "SELECT id AS value, titre AS text, date, enddate, allday FROM `#__allevents_events`";
        $sql .= "where (published = 1) and (titre <> '') ";
        $sql .= "order by date DESC";
        $db = JFactory::getDbo();
        $db->setQuery($sql);
        $items = $db->loadObjectList();

        $return = '<div id="filter__num__allevents">';
        $return .= '<select class ="chzn-single" onchange="countresults(__num__)" id="filter[__num__][allevents][event_id]" name="filter[__num__][allevents][event_id]">';
        $return .= '<option value="" >' . JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('EVENT')) . '</option>';
        foreach ($items as $item) {
            $date = DateTime::createFromFormat($params['gdate_format'], $item->date);
            if (!isset($date) || ($date == '')) {
                $date = DateTime::createFromFormat($params['gdatetime_format'], $item->date);
            }
            if (!isset($date) || ($date == '')) {
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $item->date);
            }

            $enddate = DateTime::createFromFormat($params['gdate_format'], $item->enddate);
            if (!isset($enddate) || ($enddate == '')) {
                $enddate = DateTime::createFromFormat($params['gdatetime_format'], $item->enddate);
            }
            if (!isset($enddate) || ($enddate == '')) {
                $enddate = DateTime::createFromFormat('Y-m-d H:i:s', $item->enddate);
            }

            if ($item->allday) {
                $date = (isset($date) && ($date <> '')) ? JHtml::date($date->format('Y-m-d H:i:s'), $params['gdate_format']) : $item->date . '(+ ' . JFactory::getConfig()->get('offset') . ')';
                $enddate = (isset($enddate) && ($enddate <> '')) ? JHtml::date($enddate->format('Y-m-d H:i:s'), $params['gdate_format']) : $item->enddate . '(+ ' . JFactory::getConfig()->get('offset') . ')';
            } else {
                $date = (isset($date) && ($date <> '')) ? JHtml::date($date->format('Y-m-d H:i:s'), $params['gdatetime_format']) : $item->date . '(+ ' . JFactory::getConfig()->get('offset') . ')';
                $enddate = (isset($enddate) && ($enddate <> '')) ? JHtml::date($enddate->format('Y-m-d H:i:s'), $params['gdatetime_format']) : $item->enddate . '(+ ' . JFactory::getConfig()->get('offset') . ')';
            }

            $return .= '<option style="background:#E4E4E4; color:#777; padding: 2px 5px; border-radius: 5px; margin-top: 5px;" value="' . $item->value . '" >' . $item->text . '&nbsp;&nbsp;(' . $date . '&nbsp;-&nbsp;' . $enddate . ')' . '</option>';
        }
        $return .= '</select>';

        $status = [];
        $status['enrol_yes'] = JText::_('COM_ALLEVENTS_EVENT_ENROL_YES'); //0
        $status['enrol_no'] = JText::_('COM_ALLEVENTS_EVENT_ENROL_NO'); //1
        $status['enrol_perhaps'] = JText::_('COM_ALLEVENTS_EVENT_ENROL_PERHAPS'); //2
        $status['enrol_pending'] = JText::_('COM_ALLEVENTS_EVENT_ENROL_PENDING'); //3

        $return .= '<br />';
        foreach ($status as $key => $statusName) {
            $return .= ' <input checked type="checkbox" id="__num__status' . $key . '" name="filter[__num__][allevents][' . $key . ']" onclick="countresults(__num__)" /><label for="__num__status' . $key . '">' . $statusName . '</label>';
        }

        $return .= '</div>';

        return $return;
    }

    /**
     * plgAcymailingallevents::onAcyProcessFilterCount_allevents()
     *
     * @param mixed $query
     * @param mixed $filter
     * @param mixed $num
     *
     * @return string
     */
    function onAcyProcessFilterCount_allevents(&$query, $filter, $num)
    {
        $this->onAcyProcessFilter_allevents($query, $filter, $num);

        return JText::sprintf('SELECTED_USERS', $query->count());
    }

    /**
     * plgAcymailingallevents::onAcyProcessFilter_allevents()
     *
     * @param mixed $query
     * @param mixed $filter
     * @param mixed $num
     */
    function onAcyProcessFilter_allevents(&$query, $filter, $num)
    {
        $myquery = 'SELECT DISTINCT email FROM #__allevents_enrolments en INNER JOIN #__users ON en.user_id = #__users.id';
        $myquery .= ' where en.published=1';
        if (!empty($filter['event_id']))
            $myquery .= ' and event_id = ' . intval($filter['event_id']);

        $statusPayment = [];
        if (!empty($filter['enrol_yes']))
            $statusPayment[] = '0';
        if (!empty($filter['enrol_no']))
            $statusPayment[] = '1';
        if (!empty($filter['enrol_perhaps']))
            $statusPayment[] = '2';
        if (!empty($filter['enrol_pending']))
            $statusPayment[] = '3';

        if (count($statusPayment)) {
            $myquery .= ' and en.enroltype IN (' . implode(',', $statusPayment) . ')';
        }

        $query->db->setQuery($myquery);
        $allEmails = acymailing_loadResultArray($query->db);
        if (empty($allEmails))
            $allEmails[] = 'none';
        $query->where[] = "sub.email IN ('" . implode("','", $allEmails) . "')";
    }

} //endclass


?>