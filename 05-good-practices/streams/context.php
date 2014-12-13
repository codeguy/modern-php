<?php
$requestBody = '{"username":"josh"}';
$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/json;charset=utf-8;\r\n" .
                    "Content-Length: " . mb_strlen($requestBody),
        'content' => $requestBody
    )
));
$response = file_get_contents('https://my-api.com/users', false, $context);
