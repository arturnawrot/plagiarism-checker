<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Arturek1\PlagiarismChecker\Entities\Essay;
use Arturek1\PlagiarismChecker\DataProviders\Bing\BingDataProvider;
use App\Services\PlagiarismCheckerService;
use App\DataProviders\LocalDataProvider;
use App\Factories\DataProviderWorkerFactory;
use App\Models\Result as LocalResult;

class PlagiarismController extends Controller
{
    private $plagiarismCheckerService;

    public function __construct(PlagiarismCheckerService $plagiarismCheckerService)
    {
        $this->plagiarismCheckerService = $plagiarismCheckerService;
    }

    public function index(Request $request)
    {
        $essay = new Essay($request->essay);

        $report = $this->plagiarismCheckerService->getReport(new LocalDataProvider(), $essay);
        $results = $report->getAllResults();

        if(count($results) === 0) {
            $worker = DataProviderWorkerFactory::create();
            $dataProvider = new BingDataProvider($worker->getClient());
            $report = $this->plagiarismCheckerService->getReport($dataProvider, $essay);
            $results = $report->getAllResults();

            foreach($results as $result)
            {
                LocalResult::Create([
                    'title' => $result->title,
                    'description' => $result->description,
                    'url' => $result->url,
                    'given_sentence' => $result->givenSentence
                ]);
            }
        }

        return $report->getPlagiarizedResults();
    }
}