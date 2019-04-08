<?php

declare(strict_types=1);

namespace Arrrni\FreshsalesAPI\Connector;

use Arrrni\FreshsalesAPI\Connector;
use Http\Client\Exception;
use Http\Client\Exception\NetworkException;
use Http\Client\Common\HttpMethodsClient as Client;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;

/**
 * Class GuzzleConnector
 * @package Arrrni\FreshsalesAPI\Connector
 */
class GuzzleConnector implements Connector
{
    /**
     * @var Client
     */
    private $client;

    /**
     * GuzzleConnector constructor.
     * @todo: After httplug update refactor this one to use another message factory (PSR-17)
     */
    public function __construct()
    {
        $this->client = new Client(HttpClientDiscovery::find(), MessageFactoryDiscovery::find());
    }

    /**
     * @param string $url
     * @param string $key
     * @return string|null
     * @throws NetworkException
     * @throws Exception
     */
    public function createGetRequest(string $url, string $key): ?string
    {
        $request = $this->client->get($url);
        return $request->getBody()->getContents();
    }

    public function createPostRequest(string $url, string $key, array $data): ?string
    {
        // TODO: Implement createPostRequest() method.
        return null;
    }
}
