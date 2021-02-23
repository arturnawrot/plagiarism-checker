<?php

namespace Arturek1\PlagiarismChecker\Entities;

use Arturek1\PlagiarismChecker\SimilarityCheckers\Standard\SimilarText;

class Result
{
    public $title;
    public $description;
    public $url;
    public $givenSentence;

    private $similarityChecker;

    public function __construct(
        $title,
        $description,
        $givenSentence, 
        string $url)
    {
        $this->title = $title;
        $this->description = $description;
        $this->givenSentence = $givenSentence;
        $this->url = $url;

        $this->similarityChecker = new SimilarText();
        $this->plagiarizmScore = $this->getPlagiarizmScore();
    }

    public function getPlagiarizmScore()
    {
        return $this->similarityChecker->compare(
            $this->givenSentence, $this->description
        );
    }

    public function isPlagiarized(): bool
    {
        return $this->getPlagiarizmScore() > 40;
    }
}