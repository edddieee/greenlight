<?php

namespace Greenlight;

use Greenlight\Describe;

class Suite
{
    protected static $instance = null;
    private $describes = [];

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if(!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    public function push(Describe $describe)
    {
        $this->describes[] = $describe;
    }

    public function getDescribes()
    {
        return $this->describes;
    }
}
