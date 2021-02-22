<?php

namespace Arturek1\PlagiarismChecker\Entities;

use Arturek1\PlagiarismChecker\SimilarityCheckers\Standard\SimilarText;

class Result
{
    private $title;
    private $description;
    private $givenSentence;
    private $foundSentence;
    private $url;
    private $similarityChecker;

    public function __construct(
        Title $title,
        Description $description,
        Sentence $givenSentence, 
        Sentence $foundSentence,
        string $url)
    {
        $this->title = $title;
        $this->description = $description;
        $this->givenSentence = $givenSentence;
        $this->foundSentence = $foundSentence;
        $this->url = $url;
        $this->similarityChecker = new SimilarText();
    }

    public function getPlagiarizmScore()
    {
        return $this->similarityChecker
            ->compare($this->givenSentence, $this->foundSentence);
    }

    public function isPlagiarized(): bool
    {
        return $this->getPlagiarizmScore() > 20;
    }
}