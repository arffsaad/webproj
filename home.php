<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    $logged = "YES";
}
else{
    $logged = "NO";
}
if (isset($_SESSION["activeuser"])){
    $user = $_SESSION["activeuser"];
}
else {
    $user = "Not logged in.";
}
if (isset($_SESSION["admin"])){
    $admin = $_SESSION["admin"];
}
else {
    $admin = false;
}
?>

<!DOCTYPE HTML>

<html>
<head><title>Home - AD-DEFENSE</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" type="image/ico" href="favicon.ico">
</head>

<body>
<div class="w3-top w3-bar w3-black" ><a href="home.php" class="w3-bar-item w3-button">Home</a>
<a href="about.php" class="w3-bar-item w3-button w3-left-align">About</a>
<?php
if ($logged == "NO"){
    echo '<a href="register.php" class="w3-bar-item w3-button w3-left-align">Register</a>';
    echo '<a href="login.php" class="w3-bar-item w3-button w3-left-align">Login</a>';
}
if($logged == "YES"){
    echo '<a href="deauth.php" class="w3-bar-item w3-button w3-right">Logout</a>';
    echo '<a href="dashboard.php" class="w3-bar-item w3-button w3-right">Dashboard</a>';
}
if($admin==1){
    echo '<a href="admin.php" class="w3-bar-item w3-button w3-right"><b>Admin Panel</b></a>';
}
?>
</div>
    <?php
    echo "Home page will be the home page<br>and will display the current logged in username underneath<br><br>";
    echo "<h1>LOGIN STATUS : $logged";
    echo "<h1>USERNAME: $user";
    echo "<h1>ADMIN: $admin ";
    if($logged == "YES"){
        echo "<br><a href='deauth.php'>Logout</a>";
    }
    if($logged == "NO"){
        echo "<br><a href='login.php'>Login</a>";
        echo "<br><a href='register.php'>Register</a>";
    }
    ?>
</body>

</html>