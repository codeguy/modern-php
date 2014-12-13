<?php
// Use composer autoloader
require 'vendor/autoload.php';

// Setup Whoops error and exception handlers
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

throw new \Exception('This is an exception!');
