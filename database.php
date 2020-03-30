<?php 

//define 
define ('DB_SERVER', 'localhost');
define ('DB_USER', 'movies_admin');
define ('DB_PASSWORD', '1234');
define('DB_NAME', 'movies_database');
$connect= mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, 'movies_database');


?>