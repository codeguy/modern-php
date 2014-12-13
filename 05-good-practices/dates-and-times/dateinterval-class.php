<?php
date_default_timezone_set('America/New_York');

// Create DateTime instance
$datetime = new DateTime('2014-01-01 14:00:00');

// Create two weeks interval
$interval = new DateInterval('P2W');

// Modify DateTime instance
$datetime->add($interval);
echo $datetime->format('Y-m-d H:i:s');
