<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '<DB_HOST>');
define('DB_USERNAME', '<DB_USERNAME>');
define('DB_PASSWORD', '<DB_PASSWORD>');
define('DB_NAME', '<DB_NAME>');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>