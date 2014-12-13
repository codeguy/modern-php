<?php
try {
    $pdo = new PDO('sqlite:books.db');
} catch (PDOException $e) {
    // Database connection failed
}
