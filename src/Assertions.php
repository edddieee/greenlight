<?php

namespace Greenlight;

class Assertions
{
    private $chains = [
        'to', 'be', 'been', 'is', 'that',
        'which', 'and', 'has', 'have', 'with',
        'at', 'of', 'same', 'but', 'does'
    ];

    public function __get($word)
    {
        if (!in_array($word, $this->chains)) {
            throw new \Exception("chainable word '{$word}' not found");
        }

        return $this;
    }
}
