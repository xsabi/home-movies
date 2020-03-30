<?php

// add the general head and body opening HTML tags including all common stylesheets
include_once 'components/head.php';

// here comes your PHP code generating the body content of your page
?>

<h1>Index page</h1>

<?php 
// add general jQuery and Materialize scrip files
include_once 'components/scripts.php';
include_once 'register.php';
// add below here your page specific script file if you need
// <script src="scripts/myscript.js"></script>

// including the general closing body HTML tags
include_once 'tail.php';
?>