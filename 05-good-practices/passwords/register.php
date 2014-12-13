<?php
try {
    // Validate email
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (!$email) {
        throw new Exception('Invalid email');
    }

    // Validate password
    $password = filter_input(INPUT_POST, 'password');
    if (!$password || mb_strlen($password) < 8) {
        throw new Exception('Password must contain 8+ characters');
    }

    // Create password hash
    $passwordHash = password_hash(
       $password,
       PASSWORD_DEFAULT,
       ['cost' => 12]
    );
    if ($passwordHash === false) {
        throw new Exception('Password hash failed');
    }

    // Create user account (THIS IS PSUEDO-CODE)
    // $user = new User();
    // $user->email = $email;
    // $user->password_hash = $passwordHash;
    // $user->save();

    // Redirect to login page
    header('HTTP/1.1 302 Redirect');
    header('Location: /login.php');
} catch (Exception $e) {
    // Report error
    header('HTTP/1.1 400 Bad request');
    echo $e->getMessage();
}
