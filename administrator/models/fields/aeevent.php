<?php
defined('_JEXEC') or die;
JFormHelper::loadFieldClass('sql');
if (!class_exists('AllEventsHelperParam'))
    require_once JPATH_SITE . '/components/com_allevents/helpers/aeparam.php';

/**
 * JFormFieldAEEvent
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class JFormFieldAEEvent extends JFormFieldSQL
{
    public $type = 'AEEvent';

    /**
     * JFormFieldAEEvent::getInput()
     *
     * @return string
     */
    public function getInput()
    {
        $html = '';
        $params = AllEventsHelperParam::getGlobalParam();

        $sql = "SELECT id AS value, titre AS text, date, enddate, allday FROM `#__allevents_events`";
        // $sql .= "where (published = 1) and (titre <> '') and (DATE_FORMAT(date,'%Y%m%d') >= DATE_FORMAT(CURRENT_DATE(),'%Y%m%d'))" ;
        $sql .= "where (published = 1) and (titre <> '') ";
        $sql .= "order by date DESC";
        $db = JFactory::getDbo();
        $db->setQuery($sql);
        $items = $db->loadObjectList();
        $html .= '<select class ="chzn-single" id="' . $this->id . '" name="' . $this->name . '">';
        $html .= '<option value="" >' . JText::sprintf('COM_ALLEVENTS_FILTER_SELECT_LABEL', JText::_('EVENT')) . '</option>';
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

            $html .= '<option style="background:#E4E4E4; color:#777; padding: 2px 5px; border-radius: 5px; margin-top: 5px;" value="' . $item->value . '" >';
            $html .= $item->text . '&nbsp;&nbsp;(' . $date . '&nbsp;-&nbsp;' . $enddate . ')';
            $html .= '</option>';
        }
        $html .= '</select>';

        return $html;
    }
}