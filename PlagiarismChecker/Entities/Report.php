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
                $plagiarizedResults[] = $result;
            }
        }

        return $plagiarizedResults;
    }

    public function getAveragePlagiarismScore()
    {
        $scores = [];

        foreach($this->getPlagiarizedResults() as $result)
        {
            $scores[] = $result->getPlagiarizmScore();
        }

        if(count($this->results) > 0) {
            return array_sum($scores) / count($this->results);
        }

        return 0;
    }
}