<?php
session_start();

include_once "config.php";
?>



<?php

$usr = mysqli_real_escape_string($db,$_POST['usr']);
$pwd = mysqli_real_escape_string($db,$_POST['pwd']); 
      
$sql = "SELECT * FROM sesstest WHERE username = '$usr'";
$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) == 0){
    $_SESSION["msg"] = 1;
    header("location: login.php");
    exit;
}
else{
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $user = $row['username'];
    $pass = $row['passwd'];
    $adm = $row['admin'];
    if (password_verify($pwd, $pass)){
        $_SESSION["loggedin"] = true;
        $_SESSION["activeuser"] = $usr;
        $_SESSION["admin"] = $adm;
        $_SESSION["userid"] = $id;
        header("location: index.php");
        exit;
    }
    else{
        $_SESSION["msg"] = 1;
        header("location: login.php");
        exit;
    }
}
mysqli_close($db);
?>
<!DOCTYPE HTML>

<html>
    <head><title>Redirecting...</title>
    <link rel="icon" type="image/ico" href="favicon.ico">
</head>
</html>