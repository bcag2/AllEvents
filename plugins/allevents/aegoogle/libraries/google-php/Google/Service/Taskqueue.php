<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for Taskqueue (v1beta2).
 *
 * <p>
 * Lets you access a Google App Engine Pull Task Queue over REST.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/appengine/docs/python/taskqueue/rest" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Taskqueue extends Google_Service
{
    /** Manage your Tasks and Taskqueues. */
    const TASKQUEUE =
        "https://www.googleapis.com/auth/taskqueue";
    /** Consume Tasks from your Taskqueues. */
    const TASKQUEUE_CONSUMER =
        "https://www.googleapis.com/auth/taskqueue.consumer";

    public $taskqueues;
    public $tasks;


    /**
     * Constructs the internal representation of the Taskqueue service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'taskqueue/v1beta2/projects/';
        $this->version = 'v1beta2';
        $this->serviceName = 'taskqueue';

        $this->taskqueues = new Google_Service_Taskqueue_Taskqueues_Resource(
            $this,
            $this->serviceName,
            'taskqueues',
            [
                'methods' => [
                    'get' => [
                        'path' => '{project}/taskqueues/{taskqueue}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskqueue' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'getStats' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->tasks = new Google_Service_Taskqueue_Tasks_Resource(
            $this,
            $this->serviceName,
            'tasks',
            [
                'methods' => [
                    'delete' => [
                        'path' => '{project}/taskqueues/{taskqueue}/tasks/{task}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskqueue' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'task' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/taskqueues/{taskqueue}/tasks/{task}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskqueue' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'task' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/taskqueues/{taskqueue}/tasks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskqueue' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'lease' => [
                        'path' => '{project}/taskqueues/{taskqueue}/tasks/lease',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskqueue' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'numTasks' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'leaseSecs' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                            'groupByTag' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'tag' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/taskqueues/{taskqueue}/tasks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskqueue' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'patch' => [
                        'path' => '{project}/taskqueues/{taskqueue}/tasks/{task}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskqueue' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'task' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'newLeaseSeconds' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{project}/taskqueues/{taskqueue}/tasks/{task}',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'taskqueue' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'task' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'newLeaseSeconds' => [
                                'location' => 'query',
                                'type' => 'integer',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
    }
}


/**
 * The "taskqueues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $taskqueueService = new Google_Service_Taskqueue(...);
 *   $taskqueues = $taskqueueService->taskqueues;
 *  </code>
 */
class Google_Service_Taskqueue_Taskqueues_Resource extends Google_Service_Resource
{

    /**
     * Get detailed information about a TaskQueue. (taskqueues.get)
     *
     * @param string $project The project under which the queue lies.
     * @param string $taskqueue The id of the taskqueue to get the properties of.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool getStats Whether to get stats. Optional.
     */
    public function get($project, $taskqueue, $optParams = [])
    {
        $params = ['project' => $project, 'taskqueue' => $taskqueue];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Taskqueue_TaskQueue");
    }
}

/**
 * The "tasks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $taskqueueService = new Google_Service_Taskqueue(...);
 *   $tasks = $taskqueueService->tasks;
 *  </code>
 */
class Google_Service_Taskqueue_Tasks_Resource extends Google_Service_Resource
{

    /**
     * Delete a task from a TaskQueue. (tasks.delete)
     *
     * @param string $project The project under which the queue lies.
     * @param string $taskqueue The taskqueue to delete a task from.
     * @param string $task The id of the task to delete.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $taskqueue, $task, $optParams = [])
    {
        $params = ['project' => $project, 'taskqueue' => $taskqueue, 'task' => $task];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Get a particular task from a TaskQueue. (tasks.get)
     *
     * @param string $project The project under which the queue lies.
     * @param string $taskqueue The taskqueue in which the task belongs.
     * @param string $task The task to get properties of.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $taskqueue, $task, $optParams = [])
    {
        $params = ['project' => $project, 'taskqueue' => $taskqueue, 'task' => $task];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Taskqueue_Task");
    }

    /**
     * Insert a new task in a TaskQueue (tasks.insert)
     *
     * @param string $project The project under which the queue lies
     * @param string $taskqueue The taskqueue to insert the task into
     * @param Google_Service_Taskqueue_Task|Google_Task $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, $taskqueue, Google_Service_Taskqueue_Task $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'taskqueue' => $taskqueue, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Taskqueue_Task");
    }

    /**
     * Lease 1 or more tasks from a TaskQueue. (tasks.lease)
     *
     * @param string $project The project under which the queue lies.
     * @param string $taskqueue The taskqueue to lease a task from.
     * @param int $numTasks The number of tasks to lease.
     * @param int $leaseSecs The lease in seconds.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param bool groupByTag When true, all returned tasks will have the same
     * tag
     * @opt_param string tag The tag allowed for tasks in the response. Must only be
     * specified if group_by_tag is true. If group_by_tag is true and tag is not
     * specified the tag will be that of the oldest task by eta, i.e. the first
     * available tag
     */
    public function lease($project, $taskqueue, $numTasks, $leaseSecs, $optParams = [])
    {
        $params = ['project' => $project, 'taskqueue' => $taskqueue, 'numTasks' => $numTasks, 'leaseSecs' => $leaseSecs];
        $params = array_merge($params, $optParams);

        return $this->call('lease', [$params], "Google_Service_Taskqueue_Tasks");
    }

    /**
     * List Tasks in a TaskQueue (tasks.listTasks)
     *
     * @param string $project The project under which the queue lies.
     * @param string $taskqueue The id of the taskqueue to list tasks from.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function listTasks($project, $taskqueue, $optParams = [])
    {
        $params = ['project' => $project, 'taskqueue' => $taskqueue];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Taskqueue_Tasks2");
    }

    /**
     * Update tasks that are leased out of a TaskQueue. This method supports patch
     * semantics. (tasks.patch)
     *
     * @param string $project The project under which the queue lies.
     * @param string $taskqueue
     * @param string $task
     * @param int $newLeaseSeconds The new lease in seconds.
     * @param Google_Service_Taskqueue_Task|Google_Task $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($project, $taskqueue, $task, $newLeaseSeconds, Google_Service_Taskqueue_Task $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'taskqueue' => $taskqueue, 'task' => $task, 'newLeaseSeconds' => $newLeaseSeconds, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Taskqueue_Task");
    }

    /**
     * Update tasks that are leased out of a TaskQueue. (tasks.update)
     *
     * @param string $project The project under which the queue lies.
     * @param string $taskqueue
     * @param string $task
     * @param int $newLeaseSeconds The new lease in seconds.
     * @param Google_Service_Taskqueue_Task|Google_Task $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($project, $taskqueue, $task, $newLeaseSeconds, Google_Service_Taskqueue_Task $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'taskqueue' => $taskqueue, 'task' => $task, 'newLeaseSeconds' => $newLeaseSeconds, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Taskqueue_Task");
    }
}


/**
 * Class Google_Service_Taskqueue_Task
 */
class Google_Service_Taskqueue_Task extends Google_Model
{
    public $enqueueTimestamp;
    public $id;
    public $kind;
    public $leaseTimestamp;
    public $payloadBase64;
    public $queueName;
    public $retryCount;
    public $tag;
    protected $internal_gapi_mappings = [
        "retryCount" => "retry_count",
    ];

    /**
     * @return mixed
     */
    public function getEnqueueTimestamp()
    {
        return $this->enqueueTimestamp;
    }

    /**
     * @param $enqueueTimestamp
     */
    public function setEnqueueTimestamp($enqueueTimestamp)
    {
        $this->enqueueTimestamp = $enqueueTimestamp;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getLeaseTimestamp()
    {
        return $this->leaseTimestamp;
    }

    /**
     * @param $leaseTimestamp
     */
    public function setLeaseTimestamp($leaseTimestamp)
    {
        $this->leaseTimestamp = $leaseTimestamp;
    }

    /**
     * @return mixed
     */
    public function getPayloadBase64()
    {
        return $this->payloadBase64;
    }

    /**
     * @param $payloadBase64
     */
    public function setPayloadBase64($payloadBase64)
    {
        $this->payloadBase64 = $payloadBase64;
    }

    /**
     * @return mixed
     */
    public function getQueueName()
    {
        return $this->queueName;
    }

    /**
     * @param $queueName
     */
    public function setQueueName($queueName)
    {
        $this->queueName = $queueName;
    }

    /**
     * @return mixed
     */
    public function getRetryCount()
    {
        return $this->retryCount;
    }

    /**
     * @param $retryCount
     */
    public function setRetryCount($retryCount)
    {
        $this->retryCount = $retryCount;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }
}

/**
 * Class Google_Service_Taskqueue_TaskQueue
 */
class Google_Service_Taskqueue_TaskQueue extends Google_Model
{
    public $id;
    public $kind;
    public $maxLeases;
    protected $internal_gapi_mappings = [];
    protected $aclType = 'Google_Service_Taskqueue_TaskQueueAcl';
    protected $aclDataType = '';
    protected $statsType = 'Google_Service_Taskqueue_TaskQueueStats';
    protected $statsDataType = '';


    /**
     * @param Google_Service_Taskqueue_TaskQueueAcl $acl
     */
    public function setAcl(Google_Service_Taskqueue_TaskQueueAcl $acl)
    {
        $this->acl = $acl;
    }

    /**
     * @return mixed
     */
    public function getAcl()
    {
        return $this->acl;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getMaxLeases()
    {
        return $this->maxLeases;
    }

    /**
     * @param $maxLeases
     */
    public function setMaxLeases($maxLeases)
    {
        $this->maxLeases = $maxLeases;
    }

    /**
     * @param Google_Service_Taskqueue_TaskQueueStats $stats
     */
    public function setStats(Google_Service_Taskqueue_TaskQueueStats $stats)
    {
        $this->stats = $stats;
    }

    /**
     * @return mixed
     */
    public function getStats()
    {
        return $this->stats;
    }
}

/**
 * Class Google_Service_Taskqueue_TaskQueueAcl
 */
class Google_Service_Taskqueue_TaskQueueAcl extends Google_Collection
{
    public $adminEmails;
    public $consumerEmails;
    public $producerEmails;
    protected $collection_key = 'producerEmails';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAdminEmails()
    {
        return $this->adminEmails;
    }

    /**
     * @param $adminEmails
     */
    public function setAdminEmails($adminEmails)
    {
        $this->adminEmails = $adminEmails;
    }

    /**
     * @return mixed
     */
    public function getConsumerEmails()
    {
        return $this->consumerEmails;
    }

    /**
     * @param $consumerEmails
     */
    public function setConsumerEmails($consumerEmails)
    {
        $this->consumerEmails = $consumerEmails;
    }

    /**
     * @return mixed
     */
    public function getProducerEmails()
    {
        return $this->producerEmails;
    }

    /**
     * @param $producerEmails
     */
    public function setProducerEmails($producerEmails)
    {
        $this->producerEmails = $producerEmails;
    }
}

/**
 * Class Google_Service_Taskqueue_TaskQueueStats
 */
class Google_Service_Taskqueue_TaskQueueStats extends Google_Model
{
    public $leasedLastHour;
    public $leasedLastMinute;
    public $oldestTask;
    public $totalTasks;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLeasedLastHour()
    {
        return $this->leasedLastHour;
    }

    /**
     * @param $leasedLastHour
     */
    public function setLeasedLastHour($leasedLastHour)
    {
        $this->leasedLastHour = $leasedLastHour;
    }

    /**
     * @return mixed
     */
    public function getLeasedLastMinute()
    {
        return $this->leasedLastMinute;
    }

    /**
     * @param $leasedLastMinute
     */
    public function setLeasedLastMinute($leasedLastMinute)
    {
        $this->leasedLastMinute = $leasedLastMinute;
    }

    /**
     * @return mixed
     */
    public function getOldestTask()
    {
        return $this->oldestTask;
    }

    /**
     * @param $oldestTask
     */
    public function setOldestTask($oldestTask)
    {
        $this->oldestTask = $oldestTask;
    }

    /**
     * @return mixed
     */
    public function getTotalTasks()
    {
        return $this->totalTasks;
    }

    /**
     * @param $totalTasks
     */
    public function setTotalTasks($totalTasks)
    {
        $this->totalTasks = $totalTasks;
    }
}

/**
 * Class Google_Service_Taskqueue_Tasks
 */
class Google_Service_Taskqueue_Tasks extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Taskqueue_Task';
    protected $itemsDataType = 'array';

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }
}

/**
 * Class Google_Service_Taskqueue_Tasks2
 */
class Google_Service_Taskqueue_Tasks2 extends Google_Collection
{
    public $kind;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Taskqueue_Task';
    protected $itemsDataType = 'array';

    /**
     * @param $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }
}
