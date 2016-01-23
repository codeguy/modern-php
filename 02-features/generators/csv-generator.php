<?php
function getRows($file) {
    $handle = fopen($file, 'rb');
    if (!$handle) {
        throw new Exception();
    }
    while (!feof($handle)) {
        yield fgetcsv($handle);
    }
    fclose($handle);
}

foreach (getRows('data.csv') as $row) {
    print_r($row);
}
