<?php

namespace Arturek1\PlagiarismChecker\DataProviders;

use Arturek1\PlagiarismChecker\Entities\Sentence;

interface DataProviderInterface
{
    public function getResults(Sentence $sentence); 
}