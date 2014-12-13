<?php
// Use Composer autoloader
require 'vendor/autoload.php';

// Import Monolog namespaces
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SwiftMailerHandler;

date_default_timezone_set('America/New_York');

// Setup Monolog and basic handler
$log = new Logger('my-app-name');
$log->pushHandler(new StreamHandler('logs/production.log', Logger::WARNING));

// Add SwiftMailer handler for critical errors
$transport = \Swift_SmtpTransport::newInstance('smtp.example.com', 587)
             ->setUsername('USERNAME')
             ->setPassword('PASSWORD');
$mailer = \Swift_Mailer::newInstance($transport);
$message = \Swift_Message::newInstance()
           ->setSubject('Website error!')
           ->setFrom(array('daemon@example.com' => 'John Doe'))
           ->setTo(array('admin@example.com'));
$log->pushHandler(new SwiftMailerHandler($mailer, $message, Logger::CRITICAL));

// Use logger
$log->critical('The server is on fire!');
