<?php
include_once 'header.php';
$serverName = "database-1.c8gxaoh2plvu.us-east-1.rds.amazonaws.com";
$dBUsername = "admin";
$dBPassword = "cosc3380";
$dBname = "ZOOSchema";
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBname);
if(!$conn){
    die("connection failed: " . mysqli_connect_error());
}
?>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .idtext { width: 60px}
    .nametext {width : 180px}
    .jobtitletext {width : 100px}
    .workhourstext {width : 180px}
    .emailtext {width : 200px}
    .phonenumbertext {width : 120px}
    .worksatstext {width : 180px}
    .worksatastext {width : 180px}
    .addbut {display: block; margin:auto}
</style>

<section class ="index-intro">
        <?php
            if (isset($_SESSION["useruid"]))
            {
                echo "<p> Hello there " . $_SESSION['useruid'] . "</p>";
                
            }
            $i = 0;
        ?>

        

            <h1> Notification Page</h1>
            <p> Database communications to supervisors of notable data modification events. </p>
            <br>

    <?php
include_once 'footer.php'
?>