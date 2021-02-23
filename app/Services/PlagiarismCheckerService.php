<?php

namespace App\Services;

use Arturek1\PlagiarismChecker\PlagiarismChecker;

use Arturek1\PlagiarismChecker\DataProviders\DataProviderInterface;
use Arturek1\PlagiarismChecker\Entities\Essay;

class PlagiarismCheckerService
{
    public function getReport(DataProviderInterface $dataProvider, Essay $essay)
    {
        $plagiarismChecker = new PlagiarismChecker($dataProvider);

        return $plagiarismChecker->getReport($essay);
    }
}