<?php
session_start();

if (isset($_SESSION["admin"]) && $_SESSION["admin"] == false){
    header("location: ../index.php");
    exit;
}
include_once "../config.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$states = $_POST['states'];
$city = $_POST['city'];
$company = $_POST['company'];
$industry = $_POST['industry'];
$email = $_POST['email'];
$sel = $_SESSION['sel'];

$sql = ("UPDATE userdata SET f_name='$fname',l_name = '$lname',phone = '$phone',states = '$states',city = '$city',company = '$company',industry = '$industry',email = '$email' WHERE id = $sel");
mysqli_query($db,$sql);
if (isset($_POST['admin'])){
    $sql2 = ("UPDATE sesstest SET admin=1 WHERE id=$sel");
    mysqli_query($db,$sql2);
}
else{
    $sql2 = ("UPDATE sesstest SET admin=0 WHERE id=$sel");
    mysqli_query($db,$sql2);
}
mysqli_close($db);
unset($_SESSION['sel']);
$_SESSION['updated'] = 1;

header("location:users.php");
exit;
?>