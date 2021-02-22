<?php

namespace Arturek1\PlagiarismChecker\SimilarityCheckers;

interface SimilarityCheckerInterface
{
    public function compare($string1, $string2);
}