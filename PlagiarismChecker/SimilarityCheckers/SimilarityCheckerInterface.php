<?php

namespace Arturek1\PlagiarismChecker\SimilarityCheckers;

interface SimilarityCheckerInterface
{
    public function compare(string $string1, string $string2): int;
}