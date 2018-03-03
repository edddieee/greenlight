<?php

namespace Greenlight\Output;

use AssertionError;

class ErrorQueue
{
    protected static $instance = null;
    private $errors = [];

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

    public function push(ErrorMessage $errorMessage)
    {
        $this->errors[] = $errorMessage->getContent();
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
