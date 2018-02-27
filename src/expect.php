<?php

use Greenlight\Expectation;
use Greenlight\Assertions;

function expect($value, $message = '') {
    return new Assertions(new Expectation($value, $message));
}
