<?php

// clean the user information from the SESSION
session_start();
session_unset();

// redirects user to Login page
header('Location: login.php');
exit;

?>