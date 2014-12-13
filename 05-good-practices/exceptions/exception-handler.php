<?php
// Register your exception handler
set_exception_handler(function (Exception $e) {
    // Handle and log exception
    echo "Handling exception: " . $e->getMessage();
});

// Your code goes here...
throw new \Exception("Someting went wrong!");

// Restore previous exception handler
restore_exception_handler();
