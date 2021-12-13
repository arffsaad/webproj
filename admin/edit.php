<?php
session_start();

if (isset($_SESSION["admin"]) && $_SESSION["admin"] == false){
    header("location: ../index.php");
    exit;
}
include_once "../config.php";
$sel = $_POST['d1'];
$cur = $_POST['d2'];
$_SESSION['sel'] = $sel;
$dat = array("","","","","","","","","","");
$sql = ("SELECT * FROM userdata WHERE id = '$sel'");
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
for ($x = 0;$x < 9;$x++){
    $dat[$x] = $row[$x];
}

$sql = ("SELECT admin FROM sesstest WHERE id = $sel");
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
if ($row[0] == 1){
    $dat[9] = 'checked';
}
mysqli_close($db);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin Panel - AD-DEFENSE</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            #tabcon{
                width:70%;
            }
        </style>
    </head>
    <body>
    <div class="w3-bar w3-black" ><a href="../index.php" class="w3-bar-item w3-button">Home</a>
            <a href="../index.php#about" class="w3-bar-item w3-button">About</a>
            <a href="../deauth.php" class="w3-bar-item w3-button w3-right">Logout</a>
            <a href="../dashboard.php" class="w3-bar-item w3-button w3-right">Dashboard</a>
            <div class='w3-dropdown-hover w3-right'>
        <button class='w3-button'><b>Admin Panel</b></button>
        <div class='w3-dropdown-content w3-bar-block w3-card-4'>
        <a href='users.php' class='w3-bar-item w3-button'>Manage Users</a>
        </div>
        </div>
        </div>
        <div class="w3-container w3-teal w3-display-middle" id="tabcon">
            <h3 align="center">Edit User Profile as Admin</h3><br>
            <form method="post" action="next.php">
            <table align="center" class="w3-table-all">
                <?php
                echo "<tr><th>Username</th><th>$cur</th></tr>";
                echo "<tr><th>First Name</th><th><input type='text' name='fname' value='$dat[1]'></th></tr>";
                echo "<tr><th>Last Name</th><th><input type='text' name='lname' value='$dat[2]'></th></tr>";
                echo "<tr><th>Phone Number</th><th><input type='text' name='phone' value='$dat[3]'></th></tr>";
                echo "<tr><th>State</th><th><input type='text' name='states' value='$dat[4]'></th></tr>";
                echo "<tr><th>City</th><th><input type='text' name='city' value='$dat[5]'></th></tr>";
                echo "<tr><th>Company</th><th><input type='text' name='company' value='$dat[6]'></th></tr>";
                echo "<tr><th>Industry</th><th><input type='text' name='industry' value='$dat[7]'></th></tr>";
                echo "<tr><th>E-mail</th><th><input type='text' name='email' value='$dat[8]'></th></tr>";
                echo "<tr><th>Grant Admin Privileges?</th><th><input type='checkbox' name='admin' $dat[9]></th></tr>";
                ?>
                <tr><td colspan="2" style="text-align:center"><button type=submit class="w3-button w3-green">Update Data</button></td></tr>
            </table>
            </form>
        </div>
    </body>
</html>