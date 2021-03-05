<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function readJsonFromFile(string $path_in_fixtures)
    {
        $path = $this->getFullPath($path_in_fixtures);
        $result = (object) json_decode(file_get_contents($path)); 

        $type = gettype($result);
        if($type != 'object') {
            throw new \Exception('The result is a ' . $type . '. An object was expected.' . '\n' . $result);
        }

        return $result;
    }

    public function readStringFromFile(string $path_in_fixtures)
    {
        $path = $this->getFullPath($path_in_fixtures);
        return file_get_contents($path);
    }

    protected function getFullPath(string $path_in_fixtures)
    {
        return getcwd() . '/tests/Fixtures/' . $path_in_fixtures;
    }
}
