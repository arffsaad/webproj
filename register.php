<?php
session_start();

include_once "config.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header("location: home.php");
    exit;
}
?>

<!DOCTYPE HTML>
<html>
    <head><title>Register - AD-DEFENSE</title>
    <script type="text/javascript">
    function check_pass() {
    if (document.getElementById('pwd').value ==
            document.getElementById('pwd2nd').value) {
        document.getElementById('submit').disabled = false;
        document.getElementById('unmatch').hidden = true;
        document.getElementById('match').hidden = false;
    } else {
        document.getElementById('submit').disabled = true;
        document.getElementById('unmatch').hidden = false;
        document.getElementById('match').hidden = true;
    }
}
</script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" type="image/ico" href="favicon.ico">
</head>
<body>
<div class="w3-top w3-bar w3-black" ><a href="home.php" class="w3-bar-item w3-button">Home</a>
<a href="about.php" class="w3-bar-item w3-button w3-left-align">About</a>
<a href="register.php" class="w3-bar-item w3-button w3-left-align">Register</a>
<a href="login.php" class="w3-bar-item w3-button w3-left-align">Login</a></div>
<form method="post" action="reg.php">
        Username&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="usr" required><br>
        Password&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd" id="pwd" onchange='check_pass();' required/><br>
        Confirm Password&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd2nd" id= "pwd2nd" onchange='check_pass();' required/><br>
        <h3 style="color:#ff0000" id="unmatch" hidden>Passwords do not match!</h3>
        <h3 id="match" hidden>Passwords Match.</h3>
        <input type="submit" value="Register!" id="submit" disabled/><br>
</form>
<?php
if (isset($_SESSION["dupe"]) && $_SESSION["dupe"] == true){
    echo "Username already exists. Please use another one.";
}
session_unset();
?>
</body>
</html>