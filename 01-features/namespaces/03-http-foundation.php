<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response as Res;

$r = new Res('Oops', 400);
$r->send();
