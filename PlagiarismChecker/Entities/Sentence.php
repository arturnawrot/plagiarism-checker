<?php

namespace Arturek1\PlagiarismChecker\Entities;

class Sentence extends BaseEntity
{
    public function __construct(string $sentence)
    {
        $this->sentence = $sentence; 
    }

    public function fromString()
    {
        return (string) $this->sentence;
    }
}