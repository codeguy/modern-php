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
$sql = 'SELECT email FROM users WHERE id = :id';
$userId = filter_input(INPUT_GET, 'id');

$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $userId, PDO::PARAM_INT);
