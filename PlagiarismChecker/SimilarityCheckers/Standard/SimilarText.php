<?php

namespace Arturek1\PlagiarismChecker\SimilarityCheckers\Standard;

use Arturek1\PlagiarismChecker\SimilarityCheckers\SimilarityCheckerInterface;

class SimilarText implements SimilarityCheckerInterface
{
    public function compare($string1, $string2)
    {
        $results = [
            similar_text($string1, $string2),
            similar_text($string2, $string1),
        ];

        return max($results);
    }
}