<?php

namespace Nawrot\PlagiarismChecker\DataProviders\Bing;

use Nawrot\PlagiarismChecker\DataProviders\BaseDataProvider;
use Nawrot\PlagiarismChecker\DataProviders\DataProviderInterface;
use Nawrot\PlagiarismChecker\Entities\Result;

class BingDataProvider extends BaseDataProvider implements DataProviderInterface
{
    public function getResults(string  $sentence)
    {
        $response = $this->httpClient->request('GET', '/', [
            'query' => ['query' => $sentence]
        ]);

        $json_data = json_decode($response->getBody());

        $results = [];

        foreach($json_data as $result)
        {
            if(!is_string($result->description) OR empty($result->description))
                continue;

            $results[] = (new Result(
                $result->title,
                $result->description,
                $sentence,
                $result->url
            ));
        }

        return $results;
    }
}