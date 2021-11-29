<?php 
session_start();

if (isset($_SESSION["admin"]) && $_SESSION["admin"] == false){
    header("location: ../index.php");
    exit;
}
$try = $_SESSION["activeuser"];
echo "$try";
include_once "../config.php";
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel - AD-DEFENSE</title>

</head>
<body>
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