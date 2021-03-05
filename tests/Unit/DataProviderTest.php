<?php

namespace Tests\Feature;

use Nawrot\PlagiarismChecker\DataProviders\Bing\BingDataProvider;
use Nawrot\PlagiarismChecker\DataProviders\Adapters\ArrayToResultAdapter;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use Tests\TestCase;

class DataProviderTest extends TestCase
{
    private $adapter;

    public function setUp() : void
    {
        $this->adapter = new ArrayToResultAdapter();
    }

    /** @test */
    public function removes_results_with_empty_description()
    {   
        $stub = $this->createStub(BingDataProvider::class);

        $jsonResult = (object) json_encode([
            'title' => 'Ford Explorer',
            'description' => '',
            'url' => 'https://ford.com'
        ]);

        $stub->method('getAPIResponse')
             ->willReturn($jsonResult);
        
        $numberOfResults = count((array) $stub->getResults('Some random sentence'));

        // >! 0 Not greater than zero
        $this->assertTrue($numberOfResults >! 0);    
    }

    /** @test */
    public function uses_an_http_client_to_get_a_json_response_and_converts_it_to_business_objects()
    {
        $sentence = 'Some random sentence.';

        $expectedResults = $this->adapter->getResults(
            $this->readJsonFromFile('valid_api_response.json'), $sentence
        );

        $mock = new MockHandler([
            new Response(200, ['type' => 'application/json'], $this->readStringFromFile('valid_api_response.json')),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $httpClient = new Client(
            ['handler' => $handlerStack]
        );

        $dataProvider = new BingDataProvider($httpClient);
        $results = $dataProvider->getResults($sentence);
        
        $this->assertEquals($results, $expectedResults);
    }
}
