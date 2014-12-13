<?php
require 'settings.php';

// PDO connection
try {
    $pdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['name'],
            $settings['port'],
            $settings['charset']
        ),
        $settings['username'],
        $settings['password']
    );
} catch (PDOException $e) {
    // Database connection failed
    echo "Database connection failed";
    exit;
}

// Prepared statement
$sql = 'SELECT id FROM users WHERE email = :email';
$email = filter_input(INPUT_GET, 'email');

$statement = $pdo->prepare($sql);
$statement->bindValue(':email', $email);
