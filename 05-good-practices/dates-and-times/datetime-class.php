<?php
date_default_timezone_set('America/New_York');

// Constructor
$datetime1 = new DateTime();

// Constructor with argument
$datetime2 = new DateTime('2014-04-27 5:03 AM');

// Static constructor with format
$datetime3 = DateTime::createFromFormat('M j, Y H:i:s', 'Jan 2, 2014 23:04:12');
