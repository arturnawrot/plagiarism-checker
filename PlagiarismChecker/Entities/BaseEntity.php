<?php

namespace Nawrot\PlagiarismChecker\Entities;

abstract class BaseEntity
{
    public function fromString()
    {
        throw new \Exception('This entity is not a string');
    }
}