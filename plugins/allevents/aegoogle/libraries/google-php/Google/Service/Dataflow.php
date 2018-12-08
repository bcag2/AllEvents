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
 * Service definition for Dataflow (v1b3).
 *
 * <p>
 * Google Dataflow API.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Dataflow extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** View your email address. */
    const USERINFO_EMAIL =
        "https://www.googleapis.com/auth/userinfo.email";

    public $projects_jobs;
    public $projects_jobs_messages;
    public $projects_jobs_workItems;


    /**
     * Constructs the internal representation of the Dataflow service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'v1b3/projects/';
        $this->version = 'v1b3';
        $this->serviceName = 'dataflow';

        $this->projects_jobs = new Google_Service_Dataflow_ProjectsJobs_Resource(
            $this,
            $this->serviceName,
            'jobs',
            [
                'methods' => [
                    'create' => [
                        'path' => '{projectId}/jobs',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{projectId}/jobs/{jobId}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'getMetrics' => [
                        'path' => '{projectId}/jobs/{jobId}/metrics',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'startTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{projectId}/jobs',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'view' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'patch' => [
                        'path' => '{projectId}/jobs/{jobId}',
                        'httpMethod' => 'PATCH',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{projectId}/jobs/{jobId}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_jobs_messages = new Google_Service_Dataflow_ProjectsJobsMessages_Resource(
            $this,
            $this->serviceName,
            'messages',
            [
                'methods' => [
                    'list' => [
                        'path' => '{projectId}/jobs/{jobId}/messages',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageSize' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'startTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'endTime' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'minimumImportance' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->projects_jobs_workItems = new Google_Service_Dataflow_ProjectsJobsWorkItems_Resource(
            $this,
            $this->serviceName,
            'workItems',
            [
                'methods' => [
                    'lease' => [
                        'path' => '{projectId}/jobs/{jobId}/workItems:lease',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'reportStatus' => [
                        'path' => '{projectId}/jobs/{jobId}/workItems:reportStatus',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'projectId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'jobId' => [
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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $projects = $dataflowService->projects;
 *  </code>
 */
class Google_Service_Dataflow_Projects_Resource extends Google_Service_Resource
{
}

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $jobs = $dataflowService->jobs;
 *  </code>
 */
class Google_Service_Dataflow_ProjectsJobs_Resource extends Google_Service_Resource
{

    /**
     * Creates a dataflow job. (jobs.create)
     *
     * @param string $projectId
     * @param Google_Job|Google_Service_Dataflow_Job $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string view
     */
    public function create($projectId, Google_Service_Dataflow_Job $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('create', [$params], "Google_Service_Dataflow_Job");
    }

    /**
     * Gets the state of the specified dataflow job. (jobs.get)
     *
     * @param string $projectId
     * @param string $jobId
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string view
     */
    public function get($projectId, $jobId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Dataflow_Job");
    }

    /**
     * Request the job status. (jobs.getMetrics)
     *
     * @param string $projectId
     * @param string $jobId
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string startTime
     */
    public function getMetrics($projectId, $jobId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('getMetrics', [$params], "Google_Service_Dataflow_JobMetrics");
    }

