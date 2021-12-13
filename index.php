<?php
session_start();

include_once "config.php";
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    $logged = "YES";
}
else{
    $logged = "NO";
}
?>

<!DOCTYPE html>
<html><head>
    <title>AD DEFENSE ANNUAL WORKSHOP</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&display=swap" rel="stylesheet">
    <style>
        body{
            background:#000000;
        }
        .ontop{
            z-index: 4;
            color:#FFFFFF
}
.header{
    font-weight:bold;
    font-style: italic;
    font-size: 72px;
    font-family: 'Oswald', sans-serif;
}
.sub{
    font-family: 'Roboto', sans-serif;
}
.large{
    width:100%;
    height: 400px;
}
.htext{
    font-family: 'Bakbak One', cursive;
}
#a{
    height:80px
}
.desc{
    width:300px;
    top:400px
}
.pad{
    width:100%;
    height:320px
}
.c{
    top:419px
}
    </style>
</head>

<body>
    <div class="w3-bar w3-black">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="#about" class="w3-bar-item w3-button">About</a>
    <?php
    if ($logged == "NO"){
        echo '<a href="register.php" class="w3-bar-item w3-button">Register</a>';
        echo '<a href="login.php" class="w3-bar-item w3-button">Login</a>';
    }
    if($logged == "YES"){
        echo '<a href="deauth.php" class="w3-bar-item w3-button w3-right">Logout</a>';
        echo '<a href="dashboard.php" class="w3-bar-item w3-button w3-right">Dashboard</a>';
    }
    if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
        echo "<div class='w3-dropdown-hover w3-right'>
        <button class='w3-button'><b>Admin Panel</b></button>
        <div class='w3-dropdown-content w3-bar-block w3-card-4'>
        <a href='admin/users.php' class='w3-bar-item w3-button'>Manage Users</a>
        </div>
        </div>";
    }
    ?>
    </div>
<div class="w3-container">
    <div class="w3-container w3-display-middle ontop"><p><span class="header">AD-DEFENSE WORKSHOP</span><br><span class="sub">Industry leading workshop for all Domain Admins, from a Domain Admin to another.</span></p></div>
    <img src="img/img01.jpg" width=100% style="opacity:0.2">
</div>
<div class="w3-container w3-white" id="a"><h1 align="center" class="htext" style="vertical-align:center">ABOUT US</h1></div>
    <div class="w3-container w3-white">
<p align="justify" id="about">Welcome to our annual AD Defense Workshop! The purpose of our workshop is to equip System Administrators with the basics and even dive into some 
        advanced defense techniques to safeguard your organization's AD environment. We will also share the industry standard for maintaining the environment, 
    as well as the do's and dont's of becoming a Domain Admin.</p></div>
    <div class="w3-container w3-white" id="a"><h1 align="center" class = "htext">OUR SPEAKERS</h1></div>
    <div class="w3-container w3-white">
    <div id="members" class="w3-container w3-padding-32">
    <div class="w3-row w3-center">

    <div class="w3-third w3-display-container">
    <img src="img/speaker1.jpg" alt="Name1" style="width:60%"><br>
    <h3><b>Elon Muscular</b></h3><div class="desc w3-display-middle">
    <p>Almost Elon Musk, Elon Muscular built his fame for being one of the earliest security testers for Active Directory environments. Having an extensive list of PoCs and CVEs, he has a lot to offer for every Domain Admin out there. His advice? Active Directory is like your home; Don't let people snoop around, even if you know them.
    </p></div>
    </div>

    <div class="w3-third w3-display-container">
    <img src="img/speaker2.jpg" alt="Name2" style="width:60%">
    <h3><b>Bill Door</b></h3><div class="desc w3-display-middle">
    <p>Bill Door was the ex-CEO of the company MacroHard, planned to beat Microsoft at it's own game. But he eventually lost the fight, and vowed to expose the weaknesses of its rival. A few years of releasing vulnerabilities in the wild, he moved on with a better goal; helping people strengthen their AD Environments.</p>
</div>    
</div>

    <div class="w3-third w3-display-container">
    <img src="img/speaker3.jpg" alt="Name3" style="width:60%">
    <h3><b>John Hammond</b></h3><div class="desc w3-display-middle c">
    <p>The only real person out of the three, Hammond is a well known Malware Analyst, and has shared a lot of his expertise through his livestreams on Youtube and Twitch, where he will dissect a malware live and walks through the process together with everyone. Having a lot of experience in his field, he can offer a lot for Domain Admins looking to detect and avoid malware in their environments.</p>
</div>
    </div>
    

    </div>
    </div>
    <div class="w3-container w3-white pad"></div>
    <div class="w3-display-container w3-black pad"></div>
    </div>

    



</body></html>