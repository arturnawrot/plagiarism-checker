<?php

namespace Arturek1\PlagiarismChecker\Entities;

class Title extends BaseEntity
{
    private $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function fromString()
    {
        return (string) $this->title;
    }
}