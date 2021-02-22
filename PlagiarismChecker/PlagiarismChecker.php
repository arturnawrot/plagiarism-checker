<?php

namespace Arturek1\PlagiarismChecker;

use Arturek1\PlagiarismChecker\DataProviders\DataProviderInterface;
use Arturek1\PlagiarismChecker\Entities\Essay;
use Arturek1\PlagiarismChecker\Entities\Report;

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

        return new Report($results);
    }
}