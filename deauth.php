<?php
session_start();

session_unset();
session_destroy();
header("location: index.php");
exit;
?>
<html><head>
<link rel="icon" type="image/ico" href="favicon.ico">
</head></html>