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
 * Service definition for Datastore (v1beta2).
 *
 * <p>
 * API for accessing Google Cloud Datastore.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/datastore/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Datastore extends Google_Service
{
    /** View and manage your data across Google Cloud Platform services. */
    const CLOUD_PLATFORM =
        "https://www.googleapis.com/auth/cloud-platform";
    /** View and manage your Google Cloud Datastore data. */
    const DATASTORE =
        "https://www.googleapis.com/auth/datastore";
    /** View your email address. */
    const USERINFO_EMAIL =
        "https://www.googleapis.com/auth/userinfo.email";

    public $datasets;


    /**
     * Constructs the internal representation of the Datastore service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'datastore/v1beta2/datasets/';
        $this->version = 'v1beta2';
        $this->serviceName = 'datastore';

        $this->datasets = new Google_Service_Datastore_Datasets_Resource(
            $this,
            $this->serviceName,
            'datasets',
            [
                'methods' => [
                    'allocateIds' => [
                        'path' => '{datasetId}/allocateIds',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'beginTransaction' => [
                        'path' => '{datasetId}/beginTransaction',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'commit' => [
                        'path' => '{datasetId}/commit',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'lookup' => [
                        'path' => '{datasetId}/lookup',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'rollback' => [
                        'path' => '{datasetId}/rollback',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'datasetId' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'runQuery' => [
                        'path' => '{datasetId}/runQuery',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'datasetId' => [
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
 * The "datasets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datastoreService = new Google_Service_Datastore(...);
 *   $datasets = $datastoreService->datasets;
 *  </code>
 */
class Google_Service_Datastore_Datasets_Resource extends Google_Service_Resource
{

    /**
     * Allocate IDs for incomplete keys (useful for referencing an entity before it
     * is inserted). (datasets.allocateIds)
     *
     * @param string $datasetId Identifies the dataset.
     * @param Google_AllocateIdsRequest|Google_Service_Datastore_AllocateIdsRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function allocateIds($datasetId, Google_Service_Datastore_AllocateIdsRequest $postBody, $optParams = [])
    {
        $params = ['datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('allocateIds', [$params], "Google_Service_Datastore_AllocateIdsResponse");
    }

    /**
     * Begin a new transaction. (datasets.beginTransaction)
     *
     * @param string $datasetId Identifies the dataset.
     * @param Google_BeginTransactionRequest|Google_Service_Datastore_BeginTransactionRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function beginTransaction($datasetId, Google_Service_Datastore_BeginTransactionRequest $postBody, $optParams = [])
    {
        $params = ['datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('beginTransaction', [$params], "Google_Service_Datastore_BeginTransactionResponse");
    }

    /**
     * Commit a transaction, optionally creating, deleting or modifying some
     * entities. (datasets.commit)
     *
     * @param string $datasetId Identifies the dataset.
     * @param Google_CommitRequest|Google_Service_Datastore_CommitRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function commit($datasetId, Google_Service_Datastore_CommitRequest $postBody, $optParams = [])
    {
        $params = ['datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('commit', [$params], "Google_Service_Datastore_CommitResponse");
    }

    /**
     * Look up some entities by key. (datasets.lookup)
     *
     * @param string $datasetId Identifies the dataset.
     * @param Google_LookupRequest|Google_Service_Datastore_LookupRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function lookup($datasetId, Google_Service_Datastore_LookupRequest $postBody, $optParams = [])
    {
        $params = ['datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('lookup', [$params], "Google_Service_Datastore_LookupResponse");
    }

    /**
     * Roll back a transaction. (datasets.rollback)
     *
     * @param string $datasetId Identifies the dataset.
     * @param Google_RollbackRequest|Google_Service_Datastore_RollbackRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function rollback($datasetId, Google_Service_Datastore_RollbackRequest $postBody, $optParams = [])
    {
        $params = ['datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('rollback', [$params], "Google_Service_Datastore_RollbackResponse");
    }

    /**
     * Query for entities. (datasets.runQuery)
     *
     * @param string $datasetId Identifies the dataset.
     * @param Google_RunQueryRequest|Google_Service_Datastore_RunQueryRequest $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function runQuery($datasetId, Google_Service_Datastore_RunQueryRequest $postBody, $optParams = [])
    {
        $params = ['datasetId' => $datasetId, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('runQuery', [$params], "Google_Service_Datastore_RunQueryResponse");
    }
}


/**
 * Class Google_Service_Datastore_AllocateIdsRequest
 */
class Google_Service_Datastore_AllocateIdsRequest extends Google_Collection
{
    protected $collection_key = 'keys';
    protected $internal_gapi_mappings = [];
    protected $keysType = 'Google_Service_Datastore_Key';
    protected $keysDataType = 'array';


    /**
     * @param $keys
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
    }

    /**
     * @return mixed
     */
    public function getKeys()
    {
        return $this->keys;
    }
}

/**
 * Class Google_Service_Datastore_AllocateIdsResponse
 */
class Google_Service_Datastore_AllocateIdsResponse extends Google_Collection
{
    protected $collection_key = 'keys';
    protected $internal_gapi_mappings = [];
    protected $headerType = 'Google_Service_Datastore_ResponseHeader';
    protected $headerDataType = '';
    protected $keysType = 'Google_Service_Datastore_Key';
    protected $keysDataType = 'array';


    /**
     * @param Google_Service_Datastore_ResponseHeader $header
     */
    public function setHeader(Google_Service_Datastore_ResponseHeader $header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param $keys
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
    }

    /**
     * @return mixed
     */
    public function getKeys()
    {
        return $this->keys;
    }
}

/**
 * Class Google_Service_Datastore_BeginTransactionRequest
 */
class Google_Service_Datastore_BeginTransactionRequest extends Google_Model
{
    public $isolationLevel;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getIsolationLevel()
    {
        return $this->isolationLevel;
    }

    /**
     * @param $isolationLevel
     */
    public function setIsolationLevel($isolationLevel)
    {
        $this->isolationLevel = $isolationLevel;
    }
}

/**
 * Class Google_Service_Datastore_BeginTransactionResponse
 */
class Google_Service_Datastore_BeginTransactionResponse extends Google_Model
{
    public $transaction;
    protected $internal_gapi_mappings = [];
    protected $headerType = 'Google_Service_Datastore_ResponseHeader';
    protected $headerDataType = '';

    /**
     * @param Google_Service_Datastore_ResponseHeader $header
     */
    public function setHeader(Google_Service_Datastore_ResponseHeader $header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }
}

/**
 * Class Google_Service_Datastore_CommitRequest
 */
class Google_Service_Datastore_CommitRequest extends Google_Model
{
    public $ignoreReadOnly;
    public $mode;
    public $transaction;
    protected $internal_gapi_mappings = [];
    protected $mutationType = 'Google_Service_Datastore_Mutation';
    protected $mutationDataType = '';

    /**
     * @return mixed
     */
    public function getIgnoreReadOnly()
    {
        return $this->ignoreReadOnly;
    }

    /**
     * @param $ignoreReadOnly
     */
    public function setIgnoreReadOnly($ignoreReadOnly)
    {
        $this->ignoreReadOnly = $ignoreReadOnly;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @param Google_Service_Datastore_Mutation $mutation
     */
    public function setMutation(Google_Service_Datastore_Mutation $mutation)
    {
        $this->mutation = $mutation;
    }

    /**
     * @return mixed
     */
    public function getMutation()
    {
        return $this->mutation;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }
}

/**
 * Class Google_Service_Datastore_CommitResponse
 */
class Google_Service_Datastore_CommitResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $headerType = 'Google_Service_Datastore_ResponseHeader';
    protected $headerDataType = '';
    protected $mutationResultType = 'Google_Service_Datastore_MutationResult';
    protected $mutationResultDataType = '';


    /**
     * @param Google_Service_Datastore_ResponseHeader $header
     */
    public function setHeader(Google_Service_Datastore_ResponseHeader $header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param Google_Service_Datastore_MutationResult $mutationResult
     */
    public function setMutationResult(Google_Service_Datastore_MutationResult $mutationResult)
    {
        $this->mutationResult = $mutationResult;
    }

    /**
     * @return mixed
     */
    public function getMutationResult()
    {
        return $this->mutationResult;
    }
}

/**
 * Class Google_Service_Datastore_CompositeFilter
 */
class Google_Service_Datastore_CompositeFilter extends Google_Collection
{
    public $operator;
    protected $collection_key = 'filters';
    protected $internal_gapi_mappings = [];
    protected $filtersType = 'Google_Service_Datastore_Filter';
    protected $filtersDataType = 'array';

    /**
     * @param $filters
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }
}

/**
 * Class Google_Service_Datastore_Entity
 */
class Google_Service_Datastore_Entity extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $keyType = 'Google_Service_Datastore_Key';
    protected $keyDataType = '';
    protected $propertiesType = 'Google_Service_Datastore_Property';
    protected $propertiesDataType = 'map';


    /**
     * @param Google_Service_Datastore_Key $key
     */
    public function setKey(Google_Service_Datastore_Key $key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $properties
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        return $this->properties;
    }
}

/**
 * Class Google_Service_Datastore_EntityProperties
 */
class Google_Service_Datastore_EntityProperties extends Google_Model
{
}

/**
 * Class Google_Service_Datastore_EntityResult
 */
class Google_Service_Datastore_EntityResult extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $entityType = 'Google_Service_Datastore_Entity';
    protected $entityDataType = '';


    /**
     * @param Google_Service_Datastore_Entity $entity
     */
    public function setEntity(Google_Service_Datastore_Entity $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }
}

/**
 * Class Google_Service_Datastore_Filter
 */
class Google_Service_Datastore_Filter extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $compositeFilterType = 'Google_Service_Datastore_CompositeFilter';
    protected $compositeFilterDataType = '';
    protected $propertyFilterType = 'Google_Service_Datastore_PropertyFilter';
    protected $propertyFilterDataType = '';


    /**
     * @param Google_Service_Datastore_CompositeFilter $compositeFilter
     */
    public function setCompositeFilter(Google_Service_Datastore_CompositeFilter $compositeFilter)
    {
        $this->compositeFilter = $compositeFilter;
    }

    /**
     * @return mixed
     */
    public function getCompositeFilter()
    {
        return $this->compositeFilter;
    }

    /**
     * @param Google_Service_Datastore_PropertyFilter $propertyFilter
     */
    public function setPropertyFilter(Google_Service_Datastore_PropertyFilter $propertyFilter)
    {
        $this->propertyFilter = $propertyFilter;
    }

    /**
     * @return mixed
     */
    public function getPropertyFilter()
    {
        return $this->propertyFilter;
    }
}

/**
 * Class Google_Service_Datastore_GqlQuery
 */
class Google_Service_Datastore_GqlQuery extends Google_Collection
{
    public $allowLiteral;
    public $queryString;
    protected $collection_key = 'numberArgs';
    protected $internal_gapi_mappings = [];
    protected $nameArgsType = 'Google_Service_Datastore_GqlQueryArg';
    protected $nameArgsDataType = 'array';
    protected $numberArgsType = 'Google_Service_Datastore_GqlQueryArg';
    protected $numberArgsDataType = 'array';

    /**
     * @return mixed
     */
    public function getAllowLiteral()
    {
        return $this->allowLiteral;
    }

    /**
     * @param $allowLiteral
     */
    public function setAllowLiteral($allowLiteral)
    {
        $this->allowLiteral = $allowLiteral;
    }

    /**
     * @param $nameArgs
     */
    public function setNameArgs($nameArgs)
    {
        $this->nameArgs = $nameArgs;
    }

    /**
     * @return mixed
     */
    public function getNameArgs()
    {
        return $this->nameArgs;
    }

    /**
     * @param $numberArgs
     */
    public function setNumberArgs($numberArgs)
    {
        $this->numberArgs = $numberArgs;
    }

    /**
     * @return mixed
     */
    public function getNumberArgs()
    {
        return $this->numberArgs;
    }

    /**
     * @return mixed
     */
    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * @param $queryString
     */
    public function setQueryString($queryString)
    {
        $this->queryString = $queryString;
    }
}

/**
 * Class Google_Service_Datastore_GqlQueryArg
 */
class Google_Service_Datastore_GqlQueryArg extends Google_Model
{
    public $cursor;
    public $name;
    protected $internal_gapi_mappings = [];
    protected $valueType = 'Google_Service_Datastore_Value';
    protected $valueDataType = '';

    /**
     * @return mixed
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * @param $cursor
     */
    public function setCursor($cursor)
    {
        $this->cursor = $cursor;
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
     * @param Google_Service_Datastore_Value $value
     */
    public function setValue(Google_Service_Datastore_Value $value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}

/**
 * Class Google_Service_Datastore_Key
 */
class Google_Service_Datastore_Key extends Google_Collection
{
    protected $collection_key = 'path';
    protected $internal_gapi_mappings = [];
    protected $partitionIdType = 'Google_Service_Datastore_PartitionId';
    protected $partitionIdDataType = '';
    protected $pathType = 'Google_Service_Datastore_KeyPathElement';
    protected $pathDataType = 'array';


    /**
     * @param Google_Service_Datastore_PartitionId $partitionId
     */
    public function setPartitionId(Google_Service_Datastore_PartitionId $partitionId)
    {
        $this->partitionId = $partitionId;
    }

    /**
     * @return mixed
     */
    public function getPartitionId()
    {
        return $this->partitionId;
    }

    /**
     * @param $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
}

/**
 * Class Google_Service_Datastore_KeyPathElement
 */
class Google_Service_Datastore_KeyPathElement extends Google_Model
{
    public $id;
    public $kind;
    public $name;
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
}

/**
 * Class Google_Service_Datastore_KindExpression
 */
class Google_Service_Datastore_KindExpression extends Google_Model
{
    public $name;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Datastore_LookupRequest
 */
class Google_Service_Datastore_LookupRequest extends Google_Collection
{
    protected $collection_key = 'keys';
    protected $internal_gapi_mappings = [];
    protected $keysType = 'Google_Service_Datastore_Key';
    protected $keysDataType = 'array';
    protected $readOptionsType = 'Google_Service_Datastore_ReadOptions';
    protected $readOptionsDataType = '';


    /**
     * @param $keys
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
    }

    /**
     * @return mixed
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * @param Google_Service_Datastore_ReadOptions $readOptions
     */
    public function setReadOptions(Google_Service_Datastore_ReadOptions $readOptions)
    {
        $this->readOptions = $readOptions;
    }

    /**
     * @return mixed
     */
    public function getReadOptions()
    {
        return $this->readOptions;
    }
}

/**
 * Class Google_Service_Datastore_LookupResponse
 */
class Google_Service_Datastore_LookupResponse extends Google_Collection
{
    protected $collection_key = 'missing';
    protected $internal_gapi_mappings = [];
    protected $deferredType = 'Google_Service_Datastore_Key';
    protected $deferredDataType = 'array';
    protected $foundType = 'Google_Service_Datastore_EntityResult';
    protected $foundDataType = 'array';
    protected $headerType = 'Google_Service_Datastore_ResponseHeader';
    protected $headerDataType = '';
    protected $missingType = 'Google_Service_Datastore_EntityResult';
    protected $missingDataType = 'array';


    /**
     * @param $deferred
     */
    public function setDeferred($deferred)
    {
        $this->deferred = $deferred;
    }

    /**
     * @return mixed
     */
    public function getDeferred()
    {
        return $this->deferred;
    }

    /**
     * @param $found
     */
    public function setFound($found)
    {
        $this->found = $found;
    }

    /**
     * @return mixed
     */
    public function getFound()
    {
        return $this->found;
    }

    /**
     * @param Google_Service_Datastore_ResponseHeader $header
     */
    public function setHeader(Google_Service_Datastore_ResponseHeader $header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param $missing
     */
    public function setMissing($missing)
    {
        $this->missing = $missing;
    }

    /**
     * @return mixed
     */
    public function getMissing()
    {
        return $this->missing;
    }
}

/**
 * Class Google_Service_Datastore_Mutation
 */
class Google_Service_Datastore_Mutation extends Google_Collection
{
    public $force;
    protected $collection_key = 'upsert';
    protected $internal_gapi_mappings = [];
    protected $deleteType = 'Google_Service_Datastore_Key';
    protected $deleteDataType = 'array';
    protected $insertType = 'Google_Service_Datastore_Entity';
    protected $insertDataType = 'array';
    protected $insertAutoIdType = 'Google_Service_Datastore_Entity';
    protected $insertAutoIdDataType = 'array';
    protected $updateType = 'Google_Service_Datastore_Entity';
    protected $updateDataType = 'array';
    protected $upsertType = 'Google_Service_Datastore_Entity';
    protected $upsertDataType = 'array';


    /**
     * @param $delete
     */
    public function setDelete($delete)
    {
        $this->delete = $delete;
    }

    /**
     * @return mixed
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @return mixed
     */
    public function getForce()
    {
        return $this->force;
    }

    /**
     * @param $force
     */
    public function setForce($force)
    {
        $this->force = $force;
    }

    /**
     * @param $insert
     */
    public function setInsert($insert)
    {
        $this->insert = $insert;
    }

    /**
     * @return mixed
     */
    public function getInsert()
    {
        return $this->insert;
    }

    /**
     * @param $insertAutoId
     */
    public function setInsertAutoId($insertAutoId)
    {
        $this->insertAutoId = $insertAutoId;
    }

    /**
     * @return mixed
     */
    public function getInsertAutoId()
    {
        return $this->insertAutoId;
    }

    /**
     * @param $update
     */
    public function setUpdate($update)
    {
        $this->update = $update;
    }

    /**
     * @return mixed
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * @param $upsert
     */
    public function setUpsert($upsert)
    {
        $this->upsert = $upsert;
    }

    /**
     * @return mixed
     */
    public function getUpsert()
    {
        return $this->upsert;
    }
}

/**
 * Class Google_Service_Datastore_MutationResult
 */
class Google_Service_Datastore_MutationResult extends Google_Collection
{
    public $indexUpdates;
    protected $collection_key = 'insertAutoIdKeys';
    protected $internal_gapi_mappings = [];
    protected $insertAutoIdKeysType = 'Google_Service_Datastore_Key';
    protected $insertAutoIdKeysDataType = 'array';

    /**
     * @return mixed
     */
    public function getIndexUpdates()
    {
        return $this->indexUpdates;
    }

    /**
     * @param $indexUpdates
     */
    public function setIndexUpdates($indexUpdates)
    {
        $this->indexUpdates = $indexUpdates;
    }

    /**
     * @param $insertAutoIdKeys
     */
    public function setInsertAutoIdKeys($insertAutoIdKeys)
    {
        $this->insertAutoIdKeys = $insertAutoIdKeys;
    }

    /**
     * @return mixed
     */
    public function getInsertAutoIdKeys()
    {
        return $this->insertAutoIdKeys;
    }
}

/**
 * Class Google_Service_Datastore_PartitionId
 */
class Google_Service_Datastore_PartitionId extends Google_Model
{
    public $datasetId;
    public $namespace;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getDatasetId()
    {
        return $this->datasetId;
    }

    /**
     * @param $datasetId
     */
    public function setDatasetId($datasetId)
    {
        $this->datasetId = $datasetId;
    }

    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }
}

/**
 * Class Google_Service_Datastore_Property
 */
class Google_Service_Datastore_Property extends Google_Collection
{
    public $blobKeyValue;
    public $blobValue;
    public $booleanValue;
    public $dateTimeValue;
    public $doubleValue;
    public $indexed;
    public $integerValue;
    public $meaning;
    public $stringValue;
    protected $collection_key = 'listValue';
    protected $internal_gapi_mappings = [];
    protected $entityValueType = 'Google_Service_Datastore_Entity';
    protected $entityValueDataType = '';
    protected $keyValueType = 'Google_Service_Datastore_Key';
    protected $keyValueDataType = '';
    protected $listValueType = 'Google_Service_Datastore_Value';
    protected $listValueDataType = 'array';

    /**
     * @return mixed
     */
    public function getBlobKeyValue()
    {
        return $this->blobKeyValue;
    }

    /**
     * @param $blobKeyValue
     */
    public function setBlobKeyValue($blobKeyValue)
    {
        $this->blobKeyValue = $blobKeyValue;
    }

    /**
     * @return mixed
     */
    public function getBlobValue()
    {
        return $this->blobValue;
    }

    /**
     * @param $blobValue
     */
    public function setBlobValue($blobValue)
    {
        $this->blobValue = $blobValue;
    }

    /**
     * @return mixed
     */
    public function getBooleanValue()
    {
        return $this->booleanValue;
    }

    /**
     * @param $booleanValue
     */
    public function setBooleanValue($booleanValue)
    {
        $this->booleanValue = $booleanValue;
    }

    /**
     * @return mixed
     */
    public function getDateTimeValue()
    {
        return $this->dateTimeValue;
    }

    /**
     * @param $dateTimeValue
     */
    public function setDateTimeValue($dateTimeValue)
    {
        $this->dateTimeValue = $dateTimeValue;
    }

    /**
     * @return mixed
     */
    public function getDoubleValue()
    {
        return $this->doubleValue;
    }

    /**
     * @param $doubleValue
     */
    public function setDoubleValue($doubleValue)
    {
        $this->doubleValue = $doubleValue;
    }

    /**
     * @param Google_Service_Datastore_Entity $entityValue
     */
    public function setEntityValue(Google_Service_Datastore_Entity $entityValue)
    {
        $this->entityValue = $entityValue;
    }

    /**
     * @return mixed
     */
    public function getEntityValue()
    {
        return $this->entityValue;
    }

    /**
     * @return mixed
     */
    public function getIndexed()
    {
        return $this->indexed;
    }

    /**
     * @param $indexed
     */
    public function setIndexed($indexed)
    {
        $this->indexed = $indexed;
    }

    /**
     * @return mixed
     */
    public function getIntegerValue()
    {
        return $this->integerValue;
    }

    /**
     * @param $integerValue
     */
    public function setIntegerValue($integerValue)
    {
        $this->integerValue = $integerValue;
    }

    /**
     * @param Google_Service_Datastore_Key $keyValue
     */
    public function setKeyValue(Google_Service_Datastore_Key $keyValue)
    {
        $this->keyValue = $keyValue;
    }

    /**
     * @return mixed
     */
    public function getKeyValue()
    {
        return $this->keyValue;
    }

    /**
     * @param $listValue
     */
    public function setListValue($listValue)
    {
        $this->listValue = $listValue;
    }

    /**
     * @return mixed
     */
    public function getListValue()
    {
        return $this->listValue;
    }

    /**
     * @return mixed
     */
    public function getMeaning()
    {
        return $this->meaning;
    }

    /**
     * @param $meaning
     */
    public function setMeaning($meaning)
    {
        $this->meaning = $meaning;
    }

    /**
     * @return mixed
     */
    public function getStringValue()
    {
        return $this->stringValue;
    }

    /**
     * @param $stringValue
     */
    public function setStringValue($stringValue)
    {
        $this->stringValue = $stringValue;
    }
}

/**
 * Class Google_Service_Datastore_PropertyExpression
 */
class Google_Service_Datastore_PropertyExpression extends Google_Model
{
    public $aggregationFunction;
    protected $internal_gapi_mappings = [];
    protected $propertyType = 'Google_Service_Datastore_PropertyReference';
    protected $propertyDataType = '';

    /**
     * @return mixed
     */
    public function getAggregationFunction()
    {
        return $this->aggregationFunction;
    }

    /**
     * @param $aggregationFunction
     */
    public function setAggregationFunction($aggregationFunction)
    {
        $this->aggregationFunction = $aggregationFunction;
    }

    /**
     * @param Google_Service_Datastore_PropertyReference $property
     */
    public function setProperty(Google_Service_Datastore_PropertyReference $property)
    {
        $this->property = $property;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }
}

/**
 * Class Google_Service_Datastore_PropertyFilter
 */
class Google_Service_Datastore_PropertyFilter extends Google_Model
{
    public $operator;
    protected $internal_gapi_mappings = [];
    protected $propertyType = 'Google_Service_Datastore_PropertyReference';
    protected $propertyDataType = '';
    protected $valueType = 'Google_Service_Datastore_Value';
    protected $valueDataType = '';

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

    /**
     * @param Google_Service_Datastore_PropertyReference $property
     */
    public function setProperty(Google_Service_Datastore_PropertyReference $property)
    {
        $this->property = $property;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param Google_Service_Datastore_Value $value
     */
    public function setValue(Google_Service_Datastore_Value $value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}

/**
 * Class Google_Service_Datastore_PropertyOrder
 */
class Google_Service_Datastore_PropertyOrder extends Google_Model
{
    public $direction;
    protected $internal_gapi_mappings = [];
    protected $propertyType = 'Google_Service_Datastore_PropertyReference';
    protected $propertyDataType = '';

    /**
     * @return mixed
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param $direction
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    /**
     * @param Google_Service_Datastore_PropertyReference $property
     */
    public function setProperty(Google_Service_Datastore_PropertyReference $property)
    {
        $this->property = $property;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }
}

/**
 * Class Google_Service_Datastore_PropertyReference
 */
class Google_Service_Datastore_PropertyReference extends Google_Model
{
    public $name;
    protected $internal_gapi_mappings = [];

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
 * Class Google_Service_Datastore_Query
 */
class Google_Service_Datastore_Query extends Google_Collection
{
    public $endCursor;
    public $limit;
    public $offset;
    public $startCursor;
    protected $collection_key = 'projection';
    protected $internal_gapi_mappings = [];
    protected $filterType = 'Google_Service_Datastore_Filter';
    protected $filterDataType = '';
    protected $groupByType = 'Google_Service_Datastore_PropertyReference';
    protected $groupByDataType = 'array';
    protected $kindsType = 'Google_Service_Datastore_KindExpression';
    protected $kindsDataType = 'array';
    protected $orderType = 'Google_Service_Datastore_PropertyOrder';
    protected $orderDataType = 'array';
    protected $projectionType = 'Google_Service_Datastore_PropertyExpression';
    protected $projectionDataType = 'array';

    /**
     * @return mixed
     */
    public function getEndCursor()
    {
        return $this->endCursor;
    }

    /**
     * @param $endCursor
     */
    public function setEndCursor($endCursor)
    {
        $this->endCursor = $endCursor;
    }

    /**
     * @param Google_Service_Datastore_Filter $filter
     */
    public function setFilter(Google_Service_Datastore_Filter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return mixed
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param $groupBy
     */
    public function setGroupBy($groupBy)
    {
        $this->groupBy = $groupBy;
    }

    /**
     * @return mixed
     */
    public function getGroupBy()
    {
        return $this->groupBy;
    }

    /**
     * @param $kinds
     */
    public function setKinds($kinds)
    {
        $this->kinds = $kinds;
    }

    /**
     * @return mixed
     */
    public function getKinds()
    {
        return $this->kinds;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }

    /**
     * @param $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param $projection
     */
    public function setProjection($projection)
    {
        $this->projection = $projection;
    }

    /**
     * @return mixed
     */
    public function getProjection()
    {
        return $this->projection;
    }

    /**
     * @return mixed
     */
    public function getStartCursor()
    {
        return $this->startCursor;
    }

    /**
     * @param $startCursor
     */
    public function setStartCursor($startCursor)
    {
        $this->startCursor = $startCursor;
    }
}

/**
 * Class Google_Service_Datastore_QueryResultBatch
 */
class Google_Service_Datastore_QueryResultBatch extends Google_Collection
{
    public $endCursor;
    public $entityResultType;
    public $moreResults;
    public $skippedResults;
    protected $collection_key = 'entityResults';
    protected $internal_gapi_mappings = [];
    protected $entityResultsType = 'Google_Service_Datastore_EntityResult';
    protected $entityResultsDataType = 'array';

    /**
     * @return mixed
     */
    public function getEndCursor()
    {
        return $this->endCursor;
    }

    /**
     * @param $endCursor
     */
    public function setEndCursor($endCursor)
    {
        $this->endCursor = $endCursor;
    }

    /**
     * @return mixed
     */
    public function getEntityResultType()
    {
        return $this->entityResultType;
    }

    /**
     * @param $entityResultType
     */
    public function setEntityResultType($entityResultType)
    {
        $this->entityResultType = $entityResultType;
    }

    /**
     * @param $entityResults
     */
    public function setEntityResults($entityResults)
    {
        $this->entityResults = $entityResults;
    }

    /**
     * @return mixed
     */
    public function getEntityResults()
    {
        return $this->entityResults;
    }

    /**
     * @return mixed
     */
    public function getMoreResults()
    {
        return $this->moreResults;
    }

    /**
     * @param $moreResults
     */
    public function setMoreResults($moreResults)
    {
        $this->moreResults = $moreResults;
    }

    /**
     * @return mixed
     */
    public function getSkippedResults()
    {
        return $this->skippedResults;
    }

    /**
     * @param $skippedResults
     */
    public function setSkippedResults($skippedResults)
    {
        $this->skippedResults = $skippedResults;
    }
}

/**
 * Class Google_Service_Datastore_ReadOptions
 */
class Google_Service_Datastore_ReadOptions extends Google_Model
{
    public $readConsistency;
    public $transaction;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getReadConsistency()
    {
        return $this->readConsistency;
    }

    /**
     * @param $readConsistency
     */
    public function setReadConsistency($readConsistency)
    {
        $this->readConsistency = $readConsistency;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }
}

/**
 * Class Google_Service_Datastore_ResponseHeader
 */
class Google_Service_Datastore_ResponseHeader extends Google_Model
{
    public $kind;
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
}

/**
 * Class Google_Service_Datastore_RollbackRequest
 */
class Google_Service_Datastore_RollbackRequest extends Google_Model
{
    public $transaction;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param $transaction
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }
}

/**
 * Class Google_Service_Datastore_RollbackResponse
 */
class Google_Service_Datastore_RollbackResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $headerType = 'Google_Service_Datastore_ResponseHeader';
    protected $headerDataType = '';


    /**
     * @param Google_Service_Datastore_ResponseHeader $header
     */
    public function setHeader(Google_Service_Datastore_ResponseHeader $header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }
}

/**
 * Class Google_Service_Datastore_RunQueryRequest
 */
class Google_Service_Datastore_RunQueryRequest extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $gqlQueryType = 'Google_Service_Datastore_GqlQuery';
    protected $gqlQueryDataType = '';
    protected $partitionIdType = 'Google_Service_Datastore_PartitionId';
    protected $partitionIdDataType = '';
    protected $queryType = 'Google_Service_Datastore_Query';
    protected $queryDataType = '';
    protected $readOptionsType = 'Google_Service_Datastore_ReadOptions';
    protected $readOptionsDataType = '';


    /**
     * @param Google_Service_Datastore_GqlQuery $gqlQuery
     */
    public function setGqlQuery(Google_Service_Datastore_GqlQuery $gqlQuery)
    {
        $this->gqlQuery = $gqlQuery;
    }

    /**
     * @return mixed
     */
    public function getGqlQuery()
    {
        return $this->gqlQuery;
    }

    /**
     * @param Google_Service_Datastore_PartitionId $partitionId
     */
    public function setPartitionId(Google_Service_Datastore_PartitionId $partitionId)
    {
        $this->partitionId = $partitionId;
    }

    /**
     * @return mixed
     */
    public function getPartitionId()
    {
        return $this->partitionId;
    }

    /**
     * @param Google_Service_Datastore_Query $query
     */
    public function setQuery(Google_Service_Datastore_Query $query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param Google_Service_Datastore_ReadOptions $readOptions
     */
    public function setReadOptions(Google_Service_Datastore_ReadOptions $readOptions)
    {
        $this->readOptions = $readOptions;
    }

    /**
     * @return mixed
     */
    public function getReadOptions()
    {
        return $this->readOptions;
    }
}

/**
 * Class Google_Service_Datastore_RunQueryResponse
 */
class Google_Service_Datastore_RunQueryResponse extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $batchType = 'Google_Service_Datastore_QueryResultBatch';
    protected $batchDataType = '';
    protected $headerType = 'Google_Service_Datastore_ResponseHeader';
    protected $headerDataType = '';


    /**
     * @param Google_Service_Datastore_QueryResultBatch $batch
     */
    public function setBatch(Google_Service_Datastore_QueryResultBatch $batch)
    {
        $this->batch = $batch;
    }

    /**
     * @return mixed
     */
    public function getBatch()
    {
        return $this->batch;
    }

    /**
     * @param Google_Service_Datastore_ResponseHeader $header
     */
    public function setHeader(Google_Service_Datastore_ResponseHeader $header)
    {
        $this->header = $header;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }
}

/**
 * Class Google_Service_Datastore_Value
 */
class Google_Service_Datastore_Value extends Google_Collection
{
    public $blobKeyValue;
    public $blobValue;
    public $booleanValue;
    public $dateTimeValue;
    public $doubleValue;
    public $indexed;
    public $integerValue;
    public $meaning;
    public $stringValue;
    protected $collection_key = 'listValue';
    protected $internal_gapi_mappings = [];
    protected $entityValueType = 'Google_Service_Datastore_Entity';
    protected $entityValueDataType = '';
    protected $keyValueType = 'Google_Service_Datastore_Key';
    protected $keyValueDataType = '';
    protected $listValueType = 'Google_Service_Datastore_Value';
    protected $listValueDataType = 'array';

    /**
     * @return mixed
     */
    public function getBlobKeyValue()
    {
        return $this->blobKeyValue;
    }

    /**
     * @param $blobKeyValue
     */
    public function setBlobKeyValue($blobKeyValue)
    {
        $this->blobKeyValue = $blobKeyValue;
    }

    /**
     * @return mixed
     */
    public function getBlobValue()
    {
        return $this->blobValue;
    }

    /**
     * @param $blobValue
     */
    public function setBlobValue($blobValue)
    {
        $this->blobValue = $blobValue;
    }

    /**
     * @return mixed
     */
    public function getBooleanValue()
    {
        return $this->booleanValue;
    }

    /**
     * @param $booleanValue
     */
    public function setBooleanValue($booleanValue)
    {
        $this->booleanValue = $booleanValue;
    }

    /**
     * @return mixed
     */
    public function getDateTimeValue()
    {
        return $this->dateTimeValue;
    }

    /**
     * @param $dateTimeValue
     */
    public function setDateTimeValue($dateTimeValue)
    {
        $this->dateTimeValue = $dateTimeValue;
    }

    /**
     * @return mixed
     */
    public function getDoubleValue()
    {
        return $this->doubleValue;
    }

    /**
     * @param $doubleValue
     */
    public function setDoubleValue($doubleValue)
    {
        $this->doubleValue = $doubleValue;
    }

    /**
     * @param Google_Service_Datastore_Entity $entityValue
     */
    public function setEntityValue(Google_Service_Datastore_Entity $entityValue)
    {
        $this->entityValue = $entityValue;
    }

    /**
     * @return mixed
     */
    public function getEntityValue()
    {
        return $this->entityValue;
    }

    /**
     * @return mixed
     */
    public function getIndexed()
    {
        return $this->indexed;
    }

    /**
     * @param $indexed
     */
    public function setIndexed($indexed)
    {
        $this->indexed = $indexed;
    }

    /**
     * @return mixed
     */
    public function getIntegerValue()
    {
        return $this->integerValue;
    }

    /**
     * @param $integerValue
     */
    public function setIntegerValue($integerValue)
    {
        $this->integerValue = $integerValue;
    }

    /**
     * @param Google_Service_Datastore_Key $keyValue
     */
    public function setKeyValue(Google_Service_Datastore_Key $keyValue)
    {
        $this->keyValue = $keyValue;
    }

    /**
     * @return mixed
     */
    public function getKeyValue()
    {
        return $this->keyValue;
    }

    /**
     * @param $listValue
     */
    public function setListValue($listValue)
    {
        $this->listValue = $listValue;
    }

    /**
     * @return mixed
     */
    public function getListValue()
    {
        return $this->listValue;
    }

    /**
     * @return mixed
     */
    public function getMeaning()
    {
        return $this->meaning;
    }

    /**
     * @param $meaning
     */
    public function setMeaning($meaning)
    {
        $this->meaning = $meaning;
    }

    /**
     * @return mixed
     */
    public function getStringValue()
    {
        return $this->stringValue;
    }

    /**
     * @param $stringValue
     */
    public function setStringValue($stringValue)
    {
        $this->stringValue = $stringValue;
    }
}
