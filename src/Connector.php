<?php

declare(strict_types=1);

namespace Arrrni\FreshsalesAPI;

/**
 * Interface Connector
 * @package Arrrni\FreshsalesAPI
 */
interface Connector
{
    /**
     * @param string $url
     * @param string $key
     * @return string|null
     */
    public function createGetRequest(string $url, string $key): ?string;

    /**
     * @param string $url
     * @param string $key
     * @param array $data
     * @return string|null
     */
    public function createPostRequest(string $url, string $key, array $data): ?string;
}
