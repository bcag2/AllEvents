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
 * Service definition for Tasks (v1).
 *
 * <p>
 * Lets you manage your tasks and task lists.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/google-apps/tasks/firstapp" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Tasks extends Google_Service
{
    /** Manage your tasks. */
    const TASKS =
        "https://www.googleapis.com/auth/tasks";
    /** View your tasks. */
    const TASKS_READONLY =
        "https://www.googleapis.com/auth/tasks.readonly";

    public $tasklists;
    public $tasks;


    /**
     * Constructs the internal representation of the Tasks service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'tasks/v1/';
        $this->version = 'v1';
        $this->serviceName = 'tasks';

        $this->tasklists = new Google_Service_Tasks_Tasklists_Resource(
            $this,
            $this->serviceName,
            'tasklists',
            [
                'methods' => [
                    'delete' => [
                        'path' => 'users/@me/lists/{tasklist}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'tasklist' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => 'users/@me/lists/{tasklist}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tasklist' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => 'users/@me/lists',
                        'httpMethod' => 'POST',
                        'parameters' => [],
                    ], 'list' => [
                        'path' => 'users/@me/lists',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'users/@me/lists/{tasklist}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'tasklist' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => 'users/@me/lists/{tasklist}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'tasklist' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->tasks = new Google_Service_Tasks_Tasks_Resource(
            $this,
            $this->serviceName,
            'tasks',
            [
                'methods' => [
                    'clear' => [
                        'path' => 'lists/{tasklist}/clear',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tasklist' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => 'lists/{tasklist}/tasks/{task}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'tasklist' => [
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
                        'path' => 'lists/{tasklist}/tasks/{task}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tasklist' => [
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
                        'path' => 'lists/{tasklist}/tasks',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tasklist' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'parent' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'previous' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => 'lists/{tasklist}/tasks',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'tasklist' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'dueMax' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showDeleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'updatedMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'completedMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showCompleted' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'completedMax' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'showHidden' => [
                                'location' => 'query',
                                'type' => 'boolean',
                            ],
                            'dueMin' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'move' => [
                        'path' => 'lists/{tasklist}/tasks/{task}/move',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'tasklist' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'task' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'parent' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'previous' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => 'lists/{tasklist}/tasks/{task}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'tasklist' => [
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
                    ], 'update' => [
                        'path' => 'lists/{tasklist}/tasks/{task}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'tasklist' => [
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
                    ],
                ]
            ]
        );
    }
}


/**
 * The "tasklists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tasksService = new Google_Service_Tasks(...);
 *   $tasklists = $tasksService->tasklists;
 *  </code>
 */
class Google_Service_Tasks_Tasklists_Resource extends Google_Service_Resource
{

    /**
     * Deletes the authenticated user's specified task list. (tasklists.delete)
     *
     * @param string $tasklist Task list identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($tasklist, $optParams = [])
    {
        $params = ['tasklist' => $tasklist];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns the authenticated user's specified task list. (tasklists.get)
     *
     * @param string $tasklist Task list identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($tasklist, $optParams = [])
    {
        $params = ['tasklist' => $tasklist];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Tasks_TaskList");
    }

    /**
     * Creates a new task list and adds it to the authenticated user's task lists.
     * (tasklists.insert)
     *
     * @param Google_Service_Tasks_TaskList|Google_TaskList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert(Google_Service_Tasks_TaskList $postBody, $optParams = [])
    {
        $params = ['postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Tasks_TaskList");
    }

    /**
     * Returns all the authenticated user's task lists. (tasklists.listTasklists)
     *
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Token specifying the result page to return.
     * Optional.
     * @opt_param string maxResults Maximum number of task lists returned on one
     * page. Optional. The default is 100.
     */
    public function listTasklists($optParams = [])
    {
        $params = [];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Tasks_TaskLists");
    }

    /**
     * Updates the authenticated user's specified task list. This method supports
     * patch semantics. (tasklists.patch)
     *
     * @param string $tasklist Task list identifier.
     * @param Google_Service_Tasks_TaskList|Google_TaskList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($tasklist, Google_Service_Tasks_TaskList $postBody, $optParams = [])
    {
        $params = ['tasklist' => $tasklist, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Tasks_TaskList");
    }

    /**
     * Updates the authenticated user's specified task list. (tasklists.update)
     *
     * @param string $tasklist Task list identifier.
     * @param Google_Service_Tasks_TaskList|Google_TaskList $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($tasklist, Google_Service_Tasks_TaskList $postBody, $optParams = [])
    {
        $params = ['tasklist' => $tasklist, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Tasks_TaskList");
    }
}

/**
 * The "tasks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tasksService = new Google_Service_Tasks(...);
 *   $tasks = $tasksService->tasks;
 *  </code>
 */
class Google_Service_Tasks_Tasks_Resource extends Google_Service_Resource
{

    /**
     * Clears all completed tasks from the specified task list. The affected tasks
     * will be marked as 'hidden' and no longer be returned by default when
     * retrieving all tasks for a task list. (tasks.clear)
     *
     * @param string $tasklist Task list identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function clear($tasklist, $optParams = [])
    {
        $params = ['tasklist' => $tasklist];
        $params = array_merge($params, $optParams);

        return $this->call('clear', [$params]);
    }

    /**
     * Deletes the specified task from the task list. (tasks.delete)
     *
     * @param string $tasklist Task list identifier.
     * @param string $task Task identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($tasklist, $task, $optParams = [])
    {
        $params = ['tasklist' => $tasklist, 'task' => $task];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Returns the specified task. (tasks.get)
     *
     * @param string $tasklist Task list identifier.
     * @param string $task Task identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($tasklist, $task, $optParams = [])
    {
        $params = ['tasklist' => $tasklist, 'task' => $task];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Tasks_Task");
    }

    /**
     * Creates a new task on the specified task list. (tasks.insert)
     *
     * @param string $tasklist Task list identifier.
     * @param Google_Service_Tasks_Task|Google_Task $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string parent Parent task identifier. If the task is created at
     * the top level, this parameter is omitted. Optional.
     * @opt_param string previous Previous sibling task identifier. If the task is
     * created at the first position among its siblings, this parameter is omitted.
     * Optional.
     */
    public function insert($tasklist, Google_Service_Tasks_Task $postBody, $optParams = [])
    {
        $params = ['tasklist' => $tasklist, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Tasks_Task");
    }

    /**
     * Returns all tasks in the specified task list. (tasks.listTasks)
     *
     * @param string $tasklist Task list identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string dueMax Upper bound for a task's due date (as a RFC 3339
     * timestamp) to filter by. Optional. The default is not to filter by due date.
     * @opt_param bool showDeleted Flag indicating whether deleted tasks are
     * returned in the result. Optional. The default is False.
     * @opt_param string updatedMin Lower bound for a task's last modification time
     * (as a RFC 3339 timestamp) to filter by. Optional. The default is not to
     * filter by last modification time.
     * @opt_param string completedMin Lower bound for a task's completion date (as a
     * RFC 3339 timestamp) to filter by. Optional. The default is not to filter by
     * completion date.
     * @opt_param string maxResults Maximum number of task lists returned on one
     * page. Optional. The default is 100.
     * @opt_param bool showCompleted Flag indicating whether completed tasks are
     * returned in the result. Optional. The default is True.
     * @opt_param string pageToken Token specifying the result page to return.
     * Optional.
     * @opt_param string completedMax Upper bound for a task's completion date (as a
     * RFC 3339 timestamp) to filter by. Optional. The default is not to filter by
     * completion date.
     * @opt_param bool showHidden Flag indicating whether hidden tasks are returned
     * in the result. Optional. The default is False.
     * @opt_param string dueMin Lower bound for a task's due date (as a RFC 3339
     * timestamp) to filter by. Optional. The default is not to filter by due date.
     */
    public function listTasks($tasklist, $optParams = [])
    {
        $params = ['tasklist' => $tasklist];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Tasks_Tasks");
    }

    /**
     * Moves the specified task to another position in the task list. This can
     * include putting it as a child task under a new parent and/or move it to a
     * different position among its sibling tasks. (tasks.move)
     *
     * @param string $tasklist Task list identifier.
     * @param string $task Task identifier.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string parent New parent task identifier. If the task is moved to
     * the top level, this parameter is omitted. Optional.
     * @opt_param string previous New previous sibling task identifier. If the task
     * is moved to the first position among its siblings, this parameter is omitted.
     * Optional.
     */
    public function move($tasklist, $task, $optParams = [])
    {
        $params = ['tasklist' => $tasklist, 'task' => $task];
        $params = array_merge($params, $optParams);

        return $this->call('move', [$params], "Google_Service_Tasks_Task");
    }

    /**
     * Updates the specified task. This method supports patch semantics.
     * (tasks.patch)
     *
     * @param string $tasklist Task list identifier.
     * @param string $task Task identifier.
     * @param Google_Service_Tasks_Task|Google_Task $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function patch($tasklist, $task, Google_Service_Tasks_Task $postBody, $optParams = [])
    {
        $params = ['tasklist' => $tasklist, 'task' => $task, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Tasks_Task");
    }

    /**
     * Updates the specified task. (tasks.update)
     *
     * @param string $tasklist Task list identifier.
     * @param string $task Task identifier.
     * @param Google_Service_Tasks_Task|Google_Task $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($tasklist, $task, Google_Service_Tasks_Task $postBody, $optParams = [])
    {
        $params = ['tasklist' => $tasklist, 'task' => $task, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Tasks_Task");
    }
}


/**
 * Class Google_Service_Tasks_Task
 */
class Google_Service_Tasks_Task extends Google_Collection
{
    public $completed;
    public $deleted;
    public $due;
    public $etag;
    public $hidden;
    public $id;
    public $kind;
    public $notes;
    public $parent;
    public $position;
    public $selfLink;
    public $status;
    public $title;
    public $updated;
    protected $collection_key = 'links';
    protected $internal_gapi_mappings = [];
    protected $linksType = 'Google_Service_Tasks_TaskLinks';
    protected $linksDataType = 'array';

    /**
     * @return mixed
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @param $completed
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return mixed
     */
    public function getDue()
    {
        return $this->due;
    }

    /**
     * @param $due
     */
    public function setDue($due)
    {
        $this->due = $due;
    }

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

    /**
     * @return mixed
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param $hidden
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
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
     * @param $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getSelfLink()
    {
        return $this->selfLink;
    }

    /**
     * @param $selfLink
     */
    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
}

/**
 * Class Google_Service_Tasks_TaskLinks
 */
class Google_Service_Tasks_TaskLinks extends Google_Model
{
    public $description;
    public $link;
    public $type;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

/**
 * Class Google_Service_Tasks_TaskList
 */
class Google_Service_Tasks_TaskList extends Google_Model
{
    public $etag;
    public $id;
    public $kind;
    public $selfLink;
    public $title;
    public $updated;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
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
    public function getSelfLink()
    {
        return $this->selfLink;
    }

    /**
     * @param $selfLink
     */
    public function setSelfLink($selfLink)
    {
        $this->selfLink = $selfLink;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }
}

/**
 * Class Google_Service_Tasks_TaskLists
 */
class Google_Service_Tasks_TaskLists extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Tasks_TaskList';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

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

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param $nextPageToken
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }
}

/**
 * Class Google_Service_Tasks_Tasks
 */
class Google_Service_Tasks_Tasks extends Google_Collection
{
    public $etag;
    public $kind;
    public $nextPageToken;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Tasks_Task';
    protected $itemsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param $etag
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
    }

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

    /**
     * @return mixed
     */
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }

    /**
     * @param $nextPageToken
     */
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }
}
