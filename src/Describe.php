<?php

namespace Greenlight;

class Describe
{
    private $contextName;
    private $block;

    public function __construct($contextName, $block)
    {
        $this->contextName = $contextName;
        $this->block = $block();
    }
}
