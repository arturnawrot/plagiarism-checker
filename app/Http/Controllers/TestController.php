<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Arturek1\PlagiarismChecker\PlagiarismChecker;
use Arturek1\PlagiarismChecker\Entities\Essay;
use Arturek1\PlagiarismChecker\DataProviders\Bing\BingDataProvider;
use App\Factories\DataProviderWorkerFactory;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $essay = new Essay("Good Morning everyone. My name is John and I would like to greet everyone.");
        $worker = DataProviderWorkerFactory::create();

        $dataProvider = new BingDataProvider($worker->getClient());

        $plagiarismChecker = new PlagiarismChecker($dataProvider);
        $report = $plagiarismChecker->getReport($essay);
        dd($report->getAveragePlagiarismScore());
    }
}