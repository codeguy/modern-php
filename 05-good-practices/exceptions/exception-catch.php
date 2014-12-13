<?php
try {
    $pdo = new PDO('mysql://host=wrong_host;dbname=wrong_name');
} catch (PDOException $e) {
    // Inspect the exception for logging
    $code = $e->getCode();
    $message = $e->getMessage();

    // Display a nice message to the user
    echo 'Something went wrong. Check back soon, please.';
    exit;
}
