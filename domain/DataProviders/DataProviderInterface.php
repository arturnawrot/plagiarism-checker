<?php

namespace Nawrot\PlagiarismChecker\DataProviders;

interface DataProviderInterface
{
    public function getResults(string $sentence); 
}