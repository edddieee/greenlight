<?php

namespace Greenlight;

use AssertionError;

class Expectation
{
    public $actualValue;
    public $message;
    public $negate = false;

    public function __construct($actualValue, $message = '')
    {
        $this->actualValue = $actualValue;
        $this->customMessage = $message;
    }

    public function assert($response, $message, $negativeMessage)
    {
        $message = $this->buildMessage($message, $negativeMessage);

        $response = $this->negate ? $response : !$response;

        if ($response) {
            try {
                throw new AssertionError($message);
            } catch(AssertionError $error) {
                return $error->getMessage();
            }
        }
    }

    private function buildMessage($message, $negateMessage)
    {
        $customMessage = ($this->customMessage ? "{$this->customMessage} : " : "");

        return $customMessage . ($this->negate ? $negateMessage : $message);
    }
}
