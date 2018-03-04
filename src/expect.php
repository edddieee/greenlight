<?php

use Greenlight\Expectation;
use Greenlight\Assertions;
use Greenlight\Describe;
use Greenlight\Suite;

function expect($value, $message = '') {
    return new Assertions(new Expectation($value, $message));
}

function describe($contextName, $block) {
    return Suite::getInstance()->push(new Describe($contextName, $block));
}
