<?php

namespace Greenlight;

class Assertions
{
    private $chains = [
        'to', 'be', 'been', 'is', 'that',
        'which', 'and', 'has', 'have', 'with',
        'at', 'of', 'same', 'but', 'does'
    ];

    public function __construct(Expectation $expectation)
    {
        $this->expectation = $expectation;
        $this->actual = $expectation->actualValue;
    }

    public function equal($expected)
    {
        return $this->expectation->assert(
            $this->actual == $expected,
            "expected {$this->actual} to equal {$expected}"
        );
    }

    public function __get($word)
    {
        if (!in_array($word, $this->chains)) {
            throw new \Exception("chainable word '{$word}' not found");
        }

        return $this;
    }
}
