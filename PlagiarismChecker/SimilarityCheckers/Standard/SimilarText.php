<?php

namespace Arturek1\PlagiarismChecker\SimilarityCheckers\Standard;

use Arturek1\PlagiarismChecker\SimilarityCheckers\SimilarityCheckerInterface;

class SimilarText implements SimilarityCheckerInterface
{
    public function compare(string $string1, string $string2) : int
    {
        $results = [
            $this->getPercentage($string1, $string2),
            $this->getPercentage($string2, $string1),
        ];

        return max($results);
    }

    public function getPercentage(string $string1, string $string2): int
    {
        similar_text($string1, $string2, $percentage);
        return (int) $percentage;
    }
}