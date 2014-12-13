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

// Build and execute SQL query
$sql = 'SELECT id, email FROM users WHERE email = :email';
$statement = $pdo->prepare($sql);
$email = filter_input(INPUT_GET, 'email');
$statement->bindValue(':email', $email, PDO::PARAM_INT);

// Iterate results one at a time
echo 'One result as a time as associative array', PHP_EOL;
$statement->execute();
while (($result = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
    echo $result['email'], PHP_EOL;
}

// Iterate ALL results at once
echo 'All results at once as associative array', PHP_EOL;
$statement->execute();
$allResults = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($allResults as $result) {
    echo $result['email'], PHP_EOL;
}

// Fetch one column value at a time
echo 'Fetch one column, one row at a time as associative array', PHP_EOL;
$statement->execute();
while (($email = $statement->fetchColumn(1)) !== false) {
    echo $email, PHP_EOL;
}

// Iterate results as objects
echo 'One result as a time as object', PHP_EOL;
$statement->execute();
while (($result = $statement->fetchObject()) !== false) {
    echo $result->email, PHP_EOL;
}
