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
 * Service definition for Prediction (v1.6).
 *
 * <p>
 * Lets you access a cloud hosted machine learning service that makes it easy to
 * build smart apps</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/prediction/docs/developer-guide" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Prediction extends Google_Service
{
    /** Manage your data and permissions in Google Cloud Storage. */
    const DEVSTORAGE_FULL_CONTROL =
        "https://www.googleapis.com/auth/devstorage.full_control";
    /** View your data in Google Cloud Storage. */
    const DEVSTORAGE_READ_ONLY =
        "https://www.googleapis.com/auth/devstorage.read_only";
    /** Manage your data in Google Cloud Storage. */
    const DEVSTORAGE_READ_WRITE =
        "https://www.googleapis.com/auth/devstorage.read_write";
    /** Manage your data in the Google Prediction API. */
    const PREDICTION =
        "https://www.googleapis.com/auth/prediction";

    public $hostedmodels;
    public $trainedmodels;


    /**
     * Constructs the internal representation of the Prediction service.
     *
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        parent::__construct($client);
        $this->servicePath = 'prediction/v1.6/projects/';
        $this->version = 'v1.6';
        $this->serviceName = 'prediction';

        $this->hostedmodels = new Google_Service_Prediction_Hostedmodels_Resource(
            $this,
            $this->serviceName,
            'hostedmodels',
            [
                'methods' => [
                    'predict' => [
                        'path' => '{project}/hostedmodels/{hostedModelName}/predict',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'hostedModelName' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ],
                ]
            ]
        );
        $this->trainedmodels = new Google_Service_Prediction_Trainedmodels_Resource(
            $this,
            $this->serviceName,
            'trainedmodels',
            [
                'methods' => [
                    'analyze' => [
                        'path' => '{project}/trainedmodels/{id}/analyze',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'delete' => [
                        'path' => '{project}/trainedmodels/{id}',
                        'httpMethod' => 'DELETE',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'get' => [
                        'path' => '{project}/trainedmodels/{id}',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'insert' => [
                        'path' => '{project}/trainedmodels',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'list' => [
                        'path' => '{project}/trainedmodels/list',
                        'httpMethod' => 'GET',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'pageToken' => [
                                'location' => 'query',
                                'type' => 'string',
                            ],
                            'maxResults' => [
                                'location' => 'query',
                                'type' => 'integer',
                            ],
                        ],
                    ], 'predict' => [
                        'path' => '{project}/trainedmodels/{id}/predict',
                        'httpMethod' => 'POST',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                        ],
                    ], 'update' => [
                        'path' => '{project}/trainedmodels/{id}',
                        'httpMethod' => 'PUT',
                        'parameters' => [
                            'project' => [
                                'location' => 'path',
                                'type' => 'string',
                                'required' => true,
                            ],
                            'id' => [
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
 * The "hostedmodels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $predictionService = new Google_Service_Prediction(...);
 *   $hostedmodels = $predictionService->hostedmodels;
 *  </code>
 */
class Google_Service_Prediction_Hostedmodels_Resource extends Google_Service_Resource
{

    /**
     * Submit input and request an output against a hosted model.
     * (hostedmodels.predict)
     *
     * @param string $project The project associated with the model.
     * @param string $hostedModelName The name of a hosted model.
     * @param Google_Input|Google_Service_Prediction_Input $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function predict($project, $hostedModelName, Google_Service_Prediction_Input $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'hostedModelName' => $hostedModelName, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('predict', [$params], "Google_Service_Prediction_Output");
    }
}

/**
 * The "trainedmodels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $predictionService = new Google_Service_Prediction(...);
 *   $trainedmodels = $predictionService->trainedmodels;
 *  </code>
 */
class Google_Service_Prediction_Trainedmodels_Resource extends Google_Service_Resource
{

    /**
     * Get analysis of the model and the data the model was trained on.
     * (trainedmodels.analyze)
     *
     * @param string $project The project associated with the model.
     * @param string $id The unique name for the predictive model.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function analyze($project, $id, $optParams = [])
    {
        $params = ['project' => $project, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('analyze', [$params], "Google_Service_Prediction_Analyze");
    }

    /**
     * Delete a trained model. (trainedmodels.delete)
     *
     * @param string $project The project associated with the model.
     * @param string $id The unique name for the predictive model.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function delete($project, $id, $optParams = [])
    {
        $params = ['project' => $project, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('delete', [$params]);
    }

    /**
     * Check training status of your model. (trainedmodels.get)
     *
     * @param string $project The project associated with the model.
     * @param string $id The unique name for the predictive model.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function get($project, $id, $optParams = [])
    {
        $params = ['project' => $project, 'id' => $id];
        $params = array_merge($params, $optParams);

        return $this->call('get', [$params], "Google_Service_Prediction_Insert2");
    }

    /**
     * Train a Prediction API model. (trainedmodels.insert)
     *
     * @param string $project The project associated with the model.
     * @param Google_Insert|Google_Service_Prediction_Insert $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function insert($project, Google_Service_Prediction_Insert $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('insert', [$params], "Google_Service_Prediction_Insert2");
    }

    /**
     * List available models. (trainedmodels.listTrainedmodels)
     *
     * @param string $project The project associated with the model.
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     * @opt_param string pageToken Pagination token.
     * @opt_param string maxResults Maximum number of results to return.
     */
    public function listTrainedmodels($project, $optParams = [])
    {
        $params = ['project' => $project];
        $params = array_merge($params, $optParams);

        return $this->call('list', [$params], "Google_Service_Prediction_PredictionList");
    }

    /**
     * Submit model id and request a prediction. (trainedmodels.predict)
     *
     * @param string $project The project associated with the model.
     * @param string $id The unique name for the predictive model.
     * @param Google_Input|Google_Service_Prediction_Input $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function predict($project, $id, Google_Service_Prediction_Input $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('predict', [$params], "Google_Service_Prediction_Output");
    }

    /**
     * Add new data to a trained model. (trainedmodels.update)
     *
     * @param string $project The project associated with the model.
     * @param string $id The unique name for the predictive model.
     * @param Google_Service_Prediction_Update|Google_Update $postBody
     * @param array $optParams Optional parameters.
     *
     * @return expected_class|Google_Http_Request
     */
    public function update($project, $id, Google_Service_Prediction_Update $postBody, $optParams = [])
    {
        $params = ['project' => $project, 'id' => $id, 'postBody' => $postBody];
        $params = array_merge($params, $optParams);

        return $this->call('update', [$params], "Google_Service_Prediction_Insert2");
    }
}


/**
 * Class Google_Service_Prediction_Analyze
 */
class Google_Service_Prediction_Analyze extends Google_Collection
{
    public $errors;
    public $id;
    public $kind;
    public $selfLink;
    protected $collection_key = 'errors';
    protected $internal_gapi_mappings = [];
    protected $dataDescriptionType = 'Google_Service_Prediction_AnalyzeDataDescription';
    protected $dataDescriptionDataType = '';
    protected $modelDescriptionType = 'Google_Service_Prediction_AnalyzeModelDescription';
    protected $modelDescriptionDataType = '';

    /**
     * @param Google_Service_Prediction_AnalyzeDataDescription $dataDescription
     */
    public function setDataDescription(Google_Service_Prediction_AnalyzeDataDescription $dataDescription)
    {
        $this->dataDescription = $dataDescription;
    }

    /**
     * @return mixed
     */
    public function getDataDescription()
    {
        return $this->dataDescription;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
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
     * @param Google_Service_Prediction_AnalyzeModelDescription $modelDescription
     */
    public function setModelDescription(Google_Service_Prediction_AnalyzeModelDescription $modelDescription)
    {
        $this->modelDescription = $modelDescription;
    }

    /**
     * @return mixed
     */
    public function getModelDescription()
    {
        return $this->modelDescription;
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
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescription
 */
class Google_Service_Prediction_AnalyzeDataDescription extends Google_Collection
{
    protected $collection_key = 'features';
    protected $internal_gapi_mappings = [];
    protected $featuresType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeatures';
    protected $featuresDataType = 'array';
    protected $outputFeatureType = 'Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature';
    protected $outputFeatureDataType = '';


    /**
     * @param $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @return mixed
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @param Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature $outputFeature
     */
    public function setOutputFeature(Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature $outputFeature)
    {
        $this->outputFeature = $outputFeature;
    }

    /**
     * @return mixed
     */
    public function getOutputFeature()
    {
        return $this->outputFeature;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescriptionFeatures
 */
class Google_Service_Prediction_AnalyzeDataDescriptionFeatures extends Google_Model
{
    public $index;
    protected $internal_gapi_mappings = [];
    protected $categoricalType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical';
    protected $categoricalDataType = '';
    protected $numericType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric';
    protected $numericDataType = '';
    protected $textType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText';
    protected $textDataType = '';


    /**
     * @param Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical $categorical
     */
    public function setCategorical(Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical $categorical)
    {
        $this->categorical = $categorical;
    }

    /**
     * @return mixed
     */
    public function getCategorical()
    {
        return $this->categorical;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * @param Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric $numeric
     */
    public function setNumeric(Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric $numeric)
    {
        $this->numeric = $numeric;
    }

    /**
     * @return mixed
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * @param Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText $text
     */
    public function setText(Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText $text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical
 */
class Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategorical extends Google_Collection
{
    public $count;
    protected $collection_key = 'values';
    protected $internal_gapi_mappings = [];
    protected $valuesType = 'Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategoricalValues';
    protected $valuesDataType = 'array';

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @param $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategoricalValues
 */
class Google_Service_Prediction_AnalyzeDataDescriptionFeaturesCategoricalValues extends Google_Model
{
    public $count;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric
 */
class Google_Service_Prediction_AnalyzeDataDescriptionFeaturesNumeric extends Google_Model
{
    public $count;
    public $mean;
    public $variance;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getMean()
    {
        return $this->mean;
    }

    /**
     * @param $mean
     */
    public function setMean($mean)
    {
        $this->mean = $mean;
    }

    /**
     * @return mixed
     */
    public function getVariance()
    {
        return $this->variance;
    }

    /**
     * @param $variance
     */
    public function setVariance($variance)
    {
        $this->variance = $variance;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText
 */
class Google_Service_Prediction_AnalyzeDataDescriptionFeaturesText extends Google_Model
{
    public $count;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature
 */
class Google_Service_Prediction_AnalyzeDataDescriptionOutputFeature extends Google_Collection
{
    protected $collection_key = 'text';
    protected $internal_gapi_mappings = [];
    protected $numericType = 'Google_Service_Prediction_AnalyzeDataDescriptionOutputFeatureNumeric';
    protected $numericDataType = '';
    protected $textType = 'Google_Service_Prediction_AnalyzeDataDescriptionOutputFeatureText';
    protected $textDataType = 'array';


    /**
     * @param Google_Service_Prediction_AnalyzeDataDescriptionOutputFeatureNumeric $numeric
     */
    public function setNumeric(Google_Service_Prediction_AnalyzeDataDescriptionOutputFeatureNumeric $numeric)
    {
        $this->numeric = $numeric;
    }

    /**
     * @return mixed
     */
    public function getNumeric()
    {
        return $this->numeric;
    }

    /**
     * @param $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescriptionOutputFeatureNumeric
 */
class Google_Service_Prediction_AnalyzeDataDescriptionOutputFeatureNumeric extends Google_Model
{
    public $count;
    public $mean;
    public $variance;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getMean()
    {
        return $this->mean;
    }

    /**
     * @param $mean
     */
    public function setMean($mean)
    {
        $this->mean = $mean;
    }

    /**
     * @return mixed
     */
    public function getVariance()
    {
        return $this->variance;
    }

    /**
     * @param $variance
     */
    public function setVariance($variance)
    {
        $this->variance = $variance;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeDataDescriptionOutputFeatureText
 */
class Google_Service_Prediction_AnalyzeDataDescriptionOutputFeatureText extends Google_Model
{
    public $count;
    public $value;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeErrors
 */
class Google_Service_Prediction_AnalyzeErrors extends Google_Model
{
}

/**
 * Class Google_Service_Prediction_AnalyzeModelDescription
 */
class Google_Service_Prediction_AnalyzeModelDescription extends Google_Model
{
    public $confusionMatrix;
    public $confusionMatrixRowTotals;
    protected $internal_gapi_mappings = [];
    protected $modelinfoType = 'Google_Service_Prediction_Insert2';
    protected $modelinfoDataType = '';

    /**
     * @return mixed
     */
    public function getConfusionMatrix()
    {
        return $this->confusionMatrix;
    }

    /**
     * @param $confusionMatrix
     */
    public function setConfusionMatrix($confusionMatrix)
    {
        $this->confusionMatrix = $confusionMatrix;
    }

    /**
     * @return mixed
     */
    public function getConfusionMatrixRowTotals()
    {
        return $this->confusionMatrixRowTotals;
    }

    /**
     * @param $confusionMatrixRowTotals
     */
    public function setConfusionMatrixRowTotals($confusionMatrixRowTotals)
    {
        $this->confusionMatrixRowTotals = $confusionMatrixRowTotals;
    }

    /**
     * @param Google_Service_Prediction_Insert2 $modelinfo
     */
    public function setModelinfo(Google_Service_Prediction_Insert2 $modelinfo)
    {
        $this->modelinfo = $modelinfo;
    }

    /**
     * @return mixed
     */
    public function getModelinfo()
    {
        return $this->modelinfo;
    }
}

/**
 * Class Google_Service_Prediction_AnalyzeModelDescriptionConfusionMatrix
 */
class Google_Service_Prediction_AnalyzeModelDescriptionConfusionMatrix extends Google_Model
{
}

/**
 * Class Google_Service_Prediction_AnalyzeModelDescriptionConfusionMatrixElement
 */
class Google_Service_Prediction_AnalyzeModelDescriptionConfusionMatrixElement extends Google_Model
{
}

/**
 * Class Google_Service_Prediction_AnalyzeModelDescriptionConfusionMatrixRowTotals
 */
class Google_Service_Prediction_AnalyzeModelDescriptionConfusionMatrixRowTotals extends Google_Model
{
}

/**
 * Class Google_Service_Prediction_Input
 */
class Google_Service_Prediction_Input extends Google_Model
{
    protected $internal_gapi_mappings = [];
    protected $inputType = 'Google_Service_Prediction_InputInput';
    protected $inputDataType = '';


    /**
     * @param Google_Service_Prediction_InputInput $input
     */
    public function setInput(Google_Service_Prediction_InputInput $input)
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
}

/**
 * Class Google_Service_Prediction_InputInput
 */
class Google_Service_Prediction_InputInput extends Google_Collection
{
    public $csvInstance;
    protected $collection_key = 'csvInstance';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCsvInstance()
    {
        return $this->csvInstance;
    }

    /**
     * @param $csvInstance
     */
    public function setCsvInstance($csvInstance)
    {
        $this->csvInstance = $csvInstance;
    }
}

/**
 * Class Google_Service_Prediction_Insert
 */
class Google_Service_Prediction_Insert extends Google_Collection
{
    public $id;
    public $modelType;
    public $sourceModel;
    public $storageDataLocation;
    public $storagePMMLLocation;
    public $storagePMMLModelLocation;
    public $utility;
    protected $collection_key = 'utility';
    protected $internal_gapi_mappings = [];
    protected $trainingInstancesType = 'Google_Service_Prediction_InsertTrainingInstances';
    protected $trainingInstancesDataType = 'array';

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
    public function getModelType()
    {
        return $this->modelType;
    }

    /**
     * @param $modelType
     */
    public function setModelType($modelType)
    {
        $this->modelType = $modelType;
    }

    /**
     * @return mixed
     */
    public function getSourceModel()
    {
        return $this->sourceModel;
    }

    /**
     * @param $sourceModel
     */
    public function setSourceModel($sourceModel)
    {
        $this->sourceModel = $sourceModel;
    }

    /**
     * @return mixed
     */
    public function getStorageDataLocation()
    {
        return $this->storageDataLocation;
    }

    /**
     * @param $storageDataLocation
     */
    public function setStorageDataLocation($storageDataLocation)
    {
        $this->storageDataLocation = $storageDataLocation;
    }

    /**
     * @return mixed
     */
    public function getStoragePMMLLocation()
    {
        return $this->storagePMMLLocation;
    }

    /**
     * @param $storagePMMLLocation
     */
    public function setStoragePMMLLocation($storagePMMLLocation)
    {
        $this->storagePMMLLocation = $storagePMMLLocation;
    }

    /**
     * @return mixed
     */
    public function getStoragePMMLModelLocation()
    {
        return $this->storagePMMLModelLocation;
    }

    /**
     * @param $storagePMMLModelLocation
     */
    public function setStoragePMMLModelLocation($storagePMMLModelLocation)
    {
        $this->storagePMMLModelLocation = $storagePMMLModelLocation;
    }

    /**
     * @param $trainingInstances
     */
    public function setTrainingInstances($trainingInstances)
    {
        $this->trainingInstances = $trainingInstances;
    }

    /**
     * @return mixed
     */
    public function getTrainingInstances()
    {
        return $this->trainingInstances;
    }

    /**
     * @return mixed
     */
    public function getUtility()
    {
        return $this->utility;
    }

    /**
     * @param $utility
     */
    public function setUtility($utility)
    {
        $this->utility = $utility;
    }
}

/**
 * Class Google_Service_Prediction_Insert2
 */
class Google_Service_Prediction_Insert2 extends Google_Model
{
    public $created;
    public $id;
    public $kind;
    public $modelType;
    public $selfLink;
    public $storageDataLocation;
    public $storagePMMLLocation;
    public $storagePMMLModelLocation;
    public $trainingComplete;
    public $trainingStatus;
    protected $internal_gapi_mappings = [];
    protected $modelInfoType = 'Google_Service_Prediction_Insert2ModelInfo';
    protected $modelInfoDataType = '';

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
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
     * @param Google_Service_Prediction_Insert2ModelInfo $modelInfo
     */
    public function setModelInfo(Google_Service_Prediction_Insert2ModelInfo $modelInfo)
    {
        $this->modelInfo = $modelInfo;
    }

    /**
     * @return mixed
     */
    public function getModelInfo()
    {
        return $this->modelInfo;
    }

    /**
     * @return mixed
     */
    public function getModelType()
    {
        return $this->modelType;
    }

    /**
     * @param $modelType
     */
    public function setModelType($modelType)
    {
        $this->modelType = $modelType;
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
    public function getStorageDataLocation()
    {
        return $this->storageDataLocation;
    }

    /**
     * @param $storageDataLocation
     */
    public function setStorageDataLocation($storageDataLocation)
    {
        $this->storageDataLocation = $storageDataLocation;
    }

    /**
     * @return mixed
     */
    public function getStoragePMMLLocation()
    {
        return $this->storagePMMLLocation;
    }

    /**
     * @param $storagePMMLLocation
     */
    public function setStoragePMMLLocation($storagePMMLLocation)
    {
        $this->storagePMMLLocation = $storagePMMLLocation;
    }

    /**
     * @return mixed
     */
    public function getStoragePMMLModelLocation()
    {
        return $this->storagePMMLModelLocation;
    }

    /**
     * @param $storagePMMLModelLocation
     */
    public function setStoragePMMLModelLocation($storagePMMLModelLocation)
    {
        $this->storagePMMLModelLocation = $storagePMMLModelLocation;
    }

    /**
     * @return mixed
     */
    public function getTrainingComplete()
    {
        return $this->trainingComplete;
    }

    /**
     * @param $trainingComplete
     */
    public function setTrainingComplete($trainingComplete)
    {
        $this->trainingComplete = $trainingComplete;
    }

    /**
     * @return mixed
     */
    public function getTrainingStatus()
    {
        return $this->trainingStatus;
    }

    /**
     * @param $trainingStatus
     */
    public function setTrainingStatus($trainingStatus)
    {
        $this->trainingStatus = $trainingStatus;
    }
}

/**
 * Class Google_Service_Prediction_Insert2ModelInfo
 */
class Google_Service_Prediction_Insert2ModelInfo extends Google_Model
{
    public $classWeightedAccuracy;
    public $classificationAccuracy;
    public $meanSquaredError;
    public $modelType;
    public $numberInstances;
    public $numberLabels;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getClassWeightedAccuracy()
    {
        return $this->classWeightedAccuracy;
    }

    /**
     * @param $classWeightedAccuracy
     */
    public function setClassWeightedAccuracy($classWeightedAccuracy)
    {
        $this->classWeightedAccuracy = $classWeightedAccuracy;
    }

    /**
     * @return mixed
     */
    public function getClassificationAccuracy()
    {
        return $this->classificationAccuracy;
    }

    /**
     * @param $classificationAccuracy
     */
    public function setClassificationAccuracy($classificationAccuracy)
    {
        $this->classificationAccuracy = $classificationAccuracy;
    }

    /**
     * @return mixed
     */
    public function getMeanSquaredError()
    {
        return $this->meanSquaredError;
    }

    /**
     * @param $meanSquaredError
     */
    public function setMeanSquaredError($meanSquaredError)
    {
        $this->meanSquaredError = $meanSquaredError;
    }

    /**
     * @return mixed
     */
    public function getModelType()
    {
        return $this->modelType;
    }

    /**
     * @param $modelType
     */
    public function setModelType($modelType)
    {
        $this->modelType = $modelType;
    }

    /**
     * @return mixed
     */
    public function getNumberInstances()
    {
        return $this->numberInstances;
    }

    /**
     * @param $numberInstances
     */
    public function setNumberInstances($numberInstances)
    {
        $this->numberInstances = $numberInstances;
    }

    /**
     * @return mixed
     */
    public function getNumberLabels()
    {
        return $this->numberLabels;
    }

    /**
     * @param $numberLabels
     */
    public function setNumberLabels($numberLabels)
    {
        $this->numberLabels = $numberLabels;
    }
}

/**
 * Class Google_Service_Prediction_InsertTrainingInstances
 */
class Google_Service_Prediction_InsertTrainingInstances extends Google_Collection
{
    public $csvInstance;
    public $output;
    protected $collection_key = 'csvInstance';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCsvInstance()
    {
        return $this->csvInstance;
    }

    /**
     * @param $csvInstance
     */
    public function setCsvInstance($csvInstance)
    {
        $this->csvInstance = $csvInstance;
    }

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }
}

/**
 * Class Google_Service_Prediction_InsertUtility
 */
class Google_Service_Prediction_InsertUtility extends Google_Model
{
}

/**
 * Class Google_Service_Prediction_Output
 */
class Google_Service_Prediction_Output extends Google_Collection
{
    public $id;
    public $kind;
    public $outputLabel;
    public $outputValue;
    public $selfLink;
    protected $collection_key = 'outputMulti';
    protected $internal_gapi_mappings = [];
    protected $outputMultiType = 'Google_Service_Prediction_OutputOutputMulti';
    protected $outputMultiDataType = 'array';

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
    public function getOutputLabel()
    {
        return $this->outputLabel;
    }

    /**
     * @param $outputLabel
     */
    public function setOutputLabel($outputLabel)
    {
        $this->outputLabel = $outputLabel;
    }

    /**
     * @param $outputMulti
     */
    public function setOutputMulti($outputMulti)
    {
        $this->outputMulti = $outputMulti;
    }

    /**
     * @return mixed
     */
    public function getOutputMulti()
    {
        return $this->outputMulti;
    }

    /**
     * @return mixed
     */
    public function getOutputValue()
    {
        return $this->outputValue;
    }

    /**
     * @param $outputValue
     */
    public function setOutputValue($outputValue)
    {
        $this->outputValue = $outputValue;
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
}

/**
 * Class Google_Service_Prediction_OutputOutputMulti
 */
class Google_Service_Prediction_OutputOutputMulti extends Google_Model
{
    public $label;
    public $score;
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }
}

/**
 * Class Google_Service_Prediction_PredictionList
 */
class Google_Service_Prediction_PredictionList extends Google_Collection
{
    public $kind;
    public $nextPageToken;
    public $selfLink;
    protected $collection_key = 'items';
    protected $internal_gapi_mappings = [];
    protected $itemsType = 'Google_Service_Prediction_Insert2';
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
}

/**
 * Class Google_Service_Prediction_Update
 */
class Google_Service_Prediction_Update extends Google_Collection
{
    public $csvInstance;
    public $output;
    protected $collection_key = 'csvInstance';
    protected $internal_gapi_mappings = [];

    /**
     * @return mixed
     */
    public function getCsvInstance()
    {
        return $this->csvInstance;
    }

    /**
     * @param $csvInstance
     */
    public function setCsvInstance($csvInstance)
    {
        $this->csvInstance = $csvInstance;
    }

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }
}
