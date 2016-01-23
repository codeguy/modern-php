<?php
function myGenerator() {
    yield 'value1';
    yield 'value2';
    yield 'value3';
}

foreach (myGenerator() as $value) {
    echo $value . PHP_EOL;
}
