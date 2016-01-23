<?php
function makeRange($length) {
    for ($i = 0; $i < $length; $i++) {
        yield $i;
    }
}

foreach (makeRange(1000000) as $i) {
    echo $i . PHP_EOL;
}
