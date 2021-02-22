<?php

namespace Arturek1\PlagiarismChecker\DataProviders\Bing;

use Arturek1\PlagiarismChecker\DataProviders\BaseDataProvider;
use Arturek1\PlagiarismChecker\DataProviders\DataProviderInterface;
use Arturek1\PlagiarismChecker\Entities\Title;
use Arturek1\PlagiarismChecker\Entities\Description;
use Arturek1\PlagiarismChecker\Entities\Sentence;
use Arturek1\PlagiarismChecker\Entities\Result;

class BingDataProvider extends BaseDataProvider implements DataProviderInterface
{
    public function getResults(Sentence $sentence)
    {
        return array(
            new Result(
                new Title('This is a title'),
                new Description('This is a very long description ever.'),
                $sentence,
                new Sentence('This is a found sentence'),
                'https://tvn24.pl/news/23'
            ),
            new Result(
                new Title('This is a title'),
                new Description('This is a very long description ever.'),
                $sentence,
                new Sentence('This is a found sentence'),
                'https://tvn24.pl/news/23'
            )
        );
    }
}