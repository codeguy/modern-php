<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // Error is not specified in the error_reporting
        // setting, so we ignore it.
        return;
    }

    throw new \ErrorException($errstr, $errno, 0, $errfile, $errline);
});

trigger_error("This becomes an exception");
