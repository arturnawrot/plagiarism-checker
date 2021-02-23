<?php

namespace Arturek1\PlagiarismChecker\DataProviders\Bing;

use Arturek1\PlagiarismChecker\DataProviders\BaseDataProvider;
use Arturek1\PlagiarismChecker\DataProviders\DataProviderInterface;
use Arturek1\PlagiarismChecker\Entities\Result;

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