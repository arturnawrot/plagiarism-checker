<?php

namespace Arturek1\PlagiarismChecker\DataProviders;

use GuzzleHttp\ClientInterface;

class DataProviderWorker
{
    private $address;
    private $httpClient;

    public function __construct(ClientInterface $httpClient, string $address)
    {
        $this->address = $address;
        $this->httpClient = $httpClient;
    }

    public function getClient() : ClientInterface
    {
        return $this->httpClient;
    }
}