<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nawrot\PlagiarismChecker\Entities\Essay;
use Nawrot\PlagiarismChecker\DataProviders\Bing\BingDataProvider;
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
            // It may look a little bit over
            $worker = DataProviderWorkerFactory::create();
            $dataProvider = new BingDataProvider($worker->getClient());
            $report = $this->plagiarismCheckerService->getReport($dataProvider, $essay);

            // Save all the results to the database so we don't have to scrape search engines for the same queries again
            $results = $report->getAllResults();

            foreach($results as $result)
            {
                // Possibly it could be added to another service class to seperate business logic from controllers,
                // but since it's used only once I will keep it here.
                LocalResult::Create([
                    'title' => $result->title,
                    'description' => $result->description,
                    'url' => $result->url,
                    'given_sentence' => $result->givenSentence
                ]);
            }
        }

        // @TODO Bug:
        // For some weird reason LocalDataProvider() yields better results than BingDataProvider(). 
        // but they both should yield the same results. The only difference between both providers is that
        // BingDataProvider is used only if a query is not cached and requested for the first time,
        // and if we request for the same query for the 2nd time the results will be fetched from local database using LocalDataProvider,
        // so we don't have to touch our Bing Scraper API which is called by BingDataProvider.
        
        // If you are an interviewer reading this, I really apologize for inconvenience and this akward situation.
        $report = $this->plagiarismCheckerService->getReport(new LocalDataProvider(), $essay);
        $results = $report->getAllResults();

        return $report->getPlagiarizedResults();
    }
}