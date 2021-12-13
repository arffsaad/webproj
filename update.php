<?php
session_start();

include_once "config.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$state = $_POST['state'];
$city = $_POST['city'];
$company = $_POST['company'];
$industry = $_POST['industry'];
$email = $_POST['email'];
$sel = $_SESSION["userid"];

$sql = ("UPDATE userdata SET f_name='$fname',l_name = '$lname',phone = '$phone',states = '$state',city = '$city',company = '$company',industry = '$industry',email = '$email' WHERE id = $sel");
$result = mysqli_query($db,$sql);

mysqli_close($db);

$_SESSION['updated'] = 1;
header("location: dashboard.php");
exit;
//echo "$result";
?>
