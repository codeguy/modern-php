<?php
$closure = function ($name) {
    return sprintf('Hello %s', $name);
};

echo $closure("Josh");
// Outputs --> "Hello Josh"
