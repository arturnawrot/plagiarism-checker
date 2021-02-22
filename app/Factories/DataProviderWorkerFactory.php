<?php

namespace App\Factories;

use Arturek1\PlagiarismChecker\DataProviders\DataProviderPool;
use Arturek1\PlagiarismChecker\DataProviders\DataProviderWorker;
use GuzzleHttp\Client;

class DataProviderWorkerFactory
{
    public static function create()
    {
        $sockets = ['127.0.0.1:5050', 'localhost:5050'];

        $freeWorkers = [];

        foreach($sockets as $socket)
        {
            $freeWorkers[] = new DataProviderWorker(static::getHttpClient($socket), $socket);
        }

        $dataProviderPool = new DataProviderPool([], $freeWorkers);

        return $dataProviderPool->getFreeWorker();
    }

    protected static function getHttpClient(string $socket)
    {
        return new Client([
            'base_uri' => $socket
        ]);
    }
}