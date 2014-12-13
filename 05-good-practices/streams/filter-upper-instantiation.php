<?php
$handle = fopen('php://filter/read=string.toupper/resource=data.txt', 'rb');
while(feof($handle) !== true) {
    echo fgets($handle); // <-- Outputs all uppercase characters
}
fclose($handle);
