<?php

namespace App\Services;

use Nawrot\PlagiarismChecker\PlagiarismChecker;

use Nawrot\PlagiarismChecker\DataProviders\DataProviderInterface;
use Nawrot\PlagiarismChecker\Entities\Essay;

class PlagiarismCheckerService
{
    public function getReport(DataProviderInterface $dataProvider, Essay $essay)
    {
        $plagiarismChecker = new PlagiarismChecker($dataProvider);

        return $plagiarismChecker->getReport($essay);
    }
}