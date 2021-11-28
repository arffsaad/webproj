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
    $admin = "Not logged in.";
}
?>

<!DOCTYPE HTML>

<html>
<head><title>Home Page</title></head>

<body>
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