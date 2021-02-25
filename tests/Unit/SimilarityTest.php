<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Nawrot\PlagiarismChecker\SimilarityCheckers\Standard\SimilarText;
use Tests\Traits\PopularQuotes;

class SimilarityTest extends TestCase
{
    use PopularQuotes;

    private $similarityChecker;

    public function setUp() : void
    {
        $this->similarityChecker = new SimilarText();
    }

    private function getPlagiarismScore($string1, $string2) : int
    {
        return $this->similarityChecker->compare(
            $string1, $string2   
        );
    }

    /** @test */
    public function two_identical_strings_give_100_plagiarism_score()
    {
        $score = $this->getPlagiarismScore(
            $this->getBibleQuote(), $this->getBibleQuote()
        );

        $this->assertTrue($score === 100);
    }

    /** @test */
    public function two_very_similar_strings_give_at_least_50_plagiarism_score()
    {
        $plagiarizedString = "God so liked the earth that he gave his Son, that whoever believes in him will not die but have forever life.";
        
        $score = $this->getPlagiarismScore(
            $this->getBibleQuote(), $plagiarizedString
        );

        $this->assertTrue($score >= 50);
    }
}