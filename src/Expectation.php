<?php

namespace Greenlight;

use AssertionError;

class Expectation
{
    public $actualValue;
    public $message;

    public function __construct($actualValue, $message = '')
    {
        $this->actualValue = $actualValue;
        $this->customMessage = $message;
    }

    public function assert($response, $message)
    {
        $message = ($this->customMessage ? "{$this->customMessage}: " : "") . $message;

        if (!$response) {
            try {
                throw new AssertionError($message);
            } catch(AssertionError $error) {
                return $error->getMessage();
            }
        }
    }
}
