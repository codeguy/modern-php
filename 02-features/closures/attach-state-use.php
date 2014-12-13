<?php
function enclosePerson($name) {
    return function ($doCommand) use ($name) {
        return sprintf('%s, %s', $name, $doCommand);
    };
}

// Enclose "Clay" string in closure
$clay = enclosePerson('Clay');

// Invoke closure with command
echo $clay('get me sweet tea!');
// Outputs --> "Clay, get me sweet tea!"
