<?php

namespace Nawrot\PlagiarismChecker;

use Nawrot\PlagiarismChecker\DataProviders\DataProviderInterface;
use Nawrot\PlagiarismChecker\Entities\Essay;
use Nawrot\PlagiarismChecker\Entities\Report;

class PlagiarismChecker
{
    private $dataProvider;

    public function __construct(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    public function getReport(Essay $essay) : Report
    {
        $sentences = $essay->getSentences();

        $results = [];

        foreach($sentences as $sentence)
        {
            $results[] = $this->dataProvider->getResults($sentence);
        }

        return new Report(array_merge(...$results));
    }
}