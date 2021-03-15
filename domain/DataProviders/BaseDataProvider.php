<?php

namespace Nawrot\PlagiarismChecker\DataProviders;

use GuzzleHttp\ClientInterface;

class BaseDataProvider
{
    protected $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;    
    }
}