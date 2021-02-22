<?php

namespace Arturek1\PlagiarismChecker\Entities;

use Arturek1\PlagiarismChecker\Helpers\Sentence as SentenceHelper;

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
        $rawSentences = $sentenceHelper->split($this->fromString());

        $sentences = [];

        foreach($rawSentences as $sentence)
        {
            $sentences[] = new Sentence($sentence);
        }

        return $sentences;
    }

    public function fromString()
    {
        return (string) $this->text;
    }
}