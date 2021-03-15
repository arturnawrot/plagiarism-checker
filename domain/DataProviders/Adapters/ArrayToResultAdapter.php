<?php

namespace Nawrot\PlagiarismChecker\DataProviders\Adapters;

use Nawrot\PlagiarismChecker\Entities\Result;

class ArrayToResultAdapter
{
    public function getResults(object $array, $sentence)
    {
        $results = [];
       
        foreach($array as $result)
        {
            $results[] = $this->getResult($result, $sentence);
        }

        return $results;
    }

    public function getResult(object $array, $sentence)
    {
        return new Result(
            $array->title,
            $array->description,
            $sentence,
            $array->url
        );
    }
}