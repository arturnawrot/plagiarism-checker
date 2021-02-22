<?php

namespace Arturek1\PlagiarismChecker\Entities;

class Report
{
    private $results;

    public function __construct(array $results)
    {
        $this->results = $results;
    }

    public function getAllResults()
    {
        return $this->results;
    }

    public function getPlagiarizedResults()
    {
        $plagiarizedResults = [];

        foreach($this->results as $result)
        {
            if($result->isPlagiarized()) {
                $this->plagiarizedResults[] = $result;
            }
        }

        return $plagiarizedResults;
    }

    public function getAveragePlagiarismScore()
    {
        if(count($this->results) > 0) {
            return array_sum($this->results) / count($this->results);
        }

        return 0;
    }
}