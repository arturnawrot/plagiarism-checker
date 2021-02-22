<?php

namespace Arturek1\PlagiarismChecker\ValueObjects;

class Sentence
{
    private $sentence;

    public function __construct(string $sentence)
    {
        return $this->sentence = $sentence;    
    }

    public static function create($sentence): Sentence
    {
        return new Sentence($sentence);
    }
}