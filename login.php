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
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
<style>
    .content{
        font-family: 'Oswald', sans-serif;
    }
</style>
</head>

<body>
<div class="w3-top w3-bar w3-black">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
<a href="about.php" class="w3-bar-item w3-button w3-left-align">About</a>
<a href="register.php" class="w3-bar-item w3-button w3-left-align">Register</a>
<a href="login.php" class="w3-bar-item w3-button w3-left-align">Login</a>
</div>
    <div class="w3-container">
        <img src="img/img02.jpg" width=100%>
        <div class="w3-container w3-display-middle" style="background:#FFFFFF">
        <h1>LOGIN</h1>
    <form method="post" action="auth.php" name="login">
        <span>Username</span><br><span><input type="text" name="usr" required></span><br>
        <span>Password</span><br><span><input type="password" name="pwd" required></span><br>
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
        <br>
    <button type="submit" class="w3-button w3-teal">Login</button>
</form>
    </div>
        </div>
</body>

</html>