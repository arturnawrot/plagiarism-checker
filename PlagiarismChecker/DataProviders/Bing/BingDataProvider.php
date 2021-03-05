<?php

namespace Nawrot\PlagiarismChecker\DataProviders\Bing;

use Nawrot\PlagiarismChecker\DataProviders\BaseDataProvider;
use Nawrot\PlagiarismChecker\DataProviders\DataProviderInterface;
use Nawrot\PlagiarismChecker\DataProviders\Adapters\ArrayToResultAdapter;

class BingDataProvider extends BaseDataProvider implements DataProviderInterface
{
    public function getAPIResponse(string $sentence)
    {
        return $this->httpClient->request('GET', '/', [
            'query' => ['query' => $sentence]
        ]);
    }

    public function cleanArray(object $rawResults)
    {
        return (object) array_filter((array) $rawResults, function($values) {
            foreach($values as $value) {
                return !is_null($value) && $value !== ''; 
            } 
        });
    }

    public function getResults(string $sentence)
    {
        $response = $this->getAPIResponse($sentence);
    
        $json_data = (object) json_decode($response->getBody());
        $json_data = $this->cleanArray($json_data);

        $adapter = new ArrayToResultAdapter();
        return $adapter->getResults($json_data, $sentence);
    }
}