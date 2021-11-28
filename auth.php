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
    $_SESSION["wrongcred"] = true;
    header("location: login.php");
    exit;
}
else{
    $row = mysqli_fetch_array($result);
    $user = $row['username'];
    $pass = $row['passwd'];
    $adm = $row['admin'];
    if (password_verify($pwd, $pass)){
        $_SESSION["loggedin"] = true;
        $_SESSION["activeuser"] = $usr;
        $_SESSION["admin"] = $adm;
        header("location: home.php");
        exit;
    }
    else{
        $_SESSION["wrongcred"] = true;
        header("location: login.php");
        exit;
    }
}
mysqli_close($db);
?>
<!DOCTYPE HTML>

<html>
    <head><title>Redirecting...</title>
</html>