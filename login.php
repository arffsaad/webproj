<?php
session_start();
 
// Check if the user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}

// Include config file
include_once "config.php";
?>

<!DOCTYPE HTML>

<html>
<head><title>Login Page</title>
<link href='https://fonts.googleapis.com/css?family=ZCOOL XiaoWei' rel='stylesheet'>
<style>
    body{
        font-family: 'ZCOOL XiaoWei'; 
    }
</style>
</head>

<body>
    <h1>LOGIN PAGE</h1>
    <div class="loginbox">
    <form method="post" action="auth.php" name="login">
        Username <input type="text" name="usr" required><br>
        Password <input type="password" name="pwd" required><br>
        <?php
        if(isset($_SESSION["wrongcred"]) && $_SESSION["wrongcred"] === true){
            echo "Username/Password is wrong<br>";}
            session_unset();
        ?>
    <input type="submit" value="Login">
</form>
        </div>
</body>

</html>