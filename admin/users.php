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
        <a href='users.php' class='w3-bar-item w3-button'>Manage Users</a>
        </div>
        </div>
        </div><?php
        if(isset($_SESSION["updated"])){
                echo "<h4 id='warn' class='wrn w3-teal w3-container' align='center'>Profile Updated!</h4>";
                unset($_SESSION["updated"]);
             }
?>




    <table class="w3-table-all w3-hoverable">
        <tr class="w3-teal">
            <th>User ID</th><th>Username</th><th>Full Name</th><th>Email</th><th>Is Admin</th><th>Actions</th>
        </tr>
<?php 
$sql = "SELECT S.id, S.username, D.f_name, D.l_name, D.email, S.admin FROM sesstest S INNER JOIN userdata D ON S.id = D.id;";
$result = mysqli_query($db,$sql);
$rows = mysqli_num_rows($result);
echo "<h4>Registered Users: $rows</h4>";
for ($x = 0; $x != $rows; $x++) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $user = $row['username'];
    $name = $row['f_name'] . " " . $row['l_name'];
    $email = $row['email'];
    if ($row['admin'] == 1){
        $adm = "<img src=../img/check.png width=20 height=20>";
    }
    else{
        $adm = "<img src=../img/cross.png width=20 height=20>";
    }
    echo "<tr>
    <td>$id</td><td>$user</td><td>$name</td><td>$email</td><td>$adm</td><td class='w3-centered'><form method='post' action='edit.php'><input type=hidden value=$id name='d1'><input type=hidden value=$user name='d2'><input type='image' src=../img/update.png alt='Edit User Info' title 'Edit User Info' width=20 height=20></form>
</tr>";
}
mysqli_close($db);
?>
</table>


</body>
</html>