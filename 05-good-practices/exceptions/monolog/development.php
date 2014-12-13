<?php
// Use Composer autoloader
require 'vendor/autoload.php';

// Import Monolog namespaces
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Setup Monolog logger
$log = new Logger('my-app-name');
$log->pushHandler(new StreamHandler('logs/development.log', Logger::WARNING));

// Use logger
$log->warning('This is a warning!');