    /**
     * List the jobs of a project (jobs.listProjectsJobs)
     *
     * @param string $projectId
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param string pageToken
     * @opt_param string view
     * @opt_param int pageSize
     */
    public function listProjectsJobs($projectId, $optParams = [])
    {
        $params = ['projectId' => $projectId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dataflow_ListJobsResponse");
    }

    /**
     * Updates the state of an existing dataflow job. This method supports patch
     * semantics. (jobs.patch)
     *
     * @param string $projectId
     * @param string $jobId
     * @param Google_Job|Google_Service_Dataflow_Job $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function patch($projectId, $jobId, Google_Service_Dataflow_Job $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('patch', [$params], "Google_Service_Dataflow_Job");
    }

    /**
     * Updates the state of an existing dataflow job. (jobs.update)
     *
     * @param string $projectId
     * @param string $jobId
     * @param Google_Job|Google_Service_Dataflow_Job $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function update($projectId, $jobId, Google_Service_Dataflow_Job $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Dataflow_Job");
    }
}

/**
 * The "messages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $messages = $dataflowService->messages;
 *  </code>
 */
class Google_Service_Dataflow_ProjectsJobsMessages_Resource extends Google_Service_Resource
{

    /**
     * Request the job status. (messages.listProjectsJobsMessages)
     *
     * @param string $projectId
     * @param string $jobId
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     * @opt_param int pageSize
     * @opt_param string pageToken
     * @opt_param string startTime
     * @opt_param string endTime
     * @opt_param string minimumImportance
     */
    public function listProjectsJobsMessages($projectId, $jobId, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Dataflow_ListJobMessagesResponse");
    }
}

/**
 * The "workItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $workItems = $dataflowService->workItems;
 *  </code>
 */
class Google_Service_Dataflow_ProjectsJobsWorkItems_Resource extends Google_Service_Resource
{

    /**
     * Leases a dataflow WorkItem to run. (workItems.lease)
     *
     * @param string $projectId
     * @param string $jobId
     * @param Google_LeaseWorkItemRequest|Google_Service_Dataflow_LeaseWorkItemRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function lease($projectId, $jobId, Google_Service_Dataflow_LeaseWorkItemRequest $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('lease', [$params], "Google_Service_Dataflow_LeaseWorkItemResponse");
    }

    /**
     * Reports the status of dataflow WorkItems leased by a worker.
     * (workItems.reportStatus)
     *
     * @param string $projectId
     * @param string $jobId
     * @param Google_ReportWorkItemStatusRequest|Google_Service_Dataflow_ReportWorkItemStatusRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @throws Google_Exception
     */
    public function reportStatus($projectId, $jobId, Google_Service_Dataflow_ReportWorkItemStatusRequest $postBody, $optParams = [])
    {
        $params = ['projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('reportStatus', [$params], "Google_Service_Dataflow_ReportWorkItemStatusResponse");
    }
}


/**
 * Class Google_Service_Dataflow_ApproximateProgress
 */
class Google_Service_Dataflow_ApproximateProgress extends Google_Model
{
    public $percentComplete;
    public $remainingTime;
    protected $internal_gapi_mappings = [];
    protected $positionType = 'Google_Service_Dataflow_Position';
    protected $positionDataType = '';

    /**
     * @return mixed
     */
    public function getPercentComplete()
    {
        return $this->percentComplete;
    }

    /**
     * @param $percentComplete
     */
    public function setPercentComplete($percentComplete)
    {
        $this->percentComplete = $percentComplete;
    }

    /**
     * @param Google_Service_Dataflow_Position $position
     */
    public function setPosition(Google_Service_Dataflow_Position $position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getRemainingTime()
    {
        return $this->remainingTime;
    }

    /**
     * @param $remainingTime
     */
    public function setRemainingTime($remainingTime)
    {
        $this->remainingTime = $remainingTime;
    }
}

/**
 * Class Google_Service_Dataflow_AutoscalingSettings
 */
class Google_Service_Dataflow_AutoscalingSettings extends Google_Model
{
    public $algorithm;
    public $maxNumWorkers;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * @param $algorithm
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
    }

    /**
     * @return mixed
     */
    public function getMaxNumWorkers()
    {
        return $this->maxNumWorkers;
    }

    /**
     * @param $maxNumWorkers
     */
    public function setMaxNumWorkers($maxNumWorkers)
    {
        $this->maxNumWorkers = $maxNumWorkers;
    }
}

/**
 * Class Google_Service_Dataflow_ComputationTopology
 */
class Google_Service_Dataflow_ComputationTopology extends Google_Collection
{
    public $computationId;
    protected $collection_key = 'outputs';
    protected $internal_gapi_mappings = [];
    protected $inputsType = 'Google_Service_Dataflow_StreamLocation';
    protected $inputsDataType = 'array';
    protected $keyRangesType = 'Google_Service_Dataflow_KeyRangeLocation';
    protected $keyRangesDataType = 'array';
    protected $outputsType = 'Google_Service_Dataflow_StreamLocation';
    protected $outputsDataType = 'array';

    /**
     * @return mixed
     */
    public function getComputationId()
    {
        return $this->computationId;
    }

    /**
     * @param $computationId
     */
    public function setComputationId($computationId)
    {
        $this->computationId = $computationId;
    }

    /**
     * @param $inputs
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * @return mixed
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @param $keyRanges
     */
    public function setKeyRanges($keyRanges)
    {
        $this->keyRanges = $keyRanges;
    }

    /**
     * @return mixed
     */
    public function getKeyRanges()
    {
        return $this->keyRanges;
    }

    /**
     * @param $outputs
     */
    public function setOutputs($outputs)
    {
        $this->outputs = $outputs;
    }

    /**
     * @return mixed
     */
    public function getOutputs()
    {
        return $this->outputs;
    }
}

/**
 * Class Google_Service_Dataflow_DataDiskAssignment
 */
class Google_Service_Dataflow_DataDiskAssignment extends Google_Collection
{
    public $dataDisks;
    public $vmInstance;
    protected $collection_key = 'dataDisks';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDataDisks()
    {
        return $this->dataDisks;
    }

    /**
     * @param $dataDisks
     */
    public function setDataDisks($dataDisks)
    {
        $this->dataDisks = $dataDisks;
    }

    /**
     * @return mixed
     */
    public function getVmInstance()
    {
        return $this->vmInstance;
    }

    /**
     * @param $vmInstance
     */
    public function setVmInstance($vmInstance)
    {
        $this->vmInstance = $vmInstance;
    }
}

/**
 * Class Google_Service_Dataflow_DerivedSource
 */
class Google_Service_Dataflow_DerivedSource extends Google_Model
{
    public $derivationMode;
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Dataflow_Source';
    protected $sourceDataType = '';

    /**
     * @return mixed
     */
    public function getDerivationMode()
    {
        return $this->derivationMode;
    }

    /**
     * @param $derivationMode
     */
    public function setDerivationMode($derivationMode)
    {
        $this->derivationMode = $derivationMode;
    }

    /**
     * @param Google_Service_Dataflow_Source $source
     */
    public function setSource(Google_Service_Dataflow_Source $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
}

/**
 * Class Google_Service_Dataflow_Disk
 */
class Google_Service_Dataflow_Disk extends Google_Model
{
    public $diskType;
    public $mountPoint;
    public $sizeGb;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDiskType()
    {
        return $this->diskType;
    }

    /**
     * @param $diskType
     */
    public function setDiskType($diskType)
    {
        $this->diskType = $diskType;
    }

    /**
     * @return mixed
     */
    public function getMountPoint()
    {
        return $this->mountPoint;
    }

    /**
     * @param $mountPoint
     */
    public function setMountPoint($mountPoint)
    {
        $this->mountPoint = $mountPoint;
    }

    /**
     * @return mixed
     */
    public function getSizeGb()
    {
        return $this->sizeGb;
    }

    /**
     * @param $sizeGb
     */
    public function setSizeGb($sizeGb)
    {
        $this->sizeGb = $sizeGb;
    }
}

/**
 * Class Google_Service_Dataflow_DynamicSourceSplit
 */
class Google_Service_Dataflow_DynamicSourceSplit extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $primaryType = 'Google_Service_Dataflow_DerivedSource';
    protected $primaryDataType = '';
    protected $residualType = 'Google_Service_Dataflow_DerivedSource';
    protected $residualDataType = '';


    /**
     * @param Google_Service_Dataflow_DerivedSource $primary
     */
    public function setPrimary(Google_Service_Dataflow_DerivedSource $primary)
    {
        $this->primary = $primary;
    }

    /**
     * @return mixed
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * @param Google_Service_Dataflow_DerivedSource $residual
     */
    public function setResidual(Google_Service_Dataflow_DerivedSource $residual)
    {
        $this->residual = $residual;
    }

    /**
     * @return mixed
     */
    public function getResidual()
    {
        return $this->residual;
    }
}

/**
 * Class Google_Service_Dataflow_Environment
 */
class Google_Service_Dataflow_Environment extends Google_Collection
{
    public $clusterManagerApiService;
    public $dataset;
    public $experiments;
    public $sdkPipelineOptions;
    public $tempStoragePrefix;
    public $userAgent;
    public $version;
    protected $collection_key = 'workerPools';
    protected $internal_gapi_mappings = [];
    protected $workerPoolsType = 'Google_Service_Dataflow_WorkerPool';
    protected $workerPoolsDataType = 'array';

    /**
     * @return mixed
     */
    public function getClusterManagerApiService()
    {
        return $this->clusterManagerApiService;
    }

    /**
     * @param $clusterManagerApiService
     */
    public function setClusterManagerApiService($clusterManagerApiService)
    {
        $this->clusterManagerApiService = $clusterManagerApiService;
    }

    /**
     * @return mixed
     */
    public function getDataset()
    {
        return $this->dataset;
    }

    /**
     * @param $dataset
     */
    public function setDataset($dataset)
    {
        $this->dataset = $dataset;
    }

    /**
     * @return mixed
     */
    public function getExperiments()
    {
        return $this->experiments;
    }

    /**
     * @param $experiments
     */
    public function setExperiments($experiments)
    {
        $this->experiments = $experiments;
    }

    /**
     * @return mixed
     */
    public function getSdkPipelineOptions()
    {
        return $this->sdkPipelineOptions;
    }

    /**
     * @param $sdkPipelineOptions
     */
    public function setSdkPipelineOptions($sdkPipelineOptions)
    {
        $this->sdkPipelineOptions = $sdkPipelineOptions;
    }

    /**
     * @return mixed
     */
    public function getTempStoragePrefix()
    {
        return $this->tempStoragePrefix;
    }

    /**
     * @param $tempStoragePrefix
     */
    public function setTempStoragePrefix($tempStoragePrefix)
    {
        $this->tempStoragePrefix = $tempStoragePrefix;
    }

    /**
     * @return mixed
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @param $workerPools
     */
    public function setWorkerPools($workerPools)
    {
        $this->workerPools = $workerPools;
    }

    /**
     * @return mixed
     */
    public function getWorkerPools()
    {
        return $this->workerPools;
    }
}

/**
 * Class Google_Service_Dataflow_EnvironmentSdkPipelineOptions
 */
class Google_Service_Dataflow_EnvironmentSdkPipelineOptions extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_EnvironmentUserAgent
 */
class Google_Service_Dataflow_EnvironmentUserAgent extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_EnvironmentVersion
 */
class Google_Service_Dataflow_EnvironmentVersion extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_FlattenInstruction
 */
class Google_Service_Dataflow_FlattenInstruction extends Google_Collection
{
    protected $collection_key = 'inputs';
    protected $internal_gapi_mappings = [];
    protected $inputsType = 'Google_Service_Dataflow_InstructionInput';
    protected $inputsDataType = 'array';


    /**
     * @param $inputs
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * @return mixed
     */
    public function getInputs()
    {
        return $this->inputs;
    }
}

/**
 * Class Google_Service_Dataflow_InstructionInput
 */
class Google_Service_Dataflow_InstructionInput extends Google_Model
{
    public $outputNum;
    public $producerInstructionIndex;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getOutputNum()
    {
        return $this->outputNum;
    }

    /**
     * @param $outputNum
     */
    public function setOutputNum($outputNum)
    {
        $this->outputNum = $outputNum;
    }

    /**
     * @return mixed
     */
    public function getProducerInstructionIndex()
    {
        return $this->producerInstructionIndex;
    }

    /**
     * @param $producerInstructionIndex
     */
    public function setProducerInstructionIndex($producerInstructionIndex)
    {
        $this->producerInstructionIndex = $producerInstructionIndex;
    }
}

/**
 * Class Google_Service_Dataflow_InstructionOutput
 */
class Google_Service_Dataflow_InstructionOutput extends Google_Model
{
    public $codec;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @param $codec
     */
    public function setCodec($codec)
    {
        $this->codec = $codec;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

/**
 * Class Google_Service_Dataflow_InstructionOutputCodec
 */
class Google_Service_Dataflow_InstructionOutputCodec extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_Job
 */
class Google_Service_Dataflow_Job extends Google_Collection
{
    public $createTime;
    public $currentState;
    public $currentStateTime;
    public $id;
    public $name;
    public $projectId;
    public $requestedState;
    public $type;
    protected $collection_key = 'steps';
    protected $internal_gapi_mappings = [];
    protected $environmentType = 'Google_Service_Dataflow_Environment';
    protected $environmentDataType = '';
    protected $executionInfoType = 'Google_Service_Dataflow_JobExecutionInfo';
    protected $executionInfoDataType = '';
    protected $stepsType = 'Google_Service_Dataflow_Step';
    protected $stepsDataType = 'array';

    /**
     * @return mixed
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param $createTime
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * @return mixed
     */
    public function getCurrentState()
    {
        return $this->currentState;
    }

    /**
     * @param $currentState
     */
    public function setCurrentState($currentState)
    {
        $this->currentState = $currentState;
    }

    /**
     * @return mixed
     */
    public function getCurrentStateTime()
    {
        return $this->currentStateTime;
    }

    /**
     * @param $currentStateTime
     */
    public function setCurrentStateTime($currentStateTime)
    {
        $this->currentStateTime = $currentStateTime;
    }

    /**
     * @param Google_Service_Dataflow_Environment $environment
     */
    public function setEnvironment(Google_Service_Dataflow_Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param Google_Service_Dataflow_JobExecutionInfo $executionInfo
     */
    public function setExecutionInfo(Google_Service_Dataflow_JobExecutionInfo $executionInfo)
    {
        $this->executionInfo = $executionInfo;
    }

    /**
     * @return mixed
     */
    public function getExecutionInfo()
    {
        return $this->executionInfo;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getRequestedState()
    {
        return $this->requestedState;
    }

    /**
     * @param $requestedState
     */
    public function setRequestedState($requestedState)
    {
        $this->requestedState = $requestedState;
    }

    /**
     * @param $steps
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;
    }

    /**
     * @return mixed
     */
    public function getSteps()
    {
        return $this->steps;
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
 * Class Google_Service_Dataflow_JobExecutionInfo
 */
class Google_Service_Dataflow_JobExecutionInfo extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $stagesType = 'Google_Service_Dataflow_JobExecutionStageInfo';
    protected $stagesDataType = 'map';


    /**
     * @param $stages
     */
    public function setStages($stages)
    {
        $this->stages = $stages;
    }

    /**
     * @return mixed
     */
    public function getStages()
    {
        return $this->stages;
    }
}

/**
 * Class Google_Service_Dataflow_JobExecutionInfoStages
 */
class Google_Service_Dataflow_JobExecutionInfoStages extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_JobExecutionStageInfo
 */
class Google_Service_Dataflow_JobExecutionStageInfo extends Google_Collection
{
    public $stepName;
    protected $collection_key = 'stepName';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getStepName()
    {
        return $this->stepName;
    }

    /**
     * @param $stepName
     */
    public function setStepName($stepName)
    {
        $this->stepName = $stepName;
    }
}

/**
 * Class Google_Service_Dataflow_JobMessage
 */
class Google_Service_Dataflow_JobMessage extends Google_Model
{
    public $id;
    public $messageImportance;
    public $messageText;
    public $time;
    protected $internal_gapi_mappings = [];

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
    public function getMessageImportance()
    {
        return $this->messageImportance;
    }

    /**
     * @param $messageImportance
     */
    public function setMessageImportance($messageImportance)
    {
        $this->messageImportance = $messageImportance;
    }

    /**
     * @return mixed
     */
    public function getMessageText()
    {
        return $this->messageText;
    }

    /**
     * @param $messageText
     */
    public function setMessageText($messageText)
    {
        $this->messageText = $messageText;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }
}

/**
 * Class Google_Service_Dataflow_JobMetrics
 */
class Google_Service_Dataflow_JobMetrics extends Google_Collection
{
    public $metricTime;
    protected $collection_key = 'metrics';
    protected $internal_gapi_mappings = [];
    protected $metricsType = 'Google_Service_Dataflow_MetricUpdate';
    protected $metricsDataType = 'array';

    /**
     * @return mixed
     */
    public function getMetricTime()
    {
        return $this->metricTime;
    }

    /**
     * @param $metricTime
     */
    public function setMetricTime($metricTime)
    {
        $this->metricTime = $metricTime;
    }

    /**
     * @param $metrics
     */
    public function setMetrics($metrics)
    {
        $this->metrics = $metrics;
    }

    /**
     * @return mixed
     */
    public function getMetrics()
    {
        return $this->metrics;
    }
}

/**
 * Class Google_Service_Dataflow_KeyRangeDataDiskAssignment
 */
class Google_Service_Dataflow_KeyRangeDataDiskAssignment extends Google_Model
{
    public $dataDisk;
    public $end;
    public $start;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDataDisk()
    {
        return $this->dataDisk;
    }

    /**
     * @param $dataDisk
     */
    public function setDataDisk($dataDisk)
    {
        $this->dataDisk = $dataDisk;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }
}

/**
 * Class Google_Service_Dataflow_KeyRangeLocation
 */
class Google_Service_Dataflow_KeyRangeLocation extends Google_Model
{
    public $dataDisk;
    public $deliveryEndpoint;
    public $end;
    public $persistentDirectory;
    public $start;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDataDisk()
    {
        return $this->dataDisk;
    }

    /**
     * @param $dataDisk
     */
    public function setDataDisk($dataDisk)
    {
        $this->dataDisk = $dataDisk;
    }

    /**
     * @return mixed
     */
    public function getDeliveryEndpoint()
    {
        return $this->deliveryEndpoint;
    }

    /**
     * @param $deliveryEndpoint
     */
    public function setDeliveryEndpoint($deliveryEndpoint)
    {
        $this->deliveryEndpoint = $deliveryEndpoint;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getPersistentDirectory()
    {
        return $this->persistentDirectory;
    }

    /**
     * @param $persistentDirectory
     */
    public function setPersistentDirectory($persistentDirectory)
    {
        $this->persistentDirectory = $persistentDirectory;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }
}

/**
 * Class Google_Service_Dataflow_LeaseWorkItemRequest
 */
class Google_Service_Dataflow_LeaseWorkItemRequest extends Google_Collection
{
    public $currentWorkerTime;
    public $requestedLeaseDuration;
    public $workItemTypes;
    public $workerCapabilities;
    public $workerId;
    protected $collection_key = 'workerCapabilities';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCurrentWorkerTime()
    {
        return $this->currentWorkerTime;
    }

    /**
     * @param $currentWorkerTime
     */
    public function setCurrentWorkerTime($currentWorkerTime)
    {
        $this->currentWorkerTime = $currentWorkerTime;
    }

    /**
     * @return mixed
     */
    public function getRequestedLeaseDuration()
    {
        return $this->requestedLeaseDuration;
    }

    /**
     * @param $requestedLeaseDuration
     */
    public function setRequestedLeaseDuration($requestedLeaseDuration)
    {
        $this->requestedLeaseDuration = $requestedLeaseDuration;
    }

    /**
     * @return mixed
     */
    public function getWorkItemTypes()
    {
        return $this->workItemTypes;
    }

    /**
     * @param $workItemTypes
     */
    public function setWorkItemTypes($workItemTypes)
    {
        $this->workItemTypes = $workItemTypes;
    }

    /**
     * @return mixed
     */
    public function getWorkerCapabilities()
    {
        return $this->workerCapabilities;
    }

    /**
     * @param $workerCapabilities
     */
    public function setWorkerCapabilities($workerCapabilities)
    {
        $this->workerCapabilities = $workerCapabilities;
    }

    /**
     * @return mixed
     */
    public function getWorkerId()
    {
        return $this->workerId;
    }

    /**
     * @param $workerId
     */
    public function setWorkerId($workerId)
    {
        $this->workerId = $workerId;
    }
}

/**
 * Class Google_Service_Dataflow_LeaseWorkItemResponse
 */
class Google_Service_Dataflow_LeaseWorkItemResponse extends Google_Collection
{
    protected $collection_key = 'workItems';
    protected $internal_gapi_mappings = [];
    protected $workItemsType = 'Google_Service_Dataflow_WorkItem';
    protected $workItemsDataType = 'array';


    /**
     * @param $workItems
     */
    public function setWorkItems($workItems)
    {
        $this->workItems = $workItems;
    }

    /**
     * @return mixed
     */
    public function getWorkItems()
    {
        return $this->workItems;
    }
}

/**
 * Class Google_Service_Dataflow_ListJobMessagesResponse
 */
class Google_Service_Dataflow_ListJobMessagesResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'jobMessages';
    protected $internal_gapi_mappings = [];
    protected $jobMessagesType = 'Google_Service_Dataflow_JobMessage';
    protected $jobMessagesDataType = 'array';

    /**
     * @param $jobMessages
     */
    public function setJobMessages($jobMessages)
    {
        $this->jobMessages = $jobMessages;
    }

    /**
     * @return mixed
     */
    public function getJobMessages()
    {
        return $this->jobMessages;
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
 * Class Google_Service_Dataflow_ListJobsResponse
 */
class Google_Service_Dataflow_ListJobsResponse extends Google_Collection
{
    public $nextPageToken;
    protected $collection_key = 'jobs';
    protected $internal_gapi_mappings = [];
    protected $jobsType = 'Google_Service_Dataflow_Job';
    protected $jobsDataType = 'array';

    /**
     * @param $jobs
     */
    public function setJobs($jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * @return mixed
     */
    public function getJobs()
    {
        return $this->jobs;
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
 * Class Google_Service_Dataflow_MapTask
 */
class Google_Service_Dataflow_MapTask extends Google_Collection
{
    public $stageName;
    public $systemName;
    protected $collection_key = 'instructions';
    protected $internal_gapi_mappings = [];
    protected $instructionsType = 'Google_Service_Dataflow_ParallelInstruction';
    protected $instructionsDataType = 'array';

    /**
     * @param $instructions
     */
    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
    }

    /**
     * @return mixed
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @return mixed
     */
    public function getStageName()
    {
        return $this->stageName;
    }

    /**
     * @param $stageName
     */
    public function setStageName($stageName)
    {
        $this->stageName = $stageName;
    }

    /**
     * @return mixed
     */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * @param $systemName
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;
    }
}

/**
 * Class Google_Service_Dataflow_MetricStructuredName
 */
class Google_Service_Dataflow_MetricStructuredName extends Google_Model
{
    public $context;
    public $name;
    public $origin;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }
}

/**
 * Class Google_Service_Dataflow_MetricStructuredNameContext
 */
class Google_Service_Dataflow_MetricStructuredNameContext extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_MetricUpdate
 */
class Google_Service_Dataflow_MetricUpdate extends Google_Model
{
    public $cumulative;
    public $internal;
    public $kind;
    public $meanCount;
    public $meanSum;
    public $scalar;
    public $set;
    public $updateTime;
    protected $internal_gapi_mappings = [];
    protected $nameType = 'Google_Service_Dataflow_MetricStructuredName';
    protected $nameDataType = '';

    /**
     * @return mixed
     */
    public function getCumulative()
    {
        return $this->cumulative;
    }

    /**
     * @param $cumulative
     */
    public function setCumulative($cumulative)
    {
        $this->cumulative = $cumulative;
    }

    /**
     * @return mixed
     */
    public function getInternal()
    {
        return $this->internal;
    }

    /**
     * @param $internal
     */
    public function setInternal($internal)
    {
        $this->internal = $internal;
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
    public function getMeanCount()
    {
        return $this->meanCount;
    }

    /**
     * @param $meanCount
     */
    public function setMeanCount($meanCount)
    {
        $this->meanCount = $meanCount;
    }

    /**
     * @return mixed
     */
    public function getMeanSum()
    {
        return $this->meanSum;
    }

    /**
     * @param $meanSum
     */
    public function setMeanSum($meanSum)
    {
        $this->meanSum = $meanSum;
    }

    /**
     * @param Google_Service_Dataflow_MetricStructuredName $name
     */
    public function setName(Google_Service_Dataflow_MetricStructuredName $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getScalar()
    {
        return $this->scalar;
    }

    /**
     * @param $scalar
     */
    public function setScalar($scalar)
    {
        $this->scalar = $scalar;
    }

    /**
     * @return mixed
     */
    public function getSet()
    {
        return $this->set;
    }

    /**
     * @param $set
     */
    public function setSet($set)
    {
        $this->set = $set;
    }

    /**
     * @return mixed
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * @param $updateTime
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }
}

/**
 * Class Google_Service_Dataflow_MountedDataDisk
 */
class Google_Service_Dataflow_MountedDataDisk extends Google_Model
{
    public $dataDisk;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDataDisk()
    {
        return $this->dataDisk;
    }

    /**
     * @param $dataDisk
     */
    public function setDataDisk($dataDisk)
    {
        $this->dataDisk = $dataDisk;
    }
}

/**
 * Class Google_Service_Dataflow_MultiOutputInfo
 */
class Google_Service_Dataflow_MultiOutputInfo extends Google_Model
{
    public $tag;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Dataflow_Package
 */
class Google_Service_Dataflow_Package extends Google_Model
{
    public $location;
    public $name;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

/**
 * Class Google_Service_Dataflow_ParDoInstruction
 */
class Google_Service_Dataflow_ParDoInstruction extends Google_Collection
{
    public $numOutputs;
    public $userFn;
    protected $collection_key = 'sideInputs';
    protected $internal_gapi_mappings = [];
    protected $inputType = 'Google_Service_Dataflow_InstructionInput';
    protected $inputDataType = '';
    protected $multiOutputInfosType = 'Google_Service_Dataflow_MultiOutputInfo';
    protected $multiOutputInfosDataType = 'array';
    protected $sideInputsType = 'Google_Service_Dataflow_SideInputInfo';
    protected $sideInputsDataType = 'array';

    /**
     * @param Google_Service_Dataflow_InstructionInput $input
     */
    public function setInput(Google_Service_Dataflow_InstructionInput $input)
    {
        $this->input = $input;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param $multiOutputInfos
     */
    public function setMultiOutputInfos($multiOutputInfos)
    {
        $this->multiOutputInfos = $multiOutputInfos;
    }

    /**
     * @return mixed
     */
    public function getMultiOutputInfos()
    {
        return $this->multiOutputInfos;
    }

    /**
     * @return mixed
     */
    public function getNumOutputs()
    {
        return $this->numOutputs;
    }

    /**
     * @param $numOutputs
     */
    public function setNumOutputs($numOutputs)
    {
        $this->numOutputs = $numOutputs;
    }

    /**
     * @param $sideInputs
     */
    public function setSideInputs($sideInputs)
    {
        $this->sideInputs = $sideInputs;
    }

    /**
     * @return mixed
     */
    public function getSideInputs()
    {
        return $this->sideInputs;
    }

    /**
     * @return mixed
     */
    public function getUserFn()
    {
        return $this->userFn;
    }

    /**
     * @param $userFn
     */
    public function setUserFn($userFn)
    {
        $this->userFn = $userFn;
    }
}

/**
 * Class Google_Service_Dataflow_ParDoInstructionUserFn
 */
class Google_Service_Dataflow_ParDoInstructionUserFn extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_ParallelInstruction
 */
class Google_Service_Dataflow_ParallelInstruction extends Google_Collection
{
    public $name;
    public $systemName;
    protected $collection_key = 'outputs';
    protected $internal_gapi_mappings = [];
    protected $flattenType = 'Google_Service_Dataflow_FlattenInstruction';
    protected $flattenDataType = '';
    protected $outputsType = 'Google_Service_Dataflow_InstructionOutput';
    protected $outputsDataType = 'array';
    protected $parDoType = 'Google_Service_Dataflow_ParDoInstruction';
    protected $parDoDataType = '';
    protected $partialGroupByKeyType = 'Google_Service_Dataflow_PartialGroupByKeyInstruction';
    protected $partialGroupByKeyDataType = '';
    protected $readType = 'Google_Service_Dataflow_ReadInstruction';
    protected $readDataType = '';
    protected $writeType = 'Google_Service_Dataflow_WriteInstruction';
    protected $writeDataType = '';


    /**
     * @param Google_Service_Dataflow_FlattenInstruction $flatten
     */
    public function setFlatten(Google_Service_Dataflow_FlattenInstruction $flatten)
    {
        $this->flatten = $flatten;
    }

    /**
     * @return mixed
     */
    public function getFlatten()
    {
        return $this->flatten;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $outputs
     */
    public function setOutputs($outputs)
    {
        $this->outputs = $outputs;
    }

    /**
     * @return mixed
     */
    public function getOutputs()
    {
        return $this->outputs;
    }

    /**
     * @param Google_Service_Dataflow_ParDoInstruction $parDo
     */
    public function setParDo(Google_Service_Dataflow_ParDoInstruction $parDo)
    {
        $this->parDo = $parDo;
    }

    /**
     * @return mixed
     */
    public function getParDo()
    {
        return $this->parDo;
    }

    /**
     * @param Google_Service_Dataflow_PartialGroupByKeyInstruction $partialGroupByKey
     */
    public function setPartialGroupByKey(Google_Service_Dataflow_PartialGroupByKeyInstruction $partialGroupByKey)
    {
        $this->partialGroupByKey = $partialGroupByKey;
    }

    /**
     * @return mixed
     */
    public function getPartialGroupByKey()
    {
        return $this->partialGroupByKey;
    }

    /**
     * @param Google_Service_Dataflow_ReadInstruction $read
     */
    public function setRead(Google_Service_Dataflow_ReadInstruction $read)
    {
        $this->read = $read;
    }

    /**
     * @return mixed
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * @return mixed
     */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * @param $systemName
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;
    }

    /**
     * @param Google_Service_Dataflow_WriteInstruction $write
     */
    public function setWrite(Google_Service_Dataflow_WriteInstruction $write)
    {
        $this->write = $write;
    }

    /**
     * @return mixed
     */
    public function getWrite()
    {
        return $this->write;
    }
}

/**
 * Class Google_Service_Dataflow_PartialGroupByKeyInstruction
 */
class Google_Service_Dataflow_PartialGroupByKeyInstruction extends Google_Model
{
    public $inputElementCodec;
    public $valueCombiningFn;
    protected $internal_gapi_mappings = [];
    protected $inputType = 'Google_Service_Dataflow_InstructionInput';
    protected $inputDataType = '';

    /**
     * @param Google_Service_Dataflow_InstructionInput $input
     */
    public function setInput(Google_Service_Dataflow_InstructionInput $input)
    {
        $this->input = $input;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @return mixed
     */
    public function getInputElementCodec()
    {
        return $this->inputElementCodec;
    }

    /**
     * @param $inputElementCodec
     */
    public function setInputElementCodec($inputElementCodec)
    {
        $this->inputElementCodec = $inputElementCodec;
    }

    /**
     * @return mixed
     */
    public function getValueCombiningFn()
    {
        return $this->valueCombiningFn;
    }

    /**
     * @param $valueCombiningFn
     */
    public function setValueCombiningFn($valueCombiningFn)
    {
        $this->valueCombiningFn = $valueCombiningFn;
    }
}

/**
 * Class Google_Service_Dataflow_PartialGroupByKeyInstructionInputElementCodec
 */
class Google_Service_Dataflow_PartialGroupByKeyInstructionInputElementCodec extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_PartialGroupByKeyInstructionValueCombiningFn
 */
class Google_Service_Dataflow_PartialGroupByKeyInstructionValueCombiningFn extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_Position
 */
class Google_Service_Dataflow_Position extends Google_Model
{
    public $byteOffset;
    public $end;
    public $key;
    public $recordIndex;
    public $shufflePosition;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getByteOffset()
    {
        return $this->byteOffset;
    }

    /**
     * @param $byteOffset
     */
    public function setByteOffset($byteOffset)
    {
        $this->byteOffset = $byteOffset;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getRecordIndex()
    {
        return $this->recordIndex;
    }

    /**
     * @param $recordIndex
     */
    public function setRecordIndex($recordIndex)
    {
        $this->recordIndex = $recordIndex;
    }

    /**
     * @return mixed
     */
    public function getShufflePosition()
    {
        return $this->shufflePosition;
    }

    /**
     * @param $shufflePosition
     */
    public function setShufflePosition($shufflePosition)
    {
        $this->shufflePosition = $shufflePosition;
    }
}

/**
 * Class Google_Service_Dataflow_PubsubLocation
 */
class Google_Service_Dataflow_PubsubLocation extends Google_Model
{
    public $dropLateData;
    public $idLabel;
    public $subscription;
    public $timestampLabel;
    public $topic;
    public $trackingSubscription;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDropLateData()
    {
        return $this->dropLateData;
    }

    /**
     * @param $dropLateData
     */
    public function setDropLateData($dropLateData)
    {
        $this->dropLateData = $dropLateData;
    }

    /**
     * @return mixed
     */
    public function getIdLabel()
    {
        return $this->idLabel;
    }

    /**
     * @param $idLabel
     */
    public function setIdLabel($idLabel)
    {
        $this->idLabel = $idLabel;
    }

    /**
     * @return mixed
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * @param $subscription
     */
    public function setSubscription($subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * @return mixed
     */
    public function getTimestampLabel()
    {
        return $this->timestampLabel;
    }

    /**
     * @param $timestampLabel
     */
    public function setTimestampLabel($timestampLabel)
    {
        $this->timestampLabel = $timestampLabel;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return mixed
     */
    public function getTrackingSubscription()
    {
        return $this->trackingSubscription;
    }

    /**
     * @param $trackingSubscription
     */
    public function setTrackingSubscription($trackingSubscription)
    {
        $this->trackingSubscription = $trackingSubscription;
    }
}

/**
 * Class Google_Service_Dataflow_ReadInstruction
 */
class Google_Service_Dataflow_ReadInstruction extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Dataflow_Source';
    protected $sourceDataType = '';


    /**
     * @param Google_Service_Dataflow_Source $source
     */
    public function setSource(Google_Service_Dataflow_Source $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
}

/**
 * Class Google_Service_Dataflow_ReportWorkItemStatusRequest
 */
class Google_Service_Dataflow_ReportWorkItemStatusRequest extends Google_Collection
{
    public $currentWorkerTime;
    public $workerId;
    protected $collection_key = 'workItemStatuses';
    protected $internal_gapi_mappings = [];
    protected $workItemStatusesType = 'Google_Service_Dataflow_WorkItemStatus';
    protected $workItemStatusesDataType = 'array';

    /**
     * @return mixed
     */
    public function getCurrentWorkerTime()
    {
        return $this->currentWorkerTime;
    }

    /**
     * @param $currentWorkerTime
     */
    public function setCurrentWorkerTime($currentWorkerTime)
    {
        $this->currentWorkerTime = $currentWorkerTime;
    }

    /**
     * @param $workItemStatuses
     */
    public function setWorkItemStatuses($workItemStatuses)
    {
        $this->workItemStatuses = $workItemStatuses;
    }

    /**
     * @return mixed
     */
    public function getWorkItemStatuses()
    {
        return $this->workItemStatuses;
    }

    /**
     * @return mixed
     */
    public function getWorkerId()
    {
        return $this->workerId;
    }

    /**
     * @param $workerId
     */
    public function setWorkerId($workerId)
    {
        $this->workerId = $workerId;
    }
}

/**
 * Class Google_Service_Dataflow_ReportWorkItemStatusResponse
 */
class Google_Service_Dataflow_ReportWorkItemStatusResponse extends Google_Collection
{
    protected $collection_key = 'workItemServiceStates';
    protected $internal_gapi_mappings = [];
    protected $workItemServiceStatesType = 'Google_Service_Dataflow_WorkItemServiceState';
    protected $workItemServiceStatesDataType = 'array';


    /**
     * @param $workItemServiceStates
     */
    public function setWorkItemServiceStates($workItemServiceStates)
    {
        $this->workItemServiceStates = $workItemServiceStates;
    }

    /**
     * @return mixed
     */
    public function getWorkItemServiceStates()
    {
        return $this->workItemServiceStates;
    }
}

/**
 * Class Google_Service_Dataflow_SeqMapTask
 */
class Google_Service_Dataflow_SeqMapTask extends Google_Collection
{
    public $name;
    public $stageName;
    public $systemName;
    public $userFn;
    protected $collection_key = 'outputInfos';
    protected $internal_gapi_mappings = [];
    protected $inputsType = 'Google_Service_Dataflow_SideInputInfo';
    protected $inputsDataType = 'array';
    protected $outputInfosType = 'Google_Service_Dataflow_SeqMapTaskOutputInfo';
    protected $outputInfosDataType = 'array';

    /**
     * @param $inputs
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * @return mixed
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $outputInfos
     */
    public function setOutputInfos($outputInfos)
    {
        $this->outputInfos = $outputInfos;
    }

    /**
     * @return mixed
     */
    public function getOutputInfos()
    {
        return $this->outputInfos;
    }

    /**
     * @return mixed
     */
    public function getStageName()
    {
        return $this->stageName;
    }

    /**
     * @param $stageName
     */
    public function setStageName($stageName)
    {
        $this->stageName = $stageName;
    }

    /**
     * @return mixed
     */
    public function getSystemName()
    {
        return $this->systemName;
    }

    /**
     * @param $systemName
     */
    public function setSystemName($systemName)
    {
        $this->systemName = $systemName;
    }

    /**
     * @return mixed
     */
    public function getUserFn()
    {
        return $this->userFn;
    }

    /**
     * @param $userFn
     */
    public function setUserFn($userFn)
    {
        $this->userFn = $userFn;
    }
}

/**
 * Class Google_Service_Dataflow_SeqMapTaskOutputInfo
 */
class Google_Service_Dataflow_SeqMapTaskOutputInfo extends Google_Model
{
    public $tag;
    protected $internal_gapi_mappings = [];
    protected $sinkType = 'Google_Service_Dataflow_Sink';
    protected $sinkDataType = '';

    /**
     * @param Google_Service_Dataflow_Sink $sink
     */
    public function setSink(Google_Service_Dataflow_Sink $sink)
    {
        $this->sink = $sink;
    }

    /**
     * @return mixed
     */
    public function getSink()
    {
        return $this->sink;
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
 * Class Google_Service_Dataflow_SeqMapTaskUserFn
 */
class Google_Service_Dataflow_SeqMapTaskUserFn extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_ShellTask
 */
class Google_Service_Dataflow_ShellTask extends Google_Model
{
    public $command;
    public $exitCode;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param $command
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    /**
     * @return mixed
     */
    public function getExitCode()
    {
        return $this->exitCode;
    }

    /**
     * @param $exitCode
     */
    public function setExitCode($exitCode)
    {
        $this->exitCode = $exitCode;
    }
}

/**
 * Class Google_Service_Dataflow_SideInputInfo
 */
class Google_Service_Dataflow_SideInputInfo extends Google_Collection
{
    public $kind;
    public $tag;
    protected $collection_key = 'sources';
    protected $internal_gapi_mappings = [];
    protected $sourcesType = 'Google_Service_Dataflow_Source';
    protected $sourcesDataType = 'array';

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
     * @param $sources
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
    }

    /**
     * @return mixed
     */
    public function getSources()
    {
        return $this->sources;
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
 * Class Google_Service_Dataflow_SideInputInfoKind
 */
class Google_Service_Dataflow_SideInputInfoKind extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_Sink
 */
class Google_Service_Dataflow_Sink extends Google_Model
{
    public $codec;
    public $spec;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @param $codec
     */
    public function setCodec($codec)
    {
        $this->codec = $codec;
    }

    /**
     * @return mixed
     */
    public function getSpec()
    {
        return $this->spec;
    }

    /**
     * @param $spec
     */
    public function setSpec($spec)
    {
        $this->spec = $spec;
    }
}

/**
 * Class Google_Service_Dataflow_SinkCodec
 */
class Google_Service_Dataflow_SinkCodec extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_SinkSpec
 */
class Google_Service_Dataflow_SinkSpec extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_Source
 */
class Google_Service_Dataflow_Source extends Google_Collection
{
    public $baseSpecs;
    public $codec;
    public $doesNotNeedSplitting;
    public $spec;
    protected $collection_key = 'baseSpecs';
    protected $internal_gapi_mappings = [];
    protected $metadataType = 'Google_Service_Dataflow_SourceMetadata';
    protected $metadataDataType = '';

    /**
     * @return mixed
     */
    public function getBaseSpecs()
    {
        return $this->baseSpecs;
    }

    /**
     * @param $baseSpecs
     */
    public function setBaseSpecs($baseSpecs)
    {
        $this->baseSpecs = $baseSpecs;
    }

    /**
     * @return mixed
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * @param $codec
     */
    public function setCodec($codec)
    {
        $this->codec = $codec;
    }

    /**
     * @return mixed
     */
    public function getDoesNotNeedSplitting()
    {
        return $this->doesNotNeedSplitting;
    }

    /**
     * @param $doesNotNeedSplitting
     */
    public function setDoesNotNeedSplitting($doesNotNeedSplitting)
    {
        $this->doesNotNeedSplitting = $doesNotNeedSplitting;
    }

    /**
     * @param Google_Service_Dataflow_SourceMetadata $metadata
     */
    public function setMetadata(Google_Service_Dataflow_SourceMetadata $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @return mixed
     */
    public function getSpec()
    {
        return $this->spec;
    }

    /**
     * @param $spec
     */
    public function setSpec($spec)
    {
        $this->spec = $spec;
    }
}

/**
 * Class Google_Service_Dataflow_SourceBaseSpecs
 */
class Google_Service_Dataflow_SourceBaseSpecs extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_SourceCodec
 */
class Google_Service_Dataflow_SourceCodec extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_SourceFork
 */
class Google_Service_Dataflow_SourceFork extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $primaryType = 'Google_Service_Dataflow_SourceSplitShard';
    protected $primaryDataType = '';
    protected $primarySourceType = 'Google_Service_Dataflow_DerivedSource';
    protected $primarySourceDataType = '';
    protected $residualType = 'Google_Service_Dataflow_SourceSplitShard';
    protected $residualDataType = '';
    protected $residualSourceType = 'Google_Service_Dataflow_DerivedSource';
    protected $residualSourceDataType = '';


    /**
     * @param Google_Service_Dataflow_SourceSplitShard $primary
     */
    public function setPrimary(Google_Service_Dataflow_SourceSplitShard $primary)
    {
        $this->primary = $primary;
    }

    /**
     * @return mixed
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * @param Google_Service_Dataflow_DerivedSource $primarySource
     */
    public function setPrimarySource(Google_Service_Dataflow_DerivedSource $primarySource)
    {
        $this->primarySource = $primarySource;
    }

    /**
     * @return mixed
     */
    public function getPrimarySource()
    {
        return $this->primarySource;
    }

    /**
     * @param Google_Service_Dataflow_SourceSplitShard $residual
     */
    public function setResidual(Google_Service_Dataflow_SourceSplitShard $residual)
    {
        $this->residual = $residual;
    }

    /**
     * @return mixed
     */
    public function getResidual()
    {
        return $this->residual;
    }

    /**
     * @param Google_Service_Dataflow_DerivedSource $residualSource
     */
    public function setResidualSource(Google_Service_Dataflow_DerivedSource $residualSource)
    {
        $this->residualSource = $residualSource;
    }

    /**
     * @return mixed
     */
    public function getResidualSource()
    {
        return $this->residualSource;
    }
}

/**
 * Class Google_Service_Dataflow_SourceGetMetadataRequest
 */
class Google_Service_Dataflow_SourceGetMetadataRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Dataflow_Source';
    protected $sourceDataType = '';


    /**
     * @param Google_Service_Dataflow_Source $source
     */
    public function setSource(Google_Service_Dataflow_Source $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
}

/**
 * Class Google_Service_Dataflow_SourceGetMetadataResponse
 */
class Google_Service_Dataflow_SourceGetMetadataResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $metadataType = 'Google_Service_Dataflow_SourceMetadata';
    protected $metadataDataType = '';


    /**
     * @param Google_Service_Dataflow_SourceMetadata $metadata
     */
    public function setMetadata(Google_Service_Dataflow_SourceMetadata $metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
}

/**
 * Class Google_Service_Dataflow_SourceMetadata
 */
class Google_Service_Dataflow_SourceMetadata extends Google_Model
{
    public $estimatedSizeBytes;
    public $infinite;
    public $producesSortedKeys;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getEstimatedSizeBytes()
    {
        return $this->estimatedSizeBytes;
    }

    /**
     * @param $estimatedSizeBytes
     */
    public function setEstimatedSizeBytes($estimatedSizeBytes)
    {
        $this->estimatedSizeBytes = $estimatedSizeBytes;
    }

    /**
     * @return mixed
     */
    public function getInfinite()
    {
        return $this->infinite;
    }

    /**
     * @param $infinite
     */
    public function setInfinite($infinite)
    {
        $this->infinite = $infinite;
    }

    /**
     * @return mixed
     */
    public function getProducesSortedKeys()
    {
        return $this->producesSortedKeys;
    }

    /**
     * @param $producesSortedKeys
     */
    public function setProducesSortedKeys($producesSortedKeys)
    {
        $this->producesSortedKeys = $producesSortedKeys;
    }
}

/**
 * Class Google_Service_Dataflow_SourceOperationRequest
 */
class Google_Service_Dataflow_SourceOperationRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $getMetadataType = 'Google_Service_Dataflow_SourceGetMetadataRequest';
    protected $getMetadataDataType = '';
    protected $splitType = 'Google_Service_Dataflow_SourceSplitRequest';
    protected $splitDataType = '';


    /**
     * @param Google_Service_Dataflow_SourceGetMetadataRequest $getMetadata
     */
    public function setGetMetadata(Google_Service_Dataflow_SourceGetMetadataRequest $getMetadata)
    {
        $this->getMetadata = $getMetadata;
    }

    /**
     * @return mixed
     */
    public function getGetMetadata()
    {
        return $this->getMetadata;
    }

    /**
     * @param Google_Service_Dataflow_SourceSplitRequest $split
     */
    public function setSplit(Google_Service_Dataflow_SourceSplitRequest $split)
    {
        $this->split = $split;
    }

    /**
     * @return mixed
     */
    public function getSplit()
    {
        return $this->split;
    }
}

/**
 * Class Google_Service_Dataflow_SourceOperationResponse
 */
class Google_Service_Dataflow_SourceOperationResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $getMetadataType = 'Google_Service_Dataflow_SourceGetMetadataResponse';
    protected $getMetadataDataType = '';
    protected $splitType = 'Google_Service_Dataflow_SourceSplitResponse';
    protected $splitDataType = '';


    /**
     * @param Google_Service_Dataflow_SourceGetMetadataResponse $getMetadata
     */
    public function setGetMetadata(Google_Service_Dataflow_SourceGetMetadataResponse $getMetadata)
    {
        $this->getMetadata = $getMetadata;
    }

    /**
     * @return mixed
     */
    public function getGetMetadata()
    {
        return $this->getMetadata;
    }

    /**
     * @param Google_Service_Dataflow_SourceSplitResponse $split
     */
    public function setSplit(Google_Service_Dataflow_SourceSplitResponse $split)
    {
        $this->split = $split;
    }

    /**
     * @return mixed
     */
    public function getSplit()
    {
        return $this->split;
    }
}

/**
 * Class Google_Service_Dataflow_SourceSpec
 */
class Google_Service_Dataflow_SourceSpec extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_SourceSplitOptions
 */
class Google_Service_Dataflow_SourceSplitOptions extends Google_Model
{
    public $desiredBundleSizeBytes;
    public $desiredShardSizeBytes;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDesiredBundleSizeBytes()
    {
        return $this->desiredBundleSizeBytes;
    }

    /**
     * @param $desiredBundleSizeBytes
     */
    public function setDesiredBundleSizeBytes($desiredBundleSizeBytes)
    {
        $this->desiredBundleSizeBytes = $desiredBundleSizeBytes;
    }

    /**
     * @return mixed
     */
    public function getDesiredShardSizeBytes()
    {
        return $this->desiredShardSizeBytes;
    }

    /**
     * @param $desiredShardSizeBytes
     */
    public function setDesiredShardSizeBytes($desiredShardSizeBytes)
    {
        $this->desiredShardSizeBytes = $desiredShardSizeBytes;
    }
}

/**
 * Class Google_Service_Dataflow_SourceSplitRequest
 */
class Google_Service_Dataflow_SourceSplitRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $optionsType = 'Google_Service_Dataflow_SourceSplitOptions';
    protected $optionsDataType = '';
    protected $sourceType = 'Google_Service_Dataflow_Source';
    protected $sourceDataType = '';


    /**
     * @param Google_Service_Dataflow_SourceSplitOptions $options
     */
    public function setOptions(Google_Service_Dataflow_SourceSplitOptions $options)
    {
        $this->options = $options;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Google_Service_Dataflow_Source $source
     */
    public function setSource(Google_Service_Dataflow_Source $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
}

/**
 * Class Google_Service_Dataflow_SourceSplitResponse
 */
class Google_Service_Dataflow_SourceSplitResponse extends Google_Collection
{
    public $outcome;
    protected $collection_key = 'shards';
    protected $internal_gapi_mappings = [];
    protected $bundlesType = 'Google_Service_Dataflow_DerivedSource';
    protected $bundlesDataType = 'array';
    protected $shardsType = 'Google_Service_Dataflow_SourceSplitShard';
    protected $shardsDataType = 'array';


    /**
     * @param $bundles
     */
    public function setBundles($bundles)
    {
        $this->bundles = $bundles;
    }

    /**
     * @return mixed
     */
    public function getBundles()
    {
        return $this->bundles;
    }

    /**
     * @return mixed
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * @param $outcome
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;
    }

    /**
     * @param $shards
     */
    public function setShards($shards)
    {
        $this->shards = $shards;
    }

    /**
     * @return mixed
     */
    public function getShards()
    {
        return $this->shards;
    }
}

/**
 * Class Google_Service_Dataflow_SourceSplitShard
 */
class Google_Service_Dataflow_SourceSplitShard extends Google_Model
{
    public $derivationMode;
    protected $internal_gapi_mappings = [];
    protected $sourceType = 'Google_Service_Dataflow_Source';
    protected $sourceDataType = '';

    /**
     * @return mixed
     */
    public function getDerivationMode()
    {
        return $this->derivationMode;
    }

    /**
     * @param $derivationMode
     */
    public function setDerivationMode($derivationMode)
    {
        $this->derivationMode = $derivationMode;
    }

    /**
     * @param Google_Service_Dataflow_Source $source
     */
    public function setSource(Google_Service_Dataflow_Source $source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
}

/**
 * Class Google_Service_Dataflow_Status
 */
class Google_Service_Dataflow_Status extends Google_Collection
{
    public $code;
    public $details;
    public $message;
    protected $collection_key = 'details';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}

/**
 * Class Google_Service_Dataflow_StatusDetails
 */
class Google_Service_Dataflow_StatusDetails extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_Step
 */
class Google_Service_Dataflow_Step extends Google_Model
{
    public $kind;
    public $name;
    public $properties;
    protected $internal_gapi_mappings = [];

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }
}

/**
 * Class Google_Service_Dataflow_StepProperties
 */
class Google_Service_Dataflow_StepProperties extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_StreamLocation
 */
class Google_Service_Dataflow_StreamLocation extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $pubsubLocationType = 'Google_Service_Dataflow_PubsubLocation';
    protected $pubsubLocationDataType = '';
    protected $sideInputLocationType = 'Google_Service_Dataflow_StreamingSideInputLocation';
    protected $sideInputLocationDataType = '';
    protected $streamingStageLocationType = 'Google_Service_Dataflow_StreamingStageLocation';
    protected $streamingStageLocationDataType = '';


    /**
     * @param Google_Service_Dataflow_PubsubLocation $pubsubLocation
     */
    public function setPubsubLocation(Google_Service_Dataflow_PubsubLocation $pubsubLocation)
    {
        $this->pubsubLocation = $pubsubLocation;
    }

    /**
     * @return mixed
     */
    public function getPubsubLocation()
    {
        return $this->pubsubLocation;
    }

    /**
     * @param Google_Service_Dataflow_StreamingSideInputLocation $sideInputLocation
     */
    public function setSideInputLocation(Google_Service_Dataflow_StreamingSideInputLocation $sideInputLocation)
    {
        $this->sideInputLocation = $sideInputLocation;
    }

    /**
     * @return mixed
     */
    public function getSideInputLocation()
    {
        return $this->sideInputLocation;
    }

    /**
     * @param Google_Service_Dataflow_StreamingStageLocation $streamingStageLocation
     */
    public function setStreamingStageLocation(Google_Service_Dataflow_StreamingStageLocation $streamingStageLocation)
    {
        $this->streamingStageLocation = $streamingStageLocation;
    }

    /**
     * @return mixed
     */
    public function getStreamingStageLocation()
    {
        return $this->streamingStageLocation;
    }
}

/**
 * Class Google_Service_Dataflow_StreamingComputationRanges
 */
class Google_Service_Dataflow_StreamingComputationRanges extends Google_Collection
{
    public $computationId;
    protected $collection_key = 'rangeAssignments';
    protected $internal_gapi_mappings = [];
    protected $rangeAssignmentsType = 'Google_Service_Dataflow_KeyRangeDataDiskAssignment';
    protected $rangeAssignmentsDataType = 'array';

    /**
     * @return mixed
     */
    public function getComputationId()
    {
        return $this->computationId;
    }

    /**
     * @param $computationId
     */
    public function setComputationId($computationId)
    {
        $this->computationId = $computationId;
    }

    /**
     * @param $rangeAssignments
     */
    public function setRangeAssignments($rangeAssignments)
    {
        $this->rangeAssignments = $rangeAssignments;
    }

    /**
     * @return mixed
     */
    public function getRangeAssignments()
    {
        return $this->rangeAssignments;
    }
}

/**
 * Class Google_Service_Dataflow_StreamingComputationTask
 */
class Google_Service_Dataflow_StreamingComputationTask extends Google_Collection
{
    public $taskType;
    protected $collection_key = 'dataDisks';
    protected $internal_gapi_mappings = [];
    protected $computationRangesType = 'Google_Service_Dataflow_StreamingComputationRanges';
    protected $computationRangesDataType = 'array';
    protected $dataDisksType = 'Google_Service_Dataflow_MountedDataDisk';
    protected $dataDisksDataType = 'array';

    /**
     * @param $computationRanges
     */
    public function setComputationRanges($computationRanges)
    {
        $this->computationRanges = $computationRanges;
    }

    /**
     * @return mixed
     */
    public function getComputationRanges()
    {
        return $this->computationRanges;
    }

    /**
     * @param $dataDisks
     */
    public function setDataDisks($dataDisks)
    {
        $this->dataDisks = $dataDisks;
    }

    /**
     * @return mixed
     */
    public function getDataDisks()
    {
        return $this->dataDisks;
    }

    /**
     * @return mixed
     */
    public function getTaskType()
    {
        return $this->taskType;
    }

    /**
     * @param $taskType
     */
    public function setTaskType($taskType)
    {
        $this->taskType = $taskType;
    }
}

/**
 * Class Google_Service_Dataflow_StreamingSetupTask
 */
class Google_Service_Dataflow_StreamingSetupTask extends Google_Model
{
    public $receiveWorkPort;
    public $workerHarnessPort;
    protected $internal_gapi_mappings = [];
    protected $streamingComputationTopologyType = 'Google_Service_Dataflow_TopologyConfig';
    protected $streamingComputationTopologyDataType = '';

    /**
     * @return mixed
     */
    public function getReceiveWorkPort()
    {
        return $this->receiveWorkPort;
    }

    /**
     * @param $receiveWorkPort
     */
    public function setReceiveWorkPort($receiveWorkPort)
    {
        $this->receiveWorkPort = $receiveWorkPort;
    }

    /**
     * @param Google_Service_Dataflow_TopologyConfig $streamingComputationTopology
     */
    public function setStreamingComputationTopology(Google_Service_Dataflow_TopologyConfig $streamingComputationTopology)
    {
        $this->streamingComputationTopology = $streamingComputationTopology;
    }

    /**
     * @return mixed
     */
    public function getStreamingComputationTopology()
    {
        return $this->streamingComputationTopology;
    }

    /**
     * @return mixed
     */
    public function getWorkerHarnessPort()
    {
        return $this->workerHarnessPort;
    }

    /**
     * @param $workerHarnessPort
     */
    public function setWorkerHarnessPort($workerHarnessPort)
    {
        $this->workerHarnessPort = $workerHarnessPort;
    }
}

/**
 * Class Google_Service_Dataflow_StreamingSideInputLocation
 */
class Google_Service_Dataflow_StreamingSideInputLocation extends Google_Model
{
    public $tag;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Dataflow_StreamingStageLocation
 */
class Google_Service_Dataflow_StreamingStageLocation extends Google_Model
{
    public $streamId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getStreamId()
    {
        return $this->streamId;
    }

    /**
     * @param $streamId
     */
    public function setStreamId($streamId)
    {
        $this->streamId = $streamId;
    }
}

/**
 * Class Google_Service_Dataflow_TaskRunnerSettings
 */
class Google_Service_Dataflow_TaskRunnerSettings extends Google_Collection
{
    public $alsologtostderr;
    public $baseTaskDir;
    public $baseUrl;
    public $commandlinesFileName;
    public $continueOnException;
    public $dataflowApiVersion;
    public $harnessCommand;
    public $languageHint;
    public $logDir;
    public $logToSerialconsole;
    public $logUploadLocation;
    public $oauthScopes;
    public $streamingWorkerMainClass;
    public $taskGroup;
    public $taskUser;
    public $tempStoragePrefix;
    public $vmId;
    public $workflowFileName;
    protected $collection_key = 'oauthScopes';
    protected $internal_gapi_mappings = [];
    protected $parallelWorkerSettingsType = 'Google_Service_Dataflow_WorkerSettings';
    protected $parallelWorkerSettingsDataType = '';

    /**
     * @return mixed
     */
    public function getAlsologtostderr()
    {
        return $this->alsologtostderr;
    }

    /**
     * @param $alsologtostderr
     */
    public function setAlsologtostderr($alsologtostderr)
    {
        $this->alsologtostderr = $alsologtostderr;
    }

    /**
     * @return mixed
     */
    public function getBaseTaskDir()
    {
        return $this->baseTaskDir;
    }

    /**
     * @param $baseTaskDir
     */
    public function setBaseTaskDir($baseTaskDir)
    {
        $this->baseTaskDir = $baseTaskDir;
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return mixed
     */
    public function getCommandlinesFileName()
    {
        return $this->commandlinesFileName;
    }

    /**
     * @param $commandlinesFileName
     */
    public function setCommandlinesFileName($commandlinesFileName)
    {
        $this->commandlinesFileName = $commandlinesFileName;
    }

    /**
     * @return mixed
     */
    public function getContinueOnException()
    {
        return $this->continueOnException;
    }

    /**
     * @param $continueOnException
     */
    public function setContinueOnException($continueOnException)
    {
        $this->continueOnException = $continueOnException;
    }

    /**
     * @return mixed
     */
    public function getDataflowApiVersion()
    {
        return $this->dataflowApiVersion;
    }

    /**
     * @param $dataflowApiVersion
     */
    public function setDataflowApiVersion($dataflowApiVersion)
    {
        $this->dataflowApiVersion = $dataflowApiVersion;
    }

    /**
     * @return mixed
     */
    public function getHarnessCommand()
    {
        return $this->harnessCommand;
    }

    /**
     * @param $harnessCommand
     */
    public function setHarnessCommand($harnessCommand)
    {
        $this->harnessCommand = $harnessCommand;
    }

    /**
     * @return mixed
     */
    public function getLanguageHint()
    {
        return $this->languageHint;
    }

    /**
     * @param $languageHint
     */
    public function setLanguageHint($languageHint)
    {
        $this->languageHint = $languageHint;
    }

    /**
     * @return mixed
     */
    public function getLogDir()
    {
        return $this->logDir;
    }

    /**
     * @param $logDir
     */
    public function setLogDir($logDir)
    {
        $this->logDir = $logDir;
    }

    /**
     * @return mixed
     */
    public function getLogToSerialconsole()
    {
        return $this->logToSerialconsole;
    }

    /**
     * @param $logToSerialconsole
     */
    public function setLogToSerialconsole($logToSerialconsole)
    {
        $this->logToSerialconsole = $logToSerialconsole;
    }

    /**
     * @return mixed
     */
    public function getLogUploadLocation()
    {
        return $this->logUploadLocation;
    }

    /**
     * @param $logUploadLocation
     */
    public function setLogUploadLocation($logUploadLocation)
    {
        $this->logUploadLocation = $logUploadLocation;
    }

    /**
     * @return mixed
     */
    public function getOauthScopes()
    {
        return $this->oauthScopes;
    }

    /**
     * @param $oauthScopes
     */
    public function setOauthScopes($oauthScopes)
    {
        $this->oauthScopes = $oauthScopes;
    }

    /**
     * @param Google_Service_Dataflow_WorkerSettings $parallelWorkerSettings
     */
    public function setParallelWorkerSettings(Google_Service_Dataflow_WorkerSettings $parallelWorkerSettings)
    {
        $this->parallelWorkerSettings = $parallelWorkerSettings;
    }

    /**
     * @return mixed
     */
    public function getParallelWorkerSettings()
    {
        return $this->parallelWorkerSettings;
    }

    /**
     * @return mixed
     */
    public function getStreamingWorkerMainClass()
    {
        return $this->streamingWorkerMainClass;
    }

    /**
     * @param $streamingWorkerMainClass
     */
    public function setStreamingWorkerMainClass($streamingWorkerMainClass)
    {
        $this->streamingWorkerMainClass = $streamingWorkerMainClass;
    }

    /**
     * @return mixed
     */
    public function getTaskGroup()
    {
        return $this->taskGroup;
    }

    /**
     * @param $taskGroup
     */
    public function setTaskGroup($taskGroup)
    {
        $this->taskGroup = $taskGroup;
    }

    /**
     * @return mixed
     */
    public function getTaskUser()
    {
        return $this->taskUser;
    }

    /**
     * @param $taskUser
     */
    public function setTaskUser($taskUser)
    {
        $this->taskUser = $taskUser;
    }

    /**
     * @return mixed
     */
    public function getTempStoragePrefix()
    {
        return $this->tempStoragePrefix;
    }

    /**
     * @param $tempStoragePrefix
     */
    public function setTempStoragePrefix($tempStoragePrefix)
    {
        $this->tempStoragePrefix = $tempStoragePrefix;
    }

    /**
     * @return mixed
     */
    public function getVmId()
    {
        return $this->vmId;
    }

    /**
     * @param $vmId
     */
    public function setVmId($vmId)
    {
        $this->vmId = $vmId;
    }

    /**
     * @return mixed
     */
    public function getWorkflowFileName()
    {
        return $this->workflowFileName;
    }

    /**
     * @param $workflowFileName
     */
    public function setWorkflowFileName($workflowFileName)
    {
        $this->workflowFileName = $workflowFileName;
    }
}

/**
 * Class Google_Service_Dataflow_TopologyConfig
 */
class Google_Service_Dataflow_TopologyConfig extends Google_Collection
{
    protected $collection_key = 'dataDiskAssignments';
    protected $internal_gapi_mappings = [];
    protected $computationsType = 'Google_Service_Dataflow_ComputationTopology';
    protected $computationsDataType = 'array';
    protected $dataDiskAssignmentsType = 'Google_Service_Dataflow_DataDiskAssignment';
    protected $dataDiskAssignmentsDataType = 'array';


    /**
     * @param $computations
     */
    public function setComputations($computations)
    {
        $this->computations = $computations;
    }

    /**
     * @return mixed
     */
    public function getComputations()
    {
        return $this->computations;
    }

    /**
     * @param $dataDiskAssignments
     */
    public function setDataDiskAssignments($dataDiskAssignments)
    {
        $this->dataDiskAssignments = $dataDiskAssignments;
    }

    /**
     * @return mixed
     */
    public function getDataDiskAssignments()
    {
        return $this->dataDiskAssignments;
    }
}

/**
 * Class Google_Service_Dataflow_WorkItem
 */
class Google_Service_Dataflow_WorkItem extends Google_Collection
{
    public $configuration;
    public $id;
    public $initialReportIndex;
    public $jobId;
    public $leaseExpireTime;
    public $projectId;
    public $reportStatusInterval;
    protected $collection_key = 'packages';
    protected $internal_gapi_mappings = [];
    protected $mapTaskType = 'Google_Service_Dataflow_MapTask';
    protected $mapTaskDataType = '';
    protected $packagesType = 'Google_Service_Dataflow_Package';
    protected $packagesDataType = 'array';
    protected $seqMapTaskType = 'Google_Service_Dataflow_SeqMapTask';
    protected $seqMapTaskDataType = '';
    protected $shellTaskType = 'Google_Service_Dataflow_ShellTask';
    protected $shellTaskDataType = '';
    protected $sourceOperationTaskType = 'Google_Service_Dataflow_SourceOperationRequest';
    protected $sourceOperationTaskDataType = '';
    protected $streamingComputationTaskType = 'Google_Service_Dataflow_StreamingComputationTask';
    protected $streamingComputationTaskDataType = '';
    protected $streamingSetupTaskType = 'Google_Service_Dataflow_StreamingSetupTask';
    protected $streamingSetupTaskDataType = '';

    /**
     * @return mixed
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param $configuration
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;
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
    public function getInitialReportIndex()
    {
        return $this->initialReportIndex;
    }

    /**
     * @param $initialReportIndex
     */
    public function setInitialReportIndex($initialReportIndex)
    {
        $this->initialReportIndex = $initialReportIndex;
    }

    /**
     * @return mixed
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }

    /**
     * @return mixed
     */
    public function getLeaseExpireTime()
    {
        return $this->leaseExpireTime;
    }

    /**
     * @param $leaseExpireTime
     */
    public function setLeaseExpireTime($leaseExpireTime)
    {
        $this->leaseExpireTime = $leaseExpireTime;
    }

    /**
     * @param Google_Service_Dataflow_MapTask $mapTask
     */
    public function setMapTask(Google_Service_Dataflow_MapTask $mapTask)
    {
        $this->mapTask = $mapTask;
    }

    /**
     * @return mixed
     */
    public function getMapTask()
    {
        return $this->mapTask;
    }

    /**
     * @param $packages
     */
    public function setPackages($packages)
    {
        $this->packages = $packages;
    }

    /**
     * @return mixed
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return mixed
     */
    public function getReportStatusInterval()
    {
        return $this->reportStatusInterval;
    }

    /**
     * @param $reportStatusInterval
     */
    public function setReportStatusInterval($reportStatusInterval)
    {
        $this->reportStatusInterval = $reportStatusInterval;
    }

    /**
     * @param Google_Service_Dataflow_SeqMapTask $seqMapTask
     */
    public function setSeqMapTask(Google_Service_Dataflow_SeqMapTask $seqMapTask)
    {
        $this->seqMapTask = $seqMapTask;
    }

    /**
     * @return mixed
     */
    public function getSeqMapTask()
    {
        return $this->seqMapTask;
    }

    /**
     * @param Google_Service_Dataflow_ShellTask $shellTask
     */
    public function setShellTask(Google_Service_Dataflow_ShellTask $shellTask)
    {
        $this->shellTask = $shellTask;
    }

    /**
     * @return mixed
     */
    public function getShellTask()
    {
        return $this->shellTask;
    }

    /**
     * @param Google_Service_Dataflow_SourceOperationRequest $sourceOperationTask
     */
    public function setSourceOperationTask(Google_Service_Dataflow_SourceOperationRequest $sourceOperationTask)
    {
        $this->sourceOperationTask = $sourceOperationTask;
    }

    /**
     * @return mixed
     */
    public function getSourceOperationTask()
    {
        return $this->sourceOperationTask;
    }

    /**
     * @param Google_Service_Dataflow_StreamingComputationTask $streamingComputationTask
     */
    public function setStreamingComputationTask(Google_Service_Dataflow_StreamingComputationTask $streamingComputationTask)
    {
        $this->streamingComputationTask = $streamingComputationTask;
    }

    /**
     * @return mixed
     */
    public function getStreamingComputationTask()
    {
        return $this->streamingComputationTask;
    }

    /**
     * @param Google_Service_Dataflow_StreamingSetupTask $streamingSetupTask
     */
    public function setStreamingSetupTask(Google_Service_Dataflow_StreamingSetupTask $streamingSetupTask)
    {
        $this->streamingSetupTask = $streamingSetupTask;
    }

    /**
     * @return mixed
     */
    public function getStreamingSetupTask()
    {
        return $this->streamingSetupTask;
    }
}

/**
 * Class Google_Service_Dataflow_WorkItemServiceState
 */
class Google_Service_Dataflow_WorkItemServiceState extends Google_Model
{
    public $harnessData;
    public $leaseExpireTime;
    public $nextReportIndex;
    public $reportStatusInterval;
    protected $internal_gapi_mappings = [];
    protected $suggestedStopPointType = 'Google_Service_Dataflow_ApproximateProgress';
    protected $suggestedStopPointDataType = '';
    protected $suggestedStopPositionType = 'Google_Service_Dataflow_Position';
    protected $suggestedStopPositionDataType = '';

    /**
     * @return mixed
     */
    public function getHarnessData()
    {
        return $this->harnessData;
    }

    /**
     * @param $harnessData
     */
    public function setHarnessData($harnessData)
    {
        $this->harnessData = $harnessData;
    }

    /**
     * @return mixed
     */
    public function getLeaseExpireTime()
    {
        return $this->leaseExpireTime;
    }

    /**
     * @param $leaseExpireTime
     */
    public function setLeaseExpireTime($leaseExpireTime)
    {
        $this->leaseExpireTime = $leaseExpireTime;
    }

    /**
     * @return mixed
     */
    public function getNextReportIndex()
    {
        return $this->nextReportIndex;
    }

    /**
     * @param $nextReportIndex
     */
    public function setNextReportIndex($nextReportIndex)
    {
        $this->nextReportIndex = $nextReportIndex;
    }

    /**
     * @return mixed
     */
    public function getReportStatusInterval()
    {
        return $this->reportStatusInterval;
    }

    /**
     * @param $reportStatusInterval
     */
    public function setReportStatusInterval($reportStatusInterval)
    {
        $this->reportStatusInterval = $reportStatusInterval;
    }

    /**
     * @param Google_Service_Dataflow_ApproximateProgress $suggestedStopPoint
     */
    public function setSuggestedStopPoint(Google_Service_Dataflow_ApproximateProgress $suggestedStopPoint)
    {
        $this->suggestedStopPoint = $suggestedStopPoint;
    }

    /**
     * @return mixed
     */
    public function getSuggestedStopPoint()
    {
        return $this->suggestedStopPoint;
    }

    /**
     * @param Google_Service_Dataflow_Position $suggestedStopPosition
     */
    public function setSuggestedStopPosition(Google_Service_Dataflow_Position $suggestedStopPosition)
    {
        $this->suggestedStopPosition = $suggestedStopPosition;
    }

    /**
     * @return mixed
     */
    public function getSuggestedStopPosition()
    {
        return $this->suggestedStopPosition;
    }
}

/**
 * Class Google_Service_Dataflow_WorkItemServiceStateHarnessData
 */
class Google_Service_Dataflow_WorkItemServiceStateHarnessData extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_WorkItemStatus
 */
class Google_Service_Dataflow_WorkItemStatus extends Google_Collection
{
    public $completed;
    public $reportIndex;
    public $requestedLeaseDuration;
    public $workItemId;
    protected $collection_key = 'metricUpdates';
    protected $internal_gapi_mappings = [];
    protected $dynamicSourceSplitType = 'Google_Service_Dataflow_DynamicSourceSplit';
    protected $dynamicSourceSplitDataType = '';
    protected $errorsType = 'Google_Service_Dataflow_Status';
    protected $errorsDataType = 'array';
    protected $metricUpdatesType = 'Google_Service_Dataflow_MetricUpdate';
    protected $metricUpdatesDataType = 'array';
    protected $progressType = 'Google_Service_Dataflow_ApproximateProgress';
    protected $progressDataType = '';
    protected $sourceForkType = 'Google_Service_Dataflow_SourceFork';
    protected $sourceForkDataType = '';
    protected $sourceOperationResponseType = 'Google_Service_Dataflow_SourceOperationResponse';
    protected $sourceOperationResponseDataType = '';
    protected $stopPositionType = 'Google_Service_Dataflow_Position';
    protected $stopPositionDataType = '';

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
     * @param Google_Service_Dataflow_DynamicSourceSplit $dynamicSourceSplit
     */
    public function setDynamicSourceSplit(Google_Service_Dataflow_DynamicSourceSplit $dynamicSourceSplit)
    {
        $this->dynamicSourceSplit = $dynamicSourceSplit;
    }

    /**
     * @return mixed
     */
    public function getDynamicSourceSplit()
    {
        return $this->dynamicSourceSplit;
    }

    /**
     * @param $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param $metricUpdates
     */
    public function setMetricUpdates($metricUpdates)
    {
        $this->metricUpdates = $metricUpdates;
    }

    /**
     * @return mixed
     */
    public function getMetricUpdates()
    {
        return $this->metricUpdates;
    }

    /**
     * @param Google_Service_Dataflow_ApproximateProgress $progress
     */
    public function setProgress(Google_Service_Dataflow_ApproximateProgress $progress)
    {
        $this->progress = $progress;
    }

    /**
     * @return mixed
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * @return mixed
     */
    public function getReportIndex()
    {
        return $this->reportIndex;
    }

    /**
     * @param $reportIndex
     */
    public function setReportIndex($reportIndex)
    {
        $this->reportIndex = $reportIndex;
    }

    /**
     * @return mixed
     */
    public function getRequestedLeaseDuration()
    {
        return $this->requestedLeaseDuration;
    }

    /**
     * @param $requestedLeaseDuration
     */
    public function setRequestedLeaseDuration($requestedLeaseDuration)
    {
        $this->requestedLeaseDuration = $requestedLeaseDuration;
    }

    /**
     * @param Google_Service_Dataflow_SourceFork $sourceFork
     */
    public function setSourceFork(Google_Service_Dataflow_SourceFork $sourceFork)
    {
        $this->sourceFork = $sourceFork;
    }

    /**
     * @return mixed
     */
    public function getSourceFork()
    {
        return $this->sourceFork;
    }

    /**
     * @param Google_Service_Dataflow_SourceOperationResponse $sourceOperationResponse
     */
    public function setSourceOperationResponse(Google_Service_Dataflow_SourceOperationResponse $sourceOperationResponse)
    {
        $this->sourceOperationResponse = $sourceOperationResponse;
    }

    /**
     * @return mixed
     */
    public function getSourceOperationResponse()
    {
        return $this->sourceOperationResponse;
    }

    /**
     * @param Google_Service_Dataflow_Position $stopPosition
     */
    public function setStopPosition(Google_Service_Dataflow_Position $stopPosition)
    {
        $this->stopPosition = $stopPosition;
    }

    /**
     * @return mixed
     */
    public function getStopPosition()
    {
        return $this->stopPosition;
    }

    /**
     * @return mixed
     */
    public function getWorkItemId()
    {
        return $this->workItemId;
    }

    /**
     * @param $workItemId
     */
    public function setWorkItemId($workItemId)
    {
        $this->workItemId = $workItemId;
    }
}

/**
 * Class Google_Service_Dataflow_WorkerPool
 */
class Google_Service_Dataflow_WorkerPool extends Google_Collection
{
    public $defaultPackageSet;
    public $diskSizeGb;
    public $diskSourceImage;
    public $kind;
    public $machineType;
    public $metadata;
    public $numWorkers;
    public $onHostMaintenance;
    public $poolArgs;
    public $teardownPolicy;
    public $zone;
    protected $collection_key = 'packages';
    protected $internal_gapi_mappings = [];
    protected $autoscalingSettingsType = 'Google_Service_Dataflow_AutoscalingSettings';
    protected $autoscalingSettingsDataType = '';
    protected $dataDisksType = 'Google_Service_Dataflow_Disk';
    protected $dataDisksDataType = 'array';
    protected $packagesType = 'Google_Service_Dataflow_Package';
    protected $packagesDataType = 'array';
    protected $taskrunnerSettingsType = 'Google_Service_Dataflow_TaskRunnerSettings';
    protected $taskrunnerSettingsDataType = '';

    /**
     * @param Google_Service_Dataflow_AutoscalingSettings $autoscalingSettings
     */
    public function setAutoscalingSettings(Google_Service_Dataflow_AutoscalingSettings $autoscalingSettings)
    {
        $this->autoscalingSettings = $autoscalingSettings;
    }

    /**
     * @return mixed
     */
    public function getAutoscalingSettings()
    {
        return $this->autoscalingSettings;
    }

    /**
     * @param $dataDisks
     */
    public function setDataDisks($dataDisks)
    {
        $this->dataDisks = $dataDisks;
    }

    /**
     * @return mixed
     */
    public function getDataDisks()
    {
        return $this->dataDisks;
    }

    /**
     * @return mixed
     */
    public function getDefaultPackageSet()
    {
        return $this->defaultPackageSet;
    }

    /**
     * @param $defaultPackageSet
     */
    public function setDefaultPackageSet($defaultPackageSet)
    {
        $this->defaultPackageSet = $defaultPackageSet;
    }

    /**
     * @return mixed
     */
    public function getDiskSizeGb()
    {
        return $this->diskSizeGb;
    }

    /**
     * @param $diskSizeGb
     */
    public function setDiskSizeGb($diskSizeGb)
    {
        $this->diskSizeGb = $diskSizeGb;
    }

    /**
     * @return mixed
     */
    public function getDiskSourceImage()
    {
        return $this->diskSourceImage;
    }

    /**
     * @param $diskSourceImage
     */
    public function setDiskSourceImage($diskSourceImage)
    {
        $this->diskSourceImage = $diskSourceImage;
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
    public function getMachineType()
    {
        return $this->machineType;
    }

    /**
     * @param $machineType
     */
    public function setMachineType($machineType)
    {
        $this->machineType = $machineType;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getNumWorkers()
    {
        return $this->numWorkers;
    }

    /**
     * @param $numWorkers
     */
    public function setNumWorkers($numWorkers)
    {
        $this->numWorkers = $numWorkers;
    }

    /**
     * @return mixed
     */
    public function getOnHostMaintenance()
    {
        return $this->onHostMaintenance;
    }

    /**
     * @param $onHostMaintenance
     */
    public function setOnHostMaintenance($onHostMaintenance)
    {
        $this->onHostMaintenance = $onHostMaintenance;
    }

    /**
     * @param $packages
     */
    public function setPackages($packages)
    {
        $this->packages = $packages;
    }

    /**
     * @return mixed
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * @return mixed
     */
    public function getPoolArgs()
    {
        return $this->poolArgs;
    }

    /**
     * @param $poolArgs
     */
    public function setPoolArgs($poolArgs)
    {
        $this->poolArgs = $poolArgs;
    }

    /**
     * @param Google_Service_Dataflow_TaskRunnerSettings $taskrunnerSettings
     */
    public function setTaskrunnerSettings(Google_Service_Dataflow_TaskRunnerSettings $taskrunnerSettings)
    {
        $this->taskrunnerSettings = $taskrunnerSettings;
    }

    /**
     * @return mixed
     */
    public function getTaskrunnerSettings()
    {
        return $this->taskrunnerSettings;
    }

    /**
     * @return mixed
     */
    public function getTeardownPolicy()
    {
        return $this->teardownPolicy;
    }

    /**
     * @param $teardownPolicy
     */
    public function setTeardownPolicy($teardownPolicy)
    {
        $this->teardownPolicy = $teardownPolicy;
    }

    /**
     * @return mixed
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param $zone
     */
    public function setZone($zone)
    {
        $this->zone = $zone;
    }
}

/**
 * Class Google_Service_Dataflow_WorkerPoolMetadata
 */
class Google_Service_Dataflow_WorkerPoolMetadata extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_WorkerPoolPoolArgs
 */
class Google_Service_Dataflow_WorkerPoolPoolArgs extends Google_Model
{
}

/**
 * Class Google_Service_Dataflow_WorkerSettings
 */
class Google_Service_Dataflow_WorkerSettings extends Google_Model
{
    public $baseUrl;
    public $reportingEnabled;
    public $servicePath;
    public $shuffleServicePath;
    public $tempStoragePrefix;
    public $workerId;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return mixed
     */
    public function getReportingEnabled()
    {
        return $this->reportingEnabled;
    }

    /**
     * @param $reportingEnabled
     */
    public function setReportingEnabled($reportingEnabled)
    {
        $this->reportingEnabled = $reportingEnabled;
    }

    /**
     * @return mixed
     */
    public function getServicePath()
    {
        return $this->servicePath;
    }

    /**
     * @param $servicePath
     */
    public function setServicePath($servicePath)
    {
        $this->servicePath = $servicePath;
    }

    /**
     * @return mixed
     */
    public function getShuffleServicePath()
    {
        return $this->shuffleServicePath;
    }

    /**
     * @param $shuffleServicePath
     */
    public function setShuffleServicePath($shuffleServicePath)
    {
        $this->shuffleServicePath = $shuffleServicePath;
    }

    /**
     * @return mixed
     */
    public function getTempStoragePrefix()
    {
        return $this->tempStoragePrefix;
    }

    /**
     * @param $tempStoragePrefix
     */
    public function setTempStoragePrefix($tempStoragePrefix)
    {
        $this->tempStoragePrefix = $tempStoragePrefix;
    }

    /**
     * @return mixed
     */
    public function getWorkerId()
    {
        return $this->workerId;
    }

    /**
     * @param $workerId
     */
    public function setWorkerId($workerId)
    {
        $this->workerId = $workerId;
    }
}

/**
 * Class Google_Service_Dataflow_WriteInstruction
 */
class Google_Service_Dataflow_WriteInstruction extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $inputType = 'Google_Service_Dataflow_InstructionInput';
    protected $inputDataType = '';
    protected $sinkType = 'Google_Service_Dataflow_Sink';
    protected $sinkDataType = '';


    /**
     * @param Google_Service_Dataflow_InstructionInput $input
     */
    public function setInput(Google_Service_Dataflow_InstructionInput $input)
    {
        $this->input = $input;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param Google_Service_Dataflow_Sink $sink
     */
    public function setSink(Google_Service_Dataflow_Sink $sink)
    {
        $this->sink = $sink;
    }

    /**
     * @return mixed
     */
    public function getSink()
    {
        return $this->sink;
    }
}
