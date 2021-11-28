<?php
session_start();

include_once "config.php";

$usr = mysqli_real_escape_string($db,$_POST['usr']);
$pwd = mysqli_real_escape_string($db,$_POST['pwd']); 

$sql = "SELECT * FROM sesstest WHERE username = '$usr'";
$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) != 0){
    $_SESSION["status"] = "dupe";
    header("location: register.php");
    exit;
}
else{
    $phash = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO sesstest VALUES (DEFAULT, '$usr', '$phash', DEFAULT);";
    mysqli_query($db,$sql);
    header("location: login.php");
    mysqli_close($db);
    exit;
}


?>