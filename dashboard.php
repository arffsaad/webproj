<?php
session_start();

if (!isset($_SESSION['loggedin'])){
    header("location: login.php");
    exit;
}
include_once "config.php";
// Retrieve user data from a seperate table
$dat = array("","","","","","","","","");
$sel = $_SESSION["userid"];
$sql = ("SELECT * FROM userdata WHERE id = '$sel'");
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
for ($x = 0;$x < 9;$x++){
    $dat[$x] = $row[$x];
}
mysqli_close($db);
?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Dashboard - AD-DEFENSE</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="icon" type="image/ico" href="favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <style>
            h4,h2{
                font-family: 'Ubuntu', sans-serif;
            }
            body{
                background:#a3e0db;
            }
            .tbox{
                width:100%;
                height: 80px;
                display: inline-block;
            }
            .scnd{
                width: 60%;
                height: 800px;
                display: inline-block;
                top: 120px;
            }
            .back{
                height: 1100px;
            }
        </style>    
    </head>
    <body>
        <div class="w3-top w3-bar w3-black" ><a href="index.php" class="w3-bar-item w3-button">Home</a>
        <a href="about.php" class="w3-bar-item w3-button">About</a>
        <a href="deauth.php" class="w3-bar-item w3-button w3-right">Logout</a>
        <a href="dashboard.php" class="w3-bar-item w3-button w3-right">Dashboard</a>
        <?php
            if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
            echo '<div class="w3-dropdown-hover w3-right">
                <button class="w3-button"><b>Admin Panel</b></button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="admin/users.php" class="w3-bar-item w3-button">Manage Users</a>
                </div>';
            }
        ?>
        </div>
        <div class="w3-container back">
            <br><br>
            <h2 align="center">Welcome
            <?php
            echo $_SESSION["activeuser"];
            ?>
             to your Dashboard!</h2>
            </div>
        <div class="w3-container w3-display-container w3-teal scnd w3-display-topmiddle">
            <div class="labels w3-display-topleft">
                <br><br>
                <span><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First name</h4></span><br><br>
                <span><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last name</h4></span><br><br>
                <span><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone no.</h4></span><br><br>
                <span><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State</h4></span><br><br>
                <span><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City</h4></span><br><br>
                <span><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company</h4></span><br><br>
                <span><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Industry You're working in</h4></span><br><br>
                <span><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Address</h4></span><br><br>
            </div>
            <div class="values w3-display-topright">

            </div>
        </div>
    </body>
</html>