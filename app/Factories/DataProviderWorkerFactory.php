<?php

namespace App\Factories;

use Arturek1\PlagiarismChecker\DataProviders\DataProviderPool;
use Arturek1\PlagiarismChecker\DataProviders\DataProviderWorker;
use GuzzleHttp\Client;
use App\Models\Worker;

class DataProviderWorkerFactory
{
    public static function create()
    {
        $sockets = ['172.17.0.1:5000'];

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