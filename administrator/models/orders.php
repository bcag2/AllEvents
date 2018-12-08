<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');
use Joomla\Utilities\ArrayHelper;

/**
 * AllEventsModelOrders
 *
 * @version   %%ae3.version%%
 * @package   %%ae3.package%%
 * @copyright %%ae3.copyright%%
 * @license   %%ae3.license%%
 * @author    %%ae3.author%%
 * @access    public
 */
class AllEventsModelOrders extends JModelList
{
    /**
     * AllEventsModelOrders::__construct()
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = ['id', 'a.id'];
        }

        parent::__construct($config);
    }

    /**
     * AllEventsModelOrders::delete_order()
     *
     * Method to delete order
     *
     * @param mixed $cid
     *
     * @return bool
     */
    public function delete_order($cid)
    {
        if (count($cid)) {
            ArrayHelper::toInteger($cid);
            $cids = implode(',', $cid);
            $query = 'DELETE FROM  `#__allevents_orders` WHERE id IN ( ' . $cids . ' )';
            $this->_db->setQuery($query);
            if (!$this->_db->execute()) {
                return false;
            }
        }

        return true;
    }

    /**
     * AllEventsModelOrders::update_order_status()
     *
     * Method to update_order_status
     *
     * @param mixed $order_id
     * @param mixed $payment_status
     *
     * @return bool
     */
    public function update_order_status($order_id, $payment_status)
    {
        $query = 'UPDATE `#__allevents_orders` SET status= "' . $payment_status . '" WHERE id = ' . $order_id;
        $this->_db->setQuery($query);
        if (!$this->_db->execute()) {
            return false;
        }

        return true;
    }

    /**
     * AllEventsModelOrders::getLatest()
     *
     * @param int $limit
     *
     * @return JDatabaseQuery
     */
    public function getLatest($limit = 5)
    {
        $this->setState('list.ordering', 'a.id');
        $this->setState('list.direction', 'DESC');
        $this->setState('list.limit', $limit);

        return $this->getItems();
    }

    /**
     * AllEventsModelOrders::getItems()
     *
     * @return mixed
     */
    public function getItems()
    {
        $items = parent::getItems();

        return $items;
    }

    /**
     * AllEventsModelOrders::populateState()
     *
     * @param mixed $ordering
     * @param mixed $direction
     *
     * @throws Exception
     */
    protected function populateState($ordering = null, $direction = null)
    {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');
        // Load the filter state.
        $search = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        // Load the parameters.
        $params = JComponentHelper::getParams('com_allevents');
        $this->setState('params', $params);
        // List state information.
        parent::populateState('a.id', 'asc');
    }

    /**
     * AllEventsModelOrders::getStoreId()
     *
     * @param string $id
     *
     * @return string
     */
    protected function getStoreId($id = '')
    {
        // Compile the store id.
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.state');

        return parent::getStoreId($id);
    }

    /**
     * AllEventsModelOrders::getListQuery()
     *
     * @return JDatabaseQuery
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        // Select the required fields from the table.
        $query->select($this->getState('list.select', 'a.*'));
        $query->from('`#__allevents_orders` AS a');

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int)substr($search, 3));
            }
        }
        // Add the list ordering clause.
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        if ($orderCol && $orderDirn) {
            $query->order($db->escape($orderCol . ' ' . $orderDirn));
        }

        return $query;
    }
}
