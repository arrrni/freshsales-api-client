<?php

declare(strict_types=1);

namespace Arrrni\FreshsalesAPI;

use Arrrni\FreshsalesAPI\Connector\GuzzleConnector;
use Http\Client\Exception as HttpClientException;

/**
 * Class APIClient
 * @package Arrrni\FreshsalesAPI
 */
class APIClient
{
    /**
     * @var Connector
     */
    private $connector;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $key;

    /**
     * APIClient constructor.
     * If Connector is not provided client will use default one.
     * @param string $domain
     * @param string $key
     * @param Connector|null $connector
     */
    public function __construct(string $domain, string $key, Connector $connector = null)
    {
        $this->domain = $domain;
        $this->key = $key;
        $this->connector = null === $connector ? new GuzzleConnector() : $connector;
    }

    /**
     * Returns lead data by lead ID
     * @param int $leadId
     * @return string|null
     */
    public function getLeadData(int $leadId): ?string
    {
        try {
            $result = $this->connector->createGetRequest(
                sprintf('%s/api/leads/%d',
                    $this->domain,
                    $leadId
                ), $this->key);
        } catch (HttpClientException $exception) {
            echo $exception->getMessage();
        }
        return $result;
    }
}
