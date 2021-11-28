<?php
session_start();

include_once "config.php";
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    $logged = "YES";
}
else{
    $logged = "NO";
}
?>

<!DOCTYPE html>
<html><head>
    <title>AD DEFENSE ANNUAL WORKSHOP</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <style>
        body{
            background:#000000;
        }
        .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 4;
  color:#FFFFFF;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 1.5em;
}
.header{
    font-weight:bold;
    font-style: italic;
    font-size: 72px;
    font-family: 'Oswald', sans-serif;
}
.sub{
    font-family: 'Roboto', sans-serif;
}
    </style>
</head>

<body>
<div class="w3-top w3-bar w3-black" ><a href="home.php" class="w3-bar-item w3-button">Home</a>
<a href="about.php" class="w3-bar-item w3-button">About</a>
<?php
if ($logged == "NO"){
    echo '<a href="register.php" class="w3-bar-item w3-button">Register</a>';
    echo '<a href="login.php" class="w3-bar-item w3-button">Login</a>';
}
if($logged == "YES"){
    echo '<a href="deauth.php" class="w3-bar-item w3-button w3-right">Logout</a>';
    echo '<a href="dashboard.php" class="w3-bar-item w3-button w3-right">Dashboard</a>';
}
if($_SESSION["admin"] == true){
    echo '<a href="admin.php" class="w3-bar-item w3-button w3-right"><b>Admin Panel</b></a>';
}
?>
</div>
<div class="w3-container">
    <div class="centered w3-container "><p align="center"><span class="header">AD-DEFENSE WORKSHOP</span><br><span class="sub">Industry leading workshop for all Domain Admins, from a Domain Admin to another.</span></p></div>
    <img src="img/img01.jpg" width=100% style="opacity:0.2">
</div>
    <div class="w3-container w3-white">
<p align="justify">Welcome to our annual AD Defense Workshop! The purpose of our workshop is to equip System Administrators with the basics and even dive into some 
        advanced defense techniques to safeguard your organization's AD environment. We will also share the industry standard for maintaining the environment, 
    as well as the do's and dont's of becoming a Domain Admin.</p></div>

    



</body></html>