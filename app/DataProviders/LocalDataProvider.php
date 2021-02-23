<?php

namespace App\DataProviders;

use Arturek1\PlagiarismChecker\DataProviders\DataProviderInterface;
use Arturek1\PlagiarismChecker\Entities\Result;
use App\Models\Result as LocalResult;

class LocalDataProvider implements DataProviderInterface
{
    public function getResults(string $sentence)
    {
        $localResults = LocalResult::Where('description', 'like', '%' . $sentence . '%')
            ->orWhere('given_sentence', 'like', '%' . $sentence . '%')
            ->get();

        if(count($localResults) === 0)
            return [];

        $results = [];

        foreach($localResults as $localResult)
        {
            $results[] = $this->convertToEntity($localResult, $sentence);
        }

        return $results;
    }

    protected function convertToEntity(LocalResult $result, string $sentence) : Result
    {
        return new Result(
            $result->title,
            $result->description,
            $sentence,
            $result->url
        );
    }
}