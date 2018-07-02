<?php

namespace Suretly\LenderApi\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Suretly\LenderApi\Config\Config;
use Suretly\LenderApi\Config\ConfigInterface;
use Suretly\LenderApi\Exception\ResponseErrorException;

/**
 * Class HttpClient
 * @package Suretly\LenderApi\Http
 */
final class HttpClient implements HttpClientInterface
{
    private const HEADERS = 'headers';
    private const BODY = 'body';
    private const MULTIPART = 'multipart';

    /**
     * @var ConfigInterface $config
     */
    private $config;

    /**
     * @var Client $client
     */
    private $client;

    /**
     * HttpClient constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
        $this->client = new Client();
    }

    /**
     * @inheritdoc
     */
    public function get($uri, array $params = [])
    {
        try {
            $response = $this->client->get($this->getUri($uri, $params), $this->getOptions($params))->getBody()->getContents();
        } catch (BadResponseException $exception) {
            throw new ResponseErrorException((string)$exception->getResponse()->getBody()->getContents(), $exception->getCode());
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function post($uri, array $params = [])
    {
        try {
            $response = $this->client->post($this->getUri($uri, $params), $this->getOptions($params))->getBody();
        } catch (BadResponseException $exception) {
            throw new ResponseErrorException((string)$exception->getResponse()->getBody()->getContents(), $exception->getCode());
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * Return options
     *
     * @param array $params
     * @return array
     */
    private function getOptions(array $params)
    {
        $options = [
            self::HEADERS => $this->getHeaders($params)
        ];

        if (isset($params[self::BODY])) {
            $options[self::BODY] = json_encode($params[self::BODY]);
        }

        if (isset($params[self::MULTIPART])) {
            $options[self::MULTIPART] = $params[self::MULTIPART];
        }

        return $options;
    }

    /**
     * Return headers
     *
     * @param array $params
     * @return array
     */
    public function getHeaders(array $params): array
    {
        try {
            $auth = $this->config->getAuthToken();
        } catch (\Exception $exception) {
            trigger_error('Can\'t get auth token. Check the availability of the function random_bytes().', E_USER_ERROR);
            $auth = null;
        }
        $headers = [
            'User-Agent' => $this->config->getUserAgent()
        ];

        if (!isset($params['auth']) || $params['auth']) {
            $headers['_auth'] = $auth;
        }
        if (!isset($params[self::MULTIPART])) {
            $headers['Accept'] = 'application/json';
            $headers['Content-Type'] = 'application/json';
        }
        if (isset($params[self::HEADERS])) {
            $headers = array_merge($headers, $params[self::HEADERS]);
        }

        return $headers;
    }

    /**
     * Return uri
     *
     * @param $uri
     * @param array $params
     * @return string
     */
    private function getUri($uri, array $params)
    {
        $url = $this->config->getApiURL() . $uri;
        if (isset($params['query'])) {
            $url .= '?' . http_build_query($params['query']);
        }

        return $url;
    }
}