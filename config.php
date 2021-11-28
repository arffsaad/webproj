<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'webprog');
 
/* Attempt to connect to MySQL database */
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
?>
<html><head>
<link rel="icon" type="image/ico" href="favicon.ico">
</head></html>