<?php
/**
 * ProductsApi
 * PHP version 5
 *
 * @category Class
 * @package  MehrIt\OttoProductsApiClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Public Partner Product API
 *
 * Manage your product data, send images and                   much more.
 *
 * OpenAPI spec version: V1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.23
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace MehrIt\OttoProductsApiClient\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use MehrIt\OttoProductsApiClient\ApiException;
use MehrIt\OttoProductsApiClient\Configuration;
use MehrIt\OttoProductsApiClient\HeaderSelector;
use MehrIt\OttoProductsApiClient\ObjectSerializer;

/**
 * ProductsApi Class Doc Comment
 *
 * @category Class
 * @package  MehrIt\OttoProductsApiClient
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProductsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation createOrUpdateProductVariations
     *
     * Create or update your product variations and get a process-id to query results. The limit for the number of product variations in one request is 500.
     *
     * @param  \MehrIt\OttoProductsApiClient\Model\ProductVariation[] $body body (optional)
     * @param  \DateTime $x_request_timestamp Holds the client side update request timestamp (optional)
     *
     * @throws \MehrIt\OttoProductsApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \MehrIt\OttoProductsApiClient\Model\ProductProcessProgress
     */
    public function createOrUpdateProductVariations($body = null, $x_request_timestamp = null)
    {
        list($response) = $this->createOrUpdateProductVariationsWithHttpInfo($body, $x_request_timestamp);
        return $response;
    }

    /**
     * Operation createOrUpdateProductVariationsWithHttpInfo
     *
     * Create or update your product variations and get a process-id to query results. The limit for the number of product variations in one request is 500.
     *
     * @param  \MehrIt\OttoProductsApiClient\Model\ProductVariation[] $body (optional)
     * @param  \DateTime $x_request_timestamp Holds the client side update request timestamp (optional)
     *
     * @throws \MehrIt\OttoProductsApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \MehrIt\OttoProductsApiClient\Model\ProductProcessProgress, HTTP status code, HTTP response headers (array of strings)
     */
    public function createOrUpdateProductVariationsWithHttpInfo($body = null, $x_request_timestamp = null)
    {
        $returnType = '\MehrIt\OttoProductsApiClient\Model\ProductProcessProgress';
        $request = $this->createOrUpdateProductVariationsRequest($body, $x_request_timestamp);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MehrIt\OttoProductsApiClient\Model\ProductProcessProgress',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createOrUpdateProductVariationsAsync
     *
     * Create or update your product variations and get a process-id to query results. The limit for the number of product variations in one request is 500.
     *
     * @param  \MehrIt\OttoProductsApiClient\Model\ProductVariation[] $body (optional)
     * @param  \DateTime $x_request_timestamp Holds the client side update request timestamp (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createOrUpdateProductVariationsAsync($body = null, $x_request_timestamp = null)
    {
        return $this->createOrUpdateProductVariationsAsyncWithHttpInfo($body, $x_request_timestamp)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createOrUpdateProductVariationsAsyncWithHttpInfo
     *
     * Create or update your product variations and get a process-id to query results. The limit for the number of product variations in one request is 500.
     *
     * @param  \MehrIt\OttoProductsApiClient\Model\ProductVariation[] $body (optional)
     * @param  \DateTime $x_request_timestamp Holds the client side update request timestamp (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createOrUpdateProductVariationsAsyncWithHttpInfo($body = null, $x_request_timestamp = null)
    {
        $returnType = '\MehrIt\OttoProductsApiClient\Model\ProductProcessProgress';
        $request = $this->createOrUpdateProductVariationsRequest($body, $x_request_timestamp);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createOrUpdateProductVariations'
     *
     * @param  \MehrIt\OttoProductsApiClient\Model\ProductVariation[] $body (optional)
     * @param  \DateTime $x_request_timestamp Holds the client side update request timestamp (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createOrUpdateProductVariationsRequest($body = null, $x_request_timestamp = null)
    {

        $resourcePath = '/v1/products';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($x_request_timestamp !== null) {
            $headerParams['X-Request-Timestamp'] = ObjectSerializer::toHeaderValue($x_request_timestamp);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPartnerProducts
     *
     * Read your product variations. The total number of results could be limited by specifying query parameters. Generally the resulting product variations will be paginated. The default page length is 100 product variations per response, also the page size limit. The links specified in the result can be used to page through the total result space.
     *
     * @param  string $sku search for product variations by their sku value. Use this if your sku values contain slash (&#x27;/&#x27;) or dot (&#x27;.&#x27;) characters. (optional)
     * @param  string $product_name search for product variations by their productName value (optional)
     * @param  string $category search for product variations by their category value (optional)
     * @param  string $brand search for product variations by their brand value (optional)
     * @param  int $page page (optional)
     * @param  int $limit proposed limit for the number of products per response page (at most 100) (optional)
     *
     * @throws \MehrIt\OttoProductsApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \MehrIt\OttoProductsApiClient\Model\ProductVariationApiResult
     */
    public function getPartnerProducts($sku = null, $product_name = null, $category = null, $brand = null, $page = null, $limit = null)
    {
        list($response) = $this->getPartnerProductsWithHttpInfo($sku, $product_name, $category, $brand, $page, $limit);
        return $response;
    }

    /**
     * Operation getPartnerProductsWithHttpInfo
     *
     * Read your product variations. The total number of results could be limited by specifying query parameters. Generally the resulting product variations will be paginated. The default page length is 100 product variations per response, also the page size limit. The links specified in the result can be used to page through the total result space.
     *
     * @param  string $sku search for product variations by their sku value. Use this if your sku values contain slash (&#x27;/&#x27;) or dot (&#x27;.&#x27;) characters. (optional)
     * @param  string $product_name search for product variations by their productName value (optional)
     * @param  string $category search for product variations by their category value (optional)
     * @param  string $brand search for product variations by their brand value (optional)
     * @param  int $page (optional)
     * @param  int $limit proposed limit for the number of products per response page (at most 100) (optional)
     *
     * @throws \MehrIt\OttoProductsApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \MehrIt\OttoProductsApiClient\Model\ProductVariationApiResult, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPartnerProductsWithHttpInfo($sku = null, $product_name = null, $category = null, $brand = null, $page = null, $limit = null)
    {
        $returnType = '\MehrIt\OttoProductsApiClient\Model\ProductVariationApiResult';
        $request = $this->getPartnerProductsRequest($sku, $product_name, $category, $brand, $page, $limit);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MehrIt\OttoProductsApiClient\Model\ProductVariationApiResult',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPartnerProductsAsync
     *
     * Read your product variations. The total number of results could be limited by specifying query parameters. Generally the resulting product variations will be paginated. The default page length is 100 product variations per response, also the page size limit. The links specified in the result can be used to page through the total result space.
     *
     * @param  string $sku search for product variations by their sku value. Use this if your sku values contain slash (&#x27;/&#x27;) or dot (&#x27;.&#x27;) characters. (optional)
     * @param  string $product_name search for product variations by their productName value (optional)
     * @param  string $category search for product variations by their category value (optional)
     * @param  string $brand search for product variations by their brand value (optional)
     * @param  int $page (optional)
     * @param  int $limit proposed limit for the number of products per response page (at most 100) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPartnerProductsAsync($sku = null, $product_name = null, $category = null, $brand = null, $page = null, $limit = null)
    {
        return $this->getPartnerProductsAsyncWithHttpInfo($sku, $product_name, $category, $brand, $page, $limit)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPartnerProductsAsyncWithHttpInfo
     *
     * Read your product variations. The total number of results could be limited by specifying query parameters. Generally the resulting product variations will be paginated. The default page length is 100 product variations per response, also the page size limit. The links specified in the result can be used to page through the total result space.
     *
     * @param  string $sku search for product variations by their sku value. Use this if your sku values contain slash (&#x27;/&#x27;) or dot (&#x27;.&#x27;) characters. (optional)
     * @param  string $product_name search for product variations by their productName value (optional)
     * @param  string $category search for product variations by their category value (optional)
     * @param  string $brand search for product variations by their brand value (optional)
     * @param  int $page (optional)
     * @param  int $limit proposed limit for the number of products per response page (at most 100) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPartnerProductsAsyncWithHttpInfo($sku = null, $product_name = null, $category = null, $brand = null, $page = null, $limit = null)
    {
        $returnType = '\MehrIt\OttoProductsApiClient\Model\ProductVariationApiResult';
        $request = $this->getPartnerProductsRequest($sku, $product_name, $category, $brand, $page, $limit);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPartnerProducts'
     *
     * @param  string $sku search for product variations by their sku value. Use this if your sku values contain slash (&#x27;/&#x27;) or dot (&#x27;.&#x27;) characters. (optional)
     * @param  string $product_name search for product variations by their productName value (optional)
     * @param  string $category search for product variations by their category value (optional)
     * @param  string $brand search for product variations by their brand value (optional)
     * @param  int $page (optional)
     * @param  int $limit proposed limit for the number of products per response page (at most 100) (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getPartnerProductsRequest($sku = null, $product_name = null, $category = null, $brand = null, $page = null, $limit = null)
    {

        $resourcePath = '/v1/products';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($sku !== null) {
            $queryParams['sku'] = ObjectSerializer::toQueryValue($sku, null);
        }
        // query params
        if ($product_name !== null) {
            $queryParams['productName'] = ObjectSerializer::toQueryValue($product_name, null);
        }
        // query params
        if ($category !== null) {
            $queryParams['category'] = ObjectSerializer::toQueryValue($category, null);
        }
        // query params
        if ($brand !== null) {
            $queryParams['brand'] = ObjectSerializer::toQueryValue($brand, null);
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int32');
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = ObjectSerializer::toQueryValue($limit, 'int32');
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getProductVariation
     *
     * Read a single product variation.
     *
     * @param  string $sku search for a product variation by its SKU value (required)
     *
     * @throws \MehrIt\OttoProductsApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \MehrIt\OttoProductsApiClient\Model\ProductVariation
     */
    public function getProductVariation($sku)
    {
        list($response) = $this->getProductVariationWithHttpInfo($sku);
        return $response;
    }

    /**
     * Operation getProductVariationWithHttpInfo
     *
     * Read a single product variation.
     *
     * @param  string $sku search for a product variation by its SKU value (required)
     *
     * @throws \MehrIt\OttoProductsApiClient\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \MehrIt\OttoProductsApiClient\Model\ProductVariation, HTTP status code, HTTP response headers (array of strings)
     */
    public function getProductVariationWithHttpInfo($sku)
    {
        $returnType = '\MehrIt\OttoProductsApiClient\Model\ProductVariation';
        $request = $this->getProductVariationRequest($sku);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MehrIt\OttoProductsApiClient\Model\ProductVariation',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getProductVariationAsync
     *
     * Read a single product variation.
     *
     * @param  string $sku search for a product variation by its SKU value (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProductVariationAsync($sku)
    {
        return $this->getProductVariationAsyncWithHttpInfo($sku)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getProductVariationAsyncWithHttpInfo
     *
     * Read a single product variation.
     *
     * @param  string $sku search for a product variation by its SKU value (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProductVariationAsyncWithHttpInfo($sku)
    {
        $returnType = '\MehrIt\OttoProductsApiClient\Model\ProductVariation';
        $request = $this->getProductVariationRequest($sku);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getProductVariation'
     *
     * @param  string $sku search for a product variation by its SKU value (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getProductVariationRequest($sku)
    {
        // verify the required parameter 'sku' is set
        if ($sku === null || (is_array($sku) && count($sku) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $sku when calling getProductVariation'
            );
        }

        $resourcePath = '/v1/products/{sku}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($sku !== null) {
            $resourcePath = str_replace(
                '{' . 'sku' . '}',
                ObjectSerializer::toPathValue($sku),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
