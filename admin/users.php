<?php 
session_start();

if (isset($_SESSION["admin"]) && $_SESSION["admin"] == false){
    header("location: ../index.php");
    exit;
}
include_once "../config.php";
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel - AD-DEFENSE</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
        <div class="w3-bar w3-black" ><a href="../index.php" class="w3-bar-item w3-button">Home</a>
            <a href="../index.php#about" class="w3-bar-item w3-button">About</a>
            <a href="../deauth.php" class="w3-bar-item w3-button w3-right">Logout</a>
            <a href="../dashboard.php" class="w3-bar-item w3-button w3-right">Dashboard</a>
            <div class='w3-dropdown-hover w3-right'>
        <button class='w3-button'><b>Admin Panel</b></button>
        <div class='w3-dropdown-content w3-bar-block w3-card-4'>
        <a href='admin/users.php' class='w3-bar-item w3-button'>Manage Users</a>
        </div>
        </div>
        </div>






    <table border="1">
        <tr>
            <th>ID</th><th>Username</th><th>Password Hash</th><th>Admin?</th>
        </tr>
<?php 
$sql = "SELECT * FROM sesstest";
$result = mysqli_query($db,$sql);
$rows = mysqli_num_rows($result);
echo "$rows <br><br><br>";
for ($x = 0; $x != $rows; $x++) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $user = $row['username'];
    $pass = $row['passwd'];
    $adm = $row['admin'];
    echo "<tr>
    <td>$id</td><td>$user</td><td>$pass</td><td>$adm</td>
</tr>";
}
mysqli_close($db);
?>
</table>


</body>
</html>