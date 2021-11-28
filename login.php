<?php
session_start();
 
// Check if the user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}

// Include config file
include_once "config.php";
?>

<!DOCTYPE HTML>

<html>
<head><title>Login - AD-DEFENSE</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" type="image/ico" href="favicon.ico">
<link href='https://fonts.googleapis.com/css?family=ZCOOL XiaoWei' rel='stylesheet'>
<style>
    body{
        font-family: 'ZCOOL XiaoWei'; 
    }
</style>
</head>

<body>
<div class="w3-top w3-bar w3-black" >
    <a href="home.php" class="w3-bar-item w3-button">Home</a>
<a href="about.php" class="w3-bar-item w3-button w3-left-align">About</a>
<a href="register.php" class="w3-bar-item w3-button w3-left-align">Register</a>
<a href="login.php" class="w3-bar-item w3-button w3-left-align">Login</a>
</div>
    <h1>LOGIN PAGE</h1>
    <div class="loginbox">
    <form method="post" action="auth.php" name="login">
        Username <input type="text" name="usr" required><br>
        Password <input type="password" name="pwd" required><br>
        <?php
        if(isset($_SESSION["msg"])){
        if ($_SESSION["msg"] === 1){
            echo "Username/Password is wrong<br>";}
        elseif($_SESSION["msg"] === 2){
            echo "You may login now!<br>";
            }
        }
            session_unset();
        
        ?>
    <input type="submit" value="Login">
</form>
        </div>
</body>

</html>