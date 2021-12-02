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
            .values{
                top:10px;
            }
            .update{
                bottom:-350px
            }
            #warn{
                color:red;
            }
        </style> 
        <script type="text/javascript">
        function enableUpdate() {
        document.getElementById('update').disabled = false;
        }
</script>   
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
                </div>
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
            <script type="text/javascript">
                if (document.getElementById('dash1').value == 0 || document.getElementById('dash2').value == 0 || 
                document.getElementById('dash3').value == 0 || document.getElementById('dash4').value == 0 || 
                document.getElementById('dash5').value == 0 || document.getElementById('dash6').value == 0 || 
                document.getElementById('dash7').value == 0 || document.getElementById('dash8').value == 0){
                    document.getElementById('warn').hidden = false;
                }
                else{
                    document.getElementById('warn').hidden = true;
                }
            </script>
            <h4 id="warn" class="wrn">PLEASE UPDATE YOUR PROFILE!</h4>
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
                <?php
                echo "<form method='post' action='update.php'><br><br>
                <span><input type='text' name='fname' id='dash1' onchange='enableUpdate();' value='";
                echo $dat[1];
                echo "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
                <span><input type='text' name='lname' id='dash2' onchange='enableUpdate();' value='";
                echo $dat[2];
                echo "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
                <span><input type='text' name='phone' id='dash3' onchange='enableUpdate();' value='";
                echo $dat[3];
                echo "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
                <span><input type='text' name='state' id='dash4' onchange='enableUpdate();' value='";
                echo $dat[4];
                echo "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
                <span><input type='text' name='city' id='dash5' onchange='enableUpdate();' value='";
                echo $dat[5];
                echo "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
                <span><input type='text' name='company' id='dash6' onchange='enableUpdate();' value='";
                echo $dat[6];
                echo "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
                <span><input type='text' name='industry' id='dash7' onchange='enableUpdate();' value='";
                echo $dat[7];
                echo "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br>
                <span><input type='text' name='email' id='dash8' onchange='enableUpdate();' value='";
                echo $dat[8];
                echo "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                ?>
            </div>
            
        </div>
        <button type="submit" class="w3-button w3-teal w3-display-bottommiddle update" id="update" disabled>Update Details</button>
        </form>
    </body>
</html>