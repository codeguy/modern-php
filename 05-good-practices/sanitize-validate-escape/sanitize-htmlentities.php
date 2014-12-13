<?php
$input = '<p><script>alert("You won the Nigerian lottery!");</script></p>';
echo htmlentities($input, ENT_QUOTES, 'UTF-8');
