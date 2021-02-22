<?php

namespace Arturek1\PlagiarismChecker\DataProviders;

use Arturek1\PlagiarismChecker\Exceptions\NoFreeWorkerAvailable;

class DataProviderPool
{
    private $occupiedWorkers;
    private $freeWorkers;

    public function __construct(array $occupiedWorkers, array $freeWorkers)
    {
        $this->occupiedWorkers = $occupiedWorkers;
        $this->freeWorkers = $freeWorkers;
    }

    public function getAllFreeWorkers()
    {
        if(empty($this->freeWorkers)) {
            throw new NoFreeWorkerAvailable('No free worker available for right now. Try again later.');
        }

        return $this->freeWorkers;
    }

    public function getFreeWorker()
    {
        $freeWorkers = $this->getAllFreeWorkers();

        return $freeWorkers[array_rand($freeWorkers)];
    }

    public function getOccupiedWorkers()
    {
        return $this->occupiedWorkers;
    }
}