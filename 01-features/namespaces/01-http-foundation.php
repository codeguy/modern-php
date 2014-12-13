<?php
require 'vendor/autoload.php';

$response = new \Symfony\Component\HttpFoundation\Response('Oops', 400); $response->send();
