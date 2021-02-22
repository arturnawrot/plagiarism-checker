<?php

namespace Arturek1\PlagiarismChecker\Entities;

class Description extends BaseEntity
{
    private $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function fromString()
    {
        return (string) $this->description;
    }
}