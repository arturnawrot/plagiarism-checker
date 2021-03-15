<?php

namespace Nawrot\PlagiarismChecker\Entities;

use Nawrot\PlagiarismChecker\Helpers\Sentence as SentenceHelper;

class Essay
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getSentences()
    {
        $sentenceHelper = new SentenceHelper();
        return $sentenceHelper->split($this->fromString());
    }

    public function fromString()
    {
        return (string) $this->text;
    }
}