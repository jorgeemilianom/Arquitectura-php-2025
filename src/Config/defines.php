<?php

define('USE_MIDDLEWARE', true);

function context() {
    global $Context;
    return $Context;
}

function ddd($var) {
    var_dump($var);die;
}