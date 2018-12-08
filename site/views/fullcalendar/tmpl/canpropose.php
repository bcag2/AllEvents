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

$aCanEdit = [];
$aCanEdit ['value'] = true;
$user = JFactory::getUser();
// si pas invité
if ($user->guest) $aCanEdit ['value'] = false;
// si pas droit de créer un évènement
if ($user->authorise('core.create', 'com_allevents') !== true) $aCanEdit ['value'] = false;

echo json_encode($aCanEdit);
