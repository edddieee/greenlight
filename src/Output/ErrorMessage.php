<?php

namespace Greenlight\Output;

use AssertionError;

class ErrorMessage
{
    public function __construct(AssertionError $error)
    {
        $this->error = $error;
    }

    public function getContent()
    {
        return "Failure/Error: " . $this->error->getMessage();
    }
}
