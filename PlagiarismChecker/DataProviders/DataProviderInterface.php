<?php

namespace Arturek1\PlagiarismChecker\DataProviders;

interface DataProviderInterface
{
    public function getResults(string $sentence); 
}