<?php
session_start();

include_once "config.php";

$usr = mysqli_real_escape_string($db,$_POST['usr']);
$pwd = mysqli_real_escape_string($db,$_POST['pwd']);
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = "SELECT * FROM sesstest WHERE username = '$usr'";
$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) != 0){
    $_SESSION["dupe"] = true;
    header("location: register.php");
    exit;
}
else{
    $phash = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO sesstest VALUES (DEFAULT, '$usr', '$phash', DEFAULT);";
    mysqli_query($db,$sql);
    $sql = "INSERT INTO userdata VALUES (DEFAULT, DEFAULT, DEFAULT, '$phone', DEFAULT, DEFAULT, DEFAULT, DEFAULT, '$email');";
    mysqli_query($db,$sql);
    $_SESSION["msg"] = 2;
    header("location: login.php");
    mysqli_close($db);
    exit;
}


?>

<html><head>
<link rel="icon" type="image/ico" href="favicon.ico">
</head></html>