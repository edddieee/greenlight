<?php

namespace Greenlight;

class Assertions
{
    private $chains = [
        'to', 'be', 'been', 'is', 'that',
        'which', 'and', 'has', 'have', 'with',
        'at', 'of', 'same', 'but', 'does'
    ];

    private $modifiers = ['not'];

    public function __construct(Expectation $expectation)
    {
        $this->expectation = $expectation;
        $this->actual = $expectation->actualValue;
    }

    public function not()
    {
        $this->expectation->negate = true;

        return $this;
    }

    public function equal($expected)
    {
        return $this->expectation->assert(
            $this->actual == $expected,
            "expected {$this->actual} to equal {$expected}",
            "expected {$this->actual} to not equal {$expected}"
        );
    }

    public function __get($word)
    {
        if (in_array($word, $this->chains)) {
            return $this;
        }

        if (in_array($word, $this->modifiers)) {
            return $this->$word();
        }

        throw new \Exception("chainable word '{$word}' not found");
    }
}
