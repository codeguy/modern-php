<?php
$email = 'john@example.com';
echo filter_var($email, FILTER_SANITIZE_EMAIL);
